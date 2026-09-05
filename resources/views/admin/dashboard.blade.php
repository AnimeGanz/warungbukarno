@extends('layouts.admin')

@section('title', 'Dashboard Ringkasan')

@section('content')

    {{-- Welcome Hero Card --}}
    <div class="relative overflow-hidden rounded-3xl bg-gradient-to-r from-[#171C28] via-[#151924] to-[#12151E] border border-white/[0.08] p-6 sm:p-8 mb-8 shadow-xl shadow-black/20">
        <div class="absolute -right-10 -bottom-10 w-64 h-64 bg-orange-500/10 rounded-full blur-3xl pointer-events-none"></div>
        <div class="absolute top-0 right-1/4 w-32 h-32 bg-amber-500/10 rounded-full blur-2xl pointer-events-none"></div>

        <div class="relative z-10 flex flex-col md:flex-row md:items-center justify-between gap-6">
            <div class="space-y-2 max-w-xl">
                <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-orange-500/15 border border-orange-500/30 text-orange-400 text-xs font-bold uppercase tracking-wider">
                    <span class="w-1.5 h-1.5 rounded-full bg-orange-400 animate-ping"></span>
                    Panel Kontrol WarungBuKarno
                </div>
                <h1 class="text-2xl sm:text-3xl font-extrabold text-white tracking-tight">
                    Selamat Datang, <span class="text-transparent bg-clip-text bg-gradient-to-r from-orange-400 to-amber-300">{{ auth()->user()->name }}</span>! 👋
                </h1>
                <p class="text-xs sm:text-sm text-gray-400 leading-relaxed">
                    Berikut adalah ringkasan performa penjualan, pesanan pelanggan yang masuk, dan aktivitas menu warung hari ini.
                </p>
            </div>

            {{-- Quick Action Buttons --}}
            <div class="flex flex-wrap items-center gap-2.5">
                <a href="{{ route('admin.products.create') }}"
                   class="px-4 py-2.5 rounded-xl bg-orange-500 hover:bg-orange-600 text-white text-xs font-bold transition shadow-lg shadow-orange-500/25 flex items-center gap-1.5">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                    </svg>
                    <span>Tambah Menu</span>
                </a>

                <a href="{{ route('admin.promos.create') }}"
                   class="px-4 py-2.5 rounded-xl bg-white/[0.06] hover:bg-white/[0.1] border border-white/10 text-white text-xs font-semibold transition flex items-center gap-1.5">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-orange-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 6v.75m0 3v.75m0 3v.75m0 3V18m-9-5.25h5.25M7.5 15h3M3.375 5.25c-.621 0-1.125.504-1.125 1.125v3.026a2.999 2.999 0 010 5.198v3.026c0 .621.504 1.125 1.125 1.125h17.25c.621 0 1.125-.504 1.125-1.125v-3.026a2.999 2.999 0 010-5.198V6.375c0-.621-.504-1.125-1.125-1.125H3.375z" />
                    </svg>
                    <span>Buat Promo</span>
                </a>
            </div>
        </div>
    </div>

    {{-- Executive 4-KPI Metric Cards --}}
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 sm:gap-5 mb-8">

        {{-- Card 1: Pendapatan Hari Ini --}}
        <div class="bg-[#131722] border border-white/[0.08] hover:border-orange-500/40 rounded-2xl p-5 transition-all duration-300 hover:-translate-y-1 hover:shadow-xl hover:shadow-orange-500/5 group relative overflow-hidden">
            <div class="flex items-center justify-between mb-3">
                <span class="text-xs font-semibold text-gray-400 uppercase tracking-wider">Pendapatan Hari Ini</span>
                <div class="w-10 h-10 rounded-xl bg-emerald-500/15 border border-emerald-500/20 flex items-center justify-center text-emerald-400 transition group-hover:scale-110">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v12m-3-2.818l.879.659c1.171.879 3.07.879 4.242 0 1.172-.879 1.172-2.303 0-3.182C13.536 12.219 12.768 12 12 12c-.725 0-1.45-.22-2.003-.659-1.106-.879-1.106-2.303 0-3.182s2.9-.879 4.006 0l.415.33M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
            </div>
            <h3 class="text-2xl font-extrabold text-white tracking-tight">Rp {{ number_format($todayRevenue, 0, ',', '.') }}</h3>
            <p class="text-[11px] text-gray-400 mt-2 flex items-center gap-1.5">
                <span class="text-emerald-400 font-bold">Bulan ini:</span>
                <span>Rp {{ number_format($monthRevenue, 0, ',', '.') }}</span>
            </p>
        </div>

        {{-- Card 2: Total Pesanan --}}
        <div class="bg-[#131722] border border-white/[0.08] hover:border-orange-500/40 rounded-2xl p-5 transition-all duration-300 hover:-translate-y-1 hover:shadow-xl hover:shadow-orange-500/5 group relative overflow-hidden">
            <div class="flex items-center justify-between mb-3">
                <span class="text-xs font-semibold text-gray-400 uppercase tracking-wider">Total Pesanan</span>
                <div class="w-10 h-10 rounded-xl bg-orange-500/15 border border-orange-500/20 flex items-center justify-center text-orange-400 transition group-hover:scale-110">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 10.5V6a3.75 3.75 0 10-7.5 0v4.5m11.356-1.993l1.263 12c.07.665-.45 1.243-1.119 1.243H4.25a1.125 1.125 0 01-1.12-1.243l1.264-12A1.125 1.125 0 015.513 7.5h12.974c.576 0 1.059.435 1.119 1.007zM8.625 10.5a.375.375 0 11-.75 0 .375.375 0 01.75 0zm7.5 0a.375.375 0 11-.75 0 .375.375 0 01.75 0z" />
                    </svg>
                </div>
            </div>
            <h3 class="text-2xl font-extrabold text-white tracking-tight">{{ $totalOrders }} <span class="text-xs font-normal text-gray-400">pesanan</span></h3>
            <div class="flex items-center gap-2 mt-2 text-[11px]">
                @if ($pendingOrders > 0)
                    <span class="px-2 py-0.5 rounded-full bg-amber-500/20 text-amber-400 font-bold">
                        {{ $pendingOrders }} Menunggu
                    </span>
                @else
                    <span class="text-gray-400">Semua pesanan terproses</span>
                @endif
            </div>
        </div>

        {{-- Card 3: Total Produk --}}
        <div class="bg-[#131722] border border-white/[0.08] hover:border-orange-500/40 rounded-2xl p-5 transition-all duration-300 hover:-translate-y-1 hover:shadow-xl hover:shadow-orange-500/5 group relative overflow-hidden">
            <div class="flex items-center justify-between mb-3">
                <span class="text-xs font-semibold text-gray-400 uppercase tracking-wider">Menu Makanan</span>
                <div class="w-10 h-10 rounded-xl bg-blue-500/15 border border-blue-500/20 flex items-center justify-center text-blue-400 transition group-hover:scale-110">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.042A8.967 8.967 0 006 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 016 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 016-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0018 18a8.967 8.967 0 00-6 2.292m0-14.25v14.25" />
                    </svg>
                </div>
            </div>
            <h3 class="text-2xl font-extrabold text-white tracking-tight">{{ $totalProducts }} <span class="text-xs font-normal text-gray-400">item</span></h3>
            <p class="text-[11px] text-gray-400 mt-2 flex items-center gap-1.5">
                <span class="text-blue-400 font-semibold">{{ $availableProducts }} Aktif</span>
                <span>· {{ $totalCategories }} Kategori</span>
            </p>
        </div>

        {{-- Card 4: Promo & Kupon --}}
        <div class="bg-[#131722] border border-white/[0.08] hover:border-orange-500/40 rounded-2xl p-5 transition-all duration-300 hover:-translate-y-1 hover:shadow-xl hover:shadow-orange-500/5 group relative overflow-hidden">
            <div class="flex items-center justify-between mb-3">
                <span class="text-xs font-semibold text-gray-400 uppercase tracking-wider">Voucher Promo</span>
                <div class="w-10 h-10 rounded-xl bg-purple-500/15 border border-purple-500/20 flex items-center justify-center text-purple-400 transition group-hover:scale-110">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 6v.75m0 3v.75m0 3v.75m0 3V18m-9-5.25h5.25M7.5 15h3M3.375 5.25c-.621 0-1.125.504-1.125 1.125v3.026a2.999 2.999 0 010 5.198v3.026c0 .621.504 1.125 1.125 1.125h17.25c.621 0 1.125-.504 1.125-1.125v-3.026a2.999 2.999 0 010-5.198V6.375c0-.621-.504-1.125-1.125-1.125H3.375z" />
                    </svg>
                </div>
            </div>
            <h3 class="text-2xl font-extrabold text-white tracking-tight">{{ $activePromosCount }} <span class="text-xs font-normal text-gray-400">voucher aktif</span></h3>
            <p class="text-[11px] text-gray-400 mt-2 flex items-center gap-1">
                <a href="{{ route('admin.promos.index') }}" class="text-purple-400 font-semibold hover:underline">Kelola Kupon Promo →</a>
            </p>
        </div>

    </div>

    {{-- Middle Section: Chart & Top Categories --}}
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-8">

        {{-- Sales Chart --}}
        <div class="lg:col-span-2 bg-[#131722] border border-white/[0.08] rounded-3xl p-6 sm:p-7 shadow-xl shadow-black/10">
            <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-2 mb-6">
                <div>
                    <h3 class="text-base font-bold text-white tracking-tight">Tren Penjualan Warung</h3>
                    <p class="text-xs text-gray-400">Total omset 7 hari terakhir</p>
                </div>
                <div class="flex items-center gap-2">
                    <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-lg bg-orange-500/10 text-orange-400 text-xs font-bold border border-orange-500/20">
                        📈 Grafik Mingguan
                    </span>
                </div>
            </div>
            <div class="h-64 relative">
                <canvas id="salesChart"></canvas>
            </div>
        </div>

        {{-- Categories Distribution --}}
        <div class="bg-[#131722] border border-white/[0.08] rounded-3xl p-6 sm:p-7 shadow-xl shadow-black/10 flex flex-col justify-between">
            <div>
                <div class="flex items-center justify-between mb-5">
                    <div>
                        <h3 class="text-base font-bold text-white tracking-tight">Distribusi Menu</h3>
                        <p class="text-xs text-gray-400">Kategori dengan menu terbanyak</p>
                    </div>
                    <a href="{{ route('admin.categories.index') }}" class="text-xs text-orange-400 font-semibold hover:underline">
                        Lihat Semua
                    </a>
                </div>

                <div class="space-y-4">
                    @forelse ($topCategories as $cat)
                        @php
                            $percentage = $totalProducts > 0 ? round(($cat->products_count / $totalProducts) * 100) : 0;
                        @endphp
                        <div>
                            <div class="flex items-center justify-between text-xs font-semibold mb-1.5">
                                <span class="text-gray-300">{{ $cat->name }}</span>
                                <span class="text-gray-400">{{ $cat->products_count }} Menu <span class="text-orange-400 font-mono">({{ $percentage }}%)</span></span>
                            </div>
                            <div class="w-full bg-white/[0.05] rounded-full h-2 overflow-hidden">
                                <div class="bg-gradient-to-r from-orange-500 to-amber-400 h-2 rounded-full transition-all duration-500"
                                     style="width: {{ $percentage }}%"></div>
                            </div>
                        </div>
                    @empty
                        <p class="text-xs text-gray-500 py-6 text-center">Belum ada kategori menu.</p>
                    @endforelse
                </div>
            </div>

            {{-- Voucher Highlights Footer --}}
            @if ($promosSummary->isNotEmpty())
                <div class="pt-5 mt-5 border-t border-white/[0.07]">
                    <p class="text-[11px] font-bold text-gray-400 uppercase tracking-wider mb-2">Voucher Terpopuler:</p>
                    <div class="flex flex-wrap gap-2">
                        @foreach ($promosSummary as $p)
                            <span class="px-2.5 py-1 rounded-lg bg-white/[0.04] border border-white/[0.08] text-[11px] text-gray-300 flex items-center gap-1.5">
                                <strong class="font-mono text-orange-400">{{ $p->code }}</strong>
                                <span class="text-gray-500">({{ $p->used_count }}x pakai)</span>
                            </span>
                        @endforeach
                    </div>
                </div>
            @endif
        </div>

    </div>

    {{-- Bottom Table: Pesanan Terbaru --}}
    <div class="bg-[#131722] border border-white/[0.08] rounded-3xl p-6 sm:p-7 shadow-xl shadow-black/10">
        <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 mb-6">
            <div>
                <h3 class="text-base font-bold text-white tracking-tight">Pesanan Masuk Terbaru</h3>
                <p class="text-xs text-gray-400">Daftar transaksi pelanggan terakhir</p>
            </div>
            <a href="{{ route('admin.orders.index') }}"
               class="inline-flex items-center gap-1.5 text-xs font-bold text-orange-400 hover:text-orange-300 transition">
                <span>Lihat Semua Pesanan</span>
                <svg xmlns="http://www.w3.org/2000/svg" class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3" />
                </svg>
            </a>
        </div>

        <div class="overflow-x-auto -mx-6 sm:mx-0">
            <table class="w-full text-xs text-left">
                <thead class="bg-white/[0.03] text-gray-400 uppercase text-[10px] tracking-wider border-y border-white/[0.05]">
                    <tr>
                        <th class="px-6 py-3.5">No. Pesanan</th>
                        <th class="px-6 py-3.5">Pelanggan</th>
                        <th class="px-6 py-3.5">Pengiriman</th>
                        <th class="px-6 py-3.5">Status</th>
                        <th class="px-6 py-3.5 text-right">Total</th>
                        <th class="px-6 py-3.5 text-right">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-white/[0.05]">
                    @forelse ($recentOrders as $order)
                        <tr class="hover:bg-white/[0.02] transition">
                            <td class="px-6 py-4 font-mono font-bold text-white whitespace-nowrap">
                                <a href="{{ route('admin.orders.show', $order) }}" class="hover:text-orange-400 transition">
                                    {{ $order->order_number }}
                                </a>
                                <span class="block text-[10px] font-sans font-normal text-gray-500">
                                    {{ $order->created_at->translatedFormat('d M Y, H:i') }}
                                </span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <p class="font-semibold text-gray-200">{{ $order->user->name }}</p>
                                <p class="text-[11px] text-gray-500">{{ $order->user->email }}</p>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span class="px-2.5 py-1 rounded-md text-[11px] font-medium {{ $order->delivery_method === 'delivery' ? 'bg-orange-500/10 text-orange-400 border border-orange-500/20' : 'bg-white/5 text-gray-400 border border-white/10' }}">
                                    {{ $order->delivery_method === 'delivery' ? '🚚 Antar Kurir' : '🏪 Ambil Sendiri' }}
                                </span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-semibold
                                    @if ($order->status === 'menunggu') bg-amber-500/15 text-amber-400 border border-amber-500/30
                                    @elseif ($order->status === 'diproses') bg-blue-500/15 text-blue-400 border border-blue-500/30
                                    @elseif ($order->status === 'dikirim') bg-purple-500/15 text-purple-400 border border-purple-500/30
                                    @elseif ($order->status === 'selesai') bg-emerald-500/15 text-emerald-400 border border-emerald-500/30
                                    @else bg-rose-500/15 text-rose-400 border border-rose-500/30
                                    @endif">
                                    <span class="w-1.5 h-1.5 rounded-full
                                        @if ($order->status === 'menunggu') bg-amber-400
                                        @elseif ($order->status === 'diproses') bg-blue-400
                                        @elseif ($order->status === 'dikirim') bg-purple-400
                                        @elseif ($order->status === 'selesai') bg-emerald-400
                                        @else bg-rose-400
                                        @endif"></span>
                                    {{ ucfirst($order->status) }}
                                </span>
                            </td>
                            <td class="px-6 py-4 text-right font-bold text-gray-200 whitespace-nowrap">
                                Rp {{ number_format($order->total_price, 0, ',', '.') }}
                                @if ($order->discount_amount > 0)
                                    <span class="block text-[10px] text-emerald-400 font-normal">Diskon -Rp {{ number_format($order->discount_amount, 0, ',', '.') }}</span>
                                @endif
                            </td>
                            <td class="px-6 py-4 text-right whitespace-nowrap">
                                <a href="{{ route('admin.orders.show', $order) }}"
                                   class="px-3 py-1.5 rounded-lg bg-white/[0.05] hover:bg-orange-500 hover:text-white text-gray-300 text-xs font-semibold transition inline-flex items-center gap-1">
                                    Detail
                                </a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="px-6 py-12 text-center text-gray-500">
                                Belum ada pesanan masuk.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    {{-- Chart.js Initialization --}}
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const ctx = document.getElementById('salesChart');
            if (!ctx) return;

            const gradient = ctx.getContext('2d').createLinearGradient(0, 0, 0, 240);
            gradient.addColorStop(0, 'rgba(249, 115, 22, 0.35)');
            gradient.addColorStop(1, 'rgba(249, 115, 22, 0.0)');

            new Chart(ctx, {
                type: 'line',
                data: {
                    labels: {!! json_encode($salesData->pluck('label')) !!},
                    datasets: [{
                        label: 'Omset Penjualan',
                        data: {!! json_encode($salesData->pluck('total')) !!},
                        borderColor: '#f97316',
                        borderWidth: 2.5,
                        backgroundColor: gradient,
                        tension: 0.35,
                        fill: true,
                        pointBackgroundColor: '#f97316',
                        pointBorderColor: '#ffffff',
                        pointBorderWidth: 1.5,
                        pointRadius: 4,
                        pointHoverRadius: 6,
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: { display: false },
                        tooltip: {
                            backgroundColor: '#1E2330',
                            titleColor: '#ffffff',
                            bodyColor: '#f97316',
                            borderColor: 'rgba(255,255,255,0.1)',
                            borderWidth: 1,
                            padding: 10,
                            displayColors: false,
                            callbacks: {
                                label: function (context) {
                                    return 'Omset: Rp ' + new Intl.NumberFormat('id-ID').format(context.raw);
                                }
                            }
                        }
                    },
                    scales: {
                        x: {
                            grid: { color: 'rgba(255,255,255,0.04)' },
                            ticks: { color: '#6b7280', font: { size: 11 } }
                        },
                        y: {
                            grid: { color: 'rgba(255,255,255,0.04)' },
                            ticks: {
                                color: '#6b7280',
                                font: { size: 11 },
                                callback: function (value) {
                                    if (value >= 1000000) return (value / 1000000) + 'jt';
                                    if (value >= 1000) return (value / 1000) + 'rb';
                                    return value;
                                }
                            }
                        }
                    }
                }
            });
        });
    </script>

@endsection