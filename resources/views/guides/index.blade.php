{{-- resources/views/guides/index.blade.php --}}
@extends('layouts.publicguide')

@section('title', 'Guías Técnicas - Listado')

@section('content')
    <div class="container py-4">
        <!-- Encabezado -->
        <div class="row mb-5">
            <div class="col-12">
                <div class="text-center">
                    <h1 class="display-5 fw-bold mb-3">Guías Técnicas</h1>
                    <p class="lead text-muted">
                        Documentación especializada para profesionales de TI, redes y sistemas.
                        Encuentra guías paso a paso, mejores prácticas y soluciones técnicas.
                    </p>
                    <div class="mt-4">
                        <span class="badge bg-primary fs-6 me-2">
                            <i class="fas fa-book me-1"></i> {{ $guides->total() }} Guías
                        </span>
                        <span class="badge bg-success fs-6 me-2">
                            <i class="fas fa-check-circle me-1"></i> Actualizadas
                        </span>
                        <span class="badge bg-warning text-dark fs-6">
                            <i class="fas fa-star me-1"></i> Profesional
                        </span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Filtros -->
        <div class="row mb-4">
            <div class="col-12">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-md-8">
                                <h5 class="mb-0">
                                    <i class="fas fa-filter text-primary me-2"></i>
                                    Filtrar guías
                                </h5>
                            </div>
                            <div class="col-md-4 text-end">
                                <div class="dropdown">
                                    <button class="btn btn-outline-secondary dropdown-toggle" type="button"
                                        data-bs-toggle="dropdown">
                                        <i class="fas fa-sort me-1"></i> Ordenar por
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="?sort=newest">Más recientes</a></li>
                                        <li><a class="dropdown-item" href="?sort=oldest">Más antiguas</a></li>
                                        <li><a class="dropdown-item" href="?sort=popular">Más populares</a></li>
                                        <li><a class="dropdown-item" href="?sort=title">Título A-Z</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Listado de Guías -->
        @if ($guides->count() > 0)
            <div class="row g-4">
                @foreach ($guides as $guide)
                    <div class="col-lg-4 col-md-6">
                        <div class="card guide-card h-100">
                            <div class="card-header-custom">
                                <div class="d-flex justify-content-between align-items-center">
                                    <h5 class="card-title mb-0">{{ Str::limit($guide->title, 50) }}</h5>
                                    <span class="badge bg-light text-dark">
                                        <i class="fas fa-eye me-1"></i> {{ $guide->views_count ?? 0 }}
                                    </span>
                                </div>
                            </div>
                            <div class="card-body">
                                @if ($guide->description)
                                    <p class="card-text">{{ Str::limit($guide->description, 120) }}</p>
                                @else
                                    <p class="card-text text-muted">Sin descripción disponible.</p>
                                @endif

                                <div class="mt-3">
                                    @if ($guide->sections->count() > 0)
                                        <span class="badge bg-info me-2">
                                            <i class="fas fa-layer-group me-1"></i> {{ $guide->sections->count() }}
                                            secciones
                                        </span>
                                    @endif

                                    @php
                                        $totalSteps = $guide->sections->sum(function ($section) {
                                            return $section->steps->count();
                                        });
                                    @endphp

                                    @if ($totalSteps > 0)
                                        <span class="badge bg-success">
                                            <i class="fas fa-list-check me-1"></i> {{ $totalSteps }} pasos
                                        </span>
                                    @endif
                                </div>

                                <div class="mt-3 small text-muted">
                                    <i class="fas fa-calendar me-1"></i>
                                    Creada: {{ $guide->created_at->format('d/m/Y') }}
                                </div>
                            </div>
                            <div class="card-footer bg-transparent border-top-0">
                                <div class="d-grid">
                                    <a href="{{ route('intranet.guias.show', $guide->slug) }}" class="btn btn-primary">
                                        <i class="fas fa-book-open me-1"></i> Ver Guía Completa
                                    </a>
                                </div>
                                <div class="mt-2 d-flex justify-content-between">
                                    <a href="{{ route('intranet.guias.download', $guide->slug) }}"
                                        class="btn btn-sm btn-outline-secondary">
                                        <i class="fas fa-download me-1"></i> Descargar
                                    </a>
                                    <button class="btn btn-sm btn-outline-info"
                                        onclick="shareGuide('{{ $guide->slug }}', '{{ $guide->title }}')">
                                        <i class="fas fa-share-alt me-1"></i> Compartir
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Paginación -->
            <div class="row mt-5">
                <div class="col-12">
                    <nav aria-label="Paginación de guías">
                        {{ $guides->links() }}
                    </nav>
                </div>
            </div>
        @else
            <!-- No hay guías -->
            <div class="row">
                <div class="col-12">
                    <div class="card shadow-sm">
                        <div class="card-body text-center py-5">
                            <i class="fas fa-book fa-4x text-muted mb-4"></i>
                            <h3>No hay guías disponibles</h3>
                            <p class="text-muted mb-4">
                                Aún no se han publicado guías técnicas.
                            </p>
                            @auth
                                <a href="{{ route('admin.guides.create') }}" class="btn btn-primary">
                                    <i class="fas fa-plus me-1"></i> Crear Primera Guía
                                </a>
                            @endauth
                        </div>
                    </div>
                </div>
            </div>
        @endif

        <!-- Call to Action -->
        @if ($guides->count() > 0)
            <div class="row mt-5">
                <div class="col-12">
                    <div class="card bg-dark text-white">
                        <div class="card-body text-center py-5">
                            <h2 class="mb-3">¿No encuentras lo que buscas?</h2>
                            <p class="lead mb-4">
                                Sugiere nuevos temas o contáctanos para guías personalizadas.
                            </p>
                            <a href="#" class="btn btn-light btn-lg">
                                <i class="fas fa-lightbulb me-2"></i> Sugerir Tema
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>
@endsection

@push('scripts')
    <script>
        function shareGuide(slug, title) {
            if (navigator.share) {
                navigator.share({
                        title: title,
                        text: 'Mira esta guía técnica: ' + title,
                        url: window.location.origin + '/guides/' + slug
                    })
                    .then(() => console.log('Compartido exitosamente'))
                    .catch(error => console.log('Error al compartir:', error));
            } else {
                // Fallback para navegadores que no soportan Web Share API
                const url = window.location.origin + '/guides/' + slug;
                navigator.clipboard.writeText(url).then(() => {
                    alert('Enlace copiado al portapapeles: ' + url);
                });
            }
        }

        // Búsqueda en tiempo real
        document.addEventListener('DOMContentLoaded', function() {
            const searchInput = document.querySelector('input[name="q"]');
            if (searchInput) {
                let debounceTimer;
                searchInput.addEventListener('input', function(e) {
                    clearTimeout(debounceTimer);
                    debounceTimer = setTimeout(() => {
                        if (e.target.value.length >= 3) {
                            // Podrías implementar búsqueda en tiempo real aquí
                            console.log('Buscando:', e.target.value);
                        }
                    }, 500);
                });
            }
        });
    </script>
@endpush
