<x-admin-layout title="Posts" :breadcrumbs="[
    [
        'name' => 'Dashboard',
        'href' => route('admin.dashboard'),
    ],
    [
        'name' => 'Multimedia Empresarial - Mostrar',
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
                <div class="flex justify-between items-center mb-6">
                    <h2 class="text-2xl font-bold text-gray-800">{{ $video->title }}</h2>
                    <div class="flex space-x-2">
                        <a href="{{ route('admin.videos.edit', $video) }}"
                            class="px-4 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700 transition">
                            <i class="fas fa-edit mr-2"></i>Editar
                        </a>
                        <a href="{{ route('admin.videos.index') }}"
                            class="px-4 py-2 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50 transition">
                            Volver
                        </a>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <!-- Información principal -->
                    <div class="md:col-span-2 space-y-6">
                        <!-- Video -->
                        {{-- <div class="bg-gray-900 rounded-lg overflow-hidden">
                            <div class="aspect-w-16 aspect-h-9">
                                <iframe src="{{ $video->video_url }}" class="w-full h-64 md:h-96" frameborder="0"
                                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                    allowfullscreen>
                                </iframe>
                            </div>
                        </div> --}}
                        <!-- Video -->
                        <div class="bg-gray-900 rounded-lg overflow-hidden">
                            @if ($video->video_type == 'url')
                                <div class="aspect-w-16 aspect-h-9">
                                    <iframe src="{{ $video->video_url }}" class="w-full h-64 md:h-96" frameborder="0"
                                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                        allowfullscreen>
                                    </iframe>
                                </div>
                            @else
                                <video controls class="w-full h-64 md:h-96">
                                    <source src="{{ $video->video_source }}" type="{{ $video->file_type }}">
                                    Tu navegador no soporta la reproducción de video.
                                </video>
                            @endif
                        </div>

                        <!-- En la sección de detalles, agregar: -->
                        <div>
                            <p class="text-sm text-gray-500">Tipo</p>
                            <p class="font-medium">
                                {{ $video->video_type == 'url' ? 'URL Externa' : 'Video Subido' }}
                            </p>
                        </div>

                        @if ($video->video_type == 'uploaded')
                            <div>
                                <p class="text-sm text-gray-500">Archivo</p>
                                <p class="font-medium">{{ $video->original_filename }}</p>
                                <p class="text-sm text-gray-500">{{ $video->formatted_file_size }}</p>
                            </div>
                        @endif

                        <!-- Descripción -->
                        <div class="bg-gray-50 p-4 rounded-lg">
                            <h3 class="text-lg font-semibold text-gray-800 mb-2">Descripción</h3>
                            <p class="text-gray-600">{{ $video->description ?? 'Sin descripción' }}</p>
                        </div>
                    </div>

                    <!-- Información lateral -->
                    <div class="space-y-6">
                        <!-- Detalles -->
                        <div class="bg-gray-50 p-4 rounded-lg">
                            <h3 class="text-lg font-semibold text-gray-800 mb-3">Detalles</h3>
                            <div class="space-y-3">
                                <div>
                                    <p class="text-sm text-gray-500">Categoría</p>
                                    <p class="font-medium">{{ $video->category->name }}</p>
                                </div>
                                <div>
                                    <p class="text-sm text-gray-500">Estado</p>
                                    <span
                                        class="px-2 py-1 text-xs font-semibold rounded-full 
                                            {{ $video->status == 'published'
                                                ? 'bg-green-100 text-green-800'
                                                : ($video->status == 'draft'
                                                    ? 'bg-yellow-100 text-yellow-800'
                                                    : 'bg-red-100 text-red-800') }}">
                                        {{ $video->status == 'published' ? 'Publicado' : ($video->status == 'draft' ? 'Borrador' : 'Archivado') }}
                                    </span>
                                </div>
                                <div>
                                    <p class="text-sm text-gray-500">Subido por</p>
                                    <p class="font-medium">{{ $video->user->name }}</p>
                                </div>
                                <div>
                                    <p class="text-sm text-gray-500">Fecha de creación</p>
                                    <p class="font-medium">{{ $video->created_at->format('d/m/Y H:i') }}</p>
                                </div>
                            </div>
                        </div>

                        <!-- Tags -->
                        <div class="bg-gray-50 p-4 rounded-lg">
                            <h3 class="text-lg font-semibold text-gray-800 mb-3">Tags</h3>
                            <div class="flex flex-wrap gap-2">
                                @forelse($video->tags as $tag)
                                    <span class="px-3 py-1 bg-blue-100 text-blue-800 text-sm rounded-full">
                                        {{ $tag->name }}
                                    </span>
                                @empty
                                    <p class="text-gray-500">Sin tags</p>
                                @endforelse
                            </div>
                        </div>

                        <!-- Thumbnail -->
                        {{-- @if ($video->thumbnail_url)
                            <div class="bg-gray-50 p-4 rounded-lg">
                                <h3 class="text-lg font-semibold text-gray-800 mb-3">Thumbnail</h3>
                                <img src="{{ $video->thumbnail_url }}" alt="Thumbnail"
                                    class="w-full h-48 object-cover rounded-lg">
                            </div>
                        @endif --}}
                        <div class="bg-gray-50 p-4 rounded-lg">
                            <h3 class="text-lg font-semibold text-gray-800 mb-3">Thumbnail</h3>
                            <img src="{{ $video->thumbnail_source }}" alt="Thumbnail"
                                class="w-full h-48 object-cover rounded-lg">
                        </div>

                    </div>
                </div>
            </div>
        </div>

    </x-wire-card>
</x-admin-layout>
