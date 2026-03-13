@extends('layouts.public')

@section('title', 'Galeri Dokumentasi - Tata Pemerintahan')

@section('content')
<main class="pt-20 min-h-screen bg-slate-50/50">
    {{-- Simple Hero --}}
    <section class="relative py-20 overflow-hidden bg-slate-900">
        <div class="absolute inset-0 opacity-20">
            <img src="https://images.unsplash.com/photo-1492684223066-81342ee5ff30?auto=format&fit=crop&q=80&w=2070" class="w-full h-full object-cover" alt="Background">
            <div class="absolute inset-0 bg-gradient-to-b from-slate-900/50 to-slate-900"></div>
        </div>
        
        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <nav class="flex justify-center items-center gap-2 text-sm font-medium text-slate-400 mb-8">
                <a class="hover:text-white transition-colors" href="{{ route('public.beranda') }}">Beranda</a>
                <span class="material-symbols-rounded text-xs">chevron_right</span>
                <span class="text-indigo-400">Galeri Dokumentasi</span>
            </nav>
            <h1 class="text-4xl md:text-6xl font-black text-white tracking-tight mb-6">
                Arsip Visual <span class="text-indigo-400">Kegiatan</span>
            </h1>
            <p class="max-w-2xl mx-auto text-lg md:text-xl text-slate-300 leading-relaxed font-medium">
                Dokumentasi rangkaian kegiatan Sekretariat Daerah Bagian Tata Pemerintahan Kabupaten Tojo Una-Una dalam pelayanan publik dan pembangunan daerah.
            </p>
        </div>
    </section>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12" x-data="{ filter: 'all' }">
        {{-- Filter Navigation --}}
        <div class="flex flex-col sm:flex-row justify-between items-center gap-8 mb-12">
            <div class="inline-flex p-1 bg-white border border-slate-200 rounded-2xl shadow-sm">
                <button @click="filter = 'all'" 
                    :class="filter === 'all' ? 'bg-indigo-600 text-white shadow-lg shadow-indigo-200' : 'text-slate-600 hover:bg-slate-50'"
                    class="px-8 py-3 rounded-xl text-sm font-bold transition-all flex items-center gap-2">
                    <span class="material-symbols-rounded text-lg">grid_view</span>
                    Semua
                </button>
                <button @click="filter = 'photo'" 
                    :class="filter === 'photo' ? 'bg-indigo-600 text-white shadow-lg shadow-indigo-200' : 'text-slate-600 hover:bg-slate-50'"
                    class="px-8 py-3 rounded-xl text-sm font-bold transition-all flex items-center gap-2">
                    <span class="material-symbols-rounded text-lg">image</span>
                    Foto
                </button>
                <button @click="filter = 'video'" 
                    :class="filter === 'video' ? 'bg-indigo-600 text-white shadow-lg shadow-indigo-200' : 'text-slate-600 hover:bg-slate-50'"
                    class="px-8 py-3 rounded-xl text-sm font-bold transition-all flex items-center gap-2">
                    <span class="material-symbols-rounded text-lg">videocam</span>
                    Video
                </button>
            </div>
            
            <div class="text-sm font-bold text-slate-400 uppercase tracking-widest">
                {{ $dokumentasis->count() }} Item Dokumentasi
            </div>
        </div>

        @if($dokumentasis->isEmpty())
            <div class="flex flex-col items-center justify-center py-32 bg-white rounded-[2.5rem] border border-slate-100 shadow-sm">
                <div class="w-24 h-24 bg-slate-50 rounded-full flex items-center justify-center mb-6 text-slate-300">
                    <span class="material-symbols-rounded text-5xl">folder_off</span>
                </div>
                <h3 class="text-2xl font-bold text-slate-900 mb-2">Belum Ada Konten</h3>
                <p class="text-slate-500 max-w-xs text-center font-medium">Galeri foto dan video kegiatan saat ini sedang diperbarui.</p>
            </div>
        @else
            {{-- Masonry-like Grid --}}
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($dokumentasis as $doc)
                    @if($doc->type === 'photo')
                        <div x-show="filter === 'all' || filter === 'photo'" 
                            x-transition:enter="transition ease-out duration-300"
                            x-transition:enter-start="opacity-0 scale-95"
                            x-transition:enter-end="opacity-100 scale-100"
                            class="group relative bg-white rounded-[2rem] p-3 shadow-xl shadow-slate-200/50 border border-slate-100 hover:border-indigo-200 transition-all duration-500">
                            
                            <div class="relative aspect-[4/3] rounded-[1.5rem] overflow-hidden cursor-pointer" onclick="openModal('{{ upload_url($doc->file_path) }}')">
                                <img src="{{ upload_url($doc->file_path) }}" alt="{{ $doc->title }}" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
                                <div class="absolute inset-0 bg-gradient-to-t from-slate-900/60 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500 flex items-center justify-center">
                                    <div class="w-14 h-14 bg-white/20 backdrop-blur-md rounded-full flex items-center justify-center text-white scale-0 group-hover:scale-100 transition-transform duration-500 border border-white/30">
                                        <span class="material-symbols-rounded text-3xl">zoom_in</span>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="p-6">
                                <div class="flex items-center gap-3 mb-4">
                                    <span class="px-3 py-1 bg-indigo-50 text-indigo-600 text-[10px] font-black uppercase tracking-widest rounded-lg">Foto</span>
                                    <span class="text-xs font-bold text-slate-400">{{ $doc->created_at->translatedFormat('d F Y') }}</span>
                                </div>
                                <h3 class="text-lg font-bold text-slate-900 group-hover:text-indigo-600 transition-colors line-clamp-2 leading-snug">
                                    {{ $doc->title }}
                                </h3>
                            </div>
                        </div>
                    @else
                        @php
                            preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/\s]{11})%i', $doc->youtube_url, $match);
                            $youtube_id = $match[1] ?? null;
                        @endphp
                        <div x-show="filter === 'all' || filter === 'video'"
                            x-transition:enter="transition ease-out duration-300"
                            x-transition:enter-start="opacity-0 scale-95"
                            x-transition:enter-end="opacity-100 scale-100"
                            class="group relative bg-white rounded-[2rem] p-3 shadow-xl shadow-slate-200/50 border border-slate-100 hover:border-red-200 transition-all duration-500">
                            
                            <div class="relative aspect-[4/3] rounded-[1.5rem] overflow-hidden bg-slate-900">
                                @if($youtube_id)
                                    <img src="https://img.youtube.com/vi/{{ $youtube_id }}/maxresdefault.jpg" onerror="this.src='https://img.youtube.com/vi/{{ $youtube_id }}/hqdefault.jpg'" class="w-full h-full object-cover opacity-60 transition-transform duration-700 group-hover:scale-110">
                                @endif
                                <a href="{{ $doc->youtube_url }}" target="_blank" class="absolute inset-0 flex items-center justify-center">
                                    <div class="w-16 h-16 bg-red-600 text-white rounded-full flex items-center justify-center shadow-2xl shadow-red-600/40 group-hover:scale-110 transition-transform duration-500 border-4 border-white/20">
                                        <span class="material-symbols-rounded text-4xl fill-current">play_arrow</span>
                                    </div>
                                </a>
                            </div>
                            
                            <div class="p-6">
                                <div class="flex items-center gap-3 mb-4">
                                    <span class="px-3 py-1 bg-red-50 text-red-600 text-[10px] font-black uppercase tracking-widest rounded-lg">Video</span>
                                    <span class="text-xs font-bold text-slate-400">{{ $doc->created_at->translatedFormat('d F Y') }}</span>
                                </div>
                                <h3 class="text-lg font-bold text-slate-900 group-hover:text-red-600 transition-colors line-clamp-2 leading-snug">
                                    {{ $doc->title }}
                                </h3>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
        @endif
    </div>
</main>

{{-- Premium Image Modal --}}
<div id="imageModal" class="fixed inset-0 z-[100] bg-slate-950/95 backdrop-blur-xl hidden opacity-0 transition-all duration-500 p-4 md:p-12 flex flex-col items-center justify-center" onclick="closeModal()">
    <div class="absolute top-8 right-8 z-[110]">
        <button onclick="closeModal()" class="w-12 h-12 bg-white/10 hover:bg-white/20 text-white rounded-full flex items-center justify-center transition-all border border-white/10 group">
            <span class="material-symbols-rounded text-2xl group-hover:rotate-90 transition-transform duration-500">close</span>
        </button>
    </div>
    
    <div class="relative max-w-6xl w-full h-full flex items-center justify-center" onclick="event.stopPropagation()">
        <img id="modalImage" src="" class="max-w-full max-h-full object-contain rounded-2xl shadow-2xl shadow-black/50 border border-white/5 scale-95 transition-transform duration-500">
    </div>
    
    <div class="mt-8 text-white/40 text-sm font-bold tracking-widest uppercase">
        Klik di mana saja untuk menutup
    </div>
</div>

<script>
    function openModal(src) {
        const modal = document.getElementById('imageModal');
        const img = document.getElementById('modalImage');
        img.src = src;
        modal.classList.remove('hidden');
        setTimeout(() => {
            modal.classList.add('opacity-100');
            img.classList.remove('scale-95');
            img.classList.add('scale-100');
        }, 10);
        document.body.style.overflow = 'hidden';
    }

    function closeModal() {
        const modal = document.getElementById('imageModal');
        const img = document.getElementById('modalImage');
        modal.classList.remove('opacity-100');
        img.classList.remove('scale-100');
        img.classList.add('scale-95');
        setTimeout(() => {
            modal.classList.add('hidden');
            img.src = '';
        }, 500);
        document.body.style.overflow = 'auto';
    }

    document.addEventListener('keydown', e => e.key === 'Escape' && closeModal());
</script>
@endsection
