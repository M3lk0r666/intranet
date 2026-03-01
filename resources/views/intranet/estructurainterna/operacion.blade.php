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
                            <a href="{{ route('intranet.procesos-empresariales') }}"
                                class="ml-1 text-sm text-gray-600 hover:text-orange-600 md:ml-2">Procesos Empresariales</a>
                        </div>
                    </li>
                    <li aria-current="page">
                        <div class="flex items-center">
                            <i class="fas fa-chevron-right text-gray-400 mx-2"></i>
                            <span class="ml-1 text-sm text-primary font-medium md:ml-2">Operaciones</span>
                        </div>
                    </li>
                </ol>
            </nav>
        </div>
    </div>

    <!-- Encabezado -->
    <div class="mb-8 mt-6">
        <h1 class="text-3xl font-bold text-gray-800 mb-2">Operaciones</h1>
        <p class="text-gray-600">Falta que pone en esta parte ......</p>
        <p>trabajar en esto ...</p>
    </div>

    <div class="mb-8">
        <h1 class="text-3xl font-bold text-gray-800 mb-2">Descripcion de Puestos</h1>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        <div
            class="bg-white dark:bg-[#1a1a1a] rounded shadow-sm border border-slate-200 dark:border-slate-800 flex flex-col min-h-[400px] opacity-40 pointer-events-none cursor-not-allowed">
            <div class="p-4 flex items-center justify-between border-b border-slate-100 dark:border-slate-800">
                <h3 class="font-bold text-sm text-black dark:text-white uppercase tracking-tight">Ingeniero de Redes</h3>

            </div>
            <div class="p-6 flex-1 space-y-6">
                <div
                    class="relative overflow-hidden rounded bg-orange-50 dark:bg-orange-900/10 p-6 border border-orange-100 dark:border-orange-900/30">
                    <h4 class="text-xl font-bold text-black dark:text-white mb-2 leading-tight">Descripcion Corta del
                        puesto</h4>
                    <p class="text-sm text-slate-600 dark:text-slate-400 mb-6">Consulte las nuevas normativas sobre
                        presencialidad y beneficios de oficina para el próximo trimestre.</p>
                    <div class="space-y-3">
                        <div class="flex items-center text-sm font-semibold text-black dark:text-white">
                            <span class="material-symbols-outlined text-orange-500 mr-2 text-lg"><i
                                    class="ri-check-line"></i></span>
                            Funcion 1
                        </div>
                        <div class="flex items-center text-sm font-semibold text-black dark:text-white">
                            <span class="material-symbols-outlined text-orange-500 mr-2 text-lg"><i
                                    class="ri-check-line"></i></span>
                            Funcion 2
                        </div>
                        <div class="flex items-center text-sm font-semibold text-black dark:text-white">
                            <span class="material-symbols-outlined text-orange-500 mr-2 text-lg"><i
                                    class="ri-check-line"></i></span>
                            Funcion 3
                        </div>
                    </div>
                </div>
            </div>
            <div
                class="p-4 bg-slate-50 dark:bg-slate-800/30 flex space-x-2 border-t border-slate-100 dark:border-slate-800">
                <button
                    class="bg-primary hover:bg-orange-600 text-white px-4 py-2 rounded text-xs font-bold transition-colors">Ver
                    Documento</button>
            </div>
        </div>
        <div
            class="bg-white dark:bg-[#1a1a1a] rounded shadow-sm border border-slate-200 dark:border-slate-800 flex flex-col opacity-40 pointer-events-none cursor-not-allowed">
            <div class="p-4 flex items-center justify-between border-b border-slate-100 dark:border-slate-800">
                <h3 class="font-bold text-sm text-black dark:text-white uppercase tracking-tight">Consultor Ventas
                </h3>
            </div>
            <div class="p-6 space-y-6 flex-1">
                <h4 class="text-xl font-bold text-black dark:text-white">Descripcion Corta del puesto</h4>
                <p class="text-sm text-slate-600 dark:text-slate-400">Continúa donde lo dejaste o explora nuevas
                    certificaciones disponibles.</p>

                <div class="space-y-3">
                    <div class="flex items-center text-sm font-semibold text-black dark:text-white">
                        <span class="material-symbols-outlined text-orange-500 mr-2 text-lg"><i
                                class="ri-check-line"></i></span>
                        Funcion 1
                    </div>
                    <div class="flex items-center text-sm font-semibold text-black dark:text-white">
                        <span class="material-symbols-outlined text-orange-500 mr-2 text-lg"><i
                                class="ri-check-line"></i></span>
                        Funcion 2
                    </div>
                    <div class="flex items-center text-sm font-semibold text-black dark:text-white">
                        <span class="material-symbols-outlined text-orange-500 mr-2 text-lg"><i
                                class="ri-check-line"></i></span>
                        Funcion 3
                    </div>
                </div>
            </div>
            <div class="p-4 border-t border-slate-100 dark:border-slate-800">
                <button
                    class="bg-primary hover:bg-orange-600 text-white px-4 py-2 rounded text-xs font-bold transition-colors">Ver
                    Documento</button>
            </div>
        </div>
        <div
            class="bg-white dark:bg-[#1a1a1a] rounded shadow-sm border border-slate-200 dark:border-slate-800 flex flex-col opacity-40 pointer-events-none cursor-not-allowed">
            <div class="p-4 flex items-center justify-between border-b border-slate-100 dark:border-slate-800">
                <h3 class="font-bold text-sm text-black dark:text-white uppercase tracking-tight">Gerente Marketing</h3>
            </div>
            <div class="p-6 space-y-6 flex-1">
                <div class="flex items-center justify-between mb-4">
                    <p class="text-sm text-slate-600 dark:text-slate-400">Continúa donde lo dejaste o explora nuevas
                        certificaciones disponibles.</p>
                </div>
                <div
                    class="p-4 rounded border border-orange-100 dark:border-orange-900/30 bg-orange-50 dark:bg-orange-900/10">
                    <div class="space-y-3">
                        <div class="flex items-center text-sm font-semibold text-black dark:text-white">
                            <span class="material-symbols-outlined text-orange-500 mr-2 text-lg"><i
                                    class="ri-check-line"></i></span>
                            Funcion 1
                        </div>
                        <div class="flex items-center text-sm font-semibold text-black dark:text-white">
                            <span class="material-symbols-outlined text-orange-500 mr-2 text-lg"><i
                                    class="ri-check-line"></i></span>
                            Funcion 2
                        </div>
                        <div class="flex items-center text-sm font-semibold text-black dark:text-white">
                            <span class="material-symbols-outlined text-orange-500 mr-2 text-lg"><i
                                    class="ri-check-line"></i></span>
                            Funcion 3
                        </div>
                    </div>
                </div>

            </div>
            <div class="p-4 border-t border-slate-100 dark:border-slate-800">
                <button
                    class="bg-primary hover:bg-orange-600 text-white px-4 py-2 rounded text-xs font-bold transition-colors">Ver
                    Documento</button>
            </div>
        </div>
    </div>



@endsection
@push('js')
@endpush
