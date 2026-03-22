<!-- Menú Superior -->
<nav class="bg-white border-b border-gray-200 px-4 py-3 fixed top-0 left-0 w-full z-50">
    <div class="container mx-auto flex items-center justify-between relative">
        <div class="flex items-center space-x-3">
            <div class="flex items-center space-x-3">
                <img src="{{ asset('storage/media/loho-netjer.jpg') }}" alt="Netjer Networks" class="h-10 w-auto" />
            </div>
        </div>

        <div class="flex items-center space-x-4">
            <div class="hidden md:flex space-x-6">
                <a href="{{ route('intranet.index') }}" class="text-gray-600 hover:text-orange-600 font-medium">Home</a>
                <a href="{{ route('procesos-empresariales') }}"
                    class="text-gray-600 hover:text-orange-600 font-medium">Procesos
                    Empresariales</a>
                <a href="{{ route('posts.index') }}" class="nav-active font-medium border-b-2 pb-1">Blog de
                    Redes</a>
                <a href="#" class="text-gray-600 hover:text-orange-600 font-medium">Formación Académica</a>
                <a href="{{ route('ingenieria.portal-soporte') }}"
                    class="text-gray-600 hover:text-orange-600 font-medium">Soporte</a>
            </div>

            {{-- <div class="flex items-center space-x-4">
                <div class="flex items-center space-x-2">
                    <div class="h-8 w-8 rounded-full bg-orange-100 flex items-center justify-center">
                        <i class="fas fa-user text-orange-600"></i>
                    </div>
                    <span class="text-gray-700 font-medium">Usuario</span>
                </div>
            </div> --}}

            {{-- <!-- Buscador y menú móvil -->
            <!-- Buscador SIMPLIFICADO - SOLO BUSCA EN POSTS -->
            <div class="relative" x-data="searchComponent()" x-init="init()" @keydown.escape="open = false">
                <button @click="open = !open"
                    class="text-gray-600 hover:text-blue-600 transition duration-150 relative z-50">
                    <i class="fas fa-search"></i>
                </button>

                <!-- Overlay solo para móvil -->
                <template x-if="open">
                    <div @click="open = false" class="fixed inset-0 bg-black bg-opacity-50 z-40 md:hidden"
                        x-show="open" x-transition:enter="transition ease-out duration-200"
                        x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
                        x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100"
                        x-transition:leave-end="opacity-0">
                    </div>
                </template>

                <!-- Panel de búsqueda simplificado -->
                <div x-show="open" @click.away="open = false" x-transition:enter="transition ease-out duration-200"
                    x-transition:enter-start="opacity-0 transform -translate-y-4"
                    x-transition:enter-end="opacity-100 transform translate-y-0"
                    x-transition:leave="transition ease-in duration-150"
                    x-transition:leave-start="opacity-100 transform translate-y-0"
                    x-transition:leave-end="opacity-0 transform -translate-y-4"
                    class="fixed md:absolute inset-x-0 md:inset-x-auto top-16 md:top-full md:right-0 
                mt-0 md:mt-2 mx-0 md:mx-0 
                w-full md:w-96 bg-white rounded-none md:rounded-lg shadow-xl border border-gray-200 p-0 z-50 overflow-hidden">

                    <div class="p-4 border-b border-gray-200">
                        <div class="flex justify-between items-center mb-3">
                            <h3 class="text-lg font-semibold text-gray-800">Buscar artículos</h3>
                            <button @click="open = false" class="text-gray-500 hover:text-gray-700">
                                <i class="fas fa-times text-xl"></i>
                            </button>
                        </div>

                        <div class="relative">
                            <input type="text" x-model="searchQuery" @input.debounce.300ms="performSearch()"
                                placeholder="Buscar artículos por título o contenido..."
                                class="w-full pl-10 pr-4 py-3 md:py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-150"
                                autofocus>
                            <i class="fas fa-search absolute left-3 top-3 md:top-2.5 text-gray-400"></i>

                            <!-- Loading spinner -->
                            <div x-show="isLoading" class="absolute right-3 top-3 md:top-2.5">
                                <div class="animate-spin rounded-full h-5 w-5 border-b-2 border-blue-600"></div>
                            </div>
                        </div>
                    </div>

                    <!-- Resultados -->
                    <div class="max-h-96 overflow-y-auto">
                        <!-- Loading state -->
                        <div x-show="isLoading && !hasSearched" class="p-8 text-center">
                            <div class="animate-spin rounded-full h-8 w-8 border-b-2 border-blue-600 mx-auto">
                            </div>
                            <p class="mt-2 text-sm text-gray-500">Buscando artículos...</p>
                        </div>

                        <!-- No results -->
                        <div x-show="!isLoading && hasSearched && results.length === 0" class="p-8 text-center">
                            <i class="fas fa-search text-gray-300 text-4xl mb-3"></i>
                            <p class="text-gray-600 font-medium">No se encontraron artículos</p>
                            <p class="text-sm text-gray-500 mt-1">Intenta con otros términos de búsqueda</p>
                        </div>

                        <!-- Results list -->
                        <div x-show="!isLoading && results.length > 0">
                            <div class="px-4 py-2 bg-gray-50 border-b border-gray-200">
                                <p class="text-sm text-gray-600">
                                    <span x-text="results.length"></span> artículos encontrados
                                </p>
                            </div>

                            <ul class="divide-y divide-gray-100">
                                <template x-for="result in results" :key="result.id">
                                    <li>
                                        <a :href="result.url"
                                            class="block hover:bg-gray-50 p-4 transition duration-150"
                                            @click="open = false">
                                            <div class="flex items-start">
                                                <div class="flex-shrink-0 mr-3">
                                                    <template x-if="result.image">
                                                        <img :src="result.image" :alt="result.title"
                                                            class="h-12 w-12 rounded-lg object-cover">
                                                    </template>
                                                    <template x-if="!result.image">
                                                        <div
                                                            class="h-12 w-12 rounded-lg bg-gray-200 flex items-center justify-center">
                                                            <i class="fas fa-newspaper text-gray-400"></i>
                                                        </div>
                                                    </template>
                                                </div>
                                                <div class="flex-1 min-w-0">
                                                    <h4 class="text-sm font-semibold text-gray-900 truncate"
                                                        x-text="result.title"></h4>

                                                    <div class="mt-1 flex items-center text-xs text-gray-500">
                                                        <span x-text="result.author"></span>
                                                        <span class="mx-1">•</span>
                                                        <span x-text="result.date"></span>
                                                    </div>

                                                    <!-- Extracto del contenido -->
                                                    <p class="mt-2 text-xs text-gray-600 line-clamp-2"
                                                        x-text="result.excerpt"></p>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                </template>
                            </ul>

                            <!-- Ver todos los resultados -->
                            <div x-show="results.length > 0" class="p-4 border-t border-gray-200 bg-gray-50">
                                <a :href="searchAllUrl"
                                    class="block text-center text-sm font-medium text-blue-600 hover:text-blue-800"
                                    @click="open = false">
                                    Ver todos los resultados (<span x-text="results.length"></span>)
                                </a>
                            </div>
                        </div>

                        <!-- Sugerencias iniciales -->
                        <div x-show="!hasSearched && !isLoading" class="p-6 text-center">
                            <i class="fas fa-lightbulb text-gray-300 text-3xl mb-3"></i>
                            <p class="text-gray-600">Escribe para buscar artículos</p>
                            <p class="text-sm text-gray-500 mt-1">Busca por título o contenido</p>
                        </div>
                    </div>
                </div>
            </div> --}}
        </div>
    </div>
</nav>
