@extends('layouts.public')

@section('title', 'Administrasi Kewilayahan - Tata Pemerintahan')

@section('content')
<main class="pt-20">
    {{-- Hero Section --}}
    <x-sub-bagian-hero 
        badge="Administrasi Wilayah"
        title="Layanan Kewilayahan"
        subtitle="Fokus pada penyelenggaraan administrasi kewilayahan, penegasan batas daerah, dan pengelolaan data spasial rupa bumi untuk pemetaan yang akurat."
        image="https://images.unsplash.com/photo-1526778545894-de814b1d756e?auto=format&fit=crop&q=80&w=2040"
        :links="[
            ['url' => $rupabumi_link ?? '#', 'label' => 'Akses Sinar BIG'],
            ['url' => $lkpj_link ?? '#', 'label' => 'Data Dukung LKPJ', 'secondary' => true]
        ]"
    />

<!-- Peta Wilayah Interaktif Section -->
<section class="px-4 lg:px-40 py-20 bg-white">
    <div class="max-w-7xl mx-auto">
        <div class="flex flex-col md:flex-row md:items-end justify-between gap-6 mb-10">
            <div class="space-y-2">
                <h2 class="text-3xl font-bold text-slate-900">Peta Wilayah Interaktif</h2>
                <p class="text-slate-500">Visualisasi batas administrasi dan infrastruktur kewilayahan Kabupaten Tojo Una-Una.</p>
            </div>
        </div>
        <div class="relative group rounded-2xl overflow-hidden border border-slate-200 shadow-inner bg-slate-100" style="min-height: 500px;">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d510578.99049371126!2d121.20903035822357!3d-1.230419501085668!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2d88a780d3568237%3A0x3030bfbcaf77140!2sTojo%20Una-Una%20Regency%2C%20Central%20Sulawesi!5e0!3m2!1sen!2sid!4v1773290125102!5m2!1sen!2sid"
                width="100%"
                height="100%"
                style="border:0; position: absolute; top:0; left:0; width:100%; height:100%;"
                allowfullscreen=""
                loading="lazy"
                referrerpolicy="no-referrer-when-downgrade">
            </iframe>
        </div>
    </div>
</section>

<!-- Modul Cards Section -->
<section class="px-4 lg:px-40 py-20">
    <div class="max-w-7xl mx-auto grid md:grid-cols-2 gap-8">
        <!-- Modul Rupa Bumi -->
        <div class="flex flex-col bg-white rounded-2xl p-8 border border-slate-200 shadow-sm hover:shadow-md transition-all border-l-4 border-l-amber-500">
            <div class="size-14 bg-amber-500/10 rounded-xl flex items-center justify-center text-amber-500 mb-6">
                <span class="material-symbols-outlined text-3xl">public</span>
            </div>
            <h3 class="text-2xl font-bold text-slate-900 mb-4">Modul Nama Rupa Bumi</h3>
            <p class="text-slate-600 mb-8 leading-relaxed">
                Akses Portal Sinar BIG (Sistem Informasi Nama Rupabumi) untuk pengolahan dan verifikasi data nama rupabumi di Kabupaten Tojo Una-Una yang terintegrasi secara nasional.
            </p>
            <div class="mt-auto">
                @if($rupabumi_link && $rupabumi_link !== '#')
                    <a class="inline-flex items-center justify-center gap-2 w-full md:w-auto bg-slate-900 text-white font-bold px-6 py-4 rounded-xl hover:opacity-90 transition-all" href="{{ $rupabumi_link }}" target="_blank">
                        <span class="material-symbols-outlined text-sm">open_in_new</span> Akses Portal Sinar BIG
                    </a>
                @else
                    <a class="inline-flex items-center justify-center gap-2 w-full md:w-auto bg-slate-900 text-white font-bold px-6 py-4 rounded-xl hover:opacity-90 transition-all" href="https://tanahair.indonesia.go.id" target="_blank">
                        <span class="material-symbols-outlined text-sm">open_in_new</span> Akses Portal Sinar BIG
                    </a>
                @endif
            </div>
        </div>

        <!-- Modul LKPJ -->
        <div class="flex flex-col bg-white rounded-2xl p-8 border border-slate-200 shadow-sm hover:shadow-md transition-all border-l-4 border-l-primary">
            <div class="size-14 bg-primary/10 rounded-xl flex items-center justify-center text-primary mb-6">
                <span class="material-symbols-outlined text-3xl">description</span>
            </div>
            <h3 class="text-2xl font-bold text-slate-900 mb-4">LKPJ Kabupaten</h3>
            <p class="text-slate-600 mb-8 leading-relaxed">
                Laporan Keterangan Pertanggungjawaban (LKPJ) Bupati Tojo Una-Una. Unduh dokumen data dukung dan laporan progres tahunan penyelenggaraan pemerintahan daerah.
            </p>
            <div class="mt-auto">
                @if($lkpj_link)
                    <a class="inline-flex items-center justify-center gap-2 w-full md:w-auto bg-primary text-white font-bold px-6 py-4 rounded-xl hover:bg-primary/90 transition-all" href="{{ $lkpj_link }}" target="_blank">
                        <span class="material-symbols-outlined text-sm">cloud_download</span> Akses Data Dukung LKPJ
                    </a>
                @else
                    <p class="text-slate-400 italic">Link LKPJ belum tersedia.</p>
                @endif
            </div>
        </div>
    </div>
</section>
@endsection
