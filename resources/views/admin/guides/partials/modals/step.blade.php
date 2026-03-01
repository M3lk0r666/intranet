{{-- resources/views/admin/guides/partials/modals/step.blade.php --}}
<!-- Modal para agregar paso -->
<div class="modal fade" id="addStepModal{{ $section->id }}" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form action="{{ route('admin.steps.store') }}" method="POST">
                @csrf
                <input type="hidden" name="guide_section_id" value="{{ $section->id }}">

                <div class="modal-header bg-success text-white">
                    <h5 class="modal-title"><i class="fas fa-plus-circle"></i> Nuevo Paso</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="step_title{{ $section->id }}" class="form-label">Título (opcional)</label>
                        <input type="text" class="form-control" id="step_title{{ $section->id }}" name="title">
                    </div>

                    <div class="mb-3">
                        <label for="step_content_type{{ $section->id }}" class="form-label">Tipo de Contenido *</label>
                        <select class="form-select" id="step_content_type{{ $section->id }}" name="content_type"
                            required>
                            <option value="text">Texto simple</option>
                            <option value="list">Lista de elementos</option>
                            <option value="commands">Comandos</option>
                            <option value="note">Nota importante</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="step_content{{ $section->id }}" class="form-label">Contenido</label>
                        <textarea class="form-control" id="step_content{{ $section->id }}" name="content" rows="4"></textarea>
                    </div>

                    <div class="mb-3" id="items_container{{ $section->id }}" style="display: none;">
                        <label class="form-label">Elementos (uno por línea)</label>
                        <textarea class="form-control" name="items" rows="6" placeholder="Cada elemento en una línea nueva"></textarea>
                    </div>

                    <div class="mb-3">
                        <label for="step_order{{ $section->id }}" class="form-label">Orden</label>
                        <input type="number" class="form-control" id="step_order{{ $section->id }}" name="order"
                            value="{{ $section->steps->count() }}" min="0">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-success">Crear Paso</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal para editar paso -->
@foreach ($section->steps as $step)
    <div class="modal fade" id="editStepModal{{ $step->id }}" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <form action="{{ route('admin.steps.update', $step) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="modal-header bg-info text-white">
                        <h5 class="modal-title"><i class="fas fa-edit"></i> Editar Paso</h5>
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="edit_step_title{{ $step->id }}" class="form-label">Título
                                (opcional)</label>
                            <input type="text" class="form-control" id="edit_step_title{{ $step->id }}"
                                name="title" value="{{ $step->title }}">
                        </div>

                        <div class="mb-3">
                            <label for="edit_step_content_type{{ $step->id }}" class="form-label">Tipo de Contenido
                                *</label>
                            <select class="form-select" id="edit_step_content_type{{ $step->id }}"
                                name="content_type" required>
                                <option value="text" {{ $step->content_type == 'text' ? 'selected' : '' }}>Texto
                                    simple</option>
                                <option value="list" {{ $step->content_type == 'list' ? 'selected' : '' }}>Lista de
                                    elementos</option>
                                <option value="commands" {{ $step->content_type == 'commands' ? 'selected' : '' }}>
                                    Comandos</option>
                                <option value="note" {{ $step->content_type == 'note' ? 'selected' : '' }}>Nota
                                    importante</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="edit_step_content{{ $step->id }}" class="form-label">Contenido</label>
                            <textarea class="form-control" id="edit_step_content{{ $step->id }}" name="content" rows="4">{{ $step->content }}</textarea>
                        </div>

                        <div class="mb-3" id="edit_items_container{{ $step->id }}"
                            style="{{ $step->content_type == 'list' || $step->content_type == 'commands' ? '' : 'display: none;' }}">
                            <label class="form-label">Elementos (uno por línea)</label>
                            <textarea class="form-control" name="items" rows="6">
@if ($step->items)
{{ implode("\n", json_decode($step->items, true)) }}
@endif
</textarea>
                        </div>

                        <div class="mb-3">
                            <label for="edit_step_order{{ $step->id }}" class="form-label">Orden</label>
                            <input type="number" class="form-control" id="edit_step_order{{ $step->id }}"
                                name="order" value="{{ $step->order }}" min="0">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-info">Guardar Cambios</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endforeach

@push('scripts')
    <script>
        // Mostrar/ocultar campo de items según tipo de contenido
        document.getElementById('step_content_type{{ $section->id }}')?.addEventListener('change', function() {
            const itemsContainer = document.getElementById('items_container{{ $section->id }}');
            const contentField = document.getElementById('step_content{{ $section->id }}');

            if (this.value === 'list' || this.value === 'commands') {
                itemsContainer.style.display = 'block';
                contentField.required = false;
            } else {
                itemsContainer.style.display = 'none';
                contentField.required = true;
            }
        });

        // Para modales de edición
        @foreach ($section->steps as $step)
            document.getElementById('edit_step_content_type{{ $step->id }}')?.addEventListener('change', function() {
                const itemsContainer = document.getElementById('edit_items_container{{ $step->id }}');
                const contentField = document.getElementById('edit_step_content{{ $step->id }}');

                if (this.value === 'list' || this.value === 'commands') {
                    itemsContainer.style.display = 'block';
                    contentField.required = false;
                } else {
                    itemsContainer.style.display = 'none';
                    contentField.required = true;
                }
            });
        @endforeach
    </script>
@endpush
