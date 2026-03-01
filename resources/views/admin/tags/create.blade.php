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
        'name' => 'Nuevo',
    ],
]">

    <x-wire-card>
        <form action="{{ route('admin.tags.store') }}" method="POST">
            @csrf
            <x-wire-input label="Nombre de la etiqueta" name="name" placeholder="Nombre de la etiqueta"
                value="{{ old('name') }}" />

            <div class="flex justify-end mt-4">
                <x-wire-button light type="submit">
                    <i class="ri-save-line"></i>
                    Guardar
                </x-wire-button>
            </div>

        </form>
    </x-wire-card>


</x-admin-layout>
