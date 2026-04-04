@extends('layouts.intranet')

@section('title', 'Intranet Corporativa')

@push('css')
    <link href="/assets/css/intrahome.css" rel="stylesheet">
@endpush

@section('content')
    <!-- Breadcrumb -->
    <div class="bg-white border-b border-gray-200">
        <div class="container mx-auto px-4 py-3">
            <nav class="flex" aria-label="Breadcrumb">
                <ol class="inline-flex items-center space-x-1 md:space-x-3">
                    <li class="inline-flex items-center">
                        <a href="{{ route('bienvenido') }}"
                            class="inline-flex items-center text-sm text-gray-600 hover:text-orange-600">
                            <i class="fas fa-home mr-2"></i>
                            Home
                        </a>
                    </li>
                    <li>
                        <div class="flex items-center">
                            <i class="fas fa-chevron-right text-gray-400 mx-2"></i>
                            <a href="{{ route('intranet.index') }}"
                                class="ml-1 text-sm text-gray-600 hover:text-orange-600 md:ml-2">Intranet</a>
                        </div>
                    </li>
                    <li aria-current="page">
                        <div class="flex items-center">
                            <i class="fas fa-chevron-right text-gray-400 mx-2"></i>
                            <span class="ml-1 text-sm text-primary font-medium md:ml-2">Formacion
                                Academica</span>
                        </div>
                    </li>
                </ol>
            </nav>
        </div>
    </div>

    <!-- Encabezado -->
    <div class="text-center mb-8 mt-8">
        <h1 class="text-5xl font-black font-display tracking-tight text-slate-900 uppercase">
            Plataforma <span class="text-primary  uppercase">de Aprendizaje</span>
        </h1>
        <p class="text-slate-600 mt-6 text-4xl">Acceda a nuestros cursos, guías y tutoriales.</p>
    </div>

    <div class="bg-white rounded-lg shadow p-6 mb-8">
        {{-- Grid --}}
        <div class="p-6 space-y-10">
            {{-- VIDEOS --}}
            <div>
                <h2 class="text-4xl font-bold mb-4">🎬 <span class="text-primary  uppercase">Videos</span></h2>
                <!-- Esto es lo nuevo-->
                <div id="videoPlayerSection" class="hidden mb-8">
                    <div class="bg-white rounded-2xl border-2 border-orange-500 shadow-lg p-6">
                        {{-- Header --}}
                        <div class="flex justify-between items-center mb-4">
                            <h2 class="text-lg font-bold text-gray-800">
                                <i class="fas fa-play-circle text-orange-500 mr-2"></i>
                                Reproduciendo
                            </h2>
                            <button onclick="closePlayer()"
                                class="w-10 h-10 flex items-center justify-center bg-orange-500 text-white rounded-full hover:bg-orange-600">
                                ✕
                            </button>
                        </div>
                        <div class="w-full aspect-video bg-black rounded-lg overflow-hidden">
                            <video id="mainPlayer" class="w-full h-full object-cover" controls>
                                <source id="videoSource" src="" type="video/mp4">
                            </video>
                        </div>
                        {{-- Info --}}
                        <h3 id="videoTitle" class="text-xl font-bold mb-2"></h3>
                        <div class="flex gap-4 text-sm text-gray-500 mb-4">
                            <span id="videoDuration">⏱</span>
                            <span id="videoViews">👁</span>
                            <span id="videoRating">⭐</span>
                        </div>
                        <p id="videoDescription" class="bg-gray-100 p-4 rounded-lg text-gray-700"></p>
                    </div>
                </div>
                <div class="grid gap-6 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4">
                    @foreach ($videos as $video)
                        @include('intranet.learning.partials.card', [
                            'item' => $video,
                            'type' => 'video',
                        ])
                    @endforeach
                </div>
            </div>
            {{-- PDF --}}
            <div>
                <h2 class="text-4xl font-bold mb-4">📄 <span class="text-primary  uppercase">Documentos PDF</span></h2>
                <div class="grid gap-6 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4">
                    @foreach ($pdfs as $pdf)
                        @include('intranet.learning.partials.card', [
                            'item' => $pdf,
                            'type' => 'pdf',
                        ])
                    @endforeach
                </div>
            </div>
            {{-- GUÍAS --}}
            <div>
                <h2 class="text-4xl font-bold mb-4">📝 <span class="text-primary  uppercase">Guías</span></h2>
                <div class="grid gap-6 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4">
                    @foreach ($guides as $guide)
                        @include('intranet.learning.partials.card', [
                            'item' => $guide,
                            'type' => 'guide',
                        ])
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
@push('js')
    <script>
        function playVideo(video) {
            if (!video.url) {
                alert("Este video no tiene URL válida");
                return;
            }
            const section = document.getElementById('videoPlayerSection');
            section.classList.remove('hidden');
            document.getElementById('videoTitle').innerText = video.title;
            document.getElementById('videoDescription').innerText = video.description;
            const player = document.getElementById('mainPlayer');
            const source = document.getElementById('videoSource');
            source.src = video.url;
            player.load();
            player.play();
            section.scrollIntoView({
                behavior: 'smooth'
            });
        }

        function closePlayer() {
            const section = document.getElementById('videoPlayerSection');
            const player = document.getElementById('mainPlayer');
            player.pause();
            section.classList.add('hidden');
        }

        function playVideo(video) {
            if (!video.url || video.url === "null") {
                alert("Este video no tiene una fuente válida");
                return;
            }

            const section = document.getElementById('videoPlayerSection');

            section.classList.remove('hidden');
            document.getElementById('videoTitle').innerText = video.title;
            document.getElementById('videoDescription').innerText = video.description;
            document.getElementById('videoDuration').innerText = '⏱ ' + video.duration;
            const player = document.getElementById('mainPlayer');
            const source = document.getElementById('videoSource');
            source.src = video.url;
            player.load();
            player.play();
            section.scrollIntoView({
                behavior: 'smooth'
            });
        }
    </script>
@endpush
