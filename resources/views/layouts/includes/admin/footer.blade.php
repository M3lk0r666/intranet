<footer class="bg-white border-t border-gray-200 mt-12">
    <div class="container mx-auto px-4 py-8">
        <!-- Contenido principal -->
        <div class="flex flex-col md:flex-row justify-between items-center mb-6">
            <!-- Logo y nombre -->
            <div class="mb-4 md:mb-0">
                <a href="{{ url('/') }}" class="flex items-center">
                    <img src="{{ asset('assets/media/logo-text.png') }}" class="h-8 mr-3" alt="Logo">
                    <span class="text-xl font-bold text-gray-900">... el Blog de Redes</span>
                </a>
                <p class="text-gray-500 text-sm mt-2">
                    Compartiendo conocimiento sobre redes y tecnología
                </p>
            </div>

            <!-- Redes sociales -->
            <div class="flex space-x-4">
                <a href="#"
                    class="text-gray-400 hover:text-blue-600 transition duration-300 transform hover:-translate-y-1">
                    <i class="fab fa-facebook-f text-xl"></i>
                </a>
                <a href="#"
                    class="text-gray-400 hover:text-blue-400 transition duration-300 transform hover:-translate-y-1">
                    <i class="fab fa-twitter text-xl"></i>
                </a>
                <a href="#"
                    class="text-gray-400 hover:text-pink-600 transition duration-300 transform hover:-translate-y-1">
                    <i class="fab fa-instagram text-xl"></i>
                </a>
                <a href="#"
                    class="text-gray-400 hover:text-blue-700 transition duration-300 transform hover:-translate-y-1">
                    <i class="fab fa-linkedin-in text-xl"></i>
                </a>
            </div>
        </div>

        <!-- Línea divisoria -->
        <hr class="my-6 border-gray-300">

        <!-- Enlaces y copyright -->
        <div class="flex flex-col md:flex-row justify-between items-center">
            <!-- Enlaces -->
            <ul class="flex flex-wrap justify-center gap-4 mb-4 md:mb-0">
                <li>
                    <a href="{{ url('/') }}"
                        class="text-gray-600 hover:text-blue-600 transition text-sm font-medium">
                        <i class="fas fa-home mr-2 text-sm"></i>Home
                    </a>
                </li>
                <li>
                    <a href="{{ route('posts.index') }}"
                        class="text-gray-600 hover:text-blue-600 transition text-sm font-medium">
                        Artículos
                    </a>
                </li>
                <li>
                    <a href="{{ route('categories.index') }}"
                        class="text-gray-600 hover:text-blue-600 transition text-sm font-medium">
                        Categorías
                    </a>
                </li>
                <li>
                    <a href="#" class="text-gray-600 hover:text-blue-600 transition text-sm font-medium">
                        Nosotros
                    </a>
                </li>
                <li>
                    <a href="#" class="text-gray-600 hover:text-blue-600 transition text-sm font-medium">
                        Contacto
                    </a>
                </li>
                <li>
                    <a href="#" class="text-gray-600 hover:text-blue-600 transition text-sm font-medium">
                        Política de privacidad
                    </a>
                </li>
                <li>
                    <a href="#" class="text-gray-600 hover:text-blue-600 transition text-sm font-medium">
                        Términos
                    </a>
                </li>
            </ul>

            <!-- Copyright -->
            <div class="text-center md:text-right">
                <p class="text-gray-500 text-sm">
                    © {{ date('Y') }} ... el Blog de Redes. Todos los derechos reservados.
                </p>
            </div>
        </div>

        <!-- Back to top button (solo en móvil) -->
        <div class="md:hidden mt-6 text-center">
            <button onclick="window.scrollTo({top: 0, behavior: 'smooth'})"
                class="text-gray-500 hover:text-blue-600 transition text-sm font-medium flex items-center justify-center mx-auto">
                <i class="fas fa-arrow-up mr-2"></i> Volver arriba
            </button>
        </div>
    </div>
</footer>
