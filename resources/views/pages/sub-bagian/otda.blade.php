@extends('layouts.public')

@section('content')
<!-- Hero Section -->
<section class="max-w-7xl mx-auto px-6 md:px-20 py-12 md:py-20">
    <div class="flex flex-col md:flex-row gap-12 items-center">
        <div class="w-full md:w-1/2 space-y-6">
            <div class="inline-flex items-center px-3 py-1 rounded-full bg-primary/10 text-primary text-xs font-bold uppercase tracking-wider">
                Bagian Tata Pemerintahan
            </div>
            <h1 class="text-slate-900 text-4xl md:text-6xl font-black leading-tight tracking-tight">
                Otonomi <span class="text-primary">Daerah</span>
            </h1>
            <p class="text-slate-600 text-lg leading-relaxed max-w-xl">
                Pusat fasilitasi kebijakan otonomi daerah, koordinasi kerja sama antar lembaga, dan evaluasi berkala kinerja penyelenggaraan pemerintahan daerah di Kabupaten Tojo Una-Una.
            </p>
            <div class="flex gap-4">
                @if($lppd_link)
                    <a href="{{ $lppd_link }}" target="_blank" class="bg-primary text-white px-8 py-3 rounded-lg font-bold hover:shadow-lg hover:shadow-primary/30 transition-all inline-flex items-center gap-2">
                        <span class="material-symbols-outlined text-xl">open_in_new</span>
                        Akses Link Upload LPPD & LKPJ
                    </a>
                @endif
                <a href="{{ route('public.profil') }}" class="border border-slate-300 text-slate-700 px-8 py-3 rounded-lg font-bold hover:bg-slate-50 transition-all">
                    Lihat Profil
                </a>
            </div>
        </div>
        <div class="w-full md:w-1/2">
            <div class="relative rounded-2xl overflow-hidden aspect-[4/4.2] shadow-2xl">
                <div class="absolute inset-0 bg-primary/10 z-10"></div>
                <img alt="Kantor Pemerintahan Modern" class="w-full h-full object-cover" src="{{ asset('assets/otda.png') }}"/>
            </div>
        </div>
    </div>
</section>

<!-- Fungsi Utama Section -->
<section class="bg-white py-16">
    <div class="max-w-7xl mx-auto px-6 md:px-20">
        <div class="text-center mb-12">
            <h2 class="text-slate-900 text-3xl font-bold mb-4">Fungsi Utama Otda</h2>
            <div class="h-1.5 w-20 bg-primary mx-auto rounded-full"></div>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <div class="p-8 rounded-xl bg-slate-50 border border-slate-200 hover:border-primary transition-all group">
                <div class="size-14 rounded-lg bg-primary/10 text-primary flex items-center justify-center mb-6 group-hover:bg-primary group-hover:text-white transition-all">
                    <span class="material-symbols-outlined text-3xl">description</span>
                </div>
                <h3 class="text-xl font-bold mb-3">Fasilitasi Kebijakan</h3>
                <p class="text-slate-600">Mengkoordinasikan perumusan dan pelaksanaan kebijakan otonomi daerah yang adaptif serta sesuai regulasi nasional.</p>
            </div>
            <div class="p-8 rounded-xl bg-slate-50 border border-slate-200 hover:border-primary transition-all group">
                <div class="size-14 rounded-lg bg-primary/10 text-primary flex items-center justify-center mb-6 group-hover:bg-primary group-hover:text-white transition-all">
                    <span class="material-symbols-outlined text-3xl">handshake</span>
                </div>
                <h3 class="text-xl font-bold mb-3">Kerja Sama Antar Lembaga</h3>
                <p class="text-slate-600">Membangun sinergi strategis melalui kemitraan daerah yang berkelanjutan untuk meningkatkan pelayanan publik.</p>
            </div>
            <div class="p-8 rounded-xl bg-slate-50 border border-slate-200 hover:border-primary transition-all group">
                <div class="size-14 rounded-lg bg-primary/10 text-primary flex items-center justify-center mb-6 group-hover:bg-primary group-hover:text-white transition-all">
                    <span class="material-symbols-outlined text-3xl">analytics</span>
                </div>
                <h3 class="text-xl font-bold mb-3">Evaluasi Kinerja</h3>
                <p class="text-slate-600">Melakukan monitoring, evaluasi, dan pelaporan capaian kinerja penyelenggaraan pemerintahan daerah secara berkala.</p>
            </div>
        </div>
    </div>
</section>

<!-- Modul LPPD Section -->
<section class="max-w-7xl mx-auto px-6 md:px-20 py-20">
    <div class="bg-white rounded-3xl overflow-hidden shadow-2xl border border-slate-200 flex flex-col lg:flex-row">
        <div class="w-full lg:w-3/5 p-8 md:p-12 lg:p-16 space-y-8">
            <div>
                <h2 class="text-slate-900 text-3xl md:text-4xl font-black mb-4">Modul LPPD & LKPJ</h2>
                <p class="text-slate-600 text-lg">
                    Laporan Penyelenggaraan Pemerintahan Daerah (LPPD) adalah instrumen evaluasi kinerja tahunan Pemkab Tojo Una-Una. Akses dokumen resmi, regulasi, dan data pendukung penyusunan laporan di sini.
                </p>
            </div>
            <div class="space-y-4">
                <h4 class="text-sm font-bold text-primary uppercase tracking-wider">Dokumen Pelaporan Terbaru</h4>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div class="flex items-center gap-3 p-4 bg-slate-50 rounded-xl border border-slate-100">
                        <span class="material-symbols-outlined text-red-500">picture_as_pdf</span>
                        <span class="text-sm font-medium text-slate-700">LPPD Kabupaten 2023.pdf</span>
                    </div>
                    <div class="flex items-center gap-3 p-4 bg-slate-50 rounded-xl border border-slate-100">
                        <span class="material-symbols-outlined text-blue-500">description</span>
                        <span class="text-sm font-medium text-slate-700">Format Data IKK 2024.xlsx</span>
                    </div>
                    <div class="flex items-center gap-3 p-4 bg-slate-50 rounded-xl border border-slate-100">
                        <span class="material-symbols-outlined text-red-500">picture_as_pdf</span>
                        <span class="text-sm font-medium text-slate-700">Ringkasan LKPJ 2023.pdf</span>
                    </div>
                    <div class="flex items-center gap-3 p-4 bg-slate-50 rounded-xl border border-slate-100">
                        <span class="material-symbols-outlined text-orange-500">folder_zip</span>
                        <span class="text-sm font-medium text-slate-700">Lampiran SPM 2023.zip</span>
                    </div>
                </div>
            </div>
            <div class="pt-4">
                @if($lppd_link)
                    <a class="inline-flex items-center gap-3 bg-primary text-white px-8 py-4 rounded-xl font-bold hover:shadow-lg hover:shadow-primary/30 transition-all" href="{{ $lppd_link }}" target="_blank">
                        <span class="material-symbols-outlined">cloud_download</span>
                        Akses Link Upload
                    </a>
                @else
                    <p class="text-slate-400 italic">Link aplikasi LPPD belum tersedia.</p>
                @endif
            </div>
        </div>
        <div class="w-full lg:w-2/5 bg-slate-50 p-8 md:p-12 flex flex-col justify-center border-l border-slate-100">
            <div class="grid grid-cols-2 gap-4">
                <div class="bg-white p-6 rounded-2xl shadow-sm border border-slate-100 text-center">
                    <div class="text-primary text-3xl font-black mb-1">{{ date('Y') }}</div>
                    <div class="text-xs font-bold text-slate-500 uppercase">Tahun Laporan</div>
                </div>
                <div class="bg-white p-6 rounded-2xl shadow-sm border border-slate-100 text-center">
                    <div class="text-primary text-3xl font-black mb-1">{{ $kerja_samas->count() }}</div>
                    <div class="text-xs font-bold text-slate-500 uppercase">Kerja Sama</div>
                </div>
                <div class="bg-white p-6 rounded-2xl shadow-sm border border-slate-100 text-center">
                    <div class="text-primary text-3xl font-black mb-1">45</div>
                    <div class="text-xs font-bold text-slate-500 uppercase">OPD Terlibat</div>
                </div>
                <div class="bg-white p-6 rounded-2xl shadow-sm border border-slate-100 text-center">
                    <div class="text-emerald-500 text-3xl font-black mb-1">Aktif</div>
                    <div class="text-xs font-bold text-slate-500 uppercase">Status</div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Modul Kerja Sama Section -->
<section class="max-w-7xl mx-auto px-6 md:px-20 py-20 border-t border-slate-200">
    <div class="flex flex-col md:flex-row justify-between items-end mb-12 gap-6">
        <div class="max-w-2xl">
            <h2 class="text-slate-900 text-3xl md:text-4xl font-bold mb-4">Modul Kerja Sama</h2>
            <p class="text-slate-600 text-lg">Monitoring perkembangan program kemitraan strategis Pemerintah Kabupaten Tojo Una-Una.</p>
        </div>
    </div>
    <div class="grid grid-cols-1 gap-6">
        <div class="bg-white p-6 md:p-8 rounded-2xl border border-slate-200">
            <div class="flex items-center justify-between mb-8">
                <h3 class="text-xl font-bold text-slate-900 flex items-center gap-2">
                    <span class="material-symbols-outlined text-primary">timeline</span>
                    Timeline Status Kerja Sama
                </h3>
            </div>
            <div class="space-y-6">
                @forelse($kerja_samas as $index => $kerja)
                    <div class="relative flex gap-6 pb-6 border-b border-slate-100 last:border-0 last:pb-0">
                        <div class="hidden sm:flex flex-col items-center">
                            @php
                                $statusColor = match($kerja->status) {
                                    'Selesai' => 'bg-emerald-100 text-emerald-600',
                                    'Ditandatangani' => 'bg-primary/10 text-primary',
                                    default => 'bg-slate-100 text-slate-500',
                                };
                                $badgeColor = match($kerja->status) {
                                    'Selesai' => 'bg-emerald-100 text-emerald-600',
                                    'Ditandatangani' => 'bg-primary/10 text-primary',
                                    default => 'bg-slate-100 text-slate-500',
                                };
                            @endphp
                            <div class="size-10 rounded-full {{ $statusColor }} flex items-center justify-center font-bold text-sm">{{ str_pad($index + 1, 2, '0', STR_PAD_LEFT) }}</div>
                            @if(!$loop->last)
                                <div class="w-px h-full bg-slate-200 mt-2"></div>
                            @endif
                        </div>
                        <div class="flex-1">
                            <div class="flex flex-col md:flex-row md:items-center justify-between gap-4 mb-3">
                                <h4 class="text-lg font-bold text-slate-900">{{ $kerja->title }}</h4>
                                <span class="inline-flex items-center px-3 py-1 {{ $badgeColor }} text-[10px] font-black uppercase rounded-full">{{ $kerja->status }}</span>
                            </div>
                            <div class="flex items-center gap-4 text-sm text-slate-500 mb-3">
                                <span class="flex items-center gap-1">
                                    <span class="material-symbols-outlined text-sm">handshake</span>
                                    {{ $kerja->partner }}
                                </span>
                                <span class="flex items-center gap-1">
                                    <span class="material-symbols-outlined text-sm">calendar_today</span>
                                    {{ $kerja->tanggal ? \Carbon\Carbon::parse($kerja->tanggal)->translatedFormat('d M Y') : '-' }}
                                </span>
                            </div>
                            <p class="text-slate-600 text-sm mb-4">{{ $kerja->description }}</p>
                            @if($kerja->document_url)
                                <a href="{{ $kerja->document_url }}" target="_blank" class="text-sm inline-flex items-center text-primary hover:underline font-bold gap-1">
                                    <span class="material-symbols-outlined text-sm">link</span>
                                    Lihat Dokumen
                                </a>
                            @endif
                        </div>
                    </div>
                @empty
                    <div class="text-center py-12">
                        <span class="material-symbols-outlined text-4xl text-slate-300">handshake</span>
                        <p class="text-slate-500 mt-4">Belum ada rekam jejak kerja sama yang ditambahkan.</p>
                    </div>
                @endforelse
            </div>
        </div>
    </div>
</section>
@endsection
