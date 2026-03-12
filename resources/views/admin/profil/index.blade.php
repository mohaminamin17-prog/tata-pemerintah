<x-admin-layout>
    <x-slot name="title">Profil & Struktur</x-slot>
    <x-slot name="breadcrumb">Profil & Struktur</x-slot>

    <!-- Header Section -->
    <div class="flex flex-col md:flex-row md:items-center justify-between gap-4 mb-8">
        <div>
            <h2 class="text-3xl font-black text-slate-900 tracking-tight">Profil & Struktur Organisasi</h2>
            <p class="text-slate-500 mt-1 flex items-center gap-2">
                <span class="size-1.5 rounded-full bg-primary animate-pulse"></span>
                Kelola data kepegawaian dan struktur hierarki organisasi resmi.
            </p>
        </div>
        <div class="flex items-center gap-3">
            <div class="bg-white border border-slate-200 rounded-xl px-4 py-2 shadow-sm flex items-center gap-3">
                <div class="size-8 rounded-lg bg-slate-100 flex items-center justify-center text-slate-400">
                    <span class="material-symbols-outlined text-lg">calendar_today</span>
                </div>
                <div>
                    <p class="text-[10px] font-bold text-slate-400 uppercase tracking-tight">Terakhir Diperbarui</p>
                    <p class="text-xs font-bold text-slate-900">{{ now()->format('d M Y') }}</p>
                </div>
            </div>
        </div>
    </div>

    @if(session('success'))
        <div class="bg-emerald-50 border border-emerald-100 text-emerald-700 px-5 py-4 rounded-2xl relative mb-8 flex items-center gap-3 shadow-sm animate-in fade-in slide-in-from-top-4 duration-500" role="alert">
            <div class="size-10 rounded-full bg-emerald-100 flex items-center justify-center text-emerald-600">
                <span class="material-symbols-outlined">check_circle</span>
            </div>
            <div>
                <p class="font-bold text-sm">Berhasil!</p>
                <p class="text-xs opacity-90">{{ session('success') }}</p>
            </div>
        </div>
    @endif
    
    @if ($errors->any())
        <div class="bg-rose-50 border border-rose-100 text-rose-700 px-6 py-5 rounded-2xl relative mb-8 shadow-sm">
            <div class="flex items-center gap-3 mb-3 text-rose-600">
                <span class="material-symbols-outlined">report</span>
                <span class="font-bold">Beberapa input memerlukan perhatian:</span>
            </div>
            <ul class="list-disc list-inside text-sm space-y-1 opacity-90 ml-2">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- Quick Stats Form -->
    <form action="{{ route('admin.profil.stats') }}" method="POST" class="mb-10">
        @csrf
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 relative group">
            <div class="absolute -top-12 right-0 opacity-0 group-hover:opacity-100 transition-all duration-300 transform translate-y-2 group-hover:translate-y-0">
                <button type="submit" class="bg-primary text-white px-5 py-2 rounded-xl text-xs font-black shadow-lg shadow-primary/20 flex items-center gap-2 hover:bg-slate-900 transition-colors">
                    <span class="material-symbols-outlined text-sm">sync</span>
                    SIMPAN PERUBAHAN STATISTIK
                </button>
            </div>

            <!-- Total Pegawai -->
            <div class="bg-white p-6 rounded-3xl border border-slate-200 shadow-sm hover:shadow-xl hover:shadow-slate-200/50 transition-all duration-300 group/card">
                <div class="flex justify-between items-start mb-4">
                    <div class="p-3 bg-blue-50 rounded-2xl text-blue-600 group-hover/card:bg-blue-600 group-hover/card:text-white transition-colors duration-300">
                        <span class="material-symbols-outlined">groups</span>
                    </div>
                    <span class="text-[10px] font-black text-slate-400 uppercase tracking-widest">Kapasitas</span>
                </div>
                <div class="space-y-1">
                    <p class="text-slate-500 text-xs font-bold">Total Pegawai</p>
                    <div class="flex items-baseline gap-2">
                        <input name="total_pegawai" class="w-20 bg-transparent border-b-2 border-slate-100 p-0 text-3xl font-black focus:ring-0 focus:border-blue-600 text-slate-900 selection:bg-blue-100" type="number" value="{{ $total_pegawai }}"/>
                        <span class="text-slate-400 text-sm font-bold">Personel</span>
                    </div>
                </div>
            </div>

            <!-- Jumlah Divisi -->
            <div class="bg-white p-6 rounded-3xl border border-slate-200 shadow-sm hover:shadow-xl hover:shadow-slate-200/50 transition-all duration-300 group/card">
                <div class="flex justify-between items-start mb-4">
                    <div class="p-3 bg-indigo-50 rounded-2xl text-indigo-600 group-hover/card:bg-indigo-600 group-hover/card:text-white transition-colors duration-300">
                        <span class="material-symbols-outlined">account_tree</span>
                    </div>
                    <span class="text-[10px] font-black text-slate-400 uppercase tracking-widest">Struktur</span>
                </div>
                <div class="space-y-1">
                    <p class="text-slate-500 text-xs font-bold">Jumlah Divisi</p>
                    <div class="flex items-baseline gap-2">
                        <input name="jumlah_divisi" class="w-20 bg-transparent border-b-2 border-slate-100 p-0 text-3xl font-black focus:ring-0 focus:border-indigo-600 text-slate-900 selection:bg-indigo-100" type="number" value="{{ $jumlah_divisi }}"/>
                        <span class="text-slate-400 text-sm font-bold">Unit</span>
                    </div>
                </div>
            </div>

            <!-- Jabatan Kosong -->
            <div class="bg-white p-6 rounded-3xl border border-slate-200 shadow-sm hover:shadow-xl hover:shadow-slate-200/50 transition-all duration-300 group/card">
                <div class="flex justify-between items-start mb-4">
                    <div class="p-3 bg-amber-50 rounded-2xl text-amber-600 group-hover/card:bg-amber-600 group-hover/card:text-white transition-colors duration-300">
                        <span class="material-symbols-outlined">person_search</span>
                    </div>
                    <span class="text-[10px] font-black text-slate-400 uppercase tracking-widest">Kebutuhan</span>
                </div>
                <div class="space-y-1">
                    <p class="text-slate-500 text-xs font-bold">Jabatan Kosong</p>
                    <div class="flex items-baseline gap-2">
                        <input name="jabatan_kosong" class="w-20 bg-transparent border-b-2 border-slate-100 p-0 text-3xl font-black focus:ring-0 focus:border-amber-600 text-slate-900 selection:bg-amber-100" type="number" value="{{ $jabatan_kosong }}"/>
                        <span class="text-slate-400 text-sm font-bold">Posisi</span>
                    </div>
                </div>
            </div>

            <!-- Pendidikan S1+ -->
            <div class="bg-white p-6 rounded-3xl border border-slate-200 shadow-sm hover:shadow-xl hover:shadow-slate-200/50 transition-all duration-300 group/card">
                <div class="flex justify-between items-start mb-4">
                    <div class="p-3 bg-emerald-50 rounded-2xl text-emerald-600 group-hover/card:bg-emerald-600 group-hover/card:text-white transition-colors duration-300">
                        <span class="material-symbols-outlined">school</span>
                    </div>
                    <span class="text-[10px] font-black text-slate-400 uppercase tracking-widest">Kualitas</span>
                </div>
                <div class="space-y-1">
                    <p class="text-slate-500 text-xs font-bold">Pendidikan S1+</p>
                    <div class="flex items-baseline gap-2">
                        <input name="pendidikan_s1" class="w-full bg-transparent border-b-2 border-slate-100 p-0 text-xl font-black focus:ring-0 focus:border-emerald-600 text-slate-900 selection:bg-emerald-100" type="text" value="{{ $pendidikan_s1 }}"/>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <div class="grid grid-cols-1 xl:grid-cols-12 gap-10">
        <!-- Sidebar Content: Struktur Organisasi -->
        <aside class="xl:col-span-4 space-y-8">
            <section class="bg-white p-8 rounded-[2rem] border border-slate-200 shadow-sm relative overflow-hidden group">
                <div class="absolute top-0 right-0 p-8 text-slate-50 opacity-10 pointer-events-none group-hover:scale-110 transition-transform duration-700">
                    <span class="material-symbols-outlined text-9xl">account_tree</span>
                </div>

                <div class="flex items-center justify-between mb-8">
                    <div>
                        <h3 class="text-xl font-black text-slate-900">Struktur Organisasi</h3>
                        <p class="text-xs text-slate-400 font-bold uppercase tracking-widest mt-1">Diagram Hierarki</p>
                    </div>
                </div>

                <form action="{{ route('admin.profil.struktur') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                    @csrf
                    <div class="aspect-[3/4] bg-slate-50 border-2 border-dashed border-slate-200 rounded-3xl overflow-hidden relative group/upload shadow-inner">
                        @if($struktur_org_img)
                            <img src="{{ upload_url($struktur_org_img) }}" class="w-full h-full object-contain p-4 group-hover/upload:scale-105 transition-transform duration-500">
                            <div class="absolute inset-0 bg-slate-900/40 opacity-0 group-hover/upload:opacity-100 transition-opacity flex items-center justify-center backdrop-blur-[2px]">
                                <span class="bg-white text-slate-900 px-4 py-2 rounded-xl text-xs font-black shadow-xl">Ganti Gambar</span>
                            </div>
                        @else
                            <div class="absolute inset-0 flex items-center justify-center flex-col text-slate-300 text-center px-8">
                                <div class="size-16 rounded-3xl bg-white shadow-sm flex items-center justify-center mb-4">
                                    <span class="material-symbols-outlined text-3xl">add_photo_alternate</span>
                                </div>
                                <p class="text-xs font-bold uppercase tracking-widest">Upload Struktur</p>
                                <p class="text-[10px] mt-1 font-medium italic">Format: PNG, JPG (Maks 2MB)</p>
                            </div>
                        @endif
                        <input type="file" name="struktur_org_img" required accept="image/*" class="absolute inset-0 opacity-0 cursor-pointer">
                    </div>

                    <button type="submit" class="w-full bg-primary text-white py-4 rounded-2xl font-black text-sm shadow-xl shadow-primary/20 hover:bg-slate-900 transition-all active:scale-[0.98] flex items-center justify-center gap-3">
                        <span class="material-symbols-outlined text-lg">cloud_upload</span>
                        GELAR STRUKTUR TERBARU
                    </button>
                </form>

                <div class="mt-8 pt-8 border-t border-slate-100 space-y-4">
                    <div class="flex items-center gap-4 p-4 rounded-2xl bg-slate-50/50 hover:bg-slate-50 transition-colors border border-transparent hover:border-slate-100">
                        <div class="size-10 rounded-xl bg-blue-100 text-blue-600 flex items-center justify-center shadow-inner">
                            <span class="material-symbols-outlined text-xl">info</span>
                        </div>
                        <div>
                            <p class="text-[10px] font-black text-slate-400 uppercase">Tips</p>
                            <p class="text-xs text-slate-600 font-medium">Gunakan background transparan (PNG) untuk hasil terbaik.</p>
                        </div>
                    </div>
                </div>
            </section>
        </aside>

        <!-- Main Content: Daftar Pejabat -->
        <div class="xl:col-span-8 space-y-10">
            <section class="bg-white p-8 rounded-[2rem] border border-slate-200 shadow-sm">
                <div class="flex items-center justify-between mb-8">
                    <div>
                        <h3 class="text-xl font-black text-slate-900">Pejabat Strategis</h3>
                        <p class="text-xs text-slate-400 font-bold uppercase tracking-widest mt-1">Daftar Pimpinan Utama</p>
                    </div>
                    <button onclick="document.getElementById('form-pejabat').classList.toggle('hidden')" class="bg-slate-900 text-white px-5 py-2.5 rounded-xl text-xs font-black shadow-lg hover:bg-primary transition-all flex items-center gap-2">
                        <span class="material-symbols-outlined text-sm">add</span>
                        TAMBAH PEJABAT
                    </button>
                </div>

                <!-- Add Form (Toggable) -->
                <form id="form-pejabat" action="{{ route('admin.profil.pejabat.store') }}" method="POST" enctype="multipart/form-data" class="hidden mb-12 p-8 bg-slate-50 rounded-3xl border border-slate-200 animate-in zoom-in-95 duration-300">
                    @csrf
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 pb-2">
                        <div class="space-y-6">
                            <div class="group/field">
                                <label class="block text-[10px] font-black text-slate-400 uppercase mb-2 tracking-widest group-focus-within/field:text-primary transition-colors">Nama Lengkap & Gelar</label>
                                <input name="name" required class="w-full text-sm py-4 px-5 rounded-2xl border-slate-200 focus:ring-4 focus:ring-primary/5 focus:border-primary transition-all shadow-sm" type="text" placeholder="Masukkan nama dan gelar lengkap..."/>
                            </div>
                            <div class="group/field">
                                <label class="block text-[10px] font-black text-slate-400 uppercase mb-2 tracking-widest group-focus-within/field:text-primary transition-colors">Foto Profile</label>
                                <div class="relative">
                                    <input name="foto" type="file" accept="image/*" class="w-full text-xs text-slate-500 file:mr-4 file:py-3.5 file:px-6 file:rounded-2xl file:border-0 file:text-xs file:font-black file:bg-primary/10 file:text-primary hover:file:bg-primary/20 file:transition-all cursor-pointer bg-white border border-slate-200 rounded-2xl pr-4">
                                </div>
                            </div>
                        </div>
                        
                        <div class="space-y-6">
                            <div class="group/field">
                                <label class="block text-[10px] font-black text-slate-400 uppercase mb-2 tracking-widest group-focus-within/field:text-primary transition-colors">Jabatan Definitif</label>
                                <input name="jabatan" required class="w-full text-sm py-4 px-5 rounded-2xl border-slate-200 focus:ring-4 focus:ring-primary/5 focus:border-primary transition-all shadow-sm" type="text" placeholder="Contoh: Kepala Bagian Tata Pemerintahan"/>
                            </div>
                            <div class="grid grid-cols-2 gap-4">
                                <div class="group/field">
                                    <label class="block text-[10px] font-black text-slate-400 uppercase mb-2 tracking-widest group-focus-within/field:text-primary transition-colors">Pangkat / Golongan</label>
                                    <input name="golongan" class="w-full text-sm py-4 px-5 rounded-2xl border-slate-200 focus:ring-4 focus:ring-primary/5 focus:border-primary transition-all shadow-sm" type="text" placeholder="IV/b (Pembina Tk.I)"/>
                                </div>
                                <div class="group/field">
                                    <label class="block text-[10px] font-black text-slate-400 uppercase mb-2 tracking-widest group-focus-within/field:text-primary transition-colors">NIP</label>
                                    <input name="nip" class="w-full text-sm py-4 px-5 rounded-2xl border-slate-200 focus:ring-4 focus:ring-primary/5 focus:border-primary transition-all shadow-sm" type="text" placeholder="19XXXXXXXX..."/>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="mt-8 pt-8 border-t border-slate-200 flex justify-end gap-3">
                        <button type="button" onclick="document.getElementById('form-pejabat').classList.add('hidden')" class="px-6 py-3 rounded-2xl text-xs font-black text-slate-500 hover:bg-slate-200 transition-colors">BATAL</button>
                        <button type="submit" class="bg-primary text-white px-8 py-4 rounded-2xl text-xs font-black shadow-xl shadow-primary/20 hover:bg-slate-900 transition-all flex items-center gap-2">
                            <span class="material-symbols-outlined text-sm">save</span> SIMPAN PROFIL PEJABAT
                        </button>
                    </div>
                </form>

                <!-- Pejabat List Table -->
                <div class="overflow-x-auto -mx-4 px-4 overflow-visible">
                    <table class="w-full text-left text-sm border-separate border-spacing-y-4">
                        <thead>
                            <tr class="text-slate-400">
                                <th class="px-6 font-black uppercase text-[10px] tracking-widest">Identitas Pejabat</th>
                                <th class="px-6 font-black uppercase text-[10px] tracking-widest">Jabatan & Pangkat</th>
                                <th class="px-6 font-black uppercase text-[10px] tracking-widest">Kontak Resmi</th>
                                <th class="px-6 text-right"></th>
                            </tr>
                        </thead>
                        <tbody class="text-slate-700">
                            @forelse($pejabats as $pejabat)
                            <tr class="group hover:scale-[1.01] transition-all duration-300">
                                <td class="py-6 px-6 bg-slate-50/50 rounded-l-3xl border-y border-l border-slate-100 group-hover:bg-blue-50/30 group-hover:border-blue-100 transition-colors">
                                    <div class="flex items-center gap-4">
                                        <div class="size-14 rounded-2xl bg-white shadow-sm overflow-hidden flex items-center justify-center border-2 border-white group-hover:border-blue-200 transition-colors">
                                            @if($pejabat->foto)
                                                <img src="{{ upload_url($pejabat->foto) }}" class="w-full h-full object-cover">
                                            @else
                                                <div class="size-full bg-slate-100 flex items-center justify-center text-slate-300 italic"><span class="material-symbols-outlined text-3xl">account_circle</span></div>
                                            @endif
                                        </div>
                                        <div>
                                            <p class="font-black text-slate-900 text-base tracking-tight leading-tight group-hover:text-primary transition-colors">{{ $pejabat->name }}</p>
                                            <p class="text-[10px] font-black text-slate-400 mt-0.5 tracking-wider uppercase bg-slate-100 px-2 py-0.5 rounded-full inline-block group-hover:bg-blue-100 group-hover:text-blue-600 transition-colors">{{ $pejabat->nip ?? 'NIP TIDAK TERCATAT' }}</p>
                                        </div>
                                    </div>
                                </td>
                                <td class="py-6 px-6 bg-slate-50/50 border-y border-slate-100 group-hover:bg-blue-50/30 group-hover:border-blue-100 transition-colors">
                                    <p class="font-bold text-slate-800">{{ $pejabat->jabatan }}</p>
                                    <p class="text-[11px] text-slate-500 font-medium italic mt-0.5">{{ $pejabat->golongan ?? 'Pangkat -' }}</p>
                                </td>
                                <td class="py-6 px-6 bg-slate-50/50 border-y border-slate-100 group-hover:bg-blue-50/30 group-hover:border-blue-100 transition-colors">
                                    @if($pejabat->whatsapp)
                                        <a href="https://wa.me/{{ $pejabat->whatsapp }}" target="_blank" class="flex items-center gap-2 group/wa">
                                            <div class="size-8 rounded-xl bg-emerald-100 text-emerald-600 flex items-center justify-center group-hover/wa:bg-emerald-600 group-hover/wa:text-white transition-colors">
                                                <span class="material-symbols-outlined text-base">call</span>
                                            </div>
                                            <span class="text-xs font-bold text-slate-600 group-hover/wa:text-emerald-600 transition-colors">{{ $pejabat->whatsapp }}</span>
                                        </a>
                                    @else
                                        <div class="flex items-center gap-2 opacity-30">
                                            <div class="size-8 rounded-xl bg-slate-200 text-slate-400 flex items-center justify-center"><span class="material-symbols-outlined text-base">call_off</span></div>
                                            <span class="text-xs font-black">---</span>
                                        </div>
                                    @endif
                                </td>
                                <td class="py-6 px-6 bg-slate-50/50 rounded-r-3xl border-y border-r border-slate-100 group-hover:bg-blue-50/30 group-hover:border-blue-100 transition-colors text-right">
                                    <div class="flex items-center justify-end gap-2 opacity-0 group-hover:opacity-100 transition-opacity">
                                        <form method="POST" action="{{ route('admin.profil.pejabat.destroy', $pejabat) }}" onsubmit="return confirm('Hapus profil pejabat ini?');">
                                            @csrf @method('DELETE')
                                            <button class="size-10 rounded-xl bg-white text-slate-400 hover:text-red-500 hover:bg-red-50 transition-all border border-slate-200 shadow-sm flex items-center justify-center active:scale-95" title="Hapus Data">
                                                <span class="material-symbols-outlined text-lg">delete</span>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="4" class="py-20 text-center">
                                    <div class="mb-4 inline-flex size-20 items-center justify-center rounded-[2rem] bg-slate-50 text-slate-300">
                                        <span class="material-symbols-outlined text-4xl">folder_off</span>
                                    </div>
                                    <p class="text-slate-400 text-base font-bold">Database Pejabat Masih Kosong</p>
                                    <p class="text-slate-300 text-sm mt-1">Gunakan tombol di atas untuk menambah data baru.</p>
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </section>

            <!-- Dokumentasi Section -->
            <section class="bg-white p-8 rounded-[2rem] border border-slate-200 shadow-sm">
                <div class="flex items-center justify-between mb-8">
                    <div>
                        <h3 class="text-xl font-black text-slate-900">Visual Ruang & Personel</h3>
                        <p class="text-xs text-slate-400 font-bold uppercase tracking-widest mt-1">Dokumentasi Lingkungan Kerja</p>
                    </div>
                    <button class="p-2 text-slate-400 hover:bg-slate-50 rounded-xl transition-colors"><span class="material-symbols-outlined">more_horiz</span></button>
                </div>
                <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-6">
                    @php
                        $placeholders = [
                            ['title' => 'Ruang Rapat Utama', 'icon' => 'meeting_room'],
                            ['title' => 'Briefing Harian', 'icon' => 'group_work'],
                            ['title' => 'Layanan Administrasi', 'icon' => 'support_agent'],
                            ['title' => 'Ruang Kerja Staf', 'icon' => 'desk'],
                        ];
                    @endphp
                    @foreach($placeholders as $item)
                        <div class="aspect-video rounded-3xl overflow-hidden bg-slate-50 relative group cursor-pointer border border-slate-100 hover:border-primary/20 transition-all shadow-inner">
                            <div class="w-full h-full flex flex-col items-center justify-center text-slate-300 group-hover:text-primary transition-colors">
                                <span class="material-symbols-outlined text-3xl mb-1">{{ $item['icon'] }}</span>
                                <span class="text-[9px] font-black uppercase tracking-tighter">{{ $item['title'] }}</span>
                            </div>
                            <div class="absolute inset-0 bg-slate-900/60 opacity-0 group-hover:opacity-100 transition-all flex flex-col items-center justify-center backdrop-blur-[2px]">
                                <span class="text-white text-[10px] font-black underline decoration-primary underline-offset-4 decoration-2">LIHAT DETAIL</span>
                            </div>
                        </div>
                    @endforeach
                    <div class="aspect-video rounded-3xl bg-slate-50 flex flex-col items-center justify-center border-2 border-dashed border-slate-200 cursor-pointer hover:border-primary hover:bg-blue-50 group transition-all text-slate-400">
                        <div class="size-10 rounded-2xl bg-white shadow-sm flex items-center justify-center group-hover:bg-primary group-hover:text-white transition-all transform group-hover:rotate-12">
                            <span class="material-symbols-outlined text-xl">add</span>
                        </div>
                        <span class="text-[10px] font-black uppercase mt-3 tracking-widest group-hover:text-primary">Tambah Foto</span>
                    </div>
                </div>
            </section>
        </div>
    </div>
</x-admin-layout>
