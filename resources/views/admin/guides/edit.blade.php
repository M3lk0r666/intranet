{{-- resources/views/admin/guides/edit.blade.php --}}
@extends('layouts.guide')

@section('content')
    <div class="container-fluid">
        <!-- Encabezado -->
        <div class="row mb-4">
            <div class="col">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h1 class="h2 mb-1">Editar Guía: {{ $guide->title }}</h1>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb mb-0">
                                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                                <li class="breadcrumb-item"><a href="{{ route('admin.guides.index') }}">Guías</a></li>
                                <li class="breadcrumb-item active">Editar</li>
                            </ol>
                        </nav>
                    </div>
                    <div class="btn-group" role="group">
                        <a href="{{ route('admin.guides.show', $guide) }}" class="btn btn-info">
                            <i class="fas fa-eye"></i> Previa
                        </a>
                        <a href="{{ route('admin.guides.import.form', $guide) }}" class="btn btn-primary">
                            <i class="fas fa-file-import"></i> Importar
                        </a>
                        <a href="{{ route('admin.guides.show', $guide->slug) }}" target="_blank" class="btn btn-success">
                            <i class="fas fa-external-link-alt"></i> Ver Público
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Alertas -->
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="fas fa-check-circle"></i> {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        @if ($errors->any())
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <i class="fas fa-exclamation-triangle"></i>
                <strong>Errores encontrados:</strong>
                <ul class="mb-0 mt-2">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        <!-- Contenido principal -->
        <div class="row">
            <!-- Información básica -->
            <div class="col-lg-4">
                <div class="card shadow-sm mb-4">
                    <div class="card-header bg-dark text-white">
                        <h5 class="mb-0"><i class="fas fa-cog"></i> Configuración de la Guía</h5>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.guides.update', $guide) }}" method="POST" id="guideForm">
                            @csrf
                            @method('PUT')

                            <div class="mb-3">
                                <label for="title" class="form-label">Título *</label>
                                <input type="text" class="form-control @error('title') is-invalid @enderror"
                                    id="title" name="title" value="{{ old('title', $guide->title) }}" required>
                                @error('title')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="slug" class="form-label">Slug</label>
                                <input type="text" class="form-control @error('slug') is-invalid @enderror"
                                    id="slug" name="slug" value="{{ old('slug', $guide->slug) }}">
                                @error('slug')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                <div class="form-text">
                                    URL amigable. Se genera automáticamente del título.
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="description" class="form-label">Descripción</label>
                                <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description"
                                    rows="3">{{ old('description', $guide->description) }}</textarea>
                                @error('description')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" id="is_active" name="is_active"
                                        value="1" {{ old('is_active', $guide->is_active) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="is_active">
                                        Guía activa (visible al público)
                                    </label>
                                </div>
                            </div>

                            <div class="d-grid gap-2">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fas fa-save"></i> Guardar Cambios
                                </button>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- Estadísticas -->
                <div class="card shadow-sm">
                    <div class="card-header bg-info text-white">
                        <h5 class="mb-0"><i class="fas fa-chart-pie"></i> Estadísticas</h5>
                    </div>
                    <div class="card-body">
                        <div class="row text-center">
                            <div class="col-6 mb-3">
                                <div class="p-3 border rounded bg-light">
                                    <h3 class="text-primary mb-0">{{ $guide->sections->count() }}</h3>
                                    <small class="text-muted">Secciones</small>
                                </div>
                            </div>
                            <div class="col-6 mb-3">
                                <div class="p-3 border rounded bg-light">
                                    @php
                                        $totalSteps = $guide->sections->sum(function ($section) {
                                            return $section->steps->count();
                                        });
                                    @endphp
                                    <h3 class="text-success mb-0">{{ $totalSteps }}</h3>
                                    <small class="text-muted">Pasos Totales</small>
                                </div>
                            </div>
                        </div>

                        <div class="mt-3">
                            <h6>Distribución de Tipos:</h6>
                            @php
                                $types = [];
                                foreach ($guide->sections as $section) {
                                    foreach ($section->steps as $step) {
                                        $types[$step->content_type] = ($types[$step->content_type] ?? 0) + 1;
                                    }
                                }
                            @endphp

                            @if (count($types) > 0)
                                <div class="list-group list-group-flush small">
                                    @foreach ($types as $type => $count)
                                        <div
                                            class="list-group-item d-flex justify-content-between align-items-center px-0">
                                            <span>
                                                @switch($type)
                                                    @case('text')
                                                        <i class="fas fa-paragraph text-primary me-2"></i>
                                                    @break

                                                    @case('list')
                                                        <i class="fas fa-list text-success me-2"></i>
                                                    @break

                                                    @case('commands')
                                                        <i class="fas fa-terminal text-info me-2"></i>
                                                    @break

                                                    @case('note')
                                                        <i class="fas fa-sticky-note text-warning me-2"></i>
                                                    @break

                                                    @default
                                                        <i class="fas fa-file-alt text-secondary me-2"></i>
                                                @endswitch
                                                {{ ucfirst($type) }}
                                            </span>
                                            <span class="badge bg-dark rounded-pill">{{ $count }}</span>
                                        </div>
                                    @endforeach
                                </div>
                            @else
                                <p class="text-muted text-center mb-0">
                                    <i class="fas fa-info-circle"></i> No hay contenido aún
                                </p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

            <!-- Gestión de Secciones -->
            <div class="col-lg-8">
                <div class="card shadow-sm mb-4">
                    <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                        <h5 class="mb-0"><i class="fas fa-layer-group"></i> Secciones de la Guía</h5>
                        <button type="button" class="btn btn-light btn-sm" data-bs-toggle="modal"
                            data-bs-target="#addSectionModal">
                            <i class="fas fa-plus"></i> Nueva Sección
                        </button>
                    </div>
                    <div class="card-body">
                        @if ($guide->sections->count() > 0)
                            <!-- Ordenar secciones -->
                            <div class="alert alert-info d-flex align-items-center justify-content-between mb-3">
                                <div>
                                    <i class="fas fa-sort me-2"></i>
                                    <strong>Ordenar secciones:</strong> Arrastra y suelta para cambiar el orden
                                </div>
                                <button type="button" class="btn btn-sm btn-outline-info" id="saveOrderBtn"
                                    style="display: none;">
                                    <i class="fas fa-save"></i> Guardar Orden
                                </button>
                            </div>

                            <!-- Lista de secciones -->
                            <div id="sectionsList" class="sortable-list">
                                @foreach ($guide->sections->sortBy('order') as $section)
                                    <div class="card section-item mb-3" data-section-id="{{ $section->id }}">
                                        <div
                                            class="card-header bg-light d-flex justify-content-between align-items-center">
                                            <div class="d-flex align-items-center">
                                                <span class="sort-handle me-3" style="cursor: grab;">
                                                    <i class="fas fa-grip-vertical text-muted"></i>
                                                </span>
                                                <h6 class="mb-0">
                                                    <i class="fas fa-{{ $section->icon ?? 'file-alt' }} me-2"></i>
                                                    {{ $section->title }}
                                                </h6>
                                                <span class="badge bg-secondary ms-2">Orden: {{ $section->order }}</span>
                                            </div>
                                            <div class="btn-group btn-group-sm">
                                                <button type="button" class="btn btn-outline-primary"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#editSectionModal{{ $section->id }}">
                                                    <i class="fas fa-edit"></i>
                                                </button>
                                                <button type="button" class="btn btn-outline-success"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#addStepModal{{ $section->id }}">
                                                    <i class="fas fa-plus-circle"></i>
                                                </button>
                                                <form action="{{ route('admin.sections.destroy', $section) }}"
                                                    method="POST" class="d-inline"
                                                    onsubmit="return confirm('¿Eliminar esta sección y todos sus pasos?');">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-outline-danger">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            @if ($section->steps->count() > 0)
                                                <div class="table-responsive">
                                                    <table class="table table-sm table-hover mb-0">
                                                        <thead>
                                                            <tr>
                                                                <th width="50">#</th>
                                                                <th>Tipo</th>
                                                                <th>Contenido</th>
                                                                <th width="120">Orden</th>
                                                                <th width="100">Acciones</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach ($section->steps->sortBy('order') as $step)
                                                                <tr>
                                                                    <td>{{ $loop->iteration }}</td>
                                                                    <td>
                                                                        <span
                                                                            class="badge 
                                                                    @if ($step->content_type == 'text') bg-primary
                                                                    @elseif($step->content_type == 'list') bg-success
                                                                    @elseif($step->content_type == 'commands') bg-info
                                                                    @elseif($step->content_type == 'note') bg-warning
                                                                    @else bg-secondary @endif">
                                                                            {{ $step->content_type }}
                                                                        </span>
                                                                    </td>
                                                                    <td>
                                                                        <strong>{{ $step->title ?: 'Sin título' }}</strong>
                                                                        @if ($step->content)
                                                                            <br><small
                                                                                class="text-muted">{{ Str::limit($step->content, 50) }}</small>
                                                                        @endif
                                                                    </td>
                                                                    <td>
                                                                        <input type="number"
                                                                            class="form-control form-control-sm step-order"
                                                                            value="{{ $step->order }}"
                                                                            data-step-id="{{ $step->id }}"
                                                                            style="width: 70px;">
                                                                    </td>
                                                                    <td>
                                                                        <div class="btn-group btn-group-sm">
                                                                            <button type="button"
                                                                                class="btn btn-outline-primary"
                                                                                data-bs-toggle="modal"
                                                                                data-bs-target="#editStepModal{{ $step->id }}">
                                                                                <i class="fas fa-edit"></i>
                                                                            </button>
                                                                            <form
                                                                                action="{{ route('admin.steps.destroy', $step) }}"
                                                                                method="POST" class="d-inline"
                                                                                onsubmit="return confirm('¿Eliminar este paso?');">
                                                                                @csrf
                                                                                @method('DELETE')
                                                                                <button type="submit"
                                                                                    class="btn btn-outline-danger">
                                                                                    <i class="fas fa-trash"></i>
                                                                                </button>
                                                                            </form>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                            @else
                                                <div class="alert alert-warning mb-0">
                                                    <i class="fas fa-exclamation-triangle"></i>
                                                    Esta sección no tiene pasos. Agrega el primer paso.
                                                </div>
                                            @endif
                                        </div>
                                    </div>

                                    <!-- Modales para esta sección -->
                                    @include('admin.guides.partials.modals.section', [
                                        'section' => $section,
                                    ])
                                    @include('admin.guides.partials.modals.step', ['section' => $section])
                                @endforeach
                            </div>
                        @else
                            <div class="text-center py-5">
                                <i class="fas fa-layer-group fa-3x text-muted mb-3"></i>
                                <h4>No hay secciones definidas</h4>
                                <p class="text-muted">Comienza creando tu primera sección</p>
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#addSectionModal">
                                    <i class="fas fa-plus"></i> Crear Primera Sección
                                </button>
                            </div>
                        @endif
                    </div>
                </div>

                <!-- Acciones rápidas -->
                <div class="card shadow-sm">
                    <div class="card-header bg-warning text-dark">
                        <h5 class="mb-0"><i class="fas fa-bolt"></i> Acciones Rápidas</h5>
                    </div>
                    <div class="card-body">
                        <div class="row g-3">
                            <div class="col-md-4">
                                <a href="{{ route('admin.guides.import.form', $guide) }}"
                                    class="card card-hover text-decoration-none h-100">
                                    <div class="card-body text-center">
                                        <i class="fas fa-file-import fa-2x text-primary mb-2"></i>
                                        <h6 class="mb-1">Importar Archivo</h6>
                                        <p class="text-muted small mb-0">Importa contenido desde TXT/JSON</p>
                                    </div>
                                </a>
                            </div>
                            <div class="col-md-4">
                                <button type="button"
                                    class="card card-hover text-decoration-none h-100 w-100 border-0 bg-transparent"
                                    data-bs-toggle="modal" data-bs-target="#exportModal">
                                    <div class="card-body text-center">
                                        <i class="fas fa-file-export fa-2x text-success mb-2"></i>
                                        <h6 class="mb-1">Exportar Contenido</h6>
                                        <p class="text-muted small mb-0">Exporta a TXT o JSON</p>
                                    </div>
                                </button>
                            </div>
                            <div class="col-md-4">
                                <a href="{{ route('admin.guides.show', $guide->slug) }}" target="_blank"
                                    class="card card-hover text-decoration-none h-100">
                                    <div class="card-body text-center">
                                        <i class="fas fa-external-link-alt fa-2x text-info mb-2"></i>
                                        <h6 class="mb-1">Ver Vista Pública</h6>
                                        <p class="text-muted small mb-0">Abre en nueva pestaña</p>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal para nueva sección -->
    <div class="modal fade" id="addSectionModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="{{ route('admin.sections.store') }}" method="POST">
                    @csrf
                    <input type="hidden" name="guide_id" value="{{ $guide->id }}">

                    <div class="modal-header bg-primary text-white">
                        <h5 class="modal-title"><i class="fas fa-plus"></i> Nueva Sección</h5>
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="section_title" class="form-label">Título de la Sección *</label>
                            <input type="text" class="form-control" id="section_title" name="title" required>
                        </div>

                        <div class="mb-3">
                            <label for="section_icon" class="form-label">Ícono</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="fas fa-icons"></i></span>
                                <select class="form-select" id="section_icon" name="icon">
                                    <option value="">Seleccionar ícono...</option>
                                    <option value="clipboard-check">Checklist</option>
                                    <option value="exchange-alt">Cambio</option>
                                    <option value="check-double">Verificación</option>
                                    <option value="clipboard-list">Lista</option>
                                    <option value="undo-alt">Rollback</option>
                                    <option value="cog">Configuración</option>
                                    <option value="network-wired">Red</option>
                                    <option value="server">Servidor</option>
                                    <option value="shield-alt">Seguridad</option>
                                    <option value="wifi">WiFi</option>
                                    <option value="desktop">Equipo</option>
                                    <option value="cable">Cableado</option>
                                </select>
                            </div>
                            <div class="form-text">
                                Elige un ícono que represente esta sección
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="section_order" class="form-label">Orden</label>
                            <input type="number" class="form-control" id="section_order" name="order"
                                value="{{ $guide->sections->count() }}" min="0">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-primary">Crear Sección</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal para exportar -->
    <div class="modal fade" id="exportModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-success text-white">
                    <h5 class="modal-title"><i class="fas fa-file-export"></i> Exportar Contenido</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Formato de exportación</label>
                        <div class="form-check mb-2">
                            <input class="form-check-input" type="radio" name="export_format" id="formatTxt"
                                value="txt" checked>
                            <label class="form-check-label" for="formatTxt">
                                <i class="fas fa-file-alt text-info"></i> Archivo TXT
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="export_format" id="formatJson"
                                value="json">
                            <label class="form-check-label" for="formatJson">
                                <i class="fas fa-code text-warning"></i> Archivo JSON
                            </label>
                        </div>
                    </div>

                    <div class="alert alert-info">
                        <i class="fas fa-info-circle"></i>
                        El archivo exportado seguirá el mismo formato que se usa para importar.
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-success" onclick="exportContent()">
                        <i class="fas fa-download"></i> Exportar
                    </button>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('styles')
    <style>
        .card-hover:hover {
            transform: translateY(-3px);
            transition: transform 0.2s;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }

        .sortable-list {
            min-height: 50px;
        }

        .section-item {
            cursor: move;
            transition: transform 0.2s, box-shadow 0.2s;
        }

        .section-item.sortable-ghost {
            opacity: 0.4;
            background: #f8f9fa;
        }

        .section-item.sortable-chosen {
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }

        .sort-handle {
            opacity: 0.5;
            transition: opacity 0.2s;
        }

        .sort-handle:hover {
            opacity: 1;
        }

        .step-order {
            max-width: 80px;
        }

        .modal-header {
            border-bottom: none;
            padding-bottom: 0;
        }

        .modal-body {
            padding-top: 1rem;
        }
    </style>
@endpush

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/sortablejs@1.15.0/Sortable.min.js"></script>
    <script>
        // Generar slug automático
        document.getElementById('title').addEventListener('input', function(e) {
            const slug = e.target.value
                .toLowerCase()
                .normalize("NFD")
                .replace(/[\u0300-\u036f]/g, "")
                .replace(/[^\w\s]/gi, '')
                .replace(/\s+/g, '-');
            document.getElementById('slug').value = slug;
        });

        // Ordenar secciones con SortableJS
        document.addEventListener('DOMContentLoaded', function() {
            const sectionsList = document.getElementById('sectionsList');
            const saveOrderBtn = document.getElementById('saveOrderBtn');

            if (sectionsList) {
                const sortable = Sortable.create(sectionsList, {
                    animation: 150,
                    ghostClass: 'sortable-ghost',
                    chosenClass: 'sortable-chosen',
                    handle: '.sort-handle',
                    onUpdate: function() {
                        saveOrderBtn.style.display = 'block';
                    }
                });

                // Guardar orden
                saveOrderBtn.addEventListener('click', function() {
                    const sections = [];
                    document.querySelectorAll('.section-item').forEach((item, index) => {
                        const sectionId = item.getAttribute('data-section-id');
                        sections.push({
                            id: sectionId,
                            order: index
                        });
                    });

                    fetch('{{ route('admin.sections.reorder') }}', {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                                'X-CSRF-TOKEN': '{{ csrf_token() }}'
                            },
                            body: JSON.stringify({
                                sections: sections
                            })
                        })
                        .then(response => response.json())
                        .then(data => {
                            if (data.success) {
                                // Actualizar números de orden visualmente
                                document.querySelectorAll('.section-item').forEach((item, index) => {
                                    const badge = item.querySelector('.badge.bg-secondary');
                                    if (badge) {
                                        badge.textContent = 'Orden: ' + index;
                                    }
                                });

                                saveOrderBtn.style.display = 'none';

                                // Mostrar mensaje de éxito
                                showAlert('success', 'Orden guardado exitosamente');
                            }
                        })
                        .catch(error => {
                            console.error('Error:', error);
                            showAlert('danger', 'Error al guardar el orden');
                        });
                });
            }

            // Actualizar orden de pasos
            document.querySelectorAll('.step-order').forEach(input => {
                input.addEventListener('change', function() {
                    const stepId = this.getAttribute('data-step-id');
                    const newOrder = this.value;

                    fetch('{{ route('admin.steps.update-order') }}', {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                                'X-CSRF-TOKEN': '{{ csrf_token() }}'
                            },
                            body: JSON.stringify({
                                step_id: stepId,
                                order: newOrder
                            })
                        })
                        .then(response => response.json())
                        .then(data => {
                            if (data.success) {
                                showAlert('success', 'Orden del paso actualizado');
                                // Recargar la página para reflejar cambios
                                setTimeout(() => location.reload(), 1000);
                            }
                        })
                        .catch(error => {
                            console.error('Error:', error);
                            showAlert('danger', 'Error al actualizar el orden');
                        });
                });
            });
        });

        // Función para exportar contenido
        function exportContent() {
            const format = document.querySelector('input[name="export_format"]:checked').value;

            fetch(`{{ route('admin.guides.export', $guide) }}?format=${format}`)
                .then(response => response.blob())
                .then(blob => {
                    const url = window.URL.createObjectURL(blob);
                    const a = document.createElement('a');
                    a.href = url;
                    a.download = `guia-{{ $guide->slug }}-${new Date().toISOString().split('T')[0]}.${format}`;
                    document.body.appendChild(a);
                    a.click();
                    window.URL.revokeObjectURL(url);
                    document.body.removeChild(a);

                    // Cerrar modal
                    const modal = bootstrap.Modal.getInstance(document.getElementById('exportModal'));
                    modal.hide();

                    showAlert('success', 'Archivo exportado exitosamente');
                })
                .catch(error => {
                    console.error('Error:', error);
                    showAlert('danger', 'Error al exportar el archivo');
                });
        }

        // Función para mostrar alertas
        function showAlert(type, message) {
            const alertDiv = document.createElement('div');
            alertDiv.className = `alert alert-${type} alert-dismissible fade show position-fixed`;
            alertDiv.style.cssText = 'top: 20px; right: 20px; z-index: 9999; min-width: 300px;';
            alertDiv.innerHTML = `
            <i class="fas fa-${type === 'success' ? 'check-circle' : 'exclamation-triangle'} me-2"></i>
            ${message}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        `;

            document.body.appendChild(alertDiv);

            setTimeout(() => {
                if (alertDiv.parentNode) {
                    alertDiv.remove();
                }
            }, 5000);
        }
    </script>
@endpush
