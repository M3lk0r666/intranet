{{-- resources/views/layouts/public.blade.php --}}
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', config('app.name', 'Biblioteca de Documentos'))</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- Animate.css -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">

    <!-- Tailwind CSS -->
    @vite(['resources/css/app.css'])

    @stack('styles')
</head>

<body class="h-full bg-gray-50 font-inter">
    <!-- Navbar -->
    <nav class="bg-gradient-to-r from-blue-600 to-purple-600 text-white shadow-lg">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-16">
                <!-- Logo -->
                <div class="flex items-center">
                    <a href="{{ route('intranet.documentos.index') }}" class="flex items-center space-x-2">
                        <div class="w-10 h-10 bg-white/20 rounded-lg flex items-center justify-center">
                            <i class="fas fa-book-open text-white text-lg"></i>
                        </div>
                        <span class="font-bold text-xl">{{ config('app.name', 'Biblioteca Digital') }}</span>
                    </a>
                </div>

                <!-- Desktop Navigation -->
                <div class="hidden md:flex items-center space-x-4">
                    <a href="{{ route('intranet.documentos.index') }}"
                        class="px-3 py-2 rounded-lg hover:bg-white/10 transition-colors {{ request()->routeIs('intranet.documents.index') ? 'bg-white/10' : '' }}">
                        <i class="fas fa-home mr-2"></i> Inicio
                    </a>
                    <a href="#categorias" class="px-3 py-2 rounded-lg hover:bg-white/10 transition-colors">
                        <i class="fas fa-tags mr-2"></i> Categorías
                    </a>

                    <!-- Search -->
                    <form method="GET" action="{{ route('intranet.documentos.index') }}" class="relative">
                        <div class="relative">
                            <input type="text" name="search" value="{{ request('search') }}"
                                class="w-64 pl-10 pr-4 py-2 rounded-lg text-gray-800 focus:outline-none focus:ring-2 focus:ring-blue-500"
                                placeholder="Buscar documentos...">
                            <div class="absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400">
                                <i class="fas fa-search"></i>
                            </div>
                        </div>
                    </form>
                </div>

                <!-- Mobile menu button -->
                <div class="md:hidden">
                    <button type="button" id="mobile-menu-button"
                        class="inline-flex items-center justify-center p-2 rounded-md hover:bg-white/10">
                        <i class="fas fa-bars"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Mobile menu -->
        <div id="mobile-menu" class="md:hidden hidden px-4 pb-4">
            <div class="space-y-2">
                <a href="{{ route('intranet.documentos.index') }}"
                    class="block px-3 py-2 rounded-lg hover:bg-white/10 transition-colors">
                    <i class="fas fa-home mr-2"></i> Inicio
                </a>
                <a href="#categorias" class="block px-3 py-2 rounded-lg hover:bg-white/10 transition-colors">
                    <i class="fas fa-tags mr-2"></i> Categorías
                </a>

                <!-- Search mobile -->
                <form method="GET" action="{{ route('intranet.documentos.index') }}">
                    <div class="relative">
                        <input type="text" name="search" value="{{ request('search') }}"
                            class="w-full pl-10 pr-4 py-2 rounded-lg text-gray-800 focus:outline-none focus:ring-2 focus:ring-blue-500"
                            placeholder="Buscar documentos...">
                        <div class="absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400">
                            <i class="fas fa-search"></i>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="flex-1">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-gray-800 text-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Brand -->
                <div>
                    <div class="flex items-center space-x-2 mb-4">
                        <div class="w-12 h-12 bg-white/10 rounded-lg flex items-center justify-center">
                            <i class="fas fa-book-open text-xl"></i>
                        </div>
                        <span class="text-xl font-bold">{{ config('app.name') }}</span>
                    </div>
                    <p class="text-gray-300 text-sm">
                        Plataforma de gestión documental con recursos organizados por categorías.
                    </p>
                </div>

                <!-- Quick Links -->
                <div>
                    <h3 class="text-lg font-semibold mb-4">Enlaces rápidos</h3>
                    <ul class="space-y-2">
                        <li>
                            <a href="{{ route('intranet.documentos.index') }}"
                                class="text-gray-300 hover:text-white transition-colors">
                                <i class="fas fa-chevron-right text-xs mr-2"></i> Todos los documentos
                            </a>
                        </li>
                        <li>
                            <a href="#categorias" class="text-gray-300 hover:text-white transition-colors">
                                <i class="fas fa-chevron-right text-xs mr-2"></i> Explorar categorías
                            </a>
                        </li>
                    </ul>
                </div>

                <!-- Stats -->
                <div>
                    <h3 class="text-lg font-semibold mb-4">Estadísticas</h3>
                    <div class="grid grid-cols-2 gap-4">
                        <div class="bg-gray-700/50 rounded-lg p-4 text-center">
                            <div class="text-2xl font-bold text-yellow-400">{{ \App\Models\FileDocument::count() }}
                            </div>
                            <div class="text-sm text-gray-300">Documentos</div>
                        </div>
                        <div class="bg-gray-700/50 rounded-lg p-4 text-center">
                            <div class="text-2xl font-bold text-green-400">
                                {{ \App\Models\FileDocument::sum('downloads') }}</div>
                            <div class="text-sm text-gray-300">Descargas</div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="border-t border-gray-700 mt-8 pt-8 text-center text-gray-400 text-sm">
                <p>&copy; {{ date('Y') }} {{ config('app.name') }}. Todos los derechos reservados.</p>
                <p class="mt-2">
                    <i class="fas fa-heart text-red-400 mx-1"></i>
                    Desarrollado con Laravel & Tailwind CSS
                </p>
            </div>
        </div>
    </footer>

    <!-- Flowbite JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.8.1/flowbite.min.js"></script>

    <!-- jQuery (opcional) -->
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>

    @stack('scripts')

    <script>
        // Mobile menu toggle
        document.getElementById('mobile-menu-button')?.addEventListener('click', function() {
            const menu = document.getElementById('mobile-menu');
            menu.classList.toggle('hidden');
        });

        // Close mobile menu when clicking outside
        document.addEventListener('click', function(event) {
            const menu = document.getElementById('mobile-menu');
            const button = document.getElementById('mobile-menu-button');

            if (!menu.contains(event.target) && !button.contains(event.target)) {
                menu.classList.add('hidden');
            }
        });

        // Smooth scroll for anchor links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function(e) {
                const href = this.getAttribute('href');
                if (href !== '#') {
                    e.preventDefault();
                    const target = document.querySelector(href);
                    if (target) {
                        target.scrollIntoView({
                            behavior: 'smooth',
                            block: 'start'
                        });
                    }
                }
            });
        });
    </script>
</body>

</html>
