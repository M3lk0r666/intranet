<div class="w-full h-full">

    {{-- VIDEO --}}
    @if ($type === 'video' && $resource)
        <video controls class="w-full h-full">
            <source src="{{ $resource->video_source }}" type="video/mp4">
        </video>
    @endif

    {{-- PDF --}}
    @if ($type === 'pdf' && $resource && $resource->file_url)
        <embed src="{{ $resource->file_url }}#view=FitH" type="application/pdf" class="w-full h-full" />
    @endif

    {{-- GUIDE --}}
    @if ($type === 'guide' && $resource && $resource->html_content)
        <div class="prose max-w-none p-4 overflow-y-auto h-full">
            {!! $resource->html_content !!}
        </div>
    @endif

    {{-- FALLBACK --}}
    @if (!$resource)
        <div class="p-4 text-red-500">
            Contenido no disponible
        </div>
    @endif

</div>
