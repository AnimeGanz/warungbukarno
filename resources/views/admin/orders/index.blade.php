@extends('layouts.admin')

@section('title', 'Kelola Pesanan')

@section('content')

    <div class="mb-6 flex flex-col sm:flex-row sm:items-center justify-between gap-4">
        <div>
            <h3 class="text-xl font-bold text-white tracking-tight">Kelola Pesanan Pelanggan</h3>
            <p class="text-sm text-gray-400">Pantau, proses, dan perbarui status pesanan makanan secara real-time</p>
        </div>
    </div>

    {{-- Filter Status Tabs --}}
    <div class="flex items-center gap-2 overflow-x-auto pb-2 mb-6">
        <a href="{{ route('admin.orders.index') }}"
           class="flex-shrink-0 px-4 py-2 rounded-xl text-xs font-bold transition border {{ !request('status') ? 'bg-orange-500 text-white border-orange-500 shadow-sm' : 'bg-[#131722] text-gray-400 border-white/[0.08] hover:text-white hover:border-white/20' }}">
            Semua Status
        </a>
        @foreach (['menunggu' => 'Menunggu', 'diproses' => 'Diproses', 'dikirim' => 'Dikirim', 'selesai' => 'Selesai', 'dibatalkan' => 'Dibatalkan'] as $key => $label)
            <a href="{{ route('admin.orders.index', ['status' => $key]) }}"
               class="flex-shrink-0 px-4 py-2 rounded-xl text-xs font-bold transition border {{ request('status') == $key ? 'bg-orange-500 text-white border-orange-500 shadow-sm' : 'bg-[#131722] text-gray-400 border-white/[0.08] hover:text-white hover:border-white/20' }}">
                {{ $label }}
            </a>
        @endforeach
    </div>

    <div class="bg-[#131722] border border-white/[0.08] rounded-3xl overflow-hidden shadow-xl shadow-black/10">
        <div class="overflow-x-auto">
            <table class="w-full text-xs text-left">
                <thead class="bg-white/[0.03] text-gray-400 uppercase text-[10px] tracking-wider border-b border-white/[0.05]">
                    <tr>
                        <th class="px-6 py-3.5">No. Pesanan</th>
                        <th class="px-6 py-3.5">Pelanggan</th>
                        <th class="px-6 py-3.5">Tanggal</th>
                        <th class="px-6 py-3.5">Pengiriman</th>
                        <th class="px-6 py-3.5">Metode Bayar</th>
                        <th class="px-6 py-3.5">Status</th>
                        <th class="px-6 py-3.5 text-right">Total</th>
                        <th class="px-6 py-3.5 text-right">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-white/[0.05]">
                    @forelse ($orders as $order)
                        <tr class="hover:bg-white/[0.02] transition">
                            <td class="px-6 py-4 font-mono font-bold text-white whitespace-nowrap">
                                <a href="{{ route('admin.orders.show', $order) }}" class="hover:text-orange-400 transition">
                                    {{ $order->order_number }}
                                </a>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <p class="font-semibold text-gray-200">{{ $order->user->name }}</p>
                                <p class="text-[11px] text-gray-500">{{ $order->user->email }}</p>
                            </td>
                            <td class="px-6 py-4 text-gray-400 whitespace-nowrap">
                                {{ $order->created_at->translatedFormat('d M Y, H:i') }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span class="px-2.5 py-1 rounded-md text-[11px] font-medium {{ $order->delivery_method === 'delivery' ? 'bg-orange-500/10 text-orange-400 border border-orange-500/20' : 'bg-white/5 text-gray-400 border border-white/10' }}">
                                    {{ $order->delivery_method === 'delivery' ? '🚚 Antar Kurir' : '🏪 Ambil Sendiri' }}
                                </span>
                            </td>
                            <td class="px-6 py-4 text-gray-300 whitespace-nowrap">
                                {{ $order->payment_method === 'cod' ? 'COD (Tunai)' : 'Transfer Bank' }}
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
                            <td colspan="8" class="px-6 py-12 text-center text-gray-500">
                                Tidak ada pesanan pada status ini.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <div class="mt-5">
        {{ $orders->links() }}
    </div>

@endsection