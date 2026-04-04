<x-admin-layout title="Posts" :breadcrumbs="[
    [
        'name' => 'Dashboard',
        'href' => route('admin.dashboard'),
    ],
    [
        'name' => 'Multimedia Empresarial - Listar',
    ],
]">

    <x-slot name="action">
        <x-wire-button blue href="{{ route('admin.videos.create') }}">
            <i class="ri-add-large-line"></i>
            Nuevo
        </x-wire-button>

    </x-slot>

    <x-wire-card>

        <div class="p-4">
            <!-- Header -->
            <div class="flex flex-col md:flex-row md:items-center md:justify-between mb-6">
                <div class="mb-4 md:mb-0">
                    <h1 class="text-2xl font-bold text-gray-900 dark:text-white">Administración de Videos</h1>
                    <p class="text-gray-600 dark:text-gray-400">Gestiona todos los videos de la empresa</p>
                </div>
            </div>

            {{--  @livewire('admin.datatables.video-table') --}}

            <div class="p-6 bg-white rounded-lg shadow-md">
                <div class="flex justify-between items-center mb-6">
                    <h2 class="text-2xl font-bold text-gray-800">Gestión de Videos</h2>
                    <a href="{{ route('admin.videos.create') }}"
                        class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition">
                        <i class="fas fa-plus mr-2"></i>Nuevo Video
                    </a>
                </div>

                <!-- Filtros -->
                <div class="mb-6 bg-gray-50 p-4 rounded-lg">
                    <form method="GET" class="grid grid-cols-1 md:grid-cols-4 gap-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Buscar</label>
                            <input type="text" name="search" value="{{ request('search') }}"
                                class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Categoría</label>
                            <select name="category_id" class="w-full px-3 py-2 border border-gray-300 rounded-lg">
                                <option value="">Todas</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}"
                                        {{ request('category_id') == $category->id ? 'selected' : '' }}>
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Estado</label>
                            <select name="status" class="w-full px-3 py-2 border border-gray-300 rounded-lg">
                                <option value="">Todos</option>
                                <option value="draft" {{ request('status') == 'draft' ? 'selected' : '' }}>Borrador
                                </option>
                                <option value="published" {{ request('status') == 'published' ? 'selected' : '' }}>
                                    Publicado</option>
                                <option value="archived" {{ request('status') == 'archived' ? 'selected' : '' }}>
                                    Archivado</option>
                            </select>
                        </div>
                        <div class="flex items-end">
                            <button type="submit"
                                class="w-full px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">
                                Filtrar
                            </button>
                        </div>
                    </form>
                </div>

                <!-- Tabla de videos -->
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Título
                                </th>
                                <th
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Categoría
                                </th>
                                <th
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Estado
                                </th>
                                <th
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Fecha
                                </th>
                                <th
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Acciones
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @forelse($videos as $video)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <div class="flex-shrink-0 h-10 w-16 mr-3">
                                                <img class="h-10 w-16 object-cover rounded"
                                                    src="{{ $video->thumbnail_source }}" alt="{{ $video->title }}">
                                            </div>
                                            <div>
                                                <div class="text-sm font-medium text-gray-900">
                                                    {{ $video->title }}
                                                </div>
                                                <div class="text-sm text-gray-500">
                                                    Subido por {{ $video->user->name }}
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <span
                                            class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-blue-100 text-blue-800">
                                            {{ $video->category->name }}
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        @if ($video->status == 'published')
                                            <span
                                                class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                                Publicado
                                            </span>
                                        @elseif($video->status == 'draft')
                                            <span
                                                class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">
                                                Borrador
                                            </span>
                                        @else
                                            <span
                                                class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">
                                                Archivado
                                            </span>
                                        @endif
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        {{ $video->created_at->format('d/m/Y') }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                        <a href="{{ route('admin.videos.show', $video) }}"
                                            class="text-blue-600 hover:text-blue-900 mr-3">
                                            <i class="las la-eye text-2xl"></i>
                                        </a>
                                        <a href="{{ route('admin.videos.edit', $video) }}"
                                            class="text-green-600 hover:text-green-900 mr-3">
                                            <i class="las la-edit text-2xl"></i>
                                        </a>
                                        <form action="{{ route('admin.videos.destroy', $video) }}" method="POST"
                                            class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-600 hover:text-red-900"
                                                onclick="return confirm('¿Estás seguro de eliminar este video?')">
                                                <i class="las la-trash text-2xl"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="px-6 py-4 text-center text-gray-500">
                                        No se encontraron videos.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <!-- Paginación -->
                <div class="mt-4">
                    {{ $videos->links() }}
                </div>
            </div>
        </div>
    </x-wire-card>


</x-admin-layout>
