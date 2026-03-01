<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Portal Empresarial - {{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- Tailwind CSS -->
    @vite(['resources/css/app.css'])

    <!-- Wire UI -->
    <wireui:scripts />

    <!-- Flowbite CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet" />

    <!-- Font Awesome para iconos -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- Line Awesome -->
    <link rel= "stylesheet" href= "/assets/lineawesome/css/line-awesome.min.css">
    <!-- Remix Icon -->
    <link rel= "stylesheet" href= "/assets/remix-icon/remixicon.css">


    @stack('css')
    <!-- Styles -->
    @livewireStyles
</head>

<body class="bg-gray-50">
    <!-- Fondo con logo -->
    <div class="min-h-screen bg-logo">
        <!-- Overlay sutil -->
        <div class="min-h-screen bg-overlay">

            <!-- Header simple con logo -->
            <header class="w-full py-6 px-6">
                <div class="container mx-auto flex justify-between items-center">
                    <div class="text-xl font-bold text-gray-800">
                        <i class="fas fa-cube text-blue-600 mr-2"></i>
                        {{ config('app.name', 'Portal Empresarial') }}
                    </div>
                </div>
            </header>

            <!-- Contenido principal -->
            <main class="container mx-auto px-4 py-12">

                <!-- Grid de botones/navbar -->
                <div class="max-w-6xl mx-auto">
                    @yield('content')
                </div>

                {{-- <!-- Sección adicional -->
                @include('layouts.includes.intra.adicional') --}}
            </main>
        </div>
    </div>

    @stack('modals')
    @livewireScripts

    <!-- Flowbite JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>

    <!-- Script para los dropdowns -->
    @stack('js')
    <!-- Scripts adicionales -->
    @vite(['resources/js/app.js'])

</body>

</html>
