<x-admin-layout title="Polizas" :breadcrumbs="[
    [
        'name' => 'Dahsboard',
        'href' => route('admin.dashboard'),
    ],
    [
        'name' => 'Poliza Cliente',
        'href' => route('admin.clients.index'),
    ],
    [
        'name' => 'Archivos del cliente',
    ],
]">


    <x-wire-card>
        <div class="p-6">
            <h2 class="text-xl font-bold mb-4">
                {{ $client->name }}
            </h2>
            @if (Str::endsWith($document->file, '.pdf'))
                {{-- <iframe src="{{ asset('storage/' . $document->file) }}" width="100%" height="900px"
                    class="border rounded">
                </iframe> --}}
                <embed src="{{ asset('storage/' . $document->file) }}" type="application/pdf" width="100%" height="900px">
            @endif
        </div>
    </x-wire-card>

</x-admin-layout>
