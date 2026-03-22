@extends('layouts.diagrama')

@section('title', 'Intranet Corporativa')

@push('css')
    <link href="https://fonts.googleapis.com" rel="preconnect" />
    <link crossorigin="" href="https://fonts.gstatic.com" rel="preconnect" />
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&amp;family=Montserrat:wght@700;900&amp;display=swap"
        rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap"
        rel="stylesheet" />
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
                            <a href="{{ route('procesos-empresariales') }}"
                                class="ml-1 text-sm text-gray-600 hover:text-orange-600 md:ml-2">Procesos Empresariales</a>
                        </div>
                    </li>
                    <li>
                        <div class="flex items-center">
                            <i class="fas fa-chevron-right text-gray-400 mx-2"></i>
                            <a href="{{ route('estructurainterna.proceso-comercial') }}"
                                class="ml-1 text-sm text-gray-600 hover:text-orange-600 md:ml-2">Procesos Comercial</a>
                        </div>
                    </li>
                    <li aria-current="page">
                        <div class="flex items-center">
                            <i class="fas fa-chevron-right text-gray-400 mx-2"></i>
                            <span class="ml-1 text-sm text-primary font-medium md:ml-2">Fase 4: Detalle</span>
                        </div>
                    </li>

                </ol>
            </nav>
        </div>
    </div>

    <header class="text-center mb-16 mt-8">
        <h1 class="text-5xl font-black font-display tracking-tight text-primary uppercase">
            PROCESO COMERCIAL COMPLETO
        </h1>
        <p class="text-slate-600 mt-4">Fases 4 - Diseño de Solucion y Propuesta Técnico-Comercial</p>
    </header>

    <!-- Grid de fases (1-5 en primera fila -->
    <div class="space-y-12">
        <!-- Primera fila: Fases 1-4 -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-4 items-start">
            <!-- Fase 1 -->
            <div id="fase-1" class="phase-section flex flex-col space-y-4">
                <div
                    class="arrow-header bg-phase-11 text-white p-4 h-24 flex flex-col justify-center items-center text-center">
                    <span class="text-sm font-bold uppercase">1. Fase: Descubrimiento y Análisis</span>
                    <span class="text-[10px] opacity-90">Tiempo Estimado 20 Hrs</span>
                </div>
                <div class="phase-card">
                    <p class="text-sm leading-relaxed"><span class="font-bold">Objetivo:</span> Entender el problema del
                        cliente y el contexto
                        de la solución.</p>
                </div>
                <div class="phase-card">
                    <h4 class="font-bold text-sm mb-2 uppercase">Tareas Clave:</h4>
                    <ol class="text-xs space-y-2 list-decimal ml-4">
                        <li>Identificar stakeholders clave</li>
                        <li>Realizar análisis de negocio, impacto y viabilidad técnica</li>
                    </ol>
                </div>
                <div class="phase-card">
                    <h4 class="font-bold text-sm mb-2 uppercase">Entregables:</h4>
                    <ol class="text-xs space-y-2 list-decimal ml-4">
                        <li>Documento de entendimiento incial (SOW)</li>
                        <li>Mapa de stackeholders</li>
                        <li>Requisitos iniciales (funcionales y no funcionales)</li>
                        <li>Análisis y viabilidad técnica</li>
                    </ol>
                </div>
                <div class="phase-card">
                    <h4 class="font-bold text-sm mb-2 uppercase">Participantes:</h4>
                    <ol class="text-xs space-y-2 list-decimal ml-4">
                        <li>Gerente de Ventas</li>
                        <li>Equipo Técnico</li>
                        <li>Ejecutivo Cuenta</li>
                        <li>Cliente o Representante</li>
                        <li>PM</li>
                    </ol>
                </div>
            </div>

            <!-- Fase 2 -->
            <div id="fase-2" class="phase-section flex flex-col space-y-4">
                <div
                    class="arrow-header bg-phase-11 text-white p-4 h-24 flex flex-col justify-center items-center text-center">
                    <span class="text-sm font-bold uppercase">2. Fase: Diseño Alto Nivel (High-Level Design - HLD)</span>
                    <span class="text-[10px] opacity-90">Tiempo Estimado 15 Hrs</span>
                </div>
                <div class="phase-card">
                    <p class="text-sm leading-relaxed"><span class="font-bold">Objetivo:</span> Definir la arquitectura
                        general de la solución y las tecnologías.
                        a utilizar</p>
                </div>
                <div class="phase-card">
                    <h4 class="font-bold text-sm mb-2 uppercase">Tareas Clave:</h4>
                    <ol class="text-xs space-y-2 list-decimal ml-4">
                        <li>Diseñar un diagrama de arquitectura de solución</li>
                        <li>Identificar las tecnologías, componentes y servicios necesarios</li>
                        <li>Estimar recursos, tiempos y costos premiminares</li>
                    </ol>
                </div>
                <div class="phase-card">
                    <h4 class="font-bold text-sm mb-2 uppercase">Entregables:</h4>
                    <ol class="text-xs space-y-2 list-decimal ml-4">
                        <li>Diagrama de arquitectura de solución</li>
                        <li>Lista preliminar de técnologias y servicios</li>
                        <li>Esquema de integración y flujo de datos</li>
                        <li>Plan de riesgos premilinar</li>
                    </ol>
                </div>
                <div class="phase-card">
                    <h4 class="font-bold text-sm mb-2 uppercase">Participantes:</h4>
                    <ol class="text-xs space-y-2 list-decimal ml-4">
                        <li>Ejecutivo de Cuenta</li>
                        <li>Arquitecto de Soluciones</li>
                        <li>Equipo Técnico</li>
                        <li>PM</li>
                    </ol>
                </div>
            </div>

            <!-- Fase 3 -->
            <div id="fase-3" class="phase-section flex flex-col space-y-4">
                <div
                    class="arrow-header bg-phase-11 text-white p-4 h-24 flex flex-col justify-center items-center text-center">
                    <span class="text-sm font-bold uppercase">3. Fase: Diseño Detallado (Detailed Design - DLD)</span>
                    <span class="text-[10px] opacity-90">Tiempo Estimado 25 Hrs</span>
                </div>
                <div class="phase-card">
                    <p class="text-sm leading-relaxed"><span class="font-bold">Objetivo:</span> Definir los detalles
                        técnicos especificos necesarios para implementar la solución.</p>
                </div>
                <div class="phase-card">
                    <h4 class="font-bold text-sm mb-2 uppercase">Tareas Clave:</h4>
                    <ol class="text-xs space-y-2 list-decimal ml-4">
                        <li>Crear especificaciones detalladas para cada componente</li>
                        <li>Diseñar diagramas técnicos detallados (daigrama de flujo, esquemas de redes)</li>
                        <li>Definir SLA, capacidades y dimensionamiento</li>
                        <li>B.O.M.</li>
                    </ol>
                </div>
                <div class="phase-card">
                    <h4 class="font-bold text-sm mb-2 uppercase">Entregables:</h4>
                    <ol class="text-xs space-y-2 list-decimal ml-4">
                        <li>Especificaciones técnicas detalladas</li>
                        <li>Detalle viatícos-hospedaje (si procede)</li>
                        <li>Plan de Implemtación</li>
                    </ol>
                </div>
                <div class="phase-card">
                    <h4 class="font-bold text-sm mb-2 uppercase">Participantes:</h4>
                    <ol class="text-xs space-y-2 list-decimal ml-4">
                        <li>Arquitecto de Soluciones</li>
                        <li>Ejecutivo de Cuenta</li>
                        <li>PM</li>
                        <li>Área Compras</li>
                        <li>Área ADministración</li>
                    </ol>
                </div>
            </div>

            <!-- Fase 4 -->
            <div id="fase-4" class="phase-section flex flex-col space-y-4">
                <div
                    class="arrow-header bg-phase-11 text-white p-4 h-24 flex flex-col justify-center items-center text-center">
                    <span class="text-sm font-bold uppercase">4. Fase: Validación y Aprobación</span>
                    <span class="text-[10px] opacity-90">Tiempo Estimado 25 Hrs</span>
                </div>
                <div class="phase-card">
                    <p class="text-sm leading-relaxed"><span class="font-bold">Objetivo:</span> Asegurar que la solución
                        diseñada cumple con los requerisitos del cliente y está lista para ser cotizada.</p>
                </div>
                <div class="phase-card">
                    <h4 class="font-bold text-sm mb-2 uppercase">Tareas Clave:</h4>
                    <ol class="text-xs space-y-2 list-decimal ml-4">
                        <li>Revisar los entregables con el cliente y stakeholders internos</li>
                        <li>Ajsutar según retroalimentación</li>
                        <li>Obtner aprobación final</li>
                    </ol>
                </div>
                <div class="phase-card">
                    <h4 class="font-bold text-sm mb-2 uppercase">Entregables:</h4>
                    <ol class="text-xs space-y-2 list-decimal ml-4">
                        <li>Documento final de la solución tecnológica</li>
                        <li>Aprobación formal del cliente del alcance, costos, viatícos, términos de pago</li>
                    </ol>
                </div>
                <div class="phase-card">
                    <h4 class="font-bold text-sm mb-2 uppercase">Participantes:</h4>
                    <ol class="text-xs space-y-2 list-decimal ml-4">
                        <li>Ejecutivo de Cuenta</li>
                        <li>Equipo Técnico</li>
                        <li>Cliente</li>
                        <li>Gerente Comercial</li>
                        <li>PM</li>
                    </ol>
                </div>
            </div>

            <!-- Fase 5 -->
            <div id="fase-5" class="phase-section flex flex-col space-y-4">
                <div
                    class="arrow-header bg-phase-11 text-white p-4 h-24 flex flex-col justify-center items-center text-center">
                    <span class="text-sm font-bold uppercase">5. Fase: Handover a Ventas</span>
                    <span class="text-[10px] opacity-90">Tiempo Estimado 25 Hrs</span>
                </div>
                <div class="phase-card">
                    <p class="text-sm leading-relaxed"><span class="font-bold">Objetivo:</span> Transferir toda la
                        información de ventas para la generación de la propuesta comercial.</p>
                </div>
                <div class="phase-card">
                    <h4 class="font-bold text-sm mb-2 uppercase">Tareas Clave:</h4>
                    <ol class="text-xs space-y-2 list-decimal ml-4">
                        <li>Preparar documentación consolidada para ventas</li>
                        <li>Acompañar al equipo comercial en la presentación de la propuesta</li>
                    </ol>
                </div>
                <div class="phase-card">
                    <h4 class="font-bold text-sm mb-2 uppercase">Entregables:</h4>
                    <ol class="text-xs space-y-2 list-decimal ml-4">
                        <li>Paquete de siseño final (documentación consolidada)</li>
                        <li>Checklist de revisión técnica y comercial</li>
                        <li>Soporte en reuniones de presentación al cliente</li>
                    </ol>
                </div>
                <div class="phase-card">
                    <h4 class="font-bold text-sm mb-2 uppercase">Participantes:</h4>
                    <ol class="text-xs space-y-2 list-decimal ml-4">
                        <li>Equipo Técnico</li>
                        <li>Equipo Comercial</li>
                        <li>PM</li>
                        <li>Ejecutivo Cuenta</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <!-- Resumen de tiempos -->
    <div class="mt-16 bg-white rounded-2xl border border-gray-300 p-6">
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
