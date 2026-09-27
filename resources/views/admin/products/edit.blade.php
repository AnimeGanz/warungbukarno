@extends('layouts.admin')

@section('title', 'Edit Produk')

@section('content')

    <div class="mb-6">
        <h3 class="text-xl font-semibold text-white">Edit Produk</h3>
        <p class="text-sm text-gray-500">Perbarui detail menu "{{ $product->name }}"</p>
    </div>

    <form action="{{ route('admin.products.update', $product) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 max-w-5xl">

            {{-- Kolom kiri: foto & status --}}
            <div class="lg:col-span-1 space-y-4">
                <div class="bg-[#161922] border border-white/5 rounded-2xl p-5">
                    <label class="block text-sm font-medium text-gray-300 mb-3">Foto Produk</label>

                    <label for="imageInput" class="cursor-pointer block">
                        <div id="imagePreview"
                             class="w-full aspect-square rounded-xl bg-white/[0.02] border-2 border-dashed border-white/10 flex flex-col items-center justify-center text-gray-500 hover:border-orange-400 hover:text-orange-400 transition overflow-hidden">
                            @if ($product->image)
                                <img src="{{ Storage::url($product->image) }}" class="w-full h-full object-cover">
                            @else
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 mb-2" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 16.5V9.75m0 0l-3.75 3.75M12 9.75l3.75 3.75M3 21h18M3 12h18M3 3h18" />
                                </svg>
                                <span class="text-xs">Klik untuk upload foto</span>
                            @endif
                        </div>
                    </label>
                    <input id="imageInput" type="file" name="image" accept="image/*" class="hidden"
                           onchange="previewImage(event)">
                    @error('image')
                        <p class="text-red-400 text-xs mt-2">{{ $message }}</p>
                    @enderror
                    <p class="text-xs text-gray-600 mt-2">Kosongkan kalau tidak ganti foto</p>
                </div>

                <div class="bg-[#161922] border border-white/5 rounded-2xl p-5">
                    <label class="flex items-center gap-2 cursor-pointer">
                        <input type="checkbox" name="is_available" value="1" {{ $product->is_available ? 'checked' : '' }}
                               class="rounded bg-white/5 border-white/10 text-orange-500 focus:ring-orange-400 w-4 h-4">
                        <span class="text-sm font-medium text-gray-300">Produk aktif</span>
                    </label>
                    <p class="text-xs text-gray-600 mt-1 ml-6">Produk langsung bisa dipesan pembeli</p>
                </div>

                <div class="bg-[#161922] border border-white/5 rounded-2xl p-5">
                    <label class="flex items-center gap-2 cursor-pointer">
                        <input type="checkbox" name="is_recommended" value="1" {{ $product->is_recommended ? 'checked' : '' }}
                               class="rounded bg-white/5 border-white/10 text-orange-500 focus:ring-orange-400 w-4 h-4">
                        <span class="text-sm font-medium text-gray-300">Menu Rekomendasi</span>
                    </label>
                    <p class="text-xs text-gray-600 mt-1 ml-6">Tandai sebagai menu yang paling disukai / direkomendasikan</p>
                </div>
            </div>

            {{-- Kolom kanan: detail produk --}}
            <div class="lg:col-span-2">
                <div class="bg-[#161922] border border-white/5 rounded-2xl p-6 space-y-5">

                    <div>
                        <label class="block text-sm font-medium text-gray-300 mb-1">Nama Produk</label>
                        <input type="text" name="name" value="{{ old('name', $product->name) }}"
                               class="w-full bg-white/[0.02] border border-white/10 rounded-lg px-3 py-2.5 text-sm text-white placeholder-gray-600 focus:outline-none focus:ring-2 focus:ring-orange-400 focus:border-orange-400">
                        @error('name')
                            <p class="text-red-400 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-300 mb-1">Kategori</label>
                        <select name="category_id"
                                class="w-full bg-white/[0.02] border border-white/10 rounded-lg px-3 py-2.5 text-sm text-white focus:outline-none focus:ring-2 focus:ring-orange-400 focus:border-orange-400">
                            <option value="" class="bg-[#161922]">-- Pilih Kategori --</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}" class="bg-[#161922]" {{ old('category_id', $product->category_id) == $category->id ? 'selected' : '' }}>
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('category_id')
                            <p class="text-red-400 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-300 mb-1">Deskripsi</label>
                        <textarea name="description" rows="3"
                                  class="w-full bg-white/[0.02] border border-white/10 rounded-lg px-3 py-2.5 text-sm text-white placeholder-gray-600 focus:outline-none focus:ring-2 focus:ring-orange-400 focus:border-orange-400">{{ old('description', $product->description) }}</textarea>
                    </div>

                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-300 mb-1">Harga (Rp)</label>
                            <input type="text" inputmode="numeric" id="priceDisplay"
                                   value="{{ number_format(old('price', $product->price), 0, ',', '.') }}"
                                   class="w-full bg-white/[0.02] border border-white/10 rounded-lg px-3 py-2.5 text-sm text-white placeholder-gray-600 focus:outline-none focus:ring-2 focus:ring-orange-400 focus:border-orange-400"
                                   oninput="formatPrice(this)">
                            <input type="hidden" name="price" id="priceValue" value="{{ old('price', $product->price) }}">
                            @error('price')
                                <p class="text-red-400 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-300 mb-1">Stok</label>
                            <input type="number" name="stock" value="{{ old('stock', $product->stock) }}"
                                   class="w-full bg-white/[0.02] border border-white/10 rounded-lg px-3 py-2.5 text-sm text-white focus:outline-none focus:ring-2 focus:ring-orange-400 focus:border-orange-400">
                            @error('stock')
                                <p class="text-red-400 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="flex gap-3 pt-3 border-t border-white/5">
                        <button type="submit"
                                class="bg-orange-500 hover:bg-orange-600 text-white px-6 py-2.5 rounded-lg text-sm font-medium transition">
                            Simpan Perubahan
                        </button>
                        <a href="{{ route('admin.products.index') }}"
                           class="border border-white/10 px-6 py-2.5 rounded-lg text-sm font-medium text-gray-300 hover:bg-white/5 transition">
                            Batal
                        </a>
                    </div>

                </div>
            </div>

        </div>
    </form>

    <script>
        function previewImage(event) {
            const preview = document.getElementById('imagePreview');
            const file = event.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function (e) {
                    preview.innerHTML = `<img src="${e.target.result}" class="w-full h-full object-cover">`;
                };
                reader.readAsDataURL(file);
            }
        }

        function formatPrice(input) {
            let value = input.value.replace(/\D/g, '');
            document.getElementById('priceValue').value = value;
            input.value = value ? new Intl.NumberFormat('id-ID').format(value) : '';
        }
    </script>

@endsection