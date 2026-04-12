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
        'name' => 'Editar',
    ],
]">

    <x-wire-card>
        <form action="{{ route('admin.clients.update', $client) }}" method="POST">
            @csrf
            @method('PUT')
            <x-wire-input label="Nombre" name="name" placeholder="Nombre del clinte"
                value="{{ old('name', $client->name) }}" />

            <div class="flex justify-end mt-4">
                <x-wire-button outline blue type="submit">
                    <i class="ri-loop-left-line"></i>
                    Actualizar
                </x-wire-button>
            </div>

        </form>
    </x-wire-card>


</x-admin-layout>
