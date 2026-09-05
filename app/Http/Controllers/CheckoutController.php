<?php

namespace App\Http\Controllers;

use App\Models\CartItem;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Promo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Midtrans\Config;
use Midtrans\Snap;

class CheckoutController extends Controller
{
    protected int $shippingCost = 5000;

    public function index()
    {
        $user = auth()->user();
        $cartItems = CartItem::with('product')->where('user_id', $user->id)->get();

        if ($cartItems->isEmpty()) {
            return redirect()->route('cart.index');
        }

        $subtotal = $cartItems->sum(fn ($item) => $item->product->price * $item->quantity);

        $appliedPromo = null;
        $discount = 0;
        $promoError = null;

        $appliedCode = session('applied_promo_code');
        if ($appliedCode) {
            $promo = Promo::where('code', $appliedCode)->first();
            if ($promo && $promo->isValidNow()) {
                $err = null;
                if ($promo->isEligible($subtotal, $user, $err)) {
                    $appliedPromo = $promo;
                    $discount = $promo->calculateDiscount($subtotal, $this->shippingCost);
                } else {
                    $promoError = $err;
                }
            } else {
                session()->forget('applied_promo_code');
            }
        }

        $availablePromos = Promo::where('is_active', true)
            ->where(function ($query) {
                $query->whereNull('start_date')->orWhere('start_date', '<=', now()->toDateString());
            })
            ->where(function ($query) {
                $query->whereNull('end_date')->orWhere('end_date', '>=', now()->toDateString());
            })
            ->get();

        return view('checkout', [
            'cartItems' => $cartItems,
            'subtotal' => $subtotal,
            'shippingCost' => $this->shippingCost,
            'appliedPromo' => $appliedPromo,
            'discount' => $discount,
            'promoError' => $promoError,
            'availablePromos' => $availablePromos,
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'recipient_name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'shipping_address' => 'required|string',
            'landmark' => 'nullable|string',
            'delivery_method' => 'required|in:delivery,pickup',
            'payment_method' => 'required|in:cod,bank_transfer,ewallet',
            'notes' => 'nullable|string',
        ]);

        $user = auth()->user();
        $cartItems = CartItem::with('product')->where('user_id', $user->id)->get();

        if ($cartItems->isEmpty()) {
            return redirect()->route('cart.index');
        }



        if (in_array($validated['payment_method'], ['bank_transfer', 'ewallet'])) {
            if (empty(config('midtrans.server_key'))) {
                return back()->with('error', 'Konfigurasi Payment Gateway belum diatur (Server Key kosong). Silakan hubungi admin.')->withInput();
            }
        }

        $order = DB::transaction(function () use ($validated, $cartItems, $request, $user) {
            $subtotal = $cartItems->sum(fn ($item) => $item->product->price * $item->quantity);
            $shippingCost = $validated['delivery_method'] === 'delivery' ? $this->shippingCost : 0;

            // Promo validation and calculation
            $promoId = null;
            $promoCode = null;
            $discountAmount = 0;

            $appliedCode = session('applied_promo_code');
            if ($appliedCode) {
                $promo = Promo::where('code', $appliedCode)->first();
                if ($promo && $promo->isValidNow()) {
                    $err = null;
                    if ($promo->isEligible($subtotal, $user, $err)) {
                        $promoId = $promo->id;
                        $promoCode = $promo->code;
                        $discountAmount = $promo->calculateDiscount($subtotal, $shippingCost);
                        $promo->increment('used_count');
                    }
                }
            }

            $totalPrice = max(0, $subtotal - $discountAmount + $shippingCost);

            $paymentProofPath = null;
            if ($request->hasFile('payment_proof')) {
                $paymentProofPath = $request->file('payment_proof')->store('payment_proofs', 'public');
            }

            $fullAddress = $validated['recipient_name'] . ' (' . $validated['phone'] . ')' . "\n"
                . $validated['shipping_address']
                . (!empty($validated['landmark']) ? "\nPatokan: " . $validated['landmark'] : '');

            $order = Order::create([
                'user_id' => $user->id,
                'promo_id' => $promoId,
                'promo_code' => $promoCode,
                'order_number' => 'INV-' . now()->format('Ymd') . '-' . Str::upper(Str::random(6)),
                'total_price' => $totalPrice,
                'shipping_cost' => $shippingCost,
                'discount_amount' => $discountAmount,
                'delivery_method' => $validated['delivery_method'],
                'status' => 'menunggu',
                'payment_method' => $validated['payment_method'],
                'shipping_address' => $fullAddress,
                'notes' => $validated['notes'] ?? null,
            ]);

            foreach ($cartItems as $item) {
                OrderItem::create([
                    'order_id' => $order->id,
                    'product_id' => $item->product_id,
                    'product_name' => $item->product->name,
                    'price' => $item->product->price,
                    'quantity' => $item->quantity,
                    'subtotal' => $item->product->price * $item->quantity,
                ]);
            }

            if (in_array($order->payment_method, ['bank_transfer', 'ewallet'])) {
                Config::$serverKey = config('midtrans.server_key');
                Config::$isProduction = config('midtrans.is_production');
                Config::$isSanitized = config('midtrans.is_sanitized');
                Config::$is3ds = config('midtrans.is_3ds');

                $params = [
                    'transaction_details' => [
                        'order_id' => $order->order_number,
                        'gross_amount' => $order->total_price,
                    ],
                    'customer_details' => [
                        'first_name' => $validated['recipient_name'],
                        'phone' => $validated['phone'],
                        'email' => $user->email,
                    ],
                ];

                if ($order->payment_method === 'bank_transfer') {
                    $params['enabled_payments'] = ['bank_transfer'];
                } elseif ($order->payment_method === 'ewallet') {
                    $params['enabled_payments'] = ['gopay', 'dana'];
                }

                $snapToken = Snap::getSnapToken($params);
                $order->update(['snap_token' => $snapToken]);
            }

            CartItem::where('user_id', $user->id)->delete();
            session()->forget('applied_promo_code');

            return $order;
        });

        return redirect()->route('orders.show', $order)->with('success', 'Pesanan berhasil dibuat! Nomor pesanan: ' . $order->order_number);
    }
}