<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Dokumentasi') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                    <form method="POST" action="{{ route('admin.dokumentasis.update', $dokumentasi) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        
                        <div class="mt-4">
                            <x-label for="title" :value="__('Judul Kegiatan/Dokumentasi')" />
                            <x-input id="title" class="block mt-1 w-full" type="text" name="title" :value="old('title', $dokumentasi->title)" required autofocus />
                        </div>

                        <div class="mt-4">
                            <x-label for="type" :value="__('Tipe Dokumentasi')" />
                            <select id="type" name="type" class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" onchange="toggleFields()">
                                <option value="photo" {{ old('type', $dokumentasi->type) === 'photo' ? 'selected' : '' }}>Foto / Gambar</option>
                                <option value="video" {{ old('type', $dokumentasi->type) === 'video' ? 'selected' : '' }}>Video YouTube</option>
                            </select>
                        </div>

                        <div class="mt-4" id="photo-field">
                            <x-label for="file_path" :value="__('Upload Foto (Kosongkan jika tidak ingin mengubah)')" />
                            <input id="file_path" class="block mt-1 w-full" type="file" name="file_path" accept="image/*" />
                            
                            @if($dokumentasi->type === 'photo' && $dokumentasi->file_path)
                                <div class="mt-2">
                                    <p class="text-sm text-gray-500 mb-1">Foto Saat Ini:</p>
                                    <img src="{{ upload_url($dokumentasi->file_path) }}" alt="{{ $dokumentasi->title }}" class="h-32 w-auto object-cover border rounded shadow-sm">
                                </div>
                            @endif
                        </div>

                        <div class="mt-4 hidden" id="video-field">
                            <x-label for="youtube_url" :value="__('Link YouTube')" />
                            <x-input id="youtube_url" class="block mt-1 w-full" type="url" name="youtube_url" :value="old('youtube_url', $dokumentasi->youtube_url)" placeholder="https://www.youtube.com/watch?v=..." />
                        </div>
                        
                        <div class="flex items-center justify-end mt-6">
                            <a href="{{ route('admin.dokumentasis.index') }}" class="inline-flex items-center px-4 py-2 bg-gray-300 border border-transparent rounded-md font-semibold text-xs text-gray-800 uppercase tracking-widest hover:bg-gray-400 active:bg-gray-500 focus:outline-none focus:border-gray-500 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150 mr-4">Batal</a>
                            
                            <x-button>
                                {{ __('Update') }}
                            </x-button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>

    <!-- Toggle Field Script -->
    <script>
        function toggleFields() {
            var type = document.getElementById('type').value;
            var photoField = document.getElementById('photo-field');
            var videoField = document.getElementById('video-field');

            if (type === 'photo') {
                photoField.classList.remove('hidden');
                videoField.classList.add('hidden');
            } else {
                photoField.classList.add('hidden');
                videoField.classList.remove('hidden');
            }
        }
        
        // Initial setup on load
        document.addEventListener('DOMContentLoaded', function() {
            toggleFields();
        });
    </script>
</x-app-layout>
