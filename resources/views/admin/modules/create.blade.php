<x-admin-layout title="Modulos" :breadcrumbs="[
    [
        'name' => 'Dahsboard',
        'href' => route('admin.dashboard'),
    ],
    [
        'name' => 'Contenido',
        'href' => route('admin.contents.index'),
    ],
    [
        'name' => 'Crear Modulo',
    ],
]">

    <x-wire-card>
        <div class="max-w-3xl mx-auto p-6">
            <h1 class="text-2xl font-bold mb-2">
                Nuevo Módulo
            </h1>
            <p class="text-gray-600 mb-6">
                Curso: <strong>{{ $course->title }}</strong>
            </p>
            <form method="POST" action="{{ route('admin.modules.store') }}">
                @csrf
                <input type="hidden" name="course_id" value="{{ $course->id }}">
                @include('admin.modules._form')
                <div class="mt-6 flex justify-between">
                    <a href="{{ route('admin.courses.edit', $course) }}" class="text-gray-600">
                        ← Volver
                    </a>
                    <button class="bg-blue-600 text-white px-6 py-2 rounded">
                        Guardar
                    </button>
                </div>
            </form>
        </div>
    </x-wire-card>
</x-admin-layout>
