<x-admin-layout title="Lecciones" :breadcrumbs="[
    [
        'name' => 'Dahsboard',
        'href' => route('admin.dashboard'),
    ],
    [
        'name' => 'Contenido',
        'href' => route('admin.contents.index'),
    ],
    [
        'name' => 'Editar Leccion',
    ],
]">

    <x-wire-card>
        <div class="max-w-3xl mx-auto p-6">

            <h1 class="text-2xl font-bold mb-2">
                Editar Lección
            </h1>

            <p class="text-gray-600 mb-6">
                Módulo: <strong>{{ $module->title }}</strong>
            </p>
            <form method="POST" action="{{ route('admin.lessons.update', $lesson) }}">
                @csrf
                @method('PUT')
                @include('admin.lessons._form', ['lesson' => $lesson])
                <div class="mt-6 flex justify-between">
                    <a href="{{ route('admin.modules.edit', $module) }}" class="text-gray-600">
                        ← Volver
                    </a>
                    <button class="bg-blue-600 text-white px-6 py-2 rounded">
                        Actualizar
                    </button>
                </div>
            </form>
        </div>
    </x-wire-card>
    @push('js')
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/3.11.174/pdf.min.js"></script>
    @endpush
</x-admin-layout>
