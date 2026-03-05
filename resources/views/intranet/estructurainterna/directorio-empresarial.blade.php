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
                    <li aria-current="page">
                        <div class="flex items-center">
                            <i class="fas fa-chevron-right text-gray-400 mx-2"></i>
                            <span class="ml-1 text-sm text-primary font-medium md:ml-2">Directorio</span>
                        </div>
                    </li>
                </ol>
            </nav>
        </div>
    </div>

    <!-- Hero / Search Section -->
    <div class="mb-12 text-center md:text-left py-4">
        <h1 class="text-4xl md:text-5xl font-black mb-4 tracking-tight">Directorio <span
                class="text-primary uppercase">Netjer Networks</span> </h1>
        <p class="text-slate-500 max-w-2xl text-lg mb-8">Acceda a la red interna completa de profesionales de Netjer
            Networks.</p>
        <p class="text-slate-500 max-w-2xl text-lg mb-8"> Busque por nombre, departamento o puesto especializado.</p>
        <div class="flex flex-col md:flex-row gap-4 max-w-4xl mx-auto opacity-40 pointer-events-none cursor-not-allowed">
            <!-- Input de búsqueda -->
            <div class="relative flex-grow group">
                <span
                    class="absolute left-4 top-1/2 -translate-y-1/2 text-slate-400 group-focus-within:text-orange-600 transition-colors">
                    <i class="las la-search text-lg"></i>
                </span>
                <input type="text" placeholder="Buscar por nombre, extensión, puesto o departamento..."
                    class="w-full pl-12 pr-4 py-4 rounded-xl border border-slate-200 bg-white focus:ring-2 focus:ring-orange-400 focus:border-orange-400 transition-all shadow-sm hover:shadow-md" />
            </div>

            <!-- Botón Filtrar -->
            <button
                class="flex items-center justify-center gap-2 px-6 py-4 rounded-xl bg-slate-900 text-white hover:bg-slate-800 transition-colors shadow-sm">
                <i class="las la-filter text-lg"></i>
                <span class="font-medium">Filtrar</span>
            </button>

            <!-- Botón Buscar -->
            <button
                class="flex items-center justify-center px-8 py-4 rounded-xl bg-orange-600 text-white font-medium hover:bg-orange-500 transition-colors shadow-lg shadow-orange-400/20">
                <i class="las la-search text-lg"></i>
                <span>Buscar</span>
            </button>

        </div>
    </div>

    <div class="sticky top-16 z-40 bg-white/70 backdrop-blur-md border-b border-slate-200 shadow-sm">
        <div class="max-w-[1600px] mx-auto px-4 sm:px-6 lg:px-8 py-6 text-center">
            <!-- Título -->
            <h2 class="text-xl sm:text-2xl font-semibold text-slate-700 mb-4">
                Número Interno de Oficina
            </h2>
            <!-- Número con botones -->
            <div class="inline-flex items-center justify-center gap-4">
                <!-- Número -->
                <p id="office-number" class="text-3xl sm:text-4xl font-extrabold text-orange-600 tracking-wide">
                    +52 55 1054-1184/1185
                </p>
            </div>
        </div>
    </div>

    <!-- Employee Grid -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6 py-10">
        <!-- Card de colaborador -->
        <div
            class="group bg-white border border-slate-200 rounded-xl p-6 hover:border-orange-400 hover:shadow-lg hover:-translate-y-1 transition-all duration-300">
            <!-- Top: Foto + Botón de acción -->
            <div class="flex justify-between items-start mb-4">
                <!-- Foto -->
                <div
                    class="h-20 w-20 rounded-xl overflow-hidden border-2 border-slate-100 group-hover:border-orange-400 transition-colors">
                    <img class="w-full h-full object-cover" src="{{ asset('storage/media/male.png') }}" />
                </div>
            </div>
            <!-- Nombre y Cargo -->
            <h3 class="text-lg font-semibold text-slate-800 mb-1">Alberto Ramírez</h3>
            <p class="text-sm font-medium text-orange-600 uppercase tracking-wider mb-4">
                Ingeniero Senior
            </p>
            <!-- Información de contacto -->
            <div class="space-y-3 pt-4 border-t border-slate-100">
                <!-- Extensión -->
                <div class="flex items-center gap-3 text-sm text-slate-600">
                    <i class="las la-phone-volume text-lg text-slate-400"></i>
                    <span class="font-medium">
                        Zoom Ext: <span class="text-slate-800">105</span>
                    </span>
                </div>
                <!-- Email -->
                <div class="flex items-center gap-3 text-sm text-slate-600">
                    <i class="las la-envelope text-lg text-slate-400"></i>
                    <a class="hover:text-orange-600 transition-colors" href="mailto:alberto.ramirez@netjernetworks.com">
                        alberto.ramirez@netjernetworks.com
                    </a>
                </div>
            </div>
        </div>
        <!-- Card de colaborador -->
        <div
            class="group bg-white border border-slate-200 rounded-xl p-6 hover:border-orange-400 hover:shadow-lg hover:-translate-y-1 transition-all duration-300">
            <!-- Top: Foto + Botón de acción -->
            <div class="flex justify-between items-start mb-4">
                <!-- Foto -->
                <div
                    class="h-20 w-20 rounded-xl overflow-hidden border-2 border-slate-100 group-hover:border-orange-400 transition-colors">
                    <img class="w-full h-full object-cover" src="{{ asset('storage/media/female.png') }}" />
                </div>
            </div>
            <!-- Nombre y Cargo -->
            <h3 class="text-lg font-semibold text-slate-800 mb-1">Ana Karen Gonzalez</h3>
            <p class="text-sm font-medium text-orange-600 uppercase tracking-wider mb-4">
                Gerente de Contabilidad y Finanzas
            </p>
            <!-- Información de contacto -->
            <div class="space-y-3 pt-4 border-t border-slate-100">
                <!-- Extensión -->
                <div class="flex items-center gap-3 text-sm text-slate-600">
                    <i class="las la-phone-volume text-lg text-slate-400"></i>
                    <span class="font-medium">
                        Zoom Ext: <span class="text-slate-800">103</span>
                    </span>
                </div>
                <!-- Email -->
                <div class="flex items-center gap-3 text-sm text-slate-600">
                    <i class="las la-envelope text-lg text-slate-400"></i>
                    <a class="hover:text-orange-600 transition-colors" href="mailto:anakaren.gonzalez@netjernetworks.com">
                        anakaren.gonzalez@netjernetworks.com
                    </a>
                </div>
            </div>
        </div>
        <!-- Card de colaborador -->
        <div
            class="group bg-white border border-slate-200 rounded-xl p-6 hover:border-orange-400 hover:shadow-lg hover:-translate-y-1 transition-all duration-300">
            <!-- Top: Foto + Botón de acción -->
            <div class="flex justify-between items-start mb-4">
                <!-- Foto -->
                <div
                    class="h-20 w-20 rounded-xl overflow-hidden border-2 border-slate-100 group-hover:border-orange-400 transition-colors">
                    <img class="w-full h-full object-cover" src="{{ asset('storage/media/male.png') }}" />
                </div>
            </div>
            <!-- Nombre y Cargo -->
            <h3 class="text-lg font-semibold text-slate-800 mb-1">Arturo Hernández</h3>
            <p class="text-sm font-medium text-orange-600 uppercase tracking-wider mb-4">
                Training
            </p>
            <!-- Información de contacto -->
            <div class="space-y-3 pt-4 border-t border-slate-100">
                <!-- Extensión -->
                <div class="flex items-center gap-3 text-sm text-slate-600">
                    <i class="las la-phone-volume text-lg text-slate-400"></i>
                    <span class="font-medium">
                        Zoom Ext: <span class="text-slate-800">145</span>
                    </span>
                </div>
                <!-- Email -->
                <div class="flex items-center gap-3 text-sm text-slate-600">
                    <i class="las la-envelope text-lg text-slate-400"></i>
                    <a class="hover:text-orange-600 transition-colors" href="mailto:arturo.hernandez@netjernetworks.com">
                        arturo.hernandez@netjernetworks.com
                    </a>
                </div>
            </div>
        </div>
        <!-- Card de colaborador -->
        <div
            class="group bg-white border border-slate-200 rounded-xl p-6 hover:border-orange-400 hover:shadow-lg hover:-translate-y-1 transition-all duration-300">
            <!-- Top: Foto + Botón de acción -->
            <div class="flex justify-between items-start mb-4">
                <!-- Foto -->
                <div
                    class="h-20 w-20 rounded-xl overflow-hidden border-2 border-slate-100 group-hover:border-orange-400 transition-colors">
                    <img class="w-full h-full object-cover" src="{{ asset('storage/media/male.png') }}" />
                </div>
            </div>
            <!-- Nombre y Cargo -->
            <h3 class="text-lg font-semibold text-slate-800 mb-1">Carlos Junco</h3>
            <p class="text-sm font-medium text-orange-600 uppercase tracking-wider mb-4">
                Director Comercial
            </p>
            <!-- Información de contacto -->
            <div class="space-y-3 pt-4 border-t border-slate-100">
                <!-- Extensión -->
                <div class="flex items-center gap-3 text-sm text-slate-600">
                    <i class="las la-phone-volume text-lg text-slate-400"></i>
                    <span class="font-medium">
                        Zoom Ext: <span class="text-slate-800">102</span>
                    </span>
                </div>
                <!-- Email -->
                <div class="flex items-center gap-3 text-sm text-slate-600">
                    <i class="las la-envelope text-lg text-slate-400"></i>
                    <a class="hover:text-orange-600 transition-colors" href="mailto:carlos.junco@netjernetworks.com">
                        carlos.junco@netjernetworks.com
                    </a>

                </div>
                <div class="flex items-center gap-3 text-sm text-slate-600">
                    <i class="las la-envelope text-lg text-slate-400"></i>
                    <a class="hover:text-orange-600 transition-colors" href="mailto:carlos.junco@rexten.io">
                        carlos.junco@rexten.io
                    </a>

                </div>
            </div>
        </div>
        <!-- Card de colaborador -->
        <div
            class="group bg-white border border-slate-200 rounded-xl p-6 hover:border-orange-400 hover:shadow-lg hover:-translate-y-1 transition-all duration-300">
            <!-- Top: Foto + Botón de acción -->
            <div class="flex justify-between items-start mb-4">
                <!-- Foto -->
                <div
                    class="h-20 w-20 rounded-xl overflow-hidden border-2 border-slate-100 group-hover:border-orange-400 transition-colors">
                    <img class="w-full h-full object-cover" src="{{ asset('storage/media/male.png') }}" />
                </div>
            </div>
            <!-- Nombre y Cargo -->
            <h3 class="text-lg font-semibold text-slate-800 mb-1">Daniel Solorzano</h3>
            <p class="text-sm font-medium text-orange-600 uppercase tracking-wider mb-4">
                Ingeniero Senior
            </p>
            <!-- Información de contacto -->
            <div class="space-y-3 pt-4 border-t border-slate-100">
                <!-- Extensión -->
                <div class="flex items-center gap-3 text-sm text-slate-600">
                    <i class="las la-phone-volume text-lg text-slate-400"></i>
                    <span class="font-medium">
                        Zoom Ext: <span class="text-slate-800">148</span>
                    </span>
                </div>
                <!-- Email -->
                <div class="flex items-center gap-3 text-sm text-slate-600">
                    <i class="las la-envelope text-lg text-slate-400"></i>
                    <a class="hover:text-orange-600 transition-colors" href="mailto:daniel.solorzano@netjernetworks.com">
                        daniel.solorzano@netjernetworks.co
                    </a>
                </div>
            </div>
        </div>
        <!-- Card de colaborador -->
        <div
            class="group bg-white border border-slate-200 rounded-xl p-6 hover:border-orange-400 hover:shadow-lg hover:-translate-y-1 transition-all duration-300">
            <!-- Top: Foto + Botón de acción -->
            <div class="flex justify-between items-start mb-4">
                <!-- Foto -->
                <div
                    class="h-20 w-20 rounded-xl overflow-hidden border-2 border-slate-100 group-hover:border-orange-400 transition-colors">
                    <img class="w-full h-full object-cover" src="{{ asset('storage/media/male.png') }}" />
                </div>
            </div>
            <!-- Nombre y Cargo -->
            <h3 class="text-lg font-semibold text-slate-800 mb-1">Emiliano Garcia</h3>
            <p class="text-sm font-medium text-orange-600 uppercase tracking-wider mb-4">
                Sales Development Rep. Senior
            </p>
            <!-- Información de contacto -->
            <div class="space-y-3 pt-4 border-t border-slate-100">
                <!-- Extensión -->
                <div class="flex items-center gap-3 text-sm text-slate-600">
                    <i class="las la-phone-volume text-lg text-slate-400"></i>
                    <span class="font-medium">
                        Zoom Ext: <span class="text-slate-800">207</span>
                    </span>
                </div>
                <!-- Email -->
                <div class="flex items-center gap-3 text-sm text-slate-600">
                    <i class="las la-envelope text-lg text-slate-400"></i>
                    <a class="hover:text-orange-600 transition-colors" href="mailto:emiliano.garcia@netjernetworks.com">
                        emiliano.garcia@netjernetworks.com
                    </a>
                </div>
            </div>
        </div>
        <!-- Card de colaborador -->
        <div
            class="group bg-white border border-slate-200 rounded-xl p-6 hover:border-orange-400 hover:shadow-lg hover:-translate-y-1 transition-all duration-300">
            <!-- Top: Foto + Botón de acción -->
            <div class="flex justify-between items-start mb-4">
                <!-- Foto -->
                <div
                    class="h-20 w-20 rounded-xl overflow-hidden border-2 border-slate-100 group-hover:border-orange-400 transition-colors">
                    <img class="w-full h-full object-cover" src="{{ asset('storage/media/male.png') }}" />
                </div>
            </div>
            <!-- Nombre y Cargo -->
            <h3 class="text-lg font-semibold text-slate-800 mb-1">Fernando Arzaluz</h3>
            <p class="text-sm font-medium text-orange-600 uppercase tracking-wider mb-4">
                Director de Ingenieria
            </p>
            <!-- Información de contacto -->
            <div class="space-y-3 pt-4 border-t border-slate-100">
                <!-- Extensión -->
                <div class="flex items-center gap-3 text-sm text-slate-600">
                    <i class="las la-phone-volume text-lg text-slate-400"></i>
                    <span class="font-medium">
                        Zoom Ext: <span class="text-slate-800">113</span>
                    </span>
                </div>
                <!-- Email -->
                <div class="flex items-center gap-3 text-sm text-slate-600">
                    <i class="las la-envelope text-lg text-slate-400"></i>
                    <a class="hover:text-orange-600 transition-colors" href="mailto:fernando.arzaluz@netjernetworks.com">
                        fernando.arzaluz@netjernetworks.com
                    </a>
                </div>
                <div class="flex items-center gap-3 text-sm text-slate-600">
                    <i class="las la-envelope text-lg text-slate-400"></i>
                    <a class="hover:text-orange-600 transition-colors" href="mailto:fernando.arzaluz@rexten.io">
                        fernando.arzaluz@rexten.io
                    </a>
                </div>
            </div>
        </div>
        <!-- Card de colaborador -->
        <div
            class="group bg-white border border-slate-200 rounded-xl p-6 hover:border-orange-400 hover:shadow-lg hover:-translate-y-1 transition-all duration-300">
            <!-- Top: Foto + Botón de acción -->
            <div class="flex justify-between items-start mb-4">
                <!-- Foto -->
                <div
                    class="h-20 w-20 rounded-xl overflow-hidden border-2 border-slate-100 group-hover:border-orange-400 transition-colors">
                    <img class="w-full h-full object-cover" src="{{ asset('storage/media/male.png') }}" />
                </div>
            </div>
            <!-- Nombre y Cargo -->
            <h3 class="text-lg font-semibold text-slate-800 mb-1">Francisco Mass</h3>
            <p class="text-sm font-medium text-orange-600 uppercase tracking-wider mb-4">
                Service Delivery Manager
            </p>
            <!-- Información de contacto -->
            <div class="space-y-3 pt-4 border-t border-slate-100">
                <!-- Extensión -->
                <div class="flex items-center gap-3 text-sm text-slate-600">
                    <i class="las la-phone-volume text-lg text-slate-400"></i>
                    <span class="font-medium">
                        Zoom Ext: <span class="text-slate-800">203</span>
                    </span>
                </div>
                <!-- Email -->
                <div class="flex items-center gap-3 text-sm text-slate-600">
                    <i class="las la-envelope text-lg text-slate-400"></i>
                    <a class="hover:text-orange-600 transition-colors" href="mailto:francisco.maass@netjernetworks.com">
                        francisco.maass@netjernetworks.com
                    </a>
                </div>
            </div>
        </div>
        <!-- Card de colaborador -->
        <div
            class="group bg-white border border-slate-200 rounded-xl p-6 hover:border-orange-400 hover:shadow-lg hover:-translate-y-1 transition-all duration-300">
            <!-- Top: Foto + Botón de acción -->
            <div class="flex justify-between items-start mb-4">
                <!-- Foto -->
                <div
                    class="h-20 w-20 rounded-xl overflow-hidden border-2 border-slate-100 group-hover:border-orange-400 transition-colors">
                    <img class="w-full h-full object-cover" src="{{ asset('storage/media/male.png') }}" />
                </div>
            </div>
            <!-- Nombre y Cargo -->
            <h3 class="text-lg font-semibold text-slate-800 mb-1">Gabriel Vazquez</h3>
            <p class="text-sm font-medium text-orange-600 uppercase tracking-wider mb-4">
                Ingeniero Senior
            </p>
            <!-- Información de contacto -->
            <div class="space-y-3 pt-4 border-t border-slate-100">
                <!-- Extensión -->
                <div class="flex items-center gap-3 text-sm text-slate-600">
                    <i class="las la-phone-volume text-lg text-slate-400"></i>
                    <span class="font-medium">
                        Zoom Ext: <span class="text-slate-800">122</span>
                    </span>
                </div>
                <!-- Email -->
                <div class="flex items-center gap-3 text-sm text-slate-600">
                    <i class="las la-envelope text-lg text-slate-400"></i>
                    <a class="hover:text-orange-600 transition-colors" href="mailto:gabriel.vazquez@netjernetworks.com">
                        gabriel.vazquez@netjernetworks.com
                    </a>
                </div>
            </div>
        </div>
        <!-- Card de colaborador -->
        <div
            class="group bg-white border border-slate-200 rounded-xl p-6 hover:border-orange-400 hover:shadow-lg hover:-translate-y-1 transition-all duration-300">
            <!-- Top: Foto + Botón de acción -->
            <div class="flex justify-between items-start mb-4">
                <!-- Foto -->
                <div
                    class="h-20 w-20 rounded-xl overflow-hidden border-2 border-slate-100 group-hover:border-orange-400 transition-colors">
                    <img class="w-full h-full object-cover" src="{{ asset('storage/media/female.png') }}" />
                </div>
            </div>
            <!-- Nombre y Cargo -->
            <h3 class="text-lg font-semibold text-slate-800 mb-1">Gabriela Cejudo</h3>
            <p class="text-sm font-medium text-orange-600 uppercase tracking-wider mb-4">
                Project Manager
            </p>
            <!-- Información de contacto -->
            <div class="space-y-3 pt-4 border-t border-slate-100">
                <!-- Extensión -->
                <div class="flex items-center gap-3 text-sm text-slate-600">
                    <i class="las la-phone-volume text-lg text-slate-400"></i>
                    <span class="font-medium">
                        Zoom Ext: <span class="text-slate-800">155</span>
                    </span>
                </div>
                <!-- Email -->
                <div class="flex items-center gap-3 text-sm text-slate-600">
                    <i class="las la-envelope text-lg text-slate-400"></i>
                    <a class="hover:text-orange-600 transition-colors" href="mailto:gabriela.cejudo@netjernetworks.com">
                        gabriela.cejudo@netjernetworks.com
                    </a>
                </div>
            </div>
        </div>
        <!-- Card de colaborador -->
        <div
            class="group bg-white border border-slate-200 rounded-xl p-6 hover:border-orange-400 hover:shadow-lg hover:-translate-y-1 transition-all duration-300">
            <!-- Top: Foto + Botón de acción -->
            <div class="flex justify-between items-start mb-4">
                <!-- Foto -->
                <div
                    class="h-20 w-20 rounded-xl overflow-hidden border-2 border-slate-100 group-hover:border-orange-400 transition-colors">
                    <img class="w-full h-full object-cover" src="{{ asset('storage/media/female.png') }}" />
                </div>
            </div>
            <!-- Nombre y Cargo -->
            <h3 class="text-lg font-semibold text-slate-800 mb-1">Giselle Martinez</h3>
            <p class="text-sm font-medium text-orange-600 uppercase tracking-wider mb-4">
                Directora de Administración y Finanzas
            </p>
            <!-- Información de contacto -->
            <div class="space-y-3 pt-4 border-t border-slate-100">
                <!-- Extensión -->
                <div class="flex items-center gap-3 text-sm text-slate-600">
                    <i class="las la-phone-volume text-lg text-slate-400"></i>
                    <span class="font-medium">
                        Zoom Ext: <span class="text-slate-800">101</span>
                    </span>
                </div>
                <!-- Email -->
                <div class="flex items-center gap-3 text-sm text-slate-600">
                    <i class="las la-envelope text-lg text-slate-400"></i>
                    <a class="hover:text-orange-600 transition-colors" href="mailto:giselle.mel@netjernetworks.com">
                        giselle.mel@netjernetworks.com
                    </a>
                </div>
                <div class="flex items-center gap-3 text-sm text-slate-600">
                    <i class="las la-envelope text-lg text-slate-400"></i>
                    <a class="hover:text-orange-600 transition-colors" href="mailto:giselle.mel@rexten.io">
                        giselle.mel@rexten.io
                    </a>
                </div>
            </div>
        </div>
        <!-- Card de colaborador -->
        <div
            class="group bg-white border border-slate-200 rounded-xl p-6 hover:border-orange-400 hover:shadow-lg hover:-translate-y-1 transition-all duration-300">
            <!-- Top: Foto + Botón de acción -->
            <div class="flex justify-between items-start mb-4">
                <!-- Foto -->
                <div
                    class="h-20 w-20 rounded-xl overflow-hidden border-2 border-slate-100 group-hover:border-orange-400 transition-colors">
                    <img class="w-full h-full object-cover" src="{{ asset('storage/media/male.png') }}" />
                </div>
            </div>
            <!-- Nombre y Cargo -->
            <h3 class="text-lg font-semibold text-slate-800 mb-1">José Torres</h3>
            <p class="text-sm font-medium text-orange-600 uppercase tracking-wider mb-4">
                Consultor ODOO / Service Manager
            </p>
            <!-- Información de contacto -->
            <div class="space-y-3 pt-4 border-t border-slate-100">
                <!-- Extensión -->
                <div class="flex items-center gap-3 text-sm text-slate-600">
                    <i class="las la-phone-volume text-lg text-slate-400"></i>
                    <span class="font-medium">
                        Zoom Ext: <span class="text-slate-800">106</span>
                    </span>
                </div>
                <!-- Email -->
                <div class="flex items-center gap-3 text-sm text-slate-600">
                    <i class="las la-envelope text-lg text-slate-400"></i>
                    <a class="hover:text-orange-600 transition-colors" href="mailto:jose.torres@netjernetworks.com">
                        jose.torres@netjernetworks.com
                    </a>
                </div>
            </div>
        </div>
        <!-- Card de colaborador -->
        <div
            class="group bg-white border border-slate-200 rounded-xl p-6 hover:border-orange-400 hover:shadow-lg hover:-translate-y-1 transition-all duration-300">
            <!-- Top: Foto + Botón de acción -->
            <div class="flex justify-between items-start mb-4">
                <!-- Foto -->
                <div
                    class="h-20 w-20 rounded-xl overflow-hidden border-2 border-slate-100 group-hover:border-orange-400 transition-colors">
                    <img class="w-full h-full object-cover" src="{{ asset('storage/media/male.png') }}" />
                </div>
            </div>
            <!-- Nombre y Cargo -->
            <h3 class="text-lg font-semibold text-slate-800 mb-1">Marco Antonio Ortiz</h3>
            <p class="text-sm font-medium text-orange-600 uppercase tracking-wider mb-4">
                Sales Development Rep.
            </p>
            <!-- Información de contacto -->
            <div class="space-y-3 pt-4 border-t border-slate-100">
                <!-- Extensión -->
                <div class="flex items-center gap-3 text-sm text-slate-600">
                    <i class="las la-phone-volume text-lg text-slate-400"></i>
                    <span class="font-medium">
                        Zoom Ext: <span class="text-slate-800">205</span>
                    </span>
                </div>
                <!-- Email -->
                <div class="flex items-center gap-3 text-sm text-slate-600">
                    <i class="las la-envelope text-lg text-slate-400"></i>
                    <a class="hover:text-orange-600 transition-colors" href="mailto:marco.ortiz@netjernetworks.com">
                        marco.ortiz@netjernetworks.com
                    </a>
                </div>
            </div>
        </div>
        <!-- Card de colaborador -->
        <div
            class="group bg-white border border-slate-200 rounded-xl p-6 hover:border-orange-400 hover:shadow-lg hover:-translate-y-1 transition-all duration-300">
            <!-- Top: Foto + Botón de acción -->
            <div class="flex justify-between items-start mb-4">
                <!-- Foto -->
                <div
                    class="h-20 w-20 rounded-xl overflow-hidden border-2 border-slate-100 group-hover:border-orange-400 transition-colors">
                    <img class="w-full h-full object-cover" src="{{ asset('storage/media/male.png') }}" />
                </div>
            </div>
            <!-- Nombre y Cargo -->
            <h3 class="text-lg font-semibold text-slate-800 mb-1">Miguel Angel Ortiz</h3>
            <p class="text-sm font-medium text-orange-600 uppercase tracking-wider mb-4">
                Analista de Datos y Observabilidad
            </p>
            <!-- Información de contacto -->
            <div class="space-y-3 pt-4 border-t border-slate-100">
                <!-- Extensión -->
                <div class="flex items-center gap-3 text-sm text-slate-600">
                    <i class="las la-phone-volume text-lg text-slate-400"></i>
                    <span class="font-medium">
                        Zoom Ext: <span class="text-slate-800">204</span>
                    </span>
                </div>
                <!-- Email -->
                <div class="flex items-center gap-3 text-sm text-slate-600">
                    <i class="las la-envelope text-lg text-slate-400"></i>
                    <a class="hover:text-orange-600 transition-colors" href="mailto:miguel.ortiz@netjernetworks.com">
                        miguel.ortiz@netjernetworks.com
                    </a>
                </div>
            </div>
        </div>
        <!-- Card de colaborador -->
        <div
            class="group bg-white border border-slate-200 rounded-xl p-6 hover:border-orange-400 hover:shadow-lg hover:-translate-y-1 transition-all duration-300">
            <!-- Top: Foto + Botón de acción -->
            <div class="flex justify-between items-start mb-4">
                <!-- Foto -->
                <div
                    class="h-20 w-20 rounded-xl overflow-hidden border-2 border-slate-100 group-hover:border-orange-400 transition-colors">
                    <img class="w-full h-full object-cover" src="{{ asset('storage/media/female.png') }}" />
                </div>
            </div>
            <!-- Nombre y Cargo -->
            <h3 class="text-lg font-semibold text-slate-800 mb-1">Priscilla Iturralde</h3>
            <p class="text-sm font-medium text-orange-600 uppercase tracking-wider mb-4">
                Costumer Success Rep.
            </p>
            <!-- Información de contacto -->
            <div class="space-y-3 pt-4 border-t border-slate-100">
                <!-- Extensión -->
                <div class="flex items-center gap-3 text-sm text-slate-600">
                    <i class="las la-phone-volume text-lg text-slate-400"></i>
                    <span class="font-medium">
                        Zoom Ext: <span class="text-slate-800">206</span>
                    </span>
                </div>
                <!-- Email -->
                <div class="flex items-center gap-3 text-sm text-slate-600">
                    <i class="las la-envelope text-lg text-slate-400"></i>
                    <a class="hover:text-orange-600 transition-colors"
                        href="mailto:priscilla.iturralde@netjernetworks.com">
                        priscilla.iturralde@netjernetworks.com
                    </a>
                </div>
            </div>
        </div>
        <!-- Card de colaborador -->
        <div
            class="group bg-white border border-slate-200 rounded-xl p-6 hover:border-orange-400 hover:shadow-lg hover:-translate-y-1 transition-all duration-300">
            <!-- Top: Foto + Botón de acción -->
            <div class="flex justify-between items-start mb-4">
                <!-- Foto -->
                <div
                    class="h-20 w-20 rounded-xl overflow-hidden border-2 border-slate-100 group-hover:border-orange-400 transition-colors">
                    <img class="w-full h-full object-cover" src="{{ asset('storage/media/male.png') }}" />
                </div>
            </div>
            <!-- Nombre y Cargo -->
            <h3 class="text-lg font-semibold text-slate-800 mb-1">Rogelio Marín</h3>
            <p class="text-sm font-medium text-orange-600 uppercase tracking-wider mb-4">
                CINO
            </p>
            <!-- Información de contacto -->
            <div class="space-y-3 pt-4 border-t border-slate-100">
                <!-- Extensión -->
                <div class="flex items-center gap-3 text-sm text-slate-600">
                    <i class="las la-phone-volume text-lg text-slate-400"></i>
                    <span class="font-medium">
                        Zoom Ext: <span class="text-slate-800">143</span>
                    </span>
                </div>
                <!-- Email -->
                <div class="flex items-center gap-3 text-sm text-slate-600">
                    <i class="las la-envelope text-lg text-slate-400"></i>
                    <a class="hover:text-orange-600 transition-colors" href="mailto:rogelio.marin@netjernetworks.com">
                        rogelio.marin@netjernetworks.com
                    </a>
                </div>
            </div>
        </div>
        <!-- Card de colaborador -->
        <div
            class="group bg-white border border-slate-200 rounded-xl p-6 hover:border-orange-400 hover:shadow-lg hover:-translate-y-1 transition-all duration-300">
            <!-- Top: Foto + Botón de acción -->
            <div class="flex justify-between items-start mb-4">
                <!-- Foto -->
                <div
                    class="h-20 w-20 rounded-xl overflow-hidden border-2 border-slate-100 group-hover:border-orange-400 transition-colors">
                    <img class="w-full h-full object-cover" src="{{ asset('storage/media/male.png') }}" />
                </div>
            </div>
            <!-- Nombre y Cargo -->
            <h3 class="text-lg font-semibold text-slate-800 mb-1">Samuel Trejo</h3>
            <p class="text-sm font-medium text-orange-600 uppercase tracking-wider mb-4">
                Dirección Service Delivery, PM., DevOps
            </p>
            <!-- Información de contacto -->
            <div class="space-y-3 pt-4 border-t border-slate-100">
                <!-- Extensión -->
                <div class="flex items-center gap-3 text-sm text-slate-600">
                    <i class="las la-phone-volume text-lg text-slate-400"></i>
                    <span class="font-medium">
                        Zoom Ext: <span class="text-slate-800">118</span>
                    </span>
                </div>
                <!-- Email -->
                <div class="flex items-center gap-3 text-sm text-slate-600">
                    <i class="las la-envelope text-lg text-slate-400"></i>
                    <a class="hover:text-orange-600 transition-colors" href="mailto:samuel.trejo@netjernetworks.com">
                        samuel.trejo@netjernetworks.com
                    </a>
                </div>
            </div>
        </div>
        <!-- Card de colaborador -->
        <div
            class="group bg-white border border-slate-200 rounded-xl p-6 hover:border-orange-400 hover:shadow-lg hover:-translate-y-1 transition-all duration-300">
            <!-- Top: Foto + Botón de acción -->
            <div class="flex justify-between items-start mb-4">
                <!-- Foto -->
                <div
                    class="h-20 w-20 rounded-xl overflow-hidden border-2 border-slate-100 group-hover:border-orange-400 transition-colors">
                    <img class="w-full h-full object-cover" src="{{ asset('storage/media/female.png') }}" />
                </div>
            </div>
            <!-- Nombre y Cargo -->
            <h3 class="text-lg font-semibold text-slate-800 mb-1">Viridiana Crespo</h3>
            <p class="text-sm font-medium text-orange-600 uppercase tracking-wider mb-4">
                Inside Sites
            </p>
            <!-- Información de contacto -->
            <div class="space-y-3 pt-4 border-t border-slate-100">
                <!-- Extensión -->
                <div class="flex items-center gap-3 text-sm text-slate-600">
                    <i class="las la-phone-volume text-lg text-slate-400"></i>
                    <span class="font-medium">
                        Zoom Ext: <span class="text-slate-800">109</span>
                    </span>
                </div>
                <!-- Email -->
                <div class="flex items-center gap-3 text-sm text-slate-600">
                    <i class="las la-envelope text-lg text-slate-400"></i>
                    <a class="hover:text-orange-600 transition-colors" href="mailto:viridiana.crespo@netjernetworks.com">
                        viridiana.crespo@netjernetworks.com
                    </a>
                </div>
            </div>
        </div>
        <!-- Card de colaborador -->
        <div
            class="group bg-white border border-slate-200 rounded-xl p-6 hover:border-orange-400 hover:shadow-lg hover:-translate-y-1 transition-all duration-300">
            <!-- Top: Foto + Botón de acción -->
            <div class="flex justify-between items-start mb-4">
                <!-- Foto -->
                <div
                    class="h-20 w-20 rounded-xl overflow-hidden border-2 border-slate-100 group-hover:border-orange-400 transition-colors">
                    <img class="w-full h-full object-cover" src="{{ asset('storage/media/male.png') }}" />
                </div>
            </div>
            <!-- Nombre y Cargo -->
            <h3 class="text-lg font-semibold text-slate-800 mb-1">Xavier Martinez</h3>
            <p class="text-sm font-medium text-orange-600 uppercase tracking-wider mb-4">
                CEO
            </p>
            <!-- Información de contacto -->
            <div class="space-y-3 pt-4 border-t border-slate-100">
                <!-- Extensión -->
                <div class="flex items-center gap-3 text-sm text-slate-600">
                    <i class="las la-phone-volume text-lg text-slate-400"></i>
                    <span class="font-medium">
                        Zoom Ext: <span class="text-slate-800">107</span>
                    </span>
                </div>
                <!-- Email -->
                <div class="flex items-center gap-3 text-sm text-slate-600">
                    <i class="las la-envelope text-lg text-slate-400"></i>
                    <a class="hover:text-orange-600 transition-colors" href="mailto:xavier.martinez@netjernetworks.com">
                        xavier.martinez@netjernetworks.com
                    </a>
                </div>
                <div class="flex items-center gap-3 text-sm text-slate-600">
                    <i class="las la-envelope text-lg text-slate-400"></i>
                    <a class="hover:text-orange-600 transition-colors" href="mailto:xavier.martinez@rexten.io">
                        xavier.martinez@rexten.io
                    </a>
                </div>
            </div>
        </div>
        <!-- Card de colaborador -->
        <div
            class="group bg-white border border-slate-200 rounded-xl p-6 hover:border-orange-400 hover:shadow-lg hover:-translate-y-1 transition-all duration-300">
            <!-- Top: Foto + Botón de acción -->
            <div class="flex justify-between items-start mb-4">
                <!-- Foto -->
                <div
                    class="h-20 w-20 rounded-xl overflow-hidden border-2 border-slate-100 group-hover:border-orange-400 transition-colors">
                    <img class="w-full h-full object-cover" src="{{ asset('storage/media/male.png') }}" />
                </div>
            </div>
            <!-- Nombre y Cargo -->
            <h3 class="text-lg font-semibold text-slate-800 mb-1">Yanni Germain Camargo Vera</h3>
            <p class="text-sm font-medium text-orange-600 uppercase tracking-wider mb-4">
                Ingeniero de Software y Datos
            </p>
            <!-- Información de contacto -->
            <div class="space-y-3 pt-4 border-t border-slate-100">
                <!-- Extensión -->
                <div class="flex items-center gap-3 text-sm text-slate-600">
                    <i class="las la-phone-volume text-lg text-slate-400"></i>
                    <span class="font-medium">
                        Zoom Ext: <span class="text-slate-800">119</span>
                    </span>
                </div>
                <!-- Email -->
                <div class="flex items-center gap-3 text-sm text-slate-600">
                    <i class="las la-envelope text-lg text-slate-400"></i>
                    <a class="hover:text-orange-600 transition-colors" href="mailto:yanni.camargo@netjernetworks.com">
                        yanni.camargo@netjernetworks.com
                    </a>
                </div>
            </div>
        </div>



    </div>

    <!-- Pagination Placeholder -->
    <div class="mt-12 flex justify-center">
        Paginacion
    </div>

@endsection
@push('js')
@endpush
