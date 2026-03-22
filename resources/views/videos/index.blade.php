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
                            <span class="ml-1 text-sm text-primary font-medium md:ml-2">Formacion Academica</span>
                        </div>
                    </li>
                </ol>
            </nav>
        </div>
    </div>

    <!-- Encabezado -->
    <div class="mb-6 flex flex-col md:flex-row md:items-end justify-between gap-6 mt-8">
        <div class="max-w-4xl">
            <h1 class="text-2xl md:text-4xl font-black tracking-tight mb-4">Formación Academica</h1>
            <p class="text-slate-600 dark:text-slate-400 text-md leading-relaxed">
                Acceda a recursos de formación académica que incluyen videos de tecnologías, tutoriales especializados y
                materiales educativos orientados al desarrollo de competencias profesionales.
            </p>
            <!--Opcion2 -->
            {{--  <p class="text-slate-600 dark:text-slate-400 text-md leading-relaxed">
                Accede a contenido de formación académica que incluye videos de diversas tecnologías, tutoriales prácticos y recursos educativos diseñados para fortalecer tus conocimientos y habilidades.
            </p> --}}
        </div>
    </div>


    <div class="bg-white rounded-2xl border border-slate-200 p-5 mb-8 mt-8 flex items-center justify-center">
        <div class="text-center px-6 py-4">

            <!-- Imagen -->
            <div class="flex justify-center mb-8">
                <div
                    class="w-48 h-48 rounded-full overflow-hidden border-4 border-primary shadow-xl ring-4 ring-primary/10">
                    <img src="{{ asset('assets/media/trabajando-enello.png') }}" alt="En construcción"
                        class="w-full h-full object-cover">
                </div>
            </div>

            <!-- Título -->
            <h1 class="text-2xl md:text-3xl font-bold text-gray-800 mb-3">
                Estamos trabajando en esta sección
            </h1>

            <!-- Mensaje -->
            <p class="text-gray-600 max-w-md mx-auto">
                La vista de <span class="font-semibold">Formación Académica</span> aún está en desarrollo.
                Vuelve pronto para ver contenido de tecnologías y tutoriales.
            </p>
            <!-- Badge opcional -->
            <div class="mt-6">
                <span
                    class="inline-flex items-center gap-2 px-3 py-1 text-xs font-semibold text-primary bg-primary/10 rounded-full">
                    <i class="las la-clock text-sm"></i>
                    En proceso
                </span>
            </div>
        </div>
    </div>
@endsection
