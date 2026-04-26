<x-app-layout>
    <div class="flex h-screen overflow-hidden">

        {{-- 🎥 CONTENIDO --}}
        <div class="flex-1 p-6 overflow-y-auto">
            @php
                $lesson = $currentLesson ?? $firstLesson;
                $resource = $lesson?->content_resource;
            @endphp

            @if ($lesson)
                {{-- VIDEO --}}
                @if ($lesson->type === 'video')
                    @include('videos.partials.player', ['video' => $resource])
                @endif

                {{-- PDF --}}
                @if ($lesson->type === 'pdf')
                    @include('contents.partials.pdf-viewer', ['content' => $resource])
                @endif

                {{-- GUIDE --}}
                @if ($lesson->type === 'guide')
                    @include('contents.partials.markdown', ['content' => $resource])
                @endif

                {{-- Navegación --}}
                @include('courses.partials.navigation', ['lesson' => $lesson, 'course' => $course])
            @endif
        </div>

        {{-- 📚 SIDEBAR --}}
        <div class="w-80 bg-gray-100 border-l overflow-y-auto">
            @foreach ($course->modules as $module)
                <div class="p-4 border-b">
                    <h3 class="font-semibold mb-2">
                        {{ $module->title }}
                    </h3>
                    <ul class="space-y-1">
                        @foreach ($module->lessons as $l)
                            <li>
                                <a href="{{ route('admin.courses.lessons.show', [$course->slug, $l->id]) }}"
                                    class="block px-2 py-1 rounded {{ isset($lesson) && $lesson->id === $l->id ? 'bg-blue-500 text-white' : 'hover:bg-gray-200' }}">
                                    {{ $l->title }}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            @endforeach
        </div>
    </div>
</x-app-layout>
