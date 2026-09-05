<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'WarungBuKarno') - Pesan Makanan Online</title>
    <link rel="icon" type="image/png" href="{{ asset('images/logo.png') }}">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script>
        // Check and apply theme immediately on load to prevent FOUC
        if (localStorage.getItem('theme') === 'dark' || (!('theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
            document.documentElement.classList.add('dark');
        } else {
            document.documentElement.classList.remove('dark');
        }
    </script>
</head>
<body class="bg-gray-50 dark:bg-gray-950 font-sans antialiased flex flex-col min-h-screen transition-colors duration-300 text-gray-900 dark:text-gray-100">

    {{-- Navbar (Glassmorphism & Elegant) --}}
    <nav class="bg-white/80 dark:bg-gray-900/80 backdrop-blur-lg border-b border-gray-100 dark:border-gray-800 sticky top-0 z-50 transition-all shadow-sm">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 py-3 flex items-center justify-between gap-4 sm:gap-6">
            
            {{-- Logo --}}
            <a href="{{ route('home') }}" class="flex items-center gap-3 flex-shrink-0 group">
                <img src="{{ asset('images/logo.png') }}" alt="Logo" class="w-10 h-10 rounded-xl object-cover shadow-md shadow-orange-500/30 group-hover:scale-105 transition-transform">
                <div class="leading-tight hidden sm:block">
                    <p class="font-extrabold text-gray-900 dark:text-white text-[15px] tracking-tight">Warung<span class="text-orange-500">BuKarno</span></p>
                    <p class="text-[10px] text-gray-500 dark:text-gray-400 font-medium">Enak, Murah, Bersahabat</p>
                </div>
            </a>

            {{-- Navigation Links (Desktop) --}}
            <div class="hidden lg:flex items-center gap-8 text-[13px] font-bold text-gray-600 dark:text-gray-300 flex-shrink-0 uppercase tracking-wider">
                <a href="{{ route('home') }}" class="relative group {{ request()->routeIs('home') ? 'text-orange-600' : 'hover:text-orange-600 transition-colors' }}">
                    Home
                    <span class="absolute -bottom-1 left-0 w-full h-0.5 bg-orange-500 rounded-full scale-x-0 group-hover:scale-x-100 transition-transform origin-left {{ request()->routeIs('home') ? 'scale-x-100' : '' }}"></span>
                </a>
                
                {{-- Anchor Link to Menu --}}
                <a href="{{ url('/') }}#menu" class="relative group hover:text-orange-600 transition-colors">
                    Menu Makanan
                    <span class="absolute -bottom-1 left-0 w-full h-0.5 bg-orange-500 rounded-full scale-x-0 group-hover:scale-x-100 transition-transform origin-left"></span>
                </a>
                
                <a href="{{ route('cara-pesan') }}" class="relative group {{ request()->routeIs('cara-pesan') ? 'text-orange-600' : 'hover:text-orange-600 transition-colors' }}">
                    Cara Pesan
                    <span class="absolute -bottom-1 left-0 w-full h-0.5 bg-orange-500 rounded-full scale-x-0 group-hover:scale-x-100 transition-transform origin-left {{ request()->routeIs('cara-pesan') ? 'scale-x-100' : '' }}"></span>
                </a>
                
                <a href="{{ route('promo') }}" class="relative group {{ request()->routeIs('promo') ? 'text-orange-600' : 'hover:text-orange-600 transition-colors' }}">
                    Promo
                    <span class="absolute -bottom-1 left-0 w-full h-0.5 bg-orange-500 rounded-full scale-x-0 group-hover:scale-x-100 transition-transform origin-left {{ request()->routeIs('promo') ? 'scale-x-100' : '' }}"></span>
                </a>
                
                <a href="{{ route('tentang-kami') }}" class="relative group {{ request()->routeIs('tentang-kami') ? 'text-orange-600' : 'hover:text-orange-600 transition-colors' }}">
                    Tentang Kami
                    <span class="absolute -bottom-1 left-0 w-full h-0.5 bg-orange-500 rounded-full scale-x-0 group-hover:scale-x-100 transition-transform origin-left {{ request()->routeIs('tentang-kami') ? 'scale-x-100' : '' }}"></span>
                </a>
            </div>



            {{-- User Actions --}}
            <div class="flex items-center gap-3 sm:gap-4 flex-shrink-0">
                
                {{-- Theme Switcher --}}
                <button onclick="toggleTheme()" class="p-2 sm:px-3 sm:py-2 rounded-xl text-gray-500 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800 transition-colors focus:outline-none">
                    {{-- Sun icon for Dark Mode --}}
                    <svg xmlns="http://www.w3.org/2000/svg" class="hidden dark:block w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z" />
                    </svg>
                    {{-- Moon icon for Light Mode --}}
                    <svg xmlns="http://www.w3.org/2000/svg" class="block dark:hidden w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z" />
                    </svg>
                </button>

                <a href="{{ route('cart.index') }}" class="relative flex items-center gap-2 p-2 sm:px-4 sm:py-2 rounded-xl text-gray-700 dark:text-gray-200 bg-gray-50 dark:bg-gray-800 hover:bg-orange-50 dark:hover:bg-orange-500/20 hover:text-orange-600 dark:hover:text-orange-500 transition-colors font-bold text-sm">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 00-3 3h15.75m-12.75-3h11.218c1.121-2.3 1.885-3.79 2.435-4.812a1.125 1.125 0 00-.978-1.688H5.65m1.85 6.5L4.5 6.272M12 14.25h.008v.008H12v-.008z" />
                    </svg>
                    <span class="hidden sm:inline">Keranjang</span>
                    @auth
                        @php
                            $cartCount = \App\Models\CartItem::where('user_id', auth()->id())->sum('quantity');
                        @endphp
                        @if ($cartCount > 0)
                            <span class="absolute -top-1.5 -right-1.5 bg-orange-500 text-white text-[10px] w-5 h-5 rounded-full flex items-center justify-center font-extrabold border-2 border-white shadow-sm">
                                {{ $cartCount }}
                            </span>
                        @endif
                    @endauth
                </a>

                @auth
                    <div class="relative">
                        <button onclick="toggleUserMenu()" class="block w-10 h-10 rounded-full overflow-hidden border-2 border-gray-100 hover:border-orange-500 transition-colors shadow-sm focus:outline-none focus:ring-2 focus:ring-orange-500/50">
                            @if (auth()->user()->avatar)
                                <img src="{{ Storage::url(auth()->user()->avatar) }}" class="w-full h-full object-cover">
                            @else
                                <div class="w-full h-full bg-gradient-to-br from-orange-400 to-orange-600 text-white flex items-center justify-center text-sm font-bold">
                                    {{ strtoupper(substr(auth()->user()->name, 0, 2)) }}
                                </div>
                            @endif
                        </button>

                        <div id="userMenu" class="hidden absolute right-0 mt-3 w-56 bg-white dark:bg-gray-800 rounded-2xl shadow-xl border border-gray-100 dark:border-gray-700 py-2 z-50 transform origin-top-right transition-all">
                            <div class="px-5 py-3 border-b border-gray-50 dark:border-gray-700 mb-1">
                                <p class="text-sm font-bold text-gray-900 dark:text-white truncate">{{ auth()->user()->name }}</p>
                                <p class="text-xs text-gray-500 dark:text-gray-400 truncate mt-0.5">{{ auth()->user()->email }}</p>
                            </div>

                            <a href="{{ route('profile.edit') }}" class="flex items-center gap-3 px-5 py-2.5 text-sm font-medium text-gray-600 dark:text-gray-300 hover:bg-orange-50 dark:hover:bg-gray-700 hover:text-orange-600 dark:hover:text-orange-500 transition-colors">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z" />
                                </svg>
                                Profil Saya
                            </a>

                            <a href="{{ route('orders.index') }}" class="flex items-center gap-3 px-5 py-2.5 text-sm font-medium text-gray-600 dark:text-gray-300 hover:bg-orange-50 dark:hover:bg-gray-700 hover:text-orange-600 dark:hover:text-orange-500 transition-colors">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M20.25 7.5l-.625 10.632a2.25 2.25 0 01-2.247 2.118H6.622a2.25 2.25 0 01-2.247-2.118L3.75 7.5M10 11.25h4M3.375 7.5h17.25c.621 0 1.125-.504 1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125z" />
                                </svg>
                                Pesanan Saya
                            </a>

                            @if (auth()->user()->role === 'admin')
                                <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-3 px-5 py-2.5 text-sm font-bold text-orange-600 dark:text-orange-500 bg-orange-50/50 dark:bg-orange-500/10 hover:bg-orange-100 dark:hover:bg-orange-500/20 transition-colors mt-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6A2.25 2.25 0 016 3.75h2.25A2.25 2.25 0 0110.5 6v2.25a2.25 2.25 0 01-2.25 2.25H6a2.25 2.25 0 01-2.25-2.25V6zM3.75 15.75A2.25 2.25 0 016 13.5h2.25a2.25 2.25 0 012.25 2.25V18a2.25 2.25 0 01-2.25 2.25H6A2.25 2.25 0 013.75 18v-2.25zM13.5 6a2.25 2.25 0 012.25-2.25H18A2.25 2.25 0 0120.25 6v2.25A2.25 2.25 0 0118 10.5h-2.25a2.25 2.25 0 01-2.25-2.25V6zM13.5 15.75a2.25 2.25 0 012.25-2.25H18a2.25 2.25 0 012.25 2.25V18A2.25 2.25 0 0118 20.25h-2.25A2.25 2.25 0 0113.5 18v-2.25z" />
                                    </svg>
                                    Dashboard Admin
                                </a>
                            @endif

                            <form method="POST" action="{{ route('logout') }}" class="border-t border-gray-50 dark:border-gray-700 mt-1 pt-1">
                                @csrf
                                <button type="submit" class="w-full flex items-center gap-3 px-5 py-2.5 text-sm font-bold text-rose-600 dark:text-rose-500 hover:bg-rose-50 dark:hover:bg-rose-500/10 transition-colors rounded-b-xl">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6a2.25 2.25 0 00-2.25 2.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15M12 9l-3 3m0 0l3 3m-3-3h12.75" />
                                    </svg>
                                    Keluar
                                </button>
                            </form>
                        </div>
                    </div>
                @else
                    <a href="{{ route('login') }}"
                       class="bg-gray-900 dark:bg-gray-800 hover:bg-orange-500 dark:hover:bg-orange-500 text-white px-5 py-2.5 rounded-xl text-sm font-bold transition-colors duration-300 shadow-md hover:shadow-orange-500/30">
                        Masuk / Daftar
                    </a>
                @endauth

                {{-- Hamburger Button (Mobile) --}}
                <button onclick="toggleMobileMenu()" class="lg:hidden p-2 -mr-2 text-gray-600 dark:text-gray-300 hover:text-orange-600 focus:outline-none transition-colors">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </button>
            </div>
        </div>
    </nav>

    {{-- Mobile Menu Sidebar --}}
    <div id="mobileMenu" class="lg:hidden fixed inset-0 z-[60] bg-gray-900/50 backdrop-blur-sm opacity-0 pointer-events-none transition-opacity duration-300">
        <div id="mobileMenuPanel" class="fixed inset-y-0 right-0 w-64 bg-white dark:bg-gray-900 shadow-2xl transform translate-x-full transition-transform duration-300 flex flex-col">
            <div class="p-5 flex items-center justify-between border-b border-gray-100 dark:border-gray-800">
                <span class="font-extrabold text-gray-900 dark:text-white">Menu Navigasi</span>
                <button onclick="toggleMobileMenu()" class="p-2 text-gray-400 hover:text-rose-500 rounded-full hover:bg-rose-50 dark:hover:bg-rose-500/10 transition">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
            <div class="flex-1 overflow-y-auto py-4">
                <a href="{{ route('home') }}" class="block px-6 py-3 text-sm font-bold text-gray-700 dark:text-gray-300 hover:bg-orange-50 dark:hover:bg-gray-800 hover:text-orange-600 dark:hover:text-orange-500 transition">Beranda</a>
                <a href="{{ url('/') }}#menu" onclick="toggleMobileMenu()" class="block px-6 py-3 text-sm font-bold text-gray-700 dark:text-gray-300 hover:bg-orange-50 dark:hover:bg-gray-800 hover:text-orange-600 dark:hover:text-orange-500 transition">Menu Makanan</a>
                <a href="{{ route('cara-pesan') }}" class="block px-6 py-3 text-sm font-bold text-gray-700 dark:text-gray-300 hover:bg-orange-50 dark:hover:bg-gray-800 hover:text-orange-600 dark:hover:text-orange-500 transition">Cara Pesan</a>
                <a href="{{ route('promo') }}" class="block px-6 py-3 text-sm font-bold text-gray-700 dark:text-gray-300 hover:bg-orange-50 dark:hover:bg-gray-800 hover:text-orange-600 dark:hover:text-orange-500 transition">Promo Diskon</a>
                <a href="{{ route('tentang-kami') }}" class="block px-6 py-3 text-sm font-bold text-gray-700 dark:text-gray-300 hover:bg-orange-50 dark:hover:bg-gray-800 hover:text-orange-600 dark:hover:text-orange-500 transition">Tentang Kami</a>
            </div>
        </div>
    </div>

    {{-- Alert Messages --}}
    @if (session('success'))
        <div class="max-w-7xl mx-auto px-4 sm:px-6 mt-6">
            <div class="bg-emerald-50 text-emerald-700 px-5 py-4 rounded-2xl text-sm font-bold flex items-center gap-3 border border-emerald-100 shadow-sm animate-fade-in-down">
                <span class="w-6 h-6 rounded-full bg-emerald-200 text-emerald-800 flex items-center justify-center">✓</span>
                <span>{{ session('success') }}</span>
            </div>
        </div>
    @endif

    @if (session('error'))
        <div class="max-w-7xl mx-auto px-4 sm:px-6 mt-6">
            <div class="bg-rose-50 text-rose-700 px-5 py-4 rounded-2xl text-sm font-bold flex items-center gap-3 border border-rose-100 shadow-sm animate-fade-in-down">
                <span class="w-6 h-6 rounded-full bg-rose-200 text-rose-800 flex items-center justify-center">⚠️</span>
                <span>{{ session('error') }}</span>
            </div>
        </div>
    @endif

    {{-- Main Content --}}
    <main class="flex-grow">
        @yield('content')
    </main>

    {{-- Premium Footer --}}
    <footer class="bg-gray-900 text-gray-300 pt-16 pb-8 border-t-4 border-orange-500 mt-auto">
        <div class="max-w-7xl mx-auto px-6">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-12 mb-12">
                
                {{-- Brand Column --}}
                <div class="md:col-span-1">
                    <div class="flex items-center gap-3 mb-6">
                        <img src="{{ asset('images/logo.png') }}" alt="Logo" class="w-10 h-10 rounded-xl object-cover shadow-md shadow-orange-500/30">
                        <div class="leading-tight">
                            <p class="font-extrabold text-white text-[15px] tracking-tight">Warung<span class="text-orange-500">BuKarno</span></p>
                            <p class="text-[10px] text-gray-400 font-medium">Enak, Murah, Bersahabat</p>
                        </div>
                    </div>
                    <p class="text-sm text-gray-400 leading-relaxed font-medium mb-6">
                        Menyajikan hidangan Nusantara terbaik dengan resep warisan. Lezat, bergizi, dan ramah di kantong sejak 2010.
                    </p>
                    <div class="flex gap-3">
                        <a href="#" class="w-8 h-8 rounded-full bg-gray-800 flex items-center justify-center text-gray-400 hover:bg-orange-500 hover:text-white transition-colors">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path fill-rule="evenodd" d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z" clip-rule="evenodd" /></svg>
                        </a>
                        <a href="#" class="w-8 h-8 rounded-full bg-gray-800 flex items-center justify-center text-gray-400 hover:bg-orange-500 hover:text-white transition-colors">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path fill-rule="evenodd" d="M12.315 2c2.43 0 2.784.013 3.808.06 1.064.049 1.791.218 2.427.465a4.902 4.902 0 011.772 1.153 4.902 4.902 0 011.153 1.772c.247.636.416 1.363.465 2.427.048 1.067.06 1.407.06 4.123v.08c0 2.643-.012 2.987-.06 4.043-.049 1.064-.218 1.791-.465 2.427a4.902 4.902 0 01-1.153 1.772 4.902 4.902 0 01-1.772 1.153c-.636.247-1.363.416-2.427.465-1.067.048-1.407.06-4.123.06h-.08c-2.643 0-2.987-.012-4.043-.06-1.064-.049-1.791-.218-2.427-.465a4.902 4.902 0 01-1.772-1.153 4.902 4.902 0 01-1.153-1.772c-.247-.636-.416-1.363-.465-2.427-.047-1.024-.06-1.379-.06-3.808v-.63c0-2.43.013-2.784.06-3.808.049-1.064.218-1.791.465-2.427a4.902 4.902 0 011.153-1.772A4.902 4.902 0 015.45 2.525c.636-.247 1.363-.416 2.427-.465C8.901 2.013 9.256 2 11.685 2h.63zm-.081 1.802h-.468c-2.456 0-2.784.011-3.807.058-.975.045-1.504.207-1.857.344-.467.182-.8.398-1.15.748-.35.35-.566.683-.748 1.15-.137.353-.3.882-.344 1.857-.047 1.023-.058 1.351-.058 3.807v.468c0 2.456.011 2.784.058 3.807.045.975.207 1.504.344 1.857.182.466.399.8.748 1.15.35.35.683.566 1.15.748.353.137.882.3 1.857.344 1.054.048 1.37.058 4.041.058h.08c2.597 0 2.917-.01 3.96-.058.976-.045 1.505-.207 1.858-.344.466-.182.8-.398 1.15-.748.35-.35.566-.683.748-1.15.137-.353.3-.882.344-1.857.048-1.055.058-1.37.058-4.041v-.08c0-2.597-.01-2.917-.058-3.96-.045-.976-.207-1.505-.344-1.858a3.097 3.097 0 00-.748-1.15 3.098 3.098 0 00-1.15-.748c-.353-.137-.882-.3-1.857-.344-1.023-.047-1.351-.058-3.807-.058zM12 6.865a5.135 5.135 0 110 10.27 5.135 5.135 0 010-10.27zm0 1.802a3.333 3.333 0 100 6.666 3.333 3.333 0 000-6.666zm5.338-3.205a1.2 1.2 0 110 2.4 1.2 1.2 0 010-2.4z" clip-rule="evenodd" /></svg>
                        </a>
                    </div>
                </div>

                {{-- Tautan Cepat --}}
                <div class="md:col-span-1">
                    <h3 class="text-white font-extrabold uppercase tracking-widest text-sm mb-6">Tautan Cepat</h3>
                    <ul class="space-y-3 text-sm font-medium">
                        <li><a href="{{ route('home') }}" class="hover:text-orange-500 transition-colors">Beranda</a></li>
                        <li><a href="{{ url('/') }}#menu" class="hover:text-orange-500 transition-colors">Menu Makanan</a></li>
                        <li><a href="{{ route('cara-pesan') }}" class="hover:text-orange-500 transition-colors">Cara Pemesanan</a></li>
                        <li><a href="{{ route('promo') }}" class="hover:text-orange-500 transition-colors">Promo Spesial</a></li>
                        <li><a href="{{ route('tentang-kami') }}" class="hover:text-orange-500 transition-colors">Tentang Kami</a></li>
                    </ul>
                </div>

                {{-- Akun & Dukungan --}}
                <div class="md:col-span-1">
                    <h3 class="text-white font-extrabold uppercase tracking-widest text-sm mb-6">Pusat Bantuan</h3>
                    <ul class="space-y-3 text-sm font-medium">
                        @auth
                            <li><a href="{{ route('profile.edit') }}" class="hover:text-orange-500 transition-colors">Akun Saya</a></li>
                            <li><a href="{{ route('orders.index') }}" class="hover:text-orange-500 transition-colors">Lacak Pesanan</a></li>
                        @else
                            <li><a href="{{ route('login') }}" class="hover:text-orange-500 transition-colors">Login & Daftar</a></li>
                        @endauth
                        <li><a href="#" class="hover:text-orange-500 transition-colors">Syarat & Ketentuan</a></li>
                        <li><a href="#" class="hover:text-orange-500 transition-colors">Kebijakan Privasi</a></li>
                        <li><a href="#" class="hover:text-orange-500 transition-colors">FAQ</a></li>
                    </ul>
                </div>

                {{-- Kontak --}}
                <div class="md:col-span-1">
                    <h3 class="text-white font-extrabold uppercase tracking-widest text-sm mb-6">Hubungi Kami</h3>
                    <ul class="space-y-4 text-sm font-medium">
                        <li class="flex gap-3">
                            <span class="text-xl">📍</span>
                            <span>Jl. Bedagan Raya No. 485, Kelurahan Sekayu, Semarang Tengah</span>
                        </li>
                        <li class="flex items-center gap-3">
                            <span class="text-xl">📞</span>
                            <span class="font-mono text-gray-300">0856-5475-7016</span>
                        </li>
                        <li class="flex items-center gap-3">
                            <span class="text-xl">✉️</span>
                            <a href="mailto:halo@warungbukarno.com" class="hover:text-orange-500 transition-colors">Warungbukarno@gmail.com</a>
                        </li>
                    </ul>
                </div>

            </div>

            <div class="border-t border-gray-800 pt-8 flex flex-col md:flex-row items-center justify-between gap-4">
                <p class="text-sm font-medium text-gray-500">
                    &copy; {{ date('Y') }} <span class="text-gray-400">WarungBuKarno</span>. Hak Cipta Dilindungi.
                </p>
                <div class="flex items-center gap-2">
                    <span class="text-xs font-bold text-gray-600 uppercase tracking-widest mr-2">Powered by</span>
                    <span class="w-8 h-5 bg-gray-800 rounded flex items-center justify-center text-[10px] font-bold text-gray-400">BuKarno</span>
                </div>
            </div>
        </div>
    </footer>

    <style>
        .animate-fade-in-down {
            animation: fadeInDown 0.5s ease-out forwards;
        }
        @keyframes fadeInDown {
            from {
                opacity: 0;
                transform: translateY(-10px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>

    <script>
        // Theme toggle logic
        function toggleTheme() {
            if (document.documentElement.classList.contains('dark')) {
                document.documentElement.classList.remove('dark');
                localStorage.setItem('theme', 'light');
            } else {
                document.documentElement.classList.add('dark');
                localStorage.setItem('theme', 'dark');
            }
        }

        function toggleUserMenu() {
            const menu = document.getElementById('userMenu');
            if(menu.classList.contains('hidden')) {
                menu.classList.remove('hidden');
                // Allow CSS transition to work by putting opacity change in next frame
                setTimeout(() => {
                    menu.classList.add('opacity-100', 'scale-100');
                    menu.classList.remove('opacity-0', 'scale-95');
                }, 10);
            } else {
                menu.classList.add('opacity-0', 'scale-95');
                menu.classList.remove('opacity-100', 'scale-100');
                setTimeout(() => {
                    menu.classList.add('hidden');
                }, 200);
            }
        }

        document.addEventListener('click', function (event) {
            const menu = document.getElementById('userMenu');
            const button = event.target.closest('button[onclick="toggleUserMenu()"]');
            
            if (!button && menu && !menu.contains(event.target) && !menu.classList.contains('hidden')) {
                menu.classList.add('opacity-0', 'scale-95');
                menu.classList.remove('opacity-100', 'scale-100');
                setTimeout(() => {
                    menu.classList.add('hidden');
                }, 200);
            }
        });

        function toggleMobileMenu() {
            const menu = document.getElementById('mobileMenu');
            const panel = document.getElementById('mobileMenuPanel');
            
            if(menu.classList.contains('opacity-0')) {
                menu.classList.remove('opacity-0', 'pointer-events-none');
                panel.classList.remove('translate-x-full');
            } else {
                menu.classList.add('opacity-0', 'pointer-events-none');
                panel.classList.add('translate-x-full');
            }
        }
    </script>

    @if(isset($store_status) && $store_status === 'offline')
    <div id="storeOfflineModal" class="fixed inset-0 z-[100] flex items-center justify-center p-4 animate-fade-in-down">
        <div class="absolute inset-0 bg-gray-900/80 backdrop-blur-sm"></div>
        <div class="relative bg-white dark:bg-gray-900 rounded-3xl p-8 max-w-md w-full shadow-2xl border border-orange-500/30 text-center">
            <div class="w-20 h-20 bg-orange-100 dark:bg-orange-500/20 rounded-full flex items-center justify-center mx-auto mb-5 shadow-inner">
                <span class="text-4xl">🌙</span>
            </div>
            <h2 class="text-2xl font-extrabold text-gray-900 dark:text-white mb-3">Toko Sedang Tutup</h2>
            <p class="text-sm text-gray-600 dark:text-gray-400 mb-6 leading-relaxed">
                Maaf, saat ini WarungBuKarno sedang istirahat. Silakan kembali lagi besok untuk menikmati hidangan lezat kami ya!
            </p>
            <button onclick="document.getElementById('storeOfflineModal').remove()" class="w-full py-3 px-4 bg-gradient-to-r from-orange-500 to-orange-600 hover:from-orange-600 hover:to-orange-700 text-white rounded-xl font-bold shadow-lg shadow-orange-500/30 transition-all transform hover:scale-[1.02]">
                Baik, Mengerti
            </button>
        </div>
    </div>
    @endif

</body>
</html>