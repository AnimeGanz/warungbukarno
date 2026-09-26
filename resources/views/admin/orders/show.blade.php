@extends('layouts.admin')

@section('title', 'Detail Pesanan')

@section('content')

    <div class="mb-6 flex items-center justify-between">
        <div>
            <h3 class="text-xl font-semibold text-white">{{ $order->order_number }}</h3>
            <p class="text-sm text-gray-500">{{ $order->created_at->translatedFormat('d M Y, H:i') }}</p>
        </div>
        <a href="{{ route('admin.orders.index') }}" class="text-sm text-gray-400 hover:text-white">
            ← Kembali
        </a>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

        {{-- Kolom kiri: detail --}}
        <div class="lg:col-span-2 space-y-4">

            <div class="bg-[#161922] border border-white/5 rounded-2xl p-6">
                <h4 class="text-white font-medium mb-4">Item Pesanan</h4>
                <div class="divide-y divide-white/5">
                    @foreach ($order->items as $item)
                        <div class="flex justify-between py-3 text-sm">
                            <div>
                                <p class="text-gray-200">{{ $item->product_name }}</p>
                                <p class="text-xs text-gray-500">{{ $item->quantity }} x Rp {{ number_format($item->price, 0, ',', '.') }}</p>
                            </div>
                            <span class="text-gray-300 font-medium">Rp {{ number_format($item->subtotal, 0, ',', '.') }}</span>
                        </div>
                    @endforeach
                </div>
                <div class="border-t border-white/5 mt-3 pt-3 space-y-2 text-sm">
                    @php $itemsSubtotal = $order->items->sum('subtotal'); @endphp
                    <div class="flex justify-between text-gray-400">
                        <span>Subtotal</span>
                        <span class="text-gray-300">Rp {{ number_format($itemsSubtotal, 0, ',', '.') }}</span>
                    </div>

                    @if ($order->shipping_cost > 0)
                        <div class="flex justify-between text-gray-400">
                            <span>Ongkos Kirim ({{ $order->delivery_method === 'delivery' ? 'Kurir' : 'Ambil di Tempat' }})</span>
                            <span class="text-gray-300">Rp {{ number_format($order->shipping_cost, 0, ',', '.') }}</span>
                        </div>
                    @endif

                    @if ($order->discount_amount > 0)
                        <div class="flex justify-between text-green-400 font-medium">
                            <span class="flex items-center gap-2">
                                <span>🏷️ Diskon Promo</span>
                                @if ($order->promo_code)
                                    <span class="text-xs font-mono bg-green-500/10 border border-green-500/20 px-2 py-0.5 rounded text-green-400">{{ $order->promo_code }}</span>
                                @endif
                            </span>
                            <span>- Rp {{ number_format($order->discount_amount, 0, ',', '.') }}</span>
                        </div>
                    @endif

                    <div class="border-t border-white/5 pt-2 flex justify-between">
                        <span class="font-medium text-white">Total Pembayaran</span>
                        <span class="font-semibold text-orange-400">Rp {{ number_format($order->total_price, 0, ',', '.') }}</span>
                    </div>
                </div>
            </div>

            <div class="bg-[#161922] border border-white/5 rounded-2xl p-6">
                <div class="flex items-center justify-between mb-2">
                    <h4 class="text-white font-medium">Alamat Pengiriman</h4>
                    <span class="text-xs px-2 py-1 rounded {{ $order->delivery_method === 'delivery' ? 'bg-orange-500/20 text-orange-400' : 'bg-gray-500/20 text-gray-400' }}">
                        {{ $order->delivery_method === 'delivery' ? 'Antar ke Rumah' : 'Ambil di Tempat' }}
                    </span>
                </div>
                <p class="text-sm text-gray-400">{{ $order->shipping_address }}</p>
                @if ($order->delivery_method === 'delivery')
                    <div class="mt-3">
                        <a href="https://www.google.com/maps/search/?api=1&query={{ urlencode($order->shipping_address) }}" target="_blank" class="inline-flex items-center gap-1.5 text-xs bg-white/5 hover:bg-white/10 text-gray-300 px-3 py-1.5 rounded-lg transition border border-white/10">
                            🗺️ Buka di Google Maps
                        </a>
                    </div>
                @endif
                
                @if ($order->notes)
                    <h4 class="text-white font-medium mt-4 mb-2">Catatan</h4>
                    <p class="text-sm text-gray-400">{{ $order->notes }}</p>
                @endif
            </div>

            <div class="bg-[#161922] border border-white/5 rounded-2xl p-6">
                <h4 class="text-white font-medium mb-2">Pembayaran</h4>
                <p class="text-sm text-gray-400 mb-3">
                    Metode: <strong class="text-white">{{ $order->payment_method === 'cod' ? 'Bayar di Tempat (COD)' : ($order->payment_method === 'bank_transfer' ? 'Virtual Account / Transfer' : ($order->payment_method === 'ewallet' ? 'E-Wallet (GoPay/DANA)' : 'Lainnya')) }}</strong>
                </p>
                @if ($order->payment_proof)
                    <img src="{{ Storage::url($order->payment_proof) }}" class="w-48 rounded-lg border border-white/10">
                @endif
            </div>

        </div>

        {{-- Kolom kanan: pelanggan & status --}}
        <div class="space-y-4">

            <div class="bg-[#161922] border border-white/5 rounded-2xl p-6">
                <h4 class="text-white font-medium mb-3">Pelanggan</h4>
                <p class="text-sm text-gray-300">{{ $order->user->name }}</p>
                <p class="text-xs text-gray-500">{{ $order->user->email }}</p>
            </div>

            <div class="bg-[#161922] border border-white/5 rounded-2xl p-6">
                <h4 class="text-white font-medium mb-3">Status Pesanan</h4>

                <form action="{{ route('admin.orders.update-status', $order) }}" method="POST" class="space-y-3">
                    @csrf
                    @method('PATCH')

                    <select name="status"
                            class="w-full bg-white/[0.02] border border-white/10 rounded-lg px-3 py-2.5 text-sm text-white focus:outline-none focus:ring-2 focus:ring-orange-400">
                        <option value="menunggu" class="bg-[#161922]" {{ $order->status === 'menunggu' ? 'selected' : '' }}>Menunggu Konfirmasi</option>
                        <option value="diproses" class="bg-[#161922]" {{ in_array($order->status, ['diproses', 'dikirim']) ? 'selected' : '' }}>Diproses & Dikirim</option>
                        <option value="selesai" class="bg-[#161922]" {{ $order->status === 'selesai' ? 'selected' : '' }}>Selesai</option>
                        <option value="dibatalkan" class="bg-[#161922]" {{ $order->status === 'dibatalkan' ? 'selected' : '' }}>Dibatalkan</option>
                    </select>

                    <button type="submit" class="w-full bg-orange-500 hover:bg-orange-600 text-white py-2.5 rounded-lg text-sm font-medium transition">
                        Update Status
                    </button>
                </form>
            </div>

        </div>

    </div>

@endsection