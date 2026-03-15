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
                Polizas e Inventario de Clientes
            </h2>
            {{-- <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                <table class="w-full text-sm text-left text-gray-500">
                    <thead class="text-xl text-gray-700 uppercase bg-gray-50">
                        <tr>
                            <th class="px-6 py-3">Tipo</th>
                            <th class="px-6 py-3">Tecnología</th>
                            <th class="px-6 py-3">Archivo</th>
                            <th class="px-6 py-3">Acción</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($clients as $client)
                            <!-- Nombre del cliente -->
                            <tr class="bg-orange-100 border-t-2">
                                <td colspan="4" class="text-center font-bold text-xl text-blue-600 p-3">
                                    {{ $client->name }}
                                </td>
                            </tr>
                            <!-- Documentos del cliente -->
                            @foreach ($client->documents as $doc)
                                <tr class="bg-white border-b">
                                    <td class="px-6 py-2">
                                        @if ($doc->type == 'poliza')
                                            <span class="bg-red-100 text-red-500 text-xs px-2 py-1 rounded">
                                                {{ ucfirst($doc->type) }}
                                            </span>
                                        @else
                                            <span class="bg-green-100 text-green-800 text-xs px-2 py-1 rounded">
                                                {{ ucfirst($doc->type) }}
                                            </span>
                                        @endif
                                    </td>
                                    <td class="px-6 py-2">{{ $doc->technology }}</td>
                                    <td class="px-6 py-2">
                                        @if (Str::endsWith($doc->file, '.pdf'))
                                            <i class="las la-file-pdf text-xl text-red-600"></i>
                                        @else
                                            <i class="las la-file-excel text-xl text-green-600"></i>
                                        @endif
                                        {{ basename($doc->file) }}
                                    </td>
                                    <td class="px-6 py-4">
                                        @if (Str::endsWith($doc->file, '.pdf'))
                                            <button onclick="openPdf('{{ asset('storage/' . $doc->file) }}')"
                                                class="text-blue-600 hover:underline">
                                                Ver PDF
                                            </button>
                                        @else
                                            <a href="{{ asset('storage/' . $doc->file) }}"
                                                class="text-green-600 hover:underline">
                                                Descargar
                                            </a>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        @endforeach
                    </tbody>
                </table>
            </div> --}}

            <div class="p-6 space-y-6">
                @foreach ($clients as $client)
                    <div class="border rounded-lg shadow">
                        <!-- CLIENTE -->
                        <div class="bg-orange-100 px-4 py-3 font-semibold text-lg">
                            👤 {{ $client->name }}
                        </div>
                        <div class="p-4 grid grid-cols-2 gap-6">
                            <!-- POLIZAS -->
                            <div>
                                <h3 class="font-semibold mb-2">
                                    📁 Polizas
                                </h3>
                                <ul class="space-y-2">
                                    @foreach ($client->documents->where('type', 'poliza') as $doc)
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
