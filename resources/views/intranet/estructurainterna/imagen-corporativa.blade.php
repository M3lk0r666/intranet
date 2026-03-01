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
                            <span class="ml-1 text-sm text-primary font-medium md:ml-2">Imagen Corporativa</span>
                        </div>
                    </li>
                </ol>
            </nav>
        </div>
    </div>

    <!-- Encabezado -->
    <div class="mb-8 mt-6">
        <h1 class="text-3xl font-bold text-gray-800 mb-2">Biblioteca de Materiales Visuales</h1>
        <p class="text-gray-600">Repositorio centralizado de documentos, diagramas y recursos visuales</p>
    </div>

    <div class="mb-8">
        <h1 class="text-3xl font-bold text-gray-800 mb-2">Imagen Corporativa</h1>
    </div>

    <!-- Grid de materiales -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-8">
        <!-- Material 1 -->
        <div class="card-hover bg-white rounded-lg shadow overflow-hidden">
            <div class="p-6">
                <div class="flex items-start mb-4">
                    <div class="bg-red-100 text-red-600 p-3 rounded-lg mr-4">
                        <i class="ri-file-ppt-2-line"></i>
                    </div>
                    <div>
                        <h3 class="text-lg font-bold text-gray-800 mb-1">Fondos Institucionales</h3>
                        <p class="text-gray-600 text-sm text-justify">Tener fondos institucionales para las sesiones de Zoom
                            garantiza la
                            continuidad profesional, la imagen corporativa, el control administrativo y la trazabilidad de
                            reuniones clave, fortaleciendo la eficiencia y seguridad de las comunicaciones empresariales y
                            refuerza la identidad de la empresa y genera confianza en clientes, socios y empleados.</p>
                    </div>
                </div>
                <div class="flex justify-between items-center mt-4">
                    <div class="text-sm text-gray-500">
                        <span class="mr-3"><i class="ri-file-zip-line"></i> ZIP</span>
                        <span><i class="fas fa-database mr-1"></i> 2.5 MB</span>
                    </div>
                    <button class="text-primary hover:text-orange-700 font-medium">
                        <i class="fas fa-download mr-1"></i> Descargar
                    </button>
                </div>
            </div>
        </div>

        <!-- Material 2 -->
        <div class="card-hover bg-white rounded-lg shadow overflow-hidden">
            <div class="p-6">
                <div class="flex items-start mb-4">
                    <div class="bg-blue-100 text-blue-600 p-3 rounded-lg mr-4">
                        <i class="fas fa-file-word text-2xl"></i>
                    </div>
                    <div>
                        <h3 class="text-lg font-bold text-gray-800 mb-1">Presentaciones Corporativas</h3>
                        <p class="text-gray-600 text-sm text-justify">Contar con formatos oficiales estandariza la
                            comunicación,
                            fortalece la imagen corporativa y asegura que los mensajes transmitidos sean claros,
                            consistentes y alineados a los valores de la empresa.</p>
                    </div>
                </div>
                <div class="flex justify-between items-center mt-4">
                    <div class="text-sm text-gray-500">
                        <span class="mr-3"><i class="ri-file-ppt-2-line"></i> Presentacion Obscura</span>
                        <span><i class="fas fa-database mr-1"></i> 3.0 MB</span>
                    </div>
                    <button class="text-primary hover:text-orange-700 font-medium">
                        <i class="fas fa-download mr-1"></i> Descargar
                    </button>
                </div>
                <div class="flex justify-between items-center mt-4">
                    <div class="text-sm text-gray-500">
                        <span class="mr-3"><i class="ri-file-ppt-2-line"></i> Presentacion Clara</span>
                        <span><i class="fas fa-database mr-1"></i> 2.9 MB</span>
                    </div>
                    <button class="text-primary hover:text-orange-700 font-medium">
                        <i class="fas fa-download mr-1"></i> Descargar
                    </button>
                </div>
            </div>
        </div>


        <!-- Material 3 -->
        <div class="card-hover bg-white rounded-lg shadow overflow-hidden">
            <div class="p-6">
                <div class="flex items-start mb-4">
                    <div class="bg-green-100 text-green-600 p-3 rounded-lg mr-4">
                        <i class="ri-image-line"></i>
                    </div>
                    <div>
                        <h3 class="text-lg font-bold text-gray-800 mb-1">Iconografía</h3>
                        <p class="text-gray-600 text-sm">Asegura uniformidad visual, fortalece el reconocimiento de la marca
                            y mejora la comunicación visual en las presentaciones.</p>
                    </div>
                </div>
                <div class="flex justify-between items-center mt-4">
                    <div class="text-sm text-gray-500">
                        <span class="mr-3"><i class="ri-file-zip-line"></i> Iconos</span>
                        <span><i class="fas fa-database mr-1"></i> 2.3 MB</span>
                    </div>
                    <button class="text-primary hover:text-orange-700 font-medium">
                        <i class="fas fa-download mr-1"></i> Descargar
                    </button>
                </div>
            </div>
        </div>
    </div>


@endsection
@push('js')
@endpush
