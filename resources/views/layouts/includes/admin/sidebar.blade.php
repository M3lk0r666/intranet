@php
    $links = [
        [
            'header' => 'Gestion Global',
        ],
        [
            'name' => 'Dashboard',
            'icon' => 'ri-dashboard-line',
            'href' => route('admin.dashboard'),
            'active' => request()->routeIs('admin.dashboard'),
        ],
        [
            'name' => 'Home',
            'icon' => 'las la-home',
            'href' => url('/'),
            'active' => false,
            'new_tab' => false,
        ],
        [
            'name' => 'Ver los Posts',
            'icon' => 'ri-eye-line',
            'href' => route('intranet.posts.index'),
            'active' => false,
            'new_tab' => true,
        ],
        [
            'header' => 'Blog',
        ],
        [
            'name' => 'Categorias',
            'icon' => 'ri-list-unordered',
            'href' => route('admin.categories.index'),
            'active' => request()->routeIs('admin.categories.*'),
        ],
        [
            'name' => 'Etiquetas',
            'icon' => 'las la-tags',
            'href' => route('admin.tags.index'),
            'active' => request()->routeIs('admin.tags.*'),
        ],
        [
            'name' => 'Posts',
            'icon' => 'las la-newspaper',
            'href' => route('admin.posts.index'),
            'active' => request()->routeIs('admin.posts.*'),
        ],
        [
            'header' => 'Multimedia',
        ],
        [
            'name' => 'Videos',
            'icon' => 'las la-video',
            'href' => route('admin.videos.index'),
            'active' => request()->routeIs('admin.videos.*'),
        ],
        [
            'header' => 'Documentos',
        ],
        [
            'name' => 'Archivos',
            'icon' => 'ri-folder-5-line',
            'href' => route('admin.documents.index'),
            'active' => request()->routeIs('admin.documents.*'),
        ],
        /*[
            'name' => 'Guias',
            'icon' => 'las la-school',
            'href' => '#',
            'active' => false,
        ],
         [
            'header' => 'Analizador TXT',
        ],
        [
            'name' => 'Subir Archivo',
            'icon' => 'ri-file-upload-line',
            'href' => '#',
            'active' => false,
        ],
        [
            'name' => 'Listado Optimizado',
            'icon' => 'ri-eye-line',
            'href' => '#',
            'active' => false,
        ],
        [
            'header' => 'Graficos',
        ],
        [
            'name' => 'Diagrama',
            'icon' => 'ri-flow-chart',
            'href' => '#',
            'active' => false,
        ],
        [
            'name' => 'Aun no se',
            'icon' => 'ri-close-large-line',
            'href' => '#',
            'active' => false,
        ], */
        [
            'header' => 'ADMIN',
        ],
        [
            'name' => 'Perfil',
            'icon' => 'las la-user-shield',
            'href' => route('profile.show'),
            'active' => request()->routeIs('profile.show'),
        ],
    ];
@endphp

<aside id="logo-sidebar"
    class="fixed top-0 left-0 z-40 w-64 h-screen pt-20 transition-transform -translate-x-full bg-white border-r border-gray-200 lg:translate-x-0 dark:bg-gray-800 dark:border-gray-700"
    aria-label="Sidebar">
    <div class="h-full px-3 pb-4 overflow-y-auto bg-white dark:bg-gray-800">
        <ul class="space-y-2 font-medium">
            @foreach ($links as $link)
                <li>
                    @isset($link['header'])
                        <div class="px-2 py-2 text-lg font-bold text-blue-500 uppercase tracking-wider">
                            {{ $link['header'] }}
                        </div>
                    @else
                        @isset($link['submenu'])
                            <button type="button"
                                class="flex items-center w-full p-2 text-base text-gray-900 transition duration-75 rounded-lg group hover:bg-orange-100 dark:text-white dark:hover:bg-orange-700"
                                aria-controls="dropdown-example" data-collapse-toggle="dropdown-example">
                                <span class="w-6 h-6 inline-flex justify-center items-center">
                                    <i class="{{ $link['icon'] }}"></i>
                                </span>
                                <span class="flex-1 ms-3 text-left rtl:text-right whitespace-nowrap">{{ $link['name'] }}</span>
                                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                    viewBox="0 0 10 6">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="m1 1 4 4 4-4" />
                                </svg>
                            </button>
                            <ul id="dropdown-example" class="hidden py-2 space-y-2">
                                @foreach ($link['submenu'] as $item)
                                    <li>
                                        <a href="{{ $item['href'] }}"
                                            class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-orange-100 dark:text-white dark:hover:bg-orange-700"
                                            @if ($item['new_tab']) target="_blank" @endif>{{ $item['name'] }}</a>
                                    </li>
                                @endforeach
                            </ul>
                        @else
                            <a href="{{ $link['href'] }}"
                                class="flex items-center p-2 text-base text-gray-900 rounded-lg dark:text-white hover:bg-orange-200 dark:hover:bg-orange-700 group {{ $link['active'] ? 'bg-orange-300 dark:bg-orange-700' : '' }}"
                                @if (isset($link['new_tab']) && $link['new_tab']) target="_blank" @endif>
                                <span class="w-6 h-6 inline-flex justify-center items-center">
                                    <i class="{{ $link['icon'] }}"></i>
                                </span>
                                <span class="ms-3">{{ $link['name'] }}</span>
                            </a>
                        @endisset
                    @endisset
                </li>
            @endforeach

            <!-- Separador -->
            <li class="pt-6 mt-4 border-t border-gray-200 dark:border-gray-700">
                <div class="px-3 py-2">
                    <p class="text-xs text-gray-500 dark:text-gray-400">
                        Sesión iniciada como:<br>
                        <span class="font-medium text-gray-700 dark:text-gray-300">{{ auth()->user()->name }}</span>
                    </p>
                </div>
            </li>
        </ul>
    </div>
</aside>
