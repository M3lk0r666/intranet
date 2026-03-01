<article class="card" data-cats="{{ $video->catsvideo->pluck('id')->join(',') }}">
    <div class="thumb">
        <img src="{{ $video->thumbnail_url }}" alt="Miniatura de {{ $video->title }}">
        <span class="badge">{{ $video->catsvideo->pluck('name')->join(', ') }}</span>
        <span class="duration">{{ $video->duration }}</span>
    </div>
    <div class="content">
        <h3 class="title">{{ $video->title }}</h3>
        <p class="desc">{{ $video->short_description }}</p>
        <div class="actions">
            <button class="btn primary" data-action="play" data-src="{{ $video->video_url }}" data-type="mp4"
                data-title="{{ $video->title }}">
                Reproducir
            </button>
            <button class="btn ghost" data-action="details" data-title="{{ $video->title }}"
                data-description="{{ $video->description }}" data-year="{{ $video->year }}"
                data-duration="{{ $video->duration }}">
                Detalles
            </button>
        </div>
    </div>
</article>
