{{-- resources/views/admin/guides/index.blade.php --}}
@extends('layouts.guide')

@section('content')
    <div class="container-fluid">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="h3 mb-0">Gestión de Guías</h1>
            <a href="{{ route('admin.guides.create') }}" class="btn btn-primary">
                <i class="fas fa-plus"></i> Nueva Guía
            </a>
        </div>

        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        <div class="card shadow">
            <div class="card-header bg-dark text-white">
                <h5 class="mb-0">Listado de Guías</h5>
            </div>
            <div class="card-body">
                @if ($guides->count() > 0)
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead class="table-light">
                                <tr>
                                    <th width="50">ID</th>
                                    <th>Título</th>
                                    <th>Slug</th>
                                    <th>Secciones</th>
                                    <th>Estado</th>
                                    <th>Creado</th>
                                    <th>Actualizado</th>
                                    <th width="200">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($guides as $guide)
                                    <tr>
                                        <td>{{ $guide->id }}</td>
                                        <td>
                                            <strong>{{ $guide->title }}</strong>
                                            @if ($guide->description)
                                                <br><small
                                                    class="text-muted">{{ Str::limit($guide->description, 50) }}</small>
                                            @endif
                                        </td>
                                        <td><code>{{ $guide->slug }}</code></td>
                                        <td>
                                            <span class="badge bg-info">
                                                {{ $guide->sections_count ?? $guide->sections->count() }} secciones
                                            </span>
                                        </td>
                                        <td>
                                            @if ($guide->is_active)
                                                <span class="badge bg-success">Activo</span>
                                            @else
                                                <span class="badge bg-secondary">Inactivo</span>
                                            @endif
                                        </td>
                                        <td>{{ $guide->created_at->format('d/m/Y') }}</td>
                                        <td>{{ $guide->updated_at->format('d/m/Y') }}</td>
                                        <td>
                                            <div class="btn-group" role="group">
                                                <a href="{{ route('admin.guides.show', $guide->slug) }}" target="_blank"
                                                    class="btn btn-sm btn-outline-primary" title="Ver">
                                                    <i class="fas fa-eye"></i>
                                                </a>
                                                <a href="{{ route('admin.guides.edit', $guide) }}"
                                                    class="btn btn-sm btn-outline-warning" title="Editar">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                                <form action="{{ route('admin.guides.destroy', $guide) }}" method="POST"
                                                    class="d-inline"
                                                    onsubmit="return confirm('¿Estás seguro de eliminar esta guía?');">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-outline-danger"
                                                        title="Eliminar">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </form>
                                                <a href="{{ route('admin.guides.import.form', $guide) }}"
                                                    class="btn btn-sm btn-outline-info" title="Importar archivo">
                                                    <i class="fas fa-file-import"></i>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    {{ $guides->links() }}
                @else
                    <div class="text-center py-5">
                        <i class="fas fa-folder-open fa-3x text-muted mb-3"></i>
                        <h4>No hay guías creadas</h4>
                        <p class="text-muted">Comienza creando tu primera guía</p>
                        <a href="{{ route('admin.guides.create') }}" class="btn btn-primary">
                            <i class="fas fa-plus"></i> Crear Primera Guía
                        </a>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection

@push('styles')
    <style>
        .badge {
            font-size: 0.85em;
        }

        .btn-group .btn {
            border-radius: 4px !important;
            margin-right: 2px;
        }

        .table th {
            border-top: none;
        }
    </style>
@endpush
