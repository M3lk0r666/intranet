<x-admin-layout title="Etiquetas" :breadcrumbs="[
    [
        'name' => 'Dahsboard',
        'href' => route('admin.dashboard'),
    ],
    [
        'name' => 'Etiquetas',
        'href' => route('admin.tags.index'),
    ],
    [
        'name' => 'Editar',
    ],
]">

    <x-wire-card>
        <form action="{{ route('admin.tags.update', $tag) }}" method="POST">
            @csrf
            @method('PUT')
            <x-wire-input label="Nombre" name="name" placeholder="Nombre de la etiqueta"
                value="{{ old('name', $tag->name) }}" />

            <div class="flex justify-end mt-4">
                <x-wire-button blue type="submit">
                    <i class="ri-loop-left-line"></i>
                    Actualizar
                </x-wire-button>
            </div>

        </form>
    </x-wire-card>


</x-admin-layout>
