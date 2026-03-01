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
                            <a href="{{ route('intranet.estructurainterna.admnistracion') }}"
                                class="ml-1 text-sm text-gray-600 hover:text-orange-600 md:ml-2">Administración</a>
                        </div>
                    </li>

                    <li aria-current="page">
                        <div class="flex items-center">
                            <i class="fas fa-chevron-right text-gray-400 mx-2"></i>
                            <span class="ml-1 text-sm text-primary font-medium md:ml-2">RH - Alta Colaborador</span>
                        </div>
                    </li>
                </ol>
            </nav>
        </div>
    </div>

    <!-- Encabezado -->
    <div class="mt-8 mb-8">
        <h1 class="text-3xl font-bold text-gray-800 mb-2">Procesos Alta de Colaborador</h1>
        <p class="text-gray-600">El objetivo del proceso de alta es garantizar que el colaborador se incorpore de manera
            legal, organizada y alineada a la cultura de la empresa.
        </p>
    </div>

    <div class="text-center mb-16 mt-8">
        <h1 class="text-5xl font-black font-display tracking-tight text-slate-900 uppercase">
            Proceso <span class="text-primary  uppercase">Alta Nuevo Colaborador</span>
        </h1>
        <p></p>
        <p class="text-slate-600 mt-6 text-lg">Flujo completo de ejecución</p>
    </div>


    <!-- Grid de fases del proceso AltaColaborador -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 items-start">
        <!-- Fase 1: Solicitud Vacante -->
        <div class="flex flex-col space-y-4">
            <div class="arrow-header bg-phase-1 text-white p-4 h-24 flex flex-col justify-center items-center text-center">
                <span class="text-sm font-bold uppercase">1. Solicitu de Vacante o Nuevo Puesto</span>
                <span class="text-[10px] opacity-90">Tiempo: Variable</span>
            </div>
            <div class="poc-card">
                <h4 class="font-bold text-sm mb-2 uppercase text-phase-1 text-center">Tareas Clave:</h4>
                <h6 class="font-bold text-sm mb-2 uppercase text-phase-1">Identificaciónj de la necesidad:</h6>
                <ol class="text-xs space-y-2 list-decimal ml-4 mb-4">
                    <li>El área solcita la apertura de uan vacante (reposición o nuevo puesto).</li>
                    <li>Se justifica la necesidad (crecimiento, rotación, nuevo proyecto. etc.).</li>
                </ol>

                <h6 class="font-bold text-sm mb-2 uppercase text-phase-1">Definición del perfil des puesto:</h6>
                <ol class="text-xs space-y-2 list-decimal ml-4 mb-4">
                    <li>Se define el nombre del puesto, funciones clave, nivel jerárquico, tipo de contrato, ubicación y
                        salario estimado</li>
                </ol>

                <h6 class="font-bold text-sm mb-2 uppercase text-phase-1">Autorización del puesto/vacante:</h6>
                <ol class="text-xs space-y-2 list-decimal ml-4 mb-4">
                    <li>Solicitante valida alineación con el tabulador, organigrama y presupuesto.</li>
                    <li>Dirección aprueba (o no) la creación del puesto o reposición de vacante.</li>
                </ol>

                <h6 class="font-bold text-sm mb-2 uppercase text-phase-1">Publicación y reclutamiento:</h6>
                <ol class="text-xs space-y-2 list-decimal ml-4 mb-4">
                    <li>Solicitante publica la vacante en los medios acordados y/o inicia búsqueda directa</li>
                </ol>
                <div class="bg-blue-50 p-3 rounded-lg border border-blue-100">
                    <h5 class="font-bold text-xs mb-1 text-blue-700">Participantes</h5>
                    <ul class="text-xs text-blue-600 space-y-1">
                        <li>✓ Solicitante</li>
                        <li>✓ Jefe inmediato</li>
                        <li>✓ Administración-Capital Humano</li>
                        <li>✓ Dirección General</li>
                        <li>✓ TI/BTO-Infraestrcutura</li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- Fase 2: Seleccion -->
        <div class="flex flex-col space-y-4">
            <div class="arrow-header bg-phase-2 text-white p-4 h-24 flex flex-col justify-center items-center text-center">
                <span class="text-sm font-bold uppercase">2. Proceso de Selección</span>
                <span class="text-[10px] opacity-90">Tiempo: Variable</span>
            </div>
            <div class="poc-card">
                <h4 class="font-bold text-sm mb-2 uppercase text-phase-1 text-center">Tareas Clave:</h4>
                <h6 class="font-bold text-sm mb-2 uppercase text-phase-1">Recepción y filtrado de candidatos:</h6>
                <ol class="text-xs space-y-2 list-decimal ml-4 mb-4">
                    <li>Solicitante revisa CV's, filtra con base en requisitos y solicita a los mejores.</li>
                </ol>

                <h6 class="font-bold text-sm mb-2 uppercase text-phase-1">Entrevistas:</h6>
                <ol class="text-xs space-y-2 list-decimal ml-4 mb-4">
                    <li>Primer filtro: entrevista con RRHH.</li>
                    <li>Segundo filtro: entrevista con jefe inmediato</li>
                    <li>Tercer filtro (opcional): entervista técnica o por dirección.</li>
                </ol>

                <h6 class="font-bold text-sm mb-2 uppercase text-phase-1">Evaluación (si aplica):</h6>
                <ol class="text-xs space-y-2 list-decimal ml-4 mb-4">
                    <li>Psicométricas, técnicas o de conocimientos, según el rol.</li>
                </ol>

                <h6 class="font-bold text-sm mb-2 uppercase text-phase-1">Selección del candidato:</h6>
                <ol class="text-xs space-y-2 list-decimal ml-4 mb-4">
                    <li>El jefe inmediato decide al candidato ideal.</li>
                </ol>

                <div class="bg-blue-50 p-3 rounded-lg border border-blue-100">
                    <h5 class="font-bold text-xs mb-1 text-blue-700">Participantes:</h5>
                    <ul class="text-xs text-blue-600 space-y-1">
                        <li>✓ Solicitante</li>
                        <li>✓ Jefe inmediato</li>
                        <li>✓ Administración-Capital Humano</li>
                        <li>✓ Dirección General</li>
                        <li>✓ TI/BTO-Infraestrcutura</li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- Fase 3: Alta Colaborador -->
        <div class="flex flex-col space-y-4">
            <div class="arrow-header bg-phase-3 text-white p-4 h-24 flex flex-col justify-center items-center text-center">
                <span class="text-sm font-bold uppercase">3. Alta del Nuevo Colaborador</span>
                <span class="text-[10px] opacity-90">Tiempo: Variable</span>
            </div>
            <div class="poc-card">
                <h4 class="font-bold text-sm mb-2 uppercase text-phase-1 text-center">Tareas Clave:</h4>
                <h6 class="font-bold text-sm mb-2 uppercase text-phase-1">Oferta y Aceptación:</h6>
                <ol class="text-xs space-y-2 list-decimal ml-4 mb-4">
                    <li>Se emite oferta formal y el candidato acepta por escrito.</li>
                    <li>Recopilación de documentación.</li>
                    <li>Recurso Interno</li>
                    <a href="#" class="text-orange-500 text-lg">Formato Alta Colaborador Interno Netjer</a>
                    <li>Recurso Externo</li>
                    <a href="#" class="text-orange-500 text-lg">Formato Alta Colaborador Externo Netjer</a>
                </ol>

                <h6 class="font-bold text-sm mb-2 uppercase text-phase-1">Alta en sisteam y generación de expediente:</h6>
                <ol class="text-xs space-y-2 list-decimal ml-4 mb-4">
                    <li>Se da de alta en nómina y genera el expediente digital.</li>
                </ol>

                <h6 class="font-bold text-sm mb-2 uppercase text-phase-1">ASignación de herramientas y accesos:</h6>
                <ol class="text-xs space-y-2 list-decimal ml-4 mb-4">
                    <li>Asignar equipo, correo, accesos, etc.</li>
                    <li>Ticket en JIRA</li>
                </ol>
                <h6 class="font-bold text-sm mb-2 uppercase text-phase-1">Onboarding / Inducción:</h6>
                <ol class="text-xs space-y-2 list-decimal ml-4 mb-4">
                    <li>Bienvenida</li>
                </ol>

                <div class="bg-blue-50 p-3 rounded-lg border border-blue-100">
                    <h5 class="font-bold text-xs mb-1 text-blue-700">Participantes:</h5>
                    <ul class="text-xs text-blue-600 space-y-1">
                        <li>✓ Solicitante</li>
                        <li>✓ Jefe inmediato</li>
                        <li>✓ Administración-Capital Humano</li>
                        <li>✓ Dirección General</li>
                        <li>✓ TI/BTO-Infraestrcutura</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <section class="mt-20">
        <div class="flex items-center justify-between mb-8">
            <h2 class="text-2xl font-bold border-l-4 border-primary pl-4">Documentos del Proceso</h2>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-1 gap-8">
            <div
                class="bg-white dark:bg-surface-dark p-8 rounded-3xl border border-slate-200 dark:border-slate-800 flex items-center gap-6 shadow-sm hover:border-primary transition-all cursor-pointer">
                <a href="#"
                    class="flex items-center p-3 border border-gray-200 rounded-lg hover:border-orange-300 hover:bg-orange-50">
                    <div class="document-icon bg-red-100 text-red-600 mr-3">
                        <i class="fas fa-file-pdf"></i>
                    </div>
                    <div class="flex-1">
                        <h4 class="font-medium text-gray-800">Formato: Alta Colaborador</h4>
                        <p class="text-xs text-gray-500">PDF • 2.1 MB • V.1.1</p>
                    </div>
                </a>
                <a href="#"
                    class="flex items-center p-3 border border-gray-200 rounded-lg hover:border-orange-300 hover:bg-orange-50">
                    <div class="document-icon bg-blue-100 text-blue-600 mr-3">
                        <i class="fas fa-file-word"></i>
                    </div>
                    <div class="flex-1">
                        <h4 class="font-medium text-gray-800">Formato: Carta Responsiva</h4>
                        <p class="text-xs text-gray-500">PDF • 1.5 MB • V.1.1</p>
                    </div>
                </a>
            </div>
        </div>
    </section>


@endsection
@push('js')
@endpush
