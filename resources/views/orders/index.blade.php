@extends('layouts.shop')

@section('title', 'Pesanan Saya')

@section('content')

    <div class="max-w-3xl mx-auto px-6 py-10">

        <h2 class="text-xl font-semibold text-gray-800 dark:text-white mb-6">Pesanan Saya</h2>

        @if ($orders->isEmpty())
            <div class="bg-white dark:bg-gray-900 border dark:border-gray-800 rounded-2xl p-16 text-center text-gray-400 dark:text-gray-500 shadow-sm">
                Belum ada pesanan.
            </div>
        @else
            <div class="space-y-3">
                @foreach ($orders as $order)
                    <a href="{{ route('orders.show', $order) }}" class="block bg-white dark:bg-gray-900 border dark:border-gray-800 rounded-2xl p-5 hover:shadow-md dark:hover:shadow-none transition">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="font-medium text-gray-800 dark:text-white text-sm">{{ $order->order_number }}</p>
                                <p class="text-xs text-gray-500 dark:text-gray-400">{{ $order->created_at->translatedFormat('d M Y, H:i') }}</p>
                            </div>
                            <div class="text-right">
                                <span class="text-xs px-2 py-1 rounded-full
                                    @if ($order->status === 'menunggu') bg-yellow-100 dark:bg-yellow-900/30 text-yellow-700 dark:text-yellow-400
                                    @elseif ($order->status === 'diproses') bg-blue-100 dark:bg-blue-900/30 text-blue-700 dark:text-blue-400
                                    @elseif ($order->status === 'dikirim') bg-purple-100 dark:bg-purple-900/30 text-purple-700 dark:text-purple-400
                                    @elseif ($order->status === 'selesai') bg-green-100 dark:bg-green-900/30 text-green-700 dark:text-green-400
                                    @else bg-red-100 dark:bg-red-900/30 text-red-700 dark:text-red-400
                                    @endif">
                                    {{ ucfirst($order->status) }}
                                </span>
                                <p class="text-sm font-semibold text-gray-800 dark:text-white mt-1">Rp {{ number_format($order->total_price, 0, ',', '.') }}</p>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>
        @endif

    </div>

@endsection