{{-- resources/views/public/documents/show.blade.php --}}
@extends('layouts.docs')

@section('title', $document->title)

@section('content')
    <div class="min-h-screen bg-gray-50">
        <!-- Breadcrumb -->
        <nav class="bg-white border-b border-gray-200">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-4">
                <div class="flex items-center space-x-2 text-sm">
                    <a href="{{ route('documentos.index') }}"
                        class="text-primary-600 hover:text-primary-800 flex items-center">
                        <i class="fas fa-home mr-2"></i> Inicio
                    </a>
                    <span class="text-gray-400">
                        <i class="fas fa-chevron-right"></i>
                    </span>
                    <a href="{{ route('documentos.index', ['category' => $document->category]) }}"
                        class="text-primary-600 hover:text-primary-800">
                        {{ $document->category_info->name }}
                    </a>
                    <span class="text-gray-400">
                        <i class="fas fa-chevron-right"></i>
                    </span>
                    <span class="text-gray-600 truncate" title="{{ $document->title }}">
                        {{ Str::limit($document->title, 50) }}
                    </span>
                </div>
            </div>
        </nav>

        <!-- Main Content -->
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
            <div class="flex flex-col lg:flex-row gap-8">
                <!-- Sidebar -->
                <div class="lg:w-1/3 xl:w-1/4">
                    <div class="space-y-6">
                        <!-- Document Info Card -->
                        <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
                            <div class="text-center mb-6">
                                <div class="inline-flex items-center justify-center w-20 h-20 rounded-2xl mb-4"
                                    style="background-color: {{ $document->category_info->color }}20; color: {{ $document->category_info->color }}">
                                    <i class="{{ $document->icon }} text-3xl"></i>
                                </div>
                                <h3 class="font-bold text-gray-800 mb-2" title="{{ $document->title }}">
                                    {{ Str::limit($document->title, 60) }}
                                </h3>
                                <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium mb-4"
                                    style="background-color: {{ $document->category_info->color }}20; color: {{ $document->category_info->color }}">
                                    <i class="{{ $document->category_info->color }} mr-2"></i>
                                    {{ $document->category_info->name }}
                                </span>
                            </div>
                            <!-- Document Details -->
                            <div class="space-y-3">
                                <div class="flex items-center justify-between py-2 border-b border-gray-100">
                                    <span class="text-sm text-gray-600">
                                        <i class="fas fa-file mr-2"></i>Tipo de archivo
                                    </span>
                                    <span class="font-medium">.{{ strtoupper($document->extension) }}</span>
                                </div>
                                <div class="flex items-center justify-between py-2 border-b border-gray-100">
                                    <span class="text-sm text-gray-600">
                                        <i class="fas fa-weight-hanging mr-2"></i>Tamaño
                                    </span>
                                    <span class="font-medium">{{ $document->formatted_size }}</span>
                                </div>
                                <div class="flex items-center justify-between py-2 border-b border-gray-100">
                                    <span class="text-sm text-gray-600">
                                        <i class="fas fa-download mr-2"></i>Descargas
                                    </span>
                                    <span class="font-medium">{{ $document->downloads }}</span>
                                </div>
                                <div class="flex items-center justify-between py-2 border-b border-gray-100">
                                    <span class="text-sm text-gray-600">
                                        <i class="fas fa-calendar-alt mr-2"></i>Fecha de subida
                                    </span>
                                    <span class="font-medium">{{ $document->created_at->format('d/m/Y') }}</span>
                                </div>
                                <div class="flex items-center justify-between py-2">
                                    <span class="text-sm text-gray-600">
                                        <i class="fas fa-eye mr-2"></i>Vistas
                                    </span>
                                    <span class="font-medium">{{ $document->views ?? 0 }}</span>
                                </div>
                            </div>
                            <!-- Download Button -->
                            <div class="mt-6">
                                <a href="{{ route('documentos.download', $document) }}"
                                    class="w-full inline-flex items-center justify-center px-4 py-3 bg-gradient-to-r from-green-500 to-emerald-600 text-white rounded-lg hover:opacity-90 transition-all duration-200 font-medium shadow-lg badge-pulse">
                                    <i class="fas fa-download mr-2"></i> Descargar Documento
                                </a>
                            </div>
                            <!-- Share Actions -->
                            <div class="mt-4 flex space-x-2">
                                <button onclick="copyToClipboard()"
                                    class="flex-1 inline-flex items-center justify-center px-4 py-2 bg-gray-100 text-gray-700 rounded-lg hover:bg-gray-200 transition-colors">
                                    <i class="fas fa-link mr-2"></i> Copiar enlace
                                </button>
                                <button onclick="shareDocument()"
                                    class="flex-1 inline-flex items-center justify-center px-4 py-2 bg-blue-100 text-blue-700 rounded-lg hover:bg-blue-200 transition-colors">
                                    <i class="fas fa-share-alt mr-2"></i> Compartir
                                </button>
                            </div>
                        </div>

                        <!-- Author Info -->
                        <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
                            <h4 class="font-bold text-gray-800 mb-4">
                                <i class="fas fa-user-circle mr-2"></i>Información del autor
                            </h4>
                            <div class="flex items-center">
                                <div class="flex-shrink-0">
                                    <div class="w-12 h-12 rounded-full bg-primary-100 flex items-center justify-center">
                                        <i class="fas fa-user text-primary-600"></i>
                                    </div>
                                </div>
                                <div class="ml-4">
                                    <p class="text-sm text-gray-500">Subido por</p>
                                    <p class="font-medium text-gray-800">{{ $document->user->name ?? 'Sistema' }}</p>
                                </div>
                            </div>
                            <div class="mt-4 text-sm text-gray-500 flex items-center">
                                <i class="far fa-clock mr-2"></i>
                                {{ $document->created_at->diffForHumans() }}
                            </div>
                        </div>

                        <!-- Related Documents -->
                        @if ($relatedDocuments->count() > 0)
                            <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
                                <h4 class="font-bold text-gray-800 mb-4">
                                    <i class="fas fa-paperclip mr-2"></i>Documentos relacionados
                                </h4>
                                <div class="space-y-4">
                                    @foreach ($relatedDocuments as $related)
                                        <a href="{{ route('documentos.show', $related) }}" class="block group">
                                            <div class="flex items-start p-3 rounded-lg hover:bg-gray-50 transition-colors">
                                                <div class="flex-shrink-0 p-2 rounded-lg mr-3"
                                                    style="background-color: {{ $related->category_info->color }}20; color: {{ $related->category_info->color }}">
                                                    <i class="{{ $related->icon }}"></i>
                                                </div>
                                                <div class="flex-1 min-w-0">
                                                    <h5
                                                        class="text-sm font-medium text-gray-800 group-hover:text-primary-600 line-clamp-2">
                                                        {{ $related->title }}
                                                    </h5>
                                                    <div class="flex items-center text-xs text-gray-500 mt-1">
                                                        <span class="flex items-center mr-3">
                                                            <i class="fas fa-file mr-1"></i>
                                                            .{{ strtoupper($related->extension) }}
                                                        </span>
                                                        <span class="flex items-center">
                                                            <i class="fas fa-download mr-1"></i>
                                                            {{ $related->downloads }}
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    @endforeach
                                </div>
                            </div>
                        @endif
                    </div>
                </div>

                <!-- Main Content -->
                <div class="lg:w-2/3 xl:w-3/4">
                    <!-- Document Header -->
                    <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6 mb-6">
                        <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-6 mb-6">
                            <div class="flex-1">
                                <div class="flex items-center mb-4">
                                    <div class="p-3 rounded-xl mr-4"
                                        style="background-color: {{ $document->category_info->color }}20; color: {{ $document->category_info->color }}">
                                        <i class="{{ $document->icon }} text-4xl"></i>
                                    </div>
                                    <div>
                                        <h1 class="text-2xl md:text-3xl font-bold text-gray-800 mb-2">
                                            {{ $document->title }}</h1>
                                        <div class="flex flex-wrap items-center gap-2">
                                            <span
                                                class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium"
                                                style="background-color: {{ $document->category_info->color }}20; color: {{ $document->category_info->color }}">
                                                <i class="{{ $document->category_info->color }} mr-2"></i>
                                                {{ $document->category_info->name }}
                                            </span>
                                            <span class="text-sm text-gray-500">
                                                <i class="far fa-calendar mr-1"></i>
                                                Actualizado {{ $document->updated_at->diffForHumans() }}
                                            </span>
                                        </div>
                                    </div>
                                </div>

                                @if ($document->description)
                                    <div class="bg-gray-50 border-l-4 border-primary-500 p-4 rounded-r-lg">
                                        <div class="flex">
                                            <i class="fas fa-info-circle text-primary-500 mr-3 mt-1"></i>
                                            <p class="text-gray-700">{{ $document->description }}</p>
                                        </div>
                                    </div>
                                @endif
                            </div>

                            <!-- Action Buttons -->
                            <div class="flex flex-col sm:flex-row gap-3">
                                @if (in_array($document->extension, ['pdf', 'txt', 'jpg', 'jpeg', 'png', 'md']))
                                    <button type="button" data-modal-target="previewModal"
                                        data-modal-toggle="previewModal"
                                        class="inline-flex items-center px-5 py-2.5 bg-primary-600 text-white rounded-lg hover:bg-primary-700 focus:ring-4 focus:ring-primary-300 font-medium">
                                        <i class="fas fa-eye mr-2"></i> Vista previa
                                    </button>
                                @endif

                                <a href="{{ route('documentos.download', $document) }}"
                                    class="inline-flex items-center px-5 py-2.5 bg-gradient-to-r from-green-500 to-emerald-600 text-white rounded-lg hover:opacity-90 font-medium shadow-lg badge-pulse">
                                    <i class="fas fa-download mr-2"></i> Descargar
                                </a>
                            </div>
                        </div>

                        <!-- Document Stats -->
                        <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                            <div class="bg-gradient-to-br from-blue-50 to-blue-100 border border-blue-200 rounded-xl p-4">
                                <div class="flex items-center">
                                    <div class="p-2 bg-blue-100 rounded-lg mr-3">
                                        <i class="fas fa-file text-blue-600"></i>
                                    </div>
                                    <div>
                                        <p class="text-sm text-gray-600">Formato</p>
                                        <p class="text-lg font-bold text-gray-800">.{{ strtoupper($document->extension) }}
                                        </p>
                                    </div>
                                </div>
                            </div>

                            <div
                                class="bg-gradient-to-br from-green-50 to-green-100 border border-green-200 rounded-xl p-4">
                                <div class="flex items-center">
                                    <div class="p-2 bg-green-100 rounded-lg mr-3">
                                        <i class="fas fa-weight-hanging text-green-600"></i>
                                    </div>
                                    <div>
                                        <p class="text-sm text-gray-600">Tamaño</p>
                                        <p class="text-lg font-bold text-gray-800">{{ $document->formatted_size }}</p>
                                    </div>
                                </div>
                            </div>

                            <div
                                class="bg-gradient-to-br from-purple-50 to-purple-100 border border-purple-200 rounded-xl p-4">
                                <div class="flex items-center">
                                    <div class="p-2 bg-purple-100 rounded-lg mr-3">
                                        <i class="fas fa-download text-purple-600"></i>
                                    </div>
                                    <div>
                                        <p class="text-sm text-gray-600">Descargas</p>
                                        <p class="text-lg font-bold text-gray-800">{{ $document->downloads }}</p>
                                    </div>
                                </div>
                            </div>

                            <div
                                class="bg-gradient-to-br from-amber-50 to-amber-100 border border-amber-200 rounded-xl p-4">
                                <div class="flex items-center">
                                    <div class="p-2 bg-amber-100 rounded-lg mr-3">
                                        <i class="fas fa-eye text-amber-600"></i>
                                    </div>
                                    <div>
                                        <p class="text-sm text-gray-600">Vistas</p>
                                        <p class="text-lg font-bold text-gray-800">{{ $document->views ?? 0 }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Document Preview -->
                    <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden mb-6">
                        <div class="border-b border-gray-200 px-6 py-4">
                            <h3 class="text-lg font-bold text-gray-800">
                                <i class="fas fa-eye mr-2"></i>Vista previa del documento
                            </h3>
                            <p class="text-sm text-gray-600 mt-1">
                                Visualización del contenido del archivo
                            </p>
                        </div>

                        <div class="p-6">
                            @if ($document->extension === 'pdf')
                                <div class="border border-gray-300 rounded-lg overflow-hidden">
                                    <iframe src="{{ Storage::url($document->file_path) }}" class="w-full h-96"
                                        title="Vista previa del PDF" allowfullscreen>
                                    </iframe>
                                </div>
                                <div class="mt-4 flex items-center text-sm text-gray-500">
                                    <i class="fas fa-info-circle mr-2 text-primary-500"></i>
                                    Esta es una vista previa del documento. Para verlo completo o imprimirlo, descarga el
                                    archivo.
                                </div>
                            @elseif(in_array($document->extension, ['jpg', 'jpeg', 'png', 'gif', 'bmp', 'svg']))
                                <div class="text-center">
                                    <img src="{{ Storage::url($document->file_path) }}" alt="{{ $document->title }}"
                                        class="max-w-full h-auto mx-auto rounded-lg shadow-md max-h-96">
                                </div>
                            @elseif(in_array($document->extension, ['txt', 'md', 'html', 'css', 'js']))
                                <div class="bg-gray-900 rounded-lg overflow-hidden">
                                    <div class="bg-gray-800 px-4 py-2 flex items-center justify-between">
                                        <div class="flex items-center text-gray-300 text-sm">
                                            <i class="fas fa-code mr-2"></i>
                                            <span>.{{ strtoupper($document->extension) }}</span>
                                        </div>
                                        <button onclick="loadTextContent()"
                                            class="text-xs px-3 py-1 bg-gray-700 text-gray-300 rounded hover:bg-gray-600">
                                            <i class="fas fa-sync-alt mr-1"></i> Cargar contenido
                                        </button>
                                    </div>
                                    <pre id="text-content" class="p-4 text-gray-100 overflow-auto max-h-96 font-mono text-sm">
                                    Cargando contenido del archivo...
                            </pre>
                                </div>
                            @else
                                <div class="text-center py-12">
                                    <div
                                        class="inline-flex items-center justify-center w-20 h-20 rounded-full bg-gray-100 mb-4">
                                        <i class="fas fa-eye-slash text-gray-400 text-3xl"></i>
                                    </div>
                                    <h4 class="text-xl font-bold text-gray-700 mb-2">Vista previa no disponible</h4>
                                    <p class="text-gray-600 max-w-md mx-auto mb-6">
                                        El formato .{{ strtoupper($document->extension) }} no admite vista previa en el
                                        navegador.
                                        Descarga el archivo para ver su contenido completo.
                                    </p>
                                    <a href="{{ route('documentos.download', $document) }}"
                                        class="inline-flex items-center px-5 py-2.5 bg-primary-600 text-white rounded-lg hover:bg-primary-700 font-medium">
                                        <i class="fas fa-download mr-2"></i> Descargar para ver
                                    </a>
                                </div>
                            @endif
                        </div>
                    </div>

                    <!-- Document Metadata -->
                    @if ($document->tags || $document->version)
                        <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6 mb-6">
                            <h3 class="text-lg font-bold text-gray-800 mb-4">
                                <i class="fas fa-info-circle mr-2"></i>Información adicional
                            </h3>

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                @if ($document->tags && count($document->tags) > 0)
                                    <div>
                                        <h4 class="font-medium text-gray-700 mb-3">
                                            <i class="fas fa-tags mr-2"></i>Etiquetas
                                        </h4>
                                        <div class="flex flex-wrap gap-2">
                                            @foreach ($document->tags as $tag)
                                                <span
                                                    class="inline-flex items-center px-3 py-1 rounded-full text-sm bg-gray-100 text-gray-800">
                                                    <i class="fas fa-hashtag mr-1 text-gray-500"></i>
                                                    {{ $tag }}
                                                </span>
                                            @endforeach
                                        </div>
                                    </div>
                                @endif

                                @if ($document->version)
                                    <div>
                                        <h4 class="font-medium text-gray-700 mb-3">
                                            <i class="fas fa-code-branch mr-2"></i>Versión del documento
                                        </h4>
                                        <div class="flex items-center">
                                            <div class="p-3 bg-primary-50 rounded-lg mr-4">
                                                <i class="fas fa-flag text-primary-600 text-xl"></i>
                                            </div>
                                            <div>
                                                <p class="text-2xl font-bold text-gray-800">{{ $document->version }}</p>
                                                <p class="text-sm text-gray-600">Versión actual del documento</p>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                    @endif

                    <!-- Same Category Documents -->
                    @if ($sameCategoryDocuments->count() > 0)
                        <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
                            <div class="flex items-center justify-between mb-6">
                                <h3 class="text-lg font-bold text-gray-800">
                                    <i class="fas fa-folder mr-2"
                                        style="color: {{ $document->category_info->color }}"></i>
                                    Más documentos en {{ $document->category_info->name }}
                                </h3>
                                <a href="{{ route('documentos.index', ['category' => $document->category]) }}"
                                    class="text-sm text-primary-600 hover:text-primary-800 font-medium">
                                    Ver todos <i class="fas fa-arrow-right ml-1"></i>
                                </a>
                            </div>

                            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-4">
                                @foreach ($sameCategoryDocuments->take(4) as $doc)
                                    <a href="{{ route('documentos.show', $doc) }}" class="group block">
                                        <div
                                            class="bg-gray-50 border border-gray-200 rounded-xl p-4 hover:border-primary-300 hover:shadow-md transition-all duration-300 h-full">
                                            <div class="flex items-start mb-3">
                                                <div class="p-2 rounded-lg mr-3"
                                                    style="background-color: {{ $document->category_info->color }}20; color: {{ $doc->category_info->color }}">
                                                    <i class="{{ $doc->icon }}"></i>
                                                </div>
                                                <div class="flex-1">
                                                    <h4
                                                        class="font-medium text-gray-800 group-hover:text-primary-600 line-clamp-2 mb-2">
                                                        {{ $doc->title }}
                                                    </h4>
                                                    <div class="flex items-center text-xs text-gray-500">
                                                        <span class="mr-3">
                                                            .{{ strtoupper($doc->extension) }}
                                                        </span>
                                                        <span>{{ $doc->formatted_size }}</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="flex items-center justify-between">
                                                <span class="text-xs px-2 py-1 rounded-full"
                                                    style="background-color: {{ $doc->category_info->color }}20; color: {{ $doc->category_info->color }}">
                                                    {{ $doc->category_info->name }}
                                                </span>
                                                <span class="text-xs text-gray-500">
                                                    <i class="fas fa-download mr-1"></i>{{ $doc->downloads }}
                                                </span>
                                            </div>
                                        </div>
                                    </a>
                                @endforeach
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <!-- Preview Modal -->
    <div id="previewModal" tabindex="-1" aria-hidden="true"
        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-7xl max-h-full">
            <div class="relative bg-white rounded-xl shadow-lg border border-gray-200">
                <!-- Modal header -->
                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t-xl border-gray-200">
                    <h3 class="text-xl font-semibold text-gray-800">
                        <i class="fas fa-eye mr-2"></i>Vista previa completa: {{ $document->title }}
                    </h3>
                    <button type="button"
                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center"
                        data-modal-hide="previewModal">
                        <i class="fas fa-times"></i>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>

                <!-- Modal body -->
                <div class="p-4 md:p-5">
                    @if ($document->extension === 'pdf')
                        <div class="border border-gray-300 rounded-lg overflow-hidden">
                            <iframe src="{{ Storage::url($document->file_path) }}" class="w-full h-[calc(100vh-200px)]"
                                title="Vista previa completa del PDF">
                            </iframe>
                        </div>
                    @elseif(in_array($document->extension, ['txt', 'md', 'html', 'css', 'js']))
                        <div class="bg-gray-900 rounded-lg overflow-hidden h-[calc(100vh-200px)]">
                            <div class="bg-gray-800 px-4 py-3 flex items-center justify-between">
                                <div class="flex items-center text-gray-300">
                                    <i class="fas fa-code mr-2"></i>
                                    <span>{{ $document->title }}</span>
                                </div>
                                <div class="flex items-center space-x-2">
                                    <button onclick="copyTextContent()"
                                        class="text-sm px-3 py-1.5 bg-gray-700 text-gray-300 rounded hover:bg-gray-600">
                                        <i class="fas fa-copy mr-1"></i> Copiar
                                    </button>
                                </div>
                            </div>
                            <pre id="modal-text-content" class="p-6 text-gray-100 overflow-auto h-[calc(100%-60px)] font-mono text-sm">Cargando contenido completo...
                    </pre>
                        </div>
                    @else
                        <div class="text-center py-12">
                            <i class="fas fa-expand-alt text-gray-400 text-5xl mb-4"></i>
                            <h4 class="text-xl font-bold text-gray-700 mb-2">Vista previa completa no disponible</h4>
                            <p class="text-gray-600 max-w-md mx-auto mb-6">
                                Para ver el contenido completo de este archivo, por favor descárgalo.
                            </p>
                        </div>
                    @endif
                </div>

                <!-- Modal footer -->
                <div class="flex items-center justify-between p-4 md:p-5 border-t border-gray-200 rounded-b-xl">
                    <div class="text-sm text-gray-500">
                        <i class="fas fa-info-circle mr-2"></i>
                        Documento: {{ $document->title }}
                    </div>
                    <div class="flex space-x-3">
                        <a href="{{ route('documentos.download', $document) }}"
                            class="inline-flex items-center px-4 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700 font-medium">
                            <i class="fas fa-download mr-2"></i> Descargar
                        </a>
                        <button type="button"
                            class="inline-flex items-center px-4 py-2 bg-gray-200 text-gray-800 rounded-lg hover:bg-gray-300 font-medium"
                            data-modal-hide="previewModal">
                            Cerrar
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('styles')
    <style>
        .line-clamp-2 {
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        .badge-pulse {
            animation: pulse 2s infinite;
        }

        @keyframes pulse {
            0% {
                box-shadow: 0 0 0 0 rgba(34, 197, 94, 0.7);
            }

            70% {
                box-shadow: 0 0 0 10px rgba(34, 197, 94, 0);
            }

            100% {
                box-shadow: 0 0 0 0 rgba(34, 197, 94, 0);
            }
        }

        pre {
            white-space: pre-wrap;
            word-wrap: break-word;
        }
    </style>
@endpush

@push('scripts')
    <script>
        // Increment view count
        document.addEventListener('DOMContentLoaded', function() {
            // Increment views
            fetch("{{ route('documentos.view', $document) }}", {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                    'Content-Type': 'application/json'
                }
            });

            // Load text content for preview
            @if (in_array($document->extension, ['txt', 'md', 'html', 'css', 'js']))
                loadTextContent();
            @endif
        });

        function loadTextContent() {
            const contentElement = document.getElementById('text-content');
            const modalContentElement = document.getElementById('modal-text-content');

            if (contentElement) {
                contentElement.textContent = 'Cargando contenido...';
            }

            if (modalContentElement) {
                modalContentElement.textContent = 'Cargando contenido...';
            }

            fetch("{{ route('documentos.content', $document) }}")
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Error al cargar el contenido');
                    }
                    return response.text();
                })
                .then(content => {
                    if (contentElement) {
                        contentElement.textContent = content;
                    }
                    if (modalContentElement) {
                        modalContentElement.textContent = content;
                    }
                })
                .catch(error => {
                    const errorMessage = 'Error al cargar el contenido del archivo.';
                    if (contentElement) {
                        contentElement.textContent = errorMessage;
                    }
                    if (modalContentElement) {
                        modalContentElement.textContent = errorMessage;
                    }
                    console.error('Error:', error);
                });
        }

        function copyTextContent() {
            const modalContentElement = document.getElementById('modal-text-content');
            if (modalContentElement) {
                const content = modalContentElement.textContent;
                navigator.clipboard.writeText(content).then(() => {
                    showNotification('Contenido copiado al portapapeles', 'success');
                });
            }
        }

        function copyToClipboard() {
            const url = window.location.href;
            navigator.clipboard.writeText(url).then(() => {
                showNotification('Enlace copiado al portapapeles', 'success');
            });
        }

        function shareDocument() {
            if (navigator.share) {
                navigator.share({
                        title: '{{ $document->title }}',
                        text: 'Mira este documento: {{ $document->title }}',
                        url: window.location.href,
                    })
                    .then(() => showNotification('Documento compartido', 'success'))
                    .catch(error => {
                        if (error.name !== 'AbortError') {
                            showNotification('Error al compartir', 'error');
                        }
                    });
            } else {
                copyToClipboard();
            }
        }

        function showNotification(message, type = 'success') {
            // Remove existing notifications
            const existingNotifications = document.querySelectorAll('.custom-notification');
            existingNotifications.forEach(notification => notification.remove());

            // Create notification
            const notification = document.createElement('div');
            notification.className = `fixed top-4 right-4 z-50 custom-notification p-4 rounded-lg shadow-lg text-white ${
            type === 'success' ? 'bg-green-500' : 'bg-red-500'
        }`;
            notification.innerHTML = `
            <div class="flex items-center">
                <i class="fas fa-${type === 'success' ? 'check-circle' : 'exclamation-circle'} mr-3"></i>
                <span>${message}</span>
            </div>
        `;

            document.body.appendChild(notification);

            // Auto remove after 3 seconds
            setTimeout(() => {
                notification.classList.add('opacity-0', 'transition-opacity', 'duration-300');
                setTimeout(() => notification.remove(), 300);
            }, 3000);
        }

        // Handle download count animation
        document.querySelectorAll('a[href*="download"]').forEach(link => {
            link.addEventListener('click', function(e) {
                // Animation for download count
                const downloadCount = document.querySelector('.download-count');
                if (downloadCount) {
                    const count = parseInt(downloadCount.textContent);
                    downloadCount.textContent = count + 1;

                    // Add animation class
                    downloadCount.classList.add('animate__animated', 'animate__bounce');
                    setTimeout(() => {
                        downloadCount.classList.remove('animate__animated', 'animate__bounce');
                    }, 1000);
                }
            });
        });
    </script>
@endpush
