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
                            <a href="{{ route('intranet.estructurainterna.ingenieria') }}"
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

    <div class="bg-white rounded-lg shadow p-6 mb-8">
        <div class="p-6">
            <h1 class="text-2xl font-bold mb-6">
                Clientes y Documentación
            </h1>

            <div class="grid md:grid-cols-1 lg:grid-cols-2 gap-6">
                {{-- @foreach ($clients as $client)
                    <div class="bg-white shadow rounded-lg p-4 border">
                        <h2 class="text-lg font-semibold mb-4 flex items-center gap-2">
                            👤 {{ $client->name }}
                        </h2>
                        <!-- POLIZAS -->
                        <div class="mb-4">
                            <h3 class="text-sm font-semibold text-gray-600 mb-2">
                                📁 Pólizas
                            </h3>
                            <ul class="space-y-2">
                                @foreach ($client->documents->where('type', 'poliza') as $doc)
                                    <li class="flex justify-between items-center bg-orange-50 p-2 rounded">
                                        <span class="text-sm">
                                            <i class="las la-file-pdf text-xl text-red-600"></i>
                                            {{ basename($doc->file) }}
                                        </span>
                                        <button onclick="openPdf('{{ asset('storage/' . $doc->file) }}')"
                                            class="text-blue-600 text-sm">
                                            Ver
                                        </button>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                        <!-- INVENTARIOS -->
                        <div>
                            <h3 class="text-sm font-semibold text-gray-600 mb-2">
                                📁 Inventarios
                            </h3>
                            <ul class="space-y-2">
                                @foreach ($client->documents->where('type', 'inventario') as $doc)
                                    <li class="flex justify-between items-center bg-purple-50 p-2 rounded">
                                        <span class="text-sm">
                                            <i class="las la-file-excel text-xl text-green-600"></i>
                                            {{ basename($doc->file) }}
                                        </span>
                                        <a href="{{ asset('storage/' . $doc->file) }}" class="text-green-600 text-sm">
                                            Descargar
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                @endforeach --}}
                @foreach ($clients as $client)
                    <div x-data="{ openPoliza: true, openInventario: false }"
                        class="bg-white border border-slate-200 rounded-2xl shadow-sm hover:shadow-md transition p-5">

                        <!-- CLIENT HEADER -->
                        <div class="flex items-center justify-between mb-4">
                            <h2 class="flex items-center gap-2 font-semibold text-slate-800">
                                <i class="las la-building text-primary text-xl"></i>
                                {{ $client->name }}
                            </h2>

                            <span class="text-xs text-slate-400">
                                {{ $client->documents->count() }} archivos
                            </span>
                        </div>


                        <!-- POLIZAS -->
                        <div class="mb-4">

                            <button @click="openPoliza = !openPoliza"
                                class="flex items-center justify-between w-full text-left text-sm font-semibold text-slate-600 mb-2">

                                <span class="flex items-center gap-2">
                                    <i class="las la-file-contract text-orange-500"></i>
                                    Pólizas
                                </span>

                                <span class="text-xs text-slate-400">
                                    {{ $client->documents->where('type', 'poliza')->count() }}
                                </span>
                            </button>

                            <div x-show="openPoliza" x-collapse>

                                <ul class="space-y-2">

                                    @foreach ($client->documents->where('type', 'poliza') as $doc)
                                        <li
                                            class="flex items-center justify-between bg-orange-50 border border-orange-100 rounded-lg px-3 py-2">

                                            <div class="flex items-center gap-2 text-sm text-slate-700">
                                                <i class="las la-file-pdf text-red-500"></i>
                                                {{ basename($doc->file) }}
                                            </div>

                                            <button onclick="openPdf('{{ asset('storage/' . $doc->file) }}')"
                                                class="text-xs font-semibold text-primary hover:underline flex items-center gap-1">
                                                <i class="las la-eye"></i>
                                                Ver
                                            </button>

                                        </li>
                                    @endforeach

                                </ul>

                            </div>

                        </div>


                        <!-- INVENTARIOS -->
                        <div>

                            <button @click="openInventario = !openInventario"
                                class="flex items-center justify-between w-full text-left text-sm font-semibold text-slate-600 mb-2">

                                <span class="flex items-center gap-2">
                                    <i class="las la-box text-purple-500"></i>
                                    Inventarios
                                </span>

                                <span class="text-xs text-slate-400">
                                    {{ $client->documents->where('type', 'inventario')->count() }}
                                </span>
                            </button>

                            <div x-show="openInventario" x-collapse>

                                <ul class="space-y-2">

                                    @foreach ($client->documents->where('type', 'inventario') as $doc)
                                        <li
                                            class="flex items-center justify-between bg-purple-50 border border-purple-100 rounded-lg px-3 py-2">

                                            <div class="flex items-center gap-2 text-sm text-slate-700">
                                                <i class="las la-file-excel text-green-600"></i>
                                                {{ basename($doc->file) }}
                                            </div>

                                            <a href="{{ asset('storage/' . $doc->file) }}"
                                                class="text-xs font-semibold text-green-600 hover:underline flex items-center gap-1">
                                                <i class="las la-download"></i>
                                                Descargar
                                            </a>

                                        </li>
                                    @endforeach

                                </ul>

                            </div>

                        </div>

                    </div>
                @endforeach
            </div>
        </div>
        @include('intranet.ingenieria.pdf-modal')
    </div>

@endsection
@push('js')
@endpush
