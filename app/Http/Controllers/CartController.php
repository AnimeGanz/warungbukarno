<?php

namespace App\Http\Controllers;

use App\Models\CartItem;
use App\Models\Product;
use App\Models\Promo;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $cartItems = CartItem::with('product')->where('user_id', $user->id)->get();
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
                    $discount = $promo->calculateDiscount($subtotal, 0);
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

        $total = max(0, $subtotal - $discount);

        return view('cart', compact('cartItems', 'subtotal', 'total', 'appliedPromo', 'discount', 'promoError', 'availablePromos'));
    }

    public function add(Request $request, Product $product)
    {
        $cartItem = CartItem::where('user_id', auth()->id())
            ->where('product_id', $product->id)
            ->first();

        if ($cartItem) {
            if ($cartItem->quantity < $product->stock) {
                $cartItem->increment('quantity');
            } else {
                return back()->with('error', 'Stok tidak mencukupi untuk ditambah lagi.');
            }
        } else {
            if ($product->stock > 0) {
                CartItem::create([
                    'user_id' => auth()->id(),
                    'product_id' => $product->id,
                    'quantity' => 1,
                ]);
            } else {
                return back()->with('error', 'Stok produk habis.');
            }
        }

        return back()->with('success', $product->name . ' ditambahkan ke keranjang.');
    }

    public function increase(CartItem $cartItem)
    {
        $this->authorizeCartItem($cartItem);

        if ($cartItem->quantity < $cartItem->product->stock) {
            $cartItem->increment('quantity');
        } else {
            return back()->with('error', 'Maksimal stok tercapai.');
        }

        return back();
    }

    public function decrease(CartItem $cartItem)
    {
        $this->authorizeCartItem($cartItem);

        if ($cartItem->quantity <= 1) {
            $cartItem->delete();
        } else {
            $cartItem->decrement('quantity');
        }

        return back();
    }

    public function update(Request $request, CartItem $cartItem)
    {
        $this->authorizeCartItem($cartItem);

        $validated = $request->validate([
            'quantity' => 'required|integer|min:1',
        ]);

        $quantity = $validated['quantity'];
        if ($quantity > $cartItem->product->stock) {
            $quantity = $cartItem->product->stock;
            session()->flash('error', 'Jumlah pesanan disesuaikan dengan sisa stok.');
        }

        $cartItem->update(['quantity' => $quantity]);

        return back();
    }

    public function remove(CartItem $cartItem)
    {
        $this->authorizeCartItem($cartItem);

        $cartItem->delete();

        return back()->with('success', 'Item dihapus dari keranjang.');
    }

    private function authorizeCartItem(CartItem $cartItem): void
    {
        if ($cartItem->user_id !== auth()->id()) {
            abort(403);
        }
    }
}