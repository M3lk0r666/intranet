@extends('layouts.intranet')

@section('title', 'Incidencias - Intranet Corporativa')

@push('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet"
        href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <link href="/assets/css/intrahome.css" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com?plugins=forms,typography,container-queries"></script>

    <style>
        /* ====================================================
               Clases prefijadas "inc-" para no chocar con globales
               ==================================================== */

        /* HERO simple estilo "Portal de Intranet" */
        .inc-hero {
            position: relative;
            background:
                radial-gradient(900px 240px at 95% -10%, rgba(249, 115, 22, .18), transparent 60%),
                radial-gradient(700px 200px at -5% 110%, rgba(236, 72, 153, .10), transparent 60%),
                linear-gradient(135deg, #ffffff 0%, #fff7ed 100%);
            border: 1px solid #fed7aa;
            border-radius: 22px;
            overflow: hidden;
            padding: 1.75rem 2rem;
        }

        .inc-hero::before {
            content: "";
            position: absolute;
            inset: 0 0 auto 0;
            height: 4px;
            background: linear-gradient(90deg, #3b82f6, #8b5cf6, #ec4899, #f59e0b, #f97316);
        }

        .inc-eyebrow {
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

        .inc-eyebrow .ic {
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

        .inc-title-grad {
            background: linear-gradient(135deg, #f97316 0%, #ec4899 50%, #8b5cf6 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        /* ====================================================
               Encabezado de sección
               ==================================================== */
        .inc-section-head {
            display: flex;
            align-items: flex-start;
            gap: 1rem;
            margin-bottom: 1.25rem;
        }

        .inc-section-head .accent {
            width: 4px;
            min-height: 40px;
            border-radius: 999px;
            background: linear-gradient(to bottom, #f97316, #ec4899);
            margin-top: 4px;
            flex-shrink: 0;
        }

        .inc-section-head h2 {
            font-size: 1.4rem;
            font-weight: 800;
            color: #0f172a;
            letter-spacing: -.02em;
            line-height: 1.15;
        }

        .inc-section-head .subtitle {
            color: #64748b;
            font-size: .88rem;
            margin-top: .25rem;
        }

        /* ====================================================
               Tarjeta lateral (Objetivo / CTA)
               ==================================================== */
        .inc-side-card {
            background: #fff;
            border: 1px solid #e5e7eb;
            border-radius: 18px;
            overflow: hidden;
            transition: all .3s ease;
        }

        .inc-side-card:hover {
            box-shadow: 0 14px 30px -14px rgba(0, 0, 0, .12);
            border-color: #fed7aa;
        }

        .inc-side-card .head {
            background: linear-gradient(135deg, #fff7ed, #ffedd5);
            border-bottom: 1px solid #fed7aa;
            padding: 1.15rem 1.25rem;
            display: flex;
            align-items: center;
            gap: .85rem;
        }

        .inc-side-card .head .ic {
            width: 40px;
            height: 40px;
            border-radius: 12px;
            background: linear-gradient(135deg, #f97316, #ea580c);
            color: #fff;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.15rem;
            box-shadow: 0 6px 14px -4px rgba(249, 115, 22, .45);
            flex-shrink: 0;
        }

        .inc-side-card .head h3 {
            font-size: 1.05rem;
            font-weight: 800;
            color: #c2410c;
        }

        .inc-side-card .body {
            padding: 1.25rem;
        }

        .inc-side-card .body p {
            color: #475569;
            line-height: 1.6;
            font-size: .9rem;
        }

        .inc-callout {
            margin-top: 1rem;
            background: #fff7ed;
            border: 1px solid #fed7aa;
            border-left: 4px solid #f97316;
            border-radius: 12px;
            padding: .85rem 1rem;
        }

        .inc-callout-title {
            display: inline-flex;
            align-items: center;
            gap: .4rem;
            font-size: .8rem;
            font-weight: 800;
            color: #c2410c;
        }

        .inc-callout p {
            font-size: .78rem;
            color: #92400e;
            margin-top: .35rem;
            line-height: 1.5;
        }

        /* CTA */
        .inc-cta {
            background: linear-gradient(135deg, #fff 0%, #fff7ed 100%);
            border: 2px solid #fed7aa;
            border-radius: 18px;
            padding: 1.5rem;
            text-align: center;
            position: relative;
            overflow: hidden;
        }

        .inc-cta::before {
            content: "";
            position: absolute;
            top: -50px;
            right: -50px;
            width: 180px;
            height: 180px;
            background: radial-gradient(circle, rgba(249, 115, 22, .18), transparent 70%);
            border-radius: 50%;
            pointer-events: none;
        }

        .inc-cta>* {
            position: relative;
        }

        .inc-cta-icon {
            width: 56px;
            height: 56px;
            border-radius: 16px;
            background: linear-gradient(135deg, #f97316, #ea580c);
            color: #fff;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
            margin: 0 auto 1rem;
            box-shadow: 0 10px 22px -6px rgba(249, 115, 22, .45);
        }

        .inc-cta-btn {
            display: inline-flex;
            align-items: center;
            gap: .55rem;
            background: linear-gradient(135deg, #f97316, #ea580c);
            color: #fff;
            font-weight: 800;
            font-size: .9rem;
            padding: .8rem 1.5rem;
            border-radius: 12px;
            box-shadow: 0 10px 22px -4px rgba(249, 115, 22, .5);
            transition: all .25s ease;
        }

        .inc-cta-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 14px 28px -4px rgba(249, 115, 22, .6);
        }

        /* ====================================================
               Header arrow del bloque "Tipo de Incidencia"
               ==================================================== */
        .inc-arrow-header {
            position: relative;
            display: inline-flex;
            align-items: center;
            gap: .85rem;
            background: linear-gradient(135deg, #ea580c, #c2410c);
            color: #fff;
            padding: .9rem 2.5rem .9rem 1.5rem;
            border-radius: 12px 0 0 12px;
            box-shadow: 0 10px 22px -6px rgba(249, 115, 22, .4);
        }

        .inc-arrow-header::after {
            content: "";
            position: absolute;
            right: -22px;
            top: 0;
            bottom: 0;
            width: 0;
            height: 0;
            border-top: 26px solid transparent;
            border-bottom: 26px solid transparent;
            border-left: 22px solid #c2410c;
        }

        .inc-arrow-header .ic {
            width: 36px;
            height: 36px;
            border-radius: 10px;
            background: rgba(255, 255, 255, .18);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.1rem;
            flex-shrink: 0;
        }

        /* ====================================================
               Tarjetas de tipos de incidencia
               ==================================================== */
        .inc-type-card {
            background: #fff;
            border: 1px solid #e5e7eb;
            border-radius: 16px;
            overflow: hidden;
            transition: all .3s cubic-bezier(.2, .7, .2, 1);
            display: flex;
            flex-direction: column;
        }

        .inc-type-card:hover {
            transform: translateY(-3px);
            box-shadow: 0 18px 36px -16px rgba(0, 0, 0, .18);
            border-color: var(--c-color, #fb923c);
        }

        .inc-type-card .head {
            display: flex;
            align-items: center;
            gap: .85rem;
            padding: 1rem 1.25rem;
            background: var(--c-bg, #fff7ed);
            border-bottom: 1px solid var(--c-border, #fed7aa);
        }

        .inc-type-card .head .ic {
            width: 38px;
            height: 38px;
            border-radius: 10px;
            background: var(--c-color, #ea580c);
            color: #fff;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.1rem;
            flex-shrink: 0;
        }

        .inc-type-card .head h3 {
            font-size: 1rem;
            font-weight: 800;
            color: var(--c-color, #c2410c);
        }

        .inc-type-card .body {
            padding: 1.25rem 1.4rem;
            flex: 1;
        }

        /* Lista numerada estilizada */
        .inc-steps {
            list-style: none;
            counter-reset: incstep;
            padding: 0;
            margin: 0;
        }

        .inc-steps>li {
            counter-increment: incstep;
            position: relative;
            padding-left: 2rem;
            margin-bottom: .65rem;
            color: #475569;
            font-size: .85rem;
            line-height: 1.55;
        }

        .inc-steps>li::before {
            content: counter(incstep);
            position: absolute;
            left: 0;
            top: .05rem;
            width: 22px;
            height: 22px;
            border-radius: 50%;
            background: var(--c-bg, #fff7ed);
            color: var(--c-color, #ea580c);
            font-size: .7rem;
            font-weight: 800;
            display: flex;
            align-items: center;
            justify-content: center;
            border: 1.5px solid var(--c-border, #fed7aa);
        }

        .inc-steps strong {
            color: var(--c-color, #c2410c);
            font-weight: 700;
        }

        .inc-checklist {
            list-style: none;
            padding: .35rem 0 0 0;
            margin: 0;
        }

        .inc-checklist>li {
            position: relative;
            padding-left: 1.4rem;
            margin-top: .3rem;
            font-size: .8rem;
            color: #475569;
            line-height: 1.5;
        }

        .inc-checklist>li::before {
            content: "\f00c";
            font-family: "Font Awesome 6 Free";
            font-weight: 900;
            position: absolute;
            left: 0;
            top: .15rem;
            color: var(--c-color, #16a34a);
            font-size: .7rem;
        }

        .inc-subnote {
            background: var(--c-bg, #fff7ed);
            border: 1px solid var(--c-border, #fed7aa);
            border-radius: 10px;
            padding: .75rem .9rem;
            margin: .5rem 0 .5rem 1.5rem;
        }

        .inc-subnote h5 {
            font-size: .75rem;
            font-weight: 800;
            color: var(--c-color, #c2410c);
            margin-bottom: .25rem;
        }

        .inc-info-box {
            margin-top: 1rem;
            padding: 1rem 1.15rem;
            background: linear-gradient(135deg, #eff6ff, #dbeafe);
            border: 1px solid #bfdbfe;
            border-left: 4px solid #3b82f6;
            border-radius: 12px;
        }

        .inc-info-box h4 {
            font-weight: 800;
            color: #1e40af;
            display: flex;
            align-items: center;
            gap: .4rem;
            font-size: .85rem;
            margin-bottom: .35rem;
        }

        .inc-info-box p {
            font-size: .82rem;
            color: #1e3a8a;
            line-height: 1.55;
        }

        /* Animaciones */
        @keyframes inc-fadeUp {
            from {
                opacity: 0;
                transform: translateY(10px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .inc-anim-up {
            animation: inc-fadeUp .5s cubic-bezier(.2, .7, .2, 1) both;
        }

        .inc-type-card {
            animation: inc-fadeUp .5s cubic-bezier(.2, .7, .2, 1) both;
        }

        .inc-type-card:nth-child(1) {
            animation-delay: .04s;
        }

        .inc-type-card:nth-child(2) {
            animation-delay: .08s;
        }

        .inc-type-card:nth-child(3) {
            animation-delay: .12s;
        }

        .inc-type-card:nth-child(4) {
            animation-delay: .16s;
        }

        .inc-type-card:nth-child(5) {
            animation-delay: .20s;
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
                            <a href="{{ route('procesos-empresariales') }}"
                                class="ml-1 text-sm text-gray-600 hover:text-orange-600 md:ml-2 transition-colors">Procesos
                                Empresariales</a>
                        </div>
                    </li>
                    <li>
                        <div class="flex items-center">
                            <i class="fas fa-chevron-right text-gray-400 mx-2 text-xs"></i>
                            <a href="{{ route('estructurainterna.admnistracion') }}"
                                class="ml-1 text-sm text-gray-600 hover:text-orange-600 md:ml-2 transition-colors">Administración</a>
                        </div>
                    </li>
                    <li aria-current="page">
                        <div class="flex items-center">
                            <i class="fas fa-chevron-right text-gray-400 mx-2 text-xs"></i>
                            <span class="ml-1 text-sm text-orange-600 font-semibold md:ml-2">RH · Incidencias</span>
                        </div>
                    </li>
                </ol>
            </nav>
        </div>
    </div>

    <div class="container mx-auto px-4 py-8">

        {{-- ============================================
             HERO SIMPLE estilo "Portal de Intranet"
             ============================================ --}}
        <section class="inc-hero mb-10 inc-anim-up">
            <span class="inc-eyebrow mb-4">
                <span class="ic"><i class="las la-clipboard-list"></i></span>
                Recursos Humanos
            </span>
            <h1 class="text-3xl md:text-5xl font-extrabold text-gray-900 tracking-tight leading-[1.05] mt-1">
                Proceso Ingreso
                <span class="inc-title-grad">Incidencias Nómina</span>
            </h1>
            <p class="text-gray-600 mt-3 text-base md:text-lg max-w-3xl leading-relaxed">
                Documentación formal, clara y oportuna de cualquier situación que afecte el desempeño laboral,
                la operación o el cumplimiento de normas internas, con el fin de aplicar acciones correctivas
                y prevenir recurrencias.
            </p>
        </section>

        {{-- ============================================
             LAYOUT PRINCIPAL: Sidebar + Contenido
             ============================================ --}}
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-7">

            {{-- ============ COLUMNA IZQUIERDA ============ --}}
            <aside class="lg:col-span-4 space-y-5">

                {{-- Objetivo --}}
                <div class="inc-side-card inc-anim-up">
                    <div class="head">
                        <div class="ic"><i class="las la-bullseye"></i></div>
                        <h3>Objetivo del Proceso</h3>
                    </div>
                    <div class="body">
                        <p class="text-justify">
                            Registrar las incidencias que deriven en la ausencia del colaborador.
                            Existen diferentes tipos de incidencias, las cuales se detallan a continuación
                            para saber qué campos son requeridos al momento de capturar la información.
                        </p>
                        <div class="inc-callout">
                            <span class="inc-callout-title">
                                <i class="las la-check-circle"></i> Cumplimiento Obligatorio
                            </span>
                            <p>
                                Este proceso debe completarse antes de las fechas de corte de nómina quincenal.
                            </p>
                        </div>
                    </div>
                </div>

                {{-- CTA Levantar incidencia --}}
                <div class="inc-cta inc-anim-up">
                    <div class="inc-cta-icon">
                        <i class="las la-qrcode"></i>
                    </div>
                    <h3 class="text-lg font-extrabold text-gray-900 mb-1.5">Levantamiento de Incidencia</h3>
                    <p class="text-sm text-gray-600 leading-relaxed mb-5">
                        Habrá pósters en la oficina con el código QR para registrar incidencias rápidamente
                        desde tu dispositivo móvil. También puedes ingresar directamente desde el botón.
                    </p>
                    <a href="https://netjernetworksproduccion.odoo.com/vacaciones-rh" target="_blank" class="inc-cta-btn">
                        <i class="las la-external-link-alt"></i>
                        Levantar Incidencia
                    </a>
                </div>
            </aside>

            {{-- ============ COLUMNA DERECHA ============ --}}
            <div class="lg:col-span-8">

                {{-- Header con flecha --}}
                <div class="mb-6">
                    <div class="inc-arrow-header">
                        <div class="ic"><i class="las la-clipboard-check"></i></div>
                        <span class="text-base md:text-lg font-extrabold uppercase tracking-wider">
                            Tipo de Incidencia · Nómina
                        </span>
                    </div>
                </div>

                {{-- Tarjetas de tipos --}}
                <div class="grid grid-cols-1 md:grid-cols-2 gap-5">

                    {{-- ===== Vacaciones / Incapacidad ===== --}}
                    <div class="inc-type-card" style="--c-color:#3b82f6; --c-bg:#dbeafe; --c-border:#bfdbfe;">
                        <div class="head">
                            <div class="ic"><i class="las la-umbrella-beach"></i></div>
                            <h3>Vacaciones / Incapacidad</h3>
                        </div>
                        <div class="body">
                            <ol class="inc-steps">
                                <li>Informar al <strong>Jefe Inmediato</strong> las fechas que se están solicitando.</li>
                                <li>Una vez avisado y autorizado, ingresar a registrar la información usando el código QR.
                                </li>
                                <li>Seleccionar <strong>su nombre</strong>.</li>
                                <li>Seleccionar la opción <strong>Vacaciones</strong> o <strong>Incapacidad</strong>.</li>
                                <li>Ingresar <strong>Fecha Inicio y Fecha Fin</strong> (si es solo un día, usar la misma
                                    fecha en ambos campos).</li>
                                <li>En caso de <strong>Vacaciones</strong>, ingresar el periodo en el cual se descontarán
                                    los días solicitados.</li>
                                <li><strong>Comentarios:</strong> apuntes opcionales (ej. disponibilidad en caso de
                                    urgencia).</li>
                                <li><strong>Documentos:</strong> adjuntar si se requiere.</li>
                                <li><strong>Documento Incapacidad:</strong> ingresar el justificante del periodo de
                                    incapacidad.</li>
                                <li><strong>Horario Evento:</strong> No aplica.</li>
                                <li>Oprimir el botón <strong>Enviar</strong>.</li>
                            </ol>
                        </div>
                    </div>

                    {{-- ===== Home Office ===== --}}
                    <div class="inc-type-card" style="--c-color:#10b981; --c-bg:#dcfce7; --c-border:#bbf7d0;">
                        <div class="head">
                            <div class="ic"><i class="las la-home"></i></div>
                            <h3>Home Office</h3>
                        </div>
                        <div class="body">
                            <ol class="inc-steps">
                                <li>
                                    Informar al <strong>Jefe Inmediato</strong> las fechas solicitadas garantizando:
                                    <ul class="inc-checklist">
                                        <li>Continuidad operativa.</li>
                                        <li>Cumplimiento de metas e indicadores del área.</li>
                                        <li>Jornada laboral 09:00 a 18:00 hrs (descanso 14:00 a 15:00 hrs).</li>
                                        <li>No solicitar Home Office en lunes o viernes.</li>
                                    </ul>
                                </li>
                                <li>Una vez avisado y autorizado, registrar la información usando el código QR.</li>
                                <li>Seleccionar <strong>su nombre</strong>.</li>
                                <li>Seleccionar la opción <strong>Home Office</strong>.</li>
                                <li>Ingresar <strong>Fecha Inicio y Fecha Fin</strong>.</li>
                                <li><strong>Comentarios:</strong> indicar la persona que autorizó.</li>
                                <li><strong>Documentos:</strong> No aplica.</li>
                                <li><strong>Documento Incapacidad:</strong> No aplica.</li>
                                <li><strong>Horario Evento:</strong> No aplica (jornada normal).</li>
                                <li>Oprimir el botón <strong>Enviar</strong>.</li>
                            </ol>

                            <div class="inc-info-box">
                                <h4><i class="las la-info-circle"></i> Notas sobre Home Office</h4>
                                <p>
                                    La modalidad Home Office está sujeta a la aprobación de la Gerencia según el desempeño
                                    y tipo de posición. Es indispensable contar con las herramientas tecnológicas
                                    necesarias y conexión estable para garantizar la continuidad operativa.
                                </p>
                            </div>
                        </div>
                    </div>

                    {{-- ===== Trabajo On Site ===== --}}
                    <div class="inc-type-card" style="--c-color:#8b5cf6; --c-bg:#f5f3ff; --c-border:#ddd6fe;">
                        <div class="head">
                            <div class="ic"><i class="las la-building"></i></div>
                            <h3>Trabajo On Site</h3>
                        </div>
                        <div class="body">
                            <ol class="inc-steps">
                                <li>
                                    Se planeará cuando se realice:
                                    <div class="inc-subnote">
                                        <h5>1. Visita a un Cliente</h5>
                                        <ul class="inc-checklist">
                                            <li>Levantamiento de información.</li>
                                            <li>Presentación de soluciones.</li>
                                        </ul>
                                    </div>
                                    <div class="inc-subnote">
                                        <h5>2. Actividad en instalaciones del cliente</h5>
                                        <ul class="inc-checklist">
                                            <li>Instalación.</li>
                                            <li>Curso.</li>
                                            <li>Ventana de mantenimiento.</li>
                                            <li>POC.</li>
                                            <li>Site Survey.</li>
                                        </ul>
                                    </div>
                                </li>
                                <li>Seleccionar <strong>su nombre</strong>.</li>
                                <li>Seleccionar la opción <strong>Trabajo On Site</strong>.</li>
                                <li>Ingresar <strong>Fecha Inicio y Fecha Fin</strong>.</li>
                                <li><strong>Periodo:</strong> No aplica.</li>
                                <li>
                                    <strong>Comentarios:</strong> indicar razón de la visita-actividad,
                                    persona que autoriza, cliente y si al término regresa a la oficina.
                                </li>
                                <li><strong>Documentos:</strong> adjuntar si se requiere.</li>
                                <li><strong>Documento Incapacidad:</strong> No aplica.</li>
                                <li><strong>Horario Evento:</strong> indicar el horario en sitio.</li>
                                <li>Oprimir el botón <strong>Enviar</strong>.</li>
                            </ol>
                        </div>
                    </div>

                    {{-- ===== Permiso ===== --}}
                    <div class="inc-type-card" style="--c-color:#f59e0b; --c-bg:#fef3c7; --c-border:#fde68a;">
                        <div class="head">
                            <div class="ic"><i class="las la-user-clock"></i></div>
                            <h3>Permiso</h3>
                        </div>
                        <div class="body">
                            <ol class="inc-steps">
                                <li>
                                    Se usará cuando se solicite un permiso de carácter personal al Jefe Inmediato:
                                    <div class="inc-subnote">
                                        <ul class="inc-checklist">
                                            <li>Llegada posterior a la hora de entrada.</li>
                                            <li>Salida-Entrada durante el horario laboral.</li>
                                            <li>Salida antes del horario de salida.</li>
                                        </ul>
                                    </div>
                                </li>
                                <li>Seleccionar <strong>su nombre</strong>.</li>
                                <li>Seleccionar la opción <strong>Permiso</strong>.</li>
                                <li>Ingresar <strong>Fecha Inicio y Fecha Fin</strong>.</li>
                                <li><strong>Periodo:</strong> No aplica.</li>
                                <li><strong>Comentarios:</strong> indicar razón del permiso y persona que autoriza.</li>
                                <li><strong>Documentos:</strong> adjuntar si se requiere.</li>
                                <li><strong>Documento Incapacidad:</strong> No aplica.</li>
                                <li><strong>Horario Evento:</strong> indicar el horario solicitado.</li>
                                <li>Oprimir el botón <strong>Enviar</strong>.</li>
                            </ol>
                        </div>
                    </div>

                    {{-- ===== Otros ===== --}}
                    <div class="inc-type-card md:col-span-2"
                        style="--c-color:#ec4899; --c-bg:#fdf2f8; --c-border:#fbcfe8;">
                        <div class="head">
                            <div class="ic"><i class="las la-calendar-day"></i></div>
                            <h3>Otros</h3>
                        </div>
                        <div class="body">
                            <ol class="inc-steps">
                                <li>
                                    Se usará cuando se realice una actividad que implique no asistir a la oficina
                                    o llegar después del horario de entrada:
                                    <div class="inc-subnote">
                                        <ul class="inc-checklist">
                                            <li>Eventos con cliente.</li>
                                            <li>Expos.</li>
                                            <li>Conferencias.</li>
                                        </ul>
                                    </div>
                                </li>
                                <li>Seleccionar <strong>su nombre</strong>.</li>
                                <li>Seleccionar la opción <strong>Otros</strong>.</li>
                                <li>Ingresar <strong>Fecha Inicio y Fecha Fin</strong>.</li>
                                <li><strong>Periodo:</strong> No aplica.</li>
                                <li>
                                    <strong>Comentarios:</strong> indicar razón de la actividad,
                                    persona que autoriza, actividad a realizar y si al término regresa a la oficina.
                                </li>
                                <li><strong>Documentos:</strong> adjuntar si se requiere.</li>
                                <li><strong>Documento Incapacidad:</strong> No aplica.</li>
                                <li><strong>Horario Evento:</strong> indicar el horario fuera de la oficina.</li>
                                <li>Oprimir el botón <strong>Enviar</strong>.</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
