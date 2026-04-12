<x-admin-layout title="Clientes" :breadcrumbs="[
    [
        'name' => 'Dashboard',
        'href' => route('admin.dashboard'),
    ],
    [
        'name' => 'Clientes',
    ],
]">

    <x-slot name="action">
        <x-wire-button blue href="{{ route('admin.clients.create') }}">
            <i class="ri-add-large-line"></i>
            Nueva
        </x-wire-button>

    </x-slot>

    @livewire('admin.datatables.client-table')


</x-admin-layout>
