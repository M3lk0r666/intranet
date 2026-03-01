<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Proceso Comercial IT - {{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- Tailwind CSS -->
    @vite(['resources/css/app.css'])

    <!-- Flowbite CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet" />

    <!-- Font Awesome para iconos -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- PDF.js para visualizar PDFs -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/3.11.174/pdf.min.js"></script>

    <style>
        body {
            font-family: 'Inter', sans-serif;
        }

        .bg-logo {
            background-image: url('{{ asset('images/logo-fondo.jpg') }}');
            background-size: contain;
            background-position: center;
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-color: #f8fafc;
        }

        /* Overlay sutil para mejor legibilidad */
        .bg-overlay {
            background-color: rgba(255, 255, 255, 0.92);
        }

        /* Estilos para la tabla */
        .table-container {
            background: white;
            border-radius: 1rem;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.05);
            overflow: hidden;
        }

        .table-header {
            background: linear-gradient(135deg, #10b981 0%, #059669 100%);
            color: white;
        }

        .table-row {
            transition: all 0.2s ease;
            border-bottom: 1px solid #f1f5f9;
        }

        .table-row:hover {
            background-color: #f0fdf4;
            transform: translateY(-1px);
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
        }

        /* Estilos para los modales */
        .custom-modal {
            display: none;
            position: fixed;
            z-index: 1000;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.9);
            backdrop-filter: blur(5px);
        }

        .modal-content {
            margin: auto;
            display: block;
            width: 90%;
            height: 90%;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background: white;
            border-radius: 12px;
            overflow: hidden;
        }

        .pdf-container {
            width: 100%;
            height: 100%;
            position: relative;
        }

        #pdf-viewer {
            width: 100%;
            height: calc(100% - 60px);
        }

        .pdf-controls {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            background: #1f2937;
            padding: 15px 20px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            color: white;
        }

        .pdf-nav-btn {
            background: #374151;
            border: none;
            width: 40px;
            height: 40px;
            border-radius: 50%;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 18px;
            color: white;
            transition: all 0.2s ease;
        }

        .pdf-nav-btn:hover {
            background: #4f46e5;
            transform: scale(1.1);
        }

        .pdf-nav-btn:disabled {
            opacity: 0.5;
            cursor: not-allowed;
        }

        .close-modal {
            position: absolute;
            top: 20px;
            right: 30px;
            color: #f1f1f1;
            font-size: 40px;
            font-weight: bold;
            cursor: pointer;
            z-index: 1001;
            background: rgba(0, 0, 0, 0.5);
            width: 50px;
            height: 50px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.3s ease;
        }

        .close-modal:hover {
            background: rgba(255, 0, 0, 0.7);
            transform: rotate(90deg);
        }

        /* Modal para imagen */
        .image-modal-content {
            max-width: 90%;
            max-height: 90%;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }

        #modal-image {
            max-width: 100%;
            max-height: 80vh;
            object-fit: contain;
            border-radius: 8px;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
        }

        .image-caption {
            text-align: center;
            color: white;
            padding: 15px;
            background: rgba(0, 0, 0, 0.7);
            border-radius: 8px;
            margin-top: 20px;
        }

        /* Botones */
        .view-pdf-btn {
            transition: all 0.3s ease;
            background: linear-gradient(135deg, #10b981 0%, #059669 100%);
            color: white;
        }

        .view-pdf-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 20px rgba(16, 185, 129, 0.3);
        }

        .view-image-btn {
            transition: all 0.3s ease;
            background: linear-gradient(135deg, #3b82f6 0%, #1d4ed8 100%);
            color: white;
        }

        .view-image-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 20px rgba(59, 130, 246, 0.3);
        }

        .back-btn {
            transition: all 0.3s ease;
            background: linear-gradient(135deg, #6b7280 0%, #4b5563 100%);
            color: white;
        }

        .back-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 20px rgba(107, 114, 128, 0.3);
        }

        /* Badges para estados */
        .process-badge {
            padding: 4px 12px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
            display: inline-block;
        }

        .badge-essential {
            background: #fee2e2;
            color: #dc2626;
        }

        .badge-strategic {
            background: #dbeafe;
            color: #1d4ed8;
        }

        .badge-analytical {
            background: #fef3c7;
            color: #d97706;
        }

        .badge-creative {
            background: #f0fdf4;
            color: #059669;
        }

        .badge-negotiation {
            background: #f5f3ff;
            color: #7c3aed;
        }

        .badge-final {
            background: #fdf2f8;
            color: #be185d;
        }
    </style>
</head>

<body class="bg-gray-50">
    <!-- Fondo con logo -->
    <div class="min-h-screen bg-logo">
        <!-- Overlay sutil -->
        <div class="min-h-screen bg-overlay">

            <!-- Header con navegación -->
            <header class="w-full py-6 px-6">
                <div class="container mx-auto flex justify-between items-center">
                    <div class="flex items-center">
                        <a href="{{ url('/intranet/procesos-internos') }}"
                            class="back-btn px-4 py-2 rounded-lg font-medium flex items-center gap-2 mr-4">
                            <i class="fas fa-arrow-left"></i>
                            Volver a Procesos
                        </a>
                        <div>
                            <h1 class="text-2xl font-bold text-gray-800">
                                <i class="fas fa-laptop-code text-green-600 mr-2"></i>
                                Proceso Comercial IT
                            </h1>
                            <p class="text-gray-600 text-sm">
                                Gestión integral de ventas y servicios tecnológicos
                            </p>
                        </div>
                    </div>

                    <!-- Información adicional -->
                    <div class="hidden md:block">
                        <div class="text-right">
                            <p class="text-sm text-gray-500">Ciclo completo</p>
                            <p class="text-sm font-medium text-gray-700">6 etapas</p>
                        </div>
                    </div>
                </div>
            </header>

            <!-- Contenido principal -->
            <main class="container mx-auto px-4 py-8">
                <!-- Resumen informativo -->
                <div class="mb-8">
                    <div class="bg-gradient-to-r from-green-50 to-emerald-50 rounded-xl p-6 shadow-sm">
                        <div class="flex items-start">
                            <div class="mr-4">
                                <div class="w-12 h-12 bg-green-100 rounded-lg flex items-center justify-center">
                                    <i class="fas fa-info-circle text-green-600 text-xl"></i>
                                </div>
                            </div>
                            <div class="flex-1">
                                <h3 class="text-lg font-bold text-gray-800 mb-2">
                                    Proceso Comercial IT Completo
                                </h3>
                                <p class="text-gray-600">
                                    Este proceso garantiza la entrega eficiente, rentable y con alta calidad de los
                                    servicios IT ofrecidos, asegurando una experiencia positiva para el cliente a lo
                                    largo de todo el ciclo de vida del proyecto.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Tabla de procesos -->
                <div class="mb-12">
                    <div class="table-container overflow-hidden">
                        <!-- Encabezado de la tabla -->
                        <div class="table-header px-6 py-4">
                            <div class="grid grid-cols-12 gap-4">
                                <div class="col-span-1">
                                    <span class="font-bold">#</span>
                                </div>
                                <div class="col-span-4">
                                    <span class="font-bold">Nombre del Proceso</span>
                                </div>
                                <div class="col-span-5">
                                    <span class="font-bold">Descripción</span>
                                </div>
                                <div class="col-span-2">
                                    <span class="font-bold">Documentación</span>
                                </div>
                            </div>
                        </div>

                        <!-- Cuerpo de la tabla -->
                        <div class="divide-y divide-gray-100">
                            <!-- Fila 1: Proceso Comercial IT -->
                            <div class="table-row px-6 py-5">
                                <div class="grid grid-cols-12 gap-4 items-center">
                                    <!-- Columna 1: Número -->
                                    <div class="col-span-1">
                                        <div
                                            class="w-8 h-8 bg-gradient-to-r from-green-500 to-emerald-600 rounded-full flex items-center justify-center text-white font-bold">
                                            1
                                        </div>
                                    </div>

                                    <!-- Columna 2: Nombre del Proceso -->
                                    <div class="col-span-4">
                                        <h4 class="font-bold text-gray-800 text-lg">Proceso Comercial IT</h4>
                                        <div class="flex items-center mt-1">
                                            <span class="process-badge badge-essential">
                                                <i class="fas fa-flag mr-1"></i> Esencial
                                            </span>
                                        </div>
                                        <p class="text-xs text-gray-500 mt-1">
                                            Proceso principal
                                        </p>
                                    </div>

                                    <!-- Columna 3: Descripción -->
                                    <div class="col-span-5">
                                        <p class="text-gray-600">
                                            El propósito principal de tener un proceso comercial completo es garantizar
                                            la entrega eficiente, rentable y con alta calidad de los servicios
                                            ofrecidos, asegurando una experiencia positiva y continua para el cliente a
                                            lo largo de todo el ciclo de vida del proyecto. Desde el primer contacto en
                                            preventa hasta el seguimiento postventa, este proceso permite alinear los
                                            esfuerzos de las áreas comerciales, técnicas y operativas bajo un mismo
                                            enfoque ágil, escalable y medible.
                                        </p>
                                        <div class="flex flex-wrap gap-2 mt-2">
                                            <span class="px-2 py-1 bg-green-100 text-green-700 text-xs rounded">
                                                <i class="fas fa-check-circle mr-1"></i> Calidad
                                            </span>
                                            <span class="px-2 py-1 bg-green-100 text-green-700 text-xs rounded">
                                                <i class="fas fa-bullseye mr-1"></i> Eficiencia
                                            </span>
                                            <span class="px-2 py-1 bg-green-100 text-green-700 text-xs rounded">
                                                <i class="fas fa-users mr-1"></i> Cliente
                                            </span>
                                        </div>
                                    </div>

                                    <!-- Columna 4: Documentación -->
                                    <div class="col-span-2">
                                        <button onclick="openPdfModal('proceso_comercial_it')"
                                            class="view-pdf-btn px-4 py-2.5 rounded-lg font-medium flex items-center justify-center gap-2 w-full mb-2">
                                            <i class="fas fa-file-pdf"></i>
                                            Procedimiento
                                        </button>
                                        <div class="mt-2 text-center">
                                            <span class="text-xs text-gray-500">
                                                <i class="fas fa-file-pdf mr-1"></i> PDF - 15 páginas
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Fila 2: Generación de demanda omnicanal -->
                            <div class="table-row px-6 py-5">
                                <div class="grid grid-cols-12 gap-4 items-center">
                                    <!-- Columna 1: Número -->
                                    <div class="col-span-1">
                                        <div
                                            class="w-8 h-8 bg-gradient-to-r from-blue-500 to-cyan-600 rounded-full flex items-center justify-center text-white font-bold">
                                            2
                                        </div>
                                    </div>

                                    <!-- Columna 2: Nombre del Proceso -->
                                    <div class="col-span-4">
                                        <h4 class="font-bold text-gray-800 text-lg">Generación de Demanda Omnicanal</h4>
                                        <div class="flex items-center mt-1">
                                            <span class="process-badge badge-strategic">
                                                <i class="fas fa-bullhorn mr-1"></i> Estratégico
                                            </span>
                                        </div>
                                        <p class="text-xs text-gray-500 mt-1">
                                            Atracción de prospectos
                                        </p>
                                    </div>

                                    <!-- Columna 3: Descripción -->
                                    <div class="col-span-5">
                                        <p class="text-gray-600">
                                            El proceso de generación de demanda omnicanal busca atraer y convertir
                                            prospectos de múltiples canales (digitales, físicos, directos e indirectos),
                                            asegurando una experiencia unificada, personalizada y continua.
                                        </p>
                                        <div class="flex flex-wrap gap-2 mt-2">
                                            <span class="px-2 py-1 bg-blue-100 text-blue-700 text-xs rounded">
                                                <i class="fas fa-globe mr-1"></i> Omnicanal
                                            </span>
                                            <span class="px-2 py-1 bg-blue-100 text-blue-700 text-xs rounded">
                                                <i class="fas fa-bullseye mr-1"></i> Conversión
                                            </span>
                                            <span class="px-2 py-1 bg-blue-100 text-blue-700 text-xs rounded">
                                                <i class="fas fa-user-plus mr-1"></i> Prospectos
                                            </span>
                                        </div>
                                    </div>

                                    <!-- Columna 4: Documentación -->
                                    <div class="col-span-2">
                                        <button onclick="openPdfModal('demanda_omnicanal')"
                                            class="view-pdf-btn px-4 py-2.5 rounded-lg font-medium flex items-center justify-center gap-2 w-full mb-2">
                                            <i class="fas fa-file-pdf"></i>
                                            Procedimiento
                                        </button>
                                        <div class="mt-2 text-center">
                                            <span class="text-xs text-gray-500">
                                                <i class="fas fa-file-pdf mr-1"></i> PDF - 12 páginas
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Fila 3: Asignación de cuentas y seguimiento -->
                            <div class="table-row px-6 py-5">
                                <div class="grid grid-cols-12 gap-4 items-center">
                                    <!-- Columna 1: Número -->
                                    <div class="col-span-1">
                                        <div
                                            class="w-8 h-8 bg-gradient-to-r from-amber-500 to-orange-600 rounded-full flex items-center justify-center text-white font-bold">
                                            3
                                        </div>
                                    </div>

                                    <!-- Columna 2: Nombre del Proceso -->
                                    <div class="col-span-4">
                                        <h4 class="font-bold text-gray-800 text-lg">Asignación de Cuentas y Seguimiento
                                            de Oportunidades</h4>
                                        <div class="flex items-center mt-1">
                                            <span class="process-badge badge-analytical">
                                                <i class="fas fa-chart-line mr-1"></i> Analítico
                                            </span>
                                        </div>
                                        <p class="text-xs text-gray-500 mt-1">
                                            Distribución estratégica
                                        </p>
                                    </div>

                                    <!-- Columna 3: Descripción -->
                                    <div class="col-span-5">
                                        <p class="text-gray-600">
                                            Organizar y distribuir las cuentas y oportunidades de forma estratégica para
                                            maximizar el potencial de cierre y la atención personalizada. Asegurando que
                                            los Ejecutivos de cuenta o consultores trabajen con las oportunidades
                                            correctas, en función de su perfil, experiencia, maximizando la conversión y
                                            atención efectiva.
                                        </p>
                                        <div class="flex flex-wrap gap-2 mt-2">
                                            <span class="px-2 py-1 bg-amber-100 text-amber-700 text-xs rounded">
                                                <i class="fas fa-user-tie mr-1"></i> Cuentas
                                            </span>
                                            <span class="px-2 py-1 bg-amber-100 text-amber-700 text-xs rounded">
                                                <i class="fas fa-search-dollar mr-1"></i> Oportunidades
                                            </span>
                                            <span class="px-2 py-1 bg-amber-100 text-amber-700 text-xs rounded">
                                                <i class="fas fa-chart-bar mr-1"></i> Seguimiento
                                            </span>
                                        </div>
                                    </div>

                                    <!-- Columna 4: Documentación -->
                                    <div class="col-span-2">
                                        <button onclick="openPdfModal('asignacion_cuentas')"
                                            class="view-pdf-btn px-4 py-2.5 rounded-lg font-medium flex items-center justify-center gap-2 w-full mb-2">
                                            <i class="fas fa-file-pdf"></i>
                                            Procedimiento
                                        </button>
                                        <div class="mt-2 text-center">
                                            <span class="text-xs text-gray-500">
                                                <i class="fas fa-file-pdf mr-1"></i> PDF - 18 páginas
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Fila 4: Análisis de requerimientos -->
                            <div class="table-row px-6 py-5">
                                <div class="grid grid-cols-12 gap-4 items-center">
                                    <!-- Columna 1: Número -->
                                    <div class="col-span-1">
                                        <div
                                            class="w-8 h-8 bg-gradient-to-r from-purple-500 to-violet-600 rounded-full flex items-center justify-center text-white font-bold">
                                            4
                                        </div>
                                    </div>

                                    <!-- Columna 2: Nombre del Proceso -->
                                    <div class="col-span-4">
                                        <h4 class="font-bold text-gray-800 text-lg">Análisis de Requerimientos</h4>
                                        <div class="flex items-center mt-1">
                                            <span class="process-badge badge-creative">
                                                <i class="fas fa-clipboard-check mr-1"></i> Creativo
                                            </span>
                                        </div>
                                        <p class="text-xs text-gray-500 mt-1">
                                            Levantamiento de necesidades
                                        </p>
                                    </div>

                                    <!-- Columna 3: Descripción -->
                                    <div class="col-span-5">
                                        <p class="text-gray-600">
                                            Levantar información precisa sobre las necesidades del cliente para
                                            dimensionar correctamente el proyecto desde el inicio. Evitando desviaciones
                                            que afecten los tiempos, presupuesto o calidad de entrega, y asegurar que el
                                            cliente reciba lo que realmente necesita.
                                        </p>
                                        <div class="flex flex-wrap gap-2 mt-2">
                                            <span class="px-2 py-1 bg-purple-100 text-purple-700 text-xs rounded">
                                                <i class="fas fa-list-check mr-1"></i> Requerimientos
                                            </span>
                                            <span class="px-2 py-1 bg-purple-100 text-purple-700 text-xs rounded">
                                                <i class="fas fa-ruler-combined mr-1"></i> Dimensionamiento
                                            </span>
                                            <span class="px-2 py-1 bg-purple-100 text-purple-700 text-xs rounded">
                                                <i class="fas fa-exclamation-triangle mr-1"></i> Prevención
                                            </span>
                                        </div>
                                    </div>

                                    <!-- Columna 4: Documentación -->
                                    <div class="col-span-2">
                                        <button onclick="openPdfModal('analisis_requerimientos')"
                                            class="view-pdf-btn px-4 py-2.5 rounded-lg font-medium flex items-center justify-center gap-2 w-full mb-2">
                                            <i class="fas fa-file-pdf"></i>
                                            Procedimiento
                                        </button>
                                        <div class="mt-2 text-center">
                                            <span class="text-xs text-gray-500">
                                                <i class="fas fa-file-pdf mr-1"></i> PDF - 22 páginas
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Fila 5: Diseño de solución -->
                            <div class="table-row px-6 py-5">
                                <div class="grid grid-cols-12 gap-4 items-center">
                                    <!-- Columna 1: Número -->
                                    <div class="col-span-1">
                                        <div
                                            class="w-8 h-8 bg-gradient-to-r from-indigo-500 to-blue-600 rounded-full flex items-center justify-center text-white font-bold">
                                            5
                                        </div>
                                    </div>

                                    <!-- Columna 2: Nombre del Proceso -->
                                    <div class="col-span-4">
                                        <h4 class="font-bold text-gray-800 text-lg">Diseño de Solución y Propuesta
                                            Técnico-Comercial</h4>
                                        <div class="flex items-center mt-1">
                                            <span class="process-badge badge-negotiation">
                                                <i class="fas fa-pencil-ruler mr-1"></i> Diseño
                                            </span>
                                        </div>
                                        <p class="text-xs text-gray-500 mt-1">
                                            Transformación de requerimientos
                                        </p>
                                    </div>

                                    <!-- Columna 3: Descripción -->
                                    <div class="col-span-5">
                                        <p class="text-gray-600">
                                            Transformar los requerimientos en una solución concreta con arquitectura,
                                            servicios, tiempos y costos definidos. Garantizando que lo ofrecido al
                                            cliente sea ejecutable, rentable y cumpla con las expectativas.
                                        </p>
                                        <div class="flex flex-wrap gap-2 mt-2">
                                            <span class="px-2 py-1 bg-indigo-100 text-indigo-700 text-xs rounded">
                                                <i class="fas fa-drafting-compass mr-1"></i> Arquitectura
                                            </span>
                                            <span class="px-2 py-1 bg-indigo-100 text-indigo-700 text-xs rounded">
                                                <i class="fas fa-dollar-sign mr-1"></i> Costos
                                            </span>
                                            <span class="px-2 py-1 bg-indigo-100 text-indigo-700 text-xs rounded">
                                                <i class="fas fa-calendar-alt mr-1"></i> Tiempos
                                            </span>
                                        </div>
                                    </div>

                                    <!-- Columna 4: Documentación -->
                                    <div class="col-span-2">
                                        <div class="space-y-2">
                                            <button onclick="openPdfModal('diseno_solucion')"
                                                class="view-pdf-btn px-4 py-2.5 rounded-lg font-medium flex items-center justify-center gap-2 w-full">
                                                <i class="fas fa-file-pdf"></i>
                                                Procedimiento
                                            </button>
                                            <button onclick="openImageModal('diagrama_solucion')"
                                                class="view-image-btn px-4 py-2.5 rounded-lg font-medium flex items-center justify-center gap-2 w-full">
                                                <i class="fas fa-image"></i>
                                                Ver Diagrama
                                            </button>
                                        </div>
                                        <div class="mt-2 text-center">
                                            <span class="text-xs text-gray-500">
                                                <i class="fas fa-file-pdf mr-1"></i> PDF + Imagen
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Fila 6: Fase de negociación -->
                            <div class="table-row px-6 py-5">
                                <div class="grid grid-cols-12 gap-4 items-center">
                                    <!-- Columna 1: Número -->
                                    <div class="col-span-1">
                                        <div
                                            class="w-8 h-8 bg-gradient-to-r from-pink-500 to-rose-600 rounded-full flex items-center justify-center text-white font-bold">
                                            6
                                        </div>
                                    </div>

                                    <!-- Columna 2: Nombre del Proceso -->
                                    <div class="col-span-4">
                                        <h4 class="font-bold text-gray-800 text-lg">Fase de Negociación</h4>
                                        <div class="flex items-center mt-1">
                                            <span class="process-badge badge-final">
                                                <i class="fas fa-handshake mr-1"></i> Final
                                            </span>
                                        </div>
                                        <p class="text-xs text-gray-500 mt-1">
                                            Aceptación y firma
                                        </p>
                                    </div>

                                    <!-- Columna 3: Descripción -->
                                    <div class="col-span-5">
                                        <p class="text-gray-600">
                                            Lograr la aceptación formal del cliente y la firma del contrato, asegurando
                                            que todos los términos, condiciones y expectativas estén claramente
                                            definidas y aceptadas por ambas partes.
                                        </p>
                                        <div class="flex flex-wrap gap-2 mt-2">
                                            <span class="px-2 py-1 bg-pink-100 text-pink-700 text-xs rounded">
                                                <i class="fas fa-file-contract mr-1"></i> Contrato
                                            </span>
                                            <span class="px-2 py-1 bg-pink-100 text-pink-700 text-xs rounded">
                                                <i class="fas fa-handshake mr-1"></i> Negociación
                                            </span>
                                            <span class="px-2 py-1 bg-pink-100 text-pink-700 text-xs rounded">
                                                <i class="fas fa-check-double mr-1"></i> Aceptación
                                            </span>
                                        </div>
                                    </div>

                                    <!-- Columna 4: Documentación -->
                                    <div class="col-span-2">
                                        <button onclick="openPdfModal('fase_negociacion')"
                                            class="view-pdf-btn px-4 py-2.5 rounded-lg font-medium flex items-center justify-center gap-2 w-full mb-2">
                                            <i class="fas fa-file-pdf"></i>
                                            Procedimiento
                                        </button>
                                        <div class="mt-2 text-center">
                                            <span class="text-xs text-gray-500">
                                                <i class="fas fa-file-pdf mr-1"></i> PDF - 10 páginas
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Información de la tabla -->
                    <div class="mt-4 text-center">
                        <p class="text-sm text-gray-500">
                            <i class="fas fa-info-circle mr-1"></i>
                            Mostrando los 6 procesos principales del ciclo comercial IT. Haga clic en "Procedimiento"
                            para ver la documentación detallada.
                        </p>
                    </div>
                </div>

                <!-- Resumen del ciclo -->
                <div class="mb-12">
                    <div class="bg-white rounded-xl shadow-md p-6 border border-gray-100">
                        <h3 class="text-lg font-bold text-gray-800 mb-4 flex items-center">
                            <i class="fas fa-sync-alt text-green-600 mr-2"></i>
                            Ciclo Comercial IT Completo
                        </h3>
                        <div class="grid grid-cols-2 md:grid-cols-6 gap-4">
                            <div class="text-center p-3 bg-green-50 rounded-lg">
                                <div
                                    class="w-10 h-10 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-2">
                                    <span class="font-bold text-green-700">1</span>
                                </div>
                                <p class="text-xs font-medium text-gray-700">Proceso Principal</p>
                            </div>
                            <div class="text-center p-3 bg-blue-50 rounded-lg">
                                <div
                                    class="w-10 h-10 bg-blue-100 rounded-full flex items-center justify-center mx-auto mb-2">
                                    <span class="font-bold text-blue-700">2</span>
                                </div>
                                <p class="text-xs font-medium text-gray-700">Demanda Omnicanal</p>
                            </div>
                            <div class="text-center p-3 bg-amber-50 rounded-lg">
                                <div
                                    class="w-10 h-10 bg-amber-100 rounded-full flex items-center justify-center mx-auto mb-2">
                                    <span class="font-bold text-amber-700">3</span>
                                </div>
                                <p class="text-xs font-medium text-gray-700">Asignación</p>
                            </div>
                            <div class="text-center p-3 bg-purple-50 rounded-lg">
                                <div
                                    class="w-10 h-10 bg-purple-100 rounded-full flex items-center justify-center mx-auto mb-2">
                                    <span class="font-bold text-purple-700">4</span>
                                </div>
                                <p class="text-xs font-medium text-gray-700">Requerimientos</p>
                            </div>
                            <div class="text-center p-3 bg-indigo-50 rounded-lg">
                                <div
                                    class="w-10 h-10 bg-indigo-100 rounded-full flex items-center justify-center mx-auto mb-2">
                                    <span class="font-bold text-indigo-700">5</span>
                                </div>
                                <p class="text-xs font-medium text-gray-700">Solución</p>
                            </div>
                            <div class="text-center p-3 bg-pink-50 rounded-lg">
                                <div
                                    class="w-10 h-10 bg-pink-100 rounded-full flex items-center justify-center mx-auto mb-2">
                                    <span class="font-bold text-pink-700">6</span>
                                </div>
                                <p class="text-xs font-medium text-gray-700">Negociación</p>
                            </div>
                        </div>
                    </div>
                </div>

            </main>

            <!-- Footer -->
            <footer class="py-8 border-t border-gray-200">
                <div class="container mx-auto px-4">
                    <div class="flex flex-col md:flex-row justify-between items-center">
                        <div class="mb-4 md:mb-0">
                            <p class="text-gray-600">
                                <i class="fas fa-laptop-code text-green-600 mr-2"></i>
                                Proceso Comercial IT &copy; {{ date('Y') }} -
                                {{ config('app.name', 'Portal Empresarial') }}
                            </p>
                        </div>
                        <div class="flex gap-6">
                            <button onclick="openPdfModal('proceso_comercial_it')"
                                class="text-gray-500 hover:text-gray-700">
                                <i class="fas fa-download"></i> Descargar Todo
                            </button>
                            <a href="{{ url('/procesos') }}" class="text-green-600 hover:text-green-800 font-medium">
                                <i class="fas fa-arrow-left"></i> Procesos
                            </a>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>

    <!-- Modal para visualizar PDFs -->
    <div id="pdfModal" class="custom-modal">
        <span class="close-modal" onclick="closePdfModal()">&times;</span>

        <div class="modal-content">
            <div class="pdf-container">
                <canvas id="pdf-viewer"></canvas>
                <div class="pdf-controls">
                    <div>
                        <button id="prev-page" class="pdf-nav-btn" onclick="prevPage()">
                            <i class="fas fa-chevron-left"></i>
                        </button>
                        <span id="page-info" class="mx-4">Página: <span id="current-page">1</span> de <span
                                id="total-pages">0</span></span>
                        <button id="next-page" class="pdf-nav-btn" onclick="nextPage()">
                            <i class="fas fa-chevron-right"></i>
                        </button>
                    </div>
                    <div>
                        <button class="pdf-nav-btn" onclick="zoomInPdf()">
                            <i class="fas fa-search-plus"></i>
                        </button>
                        <span class="mx-2 text-sm">Zoom: <span id="zoom-level">100</span>%</span>
                        <button class="pdf-nav-btn" onclick="zoomOutPdf()">
                            <i class="fas fa-search-minus"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal para visualizar imagen -->
    <div id="imageModal" class="custom-modal">
        <span class="close-modal" onclick="closeImageModal()">&times;</span>

        <div class="image-modal-content">
            <img id="modal-image" src="" alt="Diagrama de solución">
            <div class="image-caption">
                <h4 class="text-lg font-bold mb-1" id="image-title">Diagrama de Solución Técnico-Comercial</h4>
                <p class="text-sm" id="image-description">Arquitectura y componentes de la propuesta técnica</p>
            </div>
        </div>
    </div>

    <!-- Flowbite JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>

    <!-- Script para los modales y PDFs -->
    <script>
        // Variables globales para PDF
        let pdfDoc = null;
        let currentPage = 1;
        let pageRendering = false;
        let pageNumPending = null;
        let currentPdf = '';
        let scale = 1.0;
        const scaleStep = 0.2;
        const maxScale = 3.0;
        const minScale = 0.5;

        // Mapeo de PDFs a rutas reales
        const pdfFiles = {
            'proceso_comercial_it': 'storage/documents/todo-acerca-de-redes.pdf',
            'demanda_omnicanal': '/documents/demanda_omnicanal.pdf',
            'asignacion_cuentas': '/documents/asignacion_cuentas.pdf',
            'analisis_requerimientos': '/documents/analisis_requerimientos.pdf',
            'diseno_solucion': '/documents/diseno_solucion.pdf',
            'fase_negociacion': '/documents/fase_negociacion.pdf'
        };

        // Mapeo de imágenes
        const imageFiles = {
            'diagrama_solucion': '/images/diagrama_solucion.jpg'
        };

        // Abrir modal de PDF
        function openPdfModal(pdfId) {
            currentPdf = pdfId;
            const modal = document.getElementById('pdfModal');
            modal.style.display = 'block';
            document.body.style.overflow = 'hidden';

            // Cargar el PDF
            loadPdf(pdfFiles[pdfId] || '/documents/default.pdf');
        }

        // Cerrar modal de PDF
        function closePdfModal() {
            const modal = document.getElementById('pdfModal');
            modal.style.display = 'none';
            document.body.style.overflow = 'auto';
            pdfDoc = null;
            currentPage = 1;
            scale = 1.0;
        }

        // Abrir modal de imagen
        function openImageModal(imageId) {
            const modal = document.getElementById('imageModal');
            const image = document.getElementById('modal-image');
            const imagePath = imageFiles[imageId] || '/images/default_diagram.jpg';

            // Configurar imagen
            image.src = imagePath;
            image.onerror = function() {
                this.src =
                    'data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" width="800" height="600" viewBox="0 0 800 600"><rect width="800" height="600" fill="%23f0f0f0"/><text x="400" y="300" font-family="Arial" font-size="24" text-anchor="middle" fill="%23666">Diagrama no disponible</text></svg>';
            };

            // Mostrar modal
            modal.style.display = 'block';
            document.body.style.overflow = 'hidden';
        }

        // Cerrar modal de imagen
        function closeImageModal() {
            const modal = document.getElementById('imageModal');
            modal.style.display = 'none';
            document.body.style.overflow = 'auto';
        }

        // Cerrar modales al hacer clic fuera
        window.onclick = function(event) {
            const pdfModal = document.getElementById('pdfModal');
            const imageModal = document.getElementById('imageModal');
            const pdfContent = document.querySelector('.modal-content');
            const imageContent = document.querySelector('.image-modal-content');

            if (event.target === pdfModal && !pdfContent.contains(event.target)) {
                closePdfModal();
            }
            if (event.target === imageModal && !imageContent.contains(event.target)) {
                closeImageModal();
            }
        }

        // Cerrar modales con tecla ESC
        document.addEventListener('keydown', function(event) {
            if (event.key === 'Escape') {
                closePdfModal();
                closeImageModal();
            }
        });

        // Cargar PDF
        async function loadPdf(url) {
            try {
                // Configurar PDF.js
                pdfjsLib.GlobalWorkerOptions.workerSrc =
                    'https://cdnjs.cloudflare.com/ajax/libs/pdf.js/3.11.174/pdf.worker.min.js';

                // Cargar el documento PDF
                pdfDoc = await pdfjsLib.getDocument(url).promise;

                // Actualizar información de páginas
                document.getElementById('total-pages').textContent = pdfDoc.numPages;
                document.getElementById('current-page').textContent = currentPage;
                document.getElementById('zoom-level').textContent = Math.round(scale * 100);

                // Renderizar primera página
                renderPage(currentPage);

                // Habilitar/deshabilitar botones
                document.getElementById('prev-page').disabled = currentPage <= 1;
                document.getElementById('next-page').disabled = currentPage >= pdfDoc.numPages;

            } catch (error) {
                console.error('Error al cargar PDF:', error);
                alert('No se pudo cargar el documento PDF. Asegúrese de que el archivo existe.');
            }
        }

        // Renderizar página del PDF
        async function renderPage(num) {
            pageRendering = true;

            try {
                // Obtener página
                const page = await pdfDoc.getPage(num);

                // Configurar canvas
                const canvas = document.getElementById('pdf-viewer');
                const ctx = canvas.getContext('2d');
                const viewport = page.getViewport({
                    scale: scale
                });

                canvas.height = viewport.height;
                canvas.width = viewport.width;

                // Renderizar página
                const renderContext = {
                    canvasContext: ctx,
                    viewport: viewport
                };

                await page.render(renderContext).promise;

                // Actualizar información
                document.getElementById('current-page').textContent = num;
                document.getElementById('prev-page').disabled = num <= 1;
                document.getElementById('next-page').disabled = num >= pdfDoc.numPages;

                pageRendering = false;

                // Si hay página pendiente, renderizarla
                if (pageNumPending !== null) {
                    renderPage(pageNumPending);
                    pageNumPending = null;
                }

            } catch (error) {
                console.error('Error al renderizar página:', error);
            }
        }

        // Navegación de páginas
        function queueRenderPage(num) {
            if (pageRendering) {
                pageNumPending = num;
            } else {
                renderPage(num);
            }
        }

        function prevPage() {
            if (currentPage <= 1 || !pdfDoc) return;
            currentPage--;
            queueRenderPage(currentPage);
        }

        function nextPage() {
            if (!pdfDoc || currentPage >= pdfDoc.numPages) return;
            currentPage++;
            queueRenderPage(currentPage);
        }

        // Funciones de zoom
        function zoomInPdf() {
            if (scale >= maxScale || !pdfDoc) return;
            scale += scaleStep;
            document.getElementById('zoom-level').textContent = Math.round(scale * 100);
            renderPage(currentPage);
        }

        function zoomOutPdf() {
            if (scale <= minScale || !pdfDoc) return;
            scale -= scaleStep;
            document.getElementById('zoom-level').textContent = Math.round(scale * 100);
            renderPage(currentPage);
        }

        // Manejo de error de imagen
        document.getElementById('modal-image').onerror = function() {
            this.src =
                'data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" width="800" height="600" viewBox="0 0 800 600"><rect width="800" height="600" fill="%23f0f0f0"/><text x="400" y="300" font-family="Arial" font-size="24" text-anchor="middle" fill="%23666">Diagrama no disponible</text><text x="400" y="330" font-family="Arial" font-size="16" text-anchor="middle" fill="%23999">Coloque diagrama_solucion.jpg en public/images/</text></svg>';
        };
    </script>

    <!-- Scripts adicionales -->
    @vite(['resources/js/app.js'])
</body>

</html>
