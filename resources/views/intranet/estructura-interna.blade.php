@extends('layouts.intranet')

@section('title', 'Intranet Corporativa')

@push('css')
    <link href="/assets/css/intrahome.css" rel="stylesheet">
@endpush

@section('content')

    <!-- Breadcrumb -->
    <div class="bg-white border-b border-gray-200">
        <div class="container mx-auto px-4 py-3">
            <nav class="flex" aria-label="Breadcrumb">
                <ol class="inline-flex items-center space-x-1 md:space-x-3">
                    <li class="inline-flex items-center">
                        <a href="{{ route('bienvenido') }}"
                            class="inline-flex items-center text-sm text-gray-600 hover:text-orange-600">
                            <i class="fas fa-home mr-2"></i>
                            Home
                        </a>
                    </li>
                    <li>
                        <div class="flex items-center">
                            <i class="fas fa-chevron-right text-gray-400 mx-2"></i>
                            <a href="{{ route('intranet.index') }}"
                                class="ml-1 text-sm text-gray-600 hover:text-orange-600 md:ml-2">Intranet</a>
                        </div>
                    </li>
                    <li aria-current="page">
                        <div class="flex items-center">
                            <i class="fas fa-chevron-right text-gray-400 mx-2"></i>
                            <span class="ml-1 text-sm text-primary font-medium md:ml-2">Procesos Empresariales</span>
                        </div>
                    </li>
                </ol>
            </nav>
        </div>
    </div>

    <div class="absolute inset-0 dot-grid text-slate-300 dark:text-slate-800 opacity-30 pointer-events-none"></div>
    <div class="relative z-10 px-6 md:px-20 py-10 max-w-[1280px] mx-auto w-full">
        <div class="flex flex-col gap-4 mb-12">
            <h1 class="text-4xl md:text-5xl font-black leading-tight tracking-tight text-slate-900 dark:text-slate-50">
                Procesos Empresariales
            </h1>
            <p class="text-slate-600 dark:text-slate-400 text-lg max-w-2xl leading-relaxed">
                Gestión integral y documentación de flujos operativos y administrativos para la excelencia tecnológica.
            </p>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <div
                class="group flex flex-col bg-white dark:bg-slate-900/50 border border-slate-200 dark:border-slate-800 rounded-xl overflow-hidden hover:border-primary transition-all duration-300 shadow-sm hover:shadow-xl">
                <div class="h-48 overflow-hidden relative">
                    <div class="w-full h-full bg-center bg-cover transition-transform duration-500 group-hover:scale-105"
                        data-alt="Internal company structure and organizational chart diagram"
                        style='background-image: url({{ asset('assets/media/estruc-interna.png') }});'>
                    </div>
                </div>
                <div class="p-6 flex flex-col gap-3">
                    <h3 class="text-xl font-bold text-slate-900 dark:text-slate-100">Estructura Interna</h3>
                    <p class="text-slate-600 dark:text-slate-400 text-sm leading-relaxed">Definición de jerarquías, roles y
                        responsabilidades de los equipos de trabajo.</p>
                    <a class="mt-4 flex items-center gap-2 text-primary font-bold text-sm group-hover:translate-x-1 transition-transform"
                        href="{{ route('intranet.estructurainterna.organigrama') }}">
                        Ver organigrama <i class="ri-arrow-right-long-line text-sm"></i>
                    </a>
                </div>
            </div>
            <div
                class="group flex flex-col bg-white dark:bg-slate-900/50 border border-slate-200 dark:border-slate-800 rounded-xl overflow-hidden hover:border-primary transition-all duration-300 shadow-sm hover:shadow-xl">
                <div class="h-48 overflow-hidden relative">
                    <div class="w-full h-full bg-center bg-cover transition-transform duration-500 group-hover:scale-105"
                        data-alt="Sales pipeline and IT business commerce analytics"
                        style='background-image: url({{ asset('assets/media/comercial-ti.png') }});'>
                    </div>
                </div>
                <div class="p-6 flex flex-col gap-3">
                    <h3 class="text-xl font-bold text-slate-900 dark:text-slate-100">Comercial IT</h3>
                    <p class="text-slate-600 dark:text-slate-400 text-sm leading-relaxed">Ciclo de vida de ventas, desde la
                        prospección hasta el cierre de soluciones tecnológicas.</p>
                    <a class="mt-4 flex items-center gap-2 text-primary font-bold text-sm group-hover:translate-x-1 transition-transform"
                        href="{{ route('intranet.estructurainterna.proceso-comercial') }}">
                        Ver proceso <i class="ri-arrow-right-long-line text-sm"></i>
                    </a>
                </div>
            </div>
            <div
                class="group flex flex-col bg-white dark:bg-slate-900/50 border border-slate-200 dark:border-slate-800 rounded-xl overflow-hidden hover:border-primary transition-all duration-300 shadow-sm hover:shadow-xl">
                <div class="h-48 overflow-hidden relative">
                    <div class="w-full h-full bg-center bg-cover transition-transform duration-500 group-hover:scale-105"
                        data-alt="Operational management and service delivery dashboard"
                        style='background-image: url({{ asset('assets/media/operacionesb.png') }});'>
                    </div>
                </div>
                <div class="p-6 flex flex-col gap-3">
                    <h3 class="text-xl font-bold text-slate-900 dark:text-slate-100">Operaciones</h3>
                    <p class="text-slate-600 dark:text-slate-400 text-sm leading-relaxed">Estandarización de la entrega de
                        servicios y soporte técnico especializado.</p>
                    <a class="mt-4 flex items-center gap-2 text-primary font-bold text-sm group-hover:translate-x-1 transition-transform"
                        href="{{ route('intranet.estructurainterna.operaciones') }}">
                        Ver proceso <i class="ri-arrow-right-long-line text-sm"></i>
                    </a>
                </div>
            </div>
            <div
                class="group flex flex-col bg-white dark:bg-slate-900/50 border border-slate-200 dark:border-slate-800 rounded-xl overflow-hidden hover:border-primary transition-all duration-300 shadow-sm hover:shadow-xl ">
                <div class="h-48 overflow-hidden relative">
                    <div class="w-full h-full bg-center bg-cover transition-transform duration-500 group-hover:scale-105"
                        data-alt="Brand identity guidelines and corporate imaging assets"
                        style='background-image: url({{ asset('assets/media/imagen-corporativa.png') }});'>
                    </div>
                </div>
                <div class="p-6 flex flex-col gap-3">
                    <h3 class="text-xl font-bold text-slate-900 dark:text-slate-100">Imagen Corporativa</h3>
                    <p class="text-slate-600 dark:text-slate-400 text-sm leading-relaxed">Lineamientos de marca,
                        comunicación visual y posicionamiento del mercado.</p>
                    <a class="mt-4 flex items-center gap-2 text-primary font-bold text-sm group-hover:translate-x-1 transition-transform"
                        href="{{ route('intranet.estructurainterna.imagen-corporativa') }}">
                        Ver recursos <i class="ri-arrow-right-long-line text-sm"></i>
                    </a>
                </div>
            </div>
            <div
                class="group flex flex-col bg-white dark:bg-slate-900/50 border border-slate-200 dark:border-slate-800 rounded-xl overflow-hidden hover:border-primary transition-all duration-300 shadow-sm hover:shadow-xl">
                <div class="h-48 overflow-hidden relative">
                    <div class="w-full h-full bg-center bg-cover transition-transform duration-500 group-hover:scale-105"
                        data-alt="Engineering team designing hardware and network systems"
                        style='background-image: url({{ asset('assets/media/ingenieria.png') }});'>
                    </div>
                </div>
                <div class="p-6 flex flex-col gap-3">
                    <h3 class="text-xl font-bold text-slate-900 dark:text-slate-100">Ingeniería</h3>
                    <p class="text-slate-600 dark:text-slate-400 text-sm leading-relaxed">Desarrollo de infraestructura,
                        diseño de redes y protocolos de innovación.</p>
                    <a class="mt-4 flex items-center gap-2 text-primary font-bold text-sm group-hover:translate-x-1 transition-transform"
                        href="{{ route('intranet.estructurainterna.ingenieria') }}">
                        Ver proceso <i class="ri-arrow-right-long-line text-sm"></i>
                    </a>
                </div>
            </div>
            <div
                class="group flex flex-col bg-white dark:bg-slate-900/50 border border-slate-200 dark:border-slate-800 rounded-xl overflow-hidden hover:border-primary transition-all duration-300 shadow-sm hover:shadow-xl">
                <div class="h-48 overflow-hidden relative">
                    <div class="w-full h-full bg-center bg-cover transition-transform duration-500 group-hover:scale-105"
                        data-alt="Administration and finance accounting and auditing papers"
                        style='background-image: url({{ asset('assets/media/admon-finanzas.png') }});'>
                    </div>
                </div>
                <div class="p-6 flex flex-col gap-3">
                    <h3 class="text-xl font-bold text-slate-900 dark:text-slate-100">Administración y Finanzas</h3>
                    <p class="text-slate-600 dark:text-slate-400 text-sm leading-relaxed">Control presupuestario,
                        facturación y gestión administrativa central.</p>
                    <a class="mt-4 flex items-center gap-2 text-primary font-bold text-sm group-hover:translate-x-1 transition-transform"
                        href="{{ route('intranet.estructurainterna.admnistracion') }}">
                        Ver proceso <i class="ri-arrow-right-long-line text-sm"></i>
                    </a>
                </div>
            </div>
        </div>
        <div class="mt-16 flex justify-center">
            <div
                class="flex items-center gap-6 px-8 py-4 bg-primary/5 dark:bg-primary/10 rounded-full border border-primary/20">
                <p class="text-sm font-medium text-slate-700 dark:text-slate-300">
                    ¿Necesitas ayuda con un flujo? <a class="text-primary font-bold hover:underline"
                        href="mailto:jose.torres@netjernetworks.com">Contacta al equipo de procesos</a>
                </p>
            </div>
        </div>
    </div>
@endsection
