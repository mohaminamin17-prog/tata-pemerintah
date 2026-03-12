<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <title>{{ $title ?? 'Panel Kendali' }} - {{ config('app.name', 'Tapem - Tata Pemerintahan') }}</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link href="https://fonts.googleapis.com/css2?family=Public+Sans:wght@300;400;500;600;700;900&display=swap" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet"/>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: { "primary": "#1152d4", "background-light": "#f6f6f8" },
                    fontFamily: { "display": ["Public Sans", "sans-serif"] },
                },
            },
        }
    </script>
    <style>
        body { font-family: 'Public Sans', sans-serif; }
        .material-symbols-outlined { font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24; }
    </style>
</head>
<body class="bg-background-light font-display text-slate-900">
<div class="flex h-screen overflow-hidden">
    <!-- Sidebar Navigation -->
    <aside class="w-72 bg-slate-900 text-white flex-col flex-shrink-0 hidden lg:flex">
        <div class="p-6 border-b border-slate-800 flex items-center gap-3">
            <img src="{{ asset('assets/logo.png') }}" alt="Logo" class="w-10 h-10 object-contain">
            <div>
                <h1 class="text-sm font-bold leading-tight">Tata Pemerintahan</h1>
                <p class="text-[10px] text-slate-400 uppercase tracking-wider">Tojo Una-Una</p>
            </div>
        </div>
        <nav class="flex-1 px-4 py-6 space-y-1 overflow-y-auto">
            @php $currentRoute = request()->route()->getName(); @endphp
            <a class="flex items-center gap-3 px-4 py-3 rounded-lg {{ $currentRoute === 'admin.dashboard' ? 'bg-primary text-white' : 'text-slate-400 hover:bg-slate-800 hover:text-white' }} transition-colors" href="{{ route('admin.dashboard') }}">
                <span class="material-symbols-outlined">dashboard</span>
                <span class="text-sm font-medium">Dashboard</span>
            </a>
            <a class="flex items-center gap-3 px-4 py-3 rounded-lg {{ str_starts_with($currentRoute, 'admin.settings') ? 'bg-primary text-white' : 'text-slate-400 hover:bg-slate-800 hover:text-white' }} transition-colors" href="{{ route('admin.settings.index') }}">
                <span class="material-symbols-outlined">home_app_logo</span>
                <span class="text-sm font-medium">Konten Beranda</span>
            </a>
            <a class="flex items-center gap-3 px-4 py-3 rounded-lg {{ str_starts_with($currentRoute, 'admin.profil') ? 'bg-primary text-white' : 'text-slate-400 hover:bg-slate-800 hover:text-white' }} transition-colors" href="{{ route('admin.profil.index') }}">
                <span class="material-symbols-outlined">account_tree</span>
                <span class="text-sm font-medium">Profil & Struktur</span>
            </a>
            <a class="flex items-center gap-3 px-4 py-3 rounded-lg {{ str_starts_with($currentRoute, 'admin.ekk-scores') ? 'bg-primary text-white' : 'text-slate-400 hover:bg-slate-800 hover:text-white' }} transition-colors" href="{{ route('admin.ekk-scores.index') }}">
                <span class="material-symbols-outlined">analytics</span>
                <span class="text-sm font-medium">Modul EKK</span>
            </a>
            <a class="flex items-center gap-3 px-4 py-3 rounded-lg {{ str_starts_with($currentRoute, 'admin.kerja-samas') ? 'bg-primary text-white' : 'text-slate-400 hover:bg-slate-800 hover:text-white' }} transition-colors" href="{{ route('admin.kerja-samas.index') }}">
                <span class="material-symbols-outlined">handshake</span>
                <span class="text-sm font-medium">Kerja Sama</span>
            </a>
            <a class="flex items-center gap-3 px-4 py-3 rounded-lg {{ str_starts_with($currentRoute, 'admin.dokumentasis') ? 'bg-primary text-white' : 'text-slate-400 hover:bg-slate-800 hover:text-white' }} transition-colors" href="{{ route('admin.dokumentasis.index') }}">
                <span class="material-symbols-outlined">gallery_thumbnail</span>
                <span class="text-sm font-medium">Galeri Dokumentasi</span>
            </a>
            <a class="flex items-center gap-3 px-4 py-3 rounded-lg {{ str_starts_with($currentRoute, 'admin.external-links') ? 'bg-primary text-white' : 'text-slate-400 hover:bg-slate-800 hover:text-white' }} transition-colors" href="{{ route('admin.external-links.index') }}">
                <span class="material-symbols-outlined">link</span>
                <span class="text-sm font-medium">Link Eksternal</span>
            </a>
        </nav>
        <div class="p-4 mt-auto border-t border-slate-800">
            <div class="flex items-center gap-3 p-2 bg-slate-800 rounded-xl">
                <div class="w-10 h-10 rounded-full bg-primary/20 flex items-center justify-center">
                    <span class="material-symbols-outlined text-primary">person</span>
                </div>
                <div class="flex flex-col">
                    <span class="text-xs font-bold">{{ Auth::user()->name }}</span>
                    <span class="text-[10px] text-slate-500">Administrator</span>
                </div>
                <form method="POST" action="{{ route('logout') }}" class="ml-auto">
                    @csrf
                    <button type="submit" class="text-slate-400 hover:text-white transition-colors" title="Logout">
                        <span class="material-symbols-outlined text-sm">logout</span>
                    </button>
                </form>
            </div>
        </div>
    </aside>

    <!-- Main Content Area -->
    <main class="flex-1 flex flex-col overflow-hidden bg-white">
        <!-- Header -->
        <header class="h-16 border-b border-slate-200 flex items-center justify-between px-8 bg-white sticky top-0 z-10">
            <div class="flex items-center gap-4 text-sm">
                <button onclick="document.getElementById('mobile-sidebar').classList.toggle('hidden')" class="lg:hidden text-slate-500 hover:text-slate-700">
                    <span class="material-symbols-outlined">menu</span>
                </button>
                <span class="text-slate-400">Pages /</span>
                <span class="text-slate-900 font-semibold">{{ $breadcrumb ?? 'Dashboard' }}</span>
            </div>
            <div class="flex items-center gap-4">
                <div class="relative hidden sm:block">
                    <span class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-slate-400 text-lg">search</span>
                    <input class="pl-10 pr-4 py-2 bg-slate-100 border-none rounded-lg text-sm w-64 focus:ring-2 focus:ring-primary/20" placeholder="Cari data..." type="text"/>
                </div>
                <button class="p-2 text-slate-500 hover:bg-slate-100 rounded-lg relative">
                    <span class="material-symbols-outlined">notifications</span>
                    <span class="absolute top-2 right-2 w-2 h-2 bg-red-500 rounded-full"></span>
                </button>
            </div>
        </header>

        <!-- Mobile Sidebar Overlay -->
        <div id="mobile-sidebar" class="hidden lg:hidden fixed inset-0 z-50">
            <div class="absolute inset-0 bg-black/50" onclick="document.getElementById('mobile-sidebar').classList.add('hidden')"></div>
            <aside class="relative w-72 bg-slate-900 text-white flex flex-col h-full">
                <div class="p-6 border-b border-slate-800 flex items-center justify-between">
                    <div class="flex items-center gap-3">
                        <img src="{{ asset('assets/logo.png') }}" alt="Logo" class="w-10 h-10 object-contain">
                        <h1 class="text-sm font-bold">Tapem</h1>
                    </div>
                    <button onclick="document.getElementById('mobile-sidebar').classList.add('hidden')" class="text-slate-400 hover:text-white"><span class="material-symbols-outlined">close</span></button>
                </div>
                <nav class="flex-1 px-4 py-6 space-y-1 overflow-y-auto">
                    <a class="flex items-center gap-3 px-4 py-3 rounded-lg {{ $currentRoute === 'admin.dashboard' ? 'bg-primary text-white' : 'text-slate-400 hover:bg-slate-800 hover:text-white' }} transition-colors" href="{{ route('admin.dashboard') }}"><span class="material-symbols-outlined">dashboard</span><span class="text-sm font-medium">Dashboard</span></a>
                    <a class="flex items-center gap-3 px-4 py-3 rounded-lg {{ str_starts_with($currentRoute, 'admin.settings') ? 'bg-primary text-white' : 'text-slate-400 hover:bg-slate-800 hover:text-white' }} transition-colors" href="{{ route('admin.settings.index') }}"><span class="material-symbols-outlined">home_app_logo</span><span class="text-sm font-medium">Konten Beranda</span></a>
                    <a class="flex items-center gap-3 px-4 py-3 rounded-lg {{ str_starts_with($currentRoute, 'admin.profil') ? 'bg-primary text-white' : 'text-slate-400 hover:bg-slate-800 hover:text-white' }} transition-colors" href="{{ route('admin.profil.index') }}"><span class="material-symbols-outlined">account_tree</span><span class="text-sm font-medium">Profil & Struktur</span></a>
                    <a class="flex items-center gap-3 px-4 py-3 rounded-lg {{ str_starts_with($currentRoute, 'admin.ekk-scores') ? 'bg-primary text-white' : 'text-slate-400 hover:bg-slate-800 hover:text-white' }} transition-colors" href="{{ route('admin.ekk-scores.index') }}"><span class="material-symbols-outlined">analytics</span><span class="text-sm font-medium">Modul EKK</span></a>
                    <a class="flex items-center gap-3 px-4 py-3 rounded-lg {{ str_starts_with($currentRoute, 'admin.kerja-samas') ? 'bg-primary text-white' : 'text-slate-400 hover:bg-slate-800 hover:text-white' }} transition-colors" href="{{ route('admin.kerja-samas.index') }}"><span class="material-symbols-outlined">handshake</span><span class="text-sm font-medium">Kerja Sama</span></a>
                    <a class="flex items-center gap-3 px-4 py-3 rounded-lg {{ str_starts_with($currentRoute, 'admin.dokumentasis') ? 'bg-primary text-white' : 'text-slate-400 hover:bg-slate-800 hover:text-white' }} transition-colors" href="{{ route('admin.dokumentasis.index') }}"><span class="material-symbols-outlined">gallery_thumbnail</span><span class="text-sm font-medium">Galeri Dokumentasi</span></a>
                    <a class="flex items-center gap-3 px-4 py-3 rounded-lg {{ str_starts_with($currentRoute, 'admin.external-links') ? 'bg-primary text-white' : 'text-slate-400 hover:bg-slate-800 hover:text-white' }} transition-colors" href="{{ route('admin.external-links.index') }}"><span class="material-symbols-outlined">link</span><span class="text-sm font-medium">Link Eksternal</span></a>
                </nav>
                <div class="p-4 border-t border-slate-800">
                    <form method="POST" action="{{ route('logout') }}">@csrf
                        <button type="submit" class="w-full flex items-center gap-2 px-4 py-2 text-sm text-red-400 hover:bg-red-500/10 rounded-lg transition-colors"><span class="material-symbols-outlined text-lg">logout</span>Log Out</button>
                    </form>
                </div>
            </aside>
        </div>

        <!-- Content Scrollable Area -->
        <div class="flex-1 overflow-y-auto p-8 space-y-8">
            {{ $slot }}
        </div>
    </main>
</div>
</body>
</html>
