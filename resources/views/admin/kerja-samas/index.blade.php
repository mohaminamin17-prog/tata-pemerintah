<x-admin-layout>
    <x-slot name="title">Kerja Sama</x-slot>
    <x-slot name="breadcrumb">Kerja Sama</x-slot>

    <div>
        <h2 class="text-2xl font-black text-slate-900">Kelola Kerja Sama</h2>
        <p class="text-slate-500 mt-1">Manajemen data perjanjian dan kerja sama daerah.</p>
    </div>

    <div class="flex items-center justify-end">
        <a href="{{ route('admin.kerja-samas.create') }}" class="bg-primary text-white px-6 py-2 rounded-lg text-sm font-semibold hover:bg-primary/90 transition-colors shadow-sm flex items-center gap-2">
            <span class="material-symbols-outlined text-sm">add</span> Tambah Kerja Sama
        </a>
    </div>

    <section class="bg-white p-6 rounded-xl border border-slate-200 shadow-sm">
        <div class="overflow-x-auto">
            <table class="w-full text-left text-sm">
                <thead>
                    <tr class="text-slate-500 border-b border-slate-200">
                        <th class="pb-3 font-semibold uppercase text-xs">#</th>
                        <th class="pb-3 font-semibold uppercase text-xs">Judul</th>
                        <th class="pb-3 font-semibold uppercase text-xs">Mitra</th>
                        <th class="pb-3 font-semibold uppercase text-xs">Tanggal</th>
                        <th class="pb-3 font-semibold uppercase text-xs">Status</th>
                        <th class="pb-3 font-semibold uppercase text-xs">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    @forelse($kerja_samas as $index => $ks)
                    <tr>
                        <td class="py-4 text-slate-500">{{ $index + 1 }}</td>
                        <td class="py-4 font-medium max-w-xs truncate">{{ $ks->title }}</td>
                        <td class="py-4 text-slate-600">{{ $ks->partner ?? '-' }}</td>
                        <td class="py-4 text-slate-500">{{ $ks->created_at->format('d M Y') }}</td>
                        <td class="py-4"><span class="px-2 py-1 bg-green-100 text-green-700 rounded-full text-[10px] font-bold uppercase">Aktif</span></td>
                        <td class="py-4">
                            <div class="flex gap-2">
                                <a href="{{ route('admin.kerja-samas.edit', $ks) }}" class="p-1.5 text-primary hover:bg-primary/10 rounded transition-colors"><span class="material-symbols-outlined text-sm">edit</span></a>
                                <form method="POST" action="{{ route('admin.kerja-samas.destroy', $ks) }}" onsubmit="return confirm('Hapus data ini?')">@csrf @method('DELETE')
                                    <button class="p-1.5 text-red-500 hover:bg-red-50 rounded transition-colors"><span class="material-symbols-outlined text-sm">delete</span></button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr><td colspan="6" class="py-8 text-center text-slate-400 text-sm">Belum ada data kerja sama.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </section>
</x-admin-layout>
