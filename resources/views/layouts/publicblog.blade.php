@props([
    'title' => config('app.name', 'Laravel'),
    'breadcrumbs' => [],
])

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

{{-- <head class="fixed w-full z-20 top-0 left-0"> --}}

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Wire UI -->
    <wireui:scripts />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!--SweetAlert2-->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- Line Awesome -->
    <link rel= "stylesheet" href= "/assets/lineawesome/css/line-awesome.min.css">
    <!-- Remix Icon -->
    <link rel= "stylesheet" href= "/assets/remix-icon/remixicon.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    @stack('css')

    <!-- Styles -->
    @livewireStyles
</head>

<body class="font-sans antialiased bg-gray-50">

    <!-- Navbar fijo -->
    <header class="fixed w-full z-20 top-0 left-0">
        @include('layouts.includes.publico.navbar')
    </header>

    <!-- Contenedor principal -->
    <main class="pt-24 px-6">
        <div class="grid grid-cols-8 gap-6">

            <!-- Contenido principal -->
            <section class="col-span-12 lg:col-span-8">
                <div class="bg-white rounded-lg shadow-md p-6">
                    @yield('content')
                </div>
            </section>

            {{-- <!-- Aside -->
            <aside class="col-span-12 lg:col-span-4">
                <div class="bg-white rounded-lg shadow-md p-6 sticky top-28">
                    <h2 class="text-xl font-bold mb-4">Índice / Menú</h2>
                    <ul id="toc-list" class="space-y-1">
                        <!-- Aquí se insertan dinámicamente los enlaces -->
                    </ul>
                </div>
            </aside> --}}

        </div>
    </main>

    {{-- Footer opcional --}}
    @include('layouts.includes.publico.footer')

    @stack('modals')
    @livewireScripts
    <script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>
    @if (session('swal'))
        <script>
            Swal.fire(@json(session('swal')));
        </script>
    @endif
    @include('layouts.includes.publico.subir')
    @stack('js')
</body>


</html>
