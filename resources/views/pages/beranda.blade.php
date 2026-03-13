@extends('layouts.public')

@section('content')
<!-- Hero Section -->
<section class="relative overflow-hidden bg-white dark:bg-background-dark py-12 lg:py-24">
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
<div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
<div class="flex flex-col gap-8 order-2 lg:order-1">
<div class="space-y-4">
<span class="inline-block px-3 py-1 text-xs font-bold tracking-wider uppercase text-indigo-700 bg-indigo-700/10 rounded-full" style="">Official Portal</span>
<h1 class="text-4xl sm:text-5xl lg:text-6xl font-black leading-tight tracking-tight text-slate-900 dark:text-white" style="">
                                    {{ $hero_title }}
</h1>
<p class="text-lg text-slate-600 dark:text-slate-400 max-w-xl" style="">
                                    {{ $hero_description }}
                                </p>
</div>
<div class="flex flex-wrap gap-4">
<a href="{{ route('public.profil') }}" class="inline-flex h-12 items-center justify-center rounded-lg bg-indigo-700 px-8 text-sm font-bold text-white shadow-lg shadow-indigo-700/20 hover:bg-indigo-700/90 transition-all" style="">
                                    Selengkapnya
                                </a>
</div>
</div>
<div class="relative order-1 lg:order-2">
<div class="absolute -inset-4 bg-indigo-700/10 blur-3xl rounded-full"></div>
<div class="relative aspect-video lg:aspect-square overflow-hidden rounded-2xl shadow-2xl border-4 border-white dark:border-slate-800 bg-slate-200 dark:bg-slate-800" data-alt="Modern government office interior in Indonesia" style='background-image: url("{{ $hero_image ? upload_url($hero_image) : 'https://images.unsplash.com/photo-1497366216548-37526070297c?auto=format&fit=crop&q=80&w=2069' }}"); background-size: cover; background-position: center center;'>
</div>
</div>
</div>
</div>
</section>

<!-- Quick Access Section -->
<section class="bg-slate-50 dark:bg-slate-900/50 py-12">
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
<div class="flex flex-col md:flex-row items-center justify-between gap-6 p-8 bg-white dark:bg-slate-800 rounded-2xl shadow-sm border border-slate-100 dark:border-slate-700">
<div class="text-center md:text-left">
<h3 class="text-xl font-bold text-slate-900 dark:text-white" style="">Akses Cepat Layanan</h3>
<p class="text-slate-500 dark:text-slate-400 text-sm" style="">Laporan dan administrasi pemerintahan dalam satu klik.</p>
</div>
<div class="flex flex-wrap justify-center gap-4">
<a class="group flex flex-col items-center justify-center w-28 h-28 rounded-xl bg-slate-50 dark:bg-slate-900 hover:bg-indigo-700 dark:hover:bg-indigo-700 transition-all" href="{{ route('public.otda') }}" style="">
<span class="material-symbols-outlined text-3xl text-indigo-700 group-hover:text-white transition-colors" style="">description</span>
<span class="mt-2 text-xs font-bold text-slate-700 dark:text-slate-300 group-hover:text-white" style="">LPPD</span>
</a>
<a class="group flex flex-col items-center justify-center w-28 h-28 rounded-xl bg-slate-50 dark:bg-slate-900 hover:bg-indigo-700 dark:hover:bg-indigo-700 transition-all" href="{{ route('public.kewilayahan') }}" style="">
<span class="material-symbols-outlined text-3xl text-indigo-700 group-hover:text-white transition-colors" style="">analytics</span>
<span class="mt-2 text-xs font-bold text-slate-700 dark:text-slate-300 group-hover:text-white" style="">LKPJ</span>
</a>
<a class="group flex flex-col items-center justify-center w-28 h-28 rounded-xl bg-slate-50 dark:bg-slate-900 hover:bg-indigo-700 dark:hover:bg-indigo-700 transition-all" href="{{ route('public.pemerintahan') }}" style="">
<span class="material-symbols-outlined text-3xl text-indigo-700 group-hover:text-white transition-colors" style="">verified</span>
<span class="mt-2 text-xs font-bold text-slate-700 dark:text-slate-300 group-hover:text-white" style="">SPM</span>
</a>
</div>
</div>
</div>
</section>

<!-- Visi & Misi Section -->
<section class="py-20 bg-white dark:bg-background-dark">
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
<div class="mb-16 text-center">
<h2 class="text-3xl font-bold tracking-tight text-slate-900 dark:text-white sm:text-4xl" style="">Visi &amp; Misi Utama</h2>
<div class="mt-4 h-1.5 w-24 bg-indigo-700 mx-auto rounded-full"></div>
<p class="mt-6 text-lg text-slate-600 dark:text-slate-400" style="">Fondasi utama dalam melayani masyarakat Kabupaten Tojo Una-Una.</p>
</div>
<div class="grid grid-cols-1 md:grid-cols-2 gap-8 lg:gap-12">
<!-- Vision Card -->
<div class="relative group p-8 rounded-2xl bg-slate-50 dark:bg-slate-800/50 border border-slate-100 dark:border-slate-700 hover:border-indigo-700/30 transition-all">
<div class="mb-6 flex h-14 w-14 items-center justify-center rounded-xl bg-indigo-700 text-white shadow-lg shadow-indigo-700/20">
<span class="material-symbols-outlined text-3xl" style="">visibility</span>
</div>
<h3 class="text-2xl font-bold text-slate-900 dark:text-white mb-4" style="">Visi</h3>
<div class="text-slate-600 dark:text-slate-400 leading-relaxed italic text-lg prose prose-indigo">
    @if($visi)
        {!! nl2br(e($visi)) !!}
    @else
        <p class="italic text-gray-400">Visi belum diatur.</p>
    @endif
</div>
</div>
<!-- Mission Card -->
<div class="relative group p-8 rounded-2xl bg-slate-50 dark:bg-slate-800/50 border border-slate-100 dark:border-slate-700 hover:border-indigo-700/30 transition-all">
<div class="mb-6 flex h-14 w-14 items-center justify-center rounded-xl bg-indigo-700 text-white shadow-lg shadow-indigo-700/20">
<span class="material-symbols-outlined text-3xl" style="">track_changes</span>
</div>
<h3 class="text-2xl font-bold text-slate-900 dark:text-white mb-4" style="">Misi</h3>
<div class="text-slate-600 dark:text-slate-400 leading-relaxed text-lg prose prose-indigo">
    @if($misi)
        {!! nl2br(e($misi)) !!}
    @else
        <p class="italic text-gray-400">Misi belum diatur.</p>
    @endif
</div>
</div>
</div>
</div>
</section>

<!-- Sub-Bagian Highlight -->
<section class="py-20 bg-slate-50 dark:bg-background-dark overflow-hidden">
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
<div class="flex flex-col md:flex-row justify-between items-end gap-6 mb-12">
<div>
<h2 class="text-3xl font-bold text-slate-900 dark:text-white" style="">Layanan</h2>
<p class="mt-4 text-slate-600 dark:text-slate-400" style="">Fokus operasional dalam mendukung tata kelola pemerintahan.</p>
</div>
</div>
<div class="grid grid-cols-1 md:grid-cols-3 gap-8">
<!-- Otda -->
<div class="p-8 rounded-2xl border border-slate-100 dark:border-slate-800 bg-white dark:bg-slate-900/50 hover:shadow-xl transition-all">
<div class="size-12 rounded-xl bg-blue-50 dark:bg-blue-900/30 flex items-center justify-center mb-6 text-blue-600 dark:text-blue-400">
<span class="material-symbols-outlined" style="">account_balance</span>
</div>
<h3 class="text-xl font-bold mb-3" style="">Otonomi Daerah</h3>
<p class="text-sm text-slate-500 dark:text-slate-400 line-clamp-3 mb-6" style="">Koordinasi kebijakan desentralisasi dan pemantauan pelaksanaan regulasi daerah secara terintegrasi.</p>
<div class="h-1 w-12 bg-blue-500 rounded-full mb-4"></div>
<a href="{{ route('public.otda') }}" class="text-sm font-bold text-indigo-700 hover:underline">Lihat Detail &rarr;</a>
</div>
<!-- Pemerintahan -->
<div class="p-8 rounded-2xl border border-slate-100 dark:border-slate-800 bg-white dark:bg-slate-900/50 hover:shadow-xl transition-all">
<div class="size-12 rounded-xl bg-teal-50 dark:bg-teal-900/30 flex items-center justify-center mb-6 text-teal-600 dark:text-teal-400">
<span class="material-symbols-outlined" style="">domain</span>
</div>
<h3 class="text-xl font-bold mb-3" style="">Pemerintahan</h3>
<p class="text-sm text-slate-500 dark:text-slate-400 line-clamp-3 mb-6" style="">Fasilitasi administrasi pemerintahan, pembinaan organisasi perangkat daerah, dan tata kelola publik.</p>
<div class="h-1 w-12 bg-teal-500 rounded-full mb-4"></div>
<a href="{{ route('public.pemerintahan') }}" class="text-sm font-bold text-indigo-700 hover:underline">Lihat Detail &rarr;</a>
</div>
<!-- Kewilayahan -->
<div class="p-8 rounded-2xl border border-slate-100 dark:border-slate-800 bg-white dark:bg-slate-900/50 hover:shadow-xl transition-all">
<div class="size-12 rounded-xl bg-amber-50 dark:bg-amber-900/30 flex items-center justify-center mb-6 text-amber-600 dark:text-amber-400">
<span class="material-symbols-outlined" style="">map</span>
</div>
<h3 class="text-xl font-bold mb-3" style="">Kewilayahan</h3>
<p class="text-sm text-slate-500 dark:text-slate-400 line-clamp-3 mb-6" style="">Pemetaan batas wilayah, koordinasi administrasi kecamatan, serta pengelolaan data spasial daerah.</p>
<div class="h-1 w-12 bg-amber-500 rounded-full mb-4"></div>
<a href="{{ route('public.kewilayahan') }}" class="text-sm font-bold text-indigo-700 hover:underline">Lihat Detail &rarr;</a>
</div>
</div>
</div>
</section>

<!-- Peta Wilayah Section -->
<section class="py-20 bg-white dark:bg-background-dark">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="mb-12 text-center">
            <h2 class="text-3xl font-bold text-slate-900 dark:text-white" style="">Peta Wilayah Interaktif</h2>
            <p class="mt-4 text-slate-600 dark:text-slate-400" style="">Visualisasi spasial wilayah administrasi Kabupaten Tojo Una-Una.</p>
        </div>
        <div class="relative aspect-video rounded-3xl overflow-hidden border border-slate-200 dark:border-slate-800 shadow-2xl">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d510578.99049371126!2d121.20903035822357!3d-1.230419501085668!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2d88a780d3568237%3A0x3030bfbcaf77140!2sTojo%20Una-Una%20Regency%2C%20Central%20Sulawesi!5e0!3m2!1sen!2sid!4v1773290125102!5m2!1sen!2sid" 
                width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
    </div>
</section>

<!-- Gallery Preview -->
<section class="py-20 bg-white dark:bg-background-dark overflow-hidden">
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
<div class="flex items-center justify-between mb-8">
<h3 class="text-2xl font-bold text-slate-900 dark:text-white" style="">Galeri Dokumentasi</h3>
<a class="text-sm font-bold text-indigo-700 flex items-center gap-1" href="{{ route('public.dokumentasi') }}" style="">
                                Lihat Semua
                                <span class="material-symbols-outlined text-sm" style="">arrow_forward</span>
</a>
</div>
<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
    @forelse($latest_dokumentasi as $doc)
        <div class="group relative aspect-video rounded-xl overflow-hidden bg-slate-100 dark:bg-slate-800">
            @if($doc->type === 'photo')
                <img class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" src="{{ upload_url($doc->file_path) }}" alt="{{ $doc->title }}"/>
            @else
                @php
                    preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/\s]{11})%i', $doc->youtube_url, $match);
                    $youtube_id = $match[1] ?? null;
                @endphp
                @if($youtube_id)
                    <img class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" src="https://img.youtube.com/vi/{{ $youtube_id }}/maxresdefault.jpg" onerror="this.src='https://img.youtube.com/vi/{{ $youtube_id }}/hqdefault.jpg'" alt="{{ $doc->title }}"/>
                @endif
            @endif
            <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent flex items-end p-4 opacity-0 group-hover:opacity-100 transition-opacity">
                <p class="text-white text-xs font-medium" style="">{{ $doc->title }}</p>
            </div>
            @if($doc->type === 'video')
                <div class="absolute inset-0 flex items-center justify-center pointer-events-none">
                    <span class="material-symbols-outlined text-white text-4xl opacity-80">play_circle</span>
                </div>
            @endif
        </div>
    @empty
        <div class="col-span-full py-12 text-center text-slate-400 italic">
            Belum ada dokumentasi terbaru.
        </div>
    @endforelse
</div>
</div>
</section>

@endsection
