<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Kecamatan (EKK)') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                    <form method="POST" action="{{ route('admin.ekk-scores.update', $ekk_score) }}">
                        @csrf
                        @method('PUT')
                        
                        <div class="mt-4">
                            <x-label for="kecamatan_name" :value="__('Nama Kecamatan')" />
                            <x-input id="kecamatan_name" class="block mt-1 w-full" type="text" name="kecamatan_name" :value="old('kecamatan_name', $ekk_score->kecamatan_name)" required autofocus />
                        </div>

                        <div class="mt-4">
                            <x-label for="score" :value="__('Skor (0-100)')" />
                            <x-input id="score" class="block mt-1 w-full" type="number" step="0.01" min="0" max="100" name="score" :value="old('score', $ekk_score->score)" required />
                        </div>
                        
                        <div class="flex items-center justify-end mt-6">
                            <a href="{{ route('admin.ekk-scores.index') }}" class="inline-flex items-center px-4 py-2 bg-gray-300 border border-transparent rounded-md font-semibold text-xs text-gray-800 uppercase tracking-widest hover:bg-gray-400 active:bg-gray-500 focus:outline-none focus:border-gray-500 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150 mr-4">Batal</a>
                            
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
