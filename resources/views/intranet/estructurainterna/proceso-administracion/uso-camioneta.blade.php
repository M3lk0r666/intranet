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
                            <span class="ml-1 text-sm text-primary font-medium md:ml-2">RH - Uso Camioneta</span>
                        </div>
                    </li>
                </ol>
            </nav>
        </div>
    </div>

    <!-- Encabezado -->
    <div class="mt-8 mb-8">
        <h1 class="text-3xl font-bold text-gray-800 mb-2">Procesos Solicitud Camioneta</h1>
        <p class="text-gray-600">El objetivo del proceso solicitud de la camioneta es garanticar el buen uso de la misma,
            para que este disponible en cualquier momento que se requiera.</p>
    </div>

    <div class="text-center mb-16 mt-8">
        <h1 class="text-5xl font-black font-display tracking-tight text-slate-900 uppercase">
            Proceso <span class="text-primary  uppercase">Solicitud de Camioneta</span>
        </h1>
        <p></p>
        <p class="text-slate-600 mt-6 text-lg">Flujo completo de ejecución</p>
    </div>


    <!-- Grid de fases solicitud camioneta -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 items-start">
        <!-- Fase 1: registro -->
        <div class="flex flex-col space-y-4">
            <div class="arrow-header bg-phase-1 text-white p-4 h-24 flex flex-col justify-center items-center text-center">
                <span class="text-sm font-bold uppercase">1. Registro de Petición</span>
                <span class="text-[10px] opacity-90">Tiempo: Variable</span>
            </div>
            <div class="poc-card">
                <h4 class="font-bold text-sm mb-2 uppercase text-phase-1 text-center">Tareas Clave:</h4>
                <h6 class="font-bold text-sm mb-2 uppercase text-phase-1">Solicitud:</h6>
                <p class="text-red-600 uppercase">Solcitante envia correo para administración, para saber de la
                    disponibilidad de la camioneta indicando:</p>
                <ol class="text-xs space-y-2 list-decimal ml-4 mb-4">
                    <li>Nombre del solicitante.</li>
                    <li>Proposito.</li>
                    <li>Cliente con el que se dirigen</li>
                    <li>Fecha y Hora de solicitud de camioneta</li>
                    <li>Fecha y Hora (estimada) de regreso de camioneta</li>
                </ol>
                <h6 class="font-bold text-sm mb-2 uppercase text-phase-1">Aceptación asignación:</h6>
                <p class="mb-2">Con base en la disponibilidad se asigna la camioneta para su uso</p>
                <ol class="text-xs space-y-2 list-decimal ml-4 mb-4">
                    <li>Se entrega formato a solicitante</li>
                    <li class="list-none mt-2">
                        <a href="#"
                            class="inline-block bg-orange-500 text-white text-sm px-4 py-2 rounded-lg hover:bg-orange-600 transition">Formato
                            Asignación camioneta</a>
                    </li>
                </ol>

                <div class="bg-blue-50 p-3 rounded-lg border border-blue-100">
                    <h5 class="font-bold text-xs mb-1 text-blue-700">Participantes</h5>
                    <ul class="text-xs text-blue-600 space-y-1">
                        <li>✓ Solicitante</li>
                        <li>✓ Jefe inmediato</li>
                        <li>✓ Administración-Capital Humano</li>
                    </ul>
                </div>
                <br>
                <h6 class="font-bold text-sm mb-2 uppercase text-phase-1">Reservar Vehiculo</h6>
                <p>
                    <a href="https://api.leadconnectorhq.com/widget/booking/FiuBKgXfyoEvw5l1PlTJ" target="_blank"
                        class="inline-block bg-orange-500 text-white text-sm px-4 py-2 rounded-lg hover:bg-orange-600 transition">Reservar
                        Camioneta</a>
                </p>
            </div>
        </div>

        <!-- Fase 2: Verificacion -->
        <div class="flex flex-col space-y-4">
            <div class="arrow-header bg-phase-2 text-white p-4 h-24 flex flex-col justify-center items-center text-center">
                <span class="text-sm font-bold uppercase">2. Verificación estado camioneta</span>
                <span class="text-[10px] opacity-90">Tiempo: Variable</span>
            </div>
            <div class="poc-card">
                <h4 class="font-bold text-sm mb-2 uppercase text-phase-1 text-center">Tareas Clave:</h4>
                <h6 class="font-bold text-sm mb-2 uppercase text-phase-1">Solicitante realiza inspección y llenado de
                    formato:</h6>
                <div class="bg-purple-50 p-3 rounded-lg border border-purple-100">
                    <ul class="text-xs text-purple-600 space-y-1">
                        <li>✓ Revisón de luces.</li>
                        <li>✓ Nivel de combustible</li>
                        <li>✓ Llantas</li>
                        <li>✓ Documentación</li>
                        <li>✓ Limpieza exterior-interior</li>
                        <li>✓ Revisión carroceria</li>
                    </ul>
                </div>

                <h6 class="font-bold text-sm mb-2 uppercase text-phase-1">Retiro de la camioneta de Netjer:</h6>
                <ol class="text-xs space-y-2 list-decimal ml-4 mb-4">
                    <li>Solicitante hace uso de la camioneta para su traslado y del equipo</li>
                </ol>

                <h6 class="font-bold text-sm mb-2 uppercase text-phase-1">Regreso de la camioneta a Netjer:</h6>
                <ol class="text-xs space-y-2 list-decimal ml-4 mb-4">
                    <li>Solicitante regresa la unidad, estacionada en su lugar asignado</li>
                    <li>Reporta cualquier falla o anomalia</li>
                    <li>Entrega llaves de la unidad</li>
                </ol>

                <div class="bg-blue-50 p-3 rounded-lg border border-blue-100">
                    <h5 class="font-bold text-xs mb-1 text-blue-700">Participantes:</h5>
                    <ul class="text-xs text-blue-600 space-y-1">
                        <li>✓ Solicitante</li>
                        <li>✓ Jefe inmediato</li>
                        <li>✓ Administración-Capital Humano</li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- Fase 3: Lineamientos -->
        <div class="flex flex-col space-y-4">
            <div class="arrow-header bg-phase-3 text-white p-4 h-24 flex flex-col justify-center items-center text-center">
                <span class="text-sm font-bold uppercase">Lineamientos</span>
                <span class="text-[10px] opacity-90">Tiempo: Variable</span>
            </div>
            <div class="poc-card">
                <h4 class="font-bold text-sm mb-2 uppercase text-phase-1 text-center">Tareas Clave:</h4>
                <h6 class="font-bold text-sm mb-2 uppercase text-phase-1">Limpieza exterior-interior:</h6>
                <ol class="text-xs space-y-2 list-decimal ml-4 mb-4">
                    <li>Se comen dentro de la camioneta, recoger la basura generada y limpiar cualquier residuo que quede.
                    </li>
                    <li>En caso de ensuciarla significativamente, acudir a lavar la unidad, el gasto sera reembolsado.</li>
                    <li>Seamos consientes de mantener la unidad presentable para que los colaboradores disfruten el viaje y
                        mantenerla en buen estado.</li>
                </ol>

                <h6 class="font-bold text-sm mb-2 uppercase text-phase-1">Estacionamiento:</h6>
                <ol class="text-xs space-y-2 list-decimal ml-4 mb-4">
                    <li>Dejar la camioneta en lugares seguros. Si se estacionan en parquimetros, estar atentos al tiempo
                        permitido y eviatar multas innecesarias.</li>
                </ol>

                <h6 class="font-bold text-sm mb-2 uppercase text-phase-1">Documentación de manejo vigente</h6>
            </div>
        </div>
    </div>

    <!-- Matriz RACI -->
    <div class="text-center mb-16 mt-6">
        <h1 class="text-5xl font-black font-display tracking-tight text-slate-900 uppercase">
            Matriz <span class="text-primary  uppercase"> RACI</span>
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
                                <div>Solicitante</div>
                            </th>
                            <th class="vertical-text">
                                <div>Jefe inmediato</div>
                            </th>
                            <th class="vertical-text">
                                <div>Administración - <br> Capital Humano</div>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="bg-white text-center font-bold text-lg p-4" rowspan="7">
                                <span class="vertical-text inline-block">Solicitud Camioneta</span>
                            </td>
                            <td class="p-6 text-sm font-medium bg-white">
                                Completar y enviar formato solicitud
                            </td>
                            <td class="bg-raci-r text-center font-bold text-lg">R</td>
                            <td class="bg-raci-a text-center font-bold text-lg">A</td>
                            <td class="bg-raci-c text-center font-bold text-lg">C</td>
                        </tr>
                        <tr>
                            <td class="p-6 text-sm font-medium bg-white">
                                Autorizar Solicitud
                            </td>
                            <td class="bg-raci-r text-center font-bold text-lg">R</td>
                            <td class="bg-raci-i text-center font-bold text-lg">I</td>
                            <td class="bg-raci-a text-center font-bold text-lg">A</td>
                        </tr>
                        <tr>
                            <td class="p-6 text-sm font-medium bg-white">
                                Registrar y confirmar disponibilidad
                            </td>
                            <td class="bg-raci-i text-center font-bold text-lg">I</td>
                            <td class="bg-raci-i text-center font-bold text-lg">I</td>
                            <td class="bg-raci-r text-center font-bold text-lg">R</td>
                        </tr>
                        <tr>
                            <td class="p-6 text-sm font-medium bg-white">
                                inpección visual previa
                            </td>
                            <td class="bg-raci-r text-center font-bold text-lg">R</td>
                            <td class="bg-raci-i text-center font-bold text-lg">I</td>
                            <td class="bg-raci-i text-center font-bold text-lg">I</td>
                        </tr>
                        <tr>
                            <td class="p-6 text-sm font-medium bg-white">
                                Uso conforme a políticas
                            </td>
                            <td class="bg-raci-r text-center font-bold text-lg">R</td>
                            <td class="bg-raci-i text-center font-bold text-lg">I</td>
                            <td class="bg-raci-i text-center font-bold text-lg">I</td>
                        </tr>
                        <tr>
                            <td class="p-6 text-sm font-medium bg-white">
                                Limpieza y estacionamiento
                            </td>
                            <td class="bg-raci-r text-center font-bold text-lg">R</td>
                            <td class="bg-raci-i text-center font-bold text-lg">I</td>
                            <td class="bg-raci-i text-center font-bold text-lg">I</td>
                        </tr>
                        <tr>
                            <td class="p-6 text-sm font-medium bg-white">
                                Documentar daños/incidentes
                            </td>
                            <td class="bg-raci-r text-center font-bold text-lg">R</td>
                            <td class="bg-raci-c text-center font-bold text-lg">C</td>
                            <td class="bg-raci-a text-center font-bold text-lg">A</td>
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
