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
                            <span class="ml-1 text-sm text-primary font-medium md:ml-2">RH - Baja Colaborador</span>
                        </div>
                    </li>
                </ol>
            </nav>
        </div>
    </div>

    <!-- Encabezado -->
    <div class="mt-8 mb-8">
        <h1 class="text-3xl font-bold text-gray-800 mb-2">Procesos Baja de Colaborador</h1>
        <p class="text-gray-600">El objetivo del proceso de baja es asegurar el cumplimiento legal, proteger la información
            de la empresa y mantener una salida profesional y ordenada.
        </p>
    </div>

    <div class="text-center mb-16 mt-8">
        <h1 class="text-5xl font-black font-display tracking-tight text-slate-900 uppercase">
            Proceso <span class="text-primary  uppercase">Baja de un Colaborador</span>
        </h1>
        <p></p>
        <p class="text-slate-600 mt-6 text-lg">Flujo completo de ejecución</p>
    </div>


    <!-- Grid de fases del proceso AltaColaborador -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 items-start">
        <p>Poner las Fases - Pendientes</p>
    </div>

    <section class="mt-20 opacity-40 pointer-events-none cursor-not-allowed">
        <div class="flex items-center justify-between mb-8">
            <h2 class="text-2xl font-bold border-l-4 border-primary pl-4">Documentos del Proceso</h2>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-1 gap-8">
            <div
                class="bg-white dark:bg-surface-dark p-8 rounded-3xl border border-slate-200 dark:border-slate-800 flex items-center gap-6 shadow-sm hover:border-primary transition-all cursor-pointer">
                <a href="#"
                    class="flex items-center p-3 border border-gray-200 rounded-lg hover:border-orange-300 hover:bg-orange-50">
                    <div class="document-icon bg-red-100 text-red-600 mr-3">
                        <i class="fas fa-file-pdf"></i>
                    </div>
                    <div class="flex-1">
                        <h4 class="font-medium text-gray-800">Formato: Baja de Colaborador</h4>
                        <p class="text-xs text-gray-500">PDF • 2.1 MB • V.1.1</p>
                    </div>
                </a>
            </div>
        </div>
    </section>


@endsection
@push('js')
@endpush
