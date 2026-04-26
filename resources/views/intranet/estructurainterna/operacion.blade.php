@extends('layouts.intranet')

@section('title', 'Puestos de Trabajo')

@push('css')
    <link href="/assets/css/intrahome.css" rel="stylesheet">
@endpush

@section('content')

    {{-- ── Breadcrumb ── --}}
    <div class="bg-white border-b border-gray-200">
        <div class="container mx-auto px-4 py-3">
            <nav class="flex" aria-label="Breadcrumb">
                <ol class="inline-flex items-center space-x-1 md:space-x-3">
                    <li class="inline-flex items-center">
                        <a href="{{ route('bienvenido') }}"
                            class="inline-flex items-center text-sm text-gray-600 hover:text-orange-600">
                            <i class="fas fa-home mr-2"></i> Home
                        </a>
                    </li>
                    <li>
                        <div class="flex items-center">
                            <i class="fas fa-chevron-right text-gray-400 mx-2"></i>
                            <a href="{{ route('intranet.index') }}"
                                class="ml-1 text-sm text-gray-600 hover:text-orange-600 md:ml-2">Intranet</a>
                        </div>
                    </li>
                    <li aria-current="page">
                        <div class="flex items-center">
                            <i class="fas fa-chevron-right text-gray-400 mx-2"></i>
                            <span class="ml-1 text-sm text-orange-600 font-medium md:ml-2">Puestos de Trabajo</span>
                        </div>
                    </li>
                </ol>
            </nav>
        </div>
    </div>

    <div class="px-6 py-7" x-data="puestosApp()">

        {{-- ── Hero ── --}}
        {{-- <div class="puestos-hero">
            <div class="hero-inner">
                <div class="hero-top">
                    <div>
                        <h1 class="hero-title">Puestos de <span>Trabajo</span></h1>
                        <p class="hero-desc">
                            Consulta la descripción, responsabilidades, habilidades y relaciones
                            clave de cada puesto dentro de la organización.
                        </p>
                    </div>
                    <div class="hero-pill">
                        <span class="big">10</span>
                        <div>
                            <div class="small" style="color:rgba(255,255,255,.8);font-weight:600">puestos</div>
                            <div class="small">registrados</div>
                        </div>
                    </div>
                </div>
                <div class="hero-stats">
                    <div class="hero-stat">
                        <div class="num">4</div>
                        <div class="lbl">Áreas</div>
                    </div>
                    <div class="hero-sep"></div>
                    <div class="hero-stat">
                        <div class="num">10</div>
                        <div class="lbl">Roles definidos</div>
                    </div>
                    <div class="hero-sep"></div>
                    <div class="hero-stat">
                        <div class="num">Activo</div>
                        <div class="lbl">Estado</div>
                    </div>
                </div>
            </div>
        </div> --}}

        <div class="biblioteca-hero">
            <div class="hero-inner">
                <div class="hero-top">
                    <div>
                        <h1 class="hero-title">Puestos de <span>Trabajo</span></h1>
                        <p class="hero-desc">
                            Consulta la descripción, responsabilidades, habilidades y relaciones
                            clave de cada puesto dentro de la organización.
                        </p>
                    </div>
                    <div class="hero-pill">
                        <span class="big">10</span>
                        <div>
                            <div class="small" style="color:rgba(255,255,255,.8);font-weight:600">puestos</div>
                            <div class="small">registrados</div>
                        </div>
                    </div>
                </div>
                <div class="hero-stats">
                    <div class="hero-stat">
                        <div class="num">4</div>
                        <div class="lbl">Áreas</div>
                    </div>
                    <div class="hero-sep"></div>
                    <div class="hero-stat">
                        <div class="num">10</div>
                        <div class="lbl">Roles definidos</div>
                    </div>
                    <div class="hero-sep"></div>
                    <div class="hero-stat">
                        <div class="num">Activo</div>
                        <div class="lbl">Estado</div>
                    </div>
                </div>
            </div>
        </div>

        {{-- ── Toolbar ── --}}
        <div class="toolbar">
            <div class="search-wrap">
                <i class="fas fa-search"></i>
                <input type="text" x-model="search" placeholder="Buscar puesto..." class="search-input">
            </div>
            {{-- <select x-model="filterArea" class="filter-select">
                <option value="">Todas las áreas</option>
                @foreach ($areas as $area)
                    <option value="{{ $area->id }}">{{ $area->nombre }}</option>
                @endforeach
            </select> --}}
            <select x-model="filterArea" class="filter-select">
                <option value="">Todas las áreas</option>
                <option value="1">PMO</option>
                <option value="2">Ingeniería</option>
                <option value="3">Soporte</option>
            </select>
            <span class="results-label" x-text="filtrados.length + ' resultado(s)'"></span>
            <div class="view-toggle">
                <button class="vt-btn" :class="vista === 'grid' && 'on'" @click="vista='grid'" title="Cuadrícula">
                    <i class="las la-th-large"></i>
                </button>
                <button class="vt-btn" :class="vista === 'list' && 'on'" @click="vista='list'" title="Lista">
                    <i class="las la-list"></i>
                </button>
            </div>
        </div>

        {{-- ── VISTA GRID ── --}}
        <div x-show="vista === 'grid'" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
            <template x-for="puesto in filtrados" :key="puesto.id">
                <div class="puesto-card" @click="abrirModal(puesto)">
                    <div class="stripe" :style="`background:${puesto.area_color}`"></div>
                    <div class="card-top">
                        <div class="puesto-avatar" :style="`background:${puesto.area_color}18; color:${puesto.area_color}`">
                            <i :class="puesto.area_icon"></i>
                        </div>
                        <span class="area-badge" :style="`background:${puesto.area_color}18; color:${puesto.area_color}`"
                            x-text="puesto.area_nombre"></span>
                    </div>
                    <p class="puesto-name" x-text="puesto.nombre"></p>
                    <p class="puesto-objetivo" x-text="puesto.objetivo"></p>
                    <div class="card-footer">
                        <div class="skills-preview">
                            <template x-for="skill in puesto.habilidades.slice(0,3)" :key="skill">
                                <span class="skill-chip" x-text="skill"></span>
                            </template>
                            <span x-show="puesto.habilidades.length > 3" class="skill-chip"
                                x-text="'+' + (puesto.habilidades.length - 3)"></span>
                        </div>
                        <span class="card-cta">Ver más <i class="las la-arrow-right"></i></span>
                    </div>
                </div>
            </template>

            {{-- Empty state grid --}}
            <div x-show="filtrados.length === 0" class="col-span-full text-center py-14 text-gray-400">
                <i class="las la-search text-4xl block mb-2"></i>
                <p class="text-sm">No se encontraron puestos con ese criterio.</p>
            </div>
        </div>

        {{-- ── VISTA LIST ── --}}
        <div x-show="vista === 'list'" class="flex flex-col rounded-xl overflow-hidden border border-gray-200">
            <template x-for="puesto in filtrados" :key="puesto.id">
                <div class="puesto-list-row" @click="abrirModal(puesto)">
                    <div class="puesto-avatar"
                        :style="`background:${puesto.area_color}18; color:${puesto.area_color}; width:38px; height:38px; border-radius:10px; flex-shrink:0`">
                        <i :class="puesto.area_icon"></i>
                    </div>
                    <div class="flex-1 min-w-0">
                        <p class="font-semibold text-sm text-gray-800 truncate" x-text="puesto.nombre"></p>
                        <p class="text-xs text-gray-400 truncate" x-text="puesto.objetivo"></p>
                    </div>
                    <span class="area-badge hidden sm:inline-block"
                        :style="`background:${puesto.area_color}18; color:${puesto.area_color}`"
                        x-text="puesto.area_nombre"></span>
                    <span class="text-xs text-gray-400 hidden md:block min-w-[80px] text-right"
                        x-text="puesto.habilidades.length + ' habilidades'"></span>
                    <i class="las la-angle-right text-gray-300 text-sm"></i>
                </div>
            </template>
            <div x-show="filtrados.length === 0" class="text-center py-10 text-gray-400 text-sm bg-white">
                No se encontraron puestos.
            </div>
        </div>

        {{-- MODAL DETALLE DE PUESTO --}}
        <div x-show="showModal" x-transition:enter="transition ease-out duration-150"
            x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
            x-transition:leave="transition ease-in duration-100" x-transition:leave-start="opacity-100"
            x-transition:leave-end="opacity-0" class="modal-backdrop" @click.self="cerrarModal" x-cloak>
            <div class="modal-box" x-transition:enter="transition ease-out duration-150"
                x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100">
                {{-- Header --}}
                <div class="modal-head">
                    <div class="modal-avatar"
                        :style="`background:${selected?.area_color}18; color:${selected?.area_color}`">
                        <i :class="selected?.area_icon"></i>
                    </div>
                    <div class="modal-head-info">
                        <p class="modal-puesto-name" x-text="selected?.nombre"></p>
                        <div class="flex items-center gap-2 flex-wrap">
                            <span class="area-badge"
                                :style="`background:${selected?.area_color}18; color:${selected?.area_color}`"
                                x-text="selected?.area_nombre"></span>
                            <span class="text-xs text-gray-400 flex items-center gap-1">
                                <i class="las la-star" :style="`color:${selected?.area_color}`"></i>
                                <span x-text="(selected?.habilidades?.length ?? 0) + ' habilidades'"></span>
                            </span>
                            <span class="text-xs text-gray-400 flex items-center gap-1">
                                <i class="las la-tasks" :style="`color:${selected?.area_color}`"></i>
                                <span x-text="(selected?.responsabilidades?.length ?? 0) + ' responsabilidades'"></span>
                            </span>
                        </div>
                    </div>
                    <button class="modal-close" @click="cerrarModal">
                        <i class="las la-times"></i>
                    </button>
                </div>
                {{-- Tabs --}}
                <div class="modal-tabs-wrap">
                    <button class="modal-tab" :class="tab === 'objetivo' && 'on'" @click="tab='objetivo'">
                        <i class="las la-bullseye mr-1"></i> Objetivo
                    </button>
                    <button class="modal-tab" :class="tab === 'responsabilidades' && 'on'"
                        @click="tab='responsabilidades'">
                        <i class="las la-tasks mr-1"></i> Responsabilidades
                        <span class="ml-1 text-xs text-gray-400"
                            x-text="'(' + (selected?.responsabilidades?.length ?? 0) + ')'"></span>
                    </button>
                    <button class="modal-tab" :class="tab === 'habilidades' && 'on'" @click="tab='habilidades'">
                        <i class="las la-star mr-1"></i> Habilidades
                        <span class="ml-1 text-xs text-gray-400"
                            x-text="'(' + (selected?.habilidades?.length ?? 0) + ')'"></span>
                    </button>
                    <button class="modal-tab" :class="tab === 'relaciones' && 'on'" @click="tab='relaciones'">
                        <i class="las la-project-diagram mr-1"></i> Relaciones Clave
                        <span class="ml-1 text-xs text-gray-400"
                            x-text="'(' + (selected?.relaciones?.length ?? 0) + ')'"></span>
                    </button>
                </div>
                {{-- Body --}}
                <div class="modal-body">
                    {{-- ── Objetivo ── --}}
                    <div class="tab-pane" :class="tab === 'objetivo' && 'on'">
                        <div class="detail-section">
                            <p class="detail-section-title">
                                <i class="las la-bullseye"></i> Objetivo del Puesto
                            </p>
                            <p class="objetivo-text" x-text="selected?.objetivo"></p>
                        </div>
                        {{-- Mini resumen de las otras secciones --}}
                        <div class="grid grid-cols-3 gap-3 mt-4">
                            <div class="text-center p-3 bg-gray-50 rounded-xl border border-gray-100">
                                <p class="text-xl font-bold text-gray-800"
                                    x-text="selected?.responsabilidades?.length ?? 0"></p>
                                <p class="text-xs text-gray-400 mt-1">Responsabilidades</p>
                            </div>
                            <div class="text-center p-3 bg-gray-50 rounded-xl border border-gray-100">
                                <p class="text-xl font-bold text-gray-800" x-text="selected?.habilidades?.length ?? 0">
                                </p>
                                <p class="text-xs text-gray-400 mt-1">Habilidades</p>
                            </div>
                            <div class="text-center p-3 bg-gray-50 rounded-xl border border-gray-100">
                                <p class="text-xl font-bold text-gray-800" x-text="selected?.relaciones?.length ?? 0"></p>
                                <p class="text-xs text-gray-400 mt-1">Relaciones clave</p>
                            </div>
                        </div>
                    </div>
                    {{-- ── Responsabilidades ── --}}
                    <div class="tab-pane" :class="tab === 'responsabilidades' && 'on'">
                        <div class="detail-section">
                            <p class="detail-section-title">
                                <i class="las la-tasks"></i> Responsabilidades Principales
                            </p>
                            <ul class="resp-list">
                                <template x-for="(resp, i) in (selected?.responsabilidades ?? [])" :key="i">
                                    <li x-text="resp"></li>
                                </template>
                            </ul>
                            <div x-show="!selected?.responsabilidades?.length"
                                class="text-center py-6 text-gray-400 text-sm">
                                Sin responsabilidades registradas.
                            </div>
                        </div>
                    </div>
                    {{-- ── Habilidades ── --}}
                    <div class="tab-pane" :class="tab === 'habilidades' && 'on'">
                        <div class="detail-section">
                            <p class="detail-section-title">
                                <i class="las la-star"></i> Habilidades Técnicas
                            </p>
                            <div class="skills-grid">
                                <template x-for="(skill, i) in (selected?.habilidades_tecnicas ?? [])"
                                    :key="i">
                                    <span class="skill-tag">
                                        <i class="las la-code"></i>
                                        <span x-text="skill"></span>
                                    </span>
                                </template>
                            </div>
                            <div x-show="!selected?.habilidades_tecnicas?.length" class="text-sm text-gray-400 py-2">Sin
                                habilidades técnicas registradas.</div>
                        </div>
                        <div class="detail-section">
                            <p class="detail-section-title">
                                <i class="las la-brain"></i> Competencias Blandas
                            </p>
                            <div class="skills-grid">
                                <template x-for="(comp, i) in (selected?.competencias ?? [])" :key="i">
                                    <span class="skill-tag"
                                        style="background:#e8f5e9; color:#15803d; border-color:rgba(21,128,61,.2)">
                                        <i class="las la-check-circle"></i>
                                        <span x-text="comp"></span>
                                    </span>
                                </template>
                            </div>
                            <div x-show="!selected?.competencias?.length" class="text-sm text-gray-400 py-2">Sin
                                competencias registradas.</div>
                        </div>
                    </div>
                    {{-- ── Relaciones Clave ── --}}
                    <div class="tab-pane" :class="tab === 'relaciones' && 'on'">
                        <div class="detail-section">
                            <p class="detail-section-title">
                                <i class="las la-project-diagram"></i> Relaciones Clave
                            </p>
                            <div class="relaciones-grid">
                                <template x-for="(rel, i) in (selected?.relaciones ?? [])" :key="i">
                                    <div class="relacion-item">
                                        <i :class="rel.tipo === 'interno' ? 'las la-users' : 'las la-building'"></i>
                                        <div>
                                            <p class="relacion-tipo" x-text="rel.tipo"></p>
                                            <p class="relacion-nombre" x-text="rel.nombre"></p>
                                        </div>
                                    </div>
                                </template>
                            </div>
                            <div x-show="!selected?.relaciones?.length" class="text-center py-6 text-gray-400 text-sm">
                                Sin relaciones clave registradas.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@push('js')
    <script>
        function puestosApp() {
            return {
                vista: 'grid',
                search: '',
                filterArea: '',
                showModal: false,
                tab: 'objetivo',
                selected: null,

                /*
                 * Datos desde el controlador.
                 * El controlador debe pasar $puestosFormatted con esta estructura:
                 *
                 * [
                 *   'id'                 => $puesto->id,
                 *   'nombre'             => $puesto->nombre,
                 *   'objetivo'           => $puesto->objetivo,
                 *   'area_id'            => $puesto->area_id,
                 *   'area_nombre'        => $puesto->area->nombre,
                 *   'area_color'         => $puesto->area->color,   // ej: '#3b82f6'
                 *   'area_icon'          => $puesto->area->icon,    // ej: 'las la-terminal'
                 *   'responsabilidades'  => $puesto->responsabilidades->pluck('descripcion')->toArray(),
                 *   'habilidades'        => $puesto->habilidades->pluck('nombre')->toArray(),  // todas para la preview
                 *   'habilidades_tecnicas' => $puesto->habilidades->where('tipo','tecnica')->pluck('nombre')->toArray(),
                 *   'competencias'       => $puesto->habilidades->where('tipo','blanda')->pluck('nombre')->toArray(),
                 *   'relaciones'         => $puesto->relaciones->map(fn($r) => [
                 *                              'nombre' => $r->nombre,
                 *                              'tipo'   => $r->tipo,  // 'interno' | 'externo'
                 *                          ])->toArray(),
                 * ]
                 */
                puestos: [{
                        id: 1,
                        nombre: 'Project Manager',
                        objetivo: 'Planificar, coordinar, supervisar y controlar los proyectos de implementación de servicios de ciberseguridad y redes, asegurando el cumplimiento de los tiempos, presupuestos, calidad, alcances y satisfacción del cliente, conforme a las buenas prácticas de gestión de proyectos (PMI, ITIL o equivalente).',
                        area_id: 1,
                        area_nombre: 'PMO',
                        area_color: '#f97316',
                        area_icon: 'las la-clipboard',

                        responsabilidades: [
                            'Liderar y coordinar todas las fases del proyecto desde la planeación hasta la entrega.',
                            'Elaborar y gestionar planes de trabajo, cronogramas, matrices de riesgos y reportes de avance.',
                            'Coordinar equipos',
                            'Asegurar la correcta implementación de soluciones de ciberseguridad y redes (LAN/WAN, Wi-Fi,Firewalls, VPN, etc.).',
                            'Gestionar la comunicación efectiva entre clientes, áreas técnicas, proveedores y demás partes interesadas.',
                            'Validar entregables técnicos con base en los SOW, SLA, y requerimientos del cliente.',
                            'Controlar y optimizar los recursos asignados al proyecto.',
                            'Reportar avances',
                            'Cerrar proyecto'
                        ],

                        habilidades: ['MS Project', 'Jira', 'Scrum', 'Gestión de riesgos', 'Comunicación'],

                        habilidades_tecnicas: [
                            'MS Project',
                            'Jira',
                            'Scrum'
                        ],

                        competencias: [
                            'Liderazgo y toma de decisiones',
                            'Organización y planeación estratégica.',
                            'Comunicación efectiva',
                            'Capacidad de negociación y resolución de conflictos.',
                            'Orientación a resultados y enfoque al cliente.',
                            'Trabajo en equipo'
                        ],

                        relaciones: [{
                                nombre: 'Área técnica',
                                tipo: 'interno'
                            },
                            {
                                nombre: 'Compras',
                                tipo: 'interno'
                            },
                            {
                                nombre: 'Soporte',
                                tipo: 'interno'
                            },
                            {
                                nombre: 'Preventa',
                                tipo: 'interno'
                            },
                            {
                                nombre: 'Dirección',
                                tipo: 'interno'
                            },
                            {
                                nombre: 'Stakeholders',
                                tipo: 'externo'
                            },
                            {
                                nombre: 'Clientes',
                                tipo: 'externo'
                            },
                            {
                                nombre: 'Proveedores',
                                tipo: 'externo'
                            },
                        ]
                    },

                    {
                        id: 2,
                        nombre: 'Ingeniero de Redes',
                        objetivo: 'Diseñar, implementar y mantener la infraestructura de red de la organización.',
                        area_id: 2,
                        area_nombre: 'Ingeniería',
                        area_color: '#3b82f6',
                        area_icon: 'las la-network-wired',

                        responsabilidades: [
                            'Configurar routers y switches',
                            'Administrar firewalls',
                            'Monitorear red',
                            'Resolver incidentes',
                            'Optimizar rendimiento'
                        ],

                        habilidades: ['Cisco IOS', 'Fortinet', 'BGP', 'OSPF', 'Networking'],

                        habilidades_tecnicas: [
                            'Cisco IOS',
                            'Fortinet',
                            'BGP',
                            'OSPF'
                        ],

                        competencias: [
                            'Pensamiento analítico',
                            'Resolución de problemas'
                        ],

                        relaciones: [{
                                nombre: 'Soporte TI',
                                tipo: 'interno'
                            },
                            {
                                nombre: 'Proveedores ISP',
                                tipo: 'externo'
                            }
                        ]
                    },

                    {
                        id: 3,
                        nombre: 'Técnico de Soporte',
                        objetivo: 'Brindar atención y resolución de incidentes técnicos a los usuarios.',
                        area_id: 3,
                        area_nombre: 'Soporte',
                        area_color: '#10b981',
                        area_icon: 'las la-tools',

                        responsabilidades: [
                            'Atender tickets',
                            'Soporte a usuarios',
                            'Instalación de software',
                            'Mantenimiento de equipos'
                        ],

                        habilidades: ['Windows', 'Active Directory', 'ServiceNow', 'Helpdesk'],

                        habilidades_tecnicas: [
                            'Windows 10/11',
                            'Active Directory'
                        ],

                        competencias: [
                            'Atención al cliente',
                            'Comunicación',
                            'Paciencia'
                        ],

                        relaciones: [{
                                nombre: 'Usuarios internos',
                                tipo: 'interno'
                            },
                            {
                                nombre: 'Proveedores hardware',
                                tipo: 'externo'
                            }
                        ]
                    }
                ],

                get filtrados() {
                    return this.puestos.filter(p => {
                        const q = this.search.toLowerCase();
                        const matchSearch = !q ||
                            p.nombre.toLowerCase().includes(q) ||
                            p.objetivo.toLowerCase().includes(q) ||
                            p.area_nombre.toLowerCase().includes(q);
                        const matchArea = !this.filterArea ||
                            String(p.area_id) === String(this.filterArea);
                        return matchSearch && matchArea;
                    });
                },

                abrirModal(puesto) {
                    this.selected = puesto;
                    this.tab = 'objetivo';
                    this.showModal = true;
                },

                cerrarModal() {
                    this.showModal = false;
                    this.selected = null;
                }
            }
        }
    </script>
@endpush
