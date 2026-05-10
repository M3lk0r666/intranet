@extends('layouts.intranet')

@section('title', 'Guías de Trabajo')

@push('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet"
        href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <link href="/assets/css/intrahome.css" rel="stylesheet">

    <style>
        /* ===== HERO ===== */
        .guides-hero {
            position: relative;
            background:
                radial-gradient(1000px 280px at 100% 0%, rgba(249, 115, 22, .10), transparent 60%),
                radial-gradient(700px 200px at 0% 100%, rgba(59, 130, 246, .07), transparent 60%),
                linear-gradient(135deg, #ffffff 0%, #fafafa 100%);
            border: 1px solid #e5e7eb;
            border-radius: 22px;
            overflow: hidden;
        }

        .guides-hero::before {
            content: "";
            position: absolute;
            inset: 0 0 auto 0;
            height: 5px;
            background: linear-gradient(90deg, #3b82f6, #8b5cf6, #f59e0b, #f97316);
        }

        .hero-icon-lg {
            width: 68px;
            height: 68px;
            border-radius: 18px;
            background: linear-gradient(135deg, #fff7ed, #ffedd5);
            color: #ea580c;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 2rem;
            box-shadow: 0 12px 28px -10px rgba(249, 115, 22, .45);
            flex-shrink: 0;
        }

        /* ===== Search bar ===== */
        .search-wrap {
            position: relative;
            max-width: 100%;
        }

        .search-wrap input {
            width: 100%;
            padding: .85rem 1rem .85rem 3rem;
            border-radius: 14px;
            border: 1.5px solid #e5e7eb;
            background: #fff;
            font-size: .95rem;
            transition: all .25s ease;
            outline: none;
        }

        .search-wrap input:focus {
            border-color: #f97316;
            box-shadow: 0 0 0 4px rgba(249, 115, 22, .12);
        }

        .search-wrap .search-ic {
            position: absolute;
            left: 1rem;
            top: 50%;
            transform: translateY(-50%);
            color: #9ca3af;
            font-size: 1.1rem;
        }

        .search-wrap .clear-btn {
            position: absolute;
            right: .75rem;
            top: 50%;
            transform: translateY(-50%);
            width: 28px;
            height: 28px;
            border-radius: 50%;
            background: #f3f4f6;
            color: #6b7280;
            border: 0;
            cursor: pointer;
            display: none;
            align-items: center;
            justify-content: center;
            transition: all .2s ease;
        }

        .search-wrap.has-value .clear-btn {
            display: flex;
        }

        .search-wrap .clear-btn:hover {
            background: #fee2e2;
            color: #dc2626;
        }

        /* ===== Filter chips ===== */
        .chips-row {
            display: flex;
            flex-wrap: wrap;
            gap: .5rem;
        }

        .filter-chip {
            display: inline-flex;
            align-items: center;
            gap: .4rem;
            padding: .55rem 1rem;
            border-radius: 999px;
            background: #fff;
            border: 1.5px solid #e5e7eb;
            color: #4b5563;
            font-size: .85rem;
            font-weight: 600;
            cursor: pointer;
            transition: all .25s ease;
            user-select: none;
        }

        .filter-chip .dot {
            width: 8px;
            height: 8px;
            border-radius: 50%;
            background: var(--chip-color, #9ca3af);
        }

        .filter-chip .count {
            font-size: .7rem;
            background: #f3f4f6;
            color: #6b7280;
            padding: .1rem .5rem;
            border-radius: 999px;
            font-weight: 700;
        }

        .filter-chip:hover {
            transform: translateY(-1px);
            border-color: var(--chip-color, #cbd5e1);
        }

        .filter-chip.active {
            background: var(--chip-color, #f97316);
            color: #fff;
            border-color: var(--chip-color, #f97316);
        }

        .filter-chip.active .dot {
            background: #fff;
        }

        .filter-chip.active .count {
            background: rgba(255, 255, 255, .25);
            color: #fff;
        }

        /* ===== Section header ===== */
        .section-header {
            display: flex;
            align-items: center;
            gap: .85rem;
            margin-bottom: 1.5rem;
        }

        .section-header h2 {
            font-size: 1.4rem;
            font-weight: 800;
            color: #0f172a;
        }

        .count-pill {
            background: #fff7ed;
            color: #ea580c;
            padding: .3rem .8rem;
            border-radius: 999px;
            font-size: .75rem;
            font-weight: 700;
            border: 1px solid #fed7aa;
            display: inline-flex;
            align-items: center;
            gap: .35rem;
        }

        /* ===== Card de guía (override de intrahome) ===== */
        .guide-card {
            position: relative;
            display: flex;
            flex-direction: column;
            background: #fff;
            border: 1px solid #e5e7eb;
            border-radius: 18px;
            padding: 1.5rem 1.4rem 1.25rem;
            text-decoration: none;
            overflow: hidden;
            transition: all .35s cubic-bezier(.2, .7, .2, 1);
            isolation: isolate;
        }

        .guide-card::before {
            content: "";
            position: absolute;
            inset: 0;
            background: var(--card-pattern, none);
            opacity: 0;
            transition: opacity .35s ease;
            z-index: -1;
        }

        .guide-card:hover {
            transform: translateY(-6px);
            box-shadow: 0 22px 40px -22px rgba(0, 0, 0, .22);
            border-color: var(--card-color, #f97316);
        }

        .guide-card:hover::before {
            opacity: 1;
        }

        .card-stripe {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 5px;
            background: var(--card-color, #f97316);
            transform: scaleX(0);
            transform-origin: left;
            transition: transform .35s ease;
        }

        .guide-card:hover .card-stripe {
            transform: scaleX(1);
        }

        .cat-badge {
            display: inline-flex;
            align-items: center;
            gap: .3rem;
            background: var(--card-bg, #fff7ed);
            color: var(--card-color, #ea580c);
            font-size: .68rem;
            font-weight: 800;
            text-transform: uppercase;
            letter-spacing: .06em;
            padding: .3rem .65rem;
            border-radius: 999px;
            align-self: flex-start;
            margin-bottom: 1rem;
            border: 1px solid var(--card-border, #fed7aa);
        }

        .guide-icon {
            width: 56px;
            height: 56px;
            border-radius: 16px;
            background: linear-gradient(135deg, var(--card-bg, #fff7ed), #fff);
            color: var(--card-color, #ea580c);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.7rem;
            margin-bottom: 1rem;
            transition: all .35s ease;
            position: relative;
        }

        .guide-icon::after {
            content: "";
            position: absolute;
            inset: 0;
            border-radius: 16px;
            border: 1.5px solid var(--card-border, #fed7aa);
        }

        .guide-card:hover .guide-icon {
            transform: scale(1.06) rotate(-5deg);
            background: var(--card-color, #ea580c);
            color: #fff;
        }

        .guide-card:hover .guide-icon::after {
            border-color: transparent;
        }

        .guide-title {
            font-size: 1.05rem;
            font-weight: 700;
            color: #0f172a;
            margin-bottom: .45rem;
            line-height: 1.35;
            transition: color .25s ease;
        }

        .guide-card:hover .guide-title {
            color: var(--card-color, #ea580c);
        }

        .guide-desc {
            color: #64748b;
            font-size: .87rem;
            line-height: 1.55;
            flex: 1;
            margin-bottom: 1rem;
        }

        .guide-footer {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding-top: .85rem;
            border-top: 1px dashed #e5e7eb;
        }

        .guide-date {
            display: inline-flex;
            align-items: center;
            gap: .35rem;
            font-size: .78rem;
            color: #94a3b8;
            font-weight: 500;
        }

        .guide-cta {
            display: inline-flex;
            align-items: center;
            gap: .35rem;
            font-size: .82rem;
            font-weight: 700;
            color: var(--card-color, #ea580c);
            transition: gap .25s ease;
        }

        .guide-card:hover .guide-cta {
            gap: .55rem;
        }

        /* Decorative pattern (subtle dots in corner) */
        .guide-card::after {
            content: "";
            position: absolute;
            top: -10px;
            right: -10px;
            width: 80px;
            height: 80px;
            background-image: radial-gradient(circle, var(--card-color, #f97316) 1px, transparent 1px);
            background-size: 14px 14px;
            opacity: .06;
            border-radius: 50%;
            transition: opacity .35s ease;
            pointer-events: none;
        }

        .guide-card:hover::after {
            opacity: .15;
        }

        /* Categorías de color */
        .guide-card.cat-infra {
            --card-color: #3b82f6;
            --card-bg: #dbeafe;
            --card-border: #bfdbfe;
        }

        .guide-card.cat-sec {
            --card-color: #8b5cf6;
            --card-bg: #f5f3ff;
            --card-border: #ddd6fe;
        }

        .guide-card.cat-mant {
            --card-color: #f59e0b;
            --card-bg: #fef3c7;
            --card-border: #fde68a;
        }

        .guide-card.cat-guide {
            --card-color: #f97316;
            --card-bg: #fff7ed;
            --card-border: #fed7aa;
        }

        /* Empty state */
        .empty-state {
            display: none;
            text-align: center;
            padding: 3rem 1rem;
            background: #fafafa;
            border: 1px dashed #d1d5db;
            border-radius: 18px;
            color: #6b7280;
        }

        .empty-state.show {
            display: block;
        }

        .empty-state .ic {
            width: 64px;
            height: 64px;
            margin: 0 auto 1rem;
            border-radius: 50%;
            background: #fff;
            color: #9ca3af;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.6rem;
            border: 1px solid #e5e7eb;
        }

        /* Animaciones */
        @keyframes fadeUp {
            from {
                opacity: 0;
                transform: translateY(12px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .anim-up {
            animation: fadeUp .5s ease both;
        }

        .guide-card {
            animation: fadeUp .45s ease both;
        }

        .guide-card:nth-child(1) {
            animation-delay: .02s;
        }

        .guide-card:nth-child(2) {
            animation-delay: .06s;
        }

        .guide-card:nth-child(3) {
            animation-delay: .10s;
        }

        .guide-card:nth-child(4) {
            animation-delay: .14s;
        }

        .guide-card:nth-child(5) {
            animation-delay: .18s;
        }

        .guide-card:nth-child(6) {
            animation-delay: .22s;
        }

        .guide-card:nth-child(7) {
            animation-delay: .26s;
        }

        .guide-card:nth-child(8) {
            animation-delay: .30s;
        }
    </style>
@endpush

@section('content')

    {{-- Breadcrumb --}}
    <div class="bg-white border-b border-gray-200">
        <div class="container mx-auto px-4 py-3">
            <nav class="flex" aria-label="Breadcrumb">
                <ol class="inline-flex items-center space-x-1 md:space-x-3">
                    <li class="inline-flex items-center">
                        <a href="{{ route('bienvenido') }}"
                            class="inline-flex items-center text-sm text-gray-600 hover:text-orange-600 transition-colors">
                            <i class="fas fa-home mr-2"></i> Home
                        </a>
                    </li>
                    <li>
                        <div class="flex items-center">
                            <i class="fas fa-chevron-right text-gray-400 mx-2 text-xs"></i>
                            <a href="{{ route('intranet.index') }}"
                                class="ml-1 text-sm text-gray-600 hover:text-orange-600 md:ml-2 transition-colors">Intranet</a>
                        </div>
                    </li>
                    <li>
                        <div class="flex items-center">
                            <i class="fas fa-chevron-right text-gray-400 mx-2 text-xs"></i>
                            <a href="{{ route('estructurainterna.ingenieria') }}"
                                class="ml-1 text-sm text-gray-600 hover:text-orange-600 md:ml-2 transition-colors">Ingeniería</a>
                        </div>
                    </li>
                    <li aria-current="page">
                        <div class="flex items-center">
                            <i class="fas fa-chevron-right text-gray-400 mx-2 text-xs"></i>
                            <span class="ml-1 text-sm text-orange-600 font-semibold md:ml-2">Guías On Site</span>
                        </div>
                    </li>
                </ol>
            </nav>
        </div>
    </div>

    <div class="container mx-auto px-4">

        {{-- HERO + Buscador --}}
        <section class="guides-hero p-6 md:p-8 mt-8 mb-8 anim-up">
            <div class="grid lg:grid-cols-[1fr_auto] gap-6 items-start">
                <div class="flex items-center gap-5">
                    <div class="hero-icon-lg">
                        <i class="las la-book-reader"></i>
                    </div>
                    <div>
                        <div
                            class="flex items-center gap-2 text-xs font-semibold text-orange-600 uppercase tracking-wider mb-1">
                            <i class="las la-tools"></i>
                            <span>Apoyo Técnico</span>
                        </div>
                        <h1 class="text-2xl md:text-3xl font-extrabold text-gray-900 tracking-tight leading-tight">
                            Guías de Trabajo
                        </h1>
                        <p class="text-gray-600 mt-1 text-sm md:text-base">
                            Documentación y guías paso a paso para la realización de actividades.
                        </p>
                    </div>
                </div>

                <div class="lg:w-80 w-full">
                    <div class="search-wrap" id="searchWrap">
                        <i class="las la-search search-ic"></i>
                        <input type="text" id="searchInput" placeholder="Buscar guía..." autocomplete="off">
                        <button type="button" class="clear-btn" id="clearBtn" aria-label="Limpiar">
                            <i class="las la-times"></i>
                        </button>
                    </div>
                </div>
            </div>

            {{-- Filtros por categoría --}}
            <div class="chips-row mt-6">
                <button class="filter-chip active" data-cat="all" style="--chip-color:#0f172a;">
                    <i class="las la-th-large"></i>
                    Todas
                    <span class="count" id="count-all">8</span>
                </button>
                <button class="filter-chip" data-cat="cat-infra" style="--chip-color:#3b82f6;">
                    <span class="dot"></span> Infraestructura
                    <span class="count" id="count-infra">2</span>
                </button>
                <button class="filter-chip" data-cat="cat-sec" style="--chip-color:#8b5cf6;">
                    <span class="dot"></span> Seguridad
                    <span class="count" id="count-sec">1</span>
                </button>
                <button class="filter-chip" data-cat="cat-mant" style="--chip-color:#f59e0b;">
                    <span class="dot"></span> Mantenimiento
                    <span class="count" id="count-mant">2</span>
                </button>
                <button class="filter-chip" data-cat="cat-guide" style="--chip-color:#f97316;">
                    <span class="dot"></span> Guía
                    <span class="count" id="count-guide">3</span>
                </button>
            </div>
        </section>

        {{-- Listado --}}
        <div class="mb-12">
            <div class="section-header">
                <h2>Listado de Guías de Actividades</h2>
                <span class="count-pill" id="visibleCount">
                    <i class="las la-folder-open"></i> 8 guías
                </span>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-5" id="cardsGrid">

                {{-- CARD 1 — Switches --}}
                <a href="{{ route('ingenieria.instalacion-switch') }}" class="guide-card cat-infra" data-cat="cat-infra"
                    data-search="implementacion switches red infraestructura">
                    <div class="card-stripe"></div>
                    <span class="cat-badge"><i class="las la-sitemap"></i> Infraestructura</span>
                    <div class="guide-icon"><i class="las la-network-wired"></i></div>
                    <p class="guide-title">Implementación de Switches</p>
                    <p class="guide-desc">Guía de actividades en la implementación y configuración de switches de red.</p>
                    <div class="guide-footer">
                        <span class="guide-date"><i class="las la-calendar"></i> 21/02/2026</span>
                        <span class="guide-cta">Abrir <i class="las la-arrow-right"></i></span>
                    </div>
                </a>

                {{-- CARD 2 — Firewalls --}}
                <a href="{{ route('ingenieria.instalacion-firewall') }}" class="guide-card cat-sec" data-cat="cat-sec"
                    data-search="implementacion firewall seguridad">
                    <div class="card-stripe"></div>
                    <span class="cat-badge"><i class="las la-lock"></i> Seguridad</span>
                    <div class="guide-icon"><i class="las la-shield-alt"></i></div>
                    <p class="guide-title">Implementación de Firewalls</p>
                    <p class="guide-desc">Guía de actividades en la implementación y configuración de firewalls.</p>
                    <div class="guide-footer">
                        <span class="guide-date"><i class="las la-calendar"></i> 21/02/2026</span>
                        <span class="guide-cta">Abrir <i class="las la-arrow-right"></i></span>
                    </div>
                </a>

                {{-- CARD 3 — Access Points --}}
                <a href="{{ route('ingenieria.instalacion-aps') }}" class="guide-card cat-infra" data-cat="cat-infra"
                    data-search="access points wifi inalambrico antenas infraestructura">
                    <div class="card-stripe"></div>
                    <span class="cat-badge"><i class="las la-sitemap"></i> Infraestructura</span>
                    <div class="guide-icon"><i class="las la-wifi"></i></div>
                    <p class="guide-title">Implementación de Access Points</p>
                    <p class="guide-desc">Guía de actividades en la implementación de antenas inalámbricas.</p>
                    <div class="guide-footer">
                        <span class="guide-date"><i class="las la-calendar"></i> 21/02/2026</span>
                        <span class="guide-cta">Abrir <i class="las la-arrow-right"></i></span>
                    </div>
                </a>

                {{-- CARD 4 — PoC --}}
                <a href="{{ route('ingenieria.instalacion-poc') }}" class="guide-card cat-guide" data-cat="cat-guide"
                    data-search="prueba de concepto poc planificacion guia">
                    <div class="card-stripe"></div>
                    <span class="cat-badge"><i class="las la-flask"></i> Guía</span>
                    <div class="guide-icon"><i class="las la-flask"></i></div>
                    <p class="guide-title">Prueba de Concepto</p>
                    <p class="guide-desc">Guía de actividades para planificar y realizar una PoC exitosa.</p>
                    <div class="guide-footer">
                        <span class="guide-date"><i class="las la-calendar"></i> 21/02/2026</span>
                        <span class="guide-cta">Abrir <i class="las la-arrow-right"></i></span>
                    </div>
                </a>

                {{-- CARD 5 — Mantenimiento Preventivo --}}
                <a href="{{ route('ingenieria.guia-preventivo') }}" class="guide-card cat-mant" data-cat="cat-mant"
                    data-search="mantenimiento preventivo">
                    <div class="card-stripe"></div>
                    <span class="cat-badge"><i class="las la-tools"></i> Mantenimiento</span>
                    <div class="guide-icon"><i class="las la-tools"></i></div>
                    <p class="guide-title">Mantenimiento Preventivo</p>
                    <p class="guide-desc">Guía de actividades para la realización de mantenimiento preventivo.</p>
                    <div class="guide-footer">
                        <span class="guide-date"><i class="las la-calendar"></i> 21/02/2026</span>
                        <span class="guide-cta">Abrir <i class="las la-arrow-right"></i></span>
                    </div>
                </a>

                {{-- CARD 6 — Mantenimiento Correctivo --}}
                <a href="{{ route('ingenieria.guia-correctivo') }}" class="guide-card cat-mant" data-cat="cat-mant"
                    data-search="mantenimiento correctivo falla">
                    <div class="card-stripe"></div>
                    <span class="cat-badge"><i class="las la-tools"></i> Mantenimiento</span>
                    <div class="guide-icon"><i class="las la-wrench"></i></div>
                    <p class="guide-title">Mantenimiento Correctivo</p>
                    <p class="guide-desc">Guía de actividades para la realización de mantenimiento correctivo.</p>
                    <div class="guide-footer">
                        <span class="guide-date"><i class="las la-calendar"></i> 21/02/2026</span>
                        <span class="guide-cta">Abrir <i class="las la-arrow-right"></i></span>
                    </div>
                </a>

                {{-- CARD 7 — Site Survey --}}
                <a href="{{ route('ingenieria.site-survey') }}" class="guide-card cat-guide" data-cat="cat-guide"
                    data-search="site survey campo guia">
                    <div class="card-stripe"></div>
                    <span class="cat-badge"><i class="las la-map-marked-alt"></i> Guía</span>
                    <div class="guide-icon"><i class="las la-map-marked-alt"></i></div>
                    <p class="guide-title">Guía para Site Survey</p>
                    <p class="guide-desc">Guía de actividades para la realización de un Site Survey de campo.</p>
                    <div class="guide-footer">
                        <span class="guide-date"><i class="las la-calendar"></i> 21/02/2026</span>
                        <span class="guide-cta">Abrir <i class="las la-arrow-right"></i></span>
                    </div>
                </a>

                {{-- CARD 8 — Levantamiento Infra --}}
                <a href="{{ route('ingenieria.levantamiento-switches') }}" class="guide-card cat-guide"
                    data-cat="cat-guide" data-search="levantamiento infraestructura red switches cuestionario">
                    <div class="card-stripe"></div>
                    <span class="cat-badge"><i class="las la-file-alt"></i> Guía</span>
                    <div class="guide-icon"><i class="las la-clipboard-list"></i></div>
                    <p class="guide-title">Levantamiento de Infraestructura de Red</p>
                    <p class="guide-desc">Cuestionario básico para conocer el estado de los equipos de red con el cliente.
                    </p>
                    <div class="guide-footer">
                        <span class="guide-date"><i class="las la-calendar"></i> 01/05/2026</span>
                        <span class="guide-cta">Abrir <i class="las la-arrow-right"></i></span>
                    </div>
                </a>
            </div>

            {{-- Empty state --}}
            <div class="empty-state" id="emptyState">
                <div class="ic"><i class="las la-search-minus"></i></div>
                <p class="font-semibold text-gray-700 mb-1">No se encontraron guías</p>
                <p class="text-sm">Prueba con otra búsqueda o cambia el filtro de categoría.</p>
            </div>
        </div>
    </div>

@endsection

@push('js')
    <script>
        const searchInput = document.getElementById('searchInput');
        const searchWrap = document.getElementById('searchWrap');
        const clearBtn = document.getElementById('clearBtn');
        const cards = document.querySelectorAll('.guide-card');
        const chips = document.querySelectorAll('.filter-chip');
        const emptyState = document.getElementById('emptyState');
        const visibleCount = document.getElementById('visibleCount');
        let currentCat = 'all';
        let currentQuery = '';

        function normalize(s) {
            return (s || '').toLowerCase()
                .normalize('NFD').replace(/[̀-ͯ]/g, '');
        }

        function applyFilters() {
            const q = normalize(currentQuery.trim());
            let visible = 0;
            cards.forEach(card => {
                const cat = card.dataset.cat || '';
                const search = normalize(card.dataset.search + ' ' + (card.querySelector('.guide-title')
                    ?.textContent || '') + ' ' + (card.querySelector('.guide-desc')?.textContent || ''));
                const matchCat = currentCat === 'all' || cat === currentCat;
                const matchQ = q === '' || search.includes(q);
                if (matchCat && matchQ) {
                    card.style.display = '';
                    visible++;
                } else {
                    card.style.display = 'none';
                }
            });
            emptyState.classList.toggle('show', visible === 0);
            visibleCount.innerHTML = `<i class="las la-folder-open"></i> ${visible} ${visible === 1 ? 'guía' : 'guías'}`;
        }

        // Buscador
        searchInput.addEventListener('input', e => {
            currentQuery = e.target.value;
            searchWrap.classList.toggle('has-value', currentQuery.length > 0);
            applyFilters();
        });
        clearBtn.addEventListener('click', () => {
            searchInput.value = '';
            currentQuery = '';
            searchWrap.classList.remove('has-value');
            applyFilters();
            searchInput.focus();
        });

        // Chips
        chips.forEach(chip => {
            chip.addEventListener('click', () => {
                chips.forEach(c => c.classList.remove('active'));
                chip.classList.add('active');
                currentCat = chip.dataset.cat;
                applyFilters();
            });
        });

        // Inicial: actualizar contadores reales por categoría
        (function updateCounts() {
            const counts = {
                all: cards.length,
                'cat-infra': 0,
                'cat-sec': 0,
                'cat-mant': 0,
                'cat-guide': 0
            };
            cards.forEach(c => {
                counts[c.dataset.cat] = (counts[c.dataset.cat] || 0) + 1;
            });
            const map = {
                all: 'count-all',
                'cat-infra': 'count-infra',
                'cat-sec': 'count-sec',
                'cat-mant': 'count-mant',
                'cat-guide': 'count-guide'
            };
            Object.keys(map).forEach(k => {
                const el = document.getElementById(map[k]);
                if (el) el.textContent = counts[k];
            });
        })();
    </script>
@endpush
