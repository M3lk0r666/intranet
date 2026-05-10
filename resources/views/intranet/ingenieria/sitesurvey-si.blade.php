@extends('layouts.intranet')

@section('title', 'Cuestionario Site Survey - Si Wifi')

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
                            <span class="ml-1 text-sm text-primary font-medium md:ml-2">Cuestionario Site Survey - Si
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
                        Site Survey <span class="text-primary">- Red Inalámbrica Existente</span>
                    </h1>
                    <p class="text-slate-500 mt-2 text-sm max-w-2xl">
                        Recabar la información necesaria para el diseño e implementación de una solución de Red
                        Inalámbrica en sitios donde <span class="font-bold bg-yellow-200 px-1 rounded"> ya se cuenta
                        </span> con red Wi-Fi y se están
                        presentando problemas que afectan la operatividad.
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
                        <label class="ss-label">Referencia / Ticket No.</label>
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
                        <label class="ss-label">Objetivo del análisis de la red inalámbrica</label>
                        <textarea class="ss-textarea" name="objetivo" rows="2"
                            placeholder="Describa qué se busca lograr con el análisis de la red Wi-Fi existente"></textarea>
                    </div>
                </div>
            </section>

            <!-- ===== Sección 2: Información para Red Inalámbrica ===== -->
            <section class="ss-section">
                <div class="ss-section-header">
                    <span class="ss-num">02</span>
                    <span>Información para Red Inalámbrica</span>
                </div>
                <div class="ss-section-body space-y-7">
                    <!-- Problemas actuales -->
                    <div>
                        <label class="ss-label ss-label-bar">¿Qué problemas se presentan actualmente?</label>
                        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-3 gap-3 mt-3">
                            @foreach (['Problemas de conectividad', 'Problemas de velocidad', 'Áreas/Zonas sin cobertura', 'Alta densidad de dispositivos', 'Interferencia de señal', 'Seguridad'] as $p)
                                <label class="ss-check">
                                    <input type="checkbox" name="problemas[]" value="{{ $p }}" />
                                    <span>{{ $p }}</span>
                                </label>
                            @endforeach
                        </div>
                    </div>
                    <!-- Antenas / APs actuales -->
                    <div>
                        <label class="ss-label ss-label-bar">Ubicación de las antenas actualmente</label>
                        <p class="text-xs text-slate-500 mt-1 mb-3">* Identificarlas en el plano arquitectónico</p>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label class="ss-label">Marca</label>
                                <input class="ss-input" type="text" name="ap_marca"
                                    placeholder="Ej. Cisco, Aruba, Ubiquiti" />
                            </div>
                            <div>
                                <label class="ss-label">Modelo</label>
                                <input class="ss-input" type="text" name="ap_modelo" placeholder="Ej. AIR-AP1815I" />
                            </div>
                        </div>
                    </div>
                    <!-- Usuarios -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                        <div>
                            <label class="ss-label ss-label-bar">¿Cuántos usuarios se tienen actualmente?</label>
                            <div class="grid grid-cols-1 gap-2 mt-3">
                                <label class="ss-check">
                                    <input type="radio" name="usuarios_rango" value="Baja [<50]" />
                                    <span>Baja [&lt;50]</span>
                                </label>
                                <label class="ss-check">
                                    <input type="radio" name="usuarios_rango" value="Media [50-100]" />
                                    <span>Media [50-100]</span>
                                </label>
                                <label class="ss-check items-stretch">
                                    <input type="radio" name="usuarios_rango" value="Alta [>100]" />
                                    <span>Alta</span>
                                    <input class="ss-input !w-28 !py-1 ml-2" type="number" name="usuarios_alta"
                                        placeholder="cantidad" />
                                </label>
                            </div>
                        </div>
                        <div>
                            <label class="ss-label ss-label-bar">¿Cuántos dispositivos se conectan?</label>
                            <div class="space-y-3 mt-3">
                                <div class="flex items-center justify-between gap-3">
                                    <span class="text-sm text-slate-700">Cantidad de dispositivos por usuario</span>
                                    <input class="ss-input !w-32" type="number" name="disp_por_usuario"
                                        placeholder="0" />
                                </div>
                                <div class="flex items-center justify-between gap-3">
                                    <span class="text-sm text-slate-700"># Estimado total de dispositivos</span>
                                    <input class="ss-input !w-32" type="number" name="disp_total" placeholder="0" />
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Tipo de dispositivos -->
                    <div>
                        <label class="ss-label ss-label-bar">¿Qué tipo de dispositivos se están conectando?</label>
                        <div class="grid grid-cols-2 md:grid-cols-4 gap-3 mt-3">
                            @foreach (['Teléfonos móviles', 'Laptops', 'Cámaras', 'Tablet', 'Impresoras', 'Scanners', 'Dispositivos IoT'] as $d)
                                <label class="ss-check">
                                    <input type="checkbox" name="dispositivos[]" value="{{ $d }}" />
                                    <span>{{ $d }}</span>
                                </label>
                            @endforeach
                        </div>
                        <div class="mt-3">
                            <label class="ss-label">Otros</label>
                            <input class="ss-input" type="text" name="dispositivos_otros"
                                placeholder="Especifique otros dispositivos" />
                        </div>
                    </div>
                    <!-- Aplicativos -->
                    <div>
                        <label class="ss-label ss-label-bar">¿A qué aplicativos / servicios se está accediendo?</label>
                        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-3 mt-3">
                            @foreach (['Web (redes sociales, mensajería)', 'Videoconferencia', 'Banca', 'Seguridad (cámaras de vigilancia)', 'Recursos Locales', 'Telefonía (voz)', 'Acceso remoto', 'Domótica', 'Transmisión de medios'] as $a)
                                <label class="ss-check">
                                    <input type="checkbox" name="servicios[]" value="{{ $a }}" />
                                    <span>{{ $a }}</span>
                                </label>
                            @endforeach
                        </div>
                        <div class="mt-3">
                            <label class="ss-label">Otro servicio</label>
                            <input class="ss-input" type="text" name="servicios_otros"
                                placeholder="Especifique otro servicio" />
                        </div>
                    </div>
                    <!-- Dispositivo con dificultad -->
                    <div>
                        <label class="ss-label ss-label-bar">¿Existe algún dispositivo con mayor dificultad para
                            conectarse?</label>
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mt-3">
                            <div
                                class="md:col-span-3 flex items-center justify-between border border-slate-200 rounded-lg p-3">
                                <span class="text-sm font-medium">¿Existe dispositivo con dificultad?</span>
                                <div class="flex gap-4">
                                    <label class="flex items-center gap-1 cursor-pointer text-sm">
                                        <input type="radio" name="dificultad" value="Sí" /> Sí
                                    </label>
                                    <label class="flex items-center gap-1 cursor-pointer text-sm">
                                        <input type="radio" name="dificultad" value="No" /> No
                                    </label>
                                </div>
                            </div>
                            <div>
                                <label class="ss-label">Marca</label>
                                <input class="ss-input" type="text" name="dif_marca"
                                    placeholder="Marca dispositivo" />
                            </div>
                            <div>
                                <label class="ss-label">Modelo</label>
                                <input class="ss-input" type="text" name="dif_modelo" placeholder="#ABD-04H8" />
                            </div>
                            <div>
                                <label class="ss-label">Funcionalidad</label>
                                <input class="ss-input" type="text" name="dif_funcion"
                                    placeholder="Función o uso del dispositivo" />
                            </div>
                        </div>
                    </div>
                    <!-- Tipo de Controladora (preliminar) -->
                    <div>
                        <label class="ss-label ss-label-bar">Tipo de Controladora</label>
                        <div class="grid grid-cols-2 gap-3 mt-3 max-w-md">
                            <label class="ss-check">
                                <input type="radio" name="ctrl_tipo" value="Nube" /> Nube
                            </label>
                            <label class="ss-check">
                                <input type="radio" name="ctrl_tipo" value="Local" /> Local
                            </label>
                        </div>
                    </div>
                </div>
            </section>
            <!-- Sección 3: Infraestructura -->
            <section class="ss-section">
                <div class="ss-section-header">
                    <span class="ss-num">03</span>
                    <span>Información de Infraestructura</span>
                </div>
                <div class="ss-section-body space-y-7">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
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
                            <label class="ss-label">Notas sobre el diagrama (solicitar al cliente)</label>
                            <input class="ss-input" type="text" name="diagrama_notas"
                                placeholder="Estado, versión, ruta de archivo..." />
                        </div>
                    </div>
                    <!-- Onboarding -->
                    <div>
                        <label class="ss-label ss-label-bar">Onboarding de usuarios y dispositivos</label>
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-3 mt-3">
                            @foreach (['Autenticación (Radius, Pre-shared Key)', 'Portal cautivo', 'Certificados'] as $o)
                                <label class="ss-check">
                                    <input type="checkbox" name="onboarding[]" value="{{ $o }}" />
                                    <span>{{ $o }}</span>
                                </label>
                            @endforeach
                        </div>
                    </div>
                    <!-- SSIDs (lista dinámica) -->
                    <div>
                        <label class="ss-label ss-label-bar">¿Con cuántos y cuáles SSIDs cuenta?</label>
                        <div id="ssidList" class="space-y-2 mt-3"></div>
                        <button type="button" class="ss-add-btn mt-3" id="addSsid">+ Agregar SSID</button>
                    </div>
                    <!-- DHCP / DNS -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="ss-label">DHCP IP Server (direccionamiento por DHCP)</label>
                            <input class="ss-input" type="text" name="dhcp_server" placeholder="Ej. 192.168.1.10" />
                        </div>
                        <div>
                            <label class="ss-label">Servidor DNS</label>
                            <input class="ss-input" type="text" name="dns_server" placeholder="Ej. 8.8.8.8" />
                        </div>
                    </div>
                    <!-- Bloqueo de puertos -->
                    <div>
                        <label class="ss-label ss-label-bar">¿Existe bloqueo de puertos de algún
                            aplicativo/dispositivo?</label>
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mt-3">
                            <div class="flex items-center justify-between border border-slate-200 rounded-lg p-3">
                                <span class="text-sm font-medium">¿Existe bloqueo?</span>
                                <div class="flex gap-4">
                                    <label class="flex items-center gap-1 cursor-pointer text-sm">
                                        <input type="radio" name="bloqueo" value="Sí" /> Sí
                                    </label>
                                    <label class="flex items-center gap-1 cursor-pointer text-sm">
                                        <input type="radio" name="bloqueo" value="No" /> No
                                    </label>
                                </div>
                            </div>
                            <div class="md:col-span-2">
                                <label class="ss-label">Puertos TCP/UDP</label>
                                <input class="ss-input" type="text" name="bloqueo_puertos"
                                    placeholder="Ej. TCP 443, UDP 5060..." />
                            </div>
                        </div>
                    </div>
                    <!-- Cableado a antenas -->
                    <div>
                        <label class="ss-label ss-label-bar">Tipo de cableado hacia las antenas</label>
                        <div class="grid grid-cols-3 md:grid-cols-6 gap-3 mt-3">
                            @foreach (['Cat 5', 'Cat 5e', 'Cat 6', 'Cat 6e', 'Cat 7', 'Cat 8'] as $c)
                                <label class="ss-check justify-center">
                                    <input type="checkbox" name="cableado[]" value="{{ $c }}" />
                                    <span>{{ $c }}</span>
                                </label>
                            @endforeach
                        </div>
                    </div>
                    <!-- Switches y POE -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div class="flex items-center justify-between border border-slate-200 rounded-lg p-3">
                            <span class="text-sm font-medium">¿Switches administrables y PoE?</span>
                            <div class="flex gap-4">
                                <label class="flex items-center gap-1 cursor-pointer text-sm">
                                    <input type="radio" name="switch_admin" value="Sí" /> Sí
                                </label>
                                <label class="flex items-center gap-1 cursor-pointer text-sm">
                                    <input type="radio" name="switch_admin" value="No" /> No
                                </label>
                            </div>
                        </div>
                        <div class="flex items-center justify-between border border-slate-200 rounded-lg p-3">
                            <span class="text-sm font-medium">¿Inyectores de PoE?</span>
                            <div class="flex gap-4">
                                <label class="flex items-center gap-1 cursor-pointer text-sm">
                                    <input type="radio" name="inyectores" value="Sí" /> Sí
                                </label>
                                <label class="flex items-center gap-1 cursor-pointer text-sm">
                                    <input type="radio" name="inyectores" value="No" /> No
                                </label>
                            </div>
                        </div>
                    </div>
                    <!-- Throughput -->
                    <div>
                        <label class="ss-label">Tasa de transferencia (throughput) en los puertos del switch donde van
                            las antenas</label>
                        <input class="ss-input" type="text" name="throughput"
                            placeholder="Ej. 1 Gbps full-duplex, 2.5 Gbps multigig..." />
                    </div>
                    <!-- Controladora APs (donde radica) -->
                    <div>
                        <label class="ss-label ss-label-bar">¿Qué tipo de Controladora (donde radica) para el control
                            de los APs?</label>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-3">
                            <div class="border border-slate-200 rounded-lg p-3 space-y-2">
                                <label class="flex items-center gap-2 cursor-pointer text-sm font-medium">
                                    <input type="radio" name="ctrl_radica" value="Local" /> Local
                                </label>
                                <input class="ss-input" type="text" name="ctrl_local_ip"
                                    placeholder="IP de la controladora" />
                            </div>
                            <div class="border border-slate-200 rounded-lg p-3 space-y-2">
                                <label class="flex items-center gap-2 cursor-pointer text-sm font-medium">
                                    <input type="radio" name="ctrl_radica" value="Nube" /> Nube
                                </label>
                                <input class="ss-input" type="text" name="ctrl_nube_url"
                                    placeholder="URL / IP de la controladora en la nube" />
                            </div>
                        </div>
                    </div>
                    <!-- QoS -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div class="flex items-center justify-between border border-slate-200 rounded-lg p-3">
                            <span class="text-sm font-medium">¿Está habilitada la Calidad de Servicio (QoS)?</span>
                            <div class="flex gap-4">
                                <label class="flex items-center gap-1 cursor-pointer text-sm">
                                    <input type="radio" name="qos" value="Sí" /> Sí
                                </label>
                                <label class="flex items-center gap-1 cursor-pointer text-sm">
                                    <input type="radio" name="qos" value="No" /> No
                                </label>
                            </div>
                        </div>
                        <div class="flex items-center justify-between border border-slate-200 rounded-lg p-3">
                            <span class="text-sm font-medium">¿Existe punta a punta?</span>
                            <div class="flex gap-4">
                                <label class="flex items-center gap-1 cursor-pointer text-sm">
                                    <input type="radio" name="qos_e2e" value="Sí" /> Sí
                                </label>
                                <label class="flex items-center gap-1 cursor-pointer text-sm">
                                    <input type="radio" name="qos_e2e" value="No" /> No
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- Notas -->
            <section class="ss-section">
                <div class="ss-section-header">
                    <span class="ss-num">04</span>
                    <span>Notas Adicionales</span>
                </div>
                <div class="ss-section-body">
                    <textarea class="ss-textarea" name="notas" rows="4"
                        placeholder="Observaciones, hallazgos relevantes, recomendaciones preliminares..."></textarea>
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
                    Site Survey <span class="pr-accent">- Red Inalámbrica Existente</span>
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
                <td class="pr-q">Objetivo del análisis</td>
                <td class="pr-a" id="pr-objetivo">—</td>
            </tr>
        </table>

        <!-- Sección 02 -->
        <div class="pr-section-header"><span class="pr-num">02</span> Información para Red Inalámbrica</div>
        <table class="pr-table">
            <tr>
                <td class="pr-q">Problemas que se presentan actualmente</td>
                <td class="pr-a" id="pr-problemas">—</td>
            </tr>
            <tr>
                <td class="pr-q">Antenas/APs - Marca</td>
                <td class="pr-a" id="pr-ap_marca">—</td>
            </tr>
            <tr>
                <td class="pr-q">Antenas/APs - Modelo</td>
                <td class="pr-a" id="pr-ap_modelo">—</td>
            </tr>
            <tr>
                <td class="pr-q">Cantidad de usuarios actualmente</td>
                <td class="pr-a" id="pr-usuarios">—</td>
            </tr>
            <tr>
                <td class="pr-q">Dispositivos por usuario</td>
                <td class="pr-a" id="pr-disp_usuario">—</td>
            </tr>
            <tr>
                <td class="pr-q">Estimado total de dispositivos</td>
                <td class="pr-a" id="pr-disp_total">—</td>
            </tr>
            <tr>
                <td class="pr-q">Tipo de dispositivos conectados</td>
                <td class="pr-a" id="pr-dispositivos">—</td>
            </tr>
            <tr>
                <td class="pr-q">Aplicativos / servicios accedidos</td>
                <td class="pr-a" id="pr-servicios">—</td>
            </tr>
            <tr>
                <td class="pr-q">¿Dispositivo con dificultad para conectarse?</td>
                <td class="pr-a" id="pr-dificultad">—</td>
            </tr>
            <tr>
                <td class="pr-q">Dispositivo con dificultad - Marca</td>
                <td class="pr-a" id="pr-dif_marca">—</td>
            </tr>
            <tr>
                <td class="pr-q">Dispositivo con dificultad - Modelo</td>
                <td class="pr-a" id="pr-dif_modelo">—</td>
            </tr>
            <tr>
                <td class="pr-q">Dispositivo con dificultad - Funcionalidad</td>
                <td class="pr-a" id="pr-dif_funcion">—</td>
            </tr>
            <tr>
                <td class="pr-q">Tipo de controladora (preliminar)</td>
                <td class="pr-a" id="pr-ctrl_tipo">—</td>
            </tr>
        </table>

        <!-- Sección 03 -->
        <div class="pr-section-header"><span class="pr-num">03</span> Información de Infraestructura</div>
        <table class="pr-table">
            <tr>
                <td class="pr-q">¿Existe diagrama de red actual?</td>
                <td class="pr-a" id="pr-diagrama">—</td>
            </tr>
            <tr>
                <td class="pr-q">Notas sobre el diagrama</td>
                <td class="pr-a" id="pr-diagrama_notas">—</td>
            </tr>
            <tr>
                <td class="pr-q">Onboarding de usuarios y dispositivos</td>
                <td class="pr-a" id="pr-onboarding">—</td>
            </tr>
            <tr>
                <td class="pr-q">SSIDs configurados</td>
                <td class="pr-a" id="pr-ssids">—</td>
            </tr>
            <tr>
                <td class="pr-q">DHCP IP Server</td>
                <td class="pr-a" id="pr-dhcp">—</td>
            </tr>
            <tr>
                <td class="pr-q">Servidor DNS</td>
                <td class="pr-a" id="pr-dns">—</td>
            </tr>
            <tr>
                <td class="pr-q">¿Existe bloqueo de puertos?</td>
                <td class="pr-a" id="pr-bloqueo">—</td>
            </tr>
            <tr>
                <td class="pr-q">Puertos TCP/UDP bloqueados</td>
                <td class="pr-a" id="pr-bloqueo_puertos">—</td>
            </tr>
            <tr>
                <td class="pr-q">Cableado hacia las antenas</td>
                <td class="pr-a" id="pr-cableado">—</td>
            </tr>
            <tr>
                <td class="pr-q">¿Switches administrables y PoE?</td>
                <td class="pr-a" id="pr-switch_admin">—</td>
            </tr>
            <tr>
                <td class="pr-q">¿Inyectores de PoE?</td>
                <td class="pr-a" id="pr-inyectores">—</td>
            </tr>
            <tr>
                <td class="pr-q">Throughput puertos del switch / antenas</td>
                <td class="pr-a" id="pr-throughput">—</td>
            </tr>
            <tr>
                <td class="pr-q">Controladora APs (donde radica)</td>
                <td class="pr-a" id="pr-ctrl_radica">—</td>
            </tr>
            <tr>
                <td class="pr-q">¿QoS habilitada?</td>
                <td class="pr-a" id="pr-qos">—</td>
            </tr>
            <tr>
                <td class="pr-q">¿QoS punta a punta?</td>
                <td class="pr-a" id="pr-qos_e2e">—</td>
            </tr>
        </table>

        <!-- Sección 04 -->
        <div class="pr-section-header"><span class="pr-num">04</span> Notas Adicionales</div>
        <table class="pr-table">
            <tr>
                <td class="pr-a" id="pr-notas" style="width:100%">—</td>
            </tr>
        </table>

        <!-- Footer -->
        <div class="pr-footer">
            <span id="pr-footer-cliente">Cliente — Levantamiento Site Survey</span>
            <span>Ingeniería / Guías On-Site v1.0</span>
        </div>
    </div>
@endsection
