{{-- resources/views/admin/guides/import.blade.php --}}
@extends('layouts.guide')

@section('content')
    <div class="container-fluid">
        <div class="row mb-4">
            <div class="col">
                <h1 class="h3 mb-0">Importar Contenido a Guía</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('admin.guides.index') }}">Guías</a></li>
                        <li class="breadcrumb-item"><a
                                href="{{ route('admin.guides.edit', $guide) }}">{{ $guide->title }}</a></li>
                        <li class="breadcrumb-item active">Importar</li>
                    </ol>
                </nav>
            </div>
            <div class="col-auto">
                <a href="{{ route('admin.guides.edit', $guide) }}" class="btn btn-secondary">
                    <i class="fas fa-arrow-left"></i> Volver a Editar
                </a>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-8">
                <div class="card shadow">
                    <div class="card-header bg-dark text-white">
                        <h5 class="mb-0">Importar desde Archivo</h5>
                    </div>
                    <div class="card-body">
                        @if (session('error'))
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <i class="fas fa-exclamation-triangle"></i> {{ session('error') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                            </div>
                        @endif

                        @if ($guide->sections->count() > 0)
                            <div class="alert alert-warning">
                                <i class="fas fa-exclamation-triangle"></i>
                                <strong>Advertencia:</strong> Esta guía ya tiene {{ $guide->sections->count() }} secciones.
                                Importar un nuevo archivo <strong>reemplazará todo el contenido actual</strong>.
                            </div>
                        @endif

                        <form action="{{ route('admin.guides.import.process', $guide) }}" method="POST"
                            enctype="multipart/form-data" id="importForm">
                            @csrf

                            <div class="mb-4">
                                <label for="file" class="form-label">Seleccionar Archivo *</label>
                                <input type="file" class="form-control @error('file') is-invalid @enderror"
                                    id="file" name="file" accept=".txt,.json,.md" required>
                                @error('file')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                <div class="form-text">
                                    Formatos aceptados: TXT, JSON, Markdown (recomendado: TXT)
                                </div>
                            </div>

                            <div class="mb-4">
                                <label class="form-label">Opciones de Importación</label>
                                <div class="form-check mb-2">
                                    <input class="form-check-input" type="checkbox" id="replace_content"
                                        name="replace_content" value="1" checked>
                                    <label class="form-check-label" for="replace_content">
                                        Reemplazar contenido existente
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="auto_generate_icons"
                                        name="auto_generate_icons" value="1" checked>
                                    <label class="form-check-label" for="auto_generate_icons">
                                        Generar íconos automáticamente según el título
                                    </label>
                                </div>
                            </div>

                            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                <button type="button" class="btn btn-outline-secondary me-md-2" data-bs-toggle="modal"
                                    data-bs-target="#formatModal">
                                    <i class="fas fa-question-circle"></i> Ver Formato
                                </button>
                                <button type="submit" class="btn btn-primary" id="importButton">
                                    <i class="fas fa-file-import"></i> Importar Archivo
                                </button>
                            </div>
                        </form>
                    </div>
                </div>

                @if ($guide->files->count() > 0)
                    <div class="card shadow mt-4">
                        <div class="card-header bg-info text-white">
                            <h5 class="mb-0">Archivos Importados Anteriormente</h5>
                        </div>
                        <div class="card-body">
                            <div class="list-group">
                                @foreach ($guide->files as $file)
                                    <div class="list-group-item">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div>
                                                <i class="fas fa-file-alt text-primary"></i>
                                                <strong>{{ basename($file->file_path) }}</strong>
                                                <small class="text-muted ms-2">{{ $file->file_type }}</small>
                                            </div>
                                            <div>
                                                <small class="text-muted me-3">
                                                    {{ $file->created_at->format('d/m/Y H:i') }}
                                                </small>
                                                <form action="{{ route('admin.guides.import.delete-file', $file) }}"
                                                    method="POST" class="d-inline"
                                                    onsubmit="return confirm('¿Eliminar este archivo?');">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-outline-danger">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                @endif
            </div>

            <div class="col-lg-4">
                <div class="card shadow">
                    <div class="card-header bg-primary text-white">
                        <h5 class="mb-0">Vista Previa de la Guía</h5>
                    </div>
                    <div class="card-body">
                        <div class="text-center mb-3">
                            <h4>{{ $guide->title }}</h4>
                            @if ($guide->description)
                                <p class="text-muted">{{ $guide->description }}</p>
                            @endif
                        </div>

                        <div class="mb-3">
                            <strong>URL Pública:</strong>
                            <div class="input-group input-group-sm mt-1">
                                <input type="text" class="form-control"
                                    value="{{ route('admin.guides.show', $guide->slug) }}" readonly>
                                <button class="btn btn-outline-secondary" type="button" onclick="copyToClipboard(this)">
                                    <i class="fas fa-copy"></i>
                                </button>
                            </div>
                        </div>

                        <div class="mb-3">
                            <strong>Estadísticas:</strong>
                            <ul class="list-unstyled small mt-2">
                                <li><i class="fas fa-layer-group text-info"></i> Secciones:
                                    {{ $guide->sections->count() }}</li>
                                <li><i class="fas fa-list-check text-success"></i> Pasos totales:
                                    {{ $guide->sections->sum(function ($section) {return $section->steps->count();}) }}
                                </li>
                                <li><i class="fas fa-calendar text-warning"></i> Creada:
                                    {{ $guide->created_at->format('d/m/Y') }}</li>
                            </ul>
                        </div>

                        <div class="text-center mt-4">
                            <a href="{{ route('admin.guides.show', $guide->slug) }}" target="_blank"
                                class="btn btn-outline-primary w-100">
                                <i class="fas fa-external-link-alt"></i> Ver Vista Pública
                            </a>
                        </div>
                    </div>
                </div>

                <div class="card shadow mt-4">
                    <div class="card-header bg-warning text-dark">
                        <h5 class="mb-0">Consejos de Importación</h5>
                    </div>
                    <div class="card-body small">
                        <ul class="mb-0">
                            <li class="mb-2">Usa <code># Título</code> para secciones principales</li>
                            <li class="mb-2">Usa <code>## Subtítulo</code> para subsecciones</li>
                            <li class="mb-2">Usa <code>- item</code> para listas</li>
                            <li class="mb-2">Usa <code>> comando</code> para comandos</li>
                            <li>Líneas que comiencen con "Nota:" se convertirán en notas destacadas</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal de Formato -->
    <div class="modal fade" id="formatModal" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header bg-dark text-white">
                    <h5 class="modal-title">Formato del Archivo TXT</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <p>Estructura recomendada para el archivo TXT:</p>
                    <pre style="background: #f8f9fa; padding: 15px; border-radius: 5px; font-size: 0.9em;">
# Actividades Previas
## Recopilación de Configuración Actual
- Solicitar al cliente archivo de configuración actual
- Verificar documentación existente

> show configuration
> show version detail
> show licence detail

Nota: Esta información es crítica para el éxito de la implementación.

## Preparación de Equipos
- Revisar equipamiento nuevo
- Etiquetar cableado

# Actividades en el Cambio
## Sustitución Física
- Desconectar cables de poder
- Montar equipos nuevos
                </pre>

                    <div class="alert alert-info">
                        <i class="fas fa-lightbulb"></i>
                        <strong>Tip:</strong> Puedes descargar una
                        <a href="{{ asset('templates/guide-template.txt') }}" download>plantilla de ejemplo</a>
                        para empezar.
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        function copyToClipboard(button) {
            const input = button.closest('.input-group').querySelector('input');
            input.select();
            document.execCommand('copy');

            const originalIcon = button.innerHTML;
            button.innerHTML = '<i class="fas fa-check"></i>';
            button.classList.remove('btn-outline-secondary');
            button.classList.add('btn-success');

            setTimeout(() => {
                button.innerHTML = originalIcon;
                button.classList.remove('btn-success');
                button.classList.add('btn-outline-secondary');
            }, 2000);
        }

        // Validación del formulario
        document.getElementById('importForm').addEventListener('submit', function(e) {
            const fileInput = document.getElementById('file');
            const importButton = document.getElementById('importButton');

            if (fileInput.files.length > 0) {
                const fileSize = fileInput.files[0].size / 1024 / 1024; // MB
                if (fileSize > 5) {
                    e.preventDefault();
                    alert('El archivo es demasiado grande. Máximo 5MB.');
                    return;
                }

                // Cambiar texto del botón durante la importación
                importButton.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Importando...';
                importButton.disabled = true;
            }
        });
    </script>
@endpush
