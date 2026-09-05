<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Masuk - WarungBuKarno</title>
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
            {{-- Background Image with Gradient Overlay --}}
            <img src="https://images.unsplash.com/photo-1504674900247-0877df9cc836?q=80&w=1600"
                 alt="Kuliner WarungBuKarno"
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
                    🍱 Kuliner No.1 Pilihan Warga
                </span>
            </div>

            {{-- Center Catchy Quote & Floating Cards --}}
            <div class="relative z-10 max-w-md space-y-6 my-auto">
                <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-orange-500/20 border border-orange-500/30 text-orange-400 text-xs font-semibold uppercase tracking-wider">
                    ✨ Nikmati Masakan Hangat Setiap Hari
                </div>
                <h1 class="text-3xl xl:text-4xl font-extrabold leading-tight text-white tracking-tight">
                    Rasa Rumahan Otentik, <span class="text-transparent bg-clip-text bg-gradient-to-r from-orange-400 to-amber-300">Siap Diantar</span> Kapan Saja.
                </h1>
                <p class="text-gray-300 text-sm leading-relaxed">
                    Masuk ke akunmu untuk memesan aneka lauk lezat, mengklaim voucher diskon spesial, dan melacak pesananmu secara real-time.
                </p>

                {{-- Floating Features Badges --}}
                <div class="grid grid-cols-2 gap-3 pt-4">
                    <div class="p-3.5 rounded-2xl bg-white/10 backdrop-blur-md border border-white/10 flex items-center gap-3">
                        <div class="w-9 h-9 rounded-xl bg-orange-500/20 text-orange-400 flex items-center justify-center text-base font-bold">
                            🚀
                        </div>
                        <div>
                            <p class="text-xs font-bold text-white">Antar Cepat</p>
                            <p class="text-[11px] text-gray-400">20 - 35 Menit Sampai</p>
                        </div>
                    </div>

                    <div class="p-3.5 rounded-2xl bg-white/10 backdrop-blur-md border border-white/10 flex items-center gap-3">
                        <div class="w-9 h-9 rounded-xl bg-green-500/20 text-green-400 flex items-center justify-center text-base font-bold">
                            🏷️
                        </div>
                        <div>
                            <p class="text-xs font-bold text-white">Diskon s/d 20%</p>
                            <p class="text-[11px] text-gray-400">Voucher Tiap Minggu</p>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Bottom Customer Testimonial Pill --}}
            <div class="relative z-10 p-4 rounded-2xl bg-white/5 backdrop-blur-md border border-white/10 flex items-center justify-between text-xs text-gray-300">
                <div class="flex items-center gap-2">
                    <div class="flex text-amber-400">★★★★★</div>
                    <span>"Soto Nya Enak, Bumbu Nya Juga enak , Tadi saya hampir terbang"</span>
                </div>
                <span class="text-gray-400 font-medium">Jokowi✔️, Pelanggan Setia</span>
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

                <a href="{{ route('home') }}" class="inline-flex items-center gap-2 text-xs sm:text-sm font-semibold text-gray-600 hover:text-orange-600 bg-gray-100 hover:bg-orange-50 px-4 py-2 rounded-full transition ml-auto">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5L3 12m0 0l7.5-7.5M3 12h18" />
                    </svg>
                    <span>Ke Beranda</span>
                </a>
            </div>

            {{-- Center Form Content --}}
            <div class="max-w-md w-full mx-auto my-auto space-y-6">

                <div>
                    <span class="text-xs font-bold uppercase tracking-wider text-orange-600 bg-orange-100/70 px-3 py-1 rounded-md">
                        Selamat Datang Kembali
                    </span>
                    <h2 class="text-2xl sm:text-3xl font-extrabold text-gray-900 tracking-tight mt-2">
                        Masuk ke Akunmu
                    </h2>
                    <p class="text-sm text-gray-500 mt-1">
                        Masukkan email dan password untuk melanjutkan pesanan.
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
                        <span>Email atau password yang kamu masukkan tidak cocok.</span>
                    </div>
                @endif

                <form method="POST" action="{{ route('login') }}" class="space-y-4">
                    @csrf

                    {{-- Input Email --}}
                    <div>
                        <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-1.5">Email</label>
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

                    {{-- Input Password --}}
                    <div>
                        <div class="flex items-center justify-between mb-1.5">
                            <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider">Password</label>
                            @if (Route::has('password.request'))
                                <a href="{{ route('password.request') }}" class="text-xs font-semibold text-orange-600 hover:text-orange-700 transition hover:underline">
                                    Lupa Password?
                                </a>
                            @endif
                        </div>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-gray-400">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 10.5V6.75a4.5 4.5 0 10-9 0v3.75m-.75 11.25h10.5a2.25 2.25 0 002.25-2.25v-6.75a2.25 2.25 0 00-2.25-2.25H6.75a2.25 2.25 0 00-2.25 2.25v6.75a2.25 2.25 0 002.25 2.25z" />
                                </svg>
                            </div>
                            <input type="password" name="password" id="passwordInput" required placeholder="••••••••"
                                   class="w-full bg-gray-50/50 border border-gray-200 rounded-xl pl-10 pr-11 py-3 text-sm text-gray-900 placeholder-gray-400 transition focus:bg-white focus:outline-none focus:ring-2 focus:ring-orange-500/30 focus:border-orange-500">
                            <button type="button" onclick="togglePasswordVisibility()" class="absolute inset-y-0 right-0 pr-3.5 flex items-center text-gray-400 hover:text-gray-600 transition" title="Lihat password">
                                <svg id="eyeIconOpen" xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                </svg>
                                <svg id="eyeIconClosed" xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 hidden" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M3.98 8.223A10.477 10.477 0 001.934 12C3.226 16.338 7.244 19.5 12 19.5c.993 0 1.953-.138 2.863-.395M6.228 6.228A10.45 10.45 0 0112 4.5c4.756 0 8.773 3.162 10.065 7.498a10.523 10.523 0 01-4.293 5.774M6.228 6.228L3 3m3.228 3.228l3.65 3.65m7.894 7.894L21 21m-3.228-3.228l-3.65-3.65m0 0a3 3 0 10-4.243-4.243m4.242 4.242L9.88 9.88" />
                                </svg>
                            </button>
                        </div>
                    </div>

                    {{-- Remember Me --}}
                    <div class="flex items-center justify-between pt-1">
                        <label class="flex items-center gap-2 cursor-pointer select-none">
                            <input type="checkbox" name="remember" class="w-4 h-4 rounded border-gray-300 text-orange-500 focus:ring-orange-400">
                            <span class="text-xs sm:text-sm text-gray-600">Ingat saya di perangkat ini</span>
                        </label>
                    </div>

                    {{-- Submit Button --}}
                    <button type="submit"
                            class="w-full mt-2 bg-gradient-to-r from-orange-500 to-orange-600 hover:from-orange-600 hover:to-orange-700 text-white py-3.5 rounded-xl text-sm font-bold transition-all duration-200 shadow-lg shadow-orange-500/25 hover:shadow-orange-500/35 hover:-translate-y-0.5 flex items-center justify-center gap-2">
                        <span>Masuk Sekarang</span>
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3" />
                        </svg>
                    </button>
                </form>

                {{-- Link to Register --}}
                <div class="pt-4 border-t border-gray-100 text-center">
                    <p class="text-xs sm:text-sm text-gray-600">
                        Belum punya akun WarungBuKarno?
                        <a href="{{ route('register') }}" class="text-orange-600 font-bold hover:text-orange-700 transition hover:underline ml-1">
                            Daftar Sekarang →
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

    <script>
        function togglePasswordVisibility() {
            const input = document.getElementById('passwordInput');
            const openIcon = document.getElementById('eyeIconOpen');
            const closedIcon = document.getElementById('eyeIconClosed');

            if (input.type === 'password') {
                input.type = 'text';
                openIcon.classList.add('hidden');
                closedIcon.classList.remove('hidden');
            } else {
                input.type = 'password';
                openIcon.classList.remove('hidden');
                closedIcon.classList.add('hidden');
            }
        }
    </script>

</body>
</html>