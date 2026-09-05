@extends('layouts.admin')

@section('title', 'Tambah Promo')

@section('content')

    <div class="mb-6">
        <h3 class="text-xl font-semibold text-white">Tambah Promo Baru</h3>
        <p class="text-sm text-gray-500">Buat voucher diskon atau gratis ongkir untuk pelanggan</p>
    </div>

    <form action="{{ route('admin.promos.store') }}" method="POST">
        @csrf

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 max-w-5xl">

            {{-- Kolom Kiri: Status & Opsi Khusus --}}
            <div class="lg:col-span-1 space-y-4">
                <div class="bg-[#161922] border border-white/5 rounded-2xl p-5 space-y-4">
                    <div>
                        <label class="flex items-center gap-2 cursor-pointer">
                            <input type="checkbox" name="is_active" value="1" {{ old('is_active', '1') ? 'checked' : '' }}
                                   class="rounded bg-white/5 border-white/10 text-orange-500 focus:ring-orange-400 w-4 h-4">
                            <span class="text-sm font-medium text-gray-300">Promo Langsung Aktif</span>
                        </label>
                        <p class="text-xs text-gray-600 mt-1 ml-6">Pelanggan bisa langsung menggunakan kode ini</p>
                    </div>

                    <div class="border-t border-white/5 pt-3">
                        <label class="flex items-center gap-2 cursor-pointer">
                            <input type="checkbox" name="new_user_only" value="1" {{ old('new_user_only') ? 'checked' : '' }}
                                   class="rounded bg-white/5 border-white/10 text-orange-500 focus:ring-orange-400 w-4 h-4">
                            <span class="text-sm font-medium text-gray-300">Khusus Pesanan Pertama</span>
                        </label>
                        <p class="text-xs text-gray-600 mt-1 ml-6">Hanya berlaku untuk pelanggan baru</p>
                    </div>
                </div>

                <div class="bg-[#161922] border border-white/5 rounded-2xl p-5 space-y-4">
                    <h4 class="text-xs font-semibold uppercase tracking-wider text-gray-400">Periode & Batasan</h4>

                    <div>
                        <label class="block text-xs text-gray-400 mb-1">Tanggal Mulai</label>
                        <input type="date" name="start_date" value="{{ old('start_date') }}"
                               class="w-full bg-white/[0.02] border border-white/10 rounded-lg px-3 py-2 text-xs text-white focus:outline-none focus:ring-2 focus:ring-orange-400">
                    </div>

                    <div>
                        <label class="block text-xs text-gray-400 mb-1">Tanggal Berakhir</label>
                        <input type="date" name="end_date" value="{{ old('end_date') }}"
                               class="w-full bg-white/[0.02] border border-white/10 rounded-lg px-3 py-2 text-xs text-white focus:outline-none focus:ring-2 focus:ring-orange-400">
                    </div>

                    <div>
                        <label class="block text-xs text-gray-400 mb-1">Batas Kuota Pemakaian (Opsional)</label>
                        <input type="number" name="usage_limit" value="{{ old('usage_limit') }}" placeholder="Kosongkan jika tak terbatas"
                               class="w-full bg-white/[0.02] border border-white/10 rounded-lg px-3 py-2 text-xs text-white placeholder-gray-600 focus:outline-none focus:ring-2 focus:ring-orange-400">
                    </div>
                </div>
            </div>

            {{-- Kolom Kanan: Informasi Utama Promo --}}
            <div class="lg:col-span-2">
                <div class="bg-[#161922] border border-white/5 rounded-2xl p-6 space-y-5">

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-300 mb-1">Kode Promo <span class="text-orange-400">*</span></label>
                            <input type="text" name="code" value="{{ old('code') }}" placeholder="Contoh: HEMAT20" required
                                   class="w-full bg-white/[0.02] border border-white/10 rounded-lg px-3.5 py-2.5 text-sm text-white font-mono uppercase placeholder-gray-600 focus:outline-none focus:ring-2 focus:ring-orange-400">
                            @error('code')
                                <p class="text-red-400 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-300 mb-1">Badge Label <span class="text-orange-400">*</span></label>
                            <input type="text" name="badge" value="{{ old('badge', 'Diskon Spesial') }}" placeholder="Contoh: Pelanggan Baru, Weekend Sale" required
                                   class="w-full bg-white/[0.02] border border-white/10 rounded-lg px-3.5 py-2.5 text-sm text-white placeholder-gray-600 focus:outline-none focus:ring-2 focus:ring-orange-400">
                            @error('badge')
                                <p class="text-red-400 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-300 mb-1">Judul Promo <span class="text-orange-400">*</span></label>
                        <input type="text" name="title" value="{{ old('title') }}" placeholder="Contoh: Diskon 20% Semua Menu" required
                               class="w-full bg-white/[0.02] border border-white/10 rounded-lg px-3.5 py-2.5 text-sm text-white placeholder-gray-600 focus:outline-none focus:ring-2 focus:ring-orange-400">
                        @error('title')
                            <p class="text-red-400 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-300 mb-1">Deskripsi Singkat</label>
                        <textarea name="description" rows="2" placeholder="Jelaskan syarat atau keuntungan promo ini..."
                                  class="w-full bg-white/[0.02] border border-white/10 rounded-lg px-3.5 py-2.5 text-sm text-white placeholder-gray-600 focus:outline-none focus:ring-2 focus:ring-orange-400">{{ old('description') }}</textarea>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-300 mb-1">Tipe Diskon <span class="text-orange-400">*</span></label>
                            <select name="type" id="promoType" onchange="toggleDiscountFields()" required
                                    class="w-full bg-[#161922] border border-white/10 rounded-lg px-3 py-2.5 text-sm text-white focus:outline-none focus:ring-2 focus:ring-orange-400">
                                <option value="percent" {{ old('type') === 'percent' ? 'selected' : '' }}>Persentase (%)</option>
                                <option value="fixed_amount" {{ old('type') === 'fixed_amount' ? 'selected' : '' }}>Nominal Tetap (Rp)</option>
                                <option value="free_shipping" {{ old('type') === 'free_shipping' ? 'selected' : '' }}>Gratis Ongkir</option>
                            </select>
                        </div>

                        <div id="discountValueBox">
                            <label class="block text-sm font-medium text-gray-300 mb-1" id="discountValueLabel">Nilai Diskon (%)</label>
                            <input type="number" step="any" name="discount_value" id="discountValue" value="{{ old('discount_value', 10) }}" required
                                   class="w-full bg-white/[0.02] border border-white/10 rounded-lg px-3.5 py-2.5 text-sm text-white focus:outline-none focus:ring-2 focus:ring-orange-400">
                        </div>

                        <div id="maxDiscountBox">
                            <label class="block text-sm font-medium text-gray-300 mb-1">Maks. Potongan (Rp)</label>
                            <input type="number" name="max_discount_amount" value="{{ old('max_discount_amount') }}" placeholder="Opsional"
                                   class="w-full bg-white/[0.02] border border-white/10 rounded-lg px-3.5 py-2.5 text-sm text-white placeholder-gray-600 focus:outline-none focus:ring-2 focus:ring-orange-400">
                        </div>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-300 mb-1">Minimal Belanja (Rp) <span class="text-orange-400">*</span></label>
                        <input type="number" name="min_order_amount" value="{{ old('min_order_amount', 0) }}" required
                               class="w-full bg-white/[0.02] border border-white/10 rounded-lg px-3.5 py-2.5 text-sm text-white focus:outline-none focus:ring-2 focus:ring-orange-400">
                        <p class="text-xs text-gray-600 mt-1">Masukkan 0 jika tidak ada syarat minimal belanja</p>
                    </div>

                    <div class="flex gap-3 pt-4 border-t border-white/5">
                        <button type="submit"
                                class="bg-orange-500 hover:bg-orange-600 text-white px-6 py-2.5 rounded-lg text-sm font-medium transition shadow-sm">
                            Simpan Promo
                        </button>
                        <a href="{{ route('admin.promos.index') }}"
                           class="border border-white/10 px-6 py-2.5 rounded-lg text-sm font-medium text-gray-300 hover:bg-white/5 transition">
                            Batal
                        </a>
                    </div>

                </div>
            </div>

        </div>
    </form>

    <script>
        function toggleDiscountFields() {
            const type = document.getElementById('promoType').value;
            const valBox = document.getElementById('discountValueBox');
            const valLabel = document.getElementById('discountValueLabel');
            const maxBox = document.getElementById('maxDiscountBox');

            if (type === 'free_shipping') {
                valBox.classList.add('hidden');
                maxBox.classList.add('hidden');
                document.getElementById('discountValue').value = 0;
            } else if (type === 'fixed_amount') {
                valBox.classList.remove('hidden');
                maxBox.classList.add('hidden');
                valLabel.textContent = 'Nominal Potongan (Rp)';
            } else {
                valBox.classList.remove('hidden');
                maxBox.classList.remove('hidden');
                valLabel.textContent = 'Nilai Diskon (%)';
            }
        }
        toggleDiscountFields();
    </script>

@endsection
