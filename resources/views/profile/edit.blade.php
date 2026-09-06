@extends('layouts.shop')

@section('title', 'Profil Saya')

@section('content')

    {{-- Page Header / Hero --}}
    <section class="bg-gray-900 pt-16 pb-32 text-white relative overflow-hidden">
        <div class="absolute inset-0 opacity-20 bg-[radial-gradient(#f97316_1px,transparent_1px)] [background-size:16px_16px]"></div>
        <div class="absolute right-0 top-0 w-96 h-96 bg-orange-500 rounded-full blur-[100px] opacity-20"></div>
        <div class="absolute left-0 bottom-0 w-64 h-64 bg-amber-500 rounded-full blur-[100px] opacity-20"></div>

        <div class="max-w-4xl mx-auto px-6 relative z-10 flex items-center justify-between">
            <div>
                <h1 class="text-3xl font-black mb-2 tracking-tight">Pengaturan Profil</h1>
                <p class="text-gray-400 text-sm font-medium">Kelola informasi pribadi dan keamanan akun Anda.</p>
            </div>
            
            {{-- Avatar Quick Edit --}}
            <form action="{{ route('profile.avatar') }}" method="POST" enctype="multipart/form-data" id="avatarForm" class="hidden sm:block">
                @csrf
                <label for="avatarInputTop" class="cursor-pointer relative group block w-20 h-20 shadow-xl shadow-black/20 rounded-full border-4 border-gray-800 hover:border-orange-500 transition-colors duration-300">
                    @if (auth()->user()->avatar)
                        <img src="{{ Storage::disk('s3')->url(auth()->user()->avatar) }}" class="w-full h-full rounded-full object-cover">
                    @else
                        <div class="w-full h-full rounded-full bg-gradient-to-br from-orange-400 to-amber-600 flex items-center justify-center text-white text-2xl font-black">
                            {{ strtoupper(substr(auth()->user()->name, 0, 2)) }}
                        </div>
                    @endif
                    <div class="absolute inset-0 rounded-full bg-black/60 opacity-0 group-hover:opacity-100 flex items-center justify-center transition-opacity duration-300 backdrop-blur-sm">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3 16.5v2.25A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75V16.5m-13.5-9L12 3m0 0l4.5 4.5M12 3v13.5" />
                        </svg>
                    </div>
                </label>
                <input id="avatarInputTop" type="file" name="avatar" accept="image/*" class="hidden" onchange="document.getElementById('avatarForm').submit()">
            </form>
        </div>
    </section>

    {{-- Main Content - Pulled up to overlap header --}}
    <div class="max-w-4xl mx-auto px-6 -mt-20 relative z-20 pb-20">
        
        {{-- Flash Messages --}}
        @if (session('status') === 'profile-updated' || session('status') === 'password-updated' || session('status') === 'avatar-updated')
            <div class="bg-emerald-50 text-emerald-700 px-5 py-4 rounded-2xl text-sm font-bold flex items-center gap-3 border border-emerald-100 shadow-sm mb-6 animate-fade-in-down">
                <span class="w-6 h-6 rounded-full bg-emerald-200 text-emerald-800 flex items-center justify-center">✓</span>
                <span>
                    @if(session('status') === 'profile-updated') Informasi profil berhasil diperbarui!
                    @elseif(session('status') === 'password-updated') Keamanan kata sandi berhasil diperbarui!
                    @elseif(session('status') === 'avatar-updated') Foto profil Anda tampil keren sekarang!
                    @endif
                </span>
            </div>
        @endif

        <div class="grid grid-cols-1 lg:grid-cols-12 gap-8">
            
            {{-- Sidebar Info (Mobile Avatar) --}}
            <div class="lg:col-span-4 space-y-6">
                
                {{-- Profile Card --}}
                <div class="bg-white rounded-3xl p-6 border border-gray-100 shadow-sm flex flex-col items-center text-center sm:hidden">
                    <form action="{{ route('profile.avatar') }}" method="POST" enctype="multipart/form-data" id="avatarFormMobile">
                        @csrf
                        <label for="avatarInputMobile" class="cursor-pointer relative group block w-24 h-24 shadow-md rounded-full border-4 border-white mb-4 ring-2 ring-orange-100 hover:ring-orange-400 transition-colors">
                            @if (auth()->user()->avatar)
                                <img src="{{ Storage::disk('s3')->url(auth()->user()->avatar) }}" class="w-full h-full rounded-full object-cover">
                            @else
                                <div class="w-full h-full rounded-full bg-gradient-to-br from-orange-400 to-amber-600 flex items-center justify-center text-white text-3xl font-black">
                                    {{ strtoupper(substr(auth()->user()->name, 0, 2)) }}
                                </div>
                            @endif
                            <div class="absolute inset-0 rounded-full bg-black/60 opacity-0 group-hover:opacity-100 flex items-center justify-center transition-opacity duration-300">
                                <span class="text-xs font-bold text-white uppercase tracking-wider">Ubah</span>
                            </div>
                        </label>
                        <input id="avatarInputMobile" type="file" name="avatar" accept="image/*" class="hidden" onchange="document.getElementById('avatarFormMobile').submit()">
                    </form>
                    <h3 class="text-lg font-black text-gray-900">{{ auth()->user()->name }}</h3>
                    <p class="text-xs font-medium text-gray-500">{{ auth()->user()->email }}</p>
                    <div class="mt-4 inline-block px-3 py-1 bg-green-100 text-green-700 text-[10px] font-extrabold uppercase tracking-widest rounded-full">
                        Anggota Aktif
                    </div>
                </div>

                {{-- Quick Stats / Info Menu --}}
                <div class="bg-white rounded-3xl border border-gray-100 shadow-sm overflow-hidden">
                    <div class="p-5 border-b border-gray-50 bg-gray-50/50">
                        <h4 class="text-xs font-extrabold text-gray-500 uppercase tracking-widest">Menu Navigasi</h4>
                    </div>
                    <div class="p-2 flex flex-col">
                        <a href="{{ route('orders.index') }}" class="flex items-center gap-3 px-4 py-3 rounded-xl hover:bg-orange-50 text-gray-700 hover:text-orange-600 transition-colors group">
                            <div class="w-8 h-8 rounded-lg bg-gray-100 group-hover:bg-orange-100 flex items-center justify-center transition-colors">
                                🛍️
                            </div>
                            <div class="flex-1">
                                <p class="text-sm font-bold">Pesanan Saya</p>
                                <p class="text-xs text-gray-500 font-medium">Lacak & riwayat transaksi</p>
                            </div>
                        </a>
                        <a href="{{ route('cart.index') }}" class="flex items-center gap-3 px-4 py-3 rounded-xl hover:bg-orange-50 text-gray-700 hover:text-orange-600 transition-colors group">
                            <div class="w-8 h-8 rounded-lg bg-gray-100 group-hover:bg-orange-100 flex items-center justify-center transition-colors">
                                🛒
                            </div>
                            <div class="flex-1">
                                <p class="text-sm font-bold">Keranjang</p>
                                <p class="text-xs text-gray-500 font-medium">Lanjutkan pesanan tertunda</p>
                            </div>
                        </a>
                    </div>
                </div>

            </div>

            {{-- Main Forms --}}
            <div class="lg:col-span-8 space-y-6">
                
                {{-- Informasi Profil --}}
                <div class="bg-white border border-gray-100 rounded-3xl shadow-sm overflow-hidden">
                    <div class="p-6 md:p-8 border-b border-gray-50 flex items-start gap-4 bg-orange-50/30">
                        <div class="w-10 h-10 rounded-xl bg-orange-100 flex items-center justify-center text-orange-500 flex-shrink-0">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z" />
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-lg font-black text-gray-900 mb-1">Informasi Pribadi</h3>
                            <p class="text-xs text-gray-500 font-medium">Perbarui nama tampilan dan alamat email yang digunakan untuk masuk.</p>
                        </div>
                    </div>
                    
                    <div class="p-6 md:p-8">
                        <form action="{{ route('profile.update') }}" method="POST" class="space-y-5">
                            @csrf
                            @method('PATCH')

                            <div>
                                <label class="block text-xs font-extrabold text-gray-700 uppercase tracking-wider mb-2">Nama Lengkap</label>
                                <input type="text" name="name" value="{{ old('name', auth()->user()->name) }}"
                                       class="w-full bg-gray-50 border border-gray-200 rounded-xl px-4 py-3 text-sm font-medium text-gray-800 focus:outline-none focus:bg-white focus:ring-2 focus:ring-orange-500/20 focus:border-orange-500 transition-all">
                                @error('name')
                                    <p class="text-rose-500 text-xs font-bold mt-1.5">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label class="block text-xs font-extrabold text-gray-700 uppercase tracking-wider mb-2">Alamat Email</label>
                                <input type="email" name="email" value="{{ old('email', auth()->user()->email) }}"
                                       class="w-full bg-gray-50 border border-gray-200 rounded-xl px-4 py-3 text-sm font-medium text-gray-800 focus:outline-none focus:bg-white focus:ring-2 focus:ring-orange-500/20 focus:border-orange-500 transition-all">
                                @error('email')
                                    <p class="text-rose-500 text-xs font-bold mt-1.5">{{ $message }}</p>
                                @enderror
                            </div>

                            @if (auth()->user() instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! auth()->user()->hasVerifiedEmail())
                                <div class="bg-amber-50 text-amber-800 px-4 py-3 rounded-xl text-xs font-bold flex items-center justify-between border border-amber-100">
                                    <span>⚠️ Email kamu belum diverifikasi.</span>
                                    <button form="send-verification" class="bg-amber-200 hover:bg-amber-300 text-amber-900 px-3 py-1.5 rounded-lg transition-colors">
                                        Kirim Ulang
                                    </button>
                                </div>
                            @endif

                            <div class="pt-2 flex justify-end">
                                <button type="submit" class="bg-gray-900 hover:bg-orange-500 text-white px-6 py-3 rounded-xl text-sm font-bold transition-all shadow-md hover:shadow-orange-500/30">
                                    Simpan Perubahan
                                </button>
                            </div>
                        </form>

                        @if (auth()->user() instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! auth()->user()->hasVerifiedEmail())
                            <form id="send-verification" action="{{ route('verification.send') }}" method="POST" class="hidden">
                                @csrf
                            </form>
                        @endif
                    </div>
                </div>

                {{-- Ubah Password --}}
                <div class="bg-white border border-gray-100 rounded-3xl shadow-sm overflow-hidden">
                    <div class="p-6 md:p-8 border-b border-gray-50 flex items-start gap-4">
                        <div class="w-10 h-10 rounded-xl bg-gray-100 flex items-center justify-center text-gray-500 flex-shrink-0">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 10.5V6.75a4.5 4.5 0 10-9 0v3.75m-.75 11.25h10.5a2.25 2.25 0 002.25-2.25v-6.75a2.25 2.25 0 00-2.25-2.25H6.75a2.25 2.25 0 00-2.25 2.25v6.75a2.25 2.25 0 002.25 2.25z" />
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-lg font-black text-gray-900 mb-1">Keamanan Akun</h3>
                            <p class="text-xs text-gray-500 font-medium">Pastikan akun Anda menggunakan kata sandi yang panjang, acak, dan unik.</p>
                        </div>
                    </div>

                    <div class="p-6 md:p-8">
                        <form action="{{ route('password.update') }}" method="POST" class="space-y-5">
                            @csrf
                            @method('PUT')

                            <div>
                                <label class="block text-xs font-extrabold text-gray-700 uppercase tracking-wider mb-2">Kata Sandi Saat Ini</label>
                                <input type="password" name="current_password"
                                       class="w-full bg-gray-50 border border-gray-200 rounded-xl px-4 py-3 text-sm font-medium focus:outline-none focus:bg-white focus:ring-2 focus:ring-orange-500/20 focus:border-orange-500 transition-all">
                                @error('current_password', 'updatePassword')
                                    <p class="text-rose-500 text-xs font-bold mt-1.5">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label class="block text-xs font-extrabold text-gray-700 uppercase tracking-wider mb-2">Kata Sandi Baru</label>
                                <input type="password" name="password"
                                       class="w-full bg-gray-50 border border-gray-200 rounded-xl px-4 py-3 text-sm font-medium focus:outline-none focus:bg-white focus:ring-2 focus:ring-orange-500/20 focus:border-orange-500 transition-all">
                                @error('password', 'updatePassword')
                                    <p class="text-rose-500 text-xs font-bold mt-1.5">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label class="block text-xs font-extrabold text-gray-700 uppercase tracking-wider mb-2">Konfirmasi Sandi Baru</label>
                                <input type="password" name="password_confirmation"
                                       class="w-full bg-gray-50 border border-gray-200 rounded-xl px-4 py-3 text-sm font-medium focus:outline-none focus:bg-white focus:ring-2 focus:ring-orange-500/20 focus:border-orange-500 transition-all">
                            </div>

                            <div class="pt-2 flex justify-end">
                                <button type="submit" class="bg-gray-100 hover:bg-gray-900 text-gray-900 hover:text-white px-6 py-3 rounded-xl text-sm font-bold transition-colors">
                                    Perbarui Sandi
                                </button>
                            </div>
                        </form>
                    </div>
                </div>

                {{-- Hapus Akun --}}
                <div class="bg-white border border-rose-100 rounded-3xl shadow-sm overflow-hidden mt-8">
                    <div class="p-6 md:p-8 flex flex-col md:flex-row items-center justify-between gap-6">
                        <div>
                            <h3 class="text-lg font-black text-rose-600 mb-1">Area Berbahaya</h3>
                            <p class="text-xs text-gray-500 font-medium max-w-md">Setelah akun dihapus, semua data dan sumber daya akan hilang secara permanen. Pastikan Anda telah mengunduh data apa pun yang ingin disimpan.</p>
                        </div>
                        <button onclick="document.getElementById('deleteModal').classList.remove('hidden'); document.getElementById('deleteModal').classList.add('flex')"
                                class="flex-shrink-0 bg-rose-50 hover:bg-rose-600 text-rose-600 hover:text-white border border-rose-200 hover:border-rose-600 px-6 py-3 rounded-xl text-sm font-bold transition-colors">
                            Hapus Akun Permanen
                        </button>
                    </div>
                </div>

            </div>
        </div>
    </div>

    {{-- Modal Konfirmasi Hapus --}}
    <div id="deleteModal" class="fixed inset-0 bg-gray-900/80 backdrop-blur-sm hidden items-center justify-center z-50 px-4 transition-all">
        <div class="bg-white rounded-3xl p-8 w-full max-w-md shadow-2xl relative overflow-hidden">
            <div class="absolute top-0 left-0 w-full h-2 bg-rose-500"></div>
            
            <div class="w-14 h-14 rounded-full bg-rose-100 text-rose-600 flex items-center justify-center text-2xl mb-4">
                ⚠️
            </div>
            
            <h4 class="text-xl font-black text-gray-900 mb-2">Hapus Akun Permanen?</h4>
            <p class="text-sm text-gray-500 font-medium mb-6 leading-relaxed">
                Tindakan ini <strong class="text-rose-600">tidak dapat dibatalkan</strong>. Masukkan kata sandi Anda untuk memverifikasi bahwa Anda ingin menghapus akun ini selamanya.
            </p>

            <form action="{{ route('profile.destroy') }}" method="POST">
                @csrf
                @method('DELETE')

                <div class="mb-6">
                    <input type="password" name="password" placeholder="Masukkan kata sandi..." required
                           class="w-full bg-gray-50 border border-gray-200 rounded-xl px-4 py-3 text-sm font-medium focus:outline-none focus:bg-white focus:ring-2 focus:ring-rose-500/20 focus:border-rose-500 transition-all">
                    @error('password', 'userDeletion')
                        <p class="text-rose-500 text-xs font-bold mt-1.5">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex gap-3 justify-end">
                    <button type="button"
                            onclick="document.getElementById('deleteModal').classList.add('hidden'); document.getElementById('deleteModal').classList.remove('flex')"
                            class="px-5 py-2.5 rounded-xl text-sm font-bold text-gray-600 hover:bg-gray-100 transition-colors">
                        Batal
                    </button>
                    <button type="submit" class="bg-rose-600 hover:bg-rose-700 text-white px-6 py-2.5 rounded-xl text-sm font-bold transition-colors shadow-lg shadow-rose-500/30">
                        Ya, Hapus Akun
                    </button>
                </div>
            </form>
        </div>
    </div>

@endsection