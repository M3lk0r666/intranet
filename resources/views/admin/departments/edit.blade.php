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
        'name' => 'Editar',
    ],
]">

    <x-wire-card>
        <form action="{{ route('admin.departments.update', $department) }}" method="POST">
            @csrf
            @method('PUT')
            <x-wire-input label="Nombre del departamento" name="name" value="{{ old('name', $department->name) }}" />
            <div class="flex justify-end mt-4">
                <x-wire-button blue type="submit">
                    <i class="ri-loop-left-line"></i>
                    Actualizar
                </x-wire-button>
            </div>
        </form>
    </x-wire-card>
</x-admin-layout>
