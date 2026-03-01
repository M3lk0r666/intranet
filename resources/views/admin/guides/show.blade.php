{{-- resources/views/admin/guides/show.blade.php --}}
@extends('layouts.guide')

@section('content')
    <div class="container-fluid">
        <!-- Encabezado con navegación -->
        <div class="row mb-4">
            <div class="col">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h1 class="h2 mb-1">Vista Previa: {{ $guide->title }}</h1>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb mb-0">
                                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                                <li class="breadcrumb-item"><a href="{{ route('admin.guides.index') }}">Guías</a></li>
                                <li class="breadcrumb-item active">Previa</li>
                            </ol>
                        </nav>
                    </div>
                    <div class="btn-group" role="group">
                        <a href="{{ route('admin.guides.edit', $guide) }}" class="btn btn-warning">
                            <i class="fas fa-edit"></i> Editar
                        </a>
                        <a href="{{ route('admin.guides.import.form', $guide) }}" class="btn btn-info">
                            <i class="fas fa-file-import"></i> Importar
                        </a>
                        <a href="{{ route('admin.guides.index') }}" class="btn btn-secondary">
                            <i class="fas fa-list"></i> Listado
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Información de la guía -->
        <div class="row mb-4">
            <div class="col-md-4">
                <div class="card shadow-sm">
                    <div class="card-header bg-primary text-white">
                        <h5 class="mb-0"><i class="fas fa-info-circle"></i> Información</h5>
                    </div>
                    <div class="card-body">
                        <dl class="row mb-0">
                            <dt class="col-sm-5">Título:</dt>
                            <dd class="col-sm-7"><strong>{{ $guide->title }}</strong></dd>

                            <dt class="col-sm-5">Slug:</dt>
                            <dd class="col-sm-7"><code>{{ $guide->slug }}</code></dd>

                            <dt class="col-sm-5">Descripción:</dt>
                            <dd class="col-sm-7">{{ $guide->description ?: 'Sin descripción' }}</dd>

                            <dt class="col-sm-5">Estado:</dt>
                            <dd class="col-sm-7">
                                @if ($guide->is_active)
                                    <span class="badge bg-success">Activo</span>
                                @else
                                    <span class="badge bg-secondary">Inactivo</span>
                                @endif
                            </dd>

                            <dt class="col-sm-5">Secciones:</dt>
                            <dd class="col-sm-7">
                                <span class="badge bg-info">
                                    {{ $guide->sections->count() }} secciones
                                </span>
                            </dd>

                            <dt class="col-sm-5">Creada:</dt>
                            <dd class="col-sm-7">{{ $guide->created_at->format('d/m/Y H:i') }}</dd>

                            <dt class="col-sm-5">Actualizada:</dt>
                            <dd class="col-sm-7">{{ $guide->updated_at->format('d/m/Y H:i') }}</dd>
                        </dl>
                    </div>
                </div>

                <!-- URL y estadísticas -->
                <div class="card shadow-sm mt-3">
                    <div class="card-header bg-success text-white">
                        <h5 class="mb-0"><i class="fas fa-chart-bar"></i> Estadísticas</h5>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label class="form-label"><strong>URL Pública:</strong></label>
                            <div class="input-group input-group-sm">
                                <input type="text" class="form-control" value="{{ url('/guides/' . $guide->slug) }}"
                                    readonly id="guideUrl">
                                <button class="btn btn-outline-secondary" type="button"
                                    onclick="copyToClipboard('guideUrl')">
                                    <i class="fas fa-copy"></i>
                                </button>
                            </div>
                        </div>

                        <div class="row text-center">
                            <div class="col-6">
                                <div class="p-2 border rounded bg-light">
                                    <h3 class="text-primary mb-0">{{ $guide->sections->count() }}</h3>
                                    <small class="text-muted">Secciones</small>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="p-2 border rounded bg-light">
                                    <h3 class="text-success mb-0">
                                        {{ $guide->sections->sum(function ($section) {return $section->steps->count();}) }}
                                    </h3>
                                    <small class="text-muted">Pasos</small>
                                </div>
                            </div>
                        </div>

                        <div class="mt-3">
                            <a href="{{ route('admin.guides.show', $guide->slug) }}" target="_blank"
                                class="btn btn-outline-primary w-100">
                                <i class="fas fa-external-link-alt"></i> Ver en sitio público
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Vista previa del contenido -->
            <div class="col-md-8">
                <div class="card shadow-sm">
                    <div class="card-header bg-dark text-white">
                        <div class="d-flex justify-content-between align-items-center">
                            <h5 class="mb-0"><i class="fas fa-eye"></i> Vista Previa del Contenido</h5>
                            <div class="badge bg-warning text-dark">
                                {{ $guide->is_active ? 'PÚBLICO' : 'PRIVADO' }}
                            </div>
                        </div>
                    </div>
                    <div class="card-body p-0">
                        <!-- Simulación del diseño del frontend -->
                        <div
                            style="background-color: #000; color: white; padding: 20px 0; border-bottom: 5px solid #FF6600;">
                            <div class="container">
                                <div class="d-flex align-items-center gap-3">
                                    <div
                                        style="background-color: #FF6600; color: white; width: 60px; height: 60px; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-size: 28px;">
                                        <i class="fas fa-network-wired"></i>
                                    </div>
                                    <div>
                                        <h1 style="font-size: 28px; font-weight: 700; margin: 0;">{{ $guide->title }}</h1>
                                        <p style="color: #DDD; font-size: 14px; margin: 0;">
                                            {{ $guide->description ?: 'Guía paso a paso para la implementación y configuración' }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Navegación simulada -->
                        <nav
                            style="background-color: #F5F5F5; padding: 15px 0; margin-bottom: 0; border-bottom: 1px solid #DDD;">
                            <div class="container d-flex flex-wrap gap-2">
                                @foreach ($guide->sections as $section)
                                    <div
                                        style="background-color: white; color: #222; padding: 12px 25px; border-radius: 5px; cursor: pointer; font-weight: 600; border: 1px solid #DDD; text-align: center;">
                                        {{ $section->title }}
                                    </div>
                                @endforeach
                            </div>
                        </nav>

                        <!-- Contenido de las secciones -->
                        <div class="container py-4">
                            @if ($guide->sections->count() > 0)
                                <div style="display: flex; flex-direction: column; gap: 30px;">
                                    @foreach ($guide->sections as $section)
                                        <div
                                            style="background-color: white; border-radius: 8px; box-shadow: 0 4px 12px rgba(0,0,0,0.08); overflow: hidden; border-left: 5px solid #FF6600; margin-bottom: 20px;">
                                            <div
                                                style="background-color: #F5F5F5; padding: 20px; display: flex; align-items: center; gap: 15px; border-bottom: 1px solid #DDD;">
                                                <div
                                                    style="background-color: #FF6600; color: white; width: 40px; height: 40px; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-weight: bold; font-size: 18px;">
                                                    {{ $loop->iteration }}
                                                </div>
                                                <h3 style="font-size: 22px; font-weight: 700; color: #000; margin: 0;">
                                                    {{ $section->title }}
                                                </h3>
                                                @if ($section->icon)
                                                    <span class="badge bg-secondary ms-2">
                                                        <i class="fas fa-{{ $section->icon }}"></i>
                                                    </span>
                                                @endif
                                            </div>

                                            <div style="padding: 25px;">
                                                @if ($section->steps->count() > 0)
                                                    @foreach ($section->steps as $step)
                                                        <div style="margin-bottom: 25px;">
                                                            @if ($step->title)
                                                                <h4
                                                                    style="font-size: 18px; font-weight: 600; color: #000; margin-bottom: 15px; display: flex; align-items: center; gap: 10px;">
                                                                    @if ($section->icon)
                                                                        <i class="fas fa-{{ $section->icon }}"></i>
                                                                    @endif
                                                                    {{ $step->title }}
                                                                </h4>
                                                            @endif

                                                            @switch($step->content_type)
                                                                @case('text')
                                                                    <p>{{ $step->content }}</p>
                                                                @break

                                                                @case('list')
                                                                    <ul style="list-style-type: none; padding-left: 0;">
                                                                        @foreach (json_decode($step->items, true) as $item)
                                                                            <li
                                                                                style="margin-bottom: 12px; padding-left: 25px; position: relative;">
                                                                                <span
                                                                                    style="position: absolute; left: 0; color: #4CAF50; font-weight: bold;">✓</span>
                                                                                {{ $item }}
                                                                            </li>
                                                                        @endforeach
                                                                    </ul>
                                                                @break

                                                                @case('commands')
                                                                    <ul
                                                                        style="list-style-type: none; background-color: #F5F5F5; border-radius: 5px; padding: 15px; margin-top: 10px;">
                                                                        @foreach (json_decode($step->items, true) as $item)
                                                                            <li
                                                                                style="margin-bottom: 8px; padding-left: 20px; position: relative; font-family: 'Courier New', monospace;">
                                                                                <span
                                                                                    style="position: absolute; left: 5px; color: #FF6600; font-weight: bold;">•</span>
                                                                                {{ $item }}
                                                                            </li>
                                                                        @endforeach
                                                                    </ul>
                                                                @break

                                                                @case('note')
                                                                    <div
                                                                        style="background-color: rgba(255, 102, 0, 0.1); border-left: 4px solid #FF6600; padding: 15px; margin-top: 15px; border-radius: 0 5px 5px 0;">
                                                                        <strong>Nota:</strong> {{ $step->content }}
                                                                    </div>
                                                                @break
                                                            @endswitch
                                                        </div>
                                                    @endforeach
                                                @else
                                                    <div class="alert alert-warning">
                                                        <i class="fas fa-exclamation-triangle"></i>
                                                        Esta sección no tiene pasos definidos.
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            @else
                                <div class="text-center py-5">
                                    <i class="fas fa-folder-open fa-3x text-muted mb-3"></i>
                                    <h4>Esta guía no tiene contenido</h4>
                                    <p class="text-muted">Agrega secciones y pasos para ver la vista previa</p>
                                    <a href="{{ route('admin.guides.edit', $guide) }}" class="btn btn-primary">
                                        <i class="fas fa-plus"></i> Agregar Contenido
                                    </a>
                                    <a href="{{ route('admin.guides.import.form', $guide) }}" class="btn btn-info">
                                        <i class="fas fa-file-import"></i> Importar desde Archivo
                                    </a>
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="card-footer bg-light">
                        <div class="d-flex justify-content-between align-items-center">
                            <small class="text-muted">
                                <i class="fas fa-info-circle"></i>
                                Esta es una vista previa. Para ver la versión final, visita el sitio público.
                            </small>
                            <div>
                                <span class="badge bg-secondary me-2">
                                    <i class="fas fa-code"></i> {{ $guide->sections->count() }} secciones
                                </span>
                                <span class="badge bg-secondary">
                                    <i class="fas fa-list-check"></i>
                                    {{ $guide->sections->sum(function ($section) {return $section->steps->count();}) }}
                                    pasos
                                </span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Acciones rápidas -->
                <div class="row mt-3">
                    <div class="col-md-4">
                        <a href="{{ route('admin.guides.edit', $guide) }}" class="card card-hover text-decoration-none">
                            <div class="card-body text-center">
                                <i class="fas fa-edit fa-2x text-warning mb-2"></i>
                                <h6 class="mb-0">Editar Contenido</h6>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-4">
                        <a href="{{ route('admin.guides.import.form', $guide) }}"
                            class="card card-hover text-decoration-none">
                            <div class="card-body text-center">
                                <i class="fas fa-file-import fa-2x text-info mb-2"></i>
                                <h6 class="mb-0">Importar Archivo</h6>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-4">
                        <a href="{{ route('admin.guides.show', $guide->slug) }}" target="_blank"
                            class="card card-hover text-decoration-none">
                            <div class="card-body text-center">
                                <i class="fas fa-external-link-alt fa-2x text-success mb-2"></i>
                                <h6 class="mb-0">Ver Público</h6>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Resumen de secciones -->
        <div class="row mt-4">
            <div class="col-12">
                <div class="card shadow-sm">
                    <div class="card-header bg-secondary text-white">
                        <h5 class="mb-0"><i class="fas fa-list-ol"></i> Resumen de Secciones</h5>
                    </div>
                    <div class="card-body">
                        @if ($guide->sections->count() > 0)
                            <div class="table-responsive">
                                <table class="table table-hover table-sm">
                                    <thead>
                                        <tr>
                                            <th width="50">#</th>
                                            <th>Sección</th>
                                            <th>Ícono</th>
                                            <th>Pasos</th>
                                            <th>Tipo de Contenido</th>
                                            <th>Orden</th>
                                            <th>Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($guide->sections as $section)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>
                                                    <strong>{{ $section->title }}</strong>
                                                    @if ($section->steps->count() == 0)
                                                        <span class="badge bg-warning text-dark ms-2">Vacía</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    @if ($section->icon)
                                                        <span class="badge bg-dark">
                                                            <i class="fas fa-{{ $section->icon }}"></i>
                                                            {{ $section->icon }}
                                                        </span>
                                                    @else
                                                        <span class="badge bg-secondary">Sin ícono</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    <span class="badge bg-primary">
                                                        {{ $section->steps->count() }} pasos
                                                    </span>
                                                </td>
                                                <td>
                                                    @php
                                                        $contentTypes = $section->steps
                                                            ->pluck('content_type')
                                                            ->unique();
                                                    @endphp
                                                    @foreach ($contentTypes as $type)
                                                        <span class="badge bg-info me-1">{{ $type }}</span>
                                                    @endforeach
                                                </td>
                                                <td>{{ $section->order }}</td>
                                                <td>
                                                    <button class="btn btn-sm btn-outline-primary" data-bs-toggle="modal"
                                                        data-bs-target="#sectionModal{{ $section->id }}">
                                                        <i class="fas fa-eye"></i>
                                                    </button>
                                                </td>
                                            </tr>

                                            <!-- Modal para ver sección -->
                                            <div class="modal fade" id="sectionModal{{ $section->id }}" tabindex="-1">
                                                <div class="modal-dialog modal-lg">
                                                    <div class="modal-content">
                                                        <div class="modal-header bg-dark text-white">
                                                            <h5 class="modal-title">{{ $section->title }}</h5>
                                                            <button type="button" class="btn-close btn-close-white"
                                                                data-bs-dismiss="modal"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <h6>Pasos ({{ $section->steps->count() }}):</h6>
                                                            @if ($section->steps->count() > 0)
                                                                <div class="list-group">
                                                                    @foreach ($section->steps as $step)
                                                                        <div class="list-group-item">
                                                                            <div
                                                                                class="d-flex justify-content-between align-items-start">
                                                                                <div>
                                                                                    <strong>{{ $step->title ?: 'Sin título' }}</strong>
                                                                                    <br>
                                                                                    <small class="text-muted">
                                                                                        Tipo: <span
                                                                                            class="badge bg-info">{{ $step->content_type }}</span>
                                                                                    </small>
                                                                                </div>
                                                                                <div>
                                                                                    <small class="text-muted">Orden:
                                                                                        {{ $step->order }}</small>
                                                                                </div>
                                                                            </div>
                                                                            @if ($step->content)
                                                                                <div class="mt-2">
                                                                                    <small>{{ Str::limit($step->content, 100) }}</small>
                                                                                </div>
                                                                            @endif
                                                                        </div>
                                                                    @endforeach
                                                                </div>
                                                            @else
                                                                <div class="alert alert-warning">
                                                                    Esta sección no tiene pasos.
                                                                </div>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @else
                            <div class="text-center py-4">
                                <i class="fas fa-inbox fa-3x text-muted mb-3"></i>
                                <h5>No hay secciones definidas</h5>
                                <p class="text-muted">Comienza agregando secciones a tu guía</p>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('styles')
    <style>
        .card-hover:hover {
            transform: translateY(-5px);
            transition: transform 0.2s;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }

        .breadcrumb {
            background: transparent;
            padding: 0;
            margin-bottom: 0;
        }

        .badge {
            font-size: 0.85em;
            padding: 0.35em 0.65em;
        }

        /* Estilos para la vista previa simulada */
        .container-simulated {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }
    </style>
@endpush

@push('scripts')
    <script>
        function copyToClipboard(elementId) {
            const element = document.getElementById(elementId);
            element.select();
            element.setSelectionRange(0, 99999); // Para móviles

            try {
                navigator.clipboard.writeText(element.value).then(() => {
                    const button = element.nextElementSibling;
                    const originalHTML = button.innerHTML;
                    button.innerHTML = '<i class="fas fa-check"></i>';
                    button.classList.remove('btn-outline-secondary');
                    button.classList.add('btn-success');

                    setTimeout(() => {
                        button.innerHTML = originalHTML;
                        button.classList.remove('btn-success');
                        button.classList.add('btn-outline-secondary');
                    }, 2000);
                });
            } catch (err) {
                // Fallback para navegadores antiguos
                document.execCommand('copy');

                const button = element.nextElementSibling;
                const originalHTML = button.innerHTML;
                button.innerHTML = '<i class="fas fa-check"></i>';
                button.classList.remove('btn-outline-secondary');
                button.classList.add('btn-success');

                setTimeout(() => {
                    button.innerHTML = originalHTML;
                    button.classList.remove('btn-success');
                    button.classList.add('btn-outline-secondary');
                }, 2000);
            }
        }
    </script>
@endpush
