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
                            <a href="{{ route('intranet.estructurainterna.proceso-comercial') }}"
                                class="ml-1 text-sm text-gray-600 hover:text-orange-600 md:ml-2">Procesos Comercial</a>
                        </div>
                    </li>
                    <li aria-current="page">
                        <div class="flex items-center">
                            <i class="fas fa-chevron-right text-gray-400 mx-2"></i>
                            <span class="ml-1 text-sm text-primary font-medium md:ml-2">Fase 1: Detalle</span>
                        </div>
                    </li>

                </ol>
            </nav>
        </div>
    </div>

    <!-- Encabezado -->
    <div class="mt-8 mb-8">
        <h1 class="text-3xl font-bold text-gray-800 mb-2">Detalle de Fase 1: Generación de Demanda Omnicanal</h1>
        <p class="text-gray-600">El proceso de generación de demanda omnicanal busca atraer y convertir prospectos de
            múltiples canales
            (digitales, físicos, directos e indirectos), asegurando una experiencia unificada, personalizada y
            continua.</p>
    </div>

    <div class="flex flex-col lg:flex-row gap-8">
        <!-- Contenido principal -->
        <div class="lg:w-1/1">
            <!-- Fase1 -->
            <div class="bg-white rounded-lg shadow p-6 mb-8">
                {{-- <h2 class="text-2xl font-bold text-gray-800 mb-6">Generación de Demanda Omnicanal</h2> --}}

                <!-- Fase 1 -->
                <div id="fase-1" class="phase-section flex flex-col space-y-4">
                    <div
                        class="arrow-header bg-phase-6 text-white p-4 h-24 flex flex-col justify-center items-center text-center">
                        <span class="text-sm font-bold uppercase">1. Fase: Generación de Demanda y Omnicanal</span>
                        <span class="text-[10px] opacity-90">Tiempo Estimado 20 Hrs</span>
                    </div>
                    <div class="phase-card">
                        <p class="text-sm leading-relaxed"><span class="font-bold">Objetivo:</span> Brindar una comunicación
                            integral a nuestros clientes a través de múltiples canales.</p>
                    </div>
                    <div class="phase-card">
                        <h4 class="font-bold text-sm mb-2 uppercase">Tareas Clave:</h4>
                        <ol class="text-xs space-y-2 list-decimal ml-4">
                            <li>Campañas de marketing digital</li>
                            <li>Participación en eventos y ferias</li>
                            <li>Activación de referidos mediante socios y clientes existentes</li>
                            <li>Creación de contenido relevante (webinars, estudios de caso)</li>
                        </ol>
                    </div>
                    <div class="phase-card">
                        <h4 class="font-bold text-sm mb-2 uppercase">Entregables:</h4>
                        <ol class="text-xs space-y-2 list-decimal ml-4">
                            <li>Leads Captados<br>
                                <a href="#" class="text-orange-500">Ver Archivo</a>
                            </li>
                            <li>Reporte de métricas de campañas</li>
                        </ol>
                    </div>
                    <div class="phase-card">
                        <h4 class="font-bold text-sm mb-2 uppercase">Participantes:</h4>
                        <ol class="text-xs space-y-2 list-decimal ml-4">
                            <li>Gerente Marketing</li>
                            <li>Equipo de Marketing Digital</li>
                            <li>Diseñadores de Contenido</li>
                            <li>Gerencia Ventas</li>
                            <li>Dirección General</li>
                        </ol>
                    </div>
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
                                        <div>Gerente Marketing</div>
                                    </th>
                                    <th class="vertical-text">
                                        <div>Equipo Marketing</br> Digital</div>
                                    </th>
                                    <th class="vertical-text">
                                        <div>Diseñador Contenido</div>
                                    </th>
                                    <th class="vertical-text">
                                        <div>Gerente Ventas</div>
                                    </th>
                                    <th class="vertical-text">
                                        <div>Dirección General</div>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="bg-white text-center font-bold text-lg p-4" rowspan="4">
                                        <span class="vertical-text inline-block">Entrega de Servicios a Cliente</span>
                                    </td>
                                    <td class="p-6 text-sm font-medium bg-white">
                                        Campañas demarketing digital
                                    </td>
                                    <td class="bg-raci-r text-center font-bold text-lg">R</td>
                                    <td class="bg-raci-r text-center font-bold text-lg">R</td>
                                    <td class="bg-raci-i text-center font-bold text-lg">I</td>
                                    <td class="bg-raci-c text-center font-bold text-lg">C</td>
                                    <td class="bg-raci-a text-center font-bold text-lg">A</td>
                                </tr>
                                <tr>
                                    <td class="p-6 text-sm font-medium bg-white">
                                        Participación en eventos y ferias
                                    </td>
                                    <td class="bg-raci-a text-center font-bold text-lg">A</td>
                                    <td class="bg-raci-r text-center font-bold text-lg">R</td>
                                    <td class="bg-raci-w text-center font-bold text-lg"></td>
                                    <td class="bg-raci-a text-center font-bold text-lg">A</td>
                                    <td class="bg-raci-i text-center font-bold text-lg">I</td>
                                </tr>
                                <tr>
                                    <td class="p-6 text-sm font-medium bg-white">
                                        Activacion de referidos mediante socios y clientes existentes
                                    </td>
                                    <td class="bg-raci-c text-center font-bold text-lg">C</td>
                                    <td class="bg-raci-i text-center font-bold text-lg">I</td>
                                    <td class="bg-raci-w text-center font-bold text-lg"></td>
                                    <td class="bg-raci-r text-center font-bold text-lg">R</td>
                                    <td class="bg-raci-a text-center font-bold text-lg">A</td>
                                </tr>
                                <tr>
                                    <td class="p-6 text-sm font-medium bg-white">
                                        Creación de contenido relevante (webinars, estudios de caso)
                                    </td>
                                    <td class="bg-raci-a text-center font-bold text-lg">A</td>
                                    <td class="bg-raci-c text-center font-bold text-lg">C</td>
                                    <td class="bg-raci-r text-center font-bold text-lg">R</td>
                                    <td class="bg-raci-i text-center font-bold text-lg">I</td>
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
