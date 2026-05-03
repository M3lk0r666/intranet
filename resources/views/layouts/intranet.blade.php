<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Portal Empresarial - {{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    {{-- <link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Mono:wght@400;600&family=IBM+Plex+Sans:wght@400;500;600;700&display=swap"
        rel="stylesheet"> --}}

    <!-- Tailwind CSS -->
    @vite(['resources/css/app.css'])

    <!-- Wire UI -->
    <wireui:scripts />

    <!-- Flowbite CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet" />

    <!-- Font Awesome para iconos -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!--SweetAlert2-->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- Line Awesome -->
    <link rel= "stylesheet" href= "/assets/lineawesome/css/line-awesome.min.css">
    <!-- Remix Icon -->
    <link rel= "stylesheet" href= "/assets/remix-icon/remixicon.css">


    @stack('css')
    <!-- Styles -->
    @livewireStyles
</head>

<body class="min-h-screen flex flex-col bg-gray-50 text-slate-900 font-sans grid-pattern">

    <!-- Menú Superior -->

    @include('layouts.includes.intra.navbarintra')

    <!-- Contenido principal -->
    <main class="flex-grow pt-20 container mx-auto px-4 max-w-[1600px] sm:px-6 lg:px-8 py-12">
        @yield('content')
    </main>


    <!-- Footer -->
    @include('layouts.includes.intra.footer')

    <!-- Scripts -->
    {{-- @include('partials.scripts') --}}

    @stack('modals')
    @livewireScripts

    <!-- Flowbite JS -->
    <script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>

    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script> --}}

    <!-- Script para los dropdowns -->
    @stack('js')
    {{-- <script>
        // Script para manejar el sidebar en móviles
        document.addEventListener('DOMContentLoaded', function() {
            const sidebarToggle = document.querySelector('[data-drawer-toggle="logo-sidebar"]');
            const sidebar = document.getElementById('logo-sidebar');

            if (sidebarToggle && sidebar) {
                sidebarToggle.addEventListener('click', function() {
                    sidebar.classList.toggle('-translate-x-full');
                });
            }

            // Cerrar sidebar al hacer clic fuera en móviles
            document.addEventListener('click', function(event) {
                if (window.innerWidth < 640) {
                    if (!sidebar.contains(event.target) && !sidebarToggle.contains(event.target)) {
                        sidebar.classList.add('-translate-x-full');
                    }
                }
            });
        });
    </script> --}}

</body>

</html>
