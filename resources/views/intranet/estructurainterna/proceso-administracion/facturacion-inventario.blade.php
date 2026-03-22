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
                            <a href="{{ route('estructurainterna.admnistracion') }}"
                                class="ml-1 text-sm text-gray-600 hover:text-orange-600 md:ml-2">Administración</a>
                        </div>
                    </li>
                    <li aria-current="page">
                        <div class="flex items-center">
                            <i class="fas fa-chevron-right text-gray-400 mx-2"></i>
                            <span class="ml-1 text-sm text-primary font-medium md:ml-2">RM - Inventario</span>
                        </div>
                    </li>
                </ol>
            </nav>
        </div>
    </div>

    <header class="text-center mb-16 mt-12">
        <h1 class="text-5xl font-black font-display tracking-tight text-slate-900 uppercase">
            Proceso <span class="text-primary  uppercase"> Inventario-Facturación</span>
        </h1>
        <p class="text-slate-600 mt-4">Fases 5 - Ciclo completo del Proceso Inventario-Facturación</p>
    </header>

    <!-- Grid de fases (1-5 en primera fila, 6-10 en segunda fila) -->
    <div class="space-y-12">
        <!-- Primera fila: Fases 1-3 -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 items-start">
            <!-- Fase 1 -->
            <div id="fase-1" class="phase-section flex flex-col space-y-4">
                <div
                    class="arrow-header bg-phase-6 text-white p-4 h-24 flex flex-col justify-center items-center text-center">
                    <span class="text-sm font-bold uppercase">1. Fase: Inventario</span>
                    <span class="text-[10px] opacity-90">Tiempo Estimado Variable</span>
                </div>
                <div class="phase-card">
                    <p class="text-sm leading-relaxed"><span class="font-bold">Objetivo:</span> Garantizar que los equipos y
                        licenciamiento requerido en el alcance, este disponible para la fecha de inicio del proyecto, con
                        base al BOM autorizado.</p>
                </div>
                <div class="phase-card">
                    <h4 class="font-bold text-sm mb-2 uppercase">Tareas Clave:</h4>
                    <ol class="text-xs space-y-2 list-decimal ml-4">
                        <li>Validar invetario Netjer</li>
                        <li>Realizar PO por faltantes a proveedores</li>
                        <li>Recepción de equipos</li>
                        <li>Apartado de equipos para el proyecto</li>
                        <li>Entrega previa para su configuración</li>
                        <li>Generación de salida de artículos</li>
                    </ol>
                </div>
                <div class="phase-card">
                    <h4 class="font-bold text-sm mb-2 uppercase">Entregables:</h4>
                    <ol class="text-xs space-y-2 list-decimal ml-4">
                        <li>PO para proveedor don fecha compromiso de entrega</li>
                        <li>Remisión de salida de equipo</li>
                        <li>Entrega en sitio de los equipos</li>
                    </ol>
                </div>
                <div class="phase-card">
                    <h4 class="font-bold text-sm mb-2 uppercase">Participantes:</h4>
                    <ol class="text-xs space-y-2 list-decimal ml-4">
                        <li>Responsable Compras</li>
                        <li>Responsable Almacén</li>
                        <li>Gernte Proyecto</li>
                        <li>Equipo Técnico</li>
                    </ol>
                </div>
            </div>

            <!-- Fase 2 -->
            <div id="fase-2" class="phase-section flex flex-col space-y-4">
                <div
                    class="arrow-header bg-phase-6 text-white p-4 h-24 flex flex-col justify-center items-center text-center">
                    <span class="text-sm font-bold uppercase">2. Fase: Viáticos (si se requiere)</span>
                    <span class="text-[10px] opacity-90">Tiempo Estimado Variabke</span>
                </div>
                <div class="phase-card">
                    <p class="text-sm leading-relaxed"><span class="font-bold">Objetivo:</span> Garantizar que el equipo
                        técnico cuente con los pasajes y viaticos acordados para el servicio.</p>
                </div>
                <div class="phase-card">
                    <h4 class="font-bold text-sm mb-2 uppercase">Tareas Clave:</h4>
                    <ol class="text-xs space-y-2 list-decimal ml-4">
                        <li>Con base en la definición autorizada por el cliente, de viaticos realizar:
                            <ul>
                                <li>✓ Contrato Hospedaje</li>
                                <li>✓ Compra boletos para transportes</li>
                                <li>✓ Dispersión de montos para comidas y trasnporte local</li>
                            </ul>
                        </li>
                    </ol>
                </div>
                <div class="phase-card">
                    <h4 class="font-bold text-sm mb-2 uppercase">Entregables:</h4>
                    <ol class="text-xs space-y-2 list-decimal ml-4">
                        <li>Reserva de hotel</li>
                        <li>Dispersión de dinero</li>
                        <li>Boletos transporte</li>
                    </ol>
                </div>
                <div class="phase-card">
                    <h4 class="font-bold text-sm mb-2 uppercase">Participantes:</h4>
                    <ol class="text-xs space-y-2 list-decimal ml-4">
                        <li>Responsables Admnistración</li>
                        <li>Gerencia Proyeecto</li>
                        <li>Equipo Técnico</li>
                    </ol>
                </div>
            </div>

            <!-- Fase 3 -->
            <div id="fase-3" class="phase-section flex flex-col space-y-4">
                <div
                    class="arrow-header bg-phase-6 text-white p-4 h-24 flex flex-col justify-center items-center text-center">
                    <span class="text-sm font-bold uppercase">3. Fase: Facturación</span>
                    <span class="text-[10px] opacity-90">Tiempo Estimado Variable</span>
                </div>
                <div class="phase-card">
                    <p class="text-sm leading-relaxed"><span class="font-bold">Objetivo:</span> Garantizar la generación,
                        envió y cobro de la o las facturas que se requieren para el proyecto</p>
                </div>
                <div class="phase-card">
                    <h4 class="font-bold text-sm mb-2 uppercase">Tareas Clave:</h4>
                    <ol class="text-xs space-y-2 list-decimal ml-4">
                        <li>Con base en el acuerdo comercial para el pago del proyecto, se genera la o las facturas que se
                            requieren para el envió a el cliente
                            <ul>
                                <li>✓ Anticipo</li>
                                <li>✓ Pago a una solo exhibicion</li>
                                <li>✓ Pago deferido en N numero de exhibiciones</li>
                            </ul>
                        </li>
                    </ol>
                </div>
                <div class="phase-card">
                    <h4 class="font-bold text-sm mb-2 uppercase">Entregables:</h4>
                    <ol class="text-xs space-y-2 list-decimal ml-4">
                        <li>Factura(s), solicitadas dependiendo el evento realizado</li>
                        <li>Seguimiento de pagos realizados por el cliente</li>
                    </ol>
                </div>
                <div class="phase-card">
                    <h4 class="font-bold text-sm mb-2 uppercase">Participantes:</h4>
                    <ol class="text-xs space-y-2 list-decimal ml-4">
                        <li>Responsable Admin & Finanzas</li>
                        <li>Gerente Proyecto</li>
                    </ol>
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
                                <div>Responsable <br> Admon & Finanzas</div>
                            </th>
                            <th class="vertical-text">
                                <div>Responsable <br>Compras</div>
                            </th>
                            <th class="vertical-text">
                                <div>Responsable<br> Almacen</div>
                            </th>
                            <th class="vertical-text">
                                <div>Gerente<br> Proyecto</div>
                            </th>
                            <th class="vertical-text">
                                <div>Equipo<br> Técnico</div>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="bg-white text-center font-bold text-lg p-4" rowspan="6">
                                <span class="vertical-text inline-block">Fase Inventario</span>
                            </td>
                            <td class="p-6 text-sm font-medium bg-white">
                                Validar inventario Netjer
                            </td>
                            <td class="bg-raci-r text-center font-bold text-lg">R</td>
                            <td class="bg-raci-a text-center font-bold text-lg">A</td>
                            <td class="bg-raci-i text-center font-bold text-lg">I</td>
                            <td class="bg-raci-c text-center font-bold text-lg">C</td>
                            <td class="bg-raci-i text-center font-bold text-lg">I</td>
                            <td class="bg-raci-w text-center font-bold text-lg"></td>
                        </tr>
                        <tr>
                            <td class="p-6 text-sm font-medium bg-white">
                                Realizar PO por faltantes a proveedores
                            </td>
                            <td class="bg-raci-i text-center font-bold text-lg">I</td>
                            <td class="bg-raci-a text-center font-bold text-lg">A</td>
                            <td class="bg-raci-r text-center font-bold text-lg">R</td>
                            <td class="bg-raci-w text-center font-bold text-lg"></td>
                            <td class="bg-raci-i text-center font-bold text-lg">I</td>
                            <td class="bg-raci-w text-center font-bold text-lg"></td>
                        </tr>
                        <tr>
                            <td class="p-6 text-sm font-medium bg-white">
                                Recepción de equipos
                            </td>
                            <td class="bg-raci-i text-center font-bold text-lg">I</td>
                            <td class="bg-raci-a text-center font-bold text-lg">A</td>
                            <td class="bg-raci-c text-center font-bold text-lg">C</td>
                            <td class="bg-raci-r text-center font-bold text-lg">R</td>
                            <td class="bg-raci-i text-center font-bold text-lg">I</td>
                            <td class="bg-raci-w text-center font-bold text-lg"></td>
                        </tr>
                        <tr>
                            <td class="p-6 text-sm font-medium bg-white">
                                Apartado de equipos para el proyecto
                            </td>
                            <td class="bg-raci-i text-center font-bold text-lg">I</td>
                            <td class="bg-raci-a text-center font-bold text-lg">A</td>
                            <td class="bg-raci-c text-center font-bold text-lg">C</td>
                            <td class="bg-raci-r text-center font-bold text-lg">R</td>
                            <td class="bg-raci-i text-center font-bold text-lg">I</td>
                            <td class="bg-raci-w text-center font-bold text-lg"></td>
                        </tr>
                        <tr>
                            <td class="p-6 text-sm font-medium bg-white">
                                Entrega previa de los equipos para su configuración
                            </td>
                            <td class="bg-raci-i text-center font-bold text-lg">I</td>
                            <td class="bg-raci-a text-center font-bold text-lg">A</td>
                            <td class="bg-raci-w text-center font-bold text-lg"></td>
                            <td class="bg-raci-r text-center font-bold text-lg">R</td>
                            <td class="bg-raci-i text-center font-bold text-lg">I</td>
                            <td class="bg-raci-c text-center font-bold text-lg">C</td>
                        </tr>
                        <tr>
                            <td class="p-6 text-sm font-medium bg-white">
                                Generación de remisión de salida de articulos
                            </td>
                            <td class="bg-raci-i text-center font-bold text-lg">I</td>
                            <td class="bg-raci-a text-center font-bold text-lg">A</td>
                            <td class="bg-raci-w text-center font-bold text-lg"></td>
                            <td class="bg-raci-r text-center font-bold text-lg">R</td>
                            <td class="bg-raci-c text-center font-bold text-lg">C</td>
                            <td class="bg-raci-w text-center font-bold text-lg"></td>
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
