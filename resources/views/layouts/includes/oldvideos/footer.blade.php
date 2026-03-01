<footer class="bg-gray-50 border-t border-gray-200 mt-12">
    <div class="container mx-auto px-4 py-8">
        <!-- Grid principal -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8 mb-8">
            <!-- Columna 1: Logo y descripción -->
            <div class="col-span-1 md:col-span-2 lg:col-span-1">
                <a href="{{ url('/') }}" class="flex items-center mb-4">
                    <img src="{{ asset('assets/media/logo-text.png') }}" class="h-8 mr-3" alt="Logo">
                    <span class="text-xl font-bold text-gray-900">... el Blog de Redes</span>
                </a>
                <p class="text-gray-600 text-sm mb-4">
                    Blog especializado en redes, tecnología y desarrollo web.
                    Compartimos conocimiento y experiencias.
                </p>
                <!-- Redes sociales -->
                <div class="flex space-x-4">
                    <a href="https://www.facebook.com/NetjerNetworks?locale=es_LA"
                        class="text-gray-400 hover:text-blue-600 transition">
                        <i class="fab fa-facebook-f text-lg"></i>
                    </a>
                    <a href="https://www.instagram.com/netjernetworks"
                        class="text-gray-400 hover:text-pink-600 transition">
                        <i class="fab fa-instagram text-lg"></i>
                    </a>
                    <a href="https://www.linkedin.com/company/netjernetworks/"
                        class="text-gray-400 hover:text-blue-700 transition">
                        <i class="fab fa-linkedin-in text-lg"></i>
                    </a>
                </div>
            </div>

            <!-- Columna 2: Enlaces rápidos -->
            <div>
                <h3 class="text-lg font-semibold text-gray-900 mb-4">Enlaces rápidos</h3>
                <ul class="space-y-2">
                    <li>
                        <a href="#" class="text-gray-600 hover:text-blue-600 transition flex items-center">
                            <i class="fas fa-home mr-2 text-sm"></i>Home
                        </a>
                    </li>
                    <li>
                        <a href="#" class="text-gray-600 hover:text-blue-600 transition flex items-center">
                            <i class="fas fa-newspaper mr-2 text-sm"></i>Artículos
                        </a>
                    </li>
                    <li>
                        <a href="#" class="text-gray-600 hover:text-blue-600 transition flex items-center">
                            <i class="fas fa-folder mr-2 text-sm"></i>Categorías
                        </a>
                    </li>
                    <li>
                        <a href="#" class="text-gray-600 hover:text-blue-600 transition flex items-center">
                            <i class="fas fa-users mr-2 text-sm"></i>Nosotros
                        </a>
                    </li>
                    <li>
                        <a href="#" class="text-gray-600 hover:text-blue-600 transition flex items-center">
                            <i class="fas fa-envelope mr-2 text-sm"></i>Contacto
                        </a>
                    </li>
                </ul>
            </div>

            <!-- Columna 3: Categorías populares -->


            <!-- Columna 4: Newsletter -->
            <div>
                <h3 class="text-lg font-semibold text-gray-900 mb-4">Suscríbete</h3>
                <p class="text-gray-600 text-sm mb-4">
                    Recibe las últimas publicaciones y novedades directamente en tu email.
                </p>
                <p><strong>NoFuncional por el momento</strong></p>
                <form class="space-y-3">
                    <div>
                        <input type="email" placeholder="Tu correo electrónico"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition">
                    </div>
                    <button type="submit"
                        class="w-full bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition font-medium">
                        Suscribirse
                    </button>
                </form>
            </div>
        </div>

        <!-- Línea divisoria -->
        <hr class="my-6 border-gray-300">

        <!-- Copyright y enlaces legales -->
        <div class="flex flex-col md:flex-row justify-between items-center">
            <div class="mb-4 md:mb-0">
                <span class="text-sm text-gray-600">
                    © {{ date('Y') }}
                    <a href="{{ url('/') }}" class="hover:text-blue-600 font-medium">... el Blog de Redes</a>.
                    Todos los derechos reservados.
                </span>
            </div>

            <div class="flex flex-wrap justify-center md:justify-end gap-4">
                <a href="#" class="text-sm text-gray-600 hover:text-blue-600 transition">
                    Términos y condiciones
                </a>
                <a href="#" class="text-sm text-gray-600 hover:text-blue-600 transition">
                    Política de privacidad
                </a>
                <a href="#" class="text-sm text-gray-600 hover:text-blue-600 transition">
                    Cookies
                </a>
                <a href="#" class="text-sm text-gray-600 hover:text-blue-600 transition">
                    Contacto
                </a>
            </div>
        </div>
    </div>
</footer>
