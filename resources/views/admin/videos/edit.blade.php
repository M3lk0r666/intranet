<x-admin-layout title="Posts" :breadcrumbs="[
    [
        'name' => 'Dashboard',
        'href' => route('admin.dashboard'),
    ],
    [
        'name' => 'Multimedia Empresarial - Editar',
    ],
]">

    <x-slot name="action">
        <x-wire-button blue href="#">
            <i class="ri-add-large-line"></i>
            Nuevo
        </x-wire-button>

    </x-slot>

    <x-wire-card>

        <div class="p-4">
            <!-- Header -->
            <div class="flex flex-col md:flex-row md:items-center md:justify-between mb-6">
                <div class="mb-4 md:mb-0">
                    <h1 class="text-2xl font-bold text-gray-900 dark:text-white">Administración de Videos</h1>
                    <p class="text-gray-600 dark:text-gray-400">Gestiona todos los videos de la empresa</p>
                </div>
            </div>

            <div class="max-w-4xl mx-auto p-6 bg-white rounded-lg shadow-md">
                <h2 class="text-2xl font-bold text-gray-800 mb-6">Editar Video: {{ $video->title }}</h2>

                <form action="{{ route('admin.videos.update', $video) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Columna izquierda -->
                        <div class="space-y-6">
                            <!-- Título -->
                            <div>
                                <label for="title" class="block text-sm font-medium text-gray-700 mb-1">Título
                                    *</label>
                                <input type="text" name="title" id="title"
                                    value="{{ old('title', $video->title) }}"
                                    class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                    required>
                            </div>

                            <!-- Descripción -->
                            <div>
                                <label for="description"
                                    class="block text-sm font-medium text-gray-700 mb-1">Descripción</label>
                                <textarea name="description" id="description" rows="4"
                                    class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">{{ old('description', $video->description) }}</textarea>
                            </div>

                            <!-- URL del Video -->
                            <div>
                                <label for="video_url" class="block text-sm font-medium text-gray-700 mb-1">URL del
                                    Video *</label>
                                <input type="url" name="video_url" id="video_url"
                                    value="{{ old('video_url', $video->video_url) }}"
                                    class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                    required>
                            </div>

                            <!-- Thumbnail -->
                            <div>
                                <label for="thumbnail"
                                    class="block text-sm font-medium text-gray-700 mb-1">Thumbnail</label>
                                @if ($video->thumbnail_url)
                                    <div class="mb-3">
                                        <img src="{{ $video->thumbnail_url }}" alt="Thumbnail actual"
                                            class="h-32 w-48 object-cover rounded-lg">
                                        <p class="mt-1 text-sm text-gray-500">Thumbnail actual</p>
                                    </div>
                                @endif
                                <input type="file" name="thumbnail" id="thumbnail" accept="image/*"
                                    class="w-full px-3 py-2 border border-gray-300 rounded-lg">
                                <p class="mt-1 text-sm text-gray-500">Dejar vacío para mantener el actual</p>
                            </div>
                        </div>

                        <!-- Columna derecha -->
                        <div class="space-y-6">
                            <!-- Categoría -->
                            <div>
                                <label for="category_id" class="block text-sm font-medium text-gray-700 mb-1">Categoría
                                    *</label>
                                <select name="category_id" id="category_id"
                                    class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                    required>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}"
                                            {{ $video->category_id == $category->id ? 'selected' : '' }}>
                                            {{ $category->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <!-- Tags -->
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Tags</label>
                                <div class="border border-gray-300 rounded-lg p-3 max-h-48 overflow-y-auto">
                                    @foreach ($tags as $tag)
                                        <div class="flex items-center mb-2">
                                            <input type="checkbox" name="tags[]" id="tag_{{ $tag->id }}"
                                                value="{{ $tag->id }}"
                                                {{ in_array($tag->id, $videoTags) ? 'checked' : '' }}
                                                class="h-4 w-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500">
                                            <label for="tag_{{ $tag->id }}" class="ml-2 text-sm text-gray-700">
                                                {{ $tag->name }}
                                            </label>
                                        </div>
                                    @endforeach
                                </div>
                            </div>

                            <!-- Estado -->
                            <div>
                                <label for="status" class="block text-sm font-medium text-gray-700 mb-1">Estado
                                    *</label>
                                <select name="status" id="status"
                                    class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                    required>
                                    <option value="draft" {{ $video->status == 'draft' ? 'selected' : '' }}>
                                        Borrador</option>
                                    <option value="published" {{ $video->status == 'published' ? 'selected' : '' }}>
                                        Publicado</option>
                                    <option value="archived" {{ $video->status == 'archived' ? 'selected' : '' }}>
                                        Archivado</option>
                                </select>
                            </div>

                            <!-- Tipo de Video -->
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Tipo de Video *</label>
                                <div class="flex space-x-4 mb-4">
                                    <label class="inline-flex items-center">
                                        <input type="radio" name="video_type" value="url"
                                            class="form-radio text-blue-600"
                                            @if ($video->video_type == 'url') checked @endif
                                            onclick="toggleVideoInput()">
                                        <span class="ml-2">URL Externa</span>
                                    </label>
                                    <label class="inline-flex items-center">
                                        <input type="radio" name="video_type" value="uploaded"
                                            class="form-radio text-blue-600"
                                            @if ($video->video_type == 'uploaded') checked @endif
                                            onclick="toggleVideoInput()">
                                        <span class="ml-2">Subir Archivo</span>
                                    </label>
                                </div>
                            </div>

                            <!-- URL del Video -->
                            <div id="url-input" style="display: {{ $video->video_type == 'url' ? 'block' : 'none' }}">
                                <label for="video_url" class="block text-sm font-medium text-gray-700 mb-1">URL del
                                    Video *</label>
                                <input type="url" name="video_url" id="video_url"
                                    value="{{ old('video_url', $video->video_url) }}"
                                    class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                            </div>

                            <!-- Subir Archivo -->
                            <div id="upload-input"
                                style="display: {{ $video->video_type == 'uploaded' ? 'block' : 'none' }}">
                                <label for="video_file" class="block text-sm font-medium text-gray-700 mb-1">
                                    @if ($video->video_type == 'uploaded')
                                        Reemplazar Video (opcional)
                                    @else
                                        Subir Video *
                                    @endif
                                </label>

                                @if ($video->video_type == 'uploaded' && $video->video_path)
                                    <div class="mb-4 p-4 bg-gray-50 rounded-lg">
                                        <div class="flex items-center justify-between">
                                            <div>
                                                <p class="font-medium text-gray-700">Video actual:</p>
                                                <p class="text-sm text-gray-500">{{ $video->original_filename }}</p>
                                                <p class="text-sm text-gray-500">{{ $video->formatted_file_size }}</p>
                                            </div>
                                            <div>
                                                <a href="{{ $video->video_source }}" target="_blank"
                                                    class="text-blue-600 hover:text-blue-800">
                                                    <i class="fas fa-eye mr-1"></i> Ver
                                                </a>
                                            </div>
                                        </div>
                                        <video controls class="w-full mt-2 rounded" style="max-height: 200px;">
                                            <source src="{{ $video->video_source }}" type="{{ $video->file_type }}">
                                        </video>
                                    </div>
                                @endif

                                <div
                                    class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-lg">
                                    <div class="space-y-1 text-center">
                                        <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor"
                                            fill="none" viewBox="0 0 48 48">
                                            <path
                                                d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02"
                                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                        <div class="flex text-sm text-gray-600">
                                            <label for="video_file"
                                                class="relative cursor-pointer bg-white rounded-md font-medium text-blue-600 hover:text-blue-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-blue-500">
                                                <span>Subir un archivo</span>
                                                <input type="file" name="video_file" id="video_file"
                                                    accept=".mp4,.avi,.mov,.wmv,.flv,.webm,.mkv" class="sr-only">
                                            </label>
                                            <p class="pl-1">o arrastrar y soltar</p>
                                        </div>
                                        <p class="text-xs text-gray-500">
                                            MP4, AVI, MOV, WMV, FLV, WEBM, MKV hasta 500MB
                                        </p>
                                    </div>
                                </div>

                                <div id="video-preview" class="mt-4 hidden">
                                    <video id="preview-player" controls class="w-full rounded-lg"
                                        style="max-height: 300px;">
                                        <source id="preview-source" src="" type="video/mp4">
                                    </video>
                                    <div class="mt-2 text-sm text-gray-600" id="file-info"></div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Botones -->
                    <div class="mt-8 pt-6 border-t border-gray-200 flex justify-end space-x-3">
                        <a href="{{ route('admin.videos.index') }}"
                            class="px-4 py-2 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50 transition">
                            Cancelar
                        </a>
                        <button type="submit"
                            class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition">
                            Actualizar Video
                        </button>
                    </div>
                </form>
            </div>


        </div>

    </x-wire-card>

    @push('js')
        <script>
            function toggleVideoInput() {
                const videoType = document.querySelector('input[name="video_type"]:checked').value;
                const urlInput = document.getElementById('url-input');
                const uploadInput = document.getElementById('upload-input');

                if (videoType === 'url') {
                    urlInput.style.display = 'block';
                    uploadInput.style.display = 'none';
                    document.getElementById('video_file').required = false;
                    document.getElementById('video_url').required = true;
                } else {
                    urlInput.style.display = 'none';
                    uploadInput.style.display = 'block';
                    document.getElementById('video_file').required = true;
                    document.getElementById('video_url').required = false;
                }
            }

            // Vista previa del video
            document.getElementById('video_file')?.addEventListener('change', function(e) {
                const file = e.target.files[0];
                const preview = document.getElementById('video-preview');
                const player = document.getElementById('preview-player');
                const source = document.getElementById('preview-source');
                const fileInfo = document.getElementById('file-info');

                if (file) {
                    const url = URL.createObjectURL(file);
                    source.src = url;
                    player.load();

                    // Mostrar información del archivo
                    const fileSize = (file.size / (1024 * 1024)).toFixed(2);
                    fileInfo.innerHTML = `
            <strong>Nombre:</strong> ${file.name}<br>
            <strong>Tamaño:</strong> ${fileSize} MB<br>
            <strong>Tipo:</strong> ${file.type}
        `;

                    preview.classList.remove('hidden');
                } else {
                    preview.classList.add('hidden');
                }
            });

            // Inicializar al cargar la página
            document.addEventListener('DOMContentLoaded', function() {
                toggleVideoInput();
            });
        </script>
    @endpush

</x-admin-layout>
