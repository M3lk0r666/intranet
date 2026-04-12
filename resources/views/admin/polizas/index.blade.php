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

        <div class="grid grid-cols-4 gap-4 mb-6">
            <div class="bg-white p-4 rounded-xl shadow flex items-center gap-3">
                <div class="bg-blue-100 p-3 rounded-lg">📄</div>
                <div>
                    <p class="text-sm text-gray-500">Total Documentos</p>
                    <p class="text-xl font-bold">{{ $total }}</p>
                </div>
            </div>

            <div class="bg-white p-4 rounded-xl shadow flex items-center gap-3">
                <div class="bg-red-100 p-3 rounded-lg">📕</div>
                <div>
                    <p class="text-sm text-gray-500">PDF</p>
                    <p class="text-xl font-bold">{{ $pdfs }}</p>
                </div>
            </div>

            <div class="bg-white p-4 rounded-xl shadow flex items-center gap-3">
                <div class="bg-green-100 p-3 rounded-lg">📊</div>
                <div>
                    <p class="text-sm text-gray-500">Excel</p>
                    <p class="text-xl font-bold">{{ $excels }}</p>
                </div>
            </div>
        </div>


        <div class="flex justify-between items-center mb-4 gap-4">
            <input type="text" id="searchInput" placeholder="Buscar documentos..."
                class="border rounded-lg px-4 py-2 w-full max-w-sm">
            <select id="filterType" class="border rounded-lg px-3 py-2">
                <option value="">Todos</option>
                <option value="poliza">Poliza</option>
                <option value="inventario">Inventario</option>
                <option value="activos">Activos</option>
            </select>
        </div>

        <div class="p-6">
            <h2 class="text-xl font-semibold mb-4">
                Documentos de Clientes
            </h2>
            <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                <div class="bg-white shadow rounded-xl overflow-hidden">
                    <table class="w-full text-sm" id="dataTable">
                        <thead class="bg-gray-50 text-gray-600 text-xs uppercase">
                            <tr>
                                <th class="px-6 py-3">Cliente</th>
                                <th class="px-6 py-3">Tipo</th>
                                <th class="px-6 py-3">Año</th>
                                <th class="px-6 py-3">Archivo</th>
                                <th class="px-6 py-3">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($clients as $client)
                                @php $totalDocs = $client->documents->count(); @endphp
                                @foreach ($client->documents as $index => $doc)
                                    <tr class="border-b hover:bg-gray-50">
                                        {{-- CLIENTE SOLO UNA VEZ --}}
                                        @if ($index == 0)
                                            <td class="px-6 py-4 font-semibold align-top" rowspan="{{ $totalDocs }}">
                                                👤 {{ $client->name }}
                                            </td>
                                        @endif
                                        {{-- TIPO --}}
                                        <td class="px-6 py-4">
                                            <span
                                                class="px-2 py-1 text-xs rounded
                                            @if ($doc->type == 'poliza') bg-orange-100 text-orange-700
                                            @elseif($doc->type == 'inventario') bg-purple-100 text-purple-700
                                            @else bg-green-100 text-green-700 @endif">
                                                {{ ucfirst($doc->type) }}
                                            </span>
                                        </td>
                                        {{-- AÑO --}}
                                        <td class="px-6 py-4">
                                            {{ $doc->year }}
                                        </td>
                                        {{-- ARCHIVO --}}
                                        <td class="px-6 py-4 flex items-center gap-2">
                                            @if (Str::endsWith($doc->file, '.pdf'))
                                                <i class="las la-file-pdf text-red-600 text-xl"></i>
                                            @else
                                                <i class="las la-file-excel text-green-600 text-xl"></i>
                                            @endif
                                            {{ basename($doc->file) }}
                                        </td>
                                        {{-- ACCIONES --}}
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="flex items-center gap-3">
                                                @if (Str::endsWith($doc->file, '.pdf'))
                                                    <button onclick="openPdf('{{ asset('storage/' . $doc->file) }}')"
                                                        class="text-blue-600 hover:underline">
                                                        Ver
                                                    </button>
                                                @else
                                                    <a href="{{ asset('storage/' . $doc->file) }}"
                                                        class="text-green-600 hover:underline">
                                                        Descargar
                                                    </a>
                                                @endif
                                                <a href="{{ route('admin.clients.edit', $doc->id) }}"
                                                    class="text-yellow-600 hover:underline">
                                                    Editar
                                                </a>
                                                <form method="POST"
                                                    action="{{ route('admin.clients.destroy', $doc->id) }}">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="text-red-600 hover:underline">
                                                        Eliminar
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                                <tr class="border-t-2 border-gray-800">
                            @endforeach
                        </tbody>
                    </table>
                </div>
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


    </x-wire-card>

    @push('js')
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

            const searchInput = document.getElementById('searchInput');
            const filterType = document.getElementById('filterType');
            const rows = document.querySelectorAll('#dataTable tbody tr');

            function filterTable() {
                const search = searchInput.value.toLowerCase();
                const type = filterType.value;

                rows.forEach(row => {
                    const text = row.innerText.toLowerCase();
                    const rowType = row.children[1].innerText.toLowerCase();
                    const matchSearch = text.includes(search);
                    const matchType = type === '' || rowType.includes(type);
                    row.style.display = (matchSearch && matchType) ? '' : 'none';
                });
            }
            searchInput.addEventListener('keyup', filterTable);
            filterType.addEventListener('change', filterTable);
        </script>
    @endpush

</x-admin-layout>
