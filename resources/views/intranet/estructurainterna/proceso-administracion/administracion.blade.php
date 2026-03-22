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
                            <a href="{{ route('procesos-empresariales') }}"
                                class="ml-1 text-sm text-gray-600 hover:text-orange-600 md:ml-2">Procesos Empresariales</a>
                        </div>
                    </li>
                    <li aria-current="page">
                        <div class="flex items-center">
                            <i class="fas fa-chevron-right text-gray-400 mx-2"></i>
                            <span class="ml-1 text-sm text-primary font-medium md:ml-2">Administración y Finanzas</span>
                        </div>
                    </li>
                </ol>
            </nav>
        </div>
    </div>

    <div class="bg-white rounded-lg shadow p-6 mt-4">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <div class="mb-8">
                <h1 class="text-2xl font-semibold text-slate-800 flex items-center gap-2">
                    <i class="las la-users text-orange-500"></i>
                    Recursos Humanos
                </h1>

                <p class="text-slate-500 mt-1 text-sm">
                    Gestión del ciclo de vida del colaborador y procesos administrativos.
                </p>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
            <!-- Alta -->
            <div
                class="group flex flex-col bg-white dark:bg-slate-900/50 border border-slate-200 dark:border-slate-800 rounded-xl overflow-hidden hover:border-primary transition-all duration-300 shadow-sm hover:shadow-xl">
                <!-- Imagen -->
                <div class="h-48 overflow-hidden relative">
                    <div class="w-full h-full bg-center bg-cover transition-transform duration-500 group-hover:scale-105"
                        style='background-image: url({{ asset('assets/media/alta-personal.png') }});'>
                    </div>
                </div>
                <!-- Contenido -->
                <div class="p-6 flex flex-col gap-3">
                    <h3 class="text-xl font-bold text-slate-900 dark:text-slate-100">
                        Alta de Personal
                    </h3>
                    <p class="text-slate-600 dark:text-slate-400 text-sm leading-relaxed">
                        Procedimiento de contratación y bienvenida.
                    </p>
                    <a class="mt-4 flex items-center gap-2 text-primary font-bold text-sm group-hover:translate-x-1 transition-transform"
                        href="{{ route('administracion.alta-colaborador') }}">
                        Ver procedimiento
                        <i class="las la-arrow-right text-sm"></i>
                    </a>
                </div>
            </div>
            <!-- Baja -->
            <div
                class="group flex flex-col bg-white dark:bg-slate-900/50 border border-slate-200 dark:border-slate-800 rounded-xl overflow-hidden hover:border-primary transition-all duration-300 shadow-sm hover:shadow-xl">
                <!-- Imagen -->
                <div class="h-48 overflow-hidden relative">
                    <div class="w-full h-full bg-center bg-cover transition-transform duration-500 group-hover:scale-105"
                        style='background-image: url({{ asset('assets/media/baja-personal.png') }});'>
                    </div>
                </div>
                <!-- Contenido -->
                <div class="p-6 flex flex-col gap-3">
                    <h3 class="text-xl font-bold text-slate-900 dark:text-slate-100">
                        Baja de Personal
                    </h3>
                    <p class="text-slate-600 dark:text-slate-400 text-sm leading-relaxed">
                        Proceso de desvinculación y entrega de activos.
                    </p>
                    <a class="mt-4 flex items-center gap-2 text-primary font-bold text-sm group-hover:translate-x-1 transition-transform"
                        href="{{ route('administracion.baja-colaborador') }}">
                        Ver procedimiento
                        <i class="las la-arrow-right text-sm"></i>
                    </a>
                </div>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 py-6">
            <!-- horario -->
            <div
                class="group flex flex-col bg-white dark:bg-slate-900/50 border border-slate-200 dark:border-slate-800 rounded-xl overflow-hidden hover:border-primary transition-all duration-300 shadow-sm hover:shadow-xl">
                <!-- Imagen -->
                <div class="h-48 overflow-hidden relative">
                    <div class="w-full h-full bg-center bg-cover transition-transform duration-500 group-hover:scale-105"
                        style='background-image: url({{ asset('assets/media/horario-laboral.png') }});'>
                    </div>
                </div>
                <!-- Contenido -->
                <div class="p-6 flex flex-col gap-3">
                    <h3 class="text-xl font-bold text-slate-900 dark:text-slate-100">
                        Horario Laboral
                    </h3>
                    <p class="text-slate-600 dark:text-slate-400 text-sm leading-relaxed">
                        Registro de asistencia, turnos rotativos y cumplimiento de jornada.
                    </p>
                    <a class="mt-4 flex items-center gap-2 text-primary font-bold text-sm group-hover:translate-x-1 transition-transform"
                        href="{{ route('administracion.horario-laboral') }}">
                        Ver procedimiento
                        <i class="las la-arrow-right text-sm"></i>
                    </a>
                </div>
            </div>
            <!-- incidencia -->
            <div
                class="group flex flex-col bg-white dark:bg-slate-900/50 border border-slate-200 dark:border-slate-800 rounded-xl overflow-hidden hover:border-primary transition-all duration-300 shadow-sm hover:shadow-xl">
                <!-- Imagen -->
                <div class="h-48 overflow-hidden relative">
                    <div class="w-full h-full bg-center bg-cover transition-transform duration-500 group-hover:scale-105"
                        style='background-image: url({{ asset('assets/media/incidencia-laboral.png') }});'>
                    </div>
                </div>
                <!-- Contenido -->
                <div class="p-6 flex flex-col gap-3">
                    <h3 class="text-xl font-bold text-slate-900 dark:text-slate-100">
                        Incidencias Laborales
                    </h3>
                    <p class="text-slate-600 dark:text-slate-400 text-sm leading-relaxed">
                        Reporte de nómina, faltas, retardos y bonificaciones extraordinarias.
                    </p>
                    <a class="mt-4 flex items-center gap-2 text-primary font-bold text-sm group-hover:translate-x-1 transition-transform"
                        href="{{ route('administracion.incidencias') }}">
                        Ver procedimiento
                        <i class="las la-arrow-right text-sm"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="bg-white rounded-lg shadow p-6 mt-4">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-6">
            <div class="mb-8">
                <h1 class="text-2xl font-semibold text-slate-800 flex items-center gap-2">
                    <i class="las la-cog text-orange-500"></i>
                    Recursos Materiales
                </h1>
                <p class="text-slate-500 mt-1 text-sm">
                    Procedimiento para el uso adecuado del vehiculo. Asi como el procedimiento de Inventario y Facturación.
                </p>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
            <!-- vehiculo -->
            <div
                class="group flex flex-col bg-white dark:bg-slate-900/50 border border-slate-200 dark:border-slate-800 rounded-xl overflow-hidden hover:border-primary transition-all duration-300 shadow-sm hover:shadow-xl">
                <!-- Imagen -->
                <div class="h-48 overflow-hidden relative">
                    <div class="w-full h-full bg-center bg-cover transition-transform duration-500 group-hover:scale-105"
                        style='background-image: url({{ asset('assets/media/uso-vehiculo.png') }});'>
                    </div>
                </div>
                <!-- Contenido -->
                <div class="p-6 flex flex-col gap-3">
                    <h3 class="text-xl font-bold text-slate-900 dark:text-slate-100">
                        Uso del Vehiculo
                    </h3>
                    <p class="text-slate-600 dark:text-slate-400 text-sm leading-relaxed">
                        Control de bitácoras, mantenimiento y asignación de vehículos.
                    </p>
                    <a class="mt-4 flex items-center gap-2 text-primary font-bold text-sm group-hover:translate-x-1 transition-transform"
                        href="{{ route('administracion.uso-camioneta') }}">
                        Ver procedimiento
                        <i class="las la-arrow-right text-sm"></i>
                    </a>
                </div>
            </div>
            <!-- inventario -->
            <div
                class="group flex flex-col bg-white dark:bg-slate-900/50 border border-slate-200 dark:border-slate-800 rounded-xl overflow-hidden hover:border-primary transition-all duration-300 shadow-sm hover:shadow-xl">
                <!-- Imagen -->
                <div class="h-48 overflow-hidden relative">
                    <div class="w-full h-full bg-center bg-cover transition-transform duration-500 group-hover:scale-105"
                        style='background-image: url({{ asset('assets/media/facturacion-inventario.png') }});'>
                    </div>
                </div>
                <!-- Contenido -->
                <div class="p-6 flex flex-col gap-3">
                    <h3 class="text-xl font-bold text-slate-900 dark:text-slate-100">
                        Inventario y Facturación
                    </h3>
                    <p class="text-slate-600 dark:text-slate-400 text-sm leading-relaxed">
                        Control de existencias, flujo de ventas y emisión de facturas fiscales.
                    </p>
                    <a class="mt-4 flex items-center gap-2 text-primary font-bold text-sm group-hover:translate-x-1 transition-transform"
                        href="{{ route('administracion.facturacion-inventario') }}">
                        Ver procedimiento
                        <i class="las la-arrow-right text-sm"></i>
                    </a>
                </div>
            </div>
        </div>


    </div>
@endsection
