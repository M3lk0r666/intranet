<header
    class="sticky top-0 z-40 bg-surface-light/80 dark:bg-surface-dark/80 backdrop-blur-md border-b border-gray-200 dark:border-gray-800 px-8 py-4">
    <div class="flex items-center justify-between">
        <div class="flex items-center gap-8">
            <h2 class="text-xl font-bold tracking-tight">
                @yield('page-title', 'Formación Académica')
            </h2>
            <div class="hidden md:flex items-center gap-6">
                <a class="text-sm font-semibold {{ Request::routeIs('progreso.*') ? 'text-primary' : 'text-text-sub hover:text-text-main' }} transition-colors"
                    href="#">Mi Progreso</a>
                <a class="text-sm font-medium {{ Request::routeIs('certificaciones.*') ? 'text-primary' : 'text-text-sub hover:text-text-main' }} transition-colors"
                    href="#">Certificaciones</a>
                <a class="text-sm font-medium {{ Request::routeIs('favoritos.*') ? 'text-primary' : 'text-text-sub hover:text-text-main' }} transition-colors"
                    href="#">Favoritos</a>
            </div>
        </div>

        <div class="flex items-center gap-4">
            <!-- Buscador -->
            <div class="relative group">
                <span
                    class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-text-sub group-focus-within:text-primary transition-colors">search</span>
                <input
                    class="bg-gray-100 dark:bg-gray-800 border-none rounded-lg pl-10 pr-4 py-2 text-sm w-64 focus:ring-2 focus:ring-primary/50 transition-all"
                    placeholder="Buscar cursos, guías..." type="text" id="global-search" />
            </div>

            <!-- Notificaciones -->
            <button
                class="p-2 rounded-lg bg-gray-100 dark:bg-gray-800 text-text-main dark:text-white hover:bg-gray-200 dark:hover:bg-gray-700 transition-colors relative"
                id="notifications-btn">
                <span class="material-symbols-outlined">notifications</span>
                {{-- @if ($unreadNotifications > 0)
                    <span
                        class="absolute top-2 right-2 size-2 bg-primary rounded-full border-2 border-white dark:border-gray-800"></span>
                @endif --}}
            </button>

            <!-- Perfil de Usuario -->
            <div class="flex items-center gap-2 pl-2 border-l border-gray-200 dark:border-gray-800">
                <div class="dropdown relative">
                    <button class="flex items-center gap-2 focus:outline-none">
                        <div class="size-8 rounded-full bg-cover bg-center"
                            style='background-image: url("{{ asset('images/default-avatar.png') }}");'>
                        </div>
                        <span class="hidden md:inline text-sm font-medium">No se</span>
                        <span class="material-symbols-outlined text-text-sub">expand_more</span>
                    </button>

                    <!-- Dropdown Menu -->
                    <div
                        class="dropdown-menu absolute right-0 mt-2 w-48 bg-white dark:bg-surface-dark rounded-lg shadow-lg py-2 hidden border border-gray-200 dark:border-gray-800 z-50">
                        <a href="#"
                            class="flex items-center gap-2 px-4 py-2 text-sm text-text-sub hover:bg-gray-100 dark:hover:bg-gray-800">
                            <span class="material-symbols-outlined text-base">account_circle</span>
                            <span>Mi Perfil</span>
                        </a>
                        <a href="#"
                            class="flex items-center gap-2 px-4 py-2 text-sm text-text-sub hover:bg-gray-100 dark:hover:bg-gray-800">
                            <span class="material-symbols-outlined text-base">settings</span>
                            <span>Configuración</span>
                        </a>
                        <div class="border-t border-gray-200 dark:border-gray-800 my-2"></div>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit"
                                class="w-full text-left flex items-center gap-2 px-4 py-2 text-sm text-red-600 hover:bg-gray-100 dark:hover:bg-gray-800">
                                <span class="material-symbols-outlined text-base">logout</span>
                                <span>Cerrar Sesión</span>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
