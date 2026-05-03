@extends('layouts.intranet')

@section('title', 'Auditoría de Infraestructura de Red')

@push('css')
    <link href="/assets/css/intrahome.css" rel="stylesheet">
@endpush


@section('content')

    <div class="page" x-data="app()">

        {{-- HEADER --}}
        <h1>Auditoría de Infraestructura</h1>
        <p><strong>Objetivo:</strong> Evaluar estado actual de la red</p>

        <div class="grid-2">
            <input class="input" placeholder="Cliente" x-model="cliente">
            <div>
                <strong>Riesgo:</strong>
                <span :style="colorScore()" x-text="labelScore()"></span>
            </div>
        </div>

        {{-- ================= INFRAESTRUCTURA ================= --}}
        {{-- <div class="section">
            <h3>Infraestructura Física</h3>

            <div class="check-group">
                <label class="check-item"><input type="checkbox" x-model="fisico.cat6">Cat6</label>
                <label class="check-item"><input type="checkbox" x-model="fisico.fibra">Fibra</label>
                <label class="check-item"><input type="checkbox" x-model="fisico.ups">UPS</label>
            </div>

            <div class="grid-3">
                <input class="input" placeholder="UPS Marca" x-model="fisico.ups_marca">
                <input class="input" placeholder="Modelo" x-model="fisico.ups_modelo">
                <input class="input" placeholder="Capacidad" x-model="fisico.ups_cap">
            </div>
        </div> --}}
        {{-- ================= INFRAESTRUCTURA ================= --}}
        <div class="section border p-4">

            <h3 class="title">INFRAESTRUCTURA FÍSICA</h3>

            {{-- ================= CABLEADO ================= --}}
            <div class="subsection">
                <strong>CABLEADO</strong>

                <div class="grid-cableado">
                    <div class="label">Tipo Cableado</div>
                    <div class="options">
                        <label class="check-item"><input type="checkbox" x-model="fisico.cat5"> Cat5</label>
                        <label class="check-item"><input type="checkbox" x-model="fisico.cat5e"> Cat5e</label>
                        <label class="check-item"><input type="checkbox" x-model="fisico.cat6"> Cat6</label>
                        <label class="check-item"><input type="checkbox" x-model="fisico.cat6e"> Cat6e</label>
                        <label class="check-item"><input type="checkbox" x-model="fisico.cat7"> Cat7</label>
                    </div>

                    <div class="label">Fibra</div>
                    <div class="options">
                        <label class="check-item"><input type="checkbox" x-model="fisico.multimodo"> Multimodo</label>
                        <label class="check-item"><input type="checkbox" x-model="fisico.monomodo"> Monomodo</label>
                        <label class="check-item"><input type="checkbox" x-model="fisico.no_aplica"> No Aplica</label>
                    </div>

                    <div class="label">Patch Panel</div>
                    <div class="options">
                        <label class="check-item"><input type="checkbox" x-model="fisico.etiquetados"> Etiquetados</label>
                        <label class="check-item"><input type="checkbox" x-model="fisico.organizados"> Organizados</label>
                    </div>

                    <div class="label">Cableado</div>
                    <div class="options">
                        <label class="check-item">
                            <input type="checkbox" x-model="fisico.cableado_ok">
                            Etiquetado e identificado
                        </label>
                    </div>
                </div>
            </div>

            {{-- ================= ALIMENTACION ================= --}}
            <div class="subsection mt-4">
                <strong>ALIMENTACION</strong>

                <div class="row">
                    <span>UPS:</span>
                    <label><input type="radio" value="si" x-model="fisico.ups"> Sí</label>
                    <label><input type="radio" value="no" x-model="fisico.ups"> No</label>

                    <span class="ml-4">Marca:</span>
                    <input class="input-line" x-model="fisico.ups_marca">

                    <span>Modelo:</span>
                    <input class="input-line" x-model="fisico.ups_modelo">

                    <span>Capacidad:</span>
                    <input class="input-line" x-model="fisico.ups_cap">
                    <span>Kva</span>
                </div>
            </div>

            {{-- ================= CLIMATIZACION ================= --}}
            <div class="subsection mt-4">
                <strong>CLIMATIZACION</strong>

                <div class="row">
                    <span>A/C:</span>
                    <label><input type="radio" value="si" x-model="fisico.ac"> Sí</label>
                    <label><input type="radio" value="no" x-model="fisico.ac"> No</label>

                    <span class="ml-4">Tipo:</span>
                    <label><input type="checkbox" x-model="fisico.splitter"> Splitter</label>
                    <label><input type="checkbox" x-model="fisico.industrial"> Industrial</label>

                    <span>Otro:</span>
                    <input class="input-line" x-model="fisico.otro_ac">
                </div>
            </div>

            {{-- ================= DOCUMENTACION ================= --}}
            <div class="subsection mt-4">
                <strong>DOCUMENTACION</strong>

                <div class="row">
                    <span>Diagramas Red:</span>
                    <label><input type="radio" value="si" x-model="fisico.diagramas"> Sí</label>
                    <label><input type="radio" value="no" x-model="fisico.diagramas"> No</label>

                    <span>Direccionamiento IP documentado:</span>
                    <label><input type="radio" value="si" x-model="fisico.ip_doc"> Sí</label>
                    <label><input type="radio" value="no" x-model="fisico.ip_doc"> No</label>

                    <span>Vlans documentado:</span>
                    <label><input type="radio" value="si" x-model="fisico.vlans"> Sí</label>
                    <label><input type="radio" value="no" x-model="fisico.vlans"> No</label>
                </div>

                <div class="row mt-2">
                    <span>Plano Arquitectónico / Site Survey (WiFi):</span>
                    <label><input type="radio" value="si" x-model="fisico.site_survey"> Sí</label>
                    <label><input type="radio" value="no" x-model="fisico.site_survey"> No</label>
                </div>
            </div>

            {{-- ================= NOTAS ================= --}}
            <div class="subsection mt-4">
                <span>Notas Adicionales:</span>
                <textarea class="textarea w-full mt-2" rows="4" x-model="fisico.notas"></textarea>
            </div>

        </div>

        {{-- ================= SWITCHES ================= --}}
        <div class="section">
            <h3>Inventario Switches</h3>

            <template x-for="(sw,i) in switches" :key="i">
                <div style="border:1px solid #ddd;padding:10px;margin-bottom:10px;border-radius:10px;">

                    <strong>Switch <span x-text="i+1"></span></strong>

                    <div class="grid-3">
                        <input class="input" placeholder="Hostname" x-model="sw.host">
                        <input class="input" placeholder="Marca" x-model="sw.marca">
                        <input class="input" placeholder="Modelo" x-model="sw.modelo">
                    </div>

                    <div class="grid-3">
                        <input class="input" placeholder="#Puertos" x-model="sw.puertos">
                        <input class="input" placeholder="#Utilizados" x-model="sw.usados">
                        <input class="input" placeholder="IP Gestión" x-model="sw.ip">
                    </div>

                    <div class="check-group">
                        <label class="check-item"><input type="checkbox" x-model="sw.core">Core</label>
                        <label class="check-item"><input type="checkbox" x-model="sw.dist">Distribución</label>
                        <label class="check-item"><input type="checkbox" x-model="sw.acc">Acceso</label>
                    </div>

                    <div class="check-group">
                        <label class="check-item"><input type="checkbox" x-model="sw.gestion">Gestión</label>
                        <label class="check-item"><input type="checkbox" x-model="sw.vlan">VLAN</label>
                        <label class="check-item"><input type="checkbox" x-model="sw.poe">PoE</label>
                    </div>

                </div>
            </template>

            <button class="btn btn-light" @click="addSwitch()">+ Switch</button>
        </div>

        {{-- ================= SERVICIOS ================= --}}
        <div class="section">
            <h3>Servicios de Red</h3>

            <div class="check-group">
                <label class="check-item"><input type="checkbox" x-model="servicios.ospf">OSPF</label>
                <label class="check-item"><input type="checkbox" x-model="servicios.bgp">BGP</label>
                <label class="check-item"><input type="checkbox" x-model="servicios.estatico">Estático</label>
            </div>

            <div class="check-group">
                <label class="check-item"><input type="checkbox" x-model="servicios.dhcp">DHCP</label>
                <label class="check-item"><input type="checkbox" x-model="servicios.dns">DNS</label>
                <label class="check-item"><input type="checkbox" x-model="servicios.radius">Radius</label>
            </div>
        </div>

        {{-- ================= SEGURIDAD ================= --}}
        <div class="section">
            <h3>Seguridad</h3>

            <div class="grid-2">
                <input class="input" placeholder="Firewall Marca" x-model="seguridad.marca">
                <input class="input" placeholder="Modelo" x-model="seguridad.modelo">
            </div>

            <div class="check-group">
                <label class="check-item"><input type="checkbox" x-model="seguridad.vpn">VPN</label>
                <label class="check-item"><input type="checkbox" x-model="seguridad.ips">IPS</label>
                <label class="check-item"><input type="checkbox" x-model="seguridad.antivirus">Antivirus</label>
            </div>
        </div>

        {{-- BOTONES --}}
        <div class="no-print" style="margin-top:20px;">
            <button class="btn btn-primary" @click="imprimir()">Imprimir</button>
            <button class="btn btn-light" @click="exportHTML()">Exportar HTML</button>
        </div>

    </div>

@endsection

@push('js')
    <script>
        function app() {
            return {

                cliente: '',

                fisico: {
                    cat6: false,
                    fibra: false,
                    ups: false
                },

                switches: [{
                    host: '',
                    marca: '',
                    modelo: '',
                    puertos: '',
                    usados: '',
                    ip: ''
                }],

                servicios: {},
                seguridad: {},

                addSwitch() {
                    this.switches.push(JSON.parse(JSON.stringify(this.switches[0])))
                },

                /* SCORE */
                score() {
                    let s = 0;
                    if (!this.fisico.ups) s += 2;
                    if (!this.seguridad.marca) s += 2;
                    if (!this.servicios.ospf && !this.servicios.bgp) s += 2;
                    return s;
                },

                labelScore() {
                    let s = this.score();
                    if (s <= 2) return "BAJO";
                    if (s <= 5) return "MEDIO";
                    return "ALTO";
                },

                colorScore() {
                    let s = this.score();
                    if (s <= 2) return "color:green";
                    if (s <= 5) return "color:orange";
                    return "color:red";
                },

                /* PRINT */
                imprimir() {
                    window.print();
                },

                /* EXPORT HTML COMPLETO */
                exportHTML() {
                    let html = document.documentElement.outerHTML;
                    let blob = new Blob([html], {
                        type: "text/html"
                    });
                    let a = document.createElement("a");
                    a.href = URL.createObjectURL(blob);
                    a.download = "auditoria.html";
                    a.click();
                }

            }
        }
    </script>
@endpush
