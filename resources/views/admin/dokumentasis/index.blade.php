<x-admin-layout>
    <x-slot name="title">Galeri Dokumentasi</x-slot>
    <x-slot name="breadcrumb">Galeri Dokumentasi</x-slot>

    <div>
        <h2 class="text-2xl font-black text-slate-900">Kelola Galeri Dokumentasi</h2>
        <p class="text-slate-500 mt-1">Manajemen foto dan video kegiatan pemerintahan.</p>
    </div>

    <div class="flex items-center justify-end">
        <a href="{{ route('admin.dokumentasis.create') }}" class="bg-primary text-white px-6 py-2 rounded-lg text-sm font-semibold hover:bg-primary/90 transition-colors shadow-sm flex items-center gap-2">
            <span class="material-symbols-outlined text-sm">add_photo_alternate</span> Unggah Dokumentasi
        </a>
    </div>

    <!-- Gallery Grid -->
    <section class="bg-white p-6 rounded-xl border border-slate-200 shadow-sm">
        <h3 class="text-lg font-bold mb-6">Semua Dokumentasi</h3>
        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            @forelse($dokumentasis as $doc)
                <div class="border border-slate-200 rounded-xl overflow-hidden hover:shadow-md transition-shadow group">
                    <div class="aspect-video bg-slate-100 overflow-hidden relative">
                        @if($doc->type === 'photo' && $doc->file_path)
                            <img class="w-full h-full object-cover" alt="{{ $doc->title }}" src="{{ upload_url($doc->file_path) }}"/>
                        @else
                            <div class="w-full h-full flex items-center justify-center bg-slate-100">
                                <span class="material-symbols-outlined text-slate-300 text-4xl">{{ $doc->type === 'video' ? 'videocam' : 'image' }}</span>
                            </div>
                        @endif
                        <div class="absolute inset-0 bg-primary/40 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center">
                            <span class="material-symbols-outlined text-white">visibility</span>
                        </div>
                        <div class="absolute top-2 right-2 flex gap-1 opacity-0 group-hover:opacity-100 transition-opacity">
                            <a href="{{ route('admin.dokumentasis.edit', $doc) }}" class="p-1.5 bg-white/90 rounded text-primary hover:bg-white transition-colors"><span class="material-symbols-outlined text-sm">edit</span></a>
                            <form method="POST" action="{{ route('admin.dokumentasis.destroy', $doc) }}" onsubmit="return confirm('Hapus?')">@csrf @method('DELETE')
                                <button class="p-1.5 bg-white/90 rounded text-red-500 hover:bg-white transition-colors"><span class="material-symbols-outlined text-sm">delete</span></button>
                            </form>
                        </div>
                    </div>
                    <div class="p-4">
                        <span class="text-[10px] font-bold uppercase px-2 py-0.5 rounded {{ $doc->type === 'video' ? 'text-orange-500 bg-orange-500/10' : 'text-primary bg-primary/10' }}">{{ $doc->type }}</span>
                        <h4 class="font-bold text-sm mt-2 line-clamp-2">{{ $doc->title }}</h4>
                        <p class="text-xs text-slate-500 mt-2">{{ $doc->created_at->format('d M Y') }}</p>
                    </div>
                </div>
            @empty
                <div class="col-span-full text-center py-12 text-slate-400">
                    <span class="material-symbols-outlined text-4xl">photo_library</span>
                    <p class="mt-2 text-sm">Belum ada dokumentasi.</p>
                    <a href="{{ route('admin.dokumentasis.create') }}" class="mt-4 inline-block bg-primary text-white px-6 py-2 rounded-lg text-sm font-semibold hover:bg-primary/90 transition-colors">Upload Pertama</a>
                </div>
            @endforelse
        </div>
    </section>
</x-admin-layout>
