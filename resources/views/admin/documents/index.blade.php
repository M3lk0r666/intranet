<x-admin-layout title="Documentos" :breadcrumbs="[
    [
        'name' => 'Dashboard',
        'href' => route('admin.dashboard'),
    ],
    [
        'name' => 'Documentos',
    ],
]">


    <x-slot name="action">
        <x-wire-button blue href="{{ route('admin.documents.create') }}">
            <i class="ri-add-large-line"></i>
            Subir Documento
        </x-wire-button>

    </x-slot>


    <x-wire-card>

        <!-- Estadísticas -->
        <div class="mb-6 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
            @php
                $stats = [
                    'total' => [
                        'label' => 'Total Documentos',
                        'value' => App\Models\FileDocument::count(),
                        'icon' => 'las la-folder-open',
                        'color' => 'bg-blue-500',
                    ],
                    'pdf' => [
                        'label' => 'Archivos PDF',
                        'value' => App\Models\FileDocument::where('extension', 'pdf')->count(),
                        'icon' => 'las la-file-pdf',
                        'color' => 'bg-red-500',
                    ],
                    'downloads' => [
                        'label' => 'Total Descargas',
                        'value' => App\Models\FileDocument::sum('downloads'),
                        'icon' => 'las la-download',
                        'color' => 'bg-green-500',
                    ],
                    'size' => [
                        'label' => 'Espacio Usado',
                        'value' => number_format(App\Models\FileDocument::sum('size') / 1024, 2) . ' MB',
                        'icon' => 'las la-hdd',
                        'color' => 'bg-purple-500',
                    ],
                ];
            @endphp

            @foreach ($stats as $stat)
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6">
                        <div class="flex items-center">
                            <div class="flex-shrink-0">
                                <div class="{{ $stat['color'] }} p-3 rounded-lg">
                                    <i class="{{ $stat['icon'] }} text-white text-xl"></i>
                                </div>
                            </div>
                            <div class="ml-5 w-0 flex-1">
                                <dl>
                                    <dt class="text-sm font-medium text-gray-500 dark:text-gray-400 truncate">
                                        {{ $stat['label'] }}
                                    </dt>
                                    <dd class="text-lg font-semibold text-gray-900 dark:text-white">
                                        {{ $stat['value'] }}
                                    </dd>
                                </dl>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Categorías rápidas -->
        <div class="mb-6">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <h3 class="text-lg font-medium text-gray-900 dark:text-white mb-4">
                        <i class="las la-tags"></i> Categorías
                    </h3>
                    <div class="flex flex-wrap gap-2">
                        @foreach (App\Models\FileDocument::getCategories() as $key => $category)
                            <a href="{{ route('admin.documents.index', ['category' => $key]) }}"
                                class="inline-flex items-center px-3 py-1.5 rounded-full text-sm font-medium transition-colors duration-200"
                                style="background-color: {{ $category['color'] }}20; color: {{ $category['color'] }}; border: 1px solid {{ $category['color'] }}30;"
                                onmouseover="this.style.backgroundColor='{{ $category['color'] }}30'"
                                onmouseout="this.style.backgroundColor='{{ $category['color'] }}20'">
                                <i class="{{ $category['icon'] }} mr-1.5"></i>
                                {{ $category['name'] }}
                                <span class="ml-2 px-2 py-0.5 text-xs rounded-full bg-white dark:bg-gray-800">
                                    {{ App\Models\FileDocument::where('category', $key)->count() }}
                                </span>
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

        <!-- DataTable -->
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6">
                @livewire('admin.datatables.file-document-table')
            </div>
        </div>



        @push('scripts')
            <!-- Toastr para notificaciones -->
            <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet">
            <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

            <script>
                // Inicializar Toastr
                toastr.options = {
                    "closeButton": true,
                    "progressBar": true,
                    "positionClass": "toast-top-right",
                    "timeOut": "3000",
                    "showMethod": "fadeIn",
                    "hideMethod": "fadeOut"
                };

                // Mostrar notificaciones de sesión
                @if (session('success'))
                    toastr.success("{{ session('success') }}");
                @endif

                @if (session('error'))
                    toastr.error("{{ session('error') }}");
                @endif

                @if ($errors->any())
                    @foreach ($errors->all() as $error)
                        toastr.error("{{ $error }}");
                    @endforeach
                @endif
            </script>
        @endpush
    </x-wire-card>






</x-admin-layout>
