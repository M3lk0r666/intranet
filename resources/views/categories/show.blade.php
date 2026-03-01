@extends('layouts.public')

@section('title', 'Posts de ' . $category->name)

@section('content')
    <div class="mt-4 bg-white rounded-lg shadow p-6">
        <div class="container mx-auto px-4 mt-20">
            <section class="text-center py-16 px-4 bg-gradient-to-b from-gray-50 to-white">
                <!-- Título -->
                <h1
                    class="text-3xl sm:text-4xl md:text-5xl lg:text-6xl 
                           font-extrabold tracking-tight text-slate-900 leading-tight">
                    Explora los artículos de la categoría
                </h1>

                <!-- Nombre categoría -->
                <p
                    class="mt-6 text-4xl sm:text-5xl md:text-6xl 
                          font-black text-primary uppercase">
                    {{ $category->name }}
                </p>

                <!-- Línea decorativa -->
                <div class="w-24 h-1 bg-primary mx-auto mt-6 rounded-full"></div>

                <!-- Contador integrado -->
                <div
                    class="mt-10 inline-flex items-center px-6 py-3 
                            bg-white shadow-md rounded-full border border-gray-100">

                    <span class="text-gray-500 text-sm mr-3 uppercase tracking-wide">
                        Artículos encontrados
                    </span>

                    <span class="text-2xl font-bold text-primary">
                        {{ $posts->total() }}
                    </span>
                </div>
            </section>

            {{-- <!-- Listado de posts en tarjetas -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 max-w-7xl mx-auto mt-6">
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
            </div> --}}
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 max-w-7xl mx-auto mt-10">
                @forelse($posts as $post)
                    <article
                        class="group bg-white rounded-xl overflow-hidden 
                                    border border-gray-100 shadow-sm 
                                    transition-all duration-300 
                                    hover:shadow-xl hover:-translate-y-1">

                        <!-- Imagen -->
                        <a href="{{ route('posts.show', $post) }}" class="block overflow-hidden">
                            <img class="w-full h-52 object-cover 
                                        transition-transform duration-500 
                                        group-hover:scale-105"
                                src="{{ $post->image }}" alt="{{ $post->title }}">
                        </a>

                        <div class="p-6">

                            <!-- Categoría -->
                            <span
                                class="inline-block px-3 py-1 
                                         bg-primary/10 text-primary 
                                         text-xs font-semibold 
                                         rounded-full mb-4">
                                {{ $category->name }}
                            </span>

                            <!-- Título -->
                            <a href="{{ route('posts.show', $post) }}">
                                <h2
                                    class="text-xl font-bold text-gray-900 
                                           mb-3 line-clamp-2 
                                           transition-colors duration-300 
                                           group-hover:text-primary">
                                    {{ $post->title }}
                                </h2>
                            </a>

                            <!-- Extracto -->
                            <p class="text-gray-600 text-sm mb-5 line-clamp-3">
                                {{ Str::limit(strip_tags($post->content), 120) }}
                            </p>

                            <!-- Footer -->
                            <div class="flex items-center justify-between text-sm text-gray-500 border-t pt-4">

                                <div class="flex items-center">
                                    <img class="h-7 w-7 rounded-full object-cover mr-2"
                                        src="{{ $post->user->profile_photo_url }}" alt="{{ $post->user->name }}">
                                    <span class="font-medium text-gray-700">
                                        {{ $post->user->name }}
                                    </span>
                                </div>

                                <span>
                                    {{ $post->created_at->format('d M, Y') }}
                                </span>
                            </div>

                            <!-- Tags -->
                            @if ($post->tags->count() > 0)
                                <div class="mt-4 flex flex-wrap gap-2">
                                    @foreach ($post->tags->take(3) as $tag)
                                        <span class="text-xs bg-gray-100 text-gray-600 px-2 py-1 rounded-md">
                                            #{{ $tag->name }}
                                        </span>
                                    @endforeach
                                </div>
                            @endif

                        </div>
                    </article>

                @empty
                    <div class="col-span-full text-center py-16">
                        <i class="fas fa-inbox text-4xl text-gray-300 mb-4"></i>
                        <h3 class="text-xl font-semibold text-gray-600 mb-2">
                            No hay posts en esta categoría
                        </h3>
                        <p class="text-gray-500">
                            Pronto agregaremos contenido interesante.
                        </p>
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
                    class="inline-flex items-center px-3 py-1 text-sm font-medium rounded-full border transition duration-150 bg-orange-100 text-orange-800 border-orange-200 hover:bg-orange-200">
                    <a href="{{ route('intranet.posts.index') }}">
                        <i class="fas fa-arrow-left mr-2"></i>
                        Volver a Posts
                    </a>
                </label>
            </div>
        </div>
    </div>

@endsection
