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
                            <a href="{{ route('estructurainterna.proceso-comercial') }}"
                                class="ml-1 text-sm text-gray-600 hover:text-orange-600 md:ml-2">Procesos Comercial</a>
                        </div>
                    </li>
                    <li aria-current="page">
                        <div class="flex items-center">
                            <i class="fas fa-chevron-right text-gray-400 mx-2"></i>
                            <span class="ml-1 text-sm text-primary font-medium md:ml-2">Fase 6: Detalle</span>
                        </div>
                    </li>

                </ol>
            </nav>
        </div>
    </div>

    <!-- Encabezado -->
    <div class="mt-8 mb-8">
        <h1 class="text-3xl font-bold text-gray-800 mb-2">Detalle de Fase 6: Negociación y Cierre</h1>
        <p class="text-gray-600">Lograr la aceptación formal del cliente y la firma del contrato.</p>
    </div>

    <div class="flex flex-col lg:flex-row gap-8">
        <!-- Contenido principal -->
        <div class="lg:w-1/1">
            <!-- Fase 6 -->
            <div id="fase-6" class="phase-section flex flex-col space-y-4">
                <div
                    class="arrow-header bg-phase-6 text-white p-4 h-24 flex flex-col justify-center items-center text-center">
                    <span class="text-sm font-bold uppercase">6. Fase: Negociación y Cierre</span>
                    <span class="text-[10px] opacity-90">Tiempo Estimado 40 Hrs</span>
                </div>
                <div class="phase-card">
                    <p class="text-sm leading-relaxed"><span class="font-bold">Objetivo:</span> Lograr la aceptación
                        formal del cliente y la firma del contrato</p>
                </div>
                <div class="phase-card">
                    <h4 class="font-bold text-sm mb-2 uppercase">Tareas Clave:</h4>
                    <ol class="text-xs space-y-2 list-decimal ml-4">
                        <li>Presentación de propuestas.</li>
                        <li>Revisar términos comerciales y técnicos con el cliente.</li>
                        <li>Gestionar objeciones y renegociar si es necesario.</li>
                        <li>Formalizar acuerdos (contratos, órdenes de compra).</li>
                        <li>Entrega Factura(s).</li>
                    </ol>
                </div>
                <div class="phase-card">
                    <h4 class="font-bold text-sm mb-2 uppercase">Entregables:</h4>
                    <ol class="text-xs space-y-2 list-decimal ml-4">
                        <li>Paquete de diseño final (documentación consolidada).</li>
                        <li>Checklist de revisión técnica y comercial.</li>
                        <li>Soporte en reuniones de presentación al cliente.</li>
                        <li>Contrato Firmado</li>
                    </ol>
                </div>
                <div class="phase-card">
                    <h4 class="font-bold text-sm mb-2 uppercase">Participantes:</h4>
                    <ol class="text-xs space-y-2 list-decimal ml-4">
                        <li>Arquitecto de Soluciones</li>
                        <li>Gerente Ventas</li>
                        <li>Ejecutivo Ventas</li>
                        <li>Gerente de Proyecto</li>
                    </ol>
                </div>
            </div>
        </div>

        <!-- Sidebar -->
        <div class="lg:w-2/3">
            <!-- Matriz RACI -->
            <div class="bg-white rounded-lg shadow p-6 mb-6">
                <h3 class="text-lg font-bold text-gray-800 mb-4">Matriz RACI</h3>
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
                                        <div>Cliente o <br>Representante</div>
                                    </th>
                                    <th class="vertical-text">
                                        <div>Gerente Ventas</div>
                                    </th>
                                    <th class="vertical-text">
                                        <div>Equipo Técnico</div>
                                    </th>
                                    <th class="vertical-text">
                                        <div>Gerente Proyecto</div>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="bg-white text-center font-bold text-lg p-4" rowspan="5">
                                        <span class="vertical-text inline-block">Negociación y Cierre</span>
                                    </td>
                                    <td class="p-6 text-sm font-medium bg-white">
                                        Presentación de propuestas
                                    </td>
                                    <td class="bg-raci-r text-center font-bold text-lg">R</td>
                                    <td class="bg-raci-a text-center font-bold text-lg">A</td>
                                    <td class="bg-raci-c text-center font-bold text-lg">C</td>
                                    <td class="bg-raci-i text-center font-bold text-lg">I</td>
                                    <td class="bg-raci-i text-center font-bold text-lg">I</td>
                                </tr>
                                <tr>
                                    <td class="p-6 text-sm font-medium bg-white">
                                        Revisar términos comerciales y técnicos con el cliente
                                    </td>
                                    <td class="bg-raci-r text-center font-bold text-lg">R</td>
                                    <td class="bg-raci-a text-center font-bold text-lg">A</td>
                                    <td class="bg-raci-c text-center font-bold text-lg">C</td>
                                    <td class="bg-raci-i text-center font-bold text-lg">I</td>
                                    <td class="bg-raci-i text-center font-bold text-lg">I</td>
                                </tr>
                                <tr>
                                    <td class="p-6 text-sm font-medium bg-white">
                                        Gestiona objeciones y renegociar si es necesario
                                    </td>
                                    <td class="bg-raci-r text-center font-bold text-lg">R</td>
                                    <td class="bg-raci-a text-center font-bold text-lg">A</td>
                                    <td class="bg-raci-c text-center font-bold text-lg">C</td>
                                    <td class="bg-raci-i text-center font-bold text-lg">I</td>
                                    <td class="bg-raci-i text-center font-bold text-lg">I</td>
                                </tr>
                                <tr>
                                    <td class="p-6 text-sm font-medium bg-white">
                                        Formalizar acuerdos (contratos, órdenes de compra)
                                    </td>
                                    <td class="bg-raci-r text-center font-bold text-lg">R</td>
                                    <td class="bg-raci-a text-center font-bold text-lg">A</td>
                                    <td class="bg-raci-c text-center font-bold text-lg">C</td>
                                    <td class="bg-raci-i text-center font-bold text-lg">I</td>
                                    <td class="bg-raci-i text-center font-bold text-lg">I</td>
                                </tr>
                                <tr>
                                    <td class="p-6 text-sm font-medium bg-white">
                                        Entrega Factura(s)
                                    </td>
                                    <td class="bg-raci-r text-center font-bold text-lg">R</td>
                                    <td class="bg-raci-a text-center font-bold text-lg">A</td>
                                    <td class="bg-raci-c text-center font-bold text-lg">C</td>
                                    <td class="bg-raci-i text-center font-bold text-lg">I</td>
                                    <td class="bg-raci-i text-center font-bold text-lg">I</td>
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
                            <div
                                class="w-6 h-6 bg-raci-a rounded flex items-center justify-center font-bold text-xs text-white">
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
                            <div
                                class="w-6 h-6 bg-raci-i rounded flex items-center justify-center font-bold text-xs text-white">
                                I
                            </div>
                            <span class="text-xs font-semibold text-slate-600">Informado</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('js')
@endpush
