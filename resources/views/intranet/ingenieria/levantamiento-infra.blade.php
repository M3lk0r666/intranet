@extends('layouts.intranet')

@section('title', 'Guía Infraestructura de Red')

@push('css')
    <link href="/assets/css/intrahome.css" rel="stylesheet">
@endpush

@section('content')

    {{-- Breadcrumb --}}
    <div class="bg-white border-b border-gray-200">
        <div class="container mx-auto px-4 py-3">
            <nav class="flex" aria-label="Breadcrumb">
                <ol class="inline-flex items-center space-x-1 md:space-x-3">
                    <li class="inline-flex items-center">
                        <a href="{{ route('bienvenido') }}"
                            class="inline-flex items-center text-sm text-gray-600 hover:text-orange-600">
                            <i class="fas fa-home mr-2"></i>Home
                        </a>
                    </li>
                    <li>
                        <div class="flex items-center"><i class="fas fa-chevron-right text-gray-400 mx-2"></i><a
                                href="{{ route('intranet.index') }}"
                                class="text-sm text-gray-600 hover:text-orange-600">Intranet</a></div>
                    </li>
                    <li>
                        <div class="flex items-center"><i class="fas fa-chevron-right text-gray-400 mx-2"></i><a
                                href="{{ route('estructurainterna.ingenieria') }}"
                                class="text-sm text-gray-600 hover:text-orange-600">Ingeniería</a></div>
                    </li>
                    <li>
                        <div class="flex items-center"><i class="fas fa-chevron-right text-gray-400 mx-2"></i><a
                                href="{{ route('ingenieria.guias-on-site') }}"
                                class="text-sm text-gray-600 hover:text-orange-600">Guías on Site</a></div>
                    </li>
                    <li aria-current="page">
                        <div class="flex items-center"><i class="fas fa-chevron-right text-gray-400 mx-2"></i><span
                                class="text-sm text-orange-600 font-medium">Infraestructura</span></div>
                    </li>
                </ol>
            </nav>
        </div>
    </div>

    <div>
        <div class="text-center mb-5 mt-8">
            <h1 class="text-4xl font-black font-display tracking-tight text-slate-900 uppercase">
                Guia <span class="text-primary  uppercase"> levantamiento infraestructura</span>
            </h1>
        </div>
        <p class="text-lg text-slate-600 leading-relaxed text-justify">
            El presente cuestionario tiene como objetivo realizar un levantamiento detallado de la
            infraestructura de red, incluyendo switches y demás dispositivos asociados, con el fin de
            obtener una visión clara de la infraestrcutura. Esta información permitirá
            conocer el estado actual asi como identificar posibles problemas y apoyar en la mejora,
            mantenimiento y
            crecimiento eficiente de la red.
        </p>
    </div>

    <div class="bg-white rounded-2xl border border-slate-200 p-5 mb-8 mt-2">
        <div x-data="app">
            {{-- Header --}}
            <div class="lev-header">
                <div class="lev-header-left">
                    <div class="lev-badge bg-orange-200">Cuestionario de Levantamiento v1.0</div>
                    <h1 class="lev-title">Infraestructura <span>de Red</span></h1>
                    <p class="lev-subtitle">Complete todos los campos para generar el reporte de levantamiento.</p>
                </div>
                <div class="lev-risk-box">
                    <div class="lev-risk-label">Nivel de riesgo</div>
                    <div class="lev-risk-value" :style="colorScore()" x-text="labelScore()">—</div>
                </div>
            </div>

            {{-- ── 1. INFORMACIÓN GENERAL ── --}}
            <div class="lev-section">
                <div class="lev-section-head">
                    <span class="num">01</span>
                    <h2>Información General</h2>
                </div>
                <div class="lev-section-body">
                    <div class="lev-grid-2">
                        <div class="lev-field" style="grid-column: 1 / -1;">
                            <label class="lev-label">Nombre del Cliente</label>
                            <input class="lev-input" type="text" placeholder="Razón social o nombre del cliente"
                                x-model="cliente" />
                        </div>
                        <div class="lev-field">
                            <label class="lev-label">Fecha de Levantamiento</label>
                            <input class="lev-input" type="date" x-model="fecha" />
                        </div>
                        <div class="lev-field">
                            <label class="lev-label">Ingeniero Responsable</label>
                            <input class="lev-input" type="text" placeholder="Nombre del ingeniero"
                                x-model="ingeniero" />
                        </div>
                    </div>
                </div>
            </div>

            {{-- ── 2. INFRAESTRUCTURA FÍSICA ── --}}
            <div class="lev-section">
                <div class="lev-section-head">
                    <span class="num">02</span>
                    <h2>Infraestructura Física</h2>
                </div>
                <div class="lev-section-body">
                    <div class="lev-grid-2" style="margin-bottom: 1.5rem;">
                        <div>
                            <p class="lev-sub"></p>
                            <div class="lev-field">
                                <label class="lev-label">¿Es cableado estructurado?</label>
                                <select class="lev-select" x-model="cable.estructura">
                                    <option value="">Seleccionar…</option>
                                    <option value="si">Si</option>
                                    <option value="no">No</option>
                                    <option value="parcial">Parcialmente</option>
                                    <option value="no_aplica">No Aplica</option>
                                </select>
                            </div>
                        </div>
                        {{-- Cableado --}}
                        <div>
                            <p class="lev-sub">Tipo de Cableado</p>
                            <div class="lev-checks">
                                <label class="lev-check-item"><input type="checkbox" x-model="fisico.cat5" /> Cat 5</label>
                                <label class="lev-check-item"><input type="checkbox" x-model="fisico.cat5e" /> Cat
                                    5e</label>
                                <label class="lev-check-item"><input type="checkbox" x-model="fisico.cat6" /> Cat 6</label>
                                <label class="lev-check-item"><input type="checkbox" x-model="fisico.cat6e" /> Cat
                                    6e</label>
                                <label class="lev-check-item"><input type="checkbox" x-model="fisico.cat7" /> Cat
                                    7</label>
                                <label class="lev-check-item"><input type="checkbox" x-model="fisico.cat8" /> Cat
                                    8</label>
                                <label class="lev-check-item"><input type="checkbox" x-model="fisico.se_desconoce" /> Se
                                    desconce</label>
                            </div>
                        </div>
                        {{-- Fibra --}}
                        <div>
                            <p class="lev-sub">Fibra Óptica</p>
                            <div class="lev-checks">
                                <label class="lev-check-item"><input type="checkbox" x-model="fisico.multimodo" />
                                    Multimodo</label>
                                <label class="lev-check-item"><input type="checkbox" x-model="fisico.monomodo" />
                                    Monomodo</label>
                                <label class="lev-check-item"><input type="checkbox" x-model="fisico.no_aplica_fibra" />
                                    No
                                    Aplica</label>
                                <label class="lev-check-item"><input type="checkbox" x-model="fisico.se_desconoce" />
                                    Se desconoce</label>
                            </div>
                        </div>
                    </div>

                    <hr class="lev-divider">

                    <div class="lev-grid-2" style="margin-bottom: 1.5rem;">
                        {{-- Rack o gabinete --}}
                        <div>
                            <p class="lev-sub">Rack / Gabinete</p>
                            <div class="lev-radio-row">
                                <span>¿Cuenta con rack o gabinete para switches / patch panel?</span>
                                <div class="lev-radios">
                                    <label class="lev-radio-item">
                                        <input type="radio" name="rack" value="si" x-model="fisico.rack">
                                        Sí
                                    </label>
                                    <label class="lev-radio-item">
                                        <input type="radio" name="rack" value="no" x-model="fisico.rack">
                                        No
                                    </label>
                                </div>
                            </div>
                            {{-- Tipo de rack --}}
                            <div class="lev-field" x-show="fisico.rack === 'si'" x-transition>
                                <label class="lev-label">Tipo de rack</label>
                                <select class="lev-select" x-model="fisico.tipo_rack">
                                    <option value="">Seleccionar…</option>
                                    <option value="abierto">Abierto</option>
                                    <option value="cerrado">Cerrado</option>
                                    <option value="pared">Pared</option>
                                    <option value="piso">Piso</option>
                                </select>
                            </div>
                        </div>

                        {{-- Patch Panel --}}
                        <div>
                            <p class="lev-sub">Patch Panel</p>
                            <div class="lev-radio-row">
                                <span>¿Cuenta con patch panel?</span>
                                <div class="lev-radios">
                                    <label class="lev-radio-item">
                                        <input type="radio" name="patch_panel" value="si"
                                            x-model="fisico.patch_panel">
                                        Sí
                                    </label>
                                    <label class="lev-radio-item">
                                        <input type="radio" name="patch_panel" value="no"
                                            x-model="fisico.patch_panel">
                                        No
                                    </label>
                                    <label class="lev-radio-item">
                                        <input type="radio" name="patch_panel" value="se_desconoce"
                                            x-model="fisico.patch_panel">
                                        Se desconoce
                                    </label>
                                </div>
                            </div>
                            {{-- Opcionales si existe patch panel --}}
                            <div x-show="fisico.patch_panel === 'si'" x-transition>
                                <div class="lev-checks">
                                    <label class="lev-check-item">
                                        <input type="checkbox" x-model="fisico.etiquetados" />
                                        Etiquetado
                                    </label>
                                    <label class="lev-check-item">
                                        <input type="checkbox" x-model="fisico.organizados" />
                                        Organizado
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <hr class="lev-divider">

                    <div class="lev-grid-2" style="margin-bottom: 1.5rem;">
                        {{-- Patch Panel --}}
                        <div>
                            <p class="lev-sub">Patch Panel</p>
                            <div class="lev-checks">
                                <label class="lev-check-item"><input type="checkbox" x-model="fisico.etiquetados" />
                                    Etiquetado</label>
                                <label class="lev-check-item"><input type="checkbox" x-model="fisico.organizados" />
                                    Organizado</label>
                            </div>
                        </div>
                        {{-- Cableado gral --}}
                        {{-- <div>
                            <p class="lev-sub">Estado del Cableado</p>
                            <div class="lev-checks">
                                <label class="lev-check-item"><input type="checkbox" x-model="fisico.cableado_ok" />
                                    Etiquetado e Identificado</label>
                            </div>
                        </div> --}}
                        <div>
                            <p class="lev-sub">Estado del Cableado</p>
                            <div class="lev-checks">
                                <label class="lev-check-item">
                                    <input type="checkbox" x-model="fisico.cableado_etiquetado" />
                                    Etiquetado
                                </label>
                                <label class="lev-check-item">
                                    <input type="checkbox" x-model="fisico.cableado_identificado" />
                                    Identificado
                                </label>
                            </div>
                        </div>
                    </div>

                    <hr class="lev-divider">

                    {{-- Respaldo de Energía --}}
                    <div style="margin-bottom: 1.5rem;">
                        <p class="lev-sub">Respaldo de Energía</p>
                        <div class="lev-grid-2">
                            {{-- Planta de emergencia --}}
                            <div>
                                <div class="lev-radio-row">
                                    <span>¿Cuenta con planta de emergencia?</span>
                                    <div class="lev-radios">
                                        <label class="lev-radio-item">
                                            <input type="radio" name="planta_emergencia" value="si"
                                                x-model="fisico.planta_emergencia">
                                            Sí
                                        </label>
                                        <label class="lev-radio-item">
                                            <input type="radio" name="planta_emergencia" value="no"
                                                x-model="fisico.planta_emergencia">
                                            No
                                        </label>
                                        <label class="lev-radio-item">
                                            <input type="radio" name="planta_emergencia" value="parcial"
                                                x-model="fisico.planta_emergencia">
                                            Parcial
                                        </label>
                                    </div>
                                </div>
                                {{-- Datos de planta --}}
                                <div x-show="fisico.planta_emergencia === 'si' || fisico.planta_emergencia === 'parcial'"
                                    x-transition>
                                    <div class="lev-field">
                                        <label class="lev-label">Capacidad (kVA)</label>
                                        <input type="text" class="lev-input" placeholder="Ej. 30 kVA"
                                            x-model="fisico.planta_capacidad">
                                    </div>
                                    <div class="lev-field">
                                        <label class="lev-label">Autonomía</label>
                                        <input type="text" class="lev-input" placeholder="Ej. 4 horas"
                                            x-model="fisico.planta_autonomia">
                                    </div>
                                </div>
                            </div>
                            {{-- UPS --}}
                            <div>
                                {{-- UPS general --}}
                                <div class="lev-radio-row">
                                    <span>¿Cuenta con UPS general?</span>
                                    <div class="lev-radios">
                                        <label class="lev-radio-item">
                                            <input type="radio" name="ups_general" value="si"
                                                x-model="fisico.ups_general">
                                            Sí
                                        </label>
                                        <label class="lev-radio-item">
                                            <input type="radio" name="ups_general" value="no"
                                                x-model="fisico.ups_general">
                                            No
                                        </label>
                                        <label class="lev-radio-item">
                                            <input type="radio" name="ups_general" value="se_desconoce"
                                                x-model="fisico.ups_general">
                                            Se desconoce
                                        </label>
                                    </div>
                                </div>
                                {{-- UPS por rack --}}
                                <div class="lev-radio-row">
                                    <span>¿Cuenta con UPS por IDF o por rack?</span>
                                    <div class="lev-radios">
                                        <label class="lev-radio-item">
                                            <input type="radio" name="ups_rack" value="si"
                                                x-model="fisico.ups_rack">
                                            Sí
                                        </label>
                                        <label class="lev-radio-item">
                                            <input type="radio" name="ups_rack" value="no"
                                                x-model="fisico.ups_rack">
                                            No
                                        </label>
                                        <label class="lev-radio-item">
                                            <input type="radio" name="ups_rack" value="algunos"
                                                x-model="fisico.ups_rack">
                                            Algunos
                                        </label>
                                        <label class="lev-radio-item">
                                            <input type="radio" name="ups_rack" value="se_desconoce"
                                                x-model="fisico.ups_rack">
                                            Se desconoce
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <hr class="lev-divider">

                    <div class="lev-grid-2">
                        {{-- Documentación --}}
                        <div>
                            <p class="lev-sub">Documentación</p>
                            <div class="lev-radio-row">
                                <span>¿Existe diagrama de red actual?</span>
                                <div class="lev-radios">
                                    <label class="lev-radio-item"><input type="radio" name="diagrama" value="si"
                                            x-model="fisico.diagrama" /> Sí</label>
                                    <label class="lev-radio-item"><input type="radio" name="diagrama" value="no"
                                            x-model="fisico.diagrama" /> No</label>
                                    <label class="lev-radio-item"><input type="radio" name="diagrama"
                                            value="sin-respuesta" x-model="fisico.diagrama" /> Sin respuesta</label>
                                </div>
                            </div>
                            <div class="lev-radio-row">
                                <span>VLANs documentadas</span>
                                <div class="lev-radios">
                                    <label class="lev-radio-item"><input type="radio" name="vlans" value="si"
                                            x-model="fisico.vlans" /> Sí</label>
                                    <label class="lev-radio-item"><input type="radio" name="vlans" value="no"
                                            x-model="fisico.vlans" /> No</label>
                                    <label class="lev-radio-item"><input type="radio" name="vlans"
                                            value="sin-respuesta" x-model="fisico.vlans" /> Sin Rsspuesta</label>
                                </div>
                            </div>
                            <div class="lev-radio-row">
                                <span>Direccionamiento IP documentado</span>
                                <div class="lev-radios">
                                    <label class="lev-radio-item"><input type="radio" name="direccionamiento"
                                            value="si" x-model="fisico.direccionamiento" /> Sí</label>
                                    <label class="lev-radio-item"><input type="radio" name="direccionamiento"
                                            value="no" x-model="fisico.direccionamiento" /> No</label>
                                    <label class="lev-radio-item"><input type="radio" name="direccionamiento"
                                            value="sin-respuesta" x-model="fisico.direccionamiento" /> Sin
                                        Respuesta</label>
                                </div>
                            </div>
                            <div class="lev-radio-row">
                                <span>¿Existe Memoria técnica del cableado? </span>
                                <div class="lev-radios">
                                    <label class="lev-radio-item"><input type="radio" name="memoria_tecnica"
                                            value="si" x-model="fisico.memoria_tecnica" /> Sí</label>
                                    <label class="lev-radio-item"><input type="radio" name="memoria_tecnica"
                                            value="no" x-model="fisico.memoria_tecnica" /> No</label>
                                    <label class="lev-radio-item"><input type="radio" name="memoria_tecnica"
                                            value="no" x-model="fisico.memoria_tecnica" /> Sin Respuesta</label>
                                </div>
                            </div>
                        </div>
                        {{-- Notas --}}
                        <div class="lev-field">
                            <label class="lev-label">Notas Adicionales</label>
                            <textarea class="lev-textarea" placeholder="Observaciones del área física, condiciones del rack, etc."
                                x-model="fisico.notas"></textarea>
                        </div>
                    </div>
                </div>
            </div>

            {{-- ── 3. INVENTARIO DE SWITCHES ── --}}
            <div class="lev-section">
                <div class="lev-section-head">
                    <span class="num">03</span>
                    <h2>Inventario de Switches</h2>
                </div>
                <div class="lev-section-body">
                    <template x-for="(sw, i) in switches" :key="i">
                        <div class="sw-card">
                            <div class="sw-card-head">
                                <strong x-text="'SW-' + String(i+1).padStart(2,'0')"></strong>
                                <button class="sw-delete" @click="removeSwitch(i)" x-show="switches.length > 1">
                                    <i class="ri-delete-bin-line"></i> Eliminar
                                </button>
                            </div>
                            <div class="sw-card-body">
                                <div class="lev-grid" style="margin-bottom: 1rem;">
                                    <div class="lev-field">
                                        <label class="lev-label">Hostname</label>
                                        <input class="lev-input" type="text" placeholder="ej. SW-CORE-01"
                                            x-model="sw.host" />
                                    </div>
                                    <div class="lev-field">
                                        <label class="lev-label">Marca</label>
                                        <input class="lev-input" type="text" placeholder="ej. Cisco, HP"
                                            x-model="sw.marca" />
                                    </div>
                                    <div class="lev-field">
                                        <label class="lev-label">Modelo</label>
                                        <input class="lev-input" type="text" placeholder="ej. Catalyst 2960"
                                            x-model="sw.modelo" />
                                    </div>
                                    <div class="lev-field">
                                        <label class="lev-label">Total de Puertos</label>
                                        <input class="lev-input" type="number" placeholder="24" x-model="sw.puertos" />
                                    </div>
                                    <div class="lev-field">
                                        <label class="lev-label">Puertos Utilizados</label>
                                        <input class="lev-input" type="number" placeholder="18" x-model="sw.usados" />
                                    </div>
                                    <div class="lev-field">
                                        <label class="lev-label">IP de Gestión</label>
                                        <input class="lev-input" type="text" placeholder="192.168.1.1"
                                            x-model="sw.ip" />
                                    </div>
                                </div>
                                <p class="lev-sub">Funcionalidad</p>
                                <div class="lev-checks">
                                    <label class="lev-check-item"><input type="checkbox" x-model="sw.core" />
                                        Core</label>
                                    <label class="lev-check-item"><input type="checkbox" x-model="sw.dist" />
                                        Distribución</label>
                                    <label class="lev-check-item"><input type="checkbox" x-model="sw.acc" />
                                        Acceso</label>
                                    <label class="lev-check-item"><input type="checkbox" x-model="sw.gestion" /> Con
                                        Gestión</label>
                                    <label class="lev-check-item"><input type="checkbox" x-model="sw.poe" /> PoE</label>
                                </div>
                            </div>
                        </div>
                    </template>
                    <button class="btn-add-sw" @click="addSwitch()">
                        <i class="ri-add-line"></i> Agregar Switch
                    </button>
                </div>
            </div>

            {{-- ── 4. SERVICIOS DE RED ── --}}
            <div class="lev-section">
                <div class="lev-section-head">
                    <span class="num">04</span>
                    <h2>Servicios de Red</h2>
                </div>
                <div class="lev-section-body">
                    <p class="lev-sub" style="margin-bottom: .85rem;">Protocolos de Enrutamiento</p>
                    <div class="lev-service-cards" style="margin-bottom: 1.5rem;">
                        <label class="lev-service-card"><input type="checkbox" x-model="servicios.estatico"><i
                                class="ri-arrow-right-long-line"></i><span>Estático</span></label>
                        <label class="lev-service-card"><input type="checkbox" x-model="servicios.ospf"><i
                                class="ri-route-line"></i><span>OSPF</span></label>
                        <label class="lev-service-card"><input type="checkbox" x-model="servicios.bgp"><i
                                class="ri-route-line"></i><span>BGP</span></label>
                        <label class="lev-service-card"><input type="checkbox" x-model="servicios.eigrp"><i
                                class="ri-route-line"></i><span>EIGRP</span></label>
                        <label class="lev-service-card"><input type="checkbox" x-model="servicios.mpls"><i
                                class="ri-links-line"></i><span>MPLS</span></label>
                    </div>

                    <hr class="lev-divider">

                    <p class="lev-sub" style="margin-bottom: .85rem;">
                        Direccionamiento IP
                    </p>
                    <div class="lev-grid-2" style="margin-bottom: 1.5rem;">
                        {{-- Columna izquierda --}}
                        <div>
                            {{-- Pertenece al cliente --}}
                            <div class="lev-radio-row">
                                <span>¿El direccionamiento IP pertenece al cliente?</span>
                                <div class="lev-radios">
                                    <label class="lev-radio-item">
                                        <input type="radio" name="ip_cliente" value="si"
                                            x-model="servicios.ip_cliente">
                                        Sí
                                    </label>
                                    <label class="lev-radio-item">
                                        <input type="radio" name="ip_cliente" value="no"
                                            x-model="servicios.ip_cliente">
                                        No
                                    </label>
                                    <label class="lev-radio-item">
                                        <input type="radio" name="ip_cliente" value="parcial"
                                            x-model="servicios.ip_cliente">
                                        Parcial
                                    </label>
                                </div>
                            </div>
                            {{-- Tipo de asignación --}}
                            <div class="lev-field">
                                <label class="lev-label">
                                    Asignación de IPs
                                </label>
                                <select class="lev-select" x-model="servicios.asignacion_ip">
                                    <option value="">Seleccionar…</option>
                                    <option value="fijas">
                                        Fijas (estáticas)
                                    </option>
                                    <option value="dhcp">
                                        Entregadas por DHCP server
                                    </option>
                                    <option value="mixtas">
                                        Mixtas
                                    </option>
                                </select>
                            </div>
                            {{-- DHCP --}}
                            <div x-show="servicios.asignacion_ip === 'dhcp' || servicios.asignacion_ip === 'mixtas'"
                                x-transition>
                                <div class="lev-field">
                                    <label class="lev-label">
                                        Servidor DHCP
                                    </label>
                                    <input type="text" class="lev-input"
                                        placeholder="Ej. Router, Windows Server, Linux, Fortigate..."
                                        x-model="servicios.dhcp_server">
                                </div>
                            </div>
                        </div>
                        {{-- Columna derecha --}}
                        <div>
                            {{-- Subredes --}}
                            <div class="lev-field">
                                <label class="lev-label">
                                    Rangos de IPs utilizadas (subredes)
                                </label>
                                <textarea class="lev-textarea" placeholder="Ej. 192.168.1.0/24&#10;10.10.0.0/16&#10;172.16.5.0/24"
                                    x-model="servicios.subredes">
                                </textarea>
                            </div>
                        </div>
                    </div>

                    <hr class="lev-divider">
                    <p class="lev-sub" style="margin-bottom: .85rem;">Servicios Activos</p>
                    <div class="lev-service-cards">
                        <label class="lev-service-card"><input type="checkbox" x-model="servicios.dns"><i
                                class="ri-bank-line"></i><span>DNS</span></label>
                        <label class="lev-service-card"><input type="checkbox" x-model="servicios.radius"><i
                                class="ri-computer-line"></i><span>RADIUS</span></label>
                        <label class="lev-service-card"><input type="checkbox" x-model="servicios.ad"><i
                                class="ri-shield-user-line"></i><span>Active Directory</span></label>
                        <label class="lev-service-card"><input type="checkbox" x-model="servicios.ntp"><i
                                class="ri-time-line"></i><span>NTP</span></label>
                        <label class="lev-service-card"><input type="checkbox" x-model="servicios.snmp"><i
                                class="ri-pulse-line"></i><span>SNMP</span></label>
                    </div>
                </div>
            </div>

            {{-- ── 5. SEGURIDAD PERIMETRAL ── --}}
            <div class="lev-section">
                <div class="lev-section-head">
                    <span class="num">05</span>
                    <h2>Seguridad Perimetral</h2>
                </div>
                <div class="lev-section-body">
                    <div class="lev-grid">
                        <div class="lev-field">
                            <label class="lev-label">Tipo de Firewall</label>
                            <select class="lev-select" x-model="seguridad.tipo_fw">
                                <option value="">Seleccionar…</option>
                                <option value="hardware">Por Hardware</option>
                                <option value="software">Por Software</option>
                                <option value="ambos">Ambos</option>
                                <option value="no_aplica">No Aplica</option>
                            </select>
                        </div>
                        <div class="lev-field">
                            <label class="lev-label">Marca</label>
                            <input class="lev-input" type="text" placeholder="ej. Fortinet, Palo Alto"
                                x-model="seguridad.marca" />
                        </div>
                        <div class="lev-field">
                            <label class="lev-label">Modelo</label>
                            <input class="lev-input" type="text" placeholder="ej. FortiGate 60F"
                                x-model="seguridad.modelo" />
                        </div>
                        <div class="lev-field">
                            <label class="lev-label">Ubicación / ID de Rack</label>
                            <input class="lev-input" type="text" placeholder="ej. NJ-0012"
                                x-model="seguridad.ubicacion" />
                        </div>
                        <div class="lev-field">
                            <label class="lev-label">Total de Puertos</label>
                            <input class="lev-input" type="number" placeholder="8" x-model="seguridad.puertos" />
                        </div>
                        <div class="lev-field">
                            <label class="lev-label">IP de Gestión</label>
                            <input class="lev-input" type="text" placeholder="192.168.1.254"
                                x-model="seguridad.ip" />
                        </div>
                    </div>

                    <hr class="lev-divider">
                    <p class="lev-sub">Funcionalidades activas del Firewall</p>
                    <div class="lev-checks">
                        <label class="lev-check-item"><input type="checkbox" x-model="seguridad.ids"> IDS/IPS</label>
                        <label class="lev-check-item"><input type="checkbox" x-model="seguridad.vpn"> VPN</label>
                        <label class="lev-check-item"><input type="checkbox" x-model="seguridad.nat"> NAT</label>
                        <label class="lev-check-item"><input type="checkbox" x-model="seguridad.dmz"> DMZ</label>
                        <label class="lev-check-item"><input type="checkbox" x-model="seguridad.waf"> WAF</label>
                        <label class="lev-check-item"><input type="checkbox" x-model="seguridad.acl"> ACL</label>
                    </div>

                    <hr class="lev-divider">
                    <div class="lev-field">
                        <label class="lev-label">Notas de Seguridad</label>
                        <textarea class="lev-textarea" placeholder="Políticas especiales, configuraciones relevantes, etc."
                            x-model="seguridad.notas"></textarea>
                    </div>
                </div>
            </div>

            {{-- ── ACCIONES ── --}}
            <div class="lev-actions">
                <button class="btn-primary-lev" @click="imprimir()">
                    <i class="ri-printer-line"></i> Imprimir Reporte
                </button>
                <button class="btn-outline-lev" @click="exportHTML()">
                    <i class="ri-download-line"></i> Exportar HTML
                </button>
                <button class="btn-outline-lev" @click="limpiar()" style="color:#dc2626;border-color:#fecaca;">
                    <i class="ri-eraser-line"></i> Limpiar Formulario
                </button>
            </div>

        </div>
    </div>

@endsection
