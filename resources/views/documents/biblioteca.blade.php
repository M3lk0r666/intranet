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
                            <span class="ml-1 text-sm text-primary font-medium md:ml-2">Biblioteca</span>
                        </div>
                    </li>
                </ol>
            </nav>
        </div>
    </div>

    <!-- Encabezado -->
    <div class="mb-12 flex flex-col md:flex-row md:items-end justify-between gap-6 mt-8">
        <div class="max-w-4xl">
            <h1 class="text-2xl md:text-4xl font-black tracking-tight mb-4">Biblioteca de Recursos Digitales</h1>
            <p class="text-slate-600 dark:text-slate-400 text-md leading-relaxed">
                Acceda a documentación técnica, guías operativas, tutoriales multimedia y formatos oficiales actualizados de
                la empresa para optimizar sus procesos diarios.
            </p>
        </div>
    </div>

    <div class="bg-white rounded-lg shadow p-6 mb-8 max-w-6xl mx-auto">
        <section class="mb-12">
            <div class="flex items-center gap-3 mb-6 border-b border-slate-200 pb-3">
                <i class="ri-book-shelf-line text-primary text-3xl"></i>
                <h2 class="text-2xl font-extrabold tracking-tight">Diseño Empresarial - Imagen</h2>
            </div>
            <div class="grid grid-cols-[repeat(auto-fit,minmax(280px,1fr))] gap-6">
                <div
                    class="bg-white border border-slate-200 rounded-xl p-5 hover:border-primary transition-all group shadow-sm">
                    <div class="flex items-center gap-4">
                        <!-- Contenido -->
                        <div class="flex-1">
                            <h3 class="text-lg font-bold mb-2 group-hover:text-primary transition-colors">
                                Imagen Corporativa
                            </h3>
                            <p class="text-sm text-slate-500 mb-4 line-clamp-2">
                                Lineamientos de marca, comunicación visual y posicionamiento del mercado.
                            </p>
                            <a href="{{ route('intranet.estructurainterna.imagen-corporativa') }}"
                                class="inline-flex px-6 py-3 bg-primary rounded-xl text-white font-bold text-sm tracking-widest hover:bg-primary/90 transition-colors items-center gap-2">
                                Ir a recurso ...
                            </a>
                        </div>
                        <!-- Imagen -->
                        <div class="w-28 h-28 flex-shrink-0 opacity-80 group-hover:scale-105 transition">
                            <img src="{{ asset('assets/media/imagen-corporativa.png') }}"
                                class="w-full h-full object-contain" alt="Imagen corporativa">
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <div class="bg-white rounded-lg shadow p-6 mb-8 opacity-50 cursor-not-allowed pointer-events-none">
        <!-- Category: TI -->
        <section class="mb-12">
            <div
                class="flex items-center gap-3 mb-6 border-b border-slate-200 dark:border-primary/20 pb-3 cursor-not-allowed pointer-events-none">
                <i class="las la-terminal text-primary text-3xl"></i>
                <h2 class="text-2xl font-extrabold tracking-tight">Tecnologías de Información (TI)</h2>
                <span class="ml-auto text-xs font-bold text-slate-400 bg-slate-100 dark:bg-primary/5 px-2 py-1 rounded">3
                    ARCHIVOS</span>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <!-- Card 1 -->
                <div
                    class="bg-white dark:bg-primary/5 border border-slate-200 dark:border-primary/20 rounded-xl p-5 hover:border-primary transition-all group shadow-sm">
                    <div class="flex justify-between items-start mb-4">
                        <div class="p-3 bg-primary/10 rounded-lg text-primary">
                            <i class="las la-shield-alt text-primary text-3xl"></i>
                        </div>
                        <span
                            class="text-[10px] font-black bg-slate-100 dark:bg-primary/20 px-2 py-1 rounded text-slate-500 dark:text-slate-300">PDF
                            • 2.4 MB</span>
                    </div>
                    <h3 class="text-lg font-bold mb-2 group-hover:text-primary transition-colors">Política de Ciberseguridad
                        2024</h3>
                    <p class="text-sm text-slate-500 dark:text-slate-400 mb-6 line-clamp-2">Lineamientos oficiales para la
                        protección de activos digitales y gestión de incidentes.</p>
                    <button
                        class="w-full flex items-center justify-center gap-2 py-3 bg-primary text-white rounded-lg font-bold hover:bg-primary/90 transition-colors">
                        <i class="ri-file-download-line text-sm"></i>
                        Descargar
                    </button>
                </div>
                <!-- Card 2 -->
                <div
                    class="bg-white dark:bg-primary/5 border border-slate-200 dark:border-primary/20 rounded-xl p-5 hover:border-primary transition-all group shadow-sm">
                    <div class="flex justify-between items-start mb-4">
                        <div class="p-3 bg-primary/10 rounded-lg text-primary">
                            <i class="las la-key text-3xl"></i>
                        </div>
                        <span
                            class="text-[10px] font-black bg-slate-100 dark:bg-primary/20 px-2 py-1 rounded text-slate-500 dark:text-slate-300">GUIDE
                            • 1.8 MB</span>
                    </div>
                    <h3 class="text-lg font-bold mb-2 group-hover:text-primary transition-colors">Manual de Configuración
                        VPN
                    </h3>
                    <p class="text-sm text-slate-500 dark:text-slate-400 mb-6 line-clamp-2">Paso a paso para establecer
                        conexiones seguras remotas a la infraestructura corporativa.</p>
                    <button
                        class="w-full flex items-center justify-center gap-2 py-3 bg-primary text-white rounded-lg font-bold hover:bg-primary/90 transition-colors">
                        <i class="ri-file-download-line text-sm"></i>
                        Descargar
                    </button>
                </div>
                <!-- Card 3 -->
                <div
                    class="bg-white dark:bg-primary/5 border border-slate-200 dark:border-primary/20 rounded-xl p-5 hover:border-primary transition-all group shadow-sm">
                    <div class="flex justify-between items-start mb-4">
                        <div class="p-3 bg-primary/10 rounded-lg text-primary">
                            <i class="ri-line-chart-line text-3xl"></i>
                        </div>
                        <span
                            class="text-[10px] font-black bg-slate-100 dark:bg-primary/20 px-2 py-1 rounded text-slate-500 dark:text-slate-300">TOOL
                            • 5.2 MB</span>
                    </div>
                    <h3 class="text-lg font-bold mb-2 group-hover:text-primary transition-colors">Diagnóstico de Red Local
                    </h3>
                    <p class="text-sm text-slate-500 dark:text-slate-400 mb-6 line-clamp-2">Herramienta automatizada para la
                        validación de latencia y estado de puertos locales.</p>
                    <button
                        class="w-full flex items-center justify-center gap-2 py-3 bg-primary text-white rounded-lg font-bold hover:bg-primary/90 transition-colors">
                        <i class="ri-file-download-line text-sm"></i>
                        Descargar
                    </button>
                </div>
            </div>
        </section>
        <!-- Category: RH -->
        <section class="mb-12">
            <div class="flex items-center gap-3 mb-6 border-b border-slate-200 dark:border-primary/20 pb-3">
                <i class="ri-team-line text-primary text-3xl"></i>
                <h2 class="text-2xl font-extrabold tracking-tight">Recursos Humanos</h2>
                <span class="ml-auto text-xs font-bold text-slate-400 bg-slate-100 dark:bg-primary/5 px-2 py-1 rounded">2
                    ARCHIVOS</span>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <!-- Card RH 1 -->
                <div
                    class="bg-white dark:bg-primary/5 border border-slate-200 dark:border-primary/20 rounded-xl p-5 hover:border-primary transition-all group shadow-sm">
                    <div class="flex justify-between items-start mb-4">
                        <div class="p-3 bg-primary/10 rounded-lg text-primary">
                            <i class="ri-auction-line text-3xl"></i>
                        </div>
                        <span
                            class="text-[10px] font-black bg-slate-100 dark:bg-primary/20 px-2 py-1 rounded text-slate-500 dark:text-slate-300">DOC
                            • 1.1 MB</span>
                    </div>
                    <h3 class="text-lg font-bold mb-2 group-hover:text-primary transition-colors">Código de Ética y Conducta
                    </h3>
                    <p class="text-sm text-slate-500 dark:text-slate-400 mb-6 line-clamp-2">Valores y normas que rigen el
                        comportamiento profesional dentro de Netjer Networks.</p>
                    <button
                        class="w-full flex items-center justify-center gap-2 py-3 bg-primary text-white rounded-lg font-bold hover:bg-primary/90 transition-colors">
                        <i class="ri-file-download-line text-sm"></i>
                        Descargar
                    </button>
                </div>
                <!-- Card RH 2 -->
                <div
                    class="bg-white dark:bg-primary/5 border border-slate-200 dark:border-primary/20 rounded-xl p-5 hover:border-primary transition-all group shadow-sm">
                    <div class="flex justify-between items-start mb-4">
                        <div class="p-3 bg-primary/10 rounded-lg text-primary">
                            <i class="ri-calendar-event-line text-3xl"></i>
                        </div>
                        <span
                            class="text-[10px] font-black bg-slate-100 dark:bg-primary/20 px-2 py-1 rounded text-slate-500 dark:text-slate-300">PDF
                            • 3.4 MB</span>
                    </div>
                    <h3 class="text-lg font-bold mb-2 group-hover:text-primary transition-colors">Calendario de Vacaciones
                        2024
                    </h3>
                    <p class="text-sm text-slate-500 dark:text-slate-400 mb-6 line-clamp-2">Fechas oficiales, días festivos
                        y
                        periodos de solicitud para el personal administrativo.</p>
                    <button
                        class="w-full flex items-center justify-center gap-2 py-3 bg-primary text-white rounded-lg font-bold hover:bg-primary/90 transition-colors">
                        <i class="ri-file-download-line text-sm"></i>
                        Descargar
                    </button>
                </div>
            </div>
        </section>
        <!-- Category: Ventas -->
        <section class="mb-12">
            <div class="flex items-center gap-3 mb-6 border-b border-slate-200 dark:border-primary/20 pb-3">
                <i class="ri-bill-line text-primary text-3xl"></i>
                <h2 class="text-2xl font-extrabold tracking-tight">Ventas &amp; Comercial</h2>
                <span class="ml-auto text-xs font-bold text-slate-400 bg-slate-100 dark:bg-primary/5 px-2 py-1 rounded">1
                    ARCHIVO</span>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <!-- Card Ventas 1 -->
                <div
                    class="bg-white dark:bg-primary/5 border border-slate-200 dark:border-primary/20 rounded-xl p-5 hover:border-primary transition-all group shadow-sm">
                    <div class="flex justify-between items-start mb-4">
                        <div class="p-3 bg-primary/10 rounded-lg text-primary">
                            <i class="ri-calculator-line text-3xl"></i>
                        </div>
                        <span
                            class="text-[10px] font-black bg-slate-100 dark:bg-primary/20 px-2 py-1 rounded text-slate-500 dark:text-slate-300">XLS
                            • 0.9 MB</span>
                    </div>
                    <h3 class="text-lg font-bold mb-2 group-hover:text-primary transition-colors">Calculadora de Comisiones
                        v4
                    </h3>
                    <p class="text-sm text-slate-500 dark:text-slate-400 mb-6 line-clamp-2">Plantilla interactiva para el
                        cálculo de incentivos comerciales según objetivos trimestrales.</p>
                    <button
                        class="w-full flex items-center justify-center gap-2 py-3 bg-primary text-white rounded-lg font-bold hover:bg-primary/90 transition-colors">
                        <i class="ri-file-download-line text-sm"></i>
                        Descargar
                    </button>
                </div>
            </div>
        </section>
    </div>
@endsection
