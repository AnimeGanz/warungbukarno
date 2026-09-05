<?php

namespace Database\Seeders;

use App\Models\Promo;
use Illuminate\Database\Seeder;

class PromoSeeder extends Seeder
{
    public function run(): void
    {
        $promos = [
            [
                'code' => 'BARU20',
                'title' => 'Diskon 20%',
                'description' => 'Untuk pesanan pertamamu di WarungBuKarno. Berlaku untuk semua menu.',
                'badge' => 'Pelanggan Baru',
                'type' => 'percent',
                'discount_value' => 20,
                'min_order_amount' => 0,
                'max_discount_amount' => 20000,
                'start_date' => now()->subDay()->toDateString(),
                'end_date' => now()->addMonths(6)->toDateString(),
                'usage_limit' => 500,
                'new_user_only' => true,
                'is_active' => true,
            ],
            [
                'code' => 'ONGKIRGRATIS',
                'title' => 'Ongkir Gratis',
                'description' => 'Untuk pembelian minimal Rp 50.000 di area terdekat.',
                'badge' => 'Gratis Ongkir',
                'type' => 'free_shipping',
                'discount_value' => 0,
                'min_order_amount' => 50000,
                'max_discount_amount' => null,
                'start_date' => now()->subDay()->toDateString(),
                'end_date' => now()->addMonths(6)->toDateString(),
                'usage_limit' => 1000,
                'new_user_only' => false,
                'is_active' => true,
            ],
            [
                'code' => 'WEEKEND15',
                'title' => 'Beli 2 Diskon 15%',
                'description' => 'Khusus menu favorit dan aneka lauk lezat setiap pesanan.',
                'badge' => 'Weekend Sale',
                'type' => 'percent',
                'discount_value' => 15,
                'min_order_amount' => 25000,
                'max_discount_amount' => 15000,
                'start_date' => now()->subDay()->toDateString(),
                'end_date' => now()->addMonths(6)->toDateString(),
                'usage_limit' => 500,
                'new_user_only' => false,
                'is_active' => true,
            ],
            [
                'code' => 'HEMAT10',
                'title' => 'Potongan Rp 10.000',
                'description' => 'Diskon langsung Rp 10.000 untuk pelanggan setia WarungBuKarno.',
                'badge' => 'Member Spesial',
                'type' => 'fixed_amount',
                'discount_value' => 10000,
                'min_order_amount' => 40000,
                'max_discount_amount' => 10000,
                'start_date' => now()->subDay()->toDateString(),
                'end_date' => now()->addMonths(6)->toDateString(),
                'usage_limit' => 500,
                'new_user_only' => false,
                'is_active' => true,
            ],
        ];

        foreach ($promos as $promo) {
            Promo::updateOrCreate(
                ['code' => $promo['code']],
                $promo
            );
        }
    }
}
