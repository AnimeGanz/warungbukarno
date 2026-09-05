@extends('layouts.admin')

@section('title', 'Kelola Promo')

@section('content')

    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 mb-6">
        <div>
            <h3 class="text-xl font-semibold text-white">Daftar Promo & Voucher</h3>
            <p class="text-sm text-gray-500">Kelola kupon potongan harga, diskon, dan gratis ongkir untuk pelanggan</p>
        </div>
        <a href="{{ route('admin.promos.create') }}"
           class="bg-orange-500 hover:bg-orange-600 text-white px-4 py-2.5 rounded-lg text-sm font-medium transition inline-flex items-center gap-1.5 shadow-sm">
            <span>+ Tambah Promo Baru</span>
        </a>
    </div>

    {{-- Filter / Search Bar --}}
    <div class="bg-[#161922] border border-white/5 rounded-2xl p-4 mb-6">
        <form action="{{ route('admin.promos.index') }}" method="GET" class="flex flex-col sm:flex-row gap-3">
            <div class="flex-1">
                <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari kode promo atau judul..."
                       class="w-full bg-white/[0.02] border border-white/10 rounded-lg px-3.5 py-2 text-sm text-white placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-orange-400">
            </div>
            <div class="w-full sm:w-48">
                <select name="status" class="w-full bg-[#161922] border border-white/10 rounded-lg px-3 py-2 text-sm text-white focus:outline-none focus:ring-2 focus:ring-orange-400">
                    <option value="">Semua Status</option>
                    <option value="active" {{ request('status') === 'active' ? 'selected' : '' }}>Aktif</option>
                    <option value="inactive" {{ request('status') === 'inactive' ? 'selected' : '' }}>Nonaktif</option>
                </select>
            </div>
            <button type="submit" class="px-5 py-2 bg-white/10 hover:bg-white/20 text-white rounded-lg text-sm font-medium transition">
                Filter
            </button>
            @if (request()->hasAny(['search', 'status']))
                <a href="{{ route('admin.promos.index') }}" class="px-3.5 py-2 text-gray-400 hover:text-white text-sm flex items-center justify-center">
                    Reset
                </a>
            @endif
        </form>
    </div>

    <div class="bg-[#161922] border border-white/5 rounded-2xl overflow-hidden shadow-sm">
        <div class="overflow-x-auto">
            <table class="w-full text-sm text-left">
                <thead class="bg-white/5 text-gray-400 uppercase text-xs">
                    <tr>
                        <th class="px-6 py-3.5">Kode & Judul</th>
                        <th class="px-6 py-3.5">Tipe Diskon</th>
                        <th class="px-6 py-3.5">Min. Belanja</th>
                        <th class="px-6 py-3.5">Masa Berlaku</th>
                        <th class="px-6 py-3.5">Pemakaian</th>
                        <th class="px-6 py-3.5">Status</th>
                        <th class="px-6 py-3.5 text-right">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-white/5">
                    @forelse ($promos as $promo)
                        <tr class="hover:bg-white/[0.02] transition">
                            <td class="px-6 py-4">
                                <div class="flex items-center gap-2 mb-1">
                                    <span class="font-mono font-bold text-orange-400 bg-orange-500/10 border border-orange-500/20 px-2 py-0.5 rounded text-xs">
                                        {{ $promo->code }}
                                    </span>
                                    <span class="text-[11px] text-gray-400 bg-white/5 px-2 py-0.5 rounded">
                                        {{ $promo->badge }}
                                    </span>
                                </div>
                                <p class="font-semibold text-white text-sm">{{ $promo->title }}</p>
                                <p class="text-xs text-gray-500 line-clamp-1 max-w-xs">{{ $promo->description }}</p>
                            </td>
                            <td class="px-6 py-4">
                                @if ($promo->type === 'percent')
                                    <span class="text-green-400 font-semibold">{{ $promo->discount_value }}%</span>
                                    @if ($promo->max_discount_amount)
                                        <p class="text-[11px] text-gray-500">Maks. Rp {{ number_format($promo->max_discount_amount, 0, ',', '.') }}</p>
                                    @endif
                                @elseif ($promo->type === 'fixed_amount')
                                    <span class="text-blue-400 font-semibold">Rp {{ number_format($promo->discount_value, 0, ',', '.') }}</span>
                                @else
                                    <span class="text-amber-400 font-semibold">Gratis Ongkir</span>
                                @endif
                                @if ($promo->new_user_only)
                                    <span class="block text-[10px] text-orange-400 mt-0.5 font-medium">Khusus Pengguna Baru</span>
                                @endif
                            </td>
                            <td class="px-6 py-4 text-gray-300">
                                @if ($promo->min_order_amount > 0)
                                    Rp {{ number_format($promo->min_order_amount, 0, ',', '.') }}
                                @else
                                    <span class="text-gray-500">Tanpa Min.</span>
                                @endif
                            </td>
                            <td class="px-6 py-4 text-xs text-gray-400">
                                @if ($promo->start_date || $promo->end_date)
                                    <p>{{ $promo->start_date ? $promo->start_date->format('d/m/Y') : 'Sekarang' }}</p>
                                    <p class="text-gray-500">s/d {{ $promo->end_date ? $promo->end_date->format('d/m/Y') : 'Selamanya' }}</p>
                                @else
                                    <span class="text-gray-500">Selalu Berlaku</span>
                                @endif
                            </td>
                            <td class="px-6 py-4 text-xs">
                                <span class="font-bold text-white">{{ $promo->used_count }}</span>
                                @if ($promo->usage_limit)
                                    <span class="text-gray-500">/ {{ $promo->usage_limit }} kuota</span>
                                @else
                                    <span class="text-gray-500">kali dipakai</span>
                                @endif
                            </td>
                            <td class="px-6 py-4">
                                <form action="{{ route('admin.promos.toggle', $promo) }}" method="POST">
                                    @csrf
                                    @method('PATCH')
                                    <button type="submit" class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-xs font-medium transition {{ $promo->is_active ? 'bg-green-500/10 text-green-400 border border-green-500/20 hover:bg-green-500/20' : 'bg-red-500/10 text-red-400 border border-red-500/20 hover:bg-red-500/20' }}">
                                        <span class="w-1.5 h-1.5 rounded-full {{ $promo->is_active ? 'bg-green-400' : 'bg-red-400' }}"></span>
                                        {{ $promo->is_active ? 'Aktif' : 'Nonaktif' }}
                                    </button>
                                </form>
                            </td>
                            <td class="px-6 py-4 text-right space-x-3 whitespace-nowrap">
                                <a href="{{ route('admin.promos.edit', $promo) }}" class="text-orange-400 hover:text-orange-300 font-medium text-xs">Edit</a>
                                <form action="{{ route('admin.promos.destroy', $promo) }}" method="POST" class="inline"
                                      onsubmit="return confirm('Yakin ingin menghapus promo {{ $promo->code }}?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-400 hover:text-red-300 font-medium text-xs">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="px-6 py-12 text-center text-gray-500">
                                Belum ada data promo. Klik tombol di atas untuk membuat promo baru!
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <div class="mt-4 text-gray-400">
        {{ $promos->links() }}
    </div>

@endsection
