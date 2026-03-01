@extends('layouts.intranet')

@section('title', 'Curso de Inteligencia Artificial - Videos')

@push('css')
    <!-- Include your css -->
    <link href="/assets/css/intranet.css" rel="stylesheet">
@endpush

@section('content')
    <!-- Principal -->
    <div class="min-h-screen bg-overlay">


        <!-- Header con fondo blanco -->
        <header class="page-header w-full py-6 px-4">
            <div class="documents-container">
                <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
                    <div class="flex items-center gap-4">
                        <div>
                            <h1 class="text-2xl font-bold text-gray-800">
                                <i class="fas fa-folder-open text-purple-600 mr-2"></i>
                                Curso de Inteligencia Artificial
                            </h1>
                            <p class="subtitle">Una guía modular para entender los fundamentos, tendencias y aplicaciones
                                prácticas de la
                                IA en el mundo actual.</p>
                        </div>
                    </div>

                    <div class="text-sm text-gray-500">
                        <i class="far fa-calendar-alt mr-1"></i>
                        Actualizado: {{ date('d/m/Y') }}
                    </div>
                </div>
            </div>
            <div class="filters">
                <a href="{{ url('/intranet/formacion-academica') }}"
                    class="px-4 py-2 bg-gray-100 hover:bg-orange-200 text-gray-700 font-medium rounded-lg transition duration-300 flex items-center gap-2 text-xs">
                    <i class="fas fa-arrow-left"></i>
                    Volver
                </a>
                <button class="filter-btn active" data-filter="all">Todos los módulos</button>
                <button class="filter-btn" data-filter="1">Fundamentos</button>
                <button class="filter-btn" data-filter="2">La Nueva Ola</button>
                <button class="filter-btn" data-filter="3">AIOps</button>
            </div>
        </header>
        {{-- <header class="w-full py-6 px-6">
            <div class="container mx-auto flex justify-between items-center">
                <div class="text-xl font-bold text-gray-800">
                    <i class="fas fa-sitemap text-blue-600 mr-2"></i>
                    Procesos Empresariales Internos
                </div>

                <!-- Botón para regresar al inicio -->
                <a href="{{ url('/intranet') }}"
                    class="px-4 py-2 bg-gray-100 hover:bg-orange-200 text-gray-700 font-medium rounded-lg transition duration-300 flex items-center gap-2 text-xs">
                    <i class="fas fa-home"></i>
                    Inicio
                </a>
            </div>
        </header> --}}

        <div class="modules-container">
            <!-- ========== MÓDULO 1 ========== -->
            <div class="module" data-module="1">
                <div class="module-header">
                    <h2><span class="module-number">1</span> Módulo 1: Fundamentos (¿Qué es todo esto?)</h2>
                    <p class="module-description">Conceptos básicos, terminología y principios fundamentales de la
                        Inteligencia Artificial.</p>
                </div>

                <div class="videos-container">
                    <!-- Video 1.1 -->
                    <div class="video-card">
                        <div class="video-header">
                            <div class="video-number">1.1</div>
                            <div class="video-title">¡Hola, IA! Más allá de las películas</div>
                            <div class="video-actions">
                                <button class="toggle-player" onclick="toggleVideo('video1.1')">
                                    <i class="fas fa-video"></i> Mostrar/Ocultar
                                </button>
                            </div>
                        </div>

                        <!-- REPRODUCTOR DE VIDEO 1.1 -->
                        <div class="video-player collapsed" id="player-video1.1">
                            <!-- REEMPLAZA EL SRC CON TU VIDEO REAL -->
                            <video controls
                                poster="https://images.unsplash.com/photo-1677442136019-21780ecad995?q=80&w=1000">
                                <source
                                    src="https://commondatastorage.googleapis.com/gtv-videos-bucket/sample/BigBuckBunny.mp4"
                                    type="video/mp4">
                                Tu navegador no soporta el elemento de video.
                            </video>
                        </div>

                        <div class="video-content">
                            <div class="video-column">
                                <div class="column-title">
                                    <i class="fas fa-info-circle content-icon"></i> CONTENIDO
                                </div>
                                <div class="column-content">
                                    ¿Qué es la IA en términos sencillos? No es Skynet, es un software que toma
                                    decisiones o hace predicciones basadas en datos.
                                </div>
                            </div>

                            <div class="video-column">
                                <div class="column-title">
                                    <i class="fas fa-lightbulb analogy-icon"></i> ANALOGÍA / ESCENARIO
                                </div>
                                <div class="column-content">
                                    Es como el GPS de tu coche. No sigue una ruta fija; recalcula basándose en el
                                    tráfico (datos en tiempo real) para tomar la mejor decisión (la ruta más rápida).
                                </div>
                            </div>
                        </div>

                        <div class="video-footer">
                            <div class="function-badge">
                                <i class="fas fa-cogs function-icon"></i> Automatizar tareas repetitivas y analizar
                                cantidades masivas de datos
                            </div>
                            <button class="play-button" onclick="playVideo('video1.1')">
                                <i class="fas fa-play"></i> Reproducir Video 1.1
                            </button>
                        </div>
                    </div>

                    <!-- Video 1.2 -->
                    <div class="video-card">
                        <div class="video-header">
                            <div class="video-number">1.2</div>
                            <div class="video-title">El árbol de la IA (IA vs. ML vs. DL)</div>
                            <div class="video-actions">
                                <button class="toggle-player" onclick="toggleVideo('video1.2')">
                                    <i class="fas fa-video"></i> Mostrar/Ocultar
                                </button>
                            </div>
                        </div>

                        <!-- REPRODUCTOR DE VIDEO 1.2 -->
                        <div class="video-player collapsed" id="player-video1.2">
                            <!-- REEMPLAZA EL SRC CON TU VIDEO REAL -->
                            <video controls
                                poster="https://images.unsplash.com/photo-1620712943543-bcc4688e7485?q=80&w=1000">
                                <source
                                    src="https://commondatastorage.googleapis.com/gtv-videos-bucket/sample/ElephantsDream.mp4"
                                    type="video/mp4">
                                Tu navegador no soporta el elemento de video.
                            </video>
                        </div>

                        <div class="video-content">
                            <div class="video-column">
                                <div class="column-title">
                                    <i class="fas fa-info-circle content-icon"></i> CONTENIDO
                                </div>
                                <div class="column-content">
                                    Aclaremos los términos. IA: concepto general, el árbol completo (ej. un chatbot).
                                    ML: rama principal que aprende de los datos sin ser programada explícitamente. DL:
                                    rama avanzada que usa redes neuronales para problemas complejos.
                                </div>
                            </div>

                            <div class="video-column">
                                <div class="column-title">
                                    <i class="fas fa-lightbulb analogy-icon"></i> ANALOGÍA / ESCENARIO
                                </div>
                                <div class="column-content">
                                    <strong>IA</strong>: el árbol completo (ej. un chatbot). <strong>ML</strong>: rama
                                    principal que aprende de los datos sin ser programada explícitamente.
                                    <strong>DL</strong>: rama avanzada que usa redes neuronales para problemas complejos
                                    (ej. reconocimiento facial).
                                </div>
                            </div>
                        </div>

                        <div class="video-footer">
                            <div class="function-badge">
                                <i class="fas fa-sitemap function-icon"></i> Comprender la jerarquía entre IA, ML y DL
                            </div>
                            <button class="play-button" onclick="playVideo('video1.2')">
                                <i class="fas fa-play"></i> Reproducir Video 1.2
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- ========== MÓDULO 2 ========== -->
            <div class="module" data-module="2">
                <div class="module-header">
                    <h2><span class="module-number">2</span> Módulo 2: La Nueva Ola (Lo que ves en las noticias)</h2>
                    <p class="module-description">Explorando las tendencias más recientes en Inteligencia Artificial que
                        están transformando industrias.</p>
                </div>

                <div class="videos-container">
                    <!-- Video 2.1 -->
                    <div class="video-card">
                        <div class="video-header">
                            <div class="video-number">2.1</div>
                            <div class="video-title">IA Generativa (GenAI): La IA que crea</div>
                            <div class="video-actions">
                                <button class="toggle-player" onclick="toggleVideo('video2.1')">
                                    <i class="fas fa-video"></i> Mostrar/Ocultar
                                </button>
                            </div>
                        </div>

                        <!-- REPRODUCTOR DE VIDEO 2.1 -->
                        <div class="video-player collapsed" id="player-video2.1">
                            <!-- REEMPLAZA EL SRC CON TU VIDEO REAL -->
                            <video controls
                                poster="https://images.unsplash.com/photo-1681492064387-4c1b4d7a7c8b?q=80&w=1000">
                                <source
                                    src="https://commondatastorage.googleapis.com/gtv-videos-bucket/sample/ForBiggerBlazes.mp4"
                                    type="video/mp4">
                                Tu navegador no soporta el elemento de video.
                            </video>
                        </div>

                        <div class="video-content">
                            <div class="video-column">
                                <div class="column-title">
                                    <i class="fas fa-info-circle content-icon"></i> CONTENIDO
                                </div>
                                <div class="column-content">
                                    ¿Qué es la GenAI? A diferencia del ML tradicional que clasifica o predice, la GenAI
                                    crea contenido nuevo.
                                </div>
                            </div>

                            <div class="video-column">
                                <div class="column-title">
                                    <i class="fas fa-lightbulb analogy-icon"></i> ANALOGÍA / ESCENARIO
                                </div>
                                <div class="column-content">
                                    Piensa en el ML como un crítico de música que te dice si una canción será un éxito.
                                    La IA Generativa es el compositor que escribe una canción nueva.
                                </div>
                            </div>
                        </div>

                        <div class="video-footer">
                            <div class="function-badge">
                                <i class="fas fa-paint-brush function-icon"></i> ChatGPT (crea texto), DALL-E (crea
                                imágenes), scripts de automatización
                            </div>
                            <button class="play-button" onclick="playVideo('video2.1')">
                                <i class="fas fa-play"></i> Reproducir Video 2.1
                            </button>
                        </div>
                    </div>

                    <!-- Video 2.2 -->
                    <div class="video-card">
                        <div class="video-header">
                            <div class="video-number">2.2</div>
                            <div class="video-title">IA Agéntica (Agente AI): La IA que hace</div>
                            <div class="video-actions">
                                <button class="toggle-player" onclick="toggleVideo('video2.2')">
                                    <i class="fas fa-video"></i> Mostrar/Ocultar
                                </button>
                            </div>
                        </div>

                        <!-- REPRODUCTOR DE VIDEO 2.2 -->
                        <div class="video-player collapsed" id="player-video2.2">
                            <!-- REEMPLAZA EL SRC CON TU VIDEO REAL -->
                            <video controls
                                poster="https://images.unsplash.com/photo-1681492064387-4c1b4d7a7c8b?q=80&w=1000">
                                <source
                                    src="https://commondatastorage.googleapis.com/gtv-videos-bucket/sample/ForBiggerEscapes.mp4"
                                    type="video/mp4">
                                Tu navegador no soporta el elemento de video.
                            </video>
                        </div>

                        <div class="video-content">
                            <div class="video-column">
                                <div class="column-title">
                                    <i class="fas fa-info-circle content-icon"></i> CONTENIDO
                                </div>
                                <div class="column-content">
                                    Es el siguiente paso. No es solo un chatbot que responde, es un agente que actúa.
                                    Usa herramientas para completar tareas.
                                </div>
                            </div>

                            <div class="video-column">
                                <div class="column-title">
                                    <i class="fas fa-lightbulb analogy-icon"></i> ANALOGÍA / ESCENARIO
                                </div>
                                <div class="column-content">
                                    Le pides a un chatbot (GenAI): "¿Cuál es el pronóstico del tiempo?". Te da una
                                    respuesta. Le pides a un Agente de IA: "Si llueve mañana, reagenda una reunión de
                                    las 10 a.m. y avísale a Juan". El agente entiende, revisa el clima y actúa.
                                </div>
                            </div>
                        </div>

                        <div class="video-footer">
                            <div class="function-badge">
                                <i class="fas fa-tasks function-icon"></i> Automatización avanzada de tareas de soporte
                            </div>
                            <button class="play-button" onclick="playVideo('video2.2')">
                                <i class="fas fa-play"></i> Reproducir Video 2.2
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- ========== MÓDULO 3 ========== -->
            <div class="module" data-module="3">
                <div class="module-header">
                    <h2><span class="module-number">3</span> Módulo 3: Aplicación 1 - ITOps y Observabilidad (AIOps)
                    </h2>
                    <p class="module-description">Aplicaciones prácticas de la IA en operaciones de TI y sistemas de
                        observabilidad.</p>
                </div>

                <div class="videos-container">
                    <!-- Video 3.1 -->
                    <div class="video-card">
                        <div class="video-header">
                            <div class="video-number">3.1</div>
                            <div class="video-title">El fin de la fatiga por alertas (AIOps)</div>
                            <div class="video-actions">
                                <button class="toggle-player" onclick="toggleVideo('video3.1')">
                                    <i class="fas fa-video"></i> Mostrar/Ocultar
                                </button>
                            </div>
                        </div>

                        <!-- REPRODUCTOR DE VIDEO 3.1 -->
                        <div class="video-player collapsed" id="player-video3.1">
                            <!-- REEMPLAZA EL SRC CON TU VIDEO REAL -->
                            <video controls
                                poster="https://images.unsplash.com/photo-1677442136019-21780ecad995?q=80&w=1000">
                                <source
                                    src="https://commondatastorage.googleapis.com/gtv-videos-bucket/sample/ForBiggerFun.mp4"
                                    type="video/mp4">
                                Tu navegador no soporta el elemento de video.
                            </video>
                        </div>

                        <div class="video-content">
                            <div class="video-column">
                                <div class="column-title">
                                    <i class="fas fa-info-circle content-icon"></i> CONTENIDO
                                </div>
                                <div class="column-content">
                                    El problema de ITOps: Miles de alertas, logs y métricas. ¿Cuál es importante? AIOps
                                    usa ML para analizar todo ese ruido.
                                </div>
                            </div>

                            <div class="video-column">
                                <div class="column-title">
                                    <i class="fas fa-lightbulb analogy-icon"></i> ANALOGÍA / ESCENARIO
                                </div>
                                <div class="column-content">
                                    Eres un guardia de seguridad viendo 100 monitores. AIOps es un asistente que te
                                    dice: "Ignora 99 monitores, solo mira el 74 y el 12. El tipo del monitor 74 es el
                                    mismo que robó en el 12 hace 5 minutos".
                                </div>
                            </div>
                        </div>

                        <div class="video-footer">
                            <div class="function-badge">
                                <i class="fas fa-filter function-icon"></i> Correlación de eventos, detección de
                                anomalías y análisis de causa raíz
                            </div>
                            <button class="play-button" onclick="playVideo('video3.1')">
                                <i class="fas fa-play"></i> Reproducir Video 3.1
                            </button>
                        </div>
                    </div>

                    <!-- Video 3.2 -->
                    <div class="video-card">
                        <div class="video-header">
                            <div class="video-number">3.2</div>
                            <div class="video-title">Observabilidad con Superpoderes (IA y Unknown Unknowns)</div>
                            <div class="video-actions">
                                <button class="toggle-player" onclick="toggleVideo('video3.2')">
                                    <i class="fas fa-video"></i> Mostrar/Ocultar
                                </button>
                            </div>
                        </div>

                        <!-- REPRODUCTOR DE VIDEO 3.2 -->
                        <div class="video-player collapsed" id="player-video3.2">
                            <!-- REEMPLAZA EL SRC CON TU VIDEO REAL -->
                            <video controls
                                poster="https://images.unsplash.com/photo-1620712943543-bcc4688e7485?q=80&w=1000">
                                <source
                                    src="https://commondatastorage.googleapis.com/gtv-videos-bucket/sample/ForBiggerJoyrides.mp4"
                                    type="video/mp4">
                                Tu navegador no soporta el elemento de video.
                            </video>
                        </div>

                        <div class="video-content">
                            <div class="video-column">
                                <div class="column-title">
                                    <i class="fas fa-info-circle content-icon"></i> CONTENIDO
                                </div>
                                <div class="column-content">
                                    La observabilidad (logs, métricas, trazas) te da los datos. La IA te da las
                                    respuestas.
                                </div>
                            </div>

                            <div class="video-column">
                                <div class="column-title">
                                    <i class="fas fa-lightbulb analogy-icon"></i> ANALOGÍA / ESCENARIO
                                </div>
                                <div class="column-content">
                                    Tu coche hace un ruido raro. El mecánico (tú) revisa el motor, las llantas, etc.
                                    (observabilidad). La IA es el escáner de diagnóstico avanzado que escucha el ruido y
                                    te dice: "El problema no es el motor, es el rodamiento trasero izquierdo y fallará
                                    en 80 km" (predicción).
                                </div>
                            </div>
                        </div>

                        <div class="video-footer">
                            <div class="function-badge">
                                <i class="fas fa-chart-line function-icon"></i> Encontrar problemas desconocidos y
                                mantenimiento predictivo
                            </div>
                            <button class="play-button" onclick="playVideo('video3.2')">
                                <i class="fas fa-play"></i> Reproducir Video 3.2
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>







    </div>

    <!-- Footer -->
    @include('layouts.includes.intra.footerb')
@endsection
@push('js')
    <!-- Include the Js Videos -->
    <script src="{{ asset('/assets/scripts/mostrarvideos.js') }}"></script>
@endpush
