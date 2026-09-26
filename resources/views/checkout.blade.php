@extends('layouts.shop')

@section('title', 'Checkout Pesanan')

@section('content')

    <div class="bg-gray-50/50 dark:bg-gray-950 min-h-screen py-10 font-sans transition-colors duration-300">
        <div class="max-w-6xl mx-auto px-4 sm:px-6">

            {{-- Header Checkout --}}
            <div class="flex items-center justify-between mb-8">
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 rounded-xl bg-orange-500 flex items-center justify-center text-white font-bold text-lg shadow-md shadow-orange-500/20">W</div>
                    <div class="leading-tight">
                        <p class="font-extrabold text-gray-900 dark:text-white text-lg tracking-tight">Checkout<span class="text-orange-500">Aman</span></p>
                        <p class="text-[11px] text-gray-500 dark:text-gray-400 font-medium">WarungBuKarno - Cepat & Praktis</p>
                    </div>
                </div>
                <a href="{{ route('cart.index') }}" class="text-sm font-semibold text-gray-600 dark:text-gray-300 hover:text-orange-600 dark:hover:text-orange-500 flex items-center gap-2 bg-white dark:bg-gray-900 hover:bg-gray-50 dark:hover:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-full px-5 py-2.5 shadow-sm transition">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5L3 12m0 0l7.5-7.5M3 12h18" />
                    </svg>
                    Kembali ke Keranjang
                </a>
            </div>

            {{-- Modern Step Indicator --}}
            <div class="bg-white dark:bg-gray-900 rounded-3xl border border-gray-100 dark:border-gray-800 px-8 py-5 mb-8 shadow-sm transition-colors duration-300">
                <div class="flex items-center justify-between sm:justify-center gap-2 sm:gap-8 max-w-3xl mx-auto">
                    {{-- Step 1 --}}
                    <div class="flex flex-col sm:flex-row items-center gap-2 sm:gap-3 step-indicator relative z-10" data-step="1">
                        <div class="step-circle w-8 h-8 rounded-full bg-orange-500 text-white text-sm font-bold flex items-center justify-center shadow-md shadow-orange-500/20 transition-all">1</div>
                        <span class="step-label text-[11px] sm:text-sm font-bold text-gray-800 dark:text-gray-200 transition-all">Info Penerima</span>
                    </div>
                    <div class="flex-1 sm:w-16 h-1 bg-gray-100 dark:bg-gray-800 rounded-full step-line relative -mx-4 sm:mx-0" data-line="1"></div>
                    
                    {{-- Step 2 --}}
                    <div class="flex flex-col sm:flex-row items-center gap-2 sm:gap-3 step-indicator relative z-10" data-step="2">
                        <div class="step-circle w-8 h-8 rounded-full bg-white dark:bg-gray-800 border-2 border-gray-200 dark:border-gray-700 text-gray-400 dark:text-gray-500 text-sm font-bold flex items-center justify-center transition-all">2</div>
                        <span class="step-label text-[11px] sm:text-sm font-medium text-gray-400 dark:text-gray-500 transition-all">Pengiriman</span>
                    </div>
                    <div class="flex-1 sm:w-16 h-1 bg-gray-100 dark:bg-gray-800 rounded-full step-line relative -mx-4 sm:mx-0" data-line="2"></div>
                    
                    {{-- Step 3 --}}
                    <div class="flex flex-col sm:flex-row items-center gap-2 sm:gap-3 step-indicator relative z-10" data-step="3">
                        <div class="step-circle w-8 h-8 rounded-full bg-white dark:bg-gray-800 border-2 border-gray-200 dark:border-gray-700 text-gray-400 dark:text-gray-500 text-sm font-bold flex items-center justify-center transition-all">3</div>
                        <span class="step-label text-[11px] sm:text-sm font-medium text-gray-400 dark:text-gray-500 transition-all">Pembayaran</span>
                    </div>
                    <div class="flex-1 sm:w-16 h-1 bg-gray-100 dark:bg-gray-800 rounded-full step-line relative -mx-4 sm:mx-0" data-line="3"></div>
                    
                    {{-- Step 4 --}}
                    <div class="flex flex-col sm:flex-row items-center gap-2 sm:gap-3 step-indicator relative z-10" data-step="4">
                        <div class="step-circle w-8 h-8 rounded-full bg-white dark:bg-gray-800 border-2 border-gray-200 dark:border-gray-700 text-gray-400 dark:text-gray-500 text-sm font-bold flex items-center justify-center transition-all">4</div>
                        <span class="step-label text-[11px] sm:text-sm font-medium text-gray-400 dark:text-gray-500 transition-all">Selesai</span>
                    </div>
                </div>
            </div>

            @if ($errors->any())
                <div class="bg-red-50 border border-red-200 text-red-700 px-5 py-4 rounded-2xl text-sm mb-6 flex items-start gap-3 shadow-sm">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-red-500 mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                    </svg>
                    <ul class="list-disc list-inside space-y-1">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('checkout.store') }}" method="POST" enctype="multipart/form-data" id="checkoutForm">
                @csrf

                <div class="grid grid-cols-1 lg:grid-cols-12 gap-8">

                    {{-- KIRI: Konten Form (8 kolom) --}}
                    <div class="lg:col-span-7 xl:col-span-8 space-y-6">

                        {{-- STEP 1: Informasi Penerima --}}
                        <div class="step-content animate-fade-in" data-step-content="1">
                            <div class="bg-white dark:bg-gray-900 rounded-3xl border border-gray-100 dark:border-gray-800 p-6 sm:p-8 shadow-sm">
                                <h3 class="text-xl font-extrabold text-gray-900 dark:text-white mb-6 flex items-center gap-3">
                                    <span class="w-8 h-8 rounded-lg bg-orange-100 dark:bg-orange-900/30 flex items-center justify-center text-orange-600 dark:text-orange-500">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z" />
                                        </svg>
                                    </span>
                                    Detail Penerima
                                </h3>

                                <div class="grid grid-cols-1 md:grid-cols-2 gap-5 mb-5">
                                    <div>
                                        <label class="block text-xs font-bold text-gray-700 dark:text-gray-300 uppercase tracking-wider mb-2">Nama Lengkap</label>
                                        <input type="text" name="recipient_name" id="recipient_name" value="{{ old('recipient_name', auth()->user()->name) }}" placeholder="Siapa yang menerima pesanan?"
                                               class="w-full bg-gray-50 dark:bg-gray-800 border border-gray-200 dark:border-gray-700 dark:text-white rounded-xl px-4 py-3 text-sm focus:bg-white dark:focus:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-orange-500/30 focus:border-orange-500 transition">
                                    </div>
                                    <div>
                                        <label class="block text-xs font-bold text-gray-700 dark:text-gray-300 uppercase tracking-wider mb-2">Nomor WhatsApp</label>
                                        <input type="text" name="phone" id="phone" value="{{ old('phone') }}" placeholder="Contoh: 081234567890"
                                               class="w-full bg-gray-50 dark:bg-gray-800 border border-gray-200 dark:border-gray-700 dark:text-white rounded-xl px-4 py-3 text-sm focus:bg-white dark:focus:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-orange-500/30 focus:border-orange-500 transition">
                                    </div>
                                </div>

                                <div class="mb-5 relative">
                                    <div class="flex flex-col sm:flex-row sm:justify-between sm:items-end mb-2 gap-2">
                                        <label class="block text-xs font-bold text-gray-700 dark:text-gray-300 uppercase tracking-wider">Alamat Lengkap Pengiriman</label>
                                        <button type="button" onclick="getLocation()" class="text-xs font-bold text-orange-500 hover:text-orange-600 flex items-center gap-1.5 bg-orange-50 dark:bg-orange-900/20 px-3 py-1.5 rounded-lg transition self-start sm:self-auto">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd" /></svg>
                                            <span id="btnLocationText">Gunakan Lokasi Saat Ini (GPS)</span>
                                        </button>
                                    </div>
                                    <textarea name="shipping_address" id="shipping_address" rows="3" placeholder="Nama jalan, nomor rumah, RT/RW, kelurahan..."
                                              class="w-full bg-gray-50 dark:bg-gray-800 border border-gray-200 dark:border-gray-700 dark:text-white rounded-xl px-4 py-3 text-sm focus:bg-white dark:focus:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-orange-500/30 focus:border-orange-500 transition">{{ old('shipping_address') }}</textarea>
                                </div>

                                <div>
                                    <label class="block text-xs font-bold text-gray-700 dark:text-gray-300 uppercase tracking-wider mb-2">Patokan Lokasi (Opsional)</label>
                                    <input type="text" name="landmark" value="{{ old('landmark') }}" placeholder="Contoh: Rumah cat hijau depan Indomaret"
                                           class="w-full bg-gray-50 dark:bg-gray-800 border border-gray-200 dark:border-gray-700 dark:text-white rounded-xl px-4 py-3 text-sm focus:bg-white dark:focus:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-orange-500/30 focus:border-orange-500 transition">
                                </div>
                            </div>
                        </div>

                        {{-- STEP 2: Pengiriman --}}
                        <div class="step-content hidden animate-fade-in" data-step-content="2">
                            <div class="bg-white dark:bg-gray-900 rounded-3xl border border-gray-100 dark:border-gray-800 p-6 sm:p-8 shadow-sm">
                                <h3 class="text-xl font-extrabold text-gray-900 dark:text-white mb-6 flex items-center gap-3">
                                    <span class="w-8 h-8 rounded-lg bg-orange-100 dark:bg-orange-900/30 flex items-center justify-center text-orange-600 dark:text-orange-500">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 18.75a1.5 1.5 0 01-3 0m3 0a1.5 1.5 0 00-3 0m3 0h6m-9 0H3.375a1.125 1.125 0 01-1.125-1.125V14.25m17.25 4.5a1.5 1.5 0 01-3 0m3 0a1.5 1.5 0 00-3 0m3 0h1.125c.621 0 1.129-.504 1.09-1.124a17.902 17.902 0 00-3.213-9.193 2.056 2.056 0 00-1.58-.86H14.25M16.5 18.75h-2.25m0-11.177v-.001c0-.622.504-1.126 1.125-1.126h.001c.622 0 1.126.504 1.126 1.126v.001c0 .622-.504 1.126-1.126 1.126h-.001a1.125 1.125 0 01-1.125-1.126zM12 9.75h3m-3 0v3m0-3H9m3.75-3.75h-.75a2.25 2.25 0 00-2.25 2.25v9.75c0 .621.504 1.125 1.125 1.125H12M12 5.25V9.75" />
                                        </svg>
                                    </span>
                                    Metode Pengiriman
                                </h3>

                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-6">
                                    {{-- Opsi 1: Delivery --}}
                                    <label class="group relative bg-white dark:bg-gray-800 border-2 border-gray-200 dark:border-gray-700 rounded-2xl p-5 {{ $subtotal >= 20000 ? 'cursor-pointer transition-all hover:border-orange-300 dark:hover:border-orange-500/50 has-[:checked]:border-orange-500 has-[:checked]:bg-orange-50/30 dark:has-[:checked]:bg-orange-900/10 has-[:checked]:shadow-md' : 'opacity-60 cursor-not-allowed bg-gray-50 dark:bg-gray-800/80' }}">
                                        <input type="radio" name="delivery_method" value="delivery" {{ $subtotal >= 20000 ? 'checked' : 'disabled' }} onchange="updateSummary()" class="absolute top-5 right-5 text-orange-500 focus:ring-orange-400 w-5 h-5">
                                        <div class="w-12 h-12 rounded-xl bg-orange-100 dark:bg-orange-900/30 flex items-center justify-center mb-4 transition-transform {{ $subtotal >= 20000 ? 'group-hover:scale-105' : '' }}">
                                            <span class="text-2xl">🛵</span>
                                        </div>
                                        <p class="text-base font-bold text-gray-900 dark:text-white mb-1">Antar ke Rumah</p>
                                        <p class="text-xs text-gray-500 dark:text-gray-400 leading-relaxed min-h-[3rem]">Kurir kami akan mengantar pesanan langsung ke depan pintumu.</p>
                                        
                                        @if ($subtotal < 20000)
                                            <div class="mt-4 inline-block bg-rose-100 dark:bg-rose-900/30 text-rose-700 dark:text-rose-400 px-3 py-1 rounded-lg text-xs font-bold">
                                                Minimal pesanan Rp 20.000
                                            </div>
                                        @else
                                            <div class="mt-4 inline-block bg-orange-100 dark:bg-orange-900/30 text-orange-700 dark:text-orange-400 px-3 py-1 rounded-lg text-xs font-bold">
                                                Biaya: Rp {{ number_format($shippingCost, 0, ',', '.') }}
                                            </div>
                                        @endif
                                    </label>

                                    {{-- Opsi 2: Pickup --}}
                                    <label class="group relative bg-white dark:bg-gray-800 border-2 border-gray-200 dark:border-gray-700 rounded-2xl p-5 cursor-pointer transition-all hover:border-orange-300 dark:hover:border-orange-500/50 has-[:checked]:border-orange-500 has-[:checked]:bg-orange-50/30 dark:has-[:checked]:bg-orange-900/10 has-[:checked]:shadow-md">
                                        <input type="radio" name="delivery_method" value="pickup" {{ $subtotal < 20000 ? 'checked' : '' }} onchange="updateSummary()" class="absolute top-5 right-5 text-orange-500 focus:ring-orange-400 w-5 h-5">
                                        <div class="w-12 h-12 rounded-xl bg-green-100 dark:bg-green-900/30 flex items-center justify-center mb-4 transition-transform group-hover:scale-105">
                                            <span class="text-2xl">🏪</span>
                                        </div>
                                        <p class="text-base font-bold text-gray-900 dark:text-white mb-1">Ambil Sendiri (Pickup)</p>
                                        <p class="text-xs text-gray-500 dark:text-gray-400 leading-relaxed min-h-[3rem]">Pesan sekarang, lalu ambil di warung tanpa perlu antri panjang.</p>
                                        <div class="mt-4 inline-block bg-green-100 dark:bg-green-900/30 text-green-700 dark:text-green-400 px-3 py-1 rounded-lg text-xs font-bold">
                                            Gratis Biaya Antar
                                        </div>
                                    </label>
                                </div>

                                <div class="bg-gray-50 dark:bg-gray-800/50 rounded-2xl p-4 border border-gray-100 dark:border-gray-700 flex items-center gap-4">
                                    <div class="w-10 h-10 rounded-full bg-blue-100 dark:bg-blue-900/30 flex items-center justify-center flex-shrink-0 text-blue-600 dark:text-blue-400">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                    </div>
                                    <div>
                                        <p class="text-xs font-bold text-gray-800 dark:text-gray-200">Estimasi Waktu Sampai / Pesanan Siap</p>
                                        <p class="text-[11px] text-gray-500 dark:text-gray-400 mt-0.5" id="checkoutDeliveryTimeText">Menghitung estimasi...</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- STEP 3: Pembayaran --}}
                        <div class="step-content hidden animate-fade-in" data-step-content="3">
                            <div class="bg-white dark:bg-gray-900 rounded-3xl border border-gray-100 dark:border-gray-800 p-6 sm:p-8 shadow-sm mb-6">
                                <h3 class="text-xl font-extrabold text-gray-900 dark:text-white mb-6 flex items-center gap-3">
                                    <span class="w-8 h-8 rounded-lg bg-orange-100 dark:bg-orange-900/30 flex items-center justify-center text-orange-600 dark:text-orange-500">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 8.25h19.5M2.25 9h19.5m-16.5 5.25h6m-6 2.25h3m-3.75 3h15a2.25 2.25 0 002.25-2.25V6.75A2.25 2.25 0 0018.75 4.5H5.25A2.25 2.25 0 003 6.75v10.5A2.25 2.25 0 005.25 19.5z" />
                                        </svg>
                                    </span>
                                    Metode Pembayaran
                                </h3>

                                <div class="space-y-4">
                                    {{-- COD --}}
                                    <label class="flex items-center gap-4 bg-white dark:bg-gray-800 border-2 border-gray-200 dark:border-gray-700 rounded-2xl p-5 cursor-pointer transition-all hover:border-orange-300 dark:hover:border-orange-500/50 has-[:checked]:border-orange-500 has-[:checked]:bg-orange-50/30 dark:has-[:checked]:bg-orange-900/10 has-[:checked]:shadow-md">
                                        <input type="radio" name="payment_method" value="cod" class="text-orange-500 focus:ring-orange-400 w-5 h-5 mt-1 self-start" checked>
                                        <div class="flex-1">
                                            <div class="flex items-center gap-2 mb-1">
                                                <p class="text-sm font-bold text-gray-900 dark:text-white">Bayar di Tempat (COD)</p>
                                                <span class="px-2 py-0.5 rounded text-[9px] font-bold uppercase tracking-wider bg-green-100 dark:bg-green-900/30 text-green-700 dark:text-green-400">Tunai</span>
                                            </div>
                                            <p class="text-xs text-gray-500 dark:text-gray-400">Bayar langsung dengan uang tunai saat pesanan diterima oleh Anda.</p>
                                        </div>
                                        <div class="text-3xl opacity-80 hidden sm:block">💵</div>
                                    </label>

                                    {{-- Virtual Account --}}
                                    <label class="flex items-center gap-4 bg-white dark:bg-gray-800 border-2 border-gray-200 dark:border-gray-700 rounded-2xl p-5 cursor-pointer transition-all hover:border-orange-300 dark:hover:border-orange-500/50 has-[:checked]:border-orange-500 has-[:checked]:bg-orange-50/30 dark:has-[:checked]:bg-orange-900/10 has-[:checked]:shadow-md">
                                        <input type="radio" name="payment_method" value="bank_transfer" class="text-orange-500 focus:ring-orange-400 w-5 h-5 mt-1 self-start">
                                        <div class="flex-1">
                                            <div class="flex items-center justify-between mb-1">
                                                <p class="text-sm font-bold text-gray-900 dark:text-white">Virtual Account (VA)</p>
                                                <span class="px-2 py-0.5 rounded text-[9px] font-bold uppercase tracking-wider bg-blue-100 dark:bg-blue-900/30 text-blue-700 dark:text-blue-400">Bank Transfer</span>
                                            </div>
                                            <p class="text-xs text-gray-500 dark:text-gray-400">Bayar otomatis via BCA, BNI, BRI, Mandiri, atau Permata VA.</p>
                                        </div>
                                        <div class="text-3xl opacity-80 hidden sm:block">🏦</div>
                                    </label>

                                    {{-- E-Wallet --}}
                                    <label class="flex items-center gap-4 bg-white dark:bg-gray-800 border-2 border-gray-200 dark:border-gray-700 rounded-2xl p-5 cursor-pointer transition-all hover:border-orange-300 dark:hover:border-orange-500/50 has-[:checked]:border-orange-500 has-[:checked]:bg-orange-50/30 dark:has-[:checked]:bg-orange-900/10 has-[:checked]:shadow-md">
                                        <input type="radio" name="payment_method" value="ewallet" class="text-orange-500 focus:ring-orange-400 w-5 h-5 mt-1 self-start">
                                        <div class="flex-1">
                                            <div class="flex items-center justify-between mb-1">
                                                <p class="text-sm font-bold text-gray-900 dark:text-white">E-Wallet</p>
                                                <span class="px-2 py-0.5 rounded text-[9px] font-bold uppercase tracking-wider bg-green-100 dark:bg-green-900/30 text-green-700 dark:text-green-400">GoPay & DANA</span>
                                            </div>
                                            <p class="text-xs text-gray-500 dark:text-gray-400">Bayar cepat dan mudah menggunakan saldo GoPay atau DANA.</p>
                                        </div>
                                        <div class="text-3xl opacity-80 hidden sm:block">📱</div>
                                    </label>
                                </div>


                            </div>

                            {{-- Catatan Tambahan --}}
                            <div class="bg-white dark:bg-gray-900 rounded-3xl border border-gray-100 dark:border-gray-800 p-6 shadow-sm">
                                <h3 class="text-sm font-extrabold text-gray-900 dark:text-white mb-3">Pesan untuk Warung (Opsional)</h3>
                                <textarea name="notes" rows="2" placeholder="Contoh: Sambalnya dipisah ya bu, atau tolong bungkusnya di dobel..."
                                          class="w-full bg-gray-50 dark:bg-gray-800 border border-gray-200 dark:border-gray-700 dark:text-white rounded-xl px-4 py-3 text-sm focus:bg-white dark:focus:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-orange-500/30 focus:border-orange-500 transition">{{ old('notes') }}</textarea>
                            </div>
                        </div>

                        {{-- STEP 4: Selesai / Review --}}
                        <div class="step-content hidden animate-fade-in" data-step-content="4">
                            <div class="bg-white dark:bg-gray-900 rounded-3xl border border-gray-100 dark:border-gray-800 p-6 sm:p-8 shadow-sm">
                                <div class="text-center mb-8">
                                    <div class="w-16 h-16 rounded-full bg-green-100 dark:bg-green-900/30 flex items-center justify-center mx-auto mb-4 text-green-500 dark:text-green-400">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                                        </svg>
                                    </div>
                                    <h3 class="text-2xl font-extrabold text-gray-900 dark:text-white">Periksa Pesananmu</h3>
                                    <p class="text-sm text-gray-500 dark:text-gray-400 mt-1">Pastikan semua data sudah benar sebelum membuat pesanan.</p>
                                </div>

                                <div class="bg-gray-50 dark:bg-gray-800 rounded-2xl border border-gray-200 dark:border-gray-700 overflow-hidden text-sm">
                                    <div class="p-5 border-b border-gray-200 dark:border-gray-700 flex items-start gap-4">
                                        <div class="w-10 h-10 rounded-full bg-white dark:bg-gray-700 border dark:border-gray-600 flex items-center justify-center text-gray-400 dark:text-gray-300 shadow-sm">👤</div>
                                        <div>
                                            <p class="text-xs text-gray-500 dark:text-gray-400 font-bold uppercase tracking-wider mb-1">Informasi Penerima</p>
                                            <p class="font-bold text-gray-900 dark:text-white text-base" id="reviewRecipient">-</p>
                                            <p class="text-gray-600 dark:text-gray-300 mt-1" id="reviewPhone">-</p>
                                            <p class="text-gray-600 dark:text-gray-300 mt-1 leading-relaxed" id="reviewAddress">-</p>
                                        </div>
                                    </div>

                                    <div class="grid grid-cols-2 divide-x divide-gray-200 dark:divide-gray-700">
                                        <div class="p-5">
                                            <p class="text-xs text-gray-500 dark:text-gray-400 font-bold uppercase tracking-wider mb-2">Pengiriman</p>
                                            <div class="flex items-center gap-2">
                                                <span class="text-lg">🚚</span>
                                                <p class="font-bold text-gray-900 dark:text-white" id="reviewDelivery">-</p>
                                            </div>
                                        </div>
                                        <div class="p-5">
                                            <p class="text-xs text-gray-500 dark:text-gray-400 font-bold uppercase tracking-wider mb-2">Pembayaran</p>
                                            <div class="flex items-center gap-2">
                                                <span class="text-lg">💳</span>
                                                <p class="font-bold text-gray-900 dark:text-white" id="reviewPayment">-</p>
                                            </div>
                                        </div>
                                    </div>

                                    @if ($appliedPromo)
                                        <div class="p-5 bg-green-50 dark:bg-green-900/10 border-t border-green-100 dark:border-green-900/30 flex items-center justify-between">
                                            <div class="flex items-center gap-2">
                                                <span class="text-lg">🏷️</span>
                                                <span class="font-bold text-green-800 dark:text-green-400 text-sm">Voucher Digunakan</span>
                                            </div>
                                            <span class="font-mono font-bold bg-green-200 dark:bg-green-800/50 text-green-800 dark:text-green-300 px-3 py-1 rounded-lg border border-green-300 dark:border-green-700/50">
                                                {{ $appliedPromo->code }}
                                            </span>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>

                    </div>

                    {{-- KANAN: Ringkasan Pesanan (4 kolom) --}}
                    <div class="lg:col-span-5 xl:col-span-4 space-y-6">

                        {{-- Box Voucher --}}
                        <div class="bg-white dark:bg-gray-900 rounded-3xl border border-gray-100 dark:border-gray-800 p-6 shadow-sm relative overflow-hidden group">
                            <div class="absolute -right-6 -top-6 w-24 h-24 bg-orange-50 dark:bg-orange-900/10 rounded-full blur-2xl group-hover:bg-orange-100 dark:group-hover:bg-orange-900/20 transition duration-500"></div>
                            
                            <div class="flex items-center justify-between mb-4 relative z-10">
                                <h4 class="font-extrabold text-gray-900 dark:text-white text-sm flex items-center gap-2">
                                    <span>🏷️</span> Punya Kupon Diskon?
                                </h4>
                                <a href="{{ route('promo') }}" target="_blank" class="text-[11px] text-orange-600 dark:text-orange-500 font-bold hover:underline bg-orange-50 dark:bg-orange-900/20 px-2 py-1 rounded-md">
                                    Cari Kupon
                                </a>
                            </div>

                            <div class="relative z-10">
                                @if ($appliedPromo)
                                    <div class="p-4 rounded-2xl bg-gradient-to-r from-emerald-50 to-green-50 dark:from-emerald-900/20 dark:to-green-900/20 border border-emerald-200 dark:border-emerald-800/50 relative">
                                        <div class="flex items-start justify-between">
                                            <div>
                                                <p class="text-xs font-bold text-emerald-800 dark:text-emerald-400 uppercase tracking-wider mb-1">Berhasil Dipakai</p>
                                                <p class="font-mono text-lg font-bold text-gray-900 dark:text-white">{{ $appliedPromo->code }}</p>
                                                <p class="text-[11px] font-bold text-emerald-600 dark:text-emerald-500 mt-1">
                                                    @if ($appliedPromo->type === 'free_shipping')
                                                        Gratis Ongkir!
                                                    @else
                                                        Hemat Rp {{ number_format($discount, 0, ',', '.') }}
                                                    @endif
                                                </p>
                                            </div>
                                            <button type="button" onclick="removePromoAjax()" class="w-8 h-8 rounded-full bg-white dark:bg-gray-800 border border-emerald-200 dark:border-emerald-700/50 flex items-center justify-center text-rose-500 hover:bg-rose-50 dark:hover:bg-rose-900/20 hover:border-rose-200 dark:hover:border-rose-700 transition shadow-sm" title="Hapus Promo">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                                                </svg>
                                            </button>
                                        </div>
                                    </div>
                                @else
                                    <div class="flex gap-2">
                                        <input type="text" id="promoInput" placeholder="Masukkan kode promo"
                                               class="w-full bg-gray-50 dark:bg-gray-800 border border-gray-200 dark:border-gray-700 dark:text-white rounded-xl px-4 py-2.5 text-sm font-mono uppercase focus:bg-white dark:focus:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-orange-500/30 focus:border-orange-500 transition">
                                        <button type="button" onclick="applyPromoAjax()" class="px-5 py-2.5 bg-gray-900 dark:bg-white hover:bg-gray-800 dark:hover:bg-gray-200 text-white dark:text-gray-900 text-sm font-bold rounded-xl transition shadow-sm">
                                            Gunakan
                                        </button>
                                    </div>
                                @endif
                                <p id="promoFeedback" class="text-xs font-medium hidden mt-2"></p>
                            </div>
                        </div>

                        {{-- Box Total Pembayaran --}}
                        <div class="bg-white dark:bg-gray-900 rounded-3xl border border-gray-100 dark:border-gray-800 p-6 shadow-sm sticky top-8">
                            <h3 class="font-extrabold text-gray-900 dark:text-white mb-5 flex items-center gap-2">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-gray-400 dark:text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 00-3 3h15.75m-12.75-3h11.218c1.121-2.3 1.885-3.79 2.435-4.812a1.125 1.125 0 00-.978-1.688H5.65m1.85 6.5L4.5 6.272M12 14.25h.008v.008H12v-.008z" />
                                </svg>
                                Detail Pesanan
                            </h3>

                            {{-- Item List --}}
                            <div class="space-y-4 mb-6 max-h-60 overflow-y-auto pr-2 scrollbar-thin scrollbar-thumb-gray-200 dark:scrollbar-thumb-gray-700">
                                @foreach ($cartItems as $item)
                                    <div class="flex items-start gap-3 group">
                                        <div class="w-12 h-12 rounded-xl bg-gray-50 dark:bg-gray-800 flex-shrink-0 overflow-hidden border border-gray-100 dark:border-gray-700 shadow-sm">
                                            @if ($item->product->image)
                                                <img src="{{ Storage::url($item->product->image) }}" class="w-full h-full object-cover group-hover:scale-110 transition duration-500">
                                            @endif
                                        </div>
                                        <div class="flex-1 min-w-0 pt-0.5">
                                            <p class="text-sm font-bold text-gray-800 dark:text-white truncate">{{ $item->product->name }}</p>
                                            <p class="text-xs text-gray-500 dark:text-gray-400 mt-0.5">{{ $item->quantity }} x Rp {{ number_format($item->product->price, 0, ',', '.') }}</p>
                                        </div>
                                        <span class="text-sm font-bold text-gray-900 dark:text-white pt-0.5">Rp {{ number_format($item->product->price * $item->quantity, 0, ',', '.') }}</span>
                                    </div>
                                @endforeach
                            </div>

                            {{-- Perhitungan Biaya --}}
                            <div class="border-t border-gray-100 dark:border-gray-800 pt-4 space-y-3 mb-6 text-sm">
                                <div class="flex justify-between text-gray-500 dark:text-gray-400 font-medium">
                                    <span>Subtotal Produk</span>
                                    <span class="text-gray-800 dark:text-gray-200" id="subtotalText">Rp {{ number_format($subtotal, 0, ',', '.') }}</span>
                                </div>
                                <div class="flex justify-between text-gray-500 dark:text-gray-400 font-medium">
                                    <span>Biaya Pengiriman</span>
                                    <span class="text-gray-800 dark:text-gray-200" id="shippingText">Rp {{ number_format($shippingCost, 0, ',', '.') }}</span>
                                </div>
                                <div class="flex justify-between text-emerald-600 dark:text-emerald-400 font-bold {{ $discount > 0 ? '' : 'hidden' }}" id="discountRow">
                                    <span>Potongan Diskon</span>
                                    <span id="discountText">- Rp {{ number_format($discount, 0, ',', '.') }}</span>
                                </div>
                            </div>

                            {{-- Grand Total --}}
                            <div class="border-t border-gray-200 dark:border-gray-700 pt-5 pb-6">
                                <div class="flex justify-between items-end">
                                    <div>
                                        <span class="block text-xs font-bold text-gray-400 dark:text-gray-500 uppercase tracking-wider mb-1">Total Bayar</span>
                                    </div>
                                    <div class="text-right">
                                        <span class="text-2xl font-extrabold text-orange-500 leading-none" id="totalText">
                                            Rp {{ number_format(max(0, $subtotal - $discount + $shippingCost), 0, ',', '.') }}
                                        </span>
                                    </div>
                                </div>
                            </div>

                            {{-- Navigasi Bawah --}}
                            <div class="flex flex-col gap-3">
                                <button type="button" id="nextBtn" onclick="nextStep()" class="w-full bg-gradient-to-r from-orange-500 to-orange-600 hover:from-orange-600 hover:to-orange-700 text-white py-3.5 rounded-xl text-sm font-extrabold transition-all duration-300 flex items-center justify-center gap-2 shadow-lg shadow-orange-500/25 hover:shadow-orange-500/40 hover:-translate-y-0.5">
                                    <span id="nextBtnText">Lanjut ke Pengiriman</span>
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M17 8l4 4m0 0l-4 4m4-4H3" />
                                    </svg>
                                </button>
                                
                                <button type="submit" id="submitBtn" class="hidden w-full bg-gradient-to-r from-orange-500 to-orange-600 hover:from-orange-600 hover:to-orange-700 text-white py-4 rounded-xl text-sm font-extrabold transition-all duration-300 flex items-center justify-center gap-2 shadow-lg shadow-orange-500/30 hover:shadow-orange-500/40 hover:-translate-y-0.5 ring-4 ring-orange-500/10">
                                    <span>Selesaikan Pesanan</span>
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12c0 4.97-4.03 9-9 9s-9-4.03-9-9 4.03-9 9-9 9 4.03 9 9z" />
                                    </svg>
                                </button>

                                <button type="button" id="backBtn" onclick="prevStep()" class="hidden w-full bg-white dark:bg-gray-800 border-2 border-gray-200 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-700 hover:border-gray-300 dark:hover:border-gray-600 text-gray-700 dark:text-gray-300 py-3 rounded-xl text-sm font-bold transition duration-200">
                                    Kembali ke Tahap Sebelumnya
                                </button>
                            </div>

                            <div id="validationError" class="hidden bg-rose-50 dark:bg-rose-900/20 text-rose-600 dark:text-rose-400 px-4 py-3 rounded-xl text-xs font-bold mt-4 flex items-center gap-2 border border-rose-100 dark:border-rose-900/50">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                                </svg>
                                <span>Mohon lengkapi form data yang wajib.</span>
                            </div>

                        </div>
                    </div>

                </div>
            </form>

        </div>
    </div>

    {{-- Script Animasi --}}
    <style>
        .animate-fade-in {
            animation: fadeIn 0.4s ease-out forwards;
        }
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(10px); }
            to { opacity: 1; transform: translateY(0); }
        }
        .scrollbar-thin::-webkit-scrollbar {
            width: 4px;
        }
        .scrollbar-thin::-webkit-scrollbar-track {
            background: #f1f5f9;
            border-radius: 4px;
        }
        .scrollbar-thin::-webkit-scrollbar-thumb {
            background: #cbd5e1;
            border-radius: 4px;
        }
    </style>

    <script>
        const baseShippingCost = {{ $shippingCost }};
        const subtotal = {{ $subtotal }};
        let currentDiscount = {{ $discount }};
        const promoType = "{{ $appliedPromo ? $appliedPromo->type : '' }}";
        const promoValue = {{ $appliedPromo ? $appliedPromo->discount_value : 0 }};
        const promoMax = {{ $appliedPromo && $appliedPromo->max_discount_amount ? $appliedPromo->max_discount_amount : 'null' }};
        
        let currentStep = 1;
        const totalSteps = 4;
        const nextLabels = {
            1: 'Lanjut ke Pengiriman',
            2: 'Lanjut ke Pembayaran',
            3: 'Lihat Konfirmasi Pesanan',
        };

        function formatRupiah(number) {
            return 'Rp ' + new Intl.NumberFormat('id-ID').format(Math.max(0, number));
        }

        function updateSummary() {
            const deliveryMethodInput = document.querySelector('input[name="delivery_method"]:checked');
            const method = deliveryMethodInput ? deliveryMethodInput.value : 'delivery';
            const shipping = method === 'delivery' ? baseShippingCost : 0;
            
            let discount = currentDiscount;
            if (promoType === 'free_shipping') {
                discount = shipping;
            }

            const total = Math.max(0, subtotal - discount + shipping);

            document.getElementById('shippingText').textContent = formatRupiah(shipping);
            
            const discRow = document.getElementById('discountRow');
            if (discount > 0) {
                discRow.classList.remove('hidden');
                document.getElementById('discountText').textContent = '- ' + formatRupiah(discount);
            } else {
                discRow.classList.add('hidden');
            }
            
            document.getElementById('totalText').textContent = formatRupiah(total);
            
            // Panggil ulang estimasi (apabila diubah dari delivery ke pickup atau sebaliknya)
            if (typeof calculateDeliveryTimeForCheckout === 'function') {
                calculateDeliveryTimeForCheckout();
            }
        }



        function validateStep(step) {
            if (step === 1) {
                const name = document.getElementById('recipient_name').value.trim();
                const phone = document.getElementById('phone').value.trim();
                const address = document.getElementById('shipping_address').value.trim();
                return name && phone && address;
            }
            return true;
        }

        function showStep(step) {
            // Sembunyikan semua konten, tampilkan yang aktif
            document.querySelectorAll('.step-content').forEach(el => {
                el.classList.add('hidden');
                if (parseInt(el.dataset.stepContent) === step) {
                    el.classList.remove('hidden');
                    // re-trigger animasi
                    el.style.animation = 'none';
                    el.offsetHeight; /* trigger reflow */
                    el.style.animation = null; 
                }
            });

            // Update UI Progress Bar
            document.querySelectorAll('.step-indicator').forEach(el => {
                const s = parseInt(el.dataset.step);
                const circle = el.querySelector('.step-circle');
                const label = el.querySelector('.step-label');
                
                if (s < step) {
                    circle.className = 'step-circle w-8 h-8 rounded-full bg-emerald-500 text-white text-sm font-bold flex items-center justify-center shadow-md shadow-emerald-500/20 transition-all';
                    circle.innerHTML = '<svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="3"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" /></svg>';
                    label.className = 'step-label text-[11px] sm:text-sm font-bold text-gray-800 transition-all';
                } else if (s === step) {
                    circle.className = 'step-circle w-8 h-8 rounded-full bg-orange-500 text-white text-sm font-bold flex items-center justify-center shadow-md shadow-orange-500/30 ring-4 ring-orange-500/20 transition-all';
                    circle.textContent = s;
                    label.className = 'step-label text-[11px] sm:text-sm font-extrabold text-orange-600 transition-all';
                } else {
                    circle.className = 'step-circle w-8 h-8 rounded-full bg-white border-2 border-gray-200 text-gray-400 text-sm font-bold flex items-center justify-center transition-all';
                    circle.textContent = s;
                    label.className = 'step-label text-[11px] sm:text-sm font-medium text-gray-400 transition-all';
                }
            });

            document.querySelectorAll('.step-line').forEach(el => {
                const l = parseInt(el.dataset.line);
                el.className = `flex-1 sm:w-16 h-1 rounded-full step-line relative -mx-4 sm:mx-0 transition-all duration-300 ${l < step ? 'bg-emerald-400' : 'bg-gray-100'}`;
            });

            // Atur tombol bawah
            document.getElementById('backBtn').classList.toggle('hidden', step === 1);
            document.getElementById('nextBtn').classList.toggle('hidden', step === totalSteps);
            document.getElementById('submitBtn').classList.toggle('hidden', step !== totalSteps);

            if (step < totalSteps) {
                document.getElementById('nextBtnText').textContent = nextLabels[step];
            }

            if (step === totalSteps) {
                fillReview();
            }

            document.getElementById('validationError').classList.add('hidden');
            
            // Scroll sedikit ke atas agar step indicator terlihat
            window.scrollTo({ top: 0, behavior: 'smooth' });
        }

        function nextStep() {
            if (!validateStep(currentStep)) {
                document.getElementById('validationError').classList.remove('hidden');
                
                // Animasi getar kecil pada alert error
                const errEl = document.getElementById('validationError');
                errEl.style.transform = 'translateX(5px)';
                setTimeout(() => errEl.style.transform = 'translateX(-5px)', 100);
                setTimeout(() => errEl.style.transform = 'translateX(5px)', 200);
                setTimeout(() => errEl.style.transform = 'translateX(0)', 300);
                return;
            }
            if (currentStep < totalSteps) {
                currentStep++;
                showStep(currentStep);
            }
        }

        function prevStep() {
            if (currentStep > 1) {
                currentStep--;
                showStep(currentStep);
            }
        }

        function fillReview() {
            document.getElementById('reviewRecipient').textContent = document.getElementById('recipient_name').value;
            document.getElementById('reviewPhone').textContent = document.getElementById('phone').value;
            
            const address = document.getElementById('shipping_address').value;
            const landmark = document.querySelector('input[name="landmark"]').value;
            document.getElementById('reviewAddress').innerHTML = `${address} ${landmark ? '<br><span class="text-xs text-orange-600 bg-orange-50 px-2 py-1 rounded mt-1 inline-block">Patokan: ' + landmark + '</span>' : ''}`;

            const deliveryMethod = document.querySelector('input[name="delivery_method"]:checked').value;
            document.getElementById('reviewDelivery').textContent = deliveryMethod === 'delivery' ? 'Antar ke Alamat' : 'Ambil di Tempat (Pickup)';

            const paymentMethod = document.querySelector('input[name="payment_method"]:checked').value;
            document.getElementById('reviewPayment').textContent = paymentMethod === 'cod' ? 'Bayar di Tempat (COD)' : (paymentMethod === 'bank_transfer' ? 'Virtual Account (VA)' : 'E-Wallet (GoPay/DANA)');
        }

        function applyPromoAjax() {
            const input = document.getElementById('promoInput');
            const code = input ? input.value.trim() : '';
            if (!code) return;

            const feedback = document.getElementById('promoFeedback');
            feedback.classList.remove('hidden', 'text-emerald-600', 'text-rose-500');
            feedback.classList.add('text-gray-500');
            feedback.textContent = 'Memeriksa promo...';

            fetch("{{ route('promo.apply') }}", {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'Accept': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify({ code: code })
            })
            .then(res => res.json().then(data => ({ status: res.status, body: data })))
            .then(({ status, body }) => {
                if (status === 200 && body.success) {
                    location.reload();
                } else {
                    feedback.className = 'text-[11px] font-bold text-rose-500 mt-2 block';
                    feedback.textContent = '❌ ' + (body.message || 'Kode promo tidak valid.');
                }
            })
            .catch(err => {
                feedback.className = 'text-[11px] font-bold text-rose-500 mt-2 block';
                feedback.textContent = '❌ Terjadi kesalahan jaringan.';
            });
        }

        function removePromoAjax() {
            fetch("{{ route('promo.remove') }}", {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'Accept': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                }
            })
            .then(() => location.reload())
            .catch(() => location.reload());
        }

        function getLocation() {
            if (navigator.geolocation) {
                const btnText = document.getElementById('btnLocationText');
                const originalText = btnText.innerText;
                btnText.innerText = 'Mencari lokasi...';
                
                navigator.geolocation.getCurrentPosition(async (position) => {
                    const lat = position.coords.latitude;
                    const lon = position.coords.longitude;
                    
                    try {
                        const response = await fetch(`https://nominatim.openstreetmap.org/reverse?format=json&lat=${lat}&lon=${lon}`);
                        const data = await response.json();
                        if (data && data.display_name) {
                            document.getElementById('shipping_address').value = data.display_name;
                        } else {
                            alert("Alamat spesifik tidak ditemukan. Silakan lengkapi manual.");
                        }
                    } catch (error) {
                        alert("Gagal mengambil alamat dari server. Silakan ketik manual.");
                    }
                    btnText.innerText = originalText;
                }, (error) => {
                    alert("Akses lokasi ditolak atau tidak tersedia. Pastikan GPS aktif dan izinkan browser mengakses lokasi.");
                    btnText.innerText = originalText;
                });
            } else {
                alert("Browser Anda tidak mendukung fitur lokasi.");
            }
        }

        function calculateDeliveryTimeForCheckout() {
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(
                    (position) => {
                        const method = document.querySelector('input[name="delivery_method"]:checked')?.value;
                        const textEl = document.getElementById('checkoutDeliveryTimeText');
                        if (!textEl) return;
                        
                        if (method === 'pickup') {
                            textEl.textContent = 'Sekitar 10 - 15 menit untuk disiapkan setelah pesanan dibuat';
                            return;
                        }

                        const warungLat = {{ $store_latitude }};
                        const warungLon = {{ $store_longitude }};
                        
                        const userLat = position.coords.latitude;
                        const userLon = position.coords.longitude;
                        
                        const R = 6371;
                        const dLat = (userLat - warungLat) * Math.PI / 180;
                        const dLon = (userLon - warungLon) * Math.PI / 180;
                        const a = Math.sin(dLat/2) * Math.sin(dLat/2) +
                                Math.cos(warungLat * Math.PI / 180) * Math.cos(userLat * Math.PI / 180) *
                                Math.sin(dLon/2) * Math.sin(dLon/2);
                        const c = 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1-a));
                        const distanceKm = R * c;
                        
                        const travelTime = Math.ceil(distanceKm * 3);
                        const prepTime = 10;
                        const totalTime = travelTime + prepTime;
                        
                        textEl.textContent = `Sekitar ${totalTime} - ${totalTime + 15} menit setelah konfirmasi pembayaran`;
                    },
                    (error) => {
                        const textEl = document.getElementById('checkoutDeliveryTimeText');
                        if (textEl) textEl.textContent = 'Sekitar 20 - 35 menit setelah konfirmasi pembayaran';
                    }
                );
            } else {
                const textEl = document.getElementById('checkoutDeliveryTimeText');
                if (textEl) textEl.textContent = 'Sekitar 20 - 35 menit setelah konfirmasi pembayaran';
            }
        }

        updateSummary();
        
        // Panggil estimasi waktu saat halaman dimuat
        document.addEventListener('DOMContentLoaded', () => {
            calculateDeliveryTimeForCheckout();
        });
    </script>

@endsection