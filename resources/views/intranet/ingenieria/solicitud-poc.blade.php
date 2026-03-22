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
                            <span class="ml-1 text-sm text-primary font-medium md:ml-2">Solicitud POC</span>
                        </div>
                    </li>
                </ol>
            </nav>
        </div>
    </div>

    <!-- Encabezado -->
    <header class="mt-8 mb-8">
        <h1 class="text-3xl font-bold text-gray-800 mb-2">Proceso Ingeniería IT - Proceso POC</h1>
        <p class="text-gray-600">Una Prueba de Concepto (PoC) se puede definir de manera sencilla como un proceso inicial y
            práctico para evaluar
            la viabilidad y eficacia de una idea o tecnología antes de comprometerse completamente con su implementación a
            gran escala.</p>
    </header>
    <div class="text-center mb-16 mt-8">
        <h1 class="text-5xl font-black font-display tracking-tight text-primary uppercase">
            PROCESO POC
        </h1>
        <p></p>
        <p class="text-slate-600 mt-6 text-lg">Flujo completo de implementación</p>
    </div>

    <!-- Grid de fases del proceso POC -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 items-start">
        <!-- Fase 1: Recepción de Solicitud -->
        <div class="flex flex-col space-y-4">
            <div class="arrow-header bg-phase-1 text-white p-4 h-24 flex flex-col justify-center items-center text-center">
                <span class="text-sm font-bold uppercase">1. Recepción de Solicitud por parte del Área de Ventas</span>
                <span class="text-[10px] opacity-90">Tiempo: 1-2 días</span>
            </div>
            <div class="poc-card">
                <h4 class="font-bold text-sm mb-2 uppercase text-phase-1 text-center">Tareas Clave:</h4>
                <p class="text-sm leading-relaxed mb-4"><span class="font-bold">Objetivo:</span> Recibir y documentar la
                    solicitud de POC del área de ventas</p>

                <h6 class="font-bold text-sm mb-2 uppercase text-phase-1">Recopilar información inicial:</h6>
                <ol class="text-xs space-y-2 list-decimal ml-4 mb-4">
                    <li>Recopilar información del cliente</li>
                    <li>Verificar datos de contacto y responsables</li>
                    <li>Documentar necesidad específica</li>
                    <li>Registrar solicitud en sistema</li>
                </ol>

                <h6 class="font-bold text-sm mb-2 uppercase text-phase-1">Disposición para realización:</h6>
                <ol class="text-xs space-y-2 list-decimal ml-4 mb-4">
                    <li>Tiempo estimado para realizar la POC</li>
                </ol>

                <div class="bg-blue-50 p-3 rounded-lg border border-blue-100">
                    <h5 class="font-bold text-xs mb-1 text-blue-700">Información Requerida:</h5>
                    <ul class="text-xs text-blue-600 space-y-1">
                        <li>• Nombre de la empresa</li>
                        <li>• Contacto principal (nombre, correo, teléfono)</li>
                        <li>• Área específica de conectividad</li>
                        <li>• Descripción del problema o necesidad actual</li>
                        <li>• Objetivo esperado</li>
                    </ul>
                </div>
                <h4 class="font-bold p-2 text-sm mb-2 uppercase text-phase-1">Participantes:</h4>
                <ol class="text-xs space-y-2 list-decimal ml-4 mb-4">
                    <li> Ejecutivo Cuenta</li>
                    <li> Equipo técnico</li>
                    <li> Operations Support</li>
                </ol>
            </div>
        </div>

        <!-- Fase 2: Validación Interna -->
        <div class="flex flex-col space-y-4">
            <div class="arrow-header bg-phase-2 text-white p-4 h-24 flex flex-col justify-center items-center text-center">
                <span class="text-sm font-bold uppercase">2. Validación Interna y Aprobación</span>
                <span class="text-[10px] opacity-90">Tiempo: 2-3 días</span>
            </div>
            <div class="poc-card">
                <h4 class="font-bold text-sm mb-2 uppercase text-phase-2 text-center">Tareas Clave:</h4>
                <p class="text-sm leading-relaxed mb-4"><span class="font-bold">Objetivo:</span> Evaluar factibilidad
                    técnica y obtener aprobación</p>

                <h6 class="font-bold text-sm mb-2 uppercase text-phase-2">Revisión de la Solicitud:</h6>
                <ol class="text-xs space-y-2 list-decimal ml-4 mb-4">
                    <li>Revisión técnica con equipo especializado (técnico y operaciones)</li>
                    <li>Validación de disponibilidad de recursos</li>
                    <li>Factibilidad técnica</li>
                </ol>

                <h6 class="font-bold text-sm mb-2 uppercase text-phase-2">Generar propuesta inicial:</h6>
                <ol class="text-xs space-y-2 list-decimal ml-4 mb-4">
                    <li>Especificaciones técnicas preliminares</li>
                    <li>Cronograma tentativo</li>
                    <li>Costos asociados</li>
                </ol>

                <div class="bg-orange-50 p-3 rounded-lg border border-orange-100">
                    <h5 class="font-bold text-xs mb-1 text-orange-700">Aprobaciones Requeridas:</h5>
                    <ul class="text-xs text-orange-600 space-y-1">
                        <li>✓ Equipo Técnico</li>
                        <li>✓ Operations Support</li>
                        <li>✓ Administración</li>
                        <li>✓ Gerencia</li>
                    </ul>
                </div>
                <h4 class="font-bold p-2 text-sm mb-2 uppercase text-phase-1">Participantes:</h4>
                <ol class="text-xs space-y-2 list-decimal ml-4 mb-4">
                    <li> Ejecutivo Cuenta</li>
                    <li> Equipo técnico</li>
                    <li> Operations Support</li>
                    <li>Administración</li>
                </ol>
            </div>
        </div>

        <!-- Fase 3: Planificación -->
        <div class="flex flex-col space-y-4">
            <div class="arrow-header bg-phase-3 text-white p-4 h-24 flex flex-col justify-center items-center text-center">
                <span class="text-sm font-bold uppercase">3. Planificación</span>
                <span class="text-[10px] opacity-90">Tiempo: 3-5 días</span>
            </div>
            <div class="poc-card">
                <h4 class="font-bold text-sm mb-2 uppercase text-phase-3 text-center">Tareas Clave:</h4>
                <p class="text-sm leading-relaxed mb-4"><span class="font-bold">Objetivo:</span> Diseñar plan detallado de
                    implementación</p>

                <h6 class="font-bold text-sm mb-2 uppercase text-phase-3">Realizar visita a sitio:</h6>
                <ol class="text-xs space-y-2 list-decimal ml-4 mb-4">
                    <li>Visita técnica al sitio (si aplica)</li>
                    <li>Identificación de puntos de red, ubicación de equipos</li>
                    <li>Evaluación de infraestrucutra existente</li>>
                </ol>
                <h6 class="font-bold text-sm mb-2 uppercase text-phase-3">Diseño del plan técnio:</h6>
                <ol class="text-xs space-y-2 list-decimal ml-4 mb-4">
                    <li>Diseñar del plan técnico</li>
                    <li>Diagramas de Red</li>
                    <li>Equipos necesarios (hardware)</li>
                    <li>Preparación de documento de alcance</li>
                </ol>

                <div class="bg-green-50 p-3 rounded-lg border border-green-100">
                    <h5 class="font-bold text-xs mb-1 text-green-700">Documentos a Generar:</h5>
                    <ul class="text-xs text-green-600 space-y-1">
                        <li>• Diagrama de red</li>
                        <li>• Lista de equipos necesarios (switches, APs, cableado, etc.)</li>
                        <li>• Recuros humanos requeridos</li>
                        <li>• Cronograma detallado</li>
                        <li>• KPIs de evaluación</li>
                    </ul>
                </div>
                <h4 class="font-bold p-2 text-sm mb-2 uppercase text-phase-1">Participantes:</h4>
                <ol class="text-xs space-y-2 list-decimal ml-4 mb-4">
                    <li> Ejecutivo Cuenta</li>
                    <li> Equipo técnico</li>
                    <li> Operations Support</li>
                    <li>Administración-Inventarios</li>
                </ol>
            </div>
        </div>

        <!-- Fase 4: Ejecución -->
        <div class="flex flex-col space-y-4">
            <div class="arrow-header bg-phase-4 text-white p-4 h-24 flex flex-col justify-center items-center text-center">
                <span class="text-sm font-bold uppercase">4. Ejecución</span>
                <span class="text-[10px] opacity-90">Tiempo: Variable</span>
            </div>
            <div class="poc-card">
                <h4 class="font-bold text-sm mb-2 uppercase text-phase-4 text-center">Tareas Clave:</h4>
                <p class="text-sm leading-relaxed mb-4"><span class="font-bold">Objetivo:</span> Implementar y configurar la
                    solución POC</p>

                <h4 class="font-bold text-sm mb-2 uppercase text-phase-4">Asignar equipo técnico encargado de:</h4>
                <ol class="text-xs space-y-2 list-decimal ml-4 mb-4">
                    <li>Instalación de equipos en sitio</li>
                    <li>Configuración de switches y APs</li>
                    <li>Implementación de cableado</li>
                    <li>Monitoreo inicial de desempeño</li>
                </ol>

                <h4 class="font-bold text-sm mb-2 uppercase text-phase-4">Monitoreo de desempeño:</h4>
                <ol class="text-xs space-y-2 list-decimal ml-4 mb-4">
                    <li>Monitoreo inicial de desempeño</li>
                    <li>Asegurar que los indicarores clave estne dentro de los rangos establecidos</li>
                </ol>

                <div class="bg-purple-50 p-3 rounded-lg border border-purple-100">
                    <h5 class="font-bold text-xs mb-1 text-purple-700">Equipos Involucrados:</h5>
                    <ul class="text-xs text-purple-600 space-y-1">
                        <li>◉ Switches y APs</li>
                        <li>◉ Cableado estructurado</li>
                        <li>◉ Equipos de monitoreo</li>
                        <li>◉ Herramientas de prueba</li>
                    </ul>
                    <h5 class="font-bold text-xs mb-1 text-purple-700">Resultados:</h5>
                    <ul class="text-xs text-purple-600 space-y-1">
                        <li>◉ Documentar resultados premliminares</li>
                        <li>◉ Ajustar configuraciones si es necesario</li>
                    </ul>
                </div>

                <h4 class="font-bold p-2 text-sm mb-2 uppercase text-phase-1">Participantes:</h4>
                <ol class="text-xs space-y-2 list-decimal ml-4 mb-4">
                    <li> Ejecutivo Cuenta</li>
                    <li> Equipo técnico</li>
                    <li> Operations Support</li>
                </ol>
            </div>
        </div>
    </div>

    <!-- Sección de información adicional -->
    <div class="mt-16 grid grid-cols-1 lg:grid-cols-2 gap-8">
        <!-- Requisitos y Consideraciones -->
        <div class="bg-white rounded-2xl border border-gray-300 p-6 shadow-sm">
            <h3 class="text-xl font-bold text-primary mb-4 flex items-center">
                Requisitos para Iniciar POC
            </h3>
            <div class="space-y-4">
                <div class="flex items-start">
                    <i class="ri-checkbox-circle-line text-green-500 text-2xl"></i>
                    <div>
                        <h4 class="font-bold text-slate-800">Documentación Completa</h4>
                        <p class="text-sm text-slate-600">Formulario de solicitud con toda la información requerida del
                            cliente.</p>
                    </div>
                </div>
                <div class="flex items-start">
                    <i class="ri-checkbox-circle-line text-green-500 text-2xl"></i>
                    <div>
                        <h4 class="font-bold text-slate-800">Aprobación Interna</h4>
                        <p class="text-sm text-slate-600">Validación técnica y aprobación de gerencia para proceder.</p>
                    </div>
                </div>
                <div class="flex items-start">
                    <i class="ri-checkbox-circle-line text-green-500 text-2xl"></i>
                    <div>
                        <h4 class="font-bold text-slate-800">Recursos Disponibles</h4>
                        <p class="text-sm text-slate-600">Equipos, personal y tiempo asignado para la implementación.</p>
                    </div>
                </div>
                <div class="flex items-start">
                    <i class="ri-checkbox-circle-line text-green-500 text-2xl"></i>
                    <div>
                        <h4 class="font-bold text-slate-800">Acuerdo Cliente</h4>
                        <p class="text-sm text-slate-600">Aceptación formal del alcance y términos de la POC por parte del
                            cliente.</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Participantes y Responsabilidades -->
        <div class="bg-white rounded-2xl border border-gray-300 p-6 shadow-sm">
            <h3 class="text-xl font-bold text-primary mb-4 flex items-center">
                Roles de los Participantes del Proceso
            </h3>
            <div class="space-y-3">
                <div class="flex justify-between items-center border-b pb-2">
                    <span class="font-medium">Ejecutivo de Cuenta</span>
                    <span class="text-xs bg-blue-100 text-blue-800 px-2 py-1 rounded">Coordinador</span>
                </div>
                <div class="flex justify-between items-center border-b pb-2">
                    <span class="font-medium">Equipo Técnico</span>
                    <span class="text-xs bg-green-100 text-green-800 px-2 py-1 rounded">Implementación</span>
                </div>
                <div class="flex justify-between items-center border-b pb-2">
                    <span class="font-medium">Operations Support</span>
                    <span class="text-xs bg-purple-100 text-purple-800 px-2 py-1 rounded">Soporte</span>
                </div>
                <div class="flex justify-between items-center border-b pb-2">
                    <span class="font-medium">Administración</span>
                    <span class="text-xs bg-orange-100 text-orange-800 px-2 py-1 rounded">Recursos</span>
                </div>
                <div class="flex justify-between items-center">
                    <span class="font-medium">Gerencia</span>
                    <span class="text-xs bg-red-100 text-red-800 px-2 py-1 rounded">Aprobación</span>
                </div>
            </div>
        </div>
    </div>

    <!-- Cierre POC -->
    <div class="mb-12 mt-6">
        <h1 class="text-5xl font-black font-display tracking-tight text-slate-900 mb-2 text-center">
            Evaluación y Cierre de la <span class="text-primary  uppercase">POC</span>
        </h1>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-12 gap-8 items-start">
        <div class="md:col-span-4 flex flex-col space-y-6">
            <div
                class="arrow-header bg-slate-400 dark:bg-slate-600 p-4 pl-6 pr-10 text-center min-h-[60px] flex items-center justify-center shadow-md">
                <span class="text-lg font-bold text-white leading-tight">1. Evaluación y Cierre de la POC</span>
            </div>
            <div
                class="workflow-card bg-white/70 dark:bg-surface-dark/70 backdrop-blur-sm rounded-[2.5rem] p-8 shadow-sm border border-slate-200 dark:border-slate-800">
                <h3 class="text-xl font-bold text-center mb-8 border-b border-slate-200 dark:border-slate-700 pb-4">
                    Tareas Clave:</h3>
                <div class="space-y-8 text-[15px]">
                    <div>
                        <p class="font-bold mb-3">Presentar los resultados:</p>
                        <ul class="list-disc pl-5 space-y-2 text-gray-800 ">
                            <li>Informe técnico con los resultados obtenidos.</li>
                            <li>Comparativa con los objetivos iniciales.</li>
                        </ul>
                    </div>
                    <div>
                        <p class="font-bold mb-3">Recopilar retroalimentación del cliente:</p>
                        <ul class="list-disc pl-5 space-y-2 text-slate-600">
                            <li>Identificar áreas de mejora.</li>
                            <li>Confirmar la disposición para avanzar con un proyecto definitivo.</li>
                        </ul>
                    </div>
                    <div>
                        <p class="font-bold mb-3">Realizar el cierre administrativo:</p>
                        <ul class="list-disc pl-5 space-y-2 text-slate-600">
                            <li>Actualizar registros internos.</li>
                            <li>Archivar documentación relevante.</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="md:col-span-8 flex flex-col space-y-6">
            <div
                class="arrow-header bg-slate-400 dark:bg-slate-600 p-4 px-10 text-center min-h-[60px] flex items-center justify-center shadow-md">
                <span class="text-lg font-bold text-white leading-tight">Principales KPI's</span>
            </div>
            <div
                class="workflow-card bg-white/70 dark:bg-surface-dark/70 backdrop-blur-sm rounded-[3rem] p-10 shadow-sm border border-slate-200 dark:border-slate-800">
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-x-12 gap-y-8">
                    <div>
                        <h4 class="font-bold text-slate-900">Tiempo de respuesta a la solicitud de
                            PoC:</h4>
                        <p class="text-sm text-slate-600 mt-1">Tiempo desde que el área de
                            ventas realiza la solicitud hasta que el equipo de ingeniería la recibe.</p>
                    </div>
                    <div>
                        <h4 class="font-bold text-slate-900">Tiempo de preparación de la propuesta
                            de PoC:</h4>
                        <p class="text-sm text-slate-600 mt-1">Tiempo necesario para diseñar,
                            planificar y documentar la PoC.</p>
                    </div>
                    <div>
                        <h4 class="font-bold text-slate-900">Tasa de éxito de la PoC:</h4>
                        <p class="text-sm text-slate-600 mt-1">Porcentaje de PoCs que cumplen
                            con los requerimientos técnicos definidos al inicio del proyecto.</p>
                    </div>
                    <div>
                        <h4 class="font-bold text-slate-900">Tasa de incidencias técnicas:</h4>
                        <p class="text-sm text-slate-600 mt-1">Número de problemas o fallas
                            durante la ejecución de la PoC por unidad de tiempo o por proyecto.</p>
                    </div>
                    <div>
                        <h4 class="font-bold text-slate-900">Satisfacción del cliente con la PoC:
                        </h4>
                        <p class="text-sm text-slate-600 mt-1">Calificación promedio obtenida
                            mediante encuestas al cliente al finalizar la PoC.</p>
                    </div>
                    <div>
                        <h4 class="font-bold text-slate-900">Costo por PoC:</h4>
                        <p class="text-sm text-slate-600 mt-1">Inversión promedio en recursos
                            materiales, humanos y de tiempo por cada PoC.</p>
                    </div>
                    <div>
                        <h4 class="font-bold text-slate-900">Utilización de recursos técnicos:</h4>
                        <p class="text-sm text-slate-600 mt-1">Porcentaje de uso de equipos,
                            herramientas y personal en relación con su disponibilidad.</p>
                    </div>
                    <div>
                        <h4 class="font-bold text-slate-900">Retorno de inversión (ROI) de la PoC:
                        </h4>
                        <p class="text-sm text-slate-600 mt-1">Relación entre el valor del
                            proyecto ganado gracias a la PoC y el costo asociado a su ejecución.</p>
                    </div>
                </div>

            </div>

        </div>
    </div>

    <!-- Matriz RACI -->
    <div class="mb-12 mt-6">
        <h1 class="text-5xl font-black font-display tracking-tight text-slate-900 mb-2 text-center">
            Matriz <span class="text-primary  uppercase">RACI</span>
        </h1>
    </div>
    <div class="bg-white rounded-lg shadow p-6 mb-6">
        <div>
            <div class="overflow-x-auto bg-white rounded-xl shadow-xl border border-slate-200">
                <table class="w-full border-collapse raci-table">
                    <thead>
                        <tr class="bg-slate-200">
                            <th class="w-16 p-4 text-center font-bold text-slate-600 text-sm">FASE</th>
                            <th class="p-4 text-center font-bold text-slate-600 text-sm">TAREAS</th>
                            <th class="vertical-text">
                                <div>Ejecutivo de<br> Cuenta</div>
                            </th>
                            <th class="vertical-text">
                                <div>Gerente de<br> Venta</div>
                            </th>
                            <th class="vertical-text">
                                <div>Operations <br>Support</div>
                            </th>
                            <th class="vertical-text">
                                <div>Equipo<br> Tecnico</div>
                            </th>
                            <th class="vertical-text">
                                <div>Administración</div>
                            </th>
                            <th class="vertical-text">
                                <div>Adninistración<br>Inventarios</div>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="bg-white text-center font-bold text-lg p-4" rowspan="10">
                                <span class="vertical-text inline-block">P O C</span>
                            </td>
                            <td class="p-6 text-sm font-medium bg-white">
                                Recopilar información inical del cliente
                            </td>
                            <td class="bg-raci-r text-center font-bold text-lg">R</td>
                            <td class="bg-raci-a text-center font-bold text-lg">A</td>
                            <td class="bg-raci-c text-center font-bold text-lg">C</td>
                            <td class="bg-raci-i text-center font-bold text-lg">I</td>
                            <td class="bg-raci-w text-center font-bold text-lg"></td>
                            <td class="bg-raci-w text-center font-bold text-lg"></td>
                        </tr>
                        <tr>
                            <td class="p-6 text-sm font-medium bg-white">
                                Confirmar la dispocisión con el cliente para realizarla
                            </td>
                            <td class="bg-raci-r text-center font-bold text-lg">R</td>
                            <td class="bg-raci-a text-center font-bold text-lg">A</td>
                            <td class="bg-raci-c text-center font-bold text-lg">C</td>
                            <td class="bg-raci-i text-center font-bold text-lg">I</td>
                            <td class="bg-raci-w text-center font-bold text-lg"></td>
                            <td class="bg-raci-w text-center font-bold text-lg"></td>
                        </tr>
                        <tr>
                            <td class="p-6 text-sm font-medium bg-white">
                                Revisar la solicitudo con el equipo técnico y operaciones para su evaluación
                            </td>
                            <td class="bg-raci-r text-center font-bold text-lg">R</td>
                            <td class="bg-raci-a text-center font-bold text-lg">A</td>
                            <td class="bg-raci-i text-center font-bold text-lg">I</td>
                            <td class="bg-raci-c text-center font-bold text-lg">C</td>
                            <td class="bg-raci-w text-center font-bold text-lg"></td>
                            <td class="bg-raci-w text-center font-bold text-lg"></td>
                        </tr>
                        <tr>
                            <td class="p-6 text-sm font-medium bg-white">
                                Generar una propuesta incial
                            </td>
                            <td class="bg-raci-r text-center font-bold text-lg">R</td>
                            <td class="bg-raci-a text-center font-bold text-lg">A</td>
                            <td class="bg-raci-a text-center font-bold text-lg">A</td>
                            <td class="bg-raci-r text-center font-bold text-lg">R</td>
                            <td class="bg-raci-c text-center font-bold text-lg">C</td>
                            <td class="bg-raci-i text-center font-bold text-lg">I</td>
                        </tr>
                        <tr>
                            <td class="p-6 text-sm font-medium bg-white">
                                Obtner la aprobación de Gerencia
                            </td>
                            <td class="bg-raci-r text-center font-bold text-lg">R</td>
                            <td class="bg-raci-a text-center font-bold text-lg">A</td>
                            <td class="bg-raci-c text-center font-bold text-lg">C</td>
                            <td class="bg-raci-i text-center font-bold text-lg">I</td>
                            <td class="bg-raci-c text-center font-bold text-lg">C</td>
                            <td class="bg-raci-i text-center font-bold text-lg">I</td>
                        </tr>
                        <tr>
                            <td class="p-6 text-sm font-medium bg-white">
                                Realizar una visita técnica a sitio con el cliente (si aplica)
                            </td>
                            <td class="bg-raci-c text-center font-bold text-lg">C</td>
                            <td class="bg-raci-i text-center font-bold text-lg">I</td>
                            <td class="bg-raci-a text-center font-bold text-lg">A</td>
                            <td class="bg-raci-r text-center font-bold text-lg">R</td>
                            <td class="bg-raci-w text-center font-bold text-lg"></td>
                            <td class="bg-raci-w text-center font-bold text-lg"></td>
                        </tr>
                        <tr>
                            <td class="p-6 text-sm font-medium bg-white">
                                Diseñar el plan técnico
                            </td>
                            <td class="bg-raci-r text-center font-bold text-lg">R</td>
                            <td class="bg-raci-a text-center font-bold text-lg">A</td>
                            <td class="bg-raci-c text-center font-bold text-lg">C</td>
                            <td class="bg-raci-r text-center font-bold text-lg">R</td>
                            <td class="bg-raci-w text-center font-bold text-lg"></td>
                            <td class="bg-raci-w text-center font-bold text-lg"></td>
                        </tr>
                        <tr>
                            <td class="p-6 text-sm font-medium bg-white">
                                Preparar documento formal con el alcance y los terminos del POC para la aprobación del
                                cliente
                            </td>
                            <td class="bg-raci-r text-center font-bold text-lg">R</td>
                            <td class="bg-raci-a text-center font-bold text-lg">A</td>
                            <td class="bg-raci-c text-center font-bold text-lg">C</td>
                            <td class="bg-raci-i text-center font-bold text-lg">I</td>
                            <td class="bg-raci-w text-center font-bold text-lg"></td>
                            <td class="bg-raci-w text-center font-bold text-lg"></td>
                        </tr>
                        <tr>
                            <td class="p-6 text-sm font-medium bg-white">
                                Solicitud Equipos
                            </td>
                            <td class="bg-raci-r text-center font-bold text-lg">R</td>
                            <td class="bg-raci-w text-center font-bold text-lg"></td>
                            <td class="bg-raci-w text-center font-bold text-lg"></td>
                            <td class="bg-raci-i text-center font-bold text-lg">I</td>
                            <td class="bg-raci-a text-center font-bold text-lg">A</td>
                            <td class="bg-raci-c text-center font-bold text-lg">C</td>
                        </tr>
                        <tr>
                            <td class="p-6 text-sm font-medium bg-white">
                                Entrega Equipos
                            </td>
                            <td class="bg-raci-c text-center font-bold text-lg">C</td>
                            <td class="bg-raci-w text-center font-bold text-lg"></td>
                            <td class="bg-raci-i text-center font-bold text-lg">I</td>
                            <td class="bg-raci-c text-center font-bold text-lg">C</td>
                            <td class="bg-raci-a text-center font-bold text-lg">A</td>
                            <td class="bg-raci-r text-center font-bold text-lg">R</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="mt-12 grid grid-cols-2 md:grid-cols-4 gap-4 max-w-2xl mx-auto">
                <div class="flex items-center space-x-2 bg-white p-3 rounded-lg border border-slate-200">
                    <div class="w-6 h-6 bg-raci-r rounded flex items-center justify-center font-bold text-xs">
                        R
                    </div>
                    <span class="text-xs font-semibold text-slate-600">Responsable</span>
                </div>
                <div class="flex items-center space-x-2 bg-white p-3 rounded-lg border border-slate-200">
                    <div class="w-6 h-6 bg-raci-a rounded flex items-center justify-center font-bold text-xs text-white">
                        A
                    </div>
                    <span class="text-xs font-semibold text-slate-600">Aprovador</span>
                </div>
                <div class="flex items-center space-x-2 bg-white p-3 rounded-lg border border-slate-200">
                    <div class="w-6 h-6 bg-raci-c rounded flex items-center justify-center font-bold text-xs">
                        C
                    </div>
                    <span class="text-xs font-semibold text-slate-600">Consultado</span>
                </div>
                <div class="flex items-center space-x-2 bg-white p-3 rounded-lg border border-slate-200">
                    <div class="w-6 h-6 bg-raci-i rounded flex items-center justify-center font-bold text-xs text-white">
                        I
                    </div>
                    <span class="text-xs font-semibold text-slate-600">Informado</span>
                </div>
            </div>
        </div>


    </div>
@endsection
@push('js')
@endpush
