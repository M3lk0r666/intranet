<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $post->title }} - PDF</title>
    <style>
        /* Estilos para el PDF */
        @page {
            margin: 50px 40px;
        }

        body {
            font-family: 'DejaVu Sans', sans-serif;
            font-size: 12px;
            line-height: 1.6;
            color: #333;
        }

        .header {
            text-align: center;
            margin-bottom: 30px;
            border-bottom: 2px solid #3b82f6;
            padding-bottom: 20px;
        }

        .header h1 {
            font-size: 24px;
            font-weight: bold;
            color: #1e40af;
            margin-bottom: 10px;
        }

        .meta {
            display: flex;
            justify-content: center;
            gap: 20px;
            color: #6b7280;
            font-size: 11px;
            margin-bottom: 10px;
        }

        .content {
            font-size: 13px;
            line-height: 1.8;
        }

        .content img {
            max-width: 100%;
            height: auto;
            margin: 20px 0;
            border-radius: 8px;
        }

        .content h2 {
            font-size: 18px;
            color: #1e40af;
            margin-top: 30px;
            margin-bottom: 15px;
            padding-bottom: 5px;
            border-bottom: 1px solid #e5e7eb;
        }

        .content h3 {
            font-size: 16px;
            color: #374151;
            margin-top: 25px;
            margin-bottom: 10px;
        }

        .content p {
            margin-bottom: 15px;
            text-align: justify;
        }

        .content ul,
        .content ol {
            margin-left: 20px;
            margin-bottom: 15px;
        }

        .content li {
            margin-bottom: 5px;
        }

        .content code {
            background-color: #f3f4f6;
            padding: 2px 6px;
            border-radius: 4px;
            font-family: 'Courier New', monospace;
            font-size: 11px;
        }

        .content pre {
            background-color: #f3f4f6;
            padding: 15px;
            border-radius: 8px;
            overflow-x: auto;
            margin: 15px 0;
            border-left: 4px solid #3b82f6;
        }

        .footer {
            margin-top: 40px;
            padding-top: 20px;
            border-top: 1px solid #e5e7eb;
            text-align: center;
            color: #6b7280;
            font-size: 10px;
        }

        .tags {
            margin: 20px 0;
            display: flex;
            flex-wrap: wrap;
            gap: 8px;
        }

        .tag {
            background-color: #e0f2fe;
            color: #0369a1;
            padding: 4px 12px;
            border-radius: 20px;
            font-size: 10px;
        }

        .watermark {
            position: fixed;
            top: 50%;
            left: 50%;
            opacity: 0.2;
            font-size: 100px;
            color: #3b82f6;
            transform: translate(-50%, -50%) rotate(-45deg);
            pointer-events: none;
            white-space: nowrap;
            z-index: 9999;
            user-select: none;
        }

        .post-info {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 15px;
            margin: 20px 0;
            font-size: 11px;
        }

        .info-item {
            display: flex;
            align-items: center;
            gap: 8px;
            color: #475569;
        }

        .info-item i {
            color: #3b82f6;
        }
    </style>
    @if (config('app.url'))
        <base href="{{ config('app.url') }}">
    @endif
</head>

<body>
    <!-- Marca de agua opcional -->
    <span class="watermark">
        {{ config('app.name', 'Blog de Redes') }}
    </span>

    <!-- Encabezado -->
    <div class="header">
        <h1>{{ $post->title }}</h1>

        <div class="meta">
            <span><i class="far fa-calendar"></i> {{ $post->created_at->format('d/m/Y') }}</span>
            <span><i class="far fa-clock"></i> {{ $post->created_at->format('H:i') }}</span>
        </div>
    </div>

    {{-- <!-- Información del autor -->
    @if ($post->user)
        <div class="author-info">
            @if ($post->user->profile_photo_url)
                <img src="{{ $post->user->profile_photo_url }}" alt="{{ $post->user->name }}" class="author-avatar">
            @else
                <div>
                    {{ substr($post->user->name, 0, 1) }}
                </div>
            @endif
            <div class="author-details">
                <h4>{{ $post->user->name }}</h4>
                <p>Autor del artículo</p>
            </div>
        </div>
    @endif --}}

    <!-- Imagen destacada -->
    @if ($post->image)
        <div style="text-align: center; margin: 25px 0;">
            <img src="{{ $post->image }}" alt="{{ $post->title }}" style="max-width: 60%; border-radius: 10px;">
        </div>
    @endif

    <!-- Contenido del post -->
    <div class="content">
        {!! $post->content !!}
    </div>

    <!-- Tags -->
    @if ($post->tags->count() > 0)
        <div class="tags">
            @foreach ($post->tags as $tag)
                <span class="tag">#{{ $tag->name }}</span>
            @endforeach
        </div>
    @endif

    <!-- Información adicional -->
    <div class="post-info">
        <div class="info-item">
            <i class="far fa-file-alt"></i>
            <span>Artículo publicado por {{ $post->user->name }} en
                {{ config('app.name', 'Blog de Redes') }}</span>
        </div>
        <div class="info-item">
            <i class="far fa-calendar-check"></i>
            <span>Última actualización: {{ $post->updated_at->format('d/m/Y H:i') }}</span>
        </div>
        <div class="info-item">
            <i class="fas fa-download"></i>
            <span>PDF Generado: {{ now()->format('d/m/Y H:i') }}</span>
        </div>
    </div>

    <!-- Pie de página -->
    <div class="footer">
        <p>
            © {{ date('Y') }} {{ config('app.name', 'Blog de Redes') }}.
            Este documento fue generado automáticamente desde: {{ route('posts.show', $post) }}
        </p>
        <p style="margin-top: 5px;">
            Para más artículos visita: {{ url('/') }}
        </p>
    </div>
</body>

</html>
