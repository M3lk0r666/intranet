hola borolas
@extends('layouts.intranet')

@section('title', 'Intranet Corporativa')

@push('css')
    <link href="/assets/css/intrahome.css" rel="stylesheet">
    <link href="/assets/css/mapeopuerto.css" rel="stylesheet">
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
                            <a href="{{ route('estructurainterna.ingenieria') }}"
                                class="ml-1 text-sm text-gray-600 hover:text-orange-600 md:ml-2">Ingenieria
                            </a>
                        </div>
                    </li>
                    <li>
                        <div class="flex items-center">
                            <i class="fas fa-chevron-right text-gray-400 mx-2"></i>
                            <a href="{{ route('ingenieria.guias-on-site') }}"
                                class="ml-1 text-sm text-gray-600 hover:text-orange-600 md:ml-2">Guias on Site
                            </a>
                        </div>
                    </li>
                    <li aria-current="page">
                        <div class="flex items-center">
                            <i class="fas fa-chevron-right text-gray-400 mx-2"></i>
                            <span class="ml-1 text-sm text-primary font-medium md:ml-2">Mapeo de Puertos</span>
                        </div>
                    </li>
                </ol>
            </nav>
        </div>
    </div>

    <!-- Encabezado -->
    <div class=" mb-5 mt-8">
        {{-- HERO con stats rápidos == --}}
        <section class="proc-hero p-6 md:p-9 mb-10 proc-anim-up">
            <div class="flex flex-col md:flex-row md:items-center gap-6 mb-6">
                <div class="proc-hero-icon">
                    <i class="las la-project-diagram"></i>
                </div>
                <div class="flex-1">
                    <div class="flex items-center gap-2 text-xs font-bold text-orange-600 uppercase tracking-widest mb-2">
                        <i class="las la-building"></i>
                        <span>Ingenieria</span>
                    </div>
                    <h1 class="text-3xl md:text-4xl font-extrabold text-gray-900 tracking-tight leading-tight">
                        Herramienta visual Mapeo de Puertos
                    </h1>
                    <p class="text-gray-600 mt-2 text-base md:text-lg">
                        Herramienta de planeación de migraciones de switches, del equipo origen (o stack) y el del
                        equipo de reemplazo. Permite capturar con clics el estado de cada puerto y las re-asignaciones,
                        generando al final una imagen PNG lista para reportes y guardar la configuración en formato JSON
                    </p>
                </div>
            </div>
        </section>
    </div>

    <div class="bg-white rounded-2xl border border-slate-200 p-5 mb-8">
        <div>
            <section class="bg-white rounded-xl border border-gray-200 shadow-sm p-6 md:p-8 mb-8">
                <div class="flex items-center gap-3 mb-6">
                    <div class="w-12 h-12 rounded-lg bg-orange-100 flex items-center justify-center">
                        <i class="las la-list-ol text-2xl text-orange-600"></i>
                    </div>
                    <div>
                        <h2 class="text-2xl font-bold text-gray-900">¿Cómo utilizar la herramienta?</h2>
                        <p class="text-gray-600 mt-1">
                            Sigue estos pasos para realizar el mapeo de puertos y generar el reporte de migración.
                        </p>
                    </div>
                </div>

                <div class="space-y-5">

                    <div class="flex gap-4">
                        <div
                            class="flex-shrink-0 w-9 h-9 rounded-full bg-orange-500 text-white font-bold flex items-center justify-center">
                            1
                        </div>
                        <div>
                            <h3 class="font-semibold text-gray-900">Configura los equipos</h3>
                            <p class="text-gray-600">
                                Captura la información del switch origen y del switch destino, incluyendo modelo, IP,
                                cantidad de puertos y si forma parte de un stack.
                            </p>
                        </div>
                    </div>

                    <div class="flex gap-4">
                        <div
                            class="flex-shrink-0 w-9 h-9 rounded-full bg-orange-500 text-white font-bold flex items-center justify-center">
                            2
                        </div>
                        <div>
                            <h3 class="font-semibold text-gray-900">Marca el estado de los puertos</h3>
                            <p class="text-gray-600">
                                Haz clic sobre cada puerto para indicar su estado: activo, sin enlace, deshabilitado o
                                re-asignado.
                            </p>
                        </div>
                    </div>

                    <div class="flex gap-4">
                        <div
                            class="flex-shrink-0 w-9 h-9 rounded-full bg-orange-500 text-white font-bold flex items-center justify-center">
                            3
                        </div>
                        <div>
                            <h3 class="font-semibold text-gray-900">Realiza las re-asignaciones</h3>
                            <p class="text-gray-600">
                                Si un puerto cambia de posición, selecciona la opción <strong>Re-asignar</strong> y elige el
                                puerto disponible correspondiente en el switch destino.
                            </p>
                        </div>
                    </div>

                    <div class="flex gap-4">
                        <div
                            class="flex-shrink-0 w-9 h-9 rounded-full bg-orange-500 text-white font-bold flex items-center justify-center">
                            4
                        </div>
                        <div>
                            <h3 class="font-semibold text-gray-900">Verifica el mapeo</h3>
                            <p class="text-gray-600">
                                Revisa el diagrama para confirmar que las conexiones y re-asignaciones sean correctas antes
                                de la migración.
                            </p>
                        </div>
                    </div>

                    <div class="flex gap-4">
                        <div
                            class="flex-shrink-0 w-9 h-9 rounded-full bg-orange-500 text-white font-bold flex items-center justify-center">
                            5
                        </div>
                        <div>
                            <h3 class="font-semibold text-gray-900">Guarda tu trabajo</h3>
                            <p class="text-gray-600">
                                Exporta el proyecto en formato <strong>JSON</strong> para continuar posteriormente o carga
                                un archivo previamente guardado.
                            </p>
                        </div>
                    </div>

                    <div class="flex gap-4">
                        <div
                            class="flex-shrink-0 w-9 h-9 rounded-full bg-green-600 text-white font-bold flex items-center justify-center">
                            <i class="las la-file-export"></i>
                        </div>
                        <div>
                            <h3 class="font-semibold text-gray-900">Genera el reporte</h3>
                            <p class="text-gray-600">
                                Una vez finalizado el mapeo, exporta un reporte en formato <strong>PNG</strong> con el
                                diagrama y la información de la migración.
                            </p>
                        </div>
                    </div>

                </div>
            </section>
        </div>
        <div class="app" id="app">
            <!-- Configuración de capacidades -->
            <div class="config-bar">
                <label>Origen:</label>
                <select id="selOriginType">
                    <option value="24">1 switch de 24</option>
                    <option value="48" selected>1 switch de 48</option>
                    <option value="2x24">2 switches de 24 (stack)</option>
                </select>
                <select id="selOriginFiber">
                    <option value="0">sin fibra</option>
                    <option value="4" selected>+ 4 SFP</option>
                    <option value="6">+ 6 SFP</option>
                </select>
                <span class="sep">|</span>
                <label>Destino:</label>
                <select id="selDestType">
                    <option value="24">24 puertos</option>
                    <option value="48" selected>48 puertos</option>
                </select>
                <select id="selDestFiber">
                    <option value="0">sin fibra</option>
                    <option value="4" selected>+ 4 SFP</option>
                    <option value="6">+ 6 SFP</option>
                </select>
                <button class="btn" id="btnApply">Aplicar</button>
                <div class="spacer"></div>
                <button class="btn" id="btnSave">Guardar JSON</button>
                <button class="btn" id="btnLoad">Cargar JSON</button>
                <input type="file" id="fileLoad" accept=".json" style="display:none">
                <button class="btn primary" id="btnPng">Exportar PNG</button>
            </div>

            <!-- Datos del equipo (no reinician el mapeo) -->
            <div class="meta-panel">
                <div class="meta-ip">
                    <label>IP (se conserva en el destino):</label>
                    <input type="text" id="inpIp" placeholder="192.168.1.61" style="width:170px">
                </div>
                <div class="meta-col">
                    <h4>DATOS ORIGEN</h4>
                    <div class="row">
                        <label>Modelo:</label>
                        <input type="text" id="inpOriginModel" placeholder="X440-G2-24p" style="width:190px">
                    </div>
                    <div class="row">
                        <label id="lblSerial1">Serial:</label>
                        <input type="text" id="inpOriginSerial1" placeholder="2236G-01026" style="width:140px">
                        <label id="lblSerial2" style="display:none">Serial 2:</label>
                        <input type="text" id="inpOriginSerial2" placeholder="2236G-01027"
                            style="width:140px; display:none">
                    </div>
                </div>
                <div class="meta-col">
                    <h4>DATOS DESTINO</h4>
                    <div class="row">
                        <label>Modelo:</label>
                        <input type="text" id="inpDestModel" placeholder="X440-G2-48p-10G4" style="width:190px">
                    </div>
                    <div class="row">
                        <label>Serial:</label>
                        <input type="text" id="inpDestSerial" placeholder="2236N-40876" style="width:140px">
                    </div>
                </div>
            </div>

            <div class="map-banner" id="mapBanner">
                <span id="mapBannerText"></span>
                <button class="btn" id="btnCancelMap">Cancelar</button>
            </div>

            <div class="stack-wrap" id="stackWrap">
                <div class="origin-row" id="originRow"></div>
                <div class="panel" id="panelDest">
                    <div class="panel-title" id="titleDest">SWITCH DESTINO</div>
                    <div class="panel-sub" id="subDest"></div>
                    <div class="ports-area" id="areaDest"></div>
                </div>
                <svg id="linesSvg"></svg>
            </div>

            <div class="legend">
                <span><span class="dot" style="background:#e8e9eb;border-color:#c4c7cc"></span> Sin definir</span>
                <span><span class="dot" style="background:#b5dd8f;border-color:#7fb84e"></span> Activo (se
                    mantiene)</span>
                <span><span class="dot" style="background:#fbfbfb;border-color:#b7bbc2"></span> Sin link</span>
                <span><span class="dot" style="background:#ffd98e;border-color:#e0a83c"></span> Re-asignado</span>
                <span><span class="dot" style="background:#f5b5b5;border-color:#d97070"></span> Deshabilitado</span>
            </div>

            <div class="popover" id="popover">
                <div class="pop-header">
                    <h3 id="popTitle">Puerto</h3>
                    <button class="close-btn" id="popClose">&times;</button>
                </div>
                <div class="pop-body" id="popBody"></div>
                <div class="pop-info" id="popInfo"></div>
            </div>
        </div>



    </div>


@endsection
@push('js')
    <script>
        // ==========================================================
        // Estado global — sin BD: memoria + Guardar/Cargar JSON
        // ==========================================================
        const COLORS = {
            unset: {
                bg: '#e8e9eb',
                bd: '#c4c7cc',
                label: 'Sin definir'
            },
            active: {
                bg: '#b5dd8f',
                bd: '#7fb84e',
                label: 'Activo'
            },
            nolink: {
                bg: '#fbfbfb',
                bd: '#b7bbc2',
                label: 'Sin link'
            },
            disabled: {
                bg: '#f5b5b5',
                bd: '#d97070',
                label: 'Deshabilitado'
            },
            reassigned: {
                bg: '#ffd98e',
                bd: '#e0a83c',
                label: 'Re-asignado'
            },
        };

        let state = null;
        let mappingFrom = null; // { unit, local, kind }
        let selectedJack = null;

        function mkPorts(copper, fiber) {
            const arr = [];
            for (let i = 1; i <= copper; i++) arr.push({
                local: i,
                kind: 'cu',
                state: 'unset',
                mapTo: null,
                mapFrom: null,
                auto: false
            });
            for (let i = copper + 1; i <= copper + fiber; i++) arr.push({
                local: i,
                kind: 'sfp',
                state: 'unset',
                mapTo: null,
                mapFrom: null,
                auto: false
            });
            return arr;
        }

        function newState(originType, originFiber, destCopper, destFiber) {
            const units = originType === '2x24' ? 2 : 1;
            const copperPerUnit = originType === '2x24' ? 24 : parseInt(originType);
            return {
                ip: '',
                origin: {
                    type: originType,
                    units,
                    copperPerUnit,
                    fiber: originFiber,
                    model: '',
                    serials: ['', ''],
                    ports: Array.from({
                        length: units
                    }, () => mkPorts(copperPerUnit, originFiber)),
                },
                dest: {
                    copper: destCopper,
                    fiber: destFiber,
                    model: '',
                    serial: '',
                    ports: mkPorts(destCopper, destFiber),
                },
            };
        }

        // Etiqueta de un puerto origen: "10" o "2:10" (stack)
        function oLabel(unit, local) {
            return state.origin.units > 1 ? (unit + 1) + ':' + local : String(local);
        }

        // ==========================================================
        // Render
        // ==========================================================
        function renderAll() {
            renderOrigin();
            renderDest();
            updateTitles();
            requestAnimationFrame(drawLines);
        }

        function updateTitles() {
            const o = state.origin,
                d = state.dest;
            document.querySelectorAll('.origin-sub').forEach((el, u) => {
                el.textContent = [o.model, o.serials[u] ? 'S/N ' + o.serials[u] : '', state.ip ? 'IP ' + state.ip :
                        ''
                    ]
                    .filter(Boolean).join('  ·  ');
            });
            document.getElementById('titleDest').textContent =
                'SWITCH DESTINO (' + d.copper + (d.fiber ? ' + ' + d.fiber + ' SFP' : '') + ')';
            document.getElementById('subDest').textContent = [d.model, d.serial ? 'S/N ' + d.serial : '', state.ip ? 'IP ' +
                state.ip : ''
            ].filter(Boolean).join('  ·  ');
        }

        function renderOrigin() {
            const row = document.getElementById('originRow');
            row.innerHTML = '';
            const o = state.origin;
            for (let u = 0; u < o.units; u++) {
                const panel = document.createElement('div');
                panel.className = 'panel';
                panel.id = 'panel-o-' + u;
                const title = 'SWITCH ORIGEN' + (o.units > 1 ? ' ' + (u + 1) : '') +
                    ' (' + o.copperPerUnit + (o.fiber ? ' + ' + o.fiber + ' SFP' : '') + ')';
                panel.innerHTML = '<div class="panel-title">' + title + '</div><div class="panel-sub origin-sub"></div>';
                const area = document.createElement('div');
                area.className = 'ports-area';
                buildPortsArea(area, o.ports[u], 'o', u);
                panel.appendChild(area);
                // Nota de bloque (stack): el rango del destino donde cae esta
                // unidad y aviso de que el orden se mantiene, con excepciones.
                if (o.units > 1) {
                    const start = u * o.copperPerUnit + 1,
                        end = start + o.copperPerUnit - 1;
                    const re = o.ports[u].filter(p => p.state === 'reassigned').length;
                    const note = document.createElement('div');
                    note.className = 'block-note';
                    note.textContent = '\u2192 Destino ' + start + '\u2013' + end + ' \u00b7 el orden se mantiene' +
                        (re ? ' (excepto ' + re + ' re-asignado' + (re > 1 ? 's' : '') + ')' : '');
                    panel.appendChild(note);
                }
                row.appendChild(panel);
            }
        }

        function renderDest() {
            const area = document.getElementById('areaDest');
            area.innerHTML = '';
            buildPortsArea(area, state.dest.ports, 'd', null);
        }

        function buildPortsArea(area, ports, side, unit) {
            const cu = ports.filter(p => p.kind === 'cu');
            const fi = ports.filter(p => p.kind === 'sfp');
            const BLOCK_COLS = 8;
            let block = null;
            for (let c = 0; c < cu.length / 2; c++) {
                if (c % BLOCK_COLS === 0) {
                    block = document.createElement('div');
                    block.className = 'block';
                    area.appendChild(block);
                }
                block.appendChild(makeCol(cu[c * 2], cu[c * 2 + 1], side, unit));
            }
            if (fi.length) {
                const sec = document.createElement('div');
                sec.className = 'fiber-sec';
                sec.innerHTML = '<span class="fiber-tag">SFP</span>';
                for (let c = 0; c < fi.length / 2; c++) {
                    sec.appendChild(makeCol(fi[c * 2], fi[c * 2 + 1], side, unit));
                }
                area.appendChild(sec);
            }
        }

        function makeCol(odd, even, side, unit) {
            const col = document.createElement('div');
            col.className = 'col';
            col.appendChild(makeNum(odd.local));
            col.appendChild(makeJack(odd, side, unit, false));
            if (even) {
                col.appendChild(makeJack(even, side, unit, true));
                col.appendChild(makeNum(even.local));
            }
            return col;
        }

        function makeNum(n) {
            const el = document.createElement('div');
            el.className = 'num';
            el.textContent = n;
            return el;
        }

        function makeJack(p, side, unit, flip) {
            const el = document.createElement('div');
            el.className = 'jack ' + p.state + (flip ? ' flip' : '') + (p.kind === 'sfp' ? ' sfp' : '');
            el.id = side === 'o' ? 'jack-o-' + unit + '-' + p.local : 'jack-d-' + p.local;
            if (p.state === 'reassigned') {
                el.textContent = side === 'o' ? '\u2192' + p.mapTo : oLabel(p.mapFrom.unit, p.mapFrom.local);
            }
            if (mappingFrom && side === 'd' && p.state === 'unset' && p.kind === mappingFrom.kind) {
                el.classList.add('candidate');
            }
            el.addEventListener('click', e => {
                e.stopPropagation();
                onJackClick(el, p, side, unit);
            });
            el.addEventListener('mouseenter', () => highlightLine(side, unit, p, true));
            el.addEventListener('mouseleave', () => highlightLine(side, unit, p, false));
            return el;
        }

        // ==========================================================
        // Interacción
        // ==========================================================
        function onJackClick(el, p, side, unit) {
            if (mappingFrom) {
                if (side !== 'd') return;
                if (p.kind !== mappingFrom.kind) {
                    alert('El puerto debe ser del mismo tipo (' + (mappingFrom.kind === 'cu' ? 'cobre' : 'fibra SFP') +
                        ').');
                    return;
                }
                if (p.state !== 'unset') {
                    alert('Ese puerto destino ya est\u00e1 ocupado. Elige uno libre.');
                    return;
                }
                const o = state.origin.ports[mappingFrom.unit][idxOf(state.origin.ports[mappingFrom.unit], mappingFrom
                    .local)];
                clearAutoMirror(mappingFrom.unit, o.local);
                o.state = 'reassigned';
                o.mapTo = p.local;
                p.state = 'reassigned';
                p.mapFrom = {
                    unit: mappingFrom.unit,
                    local: o.local
                };
                exitMappingMode();
                renderAll();
                return;
            }
            openPopover(el, p, side, unit);
        }

        function idxOf(arr, local) {
            return arr.findIndex(x => x.local === local);
        }

        function setPortState(p, side, unit, newSt) {
            if (p.state === 'reassigned') removeMapping(p, side);
            if (side === 'o') clearAutoMirror(unit, p.local);
            p.state = newSt;
            // Espejo automático (solo cobre): unidad 1 → mismo puerto,
            // unidad 2 → puerto local + 24 en el destino.
            if (side === 'o' && newSt === 'active' && p.kind === 'cu') {
                const destLocal = unit * state.origin.copperPerUnit + p.local;
                const d = state.dest.ports[idxOf(state.dest.ports, destLocal)];
                if (d && d.kind === 'cu' && d.state === 'unset') {
                    d.state = 'active';
                    d.auto = true;
                }
            }
            closePopover();
            renderAll();
        }

        function clearAutoMirror(unit, local) {
            const destLocal = unit * state.origin.copperPerUnit + local;
            const d = state.dest.ports[idxOf(state.dest.ports, destLocal)];
            if (d && d.auto) {
                d.state = 'unset';
                d.auto = false;
            }
        }

        function removeMapping(p, side) {
            if (side === 'o' && p.mapTo != null) {
                const d = state.dest.ports[idxOf(state.dest.ports, p.mapTo)];
                if (d) {
                    d.state = 'unset';
                    d.mapFrom = null;
                }
                p.mapTo = null;
            }
            if (side === 'd' && p.mapFrom) {
                const arr = state.origin.ports[p.mapFrom.unit];
                const o = arr[idxOf(arr, p.mapFrom.local)];
                if (o) {
                    o.state = 'unset';
                    o.mapTo = null;
                }
                p.mapFrom = null;
            }
        }

        function enterMappingMode(unit, p) {
            mappingFrom = {
                unit,
                local: p.local,
                kind: p.kind
            };
            document.getElementById('mapBanner').classList.add('visible');
            document.getElementById('mapBannerText').innerHTML =
                'Re-asignando el puerto <b>' + oLabel(unit, p.local) + '</b> (' +
                (p.kind === 'cu' ? 'cobre' : 'fibra SFP') + ') — haz clic en el puerto <b>destino</b>\u2026';
            document.getElementById('panelDest').classList.add('map-target');
            closePopover();
            renderAll();
        }

        function exitMappingMode() {
            mappingFrom = null;
            document.getElementById('mapBanner').classList.remove('visible');
            document.getElementById('panelDest').classList.remove('map-target');
        }

        document.getElementById('btnCancelMap').addEventListener('click', () => {
            exitMappingMode();
            renderAll();
        });

        // ==========================================================
        // Popover
        // ==========================================================
        const popover = document.getElementById('popover');
        const popBody = document.getElementById('popBody');
        const popInfo = document.getElementById('popInfo');

        function openPopover(jackEl, p, side, unit) {
            if (selectedJack) selectedJack.classList.remove('selected');
            selectedJack = jackEl;
            jackEl.classList.add('selected');

            document.getElementById('popTitle').textContent =
                'Puerto ' + (side === 'o' ? oLabel(unit, p.local) : p.local) +
                (p.kind === 'sfp' ? ' (SFP)' : '') +
                ' \u2014 ' + (side === 'o' ? 'Origen' : 'Destino');

            popBody.innerHTML = '';
            const addBtn = (txt, colorKey, fn) => {
                const b = document.createElement('button');
                b.className = 'state-btn';
                const c = COLORS[colorKey];
                b.innerHTML = '<span class="dot" style="background:' + c.bg + ';border-color:' + c.bd + '"></span>' +
                    txt;
                b.addEventListener('click', fn);
                popBody.appendChild(b);
            };

            addBtn('Activo', 'active', () => setPortState(p, side, unit, 'active'));
            addBtn('Sin link', 'nolink', () => setPortState(p, side, unit, 'nolink'));
            addBtn('Deshabilitado', 'disabled', () => setPortState(p, side, unit, 'disabled'));
            if (side === 'o') addBtn('Re-asignar a\u2026', 'reassigned', () => enterMappingMode(unit, p));
            if (p.state === 'reassigned') {
                addBtn('Quitar re-asignaci\u00f3n', 'unset', () => setPortState(p, side, unit, 'unset'));
            } else if (p.state !== 'unset') {
                addBtn('Limpiar estado', 'unset', () => setPortState(p, side, unit, 'unset'));
            }

            popInfo.textContent = p.state === 'reassigned' ?
                (side === 'o' ?
                    'Mapeado al puerto ' + p.mapTo + ' del destino' :
                    'Recibe el puerto ' + oLabel(p.mapFrom.unit, p.mapFrom.local) + ' del origen') :
                'Estado actual: ' + COLORS[p.state].label +
                (side === 'o' && p.state === 'active' && p.kind === 'cu' ?
                    ' (se refleja autom\u00e1ticamente en el destino)' : '');

            const wrap = document.getElementById('app');
            const wrapRect = wrap.getBoundingClientRect();
            const jr = jackEl.getBoundingClientRect();
            let left = jr.left - wrapRect.left + jr.width / 2 - 117;
            let top = jr.bottom - wrapRect.top + 10;
            left = Math.max(8, Math.min(left, wrap.clientWidth - 245));
            popover.style.left = left + 'px';
            popover.style.top = top + 'px';
            popover.classList.add('visible');
        }

        function closePopover() {
            popover.classList.remove('visible');
            if (selectedJack) {
                selectedJack.classList.remove('selected');
                selectedJack = null;
            }
        }

        document.getElementById('popClose').addEventListener('click', closePopover);
        document.addEventListener('click', e => {
            if (!popover.contains(e.target)) closePopover();
        });
        document.addEventListener('keydown', e => {
            if (e.key === 'Escape') {
                closePopover();
                if (mappingFrom) {
                    exitMappingMode();
                    renderAll();
                }
            }
        });

        // ==========================================================
        // Líneas SVG
        // ==========================================================
        function drawLines() {
            const svg = document.getElementById('linesSvg');
            const wrap = document.getElementById('stackWrap');
            svg.setAttribute('width', wrap.clientWidth);
            svg.setAttribute('height', wrap.clientHeight);
            svg.innerHTML = '';
            const wr = wrap.getBoundingClientRect();

            // Bandas de bloque (stack): una sola conexión ancha por unidad
            // que indica el rango del destino; el orden se mantiene.
            if (state.origin.units > 1) {
                const destTop = document.getElementById('panelDest').getBoundingClientRect().top - wr.top;
                for (let u = 0; u < state.origin.units; u++) {
                    const start = u * state.origin.copperPerUnit + 1;
                    const end = start + state.origin.copperPerUnit - 1;
                    const panelEl = document.getElementById('panel-o-' + u);
                    const j1 = document.getElementById('jack-d-' + start);
                    const j2 = document.getElementById('jack-d-' + end);
                    if (!panelEl || !j1 || !j2) continue;
                    const pr = panelEl.getBoundingClientRect();
                    const r1 = j1.getBoundingClientRect(),
                        r2 = j2.getBoundingClientRect();
                    const x1 = pr.left - wr.left + pr.width / 2,
                        y1 = pr.bottom - wr.top;
                    const x2 = (r1.left + r2.left) / 2 - wr.left + r1.width / 2;
                    const midY = (y1 + destTop) / 2;
                    const path = document.createElementNS('http://www.w3.org/2000/svg', 'path');
                    path.setAttribute('d', `M ${x1} ${y1} C ${x1} ${midY}, ${x2} ${midY}, ${x2} ${destTop}`);
                    path.classList.add('band');
                    svg.appendChild(path);
                }
            }

            state.origin.ports.forEach((unitPorts, u) => {
                unitPorts.forEach(o => {
                    if (o.state !== 'reassigned' || o.mapTo == null) return;
                    const a = document.getElementById('jack-o-' + u + '-' + o.local);
                    const b = document.getElementById('jack-d-' + o.mapTo);
                    if (!a || !b) return;
                    const ar = a.getBoundingClientRect(),
                        br = b.getBoundingClientRect();
                    const x1 = ar.left - wr.left + ar.width / 2,
                        y1 = ar.bottom - wr.top;
                    const x2 = br.left - wr.left + br.width / 2,
                        y2 = br.top - wr.top;
                    const midY = (y1 + y2) / 2;
                    const path = document.createElementNS('http://www.w3.org/2000/svg', 'path');
                    path.setAttribute('d', `M ${x1} ${y1} C ${x1} ${midY}, ${x2} ${midY}, ${x2} ${y2}`);
                    path.dataset.pair = u + ':' + o.local + '-' + o.mapTo;
                    svg.appendChild(path);
                });
            });
        }

        function highlightLine(side, unit, p, on) {
            let pair = null;
            if (side === 'o' && p.mapTo != null) pair = unit + ':' + p.local + '-' + p.mapTo;
            if (side === 'd' && p.mapFrom) pair = p.mapFrom.unit + ':' + p.mapFrom.local + '-' + p.local;
            if (!pair) return;
            document.querySelectorAll('#linesSvg path').forEach(path => {
                if (path.dataset.pair === pair) path.classList.toggle('hl', on);
            });
        }

        window.addEventListener('resize', drawLines);

        // ==========================================================
        // Configuración y metadatos
        // ==========================================================
        document.getElementById('btnApply').addEventListener('click', () => {
            const oType = document.getElementById('selOriginType').value;
            const oFiber = parseInt(document.getElementById('selOriginFiber').value);
            const dCopper = parseInt(document.getElementById('selDestType').value);
            const dFiber = parseInt(document.getElementById('selDestFiber').value);

            const oUnits = oType === '2x24' ? 2 : 1;
            const oCopperTotal = (oType === '2x24' ? 24 : parseInt(oType)) * oUnits;
            const oFiberTotal = oFiber * oUnits;

            if (dCopper < oCopperTotal) {
                alert('El destino debe tener igual o m\u00e1s puertos de cobre que el origen (' +
                    oCopperTotal + ' vs ' + dCopper + ').');
                return;
            }
            if (dFiber < oFiberTotal &&
                !confirm('El destino tiene menos puertos de fibra (' + dFiber + ') que el origen (' +
                    oFiberTotal + ').\nAlgunas fibras no podr\u00e1n mapearse 1 a 1. \u00bfContinuar?')) return;
            if (state && !confirm('Esto reinicia el mapeo actual. \u00bfContinuar?')) return;

            const meta = grabMeta();
            exitMappingMode();
            state = newState(oType, oFiber, dCopper, dFiber);
            applyMeta(meta);
            syncSerial2Visibility();
            renderAll();
        });

        function grabMeta() {
            return {
                ip: document.getElementById('inpIp').value,
                om: document.getElementById('inpOriginModel').value,
                os1: document.getElementById('inpOriginSerial1').value,
                os2: document.getElementById('inpOriginSerial2').value,
                dm: document.getElementById('inpDestModel').value,
                ds: document.getElementById('inpDestSerial').value,
            };
        }

        function applyMeta(m) {
            state.ip = m.ip;
            state.origin.model = m.om;
            state.origin.serials = [m.os1, m.os2];
            state.dest.model = m.dm;
            state.dest.serial = m.ds;
        }

        function syncSerial2Visibility() {
            const show = state.origin.units > 1;
            document.getElementById('lblSerial1').textContent = show ? 'Serial 1:' : 'Serial:';
            document.getElementById('lblSerial2').style.display = show ? '' : 'none';
            document.getElementById('inpOriginSerial2').style.display = show ? '' : 'none';
        }

        // Los inputs de metadatos actualizan el estado en vivo (sin reiniciar el mapeo)
        ['inpIp', 'inpOriginModel', 'inpOriginSerial1', 'inpOriginSerial2', 'inpDestModel', 'inpDestSerial']
        .forEach(id => document.getElementById(id).addEventListener('input', () => {
            applyMeta(grabMeta());
            updateTitles();
        }));

        // ==========================================================
        // Guardar / Cargar JSON
        // ==========================================================
        document.getElementById('btnSave').addEventListener('click', () => {
            const blob = new Blob([JSON.stringify(state, null, 2)], {
                type: 'application/json'
            });
            triggerDownload(URL.createObjectURL(blob), 'mapeo-puertos.json');
        });

        document.getElementById('btnLoad').addEventListener('click', () => document.getElementById('fileLoad').click());
        document.getElementById('fileLoad').addEventListener('change', e => {
            const f = e.target.files[0];
            if (!f) return;
            const r = new FileReader();
            r.onload = () => {
                try {
                    const s = JSON.parse(r.result);
                    if (!s.origin || !s.dest || !s.origin.ports) throw new Error('formato');
                    state = s;
                    document.getElementById('selOriginType').value = s.origin.type;
                    document.getElementById('selOriginFiber').value = s.origin.fiber;
                    document.getElementById('selDestType').value = s.dest.copper;
                    document.getElementById('selDestFiber').value = s.dest.fiber;
                    document.getElementById('inpIp').value = s.ip || '';
                    document.getElementById('inpOriginModel').value = s.origin.model || '';
                    document.getElementById('inpOriginSerial1').value = s.origin.serials[0] || '';
                    document.getElementById('inpOriginSerial2').value = s.origin.serials[1] || '';
                    document.getElementById('inpDestModel').value = s.dest.model || '';
                    document.getElementById('inpDestSerial').value = s.dest.serial || '';
                    exitMappingMode();
                    syncSerial2Visibility();
                    renderAll();
                } catch {
                    alert('El archivo no es un JSON de mapeo v\u00e1lido.');
                }
            };
            r.readAsText(f);
            e.target.value = '';
        });

        function triggerDownload(url, name) {
            const a = document.createElement('a');
            a.href = url;
            a.download = name;
            document.body.appendChild(a);
            a.click();
            a.remove();
        }

        // ==========================================================
        // Exportar PNG (canvas nativo, offline)
        // ==========================================================
        document.getElementById('btnPng').addEventListener('click', exportPNG);

        const JW = 34,
            JH = 32,
            SFPH = 22,
            GAP = 8,
            BLOCK_GAP = 22,
            FIBER_GAP = 18,
            NUMH = 16,
            PPAD = 20;

        function panelDims(copper, fiber) {
            const cols = copper / 2;
            const blocks = Math.ceil(cols / 8);
            let w = cols * (JW + GAP) - GAP + (blocks - 1) * BLOCK_GAP;
            if (fiber) w += FIBER_GAP + (fiber / 2) * (JW + GAP) - GAP;
            return {
                w: w + PPAD * 2,
                h: NUMH * 2 + JH * 2 + 6 + PPAD * 2 + 30
            };
        }

        function exportPNG() {
            const SCALE = 2,
                MARGIN = 40,
                UNIT_GAP = 24,
                LINES_H = 110;
            const o = state.origin,
                d = state.dest;

            const oDim = panelDims(o.copperPerUnit, o.fiber);
            const dDim = panelDims(d.copper, d.fiber);
            const originRowW = oDim.w * o.units + UNIT_GAP * (o.units - 1);
            const W = Math.max(originRowW, dDim.w) + MARGIN * 2;

            const maps = [];
            o.ports.forEach((up, u) => up.forEach(p => {
                if (p.state === 'reassigned' && p.mapTo != null) maps.push({
                    u,
                    local: p.local,
                    to: p.mapTo
                });
            }));
            const blockNotes = [];
            if (o.units > 1) {
                for (let u = 0; u < o.units; u++) {
                    const start = u * o.copperPerUnit + 1,
                        end = start + o.copperPerUnit - 1;
                    blockNotes.push('Switch ' + (u + 1) + ': puertos 1\u2013' + o.copperPerUnit +
                        ' \u2192 ' + start + '\u2013' + end + ' del destino (el orden se mantiene)');
                }
            }
            const listH = (maps.length || blockNotes.length) ?
                55 + blockNotes.length * 20 + (maps.length ? 24 + Math.ceil(maps.length / 4) * 22 : 0) :
                0;
            const headerH = 95;
            const H = headerH + oDim.h + LINES_H + dDim.h + 60 + listH + MARGIN;

            const cv = document.createElement('canvas');
            cv.width = W * SCALE;
            cv.height = H * SCALE;
            const ctx = cv.getContext('2d');
            ctx.scale(SCALE, SCALE);
            ctx.fillStyle = '#fff';
            ctx.fillRect(0, 0, W, H);

            // Encabezado con metadatos
            ctx.fillStyle = '#222';
            ctx.font = 'bold 18px Arial';
            ctx.fillText('Mapeo de puertos \u2014 Switch origen \u2192 destino', MARGIN, 34);
            ctx.font = '12px Arial';
            ctx.fillStyle = '#666';
            const meta1 = ['Generado: ' + new Date().toLocaleString(), state.ip ? 'IP (se conserva): ' + state.ip : '']
                .filter(Boolean).join('   |   ');
            const oSer = o.units > 1 ?
                'S/N: ' + (o.serials[0] || '\u2014') + ' / ' + (o.serials[1] || '\u2014') :
                'S/N: ' + (o.serials[0] || '\u2014');
            const meta2 = 'Origen: ' + (o.model || '\u2014') + '  (' + oSer + ')' +
                '     Destino: ' + (d.model || '\u2014') + '  (S/N: ' + (d.serial || '\u2014') + ')';
            ctx.fillText(meta1, MARGIN, 56);
            ctx.fillText(meta2, MARGIN, 74);

            const portPos = {};

            function drawPanel(ports, label, x0, y0, dims, keyPrefix) {
                ctx.strokeStyle = '#e0e2e6';
                ctx.fillStyle = '#fafafa';
                ctx.lineWidth = 1;
                roundRect(ctx, x0, y0, dims.w, dims.h, 8);
                ctx.fill();
                ctx.stroke();
                ctx.fillStyle = '#222';
                ctx.font = 'bold 12px Arial';
                ctx.fillText(label, x0 + PPAD, y0 + 20);

                const cu = ports.filter(p => p.kind === 'cu');
                const fi = ports.filter(p => p.kind === 'sfp');
                const yTop = y0 + 34 + NUMH,
                    yBot = yTop + JH + 6;
                let x = x0 + PPAD;

                for (let c = 0; c < cu.length / 2; c++) {
                    if (c > 0 && c % 8 === 0) x += BLOCK_GAP;
                    drawPair(cu[c * 2], cu[c * 2 + 1], x, yTop, yBot, keyPrefix);
                    x += JW + GAP;
                }
                if (fi.length) {
                    x += FIBER_GAP - GAP;
                    ctx.strokeStyle = '#e0e2e6';
                    ctx.beginPath();
                    ctx.moveTo(x - FIBER_GAP / 2, y0 + 30);
                    ctx.lineTo(x - FIBER_GAP / 2, y0 + dims.h - 14);
                    ctx.stroke();
                    for (let c = 0; c < fi.length / 2; c++) {
                        drawPair(fi[c * 2], fi[c * 2 + 1], x, yTop, yBot, keyPrefix);
                        x += JW + GAP;
                    }
                }
            }

            function drawPair(odd, even, x, yTop, yBot, keyPrefix) {
                ctx.font = '10px Arial';
                ctx.fillStyle = '#444';
                ctx.textAlign = 'center';
                ctx.fillText(odd.local, x + JW / 2, yTop - 5);
                drawJack(odd, x, yTop, keyPrefix);
                if (even) {
                    drawJack(even, x, yBot, keyPrefix);
                    ctx.fillStyle = '#444';
                    ctx.fillText(even.local, x + JW / 2, yBot + JH + 12);
                }
                ctx.textAlign = 'left';
                portPos[keyPrefix + odd.local] = {
                    x,
                    y: yTop
                };
                if (even) portPos[keyPrefix + even.local] = {
                    x,
                    y: yBot
                };
            }

            function drawJack(p, x, y, keyPrefix) {
                const c = COLORS[p.state];
                const h = p.kind === 'sfp' ? SFPH : JH;
                const yAdj = p.kind === 'sfp' ? y + (JH - SFPH) / 2 : y;
                ctx.fillStyle = c.bg;
                ctx.strokeStyle = c.bd;
                ctx.lineWidth = 1.5;
                roundRect(ctx, x, yAdj, JW, h, p.kind === 'sfp' ? 3 : 5);
                ctx.fill();
                ctx.stroke();
                if (p.state === 'reassigned') {
                    ctx.fillStyle = '#7a5410';
                    ctx.font = 'bold 9px Arial';
                    ctx.textAlign = 'center';
                    const txt = keyPrefix.startsWith('o') ? '\u2192' + p.mapTo : oLabel(p.mapFrom.unit, p.mapFrom.local);
                    ctx.fillText(txt, x + JW / 2, yAdj + h / 2 + 3.5);
                    ctx.textAlign = 'left';
                }
                ctx.lineWidth = 1;
            }

            // Paneles origen (lado a lado, centrados)
            const yOrigin = headerH;
            const unitX = [];
            let ox = MARGIN + (W - MARGIN * 2 - originRowW) / 2;
            for (let u = 0; u < o.units; u++) {
                const lbl = 'SWITCH ORIGEN' + (o.units > 1 ? ' ' + (u + 1) : '') +
                    ' (' + o.copperPerUnit + (o.fiber ? ' + ' + o.fiber + ' SFP' : '') + ')';
                unitX.push(ox);
                drawPanel(o.ports[u], lbl, ox, yOrigin, oDim, 'o' + u + '-');
                ox += oDim.w + UNIT_GAP;
            }

            // Panel destino centrado
            const yDest = yOrigin + oDim.h + LINES_H;
            const dx = MARGIN + (W - MARGIN * 2 - dDim.w) / 2;
            drawPanel(d.ports, 'SWITCH DESTINO (' + d.copper + (d.fiber ? ' + ' + d.fiber + ' SFP' : '') + ')', dx, yDest,
                dDim, 'd-');

            // Bandas de bloque (stack): una conexión ancha por unidad
            if (o.units > 1) {
                ctx.strokeStyle = '#7fb84e';
                ctx.lineWidth = 12;
                ctx.globalAlpha = .28;
                for (let u = 0; u < o.units; u++) {
                    const start = u * o.copperPerUnit + 1,
                        end = start + o.copperPerUnit - 1;
                    const p1 = portPos['d-' + start],
                        p2 = portPos['d-' + end];
                    if (!p1 || !p2) continue;
                    const x1 = unitX[u] + oDim.w / 2,
                        y1 = yOrigin + oDim.h;
                    const x2 = (p1.x + p2.x) / 2 + JW / 2,
                        y2 = yDest;
                    const midY = (y1 + y2) / 2;
                    ctx.beginPath();
                    ctx.moveTo(x1, y1);
                    ctx.bezierCurveTo(x1, midY, x2, midY, x2, y2);
                    ctx.stroke();
                }
                ctx.globalAlpha = 1;
                ctx.lineWidth = 1;
                // Nota bajo cada panel origen
                ctx.fillStyle = '#3d6320';
                ctx.font = '11px Arial';
                for (let u = 0; u < o.units; u++) {
                    const start = u * o.copperPerUnit + 1,
                        end = start + o.copperPerUnit - 1;
                    const re = o.ports[u].filter(p => p.state === 'reassigned').length;
                    ctx.fillText('\u2192 Destino ' + start + '\u2013' + end + ' \u00b7 el orden se mantiene' +
                        (re ? ' (excepto ' + re + ' re-asignado' + (re > 1 ? 's' : '') + ')' : ''),
                        unitX[u] + PPAD, yOrigin + oDim.h + 16);
                }
            }

            // Líneas de mapeo
            ctx.strokeStyle = '#e0a83c';
            ctx.lineWidth = 2;
            ctx.globalAlpha = .85;
            maps.forEach(m => {
                const a = portPos['o' + m.u + '-' + m.local],
                    b = portPos['d-' + m.to];
                if (!a || !b) return;
                const x1 = a.x + JW / 2,
                    y1 = a.y + JH;
                const x2 = b.x + JW / 2,
                    y2 = b.y;
                const midY = (y1 + y2) / 2;
                ctx.beginPath();
                ctx.moveTo(x1, y1);
                ctx.bezierCurveTo(x1, midY, x2, midY, x2, y2);
                ctx.stroke();
            });
            ctx.globalAlpha = 1;
            ctx.lineWidth = 1;

            // Leyenda
            let lx = MARGIN,
                ly = yDest + dDim.h + 30;
            ctx.font = '12px Arial';
            Object.values(COLORS).forEach(c => {
                ctx.fillStyle = c.bg;
                ctx.strokeStyle = c.bd;
                roundRect(ctx, lx, ly - 10, 12, 12, 3);
                ctx.fill();
                ctx.stroke();
                ctx.fillStyle = '#444';
                ctx.fillText(c.label, lx + 17, ly);
                lx += 17 + ctx.measureText(c.label).width + 22;
            });

            // Resumen del mapeo: notas de bloque + re-asignaciones
            if (maps.length || blockNotes.length) {
                ly += 32;
                ctx.fillStyle = '#222';
                ctx.font = 'bold 13px Arial';
                ctx.fillText('Resumen del mapeo:', MARGIN, ly);
                ctx.font = '12px Arial';
                ctx.fillStyle = '#3d6320';
                blockNotes.forEach((t, i) => ctx.fillText('\u2022 ' + t, MARGIN, ly + 20 + i * 20));
                if (maps.length) {
                    const baseY = ly + 20 + blockNotes.length * 20 + (blockNotes.length ? 6 : 0);
                    ctx.fillStyle = '#7a5410';
                    ctx.font = 'bold 12px Arial';
                    ctx.fillText('Re-asignaciones (' + maps.length + '):', MARGIN, baseY);
                    ctx.font = '12px Arial';
                    ctx.fillStyle = '#444';
                    maps.forEach((m, i) => {
                        const col = i % 4,
                            row = Math.floor(i / 4);
                        ctx.fillText('Puerto ' + oLabel(m.u, m.local) + ' \u2192 ' + m.to, MARGIN + col * 170,
                            baseY + 18 + row * 22);
                    });
                }
            }

            triggerDownload(cv.toDataURL('image/png'), 'mapeo-puertos.png');
        }

        function roundRect(ctx, x, y, w, h, r) {
            ctx.beginPath();
            ctx.moveTo(x + r, y);
            ctx.arcTo(x + w, y, x + w, y + h, r);
            ctx.arcTo(x + w, y + h, x, y + h, r);
            ctx.arcTo(x, y + h, x, y, r);
            ctx.arcTo(x, y, x + w, y, r);
            ctx.closePath();
        }

        // ==========================================================
        // Inicio
        // ==========================================================
        state = newState('48', 4, 48, 4);
        syncSerial2Visibility();
        renderAll();
    </script>
@endpush
