{{-- resources/views/public/documents/index.blade.php --}}
@extends('layouts.docs')

@section('title', 'Biblioteca de Documentos')

@section('content')
    <div class="min-h-screen bg-gray-50">
        <!-- Hero Section -->
        <div class="relative bg-gradient-to-r from-blue-600 to-purple-600 text-white overflow-hidden">
            <div class="absolute inset-0 bg-black/20"></div>
            <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
                <div class="text-center max-w-3xl mx-auto">
                    <h1 class="text-4xl md:text-5xl font-bold mb-6 animate__animated animate__fadeInDown">
                        Biblioteca Digital de Recursos
                    </h1>
                    <p class="text-xl mb-8 animate__animated animate__fadeInUp">
                        Explora nuestra colección de documentos, tutoriales, manuales y recursos organizados por categorías
                    </p>

                    <!-- Stats -->
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
                        <div class="bg-white/20 backdrop-blur-sm rounded-xl p-6">
                            <div class="text-4xl font-bold mb-2">{{ \App\Models\FileDocument::count() }}</div>
                            <div class="text-sm uppercase tracking-wider">Documentos</div>
                        </div>
                        <div class="bg-white/20 backdrop-blur-sm rounded-xl p-6">
                            <div class="text-4xl font-bold mb-2">{{ \App\Models\FileDocument::sum('downloads') }}</div>
                            <div class="text-sm uppercase tracking-wider">Descargas</div>
                        </div>
                        <div class="bg-white/20 backdrop-blur-sm rounded-xl p-6">
                            <div class="text-4xl font-bold mb-2">{{ count(\App\Models\FileDocument::getCategories()) }}
                            </div>
                            <div class="text-sm uppercase tracking-wider">Categorías</div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Wave -->
            {{-- <div class="absolute bottom-0 left-0 right-0">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
                    <path fill="#ffffff" fill-opacity="1"
                        d="M0,96L48,112C96,128,192,160,288,160C384,160,480,128,576,112C672,96,768,96,864,112C960,128,1056,160,1152,160C1248,160,1344,128,1392,112L1440,96L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z">
                    </path>
                </svg>
            </div> --}}
        </div>

        <!-- Main Content -->
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
            <div class="flex flex-col lg:flex-row gap-8">
                <!-- Sidebar -->
                <div class="lg:w-1/4">
                    <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6 sticky top-6">
                        <h3 class="text-lg font-bold text-gray-800 mb-4">
                            <i class="fas fa-folder-open mr-2"></i>Categorías
                        </h3>

                        <!-- All Categories -->
                        <a href="{{ route('intranet.documentos.index') }}"
                            class="flex items-center justify-between p-3 rounded-lg mb-2 {{ $selectedCategory == 'all' ? 'bg-primary-50 border-l-4 border-primary-500' : 'hover:bg-gray-50' }}">
                            <div class="flex items-center">
                                <div class="w-8 h-8 bg-gray-100 rounded-lg flex items-center justify-center mr-3">
                                    <i class="fas fa-layer-group text-gray-600"></i>
                                </div>
                                <span class="font-medium">Todas las categorías</span>
                            </div>
                            <span class="bg-gray-100 text-gray-700 text-xs px-2 py-1 rounded-full">
                                {{ \App\Models\FileDocument::count() }}
                            </span>
                        </a>

                        <!-- Categories List -->
                        <div class="space-y-2">
                            @foreach ($categoriesWithCount as $key => $category)
                                <a href="{{ route('intranet.documentos.index', ['category' => $key]) }}"
                                    class="flex items-center justify-between p-3 rounded-lg {{ $selectedCategory == $key ? 'bg-primary-50 border-l-4 border-primary-500' : 'hover:bg-gray-50' }}">
                                    <div class="flex items-center">
                                        <div class="w-8 h-8 rounded-lg flex items-center justify-center mr-3"
                                            style="background-color: {{ $category['color'] }}20; color: {{ $category['color'] }}">
                                            <i class="{{ $category['icon'] }}"></i>
                                        </div>
                                        <span class="font-medium">{{ $category['name'] }}</span>
                                    </div>
                                    <span class="text-xs px-2 py-1 rounded-full"
                                        style="background-color: {{ $category['color'] }}20; color: {{ $category['color'] }}">
                                        {{ $category['count'] }}
                                    </span>
                                </a>
                            @endforeach
                        </div>

                        <!-- Top Downloads -->
                        @if ($topDownloads->count() > 0)
                            <div class="mt-8 pt-6 border-t border-gray-200">
                                <h4 class="text-sm font-semibold text-gray-700 mb-4">Más descargados</h4>
                                <div class="space-y-3">
                                    @foreach ($topDownloads as $doc)
                                        <a href="{{ route('intranet.documentos.show', $doc) }}"
                                            class="flex items-center p-2 rounded-lg hover:bg-gray-50 transition-colors">
                                            <div class="flex-shrink-0 w-10 h-10 rounded-lg flex items-center justify-center mr-3"
                                                style="background-color: {{ $doc->category_info->color }}20; color: {{ $doc->category_info->color }}">
                                                <i class="{{ $doc->icon }}"></i>
                                            </div>
                                            <div class="flex-1 min-w-0">
                                                <p class="text-sm font-medium text-gray-800 truncate">{{ $doc->title }}
                                                </p>
                                                <div class="flex items-center text-xs text-gray-500">
                                                    <span class="flex items-center mr-3">
                                                        <i class="fas fa-download mr-1"></i>{{ $doc->downloads }}
                                                    </span>
                                                    <span>{{ $doc->formatted_size }}</span>
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
                <div class="lg:w-3/4">
                    <!-- Header -->
                    <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6 mb-6">
                        <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-4">
                            <div>
                                <h2 class="text-2xl font-bold text-gray-800">
                                    @if ($selectedCategory !== 'all')
                                        {{ $categoriesWithCount[$selectedCategory]['name'] ?? 'Documentos' }}
                                    @else
                                        Todos los Documentos
                                    @endif
                                </h2>
                                @if ($search)
                                    <p class="text-gray-600 mt-1">
                                        Resultados para: <span class="font-semibold">"{{ $search }}"</span>
                                    </p>
                                @endif
                            </div>

                            <!-- Filters -->
                            <div class="flex flex-wrap gap-3">
                                <!-- Sort Dropdown -->
                                <div class="relative">
                                    <select onchange="window.location.href = this.value"
                                        class="appearance-none bg-white border border-gray-300 rounded-lg pl-4 pr-10 py-2 focus:ring-2 focus:ring-primary-500 focus:border-primary-500 outline-none text-sm">
                                        <option
                                            value="{{ route('intranet.documentos.index', ['category' => $selectedCategory, 'search' => $search]) }}">
                                            Más recientes
                                        </option>
                                        <option
                                            value="{{ route('intranet.documentos.index', ['category' => $selectedCategory, 'search' => $search, 'sort' => 'downloads']) }}">
                                            Más descargados
                                        </option>
                                        <option
                                            value="{{ route('intranet.documentos.index', ['category' => $selectedCategory, 'search' => $search, 'sort' => 'title']) }}">
                                            A-Z
                                        </option>
                                    </select>
                                    <i
                                        class="fas fa-chevron-down absolute right-3 top-1/2 transform -translate-y-1/2 text-gray-400 pointer-events-none"></i>
                                </div>

                                @if ($search)
                                    <a href="{{ route('intranet.documentos.index', ['category' => $selectedCategory]) }}"
                                        class="inline-flex items-center px-4 py-2 bg-red-100 text-red-700 rounded-lg hover:bg-red-200 transition-colors text-sm">
                                        <i class="fas fa-times mr-2"></i> Limpiar búsqueda
                                    </a>
                                @endif
                            </div>
                        </div>
                    </div>

                    <!-- Documents Grid -->
                    @if ($documents->count() > 0)
                        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                            @foreach ($documents as $document)
                                <div
                                    class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden hover:shadow-md transition-shadow duration-300">
                                    <!-- Category Badge -->
                                    <div class="px-6 py-4 border-b"
                                        style="background-color: {{ $document->category_info->color }}10; border-color: {{ $document->category_info->color }}30">
                                        <div class="flex items-center justify-between">
                                            <span
                                                class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium"
                                                style="background-color: {{ $document->category_info->color }}20; color: {{ $document->category_info->color }}">
                                                <i class="{{ $document->category_info->color }} mr-1.5"></i>
                                                {{ $document->category_info->name }}
                                            </span>
                                            <span class="text-xs text-gray-500">
                                                {{ $document->created_at->format('d/m/Y') }}
                                            </span>
                                        </div>
                                    </div>

                                    <!-- Document Content -->
                                    <div class="p-6">
                                        <div class="flex items-start space-x-4 mb-4">
                                            <div class="flex-shrink-0 p-3 rounded-lg"
                                                style="background-color: $document->category_info->color }}20; color: $document->category_info->color }}">
                                                <i class="{{ $document->icon }} text-2xl"></i>
                                            </div>
                                            <div class="flex-1 min-w-0">
                                                <h3 class="font-bold text-lg text-gray-800 mb-2 line-clamp-2">
                                                    {{ $document->title }}
                                                </h3>
                                                @if ($document->description)
                                                    <p class="text-sm text-gray-600 line-clamp-2 mb-3">
                                                        {{ $document->description }}
                                                    </p>
                                                @endif
                                                <div class="flex items-center text-xs text-gray-500">
                                                    <span class="mr-4">
                                                        <i class="fas fa-file mr-1"></i>
                                                        .{{ strtoupper($document->extension) }}
                                                    </span>
                                                    <span>
                                                        <i class="fas fa-weight-hanging mr-1"></i>
                                                        {{ $document->formatted_size }}
                                                    </span>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Stats -->
                                        <div class="flex items-center justify-between text-sm">
                                            <div class="flex items-center text-gray-600">
                                                <i class="fas fa-download mr-2 text-blue-500"></i>
                                                <span class="font-medium">{{ $document->downloads }}</span>
                                                <span class="ml-1">descargas</span>
                                            </div>
                                            <div class="text-gray-500">
                                                <i class="fas fa-user mr-1"></i>
                                                {{ $document->user->name ?? 'Sistema' }}
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Actions -->
                                    <div class="px-6 pb-6 pt-0">
                                        <div class="flex space-x-3">
                                            <a href="{{ route('intranet.documentos.show', $document) }}"
                                                class="flex-1 inline-flex items-center justify-center px-4 py-2 bg-gray-100 text-gray-700 rounded-lg hover:bg-gray-200 transition-colors duration-200 text-sm">
                                                <i class="fas fa-eye mr-2"></i> Ver
                                            </a>
                                            <a href="{{ route('intranet.documentos.download', $document) }}"
                                                class="flex-1 inline-flex items-center justify-center px-4 py-2 text-white rounded-lg hover:opacity-90 transition-all duration-200 text-sm badge-pulse"
                                                style="background-color: {{ $document->category_info->color }}">
                                                <i class="fas fa-download mr-2"></i> Descargar
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        <!-- Pagination -->
                        @if ($documents->hasPages())
                            <div class="mt-8">
                                {{ $documents->links('vendor.pagination.tailwind') }}
                            </div>
                        @endif
                    @else
                        <!-- Empty State -->
                        <div class="text-center py-12">
                            <div class="inline-flex items-center justify-center w-24 h-24 rounded-full bg-gray-100 mb-6">
                                <i class="fas fa-search text-gray-400 text-4xl"></i>
                            </div>
                            <h3 class="text-2xl font-bold text-gray-700 mb-3">No se encontraron documentos</h3>
                            <p class="text-gray-600 max-w-md mx-auto mb-8">
                                @if ($selectedCategory !== 'all' || $search)
                                    No hay documentos que coincidan con tus criterios de búsqueda.
                                @else
                                    Aún no hay documentos disponibles en la biblioteca.
                                @endif
                            </p>
                            <a href="{{ route('intranet.documentos.index') }}"
                                class="inline-flex items-center px-6 py-3 bg-primary-600 text-white rounded-lg hover:bg-primary-700 transition-colors duration-200">
                                <i class="fas fa-home mr-2"></i> Volver al inicio
                            </a>
                        </div>
                    @endif
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
                box-shadow: 0 0 0 0 rgba(234, 88, 12, 0.7);
            }

            70% {
                box-shadow: 0 0 0 10px rgba(234, 88, 12, 0);
            }

            100% {
                box-shadow: 0 0 0 0 rgba(234, 88, 12, 0);
            }
        }
    </style>
@endpush

@push('scripts')
    <script>
        // Smooth scroll for categories
        document.querySelectorAll('a[href="#categorias"]').forEach(anchor => {
            anchor.addEventListener('click', function(e) {
                e.preventDefault();
                const categoriasSection = document.getElementById('categorias');
                if (categoriasSection) {
                    categoriasSection.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            });
        });
    </script>
@endpush
