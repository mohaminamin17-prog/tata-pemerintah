@extends('layouts.public')

@section('content')
<!-- Hero Section -->
<section class="relative py-16 lg:py-24 bg-white overflow-hidden">
    <div class="absolute top-0 right-0 w-1/3 h-full bg-primary/5 rounded-l-full blur-3xl -z-10"></div>
    <div class="max-w-7xl mx-auto px-4 lg:px-20 grid lg:grid-cols-2 gap-12 items-center">
        <div class="flex flex-col gap-6">
            <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-primary/10 text-primary text-xs font-bold uppercase tracking-wider w-fit">
                <span class="relative flex h-2 w-2">
                    <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-primary opacity-75"></span>
                    <span class="relative inline-flex rounded-full h-2 w-2 bg-primary"></span>
                </span>
                Sistem Informasi Pemerintahan
            </div>
            <h1 class="text-4xl lg:text-6xl font-black text-slate-900 leading-[1.1] tracking-tight">Layanan<br><span class="text-primary">Pemerintahan</span>
            </h1>
            <p class="text-lg text-slate-600 leading-relaxed max-w-xl">
                Pusat administrasi pemerintahan dan evaluasi kinerja wilayah untuk mendukung tata kelola pelayanan publik yang lebih baik dan transparan di wilayah Kabupaten Tojo Una-Una.
            </p>
            <div class="flex flex-wrap gap-4 mt-4">
                @if($spm_link)
                    <a href="{{ $spm_link }}" target="_blank" class="bg-primary hover:bg-primary/90 text-white font-bold h-12 px-8 rounded-lg transition-all shadow-lg shadow-primary/25 inline-flex items-center gap-2">
                        <span class="material-symbols-outlined text-sm">open_in_new</span>
                        Akses SPM
                    </a>
                @endif
                <a href="{{ route('public.profil') }}" class="bg-white border border-slate-200 text-slate-700 font-bold h-12 px-8 rounded-lg hover:bg-slate-50 transition-all inline-flex items-center">
                    Lihat Profil
                </a>
            </div>
        </div>
        <div class="relative group hidden lg:block">
            <div class="absolute inset-0 bg-primary/20 rounded-2xl rotate-3 group-hover:rotate-1 transition-transform"></div>
            <div class="relative aspect-video rounded-2xl bg-cover bg-center shadow-2xl overflow-hidden border-4 border-white" style='background-image: url("{{ asset('assets/pemerintahan.jpg') }}");'>
                <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent"></div>
            </div>
        </div>
    </div>
</section>

<!-- Modul EKK Section -->
<section class="py-16 bg-slate-50">
    <div class="max-w-7xl mx-auto px-4 lg:px-20">
        <div class="mb-8">
            <h2 class="text-2xl font-bold text-slate-900 flex items-center gap-3">
                <span class="material-symbols-outlined text-primary p-2 bg-primary/10 rounded-lg">analytics</span>
                Modul EKK: Peringkat Kecamatan
            </h2>
            <p class="text-slate-600 mt-2">Evaluasi Kinerja Kecamatan berdasarkan indikator standar pelayanan.</p>
        </div>
        <div class="bg-white rounded-xl shadow-sm border border-slate-200 overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="bg-slate-50 border-b border-slate-200">
                            <th class="px-6 py-4 text-xs font-bold text-slate-500 uppercase tracking-wider w-24">Peringkat</th>
                            <th class="px-6 py-4 text-xs font-bold text-slate-500 uppercase tracking-wider">Nama Kecamatan</th>
                            <th class="px-6 py-4 text-xs font-bold text-slate-500 uppercase tracking-wider w-64">Skor Kinerja</th>
                            <th class="px-6 py-4 text-xs font-bold text-slate-500 uppercase tracking-wider w-32 text-center">Grade</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100">
                        @forelse($ekk_scores as $index => $score)
                            <tr class="hover:bg-slate-50 transition-colors">
                                <td class="px-6 py-5">
                                    @if($index === 0)
                                        <span class="size-8 rounded-full bg-yellow-400/20 text-yellow-700 flex items-center justify-center font-bold">1</span>
                                    @elseif($index === 1)
                                        <span class="size-8 rounded-full bg-slate-100 text-slate-500 flex items-center justify-center font-bold">2</span>
                                    @elseif($index === 2)
                                        <span class="size-8 rounded-full bg-amber-100 text-amber-700 flex items-center justify-center font-bold">3</span>
                                    @else
                                        <span class="size-8 rounded-full bg-slate-100 text-slate-500 flex items-center justify-center font-bold">{{ $index + 1 }}</span>
                                    @endif
                                </td>
                                <td class="px-6 py-5">
                                    <div class="font-bold text-slate-900">{{ $score->kecamatan_name }}</div>
                                </td>
                                <td class="px-6 py-5">
                                    <div class="flex items-center gap-4">
                                        <div class="flex-1 h-2 rounded-full bg-slate-100 overflow-hidden">
                                            <div class="h-full bg-primary rounded-full" style="width: {{ min($score->score, 100) }}%;"></div>
                                        </div>
                                        <span class="font-bold text-sm text-slate-900">{{ number_format($score->score, 0) }}</span>
                                    </div>
                                </td>
                                <td class="px-6 py-5 text-center">
                                    <span class="px-3 py-1 rounded-md font-black text-lg
                                        @if($score->grade === 'A') bg-green-100 text-green-700
                                        @elseif($score->grade === 'B') bg-blue-100 text-blue-700
                                        @elseif($score->grade === 'C') bg-yellow-100 text-yellow-700
                                        @else bg-red-100 text-red-700 @endif">
                                        {{ $score->grade }}
                                    </span>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="px-6 py-12 text-center">
                                    <span class="material-symbols-outlined text-4xl text-slate-300">analytics</span>
                                    <p class="text-slate-500 mt-4">Data EKK belum tersedia.</p>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>

<!-- Modul SPM Section -->
<section class="py-16 bg-white">
    <div class="max-w-7xl mx-auto px-4 lg:px-20">
        <div class="flex flex-col md:flex-row items-center gap-12 bg-primary/5 rounded-2xl p-8 lg:p-12 border border-primary/10">
            <div class="size-24 lg:size-32 rounded-3xl bg-primary flex items-center justify-center text-white shrink-0 shadow-xl shadow-primary/20">
                <span class="material-symbols-outlined text-5xl lg:text-6xl">verified_user</span>
            </div>
            <div class="flex-1 text-center md:text-left">
                <h2 class="text-3xl font-bold text-slate-900">Modul SPM</h2>
                <h3 class="text-primary font-bold text-lg mb-4">Standar Pelayanan Minimal</h3>
                <p class="text-slate-600 leading-relaxed max-w-2xl mb-8">
                    Modul monitoring dan pelaporan Standar Pelayanan Minimal (SPM) secara real-time. Pastikan setiap unit kerja memenuhi standar pelayanan yang telah ditetapkan oleh pemerintah pusat.
                </p>
                @if($spm_link)
                    <a class="inline-flex items-center gap-2 bg-primary hover:bg-primary/90 text-white font-bold h-12 px-8 rounded-lg transition-all" href="{{ $spm_link }}" target="_blank">
                        Akses Aplikasi SPM
                        <span class="material-symbols-outlined text-sm">open_in_new</span>
                    </a>
                @else
                    <p class="text-slate-400 italic">Link aplikasi SPM belum tersedia.</p>
                @endif
            </div>
            <div class="hidden lg:block w-48 opacity-20">
                <span class="material-symbols-outlined text-[160px] text-primary rotate-12">description</span>
            </div>
        </div>
    </div>
</section>
@endsection
