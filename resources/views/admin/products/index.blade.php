@extends('layouts.admin')

@section('title', 'Kelola Produk')

@section('content')

    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 mb-6">
        <div>
            <h3 class="text-xl font-bold text-white tracking-tight">Daftar Menu & Produk</h3>
            <p class="text-sm text-gray-400">Kelola menu makanan, harga, ketersediaan stok, dan foto makanan</p>
        </div>
        <a href="{{ route('admin.products.create') }}"
           class="bg-orange-500 hover:bg-orange-600 text-white px-4 py-2.5 rounded-xl text-xs font-bold transition inline-flex items-center gap-1.5 shadow-lg shadow-orange-500/25">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
            </svg>
            <span>+ Tambah Menu Baru</span>
        </a>
    </div>

    <div class="bg-[#131722] border border-white/[0.08] rounded-3xl overflow-hidden shadow-xl shadow-black/10">
        <div class="overflow-x-auto">
            <table class="w-full text-xs text-left">
                <thead class="bg-white/[0.03] text-gray-400 uppercase text-[10px] tracking-wider border-b border-white/[0.05]">
                    <tr>
                        <th class="px-6 py-3.5">Foto</th>
                        <th class="px-6 py-3.5">Nama Menu</th>
                        <th class="px-6 py-3.5">Kategori</th>
                        <th class="px-6 py-3.5">Harga</th>
                        <th class="px-6 py-3.5">Stok</th>
                        <th class="px-6 py-3.5">Status</th>
                        <th class="px-6 py-3.5 text-right">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-white/[0.05]">
                    @forelse ($products as $product)
                        <tr class="hover:bg-white/[0.02] transition">
                            <td class="px-6 py-3.5">
                                @if ($product->image)
                                    <img src="{{ Storage::url($product->image) }}" alt="{{ $product->name }}" class="w-12 h-12 rounded-xl object-cover border border-white/10 shadow-sm">
                                @else
                                    <div class="w-12 h-12 rounded-xl bg-white/[0.04] border border-white/10 flex items-center justify-center text-gray-500 text-[10px] font-bold">
                                        N/A
                                    </div>
                                @endif
                            </td>
                            <td class="px-6 py-3.5">
                                <p class="font-bold text-white text-sm">{{ $product->name }}</p>
                                <p class="text-[11px] text-gray-500 line-clamp-1 max-w-xs">{{ $product->description }}</p>
                            </td>
                            <td class="px-6 py-3.5">
                                <span class="px-2.5 py-1 rounded-md bg-white/[0.04] border border-white/[0.08] text-gray-300 font-medium">
                                    {{ $product->category->name }}
                                </span>
                            </td>
                            <td class="px-6 py-3.5 text-gray-200 font-semibold">
                                Rp {{ number_format($product->price, 0, ',', '.') }}
                            </td>
                            <td class="px-6 py-3.5">
                                <span class="font-bold {{ $product->stock > 5 ? 'text-gray-300' : 'text-amber-400' }}">
                                    {{ $product->stock }} porsi
                                </span>
                            </td>
                            <td class="px-6 py-3.5">
                                @if ($product->is_available)
                                    <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-xs font-semibold bg-emerald-500/15 text-emerald-400 border border-emerald-500/30">
                                        <span class="w-1.5 h-1.5 rounded-full bg-emerald-400"></span>
                                        Tersedia
                                    </span>
                                @else
                                    <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-xs font-semibold bg-white/5 text-gray-400 border border-white/10">
                                        <span class="w-1.5 h-1.5 rounded-full bg-gray-500"></span>
                                        Habis
                                    </span>
                                @endif
                            </td>
                            <td class="px-6 py-3.5 text-right space-x-3 whitespace-nowrap">
                                <a href="{{ route('admin.products.edit', $product) }}" class="text-orange-400 hover:text-orange-300 font-semibold text-xs transition">Edit</a>
                                <form action="{{ route('admin.products.destroy', $product) }}" method="POST" class="inline"
                                      onsubmit="return confirm('Yakin ingin menghapus produk {{ $product->name }}?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-rose-400 hover:text-rose-300 font-semibold text-xs transition">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="px-6 py-12 text-center text-gray-500">
                                Belum ada menu makanan. Klik tombol di atas untuk menambah menu!
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <div class="mt-5">
        {{ $products->links() }}
    </div>

@endsection