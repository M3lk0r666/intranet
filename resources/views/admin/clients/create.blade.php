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
        'name' => 'Nuevo',
    ],
]">

    <x-wire-card>
        <form action="{{ route('admin.clients.store') }}" method="POST">
            @csrf
            <x-wire-input label="Nombre del cliente" name="name" placeholder="Nombre del cliente"
                value="{{ old('name') }}" />
            <div class="flex justify-end mt-4">
                <x-wire-button outline orange type="submit">
                    <i class="ri-save-line"></i>
                    Guardar
                </x-wire-button>
            </div>
        </form>
    </x-wire-card>
</x-admin-layout>
