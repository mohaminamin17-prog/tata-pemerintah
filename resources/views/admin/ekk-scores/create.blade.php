<x-admin-layout>
    <x-slot name="title">Tambah Kecamatan (EKK)</x-slot>
    <x-slot name="breadcrumb">
        <a href="{{ route('admin.ekk-scores.index') }}" class="hover:text-primary transition-colors">Modul EKK</a>
        <span class="mx-2 text-slate-300">/</span>
        <span>Tambah Data</span>
    </x-slot>

    <div class="max-w-3xl mx-auto py-8">
        <!-- Header area -->
        <div class="text-center mb-10">
            <div class="inline-flex items-center justify-center size-20 rounded-[2.5rem] bg-primary/10 text-primary mb-6 animate-in zoom-in duration-700">
                <span class="material-symbols-outlined text-4xl">location_on</span>
            </div>
            <h2 class="text-3xl font-black text-slate-900 tracking-tight">Input Data Kecamatan</h2>
            <p class="text-slate-500 mt-2">Tambahkan data evaluasi kinerja untuk kecamatan baru di Kabupaten Tojo Una-Una.</p>
        </div>

        <!-- Form Card -->
        <div class="bg-white rounded-[2.5rem] border border-slate-200 shadow-xl shadow-slate-200/50 p-10 relative overflow-hidden group">
            <!-- Decorative background element -->
            <div class="absolute -top-24 -right-24 size-64 bg-primary/5 rounded-full blur-3xl pointer-events-none group-hover:bg-primary/10 transition-colors duration-700"></div>

            <form method="POST" action="{{ route('admin.ekk-scores.store') }}" class="relative z-10 space-y-8">
                @csrf
                
                <div class="space-y-6">
                    <!-- Kecamatan Name -->
                    <div class="group/field">
                        <label for="kecamatan_name" class="block text-[11px] font-black text-slate-400 uppercase mb-3 tracking-widest group-focus-within/field:text-primary transition-colors">Nama Kecamatan</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-5 flex items-center pointer-events-none text-slate-400 group-focus-within/field:text-primary transition-colors">
                                <span class="material-symbols-outlined text-xl">map</span>
                            </div>
                            <input id="kecamatan_name" name="kecamatan_name" type="text" value="{{ old('kecamatan_name') }}" required autofocus
                                class="w-full pl-14 pr-6 py-4 rounded-2xl border-slate-200 focus:ring-4 focus:ring-primary/5 focus:border-primary transition-all shadow-sm text-sm font-bold text-slate-900 placeholder:text-slate-300 placeholder:font-medium"
                                placeholder="Masukkan nama kecamatan..."/>
                        </div>
                        @error('kecamatan_name')
                            <p class="text-xs text-rose-500 mt-2 font-bold flex items-center gap-1">
                                <span class="material-symbols-outlined text-sm">error</span> {{ $message }}
                            </p>
                        @enderror
                    </div>

                    <!-- Score Input -->
                    <div class="group/field">
                        <label for="score" class="block text-[11px] font-black text-slate-400 uppercase mb-3 tracking-widest group-focus-within/field:text-primary transition-colors">Skor Evaluasi (0 - 100)</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-5 flex items-center pointer-events-none text-slate-400 group-focus-within/field:text-primary transition-colors">
                                <span class="material-symbols-outlined text-xl">analytics</span>
                            </div>
                            <input id="score" name="score" type="number" step="0.01" min="0" max="100" value="{{ old('score', 0) }}" required
                                class="w-full pl-14 pr-6 py-4 rounded-2xl border-slate-200 focus:ring-4 focus:ring-primary/5 focus:border-primary transition-all shadow-sm text-sm font-bold text-slate-900"/>
                        </div>
                        <div class="flex items-center gap-2 mt-3 p-3 bg-slate-50 rounded-xl border border-slate-100">
                            <span class="material-symbols-outlined text-slate-400 text-lg">info</span>
                            <p class="text-[11px] text-slate-500 font-medium italic">Grade dan status akan dihitung secara otomatis oleh sistem berdasarkan total skor yang diinput.</p>
                        </div>
                        @error('score')
                            <p class="text-xs text-rose-500 mt-2 font-bold flex items-center gap-1">
                                <span class="material-symbols-outlined text-sm">error</span> {{ $message }}
                            </p>
                        @enderror
                    </div>
                </div>

                <!-- Action Buttons -->
                <div class="pt-6 border-t border-slate-100 flex items-center justify-between">
                    <a href="{{ route('admin.ekk-scores.index') }}" class="px-8 py-4 rounded-2xl text-xs font-black text-slate-500 hover:bg-slate-100 transition-all flex items-center gap-2">
                        <span class="material-symbols-outlined text-sm text-slate-400">arrow_back</span>
                        BATAL
                    </a>
                    
                    <button type="submit" class="bg-primary text-white px-10 py-4 rounded-2xl text-xs font-black shadow-xl shadow-primary/20 hover:bg-slate-900 transition-all active:scale-[0.98] flex items-center gap-3">
                        <span class="material-symbols-outlined text-lg">save</span>
                        SIMPAN DATA KECAMATAN
                    </button>
                </div>
            </form>
        </div>

        <!-- Design Guidelines Footnote -->
        <div class="mt-8 flex items-center justify-center gap-6 opacity-30 grayscale hover:grayscale-0 transition-all duration-500">
            <div class="flex items-center gap-2">
                <span class="material-symbols-outlined text-sm text-slate-400">verified_user</span>
                <span class="text-[10px] font-black tracking-widest uppercase text-slate-500 text-center">Data Terenkripsi</span>
            </div>
            <div class="size-1 bg-slate-300 rounded-full"></div>
            <div class="flex items-center gap-2">
                <span class="material-symbols-outlined text-sm text-slate-400">bolt</span>
                <span class="text-[10px] font-black tracking-widest uppercase text-slate-500 text-center">Optimized Workflow</span>
            </div>
        </div>
    </div>
</x-admin-layout>
