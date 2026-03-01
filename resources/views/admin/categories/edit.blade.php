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
        'name' => 'Editar',
    ],
]">

    <x-wire-card>
        <form action="{{ route('admin.categories.update', $category) }}" method="POST">
            @csrf
            @method('PUT')
            <x-wire-input label="Nombre" name="name" placeholder="Nombre de la categoria"
                value="{{ old('name', $category->name) }}" />

            <div class="flex justify-end mt-4">
                <x-wire-button blue type="submit">
                    <i class="ri-loop-left-line"></i>
                    Actualizar
                </x-wire-button>
            </div>

        </form>
    </x-wire-card>


</x-admin-layout>
