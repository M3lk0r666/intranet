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
                            <a href="{{ route('intranet.procesos-empresariales') }}"
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
            <a href="{{ route('intranet.administracion.alta-colaborador') }}"
                class="group bg-white border border-slate-200 rounded-2xl p-6 hover:shadow-md transition">
                <div class="flex items-start gap-4">
                    <div class="p-3 rounded-xl bg-green-50 text-green-600">
                        <i class="las la-user-plus text-xl"></i>
                    </div>
                    <div>
                        <h3 class="font-semibold text-slate-800 group-hover:text-orange-600">
                            Alta de Personal
                        </h3>
                        <p class="text-sm text-slate-500 mt-1">
                            Procedimiento de contratación y bienvenida.
                        </p>
                    </div>
                </div>
                <span class="mt-4 text-sm text-orange-600 flex items-center gap-1">
                    Ver procedimiento
                    <i class="las la-arrow-right"></i>
                </span>
            </a>
            <!-- Baja -->
            <a href="{{ route('intranet.administracion.baja-colaborador') }}"
                class="group bg-white border border-slate-200 rounded-2xl p-6 hover:shadow-md transition">
                <div class="flex items-start gap-4">
                    <div class="p-3 rounded-xl bg-red-50 text-red-600">
                        <i class="las la-user-minus text-xl"></i>
                    </div>
                    <div>
                        <h3 class="font-semibold text-slate-800 group-hover:text-orange-600">
                            Baja de Personal
                        </h3>
                        <p class="text-sm text-slate-500 mt-1">
                            Proceso de desvinculación y entrega de activos.
                        </p>
                    </div>
                </div>
                <span class="mt-4 text-sm text-orange-600 flex items-center gap-1">
                    Ver procedimiento
                    <i class="las la-arrow-right"></i>
                </span>
            </a>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 py-6">
            <!-- horario -->
            <a href="{{ route('intranet.administracion.horario-laboral') }}"
                class="group bg-white border border-slate-200 rounded-2xl p-6 hover:shadow-md transition">
                <div class="flex items-start gap-4">
                    <div class="p-3 rounded-xl bg-yellow-50 text-yellow-600">
                        <i class="las la-calendar text-xl"></i>
                    </div>
                    <div>
                        <h3 class="font-semibold text-slate-800 group-hover:text-orange-600">
                            Horario Laboral
                        </h3>
                        <p class="text-sm text-slate-500 mt-1">
                            Registro de asistencia, turnos rotativos y cumplimiento de jornada
                        </p>
                    </div>
                </div>
                <span class="mt-4 text-sm text-orange-600 flex items-center gap-1">
                    Ver procedimiento
                    <i class="las la-arrow-right"></i>
                </span>
            </a>
            <!-- incidencia -->
            <a href="{{ route('intranet.administracion.incidencias') }}"
                class="group bg-white border border-slate-200 rounded-2xl p-6 hover:shadow-md transition">
                <div class="flex items-start gap-4">
                    <div class="p-3 rounded-xl bg-pink-50 text-pink-600">
                        <i class="las la-calendar-times text-xl"></i>
                    </div>
                    <div>
                        <h3 class="font-semibold text-slate-800 group-hover:text-orange-600">
                            Incidencias
                        </h3>
                        <p class="text-sm text-slate-500 mt-1">
                            Reporte de nómina, faltas, retardos y bonificaciones extraordinarias
                        </p>
                    </div>
                </div>
                <span class="mt-4 text-sm text-orange-600 flex items-center gap-1">
                    Ver procedimiento
                    <i class="las la-arrow-right"></i>
                </span>
            </a>
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
            <a href="{{ route('intranet.administracion.uso-camioneta') }}"
                class="group bg-white border border-slate-200 rounded-2xl p-6 hover:shadow-md transition">
                <div class="flex items-start gap-4">
                    <div class="p-3 rounded-xl bg-purple-50 text-purple-600">
                        <i class="las la-car-side text-xl"></i>
                    </div>
                    <div>
                        <h3 class="font-semibold text-slate-800 group-hover:text-orange-600">
                            Uso del Vehiculo
                        </h3>
                        <p class="text-sm text-slate-500 mt-1">
                            Control de bitácoras, mantenimiento y asignación de vehículos.
                        </p>
                    </div>
                </div>
                <span class="mt-4 text-sm text-orange-600 flex items-center gap-1">
                    Ver procedimiento
                    <i class="las la-arrow-right"></i>
                </span>
            </a>
            <!-- inventario -->
            <a href="{{ route('intranet.administracion.facturacion-inventario') }}"
                class="group bg-white border border-slate-200 rounded-2xl p-6 hover:shadow-md transition">
                <div class="flex items-start gap-4">
                    <div class="p-3 rounded-xl bg-blue-50 text-blue-600">
                        <i class="las la-user-minus text-xl"></i>
                    </div>
                    <div>
                        <h3 class="font-semibold text-slate-800 group-hover:text-orange-600">
                            Inventario y Facturación
                        </h3>
                        <p class="text-sm text-slate-500 mt-1">
                            Control de existencias, flujo de ventas y emisión de facturas fiscales.
                        </p>
                    </div>
                </div>
                <span class="mt-4 text-sm text-orange-600 flex items-center gap-1">
                    Ver procedimiento
                    <i class="las la-arrow-right"></i>
                </span>
            </a>
        </div>


    </div>
@endsection
