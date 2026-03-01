@extends('layouts.video')

@push('css')
    <!-- Include your favorite highlight.js stylesheet -->
    <link href="/assets/css/intranet.css" rel="stylesheet">
@endpush

@section('content')
    <!-- Título principal -->
    <div class="text-center mb-12">
        <h1 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">
            Aquí puedes visualizar todo el contenido referente a:
        </h1>
        <div class="flex flex-wrap justify-center gap-2 md:gap-4 mt-6">
            <span class="px-4 py-2 bg-blue-100 text-blue-700 font-medium rounded-full">Inteligencia
                Artificial</span>
            <span class="px-4 py-2 bg-green-100 text-green-700 font-medium rounded-full">Computo de Alto
                Desempeño</span>
            <span class="px-4 py-2 bg-purple-100 text-purple-700 font-medium rounded-full">Videos de Estudio</span>
            <span class="px-4 py-2 bg-amber-100 text-amber-700 font-medium rounded-full">Mejoraminto de
                Aprendizaje</span>
            <span class="px-4 py-2 bg-indigo-100 text-indigo-700 font-medium rounded-full">Guias visuales de
                Apoyo</span>
        </div>
    </div>



    <!-- Sección de filtros y búsqueda (independiente del navbar) -->
    <div class="filters-search">
        <nav class="filters">
            <button class="chip active" data-category="all">Todoss</button>
            @foreach ($catsvideos as $cat)
                <button class="chip" data-category="{{ $cat->id }}">{{ $cat->name }}</button>
            @endforeach
        </nav>
        <div class="search">
            <input id="searchInput" type="search" placeholder="Buscar…" />
        </div>
    </div>

    <!-- Grid de videos -->
    <section class="grid" id="grid">
        @foreach ($videos as $video)
            @include('layouts.includes.videos.video-card', ['video' => $video])
        @endforeach
    </section>

    <!-- Mensaje estilizado de no resultados -->
    <div id="noResults" class="no-results">
        <span class="icon">🚫</span>
        No hay resultados para tu búsqueda
    </div>
    <!-- Mensaje estilizado para categorías -->
    <div id="noCategoryResults" class="no-results">
        <span class="icon">📂</span>
        No hay videos en esta categoría
    </div>

    @include('layouts.includes.videos.video-modal')
    <div class="plys-my-4">
        {{ $videos->links() }}
    </div>
@endsection
