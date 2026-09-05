@extends('layouts.admin')

@section('title', 'Kelola Pengguna')
@section('header', 'Kelola Pengguna')

@section('content')

    <div class="mb-6">
        <p class="text-gray-400 text-sm">Kelola akun, peran (role), dan akses pengguna sistem.</p>
    </div>

    @if (session('success'))
        <div class="bg-green-500/10 border border-green-500/20 text-green-400 px-4 py-3 rounded-xl text-sm font-medium mb-6 flex items-center gap-2">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
            {{ session('success') }}
        </div>
    @endif

    @if (session('error'))
        <div class="bg-red-500/10 border border-red-500/20 text-red-400 px-4 py-3 rounded-xl text-sm font-medium mb-6 flex items-center gap-2">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
            </svg>
            {{ session('error') }}
        </div>
    @endif

    <div class="bg-gray-800 rounded-2xl border border-gray-700 shadow-xl overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-gray-900/50 border-b border-gray-700 text-gray-400 text-xs font-semibold uppercase tracking-wider">
                        <th class="px-6 py-4">Pengguna</th>
                        <th class="px-6 py-4">Peran (Role)</th>
                        <th class="px-6 py-4">Terdaftar</th>
                        <th class="px-6 py-4 text-right">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-700/50">
                    @forelse ($users as $user)
                        <tr class="hover:bg-gray-700/20 transition-colors">
                            <td class="px-6 py-4">
                                <div class="flex items-center gap-3">
                                    <div class="w-10 h-10 rounded-xl overflow-hidden bg-gray-700 flex items-center justify-center border border-gray-600 flex-shrink-0">
                                        @if ($user->avatar)
                                            <img src="{{ Storage::url($user->avatar) }}" class="w-full h-full object-cover">
                                        @else
                                            <span class="text-gray-300 font-bold text-sm">{{ strtoupper(substr($user->name, 0, 2)) }}</span>
                                        @endif
                                    </div>
                                    <div>
                                        <p class="text-sm font-semibold text-gray-200">{{ $user->name }}</p>
                                        <p class="text-xs text-gray-500">{{ $user->email }}</p>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                <form action="{{ route('admin.users.update-role', $user) }}" method="POST" class="inline-block">
                                    @csrf
                                    @method('PATCH')
                                    <select name="role" onchange="this.form.submit()" 
                                            class="bg-gray-900 border border-gray-700 text-xs rounded-lg px-2 py-1.5 font-semibold focus:outline-none focus:border-orange-500 focus:ring-1 focus:ring-orange-500 transition-colors
                                            {{ $user->role === 'admin' ? 'text-orange-400' : 'text-gray-400' }}"
                                            {{ $user->id === auth()->id() ? 'disabled' : '' }}>
                                        <option value="customer" {{ $user->role === 'customer' ? 'selected' : '' }}>PELANGGAN</option>
                                        <option value="admin" {{ $user->role === 'admin' ? 'selected' : '' }}>ADMIN</option>
                                    </select>
                                </form>
                            </td>
                            <td class="px-6 py-4">
                                <p class="text-sm text-gray-300">{{ $user->created_at->format('d M Y') }}</p>
                                <p class="text-xs text-gray-500">{{ $user->created_at->diffForHumans() }}</p>
                            </td>
                            <td class="px-6 py-4 text-right">
                                @if ($user->id !== auth()->id())
                                    <form action="{{ route('admin.users.destroy', $user) }}" method="POST" class="inline-block" onsubmit="return confirm('Yakin ingin menghapus pengguna ini secara permanen?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="p-2 bg-gray-700/50 hover:bg-red-500/20 text-gray-400 hover:text-red-400 rounded-lg transition-colors border border-gray-600 hover:border-red-500/30" title="Hapus Pengguna">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                            </svg>
                                        </button>
                                    </form>
                                @else
                                    <span class="text-xs font-semibold text-gray-500 italic">Anda (Saat ini)</span>
                                @endif
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="px-6 py-12 text-center text-gray-500">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-12 h-12 mx-auto mb-3 text-gray-600" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
                                </svg>
                                <p class="font-medium text-sm">Belum ada pengguna terdaftar.</p>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        @if ($users->hasPages())
            <div class="px-6 py-4 border-t border-gray-700">
                {{ $users->links() }}
            </div>
        @endif
    </div>

@endsection
