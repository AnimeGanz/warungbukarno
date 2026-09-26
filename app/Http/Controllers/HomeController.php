<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Promo;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $categories = Category::all();
        
        $promos = Promo::where('is_active', true)
            ->where(function($query) {
                $query->whereNull('end_date')
                      ->orWhere('end_date', '>=', now());
            })
            ->latest()
            ->take(3)
            ->get();

        $products = Product::with('category')
            ->where('is_available', true)
            ->when($request->category, function ($query, $categoryId) {
                $query->where('category_id', $categoryId);
            })
            ->when($request->search, function ($query, $search) {
                $query->where('name', 'like', "%{$search}%");
            })
            ->latest()
            ->get();

        // Data Dinamis untuk Statistik (Runtime)
        $totalProducts = Product::where('is_available', true)->count();
        $averageRating = \App\Models\Review::avg('rating') ?? 0;
        
        $satisfactionText = 'Belum ada rating';
        if ($averageRating > 0) {
            if ($averageRating >= 4.5) {
                $satisfactionText = 'Sangat Puas';
            } elseif ($averageRating >= 3.5) {
                $satisfactionText = 'Puas';
            } elseif ($averageRating >= 2.5) {
                $satisfactionText = 'Lumayan Puas';
            } elseif ($averageRating >= 1.5) {
                $satisfactionText = 'Sedikit Puas';
            } else {
                $satisfactionText = 'Tidak Puas';
            }
        }

        return view('home', compact('categories', 'products', 'promos', 'totalProducts', 'averageRating', 'satisfactionText'));
    }
}