<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Promo extends Model
{
    use HasFactory;

    protected $fillable = [
        'code',
        'title',
        'description',
        'badge',
        'type',
        'discount_value',
        'min_order_amount',
        'max_discount_amount',
        'start_date',
        'end_date',
        'usage_limit',
        'used_count',
        'new_user_only',
        'is_active',
    ];

    protected $casts = [
        'discount_value' => 'float',
        'min_order_amount' => 'float',
        'max_discount_amount' => 'float',
        'start_date' => 'date',
        'end_date' => 'date',
        'usage_limit' => 'integer',
        'used_count' => 'integer',
        'new_user_only' => 'boolean',
        'is_active' => 'boolean',
    ];

    public function orders(): HasMany
    {
        return $this->hasMany(Order::class);
    }

    /**
     * Check if promo is currently valid and usable.
     */
    public function isValidNow(): bool
    {
        if (!$this->is_active) {
            return false;
        }

        $today = now()->startOfDay();

        if ($this->start_date && $today->lt($this->start_date->startOfDay())) {
            return false;
        }

        if ($this->end_date && $today->gt($this->end_date->endOfDay())) {
            return false;
        }

        if ($this->usage_limit !== null && $this->used_count >= $this->usage_limit) {
            return false;
        }

        return true;
    }

    /**
     * Validate eligibility for a specific subtotal and user.
     */
    public function isEligible(float $subtotal, ?User $user = null, ?string &$errorMessage = null): bool
    {
        if (!$this->isValidNow()) {
            $errorMessage = 'Promo ini sudah tidak aktif atau kuota telah habis.';
            return false;
        }

        if ($subtotal < $this->min_order_amount) {
            $errorMessage = 'Minimal belanja untuk promo ini adalah Rp ' . number_format($this->min_order_amount, 0, ',', '.') . '.';
            return false;
        }

        if ($this->new_user_only) {
            if (!$user) {
                $errorMessage = 'Silakan login terlebih dahulu untuk menggunakan promo pengguna baru.';
                return false;
            }

            $orderCount = Order::where('user_id', $user->id)
                ->whereIn('status', ['diproses', 'dikirim', 'selesai'])
                ->count();

            if ($orderCount > 0) {
                $errorMessage = 'Promo ini hanya berlaku untuk pesanan pertama.';
                return false;
            }
        }

        return true;
    }

    /**
     * Calculate discount amount.
     */
    public function calculateDiscount(float $subtotal, float $shippingCost = 0): float
    {
        if ($this->type === 'percent') {
            $discount = ($this->discount_value / 100) * $subtotal;
            if ($this->max_discount_amount && $discount > $this->max_discount_amount) {
                $discount = $this->max_discount_amount;
            }
            return round(min($discount, $subtotal));
        }

        if ($this->type === 'fixed_amount') {
            return round(min($this->discount_value, $subtotal));
        }

        if ($this->type === 'free_shipping') {
            return round($shippingCost);
        }

        return 0;
    }
}
