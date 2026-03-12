<x-admin-layout>
    <x-slot name="title">Tambah Dokumentasi</x-slot>
    <x-slot name="breadcrumb">
        <a href="{{ route('admin.dokumentasis.index') }}" class="hover:text-primary transition-colors">Modul Dokumentasi</a>
        <span class="mx-2 text-slate-300">/</span>
        <span>Tambah Data</span>
    </x-slot>

    <div class="max-w-4xl mx-auto py-8">
        <!-- Header area -->
        <div class="text-center mb-10">
            <div class="inline-flex items-center justify-center size-20 rounded-[2.5rem] bg-amber-50 text-amber-600 mb-6 animate-in zoom-in duration-700 shadow-inner">
                <span class="material-symbols-outlined text-4xl">photo_library</span>
            </div>
            <h2 class="text-3xl font-black text-slate-900 tracking-tight">Tambah Dokumentasi Kegiatan</h2>
            <p class="text-slate-500 mt-2 text-sm">Abadikan dan publikasikan momen penting pembangunan Kabupaten Tojo Una-Una.</p>
        </div>

        <!-- Form Card -->
        <div class="bg-white rounded-[2.5rem] border border-slate-200 shadow-xl shadow-slate-200/50 p-10 relative overflow-hidden group">
            <!-- Decorative background element -->
            <div class="absolute -bottom-24 -left-24 size-64 bg-amber-500/5 rounded-full blur-3xl pointer-events-none group-hover:bg-amber-500/10 transition-colors duration-700"></div>

            <form method="POST" action="{{ route('admin.dokumentasis.store') }}" enctype="multipart/form-data" class="relative z-10 space-y-8">
                @csrf
                
                <div class="grid grid-cols-1 gap-8">
                    <!-- Judul Kegiatan -->
                    <div class="group/field">
                        <label for="title" class="block text-[11px] font-black text-slate-400 uppercase mb-3 tracking-widest group-focus-within/field:text-primary transition-colors">Judul Kegiatan / Dokumentasi</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-5 flex items-center pointer-events-none text-slate-400 group-focus-within/field:text-primary transition-colors">
                                <span class="material-symbols-outlined text-xl">description</span>
                            </div>
                            <input id="title" name="title" type="text" value="{{ old('title') }}" required autofocus
                                class="w-full pl-14 pr-6 py-4 rounded-2xl border-slate-200 focus:ring-4 focus:ring-primary/5 focus:border-primary transition-all shadow-sm text-sm font-bold text-slate-900 placeholder:text-slate-300 placeholder:font-medium"
                                placeholder="Contoh: Kunjungan Kerja Bupati ke Desa Wakai"/>
                        </div>
                        @error('title')
                            <p class="text-xs text-rose-500 mt-2 font-bold flex items-center gap-1"><span class="material-symbols-outlined text-sm">error</span> {{ $message }}</p>
                        @enderror
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                        <!-- Tipe Dokumentasi -->
                        <div class="group/field">
                            <label for="type" class="block text-[11px] font-black text-slate-400 uppercase mb-3 tracking-widest group-focus-within/field:text-primary transition-colors">Tipe Media</label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-5 flex items-center pointer-events-none text-slate-400 group-focus-within/field:text-primary transition-colors">
                                    <span class="material-symbols-outlined text-xl">category</span>
                                </div>
                                <select id="type" name="type" required onchange="toggleFields()"
                                    class="w-full pl-14 pr-6 py-4 rounded-2xl border-slate-200 focus:ring-4 focus:ring-primary/5 focus:border-primary transition-all shadow-sm text-sm font-bold text-slate-900 appearance-none bg-white">
                                    <option value="photo" {{ old('type') === 'photo' ? 'selected' : '' }}>Foto / Gambar</option>
                                    <option value="video" {{ old('type') === 'video' ? 'selected' : '' }}>Video YouTube</option>
                                </select>
                                <div class="absolute inset-y-0 right-5 flex items-center pointer-events-none text-slate-400">
                                    <span class="material-symbols-outlined">expand_more</span>
                                </div>
                            </div>
                        </div>

                        <!-- Conditionally Rendered Fields -->
                        <div>
                            <!-- Photo Field -->
                            <div id="photo-field" class="group/field transition-all duration-300">
                                <label for="file_path" class="block text-[11px] font-black text-slate-400 uppercase mb-3 tracking-widest group-focus-within/field:text-primary transition-colors">File Gambar</label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-5 flex items-center pointer-events-none text-slate-400 group-focus-within/field:text-primary transition-colors">
                                        <span class="material-symbols-outlined text-xl">image</span>
                                    </div>
                                    <input id="file_path" name="file_path" type="file" accept="image/*"
                                        class="w-full pl-14 pr-6 py-4 rounded-2xl border-slate-200 focus:ring-4 focus:ring-primary/5 focus:border-primary transition-all shadow-sm text-sm font-bold text-slate-900 file:mr-4 file:py-1 file:px-4 file:rounded-full file:border-0 file:text-[10px] file:font-black file:uppercase file:tracking-widest file:bg-primary/10 file:text-primary hover:file:bg-primary/20 cursor-pointer"/>
                                </div>
                            </div>

                            <!-- Video Field -->
                            <div id="video-field" class="group/field hidden transition-all duration-300">
                                <label for="youtube_url" class="block text-[11px] font-black text-slate-400 uppercase mb-3 tracking-widest group-focus-within/field:text-primary transition-colors">Link YouTube</label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-5 flex items-center pointer-events-none text-slate-400 group-focus-within/field:text-primary transition-colors">
                                        <span class="material-symbols-outlined text-xl">play_circle</span>
                                    </div>
                                    <input id="youtube_url" name="youtube_url" type="url" value="{{ old('youtube_url') }}"
                                        class="w-full pl-14 pr-6 py-4 rounded-2xl border-slate-200 focus:ring-4 focus:ring-primary/5 focus:border-primary transition-all shadow-sm text-sm font-bold text-slate-900 placeholder:text-slate-300"
                                        placeholder="https://www.youtube.com/watch?v=..."/>
                                </div>
                            </div>

                            @error('file_path')
                                <p class="text-xs text-rose-500 mt-2 font-bold flex items-center gap-1"><span class="material-symbols-outlined text-sm">error</span> {{ $message }}</p>
                            @enderror
                            @error('youtube_url')
                                <p class="text-xs text-rose-500 mt-2 font-bold flex items-center gap-1"><span class="material-symbols-outlined text-sm">error</span> {{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>

                <!-- Action Buttons -->
                <div class="pt-10 border-t border-slate-100 flex items-center justify-between">
                    <a href="{{ route('admin.dokumentasis.index') }}" class="px-8 py-4 rounded-2xl text-xs font-black text-slate-500 hover:bg-slate-100 transition-all flex items-center gap-2 uppercase tracking-widest">
                        <span class="material-symbols-outlined text-sm text-slate-400">arrow_back</span>
                        Kembali
                    </a>
                    
                    <button type="submit" class="bg-primary text-white px-12 py-4 rounded-2xl text-[10px] font-black tracking-[0.2em] shadow-xl shadow-primary/20 hover:bg-slate-900 transition-all active:scale-[0.98] flex items-center gap-3 uppercase">
                        <span class="material-symbols-outlined text-xl">save</span>
                        Publikasi Dokumentasi
                    </button>
                </div>
            </form>
        </div>

        <!-- Footer Note -->
        <div class="mt-8 flex items-center justify-center gap-4 opacity-30">
            <span class="material-symbols-outlined text-sm">verified</span>
            <span class="text-[9px] font-black uppercase tracking-widest text-slate-500">Arsip Digital Tata Pemerintahan</span>
        </div>
    </div>

    <script>
        function toggleFields() {
            const type = document.getElementById('type').value;
            const photoField = document.getElementById('photo-field');
            const videoField = document.getElementById('video-field');

            if (type === 'photo') {
                photoField.classList.remove('hidden');
                videoField.classList.add('hidden');
                document.getElementById('file_path').required = true;
                document.getElementById('youtube_url').required = false;
            } else {
                photoField.classList.add('hidden');
                videoField.classList.remove('hidden');
                document.getElementById('file_path').required = false;
                document.getElementById('youtube_url').required = true;
            }
        }
        
        document.addEventListener('DOMContentLoaded', toggleFields);
    </script>
</x-admin-layout>
