<x-admin-layout title="Posts" :breadcrumbs="[
    [
        'name' => 'Dashboard',
        'href' => route('admin.dashboard'),
    ],
    [
        'name' => 'Posts',
    ],
]">

    <x-slot name="action">
        <x-wire-button blue href="{{ route('admin.posts.create') }}">
            <i class="ri-add-large-line"></i>
            Nuevo
        </x-wire-button>
    </x-slot>

    @livewire('admin.datatables.post-table')
</x-admin-layout>
