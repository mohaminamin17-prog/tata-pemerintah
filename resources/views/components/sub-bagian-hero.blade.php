@props([
    'badge' => 'Bagian Tata Pemerintahan',
    'title',
    'subtitle' => 'Pusat integrasi data dan layanan administrasi digital Kabupaten Tojo Una-Una.',
    'image' => null,
    'links' => []
])

<section class="max-w-7xl mx-auto px-6 md:px-20 py-12 md:py-20 animate-fade-in">
    <div class="flex flex-col md:flex-row gap-12 items-center">
        <div class="w-full md:w-1/2 space-y-6">
            <div class="inline-flex items-center px-3 py-1 rounded-full bg-primary/10 text-primary text-xs font-bold uppercase tracking-wider">
                {{ $badge }}
            </div>
            <h1 class="text-slate-900 text-4xl md:text-6xl font-black leading-tight tracking-tight">
                {!! $title !!}
            </h1>
            <p class="text-slate-600 text-lg leading-relaxed max-w-xl">
                {{ $subtitle }}
            </p>
            <div class="flex flex-wrap gap-4">
                @foreach($links as $link)
                    <a href="{{ $link['url'] }}" 
                       @if($link['external'] ?? false) target="_blank" @endif
                       class="{{ ($link['primary'] ?? false) ? 'bg-primary text-white hover:shadow-primary/30' : 'border border-slate-300 text-slate-700 hover:bg-slate-50' }} px-8 py-3 rounded-lg font-bold hover:shadow-lg transition-all inline-flex items-center gap-2">
                        @if($link['icon'] ?? false)
                            <span class="material-symbols-outlined text-xl">{{ $link['icon'] }}</span>
                        @endif
                        {{ $link['label'] }}
                    </a>
                @endforeach
            </div>
        </div>
        <div class="w-full md:w-1/2">
            <div class="relative rounded-2xl overflow-hidden aspect-[4/4.2] shadow-2xl">
                <div class="absolute inset-0 bg-primary/10 z-10 transition-opacity hover:opacity-0 duration-500"></div>
                @if($image)
                    <img alt="{{ strip_tags($title) }}" class="w-full h-full object-cover transform hover:scale-110 transition-transform duration-700" src="{{ $image }}"/>
                @else
                    <div class="w-full h-full bg-slate-100 flex items-center justify-center">
                        <span class="material-symbols-outlined text-6xl text-slate-300">image</span>
                    </div>
                @endif
            </div>
        </div>
    </div>
</section>
