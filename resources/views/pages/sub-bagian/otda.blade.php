@extends('layouts.public')

@section('title', 'Otonomi Daerah - Tata Pemerintahan')

@section('content')
<main class="pt-20">
    {{-- Hero Section --}}
    <x-sub-bagian-hero 
        badge="Sub Bagian"
        title="Otonomi Daerah"
        subtitle="Mendorong kemandirian daerah melalui koordinasi kebijakan yang tepat, evaluasi kinerja yang transparan, dan penguatan tata kelola pemerintahan yang responsif."
        image="https://images.unsplash.com/photo-1450101499163-c8848c66ca85?auto=format&fit=crop&q=80&w=2070"
        :links="[
            ['url' => $lppd_link ?? '#', 'label' => 'Akses LPPD'],
            ['url' => '#layanan', 'label' => 'Lihat Layanan', 'secondary' => true]
        ]"
    />

    {{-- Fungsi Utama Section --}}
    <x-info-grid 
        title="Fungsi Utama"
        :items="$features"
    />

    {{-- Documents and Kerjasama --}}
    <section id="layanan" class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20 bg-slate-50">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-16">
            {{-- Document List Component --}}
            <x-document-list 
                title="Dokumen Publik"
                description="Akses dokumen terbaru terkait laporan penyelenggaraan pemerintahan dan panduan administrasi daerah."
                :documents="$documents"
                cta-label="Lihat Semua Dokumen"
                cta-link="#"
            />

            {{-- Kerja Sama Section --}}
            <div class="space-y-8">
                <div class="border-l-4 border-indigo-600 pl-6">
                    <h2 class="text-3xl font-bold text-slate-900 tracking-tight">Kerja Sama Daerah</h2>
                    <p class="mt-4 text-slate-600 text-lg leading-relaxed">Daftar kemitraan strategis yang dilakukan oleh pemerintah kabupaten dengan berbagai pihak ketiga.</p>
                </div>

                <div class="bg-white rounded-3xl p-2 shadow-xl shadow-slate-200/50 border border-slate-100 overflow-hidden">
                    <table class="min-w-full divide-y divide-slate-100">
                        <thead class="bg-slate-50/50">
                            <tr>
                                <th class="px-6 py-4 text-left text-xs font-semibold text-slate-500 uppercase tracking-wider">Mitra / Objek</th>
                                <th class="px-6 py-4 text-left text-xs font-semibold text-slate-500 uppercase tracking-wider">Tanggal</th>
                                <th class="px-6 py-4 text-right text-xs font-semibold text-slate-500 uppercase tracking-wider">Status</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-50">
                            @forelse($kerja_samas as $item)
                            <tr class="hover:bg-slate-50/50 transition-colors group">
                                <td class="px-6 py-6 transition-all">
                                    <div class="font-bold text-slate-900 group-hover:text-indigo-600 transition-colors">{{ $item->nama_mitra }}</div>
                                    <div class="text-sm text-slate-500 mt-1 line-clamp-1">{{ $item->objek_kerjasama }}</div>
                                </td>
                                <td class="px-6 py-6 text-sm text-slate-600 font-medium">
                                    {{ \Carbon\Carbon::parse($item->tanggal)->translatedFormat('d M Y') }}
                                </td>
                                <td class="px-6 py-6 text-right">
                                    <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-bold bg-green-50 text-green-700 ring-1 ring-inset ring-green-600/20">Aktif</span>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="3" class="px-6 py-12 text-center">
                                    <div class="flex flex-col items-center">
                                        <div class="w-16 h-16 bg-slate-50 rounded-2xl flex items-center justify-center mb-4">
                                            <span class="material-symbols-rounded text-slate-300 text-3xl">inbox</span>
                                        </div>
                                        <p class="text-slate-500 font-medium">Belum ada data materi kerjasama.</p>
                                    </div>
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
</main>
@endsection
