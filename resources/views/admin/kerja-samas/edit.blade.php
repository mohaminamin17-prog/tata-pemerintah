<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Kerja Sama') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                    <form method="POST" action="{{ route('admin.kerja-samas.update', $kerja_sama) }}">
                        @csrf
                        @method('PUT')
                        
                        <div class="mt-4">
                            <x-label for="title" :value="__('Judul Kerja Sama')" />
                            <x-input id="title" class="block mt-1 w-full" type="text" name="title" :value="old('title', $kerja_sama->title)" required autofocus />
                        </div>

                        <div class="mt-4">
                            <x-label for="partner" :value="__('Mitra')" />
                            <x-input id="partner" class="block mt-1 w-full" type="text" name="partner" :value="old('partner', $kerja_sama->partner)" required />
                        </div>

                        <div class="mt-4">
                            <x-label for="description" :value="__('Deskripsi Singkat')" />
                            <textarea id="description" class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" rows="4" name="description">{{ old('description', $kerja_sama->description) }}</textarea>
                        </div>

                        <div class="mt-4">
                            <x-label for="status" :value="__('Status')" />
                            <select id="status" name="status" class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                <option value="Proses" {{ old('status', $kerja_sama->status) === 'Proses' ? 'selected' : '' }}>Proses</option>
                                <option value="Ditandatangani" {{ old('status', $kerja_sama->status) === 'Ditandatangani' ? 'selected' : '' }}>Ditandatangani</option>
                                <option value="Selesai" {{ old('status', $kerja_sama->status) === 'Selesai' ? 'selected' : '' }}>Selesai</option>
                            </select>
                        </div>

                        <div class="mt-4">
                            <x-label for="tanggal" :value="__('Tanggal Kerja Sama')" />
                            <x-input id="tanggal" class="block mt-1 w-full" type="date" name="tanggal" :value="old('tanggal', $kerja_sama->tanggal ? \Carbon\Carbon::parse($kerja_sama->tanggal)->format('Y-m-d') : null)" />
                        </div>

                        <div class="mt-4">
                            <x-label for="document_url" :value="__('URL Dokumen (opsional)')" />
                            <x-input id="document_url" class="block mt-1 w-full" type="url" name="document_url" :value="old('document_url', $kerja_sama->document_url)" />
                        </div>
                        
                        <div class="flex items-center justify-end mt-6">
                            <a href="{{ route('admin.kerja-samas.index') }}" class="inline-flex items-center px-4 py-2 bg-gray-300 border border-transparent rounded-md font-semibold text-xs text-gray-800 uppercase tracking-widest hover:bg-gray-400 active:bg-gray-500 focus:outline-none focus:border-gray-500 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150 mr-4">Batal</a>
                            
                            <x-button>
                                {{ __('Update') }}
                            </x-button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
