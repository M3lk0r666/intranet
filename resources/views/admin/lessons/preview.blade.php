<x-admin-layout title="Cursos" :breadcrumbs="[
    [
        'name' => 'Dahsboard',
        'href' => route('admin.dashboard'),
    ],
    [
        'name' => 'Contenido',
        'href' => route('admin.contents.index'),
    ],
    [
        'name' => 'Vista Previa',
    ],
]">

    <x-wire-card>
        <div class="flex h-screen overflow-hidden">
            {{-- CONTENIDO --}}
            <div class="flex-1 p-6 overflow-y-auto">
                <div class="mb-4">
                    <h1 class="text-2xl font-bold">
                        Preview: {{ $lesson->title }}
                    </h1>
                    <p class="text-gray-500 text-sm">
                        Curso: {{ $course->title }} / {{ $module->title }}
                    </p>
                </div>
                {{-- {{ dd($resource->video_source) }} --}}
                {{-- 🔥 REUTILIZAS TODO --}}
                @if ($lesson->type === 'video')
                    <video controls class="w-full rounded">
                        <source src="{{ $resource->video_source }}">
                    </video>
                @endif

                @if ($lesson->type === 'pdf')
                    {{-- {{ dd($resource->file_path, $resource->file_url ?? null) }} 
                    <iframe src="{{ $resource->file_path ?? $resource->url }}" class="w-full h-[600px] rounded"></iframe> --}}
                    <iframe src="{{ $resource->file_url }}" class="w-full h-[600px] rounded"></iframe>
                @endif

                @if ($lesson->type === 'guide')
                    <div class="prose max-w-none">
                        {!! $resource->html_content !!}
                    </div>
                @endif
            </div>

            {{-- SIDEBAR SIMULADO --}}
            <div class="w-80 bg-gray-100 border-l p-4">
                <h3 class="font-semibold mb-3">Estructura</h3>
                @foreach ($course->modules as $m)
                    <div class="mb-3">
                        <p class="font-medium text-sm">
                            {{ $m->title }}
                        </p>
                        <ul class="text-sm text-gray-600 ml-2 mt-1">
                            @foreach ($m->lessons as $l)
                                <li class="{{ $l->id === $lesson->id ? 'text-blue-600 font-semibold' : '' }}">
                                    • {{ $l->title }}
                                </li>
                            @endforeach
                        </ul>
                    </div>
                @endforeach
            </div>
        </div>
    </x-wire-card>

</x-admin-layout>
