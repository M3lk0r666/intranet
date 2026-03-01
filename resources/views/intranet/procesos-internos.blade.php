@extends('layouts.intranet')

@section('title', 'Procesos Internos')

@push('css')
    <!-- Include your favorite highlight.js stylesheet -->
    <link href="/assets/css/intranet.css" rel="stylesheet">
@endpush

@section('content')
    <!-- Principal -->
    <div class="min-h-screen bg-overlay">

        <!-- Header con botón de regreso -->
        <header class="w-full py-6 px-6">
            <div class="container mx-auto flex justify-between items-center">
                <div class="text-xl font-bold text-gray-800">
                    <i class="fas fa-sitemap text-blue-600 mr-2"></i>
                    Procesos Empresariales Internos
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
                    Aquí puedes conocer los procesos de:
                </h1>
                <div class="flex flex-wrap justify-center gap-2 md:gap-4 mt-6">
                    <span class="px-4 py-2 bg-blue-100 text-blue-700 font-medium rounded-full">Ingeniería</span>
                    <span class="px-4 py-2 bg-green-100 text-green-700 font-medium rounded-full">Ventas</span>
                    <span class="px-4 py-2 bg-purple-100 text-purple-700 font-medium rounded-full">Operaciones</span>
                    <span class="px-4 py-2 bg-amber-100 text-amber-700 font-medium rounded-full">Gestión de
                        Servicios</span>
                    <span class="px-4 py-2 bg-indigo-100 text-indigo-700 font-medium rounded-full">Administración de
                        Servicios</span>
                    <span class="px-4 py-2 bg-pink-100 text-pink-700 font-medium rounded-full">Desarrollo de
                        Software</span>
                </div>
            </div>

            <!-- Grid de botones de procesos -->
            <div class="max-w-7xl mx-auto">
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-4">

                    <!-- Botón: Estructura Interna -->
                    <div class="process-btn bg-white p-6 rounded-xl shadow-md hover:shadow-lg flex flex-col cursor-pointer"
                        onclick="toggleSubmenu('estructura')">
                        <div class="flex items-center justify-between mb-4">
                            <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center">
                                <i class="fas fa-sitemap text-blue-600 text-xl"></i>
                            </div>
                            <i class="fas fa-chevron-down text-gray-400" id="estructura-chevron"></i>
                        </div>
                        <h3 class="text-lg font-bold text-gray-800 mb-2">Estructura Interna</h3>
                        <p class="text-gray-600 text-sm mb-4">
                            Organización operativa de la empresa
                        </p>

                        <!-- Submenú -->
                        <div class="submenu-dropdown" id="estructura-submenu">
                            <div class="border-t border-gray-100 pt-4 space-y-2">
                                <a href="{{ url('/estructura-interna') ?? '#' }}"
                                    class="submenu-item block px-3 py-2 bg-blue-50 rounded-lg text-blue-700 font-medium">
                                    <i class="fas fa-diagram-project mr-2"></i>
                                    Organigrama Operacional
                                </a>
                            </div>
                        </div>
                    </div>

                    <!-- Botón: Proceso Comercial -->
                    <div class="process-btn bg-white p-6 rounded-xl shadow-md hover:shadow-lg flex flex-col cursor-pointer"
                        onclick="toggleSubmenu('comercial')">
                        <div class="flex items-center justify-between mb-4">
                            <div class="w-12 h-12 bg-green-100 rounded-lg flex items-center justify-center">
                                <i class="fas fa-chart-line text-green-600 text-xl"></i>
                            </div>
                            <i class="fas fa-chevron-down text-gray-400" id="comercial-chevron"></i>
                        </div>
                        <h3 class="text-lg font-bold text-gray-800 mb-2">Proceso Comercial</h3>
                        <p class="text-gray-600 text-sm mb-4">
                            Gestión de ventas y relaciones comerciales
                        </p>

                        <!-- Submenú -->
                        <div class="submenu-dropdown" id="comercial-submenu">
                            <div class="border-t border-gray-100 pt-4 space-y-2">
                                <a href="{{ url('/proceso-comercial-it') ?? '#' }}"
                                    class="submenu-item block px-3 py-2 bg-green-50 rounded-lg text-green-700 font-medium">
                                    <i class="fas fa-laptop-code mr-2"></i>
                                    Proceso Comercial IT
                                </a>
                            </div>
                        </div>
                    </div>

                    <!-- Botón: Operaciones -->
                    <div class="process-btn bg-white p-6 rounded-xl shadow-md hover:shadow-lg flex flex-col cursor-pointer"
                        onclick="toggleSubmenu('operaciones')">
                        <div class="flex items-center justify-between mb-4">
                            <div class="w-12 h-12 bg-purple-100 rounded-lg flex items-center justify-center">
                                <i class="fas fa-cogs text-purple-600 text-xl"></i>
                            </div>
                            <i class="fas fa-chevron-down text-gray-400" id="operaciones-chevron"></i>
                        </div>
                        <h3 class="text-lg font-bold text-gray-800 mb-2">Operaciones</h3>
                        <p class="text-gray-600 text-sm mb-4">
                            Gestión diaria y documentación institucional
                        </p>

                        <!-- Submenú -->
                        <div class="submenu-dropdown" id="operaciones-submenu">
                            <div class="border-t border-gray-100 pt-4 space-y-2">
                                <a href="{{ url('/procesos/documentos') ?? '#' }}"
                                    class="submenu-item block px-3 py-2 bg-purple-50 rounded-lg text-purple-700 font-medium">
                                    <i class="fas fa-file-alt mr-2"></i>
                                    Documentos Institucionales
                                </a>
                                <a href="{{ url('/procesos/imagen-corporativa') ?? '#' }}"
                                    class="submenu-item block px-3 py-2 bg-purple-50 rounded-lg text-purple-700 font-medium">
                                    <i class="fas fa-palette mr-2"></i>
                                    Imagen Corporativa
                                </a>
                                <a href="{{ url('/procesos/descripcion-puestos') ?? '#' }}"
                                    class="submenu-item block px-3 py-2 bg-purple-50 rounded-lg text-purple-700 font-medium">
                                    <i class="fas fa-user-tie mr-2"></i>
                                    Descripción de Puestos
                                </a>
                            </div>
                        </div>
                    </div>

                    <!-- Botón: Ingeniería -->
                    <div class="process-btn bg-white p-6 rounded-xl shadow-md hover:shadow-lg flex flex-col cursor-pointer"
                        onclick="toggleSubmenu('ingenieria')">
                        <div class="flex items-center justify-between mb-4">
                            <div class="w-12 h-12 bg-amber-100 rounded-lg flex items-center justify-center">
                                <i class="fas fa-microchip text-amber-600 text-xl"></i>
                            </div>
                            <i class="fas fa-chevron-down text-gray-400" id="ingenieria-chevron"></i>
                        </div>
                        <h3 class="text-lg font-bold text-gray-800 mb-2">Ingeniería</h3>
                        <p class="text-gray-600 text-sm mb-4">
                            Procesos técnicos y de desarrollo
                        </p>

                        <!-- Submenú -->
                        <div class="submenu-dropdown" id="ingenieria-submenu">
                            <div class="border-t border-gray-100 pt-4 space-y-2">
                                <a href="{{ url('/procesos/comercial-it-ingenieria') ?? '#' }}"
                                    class="submenu-item block px-3 py-2 bg-amber-50 rounded-lg text-amber-700 font-medium">
                                    <i class="fas fa-project-diagram mr-2"></i>
                                    Proceso Comercial IT-Ingenieria
                                </a>
                                <a href="{{ url('/procesos/procesos-internos') ?? '#' }}"
                                    class="submenu-item block px-3 py-2 bg-amber-50 rounded-lg text-amber-700 font-medium">
                                    <i class="fas fa-cogs mr-2"></i>
                                    Procesos Internos
                                </a>
                            </div>
                        </div>
                    </div>

                    <!-- Botón: Administración -->
                    <div class="process-btn bg-white p-6 rounded-xl shadow-md hover:shadow-lg flex flex-col cursor-pointer"
                        onclick="toggleSubmenu('administracion')">
                        <div class="flex items-center justify-between mb-4">
                            <div class="w-12 h-12 bg-indigo-100 rounded-lg flex items-center justify-center">
                                <i class="fas fa-building text-indigo-600 text-xl"></i>
                            </div>
                            <i class="fas fa-chevron-down text-gray-400" id="administracion-chevron"></i>
                        </div>
                        <h3 class="text-lg font-bold text-gray-800 mb-2">Administración</h3>
                        <p class="text-gray-600 text-sm mb-4">
                            Gestión de recursos y áreas administrativas
                        </p>

                        <!-- Submenú -->
                        <div class="submenu-dropdown" id="administracion-submenu">
                            <div class="border-t border-gray-100 pt-4 space-y-2">
                                <a href="{{ url('/procesos/recursos-humanos') ?? '#' }}"
                                    class="submenu-item block px-3 py-2 bg-indigo-50 rounded-lg text-indigo-700 font-medium">
                                    <i class="fas fa-users mr-2"></i>
                                    Recursos Humanos
                                </a>
                                <a href="{{ url('/procesos/inventario') ?? '#' }}"
                                    class="submenu-item block px-3 py-2 bg-indigo-50 rounded-lg text-indigo-700 font-medium">
                                    <i class="fas fa-boxes mr-2"></i>
                                    Inventario
                                </a>
                                <a href="{{ url('/procesos/marketing') ?? '#' }}"
                                    class="submenu-item block px-3 py-2 bg-indigo-50 rounded-lg text-indigo-700 font-medium">
                                    <i class="fas fa-bullhorn mr-2"></i>
                                    Marketing
                                </a>
                            </div>
                        </div>
                    </div>

                    <!-- Botón: Finanzas -->
                    <div class="process-btn bg-white p-6 rounded-xl shadow-md hover:shadow-lg flex flex-col cursor-pointer"
                        onclick="toggleSubmenu('finanzas')">
                        <div class="flex items-center justify-between mb-4">
                            <div class="w-12 h-12 bg-emerald-100 rounded-lg flex items-center justify-center">
                                <i class="fas fa-money-bill-wave text-emerald-600 text-xl"></i>
                            </div>
                            <i class="fas fa-chevron-down text-gray-400" id="finanzas-chevron"></i>
                        </div>
                        <h3 class="text-lg font-bold text-gray-800 mb-2">Finanzas</h3>
                        <p class="text-gray-600 text-sm mb-4">
                            Gestión económica y compras
                        </p>

                        <!-- Submenú -->
                        <div class="submenu-dropdown" id="finanzas-submenu">
                            <div class="border-t border-gray-100 pt-4 space-y-2">
                                <a href="{{ url('/procesos/compras') ?? '#' }}"
                                    class="submenu-item block px-3 py-2 bg-emerald-50 rounded-lg text-emerald-700 font-medium">
                                    <i class="fas fa-shopping-cart mr-2"></i>
                                    Compras
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
                                        subprocesos</span>
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

        <!-- Footer -->
        @include('layouts.includes.intra.footerb')
    </div>
@endsection
@push('js')
    <!-- Include the Dropdown -->
    <script src="{{ asset('/assets/scripts/dropdproces.js') }}"></script>
@endpush
