@extends('layouts.intranet')

@section('title', 'Guías de Trabajo')

@push('css')
    <link href="/assets/css/intrahome.css" rel="stylesheet">
@endpush

@section('content')

    {{-- Breadcrumb --}}
    <div class="bg-white border-b border-gray-200">
        <div class="container mx-auto px-4 py-3">
            <nav class="flex" aria-label="Breadcrumb">
                <ol class="inline-flex items-center space-x-1 md:space-x-3">
                    <li class="inline-flex items-center">
                        <a href="{{ route('bienvenido') }}"
                            class="inline-flex items-center text-sm text-gray-600 hover:text-orange-600">
                            <i class="fas fa-home mr-2"></i> Home
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
                                class="ml-1 text-sm text-gray-600 hover:text-orange-600 md:ml-2">Ingeniería</a>
                        </div>
                    </li>
                    <li aria-current="page">
                        <div class="flex items-center">
                            <i class="fas fa-chevron-right text-gray-400 mx-2"></i>
                            <span class="ml-1 text-sm text-orange-600 font-medium md:ml-2">Guías On Site</span>
                        </div>
                    </li>
                </ol>
            </nav>
        </div>
    </div>

    {{-- Encabezado --}}
    <header class="mt-8 mb-7 px-6">
        <div class="flex items-start justify-between flex-wrap gap-3">
            <div>
                <h1 class="text-4xl text-gray-800 font-black leading-tight tracking-[-0.033em]">Guías de Trabajo</h1>
                <p class="text-slate-500 font-normal text-xl mt-1">
                    Documentación y guías paso a paso para la realización de una actividad en concreto.
                </p>
            </div>
            {{-- Leyenda de categorías --}}
            <div class="flex flex-wrap gap-2 items-center mt-1">
                <span class="inline-flex items-center gap-1.5 text-xl text-gray-500">
                    <span class="w-2 h-2 rounded-full bg-blue-500 inline-block"></span> Infraestructura
                </span>
                <span class="inline-flex items-center gap-1.5 text-xl text-gray-500">
                    <span class="w-2 h-2 rounded-full bg-violet-500 inline-block"></span> Seguridad
                </span>
                <span class="inline-flex items-center gap-1.5 text-xl text-gray-500">
                    <span class="w-2 h-2 rounded-full bg-amber-400 inline-block"></span> Mantenimiento
                </span>
                <span class="inline-flex items-center gap-1.5 text-xl text-gray-500">
                    <span class="w-2 h-2 rounded-full inline-block" style="background:var(--primary)"></span> Guía
                </span>
            </div>
        </div>
    </header>

    {{-- Contenido --}}
    <div class="px-6 pb-10">
        <div class="section-header">
            <h2>Listado de Guías de Actividades</h2>
            <span class="count-pill">7 guías</span>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-5">

            {{-- ── CARD 1 — Switches ── --}}
            <a href="{{ route('ingenieria.instalacion-switch') }}" class="guide-card cat-infra">
                <div class="card-stripe"></div>
                <span class="cat-badge"><i class="las la-sitemap" style="font-size:12px"></i> Infraestructura</span>
                <div class="guide-icon"><i class="las la-network-wired"></i></div>
                <p class="guide-title">Implementación Switches</p>
                <p class="guide-desc">Guía de actividades en la implementación y configuración de switches de red.</p>
                <div class="guide-footer">
                    <span class="guide-date"><i class="las la-calendar" style="font-size:13px"></i> 21/02/2026</span>
                    <span class="guide-cta">Abrir <i class="las la-arrow-right"></i></span>
                </div>
            </a>

            {{-- ── CARD 2 — Firewalls ── --}}
            <a href="{{ route('ingenieria.instalacion-firewall') }}" class="guide-card cat-sec">
                <div class="card-stripe"></div>
                <span class="cat-badge"><i class="las la-lock" style="font-size:12px"></i> Seguridad</span>
                <div class="guide-icon"><i class="las la-shield-alt"></i></div>
                <p class="guide-title">Implementación Firewalls</p>
                <p class="guide-desc">Guía de actividades en la implementación y configuración de firewall.</p>
                <div class="guide-footer">
                    <span class="guide-date"><i class="las la-calendar" style="font-size:13px"></i> 21/02/2026</span>
                    <span class="guide-cta">Abrir <i class="las la-arrow-right"></i></span>
                </div>
            </a>

            {{-- ── CARD 3 — Access Points ── --}}
            <a href="{{ route('ingenieria.instalacion-aps') }}" class="guide-card cat-infra">
                <div class="card-stripe"></div>
                <span class="cat-badge"><i class="las la-sitemap" style="font-size:12px"></i> Infraestructura</span>
                <div class="guide-icon"><i class="las la-wifi"></i></div>
                <p class="guide-title">Implementación Access Points</p>
                <p class="guide-desc">Guía de actividades en la implementación de antenas inalámbricas.</p>
                <div class="guide-footer">
                    <span class="guide-date"><i class="las la-calendar" style="font-size:13px"></i> 21/02/2026</span>
                    <span class="guide-cta">Abrir <i class="las la-arrow-right"></i></span>
                </div>
            </a>

            {{-- ── CARD 4 — PoC ── --}}
            <a href="{{ route('ingenieria.instalacion-poc') }}" class="guide-card cat-guide">
                <div class="card-stripe"></div>
                <span class="cat-badge"><i class="las la-flask" style="font-size:12px"></i> Guía</span>
                <div class="guide-icon"><i class="las la-flask"></i></div>
                <p class="guide-title">Prueba de Concepto</p>
                <p class="guide-desc">Guía de actividades para planificar y realizar una PoC exitosa.</p>
                <div class="guide-footer">
                    <span class="guide-date"><i class="las la-calendar" style="font-size:13px"></i> 21/02/2026</span>
                    <span class="guide-cta">Abrir <i class="las la-arrow-right"></i></span>
                </div>
            </a>

            {{-- ── CARD 5 — Mantenimiento Preventivo ── --}}
            <a href="{{ route('ingenieria.guia-preventivo') }}" class="guide-card cat-mant">
                <div class="card-stripe"></div>
                <span class="cat-badge"><i class="las la-tools" style="font-size:12px"></i> Mantenimiento</span>
                <div class="guide-icon"><i class="las la-tools"></i></div>
                <p class="guide-title">Mantenimiento Preventivo</p>
                <p class="guide-desc">Guía de actividades para la realización de mantenimiento preventivo.</p>
                <div class="guide-footer">
                    <span class="guide-date"><i class="las la-calendar" style="font-size:13px"></i> 21/02/2026</span>
                    <span class="guide-cta">Abrir <i class="las la-arrow-right"></i></span>
                </div>
            </a>

            {{-- ── CARD 6 — Mantenimiento Correctivo ── --}}
            <a href="{{ route('ingenieria.guia-correctivo') }}" class="guide-card cat-mant">
                <div class="card-stripe"></div>
                <span class="cat-badge"><i class="las la-tools" style="font-size:12px"></i> Mantenimiento</span>
                <div class="guide-icon"><i class="las la-wrench"></i></div>
                <p class="guide-title">Mantenimiento Correctivo</p>
                <p class="guide-desc">Guía de actividades para la realización de mantenimiento correctivo.</p>
                <div class="guide-footer">
                    <span class="guide-date"><i class="las la-calendar" style="font-size:13px"></i> 21/02/2026</span>
                    <span class="guide-cta">Abrir <i class="las la-arrow-right"></i></span>
                </div>
            </a>

            {{-- ── CARD 7 — Site Survey ── --}}
            <a href="{{ route('ingenieria.site-survey') }}" class="guide-card cat-guide">
                <div class="card-stripe"></div>
                <span class="cat-badge"><i class="las la-map-marked-alt" style="font-size:12px"></i> Guía</span>
                <div class="guide-icon"><i class="las la-map-marked-alt"></i></div>
                <p class="guide-title">Guía para Site Survey</p>
                <p class="guide-desc">Guía de actividades para la realización de un Site Survey de campo.</p>
                <div class="guide-footer">
                    <span class="guide-date"><i class="las la-calendar" style="font-size:13px"></i> 21/02/2026</span>
                    <span class="guide-cta">Abrir <i class="las la-arrow-right"></i></span>
                </div>
            </a>

        </div>
    </div>

@endsection

@push('js')
@endpush
