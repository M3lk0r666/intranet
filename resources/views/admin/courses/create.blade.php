<x-admin-layout title="Cursos" :breadcrumbs="[
    [
        'name' => 'Dahsboard',
        'href' => route('admin.dashboard'),
    ],
    [
        'name' => 'Contenido',
        'href' => route('admin.contents.index'),
    ],
    [
        'name' => 'Nuevo Curso',
    ],
]">

    <x-wire-card>
        <div class="max-w-3xl mx-auto p-6">
            <h1 class="text-2xl font-bold mb-6">
                Crear Curso
            </h1>
            <form method="POST" action="{{ route('admin.courses.store') }}">
                @csrf
                @include('admin.courses._form')
                <div class="mt-6 flex justify-end">
                    <button class="bg-blue-600 text-white px-6 py-2 rounded hover:bg-blue-700">
                        Guardar
                    </button>
                </div>
            </form>
        </div>
    </x-wire-card>
</x-admin-layout>
