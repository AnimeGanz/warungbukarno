@extends('layouts.shop')

@section('title', 'Promo Spesial')

@section('content')

    {{-- Hero Section --}}
    <section class="bg-gradient-to-br from-gray-950 via-gray-900 to-gray-900 py-16 text-center relative overflow-hidden">
        <div class="absolute inset-0 opacity-10 bg-[radial-gradient(#f97316_1px,transparent_1px)] [background-size:16px_16px]"></div>
        <div class="max-w-3xl mx-auto px-6 relative z-10">
            <span class="inline-flex items-center gap-1.5 px-3.5 py-1.5 rounded-full bg-orange-500/10 border border-orange-500/30 text-orange-400 text-xs font-semibold tracking-wide uppercase mb-4">
                🎉 Penawaran Terbatas
            </span>
            <h1 class="text-3xl sm:text-4xl font-extrabold text-white tracking-tight mb-3">
                Promo Spesial <span class="text-orange-500">WarungBuKarno</span>
            </h1>
            <p class="text-gray-400 text-sm sm:text-base max-w-xl mx-auto">
                Nikmati beragam potongan harga, gratis ongkir, dan penawaran terbaik khusus untuk pesanan makanan favoritmu!
            </p>
        </div>
    </section>

    <div class="max-w-6xl mx-auto px-6 py-12">

        {{-- Toast / Alert Notification if any --}}
        @if (session('error'))
            <div class="mb-8 p-4 rounded-2xl bg-red-50 border border-red-200 text-red-700 text-sm flex items-center justify-between shadow-sm">
                <div class="flex items-center gap-3">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-red-500 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m9-.75a9 9 0 11-18 0 9 9 0 0118 0zm-9 3.75h.008v.008H12v-.008z" />
                    </svg>
                    <span>{{ session('error') }}</span>
                </div>
            </div>
        @endif

        @if (session('applied_promo_code'))
            <div class="mb-8 p-4 sm:p-5 rounded-2xl bg-gradient-to-r from-orange-500/10 via-orange-500/5 to-transparent border border-orange-200 dark:border-orange-900/50 flex flex-col sm:flex-row sm:items-center justify-between gap-4">
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 rounded-xl bg-orange-500 text-white flex items-center justify-center flex-shrink-0 font-bold">
                        🎁
                    </div>
                    <div>
                        <p class="text-xs text-orange-600 dark:text-orange-400 font-semibold uppercase tracking-wider">Voucher Sedang Aktif</p>
                        <p class="text-sm font-bold text-gray-800 dark:text-white">
                            Kode <span class="font-mono text-orange-600 dark:text-orange-400 bg-orange-100 dark:bg-orange-900/30 px-2 py-0.5 rounded">{{ session('applied_promo_code') }}</span> sedang terpasang untuk pesananmu.
                        </p>
                    </div>
                </div>
                <div class="flex items-center gap-2">
                    <a href="{{ route('cart.index') }}" class="px-4 py-2 bg-orange-500 hover:bg-orange-600 text-white text-xs font-semibold rounded-xl transition shadow-sm">
                        Ke Keranjang →
                    </a>
                    <form action="{{ route('promo.remove') }}" method="POST">
                        @csrf
                        <button type="submit" class="px-3.5 py-2 bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-700 text-gray-600 dark:text-gray-300 text-xs font-medium rounded-xl transition">
                            Lepas
                        </button>
                    </form>
                </div>
            </div>
        @endif

        {{-- Filter Tabs --}}
        <div class="flex items-center justify-center sm:justify-start gap-2 mb-8 overflow-x-auto pb-2">
            <button onclick="filterPromos('all')" class="filter-btn active px-4 py-2 rounded-xl text-xs sm:text-sm font-semibold transition border bg-orange-500 text-white border-orange-500" data-filter="all">
                Semua Promo
            </button>
            <button onclick="filterPromos('percent')" class="filter-btn px-4 py-2 rounded-xl text-xs sm:text-sm font-medium transition border text-gray-600 dark:text-gray-300 border-gray-200 dark:border-gray-700 hover:border-orange-300 dark:hover:border-orange-500/50 bg-white dark:bg-gray-800" data-filter="percent">
                🏷️ Diskon Persen
            </button>
            <button onclick="filterPromos('fixed_amount')" class="filter-btn px-4 py-2 rounded-xl text-xs sm:text-sm font-medium transition border text-gray-600 dark:text-gray-300 border-gray-200 dark:border-gray-700 hover:border-orange-300 dark:hover:border-orange-500/50 bg-white dark:bg-gray-800" data-filter="fixed_amount">
                💵 Potongan Nominal
            </button>
            <button onclick="filterPromos('free_shipping')" class="filter-btn px-4 py-2 rounded-xl text-xs sm:text-sm font-medium transition border text-gray-600 dark:text-gray-300 border-gray-200 dark:border-gray-700 hover:border-orange-300 dark:hover:border-orange-500/50 bg-white dark:bg-gray-800" data-filter="free_shipping">
                🚚 Gratis Ongkir
            </button>
        </div>

        {{-- Grid Promo Cards --}}
        @if ($promos->isEmpty())
            <div class="bg-white dark:bg-gray-900 rounded-3xl border border-gray-100 dark:border-gray-800 p-12 text-center shadow-sm">
                <div class="w-16 h-16 rounded-2xl bg-orange-50 dark:bg-orange-900/30 text-orange-500 flex items-center justify-center mx-auto mb-4 text-2xl">
                    🏷️
                </div>
                <h3 class="text-lg font-bold text-gray-800 dark:text-white mb-1">Belum Ada Promo Aktif</h3>
                <p class="text-sm text-gray-500 dark:text-gray-400 max-w-md mx-auto mb-6">
                    Nantikan penawaran menarik berikutnya dari WarungBuKarno.
                </p>
                <a href="{{ route('home') }}" class="inline-flex items-center gap-2 px-5 py-2.5 bg-orange-500 hover:bg-orange-600 text-white text-sm font-semibold rounded-xl transition shadow-sm">
                    Lihat Menu Makanan
                </a>
            </div>
        @else
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6" id="promoContainer">
                @foreach ($promos as $index => $promo)
                    @php
                        $isApplied = session('applied_promo_code') === $promo->code;
                        $bgStyle = match ($index % 4) {
                            0 => 'bg-gradient-to-br from-orange-500 to-amber-600 text-white',
                            1 => 'bg-gradient-to-br from-gray-900 to-gray-800 text-white',
                            2 => 'bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 text-gray-800 dark:text-white shadow-sm',
                            default => 'bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 text-gray-800 dark:text-white shadow-sm'
                        };
                        $isDark = in_array($index % 4, [0, 1]);
                    @endphp

                    <div class="promo-card group rounded-3xl p-6 relative overflow-hidden transition-all duration-300 hover:shadow-xl hover:-translate-y-1 flex flex-col justify-between {{ $bgStyle }} {{ $isApplied ? 'ring-4 ring-orange-400 ring-offset-2' : '' }}"
                         data-type="{{ $promo->type }}">

                        {{-- Decorative SVG Watermark --}}
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-32 h-32 absolute -bottom-6 -right-6 pointer-events-none transition-transform duration-500 group-hover:scale-110 {{ $isDark ? 'text-white/10' : 'text-orange-500/10' }}" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12.79 3.04a2 2 0 0 0-2.83 0l-7.07 7.07a2 2 0 0 0 0 2.83l8.48 8.48a2 2 0 0 0 2.83 0l7.07-7.07a2 2 0 0 0 0-2.83l-8.48-8.48zm-4.95 5.66a1.5 1.5 0 1 1 2.12-2.12 1.5 1.5 0 0 1-2.12 2.12z" />
                        </svg>

                        <div>
                            {{-- Top Row: Badge & Status --}}
                            <div class="flex items-center justify-between gap-3 mb-4">
                                <span class="px-3 py-1 rounded-full text-xs font-bold tracking-wide uppercase shadow-sm
                                    @if ($index % 4 === 0) bg-white/20 text-white backdrop-blur-sm
                                    @elseif ($index % 4 === 1) bg-orange-500 text-white
                                    @else bg-orange-50 dark:bg-orange-900/30 text-orange-600 dark:text-orange-400 border border-orange-200/50 dark:border-orange-500/30
                                    @endif">
                                    {{ $promo->badge }}
                                </span>

                                @if ($isApplied)
                                    <span class="inline-flex items-center gap-1 px-3 py-1 rounded-full text-xs font-bold bg-green-500 text-white shadow-sm animate-pulse">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-3.5 h-3.5" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                                        </svg>
                                        Sedang Digunakan
                                    </span>
                                @endif
                            </div>

                            {{-- Promo Title & Description --}}
                            <h3 class="text-2xl sm:text-3xl font-extrabold tracking-tight mb-2 {{ $isDark ? 'text-white' : 'text-gray-900 dark:text-white' }}">
                                {{ $promo->title }}
                            </h3>
                            <p class="text-sm mb-5 leading-relaxed {{ $isDark ? 'text-white/80' : 'text-gray-600 dark:text-gray-300' }}">
                                {{ $promo->description }}
                            </p>

                            {{-- Promo Details Pills --}}
                            <div class="flex flex-wrap gap-2 mb-6 text-xs">
                                @if ($promo->min_order_amount > 0)
                                    <span class="px-2.5 py-1 rounded-lg {{ $isDark ? 'bg-white/10 text-white/90' : 'bg-gray-100 dark:bg-gray-700 text-gray-700 dark:text-gray-300' }}">
                                        Min. Belanja: <strong>Rp {{ number_format($promo->min_order_amount, 0, ',', '.') }}</strong>
                                    </span>
                                @else
                                    <span class="px-2.5 py-1 rounded-lg {{ $isDark ? 'bg-white/10 text-white/90' : 'bg-gray-100 dark:bg-gray-700 text-gray-700 dark:text-gray-300' }}">
                                        Tanpa Min. Belanja
                                    </span>
                                @endif

                                @if ($promo->max_discount_amount && $promo->type === 'percent')
                                    <span class="px-2.5 py-1 rounded-lg {{ $isDark ? 'bg-white/10 text-white/90' : 'bg-gray-100 dark:bg-gray-700 text-gray-700 dark:text-gray-300' }}">
                                        Maks. Potongan: <strong>Rp {{ number_format($promo->max_discount_amount, 0, ',', '.') }}</strong>
                                    </span>
                                @endif

                                @if ($promo->end_date)
                                    <span class="px-2.5 py-1 rounded-lg {{ $isDark ? 'bg-white/10 text-white/90' : 'bg-gray-100 dark:bg-gray-700 text-gray-700 dark:text-gray-300' }}">
                                        Hingga: <strong>{{ $promo->end_date->translatedFormat('d M Y') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        {{-- Coupon Code Box & Action Buttons --}}
                        <div class="pt-4 border-t {{ $isDark ? 'border-white/15' : 'border-gray-100 dark:border-gray-700' }} flex flex-col sm:flex-row items-stretch sm:items-center justify-between gap-3 relative z-10">
                            
                            {{-- Code Box --}}
                            <div class="flex items-center gap-2 bg-black/20 backdrop-blur-sm rounded-2xl px-3.5 py-2 border border-white/20 {{ !$isDark ? 'bg-gray-50 dark:bg-gray-900/50 border-gray-200 dark:border-gray-600' : '' }}">
                                <span class="text-xs {{ $isDark ? 'text-white/70' : 'text-gray-400 dark:text-gray-500' }}">Kode:</span>
                                <span class="font-mono font-bold text-sm sm:text-base tracking-wider {{ $isDark ? 'text-white' : 'text-orange-600 dark:text-orange-400' }}" id="code-{{ $promo->id }}">{{ $promo->code }}</span>
                                <button type="button" onclick="copyCode('{{ $promo->code }}', 'copy-btn-{{ $promo->id }}')" id="copy-btn-{{ $promo->id }}"
                                        class="ml-1 p-1.5 rounded-lg hover:bg-white/20 text-xs font-semibold transition flex items-center gap-1 {{ $isDark ? 'text-white' : 'text-gray-700 dark:text-gray-300 hover:bg-gray-200 dark:hover:bg-gray-700' }}"
                                        title="Salin Kode Voucher">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.666 3.849A2.25 2.25 0 0 0 13.5 2.25h-3c-1.03 0-1.9.693-2.166 1.599m7.332 0c.055.194.084.4.084.61v.9a.75.75 0 0 1-.75.75H8.25a.75.75 0 0 1-.75-.75v-.9c0-.21.03-.416.084-.61m7.332 0c.646.049 1.288.11 1.927.184 1.1.128 1.907 1.077 1.907 2.185V19.5a2.25 2.25 0 0 1-2.25 2.25H6.75A2.25 2.25 0 0 1 4.5 19.5V6.257c0-1.108.806-2.057 1.907-2.185a48.208 48.208 0 0 1 1.927-.184" />
                                    </svg>
                                    <span class="copy-text">Salin</span>
                                </button>
                            </div>

                            {{-- Apply or Remove Form --}}
                            @if ($isApplied)
                                <form action="{{ route('promo.remove') }}" method="POST" class="flex-1 sm:flex-initial">
                                    @csrf
                                    <button type="submit" class="w-full sm:w-auto px-5 py-2.5 rounded-xl font-bold text-xs bg-red-500 hover:bg-red-600 text-white transition shadow-sm flex items-center justify-center gap-1.5">
                                        Lepas Voucher
                                    </button>
                                </form>
                            @else
                                <form action="{{ route('promo.apply') }}" method="POST" class="flex-1 sm:flex-initial">
                                    @csrf
                                    <input type="hidden" name="code" value="{{ $promo->code }}">
                                    <button type="submit" class="w-full sm:w-auto px-5 py-2.5 rounded-xl font-bold text-xs transition shadow-sm flex items-center justify-center gap-1.5
                                        @if ($index % 4 === 0) bg-white text-orange-600 hover:bg-orange-50
                                        @elseif ($index % 4 === 1) bg-orange-500 text-white hover:bg-orange-600
                                        @else bg-orange-500 text-white hover:bg-orange-600
                                        @endif">
                                        <span>Gunakan Promo</span>
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3" />
                                        </svg>
                                    </button>
                                </form>
                            @endif

                        </div>

                    </div>
                @endforeach
            </div>
        @endif

        {{-- Syarat & Informasi Penggunaan --}}
        <div class="mt-14 grid grid-cols-1 md:grid-cols-3 gap-6">
            <div class="bg-white dark:bg-gray-900 rounded-2xl border dark:border-gray-800 p-6 text-center hover:border-orange-300 dark:hover:border-orange-500/50 transition">
                <div class="w-12 h-12 rounded-2xl bg-orange-100 dark:bg-orange-900/30 text-orange-600 dark:text-orange-500 flex items-center justify-center mx-auto mb-3 text-xl font-bold">
                    1
                </div>
                <h4 class="font-bold text-gray-800 dark:text-white text-sm mb-1">Pilih / Salin Kode</h4>
                <p class="text-xs text-gray-500 dark:text-gray-400 leading-relaxed">
                    Klik tombol "Gunakan Promo" atau salin kode kupon yang ingin kamu gunakan.
                </p>
            </div>

            <div class="bg-white dark:bg-gray-900 rounded-2xl border dark:border-gray-800 p-6 text-center hover:border-orange-300 dark:hover:border-orange-500/50 transition">
                <div class="w-12 h-12 rounded-2xl bg-orange-100 dark:bg-orange-900/30 text-orange-600 dark:text-orange-500 flex items-center justify-center mx-auto mb-3 text-xl font-bold">
                    2
                </div>
                <h4 class="font-bold text-gray-800 dark:text-white text-sm mb-1">Pilih Menu Favorit</h4>
                <p class="text-xs text-gray-500 dark:text-gray-400 leading-relaxed">
                    Masukkan aneka lauk & makanan lezat ke dalam keranjang sesuai syarat promo.
                </p>
            </div>

            <div class="bg-white dark:bg-gray-900 rounded-2xl border dark:border-gray-800 p-6 text-center hover:border-orange-300 dark:hover:border-orange-500/50 transition">
                <div class="w-12 h-12 rounded-2xl bg-orange-100 dark:bg-orange-900/30 text-orange-600 dark:text-orange-500 flex items-center justify-center mx-auto mb-3 text-xl font-bold">
                    3
                </div>
                <h4 class="font-bold text-gray-800 dark:text-white text-sm mb-1">Diskon Otomatis Terpotong</h4>
                <p class="text-xs text-gray-500 dark:text-gray-400 leading-relaxed">
                    Potongan harga atau gratis ongkir akan langsung diterapkan saat kamu checkout!
                </p>
            </div>
        </div>

        {{-- Footer Callout --}}
        <div class="bg-gradient-to-r from-orange-50 via-amber-50 to-orange-50 dark:from-orange-900/10 dark:via-amber-900/10 dark:to-orange-900/10 border border-orange-200 dark:border-orange-900/50 rounded-3xl p-6 mt-8 text-center">
            <p class="text-xs sm:text-sm font-medium text-orange-800 dark:text-orange-400 flex items-center justify-center gap-2">
                <span>💡</span> Promo dapat berubah sewaktu-waktu sesuai kuota yang tersedia. Pantau terus halaman ini untuk penawaran menarik berikutnya!
            </p>
        </div>

    </div>

    {{-- Toast Notification Script & Filter Script --}}
    <div id="copyToast" class="fixed bottom-6 right-6 z-50 transform translate-y-20 opacity-0 transition-all duration-300 bg-gray-900 text-white px-5 py-3 rounded-2xl shadow-2xl flex items-center gap-2.5 text-xs font-semibold">
        <span class="text-green-400 text-base">✓</span>
        <span id="toastMsg">Kode promo berhasil disalin!</span>
    </div>

    <script>
        function copyCode(code, btnId) {
            navigator.clipboard.writeText(code).then(() => {
                const btn = document.getElementById(btnId);
                const originalText = btn.querySelector('.copy-text').textContent;
                btn.querySelector('.copy-text').textContent = 'Tersalin! ✓';
                
                showToast('Kode promo ' + code + ' berhasil disalin ke clipboard!');

                setTimeout(() => {
                    btn.querySelector('.copy-text').textContent = originalText;
                }, 2000);
            }).catch(err => {
                console.error('Failed to copy: ', err);
            });
        }

        function showToast(message) {
            const toast = document.getElementById('copyToast');
            const msgEl = document.getElementById('toastMsg');
            msgEl.textContent = message;
            toast.classList.remove('translate-y-20', 'opacity-0');
            toast.classList.add('translate-y-0', 'opacity-100');

            setTimeout(() => {
                toast.classList.remove('translate-y-0', 'opacity-100');
                toast.classList.add('translate-y-20', 'opacity-0');
            }, 2500);
        }

        function filterPromos(type) {
            const buttons = document.querySelectorAll('.filter-btn');
            buttons.forEach(btn => {
                if (btn.dataset.filter === type) {
                    btn.className = 'filter-btn active px-4 py-2 rounded-xl text-xs sm:text-sm font-semibold transition border bg-orange-500 text-white border-orange-500';
                } else {
                    btn.className = 'filter-btn px-4 py-2 rounded-xl text-xs sm:text-sm font-medium transition border text-gray-600 dark:text-gray-300 border-gray-200 dark:border-gray-700 hover:border-orange-300 dark:hover:border-orange-500/50 bg-white dark:bg-gray-800';
                }
            });

            const cards = document.querySelectorAll('.promo-card');
            cards.forEach(card => {
                if (type === 'all' || card.dataset.type === type) {
                    card.style.display = 'flex';
                } else {
                    card.style.display = 'none';
                }
            });
        }
    </script>

@endsection