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
                    <li aria-current="page">
                        <div class="flex items-center">
                            <i class="fas fa-chevron-right text-gray-400 mx-2"></i>
                            <span class="ml-1 text-sm text-primary font-medium md:ml-2">Proceso Comercial IT</span>
                        </div>
                    </li>
                </ol>
            </nav>
        </div>
    </div>

    <!-- Encabezado -->
    <div class="mt-8 mb-8">
        <h1 class="text-3xl font-bold text-gray-800 mb-2">Procesos Comercial IT</h1>
        <p class="text-gray-600">Documentación del procesos interno de la empresa</p>
    </div>

    <!-- Encabezado del Proceso -->
    <div class="bg-white rounded-lg shadow p-6 mb-8">
        <div class="flex flex-col md:flex-row md:items-start justify-between gap-6">
            <div class="flex-1">
                <div class="flex items-center mb-4">
                    <div class="bg-primary-light text-primary p-3 rounded-lg mr-4">
                        <i class="fas fa-chart-line text-2xl"></i>
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
                    El propósito principal de tener un proceso comercial completo es garantizar la entrega eficiente,
                    rentable y con alta calidad de los servicios ofrecidos, asegurando una experiencia positiva y continua
                    para el cliente a lo largo de todo el ciclo de vida del proyecto. Desde el primer contacto en preventa
                    hasta el seguimiento postventa, este proceso permite alinear los esfuerzos de las áreas comerciales,
                    técnicas y operativas bajo un mismo enfoque ágil, escalable y medible.
                </p>

                <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mb-6">
                    <div class="text-center p-3 bg-gray-50 rounded-lg">
                        <div class="text-2xl font-bold text-primary">10</div>
                        <div class="text-sm text-gray-600">Fases</div>
                    </div>
                    <div class="text-center p-3 bg-gray-50 rounded-lg">
                        <div class="text-2xl font-bold text-primary">28</div>
                        <div class="text-sm text-gray-600">Actividades</div>
                    </div>
                    <div class="text-center p-3 bg-gray-50 rounded-lg">
                        <div class="text-2xl font-bold text-primary">1</div>
                        <div class="text-sm text-gray-600">Documentos</div>
                    </div>
                    <div class="text-center p-3 bg-gray-50 rounded-lg">
                        <div class="text-2xl font-bold text-primary">24</div>
                        <div class="text-sm text-gray-600">Personas Involucradas</div>
                    </div>
                </div>
            </div>

            <div class="md:w-64">
                <div class="bg-primary-light border border-orange-200 rounded-lg p-4">
                    <h3 class="font-bold text-gray-800 mb-3">Acciones Rápidas</h3>
                    <div class="space-y-2">
                        <a href="{{ route('intranet.estructurainterna.proceso-diagrama') }}"
                            class="flex items-center text-gray-700 hover:text-primary p-2 hover:bg-white rounded">
                            <i class="fas fa-eye mr-2"></i>
                            <span>Ver Diagrama</span>
                        </a>
                        <a href="#"
                            class="flex items-center text-gray-700 hover:text-primary p-2 hover:bg-white rounded">
                            <i class="fas fa-download mr-2"></i>
                            <span>Descargar Diagrama</span>
                        </a>
                        <a href="#"
                            class="flex items-center text-gray-700 hover:text-primary p-2 hover:bg-white rounded">
                            <i class="fas fa-print mr-2"></i>
                            <span>Imprimir Proceso</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Tiempos estimados -->
        <div class=" bg-primary/10 rounded-2xl border border-primary/20 p-6">
            <h3 class="text-xl font-bold text-primary mb-6 text-center">
                Sub-procesos
            </h3>

            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-5 gap-4">
                <button class="phase-btn text-phase-1">
                    <a href="{{ route('intranet.estructurainterna.proceso-comercial.demanda-omnicanal') }}">
                        Generación de Demanda Omnicanal
                    </a>
                </button>

                <button class="phase-btn text-phase-2">
                    <a href="{{ route('intranet.estructurainterna.proceso-comercial.asignacion-cuenta') }}">
                        Asignación de cuenta y segmentación de oportunidades
                    </a>
                </button>

                <button class="phase-btn text-phase-3">
                    <a href="{{ route('intranet.estructurainterna.proceso-comercial.analisis-requerimiento') }}">
                        Analisis de requerimientos
                    </a>
                </button>

                <button class="phase-btn text-phase-4">
                    <a href="{{ route('intranet.estructurainterna.proceso-comercial.solucion-propuesta') }}">
                        Diseño de solución y propuesta Técnico-Comercial
                    </a>
                </button>

                <button class="phase-btn text-phase-5">
                    <a href="{{ route('intranet.estructurainterna.proceso-comercial.negociacion-cierre') }}">
                        Negociación y Cierre
                    </a>
                </button>
            </div>
        </div>

    </div>

    <div class="sticky top-16 z-40 bg-white/80 backdrop-blur-sm border-b border-slate-200 py-3 hidden lg:block">
        <h2 class="text-2xl font-bold text-gray-800 mb-6 text-center">Fases Detalladas del Proceso</h2>
        <div class="max-w-[1600px] mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-center space-x-2">
                <a href="#fase-1"
                    class="px-3 py-1 bg-phase-1 text-white text-xs font-bold rounded-full hover:opacity-90 transition">Fase
                    1</a>
                <a href="#fase-2"
                    class="px-3 py-1 bg-phase-2 text-white text-xs font-bold rounded-full hover:opacity-90 transition">Fase
                    2</a>
                <a href="#fase-3"
                    class="px-3 py-1 bg-phase-3 text-white text-xs font-bold rounded-full hover:opacity-90 transition">Fase
                    3</a>
                <a href="#fase-4"
                    class="px-3 py-1 bg-phase-4 text-white text-xs font-bold rounded-full hover:opacity-90 transition">Fase
                    4</a>
                <a href="#fase-5"
                    class="px-3 py-1 bg-phase-5 text-white text-xs font-bold rounded-full hover:opacity-90 transition">Fase
                    5</a>
                <a href="#fase-6"
                    class="px-3 py-1 bg-phase-6 text-white text-xs font-bold rounded-full hover:opacity-90 transition">Fase
                    6</a>
                <a href="#fase-7"
                    class="px-3 py-1 bg-phase-7 text-white text-xs font-bold rounded-full hover:opacity-90 transition">Fase
                    7</a>
                <a href="#fase-8"
                    class="px-3 py-1 bg-phase-8 text-white text-xs font-bold rounded-full hover:opacity-90 transition">Fase
                    8</a>
                <a href="#fase-9"
                    class="px-3 py-1 bg-phase-9 text-white text-xs font-bold rounded-full hover:opacity-90 transition">Fase
                    9</a>
                <a href="#fase-10"
                    class="px-3 py-1 bg-phase-10 text-white text-xs font-bold rounded-full hover:opacity-90 transition">Fase
                    10</a>
            </div>
        </div>
    </div>

    <!-- Pasos Detallados del Proceso -->
    <div class="bg-white rounded-lg shadow p-6 mb-8">
        <div class="space-y-6">
            <!-- Paso 1 -->
            <div class="process-step phase-section" id="fase-1">
                <h3 class="text-xl font-bold text-gray-800 mb-3">Fase 1:
                    <span class="bg-orange-100 text-orange-800 text-xl font-medium px-2 py-1 rounded">
                        Generación de Demanda y Omnicanal
                    </span>
                </h3>
                <div class="bg-gray-100 p-4 rounded-lg mb-6">

                    <h4 class="font-bold text-gray-700 mb-2">Objetivo:</h4>
                    <p class="text-gray-700 mb-3">Brindar una comunicación
                        integral a nuestros clientes a través de
                        múltiples canales.</p>

                    <h4 class="font-bold text-gray-700 mb-2">Actividades Clave:</h4>
                    <ol class="list-disc pl-5 text-gray-600 space-y-1">
                        <li>Campañas de marketing digital</li>
                        <li>Participación en eventos y ferias</li>
                        <li>Activación de referidos mediante socios y clientes existentes</li>
                        <li>Creación de contenido relevante (webinars, estudios de caso)</li>
                    </ol>

                    <h4 class="font-bold text-gray-700 py-2">Entregables:</h4>
                    <ol class="list-disc pl-5 text-gray-600 space-y-1">
                        <li>Leads Captados</li>
                        <li class="list-none mt-2">
                            <a href="#"
                                class="inline-block bg-orange-500 text-white text-sm px-4 py-2 rounded-lg hover:bg-orange-600 transition">Ver
                                Archivo</a>
                        </li>
                        <li>Reporte de métricas de campañas</li>
                    </ol>
                </div>

                <div class="flex items-center text-sm text-gray-500">
                    <span class="mr-4">
                        <i class="far fa-clock mr-1"></i> Duración: 3-7 días
                    </span>
                    <span>
                        <i class="fas fa-users mr-1"></i> Participantes: Gerente Marketing, Equipo de Marketing Digital,
                        Diseñadores de Contenido, Gerencia Ventas, Dirección General
                    </span>
                </div>
                {{-- <div class="p-4  flex justify-center space-x-2  ">
                    <a href="{{ route('intranet.estructurainterna.proceso-comercial.demanda-omnicanal') }}"
                        class="bg-primary hover:bg-orange-600 text-white px-4 py-2 rounded text-xs font-bold transition-colors">
                        Mostrar detalle Fase 1: Demanda Omnicanal
                    </a>
                </div> --}}
            </div>

            <!-- Paso 2 -->
            <div class="process-step phase-section" id="fase-2">
                <h3 class="text-xl font-bold text-gray-800 mb-3">Fase 2:
                    <span class="bg-orange-100 text-orange-800 text-xl font-medium px-2 py-1 rounded">
                        Asignación de Cuentas y Segmentación de Oportunidades
                    </span>
                </h3>

                <div class="bg-gray-100 p-4 rounded-lg mb-6">
                    <h4 class="font-bold text-gray-700 mb-2">Objetivo:</h4>
                    <p class="text-gray-700 mb-3">Identificar los clientes
                        potenciales, para su seguimiento.</p>
                    <h4 class="font-bold text-gray-700 mb-2">Actividades Clave:</h4>
                    <ol class="list-disc pl-5 text-gray-600 space-y-1">
                        <li>Evaluar el tipo de oportunidad</li>
                        <li>Subir archivo para carga CRM</li>
                        <li>Asignar ejecutivos de cuenta</li>
                        <li>Establecer prioridades según el potencial y tamaño del cliente</li>
                    </ol>
                    <h4 class="font-bold text-gray-700 py-2">Entregables:</h4>
                    <ol class="list-disc pl-5 text-gray-600 space-y-1">
                        <li>Porcentaje de oportunidades atendidas en tiempo y forma</li>
                        <li>Tasa de conversión por tipo de oportunidad</li>
                    </ol>
                </div>


                <div class="flex items-center text-sm text-gray-500">
                    <span class="mr-4">
                        <i class="far fa-clock mr-1"></i> Duración: 5-10 días
                    </span>
                    <span>
                        <i class="fas fa-users mr-1"></i> Participantes: Gerente Marketing, Gerencia Ventas, Ejecutivo de
                        Cuenta, Responsable CRM
                    </span>
                </div>
            </div>

            <!-- Paso 3 -->
            <div class="process-step phase-section" id="fase-3">
                <h3 class="text-xl font-bold text-gray-800 mb-3">Fase 3:
                    <span class="bg-orange-100 text-orange-800 text-xl font-medium px-2 py-1 rounded">
                        Análisis de Requerimientos
                    </span>
                </h3>

                <div class="bg-gray-100 p-4 rounded-lg mb-6">
                    <h4 class="font-bold text-gray-700 mb-2">Objetivo:</h4>
                    <p class="text-gray-700 mb-3">Entender las necesidades del
                        cliente y mapear los requisitos
                        funcionales y técnicos.</p>
                    <h4 class="font-bold text-gray-700 mb-2">Actividades Clave:</h4>
                    <ol class="list-disc pl-5 text-gray-600 space-y-1">
                        <li>Realizar reuniones con clientes</li>
                        <li>Calificación de leads (BANT o similares)</li>
                        <li>Documentar requerimientos y objetivos de negocio</li>
                        <li>Analizar restricciones técnicas, financieras y de tiempo</li>
                    </ol>
                    <h4 class="font-bold text-gray-700 py-2">Entregables:</h4>
                    <ol class="list-disc pl-5 text-gray-600 space-y-1">
                        <li>Documento de Requisitos del Cliente (RFP)</li>
                        <li>Mapa de requerimientos</li>
                        <li>Análisis de brechas</li>
                    </ol>
                </div>

                <div class="flex items-center text-sm text-gray-500">
                    <span class="mr-4">
                        <i class="far fa-clock mr-1"></i> Duración: 7-14 días
                    </span>
                    <span>
                        <i class="fas fa-users mr-1"></i> Participantes: Ejecutivo de Cuenta, Equipo Tecnico, Gerente de
                        Proyecto
                    </span>
                </div>
            </div>

            <!-- Paso 4 -->
            <div class="process-step phase-section" id="fase-4">
                <h3 class="text-xl font-bold text-gray-800 mb-3">Fase 4:
                    <span class="bg-pink-100 text-pink-800 text-xl font-medium px-2 py-1 rounded">
                        Diseño de Solución y Propuesta Técnico-Comercial
                    </span>
                </h3>

                <div class="bg-pink-100 p-4 rounded-lg mb-6">
                    <h4 class="font-bold text-gray-700 mb-2">Objetivo:</h4>
                    <p class="text-gray-700 mb-3">Preparar y presentar una propuesta
                        detallada que incluya costos, términos y condiciones, según las
                        necesidades del proyecto.</p>
                    {{-- <h4 class="font-bold text-gray-700 mb-2 text-base">Ver Proceso:
                        <a href="{{ route('intranet.estructurainterna.proceso-ingenieria') }}" target="_blank"
                            class="inline-block bg-orange-500 text-white text-sm px-4 py-2 rounded-lg hover:bg-orange-600 transition">
                            Proceso Comercial Ingeniería</a>
                    </h4> --}}
                    <h4 class="font-bold text-gray-700 mb-2 text-base">
                        Ver Proceso:
                    </h4>
                    <a href="{{ route('intranet.estructurainterna.proceso-ingenieria') }}" target="_blank"
                        class="inline-block bg-orange-500 text-white text-sm px-4 py-2 rounded-lg hover:bg-orange-600 transition">
                        Proceso Comercial Ingeniería
                    </a>
                </div>
                <div class="flex items-center text-sm text-gray-500">
                    <span class="mr-4">
                        <i class="far fa-clock mr-1"></i> Duración: 7-14 días
                    </span>
                    <span>
                        <i class="fas fa-users mr-1"></i> Participantes: Equipo Ingenieria
                    </span>
                </div>
            </div>

            <!-- Paso 5 -->
            <div class="process-step phase-section" id="fase-5">
                <h3 class="text-xl font-bold text-gray-800 mb-3">Fase 5:
                    <span class="bg-green-100 text-green-800 text-xl font-medium px-2 py-1 rounded">
                        Proceso Administrativo - Facturación - Inventario
                    </span>
                </h3>

                <div class="bg-gray-100 p-4 rounded-lg mb-6">
                    <h4 class="font-bold text-gray-700 mb-2">Confirmar y Garantiza:</h4>
                    <ol class="list-disc pl-5 text-gray-600 space-y-1">
                        <li>Entrega de equipos, licencias</li>
                        <li>Plan de viáticos</li>
                        <li>Generación de facturación (anticipos, pago a una exposición, inicio de pagos a varias
                            exposiciones)</li>
                    </ol>
                    {{-- <h4 class="font-bold text-gray-700 mb-2 mt-2">Ver Proceso:
                        <a href="{{ route('intranet.administracion.facturacion-inventario') }}" target="_blank"
                            class="text-orange-500">
                            Administración Finanzas - Inventario</a>
                    </h4> --}}
                    <h4 class="font-bold text-gray-700 mb-2 text-base py-2">
                        Ver Proceso:
                    </h4>
                    <a href="{{ route('intranet.administracion.facturacion-inventario') }}" target="_blank"
                        class="inline-block bg-orange-500 text-white text-sm px-4 py-2 rounded-lg hover:bg-orange-600 transition">
                        Finanzas - Inventario
                    </a>
                </div>

                <div class="flex items-center text-sm text-gray-500">
                    <span class="mr-4">
                        <i class="far fa-clock mr-1"></i> Duración: 7-14 días
                    </span>
                    <span>
                        <i class="fas fa-users mr-1"></i> Participantes: Ejecutivo de Cuenta, Equipo Tecnico, Gerente de
                        Proyecto
                    </span>
                </div>
            </div>

            <!-- Paso 6 -->
            <div class="process-step phase-section" id="fase-6">
                <h3 class="text-xl font-bold text-gray-800 mb-3">Fase 6:
                    <span class="bg-orange-100 text-orange-800 text-xl font-medium px-2 py-1 rounded">
                        Negociación y Cierre
                    </span>
                </h3>

                <div class="bg-gray-100 p-4 rounded-lg mb-6">
                    <h4 class="font-bold text-gray-700 mb-2">Objetivo:</h4>
                    <p class="text-gray-700 mb-3">Lograr la aceptación formal
                        del cliente y la firma del contrato.</p>
                    <h4 class="font-bold text-gray-700 mb-2">Actividades Clave:</h4>
                    <ol class="list-disc pl-5 text-gray-600 space-y-1">
                        <li>Presentación de propuestas</li>
                        <li>Revisar términos comerciales y técnicos con el cliente</li>
                        <li>Gestionar objeciones y renegociar si es necesario</li>
                        <li>Formalizar acuerdos (contratos, órdenes de compra)</li>
                        <li>Entrega Factura(s)</li>
                    </ol>
                    <h4 class="font-bold text-gray-700 py-2">Entregables:</h4>
                    <ol class="list-disc pl-5 text-gray-600 space-y-1">
                        <li>Paquete de diseño final (documentación consolidada)</li>
                        <li>Checklist de revisión técnica y comercial</li>
                        <li>Soporte en reuniones de presentación al cliente</li>
                        <li>Contrato Firmado</li>
                    </ol>
                </div>

                <div class="flex items-center text-sm text-gray-500">
                    <span class="mr-4">
                        <i class="far fa-clock mr-1"></i> Duración: 40 hrs
                    </span>
                    <span>
                        <i class="fas fa-users mr-1"></i> Participantes: Arquitecto de Soluciones, Gerente Ventas,
                        Ejecutivo Ventas, Gerente de Proyecto
                    </span>
                </div>
            </div>

            <!-- Paso 7 -->
            <div class="process-step phase-section" id="fase-7">
                <h3 class="text-xl font-bold text-gray-800 mb-3">Fase 7:
                    <span class="bg-blue-100 text-blue-800 text-xl font-medium px-2 py-1 rounded">
                        Entrega Servicios a Cliente
                    </span>
                </h3>

                <div class="bg-blue-100 p-4 rounded-lg mb-6">
                    <h4 class="font-bold text-gray-700 mb-2">Objetivo:</h4>
                    <p class="text-gray-700 mb-3">Realizar la implementación de la solución, cuidando el
                        alcance, tiempo y entregables que se ofreció en el contrato</p>
                    <p class="text-gray-700 mb-3">Entrega formal del proyecto finalizado al cliente</p>

                    {{--  <h4 class="font-bold text-gray-700 mb-2">Ver Proceso:
                        <a href="{{ route('intranet.estructurainterna.proceso-ingenieria') }}" class="text-orange-500">
                            Ingeniería Proceso Comercial Ingeniería</a>
                    </h4> --}}
                    <h4 class="font-bold text-gray-700 mb-2 text-base">
                        Ver Proceso:
                    </h4>
                    <a href="{{ route('intranet.estructurainterna.proceso-ingenieria') }}" target="_blank"
                        class="inline-block bg-orange-500 text-white text-sm px-4 py-2 rounded-lg hover:bg-orange-600 transition">
                        Proceso Comercial Ingeniería
                    </a>
                </div>

                <div class="flex items-center text-sm text-gray-500">
                    <span class="mr-4">
                        <i class="far fa-clock mr-1"></i> Duración: 7-14 días
                    </span>
                    <span>
                        <i class="fas fa-users mr-1"></i> Participantes: Ejecutivo de Cuenta, Equipo Tecnico, Gerente de
                        Proyecto
                    </span>
                </div>
            </div>

            <!-- Paso 8 -->
            <div class="process-step phase-section" id="fase-8">
                <h3 class="text-xl font-bold text-gray-800 mb-3">Fase 8:
                    <span class="bg-green-100 text-green-800 text-xl font-medium px-2 py-1 rounded">
                        Soporte al Cliente
                    </span>
                </h3>

                <div class="bg-green-100 p-4 rounded-lg mb-6">
                    <h4 class="font-bold text-gray-700 mb-2">Objetivo:</h4>
                    <p class="text-gray-700 mb-3">Asegurar la operación continua y eficiente de los servicios, cumpliendo
                        SLA y
                        gestionando incidentes,problemas y cambios.</p>

                    {{--  <h4 class="font-bold text-gray-700 mb-2">Ver Proceso:
                        <a href="{{ route('intranet.estructurainterna.proceso-ingenieria') }}" target="_blank"
                            class="text-orange-500">
                            Ingeniería Proceso Comercial Ingeniería</a>
                    </h4> --}}
                    <h4 class="font-bold text-gray-700 mb-2 text-base">
                        Ver Proceso:
                    </h4>
                    <a href="{{ route('intranet.estructurainterna.proceso-ingenieria') }}" target="_blank"
                        class="inline-block bg-orange-500 text-white text-sm px-4 py-2 rounded-lg hover:bg-orange-600 transition">
                        Proceso Comercial Ingeniería
                    </a>
                </div>

                <div class="flex items-center text-sm text-gray-500">
                    <span class="mr-4">
                        <i class="far fa-clock mr-1"></i> Duración: 7-14 días
                    </span>
                    <span>
                        <i class="fas fa-users mr-1"></i> Participantes: Ejecutivo de Cuenta, Equipo Tecnico, Gerente de
                        Proyecto
                    </span>
                </div>
            </div>

            <!-- Paso 9 -->
            <div class="process-step phase-section" id="fase-9">
                <h3 class="text-xl font-bold text-gray-800 mb-3">Fase 9:
                    <span class="bg-orange-100 text-orange-800 text-xl font-medium px-2 py-1 rounded">
                        Acompañamiento Comercial y Mejora Continua
                    </span>
                </h3>

                <div class="bg-gray-100 p-4 rounded-lg mb-6">
                    <h4 class="font-bold text-gray-700 mb-2">Objetivo:</h4>
                    <p class="text-gray-700 mb-3">Generar propuestas que aumenten el
                        valor para el cliente.</p>
                    <h4 class="font-bold text-gray-700 mb-2">Actividades Clave:</h4>
                    <ol class="list-disc pl-5 text-gray-600 space-y-1">
                        <li>Revisiones periódicas de satisfacción y desempeño</li>
                        <li>Identificación de necesidades adicionales (cross-selling,upselling)</li>
                        <li>Proponer mejoras continuas a las soluciones existentes</li>
                    </ol>
                    <h4 class="font-bold text-gray-700 py-2">Entregables:</h4>
                    <ol class="list-disc pl-5 text-gray-600 space-y-1">
                        <li>Informes de Rendimiento</li>
                    </ol>
                </div>

                <div class="flex items-center text-sm text-gray-500">
                    <span class="mr-4">
                        <i class="far fa-clock mr-1"></i> Duración: 0-0 Hrs
                    </span>
                    <span>
                        <i class="fas fa-users mr-1"></i> Participantes: Arquitecto de Soluciones, Consultor Comercial,
                        Ejecutivo de Cuenta, Gerente de Ventas, Gerente de Proyecto
                    </span>
                </div>
            </div>

            <!-- Paso 10 -->
            <div class="process-step phase-section" id="fase-10">
                <h3 class="text-xl font-bold text-gray-800 mb-3">Fase 10:
                    <span class="bg-orange-100 text-orange-800 text-xl font-medium px-2 py-1 rounded">
                        Programa de Lealtad y Fidelización
                    </span>
                </h3>

                <div class="bg-gray-100 p-4 rounded-lg mb-6">
                    <h4 class="font-bold text-gray-700 mb-2">Objetivo:</h4>
                    <p class="text-gray-700 mb-3">Incrementar la fidelidad y satisfacción
                        del cliente</p>
                    <h4 class="font-bold text-gray-700 mb-2">Actividades Clave:</h4>
                    <ol class="list-disc pl-5 text-gray-600 space-y-1">
                        <li>Diseñar esquemas de recompensas</li>
                        <li>Reconocer a clientes destacados</li>
                        <li>Ofrecer programas personalizados de capacitación o soporte</li>
                    </ol>
                    <h4 class="font-bold text-gray-700 py-2">Entregables:</h4>
                    <ol class="list-disc pl-5 text-gray-600 space-y-1">
                        <li>Plan de programas de lealtad</li>
                    </ol>
                </div>

                <div class="flex items-center text-sm text-gray-500">
                    <span class="mr-4">
                        <i class="far fa-clock mr-1"></i> Duración: 0-0 Hrs días
                    </span>
                    <span>
                        <i class="fas fa-users mr-1"></i> Participantes: Arquitecto de Soluciones, Consultor Comercial,
                        Ejecutivo de Cuenta, Gerente de Ventas, Gerente de Proyecto
                    </span>
                </div>
            </div>


        </div>
    </div>


@endsection
@push('js')
@endpush
