<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Buat Password Baru - WarungBuKarno</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; }
    </style>
</head>
<body class="bg-gray-50 text-gray-900 antialiased selection:bg-orange-500 selection:text-white">

    <div class="min-h-screen flex">

        {{-- Left Hero / Branding Panel (Desktop) --}}
        <div class="hidden lg:flex lg:w-1/2 relative bg-gray-950 overflow-hidden flex-col justify-between p-12 text-white">
            <img src="https://images.unsplash.com/photo-1544025162-d76694265947?q=80&w=1600"
                 alt="WarungBuKarno"
                 class="absolute inset-0 w-full h-full object-cover opacity-35 scale-105 transition-transform duration-1000 hover:scale-100">
            <div class="absolute inset-0 bg-gradient-to-t from-gray-950 via-gray-950/70 to-gray-900/40"></div>

            {{-- Top Branding --}}
            <div class="relative z-10 flex items-center justify-between">
                <a href="{{ route('home') }}" class="flex items-center gap-3 group">
                    <img src="{{ asset('images/logo.png') }}" alt="Logo" class="w-10 h-10 rounded-xl object-cover shadow-lg ring-2 ring-white/20 group-hover:scale-105 transition">
                    <div class="leading-tight">
                        <span class="font-extrabold text-lg text-white tracking-tight">Warung<span class="text-orange-500">BuKarno</span></span>
                        <p class="text-[11px] text-gray-400">Enak, Murah, Bersahabat</p>
                    </div>
                </a>
                <span class="px-3 py-1 rounded-full bg-white/10 backdrop-blur-md text-xs text-orange-300 font-medium border border-white/10">
                    🔑 Keamanan Terjamin
                </span>
            </div>

            {{-- Center Catchy Section --}}
            <div class="relative z-10 max-w-md space-y-6 my-auto">
                <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-orange-500/20 border border-orange-500/30 text-orange-400 text-xs font-semibold uppercase tracking-wider">
                    🔒 Langkah Terakhir
                </div>
                <h1 class="text-3xl xl:text-4xl font-extrabold leading-tight text-white tracking-tight">
                    Buat Password Baru yang <span class="text-transparent bg-clip-text bg-gradient-to-r from-orange-400 to-amber-300">Kuat & Aman</span>.
                </h1>
                <p class="text-gray-300 text-sm leading-relaxed">
                    Gunakan kombinasi huruf, angka, atau simbol agar akunmu selalu terlindungi. Setelah ini kamu bisa langsung memesan makanan favoritmu kembali.
                </p>
            </div>

            {{-- Bottom Customer Help Info --}}
            <div class="relative z-10 p-4 rounded-2xl bg-white/5 backdrop-blur-md border border-white/10 text-xs text-gray-400">
                Pusat Bantuan WarungBuKarno siap melayani kamu setiap saat.
            </div>
        </div>

        {{-- Right Form Panel --}}
        <div class="w-full lg:w-1/2 flex flex-col justify-between p-6 sm:p-12 md:p-16 bg-white relative">

            {{-- Top Navbar / Back Button --}}
            <div class="flex items-center justify-between mb-8">
                <div class="flex items-center gap-2.5 lg:hidden">
                    <img src="{{ asset('images/logo.png') }}" alt="Logo" class="w-8 h-8 rounded-lg object-cover">
                    <span class="font-extrabold text-base text-gray-800">Warung<span class="text-orange-500">BuKarno</span></span>
                </div>

                <a href="{{ route('login') }}" class="inline-flex items-center gap-2 text-xs sm:text-sm font-semibold text-gray-600 hover:text-orange-600 bg-gray-100 hover:bg-orange-50 px-4 py-2 rounded-full transition ml-auto">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5L3 12m0 0l7.5-7.5M3 12h18" />
                    </svg>
                    <span>Ke Login</span>
                </a>
            </div>

            {{-- Center Form Content --}}
            <div class="max-w-md w-full mx-auto my-auto space-y-6">

                <div>
                    <span class="text-xs font-bold uppercase tracking-wider text-orange-600 bg-orange-100/70 px-3 py-1 rounded-md">
                        Ganti Password
                    </span>
                    <h2 class="text-2xl sm:text-3xl font-extrabold text-gray-900 tracking-tight mt-2">
                        Buat Password Baru
                    </h2>
                    <p class="text-sm text-gray-500 mt-1">
                        Silakan tentukan kata sandi baru untuk akunmu.
                    </p>
                </div>

                {{-- Error Alert --}}
                @if ($errors->any())
                    <div class="p-4 rounded-2xl bg-red-50 border border-red-200 text-red-700 text-xs sm:text-sm shadow-sm space-y-1">
                        <ul class="list-disc list-inside text-xs text-red-600">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form method="POST" action="{{ route('password.store') }}" class="space-y-4">
                    @csrf

                    <input type="hidden" name="token" value="{{ $request->route('token') }}">

                    {{-- Email --}}
                    <div>
                        <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-1.5">Email</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-gray-400">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 01-2.25 2.25h-15a2.25 2.25 0 01-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25m19.5 0v.243a2.25 2.25 0 01-1.07 1.916l-7.5 4.615a2.25 2.25 0 01-2.36 0L3.32 8.91a2.25 2.25 0 01-1.07-1.916V6.75" />
                                </svg>
                            </div>
                            <input type="email" name="email" value="{{ old('email', $request->email) }}" required autofocus
                                   class="w-full bg-gray-50/50 border border-gray-200 rounded-xl pl-10 pr-4 py-3 text-sm text-gray-900 placeholder-gray-400 transition focus:bg-white focus:outline-none focus:ring-2 focus:ring-orange-500/30 focus:border-orange-500">
                        </div>
                    </div>

                    {{-- Password Baru --}}
                    <div>
                        <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-1.5">Password Baru</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-gray-400">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 10.5V6.75a4.5 4.5 0 10-9 0v3.75m-.75 11.25h10.5a2.25 2.25 0 002.25-2.25v-6.75a2.25 2.25 0 00-2.25-2.25H6.75a2.25 2.25 0 00-2.25 2.25v6.75a2.25 2.25 0 002.25 2.25z" />
                                </svg>
                            </div>
                            <input type="password" name="password" id="resetPass" required placeholder="Minimal 8 karakter"
                                   class="w-full bg-gray-50/50 border border-gray-200 rounded-xl pl-10 pr-11 py-3 text-sm text-gray-900 placeholder-gray-400 transition focus:bg-white focus:outline-none focus:ring-2 focus:ring-orange-500/30 focus:border-orange-500">
                        </div>
                    </div>

                    {{-- Konfirmasi Password --}}
                    <div>
                        <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-1.5">Konfirmasi Password Baru</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-gray-400">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </div>
                            <input type="password" name="password_confirmation" id="resetPassConfirm" required placeholder="Ulangi password baru"
                                   class="w-full bg-gray-50/50 border border-gray-200 rounded-xl pl-10 pr-11 py-3 text-sm text-gray-900 placeholder-gray-400 transition focus:bg-white focus:outline-none focus:ring-2 focus:ring-orange-500/30 focus:border-orange-500">
                        </div>
                    </div>

                    {{-- Submit Button --}}
                    <button type="submit"
                            class="w-full mt-2 bg-gradient-to-r from-orange-500 to-orange-600 hover:from-orange-600 hover:to-orange-700 text-white py-3.5 rounded-xl text-sm font-bold transition-all duration-200 shadow-lg shadow-orange-500/25 hover:shadow-orange-500/35 hover:-translate-y-0.5 flex items-center justify-center gap-2">
                        <span>Simpan & Reset Password</span>
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3" />
                        </svg>
                    </button>
                </form>

                <div class="pt-4 border-t border-gray-100 text-center">
                    <p class="text-xs sm:text-sm text-gray-600">
                        Batal ganti password?
                        <a href="{{ route('login') }}" class="text-orange-600 font-bold hover:text-orange-700 transition hover:underline ml-1">
                            Kembali ke Login
                        </a>
                    </p>
                </div>

            </div>

            {{-- Footer info --}}
            <div class="text-center text-xs text-gray-400 pt-8">
                © {{ date('Y') }} WarungBuKarno. Semua Hak Cipta Dilindungi.
            </div>

        </div>

    </div>

</body>
</html>