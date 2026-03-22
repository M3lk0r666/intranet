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
                            <a href="{{ route('procesos-empresariales') }}"
                                class="ml-1 text-sm text-gray-600 hover:text-orange-600 md:ml-2">Procesos Empresariales</a>
                        </div>
                    </li>
                    <li aria-current="page">
                        <div class="flex items-center">
                            <i class="fas fa-chevron-right text-gray-400 mx-2"></i>
                            <span class="ml-1 text-sm text-primary font-medium md:ml-2">Imagen Corporativa</span>
                        </div>
                    </li>
                </ol>
            </nav>
        </div>
    </div>

    <!-- Encabezado -->
    <div class="mb-8 mt-6">
        <h1 class="text-3xl font-bold text-gray-800 mb-2">Recursos de Marca</h1>
        <p class="text-gray-600">Bienvenido al centro de la identidad digital de Netjer Networks.</p>
        <p class="text-gray-600"> Acceda a nuestros fondos
            institucionales, presentaciones y recursos visuales más recientes.</p>
    </div>

    <div class="bg-white rounded-lg shadow p-6 mb-8">
        <!-- Category Tabs -->
        <div class="mb-12 overflow-x-auto">
            <div class="flex border-b border-slate-200 dark:border-slate-800 min-w-max">
                <a class="px-6 py-4 border-b-2 border-primary text-primary font-bold text-sm flex items-center gap-2"
                    href="#backgrounds">
                    <i class="las la-image text-xl"></i>
                    Backgrounds para Conferencias
                </a>
                <a class="px-6 py-4 border-b-2 border-transparent text-slate-500 hover:text-primary font-bold text-sm flex items-center gap-2 transition-all"
                    href="#templates">
                    <i class="las la-file-powerpoint text-xl"></i>
                    Templates Presentación
                </a>
                <a class="px-6 py-4 border-b-2 border-transparent text-slate-500 hover:text-primary font-bold text-sm flex items-center gap-2 transition-all"
                    href="#iconography">
                    <i class="las la-project-diagram text-xl"></i>
                    Iconografía
                </a>
                <a class="px-6 py-4 border-b-2 border-transparent text-slate-500 hover:text-primary font-bold text-sm flex items-center gap-2 transition-all"
                    href="#signatures">
                    <i class="las la-signature text-xl"></i>
                    Firmas Email
                </a>
            </div>
        </div>
        <!-- Asset Sections -->
        <div class="space-y-20">
            <!-- Section: Institutional Backgrounds -->
            <section id="backgrounds">
                <div class="flex items-end justify-between mb-8">
                    <div>
                        <h2 class="text-2xl font-bold text-slate-900 dark:text-slate-100">Backgrounds para conferencias</h2>
                        <p class="text-slate-500 dark:text-slate-400">Fondos virtuales de alta resolución para reuniones y
                            eventos.</p>
                    </div>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                    <!-- Asset Card -->
                    <div
                        class="group bg-white rounded-xl overflow-hidden shadow-sm hover:shadow-xl transition-all border border-slate-200">
                        <div class="aspect-video relative overflow-hidden bg-slate-100">
                            <img class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500"
                                data-alt="Corporate abstract orange and black background"
                                src="{{ asset('assets/netjer/backs/back_corporativo_01.jpg') }}" />
                        </div>
                        <div class="p-5 flex items-center justify-between">
                            <div>
                                <h3 class="font-bold text-slate-900 dark:text-slate-100">Abstract Dawn</h3>
                                <p class="text-xs text-slate-500">4K JPG • 1 MB</p>
                            </div>
                            <a href="{{ asset('assets/netjer/backs/back_corporativo_01.jpg') }}"
                                download="Fondo_Corporativo_01.jpg"
                                class="flex items-center gap-2 bg-primary hover:bg-primary/90 text-white px-4 py-2 rounded-lg font-bold text-xs transition-colors shadow-sm">
                                <i class="las la-download text-sm"></i>
                                Descargar
                            </a>
                        </div>
                    </div>
                    <!-- Asset Card -->
                    <div
                        class="group bg-white dark:bg-slate-900 rounded-xl overflow-hidden shadow-sm hover:shadow-xl transition-all border border-slate-200 dark:border-slate-800">
                        <div class="aspect-video relative overflow-hidden bg-slate-100 dark:bg-slate-800">
                            <img class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500"
                                data-alt="Blue and orange digital network landscape"
                                src="{{ asset('assets/netjer/backs/back_corporativo_02.jpg') }}" />
                        </div>
                        <div class="p-5 flex items-center justify-between">
                            <div>
                                <h3 class="font-bold text-slate-900 dark:text-slate-100">Global Connectivity</h3>
                                <p class="text-xs text-slate-500">4K JPG • 4 MB</p>
                            </div>
                            <a href="{{ asset('assets/netjer/backs/back_corporativo_02.jpg') }}"
                                download="Fondo_Corporativo_02.jpg"
                                class="flex items-center gap-2 bg-primary hover:bg-primary/90 text-white px-4 py-2 rounded-lg font-bold text-xs transition-colors shadow-sm">
                                <i class="las la-download text-sm"></i>
                                Descargar
                            </a>
                        </div>
                    </div>
                    <!-- Asset Card -->
                    <div
                        class="group bg-white dark:bg-slate-900 rounded-xl overflow-hidden shadow-sm hover:shadow-xl transition-all border border-slate-200 dark:border-slate-800">
                        <div class="aspect-video relative overflow-hidden bg-slate-100 dark:bg-slate-800">
                            <img class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500"
                                data-alt="Clean corporate office blurred background"
                                src="{{ asset('assets/netjer/backs/back_corporativo_03.jpg') }}" />
                        </div>
                        <div class="p-5 flex items-center justify-between">
                            <div>
                                <h3 class="font-bold text-slate-900 dark:text-slate-100">Minimal HQ Interior</h3>
                                <p class="text-xs text-slate-500">4K PNG • 3 MB</p>
                            </div>
                            <a href="{{ asset('assets/netjer/backs/back_corporativo_03.jpg') }}"
                                download="Fondo_Corporativo_03.jpg"
                                class="flex items-center gap-2 bg-primary hover:bg-primary/90 text-white px-4 py-2 rounded-lg font-bold text-xs transition-colors shadow-sm">
                                <i class="las la-download text-sm"></i>
                                Descargar
                            </a>
                        </div>
                    </div>
                    <!-- Asset Card -->
                    <div
                        class="group bg-white dark:bg-slate-900 rounded-xl overflow-hidden shadow-sm hover:shadow-xl transition-all border border-slate-200 dark:border-slate-800">
                        <div class="aspect-video relative overflow-hidden bg-slate-100 dark:bg-slate-800">
                            <img class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500"
                                data-alt="Clean corporate office blurred background"
                                src="{{ asset('assets/netjer/backs/back_corporativo_04.jpg') }}" />
                        </div>
                        <div class="p-5 flex items-center justify-between">
                            <div>
                                <h3 class="font-bold text-slate-900 dark:text-slate-100">Minimal HQ Interior</h3>
                                <p class="text-xs text-slate-500">4K PNG • 4 MB</p>
                            </div>
                            <a href="{{ asset('assets/netjer/backs/back_corporativo_04.jpg') }}"
                                download="Fondo_Corporativo_04.jpg"
                                class="flex items-center gap-2 bg-primary hover:bg-primary/90 text-white px-4 py-2 rounded-lg font-bold text-xs transition-colors shadow-sm">
                                <i class="las la-download text-sm"></i>
                                Descargar
                            </a>
                        </div>
                    </div>
                </div>
            </section>
            <!-- Section: Presentation Templates -->
            <section id="templates">
                <div class="flex items-end justify-between mb-8">
                    <div>
                        <h2 class="text-2xl font-bold text-slate-900 dark:text-slate-100">Templates para Presentaciones y
                            Documentos</h2>
                        <p class="text-slate-500 dark:text-slate-400">Presentaciones estandarizadas para reuniones internas
                            y externas.</p>
                    </div>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 xl:grid-cols-3 gap-8">
                    <div
                        class="group bg-white rounded-xl overflow-hidden border border-slate-200 shadow-sm hover:shadow-xl transition-all duration-300">
                        <!-- Preview -->
                        <div class="relative aspect-video overflow-hidden bg-slate-100">
                            <img src="{{ asset('assets/netjer/templates/ejemplo_templates.jpg') }}"
                                alt="PowerPoint template preview"
                                class="w-full h-full object-cover group-hover:scale-105 transition duration-500" />
                        </div>
                        <!-- Content -->
                        <div class="p-6 flex flex-col gap-4">
                            <div>
                                <h3 class="font-bold text-lg text-slate-800 group-hover:text-primary transition">
                                    Corporate Strategy Deck 2024
                                </h3>
                                <p class="text-sm text-slate-500 mt-2 leading-relaxed">
                                    Más de 2 diseños de diapositivas personalizados (Claro y Obscuro).
                                </p>
                            </div>
                            <!-- Features -->
                            <ul class="flex flex-wrap gap-3 text-xs text-slate-500">
                                <li class="flex items-center gap-1">
                                    <i class="las la-check-circle text-primary text-sm"></i>
                                    Editable
                                </li>
                                <li class="flex items-center gap-1">
                                    <i class="las la-check-circle text-primary text-sm"></i>
                                    16:9 Format
                                </li>
                                <li class="flex items-center gap-1">
                                    <i class="las la-check-circle text-primary text-sm"></i>
                                    5 Slides
                                </li>
                            </ul>
                            <!-- Actions -->
                            <div class="flex flex-col md:flex-row gap-3 pt-2">
                                <a href="{{ asset('assets/netjer/templates/NJ-Press_Clara.pptx') }}"
                                    download="Presentacion_Clara.pptx"
                                    class="flex-1 flex items-center justify-center gap-2 bg-primary text-white px-4 py-3 rounded-lg font-semibold text-sm hover:opacity-90 transition">
                                    <i class="las la-download text-lg"></i>
                                    Presentacion Clara
                                </a>
                                <a href="{{ asset('assets/netjer/templates/NJ-Press_Obscura.pptx') }}"
                                    download="Presentacion_Obscura.pptx"
                                    class="flex-1 flex items-center justify-center gap-2 bg-primary text-white px-4 py-3 rounded-lg font-semibold text-sm hover:opacity-90 transition">
                                    <i class="las la-download text-lg"></i>
                                    Presentacion Obscura
                                </a>

                            </div>
                        </div>
                    </div>
                    <div
                        class="group bg-white rounded-xl overflow-hidden border border-slate-200 shadow-sm hover:shadow-xl transition-all duration-300">
                        <!-- Preview -->
                        <div class="relative aspect-video overflow-hidden bg-slate-100">
                            <img src="{{ asset('assets/netjer/templates/docs_membretados.jpg') }}"
                                alt="PowerPoint template preview"
                                class="w-full h-full object-cover group-hover:scale-105 transition duration-500" />
                        </div>
                        <!-- Content -->
                        <div class="p-6 flex flex-col gap-4">
                            <div>
                                <h3 class="font-bold text-lg text-slate-800 group-hover:text-primary transition">
                                    Documentos membretados
                                </h3>
                                <p class="text-sm text-slate-500 mt-2 leading-relaxed">
                                    Más de 2 diseños para documentos personalizados.
                                </p>
                            </div>
                            <!-- Features -->
                            <ul class="flex flex-wrap gap-3 text-xs text-slate-500">
                                <li class="flex items-center gap-1">
                                    <i class="las la-check-circle text-primary text-sm"></i>
                                    Editable
                                </li>
                                <li class="flex items-center gap-1">
                                    <i class="las la-check-circle text-primary text-sm"></i>
                                    A4/Carta Format
                                </li>
                                <li class="flex items-center gap-1">
                                    <i class="las la-check-circle text-primary text-sm"></i>
                                    2 Paginas
                                </li>
                            </ul>
                            <!-- Actions -->
                            <div class="flex gap-3 pt-2">
                                <a href="{{ asset('assets/netjer/templates/docs_membretados.zip') }}"
                                    download="Documentos_Membretados.zip"
                                    class="flex-1 flex items-center justify-center gap-2 bg-primary text-white px-4 py-3 rounded-lg font-semibold text-sm hover:opacity-90 transition">
                                    <i class="las la-download text-lg"></i>
                                    Download
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- Section: Iconography -->
            <section id="iconography">
                <div class="flex items-end justify-between mb-8">
                    <div>
                        <h2 class="text-2xl font-bold text-slate-900 dark:text-slate-100">Iconografía</h2>
                        <p class="text-slate-500 dark:text-slate-400">Nuestro conjunto de iconos personalizados está
                            diseñado para interfaces digitales e impresas.</p>
                    </div>
                </div>
                <div class="bg-white dark:bg-slate-900 rounded-2xl border border-slate-200 dark:border-slate-800 p-8">
                    <div
                        class="max-w-md mx-auto bg-white rounded-xl border border-slate-200 shadow-sm hover:shadow-lg transition overflow-hidden">
                        <!-- Preview -->
                        <div class="aspect-video bg-slate-50 flex items-center justify-center">
                            <img src="{{ asset('assets/netjer/icons/iconografia.png') }}" alt="Preview icon pack"
                                class="w-full h-full object-contain p-6">
                        </div>
                        <!-- Content -->
                        <div class="p-6 flex flex-col gap-4">
                            <div>
                                <h3 class="text-lg font-bold text-slate-800">
                                    Pack de Iconos para presentaciones.
                                </h3>
                                <p class="text-sm text-slate-500 mt-1">
                                    Colección de iconos de infraestructura y red listos para presentaciones, dashboards o
                                    documentación técnica.
                                </p>
                            </div>
                            <!-- Features -->
                            <div class="flex flex-wrap gap-3 text-xs font-semibold">
                                <span class="px-3 py-1 bg-orange-50 text-orange-600 rounded-full">
                                    Versión naranja
                                </span>
                                <span class="px-3 py-1 bg-slate-100 text-slate-700 rounded-full">
                                    Versión obscura
                                </span>
                                <span class="px-3 py-1 bg-slate-100 text-slate-700 rounded-full">
                                    PNG
                                </span>
                            </div>
                            <!-- Action -->
                            <a href="{{ asset('assets/netjer/icons/iconografia_2024.zip') }}"
                                download="iconografia_2024.zip"
                                class="w-full bg-primary text-white py-3 rounded-lg font-bold flex items-center justify-center gap-2 hover:bg-primary/90 transition">
                                <i class="las la-download text-xl"></i>
                                Descargar pack de iconos
                            </a>
                        </div>
                    </div>
                </div>

            </section>
            <!-- Section: Firmas -->
            <section id="signatures">
                <div class="flex items-end justify-between mb-8">
                    <div>
                        <h2 class="text-2xl font-bold text-slate-900">Firmas para Correo</h2>
                        <p class="text-slate-500 dark:text-slate-400">
                            Diseño para Firmas profesionales estandarizadas para Outlook.
                        </p>
                    </div>
                </div>
                <div class="grid grid-cols-1 gap-8">
                    <!-- Signature Card -->
                    <div class="max-w-4xl mx-auto bg-white rounded-xl border border-slate-200 shadow-sm overflow-hidden">
                        <!-- Firma -->
                        <div class="flex items-center py-4">
                            <!-- Logo -->
                            <div class="w-56 p-6 flex flex-col items-center justify-center border-r border-slate-200">
                                <img src="{{ asset('assets/netjer/icons/logotipo_a.png') }}" alt="Netjer Networks"
                                    class="w-full max-w-[160px] object-contain">
                                <span class="text-xs text-slate-500 mt-2">
                                    netjernetworks.com
                                </span>
                            </div>
                            <!-- Info -->
                            <div class="flex-1 p-6">
                                <h3 class="text-2xl font-bold text-slate-800 tracking-wide">
                                    A CHUCHITA LA BOLSEARON
                                </h3>
                                <p class="text-slate-600 mb-4">
                                    Hay que dolor, que pena!!!
                                </p>
                                <!-- Contact -->
                                <div class="space-y-1 text-sm text-slate-600">
                                    <p class="flex items-center gap-2">
                                        <i class="lar la-envelope text-primary text-base"></i>
                                        chuchita.esta.triste@netjernetworks.com
                                    </p>
                                    <p class="flex items-center gap-2">
                                        <i class="las la-phone text-primary text-base"></i>
                                        (55) 1234-5678
                                    </p>
                                </div>
                                <!-- Redes -->
                                <div class="flex items-center gap-3 mt-4 text-primary">
                                    <i class="lab la-linkedin text-xl"></i>
                                    <i class="lab la-facebook text-xl"></i>
                                    <i class="lab la-instagram text-xl"></i>
                                </div>
                            </div>
                        </div>
                        <!-- Botón copiar -->
                        <div class="border-l-4 border-orange-700 pl-6 py-4 bg-gray-50 rounded-r-lg">
                            <!-- Email -->
                            <p class="font-semibold text-gray-800">
                                Si aun no cuentas con tu firma, no dudes en solicitarla al area de Marketing.
                            </p>
                            <p class="text-gray-500 text-sm">
                                <a class="hover:text-orange-600 transition-colors"
                                    href="mailto:marketing@netjernetworks.com">
                                    marketing@netjernetworks.com
                                </a>
                            </p>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
@endsection
@push('js')
@endpush
