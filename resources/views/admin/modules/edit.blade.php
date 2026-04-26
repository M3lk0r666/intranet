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
        'name' => 'Editar Modulo',
    ],
]">

    <x-wire-card>
        <div class="max-w-3xl mx-auto p-6">
            <h1 class="text-2xl font-bold mb-2">
                Editar Módulo
            </h1>
            <p class="text-gray-600 mb-6">
                Curso: <strong>{{ $module->course->title }}</strong>
            </p>
            <form method="POST" action="{{ route('admin.modules.update', $module) }}">
                @csrf
                @method('PUT')
                @include('admin.modules._form', ['module' => $module])
                <div class="mt-6 flex justify-between">
                    <a href="{{ route('admin.courses.edit', $module->course) }}" class="text-gray-600">
                        ← Volver
                    </a>
                    <button class="bg-blue-600 text-white px-6 py-2 rounded">
                        Actualizar
                    </button>
                </div>
            </form>
        </div>
        <hr class="my-8">
        <div class="flex justify-between items-center mb-4">
            <h2 class="text-xl font-semibold">Lecciones</h2>
            <a href="{{ route('admin.lessons.create', ['module_id' => $module->id]) }}"
                class="bg-blue-600 text-white px-4 py-2 rounded">
                + Nueva Lección
            </a>
        </div>

        <div class="space-y-3">
            @forelse($module->lessons as $lesson)
                <div class="bg-gray-50 border rounded p-4 flex justify-between items-center">
                    <div>
                        <p class="font-medium">
                            {{ $lesson->order }}. {{ $lesson->title }}
                        </p>
                        <p class="text-sm text-gray-500">
                            Tipo: {{ strtoupper($lesson->type) }}
                        </p>
                    </div>
                    <div class="flex gap-3">
                        <a href="{{ route('admin.lessons.edit', $lesson) }}" class="text-blue-600 text-sm">
                            Editar
                        </a>
                        <form method="POST" action="{{ route('admin.lessons.destroy', $lesson) }}">
                            @csrf @method('DELETE')
                            <button onclick="return confirm('¿Eliminar lección?')" class="text-red-600 text-sm">
                                Eliminar
                            </button>
                        </form>
                        <a href="{{ route('admin.lessons.preview', $lesson) }}" target="_blank"
                            class="text-green-600 text-sm">
                            Preview
                        </a>
                    </div>

                </div>
            @empty
                <p class="text-gray-500">No hay lecciones aún.</p>
            @endforelse
        </div>
    </x-wire-card>
</x-admin-layout>
