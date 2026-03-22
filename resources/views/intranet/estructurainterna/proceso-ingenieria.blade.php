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
                            <span class="ml-1 text-sm text-primary font-medium md:ml-2">Entrega de Servicios</span>
                        </div>
                    </li>
                </ol>
            </nav>
        </div>
    </div>

    <!-- Encabezado -->
    <div class="mt-8 mb-8">
        <h1 class="text-3xl font-bold text-gray-800 mb-2">Proceso Ingeniería IT</h1>
        <p class="text-gray-600">Documentación del procesos de entrega de servicios</p>
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
                    El propósito principal es Cerrar formalmente el proceso de implementación, capacitación, asegurando la
                    satisfacción del cliente y su adopción del servicio. Formalizando la entrega y habilitar el soporte
                    postventa.
                </p>
                <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mb-6">
                    <div class="text-center p-3 bg-gray-50 rounded-lg">
                        <div class="text-2xl font-bold text-primary">5</div>
                        <div class="text-sm text-gray-600">Fases</div>
                    </div>
                    <div class="text-center p-3 bg-gray-50 rounded-lg">
                        <div class="text-2xl font-bold text-primary">13</div>
                        <div class="text-sm text-gray-600">Actividades</div>
                    </div>
                    <div class="text-center p-3 bg-gray-50 rounded-lg">
                        <div class="text-2xl font-bold text-primary">10</div>
                        <div class="text-sm text-gray-600">Documentos Entregables</div>
                    </div>
                    <div class="text-center p-3 bg-gray-50 rounded-lg">
                        <div class="text-2xl font-bold text-primary">6</div>
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
                <a href="#fase-5"
                    class="px-3 py-1 bg-phase-5 text-white text-xs font-bold rounded-full hover:opacity-90 transition">Fase
                    5</a>
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
                        <h3 class="text-xl font-bold text-gray-800 mb-3">Entrega Área de Ventas de proyecto aceptado por
                            cliente</h3>
                        <div class="bg-gray-50 p-4 rounded-lg mb-4">
                            <h4 class="font-bold text-gray-700 mb-2">Objetivo:</h4>
                            <p>Entrega formal del proyecto, con el alcance definido y aceptado por el cliente</p>
                            <br>
                            <h4 class="font-bold text-gray-700 mb-2">Actividades Clave:</h4>
                            <ul class="list-disc pl-5 text-gray-600 space-y-1">
                                <li>Generación del plan de trabajo final</li>
                                <li>Realización y entendimineto copn el equipo implementador del SOW</li>
                                <li>Presentación KickOff</li>
                            </ul>
                            <br>
                            <h4 class="font-bold text-gray-700 mb-2">Entregables:</h4>
                            <ul class="list-disc pl-5 text-gray-600 space-y-1">
                                <li>Plan de trabajo final</li>
                                <li>SOW</li>
                            </ul>
                            <br>
                            <h4 class="font-bold text-gray-700 mb-2">Participantes:</h4>
                            <div class="flex flex-wrap gap-2 mb-3">
                                <span class="bg-purple-100 text-purple-800 text-xs font-medium px-2 py-1 rounded">Ejecutivo
                                    de Cuenta</span>
                                <span class="bg-yellow-100 text-yellow-800 text-xs font-medium px-2 py-1 rounded">PM</span>
                                <span class="bg-red-100 text-red-800 text-xs font-medium px-2 py-1 rounded">Equipo
                                    Técnico</span>
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
                        <h3 class="text-xl font-bold text-gray-800 mb-3">Instalación y Configuración de la solución
                            Propuesta</h3>
                        <div class="bg-gray-50 p-4 rounded-lg mb-4">
                            <h4 class="font-bold text-gray-700 mb-2">Objetivo:</h4>
                            <p>Instalar y configurar los componentes, idenfiticados dentro del alcance del proyecto</p>
                            <br>
                            <h4 class="font-bold text-gray-700 mb-2">Actividades Clave:</h4>
                            <ul class="list-disc pl-5 text-gray-600 space-y-1">
                                <li>Contar con los insumos necesarios (Hardware/Software)</li>
                                <li>Claro conocimiento del alcance de la solucion (SOW)</li>
                                <li>Validar si existe entrega de factura por cierre de actividad</li>
                            </ul>
                            <br>
                            <h4 class="font-bold text-gray-700 mb-2">Entregables:</h4>
                            <ul class="list-disc pl-5 text-gray-600 space-y-1">
                                <li>Documento técnico con las especificaciones de configuración</li>
                            </ul>
                            <br>
                            <h4 class="font-bold text-gray-700 mb-2">Participantes:</h4>
                            <div class="flex flex-wrap gap-2 mb-3">
                                <span class="bg-purple-100 text-purple-800 text-xs font-medium px-2 py-1 rounded">Ejecutivo
                                    de Cuenta</span>
                                <span class="bg-yellow-100 text-yellow-800 text-xs font-medium px-2 py-1 rounded">PM</span>
                                <span class="bg-red-100 text-red-800 text-xs font-medium px-2 py-1 rounded">Equipo
                                    Técnico</span>
                                <span class="bg-green-100 text-green-800 text-xs font-medium px-2 py-1 rounded">Gerente
                                    Ingénieria</span>
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
                        <h3 class="text-xl font-bold text-gray-800 mb-3">Pruebas y Validación</h3>
                        <div class="bg-gray-50 p-4 rounded-lg mb-4">
                            <h4 class="font-bold text-gray-700 mb-2">Objetivo:</h4>
                            <p>Garantizar que la solución instalada y configurada, funciona correctamente bajo el alcance
                                definido.</p>
                            <br>
                            <h4 class="font-bold text-gray-700 mb-2">Actividades Clave:</h4>
                            <ul class="list-disc pl-5 text-gray-600 space-y-1">
                                <li>Realizar pruebas:</li>
                                <ol>
                                    <li>Unitarias</li>
                                    <li>Integrales</li>
                                    <li>Aceptación</li>
                                </ol>
                                <li>Ajustes</li>
                            </ul>
                            <br>
                            <h4 class="font-bold text-gray-700 mb-2">Entregables:</h4>
                            <ul class="list-disc pl-5 text-gray-600 space-y-1">
                                <li>Documento técnico con las especificaciones de configuración actualiado</li>
                                <li>Plan de pruebas</li>
                                <li>Documento de aceptación firmado por el cliente</li>
                            </ul>
                            <br>
                            <h4 class="font-bold text-gray-700 mb-2">Participantes:</h4>
                            <div class="flex flex-wrap gap-2 mb-3">
                                <span class="bg-purple-100 text-purple-800 text-xs font-medium px-2 py-1 rounded">Ejecutivo
                                    de Cuenta</span>
                                <span class="bg-yellow-100 text-yellow-800 text-xs font-medium px-2 py-1 rounded">PM</span>
                                <span class="bg-red-100 text-red-800 text-xs font-medium px-2 py-1 rounded">Equipo
                                    Técnico</span>
                                <span class="bg-green-100 text-green-800 text-xs font-medium px-2 py-1 rounded">Cliente o
                                    Representante</span>
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
                        <h3 class="text-xl font-bold text-gray-800 mb-3">Capacitación y Transferencia</h3>
                        <div class="bg-gray-50 p-4 rounded-lg mb-4">
                            <h4 class="font-bold text-gray-700 mb-2">Objetivo:</h4>
                            <p>Asegurar que los usuarios finales comprendan y puedan usar la solución de manera efectiva</p>
                            <br>
                            <h4 class="font-bold text-gray-700 mb-2">Actividades Clave:</h4>
                            <ul class="list-disc pl-5 text-gray-600 space-y-1">
                                <li>Capacitación a usuarios clave</li>
                                <li>Firma de aceptación de capacitación</li>
                            </ul>
                            <br>
                            <h4 class="font-bold text-gray-700 mb-2">Entregables:</h4>
                            <ul class="list-disc pl-5 text-gray-600 space-y-1">
                                <li>Documento de capacitación firmado</li>
                            </ul>
                            <br>
                            <h4 class="font-bold text-gray-700 mb-2">Participantes:</h4>
                            <div class="flex flex-wrap gap-2 mb-3">
                                <span class="bg-purple-100 text-purple-800 text-xs font-medium px-2 py-1 rounded">Ejecutivo
                                    de Cuenta</span>
                                <span class="bg-yellow-100 text-yellow-800 text-xs font-medium px-2 py-1 rounded">PM</span>
                                <span class="bg-red-100 text-red-800 text-xs font-medium px-2 py-1 rounded">Equipo
                                    Técnico</span>
                                <span class="bg-green-100 text-green-800 text-xs font-medium px-2 py-1 rounded">Cliente o
                                    Representante</span>
                            </div>
                        </div>
                        <div class="flex items-center text-sm text-gray-500">
                            <span class="mr-4">
                                <i class="far fa-clock mr-1"></i> Duración: 1-3 días
                            </span>
                        </div>
                    </div>

                    <!-- Paso 5 -->
                    <div class="process-step" id="fase-5">
                        <h3 class="text-xl font-bold text-gray-800 mb-3">Entrega y Cierre de proyecto</h3>
                        <div class="bg-gray-50 p-4 rounded-lg mb-4">
                            <h4 class="font-bold text-gray-700 mb-2">Objetivo:</h4>
                            <p>Entregar la solución final en un ambiente productivo</p>
                            <br>
                            <h4 class="font-bold text-gray-700 mb-2">Actividades Clave:</h4>
                            <ul class="list-disc pl-5 text-gray-600 space-y-1">
                                <li>Junta de finalización de proyecto</li>
                                <li>Formalizar la entrega y puesta en marcha del proyecto</li>
                                <li>Recolección de feedback inicial</li>
                            </ul>
                            <br>
                            <h4 class="font-bold text-gray-700 mb-2">Entregables:</h4>
                            <ul class="list-disc pl-5 text-gray-600 space-y-1">
                                <li>Acta de cierre de proyecto firmada</li>
                                <li>Documento lecciones aprendidas</li>
                                <li>Registro de oportunidades de mejora</li>
                            </ul>
                            <br>
                            <h4 class="font-bold text-gray-700 mb-2">Participantes:</h4>
                            <div class="flex flex-wrap gap-2 mb-3">
                                <span class="bg-purple-100 text-purple-800 text-xs font-medium px-2 py-1 rounded">Ejecutivo
                                    de Cuenta</span>
                                <span class="bg-yellow-100 text-yellow-800 text-xs font-medium px-2 py-1 rounded">PM</span>
                                <span class="bg-red-100 text-red-800 text-xs font-medium px-2 py-1 rounded">Equipo
                                    Técnico</span>
                                <span class="bg-green-100 text-green-800 text-xs font-medium px-2 py-1 rounded">Cliente o
                                    Representante</span>
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
                    <a href="{{ route('estructurainterna.proceso-ingenieria.ingenieria-diagrama') }}"
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
                    <a href="{{ route('estructurainterna.ingenieria') }}"
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
