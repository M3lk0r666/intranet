<x-admin-layout title="Posts" :breadcrumbs="[
    [
        'name' => 'Dashboard',
        'href' => route('admin.dashboard'),
    ],
    [
        'name' => 'Formacion Academica - Archivos',
    ],
]">

    @push('css')
        <!-- Include your favorite highlight.js stylesheet -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.9.0/styles/atom-one-dark.min.css" rel="stylesheet">
        <link href="{{ asset('assets/prims/prism.css') }}" rel="stylesheet">
        <script src="{{ asset('assets/prims/prism.js') }}"></script>
        <link href="/assets/css/intradmin.css" rel="stylesheet">
    @endpush

    <x-wire-card>
        <div class="p-6 max-w-5xl mx-auto">

            {{-- Header --}}
            <div class="mb-6">
                <h1 class="text-3xl font-bold">{{ $content->title }}</h1>

                <p class="text-gray-500 mt-2">
                    {{ $content->category?->name }} •
                    {{ $content->created_at->format('d M Y') }}
                </p>
            </div>

            {{-- Thumbnail --}}
            @if ($content->thumbnail)
                <div class="mb-6">
                    <img src="{{ asset('storage/' . $content->thumbnail) }}"
                        class="w-full h-72 object-cover rounded-lg shadow">
                </div>
            @endif

            {{-- PDF --}}
            @if ($content->isPdf())
                <div class="bg-white rounded-lg shadow p-4">

                    <div class="flex justify-between items-center mb-3">
                        <p class="text-sm text-gray-600">
                            {{ $content->original_filename }} ({{ $content->readable_size }})
                        </p>

                        <a href="{{ asset('storage/' . $content->file_path) }}" target="_blank"
                            class="text-blue-600 hover:underline">
                            Descargar
                        </a>
                    </div>

                    <iframe src="{{ asset('storage/' . $content->file_path) }}" class="w-full h-[700px] rounded border">
                    </iframe>

                </div>
            @endif

            {{-- GUÍA --}}
            @if ($content->isGuide())
                <div class="bg-white rounded-lg shadow p-8">

                    {{-- Estilo tipo blog --}}
                    <div
                        class="prose max-w-none
                                prose-headings:font-bold
                                prose-p:text-gray-700
                                prose-a:text-blue-600">

                        {{-- {!! $content->content !!} --}}

                        <!--Mostra MArkdown -->
                        <div class="prose max-w-none">
                            {!! $content->html_content !!}
                        </div>

                    </div>

                </div>
            @endif

        </div>



    </x-wire-card>



</x-admin-layout>
