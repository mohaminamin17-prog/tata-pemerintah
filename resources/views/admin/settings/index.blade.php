<x-admin-layout>
    <x-slot name="title">Konten Beranda</x-slot>
    <x-slot name="breadcrumb">Konten Beranda</x-slot>

    <div>
        <h2 class="text-2xl font-black text-slate-900">Kelola Konten Beranda</h2>
        <p class="text-slate-500 mt-1">Atur tampilan dan informasi utama pada halaman depan website.</p>
    </div>

    <!-- Hero Section Manager -->
    <form action="{{ route('admin.settings.hero') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <section class="bg-white p-6 rounded-xl border border-slate-200 shadow-sm">
            <div class="flex items-center justify-between mb-6">
                <div class="flex items-center gap-3">
                    <div class="p-2 bg-primary/10 rounded-lg text-primary"><span class="material-symbols-outlined">view_carousel</span></div>
                    <h3 class="text-lg font-bold text-slate-900">Kelola Hero Section Beranda</h3>
                </div>
                <button type="submit" class="bg-primary text-white px-6 py-2 rounded-lg text-sm font-semibold hover:bg-primary/90 transition-colors shadow-sm">Simpan Perubahan</button>
            </div>
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
            <div class="space-y-4">
                <div>
                    <label class="block text-xs font-bold text-slate-500 uppercase mb-2">Judul Utama (Headline)</label>
                    <input name="hero_title" class="w-full rounded-lg border-slate-200 focus:ring-primary/20 focus:border-primary text-sm p-3" type="text" value="{{ $hero_title }}"/>
                </div>
                <div>
                    <label class="block text-xs font-bold text-slate-500 uppercase mb-2">Deskripsi Singkat</label>
                    <textarea name="hero_description" class="w-full rounded-lg border-slate-200 focus:ring-primary/20 focus:border-primary text-sm p-3" rows="4">{{ $hero_description }}</textarea>
                </div>
            </div>
            <div>
                <label class="block text-xs font-bold text-slate-500 uppercase mb-2">Gambar Banner Utama</label>
                <label class="block border-2 border-dashed border-slate-200 rounded-xl p-4 text-center hover:border-primary transition-colors cursor-pointer group">
                    <input type="file" name="hero_image" class="hidden" accept="image/*">
                    <div class="aspect-video bg-slate-100 rounded-lg mb-4 flex items-center justify-center overflow-hidden">
                        @if($hero_image)
                            <img src="{{ asset($hero_image) }}" class="w-full h-full object-cover">
                        @else
                            <span class="material-symbols-outlined text-slate-300 text-4xl">image</span>
                        @endif
                    </div>
                    <div class="flex flex-col items-center">
                        <span class="material-symbols-outlined text-slate-400 group-hover:text-primary mb-1">upload_file</span>
                        <span class="text-sm font-medium text-slate-600">Klik untuk unggah atau seret gambar ke sini</span>
                        <span class="text-[10px] text-slate-400 mt-1">Rekomendasi ukuran: 1920x1080px (Maks. 2MB)</span>
                    </div>
                </label>
            </div>
        </div>
        </section>
    </form>

    <!-- Visi Misi & Sambutan -->
    <form action="{{ route('admin.settings.visimisi') }}" method="POST">
        @csrf
        <section class="bg-white p-6 rounded-xl border border-slate-200 shadow-sm mt-8">
            <div class="flex items-center justify-between mb-6">
                <div class="flex items-center gap-3">
                    <div class="p-2 bg-primary/10 rounded-lg text-primary"><span class="material-symbols-outlined">campaign</span></div>
                    <h3 class="text-lg font-bold text-slate-900">Visi, Misi & Sambutan</h3>
                </div>
                <button type="submit" class="bg-primary text-white px-6 py-2 rounded-lg text-sm font-semibold hover:bg-primary/90 transition-colors shadow-sm">Simpan Perubahan</button>
            </div>
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
            <div class="space-y-6">
                <div>
                    <label class="block text-xs font-bold text-slate-500 uppercase mb-2">Visi Pemerintah Daerah</label>
                    <textarea name="visi" class="w-full rounded-lg border-slate-200 focus:ring-primary/20 focus:border-primary text-sm p-4" rows="3">{{ $visi }}</textarea>
                </div>
                <div>
                    <label class="block text-xs font-bold text-slate-500 uppercase mb-2">Misi Utama</label>
                    <textarea name="misi" class="w-full rounded-lg border-slate-200 focus:ring-primary/20 focus:border-primary text-sm p-4" rows="6">{{ $misi }}</textarea>
                </div>
            </div>
            <div class="flex flex-col">
                <label class="block text-xs font-bold text-slate-500 uppercase mb-2">Sambutan Kepala Daerah</label>
                <textarea name="sambutan" class="flex-1 w-full rounded-lg border-slate-200 focus:ring-primary/20 focus:border-primary text-sm p-4" placeholder="Tuliskan kata sambutan Kepala Daerah di sini...">{{ $sambutan }}</textarea>
            </div>
        </div>
        </section>
    </form>

    <!-- Settings List -->
    <section class="bg-white p-6 rounded-xl border border-slate-200 shadow-sm">
        <div class="flex items-center justify-between mb-6">
            <div class="flex items-center gap-3">
                <div class="p-2 bg-primary/10 rounded-lg text-primary"><span class="material-symbols-outlined">tune</span></div>
                <h3 class="text-lg font-bold text-slate-900">Data Settings</h3>
            </div>
            <a href="{{ route('admin.settings.create') }}" class="bg-slate-100 text-slate-900 px-4 py-2 rounded-lg text-sm font-semibold hover:bg-slate-200 transition-colors flex items-center gap-2">
                <span class="material-symbols-outlined text-sm">add</span> Tambah Setting
            </a>
        </div>
        <div class="overflow-x-auto">
            <table class="w-full text-left text-sm">
                <thead>
                    <tr class="text-slate-500 border-b border-slate-200">
                        <th class="pb-3 font-semibold uppercase text-xs">#</th>
                        <th class="pb-3 font-semibold uppercase text-xs">Key</th>
                        <th class="pb-3 font-semibold uppercase text-xs">Value</th>
                        <th class="pb-3 font-semibold uppercase text-xs">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    @forelse($all_settings as $index => $setting)
                    <tr>
                        <td class="py-4 text-slate-500">{{ $index + 1 }}</td>
                        <td class="py-4 font-medium">{{ $setting->key }}</td>
                        <td class="py-4 text-slate-600 max-w-xs truncate">{{ Str::limit($setting->value, 80) }}</td>
                        <td class="py-4">
                            <div class="flex gap-2">
                                <a href="{{ route('admin.settings.edit', $setting) }}" class="p-1.5 text-primary hover:bg-primary/10 rounded transition-colors"><span class="material-symbols-outlined text-sm">edit</span></a>
                                <form method="POST" action="{{ route('admin.settings.destroy', $setting) }}" onsubmit="return confirm('Hapus setting ini?')">@csrf @method('DELETE')
                                    <button class="p-1.5 text-red-500 hover:bg-red-50 rounded transition-colors"><span class="material-symbols-outlined text-sm">delete</span></button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr><td colspan="4" class="py-8 text-center text-slate-400 text-sm">Belum ada data setting.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </section>
</x-admin-layout>
