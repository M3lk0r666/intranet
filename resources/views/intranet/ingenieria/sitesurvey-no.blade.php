@extends('layouts.intranet')

@section('title', 'Cuestionario Site Survey - No Wifi')

@push('css')
    <link href="/assets/css/intrahome.css" rel="stylesheet">
    <link href="/assets/css/sitesurvey.css" rel="stylesheet">
@endpush

@section('content')

    <!-- Breadcrumb -->
    <div class="bg-white border-b border-gray-200 no-print">
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
                            <a href="{{ route('estructurainterna.ingenieria') }}"
                                class="ml-1 text-sm text-gray-600 hover:text-orange-600 md:ml-2">Ingenieria</a>
                        </div>
                    </li>
                    <li aria-current="page">
                        <div class="flex items-center">
                            <i class="fas fa-chevron-right text-gray-400 mx-2"></i>
                            <span class="ml-1 text-sm text-primary font-medium md:ml-2">Cuestionario Site Survey - No
                                Wifi</span>
                        </div>
                    </li>
                </ol>
            </nav>
        </div>
    </div>

    <!-- FORMULARIO INTERACTIVO (visible en pantalla) -->
    <div id="form-view" class="container mx-auto px-4 py-8 no-print">
        <!-- Encabezado tipo "ficha" -->
        <div class="bg-white rounded-2xl border border-slate-200 p-6 mb-6">
            <div class="flex justify-between items-start gap-4 flex-wrap">
                <div>
                    <span class="ss-badge">Cuestionario de Levantamiento V1.0</span>
                    <h1 class="text-3xl md:text-4xl font-black text-slate-900 mt-3">
                        Site Survey <span class="text-primary">- Red Inalámbrica</span>
                    </h1>
                    <p class="text-slate-500 mt-2 text-sm max-w-4xl">
                        Complete todos los campos para generar el reporte de levantamiento. Su función es recabar la
                        información necesaria para el diseño e implementación de una solución de Red Inalámbrica
                        cuando <span class="font-bold bg-yellow-200 px-1 rounded"> No se cuenta </span> con una red
                        inalámbrica previa.
                    </p>
                </div>
                <div class="ss-risk">
                    <div class="ss-risk-label">Nivel de riesgo</div>
                    <div class="ss-risk-value" id="riskLevelDisplay">ALTO</div>
                </div>
            </div>
        </div>
        <form id="surveyForm" autocomplete="off">
            <!-- ===== Sección 1: Información General ===== -->
            <section class="ss-section">
                <div class="ss-section-header">
                    <span class="ss-num">01</span>
                    <span>Información General</span>
                </div>
                <div class="ss-section-body grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-5">
                    <div>
                        <label class="ss-label">Cliente</label>
                        <input class="ss-input" type="text" name="cliente"
                            placeholder="Razón social o nombre del cliente" />
                    </div>
                    <div>
                        <label class="ss-label">Ticket No.</label>
                        <input class="ss-input" type="text" name="ticket" placeholder="#NJ-0000" />
                    </div>
                    <div>
                        <label class="ss-label">Reporter</label>
                        <input class="ss-input" type="text" name="reporter" placeholder="Nombre del solicitante" />
                    </div>
                    <div>
                        <label class="ss-label">Asignado a</label>
                        <select class="ss-select" name="asignado">
                            <option value="">Seleccionar...</option>
                            <option>Ing. Preventa A</option>
                            <option>Ing. Preventa B</option>
                        </select>
                    </div>
                    <div>
                        <label class="ss-label">Fecha de Levantamiento</label>
                        <input class="ss-input" type="date" name="fecha" value="{{ now()->format('Y-m-d') }}" />
                    </div>
                    <div class="md:col-span-2 lg:col-span-3">
                        <label class="ss-label">Objetivo del Proyecto</label>
                        <input class="ss-input" type="text" name="objetivo"
                            placeholder="Descripción breve de la meta técnica" />
                    </div>
                </div>
            </section>
            <!--  Sección 2: Información para Red Inalámbrica -->
            <section class="ss-section">
                <div class="ss-section-header">
                    <span class="ss-num">02</span>
                    <span>Información para Red Inalámbrica</span>
                </div>
                <div class="ss-section-body space-y-7">
                    <div>
                        <label class="ss-label ss-label-bar">¿Qué problemas se presentan?</label>
                        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-3 mt-3">
                            @foreach (['Expansión de oficinas', 'Conectividad', 'Performance de Dispositivos', 'Movilidad', 'Independencia de cableado', 'Alta demanda de la red'] as $problem)
                                <label class="ss-check">
                                    <input type="checkbox" name="problemas[]" value="{{ $problem }}" />
                                    <span>{{ $problem }}</span>
                                </label>
                            @endforeach
                        </div>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                        <div>
                            <label class="ss-label ss-label-bar">Demanda de Usuarios &amp; Carga</label>
                            <div class="space-y-3 mt-3">
                                <div class="flex items-center justify-between gap-3">
                                    <span class="text-sm text-slate-700">Usuarios conectándose</span>
                                    <input class="ss-input !w-32" type="number" name="usuarios" placeholder="0" />
                                </div>
                                <div class="flex items-center justify-between gap-3">
                                    <span class="text-sm text-slate-700">Dispositivos por usuario</span>
                                    <input class="ss-input !w-32" type="number" name="dispositivos_por_usuario"
                                        placeholder="0" />
                                </div>
                            </div>
                        </div>
                        <div>
                            <label class="ss-label ss-label-bar">Tipo de Dispositivos</label>
                            <div class="grid grid-cols-2 gap-3 mt-3">
                                @foreach (['Laptop', 'Smartphone', 'Tablet', 'Cámaras', 'Impresoras/Scanners', 'IoT / Otros'] as $dev)
                                    <label class="ss-check">
                                        <input type="checkbox" name="dispositivos[]" value="{{ $dev }}" />
                                        <span>{{ $dev }}</span>
                                    </label>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- Sección 3: Aplicativos y Servicios Críticos -->
            <section class="ss-section">
                <div class="ss-section-header">
                    <span class="ss-num">03</span>
                    <span>Aplicativos y Servicios Críticos</span>
                </div>
                <div class="ss-section-body">
                    <p class="text-sm text-slate-500 mb-4">Seleccione los servicios que requieren prioridad en la red
                        inalámbrica (QoS):</p>
                    <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-7 gap-3">
                        @php
                            $services = [
                                'WEB' => 'ri-global-line',
                                'VIDEO/SEGURIDAD' => 'ri-vidicon-line',
                                'BANCA' => 'ri-bank-line',
                                'SISTEMAS' => 'ri-computer-line',
                                'TRANSFER' => 'ri-cloud-line',
                                'VOIP' => 'ri-phone-line',
                                'DOMÓTICA' => 'ri-home-smile-line',
                            ];
                        @endphp
                        @foreach ($services as $name => $icon)
                            <label class="ss-check flex-col text-center !p-4">
                                <input type="checkbox" name="servicios[]" value="{{ $name }}" />
                                <i class="{{ $icon }} text-2xl text-slate-500"></i>
                                <span class="text-xs font-semibold">{{ $name }}</span>
                            </label>
                        @endforeach
                    </div>
                </div>
            </section>
            <!-- Sección 3.1: Dispositivo limitante -->
            <section class="ss-section">
                <div class="ss-section-header">
                    <span class="ss-num">3.1</span>
                    <span>Dispositivo con Posible Limitación al Conectar a la Red</span>
                </div>
                <div class="ss-section-body grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-5">
                    <div
                        class="md:col-span-2 lg:col-span-3 flex items-center justify-between border border-slate-200 rounded-lg p-3">
                        <span class="text-sm font-medium">¿Existe dispositivo con limitante?</span>
                        <div class="flex gap-4">
                            <label class="flex items-center gap-1 cursor-pointer text-sm">
                                <input type="radio" name="limitante" value="Sí" /> Sí
                            </label>
                            <label class="flex items-center gap-1 cursor-pointer text-sm">
                                <input type="radio" name="limitante" value="No" /> No
                            </label>
                        </div>
                    </div>
                    <div>
                        <label class="ss-label">Marca</label>
                        <input class="ss-input" type="text" name="limit_marca" placeholder="Marca dispositivo" />
                    </div>
                    <div>
                        <label class="ss-label">Modelo</label>
                        <input class="ss-input" type="text" name="limit_modelo" placeholder="#ABD-04H8" />
                    </div>
                    <div>
                        <label class="ss-label">Funcionalidad del dispositivo</label>
                        <input class="ss-input" type="text" name="limit_funcion"
                            placeholder="Función o uso del dispositivo" />
                    </div>
                </div>
            </section>
            <!-- Sección 4: Infraestructura -->
            <section class="ss-section">
                <div class="ss-section-header">
                    <span class="ss-num">04</span>
                    <span>Información de Infraestructura</span>
                </div>
                <div class="ss-section-body grid grid-cols-1 md:grid-cols-2 gap-8">
                    <div class="space-y-5">
                        <div class="flex items-center justify-between border border-slate-200 rounded-lg p-3">
                            <span class="text-sm font-medium">¿Existe diagrama de red actual?</span>
                            <div class="flex gap-4">
                                <label class="flex items-center gap-1 cursor-pointer text-sm">
                                    <input type="radio" name="diagrama" value="Sí" /> Sí
                                </label>
                                <label class="flex items-center gap-1 cursor-pointer text-sm">
                                    <input type="radio" name="diagrama" value="No" /> No
                                </label>
                            </div>
                        </div>
                        <div>
                            <label class="ss-label ss-label-bar">Onboarding de usuarios</label>
                            <div class="grid grid-cols-1 gap-2 mt-3">
                                @foreach (['Autenticación (Radius, Pre-shared Key)', 'Portal cautivo', 'Certificados'] as $on)
                                    <label class="ss-check">
                                        <input type="checkbox" name="onboarding[]" value="{{ $on }}" />
                                        <span>{{ $on }}</span>
                                    </label>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="space-y-5">
                        <div class="flex items-center justify-between border border-slate-200 rounded-lg p-3">
                            <span class="text-sm font-medium">Asignación de direccionamiento IP</span>
                            <div class="flex gap-4">
                                <label class="flex items-center gap-1 cursor-pointer text-sm">
                                    <input type="radio" name="ip_asignacion" value="DHCP" /> DHCP
                                </label>
                                <label class="flex items-center gap-1 cursor-pointer text-sm">
                                    <input type="radio" name="ip_asignacion" value="Estática" /> Estática
                                </label>
                            </div>
                        </div>
                        <div>
                            <label class="ss-label ss-label-bar">Cableado existente o propuesto</label>
                            <div class="grid grid-cols-2 gap-2 mt-3">
                                @foreach (['Cat 6', 'Cat 6e', 'Cat 7', 'Cat 8'] as $cat)
                                    <label class="ss-check">
                                        <input type="checkbox" name="cableado[]" value="{{ $cat }}" />
                                        <span>{{ $cat }}</span>
                                    </label>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="space-y-5">
                        <div class="flex items-center justify-between border border-slate-200 rounded-lg p-3">
                            <span class="text-sm font-medium">¿Switches Administrables y PoE?</span>
                            <div class="flex gap-4">
                                <label class="flex items-center gap-1 cursor-pointer text-sm">
                                    <input type="radio" name="switch_admin" value="Sí" /> Sí
                                </label>
                                <label class="flex items-center gap-1 cursor-pointer text-sm">
                                    <input type="radio" name="switch_admin" value="No" /> No
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="space-y-5">
                        <div>
                            <label class="ss-label ss-label-bar">Tipo de controladora a integrar</label>
                            <div class="grid grid-cols-1 gap-2 mt-3">
                                @foreach (['Local Appliance', 'Cloud based', 'Virtual / VM'] as $ctrl)
                                    <label class="ss-check">
                                        <input type="checkbox" name="controladora[]" value="{{ $ctrl }}" />
                                        <span>{{ $ctrl }}</span>
                                    </label>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- Notas -->
            <section class="ss-section">
                <div class="ss-section-header">
                    <span class="ss-num">05</span>
                    <span>Notas Adicionales</span>
                </div>
                <div class="ss-section-body">
                    <textarea class="ss-textarea" name="notas" rows="4"
                        placeholder="Observaciones del sitio, condiciones de la planta física, comentarios técnicos, etc."></textarea>
                </div>
            </section>
            <!-- Botones -->
            <div class="flex flex-wrap items-center gap-3 mt-6">
                <button type="button" class="ss-btn-primary" id="btnImprimir">
                    <i class="fas fa-print"></i> Imprimir Reporte
                </button>
                <button type="button" class="ss-btn-secondary" id="btnExportar">
                    <i class="fas fa-download"></i> Exportar HTML
                </button>
                <button type="reset" class="ss-btn-secondary">
                    <i class="fas fa-eraser"></i> Limpiar
                </button>
            </div>
        </form>
    </div>

    <!-- REPORTE DE IMPRESIÓN (oculto en pantalla, visible al imprimir) -->
    <div id="print-report">
        <!-- Encabezado del reporte -->
        <div class="pr-header">
            <div>
                <span class="pr-badge">Cuestionario de Levantamiento V1.0</span>
                <div class="pr-title">
                    Site Survey <span class="pr-accent">- Red Inalámbrica</span>
                </div>
            </div>
            <div class="pr-meta">
                <div class="pr-meta-row"><span>Cliente</span><span id="pr-cliente">—</span></div>
                <div class="pr-meta-row"><span>Ticket</span><span id="pr-ticket">—</span></div>
                <div class="pr-meta-row"><span>Reporter</span><span id="pr-reporter">—</span></div>
                <div class="pr-meta-row"><span>Asignado</span><span id="pr-asignado">—</span></div>
                <div class="pr-meta-row"><span>Fecha</span><span id="pr-fecha">—</span></div>
                <div class="pr-meta-row"><span>Riesgo</span><span id="pr-riesgo" class="pr-no">ALTO</span></div>
            </div>
        </div>
        <!-- Sección 01 -->
        <div class="pr-section-header"><span class="pr-num">01</span> Información General</div>
        <table class="pr-table">
            <tr>
                <td class="pr-q">Objetivo del Proyecto</td>
                <td class="pr-a" id="pr-objetivo">—</td>
            </tr>
        </table>
        <!-- Sección 02 -->
        <div class="pr-section-header"><span class="pr-num">02</span> Información para Red Inalámbrica</div>
        <table class="pr-table">
            <tr>
                <td class="pr-q">Problemas detectados</td>
                <td class="pr-a" id="pr-problemas">—</td>
            </tr>
            <tr>
                <td class="pr-q">Usuarios conectándose</td>
                <td class="pr-a" id="pr-usuarios">—</td>
            </tr>
            <tr>
                <td class="pr-q">Dispositivos por usuario</td>
                <td class="pr-a" id="pr-dispxuser">—</td>
            </tr>
            <tr>
                <td class="pr-q">Tipo de dispositivos</td>
                <td class="pr-a" id="pr-dispositivos">—</td>
            </tr>
        </table>
        <!-- Sección 03 -->
        <div class="pr-section-header"><span class="pr-num">03</span> Aplicativos y Servicios Críticos</div>
        <table class="pr-table">
            <tr>
                <td class="pr-q">Servicios con prioridad (QoS)</td>
                <td class="pr-a" id="pr-servicios">—</td>
            </tr>
        </table>
        <!-- Sección 3.1 -->
        <div class="pr-section-header"><span class="pr-num">3.1</span> Dispositivo con Posible Limitación</div>
        <table class="pr-table">
            <tr>
                <td class="pr-q">¿Existe dispositivo con limitante?</td>
                <td class="pr-a" id="pr-limitante">—</td>
            </tr>
            <tr>
                <td class="pr-q">Marca</td>
                <td class="pr-a" id="pr-limit_marca">—</td>
            </tr>
            <tr>
                <td class="pr-q">Modelo</td>
                <td class="pr-a" id="pr-limit_modelo">—</td>
            </tr>
            <tr>
                <td class="pr-q">Funcionalidad</td>
                <td class="pr-a" id="pr-limit_funcion">—</td>
            </tr>
        </table>
        <!-- Sección 04 -->
        <div class="pr-section-header"><span class="pr-num">04</span> Información de Infraestructura</div>
        <table class="pr-table">
            <tr>
                <td class="pr-q">¿Existe diagrama de red actual?</td>
                <td class="pr-a" id="pr-diagrama">—</td>
            </tr>
            <tr>
                <td class="pr-q">Onboarding de usuarios</td>
                <td class="pr-a" id="pr-onboarding">—</td>
            </tr>
            <tr>
                <td class="pr-q">Asignación de direccionamiento IP</td>
                <td class="pr-a" id="pr-ip_asignacion">—</td>
            </tr>
            <tr>
                <td class="pr-q">Cableado existente / propuesto</td>
                <td class="pr-a" id="pr-cableado">—</td>
            </tr>
            <tr>
                <td class="pr-q">¿Switches administrables y PoE?</td>
                <td class="pr-a" id="pr-switch_admin">—</td>
            </tr>
            <tr>
                <td class="pr-q">Tipo de controladora a integrar</td>
                <td class="pr-a" id="pr-controladora">—</td>
            </tr>
        </table>
        <!-- Sección 05 -->
        <div class="pr-section-header"><span class="pr-num">05</span> Notas Adicionales</div>
        <table class="pr-table">
            <tr>
                <td class="pr-a" id="pr-notas" style="width:100%">—</td>
            </tr>
        </table>
        <!-- Footer -->
        <div class="pr-footer">
            <span id="pr-footer-cliente">Cliente —</span>
            <span>Ingeniería / Guías On-Site v1.0</span>
        </div>
    </div>
@endsection
