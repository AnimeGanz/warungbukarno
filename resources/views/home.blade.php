@extends('layouts.shop')

@section('title', 'Beranda')

@section('content')

    {{-- Hero Section (Premium UI) --}}
    <section class="relative overflow-hidden group">
        {{-- Background Image (Appetizing Indonesian Food) --}}
        <img src="https://images.unsplash.com/photo-1555939594-58d7cb561ad1?q=80&w=2000"
             alt="WarungBuKarno" 
             class="absolute inset-0 w-full h-full object-cover transform group-hover:scale-105 transition-transform duration-[20s] ease-out">
        
        {{-- Deep Gradient Overlay for text readability --}}
        <div class="absolute inset-0 bg-gradient-to-r from-gray-900/95 via-gray-900/80 to-transparent"></div>
        <div class="absolute inset-0 bg-gradient-to-t from-gray-900/90 via-transparent to-transparent"></div>

        <div class="relative z-10 max-w-7xl mx-auto px-6 py-24 md:py-32 flex flex-col items-start justify-center min-h-[500px]">
            <div class="inline-flex items-center gap-2 px-3 py-1.5 rounded-full {{ isset($store_status) && $store_status === 'offline' ? 'bg-rose-500/20 border-rose-500/30' : 'bg-orange-500/20 border-orange-500/30' }} backdrop-blur-md mb-6">
                @if(isset($store_status) && $store_status === 'offline')
                    <span class="w-2 h-2 rounded-full bg-rose-500"></span>
                    <span class="text-rose-300 text-xs font-bold tracking-wider uppercase">Tutup • Sedang Istirahat</span>
                @else
                    <span class="w-2 h-2 rounded-full bg-orange-500 animate-pulse"></span>
                    <span class="text-orange-300 text-xs font-bold tracking-wider uppercase">Buka • Siap Antar</span>
                @endif
            </div>
            
            <h1 class="text-4xl md:text-6xl font-black leading-tight text-white mb-6 max-w-2xl">
                Lapar? <br />
                <span class="text-transparent bg-clip-text bg-gradient-to-r from-orange-400 to-orange-500">WarungBuKarno</span> <br />Solusinya.
            </h1>
            
            <p class="text-gray-300 text-lg mb-10 max-w-xl font-medium leading-relaxed">
                Nikmati cita rasa Nusantara yang otentik. Hidangan hangat, harga bersahabat, diantar cepat langsung ke mejamu.
            </p>

            <div class="flex flex-col sm:flex-row items-center gap-4 w-full sm:w-auto">
                <a href="#menu" class="w-full sm:w-auto bg-gradient-to-r from-orange-500 to-orange-600 hover:from-orange-600 hover:to-orange-700 text-white px-8 py-4 rounded-xl text-sm font-extrabold transition-all duration-300 flex items-center justify-center gap-2 shadow-lg shadow-orange-500/25 hover:-translate-y-1">
                    Pesan Sekarang
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M17 8l4 4m0 0l-4 4m4-4H3" />
                    </svg>
                </a>
                <a href="{{ route('promo') }}" class="w-full sm:w-auto bg-white/10 hover:bg-white/20 text-white backdrop-blur-md border border-white/20 px-8 py-4 rounded-xl text-sm font-bold transition-all duration-300 flex items-center justify-center gap-2 hover:-translate-y-1">
                    <span>🏷️</span> Lihat Voucher Diskon
                </a>
            </div>
        </div>

        {{-- Smooth Bottom Curve --}}
        <svg class="absolute -bottom-1 left-0 w-full text-gray-50 drop-shadow-sm h-12 md:h-24" viewBox="0 0 1440 120" fill="currentColor" preserveAspectRatio="none">
            <path d="M0,60 C480,120 960,0 1440,60 L1440,120 L0,120 Z"></path>
        </svg>
    </section>

    {{-- Stats / Trust Indicators --}}
    <section class="bg-gray-50 dark:bg-gray-950/50 py-10">
        <div class="max-w-7xl mx-auto px-6">
            <div class="grid grid-cols-2 md:grid-cols-4 gap-8 divide-x divide-gray-200 dark:divide-gray-800">
                <div class="text-center px-4">
                    <p class="text-3xl font-black text-gray-900 dark:text-white mb-1">50+</p>
                    <p class="text-xs font-bold text-gray-500 dark:text-gray-400 uppercase tracking-wider">Menu Pilihan</p>
                </div>
                <div class="text-center px-4">
                    <p class="text-3xl font-black text-gray-900 dark:text-white mb-1">99%</p>
                    <p class="text-xs font-bold text-gray-500 uppercase tracking-wider">Pelanggan Puas</p>
                </div>
                <div class="text-center px-4">
                    <p class="text-3xl font-black text-gray-900 dark:text-white mb-1">~20m</p>
                    <p class="text-xs font-bold text-gray-500 dark:text-gray-400 uppercase tracking-wider">Estimasi Antar</p>
                </div>
                <div class="text-center px-4">
                    <p class="text-3xl font-black text-gray-900 dark:text-white mb-1 flex items-center justify-center gap-1">
                        4.9 <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-yellow-400" viewBox="0 0 20 20" fill="currentColor"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" /></svg>
                    </p>
                    <p class="text-xs font-bold text-gray-500 dark:text-gray-400 uppercase tracking-wider">Rating Warung</p>
                </div>
            </div>
        </div>
    </section>

    {{-- Cara Pesan Section (How to Order) --}}
    <section class="py-20 bg-white dark:bg-gray-900">
        <div class="max-w-7xl mx-auto px-6">
            <div class="text-center mb-16">
                <h2 class="text-3xl font-black text-gray-900 dark:text-white">Cara Pesan yang Praktis</h2>
                <p class="text-gray-500 dark:text-gray-400 mt-3 font-medium">Hanya butuh 3 langkah mudah untuk menikmati hidangan kami.</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-12 relative">
                {{-- Decorative Line (Desktop) --}}
                <div class="hidden md:block absolute top-12 left-1/6 right-1/6 h-0.5 bg-gradient-to-r from-orange-100 via-orange-300 to-orange-100 -z-10"></div>

                {{-- Step 1 --}}
                <div class="relative text-center group">
                    <div class="w-24 h-24 mx-auto bg-white dark:bg-gray-800 border-4 border-gray-50 dark:border-gray-900 rounded-full flex items-center justify-center mb-6 relative z-10 shadow-xl shadow-orange-500/10 group-hover:border-orange-100 transition-colors duration-300">
                        <span class="text-4xl group-hover:scale-110 transition-transform duration-300">📱</span>
                        <div class="absolute -top-2 -right-2 w-8 h-8 rounded-full bg-orange-500 text-white font-bold flex items-center justify-center border-2 border-white dark:border-gray-800 shadow-sm">1</div>
                    </div>
                    <h3 class="text-lg font-extrabold text-gray-900 dark:text-white mb-2">Pilih Menu Favorit</h3>
                    <p class="text-sm text-gray-500 dark:text-gray-400 leading-relaxed px-4">Jelajahi berbagai hidangan kami dan masukkan ke dalam keranjang belanja.</p>
                </div>

                {{-- Step 2 --}}
                <div class="relative text-center group">
                    <div class="w-24 h-24 mx-auto bg-white dark:bg-gray-800 border-4 border-gray-50 dark:border-gray-900 rounded-full flex items-center justify-center mb-6 relative z-10 shadow-xl shadow-orange-500/10 group-hover:border-orange-100 transition-colors duration-300">
                        <span class="text-4xl group-hover:scale-110 transition-transform duration-300">💳</span>
                        <div class="absolute -top-2 -right-2 w-8 h-8 rounded-full bg-orange-500 text-white font-bold flex items-center justify-center border-2 border-white dark:border-gray-800 shadow-sm">2</div>
                    </div>
                    <h3 class="text-lg font-extrabold text-gray-900 dark:text-white mb-2">Checkout & Bayar</h3>
                    <p class="text-sm text-gray-500 dark:text-gray-400 leading-relaxed px-4">Isi alamat, pilih metode pengiriman, gunakan voucher, dan pilih metode bayar.</p>
                </div>

                {{-- Step 3 --}}
                <div class="relative text-center group">
                    <div class="w-24 h-24 mx-auto bg-white dark:bg-gray-800 border-4 border-gray-50 dark:border-gray-900 rounded-full flex items-center justify-center mb-6 relative z-10 shadow-xl shadow-orange-500/10 group-hover:border-orange-100 transition-colors duration-300">
                        <span class="text-4xl group-hover:scale-110 transition-transform duration-300">🛵</span>
                        <div class="absolute -top-2 -right-2 w-8 h-8 rounded-full bg-orange-500 text-white font-bold flex items-center justify-center border-2 border-white dark:border-gray-800 shadow-sm">3</div>
                    </div>
                    <h3 class="text-lg font-extrabold text-gray-900 dark:text-white mb-2">Tunggu & Nikmati</h3>
                    <p class="text-sm text-gray-500 dark:text-gray-400 leading-relaxed px-4">Duduk manis, makanan hangat akan segera diantar ke depan pintumu.</p>
                </div>
            </div>
        </div>
    </section>

    {{-- Highlight Promo --}}
    @if($promos->count() > 0)
    <section class="py-16 bg-orange-50/50 dark:bg-gray-950/50 border-y border-orange-100 dark:border-gray-800 relative overflow-hidden">
        {{-- Background Decoration --}}
        <div class="absolute -right-20 -top-20 w-64 h-64 bg-orange-400 rounded-full blur-3xl opacity-10"></div>
        <div class="absolute -left-20 -bottom-20 w-64 h-64 bg-yellow-400 rounded-full blur-3xl opacity-10"></div>

        <div class="max-w-7xl mx-auto px-6 relative z-10">
            <div class="flex flex-col sm:flex-row items-center justify-between mb-10 gap-4">
                <div>
                    <h2 class="text-2xl font-black text-gray-900 dark:text-white flex items-center gap-2">
                        <span class="text-2xl">🔥</span> Promo Menarik Hari Ini
                    </h2>
                    <p class="text-gray-500 dark:text-gray-400 mt-1 font-medium text-sm">Gunakan kode ini saat checkout untuk mendapatkan potongan harga!</p>
                </div>
                <a href="{{ route('promo') }}" class="text-sm font-bold text-orange-600 hover:text-orange-700 bg-white dark:bg-gray-800 px-5 py-2.5 rounded-xl shadow-sm border border-orange-100 dark:border-gray-700 transition hover:-translate-y-0.5">
                    Lihat Semua Promo
                </a>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($promos as $promo)
                <div class="bg-white dark:bg-gray-900 rounded-2xl border-2 border-dashed border-orange-200 dark:border-gray-700 p-6 flex flex-col justify-between hover:border-orange-400 dark:hover:border-orange-500 transition-colors group relative overflow-hidden">
                    <div class="absolute top-0 right-0 w-24 h-24 bg-orange-50 dark:bg-orange-900/10 rounded-bl-full -z-10 transition-transform group-hover:scale-110"></div>
                    <div>
                        <div class="inline-block px-3 py-1 bg-green-100 dark:bg-green-900/30 text-green-700 dark:text-green-400 rounded-lg text-xs font-bold uppercase tracking-wider mb-3">
                            {{ $promo->type === 'free_shipping' ? 'Gratis Ongkir' : 'Diskon Spesial' }}
                        </div>
                        <h3 class="text-lg font-extrabold text-gray-900 dark:text-white mb-1">{{ $promo->title }}</h3>
                        <p class="text-sm text-gray-500 dark:text-gray-400 line-clamp-2 mb-4">{{ $promo->description }}</p>
                    </div>
                    
                    <div class="mt-4 pt-4 border-t border-gray-100 dark:border-gray-800 flex items-center justify-between gap-3 bg-gray-50 dark:bg-gray-800/50 -mx-6 -mb-6 p-4">
                        <div class="flex-1 font-mono font-bold text-orange-600 dark:text-orange-400 text-lg text-center tracking-widest border border-orange-200 dark:border-gray-700 bg-white dark:bg-gray-900 py-2 rounded-xl">
                            {{ $promo->code }}
                        </div>
                        <button onclick="copyPromo('{{ $promo->code }}')" class="bg-gray-900 hover:bg-gray-800 dark:bg-white dark:hover:bg-gray-200 dark:text-gray-900 text-white p-2.5 rounded-xl transition" title="Salin Kode">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z" />
                            </svg>
                        </button>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    @endif

    {{-- Menu Favorit --}}
    <section id="menu" class="bg-gray-50 dark:bg-gray-950 py-20">
        <div class="max-w-7xl mx-auto px-6">

            <div class="text-center mb-12">
                <h2 class="text-3xl font-black text-gray-900 dark:text-white mb-3">Menu Spesial Kami</h2>
                <p class="text-gray-500 dark:text-gray-400 font-medium max-w-xl mx-auto">Diramu dengan bumbu pilihan dan resep rahasia keluarga, siap memanjakan lidah Anda hari ini.</p>
            </div>

            {{-- Filter & Search Action Bar --}}
            <div class="bg-white dark:bg-gray-900 p-3 rounded-2xl shadow-sm border border-gray-200 dark:border-gray-700 flex flex-col md:flex-row items-center justify-between gap-4 mb-10">
                
                {{-- Categories --}}
                <div class="flex items-center gap-2 overflow-x-auto w-full md:w-auto pb-2 md:pb-0 scrollbar-hide">
                    <a href="{{ route('home', array_filter(['search' => request('search')])) }}#menu"
                       class="flex-shrink-0 px-5 py-2.5 rounded-xl text-sm font-bold transition {{ !request('category') ? 'bg-gray-900 dark:bg-white text-white dark:text-gray-900 shadow-md' : 'bg-gray-50 dark:bg-gray-800 text-gray-600 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700' }}">
                        Semua Menu
                    </a>
                    @foreach ($categories as $category)
                        <a href="{{ route('home', array_filter(['category' => $category->id, 'search' => request('search')])) }}#menu"
                           class="flex-shrink-0 px-5 py-2.5 rounded-xl text-sm font-bold transition {{ request('category') == $category->id ? 'bg-gray-900 dark:bg-white text-white dark:text-gray-900 shadow-md' : 'bg-gray-50 dark:bg-gray-800 text-gray-600 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700' }}">
                            {{ $category->name }}
                        </a>
                    @endforeach
                </div>

                {{-- Search --}}
                <form action="{{ route('home') }}#menu" method="GET" class="w-full md:w-80 relative">
                    @if(request('category'))
                        <input type="hidden" name="category" value="{{ request('category') }}">
                    @endif
                    <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari makanan..." 
                           class="w-full bg-gray-50 dark:bg-gray-800 border border-gray-200 dark:border-gray-700 text-gray-900 dark:text-white rounded-xl pl-11 pr-4 py-3 text-sm focus:outline-none focus:bg-white dark:focus:bg-gray-700 focus:ring-2 focus:ring-orange-500/20 focus:border-orange-500 transition">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-gray-400 absolute left-4 top-1/2 -translate-y-1/2" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                </form>

            </div>

            {{-- Indikator Pencarian Aktif --}}
            @if (request('search') || request('category'))
                <div class="flex items-center justify-between bg-orange-100 text-orange-800 rounded-xl px-5 py-4 mb-8 shadow-sm">
                    <p class="text-sm font-medium flex items-center gap-2">
                        <span>🔍</span> Menampilkan hasil filter untuk menu 
                        @if(request('search')) <span class="font-bold">"{{ request('search') }}"</span> @endif
                        @if(request('search') && request('category')) dan @endif
                        @if(request('category')) kategori pilihan @endif
                    </p>
                    <a href="{{ route('home') }}#menu" class="text-xs font-extrabold bg-white px-3 py-1.5 rounded-lg shadow-sm hover:shadow transition">
                        Tampilkan Semua
                    </a>
                </div>
            @endif

            {{-- Grid Produk --}}
            <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 gap-4 md:gap-6">
                @forelse ($products as $product)
                    <div onclick="openProductDetailsModal({{ $product->id }}, '{{ addslashes($product->name) }}', '{{ $product->image ? Storage::url($product->image) : '' }}', '{{ addslashes($product->description) }}', {{ $product->price }}, {{ $product->stock ?? 0 }}, '{{ $product->category ? $product->category->name : '' }}')" class="bg-white dark:bg-gray-900 rounded-3xl border border-gray-100 dark:border-gray-800 shadow-sm hover:shadow-xl dark:hover:shadow-gray-900 hover:-translate-y-1 transition-all duration-300 group flex flex-col justify-between overflow-hidden relative cursor-pointer">
                        
                        {{-- Tag Tersedia --}}
                        <div class="absolute top-3 left-3 z-10 flex gap-1.5">
                            @if ($product->category)
                                <span class="bg-white/90 dark:bg-gray-900/90 backdrop-blur-md text-gray-900 dark:text-gray-100 text-[10px] font-extrabold px-2.5 py-1 rounded-full shadow-sm border dark:border-gray-700">
                                    {{ $product->category->name }}
                                </span>
                            @endif
                        </div>

                        {{-- Product Image with Overlay effect --}}
                        <div class="aspect-[4/3] bg-gray-100 relative overflow-hidden">
                            @if ($product->image)
                                <img src="{{ Storage::url($product->image) }}" 
                                     alt="{{ $product->name }}" 
                                     class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                                <div class="absolute inset-0 bg-gradient-to-t from-black/40 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                            @else
                                <div class="w-full h-full flex flex-col items-center justify-center text-gray-400 text-xs bg-gray-50 gap-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 text-gray-300" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 15.75l5.159-5.159a2.25 2.25 0 013.182 0l5.159 5.159m-1.5-1.5l1.409-1.409a2.25 2.25 0 013.182 0l2.909 2.909m-18 3.75h16.5a1.5 1.5 0 001.5-1.5V6a1.5 1.5 0 00-1.5-1.5H3.75A1.5 1.5 0 002.25 6v12a1.5 1.5 0 001.5 1.5zm10.5-11.25h.008v.008h-.008V8.25zm.375 0a.375.375 0 11-.75 0 .375.375 0 01.75 0z" />
                                    </svg>
                                </div>
                            @endif
                        </div>

                        <div class="p-5 flex flex-col justify-between flex-1 relative bg-white dark:bg-gray-900">
                            <div>
                                <h3 class="font-extrabold text-gray-900 dark:text-white text-base mb-1.5 line-clamp-2 leading-snug group-hover:text-orange-600 transition-colors" title="{{ $product->name }}">
                                    {{ $product->name }}
                                </h3>
                                @if($product->reviews_count > 0)
                                    <button onclick="event.stopPropagation(); openProductReviewsModal({{ $product->id }}, '{{ addslashes($product->name) }}')" class="flex items-center gap-1 mb-2 hover:bg-orange-50 dark:hover:bg-gray-800 px-2 py-1 -ml-2 rounded-lg transition-colors text-left relative z-20">
                                        <span class="text-yellow-400 text-xs">★</span>
                                        <span class="text-xs font-bold text-gray-700 dark:text-gray-300">{{ number_format($product->average_rating, 1) }}</span>
                                        <span class="text-[10px] text-gray-400 hover:text-orange-500 hover:underline">({{ $product->reviews_count }} ulasan)</span>
                                    </button>
                                @endif
                                @if ($product->description)
                                    <p class="text-xs text-gray-500 dark:text-gray-400 line-clamp-2 mb-4 leading-relaxed" title="{{ $product->description }}">
                                        {{ $product->description }}
                                    </p>
                                @endif
                            </div>

                            <div class="flex items-end justify-between pt-3 mt-auto">
                                <div>
                                    <span class="block text-[10px] font-bold text-gray-400 uppercase tracking-wider mb-0.5">Harga</span>
                                    <span class="font-black text-orange-600 text-lg">
                                        Rp {{ number_format($product->price, 0, ',', '.') }}
                                    </span>
                                </div>
                                <form action="{{ route('cart.add', $product) }}" method="POST" onclick="event.stopPropagation();" class="relative z-20">
                                    @csrf
                                    <button type="submit" 
                                            class="w-10 h-10 rounded-xl bg-gray-900 dark:bg-white hover:bg-orange-500 dark:hover:bg-orange-500 text-white dark:text-gray-900 hover:text-white flex items-center justify-center transition-colors duration-300 shadow-md hover:shadow-orange-500/30"
                                            title="Tambah ke Keranjang">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" />
                                        </svg>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-span-full flex flex-col items-center justify-center py-20 bg-white dark:bg-gray-900 rounded-3xl border border-dashed border-gray-300 dark:border-gray-700 text-center">
                        <div class="w-20 h-20 bg-gray-50 dark:bg-gray-800 rounded-full flex items-center justify-center mb-4">
                            <span class="text-4xl">🍽️</span>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-2">Belum ada menu di sini</h3>
                        <p class="text-gray-500 dark:text-gray-400 mb-6 max-w-sm">Maaf, kami tidak menemukan menu yang sesuai dengan pencarian Anda saat ini.</p>
                        <a href="{{ route('home') }}#menu" class="bg-gray-900 dark:bg-white text-white dark:text-gray-900 px-6 py-3 rounded-xl font-bold hover:bg-gray-800 transition">
                            Lihat Semua Menu
                        </a>
                    </div>
                @endforelse
            </div>

        </div>
    </section>

    {{-- Script Salin Promo --}}
    <script>
        function copyPromo(code) {
            navigator.clipboard.writeText(code).then(() => {
                alert('Kode promo ' + code + ' berhasil disalin!');
            });
        }
    </script>

    <style>
        .scrollbar-hide::-webkit-scrollbar {
            display: none;
        }
        .scrollbar-hide {
            -ms-overflow-style: none;
            scrollbar-width: none;
        }
    </style>

    {{-- Product Reviews Modal --}}
    <div id="productReviewsModal" class="fixed inset-0 bg-gray-900/80 backdrop-blur-sm hidden items-center justify-center z-50 px-4 transition-all opacity-0">
        <div class="bg-white dark:bg-gray-900 rounded-3xl w-full max-w-lg shadow-2xl relative max-h-[80vh] flex flex-col overflow-hidden">
            {{-- Modal Header --}}
            <div class="p-6 border-b border-gray-100 dark:border-gray-800 flex items-center justify-between bg-white dark:bg-gray-900 z-10 relative">
                <div>
                    <h4 class="text-xl font-black text-gray-900 dark:text-white mb-1">Ulasan Pelanggan</h4>
                    <p class="text-sm text-gray-500 dark:text-gray-400 font-medium" id="modalProductName">Loading...</p>
                </div>
                <button onclick="closeProductReviewsModal()" class="w-10 h-10 rounded-full bg-gray-100 dark:bg-gray-800 hover:bg-gray-200 dark:hover:bg-gray-700 flex items-center justify-center text-gray-500 dark:text-gray-400 transition-colors">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>

            {{-- Reviews List --}}
            <div class="p-6 overflow-y-auto flex-1 bg-gray-50/50" id="reviewsListContainer">
                <div class="flex justify-center items-center h-32">
                    <span class="w-8 h-8 rounded-full border-4 border-orange-500 border-t-transparent animate-spin"></span>
                </div>
            </div>
        </div>
    </div>

    {{-- Product Details Modal (Popup Info Makanan) --}}
    <div id="productDetailsModal" class="fixed inset-0 bg-gray-900/80 backdrop-blur-sm hidden items-center justify-center z-[60] px-4 transition-all opacity-0">
        <div class="bg-white dark:bg-gray-900 rounded-3xl w-full max-w-md shadow-2xl relative overflow-hidden transform transition-transform scale-95 duration-300 ease-out" id="productDetailsContent">
            
            {{-- Tombol Close X --}}
            <button onclick="closeProductDetailsModal()" class="absolute top-4 right-4 z-20 w-10 h-10 rounded-full bg-black/40 hover:bg-black/60 backdrop-blur-md flex items-center justify-center text-white transition-colors">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>

            {{-- Gambar Header --}}
            <div class="relative h-64 w-full bg-gray-100 dark:bg-gray-800">
                <img id="modalDetailImage" src="" alt="Menu Image" class="w-full h-full object-cover">
                <div class="absolute inset-0 bg-gradient-to-t from-gray-900/90 via-transparent to-transparent"></div>
                <div class="absolute bottom-4 left-6">
                    <span id="modalDetailCategory" class="bg-white/20 backdrop-blur-md text-white text-[10px] font-extrabold px-3 py-1.5 rounded-full shadow-sm border border-white/30 uppercase tracking-wider">Kategori</span>
                </div>
            </div>

            {{-- Detail Info --}}
            <div class="p-6">
                <h3 id="modalDetailName" class="text-2xl font-black text-gray-900 dark:text-white mb-2 leading-tight">Nama Menu</h3>
                
                <div class="flex items-center justify-between mb-4 pb-4 border-b border-gray-100 dark:border-gray-800">
                    <span id="modalDetailPrice" class="font-black text-orange-600 text-3xl">Rp 0</span>
                    <div class="flex flex-col items-end">
                        <span class="text-[10px] font-bold text-gray-400 uppercase tracking-wider mb-0.5">Sisa Stok</span>
                        <span id="modalDetailStock" class="bg-gray-100 dark:bg-gray-800 text-gray-700 dark:text-gray-300 text-sm font-extrabold px-3 py-1 rounded-lg">0 Porsi</span>
                    </div>
                </div>

                <div class="mb-6">
                    <h4 class="text-sm font-bold text-gray-900 dark:text-white mb-2">Deskripsi Menu:</h4>
                    <p id="modalDetailDescription" class="text-sm text-gray-500 dark:text-gray-400 leading-relaxed min-h-[60px]">Tidak ada deskripsi.</p>
                </div>

                {{-- Add to Cart Form di dalam Modal --}}
                <form id="modalDetailForm" method="POST" action="">
                    @csrf
                    <button type="submit" class="w-full bg-gradient-to-r from-orange-500 to-orange-600 hover:from-orange-600 hover:to-orange-700 text-white font-extrabold py-4 rounded-xl shadow-lg shadow-orange-500/30 transition-all hover:-translate-y-1 flex justify-center items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                        </svg>
                        Pesan Sekarang
                    </button>
                </form>
            </div>
        </div>
    </div>

    <script>
        function openProductReviewsModal(productId, productName) {
            document.getElementById('modalProductName').innerText = productName;
            const container = document.getElementById('reviewsListContainer');
            
            // Show loading state
            container.innerHTML = `
                <div class="flex flex-col justify-center items-center h-32 gap-3 text-gray-400">
                    <span class="w-8 h-8 rounded-full border-4 border-orange-500 border-t-transparent animate-spin"></span>
                    <span class="text-sm font-semibold">Memuat ulasan...</span>
                </div>
            `;
            
            const modal = document.getElementById('productReviewsModal');
            modal.classList.remove('hidden');
            modal.classList.add('flex');
            setTimeout(() => { modal.classList.remove('opacity-0'); }, 10);

            // Fetch reviews via API
            fetch(`/products/${productId}/reviews`)
                .then(res => res.json())
                .then(data => {
                    if (data.length === 0) {
                        container.innerHTML = `
                            <div class="text-center py-10 text-gray-500">
                                <span class="text-4xl mb-3 block">🍽️</span>
                                <p class="font-bold">Belum ada ulasan</p>
                                <p class="text-xs">Jadilah yang pertama me-review menu ini!</p>
                            </div>
                        `;
                        return;
                    }

                    let html = '<div class="space-y-4">';
                    data.forEach(review => {
                        let stars = '';
                        for(let i=1; i<=5; i++) {
                            stars += `<span class="text-lg ${i <= review.rating ? 'text-yellow-400' : 'text-gray-200'}">★</span>`;
                        }

                        const avatarHtml = review.user_avatar 
                            ? `<img src="${review.user_avatar}" class="w-full h-full object-cover">`
                            : `<span class="text-xs font-bold text-gray-600">${review.user_initials}</span>`;

                        html += `
                            <div class="bg-white dark:bg-gray-800 p-4 rounded-2xl border border-gray-100 dark:border-gray-700 shadow-sm">
                                <div class="flex justify-between items-start mb-3">
                                    <div class="flex items-center gap-3">
                                        <div class="w-10 h-10 rounded-full bg-gray-100 dark:bg-gray-700 flex items-center justify-center overflow-hidden border border-gray-200 dark:border-gray-600">
                                            ${avatarHtml}
                                        </div>
                                        <div>
                                            <p class="text-sm font-bold text-gray-900 dark:text-white">${review.user_name}</p>
                                            <p class="text-[10px] text-gray-400 font-medium">${review.date}</p>
                                        </div>
                                    </div>
                                    <div class="flex">${stars}</div>
                                </div>
                                ${review.comment ? `<p class="text-sm text-gray-600 dark:text-gray-300 leading-relaxed bg-gray-50 dark:bg-gray-900 p-3 rounded-xl">${review.comment}</p>` : ''}
                            </div>
                        `;
                    });
                    html += '</div>';
                    container.innerHTML = html;
                })
                .catch(err => {
                    console.error(err);
                    container.innerHTML = `<div class="text-center text-red-500 py-10 font-bold">Gagal memuat ulasan.</div>`;
                });
        }

        function closeProductReviewsModal() {
            const modal = document.getElementById('productReviewsModal');
            modal.classList.add('opacity-0');
            setTimeout(() => {
                modal.classList.add('hidden');
                modal.classList.remove('flex');
            }, 200);
        }

        // Script Modal Detail Produk
        function formatRupiah(angka) {
            return new Intl.NumberFormat('id-ID', { style: 'currency', currency: 'IDR', minimumFractionDigits: 0 }).format(angka);
        }

        function openProductDetailsModal(id, name, image, description, price, stock, category) {
            document.getElementById('modalDetailName').innerText = name;
            document.getElementById('modalDetailDescription').innerText = description || 'Tidak ada deskripsi untuk menu ini.';
            document.getElementById('modalDetailPrice').innerText = formatRupiah(price);
            document.getElementById('modalDetailStock').innerText = stock + ' Porsi';
            document.getElementById('modalDetailCategory').innerText = category || 'Menu';
            
            const imageEl = document.getElementById('modalDetailImage');
            if(image) {
                imageEl.src = image;
                imageEl.classList.remove('hidden');
            } else {
                imageEl.src = 'https://images.unsplash.com/photo-1555939594-58d7cb561ad1?q=80&w=2000'; // Default placeholder
            }

            // Update action URL form keranjang
            const form = document.getElementById('modalDetailForm');
            form.action = `/cart/${id}`;

            const modal = document.getElementById('productDetailsModal');
            const content = document.getElementById('productDetailsContent');
            
            modal.classList.remove('hidden');
            modal.classList.add('flex');
            
            // Animasi masuk (Scale & Opacity)
            setTimeout(() => { 
                modal.classList.remove('opacity-0'); 
                content.classList.remove('scale-95');
                content.classList.add('scale-100');
            }, 10);
        }

        function closeProductDetailsModal() {
            const modal = document.getElementById('productDetailsModal');
            const content = document.getElementById('productDetailsContent');
            
            modal.classList.add('opacity-0');
            content.classList.remove('scale-100');
            content.classList.add('scale-95');
            
            setTimeout(() => {
                modal.classList.add('hidden');
                modal.classList.remove('flex');
            }, 300);
        }

        // Close modal jika ngeklik di luar area konten modal
        document.getElementById('productDetailsModal').addEventListener('click', function(e) {
            if (e.target === this) closeProductDetailsModal();
        });
        document.getElementById('productReviewsModal').addEventListener('click', function(e) {
            if (e.target === this) closeProductReviewsModal();
        });
    </script>

@endsection