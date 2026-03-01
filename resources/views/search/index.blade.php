@extends('layouts.public')

@section('title', 'Resultados de búsqueda: ' . ($query ?: 'Búsqueda'))

@section('content')
    <div class="container mx-auto px-4 mt-20">
        <div class="max-w-6xl mx-auto">
            <!-- Header -->
            <div class="mb-8">
                <h1 class="text-3xl font-bold text-gray-900 mb-2">Resultados de búsqueda</h1>

                @if ($query)
                    <p class="text-gray-600">
                        Resultados para: <span class="font-semibold">"{{ $query }}"</span>
                    </p>
                @else
                    <p class="text-gray-600">
                        Ingresa un término para buscar en los artículos
                    </p>
                @endif

                <!-- Formulario de búsqueda en la página -->
                <div class="mt-6 max-w-2xl">
                    <form action="{{ route('search.index') }}" method="GET" class="flex gap-2">
                        <div class="flex-1 relative">
                            <input type="text" name="q" value="{{ $query }}"
                                placeholder="Buscar artículos..."
                                class="w-full pl-10 pr-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                            <i class="fas fa-search absolute left-3 top-3.5 text-gray-400"></i>
                        </div>
                        <button type="submit"
                            class="px-6 py-3 bg-blue-600 text-white font-medium rounded-lg hover:bg-blue-700 transition">
                            Buscar
                        </button>
                    </form>
                </div>
            </div>

            @if ($query)
                <!-- Resultados -->
                @if ($posts->count() > 0)
                    <div class="mb-10">
                        <h2 class="text-2xl font-bold text-gray-900 mb-6">Artículos encontrados ({{ $posts->total() }})</h2>
                        <div class="space-y-6">
                            @foreach ($posts as $post)
                                <article
                                    class="bg-white border border-gray-200 rounded-lg p-6 hover:shadow-md transition-shadow">
                                    <div class="flex flex-col md:flex-row gap-6">
                                        @if ($post->image)
                                            <div class="md:w-48 flex-shrink-0">
                                                <img src="{{ $post->image }}" alt="{{ $post->title }}"
                                                    class="w-full h-48 object-cover rounded-lg">
                                            </div>
                                        @endif
                                        <div class="flex-1">
                                            <h3 class="text-xl font-bold text-gray-900 mb-2">
                                                <a href="{{ route('posts.show', $post) }}" class="hover:text-blue-600">
                                                    {{ $post->title }}
                                                </a>
                                            </h3>
                                            <p class="text-gray-600 mb-4 line-clamp-3">
                                                {{ Str::limit(strip_tags($post->content), 200) }}
                                            </p>
                                            <div class="flex flex-wrap items-center gap-4 text-sm text-gray-500">
                                                @if ($post->user)
                                                    <div class="flex items-center">
                                                        @if ($post->user->profile_photo_url)
                                                            <img src="{{ $post->user->profile_photo_url }}"
                                                                alt="{{ $post->user->name }}"
                                                                class="h-6 w-6 rounded-full mr-2">
                                                        @endif
                                                        {{ $post->user->name }}
                                                    </div>
                                                @endif
                                                <span>{{ $post->created_at->format('d M, Y') }}</span>
                                                @if ($post->categories->count() > 0)
                                                    <div class="flex flex-wrap gap-2">
                                                        @foreach ($post->categories->take(2) as $category)
                                                            <span
                                                                class="px-2 py-1 bg-gray-100 text-gray-700 rounded text-xs">
                                                                {{ $category->name }}
                                                            </span>
                                                        @endforeach
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </article>
                            @endforeach
                        </div>

                        <!-- Paginación -->
                        @if ($posts->hasPages())
                            <div class="mt-8">
                                {{ $posts->appends(request()->query())->links() }}
                            </div>
                        @endif
                    </div>
                @else
                    <div class="bg-yellow-50 border border-yellow-200 rounded-lg p-6 text-center">
                        <i class="fas fa-search text-yellow-400 text-4xl mb-3"></i>
                        <p class="text-yellow-800 font-medium">No se encontraron artículos</p>
                        <p class="text-yellow-700 mt-1">Intenta con otros términos de búsqueda</p>
                    </div>
                @endif
            @else
                <!-- Sin término de búsqueda -->
                <div class="bg-gray-50 border border-gray-200 rounded-lg p-12 text-center">
                    <i class="fas fa-search text-gray-300 text-5xl mb-4"></i>
                    <h2 class="text-2xl font-bold text-gray-700 mb-2">¿Qué estás buscando?</h2>
                    <p class="text-gray-600 mb-6">Ingresa un término en el campo de búsqueda para encontrar artículos.</p>
                </div>
            @endif
        </div>
    </div>
@endsection
