@extends('layouts.shop')

@section('title', 'Tentang Kami')

@section('content')

    {{-- Hero Banner --}}
    <section class="relative overflow-hidden bg-gray-900 py-20 text-white">
        <div class="absolute inset-0 opacity-20 bg-[radial-gradient(#f97316_1px,transparent_1px)] [background-size:16px_16px]"></div>
        <div class="absolute -right-20 -top-20 w-80 h-80 bg-orange-500 rounded-full blur-3xl opacity-20"></div>
        <div class="absolute -left-20 -bottom-20 w-80 h-80 bg-amber-500 rounded-full blur-3xl opacity-20"></div>

        <div class="relative z-10 max-w-4xl mx-auto px-6 text-center">
            <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-orange-500/20 border border-orange-500/30 text-orange-300 text-xs font-bold uppercase tracking-wider mb-4 backdrop-blur-md">
                <span>❤️ Cita Rasa Tradisi</span>
            </div>
            <h1 class="text-4xl md:text-5xl font-black tracking-tight mb-4">
                Tentang <span class="text-transparent bg-clip-text bg-gradient-to-r from-orange-400 to-amber-300">WarungBuKarno</span>
            </h1>
            <p class="text-gray-300 text-base md:text-lg max-w-2xl mx-auto font-medium leading-relaxed">
                Enak, Murah, Bersahabat — kehangatan masakan rumah yang selalu dirindukan dari generasi ke generasi.
            </p>
        </div>
    </section>

    {{-- Story Section --}}
    <div class="max-w-5xl mx-auto px-6 py-16">

        <div class="grid grid-cols-1 md:grid-cols-12 gap-10 items-center mb-16">
            {{-- Left Story Column --}}
            <div class="md:col-span-7 space-y-5">
                <div class="inline-block px-3 py-1 bg-orange-100 dark:bg-orange-900/30 text-orange-700 dark:text-orange-400 text-xs font-extrabold rounded-lg uppercase tracking-wider">
                    Kisah Di Balik Dapur Kami
                </div>
                <h2 class="text-3xl font-black text-gray-900 dark:text-white tracking-tight leading-snug">
                    Warung Sederhana dengan Sejuta Kenangan
                </h2>
                <div class="text-gray-600 dark:text-gray-300 text-sm leading-relaxed space-y-4 font-medium">
                    <p>
                        <strong class="text-gray-900 dark:text-white font-bold">WarungBuKarno</strong> didirikan oleh sosok pekerja keras tersayang kami, yaitu <span class="text-orange-600 dark:text-orange-500 font-bold">Mbah Sukarno</span>. Sejak kecil, beliau dididik untuk selalu mandiri, tangguh, dan pantang menyerah. 
                    </p>
                    <p>
                        Walaupun Bu Karno sudah memasuki usia lansia, semangat dan rasa sayangnya tidak pernah pudar dalam menyajikan hidangan hangat untuk setiap pelanggan yang berkunjung. 
                    </p>
                    <p class="p-4 rounded-2xl bg-orange-50/70 dark:bg-orange-900/20 border border-orange-200/60 dark:border-orange-900/50 text-gray-800 dark:text-gray-200 italic">
                        "Walaupun menu yang disajikan sederhana seperti Soto Segar dan Nasi Rames khas rumahan, cita rasanya lezatnya selalu membekas di hati."
                    </p>
                </div>
            </div>

            {{-- Right Graphic Card --}}
            <div class="md:col-span-5">
                <div class="bg-gradient-to-br from-orange-500 to-amber-600 rounded-3xl p-8 text-white text-center shadow-xl shadow-orange-500/20 relative overflow-hidden group">
                    <div class="absolute -right-10 -bottom-10 w-40 h-40 bg-white/10 rounded-full blur-xl group-hover:scale-125 transition-transform"></div>
                    <img src="{{ asset('images/logo.png') }}" alt="Logo" class="w-20 h-20 rounded-2xl object-cover mx-auto mb-4 border border-white/30 shadow-inner bg-white/20 backdrop-blur-md">
                    <h3 class="text-2xl font-black mb-1">WarungBuKarno</h3>
                    <p class="text-orange-100 text-xs font-bold uppercase tracking-widest mb-6">Enak • Murah • Bersahabat</p>
                    <div class="pt-6 border-t border-white/20 text-xs text-orange-100/90 font-medium space-y-1">
                        <p>📍 Jawa Tengah, Semarang Tengah</p>
                        <p>⏰ Senin - Sabtu: Jam 7.00 - 20.00 WIB</p>
                    </div>
                </div>
            </div>
        </div>

        {{-- Core Values / Pillars --}}
        <div class="grid grid-cols-1 sm:grid-cols-3 gap-6 mb-16">
            {{-- Card 1 --}}
            <div class="bg-white dark:bg-gray-900 rounded-3xl p-6 border border-gray-100 dark:border-gray-800 shadow-sm text-center hover:-translate-y-1 transition-transform duration-300">
                <div class="w-14 h-14 rounded-2xl bg-rose-100 dark:bg-rose-900/30 text-rose-600 dark:text-rose-500 flex items-center justify-center text-2xl mx-auto mb-4 shadow-sm">
                    ❤️
                </div>
                <h3 class="font-extrabold text-gray-900 dark:text-white text-base mb-2">Dibuat dengan Cinta</h3>
                <p class="text-xs text-gray-500 dark:text-gray-400 leading-relaxed font-medium">Setiap porsi makanan dimasak sepenuh hati menggunakan resep warisan keluarga.</p>
            </div>

            {{-- Card 2 --}}
            <div class="bg-white dark:bg-gray-900 rounded-3xl p-6 border border-gray-100 dark:border-gray-800 shadow-sm text-center hover:-translate-y-1 transition-transform duration-300">
                <div class="w-14 h-14 rounded-2xl bg-emerald-100 dark:bg-emerald-900/30 text-emerald-600 dark:text-emerald-500 flex items-center justify-center text-2xl mx-auto mb-4 shadow-sm">
                    🌱
                </div>
                <h3 class="font-extrabold text-gray-900 dark:text-white text-base mb-2">Bahan Berkualitas</h3>
                <p class="text-xs text-gray-500 dark:text-gray-400 leading-relaxed font-medium">Selalu menggunakan bahan segar harian yang bersih dan terjamin kehalalannya.</p>
            </div>

            {{-- Card 3 --}}
            <div class="bg-white dark:bg-gray-900 rounded-3xl p-6 border border-gray-100 dark:border-gray-800 shadow-sm text-center hover:-translate-y-1 transition-transform duration-300">
                <div class="w-14 h-14 rounded-2xl bg-amber-100 dark:bg-amber-900/30 text-amber-600 dark:text-amber-500 flex items-center justify-center text-2xl mx-auto mb-4 shadow-sm">
                    ⚡
                </div>
                <h3 class="font-extrabold text-gray-900 dark:text-white text-base mb-2">Cepat & Tepat Waktu</h3>
                <p class="text-xs text-gray-500 dark:text-gray-400 leading-relaxed font-medium">Proses penyiapan yang sigap agar pesanan sampai di mejamu selagi masih hangat.</p>
            </div>
        </div>

        {{-- Contact / Question Box --}}
        <div class="bg-white dark:bg-gray-900 border border-gray-100 dark:border-gray-800 rounded-3xl p-8 md:p-10 shadow-sm flex flex-col md:flex-row items-center justify-between gap-6">
            <div>
                <h3 class="text-xl font-black text-gray-900 dark:text-white mb-1">Punya Pertanyaan atau Pesanan Khusus?</h3>
                <p class="text-sm text-gray-500 dark:text-gray-400 font-medium">Tim kami siap melayani dan menjawab pertanyaanmu setiap hari.</p>
            </div>
            <a href="https://wa.me/6285654757016" target="_blank" class="flex-shrink-0 bg-green-500 hover:bg-green-600 text-white font-bold px-6 py-3.5 rounded-xl text-sm transition-all flex items-center gap-2 shadow-lg shadow-green-500/20">
                <span>💬</span> Hubungi via WhatsApp
            </a>
        </div>

    </div>

@endsection