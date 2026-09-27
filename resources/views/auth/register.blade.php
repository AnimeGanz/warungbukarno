<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Daftar Akun Baru - WarungBuKarno</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; }
    </style>
</head>
<body class="bg-gray-50 text-gray-900 antialiased selection:bg-orange-500 selection:text-white">

    <div class="min-h-screen flex relative lg:static p-4 lg:p-0 items-center justify-center lg:items-stretch">
        {{-- Mobile Background (Tampil di HP) --}}
        <img src="https://images.unsplash.com/photo-1555396273-367ea4eb4db5?q=80&w=1600"
             alt="Background"
             class="absolute inset-0 w-full h-full object-cover lg:hidden z-0">
        <div class="absolute inset-0 bg-gray-900/60 backdrop-blur-sm lg:hidden z-0"></div>

        {{-- Left Hero / Branding Panel (Desktop) --}}
        <div class="hidden lg:flex lg:w-1/2 relative bg-gray-950 overflow-hidden flex-col justify-between p-12 text-white z-10">
            <img src="https://images.unsplash.com/photo-1555396273-367ea4eb4db5?q=80&w=1600"
                 alt="Masakan WarungBuKarno"
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
                <span class="px-3 py-1 rounded-full bg-orange-500/20 backdrop-blur-md text-xs text-orange-400 font-semibold border border-orange-500/30">
                    🎁 Bonus Pelanggan Baru
                </span>
            </div>

            {{-- Center Catchy Section --}}
            <div class="relative z-10 max-w-md space-y-6 my-auto">
                <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-white/10 border border-white/10 text-orange-300 text-xs font-semibold uppercase tracking-wider">
                    🎉 Gabung Bersama Ribuan Pecinta Kuliner
                </div>
                <h1 class="text-3xl xl:text-4xl font-extrabold leading-tight text-white tracking-tight">
                    Mulai Nikmati Kemudahan <span class="text-transparent bg-clip-text bg-gradient-to-r from-orange-400 to-amber-300">Pesan Makanan</span> Kapan Saja.
                </h1>
                <p class="text-gray-300 text-sm leading-relaxed">
                    Daftar akunmu sekarang dalam hitungan detik dan dapatkan voucher <strong>Diskon 20% (Kode: BARU20)</strong> untuk pesanan pertamamu!
                </p>


            </div>

            {{-- Bottom Customer Testimonial Pill --}}
            <div class="relative z-10 p-4 rounded-2xl bg-white/5 backdrop-blur-md border border-white/10 flex items-center justify-between text-xs text-gray-300 transition-all duration-500" id="testimonial-container">
                <div class="flex items-center gap-2">
                    <div class="flex text-amber-400 font-medium transition-opacity duration-500" id="testimonial-stars">★★★★★ 5.0</div>
                    <span id="testimonial-comment" class="transition-opacity duration-500">"Porsi banyak, lauknya komplit, mantap!"</span>
                </div>
                <span id="testimonial-author" class="text-gray-400 font-medium transition-opacity duration-500">PrabowoSubianto✔️, Jakarta</span>
            </div>
        </div>

        {{-- Right Form Panel --}}
        <div class="w-full lg:w-1/2 flex flex-col justify-between p-6 sm:p-10 bg-white/95 lg:bg-white backdrop-blur-xl lg:backdrop-blur-none relative z-10 rounded-3xl lg:rounded-none shadow-2xl lg:shadow-none mx-auto max-w-md lg:max-w-none min-h-[calc(100vh-2rem)] lg:min-h-screen">

            {{-- Top Navbar / Back Button --}}
            <div class="flex items-center justify-between mb-6">
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
                        Pendaftaran Mudah & Cepat
                    </span>
                    <h2 class="text-2xl sm:text-3xl font-extrabold text-gray-900 tracking-tight mt-2">
                        Buat Akun Baru
                    </h2>
                    <p class="text-sm text-gray-500 mt-1">
                        Lengkapi data dirimu untuk mulai memesan makanan lezat.
                    </p>
                </div>

                {{-- Error Alert --}}
                @if ($errors->any())
                    <div class="p-4 rounded-2xl bg-red-50 border border-red-200 text-red-700 text-xs sm:text-sm shadow-sm space-y-1">
                        <div class="flex items-center gap-2 font-bold text-red-800">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-red-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m9-.75a9 9 0 11-18 0 9 9 0 0118 0zm-9 3.75h.008v.008H12v-.008z" />
                            </svg>
                            <span>Periksa kembali data yang kamu masukkan:</span>
                        </div>
                        <ul class="list-disc list-inside text-xs text-red-600 pl-2">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form method="POST" action="{{ route('register') }}" class="space-y-4">
                    @csrf

                    {{-- Nama Lengkap --}}
                    <div>
                        <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-1.5">Nama Lengkap</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-gray-400">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z" />
                                </svg>
                            </div>
                            <input type="text" name="name" value="{{ old('name') }}" required autofocus placeholder="Contoh: Budi Santoso"
                                   class="w-full bg-gray-50/50 border border-gray-200 rounded-xl pl-10 pr-4 py-3 text-sm text-gray-900 placeholder-gray-400 transition focus:bg-white focus:outline-none focus:ring-2 focus:ring-orange-500/30 focus:border-orange-500">
                        </div>
                    </div>

                    {{-- Email --}}
                    <div>
                        <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-1.5">Alamat Email</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-gray-400">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 01-2.25 2.25h-15a2.25 2.25 0 01-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25m19.5 0v.243a2.25 2.25 0 01-1.07 1.916l-7.5 4.615a2.25 2.25 0 01-2.36 0L3.32 8.91a2.25 2.25 0 01-1.07-1.916V6.75" />
                                </svg>
                            </div>
                            <input type="email" name="email" value="{{ old('email') }}" required placeholder="nama@email.com"
                                   class="w-full bg-gray-50/50 border border-gray-200 rounded-xl pl-10 pr-4 py-3 text-sm text-gray-900 placeholder-gray-400 transition focus:bg-white focus:outline-none focus:ring-2 focus:ring-orange-500/30 focus:border-orange-500">
                        </div>
                    </div>

                    {{-- Password --}}
                    <div>
                        <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-1.5">Password</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-gray-400">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 10.5V6.75a4.5 4.5 0 10-9 0v3.75m-.75 11.25h10.5a2.25 2.25 0 002.25-2.25v-6.75a2.25 2.25 0 00-2.25-2.25H6.75a2.25 2.25 0 00-2.25 2.25v6.75a2.25 2.25 0 002.25 2.25z" />
                                </svg>
                            </div>
                            <input type="password" name="password" id="regPassword" required placeholder="Minimal 8 karakter"
                                   class="w-full bg-gray-50/50 border border-gray-200 rounded-xl pl-10 pr-11 py-3 text-sm text-gray-900 placeholder-gray-400 transition focus:bg-white focus:outline-none focus:ring-2 focus:ring-orange-500/30 focus:border-orange-500">
                            <button type="button" onclick="togglePassVisibility('regPassword', 'eyeRegOpen', 'eyeRegClosed')" class="absolute inset-y-0 right-0 pr-3.5 flex items-center text-gray-400 hover:text-gray-600 transition">
                                <svg id="eyeRegOpen" xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                </svg>
                                <svg id="eyeRegClosed" xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 hidden" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M3.98 8.223A10.477 10.477 0 001.934 12C3.226 16.338 7.244 19.5 12 19.5c.993 0 1.953-.138 2.863-.395M6.228 6.228A10.45 10.45 0 0112 4.5c4.756 0 8.773 3.162 10.065 7.498a10.523 10.523 0 01-4.293 5.774M6.228 6.228L3 3m3.228 3.228l3.65 3.65m7.894 7.894L21 21m-3.228-3.228l-3.65-3.65m0 0a3 3 0 10-4.243-4.243m4.242 4.242L9.88 9.88" />
                                </svg>
                            </button>
                        </div>
                    </div>

                    {{-- Konfirmasi Password --}}
                    <div>
                        <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-1.5">Konfirmasi Password</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-gray-400">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </div>
                            <input type="password" name="password_confirmation" id="regConfirmPassword" required placeholder="Ulangi password"
                                   class="w-full bg-gray-50/50 border border-gray-200 rounded-xl pl-10 pr-11 py-3 text-sm text-gray-900 placeholder-gray-400 transition focus:bg-white focus:outline-none focus:ring-2 focus:ring-orange-500/30 focus:border-orange-500">
                            <button type="button" onclick="togglePassVisibility('regConfirmPassword', 'eyeConfOpen', 'eyeConfClosed')" class="absolute inset-y-0 right-0 pr-3.5 flex items-center text-gray-400 hover:text-gray-600 transition">
                                <svg id="eyeConfOpen" xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                </svg>
                                <svg id="eyeConfClosed" xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 hidden" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M3.98 8.223A10.477 10.477 0 001.934 12C3.226 16.338 7.244 19.5 12 19.5c.993 0 1.953-.138 2.863-.395M6.228 6.228A10.45 10.45 0 0112 4.5c4.756 0 8.773 3.162 10.065 7.498a10.523 10.523 0 01-4.293 5.774M6.228 6.228L3 3m3.228 3.228l3.65 3.65m7.894 7.894L21 21m-3.228-3.228l-3.65-3.65m0 0a3 3 0 10-4.243-4.243m4.242 4.242L9.88 9.88" />
                                </svg>
                            </button>
                        </div>
                    </div>

                    {{-- Submit Button --}}
                    <button type="submit"
                            class="w-full mt-2 bg-gradient-to-r from-orange-500 to-orange-600 hover:from-orange-600 hover:to-orange-700 text-white py-3.5 rounded-xl text-sm font-bold transition-all duration-200 shadow-lg shadow-orange-500/25 hover:shadow-orange-500/35 hover:-translate-y-0.5 flex items-center justify-center gap-2">
                        <span>Daftar Akun Sekarang</span>
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3" />
                        </svg>
                    </button>
                </form>

                {{-- Link to Login --}}
                <div class="pt-4 border-t border-gray-100 text-center">
                    <p class="text-xs sm:text-sm text-gray-600">
                        Sudah memiliki akun?
                        <a href="{{ route('login') }}" class="text-orange-600 font-bold hover:text-orange-700 transition hover:underline ml-1">
                            Masuk di Sini →
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
        function togglePassVisibility(inputId, openIconId, closedIconId) {
            const input = document.getElementById(inputId);
            const openIcon = document.getElementById(openIconId);
            const closedIcon = document.getElementById(closedIconId);

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

        // Testimonial Rotation
        document.addEventListener('DOMContentLoaded', function() {
            const testimonials = [
                { name: 'PrabowoSubianto✔️', comment: '"Porsi banyak, lauknya komplit, mantap!"', location: 'Jakarta', stars: '★★★★★ 5.0' },
                { name: 'Purbaya✔️', comment: '"Warung langganan, rasanya selalu pas di lidah."', location: 'Bandung', stars: '★★★★☆ 4.0' },
                { name: 'Jokowi✔️', comment: '"Harganya terjangkau, pelayanannya sangat cepat."', location: 'Solo', stars: '★★★★½ 4.5' },
                { name: 'Megawati✔️', comment: '"Makanannya enak, bumbunya terasa sekali."', location: 'Jakarta', stars: '★★★★★ 5.0' },
            ];
            
            let currentTestimonial = 0;
            const commentEl = document.getElementById('testimonial-comment');
            const authorEl = document.getElementById('testimonial-author');
            const starsEl = document.getElementById('testimonial-stars');
            
            setInterval(() => {
                currentTestimonial = (currentTestimonial + 1) % testimonials.length;
                
                // Fade out
                commentEl.style.opacity = 0;
                authorEl.style.opacity = 0;
                starsEl.style.opacity = 0;
                
                setTimeout(() => {
                    // Update content
                    commentEl.innerText = testimonials[currentTestimonial].comment;
                    authorEl.innerText = testimonials[currentTestimonial].name + ', ' + testimonials[currentTestimonial].location;
                    starsEl.innerText = testimonials[currentTestimonial].stars;
                    
                    // Fade in
                    commentEl.style.opacity = 1;
                    authorEl.style.opacity = 1;
                    starsEl.style.opacity = 1;
                }, 500); // Wait for fade out to complete (matching duration-500)
            }, 5000); // Change every 5 seconds
        });
    </script>

</body>
</html>