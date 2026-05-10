@extends('layouts.intranet')

@section('title', 'Intranet Corporativa')

@push('css')
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Line Awesome -->
    <link rel="stylesheet"
        href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <link href="/assets/css/intrahome.css" rel="stylesheet">

    <style>
        /* ====== HERO ====== */
        .ticket-hero {
            position: relative;
            background:
                radial-gradient(1000px 280px at 100% 0%, rgba(249, 115, 22, .12), transparent 60%),
                radial-gradient(700px 220px at 0% 100%, rgba(59, 130, 246, .07), transparent 60%),
                linear-gradient(135deg, #fff 0%, #fafafa 100%);
            border: 1px solid #e5e7eb;
            border-radius: 24px;
            overflow: hidden;
        }

        .ticket-hero::before {
            content: "";
            position: absolute;
            inset: 0 0 auto 0;
            height: 5px;
            background: linear-gradient(90deg, #f97316, #ec4899, #8b5cf6, #3b82f6);
        }

        .hero-badge {
            display: inline-flex;
            align-items: center;
            gap: .4rem;
            background: #fff7ed;
            color: #ea580c;
            font-size: .72rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: .08em;
            padding: .35rem .85rem;
            border-radius: 999px;
            border: 1px solid #fed7aa;
        }

        .policy-card {
            background: linear-gradient(135deg, #fff7ed 0%, #fff 100%);
            border: 1px solid #fed7aa;
            border-left: 4px solid #ea580c;
            border-radius: 14px;
            padding: 1.1rem 1.25rem;
            display: flex;
            gap: .85rem;
            align-items: flex-start;
        }

        .policy-card .pc-icon {
            width: 40px;
            height: 40px;
            border-radius: 10px;
            background: #ea580c;
            color: #fff;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.15rem;
            flex-shrink: 0;
        }

        /* ====== Botones ====== */
        .btn-primary-grad {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: .6rem;
            padding: .85rem 1.75rem;
            border-radius: 12px;
            background: linear-gradient(135deg, #f97316 0%, #ea580c 100%);
            color: #fff;
            font-weight: 700;
            box-shadow: 0 10px 22px -8px rgba(249, 115, 22, .55);
            transition: all .25s ease;
        }

        .btn-primary-grad:hover {
            transform: translateY(-2px);
            box-shadow: 0 14px 28px -8px rgba(249, 115, 22, .7);
        }

        .btn-secondary-out {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: .55rem;
            padding: .85rem 1.75rem;
            border-radius: 12px;
            background: #fff;
            color: #ea580c;
            font-weight: 700;
            border: 1.5px solid #fed7aa;
            transition: all .25s ease;
        }

        .btn-secondary-out:hover {
            background: #fff7ed;
            border-color: #f97316;
            transform: translateY(-2px);
        }

        /* ====== Sticky barra de pasos ====== */
        .steps-nav {
            position: sticky;
            top: 64px;
            z-index: 30;
            background: rgba(255, 255, 255, .85);
            backdrop-filter: blur(10px);
            border: 1px solid #e5e7eb;
            border-radius: 16px;
            padding: .75rem 1rem;
            box-shadow: 0 2px 6px rgba(0, 0, 0, .04);
        }

        .step-pill {
            display: inline-flex;
            align-items: center;
            gap: .4rem;
            padding: .35rem .75rem;
            border-radius: 999px;
            font-size: .75rem;
            font-weight: 700;
            background: #f3f4f6;
            color: #4b5563;
            transition: all .2s ease;
            white-space: nowrap;
        }

        .step-pill:hover {
            background: #fff7ed;
            color: #ea580c;
            transform: translateY(-1px);
        }

        .step-pill .num {
            width: 20px;
            height: 20px;
            border-radius: 50%;
            background: #ea580c;
            color: #fff;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            font-size: .7rem;
        }

        /* ====== Tarjeta de paso ====== */
        .step-card {
            position: relative;
            background: #fff;
            border: 1px solid #e5e7eb;
            border-radius: 18px;
            padding: 1.75rem;
            transition: all .3s ease;
        }

        .step-card:hover {
            box-shadow: 0 12px 28px -12px rgba(0, 0, 0, .15);
            transform: translateY(-2px);
        }

        .step-num-circle {
            position: absolute;
            top: -18px;
            left: 1.25rem;
            width: 44px;
            height: 44px;
            border-radius: 14px;
            background: linear-gradient(135deg, #f97316, #ea580c);
            color: #fff;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.05rem;
            font-weight: 800;
            box-shadow: 0 8px 18px -6px rgba(249, 115, 22, .55);
            border: 3px solid #fff;
        }

        .step-tag {
            display: inline-block;
            background: #fff7ed;
            color: #ea580c;
            font-size: .65rem;
            font-weight: 800;
            text-transform: uppercase;
            letter-spacing: .08em;
            padding: .25rem .7rem;
            border-radius: 999px;
            margin-bottom: .55rem;
        }

        .step-image-wrap {
            position: relative;
            border: 1px solid #e5e7eb;
            border-radius: 12px;
            overflow: hidden;
            background: #f8fafc;
            transition: all .3s ease;
        }

        .step-image-wrap:hover {
            box-shadow: 0 8px 20px -10px rgba(0, 0, 0, .2);
        }

        .step-image-wrap img {
            width: 100%;
            height: auto;
            display: block;
            cursor: zoom-in;
            transition: transform .3s ease;
        }

        .step-image-wrap:hover img {
            transform: scale(1.02);
        }

        .step-image-wrap::after {
            content: "\f00e";
            /* search-plus */
            font-family: "Font Awesome 6 Free";
            font-weight: 900;
            position: absolute;
            bottom: 10px;
            right: 10px;
            background: rgba(0, 0, 0, .55);
            color: #fff;
            width: 32px;
            height: 32px;
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: .85rem;
            opacity: 0;
            transition: opacity .25s ease;
        }

        .step-image-wrap:hover::after {
            opacity: 1;
        }

        .info-box {
            background: linear-gradient(135deg, #fff7ed 0%, #fffbeb 100%);
            border-left: 4px solid #f97316;
            border-radius: 12px;
            padding: 1rem 1.15rem;
        }

        .info-box h4 {
            font-size: .82rem;
            font-weight: 800;
            color: #9a3412;
            text-transform: uppercase;
            letter-spacing: .05em;
            margin-bottom: .55rem;
            display: flex;
            align-items: center;
            gap: .4rem;
        }

        .info-box ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .info-box ul>li {
            position: relative;
            padding-left: 1.4rem;
            color: #57534e;
            font-size: .9rem;
            line-height: 1.55;
            margin-bottom: .35rem;
        }

        .info-box ul>li::before {
            content: "";
            position: absolute;
            left: 4px;
            top: .55rem;
            width: 6px;
            height: 6px;
            border-radius: 50%;
            background: #f97316;
        }

        /* ====== Sección título ====== */
        .section-title-wrap {
            text-align: center;
            position: relative;
            padding: 1rem 0 2rem;
        }

        .section-title-wrap h2 {
            font-size: 2rem;
            font-weight: 800;
            color: #1c140d;
            letter-spacing: -.02em;
        }

        .section-title-wrap p {
            color: #6b7280;
            margin-top: .5rem;
            max-width: 650px;
            margin-inline: auto;
        }

        .section-divider {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: .5rem;
            margin-top: 1rem;
        }

        .section-divider .dot {
            width: 6px;
            height: 6px;
            border-radius: 50%;
            background: #fed7aa;
        }

        .section-divider .line {
            width: 60px;
            height: 2px;
            background: linear-gradient(90deg, transparent, #f97316, transparent);
        }

        /* ====== Acordeón ejemplos ====== */
        .ejemplo {
            background: #fff;
            border: 1px solid #e5e7eb;
            border-radius: 14px;
            transition: all .25s ease;
            overflow: hidden;
        }

        .ejemplo:hover {
            border-color: #fed7aa;
            box-shadow: 0 6px 18px -8px rgba(249, 115, 22, .2);
        }

        .ejemplo .accordion {
            cursor: pointer;
            width: 100%;
            background: #fff;
            border: 0;
            text-align: left;
            padding: 1.1rem 1.25rem;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: .85rem;
            font-weight: 700;
            color: #1c140d;
            font-size: 1rem;
        }

        .ejemplo .accordion .left {
            display: flex;
            align-items: center;
            gap: .85rem;
            flex: 1;
        }

        .ejemplo .accordion .ej-num {
            width: 36px;
            height: 36px;
            border-radius: 10px;
            background: linear-gradient(135deg, #fff7ed, #ffedd5);
            color: #ea580c;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 800;
            font-size: .9rem;
            flex-shrink: 0;
        }

        .ejemplo .accordion .icon {
            width: 32px;
            height: 32px;
            border-radius: 50%;
            background: #fff7ed;
            color: #ea580c;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.1rem;
            font-weight: 700;
            transition: transform .25s ease;
        }

        .ejemplo.open .accordion .icon {
            transform: rotate(45deg);
            background: #ea580c;
            color: #fff;
        }

        .ejemplo.open {
            border-color: #fed7aa;
        }

        .ejemplo .panel {
            padding: 0 1.25rem 1.25rem 5rem;
        }

        .ejemplo .panel .field {
            display: grid;
            grid-template-columns: 180px 1fr;
            gap: .75rem;
            padding: .55rem 0;
            border-bottom: 1px dashed #f3f4f6;
            font-size: .9rem;
        }

        .ejemplo .panel .field:last-child {
            border-bottom: 0;
        }

        .ejemplo .panel .field .label {
            color: #ea580c;
            font-weight: 700;
            display: flex;
            align-items: center;
            gap: .4rem;
        }

        .ejemplo .panel .field .value {
            color: #4b5563;
        }

        @media (max-width: 640px) {
            .ejemplo .panel {
                padding: 0 1.25rem 1.25rem;
            }

            .ejemplo .panel .field {
                grid-template-columns: 1fr;
                gap: .15rem;
            }
        }

        /* ====== Lightbox ====== */
        .lightbox {
            position: fixed;
            inset: 0;
            background: rgba(0, 0, 0, .85);
            display: none;
            align-items: center;
            justify-content: center;
            z-index: 9999;
            padding: 2rem;
        }

        .lightbox.active {
            display: flex;
        }

        .lightbox img {
            max-width: 95%;
            max-height: 90vh;
            border-radius: 12px;
            box-shadow: 0 20px 50px rgba(0, 0, 0, .5);
        }

        .lightbox-close {
            position: absolute;
            top: 20px;
            right: 20px;
            width: 44px;
            height: 44px;
            border-radius: 50%;
            background: rgba(255, 255, 255, .15);
            color: #fff;
            border: 0;
            font-size: 1.4rem;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all .2s ease;
        }

        .lightbox-close:hover {
            background: rgba(255, 255, 255, .3);
            transform: rotate(90deg);
        }

        /* ====== Animaciones ====== */
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
                                class="ml-1 text-sm text-gray-600 hover:text-orange-600 md:ml-2 transition-colors">Ingenieria</a>
                        </div>
                    </li>
                    <li>
                        <div class="flex items-center">
                            <i class="fas fa-chevron-right text-gray-400 mx-2 text-xs"></i>
                            <a href="{{ route('ingenieria.portal-soporte') }}"
                                class="ml-1 text-sm text-gray-600 hover:text-orange-600 md:ml-2 transition-colors">Soporte</a>
                        </div>
                    </li>
                    <li aria-current="page">
                        <div class="flex items-center">
                            <i class="fas fa-chevron-right text-gray-400 mx-2 text-xs"></i>
                            <span class="ml-1 text-sm text-orange-600 font-semibold md:ml-2">Tickets</span>
                        </div>
                    </li>
                </ol>
            </nav>
        </div>
    </div>

    <div class="container mx-auto px-4">

        <!-- Encabezado -->
        <header class="mt-8 mb-6 anim-up">
            <div class="flex items-center gap-2 text-sm text-orange-600 font-semibold mb-2">
                <i class="las la-ticket-alt"></i>
                <span class="uppercase tracking-wider text-xs">Mesa de Ayuda</span>
            </div>
            <h1 class="text-3xl md:text-4xl font-extrabold text-gray-900 mb-2 tracking-tight leading-tight">
                Tickets de Servicio
            </h1>
            <p class="text-gray-600 text-base md:text-lg">Guía de cómo levantar tu ticket de servicio.</p>
        </header>

        <!-- HERO: No Ticket, No Fix -->
        <section class="ticket-hero p-6 md:p-10 mb-8 anim-up">
            <div class="grid lg:grid-cols-2 gap-10 items-center">
                <div class="space-y-6">
                    <span class="hero-badge">
                        <span class="w-2 h-2 bg-orange-500 rounded-full pulse-dot"></span>
                        Reporte de Incidencias
                    </span>
                    <h2 class="text-3xl md:text-4xl font-extrabold text-gray-900 leading-tight">
                        No hay <span
                            class="bg-gradient-to-r from-orange-500 to-pink-500 bg-clip-text text-transparent">ticket</span>,
                        no hay <span
                            class="bg-gradient-to-r from-orange-500 to-pink-500 bg-clip-text text-transparent">fix</span>.
                    </h2>
                    <p class="text-gray-600 text-base md:text-lg leading-relaxed">
                        La formalización de cada incidente garantiza trazabilidad, cumplimiento de SLA y resolución
                        eficiente. Nuestro modelo está diseñado bajo estándares operativos empresariales.
                    </p>

                    <div class="policy-card">
                        <div class="pc-icon"><i class="las la-shield-alt"></i></div>
                        <div>
                            <p class="font-bold text-gray-900 mb-0.5">
                                Política Operativa: todo incidente debe registrarse vía ticket.
                            </p>
                            <p class="text-gray-600 text-sm">
                                Sin registro formal, no se activa el flujo de atención.
                            </p>
                        </div>
                    </div>

                    <div class="flex flex-wrap gap-3 pt-2">
                        <a href="https://netjernetworks.atlassian.net/servicedesk/customer/user/login?destination=portals"
                            target="_blank" class="btn-primary-grad">
                            <i class="las la-external-link-alt"></i>
                            Abrir Ticket
                        </a>
                        <a href="#guia-pasos" class="btn-secondary-out">
                            <i class="las la-list-ol"></i>
                            Ver Guía
                        </a>
                        <a href="#guia-ejemplos" class="btn-secondary-out">
                            <i class="las la-clipboard-list"></i>
                            Ver Ejemplos
                        </a>
                    </div>
                </div>

                <div class="relative">
                    <div
                        class="absolute -inset-4 bg-gradient-to-tr from-orange-200/40 via-pink-200/30 to-transparent rounded-3xl blur-xl">
                    </div>
                    <div class="relative bg-white rounded-2xl shadow-xl overflow-hidden border border-gray-100">
                        <img src="{{ asset('storage/media/no-ticket.png') }}" class="w-full h-full object-cover"
                            alt="No ticket, no fix">
                    </div>
                </div>
            </div>
        </section>

        <!-- ============ Guía de pasos ============ -->
        <div class="mb-8" id="guia-pasos">
            <div class="section-title-wrap">
                <span class="hero-badge mb-3"><i class="las la-route"></i> Paso a paso</span>
                <h2>Guía para levantar un Ticket</h2>
                <p>Sigue este flujo de trabajo estandarizado para informar problemas técnicos y garantizar una rápida
                    resolución por parte de nuestro departamento de TI.</p>
                <div class="section-divider">
                    <span class="dot"></span><span class="line"></span><span class="dot"></span>
                </div>
            </div>

            <!-- Sticky nav de pasos -->
            <div class="steps-nav mb-10 hidden md:block">
                <div class="flex items-center justify-between gap-3 flex-wrap">
                    <div class="flex items-center gap-2 text-xs font-bold text-gray-700 uppercase tracking-wider">
                        <i class="las la-stream text-orange-500"></i> Pasos del flujo
                    </div>
                    <div class="flex flex-wrap gap-2 justify-center">
                        <a href="#paso-1" class="step-pill"><span class="num">1</span> Portal</a>
                        <a href="#paso-2" class="step-pill"><span class="num">2</span> Acceso</a>
                        <a href="#paso-3" class="step-pill"><span class="num">3</span> Mesa de Ayuda</a>
                        <a href="#paso-4" class="step-pill"><span class="num">4</span> Tipo</a>
                        <a href="#paso-5" class="step-pill"><span class="num">5</span> Llenado</a>
                        <a href="#paso-6" class="step-pill"><span class="num">6</span> Generada</a>
                        <a href="#paso-7" class="step-pill"><span class="num">7</span> Seguimiento</a>
                    </div>
                </div>
            </div>

            <div class="grid lg:grid-cols-2 gap-7 mt-12">

                <!-- Paso 1 -->
                <section class="step-card anim-up" id="paso-1">
                    <div class="step-num-circle">01</div>
                    <div class="mb-4 mt-3">
                        <span class="step-tag">Paso 1</span>
                        <h3 class="text-xl font-bold text-gray-900">Accediendo al Portal</h3>
                    </div>
                    <p class="text-gray-700 leading-relaxed mb-4">
                        Acceder al portal de
                        <strong class="text-gray-900">Netjer Networks Jira</strong>.
                    </p>
                    <div class="step-image-wrap">
                        <img src="{{ asset('storage/media/portal-jira.png') }}" alt="Portal Netjer Networks Jira"
                            data-zoom>
                    </div>
                </section>

                <!-- Paso 2 -->
                <section class="step-card anim-up" id="paso-2">
                    <div class="step-num-circle">02</div>
                    <div class="mb-4 mt-3">
                        <span class="step-tag">Paso 2</span>
                        <h3 class="text-xl font-bold text-gray-900">Ingresando a Mesa de Ayuda</h3>
                    </div>
                    <p class="text-gray-700 leading-relaxed mb-4">
                        Ingresar tus datos de acceso
                        <strong class="text-gray-900">correo electrónico y contraseña</strong>.
                    </p>
                    <div class="step-image-wrap">
                        <img src="{{ asset('storage/media/identificarse.png') }}" alt="Identificarse" data-zoom>
                    </div>
                </section>

                <!-- Paso 3 -->
                <section class="step-card anim-up" id="paso-3">
                    <div class="step-num-circle">03</div>
                    <div class="mb-4 mt-3">
                        <span class="step-tag">Paso 3</span>
                        <h3 class="text-xl font-bold text-gray-900">Portal Mesa de Ayuda</h3>
                    </div>
                    <p class="text-gray-700 leading-relaxed mb-4">
                        Se mostrará el portal de Mesa de Ayuda; ubicar y seleccionar
                        <strong class="text-orange-600">Requerimientos Internos</strong>.
                    </p>
                    <div class="step-image-wrap">
                        <img src="{{ asset('storage/media/mesa-ayuda.png') }}" alt="Mesa de ayuda" data-zoom>
                    </div>
                </section>

                <!-- Paso 4 -->
                <section class="step-card anim-up" id="paso-4">
                    <div class="step-num-circle">04</div>
                    <div class="mb-4 mt-3">
                        <span class="step-tag">Paso 4</span>
                        <h3 class="text-xl font-bold text-gray-900">Tipo de Solicitud</h3>
                    </div>
                    <p class="text-gray-700 leading-relaxed mb-3">
                        Se mostrarán <strong class="text-orange-600">3</strong> tipos de solicitud:
                    </p>
                    <div class="info-box mb-4">
                        <h4><i class="las la-list"></i> Solicitudes</h4>
                        <ul>
                            <li><strong class="text-orange-600">Solicitud Interna para Netjer:</strong> se utiliza
                                cuando se desea dar de alta un servicio de un proyecto.</li>
                            <li><strong class="text-orange-600">Solicitud por Cliente:</strong> si la solicitud será
                                para proporcionar un servicio hacia un cliente.</li>
                            <li><strong class="text-orange-600">Incidentes Internos para Netjer:</strong> reportar un
                                incidente o soporte interno.</li>
                        </ul>
                    </div>
                    <p class="text-gray-700 leading-relaxed mb-4">
                        Seleccionar la opción 3 <strong class="text-orange-600">"Incidentes Internos Netjer"</strong>.
                    </p>
                    <div class="step-image-wrap">
                        <img src="{{ asset('storage/media/tipo-solicitud.png') }}" alt="Tipo de solicitud" data-zoom>
                    </div>
                </section>

                <!-- Paso 5 -->
                <section class="step-card anim-up" id="paso-5">
                    <div class="step-num-circle">05</div>
                    <div class="mb-4 mt-3">
                        <span class="step-tag">Paso 5</span>
                        <h3 class="text-xl font-bold text-gray-900">Llenado de la Solicitud</h3>
                    </div>
                    <p class="text-gray-700 leading-relaxed mb-2">
                        Ingresar los datos solicitados en el formulario.
                    </p>
                    <p class="text-gray-600 leading-relaxed mb-4">
                        Revisar los detalles e ingresar los datos solicitados, después dar clic en
                        <strong class="text-orange-600">"Enviar"</strong> para dar de alta la solicitud y ejecutar el
                        proceso de Ticket.
                    </p>
                    <div class="info-box mb-4">
                        <h4><i class="las la-exclamation-circle"></i> Tener en cuenta</h4>
                        <ul>
                            <li><strong class="text-orange-600">Los campos marcados con *:</strong> son obligatorios.</li>
                            <li><strong class="text-orange-600">Resumen:</strong> breve descripción y concisa del problema.
                            </li>
                            <li><strong class="text-orange-600">Descripción:</strong> información más detallada de la
                                problemática, serie del equipo, IP, etc.</li>
                        </ul>
                    </div>
                    <div class="step-image-wrap">
                        <img src="{{ asset('storage/media/llenar-solicitud.png') }}" alt="Llenar solicitud" data-zoom>
                    </div>
                </section>

                <!-- Paso 6 -->
                <section class="step-card anim-up" id="paso-6">
                    <div class="step-num-circle">06</div>
                    <div class="mb-4 mt-3">
                        <span class="step-tag">Paso 6</span>
                        <h3 class="text-xl font-bold text-gray-900">Solicitud Generada</h3>
                    </div>
                    <p class="text-gray-600 leading-relaxed mb-2">
                        Se mostrará el resumen de la solicitud generada con su código
                        <strong class="text-orange-600">RINN-12345</strong>.
                    </p>
                    <p class="text-gray-600 leading-relaxed mb-2">
                        Si se desea, se pueden agregar <strong class="text-orange-600">comentarios</strong> sobre la
                        solicitud.
                    </p>
                    <p class="text-gray-600 leading-relaxed mb-4">
                        De igual forma, una vez enviada la solicitud, llegará un
                        <strong class="text-orange-600">correo</strong> con la notificación de la misma.
                    </p>
                    <div class="step-image-wrap">
                        <img src="{{ asset('storage/media/solicitud-generada.png') }}" alt="Solicitud generada"
                            data-zoom>
                    </div>
                </section>

                <!-- Paso 7 -->
                <section class="step-card anim-up lg:col-span-2" id="paso-7">
                    <div class="step-num-circle">07</div>
                    <div class="mb-4 mt-3">
                        <span class="step-tag">Paso 7 · Final</span>
                        <h3 class="text-xl font-bold text-gray-900">Seguimiento de la Solicitud Generada</h3>
                    </div>
                    <div class="grid md:grid-cols-2 gap-6 items-start">
                        <div>
                            <p class="text-gray-600 leading-relaxed mb-3">
                                Una vez que se recibe la solicitud, el equipo de
                                <strong class="text-orange-600">Ingeniería</strong>
                                procederá con el apoyo y soporte solicitado.
                            </p>
                            <p class="text-gray-600 leading-relaxed mb-3">
                                En el apartado de <strong class="text-orange-600">Solicitudes</strong> se podrá dar
                                seguimiento, así como ver su <strong class="text-orange-600">estado y evolución</strong>.
                            </p>
                            <div class="info-box">
                                <h4><i class="las la-bell"></i> Notificaciones</h4>
                                <ul>
                                    <li>Recibirás actualizaciones por correo electrónico.</li>
                                    <li>Podrás comentar y adjuntar evidencia adicional.</li>
                                    <li>El estado se actualiza en tiempo real en el portal.</li>
                                </ul>
                            </div>
                        </div>
                        <div class="step-image-wrap">
                            <img src="{{ asset('storage/media/seguimiento-solicitud.png') }}" alt="Seguimiento"
                                data-zoom>
                        </div>
                    </div>
                </section>
            </div>
        </div>

        <!-- ============ Ejemplos ============ -->
        <section id="guia-ejemplos" class="mb-12 anim-up">
            <div class="section-title-wrap">
                <span class="hero-badge mb-3"><i class="las la-clipboard-list"></i> Ejemplos</span>
                <h2>Guía de Ejemplos de Tickets</h2>
                <p>Casos estructurados para una correcta apertura de incidentes.</p>
                <div class="section-divider">
                    <span class="dot"></span><span class="line"></span><span class="dot"></span>
                </div>
            </div>

            <div class="max-w-5xl mx-auto">
                <div
                    class="bg-gradient-to-r from-amber-50 to-yellow-50 border border-amber-200 rounded-xl p-4 mb-6 flex items-start gap-3">
                    <div class="w-9 h-9 bg-amber-500 text-white rounded-lg flex items-center justify-center flex-shrink-0">
                        <i class="las la-exclamation-triangle"></i>
                    </div>
                    <p class="text-sm text-amber-800">
                        <strong>Importante:</strong> Todos estos datos son necesarios para que el equipo de soporte
                        pueda atender tu solicitud sin demoras.
                    </p>
                </div>

                <div class="space-y-3">

                    <!-- EJEMPLO 1 -->
                    <div class="ejemplo">
                        <button class="accordion">
                            <span class="left">
                                <span class="ej-num">01</span>
                                <span>Creación de cuenta de correo y Zoom corporativo</span>
                            </span>
                            <span class="icon">+</span>
                        </button>
                        <div class="panel hidden">
                            <div class="field"><span class="label"><i class="las la-bookmark"></i> Resumen</span>
                                <span class="value">Solicitud de creación de cuenta de correo empresarial y cuenta de Zoom
                                    para nuevo ingreso.</span>
                            </div>
                            <div class="field"><span class="label"><i class="las la-user"></i> Nombre Usuario</span>
                                <span class="value">John Doe</span>
                            </div>
                            <div class="field"><span class="label"><i class="las la-envelope"></i> Correo
                                    electrónico</span>
                                <span class="value">john.doe@netjernetworks.com</span>
                            </div>
                            <div class="field"><span class="label"><i class="las la-building"></i> Departamento o
                                    área</span>
                                <span class="value">Ilusiones</span>
                            </div>
                            <div class="field"><span class="label"><i class="las la-tag"></i> Tipo de Incidente</span>
                                <span class="value">Correo</span>
                            </div>
                            <div class="field"><span class="label"><i class="las la-fire"></i> Severidad</span>
                                <span class="value"><span
                                        class="inline-flex items-center bg-red-100 text-red-700 text-xs font-bold px-2 py-0.5 rounded-full">Alta</span></span>
                            </div>
                            <div class="field"><span class="label"><i class="las la-align-left"></i> Descripción</span>
                                <span class="value">Se requiere la creación de una nueva cuenta de correo electrónico
                                    empresarial para un empleado recién ingresado, con acceso completo a las herramientas de
                                    comunicación internas. Además, se solicita la habilitación de una cuenta corporativa en
                                    Zoom vinculada al mismo correo, con permisos estándar de reuniones y autenticación en el
                                    dominio de la empresa.</span>
                            </div>
                        </div>
                    </div>

                    <!-- EJEMPLO 2 -->
                    <div class="ejemplo">
                        <button class="accordion">
                            <span class="left">
                                <span class="ej-num">02</span>
                                <span>Baja de cuenta y respaldo de información</span>
                            </span>
                            <span class="icon">+</span>
                        </button>
                        <div class="panel hidden">
                            <div class="field"><span class="label"><i class="las la-bookmark"></i> Resumen</span>
                                <span class="value">Solicitud de baja de cuenta de correo, redirección y respaldo de
                                    información.</span>
                            </div>
                            <div class="field"><span class="label"><i class="las la-user"></i> Nombre Usuario</span>
                                <span class="value">a Chuchita la Bolsearón</span>
                            </div>
                            <div class="field"><span class="label"><i class="las la-envelope"></i> Correo
                                    electrónico</span>
                                <span class="value">la.chuchita.triste@netjernetworks.com</span>
                            </div>
                            <div class="field"><span class="label"><i class="las la-building"></i> Departamento o
                                    área</span>
                                <span class="value">Entretenimiento</span>
                            </div>
                            <div class="field"><span class="label"><i class="las la-tag"></i> Tipo de Incidente</span>
                                <span class="value">Correo y Respaldo</span>
                            </div>
                            <div class="field"><span class="label"><i class="las la-fire"></i> Severidad</span>
                                <span class="value"><span
                                        class="inline-flex items-center bg-red-100 text-red-700 text-xs font-bold px-2 py-0.5 rounded-full">Alta</span></span>
                            </div>
                            <div class="field"><span class="label"><i class="las la-align-left"></i> Descripción</span>
                                <span class="value">Se requiere dar de baja la cuenta de correo de un empleado que ha
                                    dejado la organización. La solicitud incluye redireccionar los correos entrantes a la
                                    cuenta del jefe inmediato y realizar un respaldo completo de la información contenida en
                                    la bandeja de entrada, carpetas y archivos adjuntos, almacenándolos en el NAS de
                                    Administración para consulta futura.</span>
                            </div>
                        </div>
                    </div>

                    <!-- EJEMPLO 3 -->
                    <div class="ejemplo">
                        <button class="accordion">
                            <span class="left">
                                <span class="ej-num">03</span>
                                <span>Falla de componente en equipo de cómputo</span>
                            </span>
                            <span class="icon">+</span>
                        </button>
                        <div class="panel hidden">
                            <div class="field"><span class="label"><i class="las la-bookmark"></i> Resumen</span>
                                <span class="value">Reporte de falla en componente de equipo de cómputo.</span>
                            </div>
                            <div class="field"><span class="label"><i class="las la-user"></i> Nombre Usuario</span>
                                <span class="value">Juan Pérez</span>
                            </div>
                            <div class="field"><span class="label"><i class="las la-envelope"></i> Correo
                                    electrónico</span>
                                <span class="value">juan.perez@netjernetworks.com</span>
                            </div>
                            <div class="field"><span class="label"><i class="las la-building"></i> Departamento o
                                    área</span>
                                <span class="value">Inventos</span>
                            </div>
                            <div class="field"><span class="label"><i class="las la-tag"></i> Tipo de Incidente</span>
                                <span class="value">Cómputo</span>
                            </div>
                            <div class="field"><span class="label"><i class="las la-fire"></i> Severidad</span>
                                <span class="value"><span
                                        class="inline-flex items-center bg-amber-100 text-amber-700 text-xs font-bold px-2 py-0.5 rounded-full">Media</span></span>
                            </div>
                            <div class="field"><span class="label"><i class="las la-align-left"></i> Descripción</span>
                                <span class="value">Equipo asignado presenta fallas en el disco duro, con ruidos mecánicos
                                    y errores frecuentes al intentar acceder a archivos. El sistema operativo muestra
                                    mensajes de advertencia sobre sectores dañados. Se solicita revisión técnica,
                                    diagnóstico y reemplazo del componente defectuoso, así como respaldo de la información
                                    crítica antes de proceder con cualquier cambio.</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- CTA Final -->
        <section class="ticket-hero p-8 mb-12 anim-up">
            <div class="text-center">
                <span class="hero-badge mb-3"><i class="las la-rocket"></i> ¿Listo?</span>
                <h2 class="text-2xl md:text-3xl font-extrabold text-gray-900 mb-2">
                    Es hora de levantar tu ticket
                </h2>
                <p class="text-gray-600 mb-6 max-w-2xl mx-auto">
                    Sigue la guía y abre tu solicitud en el portal de Netjer Networks Jira.
                </p>
                <div class="flex flex-wrap justify-center gap-3">
                    <a href="https://netjernetworks.atlassian.net/servicedesk/customer/user/login?destination=portals"
                        target="_blank" class="btn-primary-grad">
                        <i class="las la-external-link-alt"></i>
                        Abrir Ticket
                    </a>
                    <a href="{{ route('ingenieria.portal-soporte') }}" class="btn-secondary-out">
                        <i class="las la-arrow-left"></i>
                        Regresar a Soporte
                    </a>
                </div>
            </div>
        </section>
    </div>

    <!-- Lightbox para imágenes -->
    <div class="lightbox" id="lightbox">
        <button class="lightbox-close" id="lightbox-close" aria-label="Cerrar">
            <i class="las la-times"></i>
        </button>
        <img id="lightbox-img" src="" alt="">
    </div>
@endsection

@push('js')
    <script>
        // Acordeón de ejemplos
        document.querySelectorAll(".ejemplo .accordion").forEach(button => {
            button.addEventListener("click", () => {
                const ejemplo = button.closest(".ejemplo");
                const panel = button.nextElementSibling;
                const isOpen = !panel.classList.contains("hidden");

                // Cerrar todos
                document.querySelectorAll(".ejemplo .panel").forEach(p => p.classList.add("hidden"));
                document.querySelectorAll(".ejemplo").forEach(e => e.classList.remove("open"));
                document.querySelectorAll(".ejemplo .icon").forEach(i => i.textContent = "+");

                if (!isOpen) {
                    panel.classList.remove("hidden");
                    ejemplo.classList.add("open");
                    button.querySelector(".icon").textContent = "+";
                }
            });
        });

        // Lightbox de imágenes
        const lightbox = document.getElementById('lightbox');
        const lightboxImg = document.getElementById('lightbox-img');
        const lightboxClose = document.getElementById('lightbox-close');
        document.querySelectorAll('img[data-zoom]').forEach(img => {
            img.addEventListener('click', () => {
                lightboxImg.src = img.src;
                lightbox.classList.add('active');
            });
        });
        lightboxClose.addEventListener('click', () => lightbox.classList.remove('active'));
        lightbox.addEventListener('click', (e) => {
            if (e.target === lightbox) lightbox.classList.remove('active');
        });
        document.addEventListener('keydown', (e) => {
            if (e.key === 'Escape') lightbox.classList.remove('active');
        });

        // Smooth scroll
        document.querySelectorAll('a[href^="#"]').forEach(link => {
            link.addEventListener('click', function(e) {
                const href = this.getAttribute('href');
                if (href.length > 1) {
                    const target = document.querySelector(href);
                    if (target) {
                        e.preventDefault();
                        const offset = 130;
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
