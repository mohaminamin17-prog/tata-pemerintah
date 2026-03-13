@props([
    'title' => 'Dokumen Pelaporan',
    'description' => null,
    'documents' => [],
    'cta' => null
])

<section class="max-w-7xl mx-auto px-6 md:px-20 py-20">
    <div class="bg-white rounded-3xl overflow-hidden shadow-2xl border border-slate-200 flex flex-col lg:flex-row">
        <div class="w-full lg:w-3/5 p-8 md:p-12 lg:p-16 space-y-8 border-b lg:border-b-0 lg:border-r border-slate-100">
            <div>
                <h2 class="text-slate-900 text-3xl md:text-4xl font-black mb-4">{{ $title }}</h2>
                @if($description)
                    <p class="text-slate-600 text-lg leading-relaxed">
                        {{ $description }}
                    </p>
                @endif
            </div>
            
            @if(count($documents) > 0)
                <div class="space-y-4">
                    <h4 class="text-sm font-bold text-primary uppercase tracking-wider">File Pendukung</h4>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        @foreach($documents as $doc)
                            <div class="flex items-center gap-3 p-4 bg-slate-50 rounded-xl border border-slate-100 hover:border-primary/30 transition-all group">
                                <span class="material-symbols-outlined {{ $doc['color'] ?? 'text-slate-500' }} group-hover:scale-110 transition-transform">
                                    {{ $doc['icon'] ?? 'description' }}
                                </span>
                                <span class="text-sm font-medium text-slate-700 truncate">{{ $doc['name'] }}</span>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif

            @if($cta)
                <div class="pt-4">
                    <a class="inline-flex items-center gap-3 bg-primary text-white px-8 py-4 rounded-xl font-bold hover:shadow-lg hover:shadow-primary/30 transition-all" 
                       href="{{ $cta['url'] }}" target="_blank">
                        <span class="material-symbols-outlined">{{ $cta['icon'] ?? 'cloud_download' }}</span>
                        {{ $cta['label'] }}
                    </a>
                </div>
            @endif
        </div>
        
        <div class="w-full lg:w-2/5 bg-slate-50 p-8 md:p-12 flex flex-col justify-center">
            {{ $slot }}
        </div>
    </div>
</section>
