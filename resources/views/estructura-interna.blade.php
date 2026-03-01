<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Documentos de Estructura Interna - {{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Font Awesome para iconos -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <style>
        body {
            font-family: 'Inter', sans-serif;
            background-color: #f9fafb;
        }

        /* FONDO MUY SUTIL - casi invisible */
        .bg-logo {
            background-image: url('{{ asset('storage/media/backcorp.jpg') }}');
            background-size: contain;
            background-position: center;
            background-repeat: no-repeat;
            background-color: #ffffff;
            opacity: 0.03;

        }

        /* CONTENIDO PRINCIPAL - SIN OVERLAY */
        .main-content {
            position: relative;
            z-index: 1;
            background-color: transparent;
            /* TRANSPARENTE */
        }

        /* Contenedor principal */
        .documents-container {
            max-width: 1200px;
            margin: 0 auto;
            background-color: transparent;
            /* TRANSPARENTE */
        }

        /* Categorías */
        .category-section {
            margin-bottom: 3rem;
            background-color: white;
            border-radius: 0.75rem;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
            overflow: hidden;
        }

        .category-header {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 1.25rem 1.5rem;
            margin: 0;
        }

        /* Grid de documentos */
        .documents-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 1.5rem;
            padding: 1.5rem;
            background: white;
        }

        /* Tarjeta de documento */
        .document-card {
            background: white;
            border: 1px solid #e5e7eb;
            border-radius: 0.75rem;
            overflow: hidden;
            transition: all 0.3s ease;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
        }

        .document-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.15);
            border-color: #667eea;
        }

        /* Preview de documento */
        .document-preview {
            height: 200px;
            overflow: hidden;
            border-bottom: 1px solid #e5e7eb;
            background: #f8fafc;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .pdf-preview {
            width: 100%;
            height: 100%;
            border: none;
        }

        .image-preview {
            width: 100%;
            height: 100%;
            object-fit: contain;
            padding: 1rem;
        }

        .preview-placeholder {
            text-align: center;
            padding: 2rem;
            color: #6b7280;
        }

        /* Información del documento */
        .document-info {
            padding: 1.25rem;
        }

        .document-title {
            font-size: 1.125rem;
            font-weight: 600;
            color: #1f2937;
            margin-bottom: 0.5rem;
            line-height: 1.3;
        }

        .document-description {
            color: #6b7280;
            font-size: 0.875rem;
            line-height: 1.5;
            margin-bottom: 1rem;
        }

        .document-meta {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding-top: 1rem;
            border-top: 1px solid #f3f4f6;
        }

        .document-type {
            display: inline-flex;
            align-items: center;
            padding: 0.25rem 0.75rem;
            border-radius: 1rem;
            font-size: 0.75rem;
            font-weight: 500;
        }

        .type-pdf {
            background: #fee2e2;
            color: #dc2626;
        }

        .type-image {
            background: #dbeafe;
            color: #1d4ed8;
        }

        /* Acciones del documento */
        .document-actions {
            display: flex;
            gap: 0.75rem;
            margin-top: 1rem;
        }

        .action-btn {
            flex: 1;
            padding: 0.625rem 1rem;
            border-radius: 0.5rem;
            font-size: 0.875rem;
            font-weight: 500;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
            transition: all 0.2s ease;
            text-decoration: none;
            border: 1px solid transparent;
            cursor: pointer;
        }

        .view-btn {
            background: #3b82f6;
            color: white;
        }

        .view-btn:hover {
            background: #2563eb;
        }

        .download-btn {
            background: white;
            color: #374151;
            border-color: #d1d5db;
        }

        .download-btn:hover {
            background: #f9fafb;
            border-color: #9ca3af;
        }

        /* Modal para vista completa */
        .document-modal {
            display: none;
            position: fixed;
            z-index: 1000;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.9);
        }

        .modal-content {
            margin: auto;
            width: 95%;
            height: 95%;
            background: white;
            border-radius: 0.75rem;
            overflow: hidden;
            position: relative;
        }

        .modal-body {
            width: 100%;
            height: 100%;
            padding: 1rem;
        }

        .full-pdf {
            width: 100%;
            height: 100%;
            border: none;
        }

        .full-image {
            max-width: 100%;
            max-height: 100%;
            object-fit: contain;
            display: block;
            margin: 0 auto;
        }

        .close-modal {
            position: absolute;
            top: 1rem;
            right: 1rem;
            background: rgba(0, 0, 0, 0.7);
            color: white;
            width: 40px;
            height: 40px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            z-index: 1001;
            transition: all 0.3s ease;
        }

        .close-modal:hover {
            background: rgba(220, 38, 38, 0.8);
            transform: rotate(90deg);
        }

        /* Navegación */
        .back-btn {
            background: #4b5563;
            color: white;
            padding: 0.75rem 1.5rem;
            border-radius: 0.5rem;
            font-weight: 500;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            text-decoration: none;
            transition: all 0.3s ease;
        }

        .back-btn:hover {
            background: #374151;
            transform: translateX(-3px);
        }

        /* Header y Footer con fondo blanco sólido */
        .page-header,
        .page-footer {
            background-color: white;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
        }

        /* Responsive */
        @media (max-width: 768px) {
            .documents-grid {
                grid-template-columns: 1fr;
                padding: 1rem;
            }

            .document-preview {
                height: 180px;
            }

            .modal-content {
                width: 100%;
                height: 100%;
                border-radius: 0;
            }
        }
    </style>
</head>

<body class="bg-gray-50">
    <!-- Fondo MUY sutil -->
    <div class="bg-logo"></div>

    <!-- Header con fondo blanco -->
    <header class="page-header w-full py-6 px-4">
        <div class="documents-container">
            <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
                <div class="flex items-center gap-4">
                    <a href="{{ url('/procesos') }}" class="back-btn">
                        <i class="fas fa-arrow-left"></i>
                        Volver
                    </a>
                    <div>
                        <h1 class="text-2xl font-bold text-gray-800">
                            <i class="fas fa-folder-open text-purple-600 mr-2"></i>
                            Documentos de Estructura Interna
                        </h1>
                        <p class="text-gray-600 text-sm mt-1">
                            Consulta y descarga de documentos e imágenes organizacionales
                        </p>
                    </div>
                </div>

                <div class="text-sm text-gray-500">
                    <i class="far fa-calendar-alt mr-1"></i>
                    Actualizado: {{ date('d/m/Y') }}
                </div>
            </div>
        </div>
    </header>

    <!-- Contenido principal SIN OVERLAY -->
    <main class="main-content pb-12">
        <div class="documents-container">

            <!-- Sección: Organigramas -->
            <div class="mt-10 category-section">
                <div class="category-header">
                    <div class="flex items-center justify-between">
                        <h2 class="text-xl font-bold">
                            <i class="fas fa-sitemap mr-2"></i>
                            Organigramas
                        </h2>
                        <span class="text-sm opacity-90">5 documentos</span>
                    </div>
                    <p class="text-sm opacity-90 mt-1">Estructura organizacional de la empresa</p>
                </div>

                <div class="documents-grid">
                    <!-- Documento 1: Organigrama Operacional -->
                    <div class="document-card">
                        <div class="document-preview">
                            <!-- Vista previa del PDF -->
                            <iframe
                                src="{{ asset('storage/documents/organigrama.pdf') }}#view=FitH&toolbar=0&navpanes=0"
                                class="pdf-preview" title="Vista previa del Organigrama Operacional">
                                <div class="preview-placeholder">
                                    <i class="fas fa-file-pdf text-3xl text-red-500 mb-2"></i>
                                    <p>Vista previa no disponible</p>
                                </div>
                            </iframe>
                        </div>
                        <div class="document-info">
                            <h3 class="document-title">Organigrama Operacional</h3>
                            <p class="document-description">
                                Estructura organizacional completa con líneas de reporte y departamentos.
                            </p>
                            <div class="document-meta">
                                <span class="document-type type-pdf">
                                    <i class="fas fa-file-pdf mr-1"></i>PDF
                                </span>
                                <span class="text-sm text-gray-500">2.4 MB</span>
                            </div>
                            <div class="document-actions">
                                <button class="action-btn view-btn"
                                    onclick="openDocumentModal('{{ asset('storage/documents/organigrama.pdf') }}', 'pdf', 'Organigrama Operacional')">
                                    <i class="fas fa-eye"></i>Ver
                                </button>
                                <a href="{{ asset('storage/documents/organigrama.pdf') }}"
                                    class="action-btn download-btn" download>
                                    <i class="fas fa-download"></i>Descargar
                                </a>
                            </div>
                        </div>
                    </div>

                    <!-- Documento 2: Organigrama Visual (Imagen) -->
                    <div class="document-card">
                        <div class="document-preview">
                            <!-- Vista previa de imagen -->
                            <img src="storage/media/organigrama.png" alt="Organigrama Visual" class="image-preview">
                        </div>
                        <div class="document-info">
                            <h3 class="document-title">Organigrama Visual</h3>
                            <p class="document-description">
                                Diagrama gráfico de la estructura organizacional en formato imagen.
                            </p>
                            <div class="document-meta">
                                <span class="document-type type-image">
                                    <i class="fas fa-image mr-1"></i>JPG
                                </span>
                                <span class="text-sm text-gray-500">1.8 MB</span>
                            </div>
                            <div class="document-actions">
                                <button class="action-btn view-btn"
                                    onclick="openDocumentModal('storage/media/organigrama.png', 'image', 'Organigrama Visual')">
                                    <i class="fas fa-eye"></i>Ver
                                </button>
                                <a href="storage/media/organigrama.png" class="action-btn download-btn" download>
                                    <i class="fas fa-download"></i>Descargar
                                </a>
                            </div>
                        </div>
                    </div>

                    <!-- Documento 3: Organigrama Detallado -->
                    <div class="document-card">
                        <div class="document-preview">
                            <div class="preview-placeholder">
                                <i class="fas fa-file-pdf text-3xl text-red-500 mb-2"></i>
                                <p>Organigrama Detallado</p>
                                <p class="text-xs mt-1">PDF - 48 páginas</p>
                            </div>
                        </div>
                        <div class="document-info">
                            <h3 class="document-title">Organigrama Detallado</h3>
                            <p class="document-description">
                                Versión extendida con descripciones de puestos y responsabilidades.
                            </p>
                            <div class="document-meta">
                                <span class="document-type type-pdf">
                                    <i class="fas fa-file-pdf mr-1"></i>PDF
                                </span>
                                <span class="text-sm text-gray-500">5.2 MB</span>
                            </div>
                            <div class="document-actions">
                                <a href="{{ asset('storage/documents/organigrama.pdf') }}" class="action-btn view-btn"
                                    target="_blank">
                                    <i class="fas fa-eye"></i>Ver
                                </a>
                                <a href="{{ asset('storage/documents/organigrama.pdf') }}"
                                    class="action-btn download-btn" download>
                                    <i class="fas fa-download"></i>Descargar
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Sección: Manuales y Documentos -->
            <div class="category-section">
                <div class="category-header" style="background: linear-gradient(135deg, #059669 0%, #047857 100%);">
                    <div class="flex items-center justify-between">
                        <h2 class="text-xl font-bold">
                            <i class="fas fa-book mr-2"></i>
                            Manuales y Documentos
                        </h2>
                        <span class="text-sm opacity-90">8 documentos</span>
                    </div>
                    <p class="text-sm opacity-90 mt-1">Documentación oficial de procesos y políticas</p>
                </div>

                <div class="documents-grid">
                    <!-- Documento 1: Manual de Organización -->
                    <div class="document-card">
                        <div class="document-preview">
                            <iframe src="{{ asset('documents/manual-organizacion.pdf') }}#view=FitH&toolbar=0"
                                class="pdf-preview" title="Manual de Organización">
                            </iframe>
                        </div>
                        <div class="document-info">
                            <h3 class="document-title">Manual de Organización</h3>
                            <p class="document-description">
                                Documento oficial que describe la estructura y funciones organizacionales.
                            </p>
                            <div class="document-meta">
                                <span class="document-type type-pdf">
                                    <i class="fas fa-file-pdf mr-1"></i>PDF
                                </span>
                                <span class="text-sm text-gray-500">3.1 MB</span>
                            </div>
                            <div class="document-actions">
                                <button class="action-btn view-btn"
                                    onclick="openDocumentModal('{{ asset('documents/manual-organizacion.pdf') }}', 'pdf', 'Manual de Organización')">
                                    <i class="fas fa-eye"></i>Ver
                                </button>
                                <a href="{{ asset('documents/manual-organizacion.pdf') }}"
                                    class="action-btn download-btn" download>
                                    <i class="fas fa-download"></i>Descargar
                                </a>
                            </div>
                        </div>
                    </div>

                    <!-- Documento 2: Diagrama de Procesos -->
                    <div class="document-card">
                        <div class="document-preview">
                            <img src="https://images.unsplash.com/photo-1551288049-bebda4e38f71?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=60"
                                alt="Diagrama de Procesos" class="image-preview">
                        </div>
                        <div class="document-info">
                            <h3 class="document-title">Diagrama de Procesos</h3>
                            <p class="document-description">
                                Flujo completo de procesos operativos de la empresa.
                            </p>
                            <div class="document-meta">
                                <span class="document-type type-image">
                                    <i class="fas fa-image mr-1"></i>PNG
                                </span>
                                <span class="text-sm text-gray-500">850 KB</span>
                            </div>
                            <div class="document-actions">
                                <button class="action-btn view-btn"
                                    onclick="openDocumentModal('https://images.unsplash.com/photo-1551288049-bebda4e38f71?ixlib=rb-4.0.3&auto=format&fit=crop&w=1200&q=80', 'image', 'Diagrama de Procesos')">
                                    <i class="fas fa-eye"></i>Ver
                                </button>
                                <a href="https://images.unsplash.com/photo-1551288049-bebda4e38f71?ixlib=rb-4.0.3&auto=format&fit=crop&w=1200&q=80"
                                    class="action-btn download-btn" download>
                                    <i class="fas fa-download"></i>Descargar
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Información adicional -->
            <div class="bg-blue-50 border border-blue-200 rounded-lg p-6 mt-8">
                <div class="flex items-start">
                    <i class="fas fa-info-circle text-blue-600 text-xl mt-1 mr-3"></i>
                    <div>
                        <h3 class="font-semibold text-blue-800 mb-2">Información sobre los documentos</h3>
                        <ul class="text-blue-700 space-y-2">
                            <li class="flex items-start">
                                <i class="fas fa-check text-green-500 mr-2 mt-1"></i>
                                <span>Todos los documentos están disponibles para consulta y descarga</span>
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-check text-green-500 mr-2 mt-1"></i>
                                <span>Los PDFs pueden visualizarse directamente en el navegador</span>
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-check text-green-500 mr-2 mt-1"></i>
                                <span>Las imágenes se muestran en alta calidad</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

        </div>
    </main>

    <!-- Footer con fondo blanco -->
    <footer class="page-footer py-6 border-t border-gray-200">
        <div class="documents-container">
            <div class="flex flex-col md:flex-row justify-between items-center">
                <div class="mb-4 md:mb-0">
                    <p class="text-gray-600 text-sm">
                        <i class="fas fa-folder-open text-purple-600 mr-2"></i>
                        Documentos de Estructura Interna &copy; {{ date('Y') }}
                    </p>
                </div>
                <div class="flex gap-4">
                    <a href="{{ url('/procesos') }}"
                        class="text-purple-600 hover:text-purple-800 font-medium text-sm">
                        <i class="fas fa-arrow-left mr-1"></i>Volver a Procesos
                    </a>
                </div>
            </div>
        </div>
    </footer>

    <!-- Modal para vista completa -->
    <div id="documentModal" class="document-modal">
        <div class="close-modal" onclick="closeDocumentModal()">
            <i class="fas fa-times"></i>
        </div>
        <div class="modal-content">
            <div class="modal-body" id="modal-body">
                <!-- El contenido se inserta dinámicamente -->
            </div>
        </div>
    </div>

    <script>
        // Abrir modal para ver documento completo
        function openDocumentModal(src, type, title) {
            const modal = document.getElementById('documentModal');
            const modalBody = document.getElementById('modal-body');

            let content = '';

            if (type === 'pdf') {
                content = `
                    <iframe src="${src}" 
                            class="full-pdf" 
                            title="${title}"
                            sandbox="allow-same-origin allow-scripts">
                    </iframe>
                `;
            } else if (type === 'image') {
                content = `
                    <div style="width: 100%; height: 100%; display: flex; align-items: center; justify-content: center; background: #f8fafc;">
                        <img src="${src}" 
                             alt="${title}" 
                             class="full-image"
                             style="max-width: 100%; max-height: 100%; object-fit: contain;">
                    </div>
                `;
            }

            modalBody.innerHTML = content;
            modal.style.display = 'block';
            document.body.style.overflow = 'hidden';
        }

        // Cerrar modal
        function closeDocumentModal() {
            const modal = document.getElementById('documentModal');
            modal.style.display = 'none';
            document.body.style.overflow = 'auto';
        }

        // Cerrar modal con ESC
        document.addEventListener('keydown', function(event) {
            if (event.key === 'Escape') {
                closeDocumentModal();
            }
        });

        // Cerrar modal al hacer clic fuera
        window.addEventListener('click', function(event) {
            const modal = document.getElementById('documentModal');
            if (event.target === modal) {
                closeDocumentModal();
            }
        });
    </script>
</body>

</html>
