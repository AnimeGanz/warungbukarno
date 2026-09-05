<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckStoreStatus
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $storeStatus = \Illuminate\Support\Facades\Cache::rememberForever('store_status', function () {
            $setting = \App\Models\Setting::firstOrCreate(
                ['key' => 'store_status'],
                ['value' => 'online']
            );
            return $setting->value;
        });

        if ($storeStatus === 'offline') {
            return redirect()->back()->with('error', 'Maaf, toko sedang tutup. Silakan kembali besok.');
        }

        return $next($request);
    }
}
