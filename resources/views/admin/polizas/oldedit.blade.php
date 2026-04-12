<x-admin-layout title="Posts" :breadcrumbs="[
    [
        'name' => 'Dahsboard',
        'href' => route('admin.dashboard'),
    ],
    [
        'name' => 'Posts',
        'href' => route('admin.posts.index'),
    ],
    [
        'name' => 'Editar',
    ],
]">

    @push('css')
        <link href="/assets/css/intradmin.css" rel="stylesheet">
    @endpush

    <x-wire-card>

        <div class="p-6">

            <h2 class="text-xl font-bold mb-4">
                Editar Documento
            </h2>

            <form method="POST" action="{{ route('admin.documents.update', $document->id) }}"
                enctype="multipart/form-data">

                @csrf
                @method('PUT')

                <!-- Tipo -->
                <select name="type" class="border p-2 w-full mb-3">
                    <option value="poliza" {{ $document->type == 'poliza' ? 'selected' : '' }}>Poliza</option>
                    <option value="inventario" {{ $document->type == 'inventario' ? 'selected' : '' }}>Inventario
                    </option>
                    <option value="activos" {{ $document->type == 'activos' ? 'selected' : '' }}>Activos</option>
                </select>

                <!-- Tecnología -->
                <input type="text" name="technology" value="{{ $document->technology }}"
                    class="border p-2 w-full mb-3" placeholder="Tecnología">

                <!-- Año -->
                <input type="text" name="year" value="{{ $document->year }}" class="border p-2 w-full mb-3"
                    placeholder="Año">

                <!-- Archivo nuevo -->
                <input type="file" name="file" class="border p-2 w-full mb-3">

                <!-- Archivo actual -->
                <div class="text-sm text-gray-500 mb-4">
                    Archivo actual:
                    <strong>{{ basename($document->file) }}</strong>
                </div>

                <button class="bg-blue-600 text-white px-4 py-2 rounded">
                    Actualizar
                </button>

            </form>

        </div>

    </x-wire-card>


</x-admin-layout>
