<nav class="bg-white border-b border-gray-200 px-4 py-3 fixed top-0 left-0 w-full z-50">
    <div class="container mx-auto flex items-center justify-between relative">

        <!-- Logo -->
        <div class="flex items-center space-x-3">
            <img src="{{ asset('storage/media/loho-netjer.jpg') }}" alt="Netjer Networks" class="h-10 w-auto" />
        </div>

        <!-- Texto centrado real -->
        <span class="absolute left-1/2 transform -translate-x-1/2 text-xl font-bold text-gray-800">
            INTRANET CORPORATIVA
        </span>

        <!-- Menú -->
        {{-- <div class="hidden md:flex space-x-6">
            <a href="{{ route('home') }}" class="nav-active font-medium border-b-2 pb-1">
                Home
            </a>
        </div> --}}

    </div>
</nav>
