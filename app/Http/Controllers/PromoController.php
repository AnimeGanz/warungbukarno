<?php

namespace App\Http\Controllers;

use App\Models\CartItem;
use App\Models\Promo;
use Illuminate\Http\Request;

class PromoController extends Controller
{
    public function index()
    {
        $promos = Promo::where('is_active', true)
            ->where(function ($query) {
                $query->whereNull('start_date')
                    ->orWhere('start_date', '<=', now()->toDateString());
            })
            ->where(function ($query) {
                $query->whereNull('end_date')
                    ->orWhere('end_date', '>=', now()->toDateString());
            })
            ->latest()
            ->get();

        $appliedCode = session('applied_promo_code');
        $appliedPromo = $appliedCode ? Promo::where('code', $appliedCode)->first() : null;

        return view('promo', compact('promos', 'appliedPromo'));
    }

    public function apply(Request $request)
    {
        $request->validate([
            'code' => 'required|string',
        ]);

        $code = strtoupper(trim($request->code));
        $promo = Promo::where('code', $code)->first();

        if (!$promo) {
            if ($request->wantsJson()) {
                return response()->json(['success' => false, 'message' => 'Kode promo tidak ditemukan.'], 404);
            }
            return back()->with('error', 'Kode promo "' . $code . '" tidak ditemukan.');
        }

        $user = auth()->user();
        $cartItems = $user ? CartItem::with('product')->where('user_id', $user->id)->get() : collect();
        $subtotal = $cartItems->sum(fn ($item) => $item->product->price * $item->quantity);

        $errorMessage = null;
        if (!$promo->isEligible($subtotal, $user, $errorMessage)) {
            // If user is just selecting a promo from promo page and cart is currently empty, still allow applying to session with a friendly note
            if ($subtotal == 0 && $promo->isValidNow()) {
                session(['applied_promo_code' => $promo->code]);
                $message = 'Kode promo ' . $promo->code . ' berhasil dipilih! Diskon akan dihitung saat kamu checkout.';
                if ($request->wantsJson()) {
                    return response()->json(['success' => true, 'message' => $message, 'promo' => $promo]);
                }
                return redirect()->route('home')->with('success', $message);
            }

            if ($request->wantsJson()) {
                return response()->json(['success' => false, 'message' => $errorMessage], 422);
            }
            return back()->with('error', $errorMessage);
        }

        session(['applied_promo_code' => $promo->code]);

        $successMsg = 'Promo "' . $promo->code . '" berhasil digunakan!';
        if ($request->wantsJson()) {
            $shippingCost = $request->input('delivery_method') === 'pickup' ? 0 : 5000;
            $discount = $promo->calculateDiscount($subtotal, $shippingCost);
            return response()->json([
                'success' => true,
                'message' => $successMsg,
                'promo' => $promo,
                'discount' => $discount,
                'new_total' => max(0, $subtotal - $discount + $shippingCost)
            ]);
        }

        return back()->with('success', $successMsg);
    }

    public function remove(Request $request)
    {
        session()->forget('applied_promo_code');

        if ($request->wantsJson()) {
            return response()->json(['success' => true, 'message' => 'Promo berhasil dilepas.']);
        }

        return back()->with('success', 'Promo berhasil dilepas.');
    }
}
