<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
use App\Models\Promo;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        // Cache seluruh data dashboard selama 15 menit agar tidak membebani database
        $data = \Illuminate\Support\Facades\Cache::remember('admin_dashboard_data', now()->addMinutes(15), function () {
            $today = now()->startOfDay();
            $thisMonth = now()->startOfMonth();

            // 1. Mengurangi 14 query pada loop 7-hari menjadi 1 query saja
            $sevenDaysAgo = now()->subDays(6)->startOfDay();
            $ordersLast7Days = Order::where('created_at', '>=', $sevenDaysAgo)
                ->where('status', '!=', 'dibatalkan')
                ->select('created_at', 'total_price')
                ->get();

            $salesData = collect(range(6, 0))->map(function ($daysAgo) use ($ordersLast7Days) {
                $date = now()->subDays($daysAgo);
                $dateString = $date->format('Y-m-d');
                
                $dayOrders = $ordersLast7Days->filter(function($order) use ($dateString) {
                    return $order->created_at->format('Y-m-d') === $dateString;
                });

                return [
                    'label' => $date->translatedFormat('d M'),
                    'total' => (float) $dayOrders->sum('total_price'),
                    'count' => $dayOrders->count(),
                ];
            });

            // 2. Fetch metrics
            return [
                'totalOrders' => Order::count(),
                'pendingOrders' => Order::where('status', 'menunggu')->count(),
                'processingOrders' => Order::whereIn('status', ['diproses', 'dikirim'])->count(),
                'completedOrders' => Order::where('status', 'selesai')->count(),

                'todayRevenue' => Order::whereDate('created_at', today())
                    ->where('status', '!=', 'dibatalkan')
                    ->sum('total_price'),

                'monthRevenue' => Order::where('created_at', '>=', $thisMonth)
                    ->where('status', '!=', 'dibatalkan')
                    ->sum('total_price'),

                'totalProducts' => Product::count(),
                'availableProducts' => Product::where('is_available', true)->count(),
                'totalCategories' => Category::count(),
                'activePromosCount' => Promo::where('is_active', true)->count(),

                'salesData' => $salesData,

                'topCategories' => Category::withCount('products')
                    ->orderByDesc('products_count')
                    ->take(5)
                    ->get(),

                'recentOrders' => Order::with(['user', 'items'])
                    ->latest()
                    ->take(6)
                    ->get(),

                'promosSummary' => Promo::where('is_active', true)
                    ->orderByDesc('used_count')
                    ->take(3)
                    ->get(),

                'store_latitude' => \App\Models\Setting::where('key', 'store_latitude')->value('value') ?? '-6.200000',
                'store_longitude' => \App\Models\Setting::where('key', 'store_longitude')->value('value') ?? '106.816666',
            ];
        });

        return view('admin.dashboard', $data);
    }

    public function toggleStoreStatus()
    {
        $setting = \App\Models\Setting::firstOrCreate(
            ['key' => 'store_status'],
            ['value' => 'online']
        );

        $newStatus = $setting->value === 'online' ? 'offline' : 'online';
        $setting->update(['value' => $newStatus]);

        \Illuminate\Support\Facades\Cache::forever('store_status', $newStatus);

        return redirect()->back()->with('success', 'Status toko berhasil diubah menjadi ' . strtoupper($newStatus));
    }

    public function updateStoreLocation(\Illuminate\Http\Request $request)
    {
        $request->validate([
            'store_latitude' => 'required|numeric',
            'store_longitude' => 'required|numeric',
        ]);

        \App\Models\Setting::updateOrCreate(
            ['key' => 'store_latitude'],
            ['value' => $request->store_latitude]
        );
        \App\Models\Setting::updateOrCreate(
            ['key' => 'store_longitude'],
            ['value' => $request->store_longitude]
        );

        // Clear cache so dashboard uses new values
        \Illuminate\Support\Facades\Cache::forget('admin_dashboard_data');

        return redirect()->back()->with('success', 'Koordinat toko berhasil diperbarui!');
    }
}
