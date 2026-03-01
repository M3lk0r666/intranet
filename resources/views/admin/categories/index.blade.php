<x-admin-layout title="Categorias" :breadcrumbs="[
    [
        'name' => 'Dashboard',
        'href' => route('admin.dashboard'),
    ],
    [
        'name' => 'Categorias',
    ],
]">

    <x-slot name="action">
        <x-wire-button blue href="{{ route('admin.categories.create') }}">
            <i class="ri-add-large-line"></i>
            Nueva
        </x-wire-button>

    </x-slot>

    @livewire('admin.datatables.category-table')


</x-admin-layout>
