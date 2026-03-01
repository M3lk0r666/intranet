{{-- resources/views/admin/guides/partials/modals/section.blade.php --}}
<div class="modal fade" id="editSectionModal{{ $section->id }}" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{ route('admin.sections.update', $section) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="modal-header bg-warning text-dark">
                    <h5 class="modal-title"><i class="fas fa-edit"></i> Editar Sección</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="edit_section_title{{ $section->id }}" class="form-label">Título *</label>
                        <input type="text" class="form-control" id="edit_section_title{{ $section->id }}"
                            name="title" value="{{ $section->title }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="edit_section_icon{{ $section->id }}" class="form-label">Ícono</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fas fa-icons"></i></span>
                            <select class="form-select" id="edit_section_icon{{ $section->id }}" name="icon">
                                <option value="">Sin ícono</option>
                                <option value="clipboard-check"
                                    {{ $section->icon == 'clipboard-check' ? 'selected' : '' }}>Checklist</option>
                                <option value="exchange-alt" {{ $section->icon == 'exchange-alt' ? 'selected' : '' }}>
                                    Cambio</option>
                                <option value="check-double" {{ $section->icon == 'check-double' ? 'selected' : '' }}>
                                    Verificación</option>
                                <option value="clipboard-list"
                                    {{ $section->icon == 'clipboard-list' ? 'selected' : '' }}>Lista</option>
                                <option value="undo-alt" {{ $section->icon == 'undo-alt' ? 'selected' : '' }}>Rollback
                                </option>
                                <option value="cog" {{ $section->icon == 'cog' ? 'selected' : '' }}>Configuración
                                </option>
                                <option value="network-wired"
                                    {{ $section->icon == 'network-wired' ? 'selected' : '' }}>Red</option>
                            </select>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="edit_section_order{{ $section->id }}" class="form-label">Orden</label>
                        <input type="number" class="form-control" id="edit_section_order{{ $section->id }}"
                            name="order" value="{{ $section->order }}" min="0">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-warning">Guardar Cambios</button>
                </div>
            </form>
        </div>
    </div>
</div>
