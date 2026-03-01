@extends('layouts.public')

@section('title', 'Posts de ' . $category->name)

@section('content')
    <div class="container mx-auto px-4 mt-20">
        <!-- Header de la categoría -->
        <div class="text-center mt-10 mb-12">
            <h1 class="text-4xl font-bold text-gray-800 mb-4">Categoría: {{ $category->name }}</h1>
            <p class="text-lg text-gray-600 mb-4">Explora todos los artículos sobre {{ $category->name }}</p>
            <hr class="h-1 my-6 bg-neutral-300 border-0">
            <div class="inline-flex items-center px-4 py-2 bg-green-100 text-green-800 rounded-full text-sm font-medium">
                <i class="fas fa-file-alt mr-2"></i>
                {{ $posts->total() }} artículos encontrados
            </div>
        </div>

        <!-- Listado de posts en tarjetas -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 max-w-7xl mx-auto">
            @forelse($posts as $post)
                <div class="bg-neutral-primary-soft block max-w-sm p-6 border border-default rounded-base shadow-xs">
                    <a href="{{ route('posts.show', $post) }}">
                        <img class="rounded-base" src="{{ $post->image }}" alt="" />
                    </a>
                    <div class="p-6">
                        <!-- Categoría -->
                        <span
                            class="inline-block px-3 py-1 bg-orange-100 text-orange-800 border-orange-200 hover:bg-orange-200 text-xs font-medium rounded-full mb-3">
                            {{ $category->name }}
                        </span>
                        <!-- Título -->
                        <a href="{{ route('posts.show', $post) }}">
                            <h5
                                class="mt-6 mb-2 text-2xl font-semibold tracking-tight text-heading hover:text-blue-600 transition duration-150 line-clamp-2">
                                {{ $post->title }}</h5>
                        </a>
                        <!-- Extracto -->
                        <p class="mb-6 text-body line-clamp-3">{{ Str::limit(strip_tags($post->content), 120) }}</p>

                        <!-- Metadata -->
                        <div class="flex items-center justify-between text-sm text-gray-500">
                            <div class="flex items-center">
                                <img class="h-6 w-6 rounded-full object-cover mr-2"
                                    src="{{ $post->user->profile_photo_url }}" alt="{{ $post->user->name }}">
                                <span>{{ $post->user->name }}</span>
                            </div>
                            <span>{{ $post->created_at->format('d M, Y') }}</span>
                        </div>
                        <!-- Tags -->
                        @if ($post->tags->count() > 0)
                            <div class="mt-4 flex flex-wrap gap-1">
                                @foreach ($post->tags->take(3) as $tag)
                                    <span class="inline-block px-2 py-1 bg-blue-100 text-blue-600 text-xs rounded">
                                        #{{ $tag->name }}
                                    </span>
                                @endforeach
                            </div>
                        @endif
                    </div>
                </div>


            @empty
                <div class="col-span-full text-center py-12">
                    <i class="fas fa-inbox text-4xl text-gray-400 mb-4"></i>
                    <h3 class="text-xl font-semibold text-gray-600 mb-2">No hay posts en esta categoría</h3>
                    <p class="text-gray-500">Pronto agregaremos contenido interesante.</p>
                    <a href="{{ route('posts.index') }}"
                        class="inline-block mt-4 px-6 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition duration-150">
                        Ver todos los posts
                    </a>
                </div>
            @endforelse
        </div>

        <!-- Paginación -->
        @if ($posts->hasPages())
            <div class="mt-12">
                {{ $posts->links() }}
            </div>
        @endif

        <!-- Enlace de regreso -->
        <div class="text-center mt-2 mb-8">
            <label
                class="inline-flex items-center px-3 py-1 text-sm font-medium rounded-full border transition duration-150 bg-blue-100 text-blue-800 border-blue-200 hover:bg-blue-200">
                <a href="{{ route('categories.index') }}" {{-- class="inline-flex items-center text-blue-600 hover:text-blue-700 transition duration-150" --}}>
                    <i class="fas fa-arrow-left mr-2"></i>
                    Volver a todas las categorías
                </a>
            </label>
        </div>
    </div>

    {{-- <style>
        .line-clamp-2 {
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        .line-clamp-3 {
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }
    </style> --}}
@endsection
