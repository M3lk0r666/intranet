<x-admin-layout title="Departamentos" :breadcrumbs="[
    [
        'name' => 'Dahsboard',
        'href' => route('admin.dashboard'),
    ],
    [
        'name' => 'Departamentos',
        'href' => route('admin.departments.index'),
    ],
    [
        'name' => 'Nuevo',
    ],
]">

    <x-wire-card>
        <form action="{{ route('admin.departments.store') }}" method="POST">
            @csrf
            <x-wire-input label="Nombre del departamento" name="name" placeholder="Ventas, Ingenieria, Administacion"
                value="{{ old('name') }}" />
            <div class="flex justify-end mt-4">
                <x-wire-button light amber type="submit">
                    <i class="ri-save-line"></i>
                    Guardar
                </x-wire-button>
            </div>
        </form>
    </x-wire-card>
</x-admin-layout>
