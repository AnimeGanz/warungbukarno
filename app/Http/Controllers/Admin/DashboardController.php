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
        $today = now()->startOfDay();
        $thisMonth = now()->startOfMonth();

        // Key Metrics
        $totalOrders = Order::count();
        $pendingOrders = Order::where('status', 'menunggu')->count();
        $processingOrders = Order::whereIn('status', ['diproses', 'dikirim'])->count();
        $completedOrders = Order::where('status', 'selesai')->count();

        $todayRevenue = Order::whereDate('created_at', today())
            ->where('status', '!=', 'dibatalkan')
            ->sum('total_price');

        $monthRevenue = Order::where('created_at', '>=', $thisMonth)
            ->where('status', '!=', 'dibatalkan')
            ->sum('total_price');

        $totalProducts = Product::count();
        $availableProducts = Product::where('is_available', true)->count();
        $totalCategories = Category::count();
        $activePromosCount = Promo::where('is_active', true)->count();

        // 7-day Sales Chart Data
        $salesData = collect(range(6, 0))->map(function ($daysAgo) {
            $date = now()->subDays($daysAgo);
            $total = Order::whereDate('created_at', $date)
                ->where('status', '!=', 'dibatalkan')
                ->sum('total_price');
            $count = Order::whereDate('created_at', $date)
                ->where('status', '!=', 'dibatalkan')
                ->count();
            return [
                'label' => $date->translatedFormat('d M'),
                'total' => (float) $total,
                'count' => $count,
            ];
        });

        // Top Selling Categories
        $topCategories = Category::withCount('products')
            ->orderByDesc('products_count')
            ->take(5)
            ->get();

        // Recent Orders with items and customer
        $recentOrders = Order::with(['user', 'items'])
            ->latest()
            ->take(6)
            ->get();

        // Active Promos Quick Summary
        $promosSummary = Promo::where('is_active', true)
            ->orderByDesc('used_count')
            ->take(3)
            ->get();

        return view('admin.dashboard', compact(
            'totalOrders',
            'pendingOrders',
            'processingOrders',
            'completedOrders',
            'todayRevenue',
            'monthRevenue',
            'totalProducts',
            'availableProducts',
            'totalCategories',
            'activePromosCount',
            'salesData',
            'topCategories',
            'recentOrders',
            'promosSummary'
        ));
    }
}
