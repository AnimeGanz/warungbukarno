<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Dashboard') - Admin WarungBuKarno</title>
    <link rel="icon" type="image/png" href="{{ asset('images/logo.png') }}">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://cdn.jsdelivr.net/npm/chart.js@4"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; }
    </style>
</head>
<body class="bg-[#0B0D13] text-gray-100 font-sans antialiased selection:bg-orange-500 selection:text-white">
    <div class="flex min-h-screen">

        {{-- Mobile Overlay --}}
        <div id="sidebarOverlay" onclick="toggleAdminSidebar()" class="fixed inset-0 bg-black/60 z-30 hidden md:hidden backdrop-blur-sm transition-opacity opacity-0 duration-300"></div>

        {{-- Sidebar --}}
        <aside id="adminSidebar" class="w-64 bg-[#11141E] border-r border-white/[0.07] flex flex-col fixed h-screen z-40 transition-transform duration-300 -translate-x-full md:translate-x-0">
            {{-- Brand Logo --}}
            <div class="px-6 py-5 border-b border-white/[0.07] flex items-center gap-3">
                <div class="relative">
                    <img src="{{ asset('images/logo.png') }}" alt="WarungBuKarno" class="w-10 h-10 rounded-xl object-cover ring-2 ring-orange-500/30">
                    <span class="absolute -bottom-0.5 -right-0.5 w-3 h-3 bg-emerald-500 border-2 border-[#11141E] rounded-full"></span>
                </div>
                <div class="overflow-hidden">
                    <h1 class="text-white font-extrabold text-sm leading-tight tracking-tight">Warung<span class="text-orange-500">BuKarno</span></h1>
                    <span class="inline-flex items-center gap-1 text-[10px] text-orange-400 font-semibold uppercase tracking-wider">
                        ⭐ Admin Control
                    </span>
                </div>
            </div>

            {{-- Navigation Menu --}}
            <nav class="flex-1 px-3 py-6 space-y-1.5 overflow-y-auto">
                <p class="px-3 text-[10px] uppercase tracking-wider text-gray-500 font-bold mb-2">Menu Utama</p>

                {{-- Dashboard --}}
                <a href="{{ route('admin.dashboard') }}"
                   class="flex items-center gap-3 px-3.5 py-2.5 rounded-xl text-sm font-semibold transition group {{ request()->routeIs('admin.dashboard') ? 'bg-gradient-to-r from-orange-500/20 to-orange-500/5 text-orange-400 border border-orange-500/30 shadow-sm shadow-orange-500/10' : 'text-gray-400 hover:bg-white/[0.04] hover:text-white' }}">
                    <div class="w-7 h-7 rounded-lg flex items-center justify-center transition {{ request()->routeIs('admin.dashboard') ? 'bg-orange-500 text-white shadow-sm' : 'bg-white/5 text-gray-400 group-hover:text-white' }}">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6A2.25 2.25 0 016 3.75h2.25A2.25 2.25 0 0110.5 6v2.25a2.25 2.25 0 01-2.25 2.25H6a2.25 2.25 0 01-2.25-2.25V6zM3.75 15.75A2.25 2.25 0 016 13.5h2.25a2.25 2.25 0 012.25 2.25V18a2.25 2.25 0 01-2.25 2.25H6A2.25 2.25 0 013.75 18v-2.25zM13.5 6a2.25 2.25 0 012.25-2.25H18A2.25 2.25 0 0120.25 6v2.25A2.25 2.25 0 0118 10.5h-2.25a2.25 2.25 0 01-2.25-2.25V6zM13.5 15.75a2.25 2.25 0 012.25-2.25H18a2.25 2.25 0 012.25 2.25V18A2.25 2.25 0 0118 20.25h-2.25A2.25 2.25 0 0113.5 18v-2.25z" />
                        </svg>
                    </div>
                    <span>Dashboard</span>
                </a>

                {{-- Produk --}}
                <a href="{{ route('admin.products.index') }}"
                   class="flex items-center gap-3 px-3.5 py-2.5 rounded-xl text-sm font-semibold transition group {{ request()->routeIs('admin.products.*') ? 'bg-gradient-to-r from-orange-500/20 to-orange-500/5 text-orange-400 border border-orange-500/30 shadow-sm shadow-orange-500/10' : 'text-gray-400 hover:bg-white/[0.04] hover:text-white' }}">
                    <div class="w-7 h-7 rounded-lg flex items-center justify-center transition {{ request()->routeIs('admin.products.*') ? 'bg-orange-500 text-white shadow-sm' : 'bg-white/5 text-gray-400 group-hover:text-white' }}">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M20.25 7.5l-.625 10.632a2.25 2.25 0 01-2.247 2.118H6.622a2.25 2.25 0 01-2.247-2.118L3.75 7.5M10 11.25h4M3.375 7.5h17.25c.621 0 1.125-.504 1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125z" />
                        </svg>
                    </div>
                    <span>Kelola Produk</span>
                </a>

                {{-- Kategori --}}
                <a href="{{ route('admin.categories.index') }}"
                   class="flex items-center gap-3 px-3.5 py-2.5 rounded-xl text-sm font-semibold transition group {{ request()->routeIs('admin.categories.*') ? 'bg-gradient-to-r from-orange-500/20 to-orange-500/5 text-orange-400 border border-orange-500/30 shadow-sm shadow-orange-500/10' : 'text-gray-400 hover:bg-white/[0.04] hover:text-white' }}">
                    <div class="w-7 h-7 rounded-lg flex items-center justify-center transition {{ request()->routeIs('admin.categories.*') ? 'bg-orange-500 text-white shadow-sm' : 'bg-white/5 text-gray-400 group-hover:text-white' }}">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 6.878V6a2.25 2.25 0 012.25-2.25h7.5A2.25 2.25 0 0118 6v.878m-12 0c.235-.083.487-.128.75-.128h10.5c.263 0 .515.045.75.128m-12 0A2.25 2.25 0 004.5 9v.878m13.5-3A2.25 2.25 0 0119.5 9v.878m0 0a2.246 2.246 0 00-.75-.128H5.25c-.263 0-.515.045-.75.128m15 0A2.25 2.25 0 0121 12v6a2.25 2.25 0 01-2.25 2.25H5.25A2.25 2.25 0 013 18v-6c0-.98.626-1.813 1.5-2.122" />
                        </svg>
                    </div>
                    <span>Kategori Menu</span>
                </a>

                {{-- Promo & Voucher --}}
                <a href="{{ route('admin.promos.index') }}"
                   class="flex items-center gap-3 px-3.5 py-2.5 rounded-xl text-sm font-semibold transition group {{ request()->routeIs('admin.promos.*') ? 'bg-gradient-to-r from-orange-500/20 to-orange-500/5 text-orange-400 border border-orange-500/30 shadow-sm shadow-orange-500/10' : 'text-gray-400 hover:bg-white/[0.04] hover:text-white' }}">
                    <div class="w-7 h-7 rounded-lg flex items-center justify-center transition {{ request()->routeIs('admin.promos.*') ? 'bg-orange-500 text-white shadow-sm' : 'bg-white/5 text-gray-400 group-hover:text-white' }}">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 6v.75m0 3v.75m0 3v.75m0 3V18m-9-5.25h5.25M7.5 15h3M3.375 5.25c-.621 0-1.125.504-1.125 1.125v3.026a2.999 2.999 0 010 5.198v3.026c0 .621.504 1.125 1.125 1.125h17.25c.621 0 1.125-.504 1.125-1.125v-3.026a2.999 2.999 0 010-5.198V6.375c0-.621-.504-1.125-1.125-1.125H3.375z" />
                        </svg>
                    </div>
                    <span>Kelola Promo</span>
                </a>

                {{-- Pesanan Pelanggan --}}
                @php
                    $pendingCount = \App\Models\Order::where('status', 'menunggu')->count();
                @endphp
                <a href="{{ route('admin.orders.index') }}"
                   class="flex items-center justify-between px-3.5 py-2.5 rounded-xl text-sm font-semibold transition group {{ request()->routeIs('admin.orders.*') ? 'bg-gradient-to-r from-orange-500/20 to-orange-500/5 text-orange-400 border border-orange-500/30 shadow-sm shadow-orange-500/10' : 'text-gray-400 hover:bg-white/[0.04] hover:text-white' }}">
                    <div class="flex items-center gap-3">
                        <div class="w-7 h-7 rounded-lg flex items-center justify-center transition {{ request()->routeIs('admin.orders.*') ? 'bg-orange-500 text-white shadow-sm' : 'bg-white/5 text-gray-400 group-hover:text-white' }}">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 8.25h19.5M2.25 9h19.5m-16.5 5.25h6m-6 2.25h3m-3.75 3h15a2.25 2.25 0 002.25-2.25V6.75A2.25 2.25 0 0018.75 4.5H5.25A2.25 2.25 0 003 6.75v10.5A2.25 2.25 0 005.25 19.5z" />
                            </svg>
                        </div>
                        <span>Pesanan Masuk</span>
                    </div>
                    @if ($pendingCount > 0)
                        <span class="px-2 py-0.5 text-[11px] font-bold rounded-full bg-amber-500 text-gray-950 animate-pulse">
                            {{ $pendingCount }}
                        </span>
                    @endif
                </a>

                {{-- Kelola Pengguna --}}
                <a href="{{ route('admin.users.index') }}"
                   class="flex items-center gap-3 px-3.5 py-2.5 rounded-xl text-sm font-semibold transition group {{ request()->routeIs('admin.users.*') ? 'bg-gradient-to-r from-orange-500/20 to-orange-500/5 text-orange-400 border border-orange-500/30 shadow-sm shadow-orange-500/10' : 'text-gray-400 hover:bg-white/[0.04] hover:text-white' }}">
                    <div class="w-7 h-7 rounded-lg flex items-center justify-center transition {{ request()->routeIs('admin.users.*') ? 'bg-orange-500 text-white shadow-sm' : 'bg-white/5 text-gray-400 group-hover:text-white' }}">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                        </svg>
                    </div>
                    <span>Kelola Pengguna</span>
                </a>

                {{-- Kelola Ulasan --}}
                <a href="{{ route('admin.reviews.index') }}"
                   class="flex items-center gap-3 px-3.5 py-2.5 rounded-xl text-sm font-semibold transition group {{ request()->routeIs('admin.reviews.*') ? 'bg-gradient-to-r from-orange-500/20 to-orange-500/5 text-orange-400 border border-orange-500/30 shadow-sm shadow-orange-500/10' : 'text-gray-400 hover:bg-white/[0.04] hover:text-white' }}">
                    <div class="w-7 h-7 rounded-lg flex items-center justify-center transition {{ request()->routeIs('admin.reviews.*') ? 'bg-orange-500 text-white shadow-sm' : 'bg-white/5 text-gray-400 group-hover:text-white' }}">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z" />
                        </svg>
                    </div>
                    <span>Kelola Ulasan</span>
                </a>
            </nav>

            {{-- Sidebar Footer Profile & Logout --}}
            <div class="p-4 border-t border-white/[0.07] bg-[#0E111A]">
                <div class="flex items-center gap-3 px-2 py-2 mb-2">
                    <div class="w-9 h-9 rounded-xl bg-gradient-to-tr from-orange-500 to-amber-400 text-white flex items-center justify-center text-xs font-bold shadow-md">
                        {{ strtoupper(substr(auth()->user()->name, 0, 2)) }}
                    </div>
                    <div class="overflow-hidden flex-1">
                        <p class="text-xs font-bold text-white truncate">{{ auth()->user()->name }}</p>
                        <p class="text-[11px] text-gray-400 truncate">Administrator</p>
                    </div>
                </div>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="w-full flex items-center justify-center gap-2 px-3 py-2 rounded-xl text-xs font-semibold text-red-400 hover:bg-red-500/10 hover:text-red-300 border border-red-500/10 transition">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6a2.25 2.25 0 00-2.25 2.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15M12 9l-3 3m0 0l3 3m-3-3h12.75" />
                        </svg>
                        <span>Keluar Panel</span>
                    </button>
                </form>
            </div>
        </aside>

        {{-- Main content area --}}
        <div class="flex-1 flex flex-col md:ml-64 min-w-0 w-full transition-all duration-300">

            {{-- Header Topbar --}}
            <header class="bg-[#11141E]/80 backdrop-blur-xl border-b border-white/[0.07] px-4 sm:px-8 py-4 sticky top-0 z-20 flex items-center justify-between">
                <div class="flex items-center gap-3">
                    <button onclick="toggleAdminSidebar()" class="md:hidden p-1.5 -ml-1.5 text-gray-400 hover:text-white rounded-lg hover:bg-white/5 transition-colors focus:outline-none">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                    </button>
                    <h2 class="text-base sm:text-lg font-bold text-white tracking-tight">@yield('title', 'Dashboard')</h2>
                </div>

                <div class="flex items-center gap-4">
                    {{-- Quick Link to Storefront --}}
                    <a href="{{ route('home') }}" target="_blank"
                       class="hidden sm:inline-flex items-center gap-2 px-3.5 py-1.5 rounded-xl bg-white/[0.04] hover:bg-white/[0.08] border border-white/[0.08] text-xs font-semibold text-gray-300 hover:text-white transition">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-3.5 h-3.5 text-orange-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 6H5.25A2.25 2.25 0 003 8.25v10.5A2.25 2.25 0 005.25 21h10.5A2.25 2.25 0 0018 18.75V10.5m-10.5 6L21 3m0 0h-5.25M21 3v5.25" />
                        </svg>
                        <span>Lihat Toko Live</span>
                    </a>

                    {{-- Live Clock & Status --}}
                    <div class="flex items-center gap-3 bg-white/[0.03] border border-white/[0.06] px-3.5 py-1.5 rounded-xl">
                        <div class="flex items-center gap-1.5">
                            <span id="statusDot" class="w-2 h-2 rounded-full bg-emerald-400 animate-pulse"></span>
                            <span id="statusText" class="text-xs text-gray-300 font-medium">Online</span>
                        </div>
                        <div class="w-px h-3.5 bg-white/10"></div>
                        <div class="text-right">
                            <p id="liveClock" class="text-xs font-mono font-bold text-white"></p>
                        </div>
                    </div>
                </div>
            </header>

            {{-- Main Page Body --}}
            <main class="flex-1 p-6 sm:p-8 max-w-7xl w-full">
                @if (session('success'))
                    <div class="mb-6 bg-emerald-500/10 border border-emerald-500/20 text-emerald-400 px-4 py-3 rounded-2xl text-xs sm:text-sm flex items-center gap-2.5 shadow-sm">
                        <span class="text-emerald-400 text-base">✓</span>
                        <span>{{ session('success') }}</span>
                    </div>
                @endif

                @if (session('error'))
                    <div class="mb-6 bg-rose-500/10 border border-rose-500/20 text-rose-400 px-4 py-3 rounded-2xl text-xs sm:text-sm flex items-center gap-2.5 shadow-sm">
                        <span class="text-rose-400 text-base">⚠️</span>
                        <span>{{ session('error') }}</span>
                    </div>
                @endif

                @yield('content')
            </main>

            {{-- Footer --}}
            <footer class="px-8 py-5 border-t border-white/[0.05] text-xs text-gray-500 flex flex-col sm:flex-row items-center justify-between gap-2">
                <p>© {{ date('Y') }} WarungBuKarno Admin Portal. Sistem Pengelolaan Warung Online.</p>
                <p class="text-gray-600">Versi 2.0 · Server Siap Pakai</p>
            </footer>
        </div>

    </div>

    <script>
        function updateClock() {
            const now = new Date();
            const timeOptions = { hour: '2-digit', minute: '2-digit', second: '2-digit' };
            const clockEl = document.getElementById('liveClock');
            if (clockEl) {
                clockEl.textContent = now.toLocaleTimeString('id-ID', timeOptions) + ' WIB';
            }
        }

        function updateOnlineStatus() {
            const dot = document.getElementById('statusDot');
            const text = document.getElementById('statusText');
            if (!dot || !text) return;

            if (navigator.onLine) {
                dot.className = 'w-2 h-2 rounded-full bg-emerald-400 animate-pulse';
                text.textContent = 'Online';
                text.className = 'text-xs text-gray-300 font-medium';
            } else {
                dot.className = 'w-2 h-2 rounded-full bg-rose-500';
                text.textContent = 'Offline';
                text.className = 'text-xs text-rose-400 font-medium';
            }
        }

        updateClock();
        setInterval(updateClock, 1000);
        updateOnlineStatus();
        window.addEventListener('online', updateOnlineStatus);
        window.addEventListener('offline', updateOnlineStatus);

        function toggleAdminSidebar() {
            const sidebar = document.getElementById('adminSidebar');
            const overlay = document.getElementById('sidebarOverlay');
            
            if (sidebar.classList.contains('-translate-x-full')) {
                // Open sidebar
                sidebar.classList.remove('-translate-x-full');
                overlay.classList.remove('hidden');
                // slight delay for transition
                setTimeout(() => {
                    overlay.classList.remove('opacity-0');
                }, 10);
            } else {
                // Close sidebar
                sidebar.classList.add('-translate-x-full');
                overlay.classList.add('opacity-0');
                setTimeout(() => {
                    overlay.classList.add('hidden');
                }, 300);
            }
        }
    </script>
</body>
</html>