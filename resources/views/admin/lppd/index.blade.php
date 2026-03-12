<x-admin-layout>
    <x-slot name="title">Modul LPPD & LKPJ</x-slot>
    <x-slot name="breadcrumb">Modul LPPD & LKPJ</x-slot>

    <div class="flex items-end justify-between">
        <div>
            <h2 class="text-2xl font-black text-slate-900">Manajemen Laporan LPPD & LKPJ</h2>
            <p class="text-slate-500 mt-1">Laporan Penyelenggaraan Pemerintahan Daerah & Laporan Keterangan Pertanggungjawaban</p>
        </div>
        <div class="flex gap-3">
            <button class="bg-slate-100 text-slate-700 px-4 py-2 rounded-lg text-sm font-bold flex items-center gap-2 border border-slate-200 hover:bg-slate-200 transition-colors">
                <span class="material-symbols-outlined text-sm">history</span> Riwayat
            </button>
            <button class="bg-primary text-white px-4 py-2 rounded-lg text-sm font-bold flex items-center gap-2 hover:bg-primary/90 transition-colors">
                <span class="material-symbols-outlined text-sm">download</span> Unduh Panduan
            </button>
        </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
        <div class="bg-white p-6 rounded-xl border border-slate-200 shadow-sm flex flex-col gap-2">
            <div class="flex justify-between items-start">
                <span class="text-slate-500 text-sm font-medium">Jumlah Laporan Aktif</span>
                <div class="p-2 bg-primary/10 rounded-lg text-primary">
                    <span class="material-symbols-outlined">folder_open</span>
                </div>
            </div>
            <div class="mt-2">
                <span class="text-3xl font-bold">24</span>
                <span class="text-slate-400 text-sm ml-2">Laporan</span>
            </div>
        </div>
        <div class="bg-white p-6 rounded-xl border border-slate-200 shadow-sm flex flex-col gap-2 border-l-4 border-l-red-500">
            <div class="flex justify-between items-start">
                <span class="text-slate-500 text-sm font-medium">Laporan Mendekati Batas Waktu</span>
                <div class="p-2 bg-red-50/50 rounded-lg text-red-500">
                    <span class="material-symbols-outlined">notification_important</span>
                </div>
            </div>
            <div class="mt-2 flex items-center">
                <span class="text-3xl font-bold text-red-600">3</span>
                <span class="text-red-500/70 text-xs ml-2 font-medium">butuh perhatian segera</span>
            </div>
        </div>
        <div class="bg-white p-6 rounded-xl border border-slate-200 shadow-sm flex flex-col gap-2">
            <div class="flex justify-between items-start">
                <span class="text-slate-500 text-sm font-medium">Dalam Review</span>
                <div class="p-2 bg-yellow-500/10 rounded-lg text-yellow-600">
                    <span class="material-symbols-outlined">rate_review</span>
                </div>
            </div>
            <div class="mt-2">
                <span class="text-3xl font-bold">8</span>
                <span class="text-slate-400 text-sm ml-2">Laporan</span>
            </div>
        </div>
        <div class="bg-white p-6 rounded-xl border border-slate-200 shadow-sm flex flex-col gap-2">
            <div class="flex justify-between items-start">
                <span class="text-slate-500 text-sm font-medium">Selesai Evaluasi</span>
                <div class="p-2 bg-green-500/10 rounded-lg text-green-600">
                    <span class="material-symbols-outlined">verified</span>
                </div>
            </div>
            <div class="mt-2">
                <span class="text-3xl font-bold">13</span>
                <span class="text-slate-400 text-sm ml-2">Final</span>
            </div>
        </div>
    </div>

    <div class="grid grid-cols-1 xl:grid-cols-12 gap-8 items-start">
        <section class="xl:col-span-4 bg-white p-6 rounded-xl border border-slate-200 shadow-sm">
            <div class="mb-6">
                <h3 class="text-lg font-bold">Upload Laporan Baru</h3>
                <p class="text-xs text-slate-500 mt-1">Pastikan format file sesuai standar (PDF/DOCX)</p>
            </div>
            <form action="{{ route('admin.lppd.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
                @csrf
                <input type="hidden" name="status" value="Draft">
                <div>
                    <label class="block text-xs font-bold text-slate-500 uppercase mb-2">Judul Laporan</label>
                    <input name="title" required class="w-full rounded-lg border-slate-200 focus:ring-primary/20 focus:border-primary text-sm p-3" placeholder="Masukkan nama laporan..." type="text"/>
                </div>
                <div>
                    <label class="block text-xs font-bold text-slate-500 uppercase mb-2">Tipe Laporan</label>
                    <select name="type" required class="w-full rounded-lg border-slate-200 focus:ring-primary/20 focus:border-primary text-sm p-3">
                        <option value="LPPD">LPPD (Tahunan)</option>
                        <option value="LKPJ">LKPJ (Akhir Tahun)</option>
                    </select>
                </div>
                <div>
                    <label class="block text-xs font-bold text-slate-500 uppercase mb-2">Tahun Anggaran</label>
                    <input name="year" required class="w-full rounded-lg border-slate-200 focus:ring-primary/20 focus:border-primary text-sm p-3" type="number" value="{{ date('Y') }}"/>
                </div>
                <div>
                    <label class="block text-xs font-bold text-slate-500 uppercase mb-2">File Laporan (PDF)</label>
                    <input type="file" name="file_path" required accept="application/pdf" class="w-full text-sm border border-slate-200 rounded-lg file:mr-4 file:py-3 file:px-4 file:border-0 file:bg-primary/10 file:text-primary">
                </div>
                <button class="w-full bg-primary text-white py-3 rounded-lg text-sm font-bold hover:bg-primary/90 transition-all mt-2" type="submit">
                    Kirim Laporan
                </button>
            </form>
        </section>
        
        <section class="xl:col-span-8 bg-white p-6 rounded-xl border border-slate-200 shadow-sm">
            <div class="flex items-center justify-between mb-6">
                <h3 class="text-lg font-bold">Tabel Status Laporan</h3>
                <div class="flex gap-2">
                    <button class="p-2 text-slate-400 hover:text-primary transition-colors">
                        <span class="material-symbols-outlined">filter_alt</span>
                    </button>
                    <button class="p-2 text-slate-400 hover:text-primary transition-colors">
                        <span class="material-symbols-outlined">refresh</span>
                    </button>
                </div>
            </div>
            <div class="overflow-x-auto">
                <table class="w-full text-left text-sm">
                    <thead>
                        <tr class="text-slate-500 border-b border-slate-200">
                            <th class="pb-3 font-semibold uppercase text-xs">Laporan</th>
                            <th class="pb-3 font-semibold uppercase text-xs">Deadline Submission</th>
                            <th class="pb-3 font-semibold uppercase text-xs">Evaluasi</th>
                            <th class="pb-3 font-semibold uppercase text-xs">Status</th>
                            <th class="pb-3 font-semibold uppercase text-xs text-right">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100">
                        @forelse($laporans as $laporan)
                        <tr>
                            <td class="py-4">
                                <div class="flex flex-col">
                                    <span class="font-bold text-slate-900">{{ $laporan->title }}</span>
                                    <span class="text-[10px] text-slate-500 uppercase tracking-tighter">Uploaded: {{ $laporan->created_at->format('d M Y') }}</span>
                                </div>
                            </td>
                            <td class="py-4">
                                <div class="flex items-center gap-2 text-slate-500 font-medium">
                                    <span class="material-symbols-outlined text-sm">event</span>
                                    <span>Tahun {{ $laporan->year }}</span>
                                </div>
                            </td>
                            <td class="py-4 font-bold text-slate-700">{{ $laporan->type }}</td>
                            <td class="py-4">
                                <form action="{{ route('admin.lppd.status', $laporan) }}" method="POST">
                                    @csrf @method('PUT')
                                    <select name="status" onchange="this.form.submit()" class="text-[10px] font-bold uppercase rounded-full border-slate-200 py-1 px-3
                                        {{ $laporan->status === 'Terpublikasi' ? 'bg-green-100 text-green-700 border-green-200' : '' }}
                                        {{ $laporan->status === 'Final' ? 'bg-blue-100 text-blue-700 border-blue-200' : '' }}
                                        {{ $laporan->status === 'Draft' ? 'bg-yellow-100 text-yellow-700 border-yellow-200' : '' }}">
                                        <option value="Draft" {{ $laporan->status === 'Draft' ? 'selected' : '' }}>Draft</option>
                                        <option value="Final" {{ $laporan->status === 'Final' ? 'selected' : '' }}>Final</option>
                                        <option value="Terpublikasi" {{ $laporan->status === 'Terpublikasi' ? 'selected' : '' }}>Terpublikasi</option>
                                    </select>
                                </form>
                            </td>
                            <td class="py-4 text-right">
                                <a href="{{ asset($laporan->file_path) }}" target="_blank" class="text-primary hover:text-primary/80 font-bold px-2 inline-block">Lihat</a>
                                <form method="POST" action="{{ route('admin.lppd.destroy', $laporan) }}" class="inline-block" onsubmit="return confirm('Hapus laporan ini?')">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="text-slate-400 hover:text-red-500 px-2"><span class="material-symbols-outlined text-lg align-middle">delete</span></button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5" class="py-8 text-center text-slate-400 text-sm">Belum ada data laporan.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </section>
    </div>
</x-admin-layout>
