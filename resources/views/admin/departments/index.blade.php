<x-admin-layout title="Departamentos" :breadcrumbs="[
    [
        'name' => 'Dashboard',
        'href' => route('admin.dashboard'),
    ],
    [
        'name' => 'Departamentos',
    ],
]">

    <x-slot name="action">
        <x-wire-button blue href="{{ route('admin.departments.create') }}">
            <i class="ri-add-large-line"></i>
            Nuevo
        </x-wire-button>
    </x-slot>

    @livewire('admin.datatables.department-table')
</x-admin-layout>
