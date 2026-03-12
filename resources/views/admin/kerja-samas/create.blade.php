<x-admin-layout>
    <x-slot name="title">Tambah Kerja Sama</x-slot>
    <x-slot name="breadcrumb">
        <a href="{{ route('admin.kerja-samas.index') }}" class="hover:text-primary transition-colors">Modul Kerja Sama</a>
        <span class="mx-2 text-slate-300">/</span>
        <span>Tambah Data</span>
    </x-slot>

    <div class="max-w-4xl mx-auto py-8">
        <!-- Header area -->
        <div class="text-center mb-10">
            <div class="inline-flex items-center justify-center size-20 rounded-[2.5rem] bg-indigo-50 text-indigo-600 mb-6 animate-in zoom-in duration-700 shadow-inner">
                <span class="material-symbols-outlined text-4xl">handshake</span>
            </div>
            <h2 class="text-3xl font-black text-slate-900 tracking-tight">Input Kerja Sama Baru</h2>
            <p class="text-slate-500 mt-2 text-sm">Dokumentasikan kemitraan dan kolaborasi strategis Kabupaten Tojo Una-Una.</p>
        </div>

        <!-- Form Card -->
        <div class="bg-white rounded-[2.5rem] border border-slate-200 shadow-xl shadow-slate-200/50 p-10 relative overflow-hidden group">
            <!-- Decorative background element -->
            <div class="absolute -bottom-24 -left-24 size-64 bg-indigo-500/5 rounded-full blur-3xl pointer-events-none group-hover:bg-indigo-500/10 transition-colors duration-700"></div>

            <form method="POST" action="{{ route('admin.kerja-samas.store') }}" class="relative z-10 space-y-8">
                @csrf
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    <!-- Judul Kerja Sama -->
                    <div class="md:col-span-2 group/field">
                        <label for="title" class="block text-[11px] font-black text-slate-400 uppercase mb-3 tracking-widest group-focus-within/field:text-primary transition-colors">Judul Kerja Sama</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-5 flex items-center pointer-events-none text-slate-400 group-focus-within/field:text-primary transition-colors">
                                <span class="material-symbols-outlined text-xl">description</span>
                            </div>
                            <input id="title" name="title" type="text" value="{{ old('title') }}" required autofocus
                                class="w-full pl-14 pr-6 py-4 rounded-2xl border-slate-200 focus:ring-4 focus:ring-primary/5 focus:border-primary transition-all shadow-sm text-sm font-bold text-slate-900 placeholder:text-slate-300 placeholder:font-medium"
                                placeholder="Contoh: Kesepakatan Pengembangan Infrastruktur Digital"/>
                        </div>
                        @error('title')
                            <p class="text-xs text-rose-500 mt-2 font-bold flex items-center gap-1"><span class="material-symbols-outlined text-sm">error</span> {{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Partner/Mitra -->
                    <div class="group/field">
                        <label for="partner" class="block text-[11px] font-black text-slate-400 uppercase mb-3 tracking-widest group-focus-within/field:text-primary transition-colors">Pihak Mitra / Kolaborator</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-5 flex items-center pointer-events-none text-slate-400 group-focus-within/field:text-primary transition-colors">
                                <span class="material-symbols-outlined text-xl">corporate_fare</span>
                            </div>
                            <input id="partner" name="partner" type="text" value="{{ old('partner') }}" required
                                class="w-full pl-14 pr-6 py-4 rounded-2xl border-slate-200 focus:ring-4 focus:ring-primary/5 focus:border-primary transition-all shadow-sm text-sm font-bold text-slate-900 placeholder:text-slate-300"
                                placeholder="Nama Instansi atau Organisasi Mitra"/>
                        </div>
                        @error('partner')
                            <p class="text-xs text-rose-500 mt-2 font-bold flex items-center gap-1"><span class="material-symbols-outlined text-sm">error</span> {{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Tanggal -->
                    <div class="group/field">
                        <label for="tanggal" class="block text-[11px] font-black text-slate-400 uppercase mb-3 tracking-widest group-focus-within/field:text-primary transition-colors">Tanggal Pelaksanaan</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-5 flex items-center pointer-events-none text-slate-400 group-focus-within/field:text-primary transition-colors">
                                <span class="material-symbols-outlined text-xl">calendar_month</span>
                            </div>
                            <input id="tanggal" name="tanggal" type="date" value="{{ old('tanggal') }}"
                                class="w-full pl-14 pr-6 py-4 rounded-2xl border-slate-200 focus:ring-4 focus:ring-primary/5 focus:border-primary transition-all shadow-sm text-sm font-bold text-slate-900"/>
                        </div>
                        @error('tanggal')
                            <p class="text-xs text-rose-500 mt-2 font-bold flex items-center gap-1"><span class="material-symbols-outlined text-sm">error</span> {{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Status -->
                    <div class="group/field">
                        <label for="status" class="block text-[11px] font-black text-slate-400 uppercase mb-3 tracking-widest group-focus-within/field:text-primary transition-colors">Status Kerja Sama</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-5 flex items-center pointer-events-none text-slate-400 group-focus-within/field:text-primary transition-colors">
                                <span class="material-symbols-outlined text-xl">rule</span>
                            </div>
                            <select id="status" name="status" required
                                class="w-full pl-14 pr-6 py-4 rounded-2xl border-slate-200 focus:ring-4 focus:ring-primary/5 focus:border-primary transition-all shadow-sm text-sm font-bold text-slate-900 appearance-none bg-white">
                                <option value="Proses" {{ old('status') === 'Proses' ? 'selected' : '' }}>Dalam Proses</option>
                                <option value="Ditandatangani" {{ old('status') === 'Ditandatangani' ? 'selected' : '' }}>Ditandatangani</option>
                                <option value="Selesai" {{ old('status') === 'Selesai' ? 'selected' : '' }}>Selesai / Terlaksana</option>
                            </select>
                            <div class="absolute inset-y-0 right-5 flex items-center pointer-events-none text-slate-400">
                                <span class="material-symbols-outlined">expand_more</span>
                            </div>
                        </div>
                    </div>

                    <!-- Document URL -->
                    <div class="group/field">
                        <label for="document_url" class="block text-[11px] font-black text-slate-400 uppercase mb-3 tracking-widest group-focus-within/field:text-primary transition-colors">Tautan Dokumen (Opsional)</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-5 flex items-center pointer-events-none text-slate-400 group-focus-within/field:text-primary transition-colors">
                                <span class="material-symbols-outlined text-xl">link</span>
                            </div>
                            <input id="document_url" name="document_url" type="url" value="{{ old('document_url') }}"
                                class="w-full pl-14 pr-6 py-4 rounded-2xl border-slate-200 focus:ring-4 focus:ring-primary/5 focus:border-primary transition-all shadow-sm text-sm font-bold text-slate-900 placeholder:text-slate-300"
                                placeholder="https://drive.google.com/file/..."/>
                        </div>
                        @error('document_url')
                            <p class="text-xs text-rose-500 mt-2 font-bold flex items-center gap-1"><span class="material-symbols-outlined text-sm">error</span> {{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Deskripsi -->
                    <div class="md:col-span-2 group/field">
                        <label for="description" class="block text-[11px] font-black text-slate-400 uppercase mb-3 tracking-widest group-focus-within/field:text-primary transition-colors">Ringkasan Kerja Sama</label>
                        <div class="relative">
                            <textarea id="description" name="description" rows="5"
                                class="w-full px-6 py-4 rounded-2xl border-slate-200 focus:ring-4 focus:ring-primary/5 focus:border-primary transition-all shadow-sm text-sm font-medium text-slate-700 placeholder:text-slate-300"
                                placeholder="Berikan penjelasan singkat mengenai ruang lingkup atau poin utama kerja sama ini...">{{ old('description') }}</textarea>
                        </div>
                    </div>
                </div>

                <!-- Action Buttons -->
                <div class="pt-10 border-t border-slate-100 flex items-center justify-between">
                    <a href="{{ route('admin.kerja-samas.index') }}" class="px-8 py-4 rounded-2xl text-xs font-black text-slate-500 hover:bg-slate-100 transition-all flex items-center gap-2 uppercase tracking-widest">
                        <span class="material-symbols-outlined text-sm text-slate-400">arrow_back</span>
                        Kembali
                    </a>
                    
                    <button type="submit" class="bg-primary text-white px-12 py-4 rounded-2xl text-[10px] font-black tracking-[0.2em] shadow-xl shadow-primary/20 hover:bg-slate-900 transition-all active:scale-[0.98] flex items-center gap-3 uppercase">
                        <span class="material-symbols-outlined text-xl">save</span>
                        Publikasi Data Kerja Sama
                    </button>
                </div>
            </form>
        </div>

        <!-- Footer Note -->
        <div class="mt-8 flex items-center justify-center gap-4 opacity-30">
            <span class="material-symbols-outlined text-sm">verified</span>
            <span class="text-[9px] font-black uppercase tracking-widest text-slate-500">Sistem Pendataan Terpadu Tata Pemerintahan</span>
        </div>
    </div>
</x-admin-layout>
