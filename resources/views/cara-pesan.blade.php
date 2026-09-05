@extends('layouts.shop')

@section('title', 'Cara Pesan')

@section('content')

    {{-- Hero Banner --}}
    <section class="relative overflow-hidden bg-gray-900 py-20 text-white">
        <div class="absolute inset-0 opacity-20 bg-[radial-gradient(#f97316_1px,transparent_1px)] [background-size:16px_16px]"></div>
        <div class="absolute -right-20 -top-20 w-80 h-80 bg-orange-500 rounded-full blur-3xl opacity-20"></div>
        <div class="absolute -left-20 -bottom-20 w-80 h-80 bg-amber-500 rounded-full blur-3xl opacity-20"></div>

        <div class="relative z-10 max-w-4xl mx-auto px-6 text-center">
            <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-orange-500/20 border border-orange-500/30 text-orange-300 text-xs font-bold uppercase tracking-wider mb-4 backdrop-blur-md">
                <span>⚡ Mudahnya Kulineran</span>
            </div>
            <h1 class="text-4xl md:text-5xl font-black tracking-tight mb-4">
                Cara Pesan di <span class="text-transparent bg-clip-text bg-gradient-to-r from-orange-400 to-amber-300">WarungBuKarno</span>
            </h1>
            <p class="text-gray-300 text-base md:text-lg max-w-2xl mx-auto font-medium leading-relaxed">
                Nikmati hidangan lezat favoritmu langsung dari kenyamanan rumah hanya dalam 4 langkah praktis.
            </p>
        </div>
    </section>

    {{-- Steps Container --}}
    <div class="max-w-5xl mx-auto px-6 py-16">

        <div class="grid grid-cols-1 md:grid-cols-2 gap-8 relative">

            {{-- Step 1 --}}
            <div class="bg-white dark:bg-gray-900 rounded-3xl p-8 border border-gray-100 dark:border-gray-800 shadow-sm hover:shadow-xl hover:-translate-y-1 transition-all duration-300 relative group overflow-hidden">
                <div class="absolute top-0 right-0 w-24 h-24 bg-orange-50/50 dark:bg-orange-900/10 rounded-bl-full -z-0 group-hover:scale-110 transition-transform duration-500"></div>
                <div class="flex items-center justify-between mb-6 relative z-10">
                    <div class="w-14 h-14 rounded-2xl bg-orange-100 dark:bg-orange-900/30 text-orange-600 dark:text-orange-500 flex items-center justify-center text-2xl shadow-sm group-hover:scale-110 transition-transform">
                        👤
                    </div>
                    <span class="text-4xl font-black text-orange-500/20 group-hover:text-orange-500/40 transition-colors">01</span>
                </div>
                <h3 class="text-xl font-black text-gray-900 dark:text-white mb-2 relative z-10">Daftar atau Masuk Akun</h3>
                <p class="text-sm text-gray-500 dark:text-gray-400 leading-relaxed relative z-10">
                    Buat akun baru secara gratis atau masuk ke akun milikmu agar dapat melacak riwayat serta status pesanan secara *real-time*.
                </p>
                <div class="mt-6 pt-4 border-t border-gray-100 dark:border-gray-800 flex items-center text-xs font-bold text-orange-600 dark:text-orange-500 gap-1 group-hover:translate-x-1 transition-transform">
                    <span>Langkah Pertama</span>
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3" />
                    </svg>
                </div>
            </div>

            {{-- Step 2 --}}
            <div class="bg-white dark:bg-gray-900 rounded-3xl p-8 border border-gray-100 dark:border-gray-800 shadow-sm hover:shadow-xl hover:-translate-y-1 transition-all duration-300 relative group overflow-hidden">
                <div class="absolute top-0 right-0 w-24 h-24 bg-orange-50/50 dark:bg-orange-900/10 rounded-bl-full -z-0 group-hover:scale-110 transition-transform duration-500"></div>
                <div class="flex items-center justify-between mb-6 relative z-10">
                    <div class="w-14 h-14 rounded-2xl bg-orange-100 dark:bg-orange-900/30 text-orange-600 dark:text-orange-500 flex items-center justify-center text-2xl shadow-sm group-hover:scale-110 transition-transform">
                        🍱
                    </div>
                    <span class="text-4xl font-black text-orange-500/20 group-hover:text-orange-500/40 transition-colors">02</span>
                </div>
                <h3 class="text-xl font-black text-gray-900 dark:text-white mb-2 relative z-10">Pilih Menu & Gunakan Promo</h3>
                <p class="text-sm text-gray-500 dark:text-gray-400 leading-relaxed relative z-10">
                    Jelajahi sajian lezat kami, tambahkan hidangan favorit ke keranjang, lalu masukkan kode kupon promo untuk potongan ekstra.
                </p>
                <div class="mt-6 pt-4 border-t border-gray-100 dark:border-gray-800 flex items-center text-xs font-bold text-orange-600 dark:text-orange-500 gap-1 group-hover:translate-x-1 transition-transform">
                    <span>Pilih Favoritmu</span>
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3" />
                    </svg>
                </div>
            </div>

            {{-- Step 3 --}}
            <div class="bg-white dark:bg-gray-900 rounded-3xl p-8 border border-gray-100 dark:border-gray-800 shadow-sm hover:shadow-xl hover:-translate-y-1 transition-all duration-300 relative group overflow-hidden">
                <div class="absolute top-0 right-0 w-24 h-24 bg-orange-50/50 dark:bg-orange-900/10 rounded-bl-full -z-0 group-hover:scale-110 transition-transform duration-500"></div>
                <div class="flex items-center justify-between mb-6 relative z-10">
                    <div class="w-14 h-14 rounded-2xl bg-orange-100 dark:bg-orange-900/30 text-orange-600 dark:text-orange-500 flex items-center justify-center text-2xl shadow-sm group-hover:scale-110 transition-transform">
                        💳
                    </div>
                    <span class="text-4xl font-black text-orange-500/20 group-hover:text-orange-500/40 transition-colors">03</span>
                </div>
                <h3 class="text-xl font-black text-gray-900 dark:text-white mb-2 relative z-10">Checkout & Pilih Pembayaran</h3>
                <p class="text-sm text-gray-500 dark:text-gray-400 leading-relaxed relative z-10">
                    Lengkapi alamat pengiriman dengan jelas, pilih opsi antar atau pickup, serta tentukan metode bayar (Tunai COD atau Transfer Bank).
                </p>
                <div class="mt-6 pt-4 border-t border-gray-100 dark:border-gray-800 flex items-center text-xs font-bold text-orange-600 dark:text-orange-500 gap-1 group-hover:translate-x-1 transition-transform">
                    <span>Proses Transaksi</span>
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3" />
                    </svg>
                </div>
            </div>

            {{-- Step 4 --}}
            <div class="bg-white dark:bg-gray-900 rounded-3xl p-8 border border-gray-100 dark:border-gray-800 shadow-sm hover:shadow-xl hover:-translate-y-1 transition-all duration-300 relative group overflow-hidden">
                <div class="absolute top-0 right-0 w-24 h-24 bg-orange-50/50 dark:bg-orange-900/10 rounded-bl-full -z-0 group-hover:scale-110 transition-transform duration-500"></div>
                <div class="flex items-center justify-between mb-6 relative z-10">
                    <div class="w-14 h-14 rounded-2xl bg-emerald-100 dark:bg-emerald-900/30 text-emerald-600 dark:text-emerald-500 flex items-center justify-center text-2xl shadow-sm group-hover:scale-110 transition-transform">
                        🛵
                    </div>
                    <span class="text-4xl font-black text-emerald-500/20 group-hover:text-emerald-500/40 transition-colors">04</span>
                </div>
                <h3 class="text-xl font-black text-gray-900 dark:text-white mb-2 relative z-10">Santap & Nikmati</h3>
                <p class="text-sm text-gray-500 dark:text-gray-400 leading-relaxed relative z-10">
                    Kurir kami akan langsung mengantarkan sajian hangat ke lokasi tujuan. Cukup santai dan nikmati kelezatannya!
                </p>
                <div class="mt-6 pt-4 border-t border-gray-100 dark:border-gray-800 flex items-center text-xs font-bold text-emerald-600 dark:text-emerald-500 gap-1 group-hover:translate-x-1 transition-transform">
                    <span>Siap Dinikmati</span>
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3" />
                    </svg>
                </div>
            </div>

        </div>

        {{-- Call to action box --}}
        <div class="mt-16 bg-gradient-to-r from-gray-900 to-gray-800 rounded-3xl p-8 md:p-12 text-center text-white relative overflow-hidden shadow-2xl">
            <div class="absolute top-0 right-0 w-64 h-64 bg-orange-500 rounded-full blur-3xl opacity-20"></div>
            <div class="relative z-10 max-w-xl mx-auto">
                <span class="text-3xl mb-3 block">😋</span>
                <h3 class="text-2xl md:text-3xl font-black mb-3">Sudah Siap Memesan?</h3>
                <p class="text-gray-300 text-sm mb-8 font-medium">Pilih menu masakan favoritmu sekarang dan dapatkan potongan diskon spesial hari ini!</p>
                <a href="{{ url('/') }}#menu" class="inline-flex items-center gap-2 bg-gradient-to-r from-orange-500 to-orange-600 hover:from-orange-600 hover:to-orange-700 text-white px-8 py-4 rounded-xl text-sm font-black transition-all shadow-lg shadow-orange-500/30 hover:-translate-y-0.5">
                    Mulai Pilih Menu
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="3">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M17.25 8.25L21 12m0 0l-3.75 3.75M21 12H3" />
                    </svg>
                </a>
            </div>
        </div>

    </div>

@endsection