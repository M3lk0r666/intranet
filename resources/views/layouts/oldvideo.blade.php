<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Portal de Videos' }}</title>
    {{-- <link rel="stylesheet" href="{{ asset('assets/css/videob.css') }}"> --}}

    <!-- Wire UI -->
    <wireui:scripts />

    <!-- Tailwind CSS -->
    @vite(['resources/css/app.css'])

    <!-- Line Awesome -->
    <link rel= "stylesheet" href= "/assets/lineawesome/css/line-awesome.min.css">
    <!-- Remix Icon -->
    <link rel= "stylesheet" href= "/assets/remix-icon/remixicon.css">


    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    @stack('css')

    <!-- Styles -->
    @livewireStyles
</head>

<body class="bg-gray-50">
    <!-- Fondo con logo -->
    <div class="min-h-screen bg-logo">
        <!-- Overlay sutil -->
        <div class="min-h-screen bg-overlay">

            <!-- Navbar fijo -->
            {{-- <header class="w-full py-6 px-6">
                @include('layouts.includes.videos.navbar')
            </header> --}}
            <!-- Header simple con logo -->
            <header class="w-full py-6 px-6">
                <div class="container mx-auto flex justify-between items-center">
                    <div class="text-xl font-bold text-gray-800">
                        <i class="las la-cube text-orange-600 mr-2 text-3xl"></i>
                        {{ config('app.name', 'Portal Empresarial') }}
                    </div>
                </div>
            </header>

            <main class="container pt-24 px-6">
                @yield('content')
            </main>

            {{-- Footer opcional --}}
            @include('layouts.includes.videos.footer')
        </div>
    </div>

    @stack('modals')
    @livewireScripts
    <script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>
    <script src="{{ asset('assets/js/videob.js') }}"></script>
    @if (session('swal'))
        <script>
            Swal.fire(@json(session('swal')));
        </script>
    @endif

    @stack('js')
</body>

</html>
