@extends('layouts.admin')

@section('title', 'Kelola Ulasan')
@section('header', 'Kelola Ulasan Pelanggan')

@section('content')

    <div class="mb-6">
        <p class="text-gray-400 text-sm">Pantau dan kelola semua ulasan (rating dan komentar) yang diberikan pelanggan.</p>
    </div>

    <div class="bg-gray-800 rounded-2xl border border-gray-700 shadow-xl overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-gray-900/50 border-b border-gray-700 text-gray-400 text-xs font-semibold uppercase tracking-wider">
                        <th class="px-6 py-4">Menu & Bintang</th>
                        <th class="px-6 py-4">Komentar</th>
                        <th class="px-6 py-4">Pelanggan</th>
                        <th class="px-6 py-4">Tanggal</th>
                        <th class="px-6 py-4 text-right">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-700/50">
                    @forelse ($reviews as $review)
                        <tr class="hover:bg-gray-700/20 transition-colors">
                            <td class="px-6 py-4">
                                <p class="text-sm font-bold text-gray-200 mb-1">{{ $review->product->name ?? 'Menu Dihapus' }}</p>
                                <div class="flex text-lg">
                                    @for($i = 1; $i <= 5; $i++)
                                        <span class="{{ $i <= $review->rating ? 'text-yellow-400' : 'text-gray-600' }}">★</span>
                                    @endfor
                                </div>
                            </td>
                            <td class="px-6 py-4 max-w-xs">
                                @if($review->comment)
                                    <p class="text-sm text-gray-300 line-clamp-3 leading-relaxed">{{ $review->comment }}</p>
                                @else
                                    <span class="text-xs italic text-gray-500">Tanpa komentar</span>
                                @endif
                            </td>
                            <td class="px-6 py-4">
                                <p class="text-sm font-semibold text-gray-300">{{ $review->user->name ?? 'User Dihapus' }}</p>
                                <p class="text-xs text-gray-500">{{ $review->user->email ?? '' }}</p>
                            </td>
                            <td class="px-6 py-4">
                                <p class="text-sm text-gray-300">{{ $review->created_at->format('d M Y') }}</p>
                                <p class="text-xs text-gray-500">{{ $review->created_at->format('H:i') }} WIB</p>
                            </td>
                            <td class="px-6 py-4 text-right">
                                <form action="{{ route('admin.reviews.destroy', $review) }}" method="POST" class="inline-block" onsubmit="return confirm('Yakin ingin menghapus ulasan ini secara permanen?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="p-2 bg-gray-700/50 hover:bg-red-500/20 text-gray-400 hover:text-red-400 rounded-lg transition-colors border border-gray-600 hover:border-red-500/30" title="Hapus Ulasan">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                        </svg>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="px-6 py-12 text-center text-gray-500">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-12 h-12 mx-auto mb-3 text-gray-600" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M11.48 3.499a.562.562 0 011.04 0l2.125 5.111a.563.563 0 00.475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 00-.182.557l1.285 5.385a.562.562 0 01-.84.61l-4.725-2.885a.563.563 0 00-.586 0L6.982 20.54a.562.562 0 01-.84-.61l1.285-5.386a.562.562 0 00-.182-.557l-4.204-3.602a.563.563 0 01.321-.988l5.518-.442a.563.563 0 00.475-.345L11.48 3.5z" />
                                </svg>
                                <p class="font-medium text-sm">Belum ada ulasan dari pelanggan.</p>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        @if ($reviews->hasPages())
            <div class="px-6 py-4 border-t border-gray-700">
                {{ $reviews->links() }}
            </div>
        @endif
    </div>

@endsection
