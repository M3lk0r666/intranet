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
                            <a href="{{ route('intranet.estructurainterna.proceso-ingenieria') }}"
                                class="ml-1 text-sm text-gray-600 hover:text-orange-600 md:ml-2">Proceso Ingenieria</a>
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
                <a href="#fase-5"
                    class="px-3 py-1 bg-phase-5 text-white text-xs font-bold rounded-full hover:opacity-90 transition">Fase
                    5</a>
            </div>
        </div>
    </div>


    <header class="text-center mb-16 mt-8">
        <h1 class="text-5xl font-black font-display tracking-tight text-primary uppercase">
            PROCESO COMERCIAL IT
        </h1>
        <h2 class="text-2xl font-bold text-gray-800 mb-6">6.Fase: Implementación y Entrega de Servicios a Cliente</h2>

        <p class="text-slate-600 mt-4">Fases 1 a 10 - Ciclo completo del Proceso Comercial IT</p>
    </header>

    <div class="p-4 bg-slate-50 flex justify-start space-x-2 border-t border-slate-100">
        <a href="3"
            class="bg-primary hover:bg-orange-600 text-white px-4 py-2 rounded text-xs font-bold transition-colors">
            <i class="ri-arrow-left-line"></i> Regresar
        </a>
    </div>

    <!-- Grid de fases (1-5 en primera fila, 6-10 en segunda fila) -->
    <div class="space-y-12">
        <!-- Primera fila: Fases 1-5 -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-4 items-start">
            <!-- Fase 1 -->
            <div id="fase-1" class="phase-section flex flex-col space-y-4">
                <div
                    class="arrow-header bg-phase-7 text-white p-4 h-24 flex flex-col justify-center items-center text-center">
                    <span class="text-sm font-bold uppercase">1. Entrega Área de Ventas de proyecto aceptado por
                        cliente</span>
                </div>
                <div class="phase-card">
                    <p class="text-sm leading-relaxed"><span class="font-bold">Objetivo:</span> Entrega formal del proyecto,
                        con el alcance definido y aceptado por el cliente.</p>
                </div>
                <div class="phase-card">
                    <h4 class="font-bold text-sm mb-2 uppercase">Tareas Clave:</h4>
                    <ol class="text-xs space-y-2 list-decimal ml-4">
                        <li>Generación del plan de trabajo final</li>
                        <li>Realización y entendimineto copn el equipo implementador del SOW</li>
                        <li>Presentación KickOff</li>
                    </ol>
                </div>
                <div class="phase-card">
                    <h4 class="font-bold text-sm mb-2 uppercase">Entregables:</h4>
                    <ol class="text-xs space-y-2 list-decimal ml-4">
                        <li>Plan de trabajo final</li>
                        <li>SOW</li>
                    </ol>
                </div>
                <div class="phase-card">
                    <h4 class="font-bold text-sm mb-2 uppercase">Participantes:</h4>
                    <ol class="text-xs space-y-2 list-decimal ml-4">
                        <li>Ejecutivo de Cuenta</li>
                        <li>PM</li>
                        <li>Equipo Técnico</li>
                        <li>Cliente</li>
                    </ol>
                </div>
            </div>

            <!-- Fase 2 -->
            <div id="fase-2" class="phase-section flex flex-col space-y-4">
                <div
                    class="arrow-header bg-phase-7 text-white p-4 h-24 flex flex-col justify-center items-center text-center">
                    <span class="text-sm font-bold uppercase">2. AInstalación y Configuración de la solución
                        Propuesta</span>
                </div>
                <div class="phase-card">
                    <p class="text-sm leading-relaxed"><span class="font-bold">Objetivo:</span> Instalar y configurar los
                        componentes, idenfiticados dentro del alcance del proyecto.</p>
                </div>
                <div class="phase-card">
                    <h4 class="font-bold text-sm mb-2 uppercase">Tareas Clave:</h4>
                    <ol class="text-xs space-y-2 list-decimal ml-4">
                        <li>Contar con los insumos necesarios (Hardware/Software)</li>
                        <li>Claro conocimiento del alcance de la solucion (SOW)</li>
                        <li>Validar si existe entrega de factura por cierre de actividad</li>
                    </ol>
                </div>
                <div class="phase-card">
                    <h4 class="font-bold text-sm mb-2 uppercase">Entregables:</h4>
                    <ol class="text-xs space-y-2 list-decimal ml-4">
                        <li>Documento técnico con las especificaciones de configuración</li>
                    </ol>
                </div>
                <div class="phase-card">
                    <h4 class="font-bold text-sm mb-2 uppercase">Participantes:</h4>
                    <ol class="text-xs space-y-2 list-decimal ml-4">
                        <li>Ejecutivo de Cuenta</li>
                        <li>PM</li>
                        <li>Equipo Técnico</li>
                        <li>Gerente de Ingeniería</li>
                    </ol>
                </div>
            </div>

            <!-- Fase 3 -->
            <div id="fase-3" class="phase-section flex flex-col space-y-4">
                <div
                    class="arrow-header bg-phase-7 text-white p-4 h-24 flex flex-col justify-center items-center text-center">
                    <span class="text-sm font-bold uppercase">3. Pruebas y Validación</span>
                </div>
                <div class="phase-card">
                    <p class="text-sm leading-relaxed"><span class="font-bold">Objetivo:</span> Garantizar que la solución
                        instalada y configurada, funciona correctamente bajo el alcance
                        definido.</p>
                </div>
                <div class="phase-card">
                    <h4 class="font-bold text-sm mb-2 uppercase">Tareas Clave:</h4>
                    <ol class="text-xs space-y-2 list-decimal ml-4">
                        <li>Realizar pruebas:</li>
                        <ol>
                            <li>Unitarias</li>
                            <li>Integrales</li>
                            <li>Aceptación</li>
                        </ol>
                        <li>Ajustes</li>
                    </ol>
                </div>
                <div class="phase-card">
                    <h4 class="font-bold text-sm mb-2 uppercase">Entregables:</h4>
                    <ol class="text-xs space-y-2 list-decimal ml-4">
                        <li>Documento técnico con las especificaciones de configuración actualiado</li>
                        <li>Plan de pruebas</li>
                        <li>Documento de aceptación firmado por el cliente</li>
                    </ol>
                </div>
                <div class="phase-card">
                    <h4 class="font-bold text-sm mb-2 uppercase">Participantes:</h4>
                    <ol class="text-xs space-y-2 list-decimal ml-4">
                        <li>Ejecutivo de Cuenta</li>
                        <li>PM</li>
                        <li>Equipo Técnico</li>
                        <li>Cliente o Representante</li>
                    </ol>
                </div>
            </div>

            <!-- Fase 4 -->
            <div id="fase-4" class="phase-section flex flex-col space-y-4">
                <div
                    class="arrow-header bg-phase-7 text-white p-4 h-24 flex flex-col justify-center items-center text-center">
                    <span class="text-sm font-bold uppercase">4. Capacitación y Transferencia</span>
                </div>
                <div class="phase-card">
                    <p class="text-sm leading-relaxed"><span class="font-bold">Objetivo:</span> Asegurar que los usuarios
                        finales comprendan y puedan usar la solución de manera efectiva.</p>
                </div>
                <div class="phase-card">
                    <h4 class="font-bold text-sm mb-2 uppercase">Tareas Clave:</h4>
                    <ol class="text-xs space-y-2 list-decimal ml-4">
                        <li>Capacitación a usuarios clave</li>
                        <li>Firma de aceptación de capacitación</li>
                    </ol>
                </div>
                <div class="phase-card">
                    <h4 class="font-bold text-sm mb-2 uppercase">Entregables:</h4>
                    <ol class="text-xs space-y-2 list-decimal ml-4">
                        <li>Documento de capacitación firmado</li>
                    </ol>
                </div>
                <div class="phase-card">
                    <h4 class="font-bold text-sm mb-2 uppercase">Participantes:</h4>
                    <ol class="text-xs space-y-2 list-decimal ml-4">
                        <li>Ejecutivo de Cuenta</li>
                        <li>PM</li>
                        <li>Equipo Técnico</li>
                        <li>Cliente o Representante</li>
                    </ol>
                </div>
            </div>

            <!-- Fase 5 -->
            <div id="fase-5" class="phase-section flex flex-col space-y-4">
                <div
                    class="arrow-header bg-phase-7 text-white p-4 h-24 flex flex-col justify-center items-center text-center">
                    <span class="text-sm font-bold uppercase">5. Entrega y Cierre de proyecto</span>
                </div>
                <div class="phase-card">
                    <p class="text-sm leading-relaxed"><span class="font-bold">Objetivo:</span> Entregar la solución final
                        en un ambiente productivo.</p>
                </div>
                <div class="phase-card">
                    <h4 class="font-bold text-sm mb-2 uppercase">Tareas Clave:</h4>
                    <ol class="text-xs space-y-2 list-decimal ml-4">
                        <li>Junta de finalización de proyecto</li>
                        <li>Formalizar la entrega y puesta en marcha del proyecto</li>
                        <li>Recolección de feedback inicial</li>
                    </ol>
                </div>
                <div class="phase-card">
                    <h4 class="font-bold text-sm mb-2 uppercase">Entregables:</h4>
                    <ol class="text-xs space-y-2 list-decimal ml-4">
                        <li>Acta de cierre de proyecto firmada</li>
                        <li>Documento lecciones aprendidas</li>
                        <li>Registro de oportunidades de mejora</li>
                    </ol>
                </div>
                <div class="phase-card">
                    <h4 class="font-bold text-sm mb-2 uppercase">Participantes:</h4>
                    <ol class="text-xs space-y-2 list-decimal ml-4">
                        <li>Ejecutivo de Cuenta</li>
                        <li>PM</li>
                        <li>Equipo Técnico</li>
                        <li>Cliente o Representante</li>
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

    <div class="text-center mb-6 mt-8">
        <h1 class="text-5xl font-black font-display tracking-tight text-primary uppercase">
            Matriz RACI
        </h1>
    </div>

    <!--Matriz RACI -->
    <div>
        <div class="overflow-x-auto bg-white rounded-xl shadow-xl border border-slate-200">
            <table class="w-full border-collapse raci-table">
                <thead>
                    <tr class="bg-slate-200">
                        <th class="w-16 p-4 text-center font-bold text-slate-600 text-sm">FASE</th>
                        <th class="p-4 text-center font-bold text-slate-600 text-sm">TAREAS</th>
                        <th class="vertical-text">
                            <div>Ejecutivo Cuenta</div>
                        </th>
                        <th class="vertical-text">
                            <div>Cliente o</br> Representante</div>
                        </th>
                        <th class="vertical-text">
                            <div>Gerente Ventas</div>
                        </th>
                        <th class="vertical-text">
                            <div>Equipo Técnico</div>
                        </th>
                        <th class="vertical-text">
                            <div>PM</div>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="bg-white text-center font-bold text-lg p-4" rowspan="13">
                            <span class="vertical-text inline-block">Entrega de Servicios a Cliente</span>
                        </td>
                        <td class="p-6 text-sm font-medium bg-white">
                            Generación del plan de trabajo final
                        </td>
                        <td class="bg-raci-r text-center font-bold text-lg">R</td>
                        <td class="bg-raci-a text-center font-bold text-lg">A</td>
                        <td class="bg-raci-c text-center font-bold text-lg">C</td>
                        <td class="bg-raci-i text-center font-bold text-lg">I</td>
                        <td class="bg-raci-i text-center font-bold text-lg">I</td>
                    </tr>
                    <tr>
                        <td class="p-6 text-sm font-medium bg-white">
                            Realización y entendimiento con el equipo implementador del SOW
                        </td>
                        <td class="bg-raci-r text-center font-bold text-lg">R</td>
                        <td class="bg-raci-a text-center font-bold text-lg">A</td>
                        <td class="bg-raci-c text-center font-bold text-lg">C</td>
                        <td class="bg-raci-i text-center font-bold text-lg">I</td>
                        <td class="bg-raci-i text-center font-bold text-lg">I</td>
                    </tr>
                    <tr>
                        <td class="p-6 text-sm font-medium bg-white">
                            Presentacion KickOff
                        </td>
                        <td class="bg-raci-r text-center font-bold text-lg">R</td>
                        <td class="bg-raci-a text-center font-bold text-lg">A</td>
                        <td class="bg-raci-c text-center font-bold text-lg">C</td>
                        <td class="bg-raci-i text-center font-bold text-lg">I</td>
                        <td class="bg-raci-i text-center font-bold text-lg">I</td>
                    </tr>
                    <tr>
                        <td class="p-6 text-sm font-medium bg-white">
                            Contar con los insumos necesarios (Hardware y Software)
                        </td>
                        <td class="bg-raci-r text-center font-bold text-lg">R</td>
                        <td class="bg-raci-a text-center font-bold text-lg">A</td>
                        <td class="bg-raci-c text-center font-bold text-lg">C</td>
                        <td class="bg-raci-i text-center font-bold text-lg">I</td>
                        <td class="bg-raci-i text-center font-bold text-lg">I</td>
                    </tr>
                    <tr>
                        <td class="p-6 text-sm font-medium bg-white">
                            Claro conocimiento del alcance de la solución (SOW)
                        </td>
                        <td class="bg-raci-r text-center font-bold text-lg">R</td>
                        <td class="bg-raci-a text-center font-bold text-lg">A</td>
                        <td class="bg-raci-c text-center font-bold text-lg">C</td>
                        <td class="bg-raci-i text-center font-bold text-lg">I</td>
                        <td class="bg-raci-i text-center font-bold text-lg">I</td>
                    </tr>
                    <tr>
                        <td class="p-6 text-sm font-medium bg-white">
                            Validar si existe entrega de factura por cierre de activadad
                        </td>
                        <td class="bg-raci-c text-center font-bold text-lg">C</td>
                        <td class="bg-raci-a text-center font-bold text-lg">A</td>
                        <td class="bg-raci-i text-center font-bold text-lg">I</td>
                        <td class="bg-raci-w text-center font-bold text-lg"></td>
                        <td class="bg-raci-r text-center font-bold text-lg">R</td>
                    </tr>
                    <tr>
                        <td class="p-6 text-sm font-medium bg-white">
                            Realizar Pruebas
                        </td>
                        <td class="bg-raci-i text-center font-bold text-lg">I</td>
                        <td class="bg-raci-a text-center font-bold text-lg">A</td>
                        <td class="bg-raci-w text-center font-bold text-lg"></td>
                        <td class="bg-raci-r text-center font-bold text-lg">R</td>
                        <td class="bg-raci-c text-center font-bold text-lg">C</td>
                    </tr>
                    <tr>
                        <td class="p-6 text-sm font-medium bg-white">
                            Ajustes
                        </td>
                        <td class="bg-raci-i text-center font-bold text-lg">I</td>
                        <td class="bg-raci-a text-center font-bold text-lg">A</td>
                        <td class="bg-raci-w text-center font-bold text-lg"></td>
                        <td class="bg-raci-r text-center font-bold text-lg">R</td>
                        <td class="bg-raci-c text-center font-bold text-lg">C</td>
                    </tr>
                    <tr>
                        <td class="p-6 text-sm font-medium bg-white">
                            Capacitación a usuarios clave
                        </td>
                        <td class="bg-raci-i text-center font-bold text-lg">I</td>
                        <td class="bg-raci-a text-center font-bold text-lg">A</td>
                        <td class="bg-raci-w text-center font-bold text-lg"></td>
                        <td class="bg-raci-r text-center font-bold text-lg">R</td>
                        <td class="bg-raci-c text-center font-bold text-lg">C</td>
                    </tr>
                    <tr>
                        <td class="p-6 text-sm font-medium bg-white">
                            Firma de aceptación de capacitación
                        </td>
                        <td class="bg-raci-i text-center font-bold text-lg">I</td>
                        <td class="bg-raci-a text-center font-bold text-lg">A</td>
                        <td class="bg-raci-c text-center font-bold text-lg">C</td>
                        <td class="bg-raci-r text-center font-bold text-lg">R</td>
                        <td class="bg-raci-i text-center font-bold text-lg">I</td>
                    </tr>
                    <tr>
                        <td class="p-6 text-sm font-medium bg-white">
                            Junta de Finalización de proyecto
                        </td>
                        <td class="bg-raci-i text-center font-bold text-lg">I</td>
                        <td class="bg-raci-a text-center font-bold text-lg">A</td>
                        <td class="bg-raci-c text-center font-bold text-lg">C</td>
                        <td class="bg-raci-i text-center font-bold text-lg">I</td>
                        <td class="bg-raci-r text-center font-bold text-lg">R</td>
                    </tr>
                    <tr>
                        <td class="p-6 text-sm font-medium bg-white">
                            Formalizar la entrega y puesta en marcha del proyecto
                        </td>
                        <td class="bg-raci-i text-center font-bold text-lg">I</td>
                        <td class="bg-raci-a text-center font-bold text-lg">A</td>
                        <td class="bg-raci-c text-center font-bold text-lg">C</td>
                        <td class="bg-raci-i text-center font-bold text-lg">I</td>
                        <td class="bg-raci-r text-center font-bold text-lg">R</td>
                    </tr>
                    <tr>
                        <td class="p-6 text-sm font-medium bg-white">
                            Recolección de feedback inicial
                        </td>
                        <td class="bg-raci-c text-center font-bold text-lg">C</td>
                        <td class="bg-raci-a text-center font-bold text-lg">A</td>
                        <td class="bg-raci-w text-center font-bold text-lg"></td>
                        <td class="bg-raci-i text-center font-bold text-lg">I</td>
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




@endsection
@push('js')
@endpush
