<nav class="bg-white border-b border-gray-200 px-4 py-3 fixed top-0 left-0 w-full z-50">
    <div class="container mx-auto flex items-center justify-between relative">
        <div class="flex items-center space-x-3">
            <div class="flex items-center space-x-3">
                <img src="{{ asset('storage/media/loho-netjer.jpg') }}" alt="Netjer Networks" class="h-10 w-auto" />
            </div>
            <span class="absolute left-1/2 transform -translate-x-1/2 text-xl font-bold text-gray-800">INTRANET
                CORPORATIVA</span>
        </div>

        <div class="flex items-center space-x-4">
            <!-- Menú de navegación -->
            <div class="hidden md:flex space-x-6">
                {{-- <a href="{{ route('home') }}" class="nav-active font-medium border-b-2 pb-1">Home</a>
                 <a href="procesos.html" class="text-gray-600 hover:text-orange-600 font-medium">Procesos
                    Empresariales</a>
                <a href="blog.html" class="text-gray-600 hover:text-orange-600 font-medium">Blog de Redes</a>
                <a href="formacion.html" class="text-gray-600 hover:text-orange-600 font-medium">Formación Académica</a> --}}
            </div>

            <!-- Iconos de usuario y notificaciones -->
            <div class="flex items-center space-x-4">
                {{-- <button type="button" class="relative text-gray-600 hover:text-orange-600">
                    <i class="fas fa-bell text-xl"></i>
                    <span
                        class="absolute -top-1 -right-1 bg-orange-500 text-white text-xs rounded-full h-5 w-5 flex items-center justify-center">3</span>
                </button> --}}

                {{-- <div class="flex items-center space-x-2">
                    <div class="h-8 w-8 rounded-full bg-orange-100 flex items-center justify-center">
                        <i class="fas fa-user text-orange-600"></i>
                    </div>
                    <span class="text-gray-700 font-medium">Usuario</span>
                </div> --}}
            </div>
        </div>
    </div>
</nav>
{{-- <nav class="bg-white border-b border-gray-200 px-4 py-3 fixed top-0 left-0 w-full z-50">
    <div class="container mx-auto flex items-center justify-between">

        <!-- Logo + texto -->
        <div class="flex items-center space-x-3">
            <img src="{{ asset('storage/media/loho-netjer.jpg') }}" alt="Netjer Networks" class="h-10 w-auto" />

            <span class="text-xl font-bold text-gray-800">
                Intranet Corporativa
            </span>
        </div>

        <!-- Menú de navegación -->
        <div class="hidden md:flex space-x-6">
            <a href="{{ route('home') }}" class="nav-active font-medium border-b-2 pb-1">Home</a>
        </div>

    </div>
</nav> --}}
