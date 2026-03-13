<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Tapem - Tata Pemerintahan') }}</title>
        <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">
        <meta name="description" content="Portal resmi Bagian Tata Pemerintahan Sekretariat Daerah Kabupaten Tojo Una-Una. Pusat informasi layanan administrasi pemerintahan.">

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Public+Sans:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet"/>

        <!-- Tailwind CSS CDN -->
        <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
        <script>
            tailwind.config = {
                darkMode: 'class',
                theme: {
                    extend: {
                        colors: {
                            'primary': '#1152d4',
                            'background-light': '#f6f6f8',
                            'background-dark': '#101622',
                        },
                        fontFamily: {
                            'display': ['Public Sans', 'sans-serif']
                        },
                        borderRadius: {
                            'DEFAULT': '0.25rem',
                            'lg': '0.5rem',
                            'xl': '0.75rem',
                            'full': '9999px'
                        },
                    },
                },
            }
        </script>

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
        <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>

        <style>
            body { font-family: 'Public Sans', 'Inter', sans-serif; }
        </style>
    </head>
    <body class="bg-background-light font-display text-slate-900 antialiased flex flex-col min-h-screen">

        <!-- Header / Navigation -->
        <header x-data="{ open: false, scrolled: false }" 
                @scroll.window="scrolled = (window.pageYOffset > 20)"
                :class="{'bg-white/95 dark:bg-slate-900/95 shadow-md py-2': scrolled, 'bg-slate-50/80 dark:bg-slate-900/80 py-4': !scrolled}"
                class="fixed top-0 z-50 w-full transition-all duration-300 backdrop-blur-md border-b border-slate-200/50 dark:border-slate-800/50">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex items-center justify-between">
                    <!-- Logo -->
                    <div class="flex items-center gap-3">
                        <a href="{{ route('public.beranda') }}" class="flex items-center gap-3 group">
                            <div class="bg-white p-1 rounded-lg shadow-sm border border-slate-100 group-hover:scale-105 transition-transform">
                                <img src="{{ asset('assets/logo.png') }}" alt="Logo Tojo Una-Una" class="h-10 w-auto object-contain">
                            </div>
                            <div class="flex flex-col">
                                <h2 class="text-sm font-black leading-tight tracking-tight sm:text-lg text-slate-900 dark:text-white uppercase">Tapem Una-Una</h2>
                                <p class="text-[9px] font-bold uppercase tracking-[0.2em] text-primary">Sekretariat Daerah</p>
                            </div>
                        </a>
                    </div>

                    <!-- Desktop Navigation -->
                    <nav class="hidden md:flex items-center gap-1">
                        <a class="px-4 py-2 rounded-lg text-sm font-bold {{ request()->routeIs('public.beranda') ? 'text-primary bg-primary/5' : 'text-slate-600 hover:text-primary hover:bg-slate-100/50 dark:text-slate-400' }} transition-all" href="{{ route('public.beranda') }}">Beranda</a>
                        <a class="px-4 py-2 rounded-lg text-sm font-bold {{ request()->routeIs('public.profil') ? 'text-primary bg-primary/5' : 'text-slate-600 hover:text-primary hover:bg-slate-100/50 dark:text-slate-400' }} transition-all" href="{{ route('public.profil') }}">Profil</a>

                        <!-- Layanan Dropdown -->
                        <div class="group relative px-2">
                            <button class="flex items-center gap-1 px-4 py-2 rounded-lg text-sm font-bold {{ request()->is('sub-bagian/*') ? 'text-primary bg-primary/5' : 'text-slate-600 hover:text-primary hover:bg-slate-100/50 dark:text-slate-400' }} transition-all">
                                Layanan
                                <span class="material-symbols-outlined text-sm group-hover:rotate-180 transition-transform">expand_more</span>
                            </button>
                            <div class="absolute left-1/2 -translate-x-1/2 top-full pt-4 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-300 z-[60] scale-95 group-hover:scale-100">
                                <div class="w-64 overflow-hidden rounded-2xl bg-white dark:bg-slate-800 shadow-2xl border border-slate-100 dark:border-slate-700 p-2">
                                    <a class="flex items-center gap-3 px-4 py-3 text-sm font-bold text-slate-700 dark:text-slate-300 hover:bg-primary/5 hover:text-primary rounded-xl transition-all" href="{{ route('public.otda') }}">
                                        <span class="material-symbols-outlined text-xl opacity-50">account_balance</span>
                                        Otonomi Daerah
                                    </a>
                                    <a class="flex items-center gap-3 px-4 py-3 text-sm font-bold text-slate-700 dark:text-slate-300 hover:bg-primary/5 hover:text-primary rounded-xl transition-all" href="{{ route('public.pemerintahan') }}">
                                        <span class="material-symbols-outlined text-xl opacity-50">account_balance_wallet</span>
                                        Pemerintahan
                                    </a>
                                    <a class="flex items-center gap-3 px-4 py-3 text-sm font-bold text-slate-700 dark:text-slate-300 hover:bg-primary/5 hover:text-primary rounded-xl transition-all" href="{{ route('public.kewilayahan') }}">
                                        <span class="material-symbols-outlined text-xl opacity-50">map</span>
                                        Kewilayahan
                                    </a>
                                </div>
                            </div>
                        </div>

                        <a class="px-4 py-2 rounded-lg text-sm font-bold {{ request()->routeIs('public.dokumentasi') ? 'text-primary bg-primary/5' : 'text-slate-600 hover:text-primary hover:bg-slate-100/50 dark:text-slate-400' }} transition-all" href="{{ route('public.dokumentasi') }}">Dokumentasi</a>
                    </nav>

                    <!-- Right Side Actions -->
                    <div class="flex items-center gap-4">
                        <a href="{{ route('login') }}" class="hidden sm:inline-flex h-10 items-center justify-center rounded-xl bg-slate-900 text-xs font-bold text-white px-6 hover:bg-primary transition-all shadow-lg shadow-slate-900/10">
                            Admin Portal
                        </a>
                        <!-- Mobile Hamburger -->
                        <button @click="open = ! open" class="md:hidden text-slate-900 dark:text-white p-2">
                            <span class="material-symbols-outlined text-2xl" x-show="!open">menu</span>
                            <span class="material-symbols-outlined text-2xl" x-show="open" style="display: none;">close</span>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Responsive Navigation Menu (Mobile) -->
            <div x-show="open" 
                 x-transition:enter="transition ease-out duration-200"
                 x-transition:enter-start="opacity-0 -translate-y-4"
                 x-transition:enter-end="opacity-100 translate-y-0"
                 class="md:hidden bg-white dark:bg-slate-900 border-t border-slate-200 dark:border-slate-800 shadow-xl overflow-y-auto max-h-[calc(100vh-80px)]">
                <div class="p-6 space-y-4">
                    <a href="{{ route('public.beranda') }}" class="block py-3 px-4 rounded-xl text-base font-bold {{ request()->routeIs('public.beranda') ? 'bg-primary/5 text-primary' : 'text-slate-700 dark:text-slate-300' }}">Beranda</a>
                    <a href="{{ route('public.profil') }}" class="block py-3 px-4 rounded-xl text-base font-bold {{ request()->routeIs('public.profil') ? 'bg-primary/5 text-primary' : 'text-slate-700 dark:text-slate-300' }}">Profil</a>

                    <div class="space-y-2">
                        <div class="text-[10px] font-black uppercase tracking-widest text-slate-400 px-4">Layanan</div>
                        <div class="grid grid-cols-1 gap-2">
                            <a href="{{ route('public.otda') }}" class="flex items-center gap-3 py-3 px-4 rounded-xl text-sm font-bold {{ request()->routeIs('public.otda') ? 'bg-primary/5 text-primary' : 'text-slate-600 dark:text-slate-400' }}">
                                <span class="material-symbols-outlined text-xl">account_balance</span> Otonomi Daerah
                            </a>
                            <a href="{{ route('public.pemerintahan') }}" class="flex items-center gap-3 py-3 px-4 rounded-xl text-sm font-bold {{ request()->routeIs('public.pemerintahan') ? 'bg-primary/5 text-primary' : 'text-slate-600 dark:text-slate-400' }}">
                                <span class="material-symbols-outlined text-xl">account_balance_wallet</span> Pemerintahan
                            </a>
                            <a href="{{ route('public.kewilayahan') }}" class="flex items-center gap-3 py-3 px-4 rounded-xl text-sm font-bold {{ request()->routeIs('public.kewilayahan') ? 'bg-primary/5 text-primary' : 'text-slate-600 dark:text-slate-400' }}">
                                <span class="material-symbols-outlined text-xl">map</span> Kewilayahan
                            </a>
                        </div>
                    </div>

                    <a href="{{ route('public.dokumentasi') }}" class="block py-3 px-4 rounded-xl text-base font-bold {{ request()->routeIs('public.dokumentasi') ? 'bg-primary/5 text-primary' : 'text-slate-700 dark:text-slate-300' }}">Dokumentasi</a>
                    
                    <a href="{{ route('login') }}" class="block w-full py-4 rounded-xl bg-slate-900 text-white text-center font-bold text-sm">
                        Admin Portal
                    </a>
                </div>
            </div>
        </header>

        <!-- Page Content -->
        <main class="flex-grow pt-24">
            @yield('content')
        </main>

        <!-- Footer -->
        <footer class="bg-[#0a0f1a] text-slate-300 py-16 border-t-4 border-primary/20">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-12">
                    <!-- Brand -->
                    <div class="space-y-6">
                        <div class="flex items-center gap-3">
                            <img src="{{ asset('assets/logo.png') }}" alt="Logo Tojo Una-Una" class="h-12 w-auto object-contain bg-white/10 p-1 rounded-lg">
                            <h2 class="text-lg font-bold text-white leading-tight">Tapem<br/>Tojo Una-Una</h2>
                        </div>
                        <p class="text-sm leading-relaxed">
                            Kantor Bupati Kabupaten Tojo Una-Una, Bagian Tata Pemerintahan. Melayani dengan integritas dan profesionalisme.
                        </p>
                    </div>

                    <!-- Quick Links -->
                    <div>
                        <h4 class="text-white font-bold mb-6">Tautan Langsung</h4>
                        <ul class="space-y-4 text-sm">
                            <li><a class="hover:text-primary transition-colors" href="{{ route('public.beranda') }}">Beranda</a></li>
                            <li><a class="hover:text-primary transition-colors" href="{{ route('public.profil') }}">Profil Organisasi</a></li>
                            <li><a class="hover:text-primary transition-colors" href="{{ route('public.otda') }}">Sub Bagian Otda</a></li>
                            <li><a class="hover:text-primary transition-colors" href="{{ route('public.kewilayahan') }}">Sub Bagian Kewilayahan</a></li>
                            <li><a class="hover:text-primary transition-colors font-medium opacity-50" href="{{ route('login') }}">Admin Area</a></li>
                        </ul>
                    </div>

                    <!-- Public Services -->
                    <div>
                        <h4 class="text-white font-bold mb-6">Layanan Publik</h4>
                        <ul class="space-y-4 text-sm">
                            <li><a class="hover:text-primary transition-colors" href="{{ route('public.otda') }}">Portal LPPD</a></li>
                            <li><a class="hover:text-primary transition-colors" href="{{ route('public.kewilayahan') }}">Dokumen LKPJ</a></li>
                            <li><a class="hover:text-primary transition-colors" href="{{ route('public.pemerintahan') }}">Laporan SPM</a></li>
                            <li><a class="hover:text-primary transition-colors" href="{{ route('public.dokumentasi') }}">Dokumentasi Kegiatan</a></li>
                        </ul>
                    </div>

                    <!-- Contact -->
                    <div>
                        <h4 class="text-white font-bold mb-6">Hubungi Kami</h4>
                        <ul class="space-y-4 text-sm">
                            <li class="flex gap-3">
                                <span class="material-symbols-outlined text-primary">location_on</span>
                                <span>Jl. Merdeka No. 1, Kompleks Perkantoran Bumi Mas, Tojo Una-Una</span>
                            </li>
                            <li class="flex gap-3">
                                <span class="material-symbols-outlined text-primary">call</span>
                                <span>(0448) 211234</span>
                            </li>
                            <li class="flex gap-3">
                                <span class="material-symbols-outlined text-primary">mail</span>
                                <span>tapem@tojounauna.go.id</span>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="mt-16 pt-8 border-t border-slate-800 text-center text-xs text-slate-500">
                    <p>&copy; {{ date('Y') }} Bagian Tata Pemerintahan Kabupaten Tojo Una-Una. Seluruh hak cipta dilindungi.</p>
                </div>
            </div>
        </footer>

    </body>
</html>
