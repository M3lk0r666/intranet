@extends('layouts.intranet')

@section('title', 'Intranet Corporativa')

@push('css')
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="/assets/css/intrahome.css" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com?plugins=forms,typography,container-queries"></script>
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
                            <span class="ml-1 text-sm text-primary font-medium md:ml-2">Biblioteca</span>
                        </div>
                    </li>
                </ol>
            </nav>
        </div>
    </div>

    <!-- Encabezado -->
    <div class="mt-8 mb-8">
        <h1 class="text-3xl font-black text-slate-900 tracking-tight mb-2">Biblioteca de Recursos Materiales</h1>
        <p class="text-slate-500  mt-2">Acceda a documentacion, guías, tutoriales, formatos y plantillas oficiales de la
            empresa.</p>
    </div>

    <div class="bg-white rounded-2xl border border-slate-200 p-5 mb-8">
        <div class="flex flex-wrap gap-2">
            {{-- TODAS --}}
            <a href="{{ route('intranet.biblioteca-recursos.departamentos', ['category' => 'all']) }}"
                class="flex items-center gap-2 px-4 py-2 rounded-full text-xs font-bold transition
               {{ $selectedCategory === 'all'
                   ? 'bg-primary/10 border border-primary/30 text-primary'
                   : 'bg-white border border-slate-200 text-slate-600 hover:border-primary hover:text-primary' }}">
                <i class="las la-layer-group text-xl"></i>
                Todas
                <span class="ml-1 bg-slate-100 text-slate-600 px-2 py-0.5 rounded-full text-[10px]">
                    {{ \App\Models\FileDocument::count() }}
                </span>
            </a>

            {{-- CATEGORÍAS --}}
            @foreach ($categoriesWithCount as $key => $category)
                <a href="{{ route('intranet.biblioteca-recursos.departamentos', ['category' => $key]) }}"
                    class="group flex items-center gap-2 px-4 py-2 rounded-full text-xs font-bold transition
                   {{ $selectedCategory === $key
                       ? 'border'
                       : 'border border-slate-200 text-slate-600 hover:border-primary hover:text-primary' }}"
                    style="
                        {{ $selectedCategory === $key
                            ? "background-color: {$category['color']}15; border-color: {$category['color']}; color: {$category['color']}"
                            : '' }}
                   ">
                    <i class="{{ $category['icon'] }} text-2xl" style="color: {{ $category['color'] }}"></i>
                    {{ $category['name'] }}

                    <span class="ml-1 px-2 py-0.5 rounded-full text-[10px] font-bold"
                        style="background-color: {{ $category['color'] }}15; color: {{ $category['color'] }}">
                        {{ $category['count'] }}
                    </span>
                </a>
            @endforeach
        </div>
    </div>

    <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6 mb-6">
        <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-4">
            <div>
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

            <!-- Desktop Navigation -->
            <div class="hidden md:flex items-center space-x-4">
                <!-- Search -->
                <form method="GET" action="{{ route('intranet.biblioteca-recursos.departamentos') }}" class="relative">
                    <div class="relative">
                        <input type="text" name="search" value="{{ request('search') }}"
                            class="w-64 pl-10 pr-4 py-2 rounded-lg text-gray-800 focus:outline-none focus:ring-2 focus:ring-blue-500"
                            placeholder="Buscar documentos...">
                        <div class="absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400">
                            <i class="fas fa-search"></i>
                        </div>
                    </div>
                </form>
            </div>

            <!-- Filters -->
            <div class="flex flex-wrap gap-3">
                <!-- Sort Dropdown -->
                <div class="relative">
                    <select onchange="window.location.href = this.value"
                        class="appearance-none bg-white border border-gray-300 rounded-lg pl-4 pr-10 py-2 focus:ring-2 focus:ring-primary-500 focus:border-primary-500 outline-none text-sm">
                        <option
                            value="{{ route('intranet.biblioteca-recursos.departamentos', ['category' => $selectedCategory, 'search' => $search]) }}">
                            Más recientes
                        </option>
                        <option
                            value="{{ route('intranet.biblioteca-recursos.departamentos', ['category' => $selectedCategory, 'search' => $search, 'sort' => 'downloads']) }}">
                            Más descargados
                        </option>
                        <option
                            value="{{ route('intranet.biblioteca-recursos.departamentos', ['category' => $selectedCategory, 'search' => $search, 'sort' => 'title']) }}">
                            A-Z
                        </option>
                    </select>
                    <i
                        class="fas fa-chevron-down absolute right-3 top-1/2 transform -translate-y-1/2 text-gray-400 pointer-events-none"></i>
                </div>

                @if ($search)
                    <a href="{{ route('intranet.biblioteca-recursos.departamentos', ['category' => $selectedCategory]) }}"
                        class="inline-flex items-center px-4 py-2 bg-red-100 text-red-700 rounded-lg hover:bg-red-200 transition-colors text-sm">
                        <i class="fas fa-times mr-2"></i> Limpiar búsqueda
                    </a>
                @endif
            </div>
        </div>
    </div>

    <div class="bg-white rounded-2xl border border-slate-200 p-5 mb-8">

        <!-- Documents Grid -->
        @if ($documents->count() > 0)
            <!-- Resource Grid -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
                <!-- Cards -->
                @foreach ($documents as $document)
                    <div
                        class="group bg-white rounded-2xl border border-slate-200
           hover:border-primary/40 hover:shadow-xl hover:shadow-primary/10
           transition-all duration-300 overflow-hidden flex flex-col">

                        <!-- HEADER / CATEGORÍA -->
                        <div class="px-5 py-3 border-b"
                            style="background-color: {{ $document->category_info->color }}10;
                border-color: {{ $document->category_info->color }}30">

                            <div class="flex items-center justify-between">
                                <span
                                    class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full
                       text-[10px] font-bold uppercase tracking-wide"
                                    style="background-color: {{ $document->category_info->color }}20;
                       color: {{ $document->category_info->color }}">
                                    <i class="las la-tag text-xs"></i>
                                    {{ $document->category_info->name }}
                                </span>

                                <span class="text-[10px] text-slate-500">
                                    {{ $document->created_at->format('d/m/Y') }}
                                </span>
                            </div>
                        </div>

                        <!-- BODY -->
                        <div class="p-5 flex-1 flex flex-col">

                            <div class="flex items-start gap-4 mb-4">

                                <!-- Icono documento -->
                                <div class="shrink-0 p-3 rounded-xl"
                                    style="background-color: {{ $document->category_info->color }}15;
                        color: {{ $document->category_info->color }}">
                                    <i class="{{ $document->icon }} text-2xl"></i>
                                </div>

                                <!-- Info -->
                                <div class="flex-1 min-w-0">
                                    <h3 class="font-semibold text-sm text-slate-900 mb-1 line-clamp-2">
                                        {{ $document->title }}
                                    </h3>

                                    @if ($document->description)
                                        <p class="text-xs text-slate-500 leading-relaxed line-clamp-2 mb-3">
                                            {{ $document->description }}
                                        </p>
                                    @endif

                                    <div class="flex items-center gap-4 text-[10px] text-slate-400">
                                        <span class="flex items-center gap-1">
                                            <i class="las la-file-alt"></i>
                                            .{{ strtoupper($document->extension) }}
                                        </span>
                                        <span>{{ $document->formatted_size }}</span>
                                    </div>
                                </div>
                            </div>

                            <!-- STATS -->
                            <div class="mt-auto flex items-center justify-between text-xs">

                                <div class="flex items-center gap-2 text-slate-600">
                                    <i class="las la-download text-primary"></i>
                                    <span class="font-semibold">{{ $document->downloads }}</span>
                                    <span class="text-slate-400">descargas</span>
                                </div>

                                <div class="flex items-center gap-1 text-slate-400">
                                    <i class="las la-user"></i>
                                    {{ $document->user->name ?? 'Sistema' }}
                                </div>
                            </div>
                        </div>

                        <!-- ACTIONS -->
                        <div class="px-5 pb-5">
                            <div class="flex gap-2">
                                <a href="{{ route('intranet.biblioteca-recursos.ver-detalle', $document) }}"
                                    class="flex-1 inline-flex items-center justify-center gap-2 px-4 py-2 rounded-lg text-xs font-medium bg-slate-100 text-slate-600 hover:bg-primary/10 hover:text-primary transition">
                                    <i class="las la-eye text-xl"></i>
                                    Ver
                                </a>

                                <a href="{{ route('intranet.documentos.download', $document) }}"
                                    class="flex-1 inline-flex items-center justify-center gap-2 px-4 py-2 rounded-lg text-xs font-semibold text-white shadow-md hover:shadow-lg transition"
                                    style="background-color: {{ $document->category_info->color }}">
                                    <i class="las la-download text-xl"></i>
                                    Descargar
                                </a>
                            </div>
                        </div>

                    </div>
                @endforeach
            </div>
        @else
            <!-- Empty State -->
            <div class="text-center py-12">
                <div class="inline-flex items-center justify-center w-24 h-24 rounded-full bg-gray-100 mb-6">
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
                <a href="{{ route('intranet.documentos.index') }}"
                    class="inline-flex items-center px-6 py-3 bg-primary-600 text-white rounded-lg hover:bg-primary-700 transition-colors duration-200">
                    <i class="fas fa-home mr-2"></i> Volver al inicio
                </a>
            </div>
        @endif
        <!-- Pagination -->
        <div class="mt-12 flex items-center justify-center gap-2">
            <button
                class="p-2 rounded-lg border border-slate-200 dark:border-slate-700 text-slate-400 hover:text-primary transition-colors">
                <span class="material-symbols-outlined">chevron_left</span>
            </button>
            <button class="h-10 w-10 rounded-lg bg-primary text-white font-bold text-sm">1</button>
            <button
                class="h-10 w-10 rounded-lg text-slate-600 dark:text-slate-400 font-bold text-sm hover:bg-slate-200 dark:hover:bg-slate-800 transition-colors">2</button>
            <button
                class="h-10 w-10 rounded-lg text-slate-600 dark:text-slate-400 font-bold text-sm hover:bg-slate-200 dark:hover:bg-slate-800 transition-colors">3</button>
            <span class="text-slate-400 px-2">...</span>
            <button
                class="h-10 w-10 rounded-lg text-slate-600 dark:text-slate-400 font-bold text-sm hover:bg-slate-200 dark:hover:bg-slate-800 transition-colors">12</button>
            <button
                class="p-2 rounded-lg border border-slate-200 dark:border-slate-700 text-slate-400 hover:text-primary transition-colors">
                <span class="material-symbols-outlined">chevron_right</span>
            </button>
        </div>
    </div>

@endsection
@push('js')
    <script>
        // Smooth scroll for categories
        document.querySelectorAll('a[href="#categorias"]').forEach(anchor => {
            anchor.addEventListener('click', function(e) {
                e.preventDefault();
                const categoriasSection = document.getElementById('categorias');
                if (categoriasSection) {
                    categoriasSection.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            });
        });
    </script>
@endpush
