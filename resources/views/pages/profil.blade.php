@extends('layouts.public')

@section('content')
<!-- Hero Banner -->
<div class="relative h-64 md:h-80 w-full overflow-hidden bg-slate-900">
    <div class="absolute inset-0 opacity-60 bg-cover bg-center" style="background-image: url('{{ asset('assets/profil-1.jpg') }}');"></div>
    <div class="absolute inset-0 bg-gradient-to-t from-slate-900 to-transparent"></div>
    <div class="relative h-full max-w-7xl mx-auto px-6 md:px-10 flex flex-col justify-end pb-12">
        <nav class="flex mb-4 text-sm text-slate-300 gap-2">
            <a class="hover:text-white" href="{{ route('public.beranda') }}">Beranda</a>
            <span>/</span>
            <span class="text-white font-semibold">Profil</span>
        </nav>
        <h1 class="text-4xl md:text-5xl font-black text-white leading-tight">Profil Bagian Tata Pemerintahan</h1>
    </div>
</div>

<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16 space-y-16">

    <!-- Sejarah Pembentukan Section -->
    <section class="bg-white p-8 md:p-12 rounded-2xl shadow-sm border border-slate-100" id="sejarah">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
            <div>
                <div class="flex items-center gap-3 mb-6">
                    <span class="material-symbols-outlined text-primary text-3xl">history_edu</span>
                    <h2 class="text-3xl font-black text-slate-900">Sejarah Pembentukan</h2>
                </div>
                <div class="space-y-6 text-slate-600 leading-relaxed">
                    <p class="text-lg">
                        Kabupaten Tojo Una-Una terbentuk secara resmi pada tahun 2003 berdasarkan <span class="font-bold text-primary text-xl">Undang-Undang Nomor 32 Tahun 2003</span>. Pemekaran ini merupakan langkah strategis dalam mempercepat pembangunan dan mendekatkan pelayanan publik di wilayah pesisir Teluk Tomini.
                    </p>
                    <p>
                        Sebagai entitas pemerintahan yang berkembang pesat, Bagian Tata Pemerintahan memegang peranan krusial dalam mengoordinasikan administrasi wilayah dan otonomi daerah. Sejak awal pembentukannya, bagian ini telah bertransformasi dari unit koordinasi sederhana menjadi pilar utama dalam perumusan kebijakan otonomi daerah di bumi Sivia Patuju.
                    </p>
                    <p>
                        Visi kami adalah menciptakan tata kelola pemerintahan yang transparan, akuntabel, dan berorientasi pada kemajuan wilayah melalui sinkronisasi administrasi yang presisi antar tingkatan pemerintahan.
                    </p>
                </div>
            </div>
            <div class="relative">
                <div class="absolute -inset-4 bg-primary/5 blur-2xl rounded-full"></div>
                <div class="aspect-[4/3] rounded-2xl overflow-hidden shadow-xl relative z-10">
                    <img class="w-full h-full object-cover" alt="Arsip sejarah Kabupaten Tojo Una-Una" src="{{ asset('assets/profil-2.jpg') }}"/>
                </div>
            </div>
        </div>
    </section>

    <!-- Statistik Kepegawaian Section -->
    <section class="py-12 bg-white rounded-2xl border border-slate-100 shadow-sm overflow-hidden">
        <div class="px-8 md:px-12 mb-10">
            <h2 class="text-3xl font-black text-slate-900 flex items-center gap-3">
                <span class="material-symbols-outlined text-primary">analytics</span>
                Statistik Kepegawaian
            </h2>
        </div>
        <div class="grid grid-cols-2 lg:grid-cols-4 gap-px bg-slate-100 italic">
            <div class="bg-white p-8 text-center group hover:bg-slate-50 transition-colors">
                <div class="text-4xl font-black text-primary mb-2">{{ $total_pegawai }}</div>
                <div class="text-xs font-bold text-slate-500 uppercase tracking-widest">Total Pegawai</div>
            </div>
            <div class="bg-white p-8 text-center group hover:bg-slate-50 transition-colors">
                <div class="text-4xl font-black text-primary mb-2">{{ $jumlah_divisi }}</div>
                <div class="text-xs font-bold text-slate-500 uppercase tracking-widest">Jumlah Divisi</div>
            </div>
            <div class="bg-white p-8 text-center group hover:bg-slate-50 transition-colors">
                <div class="text-4xl font-black text-primary mb-2">{{ $jabatan_kosong }}</div>
                <div class="text-xs font-bold text-slate-500 uppercase tracking-widest">Jabatan Kosong</div>
            </div>
            <div class="bg-white p-8 text-center group hover:bg-slate-50 transition-colors">
                <div class="text-4xl font-black text-primary mb-2">{{ $pendidikan_s1 }}</div>
                <div class="text-xs font-bold text-slate-500 uppercase tracking-widest">Pendidikan S1+</div>
            </div>
        </div>
    </section>

    <!-- Struktur Organisasi Section -->
    <section class="bg-slate-50 p-8 md:p-12 rounded-2xl border border-slate-100" id="struktur">
        <div class="text-center mb-12">
            <div class="flex justify-center items-center gap-3 mb-4">
                <span class="material-symbols-outlined text-primary text-4xl">account_tree</span>
                <h2 class="text-3xl font-black text-slate-900">Struktur Organisasi</h2>
            </div>
            <p class="text-slate-500 max-w-2xl mx-auto">Susunan kepemimpinan dan pembagian tugas dalam Bagian Tata Pemerintahan Kabupaten Tojo Una-Una.</p>
        </div>

        @if($struktur_organisasi)
        <div class="flex justify-center mb-12">
            <div class="bg-white p-4 rounded-2xl shadow-lg border border-slate-100 max-w-4xl w-full">
                <img src="{{ asset($struktur_organisasi) }}" alt="Struktur Organisasi Bagian Tata Pemerintahan" class="max-w-full h-auto rounded-lg cursor-zoom-in hover:scale-[1.01] transition-transform duration-300" onclick="openModal('{{ asset($struktur_organisasi) }}')">
            </div>
        </div>
        @endif
    </section>

    <!-- Daftar Pejabat Section -->
    <section class="py-12" id="pejabat">
        <div class="mb-12">
            <h2 class="text-3xl font-black text-slate-900 flex items-center gap-3">
                <span class="material-symbols-outlined text-primary">groups</span>
                Profil Pejabat
            </h2>
            <p class="text-slate-500 mt-2">Daftar pimpinan dan penanggung jawab di lingkungan Bagian Tata Pemerintahan.</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @forelse($pejabats as $pejabat)
                <div class="group bg-white rounded-2xl border border-slate-100 shadow-sm hover:shadow-xl transition-all overflow-hidden flex flex-col">
                    <div class="aspect-[3/4] overflow-hidden bg-slate-100 relative">
                        @if($pejabat->foto)
                            <img src="{{ asset($pejabat->foto) }}" alt="{{ $pejabat->name }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                        @else
                            <div class="w-full h-full flex items-center justify-center bg-slate-200">
                                <span class="material-symbols-outlined text-6xl text-slate-400">person</span>
                            </div>
                        @endif
                        <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity flex flex-col justify-end p-6">
                            @if($pejabat->whatsapp)
                                <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $pejabat->whatsapp) }}" target="_blank" class="w-fit bg-emerald-500 text-white p-2 rounded-full hover:bg-emerald-600 transition-colors shadow-lg">
                                    <span class="material-symbols-outlined">chat</span>
                                </a>
                            @endif
                        </div>
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-black text-slate-900 mb-1">{{ $pejabat->name }}</h3>
                        <p class="text-primary font-bold text-sm mb-4">{{ $pejabat->jabatan }}</p>
                        
                        <div class="space-y-2 pt-4 border-t border-slate-50">
                            @if($pejabat->nip)
                                <div class="flex items-center gap-2 text-xs text-slate-500">
                                    <span class="font-bold">NIP:</span> {{ $pejabat->nip }}
                                </div>
                            @endif
                            @if($pejabat->golongan)
                                <div class="flex items-center gap-2 text-xs text-slate-500">
                                    <span class="font-bold">GOL:</span> {{ $pejabat->golongan }}
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-span-full py-12 text-center text-slate-400 italic">
                    Data pejabat belum ditambahkan.
                </div>
            @endforelse
        </div>
    </section>

    <!-- Info Cards Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
        <!-- Informasi Terkait -->
        <div class="bg-white p-8 rounded-2xl shadow-sm border border-slate-100">
            <h3 class="text-xl font-bold text-slate-900 mb-6 flex items-center gap-2">
                <span class="material-symbols-outlined text-primary">info</span> Informasi Terkait
            </h3>
            <ul class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <li>
                    <a class="flex items-center gap-3 p-4 rounded-xl bg-slate-50 hover:bg-primary/5 hover:border-primary/20 border border-transparent transition-all group" href="{{ route('public.beranda') }}">
                        <span class="material-symbols-outlined text-primary">description</span>
                        <span class="text-sm font-bold text-slate-700 group-hover:text-primary">Visi & Misi Utama</span>
                    </a>
                </li>
                <li>
                    <a class="flex items-center gap-3 p-4 rounded-xl bg-slate-50 hover:bg-primary/5 hover:border-primary/20 border border-transparent transition-all group" href="{{ route('public.otda') }}">
                        <span class="material-symbols-outlined text-primary">groups</span>
                        <span class="text-sm font-bold text-slate-700 group-hover:text-primary">Kerja Sama Daerah</span>
                    </a>
                </li>
                <li>
                    <a class="flex items-center gap-3 p-4 rounded-xl bg-slate-50 hover:bg-primary/5 hover:border-primary/20 border border-transparent transition-all group" href="{{ route('public.pemerintahan') }}">
                        <span class="material-symbols-outlined text-primary">download</span>
                        <span class="text-sm font-bold text-slate-700 group-hover:text-primary">Laporan EKK</span>
                    </a>
                </li>
                <li>
                    <a class="flex items-center gap-3 p-4 rounded-xl bg-slate-50 hover:bg-primary/5 hover:border-primary/20 border border-transparent transition-all group" href="{{ route('public.dokumentasi') }}">
                        <span class="material-symbols-outlined text-primary">feed</span>
                        <span class="text-sm font-bold text-slate-700 group-hover:text-primary">Dokumentasi Kegiatan</span>
                    </a>
                </li>
            </ul>
        </div>

        <!-- Lokasi Kantor -->
        <div class="bg-white p-8 rounded-2xl shadow-sm border border-slate-100">
            <h3 class="text-xl font-bold text-slate-900 mb-6 flex items-center gap-2">
                <span class="material-symbols-outlined text-primary">location_on</span> Lokasi Kantor
            </h3>
            <div class="flex flex-col sm:flex-row gap-6 items-center">
                <div class="w-full sm:w-1/3 aspect-square rounded-xl overflow-hidden shadow-inner bg-slate-100">
                    <img class="w-full h-full object-cover" alt="Peta lokasi Tojo Una-Una" src="https://lh3.googleusercontent.com/aida-public/AB6AXuCIZca8N9kxbT1g3CgsVbJlvQmJ4MgB1ipYkihDOILR_ZUGhUYxfBVtbfTs2nFWnOEBKkXVfKS-RDPowd5GACFIwO9b0rcZooHydSaKQrtAnZHbz8WRH983aRxGaeyG7B3I8aH5utV3rOZwO4TuQhJJGGAJHDplcohGmymXp8QEHYgmEg0wZUvtz5R94kghWCKWEpkNxqEWekjV-B-tREuWR3vE9P9kfXdUNT-s1roLHVmGJ7JuHS_6nHrYNCQ8ZlRZxn1sp-dxlXM"/>
                </div>
                <div class="flex-1 text-center sm:text-left">
                    <p class="text-slate-600 leading-relaxed mb-4">
                        Kompleks Perkantoran Sekretariat Daerah,<br/>Jl. Merdeka No. 1, Ampana,<br/>Kabupaten Tojo Una-Una.
                    </p>
                    <a href="https://maps.google.com/?q=Ampana+Tojo+Una-Una" target="_blank" class="text-primary font-bold text-sm flex items-center gap-2 justify-center sm:justify-start hover:underline">
                        Buka di Google Maps <span class="material-symbols-outlined text-sm">open_in_new</span>
                    </a>
                </div>
            </div>
        </div>
    </div>

</div>

<!-- Modal for Image Preview -->
<div id="imageModal" class="fixed inset-0 z-50 hidden bg-gray-900 bg-opacity-90 flex items-center justify-center transition-opacity duration-300 opacity-0 p-4">
    <button onclick="closeModal()" class="absolute top-6 right-6 text-white hover:text-gray-300 focus:outline-none">
        <span class="material-symbols-outlined text-4xl">close</span>
    </button>
    <img id="modalImage" src="" alt="Struktur Organisasi Full" class="max-w-full max-h-full rounded shadow-2xl">
</div>

<script>
    function openModal(src) {
        document.getElementById('modalImage').src = src;
        const modal = document.getElementById('imageModal');
        modal.classList.remove('hidden');
        setTimeout(() => {
            modal.classList.remove('opacity-0');
        }, 10);
        document.body.style.overflow = 'hidden';
    }

    function closeModal() {
        const modal = document.getElementById('imageModal');
        modal.classList.add('opacity-0');
        setTimeout(() => {
            modal.classList.add('hidden');
        }, 300);
        document.body.style.overflow = 'auto';
    }

    document.addEventListener('keydown', function(event) {
        if (event.key === "Escape") {
            closeModal();
        }
    });
</script>
@endsection
