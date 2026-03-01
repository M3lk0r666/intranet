<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Procesos Empresariales - {{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- Tailwind CSS -->
    @vite(['resources/css/app.css'])

    <!-- Flowbite CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet" />

    <!-- Font Awesome para iconos -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <style>
        body {
            font-family: 'Inter', sans-serif;
        }

        .bg-logo {
            background-image: url('{{ asset('storage/media/backcorp.jpg') }}');
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

        /* Efecto hover para botones pequeños */
        .process-btn {
            transition: all 0.3s ease;
            border: 1px solid #e2e8f0;
        }

        .process-btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
        }

        /* Animación para desplegar submenús */
        .submenu-dropdown {
            max-height: 0;
            opacity: 0;
            overflow: hidden;
            transition: max-height 0.5s ease, opacity 0.3s ease;
        }

        .submenu-dropdown.show {
            max-height: 300px;
            opacity: 1;
        }

        /* Estilos para los items del submenú */
        .submenu-item {
            transition: all 0.2s ease;
        }

        .submenu-item:hover {
            background-color: #f8fafc;
            transform: translateX(5px);
        }
    </style>
</head>

<body class="bg-gray-50">
    <!-- Fondo con logo -->
    <div class="min-h-screen bg-logo">
        <!-- Overlay sutil -->
        <div class="min-h-screen bg-overlay">

            <!-- Header con botón de regreso -->
            <header class="w-full py-6 px-6">
                <div class="container mx-auto flex justify-between items-center">
                    <div class="text-xl font-bold text-gray-800">
                        <i class="fas fa-sitemap text-blue-600 mr-2"></i>
                        Procesos Empresariales
                    </div>

                    <!-- Botón para regresar al inicio -->
                    <a href="{{ url('/') }}"
                        class="px-4 py-2 bg-gray-100 hover:bg-orange-200 text-gray-700 font-medium rounded-lg transition duration-300 flex items-center gap-2 text-lg">
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
                        <span
                            class="px-4 py-2 bg-purple-100 text-purple-700 font-medium rounded-full">Operaciones</span>
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
                <div class="mt-16 max-w-4xl mx-auto">
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
            <footer class="mt-16 py-8 border-t border-gray-200">
                <div class="container mx-auto px-4">
                    <div class="flex flex-col md:flex-row justify-between items-center">
                        <div class="mb-4 md:mb-0">
                            <p class="text-gray-600">
                                <i class="fas fa-sitemap text-blue-600 mr-2"></i>
                                &copy; {{ date('Y') }} Procesos Empresariales -
                                {{ config('app.name', 'Portal Empresarial') }}
                            </p>
                        </div>
                        <div class="flex gap-6">
                            <a href="#" class="text-gray-500 hover:text-gray-700">
                                <i class="fas fa-question-circle"></i> Ayuda
                            </a>
                            <a href="#" class="text-gray-500 hover:text-gray-700">
                                <i class="fas fa-envelope"></i> Contacto
                            </a>
                            {{-- <a href="{{ url('/') }}" class="text-blue-600 hover:text-blue-800 font-medium">
                                <i class="fas fa-arrow-left"></i> Volver al Portal
                            </a> --}}
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>

    <!-- Flowbite JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>

    <!-- Script para los submenús -->
    <script>
        // Variable para controlar qué submenú está abierto
        let activeSubmenu = null;

        function toggleSubmenu(area) {
            const submenu = document.getElementById(`${area}-submenu`);
            const chevron = document.getElementById(`${area}-chevron`);

            // Si hay otro submenú abierto, lo cerramos
            if (activeSubmenu && activeSubmenu !== submenu) {
                const prevArea = activeSubmenu.id.replace('-submenu', '');
                const prevChevron = document.getElementById(`${prevArea}-chevron`);
                activeSubmenu.classList.remove('show');
                if (prevChevron) {
                    prevChevron.classList.remove('fa-chevron-up');
                    prevChevron.classList.add('fa-chevron-down');
                }
            }

            // Alternar el submenú actual
            submenu.classList.toggle('show');

            if (submenu.classList.contains('show')) {
                chevron.classList.remove('fa-chevron-down');
                chevron.classList.add('fa-chevron-up');
                activeSubmenu = submenu;
            } else {
                chevron.classList.remove('fa-chevron-up');
                chevron.classList.add('fa-chevron-down');
                activeSubmenu = null;
            }
        }

        // Cerrar submenús si se hace click fuera
        document.addEventListener('click', function(event) {
            if (!activeSubmenu) return;

            const areaButtons = document.querySelectorAll('[onclick^="toggleSubmenu"]');
            let isClickInside = false;

            areaButtons.forEach(button => {
                if (button.contains(event.target)) {
                    isClickInside = true;
                }
            });

            if (!isClickInside && activeSubmenu) {
                const area = activeSubmenu.id.replace('-submenu', '');
                const chevron = document.getElementById(`${area}-chevron`);

                activeSubmenu.classList.remove('show');
                if (chevron) {
                    chevron.classList.remove('fa-chevron-up');
                    chevron.classList.add('fa-chevron-down');
                }
                activeSubmenu = null;
            }
        });

        // Cerrar submenús al presionar ESC
        document.addEventListener('keydown', function(event) {
            if (event.key === 'Escape' && activeSubmenu) {
                const area = activeSubmenu.id.replace('-submenu', '');
                const chevron = document.getElementById(`${area}-chevron`);

                activeSubmenu.classList.remove('show');
                if (chevron) {
                    chevron.classList.remove('fa-chevron-up');
                    chevron.classList.add('fa-chevron-down');
                }
                activeSubmenu = null;
            }
        });
    </script>

    <!-- Scripts adicionales -->
    @vite(['resources/js/app.js'])
</body>

</html>
