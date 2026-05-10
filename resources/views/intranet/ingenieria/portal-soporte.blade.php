@extends('layouts.intranet')

@section('title', 'Intranet Corporativa')

@push('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet"
        href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <link href="/assets/css/intrahome.css" rel="stylesheet">

    <style>
        /* ===== Hero del portal ===== */
        .support-hero {
            position: relative;
            background:
                radial-gradient(1000px 280px at 100% 0%, rgba(249, 115, 22, .10), transparent 60%),
                radial-gradient(800px 200px at 0% 100%, rgba(59, 130, 246, .08), transparent 60%),
                linear-gradient(135deg, #fff 0%, #fafafa 100%);
            border: 1px solid #e5e7eb;
            border-radius: 20px;
            overflow: hidden;
        }

        .support-hero::before {
            content: "";
            position: absolute;
            inset: 0 0 auto 0;
            height: 5px;
            background: linear-gradient(90deg, #f97316, #ec4899, #8b5cf6, #3b82f6);
        }

        .hero-icon-lg {
            width: 72px;
            height: 72px;
            border-radius: 18px;
            background: linear-gradient(135deg, #fff7ed, #ffedd5);
            color: #ea580c;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 2.1rem;
            box-shadow: 0 12px 28px -10px rgba(249, 115, 22, .45);
        }

        /* ===== Quick stat / acción ===== */
        .quick-action {
            display: flex;
            align-items: center;
            gap: .85rem;
            background: #fff;
            border: 1px solid #e5e7eb;
            padding: .85rem 1rem;
            border-radius: 14px;
            transition: all .25s ease;
        }

        .quick-action:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 20px -10px rgba(0, 0, 0, .15);
            border-color: #fed7aa;
        }

        .quick-action .qa-icon {
            width: 40px;
            height: 40px;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.1rem;
            flex-shrink: 0;
        }

        /* ===== Sección estilo card ===== */
        .panel {
            background: #fff;
            border: 1px solid #f4ede7;
            border-radius: 20px;
            padding: 1.75rem;
            box-shadow: 0 1px 2px rgba(0, 0, 0, .02);
        }

        .panel-header {
            display: flex;
            align-items: center;
            gap: 1rem;
            margin-bottom: 1.5rem;
        }

        .panel-header .ph-icon {
            width: 52px;
            height: 52px;
            border-radius: 14px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
            flex-shrink: 0;
        }

        /* ===== Timeline de pilares ===== */
        .pillars-wrap {
            background: linear-gradient(135deg, #fff7ed 0%, #fffbeb 100%);
            border: 1px solid #fed7aa;
            border-radius: 18px;
            padding: 2rem 1.5rem;
            position: relative;
            overflow: hidden;
        }

        .pillars-wrap::before {
            content: "";
            position: absolute;
            top: -40px;
            right: -40px;
            width: 180px;
            height: 180px;
            background: radial-gradient(circle, rgba(249, 115, 22, .12), transparent 70%);
            border-radius: 50%;
        }

        .pillar-row {
            display: grid;
            grid-template-columns: 1fr 80px 1fr;
            align-items: center;
            gap: 1.25rem;
            margin-bottom: 2rem;
            position: relative;
            z-index: 1;
        }

        .pillar-row:last-child {
            margin-bottom: 0;
        }

        .pillar-icon {
            width: 64px;
            height: 64px;
            border-radius: 50%;
            background: linear-gradient(135deg, #f97316, #ea580c);
            color: #fff;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
            box-shadow: 0 10px 25px -8px rgba(249, 115, 22, .5);
            border: 4px solid #fff;
            margin: 0 auto;
            position: relative;
            z-index: 2;
        }

        .pillar-num {
            position: absolute;
            top: -10px;
            right: -8px;
            width: 26px;
            height: 26px;
            border-radius: 50%;
            background: #1c140d;
            color: #fff;
            font-size: .75rem;
            font-weight: 800;
            display: flex;
            align-items: center;
            justify-content: center;
            border: 2px solid #fff;
        }

        .pillar-content h4 {
            font-size: 1.05rem;
            font-weight: 700;
            color: #1c140d;
            margin-bottom: .35rem;
        }

        .pillar-content p {
            color: #57534e;
            font-size: .9rem;
            line-height: 1.55;
        }

        .pillar-vline {
            position: absolute;
            left: 50%;
            top: 0;
            bottom: 0;
            width: 3px;
            background: linear-gradient(to bottom, #f97316, #fdba74, transparent);
            transform: translateX(-50%);
            z-index: 0;
        }

        @media (max-width: 768px) {
            .pillar-row {
                grid-template-columns: 1fr;
                text-align: center;
                gap: .75rem;
            }

            .pillar-row .pillar-content {
                order: 2;
            }

            .pillar-row .pillar-icon-wrap {
                order: 1;
            }

            .pillar-vline {
                display: none;
            }
        }

        /* ===== Cards de categorías de tickets ===== */
        .ticket-card {
            position: relative;
            background: #fff;
            border: 1px solid #e5e7eb;
            border-radius: 16px;
            padding: 1.5rem;
            text-align: center;
            transition: all .3s ease;
            overflow: hidden;
        }

        .ticket-card::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 3px;
            background: var(--card-color, #f97316);
            transform: scaleX(0);
            transform-origin: left;
            transition: transform .35s ease;
        }

        .ticket-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 14px 30px -12px rgba(0, 0, 0, .18);
            border-color: var(--card-border, #fed7aa);
        }

        .ticket-card:hover::before {
            transform: scaleX(1);
        }

        .ticket-card .tc-icon {
            width: 64px;
            height: 64px;
            border-radius: 16px;
            background: var(--card-bg, #fff7ed);
            color: var(--card-color, #ea580c);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.6rem;
            margin: 0 auto 1rem auto;
            transition: transform .35s ease;
        }

        .ticket-card:hover .tc-icon {
            transform: scale(1.08) rotate(-4deg);
        }

        .ticket-card h3 {
            font-weight: 700;
            color: #1c140d;
            margin-bottom: .55rem;
        }

        .ticket-card p {
            color: #6b7280;
            font-size: .88rem;
            line-height: 1.55;
        }

        .ticket-card.no-ticket {
            background: linear-gradient(135deg, #fef2f2 0%, #fff 100%);
            border-color: #fecaca;
        }

        .ticket-card.no-ticket::before {
            background: #ef4444;
        }

        .ticket-card.no-ticket .tc-icon {
            background: #fee2e2;
            color: #dc2626;
        }

        .badge-tag {
            position: absolute;
            top: 12px;
            right: 12px;
            font-size: .65rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: .04em;
            padding: .2rem .55rem;
            border-radius: 999px;
        }

        .badge-tag.ok {
            background: #dcfce7;
            color: #166534;
        }

        .badge-tag.no {
            background: #fee2e2;
            color: #991b1b;
        }

        /* ===== Aviso amber ===== */
        .tip-box {
            background: linear-gradient(135deg, #fffbeb 0%, #fef3c7 100%);
            border-left: 4px solid #f59e0b;
            border-radius: 12px;
            padding: 1rem 1.25rem;
            display: flex;
            gap: .85rem;
            align-items: flex-start;
        }

        .tip-box .tip-icon {
            width: 40px;
            height: 40px;
            border-radius: 10px;
            background: #fef3c7;
            color: #b45309;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.3rem;
            flex-shrink: 0;
        }

        /* ===== CTA principal ===== */
        .cta-button {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: .75rem;
            padding: .95rem 2rem;
            border-radius: 14px;
            background: linear-gradient(135deg, #f97316 0%, #ea580c 100%);
            color: #fff;
            font-weight: 700;
            font-size: 1.05rem;
            box-shadow: 0 10px 25px -8px rgba(249, 115, 22, .55);
            transition: all .3s ease;
            position: relative;
            overflow: hidden;
        }

        .cta-button::before {
            content: "";
            position: absolute;
            inset: 0;
            background: linear-gradient(135deg, #fb923c 0%, #f97316 100%);
            opacity: 0;
            transition: opacity .3s ease;
        }

        .cta-button>* {
            position: relative;
            z-index: 1;
        }

        .cta-button:hover {
            transform: translateY(-2px);
            box-shadow: 0 14px 32px -8px rgba(249, 115, 22, .65);
        }

        .cta-button:hover::before {
            opacity: 1;
        }

        /* ===== Sección "Próximamente" ===== */
        .panel-coming {
            position: relative;
            background: linear-gradient(135deg, #fafaf9 0%, #f5f5f4 100%);
            border: 1px dashed #d6d3d1;
            border-radius: 20px;
            padding: 1.75rem;
            overflow: hidden;
        }

        .coming-overlay {
            position: absolute;
            top: 16px;
            right: 16px;
            background: linear-gradient(135deg, #1c140d, #44403c);
            color: #fff;
            font-size: .7rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: .08em;
            padding: .4rem .85rem;
            border-radius: 999px;
            box-shadow: 0 4px 12px -2px rgba(0, 0, 0, .25);
            display: inline-flex;
            align-items: center;
            gap: .35rem;
            z-index: 5;
        }

        .panel-coming .panel-content {
            opacity: .55;
            pointer-events: none;
        }

        /* ===== FAQ acordeón visual ===== */
        .faq-item {
            background: #fff;
            border: 1px solid #f4ede7;
            border-radius: 14px;
            transition: all .25s ease;
        }

        .faq-item:hover {
            border-color: #fed7aa;
            box-shadow: 0 6px 16px -6px rgba(249, 115, 22, .18);
            transform: translateY(-2px);
        }

        .faq-item summary {
            cursor: pointer;
            list-style: none;
            padding: 1rem 1.15rem;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: .75rem;
            font-weight: 600;
            color: #1c140d;
        }

        .faq-item summary::-webkit-details-marker {
            display: none;
        }

        .faq-item summary .q-icon {
            width: 32px;
            height: 32px;
            border-radius: 50%;
            background: #fff7ed;
            color: #ea580c;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: .9rem;
            flex-shrink: 0;
        }

        .faq-item summary .chevron {
            transition: transform .25s ease;
            color: #9ca3af;
        }

        .faq-item[open] summary .chevron {
            transform: rotate(180deg);
            color: #ea580c;
        }

        .faq-item .faq-body {
            padding: 0 1.15rem 1.15rem 4rem;
            color: #6b7280;
            font-size: .9rem;
            line-height: 1.6;
        }

        /* ===== Animaciones ===== */
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

        @keyframes pulse-soft {

            0%,
            100% {
                box-shadow: 0 0 0 0 rgba(249, 115, 22, .4);
            }

            50% {
                box-shadow: 0 0 0 8px rgba(249, 115, 22, 0);
            }
        }

        .pulse-dot {
            animation: pulse-soft 2s infinite;
        }
    </style>
@endpush

@section('content')

    <!-- Breadcrumb -->
    <div class="bg-white border-b border-gray-200">
        <div class="container mx-auto px-4 py-3">
            <nav class="flex" aria-label="Breadcrumb">
                <ol class="inline-flex items-center space-x-1 md:space-x-3">
                    <li class="inline-flex items-center">
                        <a href="{{ route('bienvenido') }}"
                            class="inline-flex items-center text-sm text-gray-600 hover:text-orange-600 transition-colors">
                            <i class="fas fa-home mr-2"></i>
                            Home
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
                                class="ml-1 text-sm text-gray-600 hover:text-orange-600 md:ml-2 transition-colors">Ingenieria</a>
                        </div>
                    </li>
                    <li aria-current="page">
                        <div class="flex items-center">
                            <i class="fas fa-chevron-right text-gray-400 mx-2 text-xs"></i>
                            <span class="ml-1 text-sm text-orange-600 font-semibold md:ml-2">Soporte</span>
                        </div>
                    </li>
                </ol>
            </nav>
        </div>
    </div>

    <div class="container mx-auto px-4">

        <!-- HERO -->
        <div class="support-hero p-6 md:p-10 mt-8 mb-8 anim-up">
            <div class="flex flex-col md:flex-row md:items-center gap-6">
                <div class="hero-icon-lg shrink-0">
                    <i class="las la-headset"></i>
                </div>
                <div class="flex-1">
                    <div
                        class="flex items-center gap-2 text-xs font-semibold text-orange-600 uppercase tracking-wider mb-2">
                        <span class="w-2 h-2 bg-orange-500 rounded-full pulse-dot"></span>
                        Portal de Asistencia
                    </div>
                    <h1 class="text-3xl md:text-4xl font-extrabold text-gray-900 mb-2 tracking-tight leading-tight">
                        Soporte Técnico Corporativo
                    </h1>
                    <p class="text-gray-600 text-base md:text-lg">
                        Bienvenido al portal de asistencia técnica. Encuentra soluciones rápidas o solicita ayuda
                        especializada.
                    </p>
                </div>
            </div>

            <!-- Quick actions -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-3 mt-7">
                <a href="{{ route('ingenieria.guia-tickets') }}" class="quick-action">
                    <div class="qa-icon" style="background:#fff7ed; color:#ea580c;">
                        <i class="las la-ticket-alt"></i>
                    </div>
                    <div class="flex-1 min-w-0">
                        <div class="font-semibold text-gray-900 text-sm">Levantar un Ticket</div>
                        <div class="text-xs text-gray-500">Solicita asistencia técnica directa</div>
                    </div>
                    <i class="las la-arrow-right text-gray-300"></i>
                </a>
                <a href="#cuando-ticket" class="quick-action">
                    <div class="qa-icon" style="background:#dbeafe; color:#1d4ed8;">
                        <i class="las la-question-circle"></i>
                    </div>
                    <div class="flex-1 min-w-0">
                        <div class="font-semibold text-gray-900 text-sm">¿Cuándo levantar uno?</div>
                        <div class="text-xs text-gray-500">Categorías y criterios</div>
                    </div>
                    <i class="las la-arrow-right text-gray-300"></i>
                </a>
                <a href="#faq" class="quick-action">
                    <div class="qa-icon" style="background:#f3e8ff; color:#7e22ce;">
                        <i class="las la-comments"></i>
                    </div>
                    <div class="flex-1 min-w-0">
                        <div class="font-semibold text-gray-900 text-sm">Preguntas Frecuentes</div>
                        <div class="text-xs text-gray-500">Respuestas rápidas</div>
                    </div>
                    <i class="las la-arrow-right text-gray-300"></i>
                </a>
            </div>
        </div>

        <div class="space-y-8 mb-12">

            <!-- ============ Sección 1: ¿Qué debe tener un buen ticket? ============ -->
            <section class="panel anim-up">
                <div class="panel-header">
                    <div class="ph-icon" style="background:#fff7ed; color:#ea580c;">
                        <i class="las la-ticket-alt"></i>
                    </div>
                    <div>
                        <h2 class="text-xl md:text-2xl font-bold text-[#1c140d]">Levantar Tickets</h2>
                        <p class="text-[#9c7349] text-sm">Asistencia directa de nuestro equipo IT</p>
                    </div>
                </div>

                <div class="pillars-wrap">
                    <div class="text-center mb-8 relative z-10">
                        <span
                            class="inline-block bg-white border border-orange-200 text-orange-600 text-xs font-bold uppercase tracking-wider px-3 py-1 rounded-full mb-3">
                            <i class="las la-star mr-1"></i> Buenas prácticas
                        </span>
                        <h3 class="text-2xl md:text-3xl font-extrabold text-slate-900 mb-2">
                            ¿Qué debe tener un buen ticket?
                        </h3>
                        <p class="text-slate-600 italic">
                            Sigue estos tres pilares para una resolución en tiempo récord.
                        </p>
                    </div>

                    <div class="relative max-w-4xl mx-auto">
                        <div class="pillar-vline hidden md:block"></div>

                        <!-- Pilar 1 -->
                        <div class="pillar-row">
                            <div class="pillar-content text-center md:text-right">
                                <h4>Información del incidente</h4>
                                <p>Incluye un resumen claro, descripción detallada, tipo de incidente
                                    (hardware, software, red, etc.) y nivel de severidad.</p>
                            </div>
                            <div class="pillar-icon-wrap relative">
                                <div class="pillar-icon">
                                    <i class="las la-file-alt"></i>
                                    <span class="pillar-num">1</span>
                                </div>
                            </div>
                            <div></div>
                        </div>

                        <!-- Pilar 2 -->
                        <div class="pillar-row">
                            <div class="hidden md:block"></div>
                            <div class="pillar-icon-wrap relative">
                                <div class="pillar-icon">
                                    <i class="las la-map-marker-alt"></i>
                                    <span class="pillar-num">2</span>
                                </div>
                            </div>
                            <div class="pillar-content text-center md:text-left">
                                <h4>Datos del solicitante y ubicación</h4>
                                <p>Indica nombre, correo electrónico, departamento y ubicación exacta
                                    donde ocurre el incidente.</p>
                            </div>
                        </div>

                        <!-- Pilar 3 -->
                        <div class="pillar-row">
                            <div class="pillar-content text-center md:text-right">
                                <h4>Sistema afectado y evidencia</h4>
                                <p>Especifica equipo (nombre, IP, serial) o sistema involucrado y
                                    adjunta capturas, logs o fotografías del problema.</p>
                            </div>
                            <div class="pillar-icon-wrap relative">
                                <div class="pillar-icon">
                                    <i class="las la-laptop-medical"></i>
                                    <span class="pillar-num">3</span>
                                </div>
                            </div>
                            <div></div>
                        </div>
                    </div>
                </div>

                <div class="tip-box mt-6">
                    <div class="tip-icon">
                        <i class="las la-lightbulb"></i>
                    </div>
                    <div class="flex-1">
                        <p class="text-sm font-bold text-amber-900 mb-1">
                            Consejo para un mejor soporte
                        </p>
                        <p class="text-sm text-amber-800 mb-1">
                            Nuestro equipo de IT aún <span class="font-semibold">no tiene poderes de clarividencia</span>.
                            Describe tu incidente de forma
                            <span class="font-semibold">clara, detallada y con el mayor contexto posible</span>.
                        </p>
                        <p class="text-sm text-amber-800">
                            Esto nos ayudará a darte una <span class="font-semibold">solución más rápida y precisa</span>.
                        </p>
                    </div>
                </div>
            </section>

            <!-- ============ Sección 2: Cuándo levantar un ticket ============ -->
            <section class="panel anim-up" id="cuando-ticket">
                <div class="panel-header">
                    <div class="ph-icon" style="background:#dbeafe; color:#1d4ed8;">
                        <i class="las la-info-circle"></i>
                    </div>
                    <div>
                        <h2 class="text-xl md:text-2xl font-bold text-[#1c140d]">Cuándo levantar un ticket</h2>
                        <p class="text-[#9c7349] text-sm">Soporte que requiere intervención directa de nuestro equipo IT
                        </p>
                    </div>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-5 mb-7">
                    <!-- Card 1: Hardware -->
                    <div class="ticket-card" style="--card-color:#3b82f6; --card-bg:#dbeafe; --card-border:#bfdbfe;">
                        <span class="badge-tag ok"><i class="las la-check"></i> Sí</span>
                        <div class="tc-icon"><i class="las la-desktop"></i></div>
                        <h3>Fallo de Hardware</h3>
                        <p>Problemas con computadoras, impresoras, monitores o cualquier dispositivo que requiera
                            intervención física.</p>
                    </div>

                    <!-- Card 2: Software -->
                    <div class="ticket-card" style="--card-color:#8b5cf6; --card-bg:#f5f3ff; --card-border:#ddd6fe;">
                        <span class="badge-tag ok"><i class="las la-check"></i> Sí</span>
                        <div class="tc-icon"><i class="las la-cogs"></i></div>
                        <h3>Fallo de Software</h3>
                        <p>Errores en aplicaciones, bloqueos o comportamientos inesperados que requieren revisión de IT.</p>
                    </div>

                    <!-- Card 3: Correo -->
                    <div class="ticket-card" style="--card-color:#ec4899; --card-bg:#fdf2f8; --card-border:#fbcfe8;">
                        <span class="badge-tag ok"><i class="las la-check"></i> Sí</span>
                        <div class="tc-icon"><i class="las la-envelope"></i></div>
                        <h3>Problemas de Correo</h3>
                        <p>Emails que no se envían, reciben errores o cuentas bloqueadas; requieren soporte técnico.</p>
                    </div>

                    <!-- Card 4: Tiempo IT -->
                    <div class="ticket-card" style="--card-color:#10b981; --card-bg:#ecfdf5; --card-border:#a7f3d0;">
                        <span class="badge-tag ok"><i class="las la-check"></i> Sí</span>
                        <div class="tc-icon"><i class="las la-user-clock"></i></div>
                        <h3>Casos que requieren tiempo de IT</h3>
                        <p>Situaciones que requieren intervención directa y tiempo de un técnico para resolver.</p>
                    </div>

                    <!-- Card 5: Consultas simples -->
                    <div class="ticket-card no-ticket">
                        <span class="badge-tag no"><i class="las la-times"></i> No</span>
                        <div class="tc-icon"><i class="las la-comment-alt"></i></div>
                        <h3>Consultas simples</h3>
                        <p>Preguntas rápidas o aclaraciones que <strong>no requieren intervención técnica</strong>. Para
                            estos casos, no es necesario abrir un ticket.</p>
                    </div>

                    <!-- Card 6: Emergencias -->
                    <div class="ticket-card no-ticket">
                        <span class="badge-tag no"><i class="las la-exclamation-triangle"></i> Humor</span>
                        <div class="tc-icon"><i class="las la-grin-squint"></i></div>
                        <h3>Emergencias</h3>
                        <p>
                            <strong>¿Es una emergencia crítica?</strong> Presiona 0000+ hasta
                            que se te hinche el dedo, igual no se resuelve tu problema, pero se te olvida por el dolor.
                            ¡Sonríe!
                        </p>
                    </div>
                </div>

                <div class="flex justify-center">
                    <a href="{{ route('ingenieria.guia-tickets') }}" class="cta-button">
                        <i class="las la-graduation-cap text-2xl"></i>
                        Guía para levantar un Ticket
                        <i class="las la-arrow-right"></i>
                    </a>
                </div>
            </section>

            <!-- ============ Sección 3: Apoyo Técnico (Próximamente) ============ -->
            <section class="panel-coming anim-up">
                <span class="coming-overlay">
                    <i class="las la-tools"></i> Próximamente
                </span>
                <div class="panel-content">
                    <div class="panel-header">
                        <div class="ph-icon" style="background:#f3e8ff; color:#7e22ce;">
                            <i class="las la-book-open"></i>
                        </div>
                        <div>
                            <h2 class="text-xl md:text-2xl font-bold text-[#1c140d]">Apoyo Técnico</h2>
                            <p class="text-[#9c7349] text-sm">Guías de apoyo en la solución de problemas comunes</p>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5">
                        <a href="#" class="ticket-card" style="--card-color:#3b82f6; --card-bg:#dbeafe;">
                            <div class="tc-icon"><i class="las la-envelope-open-text"></i></div>
                            <h3>Configuración de Correo</h3>
                            <p>Guía paso a paso para configurar tu cuenta correctamente.</p>
                        </a>
                        <a href="#" class="ticket-card" style="--card-color:#10b981; --card-bg:#ecfdf5;">
                            <div class="tc-icon"><i class="las la-key"></i></div>
                            <h3>Acceso a VPN y Remoto</h3>
                            <p>Conéctate de forma segura desde cualquier ubicación.</p>
                        </a>
                        <a href="#" class="ticket-card" style="--card-color:#8b5cf6; --card-bg:#f5f3ff;">
                            <div class="tc-icon"><i class="las la-download"></i></div>
                            <h3>Instalación de Software</h3>
                            <p>Descarga e instala aplicaciones autorizadas.</p>
                        </a>
                        <a href="#" class="ticket-card" style="--card-color:#ec4899; --card-bg:#fdf2f8;">
                            <div class="tc-icon"><i class="las la-lock"></i></div>
                            <h3>Cambio de Contraseña</h3>
                            <p>Actualiza tu contraseña de manera segura.</p>
                        </a>
                    </div>
                </div>
            </section>

            <!-- ============ Sección 4: FAQ ============ -->
            <section class="anim-up" id="faq">
                <div class="flex items-center gap-3 mb-6">
                    <div
                        class="w-12 h-12 rounded-2xl bg-purple-100 text-purple-700 flex items-center justify-center text-xl">
                        <i class="las la-question-circle"></i>
                    </div>
                    <div>
                        <h3 class="text-2xl font-bold text-[#1c140d]">Preguntas Frecuentes</h3>
                        <p class="text-sm text-[#9c7349]">Respuestas rápidas a las dudas más comunes</p>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    <details class="faq-item" open>
                        <summary>
                            <span class="flex items-center gap-3">
                                <span class="q-icon"><i class="las la-network-wired"></i></span>
                                <span>¿Cómo reporto un fallo de red?</span>
                            </span>
                            <i class="las la-chevron-down chevron"></i>
                        </summary>
                        <div class="faq-body">
                            Primero verifica que el cable esté conectado, luego levanta un ticket en la
                            categoría <strong>'Infraestructura'</strong>.
                        </div>
                    </details>

                    <details class="faq-item">
                        <summary>
                            <span class="flex items-center gap-3">
                                <span class="q-icon"><i class="las la-laptop"></i></span>
                                <span>¿Dónde solicito equipo nuevo?</span>
                            </span>
                            <i class="las la-chevron-down chevron"></i>
                        </summary>
                        <div class="faq-body">
                            Las solicitudes de hardware requieren aprobación de tu jefe directo
                            vía <strong>portal administrativo</strong>.
                        </div>
                    </details>

                    <details class="faq-item">
                        <summary>
                            <span class="flex items-center gap-3">
                                <span class="q-icon"><i class="las la-folder-open"></i></span>
                                <span>Acceso a carpetas compartidas</span>
                            </span>
                            <i class="las la-chevron-down chevron"></i>
                        </summary>
                        <div class="faq-body">
                            Solicita permisos enviando el <strong>nombre de la carpeta</strong> y tu
                            <strong>ID de empleado</strong> en un ticket.
                        </div>
                    </details>
                </div>
            </section>

        </div>
    </div>
@endsection

@push('js')
    <script>
        // Smooth scroll para los anchors internos
        document.querySelectorAll('a[href^="#"]').forEach(link => {
            link.addEventListener('click', function(e) {
                const href = this.getAttribute('href');
                if (href.length > 1) {
                    const target = document.querySelector(href);
                    if (target) {
                        e.preventDefault();
                        const offset = 100;
                        const top = target.getBoundingClientRect().top + window.pageYOffset - offset;
                        window.scrollTo({
                            top,
                            behavior: 'smooth'
                        });
                    }
                }
            });
        });
    </script>
@endpush
