@extends('layouts.intranet')

@section('title', 'Procesos Empresariales')

@push('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet"
        href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <link href="/assets/css/intrahome.css" rel="stylesheet">
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
                    <li aria-current="page">
                        <div class="flex items-center">
                            <i class="fas fa-chevron-right text-gray-400 mx-2 text-xs"></i>
                            <span class="ml-1 text-sm text-orange-600 font-semibold md:ml-2">Procesos Empresariales</span>
                        </div>
                    </li>
                </ol>
            </nav>
        </div>
    </div>

    <div class="container mx-auto px-4 py-8 max-w-[1280px]">

        {{-- ============================================
             HERO con stats rápidos
             ============================================ --}}
        <section class="proc-hero p-6 md:p-9 mb-10 proc-anim-up">
            <div class="flex flex-col md:flex-row md:items-center gap-6 mb-6">
                <div class="proc-hero-icon">
                    <i class="las la-project-diagram"></i>
                </div>
                <div class="flex-1">
                    <div class="flex items-center gap-2 text-xs font-bold text-orange-600 uppercase tracking-widest mb-2">
                        <i class="las la-building"></i>
                        <span>Estructura Interna</span>
                    </div>
                    <h1 class="text-3xl md:text-4xl font-extrabold text-gray-900 tracking-tight leading-tight">
                        Procesos Empresariales
                    </h1>
                    <p class="text-gray-600 mt-2 text-base md:text-lg max-w-2xl">
                        Gestión integral y documentación de flujos operativos y administrativos
                        para la excelencia tecnológica.
                    </p>
                </div>
            </div>

            {{-- Stats rápidos --}}
            <div class="grid grid-cols-2 md:grid-cols-4 gap-3">
                <div class="proc-stat">
                    <div class="ic" style="background:#fff7ed; color:#ea580c;"><i class="las la-th-large"></i></div>
                    <div>
                        <div class="num">6</div>
                        <div class="label">Áreas documentadas</div>
                    </div>
                </div>
                <div class="proc-stat">
                    <div class="ic" style="background:#dbeafe; color:#1d4ed8;"><i class="las la-sitemap"></i></div>
                    <div>
                        <div class="num">1</div>
                        <div class="label">Organigrama</div>
                    </div>
                </div>
                <div class="proc-stat">
                    <div class="ic" style="background:#f3e8ff; color:#7e22ce;"><i class="las la-cogs"></i></div>
                    <div>
                        <div class="num">5</div>
                        <div class="label">Procesos clave</div>
                    </div>
                </div>
                <div class="proc-stat">
                    <div class="ic" style="background:#dcfce7; color:#15803d;"><i class="las la-sync"></i></div>
                    <div>
                        <div class="num">2026</div>
                        <div class="label">Actualizado</div>
                    </div>
                </div>
            </div>
        </section>

        {{-- ============================================
             ENCABEZADO DE SECCIÓN
             ============================================ --}}
        <div class="proc-section-head">
            <div class="left">
                <div class="accent"></div>
                <div>
                    <h2>Áreas y Procesos</h2>
                    <p class="subtitle">Explora la documentación de cada área de la organización</p>
                </div>
            </div>
            <span class="proc-counter-pill">
                <i class="las la-folder-open"></i> 6 secciones
            </span>
        </div>

        {{-- ============================================
             GRID DE TARJETAS
             ============================================ --}}
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-12">

            {{-- ======= 1. Estructura Interna / Organigrama ======= --}}
            <a href="{{ route('estructurainterna.organigrama') }}" class="proc-card"
                style="--c-color:#3b82f6; --c-bg:#dbeafe; --c-border:#bfdbfe;">
                <div class="img-area" style="background-image: url('{{ asset('assets/media/estruc-interna.png') }}');">
                    <span class="float-icon"><i class="las la-sitemap"></i></span>
                    <span class="tag-corner"><i class="las la-users"></i> Organigrama</span>
                </div>
                <div class="body">
                    <h3>Estructura Interna</h3>
                    <p>Definición de jerarquías, roles y responsabilidades de los equipos de trabajo.</p>
                    <div class="footer-line">
                        <span class="meta-pill"><i class="las la-network-wired"></i> Ver organigrama</span>
                        <span class="arrow-circle"><i class="las la-arrow-right"></i></span>
                    </div>
                </div>
            </a>

            {{-- ======= 2. Comercial IT ======= --}}
            <a href="{{ route('estructurainterna.proceso-comercial') }}" class="proc-card"
                style="--c-color:#ea580c; --c-bg:#fff7ed; --c-border:#fed7aa;">
                <div class="img-area" style="background-image: url('{{ asset('assets/media/comercial-ti.png') }}');">
                    <span class="float-icon"><i class="las la-handshake"></i></span>
                    <span class="tag-corner"><i class="las la-chart-line"></i> Ventas</span>
                </div>
                <div class="body">
                    <h3>Comercial IT</h3>
                    <p>Ciclo de vida de ventas, desde la prospección hasta el cierre de soluciones tecnológicas.</p>
                    <div class="footer-line">
                        <span class="meta-pill"><i class="las la-funnel-dollar"></i> Ver proceso</span>
                        <span class="arrow-circle"><i class="las la-arrow-right"></i></span>
                    </div>
                </div>
            </a>

            {{-- ======= 3. Descripción de Puestos ======= --}}
            <a href="{{ route('estructurainterna.operaciones') }}" class="proc-card"
                style="--c-color:#8b5cf6; --c-bg:#f5f3ff; --c-border:#ddd6fe;">
                <div class="img-area" style="background-image: url('{{ asset('assets/media/operacionesb.png') }}');">
                    <span class="float-icon"><i class="las la-id-badge"></i></span>
                    <span class="tag-corner"><i class="las la-user-cog"></i> Puestos</span>
                </div>
                <div class="body">
                    <h3>Descripción de Puestos</h3>
                    <p>Estructura de puestos de las áreas dentro de la organización, con la descripción detallada de sus
                        responsabilidades, alcance y habilidades.</p>
                    <div class="footer-line">
                        <span class="meta-pill"><i class="las la-list-alt"></i> Ver puestos</span>
                        <span class="arrow-circle"><i class="las la-arrow-right"></i></span>
                    </div>
                </div>
            </a>

            {{-- ======= 4. Imagen Corporativa ======= --}}
            <a href="{{ route('estructurainterna.imagen-corporativa') }}" class="proc-card"
                style="--c-color:#ec4899; --c-bg:#fdf2f8; --c-border:#fbcfe8;">
                <div class="img-area"
                    style="background-image: url('{{ asset('assets/media/imagen-corporativa.png') }}');">
                    <span class="float-icon"><i class="las la-palette"></i></span>
                    <span class="tag-corner"><i class="las la-star"></i> Marca</span>
                </div>
                <div class="body">
                    <h3>Imagen Corporativa</h3>
                    <p>Lineamientos de marca, comunicación visual y posicionamiento del mercado.</p>
                    <div class="footer-line">
                        <span class="meta-pill"><i class="las la-image"></i> Ver recursos</span>
                        <span class="arrow-circle"><i class="las la-arrow-right"></i></span>
                    </div>
                </div>
            </a>

            {{-- ======= 5. Ingeniería ======= --}}
            <a href="{{ route('estructurainterna.ingenieria') }}" class="proc-card"
                style="--c-color:#0ea5e9; --c-bg:#e0f2fe; --c-border:#bae6fd;">
                <div class="img-area" style="background-image: url('{{ asset('assets/media/ingenieria.png') }}');">
                    <span class="float-icon"><i class="las la-microchip"></i></span>
                    <span class="tag-corner"><i class="las la-tools"></i> Ingeniería</span>
                </div>
                <div class="body">
                    <h3>Ingeniería</h3>
                    <p>Desarrollo de infraestructura, diseño de redes y protocolos de innovación.</p>
                    <div class="footer-line">
                        <span class="meta-pill"><i class="las la-network-wired"></i> Ver proceso</span>
                        <span class="arrow-circle"><i class="las la-arrow-right"></i></span>
                    </div>
                </div>
            </a>

            {{-- ======= 6. Administración y Finanzas ======= --}}
            <a href="{{ route('estructurainterna.admnistracion') }}" class="proc-card"
                style="--c-color:#10b981; --c-bg:#dcfce7; --c-border:#bbf7d0;">
                <div class="img-area" style="background-image: url('{{ asset('assets/media/admon-finanzas.png') }}');">
                    <span class="float-icon"><i class="las la-coins"></i></span>
                    <span class="tag-corner"><i class="las la-calculator"></i> Finanzas</span>
                </div>
                <div class="body">
                    <h3>Administración y Finanzas</h3>
                    <p>Control presupuestario, facturación y gestión administrativa central.</p>
                    <div class="footer-line">
                        <span class="meta-pill"><i class="las la-file-invoice-dollar"></i> Ver proceso</span>
                        <span class="arrow-circle"><i class="las la-arrow-right"></i></span>
                    </div>
                </div>
            </a>
        </div>

        {{-- ============================================
             CTA inferior
             ============================================ --}}
        <div class="proc-cta proc-anim-up mb-12">
            <div class="flex items-center gap-4 flex-1 min-w-[260px]">
                <div class="proc-cta-icon"><i class="las la-comments"></i></div>
                <div>
                    <p class="text-gray-900 font-bold text-base mb-0.5">¿Necesitas ayuda con un flujo?</p>
                    <p class="text-gray-600 text-sm">Nuestro equipo de procesos está disponible para resolver tus dudas.
                    </p>
                </div>
            </div>
            <a href="mailto:jose.torres@netjernetworks.com" class="proc-cta-btn">
                <i class="las la-envelope"></i>
                Contactar al equipo
                <i class="las la-arrow-right"></i>
            </a>
        </div>
    </div>
@endsection
