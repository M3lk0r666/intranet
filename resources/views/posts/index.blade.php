@extends('layouts.public')

@section('title', 'Listado de Posts')

@push('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet"
        href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">

    <style>
        /* ====================================================
               Clases prefijadas "post-" para no chocar con globales
               ==================================================== */

        /* HERO simple */
        .post-hero {
            position: relative;
            background:
                radial-gradient(900px 240px at 95% -10%, rgba(249, 115, 22, .18), transparent 60%),
                radial-gradient(700px 200px at -5% 110%, rgba(139, 92, 246, .10), transparent 60%),
                linear-gradient(135deg, #ffffff 0%, #fff7ed 100%);
            border: 1px solid #fed7aa;
            border-radius: 22px;
            overflow: hidden;
            padding: 2rem;
        }

        .post-hero::before {
            content: "";
            position: absolute;
            inset: 0 0 auto 0;
            height: 4px;
            background: linear-gradient(90deg, #3b82f6, #8b5cf6, #ec4899, #f59e0b, #f97316);
        }

        .post-eyebrow {
            display: inline-flex;
            align-items: center;
            gap: .5rem;
            background: #fff;
            border: 1px solid #fed7aa;
            color: #c2410c;
            font-size: .72rem;
            font-weight: 800;
            text-transform: uppercase;
            letter-spacing: .12em;
            padding: .4rem 1rem;
            border-radius: 999px;
            box-shadow: 0 4px 12px -4px rgba(249, 115, 22, .2);
        }

        .post-eyebrow .ic {
            width: 18px;
            height: 18px;
            border-radius: 50%;
            background: linear-gradient(135deg, #fbbf24, #f59e0b);
            color: #fff;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: .65rem;
        }

        .post-title-grad {
            background: linear-gradient(135deg, #f97316 0%, #ec4899 50%, #8b5cf6 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        /* Buscador premium */
        .post-search {
            position: relative;
            max-width: 640px;
            margin: 0 auto;
        }

        .post-search input {
            width: 100%;
            padding: .95rem 3.25rem .95rem 3.25rem;
            border: 1.5px solid #e5e7eb;
            background: #fff;
            border-radius: 999px;
            font-size: .95rem;
            color: #0f172a;
            outline: none;
            transition: all .25s ease;
            box-shadow: 0 4px 12px -4px rgba(0, 0, 0, .06);
        }

        .post-search input:focus {
            border-color: #f97316;
            box-shadow: 0 0 0 4px rgba(249, 115, 22, .12), 0 4px 12px -4px rgba(249, 115, 22, .25);
        }

        .post-search .left-ic {
            position: absolute;
            left: 1.15rem;
            top: 50%;
            transform: translateY(-50%);
            color: #94a3b8;
            font-size: 1.1rem;
            pointer-events: none;
        }

        .post-search .submit-btn {
            position: absolute;
            right: .35rem;
            top: 50%;
            transform: translateY(-50%);
            width: 42px;
            height: 42px;
            border-radius: 50%;
            background: linear-gradient(135deg, #f97316, #ea580c);
            color: #fff;
            border: 0;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: .95rem;
            transition: all .25s ease;
            box-shadow: 0 6px 14px -4px rgba(249, 115, 22, .5);
        }

        .post-search .submit-btn:hover {
            transform: translateY(-50%) scale(1.05);
            box-shadow: 0 10px 20px -4px rgba(249, 115, 22, .6);
        }

        /* ====================================================
               CHIPS de categoría
               ==================================================== */
        .post-chips {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: .55rem;
        }

        .post-chip {
            display: inline-flex;
            align-items: center;
            gap: .35rem;
            padding: .55rem 1.1rem;
            border-radius: 999px;
            font-size: .82rem;
            font-weight: 600;
            color: #475569;
            background: #fff;
            border: 1.5px solid #e5e7eb;
            transition: all .25s ease;
            text-decoration: none;
        }

        .post-chip:hover {
            transform: translateY(-1px);
            border-color: #fed7aa;
            color: #ea580c;
            background: #fff7ed;
        }

        .post-chip.active {
            background: linear-gradient(135deg, #f97316, #ea580c);
            color: #fff;
            border-color: #f97316;
            box-shadow: 0 6px 14px -4px rgba(249, 115, 22, .5);
        }

        .post-chip .icx {
            font-size: .85rem;
            opacity: .8;
        }

        /* ====================================================
               SECCIÓN encabezado
               ==================================================== */
        .post-section-head {
            display: flex;
            align-items: flex-end;
            justify-content: space-between;
            gap: 1rem;
            flex-wrap: wrap;
            margin-bottom: 1.25rem;
        }

        .post-section-head .left {
            display: flex;
            align-items: flex-start;
            gap: 1rem;
        }

        .post-section-head .accent {
            width: 4px;
            min-height: 40px;
            border-radius: 999px;
            background: linear-gradient(to bottom, #f97316, #ec4899);
            margin-top: 4px;
        }

        .post-section-head h2 {
            font-size: 1.5rem;
            font-weight: 800;
            color: #0f172a;
            letter-spacing: -.02em;
            line-height: 1.15;
        }

        .post-section-head .subtitle {
            color: #64748b;
            font-size: .88rem;
            margin-top: .25rem;
        }

        .post-counter-pill {
            display: inline-flex;
            align-items: center;
            gap: .4rem;
            background: linear-gradient(135deg, #fff7ed, #ffedd5);
            color: #c2410c;
            font-size: .75rem;
            font-weight: 700;
            padding: .45rem 1rem;
            border-radius: 999px;
            border: 1px solid #fed7aa;
        }

        /* ====================================================
               TARJETA de POST
               ==================================================== */
        .post-card {
            position: relative;
            display: flex;
            flex-direction: column;
            background: #fff;
            border: 1px solid #e5e7eb;
            border-radius: 18px;
            overflow: hidden;
            transition: all .35s cubic-bezier(.2, .7, .2, 1);
            text-decoration: none;
        }

        .post-card:hover {
            transform: translateY(-6px);
            box-shadow: 0 22px 40px -22px rgba(0, 0, 0, .22);
            border-color: #fed7aa;
        }

        .post-card .img-wrap {
            position: relative;
            height: 200px;
            overflow: hidden;
            background: linear-gradient(135deg, #f1f5f9, #e2e8f0);
        }

        .post-card .img-wrap img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform .55s ease;
        }

        .post-card:hover .img-wrap img {
            transform: scale(1.07);
        }

        .post-card .img-wrap::after {
            content: "";
            position: absolute;
            inset: 0;
            background: linear-gradient(to top, rgba(15, 23, 42, .4) 0%, rgba(15, 23, 42, .05) 50%, transparent 100%);
            pointer-events: none;
        }

        /* Badge de categoría flotante */
        .post-cat-badge {
            position: absolute;
            top: 14px;
            left: 14px;
            background: rgba(255, 255, 255, .95);
            color: #ea580c;
            font-size: .65rem;
            font-weight: 800;
            text-transform: uppercase;
            letter-spacing: .08em;
            padding: .35rem .75rem;
            border-radius: 999px;
            z-index: 2;
            box-shadow: 0 6px 16px -4px rgba(0, 0, 0, .25);
            display: inline-flex;
            align-items: center;
            gap: .35rem;
            border: 1px solid rgba(255, 255, 255, .4);
        }

        /* Fecha en esquina */
        .post-date-corner {
            position: absolute;
            top: 14px;
            right: 14px;
            background: rgba(15, 23, 42, .7);
            color: #fff;
            font-size: .68rem;
            font-weight: 700;
            padding: .3rem .65rem;
            border-radius: 999px;
            z-index: 2;
            display: inline-flex;
            align-items: center;
            gap: .35rem;
            backdrop-filter: blur(6px);
        }

        /* Cuerpo */
        .post-card .body {
            padding: 1.4rem 1.45rem 1.25rem;
            flex: 1;
            display: flex;
            flex-direction: column;
        }

        .post-card h3 {
            font-size: 1.1rem;
            font-weight: 800;
            color: #0f172a;
            margin-bottom: .55rem;
            line-height: 1.35;
            letter-spacing: -.01em;
            transition: color .25s ease;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        .post-card:hover h3 {
            color: #ea580c;
        }

        .post-card .excerpt {
            color: #64748b;
            font-size: .87rem;
            line-height: 1.55;
            flex: 1;
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        .post-card .footer-line {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding-top: 1rem;
            margin-top: 1rem;
            border-top: 1px dashed #e5e7eb;
            gap: .75rem;
        }

        .post-author {
            display: flex;
            align-items: center;
            gap: .55rem;
            min-width: 0;
            flex: 1;
        }

        .post-author img {
            width: 32px;
            height: 32px;
            border-radius: 50%;
            object-fit: cover;
            border: 2px solid #fff7ed;
            flex-shrink: 0;
        }

        .post-author-name {
            font-size: .78rem;
            font-weight: 700;
            color: #0f172a;
            line-height: 1.2;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .post-author-meta {
            font-size: .68rem;
            color: #94a3b8;
            font-weight: 500;
        }

        .post-read-btn {
            display: inline-flex;
            align-items: center;
            gap: .35rem;
            background: #fff7ed;
            color: #ea580c;
            font-size: .78rem;
            font-weight: 700;
            padding: .45rem .85rem;
            border-radius: 999px;
            border: 1px solid #fed7aa;
            transition: all .25s ease;
            white-space: nowrap;
            flex-shrink: 0;
        }

        .post-card:hover .post-read-btn {
            background: linear-gradient(135deg, #f97316, #ea580c);
            color: #fff;
            border-color: #f97316;
            transform: translateX(2px);
            box-shadow: 0 8px 18px -4px rgba(249, 115, 22, .45);
        }

        /* ====================================================
               Empty state
               ==================================================== */
        .post-empty {
            text-align: center;
            padding: 4rem 1.5rem;
            background: linear-gradient(135deg, #fafafa, #f5f5f4);
            border: 1px dashed #d1d5db;
            border-radius: 22px;
            color: #64748b;
        }

        .post-empty .ic {
            width: 80px;
            height: 80px;
            margin: 0 auto 1.25rem;
            border-radius: 50%;
            background: #fff;
            color: #94a3b8;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 2rem;
            border: 1px solid #e5e7eb;
            box-shadow: 0 6px 16px -4px rgba(0, 0, 0, .06);
        }

        /* ====================================================
               Paginación
               ==================================================== */
        .post-pagination {
            margin-top: 2.5rem;
            display: flex;
            justify-content: center;
        }

        .post-pagination nav {
            display: flex;
            background: #fff;
            border: 1px solid #e5e7eb;
            border-radius: 14px;
            padding: .35rem;
            box-shadow: 0 4px 12px -4px rgba(0, 0, 0, .05);
        }

        .post-pagination nav span,
        .post-pagination nav a {
            display: inline-flex !important;
            align-items: center !important;
            justify-content: center !important;
            min-width: 38px;
            height: 38px;
            padding: 0 .85rem;
            border-radius: 10px !important;
            font-size: .85rem;
            font-weight: 700;
            color: #475569;
            transition: all .2s ease;
            margin: 0 1px !important;
            border: 0 !important;
            background: transparent !important;
        }

        .post-pagination nav a:hover {
            background: #fff7ed !important;
            color: #ea580c !important;
        }

        .post-pagination nav span[aria-current="page"],
        .post-pagination nav .bg-primary,
        .post-pagination nav span.bg-blue-500 {
            background: linear-gradient(135deg, #f97316, #ea580c) !important;
            color: #fff !important;
            box-shadow: 0 6px 14px -4px rgba(249, 115, 22, .45);
        }

        /* Animaciones */
        @keyframes post-fadeUp {
            from {
                opacity: 0;
                transform: translateY(10px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .post-anim-up {
            animation: post-fadeUp .5s cubic-bezier(.2, .7, .2, 1) both;
        }

        .post-card {
            animation: post-fadeUp .45s cubic-bezier(.2, .7, .2, 1) both;
        }

        .post-card:nth-child(1) {
            animation-delay: .03s;
        }

        .post-card:nth-child(2) {
            animation-delay: .06s;
        }

        .post-card:nth-child(3) {
            animation-delay: .09s;
        }

        .post-card:nth-child(4) {
            animation-delay: .12s;
        }

        .post-card:nth-child(5) {
            animation-delay: .15s;
        }

        .post-card:nth-child(6) {
            animation-delay: .18s;
        }

        .post-card:nth-child(7) {
            animation-delay: .21s;
        }

        .post-card:nth-child(8) {
            animation-delay: .24s;
        }

        .post-card:nth-child(9) {
            animation-delay: .27s;
        }
    </style>
@endpush

@section('content')

    <div class="container mx-auto px-4 py-8">

        {{-- ============================================
             HERO + Buscador
             ============================================ --}}
        <section class="post-hero mb-8 post-anim-up">
            <div class="text-center">
                <span class="post-eyebrow mb-4">
                    <span class="ic"><i class="las la-newspaper"></i></span>
                    Blog Corporativo
                </span>
                <h1 class="text-3xl md:text-5xl font-extrabold text-gray-900 tracking-tight leading-[1.05] mt-1">
                    Explorar
                    <span class="post-title-grad">Contenido</span>
                </h1>
                <p class="text-gray-600 mt-3 text-base md:text-lg max-w-2xl mx-auto leading-relaxed mb-7">
                    Noticias, artículos y actualizaciones de la comunidad corporativa.
                </p>

                {{-- Buscador --}}
                <form action="{{ route('posts.index') }}" method="GET" class="post-search">
                    <i class="las la-search left-ic"></i>
                    <input type="text" name="query" placeholder="Buscar artículos, autores, temas..."
                        value="{{ request('query') }}">
                    <button type="submit" class="submit-btn" aria-label="Buscar">
                        <i class="las la-arrow-right"></i>
                    </button>
                </form>
            </div>
        </section>

        {{-- ============================================
             CHIPS DE CATEGORÍAS
             ============================================ --}}
        <div class="post-chips mb-10 post-anim-up">
            <a href="{{ route('posts.index') }}" class="post-chip {{ request('category') ? '' : 'active' }}">
                <i class="las la-th-large icx"></i> Todos
            </a>
            @foreach ($categories as $cat)
                <a href="{{ route('posts.index', array_merge(request()->except('page'), ['category' => $cat->name])) }}"
                    class="post-chip {{ request('category') == $cat->name ? 'active' : '' }}">
                    <i class="las la-tag icx"></i> {{ $cat->name }}
                </a>
            @endforeach
        </div>

        {{-- ============================================
             ENCABEZADO de listado
             ============================================ --}}
        <div class="post-section-head">
            <div class="left">
                <div class="accent"></div>
                <div>
                    <h2>
                        @if (request('query'))
                            Resultados para "{{ request('query') }}"
                        @elseif(request('category'))
                            {{ request('category') }}
                        @else
                            Últimos artículos
                        @endif
                    </h2>
                    <p class="subtitle">
                        @if (request('query') || request('category'))
                            Artículos filtrados según tu búsqueda
                        @else
                            Lo último publicado por la comunidad
                        @endif
                    </p>
                </div>
            </div>
            <span class="post-counter-pill">
                <i class="las la-newspaper"></i>
                {{ method_exists($posts, 'total') ? $posts->total() : count($posts) }}
                {{ (method_exists($posts, 'total') ? $posts->total() : count($posts)) === 1 ? 'artículo' : 'artículos' }}
            </span>
        </div>

        {{-- ============================================
             GRID DE POSTS
             ============================================ --}}
        @if (count($posts) > 0)
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-8">
                @foreach ($posts as $post)
                    <a href="{{ route('posts.show', $post) }}" class="post-card">
                        <div class="img-wrap">
                            <span class="post-cat-badge">
                                <i class="las la-tag"></i>
                                {{ optional($post->category)->name ?? 'Sin categoría' }}
                            </span>
                            <span class="post-date-corner">
                                <i class="las la-calendar"></i>
                                {{ $post->created_at->format('d M, Y') }}
                            </span>
                            <img src="{{ $post->image_path ? asset('storage/' . $post->image_path) : asset('assets/media/no-disponible.jpg') }}"
                                alt="{{ $post->title }}">
                        </div>

                        <div class="body">
                            <h3>{{ $post->title }}</h3>
                            <p class="excerpt">
                                {{ Str::limit(strip_tags($post->content), 130) }}
                            </p>

                            <div class="footer-line">
                                <div class="post-author">
                                    @if ($post->user)
                                        <img src="{{ $post->user->profile_photo_url }}" alt="{{ $post->user->name }}">
                                        <div class="min-w-0">
                                            <div class="post-author-name">{{ $post->user->name }}</div>
                                            <div class="post-author-meta">
                                                {{ $post->created_at->diffForHumans() }}
                                            </div>
                                        </div>
                                    @else
                                        <div>
                                            <div class="post-author-name text-slate-400">Anónimo</div>
                                            <div class="post-author-meta">{{ $post->created_at->diffForHumans() }}</div>
                                        </div>
                                    @endif
                                </div>

                                <span class="post-read-btn">
                                    Leer <i class="las la-arrow-right"></i>
                                </span>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>

            {{-- Paginación --}}
            <div class="post-pagination">
                {{ $posts->links() }}
            </div>
        @else
            {{-- Empty state --}}
            <div class="post-empty post-anim-up">
                <div class="ic"><i class="las la-search-minus"></i></div>
                <p class="text-lg font-extrabold text-gray-800 mb-1">No se encontraron artículos</p>
                <p class="text-sm">
                    @if (request('query'))
                        Prueba con otra búsqueda o explora otras categorías.
                    @elseif(request('category'))
                        Aún no hay artículos en esta categoría.
                    @else
                        Aún no se ha publicado contenido.
                    @endif
                </p>
                @if (request('query') || request('category'))
                    <a href="{{ route('posts.index') }}"
                        class="inline-flex items-center gap-2 mt-5 px-5 py-2.5 rounded-full bg-gradient-to-r from-orange-500 to-orange-600 text-white text-sm font-bold shadow-md hover:shadow-lg hover:-translate-y-0.5 transition-all">
                        <i class="las la-undo"></i> Ver todos los artículos
                    </a>
                @endif
            </div>
        @endif
    </div>
@endsection
