@extends('layouts.video')

@section('content')
    <article class="card">
        <div class="thumb">
            {{-- <video controls poster="{{ $video->thumbnail_url }}">
                <source src="{{ $video->video_url }}" type="{{ $video->metadata['mime_type'] ?? 'video/mp4' }}">
                Tu navegador no soporta video.
            </video> --}}
            <div class="video-player">
                <video controls poster="{{ $video->thumbnail_url }}">
                    <source src="{{ $video->video_url }}" type="video/mp4">
                </video>
            </div>

        </div>
        <div class="content">
            <h2 class="title">{{ $video->title }}</h2>
            <p class="desc">{{ $video->description }}</p>
            <p class="meta">Duración: {{ $video->duration }} | Año: {{ $video->year }}</p>
        </div>
        <a href="{{ route('intranet.videos.index') }}" class="btn ghost">← Regresar al listado</a>
    </article>
@endsection
