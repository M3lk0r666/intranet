@extends('layouts.intranet')

@section('title', 'Intranet Corporativa')

@push('css')
    <link href="/assets/css/intrahome.css" rel="stylesheet">
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
                    <li aria-current="page">
                        <div class="flex items-center">
                            <i class="fas fa-chevron-right text-gray-400 mx-2"></i>
                            <span class="ml-1 text-sm text-primary font-medium md:ml-2">Polizas de Clientes</span>
                        </div>
                    </li>
                </ol>
            </nav>
        </div>
    </div>

    <!-- Encabezado -->
    <header class="mt-8 mb-8">
        <h1 class="text-4xl text-gray-800 mb-2 font-black leading-tight tracking-[-0.033em]">Polizas de Servicio
        </h1>
        <p class="text-[#9c7349] text-lg font-normal mt-2">Servicios contratados por los clientes asi como del inventario de
            los mismos.</p>
    </header>

    {{-- <div class="bg-white rounded-lg shadow p-6 mb-8">
        <div class="p-6">
            <h1 class="text-2xl font-bold mb-6">
                Clientes y Documentación
            </h1>
            <div class="grid md:grid-cols-1 lg:grid-cols-2 gap-6">
                @foreach ($clients as $client)
                    <div x-data="{ openPoliza: true, openInventario: false, openActivos: false }"
                        class="bg-white border border-slate-200 rounded-2xl shadow-sm hover:shadow-md transition p-5">
                        <!-- CLIENT HEADER -->
                        <div class="flex items-center justify-between bg-white border rounded-xl px-4 py-3 shadow-sm mb-4">
                            <!-- Info cliente -->
                            <div class="flex items-center gap-3">
                                <!-- Icono -->
                                <div class="p-2 bg-primary/10 rounded-lg">
                                    <i class="las la-building text-primary text-xl"></i>
                                </div>
                                <!-- Nombre -->
                                <div class="flex flex-col">
                                    <h2 class="text-sm font-semibold text-slate-800">
                                        {{ $client->name }}
                                    </h2>
                                    <span class="text-xs text-slate-400">
                                        Cliente
                                    </span>
                                </div>
                            </div>
                            <!-- Contador -->
                            <div class="flex items-center gap-2">
                                <span class="px-2 py-0.5 bg-slate-100 text-slate-600 text-xs rounded-full">
                                    {{ $client->documents->count() }} archivos
                                </span>
                            </div>
                        </div>
                        <!-- POLIZAS -->
                        <div class="mb-6">
                            <!-- Header -->
                            <button @click="openPoliza = !openPoliza"
                                class="flex items-center justify-between w-full text-left px-4 py-3 bg-white border rounded-xl shadow-sm hover:shadow-md transition">
                                <span class="flex items-center gap-3 text-sm font-semibold text-slate-700">
                                    <i class="las la-file-contract text-orange-500 text-lg"></i>
                                    Pólizas
                                </span>
                                <span class="flex items-center gap-2 text-xs text-slate-500">
                                    <span class="bg-orange-100 text-orange-700 px-2 py-0.5 rounded-full">
                                        {{ $client->documents->where('type', 'poliza')->count() }}
                                    </span>
                                    <i class="las la-angle-down transition-transform"
                                        :class="{ 'rotate-180': openPoliza }"></i>
                                </span>
                            </button>
                            <!-- Contenido -->
                            <div x-show="openPoliza" x-collapse class="mt-3 space-y-2">
                                @foreach ($client->documents->where('type', 'poliza') as $doc)
                                    <div
                                        class="group flex items-center justify-between bg-white border rounded-xl px-4 py-3 shadow-sm hover:shadow-md hover:border-orange-300 transition">
                                        <!-- Info -->
                                        <div class="flex items-center gap-3 text-sm text-slate-700">
                                            <div class="p-2 bg-red-100 rounded-lg">
                                                <i class="las la-file-pdf text-red-500 text-lg"></i>
                                            </div>
                                            <div class="flex flex-col">
                                                <span class="font-medium group-hover:text-orange-600 transition">
                                                    {{ basename($doc->file) }}
                                                </span>
                                                <span class="text-xs text-slate-400">
                                                    Documento PDF
                                                </span>
                                            </div>
                                            <span
                                                class="ml-2 px-2 py-0.5 bg-orange-100 text-orange-700 text-xs rounded-full">
                                                {{ $doc->year }}
                                            </span>
                                        </div>
                                        <!-- Acción -->
                                        <button onclick="openPdf('{{ asset('storage/' . $doc->file) }}')"
                                            class="flex items-center gap-2 px-3 py-2 text-sm font-medium text-orange-600 bg-orange-50 rounded-lg hover:bg-orange-100 transition">
                                            <i class="las la-eye text-base"></i>
                                            Ver
                                        </button>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <!-- INVENTARIOS -->
                        <div class="mb-6">
                            <!-- Header -->
                            <button @click="openInventario = !openInventario"
                                class="flex items-center justify-between w-full text-left px-4 py-3 bg-white border rounded-xl shadow-sm hover:shadow-md transition">
                                <span class="flex items-center gap-3 text-sm font-semibold text-slate-700">
                                    <i class="las la-box text-purple-500 text-lg"></i>
                                    Inventarios
                                </span>
                                <span class="flex items-center gap-2 text-xs text-slate-500">
                                    <span class="bg-purple-100 text-purple-700 px-2 py-0.5 rounded-full">
                                        {{ $client->documents->where('type', 'inventario')->count() }}
                                    </span>
                                    <i class="las la-angle-down transition-transform"
                                        :class="{ 'rotate-180': openInventario }"></i>
                                </span>
                            </button>
                            <!-- Contenido -->
                            <div x-show="openInventario" x-collapse class="mt-3 space-y-2">
                                @foreach ($client->documents->where('type', 'inventario') as $doc)
                                    <div
                                        class="group flex items-center justify-between bg-white border rounded-xl px-4 py-3 shadow-sm hover:shadow-md hover:border-purple-300 transition">
                                        <!-- Info -->
                                        <div class="flex items-center gap-3 text-sm text-slate-700">
                                            <div class="p-2 bg-green-100 rounded-lg">
                                                <i class="las la-file-excel text-green-600 text-lg"></i>
                                            </div>
                                            <div class="flex flex-col">
                                                <span class="font-medium group-hover:text-purple-600 transition">
                                                    {{ basename($doc->file) }}
                                                </span>
                                                <span class="text-xs text-slate-400">
                                                    Archivo Excel
                                                </span>
                                            </div>
                                            <span
                                                class="ml-2 px-2 py-0.5 bg-purple-100 text-purple-700 text-xs rounded-full">
                                                {{ $doc->year }}
                                            </span>
                                        </div>
                                        <!-- Acción -->
                                        <a href="{{ asset('storage/' . $doc->file) }}" download
                                            class="flex items-center gap-2 px-3 py-2 text-sm font-medium text-purple-600 bg-purple-50 rounded-lg hover:bg-purple-100 transition">
                                            <i class="las la-download text-base"></i>
                                            Descargar
                                        </a>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <!-- ACTIVOS -->
                        <div class="mb-6">
                            <!-- Header -->
                            <button @click="openActivos = !openActivos"
                                class="flex items-center justify-between w-full text-left px-4 py-3 bg-white border rounded-xl shadow-sm hover:shadow-md transition">
                                <span class="flex items-center gap-3 text-sm font-semibold text-slate-700">
                                    <i class="las la-box text-green-500 text-lg"></i>
                                    Activos
                                </span>
                                <span class="flex items-center gap-2 text-xs text-slate-500">
                                    <span class="bg-green-100 text-green-700 px-2 py-0.5 rounded-full">
                                        {{ $client->documents->where('type', 'activos')->count() }}
                                    </span>
                                    <i class="las la-angle-down transition-transform"
                                        :class="{ 'rotate-180': openActivos }"></i>
                                </span>
                            </button>
                            <!-- Contenido -->
                            <div x-show="openActivos" x-collapse class="mt-3 space-y-2">
                                @foreach ($client->documents->where('type', 'activos') as $doc)
                                    <div
                                        class="group flex items-center justify-between bg-white border rounded-xl px-4 py-3 shadow-sm hover:shadow-md hover:border-green-300 transition">
                                        <!-- Info -->
                                        <div class="flex items-center gap-3 text-sm text-slate-700">
                                            <div class="p-2 bg-green-100 rounded-lg">
                                                <i class="las la-file-excel text-green-600 text-lg"></i>
                                            </div>
                                            <div class="flex flex-col">
                                                <span class="font-medium group-hover:text-green-600 transition">
                                                    {{ basename($doc->file) }}
                                                </span>
                                                <span class="text-xs text-slate-400">
                                                    Archivo Excel
                                                </span>
                                            </div>
                                            <span
                                                class="ml-2 px-2 py-0.5 bg-green-100 text-green-700 text-xs rounded-full">
                                                {{ $doc->year }}
                                            </span>
                                        </div>
                                        <!-- Acción -->
                                        <a href="{{ asset('storage/' . $doc->file) }}" download
                                            class="flex items-center gap-2 px-3 py-2 text-sm font-medium text-green-600 bg-green-50 rounded-lg hover:bg-green-100 transition">
                                            <i class="las la-download text-base"></i>
                                            Descargar
                                        </a>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div> --}}

    <div x-data="clientModal()" class="p-6 space-y-6">

        <!-- TABLA -->
        <div class="bg-white border rounded-xl shadow-sm overflow-hidden">
            {{-- <div class="px-4 py-3 border-b flex justify-between items-center">
                <h2 class="text-sm font-semibold text-slate-700">LISTADO DE CLIENTES CON POLIZA ACTIVAS</h2>
            </div> --}}
            <div class="px-5 py-4 border-b flex justify-between items-center">
                <h2 class="text-base font-bold text-slate-800 tracking-wide flex items-center gap-2">
                    <i class="las la-users text-primary text-xl"></i>
                    LISTADO DE CLIENTES CON PÓLIZAS ACTIVAS
                </h2>
            </div>
            <div class="overflow-x-auto">
                <table class="w-full text-sm text-left border-collapse">
                    <thead class="bg-orange-200 text-slate-600 text-xs uppercase tracking-wider">
                        <tr>
                            <th class="px-4 py-3 font-semibold">Cliente</th>
                            <th class="px-4 py-3 font-semibold">Archivos</th>
                            <th class="px-4 py-3 font-semibold">Acciones</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y">
                        @foreach ($clients as $client)
                            <tr class="hover:bg-slate-50 transition">
                                <td class="px-4 py-3">
                                    <div class="flex items-center gap-3">
                                        <div class="w-8 h-8 flex items-center justify-center bg-primary/10 rounded-lg">
                                            <i class="las la-building text-primary"></i>
                                        </div>
                                        <div class="flex flex-col">
                                            <span class="font-medium text-slate-700">
                                                {{ $client->name }}
                                            </span>
                                            <span class="text-xs text-slate-400">
                                                Cliente
                                            </span>
                                        </div>

                                    </div>
                                </td>
                                <td class="px-4 py-3">
                                    <span class="px-2 py-0.5 bg-primary/10 text-primary rounded-full text-xs font-medium">
                                        {{ $client->documents->count() }}
                                    </span>
                                </td>
                                <td class="px-4 py-3 text-right">
                                    <button @click="openClient({{ $client->id }})"
                                        class="px-3 py-1.5 text-xs bg-primary text-white rounded-lg hover:bg-primary/90">
                                        Ver detalle
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <!-- MODAL -->
        <div x-show="showModal" class="fixed inset-0 bg-black/50 flex items-center justify-center z-50 p-4" x-transition>
            <div @click.outside="closeModal"
                class="bg-white w-full max-w-5xl max-h-[90vh] rounded-xl shadow-lg flex flex-col overflow-hidden">
                <!-- HEADER -->
                <div class="flex justify-between items-center px-4 py-3 border-b">
                    <h2 class="font-semibold text-slate-700" x-text="selectedClient.name"></h2>
                    <button @click="closeModal" class="p-2 rounded-lg hover:bg-slate-100">
                        ✕
                    </button>
                </div>
                <!-- CONTENIDO -->
                <div class="p-4 overflow-y-auto space-y-4">
                    <!-- POLIZAS -->
                    <template x-if="selectedClient">
                        <div class="space-y-4">
                            <!-- POLIZAS -->
                            <div>
                                <h3 class="text-sm font-semibold text-orange-600 mb-2">Pólizas</h3>
                                {{-- <template x-for="doc in selectedClient.documents.filter(d => d.type === 'poliza')"
                                    :key="doc.id"> --}}
                                <template x-for="doc in (selectedClient.documents || []).filter(d => d.type === 'poliza')"
                                    :key="doc.id">
                                    <div class="flex justify-between items-center border rounded-lg px-3 py-2 mb-2">
                                        <span x-text="doc.file"></span>
                                        <button @click="openPdf(doc.url)" class="text-orange-600 text-sm">Ver</button>
                                    </div>
                                </template>
                            </div>
                            <!-- INVENTARIOS -->
                            <div>
                                <h3 class="text-sm font-semibold text-purple-600 mb-2">Inventarios</h3>
                                <template
                                    x-for="doc in (selectedClient.documents || []).filter(d => d.type === 'inventario')"
                                    :key="doc.id">
                                    <div class="flex justify-between items-center border rounded-lg px-3 py-2 mb-2">
                                        <span x-text="doc.file"></span>
                                        <a :href="doc.url" download class="text-purple-600 text-sm">Descargar</a>
                                    </div>
                                </template>
                            </div>
                            <!-- ACTIVOS -->
                            <div>
                                <h3 class="text-sm font-semibold text-green-600 mb-2">Activos</h3>
                                <template x-for="doc in (selectedClient.documents || []).filter(d => d.type === 'activos')"
                                    :key="doc.id">
                                    <div class="flex justify-between items-center border rounded-lg px-3 py-2 mb-2">
                                        <span x-text="doc.file"></span>
                                        <a :href="doc.url" download class="text-green-600 text-sm">Descargar</a>
                                    </div>
                                </template>
                            </div>
                        </div>
                    </template>
                </div>
            </div>
        </div>
    </div>

    <!-- PDF MODAL -->
    <div id="pdfModal" class="hidden fixed inset-0 z-50 bg-black/60 flex items-center justify-center p-4">
        <div class="relative w-full max-w-5xl h-[85vh]">
            <button onclick="closePdf()" class="absolute -top-10 right-0 bg-white px-3 py-1 rounded shadow">
                ✕ Cerrar
            </button>
            <iframe id="pdfFrame" class="w-full h-full rounded-xl bg-white"></iframe>
        </div>
    </div>

    {{-- @include('intranet.ingenieria.pdf-modal') --}}
@endsection
@push('js')
    <script>
        function clientModal() {
            return {
                showModal: false,
                selectedClient: {
                    documents: []
                },

                clients: @json($clientsFormatted),

                openClient(id) {
                    this.selectedClient = this.clients.find(c => c.id === id);
                    this.showModal = true;
                },

                closeModal() {
                    this.showModal = false;
                }
            }
        }

        function openPdf(url) {
            document.getElementById('pdfFrame').src = url;
            document.getElementById('pdfModal').classList.remove('hidden');
        }

        function closePdf() {
            document.getElementById('pdfFrame').src = '';
            document.getElementById('pdfModal').classList.add('hidden');
        }
    </script>
@endpush
