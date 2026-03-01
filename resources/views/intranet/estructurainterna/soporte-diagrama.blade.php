@extends('layouts.diagrama')

@section('title', 'Intranet Corporativa')

@push('css')
    <script src="https://cdn.tailwindcss.com?plugins=forms,typography,container-queries"></script>
@endpush

@section('content')

    <!-- Breadcrumb -->
    <div class="bg-white border-b border-gray-200 mt-5">
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
                            <a href="{{ route('intranet.estructurainterna.proceso-ingenieria.soporte-cliente') }}"
                                class="ml-1 text-sm text-gray-600 hover:text-orange-600 md:ml-2">Soporte a Cliente</a>
                        </div>
                    </li>
                    <li aria-current="page">
                        <div class="flex items-center">
                            <i class="fas fa-chevron-right text-gray-400 mx-2"></i>
                            <span class="ml-1 text-sm text-primary font-medium md:ml-2">Diagrama</span>
                        </div>
                    </li>
                </ol>
            </nav>
        </div>
    </div>

    <!-- Navegación de fases (flotante) -->
    <div class="sticky top-16 z-40 bg-white/80 backdrop-blur-sm border-b border-slate-200 py-3 hidden lg:block">
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


    <header class="text-center mb-16 mt-8">
        <h1 class="text-5xl font-black font-display tracking-tight text-primary uppercase">
            PROCESO COMERCIAL IT
        </h1>
        <h2 class="text-2xl font-bold text-gray-800 mb-6">7.Fase: Soporte a Cliente</h2>

        <p class="text-slate-600 mt-4">Fases 1 a 4 - Ciclo completo del Proceso Comercial IT</p>
    </header>

    <div class="p-4 bg-slate-50 flex justify-start space-x-2 border-t border-slate-100">
        <a href="3"
            class="bg-primary hover:bg-orange-600 text-white px-4 py-2 rounded text-xs font-bold transition-colors">
            <i class="ri-arrow-left-line"></i> Regresar
        </a>
    </div>

    <!-- Grid de fases (1-4 en primera fila, 6-10 en segunda fila) -->
    <div class="space-y-12">
        <!-- Primera fila: Fases 1-4 -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 items-start">
            <!-- Fase 1 -->
            <div id="fase-1" class="phase-section flex flex-col space-y-4">
                <div
                    class="arrow-header bg-phase-8 text-white p-4 h-24 flex flex-col justify-center items-center text-center">
                    <span class="text-sm font-bold uppercase">Fase 1: Gestión de Incidentes</span>
                </div>
                <div class="phase-card">
                    <p class="text-sm leading-relaxed"><span class="font-bold">Objetivo:</span> Restablecer la operación
                        normal del servicio lo mas rapido posible tras una interrupción,
                        minimizando el impacto en las operaciones del negocio y asegurando la mejor calidad de servicios.
                    </p>
                </div>
                <div class="phase-card">
                    <h4 class="font-bold text-sm mb-2 uppercase">Tareas Clave:</h4>
                    <ol class="text-xs space-y-2 list-decimal ml-4">
                        <li>Registrar y categorizar todos los incidesntes recibidos en el sistema de gestion de
                            incidencias</li>
                        <li>Priorizar los incidentges segun el impacto y uregencia para la empresa</li>
                        <li>Asignar el incidente al equipo técnico adecuado para su resolución</li>
                        <li>Realizar un seguimiento continuio del proceso de la resolución</li>
                        <li>Confirmar la solución con el cliente y cerrar el incidente con un registro detallado
                        </li>
                    </ol>
                </div>
                <div class="phase-card">
                    <h4 class="font-bold text-sm mb-2 uppercase">Entregables:</h4>
                    <ol class="text-xs space-y-2 list-decimal ml-4">
                        <li>Reporte de incidencias</li>
                        <li>Reporte cumplimineto SLA</li>
                    </ol>
                </div>
                <div class="phase-card">
                    <h4 class="font-bold text-sm mb-2 uppercase">Participantes:</h4>
                    <ol class="text-xs space-y-2 list-decimal ml-4">
                        <li>Service Operations/Support</li>
                        <li>Mesa Ayuda</li>
                        <li>Cliente o reprentante</li>
                    </ol>
                </div>
            </div>

            <!-- Fase 2 -->
            <div id="fase-2" class="phase-section flex flex-col space-y-4">
                <div
                    class="arrow-header bg-phase-8 text-white p-4 h-24 flex flex-col justify-center items-center text-center">
                    <span class="text-sm font-bold uppercase">Fase 2: Gestión de Problemas</span>
                </div>
                <div class="phase-card">
                    <p class="text-sm leading-relaxed"><span class="font-bold">Objetivo:</span> Indentificar y abordar de
                        manera proactiva las causes raíz de los incidentes recurrentes para
                        prevenir su ocurrencia futura y reducir el impacto en el negocio.</p>
                </div>
                <div class="phase-card">
                    <h4 class="font-bold text-sm mb-2 uppercase">Tareas Clave:</h4>
                    <ol class="text-xs space-y-2 list-decimal ml-4">
                        <li>Identificar problemas a partir de tendencias en los incidentes registrados</li>
                        <li>Realizar análisis de causas raíz utilizando métodos como 5 porqués o digaramas de
                            Ishikawa</li>
                        <li>Proponer y documentar soluciones definitivas o crear soluciones temporales (workrounds)
                            en espera de una resolución final</li>
                        <li>Actualizar la base de datos de problemas conocidos (KEDB)</li>
                    </ol>
                </div>
                <div class="phase-card">
                    <h4 class="font-bold text-sm mb-2 uppercase">Entregables:</h4>
                    <ol class="text-xs space-y-2 list-decimal ml-4">
                        <li>Memoría Técnica</li>
                    </ol>
                </div>
                <div class="phase-card">
                    <h4 class="font-bold text-sm mb-2 uppercase">Participantes:</h4>
                    <ol class="text-xs space-y-2 list-decimal ml-4">
                        <li>Service Operations/Support</li>
                        <li>Mesa Ayuda</li>
                        <li>Cliente o reprentante</li>
                    </ol>
                </div>
            </div>

            <!-- Fase 3 -->
            <div id="fase-3" class="phase-section flex flex-col space-y-4">
                <div
                    class="arrow-header bg-phase-8 text-white p-4 h-24 flex flex-col justify-center items-center text-center">
                    <span class="text-sm font-bold uppercase">Fase 3: Gestión de Cambios</span>
                </div>
                <div class="phase-card">
                    <p class="text-sm leading-relaxed"><span class="font-bold">Objetivo:</span> Garantizar que todos los
                        cambiuos en la infraestructura de TI se evalúen, aprueban,
                        implementen y revisen de manera controlada para minimizar interrupciones en los servicios.</p>
                </div>
                <div class="phase-card">
                    <h4 class="font-bold text-sm mb-2 uppercase">Tareas Clave:</h4>
                    <ol class="text-xs space-y-2 list-decimal ml-4">
                        <li>Evaluar las solicitudes de cambio (RFC) considerando el impacto, costo, riesgo y
                            urgencia</li>
                        <li>Aprobar cambios a través de cun Comité de Gestión de Cambios (CAB) o un flujo de
                            aprobación predefinido</li>
                        <li>Planificar la implementación del cambio, incluyendo pruebas previas y planes de respaldo
                            (backup)</li>
                        <li>Ejecutar el cambio según el plan aprobado</li>
                        <li>Revisar el resultado del cambio y registrar los detalles en un informa final</li>
                    </ol>
                </div>
                <div class="phase-card">
                    <h4 class="font-bold text-sm mb-2 uppercase">Entregables:</h4>
                    <ol class="text-xs space-y-2 list-decimal ml-4">
                        <li>Documentación de cambios autorizados</li>
                    </ol>
                </div>
                <div class="phase-card">
                    <h4 class="font-bold text-sm mb-2 uppercase">Participantes:</h4>
                    <ol class="text-xs space-y-2 list-decimal ml-4">
                        <li>Service Operations/Support</li>
                        <li>Mesa Ayuda</li>
                        <li>Cliente o reprentante</li>
                    </ol>
                </div>
            </div>

            <!-- Fase 4 -->
            <div id="fase-4" class="phase-section flex flex-col space-y-4">
                <div
                    class="arrow-header bg-phase-8 text-white p-4 h-24 flex flex-col justify-center items-center text-center">
                    <span class="text-sm font-bold uppercase">Fase 4: Monitorización y Generación de Reportes</span>
                </div>
                <div class="phase-card">
                    <p class="text-sm leading-relaxed"><span class="font-bold">Objetivo:</span> Proveer un monitoreo
                        continuop de los servicos y generar reportes estratégicos y operativos
                        que respalden la forma de decisiones y promuevan la mejora continua del serivio.</p>
                </div>
                <div class="phase-card">
                    <h4 class="font-bold text-sm mb-2 uppercase">Tareas Clave:</h4>
                    <ol class="text-xs space-y-2 list-decimal ml-4">
                        <li>Definir métricas clave de rendimiento (KPIs) relacioandas con la disponibilidad,
                            capacidad, confiabilidad y cumplimiento de SLA</li>
                        <li>Supervisar en tiempo real las métricas del servicio utilizando herramientas
                            automatizadas</li>
                        <li>Gererar reportes detallados y ejecutivos que incluyan análisis de tendencias y
                            propuestas de mejora</li>
                        <li>Identificar oportunidades de optimizar y proponer planes de acción específicos</li>
                    </ol>
                </div>
                <div class="phase-card">
                    <h4 class="font-bold text-sm mb-2 uppercase">Entregables:</h4>
                    <ol class="text-xs space-y-2 list-decimal ml-4">
                        <li>Registro de oportunidades de mejora</li>
                        <li>Planes de mejora continua</li>
                    </ol>
                </div>
                <div class="phase-card">
                    <h4 class="font-bold text-sm mb-2 uppercase">Participantes:</h4>
                    <ol class="text-xs space-y-2 list-decimal ml-4">
                        <li>Service Operations/Support</li>
                        <li>Mesa Ayuda</li>
                        <li>Cliente o reprentante</li>
                        <li>Ejecutivo de Cuenta</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <!-- Resumen de tiempos -->
    <div class="mt-4 bg-white rounded-2xl border border-gray-300 p-6">
        <h3 class="text-xl font-bold text-primary mb-4">Resumen de Tiempos Estimados</h3>
        <div class="grid grid-cols-2 md:grid-cols-5 gap-4">
            <div class="text-center">
                <div class="text-2xl font-bold text-phase-1">80 Hrs</div>
                <div class="text-sm text-slate-600">Fases 1-4</div>
            </div>
            <div class="text-center">
                <div class="text-2xl font-bold text-phase-5">20 Hrs</div>
                <div class="text-sm text-slate-600">Fase 5</div>
            </div>
            <div class="text-center">
                <div class="text-2xl font-bold text-phase-6">40 Hrs</div>
                <div class="text-sm text-slate-600">Fase 6</div>
            </div>
            <div class="text-center">
                <div class="text-2xl font-bold text-phase-7">Varía</div>
                <div class="text-sm text-slate-600">Fases 7-8</div>
            </div>
            <div class="text-center">
                <div class="text-2xl font-bold text-primary">140+ Hrs</div>
                <div class="text-sm text-slate-600">Total Estimado</div>
            </div>
        </div>
    </div>

@endsection
@push('js')
@endpush
