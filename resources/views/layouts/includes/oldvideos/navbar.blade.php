<nav class="bg-white shadow-md fixed w-full top-0 z-50">
    <!-- Barra superior -->
    <div class="bg-neutral-800 text-white">
        <div class="flex flex-wrap justify-between items-center mx-auto max-w-7xl px-4 py-2">
            <a href="{{ url('/') }}" class="flex items-center space-x-3 rtl:space-x-reverse">
                <img src="{{ asset('assets/media/logo-text-b.png') }}" class="h-6" alt="Logo" />
                <span class="self-center text-lg font-semibold whitespace-nowrap">... el Blog de Redes</span>
            </a>
            <div class="flex items-center space-x-6 rtl:space-x-reverse">
                <a href="tel:5541251234" class="text-sm hover:text-gray-300 transition duration-150">
                    <i class="ri-phone-fill small-icon"></i>(000) 000-1234
                </a>

                @auth
                    <!-- Menú desplegable para usuario logueado -->
                    <div class="relative group" x-data="{ open: false }">
                        <button @click="open = !open"
                            class="flex items-center text-sm font-medium hover:text-gray-300 transition duration-150">
                            <i class="ri-user-2-fill mr-1"></i>Mi Cuenta
                            <i class="ri-arrow-down-s-line ml-1 text-xs"></i>
                        </button>

                        <!-- Menú desplegable -->
                        <div x-show="open" @click.away="open = false" x-transition:enter="transition ease-out duration-200"
                            x-transition:enter-start="opacity-0 transform scale-95"
                            x-transition:enter-end="opacity-100 transform scale-100"
                            x-transition:leave="transition ease-in duration-150"
                            x-transition:leave-start="opacity-100 transform scale-100"
                            x-transition:leave-end="opacity-0 transform scale-95"
                            class="absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg py-1 z-50 border border-gray-200">

                            <!-- Información del usuario -->
                            <div class="px-4 py-2 border-b border-gray-100">
                                <p class="text-sm font-medium text-gray-800 truncate">{{ Auth::user()->name }}</p>
                                <p class="text-xs text-gray-500 truncate">{{ Auth::user()->email }}</p>
                            </div>

                            <!-- Opción Perfil -->
                            <a href="{{ route('profile.show') }}"
                                class="flex items-center px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 transition duration-150">
                                <i class="ri-user-line mr-2"></i>
                                Mi Perfil
                            </a>

                            <!-- Opción Administración (solo para usuarios con permisos) -->
                            <a href="{{ url('/admin') }}"
                                class="flex items-center px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 transition duration-150">
                                <i class="ri-dashboard-line mr-2"></i>
                                Administración
                            </a>
                            <!-- Separador -->
                            <div class="border-t border-gray-100 my-1"></div>

                            <!-- Cerrar Sesión -->
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit"
                                    class="flex items-center w-full px-4 py-2 text-sm text-red-600 hover:bg-red-50 transition duration-150">
                                    <i class="ri-logout-box-r-line mr-2"></i>
                                    Cerrar Sesión
                                </button>
                            </form>
                        </div>
                    </div>
                @else
                    <!-- Menú desplegable para invitados -->
                    <div class="relative group" x-data="{ open: false }">
                        <button @click="open = !open"
                            class="flex items-center text-sm font-medium hover:text-gray-300 transition duration-150">
                            <i class="fas fa-sign-in-alt mr-1"></i>Acceder
                            <i class="ri-arrow-down-s-line ml-1 text-xs"></i>
                        </button>

                        <!-- Menú desplegable para login/registro -->
                        <div x-show="open" @click.away="open = false" x-transition:enter="transition ease-out duration-200"
                            x-transition:enter-start="opacity-0 transform scale-95"
                            x-transition:enter-end="opacity-100 transform scale-100"
                            x-transition:leave="transition ease-in duration-150"
                            x-transition:leave-start="opacity-100 transform scale-100"
                            x-transition:leave-end="opacity-0 transform scale-95"
                            class="absolute right-0 mt-2 w-40 bg-white rounded-md shadow-lg py-1 z-50 border border-gray-200">

                            <a href="{{ route('login') }}"
                                class="flex items-center px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 transition duration-150">
                                <i class="ri-login-box-line mr-2"></i>
                                Iniciar Sesión
                            </a>

                            @if (Route::has('register'))
                                <a href="{{ route('register') }}"
                                    class="flex items-center px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 transition duration-150">
                                    <i class="ri-user-add-line mr-2"></i>
                                    Registrarse
                                </a>
                            @endif
                        </div>
                    </div>
                @endauth
            </div>
        </div>
    </div>

    <!-- Menú principal -->
    <div class="bg-white border-b border-gray-200">
        <div class="max-w-7xl px-4 py-3 mx-auto">
            <div class="flex items-center justify-between">
                <!-- Menú desktop -->
                <ul class="hidden md:flex flex-row font-medium space-x-8 rtl:space-x-reverse text-sm">
                    <li>
                        <a href="{{ url('/') }}"
                            class="text-gray-700 hover:text-blue-600 font-large transition duration-150">
                            Home
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('posts.index') }}"
                            class="text-gray-700 hover:text-blue-600 font-medium transition duration-150 {{ request()->is('posts*') ? 'text-blue-600 border-b-2 border-blue-600' : '' }}">Artículos</a>
                    </li>

                    <li>
                        <a href="#"
                            class="text-gray-700 hover:text-blue-600 font-medium transition duration-150">Nosotros</a>
                    </li>
                    <li>
                        <a href="#"
                            class="text-gray-700 hover:text-blue-600 font-medium transition duration-150">Contacto</a>
                    </li>
                </ul>
            </div>

            <!-- Menú móvil -->
            <div id="mobile-menu" class="md:hidden hidden mt-4 pb-4 border-t border-gray-200">
                <ul class="flex flex-col space-y-3 font-medium text-sm pt-4">
                    <li>
                        <a href="{{ url('/') }}"
                            class="block py-2 text-gray-700 hover:text-blue-600 font-medium transition duration-150 {{ request()->is('/') ? 'text-blue-600' : '' }}">Home</a>
                    </li>

                    <li>
                        <a href="{{ route('posts.index') }}"
                            class="block py-2 text-gray-700 hover:text-blue-600 font-medium transition duration-150 {{ request()->is('posts*') ? 'text-blue-600' : '' }}">Artículos</a>
                    </li>

                    <li>
                        <a href="{{ url('/about') }}"
                            class="block py-2 text-gray-700 hover:text-blue-600 font-medium transition duration-150">Nosotros</a>
                    </li>
                    <li>
                        <a href="{{ url('/contact') }}"
                            class="block py-2 text-gray-700 hover:text-blue-600 font-medium transition duration-150">Contacto</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>

<!-- Script para el buscador -->
<script>
    // Script para el menú móvil (mantener igual)
    document.addEventListener('DOMContentLoaded', function() {
        const mobileMenuButton = document.getElementById('mobile-menu-button');
        const mobileMenu = document.getElementById('mobile-menu');

        if (mobileMenuButton && mobileMenu) {
            mobileMenuButton.addEventListener('click', function() {
                mobileMenu.classList.toggle('hidden');

                // Cambiar icono
                const icon = mobileMenuButton.querySelector('i');
                if (mobileMenu.classList.contains('hidden')) {
                    icon.classList.remove('fa-times');
                    icon.classList.add('fa-bars');
                } else {
                    icon.classList.remove('fa-bars');
                    icon.classList.add('fa-times');
                }
            });

            // Cerrar menú móvil al hacer clic en un enlace
            const mobileLinks = mobileMenu.querySelectorAll('a');
            mobileLinks.forEach(link => {
                link.addEventListener('click', () => {
                    mobileMenu.classList.add('hidden');
                    mobileMenuButton.querySelector('i').classList.remove('fa-times');
                    mobileMenuButton.querySelector('i').classList.add('fa-bars');
                });
            });
        }
    });
</script>
