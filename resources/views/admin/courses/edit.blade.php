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
        'name' => 'Ecitar Curso',
    ],
]">

    <x-wire-card>
        <div class="max-w-3xl mx-auto p-6">
            <h1 class="text-2xl font-bold mb-6">
                Editar Curso
            </h1>

            <form method="POST" action="{{ route('admin.courses.update', $course) }}">
                @csrf
                @method('PUT')
                @include('admin.courses._form', ['course' => $course])
                <div class="mt-6 flex justify-between">
                    <a href="{{ route('admin.courses.index') }}" class="text-gray-600 hover:underline">
                        ← Volver
                    </a>
                    <button class="bg-blue-600 text-white px-6 py-2 rounded hover:bg-blue-700">
                        Actualizar
                    </button>
                </div>
            </form>
        </div>

        <hr class="my-8">

        <div class="flex justify-between items-center mb-4">
            <h2 class="text-xl font-semibold">Módulos</h2>
            <a href="{{ route('admin.modules.create', ['course_id' => $course->id]) }}"
                class="bg-blue-600 text-white px-4 py-2 rounded">
                + Nuevo Módulo
            </a>
        </div>

        <div class="space-y-3">
            @forelse($course->modules as $module)
                <div class="bg-gray-50 border rounded p-4 flex justify-between items-center">
                    <div>
                        <p class="font-medium">
                            {{ $module->order }}. {{ $module->title }}
                        </p>
                        <p class="text-sm text-gray-500">
                            {{ $module->lessons->count() }} lecciones
                        </p>
                    </div>
                    <div class="flex gap-3">
                        <a href="{{ route('admin.modules.edit', $module) }}" class="text-blue-600 text-sm">
                            Editar
                        </a>
                        <form method="POST" action="{{ route('admin.modules.destroy', $module) }}">
                            @csrf @method('DELETE')
                            <button onclick="return confirm('¿Eliminar módulo?')" class="text-red-600 text-sm">
                                Eliminar
                            </button>
                        </form>
                    </div>
                </div>
            @empty
                <p class="text-gray-500">No hay módulos aún.</p>
            @endforelse
        </div>
    </x-wire-card>
</x-admin-layout>
