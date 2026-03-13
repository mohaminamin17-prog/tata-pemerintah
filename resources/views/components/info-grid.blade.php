@props([
    'title' => 'Fungsi Utama',
    'items' => []
])

<section class="bg-white py-16 scroll-mt-20">
    <div class="max-w-7xl mx-auto px-6 md:px-20">
        <div class="text-center mb-12">
            <h2 class="text-slate-900 text-3xl font-bold mb-4">{{ $title }}</h2>
            <div class="h-1.5 w-20 bg-primary mx-auto rounded-full"></div>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            @foreach($items as $item)
                <div class="p-8 rounded-xl bg-slate-50 border border-slate-200 hover:border-primary hover:bg-white hover:shadow-xl transition-all group">
                    <div class="size-14 rounded-lg bg-primary/10 text-primary flex items-center justify-center mb-6 group-hover:bg-primary group-hover:text-white transition-all">
                        <span class="material-symbols-outlined text-3xl">{{ $item['icon'] ?? 'settings' }}</span>
                    </div>
                    <h3 class="text-xl font-bold mb-3">{{ $item['title'] }}</h3>
                    <p class="text-slate-600 leading-relaxed">{{ $item['description'] }}</p>
                </div>
            @endforeach
        </div>
    </div>
</section>
