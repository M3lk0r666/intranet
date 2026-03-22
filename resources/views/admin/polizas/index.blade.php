<x-admin-layout title="Poliza Clientes" :breadcrumbs="[
    [
        'name' => 'Dashboard',
        'href' => route('admin.dashboard'),
    ],
    [
        'name' => 'Clientes',
    ],
]">
    <x-slot name="action">
        <x-wire-button blue href="{{ route('admin.clients.create') }}">
            <i class="ri-add-large-line"></i>
            Dar de alta Cliente
        </x-wire-button>
    </x-slot>


    <x-wire-card>
        <div class="p-6">
            <h2 class="text-xl font-semibold mb-4">
                Polizas, Inventario u Activos de Clientes
            </h2>
            <div class="p-6 space-y-6">
                @foreach ($clients as $client)
                    <div class="border rounded-lg shadow">
                        <!-- CLIENTE -->
                        <div class="bg-orange-50 px-4 py-3 font-semibold text-lg">
                            <i class="las la-building text-primary text-xl"></i>
                            {{ $client->name }}
                        </div>
                        <div class="p-4 grid grid-cols-2 gap-6">
                            <!-- POLIZAS -->
                            <div>
                                <h3 class="font-semibold mb-2">
                                    📁 Polizas
                                </h3>
                                <ul class="space-y-2">
                                    @foreach ($client->documents->where('type', 'poliza') as $doc)
                                        <span class="ml-2 px-2 py-0.5 bg-orange-100 text-orange-800 text-xs rounded">
                                            {{ $doc->year }}
                                        </span>
                                        <li class="flex justify-between items-center border p-2 rounded">
                                            <span>
                                                <i class="las la-file-pdf text-xl text-red-600"></i>
                                                {{ basename($doc->file) }}
                                            </span>

                                            <button onclick="openPdf('{{ asset('storage/' . $doc->file) }}')"
                                                class="text-blue-600">
                                                Ver
                                            </button>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                            <!-- INVENTARIOS -->
                            <div>
                                <h3 class="font-semibold mb-2">
                                    📁 Inventarios
                                </h3>
                                <ul class="space-y-2">
                                    @foreach ($client->documents->where('type', 'inventario') as $doc)
                                        <span class="ml-2 px-2 py-0.5 bg-purple-100 text-purple-800 text-xs rounded">
                                            {{ $doc->year }}
                                        </span>
                                        <li class="flex justify-between items-center border p-2 rounded">
                                            <span>
                                                <i class="las la-file-excel text-xl text-green-600"></i>
                                                {{ basename($doc->file) }}
                                            </span>

                                            <a href="{{ asset('storage/' . $doc->file) }}" class="text-green-600">
                                                Descargar
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                            <!-- ACTIVOS -->
                            <div>
                                <h3 class="font-semibold mb-2">
                                    📁 Activos
                                </h3>
                                <ul class="space-y-2">
                                    @foreach ($client->documents->where('type', 'activos') as $doc)
                                        <span class="ml-2 px-2 py-0.5 bg-green-100 text-green-800 text-xs rounded">
                                            {{ $doc->year }}
                                        </span>
                                        <li class="flex justify-between items-center border p-2 rounded">
                                            <span>
                                                <i class="las la-file-excel text-xl text-green-600"></i>
                                                {{ basename($doc->file) }}
                                            </span>

                                            <a href="{{ asset('storage/' . $doc->file) }}" class="text-green-600">
                                                Descargar
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <div id="pdfModal"
                class="hidden fixed top-0 left-0 z-50 w-full h-full bg-black bg-opacity-50 flex items-center justify-center">
                <div class="bg-white w-11/12 h-5/6 rounded shadow-lg relative">
                    <button onclick="closePdf()"
                        class="absolute -top-10 right-0 bg-white text-black px-3 py-1 rounded shadow hover:bg-gray-200">
                        ✕ Cerrar
                    </button>
                    <div class="bg-white w-full h-full rounded shadow-lg overflow-hidden">
                        {{-- <iframe id="pdfFrame" class="w-full h-full rounded" src=""> --}}
                        <embed class="w-full h-full rounded" src="" type="application/pdf" id="pdfFrame">
                    </div>
                </div>
            </div>
        </div>

        <script>
            function openPdf(url) {
                document.getElementById('pdfFrame').src = url;
                document.getElementById('pdfModal')
                    .classList.remove('hidden');
            }

            function closePdf() {
                document.getElementById('pdfFrame').src = '';
                document.getElementById('pdfModal')
                    .classList.add('hidden');
            }
        </script>
    </x-wire-card>

</x-admin-layout>
