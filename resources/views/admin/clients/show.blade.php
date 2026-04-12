<x-admin-layout title="Clientes" :breadcrumbs="[
    [
        'name' => 'Dahsboard',
        'href' => route('admin.dashboard'),
    ],
    [
        'name' => 'Clientes',
        'href' => route('admin.clients.index'),
    ],
    [
        'name' => 'Documentos del Cliente',
    ],
]">

    <x-wire-card>

        <div class="p-6 space-y-6">

            <!-- CLIENTE -->
            <div class="bg-white shadow rounded-lg p-4">

                <h2 class="text-xl font-bold">
                    👤 {{ $client->name }}
                </h2>

            </div>

            <!-- DOCUMENTOS -->
            <div class="bg-white shadow rounded-lg p-4">

                <h3 class="text-lg font-semibold mb-4">
                    Documentos del Cliente
                </h3>

                <table class="w-full text-sm">

                    <thead class="bg-gray-50 text-gray-600">
                        <tr>
                            <th class="px-4 py-2">Tipo</th>
                            <th class="px-4 py-2">Año</th>
                            <th class="px-4 py-2">Tecnología</th>
                            <th class="px-4 py-2">Archivo</th>
                            <th class="px-4 py-2">Acción</th>
                        </tr>
                    </thead>

                    <tbody>

                        @foreach ($client->documents as $doc)
                            <tr class="border-b">

                                <td class="px-4 py-2">{{ ucfirst($doc->type) }}</td>
                                <td class="px-4 py-2">{{ $doc->year }}</td>
                                <td class="px-4 py-2">{{ $doc->technology }}</td>

                                <td class="px-4 py-2">

                                    @if (Str::endsWith($doc->file, '.pdf'))
                                        📄
                                    @else
                                        📊
                                    @endif

                                    {{ basename($doc->file) }}

                                </td>

                                <td class="px-4 py-2">

                                    <div class="flex items-center gap-3">

                                        {{-- VER / DESCARGAR --}}
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

                                        {{-- EDITAR --}}
                                        <a href="{{ route('admin.inventarios.edit', $doc->id) }}"
                                            class="text-yellow-600 hover:underline">
                                            Editar
                                        </a>

                                        {{-- ELIMINAR --}}
                                        <form action="{{ route('admin.inventarios.destroy', $doc->id) }}" method="POST"
                                            onsubmit="return confirm('¿Eliminar este documento?')">

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

                    </tbody>

                </table>

            </div>

            <!-- FORMULARIO AGREGAR DOCUMENTOS -->
            <div class="bg-white shadow rounded-lg p-4">

                <h3 class="text-lg font-semibold mb-4">
                    Agregar Documentos
                </h3>

                <form method="POST" action="{{ route('admin.inventarios.store') }}" enctype="multipart/form-data">

                    @csrf

                    <input type="hidden" name="client_id" value="{{ $client->id }}">

                    <div id="documents-container">

                        <!-- ITEM -->
                        <div class="grid grid-cols-4 gap-4 mb-3">

                            <select name="documents[0][type]" class="border p-2">
                                <option value="poliza">Poliza</option>
                                <option value="inventario">Inventario</option>
                                <option value="activos">Activos</option>
                            </select>

                            <input type="text" name="documents[0][year]" placeholder="Año" class="border p-2">

                            <input type="text" name="documents[0][technology]" placeholder="Tecnología"
                                class="border p-2">

                            <input type="file" name="documents[0][file]" class="border p-2">

                        </div>

                    </div>

                    <button type="button" onclick="addDocument()"
                        class="bg-gray-600 text-white px-3 py-2 rounded mb-3">

                        + Agregar otro documento

                    </button>

                    <button class="bg-blue-600 text-white px-4 py-2 rounded">
                        Guardar Documentos
                    </button>

                </form>

            </div>

        </div>

        <!-- MODAL PDF -->
        <div id="pdfModal"
            class="hidden fixed top-0 left-0 w-full h-full bg-black bg-opacity-50 flex items-center justify-center">

            <div class="bg-white w-11/12 h-5/6 relative rounded">

                <button onclick="closePdf()" class="absolute -top-10 right-0 bg-white px-3 py-1 rounded">
                    ✕
                </button>

                <iframe id="pdfFrame" class="w-full h-full"></iframe>

            </div>

        </div>

        <!-- JS -->
        <script>
            let index = 1;

            function addDocument() {

                let container = document.getElementById('documents-container');

                container.insertAdjacentHTML('beforeend', `
            
                <div class="grid grid-cols-4 gap-4 mb-3">
            
                    <select name="documents[${index}][type]" class="border p-2">
                        <option value="poliza">Poliza</option>
                        <option value="inventario">Inventario</option>
                        <option value="activos">Activos</option>
                    </select>
            
                    <input type="text"
                    name="documents[${index}][year]"
                    placeholder="Año"
                    class="border p-2">
            
                    <input type="text"
                    name="documents[${index}][technology]"
                    placeholder="Tecnología"
                    class="border p-2">
            
                    <input type="file"
                    name="documents[${index}][file]"
                    class="border p-2">
            
                </div>
            
                `);

                index++;

            }

            function openPdf(url) {
                document.getElementById('pdfFrame').src = url;
                document.getElementById('pdfModal').classList.remove('hidden');
            }

            function closePdf() {
                document.getElementById('pdfFrame').src = '';
                document.getElementById('pdfModal').classList.add('hidden');
            }
        </script>


    </x-wire-card>


</x-admin-layout>
