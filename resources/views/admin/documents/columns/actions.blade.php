<div class="flex items-center space-x-2">
    <!-- Vista previa (solo PDF) -->
    @if ($document->extension === 'pdf')
        <a href="{{ route('admin.documents.show', $document) }}" target="_blank"
            class="inline-flex items-center p-2 text-sm font-medium text-center text-blue-700 bg-blue-100 rounded-lg hover:bg-blue-200 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-900 dark:text-blue-300 dark:hover:bg-blue-800"
            title="Vista previa">
            <i class="fas fa-eye w-4 h-4"></i>
        </a>
    @endif

    <!-- Descargar -->
    <a href="{{ route('admin.documents.download', $document) }}"
        class="inline-flex items-center p-2 text-sm font-medium text-center text-green-700 bg-green-100 rounded-lg hover:bg-green-200 focus:ring-4 focus:outline-none focus:ring-green-300 dark:bg-green-900 dark:text-green-300 dark:hover:bg-green-800"
        title="Descargar">
        <i class="fas fa-download w-4 h-4"></i>
    </a>

    <!-- Editar -->
    <a href="{{ route('admin.documents.edit', $document) }}"
        class="inline-flex items-center p-2 text-sm font-medium text-center text-yellow-700 bg-yellow-100 rounded-lg hover:bg-yellow-200 focus:ring-4 focus:outline-none focus:ring-yellow-300 dark:bg-yellow-900 dark:text-yellow-300 dark:hover:bg-yellow-800"
        title="Editar">
        <i class="fas fa-edit w-4 h-4"></i>
    </a>

    <!-- Eliminar -->
    <form action="{{ route('admin.documents.destroy', $document) }}" method="POST" class="inline"
        onsubmit="return confirm('¿Estás seguro de eliminar el documento \'{{ $document->title }}\'?')">
        @csrf
        @method('DELETE')
        <button type="submit"
            class="inline-flex items-center p-2 text-sm font-medium text-center text-red-700 bg-red-100 rounded-lg hover:bg-red-200 focus:ring-4 focus:outline-none focus:ring-red-300 dark:bg-red-900 dark:text-red-300 dark:hover:bg-red-800"
            title="Eliminar">
            <i class="fas fa-trash w-4 h-4"></i>
        </button>
    </form>
</div>
