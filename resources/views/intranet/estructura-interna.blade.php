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
                            <span class="ml-1 text-sm text-primary font-medium md:ml-2">Procesos Empresariales</span>
                        </div>
                    </li>
                </ol>
            </nav>
        </div>
    </div>

    <!-- Encabezado -->
    <div class="mb-8">
        <h1 class="text-3xl font-bold text-gray-800 mb-2 mt-4">Procesos Empresariales</h1>
        <p class="text-gray-600">Gestión y documentación de los procesos internos de la empresa</p>
    </div>
    <div class="flex flex-col lg:flex-row gap-8">
        <!-- Contenido principal -->
        <div class="lg:w-2/3">
            <!-- Secciones de procesos -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
                <!-- Estructura Interna -->
                <div class="card-hover bg-white rounded-lg shadow p-6">
                    <div class="flex items-start mb-4">
                        <div class="bg-primary-light text-primary p-3 rounded-lg mr-4">
                            <i class="fas fa-sitemap text-2xl"></i>
                        </div>
                        <div>
                            <h3 class="text-xl font-bold text-gray-800 mb-2">Estructura Interna</h3>
                            <p class="text-gray-600">Organigrama, departamentos, roles y responsabilidades</p>
                        </div>
                    </div>
                    <div class="mt-4">
                        <a href="{{ route('intranet.estructurainterna.organigrama') }}"
                            class="text-primary hover:text-orange-700 font-medium flex items-center">
                            Ver organigrama <i class="fas fa-arrow-right ml-2"></i>
                        </a>
                    </div>
                </div>

                <!-- Proceso Comercial -->
                <div class="card-hover bg-white rounded-lg shadow p-6">
                    <div class="flex items-start mb-4">
                        <div class="bg-primary-light text-primary p-3 rounded-lg mr-4">
                            <i class="fas fa-chart-line text-2xl"></i>
                        </div>
                        <div>
                            <h3 class="text-xl font-bold text-gray-800 mb-2">Proceso Comercial IT</h3>
                            <p class="text-gray-600">Ventas, para garantizar la entrega eficiente del servicio ofrecido</p>
                        </div>
                    </div>
                    <div class="mt-4">
                        <a href="{{ route('intranet.estructurainterna.proceso-comercial') }}"
                            class="text-primary hover:text-orange-700 font-medium flex items-center">
                            Ver procesos <i class="fas fa-arrow-right ml-2"></i>
                        </a>
                    </div>
                </div>

                <!-- Operaciones -->
                <div class="card-hover bg-white rounded-lg shadow p-6">
                    <div class="flex items-start mb-4">
                        <div class="bg-primary-light text-primary p-3 rounded-lg mr-4">
                            <i class="fas fa-cogs text-2xl"></i>
                        </div>
                        <div>
                            <h3 class="text-xl font-bold text-gray-800 mb-2">Operaciones</h3>
                            <p class="text-gray-600">Mesa de Ayuda, Control de cambios, Portafolio</p>
                        </div>
                    </div>
                    <div class="mt-4">
                        <a href="{{ route('intranet.estructurainterna.operaciones') }}"
                            class="text-primary hover:text-orange-700 font-medium flex items-center">
                            Ver operaciones <i class="fas fa-arrow-right ml-2"></i>
                        </a>
                    </div>
                </div>

                <!-- Imagen Corporativa -->
                <div class="card-hover bg-white rounded-lg shadow p-6">
                    <div class="flex items-start mb-4">
                        <div class="bg-primary-light text-primary p-3 rounded-lg mr-4">
                            <i class="fas fa-laptop-code text-2xl"></i>
                        </div>
                        <div>
                            <h3 class="text-xl font-bold text-gray-800 mb-2">Imagen Corporativa</h3>
                            <p class="text-gray-600">Fondos institucionales, presentaciones, iconografía</p>
                        </div>
                    </div>
                    <div class="mt-4">
                        <a href="{{ route('intranet.estructurainterna.imagen-corporativa') }}"
                            class="text-primary hover:text-orange-700 font-medium flex items-center">
                            Ver imagen <i class="fas fa-arrow-right ml-2"></i>
                        </a>
                    </div>
                </div>

                <!-- Ingeniería -->
                <div class="card-hover bg-white rounded-lg shadow p-6">
                    <div class="flex items-start mb-4">
                        <div class="bg-primary-light text-primary p-3 rounded-lg mr-4">
                            <i class="fas fa-laptop-code text-2xl"></i>
                        </div>
                        <div>
                            <h3 class="text-xl font-bold text-gray-800 mb-2">Ingeniería</h3>
                            <p class="text-gray-600">Entrega de servicios, proceso interno de soporte</p>
                        </div>
                    </div>
                    <div class="mt-4">
                        <a href="{{ route('intranet.estructurainterna.ingenieria') }}"
                            class="text-primary hover:text-orange-700 font-medium flex items-center">
                            Ver documentacion <i class="fas fa-arrow-right ml-2"></i>
                        </a>
                    </div>
                </div>

                <!-- Administración -->
                <div class="card-hover bg-white rounded-lg shadow p-6">
                    <div class="flex items-start mb-4">
                        <div class="bg-primary-light text-primary p-3 rounded-lg mr-4">
                            <i class="fas fa-file-contract text-2xl"></i>
                        </div>
                        <div>
                            <h3 class="text-xl font-bold text-gray-800 mb-2">Administración y Finanzas</h3>
                            <p class="text-gray-600">Recursos humanos, contratos, normativas y políticas</p>
                        </div>
                    </div>
                    <div class="mt-4">
                        <a href="{{ route('intranet.estructurainterna.admnistracion') }}"
                            class="text-primary hover:text-orange-700 font-medium flex items-center">
                            Ver administración <i class="fas fa-arrow-right ml-2"></i>
                        </a>
                    </div>
                </div>

                <!-- Finanzas -->
                {{-- <div class="card-hover bg-white rounded-lg shadow p-6">
                    <div class="flex items-start mb-4">
                        <div class="bg-primary-light text-primary p-3 rounded-lg mr-4">
                            <i class="fas fa-chart-pie text-2xl"></i>
                        </div>
                        <div>
                            <h3 class="text-xl font-bold text-gray-800 mb-2">Finanzas</h3>
                            <p class="text-gray-600">Contabilidad, presupuestos, inversiones y reportes</p>
                        </div>
                    </div>
                    <div class="mt-4">
                        <a href="#" class="text-primary hover:text-orange-700 font-medium flex items-center">
                            Ver reportes <i class="fas fa-arrow-right ml-2"></i>
                        </a>
                    </div>
                </div> --}}
            </div>

            <!-- Biblioteca de materiales -->
            <div class="bg-white rounded-lg shadow p-6 opacity-40 pointer-events-none cursor-not-allowed">
                <h2 class="text-2xl font-bold text-gray-800 mb-6">Biblioteca de Materiales Visuales</h2>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <!-- PDFs -->
                    <div class="border border-gray-200 rounded-lg p-5">
                        <div class="flex items-center mb-4">
                            <div class="bg-red-100 text-red-600 p-3 rounded-lg mr-3">
                                <i class="fas fa-file-pdf text-2xl"></i>
                            </div>
                            <h3 class="text-lg font-bold text-gray-800">Documentos PDF</h3>
                        </div>
                        <p class="text-gray-600 mb-4">Manuales, procedimientos y documentación oficial</p>
                        <ul class="space-y-2">
                            <li><a href="#" class="text-primary hover:text-orange-700 flex items-center"><i
                                        class="fas fa-file-pdf mr-2"></i> Manual de Procesos 2024</a></li>
                            <li><a href="#" class="text-primary hover:text-orange-700 flex items-center"><i
                                        class="fas fa-file-pdf mr-2"></i> Políticas Corporativas</a></li>
                            <li><a href="#" class="text-primary hover:text-orange-700 flex items-center"><i
                                        class="fas fa-file-pdf mr-2"></i> Procedimientos Operativos</a></li>
                        </ul>
                    </div>

                    <!-- Documentos -->
                    <div class="border border-gray-200 rounded-lg p-5">
                        <div class="flex items-center mb-4">
                            <div class="bg-blue-100 text-blue-600 p-3 rounded-lg mr-3">
                                <i class="fas fa-file-word text-2xl"></i>
                            </div>
                            <h3 class="text-lg font-bold text-gray-800">Documentos Editables</h3>
                        </div>
                        <p class="text-gray-600 mb-4">Formatos, plantillas y documentos de trabajo</p>
                        <ul class="space-y-2">
                            <li><a href="#" class="text-primary hover:text-orange-700 flex items-center"><i
                                        class="fas fa-file-word mr-2"></i> Plantilla de Reportes</a></li>
                            <li><a href="#" class="text-primary hover:text-orange-700 flex items-center"><i
                                        class="fas fa-file-excel mr-2"></i> Formatos de Control</a></li>
                            <li><a href="#" class="text-primary hover:text-orange-700 flex items-center"><i
                                        class="fas fa-file-powerpoint mr-2"></i> Presentaciones</a></li>
                        </ul>
                    </div>

                    <!-- Diagramas -->
                    <div class="border border-gray-200 rounded-lg p-5">
                        <div class="flex items-center mb-4">
                            <div class="bg-green-100 text-green-600 p-3 rounded-lg mr-3">
                                <i class="fas fa-project-diagram text-2xl"></i>
                            </div>
                            <h3 class="text-lg font-bold text-gray-800">Diagramas y Flujos</h3>
                        </div>
                        <p class="text-gray-600 mb-4">Diagramas de procesos, flujogramas y organigramas</p>
                        <ul class="space-y-2">
                            <li><a href="#" class="text-primary hover:text-orange-700 flex items-center"><i
                                        class="fas fa-diagram-project mr-2"></i> Flujo Comercial</a></li>
                            <li><a href="#" class="text-primary hover:text-orange-700 flex items-center"><i
                                        class="fas fa-sitemap mr-2"></i> Organigrama Actual</a></li>
                            <li><a href="#" class="text-primary hover:text-orange-700 flex items-center"><i
                                        class="fas fa-stream mr-2"></i> Diagrama de Operaciones</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <!-- Sidebar -->
        <div class="lg:w-1/3 opacity-40 pointer-events-none cursor-not-allowed">
            <!-- Procesos recientes -->
            <div class="bg-white rounded-lg shadow p-6 mb-6">
                <h3 class="text-lg font-bold text-gray-800 mb-4">Procesos Recientes</h3>
                <div class="space-y-4">
                    <div class="border-l-4 border-primary pl-4">
                        <h4 class="font-medium text-gray-800">Actualización de Políticas</h4>
                        <p class="text-sm text-gray-600">Actualización completada el 15/03/2024</p>
                    </div>
                    <div class="border-l-4 border-primary pl-4">
                        <h4 class="font-medium text-gray-800">Nuevo Flujo Comercial</h4>
                        <p class="text-sm text-gray-600">Implementado el 10/03/2024</p>
                    </div>
                    <div class="border-l-4 border-primary pl-4">
                        <h4 class="font-medium text-gray-800">Optimización Operativa</h4>
                        <p class="text-sm text-gray-600">En revisión desde 05/03/2024</p>
                    </div>
                </div>
            </div>

            <!-- Acceso rápido -->
            <div class="bg-white rounded-lg shadow p-6">
                <h3 class="text-lg font-bold text-gray-800 mb-4">Acceso Rápido</h3>
                <div class="space-y-3">
                    <a href="#" class="flex items-center p-3 bg-gray-50 hover:bg-orange-50 rounded-lg">
                        <i class="fas fa-download text-primary mr-3"></i>
                        <span>Descargar Todos los Manuales</span>
                    </a>
                    <a href="#" class="flex items-center p-3 bg-gray-50 hover:bg-orange-50 rounded-lg">
                        <i class="fas fa-history text-primary mr-3"></i>
                        <span>Historial de Cambios</span>
                    </a>
                    <a href="#" class="flex items-center p-3 bg-gray-50 hover:bg-orange-50 rounded-lg">
                        <i class="fas fa-question-circle text-primary mr-3"></i>
                        <span>Ayuda y Soporte</span>
                    </a>
                </div>
            </div>
        </div>
    </div>



@endsection
@push('js')
@endpush
