@extends('layouts.intranet')

@section('title', 'Intranet Corporativa')

@push('css')
    <link href="/assets/css/intrahome.css" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com?plugins=forms,typography,container-queries"></script>
@endpush

@section('content')

    <!-- Breadcrumb -->
    <div class="bg-white border-b border-gray-200">
        <div class="container mx-auto px-4 py-3">
            <nav class="flex" aria-label="Breadcrumb">
                <ol class="inline-flex items-center space-x-1 md:space-x-3">
                    <li class="inline-flex items-center">
                        <a href="{{ route('bienvenido') }}"
                            class="inline-flex items-center text-sm text-gray-600 hover:text-orange-600">
                            <i class="fas fa-home mr-2"></i>
                            Home
                        </a>
                    </li>
                    <li>
                        <div class="inline-flex items-center">
                            <i class="fas fa-chevron-right text-gray-400 mx-2"></i>
                            <a href="{{ route('intranet.index') }}"
                                class="ml-1 text-sm text-gray-600 hover:text-orange-600 md:ml-2">Intranet</a>
                        </div>
                    </li>
                    <li class="inline-flex items-center">
                        <i class="fas fa-chevron-right text-gray-400 mx-2"></i>
                        <a href="{{ route('documentos.biblioteca') }}"
                            class="inline-flex items-center text-sm text-gray-600 hover:text-orange-600">Biblioteca
                        </a>
                    </li>

                    <li aria-current="page">
                        <div class="flex items-center">
                            <i class="fas fa-chevron-right text-gray-400 mx-2"></i>
                            <span class="ml-1 text-sm text-primary font-medium md:ml-2">Documento</span>
                        </div>
                    </li>
                </ol>
            </nav>
        </div>
    </div>

    <div class="bg-white rounded-2xl border border-slate-200 p-5 mb-8 mt-8">
        <div class="flex flex-col lg:flex-row gap-8">
            <aside class="lg:w-80 w-full">
                <div class="bg-white border border-slate-200 rounded-2xl shadow-sm p-5 space-y-6 sticky top-24">
                    <!-- 📄 INFO PRINCIPAL -->
                    <div>
                        <h3 class="text-sm font-semibold text-slate-800 mb-2 line-clamp-2">
                            {{ $document->title }}
                        </h3>
                        <p class="text-xs text-slate-500">
                            {{ $document->description ?? 'Sin descripción disponible' }}
                        </p>
                    </div>
                    <!-- ⚡ ACCIONES -->
                    <div class="space-y-2">
                        <!-- Descargar -->
                        <a href="{{ route('documentos.download', $document) }}"
                            class="w-full flex items-center justify-center gap-2 px-4 py-2 rounded-lg bg-primary text-white text-sm font-semibold hover:bg-primary/90 transition">
                            <i class="las la-download"></i>
                            Descargar
                        </a>
                    </div>
                    <!-- 📊 MÉTRICAS -->
                    <div class="grid grid-cols-2 gap-3 text-xs">
                        <div class="bg-slate-50 rounded-lg p-3 text-center">
                            <p class="text-slate-400">Tamaño</p>
                            <p class="font-semibold text-slate-700">
                                {{ $document->formatted_size }}
                            </p>
                        </div>
                        <div class="bg-slate-50 rounded-lg p-3 text-center">
                            <p class="text-slate-400">Vistas</p>
                            <p class="font-semibold text-slate-700">
                                {{ $document->views ?? 0 }}
                            </p>
                        </div>
                        <div class="bg-slate-50 rounded-lg p-3 text-center col-span-2">
                            <p class="text-slate-400">Tipo</p>
                            <p class="font-semibold text-slate-700 uppercase">
                                .{{ $document->extension }}
                            </p>
                        </div>
                    </div>
                    <!-- 🏷️ CATEGORÍA -->
                    <div class="pt-4 border-t border-slate-200">
                        <p class="text-xs font-bold uppercase tracking-wider text-slate-400 mb-2">
                            Categoría
                        </p>
                        <div class="flex items-center gap-2 text-sm font-medium"
                            style="color: {{ $document->category_info->color }}">
                            <div class="w-8 h-8 rounded-lg flex items-center justify-center"
                                style="background-color: {{ $document->category_info->color }}20">
                                <i class="{{ $document->category_info->icon }}"></i>
                            </div>
                            {{ $document->category_info->name }}
                        </div>
                    </div>
                    <!-- 👤 AUTOR -->
                    <div class="pt-4 border-t border-slate-200">
                        <p class="text-xs font-bold uppercase tracking-wider text-slate-400 mb-2">
                            Subido por
                        </p>
                        <div class="flex items-center gap-2 text-sm text-slate-600">
                            <i class="las la-user text-slate-400"></i>
                            {{ $document->user->name ?? 'Sistema' }}
                        </div>
                    </div>
                    <!-- 📅 FECHA -->
                    <div class="pt-4 border-t border-slate-200">
                        <p class="text-xs font-bold uppercase tracking-wider text-slate-400 mb-2">
                            Fecha
                        </p>
                        <div class="text-sm text-slate-600">
                            {{ $document->created_at->format('d/m/Y') }}
                        </div>
                    </div>
                </div>
            </aside>

            <article class="flex-grow max-w-4xl lg:max-w-6xl space-y-16">
                <div class="text-center mb-4 mt-8">
                    <h1 class="text-4xl font-black font-display tracking-tight text-slate-900 uppercase">
                        Vista: <span class="text-primary  uppercase"> {{ $document->title }}</span>
                    </h1>
                    {{-- <p></p>
                    <p class="text-slate-600 mt-6 text-lg">{{ $document->description }}</p> --}}
                    @if ($document->description)
                        <div class="bg-gray-50 border-l-4 border-blue-500 p-4 rounded-r-lg mt-6">
                            <div class="flex">
                                <i class="fas fa-info-circle text-primary-500 mr-3 mt-1"></i>
                                <p class="text-gray-700">{{ $document->description }}</p>
                            </div>
                        </div>
                    @endif
                </div>
                <div>
                    <!-- Document Preview -->
                    <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden mb-6">
                        <div class="px-6 py-4 border-b border-slate-200">
                            <h3 class="text-base font-semibold text-slate-800 flex items-center gap-2">
                                <i class="las la-eye text-primary"></i>
                                Vista previa
                            </h3>
                            <p class="text-xs text-slate-500 mt-1">
                                Visualización del documento
                            </p>
                        </div>
                        <!-- Preview -->
                        <div class="p-6">
                            @if ($document->extension === 'pdf')
                                <div class="border border-slate-200 rounded-xl overflow-hidden">
                                    <iframe src="{{ Storage::url($document->file_path) }}" class="w-full h-[75vh] bg-white"
                                        title="Vista previa del PDF">
                                    </iframe>
                                </div>
                                <div class="mt-4 flex items-center text-sm text-gray-500">
                                    <i class="fas fa-info-circle mr-2 text-primary-500"></i>
                                    Esta es una vista previa del documento. Para verlo completo o imprimirlo, descarga
                                    el
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
                                    {{-- <pre id="text-content" class="p-4 text-gray-100 overflow-auto max-h-96 font-mono text-sm">
                                        Cargando contenido del archivo...
                                    </pre> --}}
                                    <pre id="text-content"
                                        class="whitespace-pre-wrap break-words p-4 text-gray-100 overflow-auto max-h-96 font-mono text-sm">
                                        Cargando contenido...
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
                                                    <p class="text-2xl font-bold text-gray-800">{{ $document->version }}
                                                    </p>
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
                                    <a href="{{ route('documentos.biblioteca', ['category' => $document->category]) }}"
                                        class="text-sm text-primary-600 hover:text-primary-800 font-medium">
                                        Ver todos <i class="fas fa-arrow-right ml-1"></i>
                                    </a>
                                </div>

                                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-4">
                                    @foreach ($sameCategoryDocuments->take(4) as $doc)
                                        <a href="{{ route('documentos.ver-detalle', $doc) }}" class="group block">
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
            </article>
        </div>

    </div>




@endsection
@push('styles')
    {{-- <style>
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
    </style> --}}
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
