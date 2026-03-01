{{-- resources/views/admin/dashboard.blade.php --}}
@extends('layouts.adminvideos')

@section('title', 'Dashboard')

@section('content')
    <div class="row mb-4">
        <div class="col-12">
            <div class="d-flex justify-content-between align-items-center">
                <h1 class="h3 mb-0">
                    <i class="fas fa-tachometer-alt text-primary me-2"></i>Dashboard
                </h1>
                <div class="btn-group">
                    <button class="btn btn-outline-primary" onclick="updateDashboardStats()">
                        <i class="fas fa-sync-alt"></i> Actualizar
                    </button>
                    <a href="{{ route('admin.videos.create') }}" class="btn btn-primary">
                        <i class="fas fa-plus-circle"></i> Nuevo Video
                    </a>
                </div>
            </div>
            <p class="text-muted mb-0">Resumen y estadísticas de la plataforma</p>
        </div>
    </div>

    <!-- Stats Cards -->
    <div class="row mb-4">
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="stats-card border-left-primary">
                <div class="d-flex justify-content-between">
                    <div>
                        <div class="text-primary">
                            <i class="fas fa-video fa-2x"></i>
                        </div>
                        <div class="count text-primary" id="total-videos">0</div>
                        <div class="text-muted">Videos Totales</div>
                    </div>
                    <div class="align-self-center">
                        <i class="fas fa-chevron-up text-success"></i>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="stats-card border-left-success">
                <div class="d-flex justify-content-between">
                    <div>
                        <div class="text-success">
                            <i class="fas fa-eye fa-2x"></i>
                        </div>
                        <div class="count text-success" id="total-views">0</div>
                        <div class="text-muted">Visualizaciones</div>
                    </div>
                    <div class="align-self-center">
                        <i class="fas fa-chevron-up text-success"></i>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="stats-card border-left-warning">
                <div class="d-flex justify-content-between">
                    <div>
                        <div class="text-warning">
                            <i class="fas fa-users fa-2x"></i>
                        </div>
                        <div class="count text-warning" id="total-users">0</div>
                        <div class="text-muted">Usuarios</div>
                    </div>
                    <div class="align-self-center">
                        <i class="fas fa-chevron-up text-success"></i>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="stats-card border-left-info">
                <div class="d-flex justify-content-between">
                    <div>
                        <div class="text-info">
                            <i class="fas fa-clock fa-2x"></i>
                        </div>
                        <div class="count text-info" id="total-hours">0h</div>
                        <div class="text-muted">Horas de Contenido</div>
                    </div>
                    <div class="align-self-center">
                        <i class="fas fa-chevron-up text-success"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Charts and Recent Activity -->
    <div class="row">
        <div class="col-lg-8 mb-4">
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0">
                        <i class="fas fa-chart-line text-primary me-2"></i>
                        Actividad Reciente
                    </h5>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Usuario</th>
                                    <th>Acción</th>
                                    <th>Video</th>
                                    <th>Fecha</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="bg-primary text-white rounded-circle d-flex align-items-center justify-content-center me-2"
                                                style="width: 30px; height: 30px;">
                                                JD
                                            </div>
                                            <span>John Doe</span>
                                        </div>
                                    </td>
                                    <td>
                                        <span class="badge bg-success">Subió video</span>
                                    </td>
                                    <td>Proceso Comercial IT</td>
                                    <td>Hace 2 horas</td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="bg-warning text-white rounded-circle d-flex align-items-center justify-content-center me-2"
                                                style="width: 30px; height: 30px;">
                                                MJ
                                            </div>
                                            <span>Mary Johnson</span>
                                        </div>
                                    </td>
                                    <td>
                                        <span class="badge bg-primary">Editó video</span>
                                    </td>
                                    <td>Onboarding 2023</td>
                                    <td>Hace 5 horas</td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="bg-info text-white rounded-circle d-flex align-items-center justify-content-center me-2"
                                                style="width: 30px; height: 30px;">
                                                RS
                                            </div>
                                            <span>Robert Smith</span>
                                        </div>
                                    </td>
                                    <td>
                                        <span class="badge bg-danger">Eliminó video</span>
                                    </td>
                                    <td>Tutorial Obsoleto</td>
                                    <td>Ayer</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-4 mb-4">
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0">
                        <i class="fas fa-fire text-warning me-2"></i>
                        Videos Trending
                    </h5>
                </div>
                <div class="card-body">
                    <div class="list-group list-group-flush">
                        @foreach ($trendingVideos ?? [] as $video)
                            <a href="{{ route('admin.videos.edit', $video) }}"
                                class="list-group-item list-group-item-action">
                                <div class="d-flex align-items-center">
                                    <img src="{{ $video->thumbnail_url }}" alt="{{ $video->title }}"
                                        class="video-thumb-sm me-3">
                                    <div class="flex-grow-1">
                                        <h6 class="mb-1">{{ Str::limit($video->title, 40) }}</h6>
                                        <small class="text-muted">
                                            <i class="fas fa-eye me-1"></i>{{ formatViews($video->views) }} vistas
                                        </small>
                                    </div>
                                    <div class="text-warning">
                                        <i class="fas fa-star"></i> {{ $video->rating }}
                                    </div>
                                </div>
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Quick Actions -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0">
                        <i class="fas fa-bolt text-primary me-2"></i>
                        Acciones Rápidas
                    </h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-3 mb-3">
                            <a href="{{ route('admin.videos.create') }}"
                                class="btn btn-outline-primary w-100 h-100 d-flex flex-column align-items-center justify-content-center p-3">
                                <i class="fas fa-upload fa-2x mb-2"></i>
                                <span>Subir Video</span>
                            </a>
                        </div>
                        <div class="col-md-3 mb-3">
                            <a href="{{ route('admin.videos.index') }}"
                                class="btn btn-outline-success w-100 h-100 d-flex flex-column align-items-center justify-content-center p-3">
                                <i class="fas fa-list fa-2x mb-2"></i>
                                <span>Gestionar Videos</span>
                            </a>
                        </div>
                        <div class="col-md-3 mb-3">
                            <a href="#"
                                class="btn btn-outline-warning w-100 h-100 d-flex flex-column align-items-center justify-content-center p-3">
                                <i class="fas fa-chart-bar fa-2x mb-2"></i>
                                <span>Ver Reportes</span>
                            </a>
                        </div>
                        <div class="col-md-3 mb-3">
                            <a href="#"
                                class="btn btn-outline-info w-100 h-100 d-flex flex-column align-items-center justify-content-center p-3">
                                <i class="fas fa-cog fa-2x mb-2"></i>
                                <span>Configuración</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Video Preview Modal -->
    <div class="modal fade" id="videoPreviewModal" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Vista Previa</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <video controls class="w-100" style="max-height: 70vh;">
                        Tu navegador no soporta la reproducción de video.
                    </video>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        // Dashboard specific scripts
        $(document).ready(function() {
            // Initialize charts if needed
            if (typeof Chart !== 'undefined') {
                // Your chart initialization code here
            }
        });
    </script>
@endpush
