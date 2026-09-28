@extends('layouts.shop')

@section('title', 'Keranjang Saya')

@section('content')

    <div class="max-w-4xl mx-auto px-6 py-10">

        <h2 class="text-xl font-bold text-gray-800 dark:text-white mb-6 flex items-center gap-2">
            <span>🛒</span> Keranjang Saya
        </h2>

        @if (session('error'))
            <div class="mb-4 p-4 rounded-xl bg-red-50 border border-red-200 text-red-700 text-xs sm:text-sm flex items-center justify-between">
                <span>{{ session('error') }}</span>
            </div>
        @endif

        @if ($cartItems->isEmpty())
            <div class="bg-white dark:bg-gray-900 border dark:border-gray-800 rounded-3xl p-16 text-center shadow-sm">
                <div class="w-16 h-16 rounded-2xl bg-orange-50 dark:bg-orange-900/20 text-orange-500 flex items-center justify-center mx-auto mb-4 text-2xl">
                    🛍️
                </div>
                <p class="text-gray-500 dark:text-gray-400 font-medium mb-4">Keranjang kamu masih kosong.</p>
                <a href="{{ route('home') }}" class="inline-flex items-center gap-2 px-6 py-3 bg-orange-500 hover:bg-orange-600 text-white text-sm font-semibold rounded-xl transition shadow-sm">
                    Yuk pilih menu dulu →
                </a>
            </div>
        @else
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

                {{-- Kolom Kiri: Daftar Item Keranjang --}}
                <div class="lg:col-span-2 space-y-4">
                    <div class="bg-white dark:bg-gray-900 border dark:border-gray-800 rounded-2xl divide-y dark:divide-gray-800 shadow-sm">
                        @foreach ($cartItems as $item)
                            <div class="flex items-center gap-4 p-4 sm:p-5">
                                <div class="w-16 h-16 rounded-xl bg-gray-100 dark:bg-gray-800 flex-shrink-0 overflow-hidden border dark:border-gray-700">
                                    @if ($item->product->image)
                                        <img src="{{ Storage::url($item->product->image) }}" class="w-full h-full object-cover">
                                    @else
                                        <div class="w-full h-full flex items-center justify-center text-gray-300 dark:text-gray-600 text-xs">N/A</div>
                                    @endif
                                </div>

                                <div class="flex-1 min-w-0">
                                    <p class="font-semibold text-gray-800 dark:text-white text-sm truncate">{{ $item->product->name }}</p>
                                    <p class="text-xs text-orange-600 dark:text-orange-500 font-medium">Rp {{ number_format($item->product->price, 0, ',', '.') }}</p>
                                </div>

                                <div class="flex items-center gap-2">
                                    <form action="{{ route('cart.decrease', $item) }}" method="POST">
                                        @csrf
                                        @method('PATCH')
                                        <button type="submit" class="w-7 h-7 rounded-full border border-gray-300 dark:border-gray-600 flex items-center justify-center text-gray-600 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800 text-sm font-bold transition">
                                            −
                                        </button>
                                    </form>
                                    <form action="{{ route('cart.update', $item) }}" method="POST">
                                        @csrf
                                        @method('PATCH')
                                        <input type="number" name="quantity" value="{{ $item->quantity }}" min="1" max="{{ $item->product->stock }}" onchange="this.form.submit()" class="text-sm font-semibold w-12 text-center bg-transparent border-none focus:ring-0 dark:text-white p-0 [appearance:textfield] [&::-webkit-outer-spin-button]:appearance-none [&::-webkit-inner-spin-button]:appearance-none">
                                    </form>
                                    <form action="{{ route('cart.increase', $item) }}" method="POST">
                                        @csrf
                                        @method('PATCH')
                                        <button type="submit" 
                                                @if($item->quantity >= $item->product->stock) disabled @endif
                                                class="w-7 h-7 rounded-full border {{ $item->quantity >= $item->product->stock ? 'border-gray-200 dark:border-gray-700 text-gray-300 dark:text-gray-600 cursor-not-allowed' : 'border-gray-300 dark:border-gray-600 hover:bg-gray-100 dark:hover:bg-gray-800 text-gray-600 dark:text-gray-400' }} flex items-center justify-center text-sm font-bold transition"
                                                title="{{ $item->quantity >= $item->product->stock ? 'Stok maksimal' : 'Tambah' }}">
                                            +
                                        </button>
                                    </form>
                                </div>

                                <p class="w-24 text-right text-sm font-bold text-gray-800 dark:text-white">
                                    Rp {{ number_format($item->product->price * $item->quantity, 0, ',', '.') }}
                                </p>

                                <form action="{{ route('cart.remove', $item) }}" method="POST"
                                      onsubmit="return confirm('Hapus item ini dari keranjang?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-gray-400 dark:text-gray-500 hover:text-red-500 dark:hover:text-red-400 transition p-1" title="Hapus item">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                                        </svg>
                                    </button>
                                </form>
                            </div>
                        @endforeach
                    </div>

                    {{-- Promo / Voucher Box --}}
                    <div class="bg-white dark:bg-gray-900 border dark:border-gray-800 rounded-2xl p-5 shadow-sm space-y-4">
                        <div class="flex items-center justify-between">
                            <h3 class="font-bold text-gray-800 dark:text-white text-sm flex items-center gap-2">
                                <span class="text-orange-500 text-base">🏷️</span> Voucher Promo
                            </h3>
                            <a href="{{ route('promo') }}" class="text-xs text-orange-600 dark:text-orange-500 font-semibold hover:underline flex items-center gap-1">
                                Lihat Semua Promo →
                            </a>
                        </div>

                        {{-- Form Input Kode Promo --}}
                        <form action="{{ route('promo.apply') }}" method="POST" class="flex gap-2">
                            @csrf
                            <div class="relative flex-1">
                                <input type="text" name="code" value="{{ old('code', session('applied_promo_code')) }}" placeholder="Masukkan kode promo (cth: BARU20)"
                                       class="w-full border dark:border-gray-700 bg-white dark:bg-gray-800 dark:text-white rounded-xl px-3.5 py-2.5 text-xs sm:text-sm font-mono uppercase tracking-wider focus:outline-none focus:ring-2 focus:ring-orange-400">
                            </div>
                            <button type="submit" class="px-5 py-2.5 bg-orange-500 hover:bg-orange-600 text-white text-xs sm:text-sm font-semibold rounded-xl transition shadow-sm">
                                Terapkan
                            </button>
                        </form>

                        {{-- Status Promo Terpasang --}}
                        @if ($appliedPromo)
                            <div class="p-3.5 rounded-xl bg-green-50 border border-green-200 flex items-center justify-between">
                                <div class="flex items-center gap-2.5">
                                    <span class="w-6 h-6 rounded-full bg-green-500 text-white flex items-center justify-center text-xs font-bold">✓</span>
                                    <div>
                                        <p class="text-xs font-bold text-green-800">
                                            Promo <span class="font-mono">{{ $appliedPromo->code }}</span> Aktif
                                        </p>
                                        <p class="text-[11px] text-green-600">
                                            @if ($appliedPromo->type === 'free_shipping')
                                                Gratis Ongkir akan dihitung pada saat checkout
                                            @else
                                                Hemat Rp {{ number_format($discount, 0, ',', '.') }}
                                            @endif
                                        </p>
                                    </div>
                                </div>
                                <form action="{{ route('promo.remove') }}" method="POST">
                                    @csrf
                                    <button type="submit" class="text-xs text-red-500 hover:text-red-700 font-semibold hover:underline">
                                        Hapus
                                    </button>
                                </form>
                            </div>
                        @elseif ($promoError)
                            <div class="p-3 rounded-xl bg-amber-50 border border-amber-200 text-amber-800 text-xs">
                                ⚠️ {{ $promoError }}
                            </div>
                        @endif

                        {{-- Quick Promo List --}}
                        @if ($availablePromos->isNotEmpty())
                            <div class="pt-2">
                                <p class="text-xs font-semibold text-gray-500 dark:text-gray-400 mb-2">Voucher Tersedia Untukmu:</p>
                                <div class="grid grid-cols-1 sm:grid-cols-2 gap-2">
                                    @foreach ($availablePromos as $p)
                                        @php $isCurrent = session('applied_promo_code') === $p->code; @endphp
                                        <div class="p-3 rounded-xl border {{ $isCurrent ? 'bg-orange-50 dark:bg-orange-900/10 border-orange-300 dark:border-orange-500/50' : 'bg-gray-50/70 dark:bg-gray-800/50 border-gray-200 dark:border-gray-700 hover:border-orange-200 dark:hover:border-orange-500/30' }} flex items-center justify-between transition">
                                            <div>
                                                <div class="flex items-center gap-1.5 mb-0.5">
                                                    <span class="font-mono font-bold text-xs text-orange-600 dark:text-orange-400">{{ $p->code }}</span>
                                                    <span class="text-[10px] px-1.5 py-0.5 bg-orange-100 dark:bg-orange-900/30 text-orange-700 dark:text-orange-400 rounded-md font-medium">{{ $p->badge }}</span>
                                                </div>
                                                <p class="text-[11px] text-gray-600 dark:text-gray-400">{{ $p->title }}</p>
                                            </div>
                                            @if ($isCurrent)
                                                <span class="text-xs font-bold text-green-600">✓ Terpasang</span>
                                            @else
                                                <form action="{{ route('promo.apply') }}" method="POST">
                                                    @csrf
                                                    <input type="hidden" name="code" value="{{ $p->code }}">
                                                    <button type="submit" class="px-3 py-1 bg-orange-500 hover:bg-orange-600 text-white text-xs font-semibold rounded-lg transition">
                                                        Pakai
                                                    </button>
                                                </form>
                                            @endif
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @endif
                    </div>
                </div>

                {{-- Kolom Kanan: Ringkasan Total --}}
                <div class="lg:col-span-1">
                    <div class="bg-white dark:bg-gray-900 border dark:border-gray-800 rounded-2xl p-6 shadow-sm sticky top-24 space-y-4">
                        <h3 class="font-bold text-gray-800 dark:text-white text-sm pb-3 border-b dark:border-gray-800">Ringkasan Belanja</h3>

                        <div class="space-y-2.5 text-sm">
                            <div class="flex justify-between text-gray-600 dark:text-gray-300">
                                <span>Subtotal</span>
                                <span class="font-semibold text-gray-800 dark:text-white">Rp {{ number_format($subtotal, 0, ',', '.') }}</span>
                            </div>

                            @if ($discount > 0)
                                <div class="flex justify-between text-green-600 font-medium">
                                    <span>Diskon Promo ({{ $appliedPromo->code }})</span>
                                    <span>- Rp {{ number_format($discount, 0, ',', '.') }}</span>
                                </div>
                            @elseif ($appliedPromo && $appliedPromo->type === 'free_shipping')
                                <div class="flex justify-between text-green-600 font-medium">
                                    <span>Promo Ongkir ({{ $appliedPromo->code }})</span>
                                    <span class="text-xs bg-green-100 text-green-700 px-2 py-0.5 rounded">Gratis saat checkout</span>
                                </div>
                            @endif
                        </div>

                        <div class="border-t dark:border-gray-800 pt-4 flex justify-between items-center">
                            <div>
                                <span class="text-xs text-gray-400 dark:text-gray-500 block">Total Pembayaran</span>
                                <span class="text-xl font-extrabold text-orange-500">Rp {{ number_format($total, 0, ',', '.') }}</span>
                            </div>
                        </div>

                        <a href="{{ route('checkout.index') }}" class="w-full bg-orange-500 hover:bg-orange-600 text-white py-3.5 rounded-xl text-sm font-bold transition shadow-sm flex items-center justify-center gap-2">
                            <span>Lanjut ke Checkout</span>
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3" />
                            </svg>
                        </a>

                        <a href="{{ route('home') }}" class="block text-center text-xs text-gray-500 hover:text-orange-500 font-medium transition pt-1">
                            ← Tambah Menu Lain
                        </a>
                    </div>
                </div>

            </div>
        @endif

    </div>

@endsection