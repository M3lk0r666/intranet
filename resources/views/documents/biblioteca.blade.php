@extends('layouts.intranet')

@section('title', 'Intranet Corporativa')

@push('css')
    <link href="/assets/css/intrahome.css" rel="stylesheet">
@endpush

@section('content')

    <!-- Breadcrumb -->
    <div class="bg-white border-b border-gray-200">
        <div class="container mx-auto px-4 py-3">
            <nav class="flex" aria-label="Breadcrumb">
                <ol class="inline-flex items-center space-x-1 md:space-x-3">
                    <li class="inline-flex items-center">
                        <a href="{{ route('bienvenido') }}"
                            class="inline-flex items-center text-sm text-gray-600 hover:text-orange-600">
                            <i class="fas fa-home mr-2"></i>
                            Home
                        </a>
                    </li>
                    <li>
                        <div class="flex items-center">
                            <i class="fas fa-chevron-right text-gray-400 mx-2"></i>
                            <a href="{{ route('intranet.index') }}"
                                class="ml-1 text-sm text-gray-600 hover:text-orange-600 md:ml-2">Intranet</a>
                        </div>
                    </li>
                    <li aria-current="page">
                        <div class="flex items-center">
                            <i class="fas fa-chevron-right text-gray-400 mx-2"></i>
                            <span class="ml-1 text-sm text-primary font-medium md:ml-2">Biblioteca de Recursos</span>
                        </div>
                    </li>
                </ol>
            </nav>
        </div>
    </div>

    <!-- Encabezado -->
    <div class="mb-6 flex flex-col md:flex-row md:items-end justify-between gap-6 mt-8">
        <div class="max-w-4xl">
            <h1 class="text-2xl md:text-4xl font-black tracking-tight mb-4">Biblioteca de Recursos Digitales</h1>
            <p class="text-slate-600 dark:text-slate-400 text-md leading-relaxed">
                Acceda a documentación técnica, guías operativas, tutoriales multimedia y formatos oficiales actualizados de
                la empresa para optimizar sus procesos diarios.
            </p>
        </div>
    </div>

    <div class="bg-white rounded-2xl border border-slate-200 p-5 mb-8 mt-8">
        <div class="w-full px-4 sm:px-6 lg:px-8 py-8">
            <div class="flex items-center justify-between mb-8">
                <!-- IZQUIERDA -->
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 rounded-xl bg-primary/10 flex items-center justify-center text-primary">
                        <i class="las la-terminal"></i>
                    </div>
                    <h2 class="text-xl font-semibold text-slate-800">
                        Tecnologías de Información (TI)
                    </h2>
                </div>
                <!-- DERECHA -->
                <div class="flex items-center gap-2 bg-white border border-slate-200 px-3 py-1 rounded-full shadow-sm">
                    <span class="text-xs text-slate-500">
                        Hay un total de
                    </span>
                    <span class="text-lg font-bold text-primary">
                        {{ \App\Models\FileDocument::count() }}
                    </span>
                    <span class="text-xs text-slate-500">
                        documentos para consultar.
                    </span>
                </div>
            </div>
            <!-- LAYOUT -->
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-8">
                <!-- SIDEBAR -->
                <aside class="lg:col-span-3">
                    <div class="bg-white rounded-2xl border border-slate-200 p-5 shadow-sm sticky top-6">
                        <h3 class="text-xs font-bold uppercase tracking-wider text-slate-500 mb-4">
                            Categorías
                        </h3>
                        <!-- Todas -->
                        <a href="{{ route('documentos.biblioteca') }}"
                            class="flex items-center justify-between px-3 py-2 rounded-lg text-sm transition {{ $selectedCategory == 'all' ? 'bg-primary/10 text-primary font-semibold' : 'text-slate-600 hover:bg-slate-100' }}">
                            <span class="flex items-center gap-2">
                                <i class="las la-layer-group"></i>
                                Todas
                            </span>
                            <span class="text-xs">{{ \App\Models\FileDocument::count() }}</span>
                        </a>
                        <!-- Dinámicas -->
                        <div class="mt-2 space-y-1">
                            @foreach ($categoriesWithCount as $key => $category)
                                <a href="{{ route('documentos.biblioteca', ['category' => $key]) }}"
                                    class="flex items-center justify-between px-3 py-2 rounded-lg text-sm transition {{ $selectedCategory == $key ? 'bg-primary/10 font-semibold' : 'text-slate-600 hover:bg-slate-100' }}">
                                    <span class="flex items-center gap-2">
                                        <i class="{{ $category['icon'] }}"></i>
                                        {{ $category['name'] }}
                                    </span>
                                    <span class="text-xs">{{ $category['count'] }}</span>
                                </a>
                            @endforeach
                        </div>
                    </div>
                </aside>

                <!-- CONTENIDO -->
                <div class="lg:col-span-9">
                    <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6 mb-6">
                        <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-4">
                            <!-- Título -->
                            <div class="shrink-0">
                                <h2 class="text-2xl font-bold text-gray-800">
                                    @if ($selectedCategory !== 'all')
                                        {{ $categoriesWithCount[$selectedCategory]['name'] ?? 'Documentos' }}
                                    @else
                                        Todos los Documentos
                                    @endif
                                </h2>
                                @if ($search)
                                    <p class="text-gray-600 mt-1">
                                        Resultados para: <span class="font-semibold">"{{ $search }}"</span>
                                    </p>
                                @endif
                            </div>
                            <!-- Derecha: filtros + buscador -->
                            <div class="flex flex-wrap items-center gap-3 w-full md:w-auto">
                                <!-- Search -->
                                <form method="GET" action="{{ route('documentos.biblioteca') }}" class="relative">
                                    <div class="relative">
                                        <input type="text" name="search" value="{{ request('search') }}"
                                            class="w-full md:w-64 pl-10 pr-4 py-2 rounded-lg border border-gray-300 text-gray-800 focus:outline-none focus:ring-2 focus:ring-primary-500"
                                            placeholder="Buscar documentos...">
                                        <div class="absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400">
                                            <i class="fas fa-search"></i>
                                        </div>
                                    </div>
                                </form>
                                <!-- Sort Dropdown -->
                                <div class="relative">
                                    <select onchange="window.location.href = this.value"
                                        class="appearance-none bg-white border border-gray-300 rounded-lg pl-4 pr-10 py-2 focus:ring-2 focus:ring-primary-500 focus:border-primary-500 outline-none text-sm">
                                        <option
                                            value="{{ route('documentos.biblioteca', ['category' => $selectedCategory, 'search' => $search]) }}">
                                            Más recientes
                                        </option>
                                        <option
                                            value="{{ route('documentos.biblioteca', ['category' => $selectedCategory, 'search' => $search, 'sort' => 'downloads']) }}">
                                            Más descargados
                                        </option>
                                        <option
                                            value="{{ route('documentos.biblioteca', ['category' => $selectedCategory, 'search' => $search, 'sort' => 'title']) }}">
                                            A-Z
                                        </option>
                                    </select>
                                    <i
                                        class="fas fa-chevron-down absolute right-3 top-1/2 transform -translate-y-1/2 text-gray-400 pointer-events-none"></i>
                                </div>
                                <!-- Limpiar búsqueda -->
                                @if ($search)
                                    <a href="{{ route('documentos.biblioteca', ['category' => $selectedCategory]) }}"
                                        class="inline-flex items-center px-4 py-2 bg-red-100 text-red-700 rounded-lg hover:bg-red-200 transition-colors text-sm">
                                        <i class="fas fa-times mr-2"></i> Limpiar búsqueda
                                    </a>
                                @endif
                            </div>
                        </div>
                    </div>

                    <div>
                        <!-- Documents Grid -->
                        @if ($documents->count() > 0)
                            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                                @foreach ($documents as $document)
                                    <div
                                        class="group bg-white border border-slate-200 rounded-2xl p-5
                                        hover:shadow-md hover:border-primary/40 transition">
                                        <!-- Header -->
                                        <div class="flex items-center justify-between mb-3">
                                            <span class="text-xs font-semibold"
                                                style="color: {{ $document->category_info->color }}">
                                                {{ $document->category_info->name }}
                                            </span>
                                            <span class="text-xs text-slate-400">
                                                {{ $document->created_at->format('d/m/Y') }}
                                            </span>
                                        </div>
                                        <!-- Contenido -->
                                        <div class="flex items-start gap-3 mb-4">
                                            <div class="p-3 rounded-xl"
                                                style="background-color: {{ $document->category_info->color }}15;
                                                color: {{ $document->category_info->color }}">
                                                <i class="{{ $document->icon }} text-lg"></i>
                                            </div>
                                            <div class="flex-1">
                                                <h3
                                                    class="font-semibold text-slate-800 text-sm group-hover:text-primary transition">
                                                    {{ $document->title }}
                                                </h3>
                                                @if ($document->description)
                                                    <p class="text-xs text-slate-500 mt-1 line-clamp-2">
                                                        {{ $document->description }}
                                                    </p>
                                                @endif
                                            </div>
                                        </div>
                                        <!-- Footer -->
                                        <div class="flex items-center justify-between text-xs text-slate-500">
                                            <span class="flex items-center gap-1">
                                                <i class="las la-file"></i>
                                                .{{ strtoupper($document->extension) }}
                                            </span>
                                            <span>{{ $document->formatted_size }}</span>
                                        </div>
                                        <!-- Acciones -->
                                        <div class="flex gap-2 mt-4">
                                            <a href="{{ route('documentos.ver-detalle', $document) }}"
                                                class="flex-1 text-center text-xs py-2 rounded-lg bg-slate-100 text-slate-600 hover:bg-slate-200">
                                                Ver
                                            </a>
                                            <a href="{{ route('documentos.download', $document) }}"
                                                class="flex-1 text-center text-xs py-2 rounded-lg text-white"
                                                style="background-color: {{ $document->category_info->color }}">
                                                Descargar
                                            </a>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <!-- Pagination -->
                            @if ($documents->hasPages())
                                <div class="mt-8">
                                    {{ $documents->links('vendor.pagination.tailwind') }}
                                </div>
                            @endif
                        @else
                            <!-- Empty State -->
                            <div class="text-center py-12">
                                <div
                                    class="inline-flex items-center justify-center w-24 h-24 rounded-full bg-gray-100 mb-6">
                                    <i class="fas fa-search text-gray-400 text-4xl"></i>
                                </div>
                                <h3 class="text-2xl font-bold text-gray-700 mb-3">No se encontraron documentos</h3>
                                <p class="text-gray-600 max-w-md mx-auto mb-8">
                                    @if ($selectedCategory !== 'all' || $search)
                                        No hay documentos que coincidan con tus criterios de búsqueda.
                                    @else
                                        Aún no hay documentos disponibles en la biblioteca.
                                    @endif
                                </p>
                                <a href="{{ route('documentos.biblioteca') }}"
                                    class="inline-flex items-center px-6 py-3 bg-primary-600 text-white rounded-lg hover:bg-primary-700 transition-colors duration-200">
                                    <i class="fas fa-home mr-2"></i> Volver al inicio
                                </a>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
