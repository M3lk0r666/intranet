<div class="bg-white rounded-2xl shadow hover:shadow-xl transition overflow-hidden group cursor-pointer">
    {{-- IMAGEN --}}
    <div class="relative">
        <img src="{{ $item->thumbnail_source }}" class="w-full h-44 object-cover">
        {{-- BADGE TIPO --}}
        <span
            class="absolute top-3 left-3 px-2 py-1 text-xs rounded-full text-white
            {{ $type === 'video' ? 'bg-orange-500' : ($type === 'pdf' ? 'bg-red-500' : 'bg-green-500') }}">
            {{ $type === 'video' ? '🎬 Video' : ($type === 'pdf' ? '📄 PDF' : '📝 Guía') }}
        </span>

        {{-- DURACIÓN SOLO VIDEO --}}
        @if ($type === 'video')
            <span class="absolute bottom-2 left-2 bg-black/70 text-white text-xs px-2 py-1 rounded">
                {{ $item->duration ?? '1h 20m' }}
            </span>
        @endif

        {{-- OVERLAY --}}
        <div
            class="absolute inset-0 bg-black/50 opacity-0 group-hover:opacity-100 transition flex items-center justify-center">

            {{-- VIDEO --}}
            @php
                $videoData = [
                    'url' => $item->video_source,
                    'title' => $item->title,
                    'description' => strip_tags($item->description),
                    'duration' => $item->duration ?? '1h 20m',
                    'views' => '1.2K',
                    'rating' => '8.5',
                ];
            @endphp

            @if ($type === 'video' && $item->video_source)
                <button onclick='playVideo(@json($videoData))'
                    class="bg-white px-4 py-2 rounded-lg font-semibold hover:bg-gray-100">
                    ▶ Ver
                </button>
            @endif

            {{-- PDF --}}
            @if ($type === 'pdf')
                <a href="{{ route('learning.show', ['content', $item->id]) }}"
                    class="bg-white px-4 py-2 rounded-lg font-semibold hover:bg-gray-100">
                    📄 Ver PDF
                </a>
            @endif

            {{-- GUÍA --}}
            @if ($type === 'guide')
                <a href="{{ route('learning.show', ['content', $item->id]) }}"
                    class="bg-white px-4 py-2 rounded-lg font-semibold hover:bg-gray-100">
                    📝 Ver Guía
                </a>
            @endif
        </div>
    </div>

    {{-- INFO --}}
    <div class="p-4">
        {{-- TÍTULO --}}
        <h3 class="font-semibold text-sm mb-2 line-clamp-2">
            {{ $item->title }}
        </h3>
        {{-- CATEGORÍA --}}
        <p class="text-xs text-gray-500 mb-3">
            {{ $item->category?->name ?? 'General' }}
        </p>
        {{-- FOOTER --}}
        <div class="flex justify-between text-xs text-gray-400">
            <span>⭐ 8.5</span>
            <span>
                @if ($type === 'video')
                    👁 1.2K
                @elseif($type === 'pdf')
                    📄 Archivo
                @else
                    📝 Lectura
                @endif
            </span>
            <span>{{ $item->created_at->year }}</span>
        </div>
    </div>
</div>
