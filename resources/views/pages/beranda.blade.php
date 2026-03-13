@extends('layouts.public')

@section('content')
<!-- Hero Section -->
<section class="relative overflow-hidden bg-slate-50 dark:bg-background-dark py-12 lg:py-32">
    <!-- Decorative background elements -->
    <div class="absolute top-0 right-0 -translate-y-1/2 translate-x-1/2 w-[600px] h-[600px] bg-primary/5 rounded-full blur-3xl"></div>
    <div class="absolute bottom-0 left-0 translate-y-1/2 -translate-x-1/2 w-[400px] h-[400px] bg-indigo-500/5 rounded-full blur-3xl"></div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
            <div class="flex flex-col gap-8 order-2 lg:order-1" x-data="{ loaded: false }" x-init="setTimeout(() => loaded = true, 100)">
                <div class="space-y-6" x-show="loaded" x-transition:enter="transition ease-out duration-700" x-transition:enter-start="opacity-0 -translate-x-8">
                    <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-primary/10 border border-primary/20">
                        <span class="relative flex h-2 w-2">
                            <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-primary opacity-75"></span>
                            <span class="relative inline-flex rounded-full h-2 w-2 bg-primary"></span>
                        </span>
                        <span class="text-[10px] font-black uppercase tracking-[0.2em] text-primary">Portal Resmi Pemerintah</span>
                    </div>
                    <h1 class="text-4xl sm:text-6xl font-black leading-[1.1] tracking-tight text-slate-900 dark:text-white">
                        {!! str_replace('Kabupaten', '<span class="text-primary">Kabupaten</span>', e($hero_title)) !!}
                    </h1>
                    <p class="text-xl text-slate-600 dark:text-slate-400 max-w-xl leading-relaxed">
                        {{ $hero_description }}
                    </p>
                </div>
                <div class="flex flex-wrap gap-4" x-show="loaded" x-transition:enter="transition ease-out duration-700 delay-300" x-transition:enter-start="opacity-0 translate-y-4">
                    <a href="{{ route('public.profil') }}" class="group inline-flex h-14 items-center justify-center rounded-2xl bg-primary px-8 text-sm font-black text-white shadow-xl shadow-primary/25 hover:bg-primary/90 hover:scale-105 transition-all">
                        Selengkapnya 
                        <span class="material-symbols-outlined ml-2 group-hover:translate-x-1 transition-transform">arrow_forward</span>
                    </a>
                </div>
            </div>
            <div class="relative order-1 lg:order-2" x-data="{ loaded: false }" x-init="setTimeout(() => loaded = true, 300)">
                <div class="absolute -inset-4 bg-primary/20 blur-3xl rounded-full animate-pulse"></div>
                <div class="relative aspect-[4/3] sm:aspect-video lg:aspect-square overflow-hidden rounded-3xl shadow-2xl border-[12px] border-white dark:border-slate-800 bg-slate-200 dark:bg-slate-800"
                     x-show="loaded" x-transition:enter="transition ease-out duration-1000" x-transition:enter-start="opacity-0 scale-95 rotate-1">
                    <div class="absolute inset-0 bg-cover bg-center transition-transform duration-700 hover:scale-110" 
                         style='background-image: url("{{ $hero_image ? upload_url($hero_image) : 'https://images.unsplash.com/photo-1497366216548-37526070297c?auto=format&fit=crop&q=80&w=2069' }}");'>
                        <div class="absolute inset-0 bg-gradient-to-tr from-primary/20 to-transparent"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Quick Access Section -->
<section class="bg-white dark:bg-slate-900 py-12">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex flex-col md:flex-row items-center justify-between gap-8 p-10 bg-slate-50 dark:bg-slate-800/50 rounded-[2.5rem] border border-slate-100 dark:border-slate-700 shadow-sm">
            <div class="text-center md:text-left space-y-2">
                <h3 class="text-2xl font-black text-slate-900 dark:text-white uppercase tracking-tight">Akses Cepat Layanan</h3>
                <p class="text-slate-500 dark:text-slate-400 text-sm font-medium">Laporan dan administrasi pemerintahan dalam satu klik.</p>
            </div>
            <div class="flex flex-wrap justify-center gap-6">
                @php
                    $quickLinks = [
                        ['id' => 'lppd', 'title' => 'LPPD', 'icon' => 'description', 'route' => 'public.otda'],
                        ['id' => 'lkpj', 'title' => 'LKPJ', 'icon' => 'analytics', 'route' => 'public.kewilayahan'],
                        ['id' => 'spm', 'title' => 'SPM', 'icon' => 'verified', 'route' => 'public.pemerintahan'],
                    ];
                @endphp
                @foreach($quickLinks as $link)
                    <a class="group flex flex-col items-center justify-center w-32 h-32 rounded-3xl bg-white dark:bg-slate-900 border border-slate-100 dark:border-slate-700 hover:bg-primary dark:hover:bg-primary hover:border-primary transition-all duration-300 shadow-sm hover:shadow-xl hover:shadow-primary/20 hover:-translate-y-1" href="{{ route($link['route']) }}">
                        <span class="material-symbols-outlined text-4xl text-primary group-hover:text-white transition-all transform group-hover:scale-110 mb-2">{{ $link['icon'] }}</span>
                        <span class="text-xs font-black text-slate-700 dark:text-slate-300 group-hover:text-white uppercase tracking-widest">{{ $link['title'] }}</span>
                    </a>
                @endforeach
            </div>
        </div>
    </div>
</section>

<!-- Visi & Misi Section -->
<section class="py-24 bg-white dark:bg-background-dark">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <x-section-heading 
            title="Visi & Misi Utama" 
            subtitle="Fondasi utama dalam melayani masyarakat Kabupaten Tojo Una-Una untuk mewujudkan tata kelola yang transparan."
        />
        
        <div class="grid grid-cols-1 md:grid-cols-2 gap-10 lg:gap-16">
            <!-- Vision Card -->
            <div class="relative group" x-data="{ hover: false }" @mouseenter="hover = true" @mouseleave="hover = false">
                <div class="absolute -inset-2 bg-primary/5 rounded-[2rem] opacity-0 group-hover:opacity-100 transition-opacity"></div>
                <div class="relative p-10 rounded-[2rem] bg-slate-50 dark:bg-slate-800/50 border border-slate-100 dark:border-slate-700 group-hover:border-primary/30 transition-all h-full">
                    <div class="mb-8 flex h-16 w-16 items-center justify-center rounded-2xl bg-primary text-white shadow-xl shadow-primary/20 transform group-hover:rotate-6 transition-transform">
                        <span class="material-symbols-outlined text-3xl">visibility</span>
                    </div>
                    <h3 class="text-2xl font-black text-slate-900 dark:text-white mb-6 uppercase tracking-tight">Visi</h3>
                    <div class="text-slate-600 dark:text-slate-400 leading-relaxed text-lg italic bg-white/50 dark:bg-slate-900/50 p-6 rounded-2xl border border-dashed border-slate-200 dark:border-slate-700">
                        @if($visi)
                            {!! nl2br(e($visi)) !!}
                        @else
                            <p class="text-slate-400">Visi belum diatur dalam panel admin.</p>
                        @endif
                    </div>
                </div>
            </div>
            <!-- Mission Card -->
            <div class="relative group">
                <div class="absolute -inset-2 bg-primary/5 rounded-[2rem] opacity-0 group-hover:opacity-100 transition-opacity"></div>
                <div class="relative p-10 rounded-[2rem] bg-slate-50 dark:bg-slate-800/50 border border-slate-100 dark:border-slate-700 group-hover:border-primary/30 transition-all h-full">
                    <div class="mb-8 flex h-16 w-16 items-center justify-center rounded-2xl bg-primary text-white shadow-xl shadow-primary/20 transform group-hover:rotate-6 transition-transform">
                        <span class="material-symbols-outlined text-3xl">track_changes</span>
                    </div>
                    <h3 class="text-2xl font-black text-slate-900 dark:text-white mb-6 uppercase tracking-tight">Misi</h3>
                    <div class="text-slate-600 dark:text-slate-400 leading-relaxed text-lg space-y-4">
                        @if($misi)
                            {!! nl2br(e($misi)) !!}
                        @else
                            <p class="text-slate-400">Misi belum diatur dalam panel admin.</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Sub-Bagian Highlight -->
<section class="py-24 bg-slate-50 dark:bg-background-dark">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <x-section-heading 
            title="Layanan Struktural" 
            subtitle="Fokus operasional dalam mendukung tata kelola pemerintahan yang integratif dan profesional."
        />

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <x-service-card 
                title="Otonomi Daerah" 
                description="Koordinasi kebijakan desentralisasi dan pemantauan pelaksanaan regulasi daerah secara terintegrasi."
                icon="account_balance"
                link="{{ route('public.otda') }}"
                color="blue"
            />
            <x-service-card 
                title="Pemerintahan" 
                description="Fasilitasi administrasi pemerintahan, pembinaan organisasi perangkat daerah, dan tata kelola publik."
                icon="account_balance_wallet"
                link="{{ route('public.pemerintahan') }}"
                color="teal"
            />
            <x-service-card 
                title="Kewilayahan" 
                description="Pemetaan batas wilayah, koordinasi administrasi kecamatan, serta pengelolaan data spasial daerah."
                icon="map"
                link="{{ route('public.kewilayahan') }}"
                color="amber"
            />
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
