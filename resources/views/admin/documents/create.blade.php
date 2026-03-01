<x-admin-layout title="Documentos" :breadcrumbs="[
    [
        'name' => 'Dahsboard',
        'href' => route('admin.dashboard'),
    ],
    [
        'name' => 'Documentos',
        'href' => route('admin.documents.index'),
    ],
    [
        'name' => 'Subir documentos',
    ],
]">



    <x-wire-card>



        <form action="{{ route('admin.documents.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <h1
                class="text-center text-orange-400 mb-4 text-2xl font-extrabold leading-none tracking-tight md:text-4xl lg:text-6xl">
                Subiendo tus documentos ...</h1>

            <div class="mb-4">
                <label for="title" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                    Título *
                </label>
                <input type="text" id="title" name="title" value="{{ old('title') }}"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    required>
                @error('title')
                    <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="category" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                    Categoría *
                </label>
                <select id="category" name="category"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    required>
                    <option value="">Seleccionar categoría</option>
                    @foreach ($categories as $key => $category)
                        <option value="{{ $key }}" {{ old('category') == $key ? 'selected' : '' }}
                            data-color="{{ $category['color'] }}" data-icon="{{ $category['icon'] }}"
                            data-description="{{ $category['description'] }}">
                            <i class="{{ $category['icon'] }} mr-2"></i> {{ $category['name'] }}
                        </option>
                    @endforeach
                </select>
                <div id="category-description" class="mt-2 text-sm text-gray-500"></div>
                @error('category')
                    <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="document" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                    Documento *
                </label>
                <input type="file" id="document" name="document"
                    class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                    accept="{{ '.' . implode(',.', config('documents.allowed_extensions', [])) }}" required>
                <p class="mt-1 text-sm text-gray-500 dark:text-gray-300">
                    Formatos permitidos: {{ strtoupper(implode(', ', config('documents.allowed_extensions', []))) }}.
                    Máximo {{ config('documents.max_file_size', 10240) / 1024 }}MB.
                </p>
                @error('document')
                    <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                    Descripción
                </label>
                <textarea id="description" name="description" rows="3"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">{{ old('description') }}</textarea>
                <p class="mt-1 text-sm text-gray-500 dark:text-gray-300">
                    Máximo 500 caracteres
                </p>
                @error('description')
                    <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex justify-end space-x-3">
                <a href="{{ route('admin.documents.index') }}">
                    <x-wire-button outline warning>
                        Cancelar
                    </x-wire-button>
                </a>
                <x-wire-button outline blue type="submit">
                    Subir Documento
                    <i class="ri-file-upload-line"></i>
                </x-wire-button>
            </div>
        </form>

        <script>
            // Mostrar descripción de la categoría seleccionada
            document.getElementById('category').addEventListener('change', function() {
                const selectedOption = this.options[this.selectedIndex];
                const descriptionDiv = document.getElementById('category-description');

                if (selectedOption && selectedOption.dataset.description) {
                    descriptionDiv.textContent = selectedOption.dataset.description;
                    descriptionDiv.style.color = selectedOption.dataset.color;
                } else {
                    descriptionDiv.textContent = '';
                }
            });

            // Inicializar descripción si hay valor anterior
            document.addEventListener('DOMContentLoaded', function() {
                const categorySelect = document.getElementById('category');
                if (categorySelect.value) {
                    categorySelect.dispatchEvent(new Event('change'));
                }
            });
        </script>

    </x-wire-card>






</x-admin-layout>
