@extends('layouts.intranet')

@section('title', 'Intranet Corporativa')

@push('css')
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="/assets/css/intrahome.css" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com?plugins=forms,typography,container-queries"></script>
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
                    <li>
                        <div class="flex items-center">
                            <i class="fas fa-chevron-right text-gray-400 mx-2"></i>
                            <a href="{{ route('procesos-empresariales') }}"
                                class="ml-1 text-sm text-gray-600 hover:text-orange-600 md:ml-2">Procesos Empresariales</a>
                        </div>
                    </li>
                    <li aria-current="page">
                        <div class="flex items-center">
                            <i class="fas fa-chevron-right text-gray-400 mx-2"></i>
                            <span class="ml-1 text-sm text-primary font-medium md:ml-2">Ingenieria</span>
                        </div>
                    </li>
                </ol>
            </nav>
        </div>
    </div>

    <!-- Encabezado -->
    <div class="mt-8 mb-8">
        <h1 class="text-3xl font-bold text-gray-800 mb-2">Procesos y Actividades Ingeniería</h1>
        <p class="text-gray-600">Documentación del procesos de entrega de servicios y soporte al cliente</p>
    </div>

    <!-- Procesos -->
    <div class="bg-white rounded-lg shadow p-6">
        <h2 class="text-2xl font-bold text-gray-800 mb-6"> Entrega de servicios y soporte al Cliente</h2>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <!-- Categoría 1 -->
            <a href="{{ route('estructurainterna.proceso-ingenieria') }}"
                class="group block bg-white border border-slate-200 rounded-xl overflow-hidden hover:border-orange-400 hover:shadow-lg transition-all duration-300">

                <!-- Imagen -->
                <div class="relative h-52 overflow-hidden">
                    <img src="{{ asset('storage/media/proceso-it-comercial.png') }}"
                        class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105"
                        alt="Proceso Comercial IT">
                    <!-- Overlay sutil -->
                    <div class="absolute inset-0 bg-gradient-to-t from-black/40 via-black/10 to-transparent"></div>
                </div>
                <!-- Contenido -->
                <div class="p-6 text-left">
                    <h3
                        class="text-base font-semibold text-slate-800 group-hover:text-orange-600 transition-colors duration-300">
                        Proceso Comercial IT
                    </h3>
                    <p class="text-sm text-slate-500 mt-2">
                        Fases para el cierre del proceso de implementación.
                    </p>
                    <div class="flex items-center justify-between mt-5 text-sm">
                        <span class="text-slate-400 group-hover:text-orange-600 transition-colors duration-300">
                            5 Fases
                        </span>
                        <span class="inline-flex items-center gap-1 text-orange-600 font-medium">
                            <i
                                class="las la-arrow-right text-base group-hover:translate-x-1 transition-transform duration-300"></i>
                        </span>
                    </div>
                </div>
            </a>

            <!-- Categoría 2 -->
            <a href="{{ route('estructurainterna.proceso-ingenieria.soporte-cliente') }}"
                class="group block bg-white border border-slate-200 rounded-xl overflow-hidden hover:border-orange-400 hover:shadow-lg transition-all duration-300">

                <!-- Imagen -->
                <div class="relative h-52 overflow-hidden">
                    <img src="{{ asset('storage/media/proceso-soporte.png') }}"
                        class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105"
                        alt="Proceso soporte IT">
                    <!-- Overlay sutil -->
                    <div class="absolute inset-0 bg-gradient-to-t from-black/40 via-black/10 to-transparent"></div>
                </div>
                <!-- Contenido -->
                <div class="p-6 text-left">
                    <h3
                        class="text-base font-semibold text-slate-800 group-hover:text-orange-600 transition-colors duration-300">
                        Soporte a Cliente
                    </h3>
                    <p class="text-sm text-slate-500 mt-2">
                        Transferencia de conocimiento al cliente para la adopción y uso de la
                        solución implementada.
                    </p>
                    <div class="flex items-center justify-between mt-5 text-sm">
                        <span class="text-slate-400 group-hover:text-orange-600 transition-colors duration-300">
                            36 archivos
                        </span>
                        <span class="inline-flex items-center gap-1 text-orange-600 font-medium">
                            <i
                                class="las la-arrow-right text-base group-hover:translate-x-1 transition-transform duration-300"></i>
                        </span>
                    </div>
                </div>
            </a>
        </div>
    </div>

    <!-- Proceso Internos -->
    <div class="bg-white rounded-lg shadow p-6 mt-8">
        <h2 class="text-2xl font-bold text-gray-800 mb-6">Proceso Interno</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <!-- Categoría 1 -->
            <a href="{{ route('estructurainterna.proceso-ingenieria.solicitud-poc') }}"
                class="group block bg-white border border-slate-200 rounded-xl overflow-hidden hover:border-orange-400 hover:shadow-lg transition-all duration-300">
                <!-- Imagen -->
                <div class="relative h-52 overflow-hidden">
                    <img src="{{ asset('storage/media/proceso-poc.png') }}"
                        class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105"
                        alt="prueba de concepto">
                    <!-- Overlay sutil -->
                    <div class="absolute inset-0 bg-gradient-to-t from-black/40 via-black/10 to-transparent"></div>
                </div>
                <!-- Contenido -->
                <div class="p-6">
                    <h3
                        class="text-base font-semibold text-slate-800 group-hover:text-orange-600 transition-colors duration-300">
                        Solicitud Prueba de concepto (PoC)
                    </h3>
                    <p class="text-sm text-slate-500 mt-2">
                        Proceso inicial y práctico para evaluar la viabilidad de la PoC.
                    </p>
                    <div class="flex items-center justify-between mt-5 text-sm">
                        <span class="text-slate-400 group-hover:text-orange-600 transition-colors duration-300">
                            5 Fases
                        </span>
                        <span class="inline-flex items-center gap-1 text-orange-600 font-medium">
                            <i
                                class="las la-arrow-right text-base group-hover:translate-x-1 transition-transform duration-300"></i>
                        </span>
                    </div>
                </div>
            </a>

            <!-- Categoría 2 -->
            <a href="{{ route('estructurainterna.proceso-ingenieria.mantto-preventivo') }}"
                class="group block bg-white border border-slate-200 rounded-xl overflow-hidden hover:border-orange-400 hover:shadow-lg transition-all duration-300">
                <!-- Imagen -->
                <div class="relative h-52 overflow-hidden">
                    <img src="{{ asset('storage/media/mantto-preventivo.png') }}"
                        class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105"
                        alt="Mantenimiento Preventivo">
                    <!-- Overlay sutil -->
                    <div class="absolute inset-0 bg-gradient-to-t from-black/40 via-black/10 to-transparent"></div>
                </div>
                <!-- Contenido -->
                <div class="p-6">
                    <h3
                        class="text-base font-semibold text-slate-800 group-hover:text-orange-600 transition-colors duration-300">
                        Mantenimiento Preventivo
                    </h3>
                    <p class="text-sm text-slate-500 mt-2">
                        Programación y documentación de mantenimientos preventivos después de implementación.
                    </p>
                    <div class="flex items-center justify-between mt-5 text-sm">
                        <span class="text-slate-400 group-hover:text-orange-600 transition-colors duration-300">
                            1 archivo
                        </span>
                        <span class="inline-flex items-center gap-1 text-orange-600 font-medium">
                            <i
                                class="las la-arrow-right text-base group-hover:translate-x-1 transition-transform duration-300"></i>
                        </span>
                    </div>
                </div>
            </a>

            <!-- Categoría 3 -->
            <a href="{{ route('estructurainterna.proceso-ingenieria.mantto-correctivo') }}"
                class="group block bg-white border border-slate-200 rounded-xl overflow-hidden hover:border-orange-400 hover:shadow-lg transition-all duration-300">
                <!-- Imagen -->
                <div class="relative h-52 overflow-hidden">
                    <img src="{{ asset('storage/media/mantto-correctivo.png') }}"
                        class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105"
                        alt="Mantenimiento Correctivo">
                    <!-- Overlay sutil -->
                    <div class="absolute inset-0 bg-gradient-to-t from-black/40 via-black/10 to-transparent"></div>
                </div>
                <!-- Contenido -->
                <div class="p-6">
                    <h3
                        class="text-base font-semibold text-slate-800 group-hover:text-orange-600 transition-colors duration-300">
                        Mantenimiento Correctivo
                    </h3>
                    <p class="text-sm text-slate-500 mt-2">
                        Protocolo de mantenimiento correctivo ante una falla por nivel de severidad.
                    </p>
                    <div class="flex items-center justify-between mt-5 text-sm">
                        <span class="text-slate-400 group-hover:text-orange-600 transition-colors duration-300">
                            1 archivo
                        </span>
                        <span class="inline-flex items-center gap-1 text-orange-600 font-medium">
                            <i
                                class="las la-arrow-right text-base group-hover:translate-x-1 transition-transform duration-300"></i>
                        </span>
                    </div>
                </div>
            </a>
        </div>
    </div>

    <!-- 3era seccion -->
    <div class="bg-white rounded-lg shadow p-6 mt-8">
        <h2 class="text-2xl font-bold text-gray-800 mb-6"> Apoyo y Conocimiento de Actividades</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <!-- Categoría 1 -->
            <a href="{{ route('ingenieria.guias-on-site') }}"
                class="group block bg-white border border-slate-200 rounded-xl overflow-hidden hover:border-orange-400 hover:shadow-lg transition-all duration-300">
                <!-- Imagen -->
                <div class="relative h-52 overflow-hidden">
                    <img src="{{ asset('storage/media/guias-on-site.png') }}"
                        class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105"
                        alt="Proceso Comercial IT">
                    <!-- Overlay sutil -->
                    <div class="absolute inset-0 bg-gradient-to-t from-black/40 via-black/10 to-transparent"></div>
                </div>
                <!-- Contenido -->
                <div class="p-6 text-left">
                    <h3
                        class="text-base font-semibold text-slate-800 group-hover:text-orange-600 transition-colors duration-300">
                        Guias de Trabajo on Site
                    </h3>
                    <p class="text-sm text-slate-500 mt-2">
                        Documentos y guias paso a paso para desempeñar la actividad necesaria.
                    </p>
                    <div class="flex items-center justify-between mt-5 text-sm">
                        <span class="text-slate-400 group-hover:text-orange-600 transition-colors duration-300">
                            Ir al portal
                        </span>
                        <span class="inline-flex items-center gap-1 text-orange-600 font-medium">
                            <i
                                class="las la-arrow-right text-base group-hover:translate-x-1 transition-transform duration-300"></i>
                        </span>
                    </div>
                </div>
            </a>

            <!-- Categoría 2 -->
            <a href="{{ route('ingenieria.clientes-polizas') }}"
                class="group block bg-white border border-slate-200 rounded-xl overflow-hidden hover:border-orange-400 hover:shadow-lg transition-all duration-300">
                <!-- Imagen -->
                <div class="relative h-52 overflow-hidden">
                    <img src="{{ asset('storage/media/polizas-inventario.png') }}"
                        class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105"
                        alt="Proceso soporte IT">
                    <!-- Overlay sutil -->
                    <div class="absolute inset-0 bg-gradient-to-t from-black/40 via-black/10 to-transparent"></div>
                </div>
                <!-- Contenido -->
                <div class="p-6 text-left">
                    <h3
                        class="text-base font-semibold text-slate-800 group-hover:text-orange-600 transition-colors duration-300">
                        Gestión de Servicios Contratados
                    </h3>
                    <p class="text-sm text-slate-500 mt-2">
                        Polizas vigentes e inventarios de Clientes con servicios contratados con Netjer.
                    </p>
                    <div class="flex items-center justify-between mt-5 text-sm">
                        <span class="text-slate-400 group-hover:text-orange-600 transition-colors duration-300">
                            Ir al portal
                        </span>
                        <span class="inline-flex items-center gap-1 text-orange-600 font-medium">
                            <i
                                class="las la-arrow-right text-base group-hover:translate-x-1 transition-transform duration-300"></i>
                        </span>
                    </div>
                </div>
            </a>
        </div>
    </div>
@endsection
@push('js')
@endpush
