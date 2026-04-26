@extends('layouts.intranet')

@section('title', 'Formación Académica')

@push('css')
    <link href="/assets/css/intrahome.css" rel="stylesheet">
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
                            <span class="ml-1 text-sm text-orange-600 font-medium md:ml-2">Formación Académica</span>
                        </div>
                    </li>
                </ol>
            </nav>
        </div>
    </div>

    <div class="px-6 py-8">
        {{-- ── Hero ── --}}
        <div class="academia-hero">
            <h1 class="hero-title">Formación <span>Académica</span></h1>
            <p class="hero-desc">
                Fortalece tus conocimientos y mantente actualizado. Accede a videos, guías prácticas
                y materiales de apoyo en distintas áreas tecnológicas.
            </p>
            <div class="hero-stats">
                <div class="hero-stat">
                    <div class="num">{{ $courses->total() }}</div>
                    <div class="lbl">Cursos disponibles</div>
                </div>
                <div class="hero-stat-sep"></div>
                <div class="hero-stat">
                    <div class="num">{{ $categories->count() }}</div>
                    <div class="lbl">Categorías</div>
                </div>
                <div class="hero-stat-sep"></div>
                <div class="hero-stat">
                    <div class="num">Libre</div>
                    <div class="lbl">Acceso</div>
                </div>
            </div>
        </div>

        {{-- ── Layout principal ── --}}
        <div class="academy-layout">
            {{-- SIDEBAR --}}
            <aside class="sidebar">
                <form method="GET" action="{{ route('courses.index') }}" id="filterForm">
                    {{-- Buscador --}}
                    <p class="sidebar-section-title">Buscar</p>
                    <div class="relative mb-1">
                        <i class="fas fa-search absolute left-2.5 top-1/2 -translate-y-1/2 text-gray-300 text-xs"></i>
                        <input type="text" name="search" value="{{ request('search') }}"
                            placeholder="Nombre del curso..." style="padding-left:28px"
                            class="w-full border rounded-lg p-2 text-sm bg-gray-50 focus:outline-none focus:border-orange-400">
                    </div>
                    <hr class="sidebar-divider">
                    {{-- Ordenar --}}
                    <p class="sidebar-section-title">Ordenar por</p>
                    <select name="order" class="mb-1">
                        <option value="latest" {{ request('order') == 'latest' ? 'selected' : '' }}>Más recientes</option>
                        <option value="oldest" {{ request('order') == 'oldest' ? 'selected' : '' }}>Más antiguos</option>
                        <option value="az" {{ request('order') == 'az' ? 'selected' : '' }}>A → Z</option>
                    </select>
                    <hr class="sidebar-divider">
                    {{-- Categorías --}}
                    <p class="sidebar-section-title">Categoría</p>
                    <div class="space-y-0.5">
                        <a href="{{ route('courses.index', array_merge(request()->except('category'), [])) }}"
                            class="cat-pill {{ !request('category') ? 'active' : '' }}">
                            <span class="dot" style="background:#888"></span>
                            Todas
                        </a>
                        @foreach ($categories as $category)
                            <a href="{{ route('courses.index', array_merge(request()->except('category'), ['category' => $category->id])) }}"
                                class="cat-pill {{ request('category') == $category->id ? 'active' : '' }}">
                                <span class="dot"
                                    style="background: hsl({{ ($loop->index * 47) % 360 }}, 60%, 52%)"></span>
                                {{ $category->name }}
                            </a>
                        @endforeach
                    </div>

                    <hr class="sidebar-divider">

                    <button type="submit" class="btn-filter">
                        <i class="las la-filter mr-1"></i> Aplicar filtros
                    </button>
                    <a href="{{ route('courses.index') }}" class="btn-clear block text-center">
                        Limpiar filtros
                    </a>
                </form>
            </aside>

            {{-- CONTENIDO --}}
            <div>
                {{-- Toolbar --}}
                <div class="content-toolbar">
                    <h2 class="text-lg font-bold text-gray-800 mr-auto">
                        <span class="text-orange-600">Cursos</span> Disponibles
                    </h2>
                    <span class="results-label">
                        {{ $courses->total() }} resultado{{ $courses->total() != 1 ? 's' : '' }}
                    </span>
                </div>
                {{-- Listado --}}
                <div class="space-y-4">
                    @forelse($courses as $course)
                        <div class="course-card">
                            {{-- Thumbnail --}}
                            <div class="course-thumb">
                                @if ($course->thumbnail)
                                    <img src="{{ $course->thumbnail }}" alt="{{ $course->title }}">
                                @else
                                    <div class="course-thumb-placeholder">
                                        <i class="las la-play-circle"></i>
                                    </div>
                                @endif
                                @if ($course->category)
                                    <span class="thumb-badge">{{ $course->category->name }}</span>
                                @endif
                            </div>
                            {{-- Info --}}
                            <div class="course-info">
                                <div>
                                    <p class="course-title">{{ $course->title }}</p>
                                    <p class="course-desc">{{ $course->description }}</p>
                                </div>
                                <div class="course-meta">
                                    <span class="course-meta-item">
                                        <i class="las la-user-circle"></i> Admin
                                    </span>
                                    <span class="course-meta-item">
                                        <i class="las la-calendar"></i>
                                        {{ $course->created_at->format('d/m/Y') }}
                                    </span>
                                    <span class="course-meta-item course-rating">
                                        <span class="star">★★★★★</span>
                                        <span class="star-count">(5)</span>
                                    </span>
                                </div>
                            </div>
                            {{-- Acción --}}
                            <div class="course-action">
                                <span class="free-badge">Gratis</span>
                                <a href="{{ route('courses.show', $course) }}" class="btn-open">
                                    Ver curso <i class="las la-arrow-right"></i>
                                </a>
                            </div>
                        </div>
                    @empty
                        <div class="empty-state">
                            <i class="las la-search"></i>
                            <p class="font-medium text-gray-500">No se encontraron cursos</p>
                            <p class="text-sm mt-1">Intenta con otro término o categoría</p>
                        </div>
                    @endforelse
                </div>
                {{-- Paginación --}}
                <div class="pagination-wrap">
                    {{ $courses->links() }}
                </div>
            </div>
        </div>
    </div>

@endsection

@push('js')
    <script>
        {{-- Auto-submit al cambiar orden o categoría vía select --}}
        document.querySelector('select[name="order"]')
            ?.addEventListener('change', () => document.getElementById('filterForm').submit());
    </script>
@endpush
