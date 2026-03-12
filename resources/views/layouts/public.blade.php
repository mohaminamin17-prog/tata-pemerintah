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
        <header x-data="{ open: false }" class="sticky top-0 z-50 w-full border-b border-slate-200 bg-slate-50/90 backdrop-blur-md shadow-sm">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex h-16 items-center justify-between">
                    <!-- Logo -->
                    <div class="flex items-center gap-3">
                        <a href="{{ route('public.beranda') }}" class="flex items-center gap-3">
                            <img src="{{ asset('assets/logo.png') }}" alt="Logo Tojo Una-Una" class="h-12 w-auto object-contain">
                            <div class="flex flex-col">
                                <h2 class="text-sm font-bold leading-tight tracking-tight sm:text-lg">Tapem Tojo Una-Una</h2>
                                <p class="text-[10px] uppercase tracking-widest text-slate-500">Pemerintah Kabupaten</p>
                            </div>
                        </a>
                    </div>

                    <!-- Desktop Navigation -->
                    <nav class="hidden md:flex items-center gap-8">
                        <a class="text-sm font-semibold {{ request()->routeIs('public.beranda') ? 'text-primary' : 'text-slate-600 hover:text-primary' }} transition-colors" href="{{ route('public.beranda') }}">Beranda</a>
                        <a class="text-sm font-medium {{ request()->routeIs('public.profil') ? 'text-primary font-semibold' : 'text-slate-600 hover:text-primary' }} transition-colors" href="{{ route('public.profil') }}">Profil</a>

                        <!-- Layanan Dropdown -->
                        <div class="group relative">
                            <button class="flex items-center gap-1 text-sm font-medium {{ request()->is('sub-bagian/*') ? 'text-primary font-semibold' : 'text-slate-600 hover:text-primary' }} transition-colors">
                                Layanan
                                <span class="material-symbols-outlined text-sm">keyboard_arrow_down</span>
                            </button>
                            <div class="absolute left-0 top-full pt-4 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-300 z-[60]">
                                <div class="w-56 overflow-hidden rounded-xl bg-white shadow-xl border border-slate-100">
                                    <a class="block px-4 py-3 text-sm text-slate-700 hover:bg-slate-50 hover:text-primary transition-colors" href="{{ route('public.otda') }}">
                                        Otonomi Daerah
                                    </a>
                                    <a class="block px-4 py-3 text-sm text-slate-700 hover:bg-slate-50 hover:text-primary transition-colors border-t border-slate-50" href="{{ route('public.pemerintahan') }}">
                                        Pemerintahan
                                    </a>
                                    <a class="block px-4 py-3 text-sm text-slate-700 hover:bg-slate-50 hover:text-primary transition-colors border-t border-slate-50" href="{{ route('public.kewilayahan') }}">
                                        Kewilayahan
                                    </a>
                                </div>
                            </div>
                        </div>

                        <a class="text-sm font-medium {{ request()->routeIs('public.dokumentasi') ? 'text-primary font-semibold' : 'text-slate-600 hover:text-primary' }} transition-colors" href="{{ route('public.dokumentasi') }}">Dokumentasi</a>
                    </nav>

                    <!-- Right Side Actions -->
                    <div class="flex items-center gap-4">
                        <!-- Mobile Hamburger -->
                        <button @click="open = ! open" class="md:hidden text-slate-600">
                            <span class="material-symbols-outlined text-2xl" x-show="!open">menu</span>
                            <span class="material-symbols-outlined text-2xl" x-show="open" style="display: none;">close</span>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Responsive Navigation Menu (Mobile) -->
            <div :class="{'block': open, 'hidden': ! open}" class="hidden md:hidden bg-white border-t border-slate-200">
                <div class="pt-2 pb-3 space-y-1 px-4">
                    <a href="{{ route('public.beranda') }}" class="block py-2 text-sm font-medium {{ request()->routeIs('public.beranda') ? 'text-primary' : 'text-slate-600' }}">Beranda</a>
                    <a href="{{ route('public.profil') }}" class="block py-2 text-sm font-medium {{ request()->routeIs('public.profil') ? 'text-primary' : 'text-slate-600' }}">Profil</a>

                    <div class="pt-2 pb-1 border-t border-gray-200">
                        <div class="text-xs font-bold uppercase tracking-wider text-slate-400 py-2">Layanan</div>
                        <a href="{{ route('public.otda') }}" class="block py-2 pl-4 text-sm font-medium {{ request()->routeIs('public.otda') ? 'text-primary' : 'text-slate-600' }}">Otonomi Daerah</a>
                        <a href="{{ route('public.pemerintahan') }}" class="block py-2 pl-4 text-sm font-medium {{ request()->routeIs('public.pemerintahan') ? 'text-primary' : 'text-slate-600' }}">Pemerintahan</a>
                        <a href="{{ route('public.kewilayahan') }}" class="block py-2 pl-4 text-sm font-medium {{ request()->routeIs('public.kewilayahan') ? 'text-primary' : 'text-slate-600' }}">Kewilayahan</a>
                    </div>

                    <a href="{{ route('public.dokumentasi') }}" class="block py-2 text-sm font-medium {{ request()->routeIs('public.dokumentasi') ? 'text-primary' : 'text-slate-600' }}">Dokumentasi</a>
                </div>
            </div>
        </header>

        <!-- Page Content -->
        <main class="flex-grow">
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
