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
                    <li>
                        <div class="flex items-center">
                            <i class="fas fa-chevron-right text-gray-400 mx-2"></i>
                            <a href="{{ route('estructurainterna.ingenieria') }}"
                                class="ml-1 text-sm text-gray-600 hover:text-orange-600 md:ml-2">Ingenieria
                            </a>
                        </div>
                    </li>
                    <li>
                        <div class="flex items-center">
                            <i class="fas fa-chevron-right text-gray-400 mx-2"></i>
                            <a href="{{ route('ingenieria.guias-on-site') }}"
                                class="ml-1 text-sm text-gray-600 hover:text-orange-600 md:ml-2">Guias on Site
                            </a>
                        </div>
                    </li>
                    <li aria-current="page">
                        <div class="flex items-center">
                            <i class="fas fa-chevron-right text-gray-400 mx-2"></i>
                            <span class="ml-1 text-sm text-primary font-medium md:ml-2">Site Survey</span>
                        </div>
                    </li>
                </ol>
            </nav>
        </div>
    </div>

    <!-- Encabezado -->
    <div class="text-center mb-16 mt-8">
        <h1 class="text-4xl font-black font-display tracking-tight text-slate-900 uppercase">
            Guia<span class="text-primary  uppercase"> Site Survey</span>
        </h1>
    </div>

    <div class="bg-white rounded-2xl border border-slate-200 p-5 mb-8">
        <div class="flex flex-col lg:flex-row gap-8">
            <aside class="lg:w-64 flex-shrink-0">
                <div class="sticky top-24 space-y-6" id="chapter-aside">
                    <div>
                        <h3 class="text-xs font-bold uppercase tracking-wider text-slate-400 mb-4 px-2">
                            Capítulos de la Guía
                        </h3>

                        <div class="space-y-1">
                            <a href="#previas" data-section="previas"
                                class="chapter-link flex items-center gap-3 px-3 py-2 rounded-lg transition-colors">
                                <i class="las la-tasks"></i>
                                Previas
                            </a>

                            <a href="#cambio" data-section="cambio"
                                class="chapter-link flex items-center gap-3 px-3 py-2 rounded-lg transition-colors">
                                <i class="lab la-stack-exchange"></i>
                                El Cambio
                            </a>

                            <a href="#verificacion" data-section="verificacion"
                                class="chapter-link flex items-center gap-3 px-3 py-2 rounded-lg transition-colors">
                                <i class="las la-list-alt"></i>
                                Verificación
                            </a>

                            <a href="#finales" data-section="finales"
                                class="chapter-link flex items-center gap-3 px-3 py-2 rounded-lg transition-colors">
                                <i class="las la-check-circle"></i>
                                Finales
                            </a>

                            <a href="#retorno" data-section="retorno"
                                class="chapter-link flex items-center gap-3 px-3 py-2 rounded-lg transition-colors">
                                <i class="las la-history"></i>
                                Rollback
                            </a>
                        </div>
                    </div>

                    <!-- Bloque extra intacto -->
                    <div class="bg-white border border-slate-200 rounded-xl p-5">
                        <p class="text-xs font-semibold text-slate-500 uppercase tracking-wide mb-4">
                            Descargar Recursos
                        </p>
                        <div class="space-y-2">
                            {{-- <a href="{{ route('ingenieria.instalacion-switch-pdf') }}"
                                class="group flex items-center justify-between w-full px-3 py-2 rounded-lg text-sm font-medium  text-slate-600 bg-slate-50  hover:bg-orange-50 hover:text-orange-600 transition-colors duration-300">
                                <span>Exportar a PDF</span>
                                <i
                                    class="las la-arrow-right text-slate-300 group-hover:text-orange-500 group-hover:translate-x-1 transition-all duration-300"></i>
                            </a> --}}
                            <a href="{{ route('ingenieria.site-survey-pdf') }}"
                            class="group flex items-center justify-between w-full px-3 py-2 rounded-lg text-sm font-medium text-slate-600 bg-slate-50 hover:bg-orange-50 hover:text-orange-600 transition">
                                <span>Exportar PDF</span>
                                <i class="las la-file-pdf text-slate-300 group-hover:text-orange-500"></i>
                            </a>

                            <a href="{{ route('ingenieria.guias-on-site') }}"
                                class="group flex flex-row-reverse items-center justify-between w-full px-4 py-2 rounded-lg text-sm font-medium text-slate-600 bg-slate-50 hover:bg-orange-50 hover:text-orange-600 transition-colors duration-300">
                                <span>Regresar</span>
                                <i
                                    class="las la-arrow-left text-slate-300 group-hover:text-orange-500 group-hover:-translate-x-1 transition-all duration-300"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </aside>
            <article class="flex-grow max-w-4xl lg:max-w-6xl space-y-8">
                <div>
                    <span
                        class="inline-flex items-center px-3 py-1 rounded-full bg-orange-100 text-primary text-xs font-bold mb-4">
                        GUÍA DE IMPLEMENTACIÓN v1.0
                    </span>
                    <h1 class="text-4xl font-extrabold text-slate-900 mb-4">Realizar estudio de Red Inalambrica</h1>
                    <p class="text-lg text-slate-600 leading-relaxed">
                        Guía detallada para el proceso de realización del estudio <span
                            class="text-orange-500 font-bold uppercase">Site Survey</span> para el analizar el
                        comportamiento de la red inalambrica, asegurando el
                        cumplimiento de estándares corporativos.
                    </p>
                </div>
                <section class="scroll-mt-32">
                    <div class="flex items-center gap-4 mb-6">
                        <div class="w-10 h-10 rounded-xl bg-red-50 flex items-center justify-center text-red-600">
                            <i class="las la-exclamation-triangle"></i>
                        </div>
                        <h2 class="text-2xl font-bold text-slate-900">Consideración <span
                                class="text-red-500  uppercase">Importante</span>
                        </h2>
                    </div>
                    <div class="bg-white rounded-2xl border border-red-100 p-8 shadow-sm">
                        <div class="bg-red-50 border-l-4 border-red-500 p-4 rounded-r-xl mb-3">
                            <h4 class="text-sm font-bold text-red-800 flex items-center gap-2 mb-1">
                                <i class="las la-info-circle"></i> Mapa arquitectonico
                            </h4>
                            <p class="text-sm text-orange-700">Es indispensable contar o tener el plano arquitectónico del
                                área donde se realizará el estudio, ya que este es el pilar para un buen diseño, ya que con
                                el uso de la herramienta Ekahau se podrá escalar/dimensionar el área y así poder tener una
                                propagación más real de la señal en base a la distancia.</p>
                        </div>
                        <div class="bg-orange-50 border-l-4 border-orange-500 p-4 rounded-r-xl mb-3">
                            <h4 class="text-sm font-bold text-orange-800 flex items-center gap-2 mb-1">
                                <i class="las la-info-circle"></i> Cuestionario Site Survey
                            </h4>
                            <p class="text-sm text-orange-700">
                                Tomar como base el Cuestionario para el Site Survey, para una mejor ejecución en la
                                implementación
                            </p>
                            <!-- Contenedor de botones -->
                            <div class="mt-3 flex gap-2">
                                <a href="{{ route('ingenieria.sitesurvey-si') }}" target="_black"
                                    class="bg-orange-500 text-white px-4 py-2 rounded hover:bg-orange-600 transition">
                                    Si cuenta con Wifi
                                </a>
                                <a href="{{ route('ingenieria.sitesurvey-no') }}" target="_black"
                                    class="bg-white border border-orange-500 text-orange-500 px-4 py-2 rounded hover:bg-orange-100 transition">
                                    No cuenta con Wifi
                                </a>
                            </div>
                        </div>
                    </div>
                </section>

                <section class="scroll-mt-32" id="previas">
                    <div class="flex items-center gap-4 mb-6">
                        <div class="w-10 h-10 rounded-xl bg-primary/10 flex items-center justify-center text-primary">
                            <i class="las la-brain"></i>
                        </div>
                        <h2 class="text-2xl font-bold text-slate-900">1. Actividades Previas</h2>
                    </div>

                    <div class="bg-white rounded-2xl border border-slate-200 p-8 shadow-sm">

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                            <div class="bg-slate-50 p-5 rounded-xl border">
                                <h4 class="font-bold mb-3">Información del Proyecto</h4>
                                <ul class="space-y-2 text-sm">
                                    <li>Objetivo del Site Survey</li>
                                    <li>Problemas actuales</li>
                                    <li>Aplicaciones críticas</li>
                                    <li>Tipo de cobertura requerida</li>
                                </ul>
                            </div>

                            <div class="bg-slate-50 p-5 rounded-xl border">
                                <h4 class="font-bold mb-3">Usuarios y Dispositivos</h4>
                                <ul class="space-y-2 text-sm">
                                    <li>Usuarios concurrentes</li>
                                    <li>Dispositivos conectados</li>
                                    <li>Tipos de dispositivos</li>
                                    <li>Dispositivo más limitado</li>
                                </ul>
                            </div>

                        </div>

                    </div>
                </section>

                <section class="scroll-mt-32" id="cambio">
                    <div class="flex items-center gap-4 mb-6">
                        <div class="w-10 h-10 rounded-xl bg-primary/10 flex items-center justify-center text-primary">
                            <i class="las la-tools"></i>
                        </div>
                        <h2 class="text-2xl font-bold text-slate-900">2. Preparación del Equipamiento</h2>
                    </div>

                    <div class="bg-white rounded-2xl border border-slate-200 p-8 shadow-sm">

                        <ul class="space-y-3 text-sm">
                            <li class="flex items-center gap-3"><i class="las la-check-circle text-emerald-500"></i> AP de
                                prueba configurado</li>
                            <li class="flex items-center gap-3"><i class="las la-check-circle text-emerald-500"></i>
                                Ekahau listo</li>
                            <li class="flex items-center gap-3"><i class="las la-check-circle text-emerald-500"></i>
                                Tablet / Laptop cargada</li>
                            <li class="flex items-center gap-3"><i class="las la-check-circle text-emerald-500"></i>
                                Baterías al 100%</li>
                            <li class="flex items-center gap-3"><i class="las la-check-circle text-emerald-500"></i>
                                Herramientas de medición</li>
                        </ul>

                    </div>
                </section>

                <section class="scroll-mt-32" id="verificacion">
                    <div class="flex items-center gap-4 mb-6">
                        <div class="w-10 h-10 rounded-xl bg-primary/10 flex items-center justify-center text-primary">
                            <i class="las la-wifi"></i>
                        </div>
                        <h2 class="text-2xl font-bold text-slate-900">3. Ejecución del Site Survey</h2>
                    </div>

                    <div class="bg-white rounded-2xl border border-slate-200 p-8 shadow-sm">

                        <div class="grid md:grid-cols-3 gap-6 mb-6">

                            <div class="p-4 bg-slate-50 rounded-xl border">
                                <h4 class="font-bold text-slate-900">Inicio</h4>
                                <p class="text-xs text-slate-500">Validación con cliente y acceso a áreas</p>
                            </div>

                            <div class="p-4 bg-slate-50 rounded-xl border">
                                <h4 class="font-bold text-slate-900">Recorrido</h4>
                                <p class="text-xs text-slate-500">Medición de señal (RSSI / SNR)</p>
                            </div>

                            <div class="p-4 bg-slate-50 rounded-xl border">
                                <h4 class="font-bold text-slate-900">Interferencias</h4>
                                <p class="text-xs text-slate-500">Detección de ruido y redes externas</p>
                            </div>

                        </div>

                        <div class="bg-orange-50 border-l-4 border-orange-500 p-4 rounded-r-xl">
                            <h4 class="text-sm font-bold text-orange-800 flex items-center gap-2">
                                <i class="las la-info-circle"></i> Toma de Datos
                            </h4>
                            <p class="text-sm text-orange-700">
                                Registrar RSSI, SNR, ruido e interferencias durante el recorrido.
                            </p>
                        </div>

                    </div>
                </section>

                <section class="scroll-mt-32" id="finales">
                    <div class="flex items-center gap-4 mb-6">
                        <div class="w-10 h-10 rounded-xl bg-primary/10 flex items-center justify-center text-primary">
                            <i class="las la-chart-bar"></i>
                        </div>
                        <h2 class="text-2xl font-bold text-slate-900">4. Análisis y Validación</h2>
                    </div>

                    <div class="bg-white rounded-2xl border border-slate-200 p-8 shadow-sm space-y-4">

                        <div class="flex justify-between bg-slate-50 p-4 rounded-xl">
                            <span class="font-semibold">RSSI ≥ -65 dBm</span>
                            <span class="bg-emerald-100 text-emerald-700 text-xs px-2 py-1 rounded">REQUERIDO</span>
                        </div>

                        <div class="flex justify-between bg-slate-50 p-4 rounded-xl">
                            <span class="font-semibold">SNR ≥ 25 dB</span>
                            <span class="bg-emerald-100 text-emerald-700 text-xs px-2 py-1 rounded">REQUERIDO</span>
                        </div>

                    </div>
                </section>

                <section class="scroll-mt-32" id="retorno">
                    <div class="flex items-center gap-4 mb-6">
                        <div class="w-10 h-10 rounded-xl bg-red-50 flex items-center justify-center text-red-600">
                            <i class="las la-history"></i>
                        </div>
                        <h2 class="text-2xl font-bold text-slate-900">5. Plan de Retorno (Rollback)</h2>
                    </div>

                    <div class="bg-white rounded-2xl border border-red-100 p-8 shadow-sm space-y-4">

                        <div class="flex gap-3">
                            <span class="font-bold text-red-600">1</span>
                            <p class="text-sm text-slate-600">Retiro de equipos temporales</p>
                        </div>

                        <div class="flex gap-3">
                            <span class="font-bold text-red-600">2</span>
                            <p class="text-sm text-slate-600">Restaurar configuración original</p>
                        </div>

                        <div class="flex gap-3">
                            <span class="font-bold text-red-600">3</span>
                            <p class="text-sm text-slate-600">Validar red original</p>
                        </div>

                    </div>
                </section>


















            </article>
        </div>
    </div>


@endsection
@push('js')
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const links = document.querySelectorAll('.chapter-link')
            const sections = Array.from(links).map(link =>
                document.getElementById(link.dataset.section)
            )

            function setActive(id) {
                links.forEach(link => {
                    link.classList.toggle(
                        'active',
                        link.dataset.section === id
                    )
                })
            }

            function onScroll() {
                const scrollPos = window.scrollY + 200
                let currentSection = sections[0]?.id

                sections.forEach(section => {
                    if (!section) return
                    if (section.offsetTop <= scrollPos) {
                        currentSection = section.id
                    }
                })

                setActive(currentSection)
            }

            // Click → activa inmediatamente
            links.forEach(link => {
                link.addEventListener('click', () => {
                    setActive(link.dataset.section)
                })
            })
            window.addEventListener('scroll', onScroll)
            onScroll()
        })
    </script>
@endpush
