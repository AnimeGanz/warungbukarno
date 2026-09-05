<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Lupa Password - WarungBuKarno</title>
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
                    🔒 Pemulihan Akun Aman
                </span>
            </div>

            {{-- Center Catchy Section --}}
            <div class="relative z-10 max-w-md space-y-6 my-auto">
                <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-orange-500/20 border border-orange-500/30 text-orange-400 text-xs font-semibold uppercase tracking-wider">
                    🛡️ Bantuan Keamanan Akun
                </div>
                <h1 class="text-3xl xl:text-4xl font-extrabold leading-tight text-white tracking-tight">
                    Jangan Khawatir, <span class="text-transparent bg-clip-text bg-gradient-to-r from-orange-400 to-amber-300">Kami Siap Bantu</span> Pulihkan Akunmu.
                </h1>
                <p class="text-gray-300 text-sm leading-relaxed">
                    Masukkan alamat email terdaftar dan kami akan mengirimkan tautan reset password yang aman ke inbox emailmu.
                </p>

                <div class="p-4 rounded-2xl bg-white/10 backdrop-blur-md border border-white/10 space-y-2 text-xs text-gray-300">
                    <div class="flex items-center gap-2 text-white font-bold">
                        <span>💡</span> Tips Keamanan:
                    </div>
                    <p>Pastikan email yang kamu masukkan sama persis dengan yang digunakan saat mendaftar.</p>
                </div>
            </div>

            {{-- Bottom Help Info --}}
            <div class="relative z-10 p-4 rounded-2xl bg-white/5 backdrop-blur-md border border-white/10 text-xs text-gray-400">
                Pusat Bantuan WarungBuKarno: Siap melayani setiap hari 09.00 - 21.00 WIB
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
                    <span>Kembali ke Login</span>
                </a>
            </div>

            {{-- Center Form Content --}}
            <div class="max-w-md w-full mx-auto my-auto space-y-6">

                <div>
                    <span class="text-xs font-bold uppercase tracking-wider text-orange-600 bg-orange-100/70 px-3 py-1 rounded-md">
                        Pemulihan Akun
                    </span>
                    <h2 class="text-2xl sm:text-3xl font-extrabold text-gray-900 tracking-tight mt-2">
                        Lupa Password?
                    </h2>
                    <p class="text-sm text-gray-500 mt-1">
                        Masukkan email kamu untuk menerima tautan reset password.
                    </p>
                </div>

                {{-- Status Session --}}
                @if (session('status'))
                    <div class="p-4 rounded-2xl bg-green-50 border border-green-200 text-green-700 text-xs sm:text-sm flex items-center gap-2.5 shadow-sm">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-green-600 flex-shrink-0" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                        </svg>
                        <span>{{ session('status') }}</span>
                    </div>
                @endif

                {{-- Error Alert --}}
                @if ($errors->any())
                    <div class="p-4 rounded-2xl bg-red-50 border border-red-200 text-red-700 text-xs sm:text-sm flex items-center gap-2.5 shadow-sm">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-red-500 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m9-.75a9 9 0 11-18 0 9 9 0 0118 0zm-9 3.75h.008v.008H12v-.008z" />
                        </svg>
                        <span>{{ $errors->first() }}</span>
                    </div>
                @endif

                <form method="POST" action="{{ route('password.email') }}" class="space-y-4">
                    @csrf

                    <div>
                        <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-1.5">Email Terdaftar</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-gray-400">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 01-2.25 2.25h-15a2.25 2.25 0 01-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25m19.5 0v.243a2.25 2.25 0 01-1.07 1.916l-7.5 4.615a2.25 2.25 0 01-2.36 0L3.32 8.91a2.25 2.25 0 01-1.07-1.916V6.75" />
                                </svg>
                            </div>
                            <input type="email" name="email" value="{{ old('email') }}" required autofocus placeholder="nama@email.com"
                                   class="w-full bg-gray-50/50 border border-gray-200 rounded-xl pl-10 pr-4 py-3 text-sm text-gray-900 placeholder-gray-400 transition focus:bg-white focus:outline-none focus:ring-2 focus:ring-orange-500/30 focus:border-orange-500">
                        </div>
                    </div>

                    <button type="submit"
                            class="w-full mt-2 bg-gradient-to-r from-orange-500 to-orange-600 hover:from-orange-600 hover:to-orange-700 text-white py-3.5 rounded-xl text-sm font-bold transition-all duration-200 shadow-lg shadow-orange-500/25 hover:shadow-orange-500/35 hover:-translate-y-0.5 flex items-center justify-center gap-2">
                        <span>Kirim Link Reset Password</span>
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 12L3.269 3.126A59.768 59.768 0 0121.485 12 59.77 59.77 0 013.27 20.876L5.999 12zm0 0h7.5" />
                        </svg>
                    </button>
                </form>

                <div class="pt-4 border-t border-gray-100 text-center">
                    <p class="text-xs sm:text-sm text-gray-600">
                        Ingat password akunmu?
                        <a href="{{ route('login') }}" class="text-orange-600 font-bold hover:text-orange-700 transition hover:underline ml-1">
                            Login di Sini →
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