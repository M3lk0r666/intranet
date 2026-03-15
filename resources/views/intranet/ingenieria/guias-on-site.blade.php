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
                    <li>
                        <div class="flex items-center">
                            <i class="fas fa-chevron-right text-gray-400 mx-2"></i>
                            <a href="{{ route('intranet.estructurainterna.ingenieria') }}"
                                class="ml-1 text-sm text-gray-600 hover:text-orange-600 md:ml-2">Ingenieria
                            </a>
                        </div>
                    </li>
                    <li aria-current="page">
                        <div class="flex items-center">
                            <i class="fas fa-chevron-right text-gray-400 mx-2"></i>
                            <span class="ml-1 text-sm text-primary font-medium md:ml-2">Guias On Site</span>
                        </div>
                    </li>
                </ol>
            </nav>
        </div>
    </div>

    <!-- Encabezado -->
    <div class="mt-8 mb-8">
        <h1 class="text-3xl font-bold text-gray-800 mb-2">Guias de Trabajo</h1>
        <p class="text-gray-600">Documentación y guias paso a paso para la realización de una actividad en concreto</p>
    </div>

    <!-- Procesos -->
    <div class="bg-white rounded-lg shadow p-6">
        <h2 class="text-2xl font-bold text-gray-800 mb-6"> Listado de Guias de Actividades</h2>

        <!-- Grid guias -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-8">
            <!-- CARD1 -->
            <a href="{{ route('intranet.ingenieria.instalacion-switch') }}"
                class="group relative block bg-white border border-slate-200 rounded-2xl p-6 hover:border-orange-400 hover:shadow-xl hover:-translate-y-1 transition-all duration-300">
                <!-- categoría -->
                <span class="absolute top-4 right-4 text-xs font-semibold text-pink-600 bg-pink-100 px-3 py-1 rounded-full">
                    Infraestructura
                </span>
                <!-- icono -->
                <div
                    class="w-14 h-14 flex items-center justify-center rounded-xl bg-orange-50 text-orange-600 mb-5 group-hover:scale-110 transition-transform">
                    <i class="las la-network-wired text-2xl"></i>
                </div>
                <!-- titulo -->
                <h3 class="text-lg font-semibold text-slate-800 group-hover:text-orange-600 transition">
                    Implementación Switches
                </h3>
                <!-- descripcion -->
                <p class="text-sm text-slate-500 mt-2 leading-relaxed">
                    Guía de actividades en la implementación de switches.
                </p>
                <!-- footer -->
                <div class="flex items-center justify-between mt-6 text-sm">
                    <span class="text-slate-400">
                        21/02/2026
                    </span>
                    <span
                        class="flex items-center gap-1 text-orange-500 font-medium opacity-0 group-hover:opacity-100 transition">
                        Abrir
                        <i class="las la-arrow-right"></i>
                    </span>
                </div>
            </a>

            <!-- CARD2 -->
            <a href="{{ route('intranet.ingenieria.instalacion-firewall') }}"
                class="group relative block bg-white border border-slate-200 rounded-2xl p-6 hover:border-orange-400 hover:shadow-xl hover:-translate-y-1 transition-all duration-300">
                <span
                    class="absolute top-4 right-4 text-xs font-semibold text-purple-600 bg-purple-100 px-3 py-1 rounded-full">
                    Seguridad
                </span>
                <div
                    class="w-14 h-14 flex items-center justify-center rounded-xl bg-orange-50 text-orange-600 mb-5 group-hover:scale-110 transition-transform">
                    <i class="las la-shield-alt text-2xl"></i>
                </div>
                <h3 class="text-lg font-semibold text-slate-800 group-hover:text-orange-600 transition">
                    Implementación Firewalls
                </h3>
                <p class="text-sm text-slate-500 mt-2 leading-relaxed">
                    Guía de actividades en la implementación de firewall.
                </p>
                <div class="flex items-center justify-between mt-6 text-sm">
                    <span class="text-slate-400">
                        21/02/2026
                    </span>
                    <span
                        class="flex items-center gap-1 text-orange-500 font-medium opacity-0 group-hover:opacity-100 transition">
                        Abrir
                        <i class="las la-arrow-right"></i>
                    </span>
                </div>
            </a>

            <!-- CARD3 -->
            <a href="{{ route('intranet.ingenieria.instalacion-aps') }}"
                class="group relative block bg-white border border-slate-200 rounded-2xl p-6 hover:border-orange-400 hover:shadow-xl hover:-translate-y-1 transition-all duration-300">
                <span
                    class="absolute top-4 right-4 text-xs font-semibold text-green-600 bg-green-100 px-3 py-1 rounded-full">
                    Guía de Actividades
                </span>
                <div
                    class="w-14 h-14 flex items-center justify-center rounded-xl bg-orange-50 text-orange-600 mb-5 group-hover:scale-110 transition-transform">
                    <i class="las la-file text-2xl"></i>
                </div>
                <h3 class="text-lg font-semibold text-slate-800 group-hover:text-orange-600 transition">
                    Implementación Acces Points
                </h3>
                <p class="text-sm text-slate-500 mt-2 leading-relaxed">
                    Guía de actividades en la implementación de antenas inalambricas.
                </p>
                <div class="flex items-center justify-between mt-6 text-sm">
                    <span class="text-slate-400">
                        21/02/2026
                    </span>
                    <span
                        class="flex items-center gap-1 text-orange-500 font-medium opacity-0 group-hover:opacity-100 transition">
                        Abrir
                        <i class="las la-arrow-right"></i>
                    </span>
                </div>
            </a>

            <!-- CARD4 -->
            <a href="{{ route('intranet.ingenieria.instalacion-poc') }}"
                class="group relative block bg-white border border-slate-200 rounded-2xl p-6 hover:border-orange-400 hover:shadow-xl hover:-translate-y-1 transition-all duration-300">
                <span
                    class="absolute top-4 right-4 text-xs font-semibold text-green-600 bg-green-100 px-3 py-1 rounded-full">
                    Guía de Actividades
                </span>
                <div
                    class="w-14 h-14 flex items-center justify-center rounded-xl bg-orange-50 text-orange-600 mb-5 group-hover:scale-110 transition-transform">
                    <i class="las la-file text-2xl"></i>
                </div>
                <h3 class="text-lg font-semibold text-slate-800 group-hover:text-orange-600 transition">
                    Prueba de Concepto
                </h3>
                <p class="text-sm text-slate-500 mt-2 leading-relaxed">
                    Guía de actividades para realizar una PoC.
                </p>
                <div class="flex items-center justify-between mt-6 text-sm">
                    <span class="text-slate-400">
                        21/02/2026
                    </span>
                    <span
                        class="flex items-center gap-1 text-orange-500 font-medium opacity-0 group-hover:opacity-100 transition">
                        Abrir
                        <i class="las la-arrow-right"></i>
                    </span>
                </div>
            </a>

            <!-- CARD5 -->
            <a href="{{ route('intranet.ingenieria.guia-preventivo') }}"
                class="group relative block bg-white border border-slate-200 rounded-2xl p-6 hover:border-orange-400 hover:shadow-xl hover:-translate-y-1 transition-all duration-300">
                <span
                    class="absolute top-4 right-4 text-xs font-semibold text-green-600 bg-green-100 px-3 py-1 rounded-full">
                    Guía de Actividades
                </span>
                <div
                    class="w-14 h-14 flex items-center justify-center rounded-xl bg-orange-50 text-orange-600 mb-5 group-hover:scale-110 transition-transform">
                    <i class="las la-file text-2xl"></i>
                </div>
                <h3 class="text-lg font-semibold text-slate-800 group-hover:text-orange-600 transition">
                    Mantenimiento Preventivo
                </h3>
                <p class="text-sm text-slate-500 mt-2 leading-relaxed">
                    Guía de actividades para la realización de mantenimineto preventivo.
                </p>
                <div class="flex items-center justify-between mt-6 text-sm">
                    <span class="text-slate-400">
                        21/02/2026
                    </span>
                    <span
                        class="flex items-center gap-1 text-orange-500 font-medium opacity-0 group-hover:opacity-100 transition">
                        Abrir
                        <i class="las la-arrow-right"></i>
                    </span>
                </div>
            </a>

            <!-- CARD6 -->
            <a href="{{ route('intranet.ingenieria.guia-correctivo') }}"
                class="group relative block bg-white border border-slate-200 rounded-2xl p-6 hover:border-orange-400 hover:shadow-xl hover:-translate-y-1 transition-all duration-300">
                <span
                    class="absolute top-4 right-4 text-xs font-semibold text-green-600 bg-green-100 px-3 py-1 rounded-full">
                    Guía de Actividades
                </span>
                <div
                    class="w-14 h-14 flex items-center justify-center rounded-xl bg-orange-50 text-orange-600 mb-5 group-hover:scale-110 transition-transform">
                    <i class="las la-file text-2xl"></i>
                </div>
                <h3 class="text-lg font-semibold text-slate-800 group-hover:text-orange-600 transition">
                    Mantenimiento Correctivo
                </h3>
                <p class="text-sm text-slate-500 mt-2 leading-relaxed">
                    Guía de actividades para la realización de mantenimineto correctivo.
                </p>
                <div class="flex items-center justify-between mt-6 text-sm">
                    <span class="text-slate-400">
                        21/02/2026
                    </span>
                    <span
                        class="flex items-center gap-1 text-orange-500 font-medium opacity-0 group-hover:opacity-100 transition">
                        Abrir
                        <i class="las la-arrow-right"></i>
                    </span>
                </div>
            </a>

            <!-- CARD7 -->
            <a href="{{ route('intranet.ingenieria.site-survey') }}"
                class="group relative block bg-white border border-slate-200 rounded-2xl p-6 hover:border-orange-400 hover:shadow-xl hover:-translate-y-1 transition-all duration-300">
                <span
                    class="absolute top-4 right-4 text-xs font-semibold text-green-600 bg-green-100 px-3 py-1 rounded-full">
                    Guía de Actividades
                </span>
                <div
                    class="w-14 h-14 flex items-center justify-center rounded-xl bg-orange-50 text-orange-600 mb-5 group-hover:scale-110 transition-transform">
                    <i class="las la-file text-2xl"></i>
                </div>
                <h3 class="text-lg font-semibold text-slate-800 group-hover:text-orange-600 transition">
                    Guia para Site Survey
                </h3>
                <p class="text-sm text-slate-500 mt-2 leading-relaxed">
                    Guía de actividades para la realización de Site Survey.
                </p>
                <div class="flex items-center justify-between mt-6 text-sm">
                    <span class="text-slate-400">
                        21/02/2026
                    </span>
                    <span
                        class="flex items-center gap-1 text-orange-500 font-medium opacity-0 group-hover:opacity-100 transition">
                        Abrir
                        <i class="las la-arrow-right"></i>
                    </span>
                </div>
            </a>
        </div>
    </div>






@endsection
@push('js')
@endpush
