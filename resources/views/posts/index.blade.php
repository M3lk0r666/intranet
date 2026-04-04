@extends('layouts.public')

@section('title', 'Listado de Posts')

@section('content')
    <div class="mt-4 bg-white rounded-lg shadow p-6">
        <!-- Encabezado -->
        <div class="mb-8 flex flex-col md:flex-row md:items-center justify-between">
            <div>
                <h1 class="text-3xl font-bold text-gray-800 mb-2">Blog de Redes</h1>
                <p class="text-gray-600">Noticias, artículos y actualizaciones de la comunidad corporativa</p>
            </div>
        </div>

        <div class="flex flex-col lg:flex-row gap-8">
            <!-- Posts en cuadrícula -->
            <div class="lg:w-2/3">
                <!-- Búsqueda -->
                <div class="bg-white rounded-lg shadow p-6 mb-6">
                    <h3 class="text-lg font-bold text-gray-800 mb-4">Buscar en el Blog</h3>

                    <form action="{{ route('posts.index') }}" method="GET" class="relative">
                        <input type="text" name="query" placeholder="Buscar artículos..."
                            value="{{ request('query') }}"
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent">
                        <button type="submit" class="absolute right-3 top-3 text-gray-400">
                            <i class="fas fa-search"></i>
                        </button>
                    </form>
                </div>

                <!-- Filtros por Categoría -->
                <div class="flex overflow-x-auto gap-3 mb-8 py-2">
                    <!-- Todos -->
                    <a href="{{ route('posts.index') }}"
                        class="px-4 py-2 {{ request('category') ? 'bg-gray-200 text-gray-700' : 'bg-primary text-white' }} rounded-lg font-medium">Todos</a>

                    @foreach ($categories as $cat)
                        <a href="{{ route('posts.index', array_merge(request()->except('page'), ['category' => $cat->name])) }}"
                            class="px-4 py-2 {{ request('category') == $cat->name ? 'bg-primary text-white' : 'bg-gray-200 text-gray-700' }} rounded-lg font-medium hover:bg-gray-300">
                            {{ $cat->name }}
                        </a>
                    @endforeach
                </div>

                <!-- Línea sutil opcional -->
                <div class="border-t border-gray-200 mb-6"></div>

                <!-- Grid de Posts -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    @foreach ($posts as $post)
                        <div class="card-hover bg-white rounded-lg shadow overflow-hidden post-card">
                            <!-- Imagen -->
                            <div class="post-image bg-gradient-to-r from-orange-400 to-orange-600">
                                <img class="w-full h-48 object-cover hover:scale-105 transition-transform duration-300"
                                    src="{{ $post->image_path ? asset('storage/' . $post->image_path) : asset('assets/media/no-disponible.jpg') }}"
                                    alt="{{ $post->title }}">
                            </div>

                            <!-- Contenido -->
                            <div class="p-6">
                                <div class="flex items-center mb-3">
                                    <span class="bg-primary-light text-primary text-xs font-medium px-3 py-1 rounded-full">
                                        {{ optional($post->category)->name ?? 'Sin categoría' }}
                                    </span>
                                    <span class="text-gray-500 text-sm ml-3">
                                        {{ $post->created_at->format('d M, Y') }}
                                    </span>
                                </div>

                                <h3 class="text-xl font-bold text-gray-800 mb-3">{{ $post->title }}</h3>
                                <p class="text-gray-600 mb-4">{{ Str::limit(strip_tags($post->content), 120) }}</p>

                                <div class="flex items-center justify-between">
                                    <div class="flex items-center">
                                        @if ($post->user)
                                            <div class="h-8 w-8 rounded-full bg-gray-200 mr-2 overflow-hidden">
                                                @if ($post->user->profile_photo_url)
                                                    <img src="{{ $post->user->profile_photo_url }}"
                                                        alt="{{ $post->user->name }}">
                                                @endif
                                            </div>
                                            <span class="text-sm text-gray-700">{{ $post->user->name }}</span>
                                        @endif
                                    </div>

                                    <a href="{{ route('posts.show', $post) }}"
                                        class="text-primary hover:text-orange-700 font-medium">Leer más →</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <!-- Paginación -->
                {{-- <div class="mt-8 mb-6">
                    {{ $posts->links() }}
                </div> --}}
                <!-- Paginación -->
                <div class="mt-6">
                    {{ $posts->links() }}
                </div>
            </div>

            <!-- Sidebar -->
            <div class="lg:w-1/3 sticky top-24 self-start ">
                <!-- Búsqueda -->
                {{-- <div class="bg-white rounded-lg shadow p-6 mb-6">
                    <h3 class="text-lg font-bold text-gray-800 mb-4">Buscar en el Blog</h3>

                    <form action="{{ route('posts.index') }}" method="GET" class="relative">
                        <input type="text" name="query" placeholder="Buscar artículos..."
                            value="{{ request('query') }}"
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent">
                        <button type="submit" class="absolute right-3 top-3 text-gray-400">
                            <i class="fas fa-search"></i>
                        </button>
                    </form>
                </div> --}}

                <!-- Categorías -->
                <div class="bg-white rounded-lg shadow p-6 mb-6">
                    <h3 class="text-lg font-bold text-gray-800 mb-4">Articulos por Categorías</h3>
                    <ul class="space-y-2">
                        @foreach ($categories as $category)
                            <li><a href="{{ route('categories.show', $category) }}"
                                    class="flex justify-between items-center text-gray-700 hover:text-primary p-2 rounded hover:bg-orange-50">
                                    <span>{{ $category->name }}</span>
                                    <span
                                        class="bg-gray-200 text-gray-700 text-xs px-2 py-1 rounded">{{ $category->posts_count }}</span>
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
@endpush
