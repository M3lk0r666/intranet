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
                            {{-- @can('access-admin') --}}
                            <a href="{{ url('/admin') }}"
                                class="flex items-center px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 transition duration-150">
                                <i class="ri-dashboard-line mr-2"></i>
                                Administración
                            </a>
                            {{-- @endcan --}}

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
                        <a href="{{ route('intranet.index') }}"
                            class="text-gray-700 hover:text-blue-600 font-large transition duration-150">
                            Home
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('intranet.posts.index') }}"
                            class="text-gray-700 hover:text-blue-600 font-medium transition duration-150 {{ request()->is('posts*') ? 'text-blue-600 border-b-2 border-blue-600' : '' }}">Artículos</a>
                    </li>
                    <!-- Menú desplegable Categorías -->
                    <li class="relative group">
                        <button
                            class="flex items-center text-gray-700 hover:text-blue-600 font-medium transition duration-150 {{ request()->is('categorias*') ? 'text-blue-600 border-b-2 border-blue-600' : '' }}">
                            Categorías
                            <i class="fas fa-chevron-down ml-1 text-xs"></i>
                        </button>
                        <div
                            class="absolute left-0 mt-2 w-48 bg-white rounded-md shadow-lg py-2 z-50 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-300">
                            @foreach ($categories as $category)
                                <a href="{{ route('categories.show', $category) }}"
                                    class="block px-4 py-2 text-sm text-gray-700 hover:bg-blue-50 hover:text-blue-600 transition duration-150">
                                    {{ $category->name }}
                                    <span
                                        class="bg-gray-100 text-gray-600 text-xs px-2 py-1 rounded-full ml-2">{{ $category->posts_count }}</span>
                                </a>
                            @endforeach
                            <div class="border-t border-gray-100 mt-2 pt-2">
                                <a href="{{ route('categories.index') }}"
                                    class="block px-4 py-2 text-sm text-blue-600 hover:bg-blue-50 transition duration-150">
                                    <i class="fas fa-list mr-2"></i>Ver todas
                                </a>
                            </div>
                        </div>
                    </li>

                    <li>
                        <a href="{{ route('home') . '#historia' }}"
                            class="text-gray-700 hover:text-blue-600 font-medium transition duration-150">Nosotros</a>
                    </li>
                    <li>
                        <a href="#"
                            class="text-gray-700 hover:text-blue-600 font-medium transition duration-150">Contacto</a>
                    </li>

                </ul>

                <!-- Buscador y menú móvil -->
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
                            x-transition:leave="transition ease-in duration-150"
                            x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0">
                        </div>
                    </template>

                    <!-- Panel de búsqueda simplificado -->
                    <div x-show="open" @click.away="open = false"
                        x-transition:enter="transition ease-out duration-200"
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
                </div>
            </div>

            <!-- Menú móvil -->
            <div id="mobile-menu" class="md:hidden hidden mt-4 pb-4 border-t border-gray-200">
                <ul class="flex flex-col space-y-3 font-medium text-sm pt-4">
                    <li>
                        <a href="{{ url('/') }}"
                            class="block py-2 text-gray-700 hover:text-blue-600 font-medium transition duration-150 {{ request()->is('/') ? 'text-blue-600' : '' }}">Home</a>
                    </li>

                    <li>
                        <a href="{{ route('intranet.posts.index') }}"
                            class="block py-2 text-gray-700 hover:text-blue-600 font-medium transition duration-150 {{ request()->is('posts*') ? 'text-blue-600' : '' }}">Artículos</a>
                    </li>

                    <!-- Categorías en móvil -->
                    <li>
                        <button onclick="toggleMobileCategories()"
                            class="flex items-center justify-between w-full py-2 text-gray-700 hover:text-blue-600 font-medium transition duration-150">
                            <span>Categorías</span>
                            <i id="mobile-categories-icon"
                                class="fas fa-chevron-down text-xs transition-transform duration-200"></i>
                        </button>
                        <div id="mobile-categories" class="hidden pl-4 mt-2 space-y-2 border-l-2 border-gray-200">
                            @foreach ($categories as $category)
                                <a href="{{ route('categories.show', $category) }}"
                                    class="block py-2 text-sm text-gray-600 hover:text-blue-600 transition duration-150 items-center justify-between">
                                    <span>{{ $category->name }}</span>
                                    <span
                                        class="bg-gray-100 text-gray-500 text-xs px-2 py-1 rounded-full">{{ $category->posts_count }}</span>
                                </a>
                            @endforeach
                            <div class="pt-2 mt-2 border-t border-gray-200">
                                <a href="{{ route('categories.index') }}"
                                    class="block py-2 text-sm text-blue-600 hover:text-blue-800 transition duration-150 items-center">
                                    <i class="fas fa-list mr-2"></i>
                                    Ver todas las categorías
                                </a>
                            </div>
                        </div>
                    </li>

                    <li>
                        <a href="{{ route('home') . '#historia' }}"
                            class="block py-2 text-gray-700 hover:text-blue-600 font-medium transition duration-150">Nosotros</a>
                    </li>
                    <li>
                        <a href="#"
                            class="block py-2 text-gray-700 hover:text-blue-600 font-medium transition duration-150">Contacto</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>

<!-- Script para el buscador -->
<script>
    // Asegúrate de que Alpine.js esté cargado antes
    // Script simplificado para buscar solo en posts
    document.addEventListener('alpine:init', () => {
        Alpine.data('searchComponent', () => ({
            open: false,
            searchQuery: '',
            isLoading: false,
            hasSearched: false,
            results: [],
            searchAllUrl: '#',

            init() {
                // Configurar URL base para búsquedas
                this.searchAllUrl = "{{ route('search.index', ['q' => '__QUERY__']) }}".replace(
                    '__QUERY__', '');
            },

            async performSearch() {
                if (this.searchQuery.trim().length < 2) {
                    this.results = [];
                    this.hasSearched = false;
                    return;
                }

                this.isLoading = true;
                this.hasSearched = true;

                try {
                    const params = new URLSearchParams({
                        q: this.searchQuery
                    });

                    console.log('Buscando artículos:', this.searchQuery);

                    const response = await fetch(`/api/search?${params}`);

                    if (!response.ok) {
                        throw new Error(`Error HTTP: ${response.status}`);
                    }

                    const data = await response.json();
                    console.log('Resultados de artículos:', data);

                    this.results = data.results || [];
                    this.updateSearchAllUrl();

                } catch (error) {
                    console.error('Error en la búsqueda de artículos:', error);
                    this.results = [];

                    // Mostrar mensaje de error amigable
                    if (!this.results.length) {
                        this.results = [{
                            id: 'error',
                            title: 'Error en la búsqueda',
                            excerpt: 'Intenta de nuevo más tarde',
                            url: '#',
                            author: 'Sistema',
                            date: 'Ahora',
                            image: null
                        }];
                    }
                } finally {
                    this.isLoading = false;
                }
            },

            updateSearchAllUrl() {
                const params = new URLSearchParams({
                    q: this.searchQuery
                });
                this.searchAllUrl = `{{ route('search.index') }}?${params}`;
            }
        }));
    });

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

    function toggleMobileCategories() {
        const mobileCategories = document.getElementById('mobile-categories');
        const mobileCategoriesIcon = document.getElementById('mobile-categories-icon');

        if (mobileCategories && mobileCategoriesIcon) {
            mobileCategories.classList.toggle('hidden');

            // Rotar ícono
            if (mobileCategories.classList.contains('hidden')) {
                mobileCategoriesIcon.classList.remove('fa-chevron-up');
                mobileCategoriesIcon.classList.add('fa-chevron-down');
            } else {
                mobileCategoriesIcon.classList.remove('fa-chevron-down');
                mobileCategoriesIcon.classList.add('fa-chevron-up');
            }
        }
    }
</script>
