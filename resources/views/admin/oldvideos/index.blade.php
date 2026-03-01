@push('css')
    <!-- Include your css -->
    <link href="/assets/css/video.css" rel="stylesheet">
    <!-- Plyr.io para reproductor -->
    <link rel="stylesheet" href="https://cdn.plyr.io/3.7.8/plyr.css" />

    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"> --}}

    <!-- Bootstrap Icons -->
    {{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css"> --}}
@endpush

<x-admin-layout title="Videos" :breadcrumbs="[
    [
        'name' => 'Dashboard',
        'href' => route('admin.dashboard'),
    ],
    [
        'name' => 'Listar Videos',
    ],
]">



    <x-slot name="action">
        <x-wire-button orange href="{{ route('admin.videos.create') }}">
            <i class="ri-add-large-line"></i>
            Subir Video
        </x-wire-button>

    </x-slot>

    <div class="container-fluid px-4">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="h3 mb-0 text-gray-800">Gestión de Videos</h1>

        </div>
        
        @livewire('admin.datatables.video-table')

    </div>


</x-admin-layout>

@push('js')
    <!-- Include the Js Videos -->
    <script src="{{ asset('/assets/scripts/video.js') }}"></script>
    <!-- Plyr.io -->
    <script src="https://cdn.plyr.io/3.7.8/plyr.js"></script>
@endpush
