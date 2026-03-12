<x-admin-layout>
    <x-slot name="title">Link Eksternal</x-slot>
    <x-slot name="breadcrumb">Link Eksternal</x-slot>

    <div>
        <h2 class="text-2xl font-black text-slate-900">Kelola Link Eksternal</h2>
        <p class="text-slate-500 mt-1">Manajemen tautan ke sumber daya dan layanan eksternal.</p>
    </div>

    <div class="flex items-center justify-end">
        <a href="{{ route('admin.external-links.create') }}" class="bg-primary text-white px-6 py-2 rounded-lg text-sm font-semibold hover:bg-primary/90 transition-colors shadow-sm flex items-center gap-2">
            <span class="material-symbols-outlined text-sm">add_link</span> Tambah Link
        </a>
    </div>

    <section class="bg-white p-6 rounded-xl border border-slate-200 shadow-sm">
        <div class="overflow-x-auto">
            <table class="w-full text-left text-sm">
                <thead>
                    <tr class="text-slate-500 border-b border-slate-200">
                        <th class="pb-3 font-semibold uppercase text-xs">#</th>
                        <th class="pb-3 font-semibold uppercase text-xs">Nama</th>
                        <th class="pb-3 font-semibold uppercase text-xs">URL</th>
                        <th class="pb-3 font-semibold uppercase text-xs">Kategori</th>
                        <th class="pb-3 font-semibold uppercase text-xs">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    @forelse($externalLinks as $index => $link)
                    <tr>
                        <td class="py-4 text-slate-500">{{ $index + 1 }}</td>
                        <td class="py-4 font-medium">{{ $link->name }}</td>
                        <td class="py-4 text-primary hover:underline max-w-xs truncate"><a href="{{ $link->url }}" target="_blank">{{ Str::limit($link->url, 50) }}</a></td>
                        <td class="py-4"><span class="px-2 py-1 bg-slate-100 text-slate-700 rounded-full text-[10px] font-bold uppercase">{{ $link->category ?? 'Umum' }}</span></td>
                        <td class="py-4">
                            <div class="flex gap-2">
                                <a href="{{ route('admin.external-links.edit', $link) }}" class="p-1.5 text-primary hover:bg-primary/10 rounded transition-colors"><span class="material-symbols-outlined text-sm">edit</span></a>
                                <form method="POST" action="{{ route('admin.external-links.destroy', $link) }}" onsubmit="return confirm('Hapus link ini?')">@csrf @method('DELETE')
                                    <button class="p-1.5 text-red-500 hover:bg-red-50 rounded transition-colors"><span class="material-symbols-outlined text-sm">delete</span></button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr><td colspan="5" class="py-8 text-center text-slate-400 text-sm">Belum ada link eksternal.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </section>
</x-admin-layout>
