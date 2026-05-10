@extends('layouts.intranet')

@section('title', 'Intranet Corporativa')

@push('css')
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Line Awesome -->
    <link rel="stylesheet"
        href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <link href="/assets/css/intrahome.css" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com?plugins=forms,typography,container-queries"></script>

    <style>
        /* ===== HERO ===== */
        .ing-hero {
            position: relative;
            background:
                radial-gradient(900px 260px at 100% 0%, rgba(249, 115, 22, .10), transparent 60%),
                radial-gradient(700px 200px at 0% 100%, rgba(59, 130, 246, .07), transparent 60%),
                linear-gradient(135deg, #fff 0%, #fafafa 100%);
            border: 1px solid #e5e7eb;
            border-radius: 22px;
            overflow: hidden;
        }

        .ing-hero::before {
            content: "";
            position: absolute;
            inset: 0 0 auto 0;
            height: 5px;
            background: linear-gradient(90deg, #f97316, #ec4899, #8b5cf6, #3b82f6, #10b981);
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
        }

        /* ===== Stats rápidos ===== */
        .stat-mini {
            display: flex;
            align-items: center;
            gap: .65rem;
            background: #fff;
            border: 1px solid #e5e7eb;
            padding: .7rem .9rem;
            border-radius: 12px;
            transition: all .25s ease;
        }

        .stat-mini:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 16px -6px rgba(249, 115, 22, .18);
            border-color: #fed7aa;
        }

        .stat-mini .ic {
            width: 36px;
            height: 36px;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1rem;
        }

        /* ===== Sección con título icónico ===== */
        .section-block {
            background: #fff;
            border: 1px solid #f1f5f9;
            border-radius: 20px;
            padding: 1.75rem;
            box-shadow: 0 1px 2px rgba(0, 0, 0, .02);
        }

        .section-head {
            display: flex;
            align-items: center;
            gap: 1rem;
            padding-bottom: 1rem;
            margin-bottom: 1.5rem;
            border-bottom: 1px solid #f3f4f6;
        }

        .section-head .ic {
            width: 48px;
            height: 48px;
            border-radius: 14px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.4rem;
            flex-shrink: 0;
        }

        .section-head .right-meta {
            margin-left: auto;
            font-size: .75rem;
            color: #64748b;
            display: inline-flex;
            align-items: center;
            gap: .35rem;
            background: #f8fafc;
            padding: .35rem .85rem;
            border-radius: 999px;
        }

        /* ===== Tarjetas categoría ===== */
        .cat-card {
            position: relative;
            background: #fff;
            border: 1px solid #e5e7eb;
            border-radius: 18px;
            overflow: hidden;
            transition: all .35s cubic-bezier(.2, .7, .2, 1);
            display: flex;
            flex-direction: column;
        }

        .cat-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 22px 40px -22px rgba(0, 0, 0, .25);
            border-color: var(--cat-color, #fb923c);
        }

        .cat-card .img-wrap {
            position: relative;
            height: 200px;
            overflow: hidden;
            background: var(--cat-bg, linear-gradient(135deg, #fff7ed, #ffedd5));
        }

        .cat-card .img-wrap img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform .55s ease;
        }

        .cat-card:hover .img-wrap img {
            transform: scale(1.07);
        }

        /* Overlay con degradado y badge flotante */
        .cat-card .img-wrap::after {
            content: "";
            position: absolute;
            inset: 0;
            background: linear-gradient(to top, rgba(0, 0, 0, .55) 0%, rgba(0, 0, 0, .10) 50%, transparent 100%);
        }

        .cat-card .float-icon {
            position: absolute;
            top: 14px;
            left: 14px;
            width: 44px;
            height: 44px;
            border-radius: 12px;
            background: rgba(255, 255, 255, .95);
            backdrop-filter: blur(8px);
            color: var(--cat-color, #ea580c);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.2rem;
            z-index: 2;
            box-shadow: 0 6px 16px -4px rgba(0, 0, 0, .25);
            transition: transform .3s ease;
        }

        .cat-card:hover .float-icon {
            transform: scale(1.08) rotate(-4deg);
        }

        .cat-card .float-tag {
            position: absolute;
            top: 14px;
            right: 14px;
            background: var(--cat-color, #ea580c);
            color: #fff;
            font-size: .65rem;
            font-weight: 800;
            text-transform: uppercase;
            letter-spacing: .06em;
            padding: .3rem .65rem;
            border-radius: 999px;
            z-index: 2;
            box-shadow: 0 4px 12px -2px rgba(0, 0, 0, .25);
        }

        .cat-card .body {
            padding: 1.4rem 1.5rem 1.25rem;
            flex: 1;
            display: flex;
            flex-direction: column;
        }

        .cat-card h3 {
            font-size: 1.1rem;
            font-weight: 700;
            color: #0f172a;
            margin-bottom: .5rem;
            transition: color .25s ease;
        }

        .cat-card:hover h3 {
            color: var(--cat-color, #ea580c);
        }

        .cat-card p {
            color: #64748b;
            font-size: .9rem;
            line-height: 1.55;
            flex: 1;
        }

        .cat-card .footer-row {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding-top: 1rem;
            margin-top: 1rem;
            border-top: 1px dashed #e5e7eb;
        }

        .cat-card .meta-pill {
            display: inline-flex;
            align-items: center;
            gap: .35rem;
            font-size: .78rem;
            font-weight: 600;
            color: #64748b;
            background: #f8fafc;
            padding: .35rem .75rem;
            border-radius: 999px;
            transition: all .25s ease;
        }

        .cat-card:hover .meta-pill {
            background: var(--cat-bg-soft, #fff7ed);
            color: var(--cat-color, #ea580c);
        }

        .cat-card .arrow-btn {
            width: 36px;
            height: 36px;
            border-radius: 50%;
            background: var(--cat-bg-soft, #fff7ed);
            color: var(--cat-color, #ea580c);
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all .3s ease;
        }

        .cat-card:hover .arrow-btn {
            background: var(--cat-color, #ea580c);
            color: #fff;
            transform: rotate(-45deg);
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
                            <a href="{{ route('procesos-empresariales') }}"
                                class="ml-1 text-sm text-gray-600 hover:text-orange-600 md:ml-2 transition-colors">Procesos
                                Empresariales</a>
                        </div>
                    </li>
                    <li aria-current="page">
                        <div class="flex items-center">
                            <i class="fas fa-chevron-right text-gray-400 mx-2 text-xs"></i>
                            <span class="ml-1 text-sm text-orange-600 font-semibold md:ml-2">Ingenieria</span>
                        </div>
                    </li>
                </ol>
            </nav>
        </div>
    </div>

    <div class="container mx-auto px-4">

        <!-- HERO -->
        <section class="ing-hero p-6 md:p-9 mt-8 mb-8 anim-up">
            <div class="flex flex-col md:flex-row md:items-center gap-6">
                <div class="hero-icon-lg shrink-0">
                    <i class="las la-cogs"></i>
                </div>
                <div class="flex-1">
                    <div
                        class="flex items-center gap-2 text-xs font-semibold text-orange-600 uppercase tracking-wider mb-2">
                        <i class="las la-network-wired"></i>
                        <span>Área de Ingeniería</span>
                    </div>
                    <h1 class="text-3xl md:text-4xl font-extrabold text-gray-900 mb-2 tracking-tight leading-tight">
                        Procesos y Actividades de Ingeniería
                    </h1>
                    <p class="text-gray-600 text-base md:text-lg">
                        Documentación de procesos de entrega de servicios y soporte al cliente.
                    </p>
                </div>
            </div>

            <!-- Stats rápidos -->
            <div class="grid grid-cols-2 md:grid-cols-4 gap-3 mt-7">
                <div class="stat-mini">
                    <div class="ic" style="background:#fff7ed; color:#ea580c;"><i class="las la-stream"></i></div>
                    <div>
                        <div class="text-lg font-extrabold text-gray-900 leading-none">3</div>
                        <div class="text-xs text-gray-500 font-medium">Categorías</div>
                    </div>
                </div>
                <div class="stat-mini">
                    <div class="ic" style="background:#dbeafe; color:#1d4ed8;"><i class="las la-th-large"></i></div>
                    <div>
                        <div class="text-lg font-extrabold text-gray-900 leading-none">7</div>
                        <div class="text-xs text-gray-500 font-medium">Procesos</div>
                    </div>
                </div>
                <div class="stat-mini">
                    <div class="ic" style="background:#f3e8ff; color:#7e22ce;"><i class="las la-file-alt"></i></div>
                    <div>
                        <div class="text-lg font-extrabold text-gray-900 leading-none">40+</div>
                        <div class="text-xs text-gray-500 font-medium">Documentos</div>
                    </div>
                </div>
                <div class="stat-mini">
                    <div class="ic" style="background:#dcfce7; color:#15803d;"><i class="las la-sync"></i></div>
                    <div>
                        <div class="text-lg font-extrabold text-gray-900 leading-none">2026</div>
                        <div class="text-xs text-gray-500 font-medium">Actualizado</div>
                    </div>
                </div>
            </div>
        </section>

        <!-- ============ Sección 1: Entrega de servicios ============ -->
        <section class="section-block mb-8 anim-up">
            <div class="section-head">
                <div class="ic" style="background:#fff7ed; color:#ea580c;">
                    <i class="las la-handshake"></i>
                </div>
                <div>
                    <h2 class="text-xl md:text-2xl font-bold text-gray-900">Entrega de Servicios y Soporte al Cliente</h2>
                    <p class="text-sm text-gray-500">Procesos clave de cara al cliente</p>
                </div>
                <span class="right-meta hidden md:inline-flex">
                    <i class="las la-folder"></i> 2 procesos
                </span>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Categoría 1 -->
                <a href="{{ route('estructurainterna.proceso-ingenieria') }}" class="cat-card"
                    style="--cat-color:#ea580c; --cat-bg-soft:#fff7ed;">
                    <div class="img-wrap">
                        <span class="float-icon"><i class="las la-laptop-code"></i></span>
                        <span class="float-tag">Proceso</span>
                        <img src="{{ asset('assets/media/proceso-comercial.png') }}" alt="Proceso Comercial IT">
                    </div>
                    <div class="body">
                        <h3>Proceso Comercial IT</h3>
                        <p>Fases para el cierre del proceso de implementación.</p>
                        <div class="footer-row">
                            <span class="meta-pill"><i class="las la-layer-group"></i> 5 Fases</span>
                            <span class="arrow-btn"><i class="las la-arrow-right"></i></span>
                        </div>
                    </div>
                </a>

                <!-- Categoría 2 -->
                <a href="{{ route('estructurainterna.proceso-ingenieria.soporte-cliente') }}" class="cat-card"
                    style="--cat-color:#3b82f6; --cat-bg-soft:#dbeafe;">
                    <div class="img-wrap">
                        <span class="float-icon"><i class="las la-headset"></i></span>
                        <span class="float-tag">Soporte</span>
                        <img src="{{ asset('assets/media/soporte-cliente.png') }}" alt="Proceso soporte IT">
                    </div>
                    <div class="body">
                        <h3>Soporte a Cliente</h3>
                        <p>Transferencia de conocimiento al cliente para la adopción y uso de la solución implementada.</p>
                        <div class="footer-row">
                            <span class="meta-pill"><i class="las la-file-alt"></i> 36 archivos</span>
                            <span class="arrow-btn"><i class="las la-arrow-right"></i></span>
                        </div>
                    </div>
                </a>
            </div>
        </section>

        <!-- ============ Sección 2: Procesos Internos ============ -->
        <section class="section-block mb-8 anim-up">
            <div class="section-head">
                <div class="ic" style="background:#f3e8ff; color:#7e22ce;">
                    <i class="las la-tools"></i>
                </div>
                <div>
                    <h2 class="text-xl md:text-2xl font-bold text-gray-900">Procesos Internos</h2>
                    <p class="text-sm text-gray-500">Operación interna del área</p>
                </div>
                <span class="right-meta hidden md:inline-flex">
                    <i class="las la-folder"></i> 3 procesos
                </span>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <!-- PoC -->
                <a href="{{ route('estructurainterna.proceso-ingenieria.solicitud-poc') }}" class="cat-card"
                    style="--cat-color:#8b5cf6; --cat-bg-soft:#f5f3ff;">
                    <div class="img-wrap">
                        <span class="float-icon"><i class="las la-flask"></i></span>
                        <span class="float-tag">PoC</span>
                        <img src="{{ asset('assets/media/poc-dos.png') }}" alt="Prueba de concepto">
                    </div>
                    <div class="body">
                        <h3>Solicitud Prueba de Concepto (PoC)</h3>
                        <p>Proceso inicial y práctico para evaluar la viabilidad de la PoC.</p>
                        <div class="footer-row">
                            <span class="meta-pill"><i class="las la-layer-group"></i> 5 Fases</span>
                            <span class="arrow-btn"><i class="las la-arrow-right"></i></span>
                        </div>
                    </div>
                </a>

                <!-- Mantto Preventivo -->
                <a href="{{ route('estructurainterna.proceso-ingenieria.mantto-preventivo') }}" class="cat-card"
                    style="--cat-color:#10b981; --cat-bg-soft:#ecfdf5;">
                    <div class="img-wrap">
                        <span class="float-icon"><i class="las la-shield-alt"></i></span>
                        <span class="float-tag">Preventivo</span>
                        <img src="{{ asset('assets/media/mantto-preven.png') }}" alt="Mantenimiento Preventivo">
                    </div>
                    <div class="body">
                        <h3>Mantenimiento Preventivo</h3>
                        <p>Programación y documentación de mantenimientos preventivos después de la implementación.</p>
                        <div class="footer-row">
                            <span class="meta-pill"><i class="las la-file-alt"></i> 1 archivo</span>
                            <span class="arrow-btn"><i class="las la-arrow-right"></i></span>
                        </div>
                    </div>
                </a>

                <!-- Mantto Correctivo -->
                <a href="{{ route('estructurainterna.proceso-ingenieria.mantto-correctivo') }}" class="cat-card"
                    style="--cat-color:#ef4444; --cat-bg-soft:#fee2e2;">
                    <div class="img-wrap">
                        <span class="float-icon"><i class="las la-fire-extinguisher"></i></span>
                        <span class="float-tag">Correctivo</span>
                        <img src="{{ asset('assets/media/mantto-correct.png') }}" alt="Mantenimiento Correctivo">
                    </div>
                    <div class="body">
                        <h3>Mantenimiento Correctivo</h3>
                        <p>Protocolo de mantenimiento correctivo ante una falla por nivel de severidad.</p>
                        <div class="footer-row">
                            <span class="meta-pill"><i class="las la-file-alt"></i> 1 archivo</span>
                            <span class="arrow-btn"><i class="las la-arrow-right"></i></span>
                        </div>
                    </div>
                </a>
            </div>
        </section>

        <!-- ============ Sección 3: Apoyo y Conocimiento ============ -->
        <section class="section-block mb-12 anim-up">
            <div class="section-head">
                <div class="ic" style="background:#dcfce7; color:#15803d;">
                    <i class="las la-graduation-cap"></i>
                </div>
                <div>
                    <h2 class="text-xl md:text-2xl font-bold text-gray-900">Apoyo y Conocimiento de Actividades</h2>
                    <p class="text-sm text-gray-500">Recursos, guías y portales internos</p>
                </div>
                <span class="right-meta hidden md:inline-flex">
                    <i class="las la-folder"></i> 2 portales
                </span>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Guías on Site -->
                <a href="{{ route('ingenieria.guias-on-site') }}" class="cat-card"
                    style="--cat-color:#0ea5e9; --cat-bg-soft:#e0f2fe;">
                    <div class="img-wrap">
                        <span class="float-icon"><i class="las la-map-marked-alt"></i></span>
                        <span class="float-tag">Guías</span>
                        <img src="{{ asset('assets/media/guiaon-site.png') }}" alt="Guías on Site">
                    </div>
                    <div class="body">
                        <h3>Guías de Trabajo on Site</h3>
                        <p>Documentos y guías paso a paso para desempeñar la actividad necesaria.</p>
                        <div class="footer-row">
                            <span class="meta-pill"><i class="las la-external-link-alt"></i> Ir al portal</span>
                            <span class="arrow-btn"><i class="las la-arrow-right"></i></span>
                        </div>
                    </div>
                </a>

                <!-- Pólizas -->
                <a href="{{ route('ingenieria.clientes-polizas') }}" class="cat-card"
                    style="--cat-color:#ec4899; --cat-bg-soft:#fdf2f8;">
                    <div class="img-wrap">
                        <span class="float-icon"><i class="las la-file-contract"></i></span>
                        <span class="float-tag">Pólizas</span>
                        <img src="{{ asset('assets/media/servicios-contratados.png') }}" alt="Pólizas e Inventario">
                    </div>
                    <div class="body">
                        <h3>Gestión de Servicios Contratados</h3>
                        <p>Pólizas vigentes e inventarios de clientes con servicios contratados con Netjer.</p>
                        <div class="footer-row">
                            <span class="meta-pill"><i class="las la-external-link-alt"></i> Ir al portal</span>
                            <span class="arrow-btn"><i class="las la-arrow-right"></i></span>
                        </div>
                    </div>
                </a>
            </div>
        </section>
    </div>
@endsection

@push('js')
@endpush
