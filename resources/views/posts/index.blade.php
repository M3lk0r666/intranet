@extends('layouts.public')

@section('title', 'Listado de Posts')

@section('content')
    <div class="mt-4 bg-white rounded-lg shadow p-6">

        {{-- HEADER --}}
        <div class="text-center mb-10">
            <h1 class="text-3xl font-bold text-gray-800 mb-2">
                Explorar Contenido
            </h1>

            <p class="text-gray-600 mb-6">
                Noticias, artículos y actualizaciones de la comunidad corporativa
            </p>

            {{-- 🔍 BUSCADOR --}}
            <form action="{{ route('posts.index') }}" method="GET" class="max-w-2xl mx-auto relative">
                <input type="text" name="query" placeholder="Buscar artículos..." value="{{ request('query') }}"
                    class="w-full px-5 py-3 border border-gray-300 rounded-full shadow-sm focus:ring-2 focus:ring-primary">

                <button type="submit" class="absolute right-4 top-3 text-gray-400">
                    🔍
                </button>
            </form>
        </div>

        {{-- 🏷️ CATEGORÍAS (CHIPS) --}}
        <div class="flex flex-wrap justify-center gap-3 mb-10">

            {{-- TODOS --}}
            <a href="{{ route('posts.index') }}"
                class="px-4 py-2 rounded-full text-sm font-medium
            {{ request('category') ? 'bg-gray-200 text-gray-700' : 'bg-primary text-white' }}">
                Todos
            </a>

            @foreach ($categories as $cat)
                <a href="{{ route('posts.index', array_merge(request()->except('page'), ['category' => $cat->name])) }}"
                    class="px-4 py-2 rounded-full text-sm font-medium
                {{ request('category') == $cat->name ? 'bg-primary text-white' : 'bg-gray-200 text-gray-700' }}">
                    {{ $cat->name }}
                </a>
            @endforeach

        </div>

        {{-- 📦 GRID DE POSTS --}}
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

            @foreach ($posts as $post)
                <div class="card-hover bg-white rounded-lg shadow overflow-hidden">

                    {{-- Imagen --}}
                    <div class="h-48 bg-gray-100">
                        <img class="w-full h-full object-cover hover:scale-105 transition"
                            src="{{ $post->image_path ? asset('storage/' . $post->image_path) : asset('assets/media/no-disponible.jpg') }}"
                            alt="{{ $post->title }}">
                    </div>

                    {{-- Contenido --}}
                    <div class="p-6">

                        <div class="flex items-center mb-3 text-sm">
                            <span class="bg-primary-light text-primary px-3 py-1 rounded-full">
                                {{ optional($post->category)->name ?? 'Sin categoría' }}
                            </span>

                            <span class="text-gray-500 ml-3">
                                {{ $post->created_at->format('d M, Y') }}
                            </span>
                        </div>

                        <h3 class="text-lg font-bold text-gray-800 mb-2">
                            {{ $post->title }}
                        </h3>

                        <p class="text-gray-600 mb-4">
                            {{ Str::limit(strip_tags($post->content), 120) }}
                        </p>

                        <div class="flex items-center justify-between">

                            <div class="flex items-center">
                                @if ($post->user)
                                    <div class="h-8 w-8 rounded-full overflow-hidden mr-2">
                                        <img src="{{ $post->user->profile_photo_url }}" />
                                    </div>
                                    <span class="text-sm">{{ $post->user->name }}</span>
                                @endif
                            </div>

                            <a href="{{ route('posts.show', $post) }}"
                                class="text-primary font-medium hover:text-orange-600">
                                Leer más →
                            </a>

                        </div>

                    </div>
                </div>
            @endforeach

        </div>

        {{-- PAGINACIÓN --}}
        <div class="mt-8">
            {{ $posts->links() }}
        </div>

    </div>
@endsection

@push('js')
@endpush
