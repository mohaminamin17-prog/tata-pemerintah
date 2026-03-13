@extends('layouts.public')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">

    <!-- Hero / Header -->
    <div class="mb-10 flex flex-col items-start justify-between gap-6 md:flex-row md:items-end">
        <div class="max-w-2xl">
            <nav class="mb-4 flex items-center gap-2 text-sm font-medium text-slate-500">
                <a class="hover:text-primary" href="{{ route('public.beranda') }}">Beranda</a>
                <span class="material-symbols-outlined text-xs">chevron_right</span>
                <span class="text-primary">Galeri Dokumentasi</span>
            </nav>
            <h1 class="text-4xl font-extrabold tracking-tight text-slate-900 sm:text-5xl">Galeri Kegiatan & <span class="text-primary">Dokumentasi</span></h1>
            <p class="mt-4 text-lg text-slate-600">
                Kumpulan arsip visual dan video rangkaian kegiatan Sekretariat Daerah Bagian Tata Pemerintahan Kabupaten Tojo Una-Una.
            </p>
        </div>
    </div>

    <!-- Filter Tabs -->
    <div x-data="{ filter: 'all' }" class="mb-8">
        <div class="flex flex-wrap items-center gap-3 border-b border-slate-200 pb-6">
            <button @click="filter = 'all'" :class="filter === 'all' ? 'bg-primary text-white shadow-lg shadow-primary/20' : 'bg-white text-slate-700 border border-slate-200 hover:border-primary hover:text-primary'" class="group flex items-center gap-2 rounded-full px-6 py-2.5 text-sm font-bold transition-all">
                <span class="material-symbols-outlined text-[18px]">grid_view</span>
                Semua
            </button>
            <button @click="filter = 'photo'" :class="filter === 'photo' ? 'bg-primary text-white shadow-lg shadow-primary/20' : 'bg-white text-slate-700 border border-slate-200 hover:border-primary hover:text-primary'" class="group flex items-center gap-2 rounded-full px-6 py-2.5 text-sm font-bold transition-all">
                <span class="material-symbols-outlined text-[18px]">image</span>
                Foto
            </button>
            <button @click="filter = 'video'" :class="filter === 'video' ? 'bg-primary text-white shadow-lg shadow-primary/20' : 'bg-white text-slate-700 border border-slate-200 hover:border-primary hover:text-primary'" class="group flex items-center gap-2 rounded-full px-6 py-2.5 text-sm font-bold transition-all">
                <span class="material-symbols-outlined text-[18px]">videocam</span>
                Video
            </button>
        </div>

        @if($dokumentasis->isEmpty())
            <div class="text-center py-20 bg-white shadow-sm rounded-2xl border border-slate-100 mt-8">
                <span class="material-symbols-outlined text-5xl text-slate-300">photo_library</span>
                <h3 class="mt-4 text-lg font-bold text-slate-900">Belum Ada Dokumentasi</h3>
                <p class="mt-2 text-sm text-slate-500">Galeri foto dan video akan segera ditambahkan.</p>
            </div>
        @else
            <!-- Gallery Grid -->
            <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-3 mt-8">
                @foreach($dokumentasis as $doc)
                    @if($doc->type === 'photo' && $doc->file_path)
                        <!-- Photo Card -->
                        <div x-show="filter === 'all' || filter === 'photo'" x-transition class="group relative overflow-hidden rounded-xl bg-white shadow-sm transition-all hover:shadow-2xl">
                            <div class="aspect-video w-full overflow-hidden bg-slate-100 cursor-pointer" onclick="openModal('{{ upload_url($doc->file_path) }}')">
                                <img class="h-full w-full object-cover transition-transform duration-500 group-hover:scale-110" src="{{ upload_url($doc->file_path) }}" alt="{{ $doc->title }}"/>
                                <div class="absolute inset-0 flex items-center justify-center bg-black/40 opacity-0 transition-opacity duration-300 group-hover:opacity-100">
                                    <span class="material-symbols-outlined text-white text-4xl">zoom_in</span>
                                </div>
                            </div>
                            <div class="p-5">
                                <div class="flex items-center gap-2 mb-2">
                                    <span class="rounded bg-primary/10 px-2 py-0.5 text-[10px] font-bold uppercase tracking-wider text-primary">Foto</span>
                                    <span class="text-[11px] font-medium text-slate-500">{{ $doc->created_at->translatedFormat('d M Y') }}</span>
                                </div>
                                <h3 class="text-lg font-bold text-slate-900 line-clamp-1">{{ $doc->title }}</h3>
                            </div>
                        </div>

                    @elseif($doc->type === 'video' && $doc->youtube_url)
                        @php
                            preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/\s]{11})%i', $doc->youtube_url, $match);
                            $youtube_id = $match[1] ?? null;
                        @endphp

                        <!-- Video Card -->
                        <div x-show="filter === 'all' || filter === 'video'" x-transition class="group relative overflow-hidden rounded-xl bg-white shadow-sm transition-all hover:shadow-2xl">
                            <div class="aspect-video w-full overflow-hidden bg-slate-100 relative">
                                @if($youtube_id)
                                    <img class="h-full w-full object-cover transition-transform duration-500 group-hover:scale-110" src="https://img.youtube.com/vi/{{ $youtube_id }}/maxresdefault.jpg" onerror="this.src='https://img.youtube.com/vi/{{ $youtube_id }}/hqdefault.jpg'" alt="{{ $doc->title }}"/>
                                @else
                                    <div class="h-full w-full bg-slate-200 flex items-center justify-center">
                                        <span class="material-symbols-outlined text-4xl text-slate-400">videocam</span>
                                    </div>
                                @endif
                                <a href="{{ $doc->youtube_url }}" target="_blank" class="absolute inset-0 flex items-center justify-center bg-black/30 transition-colors group-hover:bg-black/50">
                                    <div class="flex h-14 w-14 items-center justify-center rounded-full bg-primary text-white shadow-lg shadow-primary/40 transition-transform duration-300 group-hover:scale-110">
                                        <span class="material-symbols-outlined text-3xl">play_arrow</span>
                                    </div>
                                </a>
                            </div>
                            <div class="p-5">
                                <div class="flex items-center gap-2 mb-2">
                                    <span class="rounded bg-red-100 px-2 py-0.5 text-[10px] font-bold uppercase tracking-wider text-red-600">Video</span>
                                    <span class="text-[11px] font-medium text-slate-500">{{ $doc->created_at->translatedFormat('d M Y') }}</span>
                                </div>
                                <h3 class="text-lg font-bold text-slate-900 line-clamp-1">{{ $doc->title }}</h3>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
        @endif
    </div>
</div>

<!-- Modal for Image Preview -->
<div id="imageModal" class="fixed inset-0 z-50 hidden bg-gray-900 bg-opacity-90 flex items-center justify-center transition-opacity duration-300 opacity-0 p-4">
    <button onclick="closeModal()" class="absolute top-6 right-6 text-white hover:text-gray-300 focus:outline-none">
        <span class="material-symbols-outlined text-4xl">close</span>
    </button>
    <img id="modalImage" src="" alt="Foto Full" class="max-w-full max-h-full rounded shadow-2xl object-contain">
</div>

<script>
    function openModal(src) {
        document.getElementById('modalImage').src = src;
        const modal = document.getElementById('imageModal');
        modal.classList.remove('hidden');
        setTimeout(() => {
            modal.classList.remove('opacity-0');
        }, 10);
        document.body.style.overflow = 'hidden';
    }

    function closeModal() {
        const modal = document.getElementById('imageModal');
        modal.classList.add('opacity-0');
        setTimeout(() => {
            modal.classList.add('hidden');
            document.getElementById('modalImage').src = '';
        }, 300);
        document.body.style.overflow = 'auto';
    }

    document.addEventListener('keydown', function(event) {
        if (event.key === "Escape") {
            closeModal();
        }
    });

    document.getElementById('imageModal').addEventListener('click', function(e) {
        if (e.target === this) {
            closeModal();
        }
    });
</script>
@endsection
