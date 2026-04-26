@extends('layouts.intranet')

@section('title', $course->title . ' — Curso')

@push('css')
    <link href="/assets/css/intrahome.css" rel="stylesheet">
@endpush

@section('content')
    {{-- ── Breadcrumb ── --}}
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
                            <a href="{{ route('courses.index') }}"
                                class="ml-1 text-sm text-gray-600 hover:text-orange-600 md:ml-2">Formación Académica</a>
                        </div>
                    </li>
                    <li aria-current="page">
                        <div class="flex items-center">
                            <i class="fas fa-chevron-right text-gray-400 mx-2"></i>
                            <span
                                class="ml-1 text-sm text-orange-600 font-medium md:ml-2 truncate max-w-[200px]">{{ $course->title }}</span>
                        </div>
                    </li>
                </ol>
            </nav>
        </div>
    </div>

    {{-- ── Player principal ── --}}
    <div class="px-4 py-4">
        <div class="player-wrap" x-data="coursePlayer()">
            <div class="player-main">
                {{-- Stage: video o PDF --}}
                <div class="player-stage {{ $lesson->type === 'pdf' ? 'is-pdf' : '' }}">
                    <x-content-renderer :type="$lesson->type" :resource="$lesson->content_resource" />
                </div>
                {{-- Info de la lección activa --}}
                <div class="player-info">
                    <p class="lesson-title">{{ $lesson->title ?? 'Selecciona una lección' }}</p>
                    <div class="lesson-meta">
                        @if ($lesson->type)
                            <span>
                                @if ($lesson->type === 'video')
                                    <i class="las la-play-circle"></i> Video
                                @elseif($lesson->type === 'pdf')
                                    <i class="las la-file-pdf"></i> PDF
                                @else
                                    <i class="las la-file-alt"></i> Lectura
                                @endif
                            </span>
                        @endif
                        <span><i class="las la-book-open"></i> {{ $course->title }}</span>
                        @if ($lesson->module)
                            <span><i class="las la-layer-group"></i> {{ $lesson->module->title }}</span>
                        @endif
                    </div>
                </div>
                {{-- Navegación anterior / siguiente --}}
                <div class="player-nav">
                    @if (isset($prevLesson) && $prevLesson)
                        <a href="{{ route('courses.lessons.show', [$course, $prevLesson]) }}" class="nav-btn prev">
                            <i class="las la-arrow-left"></i> Tema anterior
                        </a>
                    @else
                        <span class="nav-btn prev disabled">
                            <i class="las la-arrow-left"></i> Tema anterior
                        </span>
                    @endif
                    {{-- Contador de posición --}}
                    <span class="lesson-progress-text">
                        {{-- Calcula posición si tienes $lessonIndex y $totalLessons en el controlador --}}
                        @isset($lessonIndex)
                            Lección {{ $lessonIndex }} de {{ $totalLessons }}
                        @endisset
                    </span>
                    @if (isset($nextLesson) && $nextLesson)
                        <a href="{{ route('courses.lessons.show', [$course, $nextLesson]) }}" class="nav-btn next">
                            Siguiente tema <i class="las la-arrow-right"></i>
                        </a>
                    @else
                        <span class="nav-btn next disabled">
                            Siguiente tema <i class="las la-arrow-right"></i>
                        </span>
                    @endif
                </div>
            </div>
            {{-- SIDEBAR DE MÓDULOS --}}
            <div class="player-sidebar">
                {{-- Header --}}
                <div class="sidebar-head">
                    <p class="sidebar-course-title">{{ $course->title }}</p>
                    <p class="sidebar-course-desc">{{ $course->description }}</p>
                    {{-- Barra de progreso (opcional — requiere $progressPercent del controlador) --}}
                    @isset($progressPercent)
                        <div class="progress-bar-wrap">
                            <div class="progress-bar-label">
                                <span>Tu progreso</span>
                                <span>{{ $progressPercent }}%</span>
                            </div>
                            <div class="progress-bar-track">
                                <div class="progress-bar-fill" style="width: {{ $progressPercent }}%"></div>
                            </div>
                        </div>
                    @endisset
                </div>
                {{-- Módulos y lecciones --}}
                <div class="sidebar-modules">
                    @foreach ($course->modules as $module)
                        @php
                            $isActiveModule = $module->lessons->contains('id', $lesson->id ?? null);
                        @endphp
                        <div class="module-block" x-data="{ open: {{ $isActiveModule ? 'true' : 'true' }} }">
                            {{-- Toggle del módulo --}}
                            <button @click="open = !open" class="module-toggle">
                                <span class="module-num">{{ $loop->iteration }}</span>
                                <span class="module-title-text">{{ $module->title }}</span>
                                <span class="module-lesson-count">
                                    {{ $module->lessons->count() }}
                                    lección{{ $module->lessons->count() != 1 ? 'es' : '' }}
                                </span>
                                <i class="las la-angle-down module-chevron" :class="open && 'open'"></i>
                            </button>
                            {{-- Lista de lecciones --}}
                            <div class="lessons-list" x-show="open" x-transition>
                                @foreach ($module->lessons as $lessonItem)
                                    @php
                                        $isActive = isset($lesson) && $lessonItem->id === $lesson->id;
                                        $iconClass = match ($lessonItem->type ?? '') {
                                            'video' => 'lti-video',
                                            'pdf' => 'lti-pdf',
                                            'text' => 'lti-text',
                                            default => 'lti-def',
                                        };
                                        $iconName = match ($lessonItem->type ?? '') {
                                            'video' => 'la-play',
                                            'pdf' => 'la-file-pdf',
                                            'text' => 'la-file-alt',
                                            default => 'la-circle',
                                        };
                                    @endphp
                                    <a href="{{ route('courses.lessons.show', [$course, $lessonItem]) }}"
                                        class="lesson-item {{ $isActive ? 'active' : '' }}">
                                        <span class="lesson-type-icon {{ $iconClass }}">
                                            <i class="las {{ $iconName }}"></i>
                                        </span>
                                        <span class="lesson-item-title">{{ $lessonItem->title }}</span>
                                        @if ($isActive)
                                            <span class="now-badge">Actual</span>
                                        @endif
                                    </a>
                                @endforeach
                            </div>
                        </div>
                    @endforeach
                </div>
                {{-- Footer: regresar al listado --}}
                <div class="sidebar-footer">
                    <a href="{{ route('courses.index') }}" class="btn-back">
                        <i class="las la-arrow-left"></i> Volver a cursos
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
