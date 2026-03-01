<x-admin-layout title="Etiquetas" :breadcrumbs="[
    [
        'name' => 'Dashboard',
        'href' => route('admin.dashboard'),
    ],
    [
        'name' => 'Etiquetas',
    ],
]">

    <x-slot name="action">
        <x-wire-button blue href="{{ route('admin.tags.create') }}">
            <i class="ri-add-large-line"></i>
            Nueva
        </x-wire-button>

    </x-slot>

    @livewire('admin.datatables.tag-table')


</x-admin-layout>
