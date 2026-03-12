<x-admin-layout>
    <x-slot name="title">Modul EKK</x-slot>
    <x-slot name="breadcrumb">Modul EKK</x-slot>

    <div>
        <h2 class="text-2xl font-black text-slate-900">Kelola Nilai EKK</h2>
        <p class="text-slate-500 mt-1">Evaluasi Kinerja Kecamatan se-Kabupaten Tojo Una-Una.</p>
    </div>

    <!-- Actions Bar -->
    <div class="flex items-center justify-between">
        <div class="flex gap-2">
            <button class="p-2 text-slate-400 hover:text-primary transition-colors"><span class="material-symbols-outlined">filter_list</span></button>
            <button class="bg-slate-100 text-slate-900 px-4 py-2 rounded-lg text-sm font-semibold hover:bg-slate-200 transition-colors">Export PDF</button>
        </div>
        <a href="{{ route('admin.ekk-scores.create') }}" class="bg-primary text-white px-6 py-2 rounded-lg text-sm font-semibold hover:bg-primary/90 transition-colors shadow-sm flex items-center gap-2">
            <span class="material-symbols-outlined text-sm">add</span> Tambah Data EKK
        </a>
    </div>

    <!-- EKK Table -->
    <section class="bg-white p-6 rounded-xl border border-slate-200 shadow-sm">
        <div class="overflow-x-auto">
            <table class="w-full text-left text-sm">
                <thead>
                    <tr class="text-slate-500 border-b border-slate-200">
                        <th class="pb-3 font-semibold uppercase text-xs">#</th>
                        <th class="pb-3 font-semibold uppercase text-xs">Kecamatan</th>
                        <th class="pb-3 font-semibold uppercase text-xs">Skor</th>
                        <th class="pb-3 font-semibold uppercase text-xs">Grade</th>
                        <th class="pb-3 font-semibold uppercase text-xs">Status</th>
                        <th class="pb-3 font-semibold uppercase text-xs">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    @forelse($scores as $index => $score)
                    <tr>
                        <td class="py-4 text-slate-500">{{ $index + 1 }}</td>
                        <td class="py-4 font-medium">{{ $score->kecamatan_name }}</td>
                        <td class="py-4 font-bold">{{ number_format($score->score, 2) }}</td>
                        <td class="py-4">
                            <span class="px-2 py-0.5 rounded-md font-black text-sm
                                @if($score->grade === 'A') bg-green-100 text-green-700
                                @elseif($score->grade === 'B') bg-blue-100 text-blue-700
                                @elseif($score->grade === 'C') bg-yellow-100 text-yellow-700
                                @else bg-red-100 text-red-700 @endif">{{ $score->grade }}</span>
                        </td>
                        <td class="py-4">
                            <span class="px-2 py-1 rounded-full text-[10px] font-bold uppercase
                                @if($score->score >= 90) bg-blue-100 text-blue-700
                                @elseif($score->score >= 80) bg-green-100 text-green-700
                                @elseif($score->score >= 70) bg-yellow-100 text-yellow-700
                                @else bg-red-100 text-red-700 @endif">
                                @if($score->score >= 90) Unggul @elseif($score->score >= 80) Optimal @elseif($score->score >= 70) Standar @else Kritikal @endif
                            </span>
                        </td>
                        <td class="py-4">
                            <div class="flex gap-2">
                                <a href="{{ route('admin.ekk-scores.edit', $score) }}" class="p-1.5 text-primary hover:bg-primary/10 rounded transition-colors"><span class="material-symbols-outlined text-sm">edit</span></a>
                                <form method="POST" action="{{ route('admin.ekk-scores.destroy', $score) }}" onsubmit="return confirm('Hapus data ini?')">@csrf @method('DELETE')
                                    <button class="p-1.5 text-red-500 hover:bg-red-50 rounded transition-colors"><span class="material-symbols-outlined text-sm">delete</span></button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr><td colspan="6" class="py-8 text-center text-slate-400 text-sm">Data EKK belum tersedia.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </section>
</x-admin-layout>
