<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        try {
            if (\Illuminate\Support\Facades\Schema::hasTable('settings')) {
                $storeStatus = \Illuminate\Support\Facades\Cache::rememberForever('store_status', function () {
                    return \App\Models\Setting::firstOrCreate(['key' => 'store_status'], ['value' => 'online'])->value;
                });
                \Illuminate\Support\Facades\View::share('store_status', $storeStatus);
            }
        } catch (\Exception $e) {
            // Ignore during setup
        }
    }
}
