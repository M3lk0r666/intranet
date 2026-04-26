<x-admin-layout title="Posts" :breadcrumbs="[
    [
        'name' => 'Dashboard',
        'href' => route('admin.dashboard'),
    ],
    [
        'name' => 'Formacion Academica - Archivos',
    ],
]">

    <x-slot name="action">
        <x-wire-button blue href="{{ route('admin.contents.create') }}">
            <i class="ri-add-large-line"></i>
            Nuevo
        </x-wire-button>
    </x-slot>

    <x-wire-card>
        <div class="max-w-7xl mx-auto p-6">
            <div class="flex justify-between items-center mb-6">
                <h1 class="text-2xl font-bold">Cursos</h1>
                <a href="{{ route('admin.courses.create') }}"
                    class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded">
                    + Nuevo Curso
                </a>
            </div>

            @if (session('success'))
                <div class="mb-4 p-3 bg-green-100 text-green-700 rounded">
                    {{ session('success') }}
                </div>
            @endif

            <div class="grid md:grid-cols-3 gap-6">
                @forelse($courses as $course)
                    <div class="bg-white rounded shadow hover:shadow-lg transition">
                        {{-- Thumbnail --}}
                        @if ($course->thumbnail)
                            <img src="{{ $course->thumbnail }}" class="w-full h-40 object-cover rounded-t">
                        @endif
                        <div class="p-4">
                            <h2 class="font-semibold text-lg">
                                {{ $course->title }}
                            </h2>
                            <p class="text-sm text-gray-600 mt-2">
                                {{ Str::limit($course->description, 80) }}
                            </p>
                            <p class="text-xs text-blue-600">
                                {{ $course->category?->name }}
                            </p>
                            <div class="flex justify-between items-center mt-4">
                                <span
                                    class="text-xs px-2 py-1 rounded
                                    {{ $course->status === 'published' ? 'bg-green-100 text-green-700' : 'bg-yellow-100 text-yellow-700' }}">
                                    {{ ucfirst($course->status) }}
                                </span>
                                <div class="flex gap-2">
                                    <a href="{{ route('admin.courses.edit', $course) }}"
                                        class="text-blue-600 hover:underline text-sm">
                                        Editar
                                    </a>
                                    <form method="POST" action="{{ route('admin.courses.destroy', $course) }}">
                                        @csrf @method('DELETE')
                                        <button onclick="return confirm('¿Eliminar curso?')"
                                            class="text-red-600 hover:underline text-sm">
                                            Eliminar
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <p>No hay cursos aún.</p>
                @endforelse
            </div>

            <div class="mt-6">
                {{ $courses->links() }}
            </div>
        </div>
    </x-wire-card>
</x-admin-layout>
