@extends('layouts.public')
@push('css')
    <link href="{{ asset('/assets/prims/prism-php.css') }}" rel="stylesheet" />
@endpush
@push('js')
    <script src="{{ asset('/assets/prims/prism-php.js') }}"></script>
@endpush

@section('title', 'Listado de Posts')

@section('content')
    <div id="reading-progress" class="fixed top-16 left-0 h-1 bg-primary z-50" style="width: 0%"></div>
    <!-- Breadcrumb -->
    <div class="bg-white border-b border-gray-200">
        <div class="container mx-auto px-4 py-3">
            <nav class="flex" aria-label="Breadcrumb">
                <ol class="inline-flex items-center space-x-1 md:space-x-3">
                    <li class="inline-flex items-center">
                        <a href="{{ route('intranet.index') }}"
                            class="inline-flex items-center text-sm text-gray-600 hover:text-orange-600">
                            <i class="fas fa-home mr-2"></i>
                            Home
                        </a>
                    </li>
                    <li>
                        <div class="flex items-center">
                            <i class="fas fa-chevron-right text-gray-400 mx-2"></i>
                            <a href="{{ route('intranet.posts.index') }}"
                                class="ml-1 text-sm text-gray-600 hover:text-orange-600 md:ml-2">Blog</a>
                        </div>
                    </li>
                    <li aria-current="page">
                        <div class="flex items-center">
                            <i class="fas fa-chevron-right text-gray-400 mx-2"></i>
                            <span
                                class="ml-1 text-sm text-primary font-medium md:ml-2 truncate max-w-[150px] md:max-w-none">{{ $post->title }}</span>
                        </div>
                    </li>
                </ol>
            </nav>
        </div>
    </div>

    <div class="mt-4 bg-white rounded-lg shadow p-6">
        <div class="flex flex-col lg:flex-row gap-8 items-start">

            <!-- Contenido principal del post -->
            <div class="lg:w-2/3">
                <!-- Encabezado del post -->
                <article class="bg-white rounded-lg shadow p-6 mb-8">
                    <!-- Categoría y fecha -->
                    <div class="flex flex-wrap items-center justify-between mb-6">
                        <div class="flex items-center space-x-4">
                            <span class="bg-primary-light text-primary text-sm font-medium px-3 py-1 rounded-full">
                                Noticias Corporativas
                            </span>
                            <span class="text-gray-500 text-sm">
                                <i class="far fa-calendar-alt mr-1"></i> {{ $post->created_at->format('d M, Y') }}
                            </span>
                            <span class="text-gray-500 text-sm">
                                <i class="far fa-clock mr-1"></i> 8 min lectura
                            </span>
                        </div>
                        <div class="mt-4 md:mt-0">
                            <span class="text-gray-500 text-sm">
                                <i class="far fa-eye mr-1"></i> 1 vistas
                            </span>
                        </div>
                    </div>

                    <!-- Título -->
                    <h1 class="text-3xl lg:text-4xl font-bold text-gray-800 mb-6 break-words">
                        {{ $post->title }}
                    </h1>

                    <!-- Autor -->
                    <div class="flex items-center mb-8 p-4 bg-gray-50 rounded-lg">
                        <div
                            class="h-12 w-12 rounded-full bg-gradient-to-r from-orange-400 to-orange-600 flex items-center justify-center text-white font-bold text-xl mr-4">
                            <img class="h-10 w-10 rounded-full object-cover" src="{{ $post->user->profile_photo_url }}"
                                alt="Foto de perfil del usuario">
                        </div>
                        <div>
                            <h3 class="font-bold text-gray-800">
                                {{ $post->user ? $post->user->name : 'Usuario Desconocido' }}</h3>
                        </div>
                    </div>

                    <!-- Imagen destacada -->
                    <div class="mb-8">
                        <div class="w-full h-64 md:h-96 rounded-lg overflow-hidden">
                            <img class="w-full h-full object-cover" src="{{ $post->image }}" alt="{{ $post->title }}">
                        </div>
                    </div>

                    <!-- Contenido del post -->
                    {{-- <div class="post-content" id="post-content"> --}}
                    <div class="post-content prose prose-sm md:prose-base max-w-none break-words" id="post-content">
                        {!! $post->content !!}
                    </div>

                    <!-- Etiquetas -->
                    <div class="mt-8 pt-6 border-t border-gray-200">
                        <h3 class="font-bold text-gray-700 mb-3">Etiquetas:</h3>
                        <div class="flex flex-wrap gap-2">
                            @if ($post->tags->count() > 0)
                                <div class="mt-6">
                                    <div class="flex flex-wrap gap-2 justify-center">
                                        @foreach ($post->tags as $tag)
                                            @php
                                                $colors = [
                                                    'bg-blue-100 text-blue-800 border-blue-200 hover:bg-blue-200',
                                                    'bg-green-100 text-green-800 border-green-200 hover:bg-green-200',
                                                    'bg-purple-100 text-purple-800 border-purple-200 hover:bg-purple-200',
                                                    'bg-orange-100 text-orange-800 border-orange-200 hover:bg-orange-200',
                                                    'bg-pink-100 text-pink-800 border-pink-200 hover:bg-pink-200',
                                                ];
                                                $color = $colors[$loop->index % count($colors)];
                                            @endphp
                                            <span
                                                class="inline-flex items-center px-3 py-1 text-sm font-medium rounded-full border transition duration-150 {{ $color }}">
                                                <i class="ri-price-tag-3-fill mr-1"></i>
                                                {{ $tag->name }}
                                            </span>
                                        @endforeach
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                </article>

                <!-- Posts relacionados -->
                <div class="bg-white rounded-lg shadow p-6">
                    <h2 class="text-2xl font-bold text-gray-800 mb-6">Posts Relacionados</h2>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Post relacionados -->
                        @forelse($similarPosts as $similarPost)
                            <a href="{{ route('posts.show', $similarPost) }}"
                                class="card-hover border border-gray-200 rounded-lg overflow-hidden hover:border-orange-300">

                                <div class="h-32 overflow-hidden">
                                    <img class="w-full h-full object-cover hover:scale-105 transition-transform duration-300"
                                        src="{{ $similarPost->image }}" alt="{{ $similarPost->title }}">
                                </div>

                                <div class="p-4">
                                    <span
                                        class="bg-blue-100 text-blue-600 text-xs font-medium px-2 py-1 rounded-full mb-2 inline-block">
                                        Tecnología
                                    </span>

                                    <h3 class="font-bold text-gray-800 mb-2">
                                        {{ $similarPost->title }}
                                    </h3>

                                    <p class="text-gray-600 text-sm mb-3">
                                        {{ Str::limit(strip_tags($similarPost->content), 50) }}
                                    </p>

                                    <div class="flex items-center text-sm text-gray-500">
                                        <span class="mr-3">
                                            <i class="far fa-calendar mr-1"></i>
                                            {{ $similarPost->created_at->format('d M, Y') }}
                                        </span>
                                        <span>
                                            <i class="far fa-clock mr-1"></i> 5 min
                                        </span>
                                    </div>
                                </div>
                            </a>

                        @empty
                            <p class="text-gray-500 text-center py-4">No hay artículos similares disponibles.</p>
                        @endforelse
                    </div>
                </div>
            </div>

            <!-- Sidebar -->
            {{-- <div class="lg:w-1/3 sticky top-24 self-start"> --}}
            <div class="lg:w-1/3 lg:sticky lg:top-24 self-start">

                <!-- TOC -->
                <aside id="toc" class="hidden lg:block sticky top-24 max-h-[80vh] overflow-y-auto pr-4">

                    <div class="mb-4 flex items-center justify-between">
                        <h2 class="text-sm font-semibold text-gray-500 uppercase tracking-wider">
                            Contenido En esta página
                        </h2>

                        <button id="toc-toggle" class="text-xs text-primary hover:underline">
                            Ocultar
                        </button>
                    </div>

                    <ul id="toc-list" class="space-y-2 text-sm"></ul>

                    <!-- Back to top -->
                    <div class="mt-6 pt-4 border-t">
                        <button id="back-to-top"
                            class="fixed bottom-8 right-8 z-50 
                        w-12 h-12 flex items-center justify-center
                        rounded-full bg-primary text-white
                        shadow-lg shadow-primary/30
                        transition-all duration-300
                        opacity-0 translate-y-4
                        hover:scale-110 hover:shadow-xl">

                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 15l7-7 7 7" />
                            </svg>
                        </button>
                    </div>
                </aside>

                <!-- Botones -->
                <div class="bg-white border border-slate-200 rounded-xl p-5">
                    <p class="text-xs font-semibold text-slate-500 uppercase tracking-wide mb-4">
                        Acciones sobre el post
                    </p>
                    <div class="space-y-2">
                        <a href="{{ route('posts.pdf.preview', $post) }}" target="_blank"
                            class="group flex items-center justify-between w-full px-3 py-2 rounded-lg text-sm font-medium  text-slate-600 bg-slate-50  hover:bg-orange-50 hover:text-orange-600 transition-colors duration-300">
                            <span>Vista previa</span>
                            <i
                                class="las la-eye text-lg text-slate-300 group-hover:text-orange-500 group-hover:translate-x-1 transition-all duration-300"></i>
                        </a>

                        <a href="{{ route('posts.pdf', $post) }}"
                            class="group flex items-center justify-between w-full px-3 py-2 rounded-lg text-sm font-medium text-slate-600 bg-slate-50 hover:bg-orange-50 hover:text-orange-600transition-colors duration-300">
                            <span>Descargar Artículo</span>
                            <i
                                class="las la-file-download text-lg text-slate-300 group-hover:text-orange-500 group-hover:translate-x-1 transition-all duration-300"></i>
                        </a>

                        <a href="{{ route('intranet.posts.index') }}"
                            class="group flex flex-row-reverse items-center justify-between w-full px-4 py-2 rounded-lg text-sm font-medium text-slate-600 bg-slate-50 hover:bg-orange-50 hover:text-orange-600 transition-colors duration-300">
                            <span>Regresar</span>
                            <i
                                class="las la-angle-double-left text-lg text-slate-300 group-hover:text-orange-500 group-hover:-translate-x-1 transition-all duration-300"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Botón Volver Arriba -->
    <button id="scrollTopBtn"
        class="hidden fixed bottom-6 right-6 bg-orange-500 hover:bg-orange-600 text-white p-3 rounded-full shadow-lg transition-opacity duration-300">
        <i class="las la-angle-double-up"></i>
    </button>

@endsection

@push('js')
    <script>
        document.addEventListener("DOMContentLoaded", function() {

            const content = document.getElementById("post-content");
            const tocList = document.getElementById("toc-list");
            const headings = content.querySelectorAll("h2, h3");

            let h2Count = 0;
            let h3Count = 0;

            headings.forEach((heading, index) => {

                if (!heading.id) {
                    heading.id = "section-" + index;
                }

                if (heading.tagName === "H2") {
                    h2Count++;
                    h3Count = 0;
                }

                if (heading.tagName === "H3") {
                    h3Count++;
                }

                let number = heading.tagName === "H2" ?
                    `${h2Count}` :
                    `${h2Count}.${h3Count}`;

                heading.setAttribute("data-number", number);

                const li = document.createElement("li");
                const a = document.createElement("a");

                a.href = "#" + heading.id;
                a.innerHTML = `<span class="text-gray-400 mr-2">${number}</span>${heading.textContent}`;

                if (heading.tagName === "H3") {
                    a.classList.add("ml-4", "text-xs");
                }

                li.appendChild(a);
                tocList.appendChild(li);
            });

            // Scroll margin fix
            document.querySelectorAll("#post-content h2, #post-content h3")
                .forEach(h => h.style.scrollMarginTop = "120px");

            // Scroll spy
            const observer = new IntersectionObserver(entries => {
                entries.forEach(entry => {
                    const id = entry.target.id;
                    const link = document.querySelector(`#toc-list a[href="#${id}"]`);

                    if (entry.isIntersecting) {
                        document.querySelectorAll("#toc-list a")
                            .forEach(l => l.classList.remove("active"));

                        link.classList.add("active");
                    }
                });
            }, {
                /* rootMargin: "-40% 0px -55% 0px" */
                rootMargin: "-30% 0px -60% 0px"

            });

            headings.forEach(section => observer.observe(section));

            // Toggle TOC
            document.getElementById("toc-toggle").addEventListener("click", function() {
                tocList.classList.toggle("hidden");
                this.textContent = tocList.classList.contains("hidden") ?
                    "Mostrar" :
                    "Ocultar";
            });

            // Back to top
            document.getElementById("back-to-top")
                .addEventListener("click", function() {
                    window.scrollTo({
                        top: 0,
                        behavior: "smooth"
                    });
                });

            const scrollBtn = document.getElementById("back-to-top");

            window.addEventListener("scroll", () => {
                if (window.scrollY > 400) {
                    scrollBtn.classList.remove("opacity-0", "translate-y-4");
                } else {
                    scrollBtn.classList.add("opacity-0", "translate-y-4");
                }
            });

            scrollBtn.addEventListener("click", () => {
                window.scrollTo({
                    top: 0,
                    behavior: "smooth"
                });
            });

            window.addEventListener("scroll", () => {
                const scrollTop = window.scrollY;
                const docHeight = document.body.scrollHeight - window.innerHeight;
                const progress = (scrollTop / docHeight) * 100;

                document.getElementById("reading-progress")
                    .style.width = progress + "%";
            });

        });
    </script>
@endpush
