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
                            <a href="{{ route('intranet.procesos-empresariales') }}"
                                class="ml-1 text-sm text-gray-600 hover:text-orange-600 md:ml-2">Procesos Empresariales</a>
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
                            <span class="ml-1 text-sm text-primary font-medium md:ml-2">Soporte a Cliente</span>
                        </div>
                    </li>
                </ol>
            </nav>
        </div>
    </div>

    <!-- Encabezado -->
    <div class="mt-8 mb-8">
        <h1 class="text-3xl font-bold text-gray-800 mb-2">Proceso Ingeniería IT - Soporte a Cliente</h1>
        <p class="text-gray-600">Procesos para la adopción y uso de la solución implementada.</p>
    </div>

    <!-- Encabezado del Proceso -->
    <div class="bg-white rounded-lg shadow p-6 mb-8">
        <div class="flex flex-col md:flex-row md:items-start justify-between gap-6">
            <div class="flex-1">
                <div class="flex items-center mb-4">
                    <div class="bg-primary-light text-primary p-3 rounded-lg mr-4">
                        <i class="las la-laptop-code text-2xl"></i>
                    </div>
                    <div>
                        <div class="flex flex-wrap items-center gap-3 mt-2">
                            <span class="bg-green-100 text-green-800 text-sm font-medium px-3 py-1 rounded-full">
                                <i class="fas fa-circle text-xs mr-1"></i> Activo
                            </span>
                            <span class="text-gray-600 text-sm">
                                <i class="far fa-calendar-alt mr-1"></i> Última actualización: 01/01/2026
                            </span>
                            <span class="text-gray-600 text-sm">
                                <i class="fas fa-user-tie mr-1"></i> Responsable: Jose Carlos Torres
                            </span>
                        </div>
                    </div>
                </div>

                <p class="text-gray-700 text-lg mb-6 text-justify">
                    Acompañar al cliente en la correcta adopción y uso de la solución implementada, asegurando su operación
                    continua y eficiente, atendiendo las posibles incidencias o fallas que se presenten durante el tiempo de
                    soporte al cliente.
                </p>

                <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mb-6">
                    <div class="text-center p-3 bg-gray-50 rounded-lg">
                        <div class="text-2xl font-bold text-primary">4</div>
                        <div class="text-sm text-gray-600">Fases</div>
                    </div>
                    <div class="text-center p-3 bg-gray-50 rounded-lg">
                        <div class="text-2xl font-bold text-primary">19</div>
                        <div class="text-sm text-gray-600">Actividades</div>
                    </div>
                    <div class="text-center p-3 bg-gray-50 rounded-lg">
                        <div class="text-2xl font-bold text-primary">6</div>
                        <div class="text-sm text-gray-600">Documentos Entregables</div>
                    </div>
                    <div class="text-center p-3 bg-gray-50 rounded-lg">
                        <div class="text-2xl font-bold text-primary">4</div>
                        <div class="text-sm text-gray-600">Personas Involucradas</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="sticky top-16 z-40 bg-white/80 backdrop-blur-sm border-b border-slate-200 py-3 hidden lg:block">
        <h2 class="text-2xl font-bold text-gray-800 mb-6 text-center">Fases del Proceso</h2>
        <div class="max-w-[1600px] mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-center space-x-2">
                <a href="#fase-1"
                    class="px-3 py-1 bg-phase-1 text-white text-xs font-bold rounded-full hover:opacity-90 transition">Fase
                    1</a>
                <a href="#fase-2"
                    class="px-3 py-1 bg-phase-7 text-white text-xs font-bold rounded-full hover:opacity-90 transition">Fase
                    2</a>
                <a href="#fase-3"
                    class="px-3 py-1 bg-phase-9 text-white text-xs font-bold rounded-full hover:opacity-90 transition">Fase
                    3</a>
                <a href="#fase-4"
                    class="px-3 py-1 bg-phase-4 text-white text-xs font-bold rounded-full hover:opacity-90 transition">Fase
                    4</a>
            </div>
        </div>
    </div>

    <!-- Pasos Detallados del Proceso -->
    <div class="flex flex-col lg:flex-row gap-8">
        <!-- Contenido Principal -->
        <div class="lg:w-2/3">
            <!-- Pasos Detallados del Proceso -->
            <div class="bg-white rounded-lg shadow p-6 mb-8 mt-4">
                <h2 class="text-2xl font-bold text-gray-800 mb-6">Pasos Detallados del Proceso</h2>

                <div class="space-y-6">
                    <!-- Paso 1 -->
                    <div class="process-step" id="fase-1">
                        <h3 class="text-xl font-bold text-gray-800 mb-3">Fase 1: Gestión de Incidentes</h3>
                        <div class="bg-gray-50 p-4 rounded-lg mb-4">
                            <h4 class="font-bold text-gray-700 mb-2">Objetivo:</h4>
                            <p>Restablecer la operación normal del servicio lo mas rapido posible tras una interrupción,
                                minimizando el impacto en las operaciones del negocio y asegurando la mejor calidad de
                                servicios.</p>
                            <br>
                            <h4 class="font-bold text-gray-700 mb-2">Actividades Clave:</h4>
                            <ul class="list-disc pl-5 text-gray-600 space-y-1">
                                <li>Registrar y categorizar todos los incidesntes recibidos en el sistema de gestion de
                                    incidencias</li>
                                <li>Priorizar los incidentges segun el impacto y uregencia para la empresa</li>
                                <li>Asignar el incidente al equipo técnico adecuado para su resolución</li>
                                <li>Realizar un seguimiento continuio del proceso de la resolución</li>
                                <li>Confirmar la solución con el cliente y cerrar el incidente con un registro detallado
                                </li>
                            </ul>
                            <br>
                            <h4 class="font-bold text-gray-700 mb-2">Entregables:</h4>
                            <ul class="list-disc pl-5 text-gray-600 space-y-1">
                                <li>Reporte de incidencias</li>
                                <li>Reporte cumplimineto SLA</li>
                            </ul>
                            <br>
                            <h4 class="font-bold text-gray-700 mb-2">Participantes:</h4>
                            <div class="flex flex-wrap gap-2 mb-3">
                                <span class="bg-purple-100 text-purple-800 text-xs font-medium px-2 py-1 rounded">Service
                                    Operations/Support</span>
                                <span class="bg-yellow-100 text-yellow-800 text-xs font-medium px-2 py-1 rounded">Mesa de
                                    Ayuda</span>
                                <span class="bg-red-100 text-red-800 text-xs font-medium px-2 py-1 rounded">Cliente o
                                    Representante</span>
                                <span
                                    class="bg-green-100 text-green-800 text-xs font-medium px-2 py-1 rounded">Cliente</span>
                            </div>
                        </div>
                        <div class="flex items-center text-sm text-gray-500">
                            <span class="mr-4">
                                <i class="far fa-clock mr-1"></i> Duración: 1-3 días
                            </span>
                        </div>
                    </div>

                    <!-- Paso 2 -->
                    <div class="process-step" id="fase-2">
                        <h3 class="text-xl font-bold text-gray-800 mb-3">Fase 2: Gestión de Problemas</h3>
                        <div class="bg-gray-50 p-4 rounded-lg mb-4">
                            <h4 class="font-bold text-gray-700 mb-2">Objetivo:</h4>
                            <p>Indentificar y abordar de manera proactiva las causes raíz de los incidentes recurrentes para
                                prevenir su ocurrencia futura y reducir el impacto en el negocio.</p>
                            <br>
                            <h4 class="font-bold text-gray-700 mb-2">Actividades Clave:</h4>
                            <ul class="list-disc pl-5 text-gray-600 space-y-1">
                                <li>Identificar problemas a partir de tendencias en los incidentes registrados</li>
                                <li>Realizar análisis de causas raíz utilizando métodos como 5 porqués o digaramas de
                                    Ishikawa</li>
                                <li>Proponer y documentar soluciones definitivas o crear soluciones temporales (workrounds)
                                    en espera de una resolución final</li>
                                <li>Actualizar la base de datos de problemas conocidos (KEDB)</li>
                            </ul>
                            <br>
                            <h4 class="font-bold text-gray-700 mb-2">Entregables:</h4>
                            <ul class="list-disc pl-5 text-gray-600 space-y-1">
                                <li>Memoría Técnica</li>
                            </ul>
                            <br>
                            <h4 class="font-bold text-gray-700 mb-2">Participantes:</h4>
                            <div class="flex flex-wrap gap-2 mb-3">
                                <span class="bg-purple-100 text-purple-800 text-xs font-medium px-2 py-1 rounded">Mesa de
                                    Ayuda</span>
                                <span class="bg-yellow-100 text-yellow-800 text-xs font-medium px-2 py-1 rounded">Service
                                    Operations/Support</span>
                                <span class="bg-red-100 text-red-800 text-xs font-medium px-2 py-1 rounded">Cliente o
                                    representante</span>
                            </div>
                        </div>
                        <div class="flex items-center text-sm text-gray-500">
                            <span class="mr-4">
                                <i class="far fa-clock mr-1"></i> Duración: 1-3 días
                            </span>
                        </div>
                    </div>

                    <!-- Paso 3 -->
                    <div class="process-step" id="fase-3">
                        <h3 class="text-xl font-bold text-gray-800 mb-3">Fase 3: Gestión de Cambios</h3>
                        <div class="bg-gray-50 p-4 rounded-lg mb-4">
                            <h4 class="font-bold text-gray-700 mb-2">Objetivo:</h4>
                            <p>Garantizar que todos los cambiuos en la infraestructura de TI se evalúen, aprueban,
                                implementen y revisen de manera controlada para minimizar interrupciones en los servicios
                            </p>
                            <br>
                            <h4 class="font-bold text-gray-700 mb-2">Actividades Clave:</h4>
                            <ul class="list-disc pl-5 text-gray-600 space-y-1">
                                <li>Evaluar las solicitudes de cambio (RFC) considerando el impacto, costo, riesgo y
                                    urgencia</li>
                                <li>Aprobar cambios a través de cun Comité de Gestión de Cambios (CAB) o un flujo de
                                    aprobación predefinido</li>
                                <li>Planificar la implementación del cambio, incluyendo pruebas previas y planes de respaldo
                                    (backup)</li>
                                <li>Ejecutar el cambio según el plan aprobado</li>
                                <li>Revisar el resultado del cambio y registrar los detalles en un informa final</li>
                            </ul>
                            <br>
                            <h4 class="font-bold text-gray-700 mb-2">Entregables:</h4>
                            <ul class="list-disc pl-5 text-gray-600 space-y-1">
                                <li>Documentación de cambios autorizados</li>
                            </ul>
                            <br>
                            <h4 class="font-bold text-gray-700 mb-2">Participantes:</h4>
                            <div class="flex flex-wrap gap-2 mb-3">
                                <span class="bg-purple-100 text-purple-800 text-xs font-medium px-2 py-1 rounded">Mesa de
                                    Ayuda</span>
                                <span class="bg-yellow-100 text-yellow-800 text-xs font-medium px-2 py-1 rounded">Service
                                    Operations/Support</span>
                                <span class="bg-red-100 text-red-800 text-xs font-medium px-2 py-1 rounded">Cliente o
                                    representante</span>
                            </div>
                        </div>
                        <div class="flex items-center text-sm text-gray-500">
                            <span class="mr-4">
                                <i class="far fa-clock mr-1"></i> Duración: 1-3 días
                            </span>
                        </div>
                    </div>

                    <!-- Paso 4 -->
                    <div class="process-step" id="fase-4">
                        <h3 class="text-xl font-bold text-gray-800 mb-3">Fase 4: Monitorización y Generación de Reportes
                        </h3>
                        <div class="bg-gray-50 p-4 rounded-lg mb-4">
                            <h4 class="font-bold text-gray-700 mb-2">Objetivo:</h4>
                            <p>Proveer un monitoreo continuop de los servicos y generar reportes estratégicos y operativos
                                que respalden la forma de decisiones y promuevan la mejora continua del serivio.</p>
                            <br>
                            <h4 class="font-bold text-gray-700 mb-2">Actividades Clave:</h4>
                            <ul class="list-disc pl-5 text-gray-600 space-y-1">
                                <li>Definir métricas clave de rendimiento (KPIs) relacioandas con la disponibilidad,
                                    capacidad, confiabilidad y cumplimiento de SLA</li>
                                <li>Supervisar en tiempo real las métricas del servicio utilizando herramientas
                                    automatizadas</li>
                                <li>Gererar reportes detallados y ejecutivos que incluyan análisis de tendencias y
                                    propuestas de mejora</li>
                                <li>Identificar oportunidades de optimizar y proponer planes de acción específicos</li>
                            </ul>
                            <br>
                            <h4 class="font-bold text-gray-700 mb-2">Entregables:</h4>
                            <ul class="list-disc pl-5 text-gray-600 space-y-1">
                                <li>Registro de oportunidades de mejora</li>
                                <li>Planes de mejora continua</li>
                            </ul>
                            <br>
                            <h4 class="font-bold text-gray-700 mb-2">Participantes:</h4>
                            <div class="flex flex-wrap gap-2 mb-3">
                                <span class="bg-purple-100 text-purple-800 text-xs font-medium px-2 py-1 rounded">Mesa de
                                    Ayuda</span>
                                <span class="bg-yellow-100 text-yellow-800 text-xs font-medium px-2 py-1 rounded">Service
                                    Operations/Support</span>
                                <span class="bg-red-100 text-red-800 text-xs font-medium px-2 py-1 rounded">Cliente o
                                    representante</span>
                                <span class="bg-green-100 text-green-800 text-xs font-medium px-2 py-1 rounded">Ejecutivo
                                    de Cuenta</span>
                            </div>
                        </div>
                        <div class="flex items-center text-sm text-gray-500">
                            <span class="mr-4">
                                <i class="far fa-clock mr-1"></i> Duración: 1-3 días
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Sidebar -->
        <div class="lg:w-1/3">
            <!-- Documentos Relacionados -->
            <div class="bg-white border border-slate-200 rounded-xl p-5 mt-4">
                <p class="text-xs font-semibold text-slate-500 uppercase tracking-wide mb-4">
                    Documentos del Proceso
                </p>
                <div class="space-y-2">
                    <a href="{{ route('intranet.estructurainterna.proceso-ingenieria.soporte-diagrama') }}"
                        class="group flex items-center justify-between w-full px-3 py-2 rounded-lg text-sm font-medium  text-slate-600 bg-slate-50  hover:bg-orange-50 hover:text-orange-600 transition-colors duration-300">
                        <span>Ver Esquema</span>
                        <i
                            class="las la-arrow-right text-slate-300 group-hover:text-orange-500 group-hover:translate-x-1 transition-all duration-300"></i>
                    </a>

                    <a href="#"
                        class="group flex items-center justify-between w-full px-3 py-2 rounded-lg text-sm font-medium text-slate-600 bg-slate-50 hover:bg-orange-50 hover:text-orange-600transition-colors duration-300">
                        <span>Descargar Esquema</span>
                        <i
                            class="las la-arrow-right text-slate-300 group-hover:text-orange-500 group-hover:translate-x-1 transition-all duration-300"></i>
                    </a>

                    <a href="{{ route('intranet.estructurainterna.ingenieria') }}"
                        class="group flex flex-row-reverse items-center justify-between w-full px-4 py-2 rounded-lg text-sm font-medium text-slate-600 bg-slate-50 hover:bg-orange-50 hover:text-orange-600 transition-colors duration-300">
                        <span>Regresar</span>
                        <i
                            class="las la-arrow-left text-slate-300 group-hover:text-orange-500 group-hover:-translate-x-1 transition-all duration-300"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>


@endsection
@push('js')
@endpush
