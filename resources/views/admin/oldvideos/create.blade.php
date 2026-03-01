<x-admin-layout title="Videos" :breadcrumbs="[
    [
        'name' => 'Dahsboard',
        'href' => route('admin.dashboard'),
    ],
    [
        'name' => 'Videos',
        'href' => route('admin.videos.index'),
    ],
    [
        'name' => 'Subir Video',
    ],
]">

    @push('css')
        <!-- Include your css -->
        <link href="/assets/css/video.css" rel="stylesheet">
        <!-- Plyr.io para reproductor -->
        <link rel="stylesheet" href="https://cdn.plyr.io/3.7.8/plyr.css" />
    @endpush

    @if ($errors->any())
        <div class="bg-red-100 text-red-700 p-3 rounded mb-4">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>• {{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif


    <x-wire-card>
        <form action="{{ route('admin.videos.store') }}" method="POST" class="space-y-4" enctype="multipart/form-data">
            @csrf
            <div class="p-6 bg-white rounded-lg shadow">

                <!-- Grid principal -->
                <div class="grid grid-cols-1 lg:grid-cols-12 gap-6">

                    <!-- COLUMNA IZQUIERDA (Formulario) -->
                    <div class="lg:col-span-8 space-y-4">

                        <!-- Título -->
                        <x-wire-input label="Titulo del Video *" name="title" placeholder="Nombre del video"
                            value="{{ old('title') }}" />

                        <!-- Descripción -->
                        <x-wire-textarea label="Descripcion *" rows="3" name="description"
                            placeholder="Escribe una descripcion del video ...." />

                        <!-- Duración / Año -->
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

                            <x-wire-maskable id="duration" name="duration" label="Duración del video *"
                                placeholder="00:00:00" mask="##:##:##" emit-formatted wire:model.defer="duration" />


                            {{-- <x-wire-maskable id="duration" label="Duracion del video *" name="duration"
                                placeholder="01:39:35" /> --}}

                            <x-wire-maskable id="year" label="Año del video *" mask="####" placeholder="2025"
                                name="year" />
                        </div>

                        <!-- Categorías Videos-->
                        <div>
                            <label class="block mb-2.5 text-sm font-medium text-heading">Categoria/s del video *
                            </label>
                            <div class="grid grid-cols-3 gap-4 mb-4">
                                @foreach ($catsvideos as $catvideo)
                                    <div class="flex items-center">
                                        <label>
                                            <input type="checkbox" name="catsvideos[]" value="{{ $catvideo->id }}"
                                                class="w-4 h-4 border border-default-medium rounded-xs bg-neutral-secondary-medium focus:ring-2 focus:ring-brand-soft"
                                                {{-- @checked(in_array($catvideo->id, old('catsvideo', []))) --}}>
                                            {{ $catvideo->name }}
                                        </label>
                                    </div>
                                @endforeach
                            </div>
                        </div>


                        <!-- Checkboxes -->
                        <h3 class="mb-4 font-semibold text-base">Estado del Video *</h3>
                        <div class="flex">
                            <div class="flex items-center me-4">
                                <input id="inline-checkbox" type="checkbox" value="1" name="is_trending"
                                    class="w-4 h-4 border border-default-medium rounded-xs bg-neutral-secondary-medium focus:ring-2 focus:ring-brand-soft">
                                <label for="inline-checkbox"
                                    class="select-none ms-2 text-sm font-medium text-heading">Trending</label>
                            </div>
                            <div class="flex items-center me-4">
                                <input id="inline-checkbox" type="checkbox" value="1" name="is_free"
                                    class="w-4 h-4 border border-default-medium rounded-xs bg-neutral-secondary-medium focus:ring-2 focus:ring-brand-soft">
                                <label for="inline-2-checkbox"
                                    class="select-none ms-2 text-sm font-medium text-heading">Gratuito</label>
                            </div>
                            <div class="flex items-center me-4">
                                <input id="inline-checkbox" type="checkbox" value="1" name="is_featured"
                                    class="w-4 h-4 border border-default-medium rounded-xs bg-neutral-secondary-medium focus:ring-2 focus:ring-brand-soft">
                                <label for="inline-checkbox"
                                    class="select-none ms-2 text-sm font-medium text-heading">Destacado</label>
                            </div>
                        </div>

                        <!-- Nivel de acceso -->
                        <select name="access_level" wire:model.defer="access_level" class="flowbite-input w-full">
                            <option value="">Seleccionar nivel</option>
                            <option value="public">Público</option>
                            <option value="private">Privado</option>
                            <option value="premium">Premium</option>
                        </select>
                        {{-- <x-wire-select label="Nivel de Acceso *" placeholder="Seleccionar un estado" name="access_level"
                            :options="['publico', 'privado', 'premium']" /> --}}
                    </div>

                    <!-- COLUMNA DERECHA (Archivos + Preview) -->
                    <div class="lg:col-span-4 space-y-4">

                        <!-- Video -->
                        <div>
                            <label class="block mb-2 text-sm font-medium text-gray-900">
                                Archivo de Video *
                            </label>
                            <input type="file"
                                class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50"
                                name="video_file" accept="video/*" required>
                            <p class="mt-1 text-xs text-gray-500">
                                Formatos: MP4, MOV, AVI, WMV. Máx: 500MB
                            </p>
                        </div>

                        <!-- Miniatura -->
                        <div>
                            <label class="block mb-2.5 text-sm font-medium text-heading" for="file_input">Minuatura
                                *</label>
                            <input
                                class="cursor-pointer bg-neutral-secondary-medium border border-default-medium text-heading text-sm rounded-base focus:ring-brand focus:border-brand block w-full shadow-xs "
                                name="thumbnail" type="file" accept="image/*" required
                                onchange="previewImage(event, '#imgPreview')">
                            <p class="mt-1 text-sm text-gray-500 dark:text-gray-300">Formatos: JPG, PNG. Máx: 5MB
                                (1280x720)</p>
                        </div>
                        <!-- Preview -->
                        <div>
                            <label class="block mb-2.5 text-sm font-medium text-heading">Imagen</label>
                            <img class="h-auto max-w-xs-image" src="{{ asset('storage/media/no-disponible.jpg') }}"
                                alt="image description" id="imgPreview">
                        </div>
                    </div>
                </div>

                <!-- Botones -->
                <div class="flex gap-3 mt-6">
                    <x-wire-button light green type="submit">
                        <i class="ri-video-upload-line text-base"></i>
                        Subir video
                    </x-wire-button>

                    <a href="{{ route('admin.videos.index') }}">
                        <x-wire-button light warning>
                            <i class="ri-close-circle-line text-base"></i>
                            Cancelar
                        </x-wire-button>
                    </a>
                </div>
            </div>
        </form>
    </x-wire-card>



</x-admin-layout>

@push('js')
    <!-- Include the Js Videos -->
    <script src="{{ asset('/assets/scripts/video.js') }}"></script>
    <!-- Plyr.io -->
    <script src="https://cdn.plyr.io/3.7.8/plyr.js"></script>
@endpush
