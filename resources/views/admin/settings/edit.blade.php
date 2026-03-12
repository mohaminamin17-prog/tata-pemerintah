<x-admin-layout>
    <x-slot name="title">Edit Setting</x-slot>
    <x-slot name="breadcrumb">Edit Setting</x-slot>

    <div>
        <h2 class="text-2xl font-black text-slate-900">Edit Data Setting</h2>
        <p class="text-slate-500 mt-1">Ubah nilai konfigurasi sistem.</p>
    </div>

    <section class="bg-white p-6 rounded-xl border border-slate-200 shadow-sm max-w-2xl mt-6">
        <form action="{{ route('admin.settings.update', $setting) }}" method="POST">
            @csrf
            @method('PUT')
            
            <div class="mb-4">
                <label class="block text-xs font-bold text-slate-500 uppercase mb-2">Key <span class="text-red-500 text-[10px] ml-1">(Peringatan: Mengubah nama Key dapat merusak sistem!)</span></label>
                <input name="key" type="text" class="w-full rounded-lg border-slate-200 focus:ring-primary/20 focus:border-primary text-sm p-3" required value="{{ old('key', $setting->key) }}">
                @error('key') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
            </div>

            <div class="mb-6">
                <label class="block text-xs font-bold text-slate-500 uppercase mb-2">Value</label>
                <textarea name="value" rows="6" class="w-full rounded-lg border-slate-200 focus:ring-primary/20 focus:border-primary text-sm p-3" required>{{ old('value', $setting->value) }}</textarea>
                @error('value') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
            </div>

            <div class="flex gap-2">
                <button type="submit" class="bg-primary text-white px-6 py-2 rounded-lg text-sm font-semibold hover:bg-primary/90 transition-colors shadow-sm">Simpan Perubahan</button>
                <a href="{{ route('admin.settings.index') }}" class="bg-slate-100 text-slate-700 px-6 py-2 rounded-lg text-sm font-semibold hover:bg-slate-200 transition-colors">Batal</a>
            </div>
        </form>
    </section>
</x-admin-layout>
