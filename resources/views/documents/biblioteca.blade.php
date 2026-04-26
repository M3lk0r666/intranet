@extends('layouts.intranet')

@section('title', 'Biblioteca de Recursos Digitales')

@push('css')
    <link href="/assets/css/intrahome.css" rel="stylesheet">
    {{--  <style>
        :root {
            --primary: #c2622a;
            --primary-light: #f5ede6;
            --primary-dark: #9e4e1e;
        }

        
    </style> --}}
@endpush

@section('content')

    {{-- ── Breadcrumb ── --}}
    <div class="bg-white border-b border-gray-200">
        <div class="container mx-auto px-4 py-3">
            <nav class="flex" aria-label="Breadcrumb">
                <ol class="inline-flex items-center space-x-1 md:space-x-3">
                    <li class="inline-flex items-center">
                        <a href="{{ route('bienvenido') }}"
                            class="inline-flex items-center text-sm text-gray-600 hover:text-orange-600">
                            <i class="fas fa-home mr-2"></i> Home
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
                            <span class="ml-1 text-sm text-orange-600 font-medium md:ml-2">Biblioteca de Recursos</span>
                        </div>
                    </li>
                </ol>
            </nav>
        </div>
    </div>

    <div class="px-6 py-7">

        {{-- ── Hero ── --}}
        <div class="biblioteca-hero">
            <div class="hero-top">
                <div>
                    <h1 class="hero-title">Biblioteca de <span>Recursos Digitales</span></h1>
                    <p class="hero-desc">
                        Documentación técnica, guías operativas, tutoriales multimedia y formatos
                        oficiales actualizados para optimizar tus procesos diarios.
                    </p>
                </div>
                <div class="hero-total-pill">
                    <span class="big">{{ \App\Models\FileDocument::count() }}</span>
                    <div>
                        <div class="small" style="color:rgba(255,255,255,.7);font-weight:600">documentos</div>
                        <div class="small">disponibles</div>
                    </div>
                </div>
            </div>
            <div class="hero-stats">
                <div class="hero-stat">
                    <div class="num">9</div>
                    <div class="lbl">Categorías</div>
                </div>
                <div class="hero-sep"></div>
                <div class="hero-stat">
                    <div class="num">TI</div>
                    <div class="lbl">Departamento</div>
                </div>
                <div class="hero-sep"></div>
                <div class="hero-stat">
                    <div class="num">Libre</div>
                    <div class="lbl">Acceso</div>
                </div>
            </div>
        </div>

        {{-- ── Layout ── --}}
        <div class="biblioteca-layout">
            {{-- ════ SIDEBAR ════ --}}
            <aside class="bib-sidebar">
                <p class="sidebar-label">Categorías</p>
                {{-- Todas --}}
                <a href="{{ route('documentos.biblioteca') }}"
                    class="cat-link {{ $selectedCategory == 'all' ? 'active' : '' }}">
                    <span class="cat-icon"><i class="las la-layer-group"></i></span>
                    Todas
                    <span class="cat-count">{{ \App\Models\FileDocument::count() }}</span>
                </a>

                <hr class="sidebar-divider">

                {{-- Dinámicas --}}
                <div class="space-y-0.5">
                    @foreach ($categoriesWithCount as $key => $category)
                        <a href="{{ route('documentos.biblioteca', ['category' => $key]) }}"
                            class="cat-link {{ $selectedCategory == $key ? 'active' : '' }}">
                            <span class="cat-icon"><i class="{{ $category['icon'] }}"></i></span>
                            {{ $category['name'] }}
                            <span class="cat-count">{{ $category['count'] }}</span>
                        </a>
                    @endforeach
                </div>
            </aside>
            <div>

                {{-- Toolbar --}}
                <div class="content-toolbar">
                    {{-- Título activo --}}
                    <p class="toolbar-title">
                        @if ($selectedCategory !== 'all')
                            <span>{{ $categoriesWithCount[$selectedCategory]['name'] ?? 'Documentos' }}</span>
                        @else
                            <span>Todos</span> los documentos
                        @endif
                    </p>

                    {{-- Buscador --}}
                    <form method="GET" action="{{ route('documentos.biblioteca') }}" class="search-wrap">
                        <i class="fas fa-search"></i>
                        <input type="text" name="search" value="{{ request('search') }}"
                            placeholder="Buscar documentos..." class="search-input"
                            @if ($selectedCategory !== 'all') onchange="this.form.action='{{ route('documentos.biblioteca', ['category' => $selectedCategory]) }}'" @endif>
                        @if ($selectedCategory !== 'all')
                            <input type="hidden" name="category" value="{{ $selectedCategory }}">
                        @endif
                    </form>

                    {{-- Orden --}}
                    <div class="sort-wrap">
                        <select class="sort-select" onchange="window.location.href=this.value">
                            <option
                                value="{{ route('documentos.biblioteca', ['category' => $selectedCategory, 'search' => $search]) }}"
                                {{ !request('sort') ? 'selected' : '' }}>
                                Más recientes
                            </option>
                            <option
                                value="{{ route('documentos.biblioteca', ['category' => $selectedCategory, 'search' => $search, 'sort' => 'downloads']) }}"
                                {{ request('sort') == 'downloads' ? 'selected' : '' }}>
                                Más descargados
                            </option>
                            <option
                                value="{{ route('documentos.biblioteca', ['category' => $selectedCategory, 'search' => $search, 'sort' => 'title']) }}"
                                {{ request('sort') == 'title' ? 'selected' : '' }}>
                                A → Z
                            </option>
                        </select>
                        <i class="fas fa-chevron-down"></i>
                    </div>

                    {{-- Limpiar búsqueda --}}
                    @if ($search)
                        <a href="{{ route('documentos.biblioteca', ['category' => $selectedCategory]) }}"
                            class="btn-clear-search">
                            <i class="las la-times"></i> Limpiar
                        </a>
                    @endif

                    <span class="results-count">{{ $documents->total() }}
                        resultado{{ $documents->total() != 1 ? 's' : '' }}</span>
                </div>

                {{-- Aviso de búsqueda activa --}}
                @if ($search)
                    <div class="flex items-center gap-2 mb-4 px-1">
                        <i class="las la-search text-gray-400"></i>
                        <p class="text-sm text-gray-500">
                            Resultados para: <span class="font-semibold text-gray-700">"{{ $search }}"</span>
                        </p>
                    </div>
                @endif

                {{-- Grid de documentos --}}
                @if ($documents->count() > 0)
                    <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-3 gap-4">
                        @foreach ($documents as $document)
                            @php
                                $color = $document->category_info->color ?? '#c2622a';
                            @endphp
                            <div class="doc-card" style="--card-color: {{ $color }}">

                                {{-- Top: categoría + fecha --}}
                                <div class="doc-card-top">
                                    <span class="doc-cat-label" style="color: {{ $color }}">
                                        {{ $document->category_info->name }}
                                    </span>
                                    <span class="doc-date">{{ $document->created_at->format('d/m/Y') }}</span>
                                </div>

                                {{-- Cuerpo: icono + título + desc --}}
                                <div class="doc-card-body">
                                    <div class="doc-icon-box"
                                        style="background: {{ $color }}18; color: {{ $color }}">
                                        <i class="{{ $document->icon }}"></i>
                                    </div>
                                    <div class="flex-1 min-w-0">
                                        <p class="doc-title">{{ $document->title }}</p>
                                        @if ($document->description)
                                            <p class="doc-desc">{{ $document->description }}</p>
                                        @endif
                                    </div>
                                </div>

                                {{-- Footer: extensión + tamaño --}}
                                <div class="doc-card-footer">
                                    <span class="doc-ext-badge">
                                        .{{ strtoupper($document->extension) }}
                                    </span>
                                    <span class="doc-size">{{ $document->formatted_size }}</span>
                                </div>

                                {{-- Acciones --}}
                                <div class="doc-actions">
                                    <a href="{{ route('documentos.ver-detalle', $document) }}"
                                        class="doc-btn doc-btn-ver">
                                        <i class="las la-eye"></i> Ver
                                    </a>
                                    <a href="{{ route('documentos.download', $document) }}" class="doc-btn doc-btn-dl"
                                        style="background-color: {{ $color }}">
                                        <i class="las la-download"></i> Descargar
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    {{-- Paginación --}}
                    @if ($documents->hasPages())
                        <div class="mt-6">
                            {{ $documents->links('vendor.pagination.tailwind') }}
                        </div>
                    @endif
                @else
                    {{-- Empty state --}}
                    <div class="empty-state">
                        <i class="las la-folder-open"></i>
                        <h3>No se encontraron documentos</h3>
                        <p>
                            @if ($selectedCategory !== 'all' || $search)
                                Ningún documento coincide con los criterios de búsqueda.
                            @else
                                Aún no hay documentos disponibles en esta categoría.
                            @endif
                        </p>
                        <a href="{{ route('documentos.biblioteca') }}"
                            class="inline-flex items-center gap-2 mt-5 px-5 py-2 rounded-lg text-sm font-semibold text-white"
                            style="background: var(--primary)">
                            <i class="las la-arrow-left"></i> Ver todos los documentos
                        </a>
                    </div>
                @endif
            </div>
        </div>
    </div>

@endsection
