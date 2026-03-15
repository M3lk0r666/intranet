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
                            <a href="{{ route('intranet.estructurainterna.ingenieria') }}"
                                class="ml-1 text-sm text-gray-600 hover:text-orange-600 md:ml-2">Ingenieria
                            </a>
                        </div>
                    </li>
                    <li>
                        <div class="flex items-center">
                            <i class="fas fa-chevron-right text-gray-400 mx-2"></i>
                            <a href="{{ route('intranet.ingenieria.guias-on-site') }}"
                                class="ml-1 text-sm text-gray-600 hover:text-orange-600 md:ml-2">Guias on Site
                            </a>
                        </div>
                    </li>
                    <li aria-current="page">
                        <div class="flex items-center">
                            <i class="fas fa-chevron-right text-gray-400 mx-2"></i>
                            <span class="ml-1 text-sm text-primary font-medium md:ml-2">Prueba de Concepto</span>
                        </div>
                    </li>
                </ol>
            </nav>
        </div>
    </div>

    <!-- Encabezado -->
    <div class="text-center mb-16 mt-8">
        <h1 class="text-4xl font-black font-display tracking-tight text-slate-900 uppercase">
            Guia<span class="text-primary  uppercase"> Implementación PoC</span>
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

                            <a href="#plan" data-section="plan"
                                class="chapter-link flex items-center gap-3 px-3 py-2 rounded-lg transition-colors">
                                <i class="lab la-stack-exchange"></i>
                                Diseño
                            </a>

                            <a href="#ejecucion" data-section="ejecucion"
                                class="chapter-link flex items-center gap-3 px-3 py-2 rounded-lg transition-colors">
                                <i class="las la-list-alt"></i>
                                Ejecución
                            </a>

                            <a href="#evaluacion" data-section="evaluacion"
                                class="chapter-link flex items-center gap-3 px-3 py-2 rounded-lg transition-colors">
                                <i class="las la-check-circle"></i>
                                Evaluación
                            </a>

                            <a href="#retorno" data-section="retorno"
                                class="chapter-link flex items-center gap-3 px-3 py-2 rounded-lg transition-colors">
                                <i class="las la-history"></i>
                                Recomendaciones
                            </a>
                        </div>
                    </div>

                    <!-- Bloque extra intacto -->
                    <div class="bg-white border border-slate-200 rounded-xl p-5">
                        <p class="text-xs font-semibold text-slate-500 uppercase tracking-wide mb-4">
                            Descargar Recursos
                        </p>
                        <div class="space-y-2">
                            <a href="#"
                                class="group flex items-center justify-between w-full px-3 py-2 rounded-lg text-sm font-medium  text-slate-600 bg-slate-50  hover:bg-orange-50 hover:text-orange-600 transition-colors duration-300">
                                <span>Esta Guía</span>
                                <i
                                    class="las la-arrow-right text-slate-300 group-hover:text-orange-500 group-hover:translate-x-1 transition-all duration-300"></i>
                            </a>

                            <a href="#"
                                class="group flex items-center justify-between w-full px-3 py-2 rounded-lg text-sm font-medium text-slate-600 bg-slate-50 hover:bg-orange-50 hover:text-orange-600 transition-colors duration-300">
                                <span>Reporte Actividades</span>
                                <i
                                    class="las la-arrow-right text-slate-300 group-hover:text-orange-500 group-hover:translate-x-1 transition-all duration-300"></i>
                            </a>
                            <a href="{{ route('intranet.ingenieria.guias-on-site') }}"
                                class="group flex flex-row-reverse items-center justify-between w-full px-4 py-2 rounded-lg text-sm font-medium text-slate-600 bg-slate-50 hover:bg-orange-50 hover:text-orange-600 transition-colors duration-300">
                                <span>Regresar</span>
                                <i
                                    class="las la-arrow-left text-slate-300 group-hover:text-orange-500 group-hover:-translate-x-1 transition-all duration-300"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </aside>
            <article class="flex-grow max-w-4xl lg:max-w-6xl space-y-10">
                <div>
                    <span
                        class="inline-flex items-center px-3 py-1 rounded-full bg-orange-100 text-primary text-xs font-bold mb-4">
                        GUÍA DE IMPLEMENTACIÓN v1.0
                    </span>
                    <h1 class="text-4xl font-extrabold text-slate-900 mb-4">Implementación de PoC
                    </h1>
                    <p class="text-lg text-slate-600 leading-relaxed">
                        Guía de buenas practicas para la instalación para Pruebas de Concepto, asegurando el
                        cumplimiento de estándares corporativos.
                    </p>
                </div>
                {{-- <section class="scroll-mt-32" id="previas">
                    <div class="flex items-center gap-4 mb-6">
                        <div class="w-10 h-10 rounded-xl bg-primary/10 flex items-center justify-center text-primary">
                            <i class="las la-brain"></i>
                        </div>
                        <h2 class="text-2xl font-bold text-slate-900">1. Actividades Previas (Planificación)</h2>
                    </div>
                    <div class="bg-white rounded-2xl border border-slate-200 p-8 shadow-sm">
                        <ol class="lista">
                            <li class="text-sm font-bold uppercase text-slate-400 tracking-wider">Objetivo Claro</li>
                            <ul class="space-y-3 py-6">
                                <li class="flex items-center gap-3 text-slate-800 text-sm">
                                    <i class="las la-check-circle text-emerald-500 text-xl"></i>
                                    ¿Que problema se requiere resolver?.
                                </li>
                                <li class="flex items-center gap-3 text-slate-800 text-sm">
                                    <i class="las la-check-circle text-emerald-500 text-xl"></i>
                                    ¿Que hipotesis se quiere validar?.
                                </li>
                                <li class="flex items-center gap-3 text-slate-800 text-sm">
                                    <i class="las la-check-circle text-emerald-500 text-xl"></i>
                                    Qué resultado demostraría que la solución es viable.
                                </li>
                            </ul>
                            <li class="text-sm font-bold uppercase text-slate-400 tracking-wider">Alcance</li>
                            <ul class="space-y-3 py-6">
                                <li class="flex items-center gap-3 text-slate-800 text-sm">
                                    <i class="las la-check-circle text-emerald-500 text-xl"></i>
                                    Qué Si incluye la PoC.
                                </li>
                                <li class="flex items-center gap-3 text-slate-800 text-sm">
                                    <i class="las la-check-circle text-emerald-500 text-xl"></i>
                                    Qué No se probará todavía.
                                </li>
                                <div
                                    class="ml-8 flex items-start gap-2 text-xm text-amber-800 bg-amber-50 px-4 py-3 rounded-lg">
                                    <i class="las la-exclamation-triangle text-amber-500 mt-0.5"></i>
                                    <span>
                                        Esto evita que la PoC se convierta en un proyecto completo.
                                    </span>
                                </div>
                            </ul>
                            <li class="text-sm font-bold uppercase text-slate-400 tracking-wider">Criterios de éxito</li>
                            <ul class="space-y-3 py-6">
                                <li class="flex items-center gap-3 text-slate-800 text-sm">
                                    <i class="las la-check-circle text-emerald-500 text-xl"></i>
                                    Definir métricas medibles.
                                </li>
                            </ul>
                            <li class="text-sm font-bold uppercase text-slate-400 tracking-wider">Recursos necesarios
                            </li>
                            <ul class="space-y-3 py-6">
                                <li class="flex items-center gap-3 text-slate-800 text-sm">
                                    <i class="las la-check-circle text-emerald-500 text-xl"></i>
                                    Equipo técnico.
                                </li>
                                <li class="flex items-center gap-3 text-slate-800 text-sm">
                                    <i class="las la-check-circle text-emerald-500 text-xl"></i>
                                    Herramientas.
                                </li>
                                <li class="flex items-center gap-3 text-slate-800 text-sm">
                                    <i class="las la-check-circle text-emerald-500 text-xl"></i>
                                    Infraestructura.
                                </li>
                                <li class="flex items-center gap-3 text-slate-800 text-sm">
                                    <i class="las la-check-circle text-emerald-500 text-xl"></i>
                                    Tiempo estimado.
                                </li>
                            </ul>
                            <li class="text-sm font-bold uppercase text-slate-400 tracking-wider">Considerar Arquitectura
                                preliminar
                            </li>
                            <ul class="space-y-3 py-6">
                                <li class="flex items-center gap-3 text-slate-800 text-sm">
                                    <i class="las la-check-circle text-emerald-500 text-xl"></i>
                                    Tecnologías.
                                </li>
                                <li class="flex items-center gap-3 text-slate-800 text-sm">
                                    <i class="las la-check-circle text-emerald-500 text-xl"></i>
                                    Integración con sistemas existenes.
                                </li>
                                <li class="flex items-center gap-3 text-slate-800 text-sm">
                                    <i class="las la-check-circle text-emerald-500 text-xl"></i>
                                    Limitaciones técnicas.
                                </li>
                            </ul>
                            <li class="text-sm font-bold uppercase text-slate-400 tracking-wider">Identificación de riesgos
                            </li>
                            <ul class="space-y-3 py-6">
                                <li class="flex items-center gap-3 text-slate-800 text-sm">
                                    <i class="las la-check-circle text-emerald-500 text-xl"></i>
                                    Incompatibilidad técnologica.
                                </li>
                                <li class="flex items-center gap-3 text-slate-800 text-sm">
                                    <i class="las la-check-circle text-emerald-500 text-xl"></i>
                                    Costos de infraestructura.
                                </li>
                                <li class="flex items-center gap-3 text-slate-800 text-sm">
                                    <i class="las la-check-circle text-emerald-500 text-xl"></i>
                                    Limitacioens de seguridad.
                                </li>
                            </ul>
                        </ol>
                    </div>
                </section> --}}
                <section class="scroll-mt-32" id="previas">
                    <div class="flex items-center gap-4 mb-6">
                        <div class="w-10 h-10 rounded-xl bg-primary/10 flex items-center justify-center text-primary">
                            <i class="las la-brain"></i>
                        </div>
                        <h2 class="text-2xl font-bold text-slate-900">1. Actividades Previas (Planificación)</h2>
                    </div>

                    <div class="bg-white rounded-2xl border border-slate-200 p-8 shadow-sm">

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">

                            <!-- Objetivo -->
                            <div>
                                <h3 class="text-sm font-bold uppercase text-slate-400 tracking-wider mb-4">
                                    Objetivo Claro
                                </h3>

                                <ul class="space-y-3">
                                    <li class="flex items-center gap-3 text-slate-800 text-sm">
                                        <i class="las la-check-circle text-emerald-500 text-xl"></i>
                                        ¿Qué problema se requiere resolver?
                                    </li>
                                    <li class="flex items-center gap-3 text-slate-800 text-sm">
                                        <i class="las la-check-circle text-emerald-500 text-xl"></i>
                                        ¿Qué hipótesis se quiere validar?
                                    </li>
                                    <li class="flex items-center gap-3 text-slate-800 text-sm">
                                        <i class="las la-check-circle text-emerald-500 text-xl"></i>
                                        Qué resultado demostraría que la solución es viable
                                    </li>
                                </ul>
                            </div>

                            <!-- Alcance -->
                            <div>
                                <h3 class="text-sm font-bold uppercase text-slate-400 tracking-wider mb-4">
                                    Alcance
                                </h3>

                                <ul class="space-y-3">
                                    <li class="flex items-center gap-3 text-slate-800 text-sm">
                                        <i class="las la-check-circle text-emerald-500 text-xl"></i>
                                        Qué sí incluye la PoC
                                    </li>
                                    <li class="flex items-center gap-3 text-slate-800 text-sm">
                                        <i class="las la-check-circle text-emerald-500 text-xl"></i>
                                        Qué no se probará todavía
                                    </li>
                                </ul>

                                <div
                                    class="mt-4 flex items-start gap-2 text-sm text-amber-800 bg-amber-50 px-4 py-3 rounded-lg">
                                    <i class="las la-exclamation-triangle text-amber-500 mt-0.5"></i>
                                    <span>
                                        Esto evita que la PoC se convierta en un proyecto completo.
                                    </span>
                                </div>
                            </div>

                            <!-- Criterios -->
                            <div>
                                <h3 class="text-sm font-bold uppercase text-slate-400 tracking-wider mb-4">
                                    Criterios de éxito
                                </h3>

                                <ul class="space-y-3">
                                    <li class="flex items-center gap-3 text-slate-800 text-sm">
                                        <i class="las la-check-circle text-emerald-500 text-xl"></i>
                                        Definir métricas medibles
                                    </li>
                                </ul>
                            </div>

                            <!-- Recursos -->
                            <div>
                                <h3 class="text-sm font-bold uppercase text-slate-400 tracking-wider mb-4">
                                    Recursos necesarios
                                </h3>

                                <ul class="space-y-3">
                                    <li class="flex items-center gap-3 text-slate-800 text-sm">
                                        <i class="las la-check-circle text-emerald-500 text-xl"></i>
                                        Equipo técnico
                                    </li>
                                    <li class="flex items-center gap-3 text-slate-800 text-sm">
                                        <i class="las la-check-circle text-emerald-500 text-xl"></i>
                                        Herramientas
                                    </li>
                                    <li class="flex items-center gap-3 text-slate-800 text-sm">
                                        <i class="las la-check-circle text-emerald-500 text-xl"></i>
                                        Infraestructura
                                    </li>
                                    <li class="flex items-center gap-3 text-slate-800 text-sm">
                                        <i class="las la-check-circle text-emerald-500 text-xl"></i>
                                        Tiempo estimado
                                    </li>
                                </ul>
                            </div>

                            <!-- Arquitectura -->
                            <div>
                                <h3 class="text-sm font-bold uppercase text-slate-400 tracking-wider mb-4">
                                    Arquitectura preliminar
                                </h3>

                                <ul class="space-y-3">
                                    <li class="flex items-center gap-3 text-slate-800 text-sm">
                                        <i class="las la-check-circle text-emerald-500 text-xl"></i>
                                        Tecnologías
                                    </li>
                                    <li class="flex items-center gap-3 text-slate-800 text-sm">
                                        <i class="las la-check-circle text-emerald-500 text-xl"></i>
                                        Integración con sistemas existentes
                                    </li>
                                    <li class="flex items-center gap-3 text-slate-800 text-sm">
                                        <i class="las la-check-circle text-emerald-500 text-xl"></i>
                                        Limitaciones técnicas
                                    </li>
                                </ul>
                            </div>

                            <!-- Riesgos -->
                            <div>
                                <h3 class="text-sm font-bold uppercase text-slate-400 tracking-wider mb-4">
                                    Identificación de riesgos
                                </h3>

                                <ul class="space-y-3">
                                    <li class="flex items-center gap-3 text-slate-800 text-sm">
                                        <i class="las la-check-circle text-emerald-500 text-xl"></i>
                                        Incompatibilidad tecnológica
                                    </li>
                                    <li class="flex items-center gap-3 text-slate-800 text-sm">
                                        <i class="las la-check-circle text-emerald-500 text-xl"></i>
                                        Costos de infraestructura
                                    </li>
                                    <li class="flex items-center gap-3 text-slate-800 text-sm">
                                        <i class="las la-check-circle text-emerald-500 text-xl"></i>
                                        Limitaciones de seguridad
                                    </li>
                                </ul>
                            </div>

                        </div>
                    </div>
                </section>

                <section class="scroll-mt-32" id="plan">
                    <div class="flex items-center gap-4 mb-6">
                        <div class="w-10 h-10 rounded-xl bg-primary/10 flex items-center justify-center text-primary">
                            <i class="ri-list-check"></i>
                        </div>
                        <h2 class="text-2xl font-bold text-slate-900">2. Diseño del Plan de Trabajo</h2>
                    </div>
                    <div class="bg-white rounded-2xl border border-slate-200 p-8 shadow-sm">
                        <ul class="space-y-3 py-2">
                            <li class="flex items-center gap-3 text-slate-800 text-sm">
                                <i class="las la-check-circle text-emerald-500 text-xl"></i>
                                Revisión de equipamiento (que corresponda al Alcance), asi como de cantidades y licencias.
                            </li>
                            <li class="flex items-center gap-3 text-slate-800 text-sm">
                                <i class="las la-check-circle text-emerald-500 text-xl"></i>
                                Preparación del/los dispositivos (cables, aditamentos, etc.).
                            </li>
                            <li class="flex items-center gap-3 text-slate-800 text-sm">
                                <i class="las la-check-circle text-emerald-500 text-xl"></i>
                                Diseño del diagrama de la PoC (red, conexion) en base a la problematica.
                            </li>
                            <li class="flex items-center gap-3 text-slate-800 text-sm">
                                <i class="las la-check-circle text-emerald-500 text-xl"></i>
                                Configuracion básica del dispositivo.
                            </li>
                        </ul>
                    </div>
                </section>

                {{-- <section class="scroll-mt-32" id="ejecucion">
                    <div class="flex items-center gap-4 mb-6">
                        <div class="w-10 h-10 rounded-xl bg-primary/10 flex items-center justify-center text-primary">
                            <i class="las la-brain"></i>
                        </div>
                        <h2 class="text-2xl font-bold text-slate-900">3. Durante la Prueba de Concepto (Ejecución)</h2>
                    </div>
                    <div class="bg-white rounded-2xl border border-slate-200 p-8 shadow-sm">
                        <ol class="lista">
                            <li class="text-sm font-bold uppercase text-slate-400 tracking-wider">Implementación minima
                            </li>
                            <ul class="space-y-3 py-6">
                                <li class="flex items-center gap-3 text-slate-800 text-sm">
                                    <i class="las la-check-circle text-emerald-500 text-xl"></i>
                                    Equipamiento.
                                </li>
                                <li class="flex items-center gap-3 text-slate-800 text-sm">
                                    <i class="las la-check-circle text-emerald-500 text-xl"></i>
                                    Prototipos.
                                </li>
                                <li class="flex items-center gap-3 text-slate-800 text-sm">
                                    <i class="las la-check-circle text-emerald-500 text-xl"></i>
                                    Configuraciones temporales.
                                </li>
                            </ul>
                            <li class="text-sm font-bold uppercase text-slate-400 tracking-wider">Recolección de datos</li>
                            <ul class="space-y-3 py-6">
                                <li class="flex items-center gap-3 text-slate-800 text-sm">
                                    <i class="las la-check-circle text-emerald-500 text-xl"></i>
                                    Registrar metricas.
                                </li>
                                <li class="flex items-center gap-3 text-slate-800 text-sm">
                                    <i class="las la-check-circle text-emerald-500 text-xl"></i>
                                    Consumo de recursos.
                                </li>
                                <li class="flex items-center gap-3 text-slate-800 text-sm">
                                    <i class="las la-check-circle text-emerald-500 text-xl"></i>
                                    Rendimiento.
                                </li>
                                <li class="flex items-center gap-3 text-slate-800 text-sm">
                                    <i class="las la-check-circle text-emerald-500 text-xl"></i>
                                    Comportamiento y Estabilidad.
                                </li>
                            </ul>
                            <li class="text-sm font-bold uppercase text-slate-400 tracking-wider">Documentación</li>
                            <ul class="space-y-3 py-6">
                                <li class="flex items-center gap-3 text-slate-800 text-sm">
                                    <i class="las la-check-circle text-emerald-500 text-xl"></i>
                                    Configuración usada.
                                </li>
                                <li class="flex items-center gap-3 text-slate-800 text-sm">
                                    <i class="las la-check-circle text-emerald-500 text-xl"></i>
                                    Problemas encontrados.
                                </li>
                                <li class="flex items-center gap-3 text-slate-800 text-sm">
                                    <i class="las la-check-circle text-emerald-500 text-xl"></i>
                                    Decisiones técnicas.
                                </li>
                            </ul>
                            <li class="text-sm font-bold uppercase text-slate-400 tracking-wider">Pruebas
                            </li>
                            <ul class="space-y-3 py-6">
                                <li class="flex items-center gap-3 text-slate-800 text-sm">
                                    <i class="las la-check-circle text-emerald-500 text-xl"></i>
                                    Funcionales.
                                </li>
                                <li class="flex items-center gap-3 text-slate-800 text-sm">
                                    <i class="las la-check-circle text-emerald-500 text-xl"></i>
                                    Rendimiento.
                                </li>
                                <li class="flex items-center gap-3 text-slate-800 text-sm">
                                    <i class="las la-check-circle text-emerald-500 text-xl"></i>
                                    Integración.
                                </li>
                                <li class="flex items-center gap-3 text-slate-800 text-sm">
                                    <i class="las la-check-circle text-emerald-500 text-xl"></i>
                                    Seguridad.
                                </li>
                            </ul>
                        </ol>
                    </div>
                </section> --}}
                <section class="scroll-mt-32" id="ejecucion">
                    <div class="flex items-center gap-4 mb-6">
                        <div class="w-10 h-10 rounded-xl bg-primary/10 flex items-center justify-center text-primary">
                            <i class="ri-list-check-3"></i>
                        </div>
                        <h2 class="text-2xl font-bold text-slate-900">3. Durante la Prueba de Concepto (Ejecución)</h2>
                    </div>

                    <div class="bg-white rounded-2xl border border-slate-200 p-8 shadow-sm">

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">

                            <!-- Implementación mínima -->
                            <div>
                                <h3 class="text-sm font-bold uppercase text-slate-400 tracking-wider mb-4">
                                    Implementación mínima
                                </h3>

                                <ul class="space-y-3">
                                    <li class="flex items-center gap-3 text-slate-800 text-sm">
                                        <i class="las la-check-circle text-emerald-500 text-xl"></i>
                                        Equipamiento
                                    </li>
                                    <li class="flex items-center gap-3 text-slate-800 text-sm">
                                        <i class="las la-check-circle text-emerald-500 text-xl"></i>
                                        Prototipos
                                    </li>
                                    <li class="flex items-center gap-3 text-slate-800 text-sm">
                                        <i class="las la-check-circle text-emerald-500 text-xl"></i>
                                        Configuraciones temporales
                                    </li>
                                </ul>
                            </div>

                            <!-- Recolección de datos -->
                            <div>
                                <h3 class="text-sm font-bold uppercase text-slate-400 tracking-wider mb-4">
                                    Recolección de datos
                                </h3>

                                <ul class="space-y-3">
                                    <li class="flex items-center gap-3 text-slate-800 text-sm">
                                        <i class="las la-check-circle text-emerald-500 text-xl"></i>
                                        Registrar métricas
                                    </li>
                                    <li class="flex items-center gap-3 text-slate-800 text-sm">
                                        <i class="las la-check-circle text-emerald-500 text-xl"></i>
                                        Consumo de recursos
                                    </li>
                                    <li class="flex items-center gap-3 text-slate-800 text-sm">
                                        <i class="las la-check-circle text-emerald-500 text-xl"></i>
                                        Rendimiento
                                    </li>
                                    <li class="flex items-center gap-3 text-slate-800 text-sm">
                                        <i class="las la-check-circle text-emerald-500 text-xl"></i>
                                        Comportamiento y estabilidad
                                    </li>
                                </ul>
                            </div>

                            <!-- Documentación -->
                            <div>
                                <h3 class="text-sm font-bold uppercase text-slate-400 tracking-wider mb-4">
                                    Documentación
                                </h3>

                                <ul class="space-y-3">
                                    <li class="flex items-center gap-3 text-slate-800 text-sm">
                                        <i class="las la-check-circle text-emerald-500 text-xl"></i>
                                        Configuración usada
                                    </li>
                                    <li class="flex items-center gap-3 text-slate-800 text-sm">
                                        <i class="las la-check-circle text-emerald-500 text-xl"></i>
                                        Problemas encontrados
                                    </li>
                                    <li class="flex items-center gap-3 text-slate-800 text-sm">
                                        <i class="las la-check-circle text-emerald-500 text-xl"></i>
                                        Decisiones técnicas
                                    </li>
                                </ul>
                            </div>

                            <!-- Pruebas -->
                            <div>
                                <h3 class="text-sm font-bold uppercase text-slate-400 tracking-wider mb-4">
                                    Pruebas
                                </h3>

                                <ul class="space-y-3">
                                    <li class="flex items-center gap-3 text-slate-800 text-sm">
                                        <i class="las la-check-circle text-emerald-500 text-xl"></i>
                                        Funcionales
                                    </li>
                                    <li class="flex items-center gap-3 text-slate-800 text-sm">
                                        <i class="las la-check-circle text-emerald-500 text-xl"></i>
                                        Rendimiento
                                    </li>
                                    <li class="flex items-center gap-3 text-slate-800 text-sm">
                                        <i class="las la-check-circle text-emerald-500 text-xl"></i>
                                        Integración
                                    </li>
                                    <li class="flex items-center gap-3 text-slate-800 text-sm">
                                        <i class="las la-check-circle text-emerald-500 text-xl"></i>
                                        Seguridad
                                    </li>
                                </ul>
                            </div>

                        </div>
                    </div>
                </section>

                {{-- <section class="scroll-mt-32" id="evaluacion">
                    <div class="flex items-center gap-4 mb-6">
                        <div class="w-10 h-10 rounded-xl bg-primary/10 flex items-center justify-center text-primary">
                            <i class="las la-cog"></i>
                        </div>
                        <h2 class="text-2xl font-bold text-slate-900">4. Despues de la PoC (Evaluación)</h2>
                    </div>
                    <div class="bg-white rounded-2xl border border-slate-200 p-8 shadow-sm">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
                            <div class="p-4 rounded-xl border border-slate-100 bg-slate-50">
                                <p class="text-xs font-bold text-primary uppercase mb-2">Paso A</p>
                                <h4 class="font-bold mb-1 text-slate-900">Análisis de resultados</h4>
                                <div class="bg-blue-50 p-3 rounded-lg border border-blue-100">
                                    <ul class="text-xs text-blue-600 space-y-1">
                                        <li>• Comparar los resultados con los criterios definidos.</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="p-4 rounded-xl border border-slate-100 bg-slate-50">
                                <p class="text-xs font-bold text-primary uppercase mb-2">Paso B</p>
                                <h4 class="font-bold mb-1 text-slate-900">Lecciones aprendidas</h4>
                                <div class="bg-blue-50 p-3 rounded-lg border border-blue-100">
                                    <ul class="text-xs text-blue-600 space-y-1">
                                        <li>• Problemas técnicos.</li>
                                        <li>• Limitaciones de la técnologia.</li>
                                        <li>• Mejoras necesarias.</li>
                                    </ul>
                                </div>
                            </div>

                            <div class="p-4 rounded-xl border border-slate-100 bg-slate-50">
                                <p class="text-xs font-bold text-primary uppercase mb-2">Paso C</p>
                                <h4 class="font-bold mb-1 text-slate-900">Documentación final</h4>
                                <div class="bg-blue-50 p-3 rounded-lg border border-blue-100">
                                    <ul class="text-xs text-blue-600 space-y-1">
                                        <li>• Objetivos.</li>
                                        <li>• Arquitectura probada.</li>
                                        <li>• Resultados.</li>
                                        <li>• Conclusiones.</li>
                                        <li>• Recomendaciones.</li>
                                    </ul>
                                </div>
                            </div>

                            <div class="p-4 rounded-xl border border-slate-100 bg-slate-50">
                                <p class="text-xs font-bold text-primary uppercase mb-2">Paso C</p>
                                <h4 class="font-bold mb-1 text-slate-900">Decisión</h4>
                                <div class="bg-blue-50 p-3 rounded-lg border border-blue-100">
                                    <ul class="text-xs text-blue-600 space-y-1">
                                        <li>• Continuar con el proyecto.</li>
                                        <li>• Ajustar la solución y repetir PoC.</li>
                                        <li>• Descartar la idea.</li>
                                    </ul>
                                </div>
                            </div>

                            <div class="p-4 rounded-xl border border-slate-100 bg-slate-50">
                                <p class="text-xs font-bold text-primary uppercase mb-2">Paso D</p>
                                <h4 class="font-bold mb-1 text-slate-900">Plan siguiente</h4>
                                <div class="bg-blue-50 p-3 rounded-lg border border-blue-100">
                                    <ul class="text-xs text-blue-600 space-y-1">
                                        <li>• Pasar a Protoripo.</li>
                                        <li>• Implementación piloto.</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </section> --}}
                <section id="evaluacion" class="scroll-mt-32">
                    <!-- Header -->
                    <div class="flex items-center gap-4 mb-8">
                        <div class="w-10 h-10 rounded-xl bg-primary/10 flex items-center justify-center text-primary">
                            <i class="las la-chart-line"></i>
                        </div>
                        <h2 class="text-2xl font-bold text-slate-900">
                            4. Después de la PoC (Evaluación)
                        </h2>
                    </div>
                    <!-- Card contenedor -->
                    <div class="bg-white rounded-2xl border border-slate-200 p-8 shadow-sm">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <!-- Paso A -->
                            <div class="p-5 rounded-xl bg-slate-50 border border-slate-100">
                                <span class="text-xs font-bold text-primary uppercase tracking-wider">
                                    Paso A
                                </span>
                                <h4 class="font-semibold text-slate-900 mt-2 mb-3">
                                    Análisis de resultados
                                </h4>
                                <ul class="text-sm text-slate-600 space-y-1 list-disc list-inside">
                                    <li>Comparar los resultados con los criterios definidos.</li>
                                </ul>
                            </div>
                            <!-- Paso B -->
                            <div class="p-5 rounded-xl bg-slate-50 border border-slate-100">
                                <span class="text-xs font-bold text-primary uppercase tracking-wider">
                                    Paso B
                                </span>
                                <h4 class="font-semibold text-slate-900 mt-2 mb-3">
                                    Lecciones aprendidas
                                </h4>
                                <ul class="text-sm text-slate-600 space-y-1 list-disc list-inside">
                                    <li>Problemas técnicos</li>
                                    <li>Limitaciones de la tecnología</li>
                                    <li>Mejoras necesarias</li>
                                </ul>
                            </div>
                            <!-- Paso C -->
                            <div class="p-5 rounded-xl bg-slate-50 border border-slate-100">
                                <span class="text-xs font-bold text-primary uppercase tracking-wider">
                                    Paso C
                                </span>
                                <h4 class="font-semibold text-slate-900 mt-2 mb-3">
                                    Documentación final
                                </h4>
                                <ul class="text-sm text-slate-600 space-y-1 list-disc list-inside">
                                    <li>Objetivos</li>
                                    <li>Arquitectura probada</li>
                                    <li>Resultados</li>
                                    <li>Conclusiones</li>
                                    <li>Recomendaciones</li>
                                </ul>
                            </div>
                            <!-- Paso D -->
                            <div class="p-5 rounded-xl bg-slate-50 border border-slate-100">
                                <span class="text-xs font-bold text-primary uppercase tracking-wider">
                                    Paso D
                                </span>
                                <h4 class="font-semibold text-slate-900 mt-2 mb-3">
                                    Decisión
                                </h4>
                                <ul class="text-sm text-slate-600 space-y-1 list-disc list-inside">
                                    <li>Continuar con el proyecto</li>
                                    <li>Ajustar la solución y repetir PoC</li>
                                    <li>Descartar la idea</li>
                                </ul>
                            </div>
                            <!-- Paso E -->
                            <div class="p-5 rounded-xl bg-slate-50 border border-slate-100">
                                <span class="text-xs font-bold text-primary uppercase tracking-wider">
                                    Paso E
                                </span>
                                <h4 class="font-semibold text-slate-900 mt-2 mb-3">
                                    Plan siguiente
                                </h4>
                                <ul class="text-sm text-slate-600 space-y-1 list-disc list-inside">
                                    <li>Pasar a prototipo</li>
                                    <li>Implementación piloto</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </section>

                <section class="scroll-mt-32" id="retorno">
                    <div class="flex items-center gap-4 mb-6">
                        <div class="w-10 h-10 rounded-xl bg-red-50 flex items-center justify-center text-red-600">
                            <i class="las la-exclamation-triangle"></i>
                        </div>
                        <h2 class="text-2xl font-bold text-slate-900">5. Elementos Clave en la PoC</h2>
                    </div>
                    <div class="bg-white rounded-2xl border border-red-100 p-8 shadow-sm">
                        <div class="grid grid-cols-2 gap-4">
                            <div class="flex items-start gap-4">
                                <div
                                    class="w-8 h-8 rounded-full bg-red-50 text-red-600 flex items-center justify-center flex-shrink-0 font-bold text-sm">
                                    1</div>
                                <p class="text-sm text-slate-600 pt-1">Problema definido</p>
                            </div>
                            <div class="flex items-start gap-4">
                                <div
                                    class="w-8 h-8 rounded-full bg-red-50 text-red-600 flex items-center justify-center flex-shrink-0 font-bold text-sm">
                                    2</div>
                                <p class="text-sm text-slate-600 pt-1">Hipótesis a validar.</p>
                            </div>
                            <div class="flex items-start gap-4">
                                <div
                                    class="w-8 h-8 rounded-full bg-red-50 text-red-600 flex items-center justify-center flex-shrink-0 font-bold text-sm">
                                    3</div>
                                <p class="text-sm text-slate-600 pt-1">Alcance limitado.</p>
                            </div>
                            <div class="flex items-start gap-4">
                                <div
                                    class="w-8 h-8 rounded-full bg-red-50 text-red-600 flex items-center justify-center flex-shrink-0 font-bold text-sm">
                                    4</div>
                                <p class="text-sm text-slate-600 pt-1">Métricas de éxito.</p>
                            </div>
                            <div class="flex items-start gap-4">
                                <div
                                    class="w-8 h-8 rounded-full bg-red-50 text-red-600 flex items-center justify-center flex-shrink-0 font-bold text-sm">
                                    5</div>
                                <p class="text-sm text-slate-600 pt-1">Implementación minima.</p>
                            </div>
                            <div class="flex items-start gap-4">
                                <div
                                    class="w-8 h-8 rounded-full bg-red-50 text-red-600 flex items-center justify-center flex-shrink-0 font-bold text-sm">
                                    6</div>
                                <p class="text-sm text-slate-600 pt-1">Recolección de datos.</p>
                            </div>
                            <div class="flex items-start gap-4">
                                <div
                                    class="w-8 h-8 rounded-full bg-red-50 text-red-600 flex items-center justify-center flex-shrink-0 font-bold text-sm">
                                    7</div>
                                <p class="text-sm text-slate-600 pt-1">Evaluación objetiva.</p>
                            </div>
                            <div class="flex items-start gap-4">
                                <div
                                    class="w-8 h-8 rounded-full bg-red-50 text-red-600 flex items-center justify-center flex-shrink-0 font-bold text-sm">
                                    8</div>
                                <p class="text-sm text-slate-600 pt-1">Documnetación final.</p>
                            </div>
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
