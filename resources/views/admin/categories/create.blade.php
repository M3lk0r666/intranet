<x-admin-layout title="Categorias" :breadcrumbs="[
    [
        'name' => 'Dahsboard',
        'href' => route('admin.dashboard'),
    ],
    [
        'name' => 'Categorias',
        'href' => route('admin.categories.index'),
    ],
    [
        'name' => 'Nuevo',
    ],
]">

    <x-wire-card>
        <form action="{{ route('admin.categories.store') }}" method="POST">
            @csrf
            <x-wire-input label="Nombre" name="name" placeholder="Nombre de la categoria" value="{{ old('name') }}" />

            <div class="flex justify-end mt-4">
                <x-wire-button light type="submit">
                    <i class="ri-save-line"></i>
                    Guardar
                </x-wire-button>
            </div>

        </form>
    </x-wire-card>


</x-admin-layout>
