<aside
    class="w-72 bg-surface-light dark:bg-surface-dark border-r border-gray-200 dark:border-gray-800 flex flex-col fixed h-full z-50">
    <div class="p-6 flex flex-col h-full">
        <div class="flex items-center gap-3 mb-10">
            <div class="bg-primary size-10 rounded-lg flex items-center justify-center text-white">
                <span class="material-symbols-outlined">school</span>
            </div>
            <div class="flex flex-col">
                <h1 class="text-text-main dark:text-white text-base font-bold leading-none">Hub Académico</h1>
                <p class="text-text-sub text-xs font-medium uppercase tracking-wider mt-1">Portal de Intranet</p>
            </div>
        </div>

        <nav class="flex flex-col gap-1 flex-1">
            <!-- Menú Principal -->
            <a class="menu-item flex items-center gap-3 px-4 py-3 rounded-lg {{ Request::routeIs('dashboard') ? 'bg-primary/10 text-primary' : 'text-text-sub hover:bg-gray-100 dark:hover:bg-gray-800' }} transition-colors"
                href="{{ route('dashboard') }}">
                <span
                    class="material-symbols-outlined {{ Request::routeIs('dashboard') ? 'text-primary' : '' }}">dashboard</span>
                <span class="text-sm font-medium">Inicio</span>
            </a>

            <a class="menu-item flex items-center gap-3 px-4 py-3 rounded-lg {{ Request::routeIs('procesos.*') ? 'bg-primary/10 text-primary' : 'text-text-sub hover:bg-gray-100 dark:hover:bg-gray-800' }} transition-colors"
                href="#">
                <span
                    class="material-symbols-outlined {{ Request::routeIs('procesos.*') ? 'text-primary' : '' }}">account_tree</span>
                <span class="text-sm font-medium">Procesos</span>
            </a>

            <!-- Formación Académica (con submenú) -->
            <a class="menu-item flex items-center gap-3 px-4 py-3 rounded-lg {{ Request::routeIs('videos.*') || Request::routeIs('categories.*') ? 'bg-primary/10 text-primary' : 'text-text-sub hover:bg-gray-100 dark:hover:bg-gray-800' }} transition-colors"
                href="#">
                <span
                    class="material-symbols-outlined {{ Request::routeIs('videos.*') || Request::routeIs('categories.*') ? 'text-primary' : '' }}"
                    style="font-variation-settings: 'FILL' {{ Request::routeIs('videos.*') || Request::routeIs('categories.*') ? 1 : 0 }}">menu_book</span>
                <span class="text-sm font-bold">Formación Académica</span>
            </a>

            <!-- Submenú de Categorías (solo visible en Formación Académica) -->
            @if (Request::routeIs('videos.*') || Request::routeIs('categories.*'))
                <div class="ml-8 mt-2 space-y-1 pl-2 border-l-2 border-gray-200 dark:border-gray-700">
                    <a class="category-menu-item flex items-center gap-3 px-3 py-2 rounded-lg text-sm {{ $currentCategory == 'all' ? 'active bg-primary text-white' : 'text-text-sub hover:bg-gray-100 dark:hover:bg-gray-800' }} transition-colors"
                        href="#">
                        <span class="material-symbols-outlined text-lg">video_library</span>
                        <div class="flex-1 flex justify-between items-center">
                            <span>Todos los Videos</span>
                            <span
                                class="text-xs px-2 py-0.5 rounded-full bg-gray-600 text-white">{{ $totalVideos }}</span>
                        </div>
                    </a>

                    @foreach ($categories as $category)
                        <a class="category-menu-item flex items-center gap-3 px-3 py-2 rounded-lg text-sm {{ $currentCategory == $category->slug ? 'active bg-primary text-white' : 'text-text-sub hover:bg-gray-100 dark:hover:bg-gray-800' }} transition-colors"
                            href="#">
                            <span class="material-symbols-outlined text-lg">{{ $category->icon }}</span>
                            <div class="flex-1 flex justify-between items-center">
                                <span>{{ $category->name }}</span>
                                <span
                                    class="text-xs px-2 py-0.5 rounded-full {{ $category->color }} text-white">{{ $category->videos_count }}</span>
                            </div>
                        </a>
                    @endforeach
                </div>
            @endif

            <a class="menu-item flex items-center gap-3 px-4 py-3 rounded-lg {{ Request::routeIs('recursos.*') ? 'bg-primary/10 text-primary' : 'text-text-sub hover:bg-gray-100 dark:hover:bg-gray-800' }} transition-colors"
                href="#">
                <span
                    class="material-symbols-outlined {{ Request::routeIs('recursos.*') ? 'text-primary' : '' }}">folder_open</span>
                <span class="text-sm font-medium">Recursos</span>
            </a>

            <a class="menu-item flex items-center gap-3 px-4 py-3 rounded-lg {{ Request::routeIs('social.*') ? 'bg-primary/10 text-primary' : 'text-text-sub hover:bg-gray-100 dark:hover:bg-gray-800' }} transition-colors"
                href="#">
                <span
                    class="material-symbols-outlined {{ Request::routeIs('social.*') ? 'text-primary' : '' }}">forum</span>
                <span class="text-sm font-medium">Social</span>
            </a>

            <div class="mt-auto">
                <a class="menu-item flex items-center gap-3 px-4 py-3 rounded-lg {{ Request::routeIs('soporte.*') ? 'bg-primary/10 text-primary' : 'text-text-sub hover:bg-gray-100 dark:hover:bg-gray-800' }} transition-colors"
                    href="#">
                    <span
                        class="material-symbols-outlined {{ Request::routeIs('soporte.*') ? 'text-primary' : '' }}">help_outline</span>
                    <span class="text-sm font-medium">Soporte</span>
                </a>

                <a class="menu-item flex items-center gap-3 px-4 py-3 rounded-lg {{ Request::routeIs('configuracion.*') ? 'bg-primary/10 text-primary' : 'text-text-sub hover:bg-gray-100 dark:hover:bg-gray-800' }} transition-colors"
                    href="#">
                    <span
                        class="material-symbols-outlined {{ Request::routeIs('configuracion.*') ? 'text-primary' : '' }}">settings</span>
                    <span class="text-sm font-medium">Configuración</span>
                </a>
            </div>
        </nav>
    </div>
</aside>
