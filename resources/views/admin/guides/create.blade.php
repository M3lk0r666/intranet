{{-- resources/views/admin/guides/create.blade.php --}}
@extends('layouts.guide')

@section('content')
    <div class="container-fluid">
        <div class="row mb-4">
            <div class="col">
                <h1 class="h3 mb-0">Crear Nueva Guía</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('admin.guides.index') }}">Guías</a></li>
                        <li class="breadcrumb-item active">Crear</li>
                    </ol>
                </nav>
            </div>
            <div class="col-auto">
                <a href="{{ route('admin.guides.index') }}" class="btn btn-secondary">
                    <i class="fas fa-arrow-left"></i> Volver
                </a>
            </div>
        </div>

        <div class="row">
            <div class="col-md-8">
                <div class="card shadow">
                    <div class="card-header bg-dark text-white">
                        <h5 class="mb-0">Información Básica</h5>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.guides.store') }}" method="POST">
                            @csrf

                            <div class="mb-3">
                                <label for="title" class="form-label">Título de la Guía *</label>
                                <input type="text" class="form-control @error('title') is-invalid @enderror"
                                    id="title" name="title" value="{{ old('title') }}"
                                    placeholder="Ej: Implementación de Switches" required>
                                @error('title')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                <div class="form-text">Este será el título principal de la guía.</div>
                            </div>

                            <div class="mb-3">
                                <label for="description" class="form-label">Descripción</label>
                                <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description"
                                    rows="3" placeholder="Breve descripción de la guía...">{{ old('description') }}</textarea>
                                @error('description')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" id="is_active" name="is_active"
                                        value="1" checked>
                                    <label class="form-check-label" for="is_active">
                                        Guía activa (visible al público)
                                    </label>
                                </div>
                            </div>

                            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                <button type="reset" class="btn btn-secondary me-md-2">
                                    <i class="fas fa-redo"></i> Limpiar
                                </button>
                                <button type="submit" class="btn btn-primary">
                                    <i class="fas fa-save"></i> Crear Guía
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card shadow">
                    <div class="card-header bg-info text-white">
                        <h5 class="mb-0">Opciones Avanzadas</h5>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <h6>Crear desde Archivo</h6>
                            <p class="small text-muted">
                                Después de crear la guía, podrás importar el contenido desde un archivo TXT o JSON.
                            </p>
                            <a href="#file-format" class="btn btn-outline-info btn-sm" data-bs-toggle="collapse">
                                <i class="fas fa-info-circle"></i> Ver Formato del Archivo
                            </a>
                        </div>

                        <div class="collapse" id="file-format">
                            <div class="card card-body small">
                                <strong>Formato TXT recomendado:</strong>
                                <pre class="mt-2" style="font-size: 0.8em;">
# Título de Sección 1
## Subsección 1.1
- Item 1 de lista
- Item 2 de lista

> Comando 1: show config
> Comando 2: show version

## Subsección 1.2
Texto de contenido...

Nota: Esta es una nota importante.

# Título de Sección 2
## Subsección 2.1
- Otro item
                            </pre>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card shadow mt-4">
                    <div class="card-header bg-warning text-dark">
                        <h5 class="mb-0">Consejos</h5>
                    </div>
                    <div class="card-body">
                        <ul class="list-unstyled small">
                            <li class="mb-2"><i class="fas fa-check text-success"></i> El slug se generará automáticamente
                            </li>
                            <li class="mb-2"><i class="fas fa-check text-success"></i> Puedes editar las secciones después
                            </li>
                            <li class="mb-2"><i class="fas fa-check text-success"></i> Importa contenido desde archivos
                                existentes</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        // Generar slug automático
        document.getElementById('title').addEventListener('input', function(e) {
            const slugField = document.getElementById('slug');
            if (slugField) {
                slugField.value = e.target.value
                    .toLowerCase()
                    .replace(/[^\w\s]/gi, '')
                    .replace(/\s+/g, '-');
            }
        });
    </script>
@endpush
