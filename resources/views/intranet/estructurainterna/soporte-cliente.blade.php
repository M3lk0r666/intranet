@extends('layouts.intranet')

@section('title', 'Intranet Corporativa')

@push('css')
    <link href="/assets/css/intrahome.css" rel="stylesheet">
    <link href="/assets/css/procesos.css" rel="stylesheet">
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
                    <li>
                        <div class="flex items-center">
                            <i class="fas fa-chevron-right text-gray-400 mx-2"></i>
                            <a href="{{ route('estructurainterna.ingenieria') }}"
                                class="ml-1 text-sm text-gray-600 hover:text-orange-600 md:ml-2">Ingenieria
                            </a>
                        </div>
                    </li>
                    <li aria-current="page">
                        <div class="flex items-center">
                            <i class="fas fa-chevron-right text-gray-400 mx-2"></i>
                            <span class="ml-1 text-sm text-primary font-medium md:ml-2">Soporte a Cliente</span>
                        </div>
                    </li>
                </ol>
            </nav>
        </div>
    </div>

    <!-- Encabezado -->


    <div class="mt-8 mb-6 anim-up">
        <div class="flex items-center gap-2 text-sm text-orange-600 font-semibold mb-2">
            <i class="las la-cogs"></i>
            <span class="uppercase tracking-wider text-xs">Proceso Empresarial</span>
        </div>
        <h1 class="text-3xl md:text-4xl font-extrabold text-gray-900 mb-2 tracking-tight">
            Proceso Ingeniería IT - Soporte a Cliente
        </h1>
        <p class="text-gray-600 text-base md:text-lg">Procesos para la adopción y uso de la solución implementada.</p>
    </div>

    <!-- Encabezado del Proceso -->
    <div class="process-hero p-6 md:p-8 mb-8 anim-up">
        <div class="flex flex-col md:flex-row md:items-start gap-6 mb-6">
            <div class="hero-icon shrink-0">
                <i class="las la-laptop-code"></i>
            </div>
            <div class="flex-1">
                <div class="flex flex-wrap items-center gap-3 mb-3">
                    <span
                        class="inline-flex items-center bg-green-100 text-green-800 text-xs font-semibold px-3 py-1.5 rounded-full">
                        <span class="w-2 h-2 bg-green-500 rounded-full mr-2 animate-pulse"></span> Activo
                    </span>
                    <span
                        class="inline-flex items-center text-gray-600 text-sm bg-white border border-gray-200 px-3 py-1.5 rounded-full">
                        <i class="far fa-calendar-alt mr-2 text-orange-500"></i> Última actualización: 01/01/2026
                    </span>
                    <span
                        class="inline-flex items-center text-gray-600 text-sm bg-white border border-gray-200 px-3 py-1.5 rounded-full">
                        <i class="fas fa-user-tie mr-2 text-orange-500"></i> Responsable: Jose Carlos Torres
                    </span>
                </div>
                <p class="text-gray-700 text-base md:text-lg leading-relaxed text-justify">
                    Acompañar al cliente en la correcta adopción y uso de la solución implementada, asegurando su operación
                    continua y eficiente, atendiendo las posibles incidencias o fallas que se presenten durante el tiempo de
                    soporte al cliente.
                </p>
            </div>
        </div>

        <!-- Stats -->
        <div class="grid grid-cols-2 md:grid-cols-4 gap-3 md:gap-4">
            <div class="stat-card text-center">
                <div class="stat-icon"><i class="las la-layer-group"></i></div>
                <div class="text-2xl font-extrabold text-gray-900">4</div>
                <div class="text-xs md:text-sm text-gray-500 font-medium">Fases</div>
            </div>
            <div class="stat-card text-center">
                <div class="stat-icon"><i class="las la-tasks"></i></div>
                <div class="text-2xl font-extrabold text-gray-900">19</div>
                <div class="text-xs md:text-sm text-gray-500 font-medium">Actividades</div>
            </div>
            <div class="stat-card text-center">
                <div class="stat-icon"><i class="las la-file-alt"></i></div>
                <div class="text-2xl font-extrabold text-gray-900">6</div>
                <div class="text-xs md:text-sm text-gray-500 font-medium">Documentos Entregables</div>
            </div>
            <div class="stat-card text-center">
                <div class="stat-icon"><i class="las la-users"></i></div>
                <div class="text-2xl font-extrabold text-gray-900">4</div>
                <div class="text-xs md:text-sm text-gray-500 font-medium">Personas Involucradas</div>
            </div>
        </div>
    </div>


    <!-- Navegación sticky de fases -->
    <div
        class="sticky top-16 z-40 bg-white/85 backdrop-blur-md border border-slate-200 rounded-2xl py-3 px-4 mb-8 hidden lg:block shadow-sm">
        <div class="flex items-center justify-between gap-4">
            <h2 class="text-sm font-bold text-gray-700 uppercase tracking-wider whitespace-nowrap">
                <i class="las la-stream text-orange-500 mr-1"></i> Fases del Proceso
            </h2>
            <div class="flex justify-center gap-2 flex-wrap">
                <a href="#fase-1" class="phase-nav-pill" style="background:#3b82f6;">
                    <span class="bg-white/25 rounded-full w-5 h-5 flex items-center justify-center text-[10px]">1</span>
                    Incidentes
                </a>
                <a href="#fase-2" class="phase-nav-pill" style="background:#8b5cf6;">
                    <span class="bg-white/25 rounded-full w-5 h-5 flex items-center justify-center text-[10px]">2</span>
                    Problemas
                </a>
                <a href="#fase-3" class="phase-nav-pill" style="background:#ec4899;">
                    <span class="bg-white/25 rounded-full w-5 h-5 flex items-center justify-center text-[10px]">3</span>
                    Cambios
                </a>
                <a href="#fase-4" class="phase-nav-pill" style="background:#f59e0b;">
                    <span class="bg-white/25 rounded-full w-5 h-5 flex items-center justify-center text-[10px]">4</span>
                    Monotirización y Reportes
                </a>
            </div>
        </div>
    </div>

    <!-- Pasos Detallados del Proceso -->
    <div class="flex flex-col lg:flex-row gap-8 mb-12">
        <!-- Contenido Principal -->
        <div class="lg:w-2/3">
            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6 md:p-8">
                <div class="flex items-center justify-between mb-6">
                    <h2 class="text-2xl font-bold text-gray-900 flex items-center gap-2">
                        <i class="las la-list-ol text-orange-500"></i>
                        Pasos Detallados del Proceso
                    </h2>
                    <span class="text-xs font-medium text-gray-500 bg-gray-100 px-3 py-1 rounded-full">
                        5 fases
                    </span>
                </div>

                <div class="space-y-5">
                    <!-- Paso 1 -->
                    <div class="process-step phase-1" id="fase-1">
                        <div class="flex items-start gap-4 mb-3">
                            <div class="phase-number">01</div>
                            <div class="flex-1">
                                <span class="phase-pill"><i class="las la-flag"></i> Fase 1</span>
                                <h3 class="text-lg md:text-xl font-bold text-gray-900 mt-2">
                                    Gestión de Incidentes
                                </h3>
                            </div>
                        </div>

                        <div class="step-section">
                            <div class="step-section-title">
                                <span class="icon"><i class="las la-bullseye"></i></span> Objetivo
                            </div>
                            <p class="text-gray-600 pl-1">Restablecer la operación normal del servicio lo mas rapido
                                posible tras una interrupción,
                                minimizando el impacto en las operaciones del negocio y asegurando la mejor calidad de
                                servicios.</p>
                        </div>

                        <div class="step-section">
                            <div class="step-section-title">
                                <span class="icon"><i class="las la-tasks"></i></span> Actividades Clave
                            </div>
                            <ul class="clean">
                                <li>Registrar y categorizar todos los incidesntes recibidos en el sistema de gestion de
                                    incidencias.</li>
                                <li>Priorizar los incidentges segun el impacto y uregencia para la empresa.</li>
                                <li>Asignar el incidente al equipo técnico adecuado para su resolución</li>
                                <li>Realizar un seguimiento continuio del proceso de la resolución</li>
                                <li>Confirmar la solución con el cliente y cerrar el incidente con un registro detallado
                                </li>
                            </ul>
                        </div>

                        <div class="step-section">
                            <div class="step-section-title">
                                <span class="icon"><i class="las la-file-alt"></i></span> Entregables
                            </div>
                            <ul class="clean">
                                <li>Reporte de incidencias</li>
                                <li>Reporte cumplimineto SLA</li>
                            </ul>
                        </div>

                        <div class="step-section">
                            <div class="step-section-title">
                                <span class="icon"><i class="las la-users"></i></span> Participantes
                            </div>
                            <div class="flex flex-wrap gap-2">
                                <span class="participant-tag pt-purple"><i class="las la-user-tie"></i> Service
                                    Operations/Support</span>
                                <span class="participant-tag pt-yellow"><i class="las la-user-cog"></i> Mesa de
                                    Ayuda</span>
                                <span class="participant-tag pt-red"><i class="las la-users-cog"></i> Cliente o
                                    Representante</span>
                            </div>
                        </div>

                        <div class="flex items-center gap-3 text-sm text-gray-500 mt-4 pt-4 border-t border-gray-100">
                            <span class="inline-flex items-center gap-1.5 bg-gray-50 px-3 py-1 rounded-full">
                                <i class="far fa-clock text-blue-500"></i> Duración: 1-3 días
                            </span>
                        </div>
                    </div>

                    <!-- Paso 2 -->
                    <div class="process-step phase-2" id="fase-2">
                        <div class="flex items-start gap-4 mb-3">
                            <div class="phase-number">02</div>
                            <div class="flex-1">
                                <span class="phase-pill"><i class="las la-flag"></i> Fase 2</span>
                                <h3 class="text-lg md:text-xl font-bold text-gray-900 mt-2">
                                    Gestión de Problemas
                                </h3>
                            </div>
                        </div>

                        <div class="step-section">
                            <div class="step-section-title">
                                <span class="icon"><i class="las la-bullseye"></i></span> Objetivo
                            </div>
                            <p class="text-gray-600 pl-1">Indentificar y abordar de manera proactiva las causes raíz de los
                                incidentes recurrentes para
                                prevenir su ocurrencia futura y reducir el impacto en el negocio.</p>
                        </div>

                        <div class="step-section">
                            <div class="step-section-title">
                                <span class="icon"><i class="las la-tasks"></i></span> Actividades Clave
                            </div>
                            <ul class="clean">
                                <li>Identificar problemas a partir de tendencias en los incidentes registrados</li>
                                <li>Realizar análisis de causas raíz utilizando métodos como 5 porqués o digaramas de
                                    Ishikawa</li>
                                <li>Proponer y documentar soluciones definitivas o crear soluciones temporales (workrounds)
                                    en espera de una resolución final</li>
                                <li>Actualizar la base de datos de problemas conocidos (KEDB)</li>
                            </ul>
                        </div>

                        <div class="step-section">
                            <div class="step-section-title">
                                <span class="icon"><i class="las la-file-alt"></i></span> Entregables
                            </div>
                            <ul class="clean">
                                <li>Memoría Técnica</li>
                            </ul>
                        </div>

                        <div class="step-section">
                            <div class="step-section-title">
                                <span class="icon"><i class="las la-users"></i></span> Participantes
                            </div>
                            <div class="flex flex-wrap gap-2">
                                <span class="participant-tag pt-purple"><i class="las la-user-tie"></i> Mesa de
                                    Ayuda</span>
                                <span class="participant-tag pt-yellow"><i class="las la-user-cog"></i> Service
                                    Operations/Support</span>
                                <span class="participant-tag pt-red"><i class="las la-users-cog"></i> Cliente o
                                    representante</span>
                            </div>
                        </div>

                        <div class="flex items-center gap-3 text-sm text-gray-500 mt-4 pt-4 border-t border-gray-100">
                            <span class="inline-flex items-center gap-1.5 bg-gray-50 px-3 py-1 rounded-full">
                                <i class="far fa-clock text-blue-500"></i> Duración: 1-3 días
                            </span>
                        </div>
                    </div>

                    <!-- Paso 3 -->
                    <div class="process-step phase-3" id="fase-3">
                        <div class="flex items-start gap-4 mb-3">
                            <div class="phase-number">03</div>
                            <div class="flex-1">
                                <span class="phase-pill"><i class="las la-flag"></i> Fase 3</span>
                                <h3 class="text-lg md:text-xl font-bold text-gray-900 mt-2">
                                    Gestión de Cambios
                                </h3>
                            </div>
                        </div>

                        <div class="step-section">
                            <div class="step-section-title">
                                <span class="icon"><i class="las la-bullseye"></i></span> Objetivo
                            </div>
                            <p class="text-gray-600 pl-1">
                                Garantizar que todos los cambiuos en la infraestructura de TI se evalúen, aprueban,
                                implementen y revisen de manera controlada para minimizar interrupciones en los servicios.
                            </p>
                        </div>

                        <div class="step-section">
                            <div class="step-section-title">
                                <span class="icon"><i class="las la-tasks"></i></span> Actividades Clave
                            </div>
                            <ul class="clean">
                                <li>Evaluar las solicitudes de cambio (RFC) considerando el impacto, costo, riesgo y
                                    urgencia</li>
                                <li>Aprobar cambios a través de cun Comité de Gestión de Cambios (CAB) o un flujo de
                                    aprobación predefinido</li>
                                <li>Planificar la implementación del cambio, incluyendo pruebas previas y planes de respaldo
                                    (backup)</li>
                                <li>Ejecutar el cambio según el plan aprobado</li>
                                <li>Revisar el resultado del cambio y registrar los detalles en un informa final</li>
                            </ul>
                        </div>

                        <div class="step-section">
                            <div class="step-section-title">
                                <span class="icon"><i class="las la-file-alt"></i></span> Entregables
                            </div>
                            <ul class="clean">
                                <li>Documentación de cambios autorizados.</li>
                            </ul>
                        </div>

                        <div class="step-section">
                            <div class="step-section-title">
                                <span class="icon"><i class="las la-users"></i></span> Participantes
                            </div>
                            <div class="flex flex-wrap gap-2">
                                <span class="participant-tag pt-purple"><i class="las la-user-tie"></i> Mesa de
                                    Ayuda</span>
                                <span class="participant-tag pt-yellow"><i class="las la-user-cog"></i> Service
                                    Operations/Support</span>
                                <span class="participant-tag pt-red"><i class="las la-users-cog"></i> Cliente o
                                    representante</span>
                            </div>
                        </div>

                        <div class="flex items-center gap-3 text-sm text-gray-500 mt-4 pt-4 border-t border-gray-100">
                            <span class="inline-flex items-center gap-1.5 bg-gray-50 px-3 py-1 rounded-full">
                                <i class="far fa-clock text-blue-500"></i> Duración: 1-3 días
                            </span>
                        </div>
                    </div>

                    <!-- Paso 4 -->
                    <div class="process-step phase-4" id="fase-4">
                        <div class="flex items-start gap-4 mb-3">
                            <div class="phase-number">04</div>
                            <div class="flex-1">
                                <span class="phase-pill"><i class="las la-flag"></i> Fase 4</span>
                                <h3 class="text-lg md:text-xl font-bold text-gray-900 mt-2">
                                    Monitorización y Generación de Reportes
                                </h3>
                            </div>
                        </div>

                        <div class="step-section">
                            <div class="step-section-title">
                                <span class="icon"><i class="las la-bullseye"></i></span> Objetivo
                            </div>
                            <p class="text-gray-600 pl-1">
                                Proveer un monitoreo continuop de los servicos y generar reportes estratégicos y operativos
                                que respalden la forma de decisiones y promuevan la mejora continua del serivio.
                            </p>
                        </div>

                        <div class="step-section">
                            <div class="step-section-title">
                                <span class="icon"><i class="las la-tasks"></i></span> Actividades Clave
                            </div>
                            <ul class="clean">
                                <li>Definir métricas clave de rendimiento (KPIs) relacioandas con la disponibilidad,
                                    capacidad, confiabilidad y cumplimiento de SLA</li>
                                <li>Supervisar en tiempo real las métricas del servicio utilizando herramientas
                                    automatizadas</li>
                                <li>Gererar reportes detallados y ejecutivos que incluyan análisis de tendencias y
                                    propuestas de mejora</li>
                                <li>Identificar oportunidades de optimizar y proponer planes de acción específicos</li>
                            </ul>
                        </div>

                        <div class="step-section">
                            <div class="step-section-title">
                                <span class="icon"><i class="las la-file-alt"></i></span> Entregables
                            </div>
                            <ul class="clean">
                                <li>Registro de oportunidades de mejora</li>
                                <li>Planes de mejora continua</li>
                            </ul>
                        </div>

                        <div class="step-section">
                            <div class="step-section-title">
                                <span class="icon"><i class="las la-users"></i></span> Participantes
                            </div>
                            <div class="flex flex-wrap gap-2">
                                <span class="participant-tag pt-purple"><i class="las la-user-tie"></i> Mesa de
                                    Ayuda</span>
                                <span class="participant-tag pt-yellow"><i class="las la-user-cog"></i> Service
                                    Operations/Support</span>
                                <span class="participant-tag pt-red"><i class="las la-users-cog"></i> Cliente o
                                    representante</span>
                            </div>
                        </div>

                        <div class="flex items-center gap-3 text-sm text-gray-500 mt-4 pt-4 border-t border-gray-100">
                            <span class="inline-flex items-center gap-1.5 bg-gray-50 px-3 py-1 rounded-full">
                                <i class="far fa-clock text-blue-500"></i> Duración: 1-3 días
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Sidebar -->
        <div class="lg:w-1/3">
            <div class="lg:sticky lg:top-40 space-y-5">

                <!-- Documentos Relacionados -->
                <div class="bg-white border border-slate-200 rounded-2xl p-5 shadow-sm">
                    <div class="flex items-center justify-between mb-4">
                        <p class="text-xs font-semibold text-slate-500 uppercase tracking-wide">
                            Documentos del Proceso
                        </p>
                        <span class="bg-orange-50 text-orange-600 text-[10px] font-bold px-2 py-1 rounded-full">
                            <i class="las la-folder-open"></i>
                        </span>
                    </div>
                    <div class="space-y-2">
                        <a href="{{ route('estructurainterna.proceso-ingenieria.ingenieria-diagrama') }}"
                            class="side-link group">
                            <span class="flex items-center gap-2">
                                <i class="las la-project-diagram text-slate-400 group-hover:text-orange-500"></i>
                                Ver Esquema
                            </span>
                            <i class="las la-arrow-right text-slate-300 group-hover:text-orange-500"></i>
                        </a>
                        <a href="#" class="side-link group">
                            <span class="flex items-center gap-2">
                                <i class="las la-download text-slate-400 group-hover:text-orange-500"></i>
                                Descargar Esquema
                            </span>
                            <i class="las la-arrow-right text-slate-300 group-hover:text-orange-500"></i>
                        </a>
                        <a href="{{ route('estructurainterna.ingenieria') }}" class="side-link group">
                            <span class="flex items-center gap-2">
                                <i class="las la-arrow-left text-slate-400 group-hover:text-orange-500"></i>
                                Regresar
                            </span>
                            <i class="las la-undo text-slate-300 group-hover:text-orange-500"></i>
                        </a>
                    </div>
                </div>

                <!-- Resumen rápido -->
                <div class="bg-gradient-to-br from-orange-50 to-amber-50 border border-orange-100 rounded-2xl p-5">
                    <p class="text-xs font-semibold text-orange-600 uppercase tracking-wide mb-3">
                        <i class="las la-info-circle"></i> Resumen del Proceso
                    </p>
                    <ul class="space-y-2.5 text-sm text-gray-700">
                        <li class="flex items-start gap-2">
                            <i class="las la-check-circle text-orange-500 mt-0.5"></i>
                            <span><strong>4 fases</strong> claramente definidas</span>
                        </li>
                        <li class="flex items-start gap-2">
                            <i class="las la-check-circle text-orange-500 mt-0.5"></i>
                            <span>Duración estimada por fase: <strong>1-3 días</strong></span>
                        </li>
                        <li class="flex items-start gap-2">
                            <i class="las la-check-circle text-orange-500 mt-0.5"></i>
                            <span>Equipo multidisciplinario involucrado</span>
                        </li>
                    </ul>
                </div>

            </div>
        </div>
    </div>
@endsection
@push('js')
@endpush
