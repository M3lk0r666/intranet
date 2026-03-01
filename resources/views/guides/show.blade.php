{{-- resources/views/guides/show.blade.php --}}
@extends('layouts.publicguide')

@section('title', $guide->title . ' - Guía Técnica')

@push('styles')
    <style>
        /* Estilos del diseño original del backend */
        :root {
            --primary-color: #FF6600;
            --secondary-color: #000000;
            --background-color: #FFFFFF;
            --light-gray: #F5F5F5;
            --medium-gray: #DDDDDD;
            --dark-gray: #333333;
            --text-color: #222222;
            --success-color: #4CAF50;
            --info-color: #17a2b8;
            --warning-color: #ffc107;
        }

        .guide-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }

        /* Header de la guía (igual que backend) */
        .guide-header {
            background-color: var(--secondary-color);
            color: white;
            padding: 20px 0;
            border-bottom: 5px solid var(--primary-color);
        }

        .guide-header-content {
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 20px;
        }

        .guide-logo {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .guide-logo-icon {
            background-color: var(--primary-color);
            color: white;
            width: 60px;
            height: 60px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 28px;
        }

        .guide-logo-text h1 {
            font-size: 28px;
            font-weight: 700;
            margin: 0;
        }

        .guide-logo-text p {
            color: var(--medium-gray);
            font-size: 14px;
            margin: 0;
        }

        /* Navegación de secciones */
        .guide-navigation {
            background-color: var(--light-gray);
            padding: 15px 0;
            margin-bottom: 30px;
            border-bottom: 1px solid var(--medium-gray);
        }

        .nav-container {
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
            gap: 5px;
        }

        .nav-item {
            background-color: white;
            color: var(--text-color);
            padding: 12px 25px;
            border-radius: 5px;
            cursor: pointer;
            font-weight: 600;
            transition: all 0.3s ease;
            border: 1px solid var(--medium-gray);
            text-align: center;
        }

        .nav-item:hover,
        .nav-item.active {
            background-color: var(--primary-color);
            color: white;
            border-color: var(--primary-color);
        }

        /* Título principal */
        .main-title {
            text-align: center;
            margin-bottom: 40px;
            color: var(--secondary-color);
            position: relative;
            padding-bottom: 15px;
        }

        .main-title:after {
            content: "";
            position: absolute;
            bottom: 0;
            left: 50%;
            transform: translateX(-50%);
            width: 100px;
            height: 4px;
            background-color: var(--primary-color);
        }

        /* Container de pasos */
        .steps-container {
            display: flex;
            flex-direction: column;
            gap: 30px;
            margin-bottom: 50px;
        }

        /* Tarjetas de paso */
        .step-card {
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
            overflow: hidden;
            border-left: 5px solid var(--primary-color);
            transition: transform 0.3s ease;
        }

        .step-card:hover {
            transform: translateY(-5px);
        }

        .step-header {
            background-color: var(--light-gray);
            padding: 20px;
            display: flex;
            align-items: center;
            gap: 15px;
            border-bottom: 1px solid var(--medium-gray);
        }

        .step-number {
            background-color: var(--primary-color);
            color: white;
            width: 40px;
            height: 40px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
            font-size: 18px;
        }

        .step-title {
            font-size: 22px;
            font-weight: 700;
            color: var(--secondary-color);
        }

        .step-content {
            padding: 25px;
        }

        .step-section {
            margin-bottom: 25px;
        }

        .step-section-title {
            font-size: 18px;
            font-weight: 600;
            color: var(--secondary-color);
            margin-bottom: 15px;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        /* Listas */
        .step-list {
            list-style-type: none;
            padding-left: 0;
        }

        .step-list li {
            margin-bottom: 12px;
            padding-left: 25px;
            position: relative;
        }

        .step-list li:before {
            content: "✓";
            position: absolute;
            left: 0;
            color: var(--success-color);
            font-weight: bold;
        }

        /* Comandos */
        .command-list {
            list-style-type: none;
            background-color: var(--light-gray);
            border-radius: 5px;
            padding: 15px;
            margin-top: 10px;
        }

        .command-list li {
            margin-bottom: 8px;
            padding-left: 20px;
            position: relative;
            font-family: 'Courier New', monospace;
        }

        .command-list li:before {
            content: "•";
            position: absolute;
            left: 5px;
            color: var(--primary-color);
            font-weight: bold;
        }

        /* Notas */
        .note-box {
            background-color: rgba(255, 102, 0, 0.1);
            border-left: 4px solid var(--primary-color);
            padding: 15px;
            margin-top: 15px;
            border-radius: 0 5px 5px 0;
        }

        .note-box strong {
            color: var(--primary-color);
        }

        /* Subpasos */
        .substep {
            margin-left: 20px;
            margin-top: 10px;
            color: var(--dark-gray);
        }

        /* Footer */
        .guide-footer {
            background-color: var(--secondary-color);
            color: white;
            padding: 30px 0;
            margin-top: 50px;
            border-top: 5px solid var(--primary-color);
        }

        .footer-content {
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
        }

        .footer-logo {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .footer-logo i {
            color: var(--primary-color);
            font-size: 24px;
        }

        .copyright {
            color: var(--medium-gray);
            font-size: 14px;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .guide-header-content {
                flex-direction: column;
                text-align: center;
                gap: 20px;
            }

            .nav-container {
                flex-direction: column;
                gap: 10px;
            }

            .footer-content {
                flex-direction: column;
                gap: 20px;
                text-align: center;
            }

            .step-header {
                flex-direction: column;
                text-align: center;
                gap: 10px;
            }
        }
    </style>
@endpush

@section('content')
    <div class="guide-container">
        <!-- Header de la guía -->
        <header class="guide-header">
            <div class="guide-header-content">
                <div class="guide-logo">
                    <div class="guide-logo-icon">
                        <i class="fas fa-network-wired"></i>
                    </div>
                    <div class="guide-logo-text">
                        <h1>{{ $guide->title }}</h1>
                        <p>
                            @if ($guide->description)
                                {{ $guide->description }}
                            @else
                                Guía paso a paso para la implementación y configuración
                            @endif
                        </p>
                    </div>
                </div>
            </div>
        </header>

        <!-- Navegación de secciones -->
        <nav class="guide-navigation">
            <div class="nav-container">
                @foreach ($guide->sections as $section)
                    <div class="nav-item {{ $loop->first ? 'active' : '' }}" data-target="section-{{ $section->id }}">
                        {{ $section->title }}
                    </div>
                @endforeach
            </div>
        </nav>

        <!-- Contenido principal -->
        <main>
            <h2 class="main-title">Guía Completa de Implementación</h2>

            <div class="steps-container">
                @foreach ($guide->sections as $section)
                    <div class="step-card" id="section-{{ $section->id }}"
                        style="{{ !$loop->first ? 'display: none;' : '' }}">
                        <div class="step-header">
                            <div class="step-number">{{ $loop->iteration }}</div>
                            <h3 class="step-title">{{ $section->title }}</h3>
                        </div>
                        <div class="step-content">
                            @foreach ($section->steps as $step)
                                <div class="step-section">
                                    @if ($step->title)
                                        <h4 class="step-section-title">
                                            @if ($section->icon)
                                                <i class="fas fa-{{ $section->icon }}"></i>
                                            @endif
                                            {{ $step->title }}
                                        </h4>
                                    @endif

                                    @switch($step->content_type)
                                        @case('text')
                                            <div class="step-content-text">
                                                {!! nl2br(e($step->content)) !!}
                                            </div>
                                        @break

                                        @case('list')
                                            @if ($step->items)
                                                <ul class="step-list">
                                                    @foreach (json_decode($step->items, true) as $item)
                                                        <li>{{ $item }}</li>
                                                    @endforeach
                                                </ul>
                                            @endif
                                        @break

                                        @case('commands')
                                            @if ($step->items)
                                                <ul class="command-list">
                                                    @foreach (json_decode($step->items, true) as $item)
                                                        <li>{{ $item }}</li>
                                                    @endforeach
                                                </ul>
                                            @endif
                                        @break

                                        @case('note')
                                            <div class="note-box">
                                                <strong>Nota:</strong> {{ $step->content }}
                                            </div>
                                        @break
                                    @endswitch
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Panel de acciones -->
            <div class="card mb-4">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4 mb-3 mb-md-0">
                            <a href="{{ route('intranet.guias.download', $guide->slug) }}" class="btn btn-primary w-100">
                                <i class="fas fa-download me-2"></i> Descargar Guía
                            </a>
                        </div>
                        <div class="col-md-4 mb-3 mb-md-0">
                            <button class="btn btn-success w-100" onclick="window.print()">
                                <i class="fas fa-print me-2"></i> Imprimir
                            </button>
                        </div>
                        <div class="col-md-4">
                            <button class="btn btn-info w-100" onclick="shareGuide()">
                                <i class="fas fa-share-alt me-2"></i> Compartir
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Información de la guía -->
            <div class="card">
                <div class="card-header bg-dark text-white">
                    <h5 class="mb-0"><i class="fas fa-info-circle me-2"></i> Información de la Guía</h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <dl class="row">
                                <dt class="col-sm-4">Creada:</dt>
                                <dd class="col-sm-8">{{ $guide->created_at->format('d/m/Y H:i') }}</dd>

                                <dt class="col-sm-4">Actualizada:</dt>
                                <dd class="col-sm-8">{{ $guide->updated_at->format('d/m/Y H:i') }}</dd>
                            </dl>
                        </div>
                        <div class="col-md-6">
                            <dl class="row">
                                <dt class="col-sm-4">Secciones:</dt>
                                <dd class="col-sm-8">{{ $guide->sections->count() }}</dd>

                                <dt class="col-sm-4">Pasos totales:</dt>
                                <dd class="col-sm-8">
                                    {{ $guide->sections->sum(function ($section) {return $section->steps->count();}) }}
                                </dd>
                            </dl>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>

    <!-- Footer de la guía -->
    <footer class="guide-footer">
        <div class="guide-container">
            <div class="footer-content">
                <div class="footer-logo">
                    <i class="fas fa-network-wired"></i>
                    <span>Guía de Implementación de Switches</span>
                </div>
                <div class="copyright">
                    &copy; {{ date('Y') }} - Todos los derechos reservados
                </div>
            </div>
        </div>
    </footer>
@endsection

@push('scripts')
    <script>
        // Navegación entre secciones (igual que en backend)
        document.addEventListener('DOMContentLoaded', function() {
            const navItems = document.querySelectorAll('.nav-item');
            const stepCards = document.querySelectorAll('.step-card');

            navItems.forEach(item => {
                item.addEventListener('click', function() {
                    // Remove active class from all nav items
                    navItems.forEach(nav => nav.classList.remove('active'));

                    // Add active class to clicked nav item
                    this.classList.add('active');

                    // Get target section id
                    const targetId = this.getAttribute('data-target');

                    // Hide all step cards
                    stepCards.forEach(card => {
                        card.style.display = 'none';
                    });

                    // Show target step card
                    document.getElementById(targetId).style.display = 'block';

                    // Scroll to the top of the content
                    window.scrollTo({
                        top: document.querySelector('.guide-navigation').offsetTop,
                        behavior: 'smooth'
                    });
                });
            });

            // Función para compartir la guía
            window.shareGuide = function() {
                const url = window.location.href;
                const title = document.title;

                if (navigator.share) {
                    navigator.share({
                        title: title,
                        text: 'Mira esta guía técnica: ' + title,
                        url: url
                    });
                } else {
                    // Fallback: copiar al portapapeles
                    navigator.clipboard.writeText(url).then(() => {
                        alert('Enlace copiado al portapapeles:\n' + url);
                    });
                }
            };

            // Copiar comandos al portapapeles
            document.querySelectorAll('.command-list li').forEach(item => {
                item.style.cursor = 'pointer';
                item.addEventListener('click', function() {
                    const text = this.textContent;
                    navigator.clipboard.writeText(text).then(() => {
                        const originalText = this.innerHTML;
                        this.innerHTML = '<i class="fas fa-check text-success"></i> ' +
                            text;
                        this.style.color = '#28a745';

                        setTimeout(() => {
                            this.innerHTML = originalText;
                            this.style.color = '';
                        }, 2000);
                    });
                });
            });
        });
    </script>
@endpush
