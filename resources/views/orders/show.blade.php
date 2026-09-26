@extends('layouts.shop')

@section('title', 'Detail Pesanan')

@section('content')

    <div class="max-w-3xl mx-auto px-6 py-10">

        <div class="bg-white dark:bg-gray-900 border dark:border-gray-800 rounded-2xl p-6 mb-4 shadow-sm">
            <div class="flex items-center justify-between mb-2">
                <div>
                    <span class="text-xs font-mono font-bold text-gray-500 dark:text-gray-400 block mb-0.5">NOMOR PESANAN</span>
                    <h2 class="text-lg font-bold text-gray-800 dark:text-white">{{ $order->order_number }}</h2>
                </div>
                <span class="text-xs font-semibold px-3.5 py-1.5 rounded-full
                    @if ($order->status === 'menunggu') bg-yellow-100 dark:bg-yellow-900/30 text-yellow-700 dark:text-yellow-400
                    @elseif ($order->status === 'diproses') bg-blue-100 dark:bg-blue-900/30 text-blue-700 dark:text-blue-400
                    @elseif ($order->status === 'dikirim') bg-purple-100 dark:bg-purple-900/30 text-purple-700 dark:text-purple-400
                    @elseif ($order->status === 'selesai') bg-green-100 dark:bg-green-900/30 text-green-700 dark:text-green-400
                    @else bg-red-100 dark:bg-red-900/30 text-red-700 dark:text-red-400
                    @endif">
                    {{ ucfirst($order->status) }}
                </span>
            </div>
            <p class="text-xs text-gray-500 dark:text-gray-400">{{ $order->created_at->translatedFormat('d M Y, H:i') }} WIB</p>
        </div>

        {{-- Order Status Tracker --}}
        <div class="bg-white dark:bg-gray-900 border dark:border-gray-800 rounded-2xl p-6 mb-4 shadow-sm overflow-hidden relative">
            @if ($order->status === 'dibatalkan')
                <div class="text-center py-4">
                    <div class="w-16 h-16 bg-red-100 dark:bg-red-900/30 text-red-500 rounded-full flex items-center justify-center mx-auto mb-3 text-3xl">❌</div>
                    <h3 class="font-bold text-gray-800 dark:text-white text-base">Pesanan Dibatalkan</h3>
                    <p class="text-xs text-gray-500 mt-1">Mohon maaf, pesanan ini tidak dapat dilanjutkan.</p>
                </div>
            @else
                <h3 class="font-bold text-gray-800 dark:text-white text-sm mb-8 text-center sm:text-left">Status Pesanan Saat Ini</h3>
                
                <div class="relative flex justify-between items-center w-full max-w-xl mx-auto px-2">
                    {{-- Garis Background --}}
                    <div class="absolute left-0 top-5 -translate-y-1/2 w-full h-1.5 bg-gray-100 dark:bg-gray-800 rounded-full z-0"></div>
                    
                    {{-- Garis Progress --}}
                    <div class="absolute left-0 top-5 -translate-y-1/2 h-1.5 bg-gradient-to-r from-orange-400 to-orange-500 rounded-full z-0 transition-all duration-1000 ease-in-out" 
                         style="width: {{ $order->status === 'menunggu' ? '0%' : ($order->status === 'diproses' ? '33%' : ($order->status === 'dikirim' ? '66%' : '100%')) }};">
                    </div>
                    
                    {{-- Step 1 --}}
                    <div class="relative z-10 flex flex-col items-center gap-2.5 w-16 group">
                        <div class="w-10 h-10 rounded-full {{ in_array($order->status, ['menunggu', 'diproses', 'dikirim', 'selesai']) ? 'bg-gradient-to-br from-orange-400 to-orange-600 text-white shadow-lg shadow-orange-500/40 ring-4 ring-orange-50 dark:ring-orange-900/30' : 'bg-gray-100 dark:bg-gray-800 text-gray-400 border border-gray-200 dark:border-gray-700' }} flex items-center justify-center text-lg transition-all duration-500 group-hover:scale-110">
                            📋
                        </div>
                        <span class="text-[10px] sm:text-xs font-bold {{ in_array($order->status, ['menunggu', 'diproses', 'dikirim', 'selesai']) ? 'text-orange-600 dark:text-orange-500' : 'text-gray-500 dark:text-gray-400' }} text-center leading-tight">Menunggu</span>
                    </div>
                    
                    {{-- Step 2 --}}
                    <div class="relative z-10 flex flex-col items-center gap-2.5 w-16 group">
                        <div class="w-10 h-10 rounded-full {{ in_array($order->status, ['diproses', 'dikirim', 'selesai']) ? 'bg-gradient-to-br from-orange-400 to-orange-600 text-white shadow-lg shadow-orange-500/40 ring-4 ring-orange-50 dark:ring-orange-900/30' : 'bg-gray-100 dark:bg-gray-800 text-gray-400 border border-gray-200 dark:border-gray-700' }} flex items-center justify-center text-lg transition-all duration-500 group-hover:scale-110">
                            👩‍🍳
                        </div>
                        <span class="text-[10px] sm:text-xs font-bold {{ in_array($order->status, ['diproses', 'dikirim', 'selesai']) ? 'text-orange-600 dark:text-orange-500' : 'text-gray-500 dark:text-gray-400' }} text-center leading-tight">Sedang<br>Dimasak</span>
                    </div>
                    
                    {{-- Step 3 --}}
                    <div class="relative z-10 flex flex-col items-center gap-2.5 w-16 group">
                        <div class="w-10 h-10 rounded-full {{ in_array($order->status, ['dikirim', 'selesai']) ? 'bg-gradient-to-br from-orange-400 to-orange-600 text-white shadow-lg shadow-orange-500/40 ring-4 ring-orange-50 dark:ring-orange-900/30' : 'bg-gray-100 dark:bg-gray-800 text-gray-400 border border-gray-200 dark:border-gray-700' }} flex items-center justify-center text-lg transition-all duration-500 group-hover:scale-110">
                            {{ $order->delivery_method === 'delivery' ? '🛵' : '🏪' }}
                        </div>
                        <span class="text-[10px] sm:text-xs font-bold {{ in_array($order->status, ['dikirim', 'selesai']) ? 'text-orange-600 dark:text-orange-500' : 'text-gray-500 dark:text-gray-400' }} text-center leading-tight">{{ $order->delivery_method === 'delivery' ? 'Sedang' : 'Siap' }}<br>{{ $order->delivery_method === 'delivery' ? 'Diantar' : 'Diambil' }}</span>
                    </div>
                    
                    {{-- Step 4 --}}
                    <div class="relative z-10 flex flex-col items-center gap-2.5 w-16 group">
                        <div class="w-10 h-10 rounded-full {{ $order->status === 'selesai' ? 'bg-gradient-to-br from-emerald-400 to-emerald-600 text-white shadow-lg shadow-emerald-500/40 ring-4 ring-emerald-50 dark:ring-emerald-900/30' : 'bg-gray-100 dark:bg-gray-800 text-gray-400 border border-gray-200 dark:border-gray-700' }} flex items-center justify-center text-lg transition-all duration-500 group-hover:scale-110">
                            ✅
                        </div>
                        <span class="text-[10px] sm:text-xs font-bold {{ $order->status === 'selesai' ? 'text-emerald-600 dark:text-emerald-500' : 'text-gray-500 dark:text-gray-400' }} text-center leading-tight">Pesanan<br>Selesai</span>
                    </div>
                </div>
                
                <div class="mt-8 p-4 sm:p-5 rounded-2xl {{ $order->status === 'selesai' ? 'bg-emerald-50 dark:bg-emerald-900/20 border-emerald-100 dark:border-emerald-800/50' : 'bg-orange-50 dark:bg-orange-900/20 border-orange-100 dark:border-orange-800/50' }} text-center border shadow-inner">
                    @if ($order->status === 'menunggu')
                        @if ($order->payment_method === 'cod')
                            <p class="text-sm font-bold text-orange-800 dark:text-orange-400 mb-1">Menunggu Konfirmasi Warung ⏳</p>
                            <p class="text-xs text-orange-600 dark:text-orange-500">Pesananmu sudah masuk. Admin kami akan segera memeriksa dan memprosesnya.</p>
                        @else
                            <p class="text-sm font-bold text-orange-800 dark:text-orange-400 mb-1">Pesanan Sedang Menunggu Pembayaran 💳</p>
                            <p class="text-xs text-orange-600 dark:text-orange-500">Kami akan segera memproses pesananmu setelah pembayaran berhasil dikonfirmasi.</p>
                        @endif
                    @elseif ($order->status === 'diproses')
                        <p class="text-sm font-bold text-orange-800 dark:text-orange-400 mb-1">Pesananmu Sedang Disiapkan! 🍳</p>
                        <p class="text-xs text-orange-600 dark:text-orange-500">Koki kami sedang memasak pesananmu dengan sepenuh hati.</p>
                    @elseif ($order->status === 'dikirim')
                        @if ($order->delivery_method === 'delivery')
                            <p class="text-sm font-bold text-orange-800 dark:text-orange-400 mb-1">Kurir Sedang Otw! 🛵💨</p>
                            <p class="text-xs text-orange-600 dark:text-orange-500">Siap-siap ya, makanan enak pesananmu segera tiba di depan pintu.</p>
                        @else
                            <p class="text-sm font-bold text-orange-800 dark:text-orange-400 mb-1">Pesanan Siap Diambil! 🏪</p>
                            <p class="text-xs text-orange-600 dark:text-orange-500">Silakan datang ke Warung Bu Karno dan tunjukkan nomor pesanan ini.</p>
                        @endif
                    @elseif ($order->status === 'selesai')
                        <p class="text-sm font-bold text-emerald-800 dark:text-emerald-400 mb-1">Pesanan Selesai! 🎉</p>
                        <p class="text-xs text-emerald-600 dark:text-emerald-500">Terima kasih sudah jajan di WarungBuKarno. Jangan lupa beri ulasan ya! ❤️</p>
                    @endif
                </div>
            @endif
        </div>

        <div class="bg-white dark:bg-gray-900 border dark:border-gray-800 rounded-2xl p-6 mb-4 shadow-sm">
            <h3 class="font-bold text-gray-800 dark:text-white text-sm mb-4">Item Pesanan</h3>
            <div class="divide-y dark:divide-gray-800">
                @php $itemsSubtotal = 0; @endphp
                @foreach ($order->items as $item)
                    @php $itemsSubtotal += $item->subtotal; @endphp
                    <div class="flex flex-col sm:flex-row justify-between py-4 text-sm gap-2">
                        <div>
                            <p class="text-gray-800 dark:text-white font-bold mb-1">{{ $item->product_name }}</p>
                            <p class="text-xs text-gray-500 dark:text-gray-400 mb-2">{{ $item->quantity }} x Rp {{ number_format($item->price, 0, ',', '.') }}</p>
                            
                            @if ($order->status === 'selesai' && $item->product)
                                @php
                                    $hasReviewed = \App\Models\Review::where('user_id', auth()->id())->where('product_id', $item->product_id)->exists();
                                @endphp
                                @if (!$hasReviewed)
                                    <button onclick="openReviewModal({{ $item->product_id }}, '{{ addslashes($item->product_name) }}')" class="inline-flex items-center gap-1.5 text-[10px] font-bold bg-orange-50 dark:bg-orange-900/30 text-orange-600 dark:text-orange-500 px-2 py-1 rounded border border-orange-200 dark:border-orange-700/50 hover:bg-orange-100 dark:hover:bg-orange-900/50 transition">
                                        ⭐ Beri Ulasan
                                    </button>
                                @else
                                    <span class="inline-flex items-center gap-1 text-[10px] font-bold text-gray-400 dark:text-gray-500">
                                        ✓ Sudah Diulas
                                    </span>
                                @endif
                            @endif
                        </div>
                        <span class="text-gray-800 dark:text-white font-semibold text-right sm:text-left mt-2 sm:mt-0">Rp {{ number_format($item->subtotal, 0, ',', '.') }}</span>
                    </div>
                @endforeach
            </div>

            <div class="border-t dark:border-gray-800 mt-3 pt-3 space-y-2 text-xs sm:text-sm">
                <div class="flex justify-between text-gray-600 dark:text-gray-400">
                    <span>Subtotal</span>
                    <span class="dark:text-gray-200">Rp {{ number_format($itemsSubtotal, 0, ',', '.') }}</span>
                </div>

                @if ($order->shipping_cost > 0)
                    <div class="flex justify-between text-gray-600 dark:text-gray-400">
                        <span>Ongkos Kirim</span>
                        <span class="dark:text-gray-200">Rp {{ number_format($order->shipping_cost, 0, ',', '.') }}</span>
                    </div>
                @endif

                @if ($order->discount_amount > 0)
                    <div class="flex justify-between text-green-600 dark:text-green-500 font-semibold">
                        <span class="flex items-center gap-1.5">
                            <span>🏷️ Diskon Promo</span>
                            @if ($order->promo_code)
                                <span class="text-[11px] font-mono bg-green-100 dark:bg-green-900/30 text-green-800 dark:text-green-400 px-2 py-0.5 rounded">{{ $order->promo_code }}</span>
                            @endif
                        </span>
                        <span>- Rp {{ number_format($order->discount_amount, 0, ',', '.') }}</span>
                    </div>
                @endif

                <div class="border-t dark:border-gray-800 pt-3 flex justify-between text-base font-bold text-gray-900 dark:text-white">
                    <span>Total Pembayaran</span>
                    <span class="text-orange-600 dark:text-orange-500">Rp {{ number_format($order->total_price, 0, ',', '.') }}</span>
                </div>
            </div>
        </div>

        <div class="bg-white dark:bg-gray-900 border dark:border-gray-800 rounded-2xl p-6 mb-4 shadow-sm">
            <h3 class="font-bold text-gray-800 dark:text-white text-sm mb-2">Pengiriman & Alamat</h3>
            <div class="mb-2">
                <span class="text-xs font-semibold px-2.5 py-1 rounded-md {{ $order->delivery_method === 'delivery' ? 'bg-orange-50 dark:bg-orange-900/30 text-orange-700 dark:text-orange-500' : 'bg-gray-100 dark:bg-gray-800 text-gray-700 dark:text-gray-300' }}">
                    {{ $order->delivery_method === 'delivery' ? '🚚 Antar ke Alamat (Kurir)' : '🏪 Ambil di Tempat (Warung)' }}
                </span>
            </div>
            <p class="text-xs sm:text-sm text-gray-600 dark:text-gray-400 whitespace-pre-line leading-relaxed">{{ $order->shipping_address }}</p>
            @if ($order->notes)
                <div class="mt-3 pt-3 border-t dark:border-gray-800 text-xs text-gray-500 dark:text-gray-400">
                    <strong class="dark:text-gray-300">Catatan:</strong> {{ $order->notes }}
                </div>
            @endif
        </div>

        <div class="bg-white dark:bg-gray-900 border dark:border-gray-800 rounded-2xl p-6 shadow-sm">
            <h3 class="font-bold text-gray-800 dark:text-white text-sm mb-2">Pembayaran</h3>
            <p class="text-xs sm:text-sm text-gray-600 dark:text-gray-400 mb-2">
                Metode: <strong class="dark:text-gray-300">{{ $order->payment_method === 'cod' ? 'Bayar di Tempat (COD)' : ($order->payment_method === 'bank_transfer' ? 'Virtual Account (Midtrans)' : ($order->payment_method === 'ewallet' ? 'E-Wallet (GoPay/DANA)' : 'Lainnya')) }}</strong>
            </p>
            @if ($order->payment_proof)
                <div class="mt-3">
                    <p class="text-xs text-gray-500 dark:text-gray-400 mb-1">Bukti Transfer:</p>
                    <img src="{{ Storage::url($order->payment_proof) }}" class="w-48 rounded-xl border dark:border-gray-700 mt-1 shadow-sm">
                </div>
            @endif

            @if (in_array($order->payment_method, ['bank_transfer', 'ewallet']) && $order->status === 'menunggu' && $order->snap_token)
                <div class="mt-4 pt-4 border-t dark:border-gray-800">
                    <button id="pay-button" class="w-full bg-blue-600 hover:bg-blue-700 text-white font-bold py-3 px-4 rounded-xl shadow-lg shadow-blue-500/30 transition-all flex justify-center items-center gap-2">
                        <span>💳</span> Bayar Sekarang
                    </button>
                </div>
            @endif
        </div>

        <a href="{{ route('home') }}" class="inline-flex items-center gap-1.5 mt-6 text-orange-500 text-sm font-semibold hover:underline">
            ← Kembali ke Beranda
        </a>

    </div>

    {{-- Review Modal --}}
    <div id="reviewModal" class="fixed inset-0 bg-gray-900/80 backdrop-blur-sm hidden items-center justify-center z-50 px-4 transition-all opacity-0">
        <div class="bg-white dark:bg-gray-900 rounded-3xl p-8 w-full max-w-md shadow-2xl relative">
            <h4 class="text-xl font-black text-gray-900 dark:text-white mb-1">Beri Ulasan</h4>
            <p class="text-sm text-gray-500 dark:text-gray-400 font-medium mb-6">Bagaimana rasa <strong id="reviewProductName" class="text-gray-800 dark:text-gray-200"></strong>?</p>

            <form action="{{ route('reviews.store') }}" method="POST">
                @csrf
                <input type="hidden" name="product_id" id="reviewProductId">

                <div class="mb-6 flex justify-center gap-2" id="starContainer">
                    @for($i = 1; $i <= 5; $i++)
                        <button type="button" class="star-btn text-3xl text-gray-300 dark:text-gray-600 hover:text-yellow-400 focus:outline-none transition-colors" data-rating="{{ $i }}" onclick="setRating({{ $i }})">
                            ★
                        </button>
                    @endfor
                </div>
                <input type="hidden" name="rating" id="reviewRating" value="5">

                <div class="mb-6">
                    <label class="block text-xs font-extrabold text-gray-700 dark:text-gray-300 uppercase tracking-wider mb-2">Komentar (Opsional)</label>
                    <textarea name="comment" rows="3" placeholder="Masakan enak, pedasnya pas..."
                              class="w-full bg-gray-50 dark:bg-gray-800 border border-gray-200 dark:border-gray-700 dark:text-white rounded-xl px-4 py-3 text-sm font-medium focus:outline-none focus:bg-white dark:focus:bg-gray-700 focus:ring-2 focus:ring-orange-500/20 focus:border-orange-500 transition-all"></textarea>
                </div>

                <div class="flex gap-3 justify-end">
                    <button type="button" onclick="closeReviewModal()"
                            class="px-5 py-2.5 rounded-xl text-sm font-bold text-gray-600 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-800 transition-colors">
                        Batal
                    </button>
                    <button type="submit" class="bg-orange-600 hover:bg-orange-700 text-white px-6 py-2.5 rounded-xl text-sm font-bold transition-colors shadow-lg shadow-orange-500/30">
                        Kirim Ulasan
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script>
        function openReviewModal(productId, productName) {
            document.getElementById('reviewProductId').value = productId;
            document.getElementById('reviewProductName').innerText = productName;
            setRating(5); // Default to 5 stars
            
            const modal = document.getElementById('reviewModal');
            modal.classList.remove('hidden');
            modal.classList.add('flex');
            // Small delay for fade transition
            setTimeout(() => {
                modal.classList.remove('opacity-0');
            }, 10);
        }

        function closeReviewModal() {
            const modal = document.getElementById('reviewModal');
            modal.classList.add('opacity-0');
            setTimeout(() => {
                modal.classList.add('hidden');
                modal.classList.remove('flex');
            }, 200);
        }

        function setRating(rating) {
            document.getElementById('reviewRating').value = rating;
            const stars = document.querySelectorAll('.star-btn');
            stars.forEach((star, index) => {
                if (index < rating) {
                    star.classList.remove('text-gray-300');
                    star.classList.add('text-yellow-400');
                } else {
                    star.classList.add('text-gray-300');
                    star.classList.remove('text-yellow-400');
                }
            });
        }
    </script>

    {{-- Payment Status Modal --}}
    <div id="paymentModal" class="fixed inset-0 bg-gray-900/80 backdrop-blur-sm hidden items-center justify-center z-50 px-4 transition-all opacity-0">
        <div class="bg-white dark:bg-gray-900 rounded-3xl p-8 w-full max-w-md shadow-2xl relative text-center">
            
            <div id="modalIconContainer" class="w-24 h-24 mx-auto mb-6 bg-green-100 dark:bg-green-900/30 rounded-full flex items-center justify-center animate-[bounce_1s_infinite]">
                <div id="modalIcon"></div>
            </div>
            
            <h4 id="modalTitle" class="text-2xl font-black text-gray-900 dark:text-white mb-2">Transfer Berhasil! 🎉</h4>
            <p id="modalDesc" class="text-sm text-gray-500 dark:text-gray-400 font-medium mb-8 leading-relaxed">
                Hore! Transaksi kamu sudah selesai. Silakan tunggu sebentar, pesanan kamu akan segera kami proses dengan penuh cinta. ❤️
            </p>

            <button onclick="window.location.reload()" class="w-full bg-gradient-to-r from-gray-800 to-gray-900 dark:from-gray-700 dark:to-gray-800 hover:from-gray-700 hover:to-gray-800 text-white px-6 py-3.5 rounded-xl text-sm font-bold transition-all shadow-lg hover:scale-105">
                Mengerti & Lanjutkan
            </button>
            
        </div>
    </div>

    @if (in_array($order->payment_method, ['bank_transfer', 'ewallet']) && $order->status === 'menunggu' && $order->snap_token)
        <script src="{{ config('midtrans.is_production') ? 'https://app.midtrans.com/snap/snap.js' : 'https://app.sandbox.midtrans.com/snap/snap.js' }}" data-client-key="{{ config('midtrans.client_key') }}"></script>
        <script>
            function showPaymentModal(type) {
                const modal = document.getElementById('paymentModal');
                const iconContainer = document.getElementById('modalIconContainer');
                const icon = document.getElementById('modalIcon');
                const title = document.getElementById('modalTitle');
                const desc = document.getElementById('modalDesc');

                if (type === 'success') {
                    iconContainer.className = 'w-24 h-24 mx-auto mb-6 bg-green-100 dark:bg-green-900/30 rounded-full flex items-center justify-center animate-[bounce_1s_infinite]';
                    icon.innerHTML = '<svg xmlns="http://www.w3.org/2000/svg" class="w-12 h-12 text-green-500 dark:text-green-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="3"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" /></svg>';
                    title.innerText = 'Transfer Berhasil! 🎉';
                    desc.innerText = 'Hore! Transaksi kamu sudah selesai. Silakan tunggu sebentar, pesanan kamu akan segera kami proses dengan penuh cinta. ❤️';
                } else if (type === 'pending') {
                    iconContainer.className = 'w-24 h-24 mx-auto mb-6 bg-yellow-100 dark:bg-yellow-900/30 rounded-full flex items-center justify-center animate-pulse';
                    icon.innerHTML = '<svg xmlns="http://www.w3.org/2000/svg" class="w-12 h-12 text-yellow-500 dark:text-yellow-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="3"><path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>';
                    title.innerText = 'Menunggu Pembayaran ⏳';
                    desc.innerText = 'Kode pembayaran sudah dibuat. Yuk, segera selesaikan pembayaranmu sesuai instruksi agar pesanan bisa langsung kami proses!';
                }

                modal.classList.remove('hidden');
                modal.classList.add('flex');
                setTimeout(() => {
                    modal.classList.remove('opacity-0');
                }, 10);
            }

            document.getElementById('pay-button').onclick = function(){
                snap.pay('{{ $order->snap_token }}', {
                    onSuccess: function(result){
                        showPaymentModal('success');
                    },
                    onPending: function(result){
                        showPaymentModal('pending');
                    },
                    onError: function(result){
                        alert("Pembayaran gagal!");
                    },
                    onClose: function(){
                        // Optional: do something when user close popup
                    }
                });
            };
        </script>
    @endif

@endsection