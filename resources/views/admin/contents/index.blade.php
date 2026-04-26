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
        <div class="p-6">

            {{-- Header --}}
            <div class="flex justify-between items-center mb-6">
                <h1 class="text-2xl font-bold">Formación Académica</h1>

                <a href="{{ route('admin.contents.create') }}"
                    class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700">
                    + Nuevo contenido
                </a>
            </div>

            <div class="mb-6 flex gap-2">

                <a href="?type=all" class="px-3 py-1 bg-gray-200 rounded">Todos</a>
                <a href="?type=pdf" class="px-3 py-1 bg-red-100 text-red-600 rounded">PDF</a>
                <a href="?type=guide" class="px-3 py-1 bg-blue-100 text-blue-600 rounded">Guías</a>

            </div>

            {{-- Grid --}}
            <div class="grid gap-6 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4">

                @forelse($contents as $content)
                    <div class="bg-white rounded-xl shadow hover:shadow-lg transition overflow-hidden group relative">
                        <form method="POST" action="{{ route('admin.contents.toggle', $content) }}">
                            @csrf
                            @method('PATCH')

                            <button
                                class="text-xs px-2 py-1 rounded
                                {{ $content->status ? 'bg-green-100 text-green-600' : 'bg-gray-200 text-gray-500' }}">
                                {{ $content->status ? 'Publicado' : 'Borrador' }}
                            </button>
                        </form>
                        {{-- Thumbnail --}}
                        <div class="relative">
                            <img src="{{ $content->thumbnail ? asset('storage/' . $content->thumbnail) : 'https://via.placeholder.com/300x200' }}"
                                class="w-full h-40 object-cover">

                            {{-- Tipo --}}
                            <span
                                class="absolute top-2 left-2 px-2 py-1 text-xs rounded
                            {{ $content->isPdf() ? 'bg-red-500 text-white' : 'bg-blue-500 text-white' }}">
                                {{ strtoupper($content->type) }}
                            </span>

                            {{-- 🔥 MENÚ --}}
                            <div class="absolute top-2 right-2">
                                <button id="dropdownButton{{ $content->id }}"
                                    data-dropdown-toggle="dropdown{{ $content->id }}"
                                    class="bg-white/80 hover:bg-white p-1.5 rounded-full shadow">
                                    ⋮
                                </button>

                                <div id="dropdown{{ $content->id }}"
                                    class="hidden z-10 w-32 bg-white rounded-lg shadow">

                                    <ul class="text-sm text-gray-700">

                                        <li>
                                            <a href="{{ route('admin.contents.show', $content) }}"
                                                class="block px-4 py-2 hover:bg-gray-100">
                                                👁 Ver
                                            </a>
                                        </li>

                                        <li>
                                            <a href="{{ route('admin.contents.edit', $content) }}"
                                                class="block px-4 py-2 hover:bg-gray-100">
                                                ✏️ Editar
                                            </a>
                                        </li>

                                        <li>
                                            <form action="{{ route('admin.contents.destroy', $content) }}"
                                                method="POST">
                                                @csrf
                                                @method('DELETE')

                                                <button onclick="return confirm('¿Eliminar contenido?')"
                                                    class="w-full text-left px-4 py-2 hover:bg-red-100 text-red-600">
                                                    🗑 Eliminar
                                                </button>
                                            </form>
                                        </li>

                                    </ul>
                                </div>
                            </div>
                        </div>

                        {{-- Body --}}
                        <div class="p-4">
                            <h2 class="font-semibold text-sm mb-2 line-clamp-2">
                                {{ $content->title }}
                            </h2>

                            <p class="text-xs text-gray-500 mb-2">
                                {{ $content->category?->name ?? 'Sin categoría' }}
                            </p>

                            <a href="{{ route('admin.contents.show', $content) }}"
                                class="block text-center bg-gray-100 hover:bg-gray-200 text-sm py-2 rounded">
                                Ver contenido
                            </a>
                        </div>

                    </div>

                @empty
                    <p class="col-span-full text-center text-gray-500">
                        No hay contenidos disponibles
                    </p>
                @endforelse

            </div>

            {{-- Paginación --}}
            <div class="mt-6">
                {{ $contents->links() }}
            </div>

        </div>
    </x-wire-card>
</x-admin-layout>
