<x-admin-layout title="Polizas" :breadcrumbs="[
    [
        'name' => 'Dahsboard',
        'href' => route('admin.dashboard'),
    ],
    [
        'name' => 'Poliza Cliente',
        'href' => route('admin.clients.index'),
    ],
    [
        'name' => 'Subir Poliza-Inventario',
    ],
]">
    <x-wire-card>

        <div class="p-6">
            <form method="POST" action="{{ route('admin.clients.store') }}" enctype="multipart/form-data">
                @csrf

                <select name="client_id" class="border p-2 w-full">
                    <option value="">Nuevo Cliente</option>
                    @forelse ($clients as $client)
                        <option value="{{ $client->id }}">
                            {{ $client->name }}
                        </option>
                    @empty
                        <option disabled>No hay clientes registrados</option>
                    @endforelse
                </select>
                <input type="text" name="name" placeholder="Nombre del cliente (si es nuevo)" id="newClient"
                    class="border p-2 w-full mt-2">
                <div id="documents">
                    <div class="grid grid-cols-3 gap-4 mb-3">
                        <select name="documents[0][type]" class="border p-2">
                            <option value="poliza">Poliza</option>
                            <option value="inventario">Inventario</option>
                        </select>
                        <input type="text" name="documents[0][technology]" placeholder="Tecnologia"
                            class="border p-2" />
                        <input type="file" name="documents[0][file]" class="border p-2" />
                    </div>
                </div>
                <button type="button" onclick="addDocument()" class="bg-gray-600 text-white px-3 py-2 rounded">
                    Agregar Documento
                </button>
                <button class="bg-blue-600 text-white px-4 py-2 rounded">
                    Guardar
                </button>
            </form>
        </div>

        <script>
            let i = 1;

            function addDocument() {
                const container = document.getElementById('documents');
                container.insertAdjacentHTML('beforeend', `
            
            <div class="grid grid-cols-3 gap-4 mb-3">
            
            <select name="documents[${i}][type]" class="border p-2">
            <option value="poliza">Poliza</option>
            <option value="inventario">Inventario</option>
            </select>
            
            <input type="text"
            name="documents[${i}][technology]"
            placeholder="Tecnologia"
            class="border p-2"/>
            
            <input type="file"
            name="documents[${i}][file]"
            class="border p-2"/>
            
            </div>
            
            `);
                i++;
            }
            document.querySelector('select[name="client_id"]')
                .addEventListener('change', function() {

                    let input = document.getElementById('newClient');

                    if (this.value != '') {
                        input.style.display = 'none';
                    } else {
                        input.style.display = 'block';
                    }

                });
        </script>
    </x-wire-card>

</x-admin-layout>
