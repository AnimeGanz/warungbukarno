<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;

// Halaman utama - nanti diisi daftar produk buat pembeli
Route::get('/', [\App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/cara-pesan', function () {
    return view('cara-pesan');
})->name('cara-pesan');

Route::get('/promo', [\App\Http\Controllers\PromoController::class, 'index'])->name('promo');
Route::post('/promo/apply', [\App\Http\Controllers\PromoController::class, 'apply'])->name('promo.apply');
Route::post('/promo/remove', [\App\Http\Controllers\PromoController::class, 'remove'])->name('promo.remove');

Route::get('/products/{product}/reviews', [\App\Http\Controllers\ReviewController::class, 'index'])->name('api.products.reviews');

Route::get('/tentang-kami', function () {
    return view('tentang-kami');
})->name('tentang-kami');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/cart', [\App\Http\Controllers\CartController::class, 'index'])->name('cart.index');
    Route::post('/cart/{product}', [\App\Http\Controllers\CartController::class, 'add'])->name('cart.add');
    Route::patch('/cart/{cartItem}/increase', [\App\Http\Controllers\CartController::class, 'increase'])->name('cart.increase');
    Route::patch('/cart/{cartItem}/decrease', [\App\Http\Controllers\CartController::class, 'decrease'])->name('cart.decrease');
    Route::delete('/cart/{cartItem}', [\App\Http\Controllers\CartController::class, 'remove'])->name('cart.remove');

    Route::get('/checkout', [\App\Http\Controllers\CheckoutController::class, 'index'])->name('checkout.index');
    Route::post('/checkout', [\App\Http\Controllers\CheckoutController::class, 'store'])->name('checkout.store');

    Route::get('/orders', [\App\Http\Controllers\OrderController::class, 'index'])->name('orders.index');
    Route::get('/orders/{order}', [\App\Http\Controllers\OrderController::class, 'show'])->name('orders.show');

    Route::post('/profile/avatar', [\App\Http\Controllers\AvatarController::class, 'update'])->name('profile.avatar');

    Route::post('/reviews', [\App\Http\Controllers\ReviewController::class, 'store'])->name('reviews.store');
});

// Area khusus admin - dilindungi middleware 'admin'
Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [\App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('dashboard');

    Route::resource('products', \App\Http\Controllers\Admin\ProductController::class);
    Route::resource('categories', \App\Http\Controllers\Admin\CategoryController::class)->except(['create', 'edit', 'show']);
    Route::resource('promos', \App\Http\Controllers\Admin\PromoController::class);
    Route::patch('promos/{promo}/toggle', [\App\Http\Controllers\Admin\PromoController::class, 'toggle'])->name('promos.toggle');
    Route::resource('orders', \App\Http\Controllers\Admin\OrderController::class)->only(['index', 'show']);
    Route::patch('orders/{order}/status', [\App\Http\Controllers\Admin\OrderController::class, 'updateStatus'])->name('orders.update-status');

    Route::resource('users', \App\Http\Controllers\Admin\UserController::class)->only(['index', 'destroy']);
    Route::patch('users/{user}/role', [\App\Http\Controllers\Admin\UserController::class, 'updateRole'])->name('users.update-role');

    Route::resource('reviews', \App\Http\Controllers\Admin\ReviewController::class)->only(['index', 'destroy']);
});

Route::post('/api/midtrans/callback', [\App\Http\Controllers\PaymentCallbackController::class, 'receive'])->name('midtrans.callback');

require __DIR__.'/auth.php';