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
        'name' => 'Subir Poliza - Inventario - Activos',
    ],
]">
    <x-wire-card>

        <form action="{{ route('admin.clients.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <h1
                class="text-center text-orange-400 mb-4 text-2xl font-extrabold leading-none tracking-tight md:text-2xl lg:text-5xl">
                Agregar Documentos del Cliente</h1>

            <div class="mb-4">
                <label for="title" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                    Nombre del Cliente *
                </label>

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
            </div>

            <div class="mb-4">
                <div id="documents">
                    <div class="grid grid-cols-3 gap-4 mb-3">
                        <select name="documents[0][type]" class="border p-2">
                            <option value="poliza">Poliza</option>
                            <option value="inventario">Inventario</option>
                            <option value="activos">Activos</option>
                        </select>
                        <input type="text" name="documents[0][technology]" placeholder="Tecnologia"
                            class="border p-2" />
                        <input type="text" name="documents[0][year]" placeholder="Año" class="border p-2" />
                        <input type="file" name="documents[0][file]" class="border p-2" />
                    </div>
                </div>
            </div>

            <div class="mb-4">
                <button type="button" onclick="addDocument()" class="bg-gray-600 text-white px-3 py-2 rounded">
                    Agregar Documento
                </button>
            </div>

            <div class="mb-6">
                <button class="bg-blue-600 text-white px-4 py-2 rounded">
                    Guardar
                </button>
            </div>


        </form>


        {{-- <div class="p-6">
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
                            <option value="activos">Activos</option>
                        </select>
                        <input type="text" name="documents[0][technology]" placeholder="Tecnologia"
                            class="border p-2" />
                        <input type="text" name="documents[0][year]" placeholder="Año" class="border p-2" />
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
        </div> --}}

        <script>
            let i = 1;

            function addDocument() {
                const container = document.getElementById('documents');
                container.insertAdjacentHTML('beforeend', `
            
            <div class="grid grid-cols-3 gap-4 mb-3">
            
            <select name="documents[${i}][type]" class="border p-2">
            <option value="poliza">Poliza</option>
            <option value="inventario">Inventario</option>
            <option value="activos">Activos</option>
            </select>
            
            <input type="text"
            name="documents[${i}][technology]"
            placeholder="Tecnologia"
            class="border p-2"/>

            <input type="text"
            name="documents[${i}][year]"
            placeholder="Año"
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
