@extends('layouts.intranet')

@section('title', 'Pólizas de Servicio')

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
                            <i class="fas fa-home mr-2"></i> Home
                        </a>
                    </li>
                    <li>
                        <div class="flex items-center"><i class="fas fa-chevron-right text-gray-400 mx-2"></i>
                            <a href="{{ route('intranet.index') }}"
                                class="ml-1 text-sm text-gray-600 hover:text-orange-600 md:ml-2">Intranet</a>
                        </div>
                    </li>
                    <li>
                        <div class="flex items-center"><i class="fas fa-chevron-right text-gray-400 mx-2"></i>
                            <a href="{{ route('estructurainterna.ingenieria') }}"
                                class="ml-1 text-sm text-gray-600 hover:text-orange-600 md:ml-2">Ingeniería</a>
                        </div>
                    </li>
                    <li aria-current="page">
                        <div class="flex items-center"><i class="fas fa-chevron-right text-gray-400 mx-2"></i>
                            <span class="ml-1 text-sm text-orange-600 font-medium md:ml-2">Pólizas de Clientes</span>
                        </div>
                    </li>
                </ol>
            </nav>
        </div>
    </div>

    {{-- Encabezado --}}
    <header class="mt-8 mb-6 px-6">
        <h1 class="text-4xl text-gray-800 mb-1 font-black leading-tight tracking-[-0.033em]">Pólizas de Servicio</h1>
        <p class="text-[#9c7349] text-base font-normal mt-1">Servicios contratados por los clientes así como del inventario
            de los mismos.</p>
    </header>

    <div x-data="clientPortal()" x-cloak class="px-6 pb-10 space-y-6">

        {{-- ── Stat cards ── --}}
        <div class="grid grid-cols-2 sm:grid-cols-4 gap-3">
            <div class="stat-card">
                <div class="icon-wrap" style="background:#f5ede6"><i class="las la-users"
                        style="color:#c2622a;font-size:18px"></i></div>
                <div class="num">{{ $clients->count() }}</div>
                <div class="lbl">Clientes activos</div>
            </div>
            <div class="stat-card">
                <div class="icon-wrap" style="background:#fef3e2"><i class="las la-file-alt"
                        style="color:#b07800;font-size:18px"></i></div>
                <div class="num">{{ $clients->sum(fn($c) => $c->documents->count()) }}</div>
                <div class="lbl">Archivos totales</div>
            </div>
            <div class="stat-card">
                <div class="icon-wrap" style="background:#e7f5e7"><i class="las la-shield-alt"
                        style="color:#276327;font-size:18px"></i></div>
                <div class="num">{{ $clients->sum(fn($c) => $c->documents->where('type', 'poliza')->count()) }}</div>
                <div class="lbl">Pólizas activas</div>
            </div>
            <div class="stat-card">
                <div class="icon-wrap" style="background:#e8eaf6"><i class="las la-boxes"
                        style="color:#3730a3;font-size:18px"></i></div>
                <div class="num">{{ $clients->sum(fn($c) => $c->documents->where('type', 'inventario')->count()) }}</div>
                <div class="lbl">Inventarios</div>
            </div>
        </div>

        {{-- ── Toolbar ── --}}
        <div class="flex flex-wrap gap-2 items-center">
            {{-- Search --}}
            <div class="relative flex-1 min-w-[200px]">
                <i class="fas fa-search absolute left-3 top-1/2 -translate-y-1/2 text-gray-400 text-xs"></i>
                <input type="text" x-model="search" placeholder="Buscar cliente..." class="toolbar-input">
            </div>
            {{-- Filter --}}
            <select x-model="filterStatus" class="toolbar-select">
                <option value="">Todos</option>
                <option value="con_archivos">Con archivos</option>
                <option value="sin_archivos">Sin archivos</option>
            </select>
            {{-- View toggle --}}
            <div class="view-toggle">
                <button class="vt-btn" :class="view === 'grid' && 'active'" @click="view='grid'" title="Cuadrícula">
                    <i class="las la-th-large"></i>
                </button>
                <button class="vt-btn" :class="view === 'list' && 'active'" @click="view='list'" title="Lista">
                    <i class="las la-list"></i>
                </button>
            </div>
            {{-- Separador + Botón agregar --}}
            <div class="w-px h-7 bg-gray-200 hidden sm:block"></div>
            <a href="{{ route('admin.clients.index') }}" class="btn-add-client">
                <i class="las la-plus" style="font-size:15px"></i>
                Agregar Cliente
            </a>
        </div>

        {{-- ── Section label ── --}}
        <p class="text-xs font-semibold text-gray-400 uppercase tracking-wider -mb-2">
            <span x-text="filteredClients.length + ' cliente(s)'"></span>
        </p>

        {{-- ── GRID VIEW ── --}}
        <div x-show="view === 'grid'" class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-3">
            <template x-for="client in filteredClients" :key="client.id">
                <div class="client-card anim-fade-up" @click="openClient(client.id)">
                    <div class="flex justify-between items-start mb-3">
                        <div class="client-avatar" x-text="initials(client.name)"></div>
                        <span class="badge-status" :class="client.documents.length > 0 ? 'badge-active' : 'badge-inactive'"
                            x-text="client.documents.length > 0 ? 'Con archivos' : 'Sin archivos'">
                        </span>
                    </div>
                    <p class="font-semibold text-gray-800 text-sm leading-tight mb-0.5" x-text="client.name"></p>
                    <p class="text-xs text-gray-400 mb-3">Cliente</p>
                    <div class="flex gap-4 border-t border-gray-100 pt-3 mt-auto">
                        <div>
                            <p class="text-base font-bold text-gray-800 leading-none"
                                x-text="client.documents.filter(d=>d.type==='poliza').length"></p>
                            <p class="text-xs text-gray-400 mt-0.5">pólizas</p>
                        </div>
                        <div>
                            <p class="text-base font-bold text-gray-800 leading-none" x-text="client.documents.length">
                            </p>
                            <p class="text-xs text-gray-400 mt-0.5">archivos</p>
                        </div>
                    </div>
                </div>
            </template>
            {{-- Empty state grid --}}
            <div x-show="filteredClients.length === 0" class="col-span-full text-center py-12 text-gray-400 text-sm">
                <i class="las la-search text-3xl block mb-2"></i>
                No se encontraron clientes con ese criterio.
            </div>
        </div>

        {{-- ── LIST VIEW ── --}}
        <div x-show="view === 'list'" class="flex flex-col rounded-xl overflow-hidden border border-gray-200">
            <template x-for="client in filteredClients" :key="client.id">
                <div class="list-row" @click="openClient(client.id)">
                    <div class="client-avatar" x-text="initials(client.name)"></div>
                    <div class="flex-1 min-w-0">
                        <p class="font-semibold text-sm text-gray-800 truncate" x-text="client.name"></p>
                        <p class="text-xs text-gray-400">Cliente</p>
                    </div>
                    <span class="badge-status hidden sm:inline-block"
                        :class="client.documents.length > 0 ? 'badge-active' : 'badge-inactive'"
                        x-text="client.documents.length > 0 ? 'Con archivos' : 'Sin archivos'">
                    </span>
                    <div class="text-xs text-gray-500 text-right hidden md:block min-w-[80px]">
                        <span x-text="client.documents.length + ' archivos'"></span>
                    </div>
                    <i class="las la-angle-right text-gray-300 text-sm"></i>
                </div>
            </template>
            <div x-show="filteredClients.length === 0" class="text-center py-10 text-gray-400 text-sm">
                No se encontraron clientes.
            </div>
        </div>

        {{-- ══════════════════════════════════════════════
         MODAL DETALLE CLIENTE
    ══════════════════════════════════════════════ --}}
        <div x-show="showModal" x-transition:enter="transition ease-out duration-150"
            x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
            x-transition:leave="transition ease-in duration-100" x-transition:leave-start="opacity-100"
            x-transition:leave-end="opacity-0" class="modal-backdrop" @click.self="closeModal">

            <div class="modal-box anim-fade-up" @click.stop>

                {{-- Header --}}
                <div class="flex items-center gap-3 px-5 py-4 border-b border-gray-100">
                    <div class="client-avatar" x-text="selectedClient ? initials(selectedClient.name) : ''"></div>
                    <div class="flex-1 min-w-0">
                        <h2 class="font-bold text-gray-800 text-base truncate" x-text="selectedClient?.name"></h2>
                        <p class="text-xs text-gray-400">Cliente</p>
                    </div>
                    {{-- Totales rápidos --}}
                    <div class="hidden sm:flex gap-4 mr-3">
                        <div class="text-center">
                            <p class="text-sm font-bold text-gray-800 leading-none"
                                x-text="selectedClient?.documents.filter(d=>d.type==='poliza').length ?? 0"></p>
                            <p class="text-xs text-gray-400 mt-0.5">Pólizas</p>
                        </div>
                        <div class="text-center">
                            <p class="text-sm font-bold text-gray-800 leading-none"
                                x-text="selectedClient?.documents.filter(d=>d.type==='inventario').length ?? 0"></p>
                            <p class="text-xs text-gray-400 mt-0.5">Inv.</p>
                        </div>
                        <div class="text-center">
                            <p class="text-sm font-bold text-gray-800 leading-none"
                                x-text="selectedClient?.documents.filter(d=>d.type==='activos').length ?? 0"></p>
                            <p class="text-xs text-gray-400 mt-0.5">Activos</p>
                        </div>
                    </div>
                    <button @click="closeModal"
                        class="p-2 rounded-lg hover:bg-gray-100 text-gray-400 hover:text-gray-700">
                        <i class="las la-times"></i>
                    </button>
                </div>

                {{-- Tabs --}}
                <div class="modal-tabs-wrap">
                    <button class="modal-tab-btn" :class="activeTab === 'polizas' && 'active'"
                        @click="activeTab='polizas'">
                        <i class="las la-shield-alt mr-1"></i> Pólizas
                        <span class="ml-1 text-xs font-normal text-gray-400"
                            x-text="'(' + (selectedClient?.documents.filter(d=>d.type==='poliza').length ?? 0) + ')'"></span>
                    </button>
                    <button class="modal-tab-btn" :class="activeTab === 'inventario' && 'active'"
                        @click="activeTab='inventario'">
                        <i class="las la-boxes mr-1"></i> Inventarios
                        <span class="ml-1 text-xs font-normal text-gray-400"
                            x-text="'(' + (selectedClient?.documents.filter(d=>d.type==='inventario').length ?? 0) + ')'"></span>
                    </button>
                    <button class="modal-tab-btn" :class="activeTab === 'activos' && 'active'"
                        @click="activeTab='activos'">
                        <i class="las la-cubes mr-1"></i> Activos
                        <span class="ml-1 text-xs font-normal text-gray-400"
                            x-text="'(' + (selectedClient?.documents.filter(d=>d.type==='activos').length ?? 0) + ')'"></span>
                    </button>
                </div>

                {{-- Body --}}
                <div class="p-5 overflow-y-auto flex-1">

                    {{-- ── Pólizas ── --}}
                    <div x-show="activeTab === 'polizas'">
                        <template x-if="selectedClient?.documents.filter(d=>d.type==='poliza').length === 0">
                            <div class="empty-state"><i class="las la-folder-open text-3xl block mb-1"></i> Sin pólizas
                                registradas</div>
                        </template>
                        <template x-for="doc in (selectedClient?.documents ?? []).filter(d => d.type === 'poliza')"
                            :key="doc.id">
                            <div class="file-row">
                                <div class="file-icon-box" :class="fileIconClass(doc.file)">
                                    <span x-text="fileExt(doc.file)"></span>
                                </div>
                                <div class="flex-1 min-w-0">
                                    <p class="text-sm font-medium text-gray-800 truncate" x-text="doc.file"></p>
                                    <p class="text-xs text-gray-400">Póliza</p>
                                </div>
                                <button @click="openPdf(doc.url)" class="file-action-btn">
                                    <i class="las la-eye mr-1"></i> Ver
                                </button>
                            </div>
                        </template>
                    </div>

                    {{-- ── Inventarios ── --}}
                    <div x-show="activeTab === 'inventario'">
                        <template x-if="selectedClient?.documents.filter(d=>d.type==='inventario').length === 0">
                            <div class="empty-state"><i class="las la-folder-open text-3xl block mb-1"></i> Sin
                                inventarios registrados</div>
                        </template>
                        <template x-for="doc in (selectedClient?.documents ?? []).filter(d => d.type === 'inventario')"
                            :key="doc.id">
                            <div class="file-row">
                                <div class="file-icon-box" :class="fileIconClass(doc.file)">
                                    <span x-text="fileExt(doc.file)"></span>
                                </div>
                                <div class="flex-1 min-w-0">
                                    <p class="text-sm font-medium text-gray-800 truncate" x-text="doc.file"></p>
                                    <p class="text-xs text-gray-400">Inventario</p>
                                </div>
                                <a :href="doc.url" download class="file-action-btn">
                                    <i class="las la-download mr-1"></i> Descargar
                                </a>
                            </div>
                        </template>
                    </div>

                    {{-- ── Activos ── --}}
                    <div x-show="activeTab === 'activos'">
                        <template x-if="selectedClient?.documents.filter(d=>d.type==='activos').length === 0">
                            <div class="empty-state"><i class="las la-folder-open text-3xl block mb-1"></i> Sin activos
                                registrados</div>
                        </template>
                        <template x-for="doc in (selectedClient?.documents ?? []).filter(d => d.type === 'activos')"
                            :key="doc.id">
                            <div class="file-row">
                                <div class="file-icon-box" :class="fileIconClass(doc.file)">
                                    <span x-text="fileExt(doc.file)"></span>
                                </div>
                                <div class="flex-1 min-w-0">
                                    <p class="text-sm font-medium text-gray-800 truncate" x-text="doc.file"></p>
                                    <p class="text-xs text-gray-400">Activo</p>
                                </div>
                                <a :href="doc.url" download class="file-action-btn">
                                    <i class="las la-download mr-1"></i> Descargar
                                </a>
                            </div>
                        </template>
                    </div>

                </div>
            </div>
        </div>

    </div>

    {{-- ══════════════════════════════════════════════
     PDF VIEWER MODAL
══════════════════════════════════════════════ --}}
    <div id="pdfModal" class="fixed inset-0 z-50 bg-black/60 items-center justify-center p-4">
        <div class="relative w-full max-w-5xl h-[88vh]">
            <button onclick="closePdf()"
                class="absolute -top-10 right-0 bg-white text-gray-700 px-4 py-1.5 rounded-lg shadow text-sm font-medium hover:bg-gray-50">
                <i class="las la-times mr-1"></i> Cerrar
            </button>
            <iframe id="pdfFrame" class="w-full h-full rounded-xl bg-white border-0"></iframe>
        </div>
    </div>

@endsection

@push('js')
    <script>
        function clientPortal() {
            return {
                /* ── State ── */
                view: 'grid',
                search: '',
                filterStatus: '',
                showModal: false,
                activeTab: 'polizas',
                selectedClient: null,

                /* ── Data from Laravel ── */
                clients: @json($clientsFormatted),

                /* ── Computed ── */
                get filteredClients() {
                    return this.clients.filter(c => {
                        const matchSearch = !this.search ||
                            c.name.toLowerCase().includes(this.search.toLowerCase());
                        const matchStatus = !this.filterStatus ||
                            (this.filterStatus === 'con_archivos' && c.documents.length > 0) ||
                            (this.filterStatus === 'sin_archivos' && c.documents.length === 0);
                        return matchSearch && matchStatus;
                    });
                },

                /* ── Actions ── */
                openClient(id) {
                    this.selectedClient = this.clients.find(c => c.id === id) ?? null;
                    this.activeTab = 'polizas';
                    this.showModal = true;
                },

                closeModal() {
                    this.showModal = false;
                    this.selectedClient = null;
                },

                openPdf(url) {
                    document.getElementById('pdfFrame').src = url;
                    document.getElementById('pdfModal').classList.add('open');
                },

                /* ── Helpers ── */
                initials(name) {
                    return (name || '').split(' ').slice(0, 2).map(w => w[0] ?? '').join('').toUpperCase();
                },

                fileExt(filename) {
                    return (filename || '').split('.').pop().toUpperCase().slice(0, 4);
                },

                fileIconClass(filename) {
                    const ext = (filename || '').split('.').pop().toLowerCase();
                    if (ext === 'pdf') return 'fi-pdf';
                    if (['xls', 'xlsx'].includes(ext)) return 'fi-xls';
                    if (['doc', 'docx'].includes(ext)) return 'fi-doc';
                    if (ext === 'txt') return 'fi-txt';
                    return 'fi-def';
                }
            }
        }

        function closePdf() {
            document.getElementById('pdfFrame').src = '';
            document.getElementById('pdfModal').classList.remove('open');
        }
    </script>
@endpush
