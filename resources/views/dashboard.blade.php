<x-admin-layout>
    <x-slot name="title">Dashboard</x-slot>
    <x-slot name="breadcrumb">Dashboard</x-slot>

    <!-- Welcome Section -->
    <div>
        <h2 class="text-2xl font-black text-slate-900">Overview Dashboard</h2>
        <p class="text-slate-500 mt-1">Sistem Informasi Tata Pemerintahan Kabupaten Tojo Una-Una</p>
    </div>

    <!-- Stats Cards -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <div class="bg-white p-6 rounded-xl border border-slate-200 shadow-sm flex flex-col gap-2">
            <div class="flex justify-between items-start">
                <span class="text-slate-500 text-sm font-medium">Total Dokumen</span>
                <div class="p-2 bg-primary/10 rounded-lg text-primary"><span class="material-symbols-outlined">folder</span></div>
            </div>
            <div class="mt-2">
                <span class="text-3xl font-bold">{{ $stats['ekk_count'] + $stats['kerja_sama_count'] + $stats['dokumentasi_count'] }}</span>
                <span class="text-green-500 text-sm ml-2 font-medium">↑ Data</span>
            </div>
        </div>
        <div class="bg-white p-6 rounded-xl border border-slate-200 shadow-sm flex flex-col gap-2">
            <div class="flex justify-between items-start">
                <span class="text-slate-500 text-sm font-medium">Peringkat EKK</span>
                <div class="p-2 bg-primary/10 rounded-lg text-primary"><span class="material-symbols-outlined">trending_up</span></div>
            </div>
            <div class="mt-2">
                <span class="text-3xl font-bold">{{ $stats['ekk_count'] }}</span>
                <span class="text-slate-400 text-sm ml-2">Kecamatan</span>
            </div>
        </div>
        <div class="bg-white p-6 rounded-xl border border-slate-200 shadow-sm flex flex-col gap-2">
            <div class="flex justify-between items-start">
                <span class="text-slate-500 text-sm font-medium">Foto Galeri</span>
                <div class="p-2 bg-primary/10 rounded-lg text-primary"><span class="material-symbols-outlined">image</span></div>
            </div>
            <div class="mt-2">
                <span class="text-3xl font-bold">{{ $stats['dokumentasi_count'] }}</span>
                <span class="text-green-500 text-sm ml-2 font-medium">↑ Foto & Video</span>
            </div>
        </div>
    </div>

    <!-- Content Sections -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
        <!-- Edit Visi & Misi -->
        <section class="bg-white p-6 rounded-xl border border-slate-200 shadow-sm">
            <form action="{{ route('admin.settings.visimisi') }}" method="POST">
                @csrf
                <div class="flex items-center justify-between mb-6">
                    <h3 class="text-lg font-bold">Edit Visi & Misi</h3>
                    <button type="submit" class="bg-primary text-white px-4 py-2 rounded-lg text-sm font-semibold hover:bg-primary/90 transition-colors">Simpan Perubahan</button>
                </div>
                <div class="space-y-4">
                    <div>
                        <label class="block text-xs font-bold text-slate-500 uppercase mb-2">Visi Pemerintah Daerah</label>
                        <textarea name="visi" class="w-full rounded-lg border-slate-200 focus:ring-primary/20 focus:border-primary text-sm p-4" rows="3">{{ \App\Models\Setting::where('key', 'visi')->value('value') ?? 'Terwujudnya Kabupaten Tojo Una-Una yang Mandiri, Sejahtera dan Berdaya Saing.' }}</textarea>
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-slate-500 uppercase mb-2">Misi Utama</label>
                        <textarea name="misi" class="w-full rounded-lg border-slate-200 focus:ring-primary/20 focus:border-primary text-sm p-4" rows="5">{{ \App\Models\Setting::where('key', 'misi')->value('value') ?? "1. Meningkatkan tata kelola pemerintahan yang profesional.\n2. Mengoptimalkan potensi sumber daya alam daerah.\n3. Mewujudkan pemerataan infrastruktur wilayah.\n4. Peningkatan kualitas pelayanan publik dasar." }}</textarea>
                    </div>
                    <!-- Hidden field for sambutan since it's required by the controller -->
                    <input type="hidden" name="sambutan" value="{{ \App\Models\Setting::where('key', 'sambutan')->value('value') ?? 'Assalamualaikum Warahmatullahi Wabarakatuh...' }}">
                </div>
            </form>
        </section>

        <!-- Input Nilai EKK -->
        <section class="bg-white p-6 rounded-xl border border-slate-200 shadow-sm">
            <div class="flex items-center justify-between mb-6">
                <h3 class="text-lg font-bold">Input Nilai EKK</h3>
                <div class="flex gap-2">
                    <button class="p-2 text-slate-400 hover:text-primary transition-colors"><span class="material-symbols-outlined">filter_list</span></button>
                    <a href="{{ route('admin.ekk-scores.index') }}" class="bg-slate-100 text-slate-900 px-4 py-2 rounded-lg text-sm font-semibold hover:bg-slate-200 transition-colors">Kelola EKK</a>
                </div>
            </div>
            <div class="overflow-x-auto">
                <table class="w-full text-left text-sm">
                    <thead>
                        <tr class="text-slate-500 border-b border-slate-200">
                            <th class="pb-3 font-semibold uppercase text-xs">Indikator</th>
                            <th class="pb-3 font-semibold uppercase text-xs">Nilai</th>
                            <th class="pb-3 font-semibold uppercase text-xs">Status</th>
                            <th class="pb-3 font-semibold uppercase text-xs">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100">
                        @forelse($top_ekk as $score)
                        <tr>
                            <td class="py-4">{{ $score->kecamatan_name }}</td>
                            <td class="py-4">{{ number_format($score->score, 2) }}</td>
                            <td class="py-4">
                                <span class="px-2 py-1 rounded-full text-[10px] font-bold uppercase
                                    @if($score->score >= 90) bg-blue-100 text-blue-700
                                    @elseif($score->score >= 80) bg-green-100 text-green-700
                                    @elseif($score->score >= 70) bg-yellow-100 text-yellow-700
                                    @else bg-red-100 text-red-700 @endif">
                                    @if($score->score >= 90) Unggul
                                    @elseif($score->score >= 80) Optimal
                                    @elseif($score->score >= 70) Standar
                                    @else Kritikal @endif
                                </span>
                            </td>
                            <td class="py-4">
                                <a href="{{ route('admin.ekk-scores.edit', $score) }}" class="text-primary font-medium hover:underline">Edit</a>
                            </td>
                        </tr>
                        @empty
                        <tr><td colspan="4" class="py-8 text-center text-slate-400 text-sm">Data EKK belum tersedia.</td></tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </section>
    </div>

    <!-- Recent Documentation Feed -->
    <section class="bg-white p-6 rounded-xl border border-slate-200 shadow-sm">
        <div class="flex items-center justify-between mb-6">
            <h3 class="text-lg font-bold">Dokumentasi Terkini</h3>
            <a href="{{ route('admin.dokumentasis.index') }}" class="text-sm text-primary font-semibold hover:underline">Lihat Semua →</a>
        </div>
        <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-6 gap-4">
            @forelse($recent_dokumentasi as $doc)
                <div class="aspect-video rounded-lg overflow-hidden bg-slate-100 relative group cursor-pointer">
                    <div class="absolute inset-0 bg-primary/40 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center z-10">
                        <span class="material-symbols-outlined text-white">visibility</span>
                    </div>
                    @if($doc->type === 'photo' && $doc->file_path)
                        <img class="w-full h-full object-cover" alt="{{ $doc->title }}" src="{{ upload_url($doc->file_path) }}"/>
                    @else
                        <div class="w-full h-full flex items-center justify-center bg-slate-100">
                            <span class="material-symbols-outlined text-slate-300 text-3xl">{{ $doc->type === 'video' ? 'videocam' : 'image' }}</span>
                        </div>
                    @endif
                </div>
            @empty
                <div class="col-span-full text-center py-8 text-slate-400">
                    <span class="material-symbols-outlined text-3xl">photo_library</span>
                    <p class="mt-2 text-sm">Belum ada dokumentasi.</p>
                </div>
            @endforelse
            @if($recent_dokumentasi->count() > 0)
                <a href="{{ route('admin.dokumentasis.create') }}" class="aspect-video rounded-lg bg-slate-100 flex flex-col items-center justify-center border-2 border-dashed border-slate-300 cursor-pointer hover:border-primary transition-colors text-slate-400 hover:text-primary">
                    <span class="material-symbols-outlined">add_photo_alternate</span>
                    <span class="text-[10px] font-bold uppercase mt-1">Tambah Foto</span>
                </a>
            @endif
        </div>
    </section>
</x-admin-layout>
