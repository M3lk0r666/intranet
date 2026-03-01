@extends('layouts.intranet')

@section('title', 'Formacion Academica')

@push('css')
    <!-- Include css stylesheet -->
    <link href="/assets/css/intranet.css" rel="stylesheet">
@endpush

@section('content')
    <!-- Principal -->
    <div class="min-h-screen bg-overlay">

        <!-- Header con botón de regreso -->
        <header class="w-full py-6 px-6">
            <div class="container mx-auto flex justify-between items-center">
                <div class="text-xl font-bold text-gray-800">
                    <i class="ri-news-line text-blue-600 mr-2"></i>
                    Formación Academica
                </div>

                <!-- Botón para regresar al inicio -->
                <a href="{{ url('/intranet') }}"
                    class="px-4 py-2 bg-gray-100 hover:bg-orange-200 text-gray-700 font-medium rounded-lg transition duration-300 flex items-center gap-2 text-xs">
                    <i class="fas fa-home"></i>
                    Inicio
                </a>
            </div>
        </header>


        <!-- Contenido principal -->
        <main class="container mx-auto px-4 py-8">
            <!-- Título principal -->
            <div class="text-center mb-12">
                <h1 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">
                    Aquí puedes visualizar todo el contenido referente a:
                </h1>
                <div class="flex flex-wrap justify-center gap-2 md:gap-4 mt-6">
                    <span class="px-4 py-2 bg-blue-100 text-blue-700 font-medium rounded-full">Inteligencia
                        Artificial</span>
                    <span class="px-4 py-2 bg-green-100 text-green-700 font-medium rounded-full">Computo de Alto
                        Desempeño</span>
                    <span class="px-4 py-2 bg-purple-100 text-purple-700 font-medium rounded-full">Videos de Estudio</span>
                    <span class="px-4 py-2 bg-amber-100 text-amber-700 font-medium rounded-full">Mejoraminto de
                        Aprendizaje</span>
                    <span class="px-4 py-2 bg-indigo-100 text-indigo-700 font-medium rounded-full">Guias visuales de
                        Apoyo</span>
                </div>
            </div>

            <!-- Grid de botones de videos -->
            <div class="max-w-7xl mx-auto">
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-4">

                    <!-- Botón: IA -->
                    <div class="process-btn bg-white p-6 rounded-xl shadow-md hover:shadow-lg flex flex-col cursor-pointer"
                        onclick="toggleSubmenu('ia')">
                        <div class="flex items-center justify-between mb-4">
                            <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center">
                                <i class="ri-ai-generate-2 text-blue-600 text-xl"></i>
                            </div>
                            <i class="fas fa-chevron-down text-gray-400" id="ia-chevron"></i>
                        </div>
                        <h3 class="text-lg font-bold text-gray-800 mb-2">Inteligencia Artificial</h3>
                        <p class="text-gray-600 text-sm mb-4">
                            Campo de la informática que crea sistemas capaces de realizar tareas que normalmente
                            requieren inteligencia humana.
                        </p>

                        <!-- Submenú -->
                        <div class="submenu-dropdown" id="ia-submenu">
                            <div class="border-t border-gray-100 pt-4 space-y-2">
                                <a href="{{ url('/intranet/formacion-academica/historia_ia') ?? '#' }}"
                                    class="submenu-item block px-3 py-2 bg-blue-50 rounded-lg text-blue-700 font-medium">
                                    <i class="ri-terminal-line text-base"></i>
                                    Historia de la IA
                                </a>
                                <a href="{{ url('/ia-interna') ?? '#' }}"
                                    class="submenu-item block px-3 py-2 bg-blue-50 rounded-lg text-blue-700 font-medium">
                                    <i class="ri-terminal-line text-base"></i>
                                    IA
                                </a>
                                <a href="{{ url('/ia-interna') ?? '#' }}"
                                    class="submenu-item block px-3 py-2 bg-blue-50 rounded-lg text-blue-700 font-medium">
                                    <i class="ri-terminal-line text-base"></i>
                                    Machine Learning
                                </a>
                                <a href="{{ url('/ia-interna') ?? '#' }}"
                                    class="submenu-item block px-3 py-2 bg-blue-50 rounded-lg text-blue-700 font-medium">
                                    <i class="ri-terminal-line text-base"></i>
                                    Deep Learning
                                </a>
                                <a href="{{ url('/ia-interna') ?? '#' }}"
                                    class="submenu-item block px-3 py-2 bg-blue-50 rounded-lg text-blue-700 font-medium">
                                    <i class="ri-terminal-line text-base"></i>
                                    IA Generativa
                                </a>
                            </div>
                        </div>
                    </div>

                    <!-- Botón: Computo de alta desempeño -->
                    <div class="process-btn bg-white p-6 rounded-xl shadow-md hover:shadow-lg flex flex-col cursor-pointer"
                        onclick="toggleSubmenu('chd')">
                        <div class="flex items-center justify-between mb-4">
                            <div class="w-12 h-12 bg-green-100 rounded-lg flex items-center justify-center">
                                <i class="ri-cpu-line text-green-600 text-xl"></i>
                            </div>
                            <i class="fas fa-chevron-down text-gray-400" id="chd-chevron"></i>
                        </div>
                        <h3 class="text-lg font-bold text-gray-800 mb-2">Cómputo de Alto Desempeño</h3>
                        <p class="text-gray-600 text-sm mb-4">
                            Práctica de agregar potencia computacional de múltiples sistemas (clústeres) para resolver
                            problemas científicos complejos y que requieren cálculos masivos de forma mucho más rápida
                        </p>

                        <!-- Submenú -->
                        <div class="submenu-dropdown" id="chd-submenu">
                            <div class="border-t border-gray-100 pt-4 space-y-2">
                                <a href="{{ url('/proceso-comercial-it') ?? '#' }}"
                                    class="submenu-item block px-3 py-2 bg-green-50 rounded-lg text-green-700 font-medium">
                                    <i class="ri-computer-line text-base"></i>
                                    HPC
                                </a>
                            </div>
                        </div>
                    </div>

                    <!-- Botón: Educacion -->
                    <div class="process-btn bg-white p-6 rounded-xl shadow-md hover:shadow-lg flex flex-col cursor-pointer"
                        onclick="toggleSubmenu('educacion')">
                        <div class="flex items-center justify-between mb-4">
                            <div class="w-12 h-12 bg-purple-100 rounded-lg flex items-center justify-center">
                                <i class="ri-draft-line text-purple-600 text-xl"></i>
                            </div>
                            <i class="fas fa-chevron-down text-gray-400" id="educacion-chevron"></i>
                        </div>
                        <h3 class="text-lg font-bold text-gray-800 mb-2">Guias de Trabajo Ingenieria</h3>
                        <p class="text-gray-600 text-sm mb-4">
                            En este apartado encontrarás guías de trabajo y material de apoyo diseñados para facilitar la
                            realización correcta y eficiente de diversas actividades operativas.
                        </p>

                        <!-- Submenú -->
                        <div class="submenu-dropdown" id="educacion-submenu">
                            <div class="border-t border-gray-100 pt-4 space-y-2">
                                <a href="{{ url('/procesos/documentos') ?? '#' }}"
                                    class="submenu-item block px-3 py-2 bg-purple-50 rounded-lg text-purple-700 font-medium">
                                    <i class="ri-file-list-fill text-base"></i>
                                    Guias de trabajo On Site
                                </a>
                                <a href="{{ url('/procesos/imagen-corporativa') ?? '#' }}"
                                    class="submenu-item block px-3 py-2 bg-purple-50 rounded-lg text-purple-700 font-medium">
                                    <i class="ri-file-video-fill text-base"></i>
                                    Videos de apoyo
                                </a>
                            </div>
                        </div>
                    </div>

                    <!-- Botón: internos -->
                    <div class="process-btn bg-white p-6 rounded-xl shadow-md hover:shadow-lg flex flex-col cursor-pointer"
                        onclick="toggleSubmenu('internos')">
                        <div class="flex items-center justify-between mb-4">
                            <div class="w-12 h-12 bg-amber-100 rounded-lg flex items-center justify-center">
                                <i class="ri-survey-line text-amber-600 text-xl"></i>
                            </div>
                            <i class="fas fa-chevron-down text-gray-400" id="internos-chevron"></i>
                        </div>
                        <h3 class="text-lg font-bold text-gray-800 mb-2">Aprendizaje Interno</h3>
                        <p class="text-gray-600 text-sm mb-4">
                            Este esapcio esta diseñado para facilitar la resolución rápida de incidentes, promoviendo el
                            autoaprendizaje y la autonomía del personal.
                        </p>

                        <!-- Submenú -->
                        <div class="submenu-dropdown" id="internos-submenu">
                            <div class="border-t border-gray-100 pt-4 space-y-2">
                                <a href="#"
                                    class="submenu-item block px-3 py-2 bg-amber-50 rounded-lg text-amber-700 font-medium">
                                    <i class="ri-question-mark text-base"></i>
                                    Por definir
                                </a>
                                <a href="#"
                                    class="submenu-item block px-3 py-2 bg-amber-50 rounded-lg text-amber-700 font-medium">
                                    <i class="ri-question-mark text-base"></i>
                                    Por definir
                                </a>
                            </div>
                        </div>
                    </div>


                </div>
            </div>

            <!-- Información adicional -->
            <div class="mt-5 max-w-4xl mx-auto">
                <div class="bg-gradient-to-r from-blue-50 to-indigo-50 rounded-2xl p-8 shadow-md">
                    <div class="flex items-start">
                        <div class="mr-6">
                            <i class="fas fa-info-circle text-blue-600 text-3xl"></i>
                        </div>
                        <div>
                            <h3 class="text-xl font-bold text-gray-800 mb-3">
                                ¿Cómo usar esta sección?
                            </h3>
                            <ul class="space-y-2 text-gray-600">
                                <li class="flex items-start">
                                    <i class="fas fa-chevron-right text-blue-500 mr-2 mt-1 text-xs"></i>
                                    <span><strong>Haz clic</strong> en cualquier área para ver sus
                                        submnenus</span>
                                </li>
                                <li class="flex items-start">
                                    <i class="fas fa-chevron-right text-blue-500 mr-2 mt-1 text-xs"></i>
                                    <span><strong>Explora</strong> los enlaces para acceder a documentación
                                        específica</span>
                                </li>
                                <li class="flex items-start">
                                    <i class="fas fa-chevron-right text-blue-500 mr-2 mt-1 text-xs"></i>
                                    <span><strong>Utiliza</strong> el botón "Inicio" para regresar al portal
                                        principal</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

        </main>


    </div>

    <!-- Footer -->
    @include('layouts.includes.intra.footerb')
@endsection
@push('js')
    <!-- Include the Dropdown -->
    <script src="{{ asset('/assets/scripts/dropdproces.js') }}"></script>
@endpush
