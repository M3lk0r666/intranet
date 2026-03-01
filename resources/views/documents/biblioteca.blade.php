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
                    <li aria-current="page">
                        <div class="flex items-center">
                            <i class="fas fa-chevron-right text-gray-400 mx-2"></i>
                            <span class="ml-1 text-sm text-primary font-medium md:ml-2">Biblioteca</span>
                        </div>
                    </li>
                </ol>
            </nav>
        </div>
    </div>

    <!-- Encabezado -->
    <div class="mt-8 mb-8">
        <h1 class="text-3xl font-black text-slate-900 tracking-tight mb-2">Biblioteca de Recursos Materiales</h1>
        <p class="text-slate-500  mt-2">Acceda a documentacion, guías, tutoriales, formatos y plantillas oficiales de la
            empresa.</p>
    </div>

    <div class="bg-white rounded-lg shadow p-6 mb-8">
        <section class="space-y-20">
            <div class="scroll-mt-32" id="it">
                <div class="flex items-center gap-4 mb-8">
                    <div class="w-1 h-8 bg-primary rounded-full"></div>
                    <h2 class="text-2xl font-bold text-slate-900">Tecnologías de Información (TI)</h2>
                    <span class="ml-auto text-xs font-bold text-slate-400 uppercase tracking-widest">12 Recursos</span>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    <div
                        class="bg-white p-6 rounded-2xl border border-slate-200 shadow-sm hover:shadow-md transition-shadow group">
                        <div class="flex items-start justify-between mb-4">
                            <div class="w-12 h-12 rounded-xl bg-orange-50 flex items-center justify-center text-primary">
                                <i class="las la-plus text-3xl"></i>
                            </div>
                            <span class="text-[10px] font-bold text-slate-400 bg-slate-50 px-2 py-1 rounded">PDF • 2.4
                                MB</span>
                        </div>
                        <h3 class="font-bold text-slate-900 mb-2 group-hover:text-primary transition-colors">Política de
                            Ciberseguridad 2024</h3>
                        <p class="text-sm text-slate-500 mb-6 line-clamp-2">Lineamientos obligatorios para el manejo de
                            activos digitales y protección de datos corporativos.</p>
                        <button
                            class="w-full py-2.5 bg-primary text-white text-xs font-bold rounded-xl flex items-center justify-center gap-2 hover:bg-slate-800 transition-colors">
                            <span class="material-symbols-outlined text-sm">download</span> Descargar
                        </button>
                    </div>
                    <div
                        class="bg-white p-6 rounded-2xl border border-slate-200 shadow-sm hover:shadow-md transition-shadow group">
                        <div class="flex items-start justify-between mb-4">
                            <div class="w-12 h-12 rounded-xl bg-orange-50 flex items-center justify-center text-primary">
                                <i class="las la-plus text-3xl"></i>
                            </div>
                            <span class="text-[10px] font-bold text-slate-400 bg-slate-50 px-2 py-1 rounded">GUIDE •
                                Web</span>
                        </div>
                        <h3 class="font-bold text-slate-900 mb-2 group-hover:text-primary transition-colors">Manual de
                            Configuración VPN</h3>
                        <p class="text-sm text-slate-500 mb-6 line-clamp-2">Paso a paso para la configuración del cliente
                            VPN corporativo en dispositivos Windows y MacOS.</p>
                        <button
                            class="w-full py-2.5 bg-primary text-white text-xs font-bold rounded-xl flex items-center justify-center gap-2 hover:bg-slate-800 transition-colors">
                            <span class="material-symbols-outlined text-sm">open_in_new</span> Leer Guía
                        </button>
                    </div>
                    <div
                        class="bg-white p-6 rounded-2xl border border-slate-200 shadow-sm hover:shadow-md transition-shadow group">
                        <div class="flex items-start justify-between mb-4">
                            <div class="w-12 h-12 rounded-xl bg-orange-50 flex items-center justify-center text-primary">
                                <i class="las la-plus text-3xl"></i>
                            </div>
                            <span class="text-[10px] font-bold text-slate-400 bg-slate-50 px-2 py-1 rounded">TOOL •
                                EXE</span>
                        </div>
                        <h3 class="font-bold text-slate-900 mb-2 group-hover:text-primary transition-colors">Diagnóstico de
                            Red Local</h3>
                        <p class="text-sm text-slate-500 mb-6 line-clamp-2">Herramienta interna para validación de latencia
                            y puertos abiertos en la red corporativa.</p>
                        <button
                            class="w-full py-2.5 bg-primary text-white text-xs font-bold rounded-xl flex items-center justify-center gap-2 hover:bg-slate-800 transition-colors">
                            <span class="material-symbols-outlined text-sm">download</span> Descargar
                        </button>
                    </div>
                </div>
            </div>
            <div class="scroll-mt-32" id="rrhh">
                <div class="flex items-center gap-4 mb-8">
                    <div class="w-1 h-8 bg-slate-300 rounded-full"></div>
                    <h2 class="text-2xl font-bold text-slate-900">Recursos Humanos</h2>
                    <span class="ml-auto text-xs font-bold text-slate-400 uppercase tracking-widest">8 Recursos</span>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    <div
                        class="bg-white p-6 rounded-2xl border border-slate-200 shadow-sm hover:shadow-md transition-shadow group">
                        <div class="flex items-start justify-between mb-4">
                            <div class="w-12 h-12 rounded-xl bg-orange-50 flex items-center justify-center text-primary">
                                <i class="las la-plus text-3xl"></i>
                            </div>
                            <span class="text-[10px] font-bold text-slate-400 bg-slate-50 px-2 py-1 rounded">DOC • 1.1
                                MB</span>
                        </div>
                        <h3 class="font-bold text-slate-900 mb-2 group-hover:text-primary transition-colors">Código de Ética
                            y Conducta</h3>
                        <p class="text-sm text-slate-500 mb-6 line-clamp-2">Documento integral que rige el comportamiento
                            profesional y valores corporativos de la organización.</p>
                        <button
                            class="w-full py-2.5 bg-primary text-white text-xs font-bold rounded-xl flex items-center justify-center gap-2 hover:bg-slate-800 transition-colors">
                            <span class="material-symbols-outlined text-sm">download</span> Descargar
                        </button>
                    </div>
                    <div
                        class="bg-white p-6 rounded-2xl border border-slate-200 shadow-sm hover:shadow-md transition-shadow group">
                        <div class="flex items-start justify-between mb-4">
                            <div class="w-12 h-12 rounded-xl bg-orange-50 flex items-center justify-center text-primary">
                                <i class="las la-plus text-3xl"></i>
                            </div>
                            <span class="text-[10px] font-bold text-slate-400 bg-slate-50 px-2 py-1 rounded">PDF • 800
                                KB</span>
                        </div>
                        <h3 class="font-bold text-slate-900 mb-2 group-hover:text-primary transition-colors">Calendario de
                            Vacaciones 2024</h3>
                        <p class="text-sm text-slate-500 mb-6 line-clamp-2">Cronograma de días festivos y periodos de
                            solicitud de vacaciones para el personal administrativo.</p>
                        <button
                            class="w-full py-2.5 bg-primary text-white text-xs font-bold rounded-xl flex items-center justify-center gap-2 hover:bg-slate-800 transition-colors">
                            <span class="material-symbols-outlined text-sm">download</span> Descargar
                        </button>
                    </div>
                </div>
            </div>
            <div class="scroll-mt-32" id="ventas">
                <div class="flex items-center gap-4 mb-8">
                    <div class="w-1 h-8 bg-slate-300 rounded-full"></div>
                    <h2 class="text-2xl font-bold text-slate-900">Ventas &amp; Comercial</h2>
                    <span class="ml-auto text-xs font-bold text-slate-400 uppercase tracking-widest">5 Recursos</span>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    <div
                        class="bg-white p-6 rounded-2xl border border-slate-200 shadow-sm hover:shadow-md transition-shadow group">
                        <div class="flex items-start justify-between mb-4">
                            <div class="w-12 h-12 rounded-xl bg-orange-50 flex items-center justify-center text-primary">
                                <i class="las la-plus text-3xl"></i>
                            </div>
                            <span class="text-[10px] font-bold text-slate-400 bg-slate-50 px-2 py-1 rounded">XLS • 4.5
                                MB</span>
                        </div>
                        <h3 class="font-bold text-slate-900 mb-2 group-hover:text-primary transition-colors">Calculadora de
                            Comisiones v4</h3>
                        <p class="text-sm text-slate-500 mb-6 line-clamp-2">Herramienta de cálculo para proyecciones de
                            ventas y bonificaciones mensuales.</p>
                        <button
                            class="w-full py-2.5 bg-primary text-white text-xs font-bold rounded-xl flex items-center justify-center gap-2 hover:bg-slate-800 transition-colors">
                            <span class="material-symbols-outlined text-sm">download</span> Descargar
                        </button>
                    </div>
                </div>
            </div>
        </section>
    </div>



@endsection
@push('js')
@endpush
