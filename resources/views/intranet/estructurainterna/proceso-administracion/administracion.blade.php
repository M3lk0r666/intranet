@extends('layouts.intranet')

@section('title', 'Intranet Corporativa')

@push('css')
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="/assets/css/intrahome.css" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com?plugins=forms,typography,container-queries"></script>
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
                            <a href="{{ route('intranet.procesos-empresariales') }}"
                                class="ml-1 text-sm text-gray-600 hover:text-orange-600 md:ml-2">Procesos Empresariales</a>
                        </div>
                    </li>
                    <li aria-current="page">
                        <div class="flex items-center">
                            <i class="fas fa-chevron-right text-gray-400 mx-2"></i>
                            <span class="ml-1 text-sm text-primary font-medium md:ml-2">Administración y Finanzas</span>
                        </div>
                    </li>
                </ol>
            </nav>
        </div>
    </div>

    <!-- Encabezado -->
    <div class="mt-8 mb-8">
        <h1 class="text-3xl font-bold text-gray-800 mb-2">Procesos y Actividades Administración</h1>
        <p class="text-gray-600">En cualquier organización, contar con un proceso formalizado de selección, evaluación y
            contratación de personal es fundamental para asegurar que los nuevos colaboradores no solo cubran los requisitos
            técnicos del puesto, sino que también se alineen con la cultura, valores y objetivos estratégicos de la empresa.
        </p>
    </div>

    <!-- Procesos RH-->
    <div class="bg-white rounded-lg shadow p-6">
        <h2 class="text-2xl font-bold mb-6 text-center uppercase text-orange-600"> Recursos Humanos</h2>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <!-- Categoría 1 -->
            <a href="{{ route('intranet.administracion.alta-colaborador') }}"
                class="card-hover p-5 border border-gray-200 rounded-lg text-center hover:border-primary hover:bg-orange-50">
                <div class="bg-green-100 text-green-600 p-4 rounded-full inline-flex mb-4">
                    <i class="las la-user-plus text-2xl"></i>
                </div>
                <h3 class="text-lg font-bold text-gray-800 mb-2">Alta de Colaborador</h3>
                <p class="text-gray-600 text-sm mb-3">El proceso de alta es el conjunto de actividades administrativas,
                    legales y operativas que realiza el área de Recursos Humanos cuando una persona se incorpora formalmente
                    a la empresa.</p>
                <span class="text-primary font-medium">1 Procedimiento 2 archivos</span>
            </a>

            <!-- Categoría 2 -->
            <a href="{{ route('intranet.administracion.baja-colaborador') }}"
                class="card-hover p-5 border border-gray-200 rounded-lg text-center hover:border-primary hover:bg-orange-50">
                <div class="bg-red-100 text-red-600 p-4 rounded-full inline-flex mb-4">
                    <i class="las la-user-times text-2xl"></i>
                </div>
                <h3 class="text-lg font-bold text-gray-800 mb-2">Baja de Colaborador</h3>
                <p class="text-gray-600 text-sm mb-3">El proceso de baja comprende las acciones que realiza RH cuando
                    termina la relación laboral, ya sea por renuncia, despido, término de contrato o jubilación.</p>
                <span class="text-primary font-medium">1 Procedimiento 1 archivo</span>
            </a>

            <!-- Categoría 3 -->
            <a href="{{ route('intranet.administracion.uso-camioneta') }}"
                class="card-hover p-5 border border-gray-200 rounded-lg text-center hover:border-primary hover:bg-orange-50">
                <div class="bg-blue-100 text-blue-600 p-4 rounded-full inline-flex mb-4">
                    <i class="las la-car-side text-2xl"></i>
                </div>
                <h3 class="text-lg font-bold text-gray-800 mb-2">Uso de Camioneta</h3>
                <p class="text-gray-600 text-sm mb-3">La camioneta representa una herramienta escencial para las operaciones
                    diarias, transporte de personal y traslado de materiales.</p>
                <span class="text-primary font-medium">1 Procedimineto y 1 archivo</span>
            </a>

            <!-- Categoría 4 -->
            <a href="{{ route('intranet.administracion.incidencias') }}"
                class="card-hover p-5 border border-gray-200 rounded-lg text-center hover:border-primary hover:bg-orange-50">
                <div class="bg-orange-100 text-orange-600 p-4 rounded-full inline-flex mb-4">
                    <i class="las la-map-signs text-2xl"></i>
                </div>
                <h3 class="text-lg font-bold text-gray-800 mb-2">Incidencias</h3>
                <p class="text-gray-600 text-sm mb-3">Guia para el levantamiento de incidencia poara nómina</p>
                <span class="text-primary font-medium">Procedimiento</span>
            </a>

            <!-- Categoría 5 -->
            <a href="{{ route('intranet.administracion.horario-laboral') }}"
                class="card-hover p-5 border border-gray-200 rounded-lg text-center hover:border-primary hover:bg-orange-50">
                <div class="bg-purple-100 text-purple-600 p-4 rounded-full inline-flex mb-4">
                    <i class="las la-business-time text-2xl"></i>
                </div>
                <h3 class="text-lg font-bold text-gray-800 mb-2">Horarios Laborales</h3>
                <p class="text-gray-600 text-sm mb-3">Regsitro, Control y Cumplimiento de los horarios laboarales</p>
                <span class="text-primary font-medium">Proceso</span>
            </a>
        </div>
    </div>
    <hr>
    <!-- Procesos Facturacion-->
    <div class="bg-white rounded-lg shadow p-6 mt-6">
        <h2 class="text-2xl font-bold mb-6 text-center uppercase text-orange-600">Inventario - Facturación</h2>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <!-- Categoría 1 -->
            <a href="{{ route('intranet.administracion.facturacion-inventario') }}"
                class="card-hover p-5 border border-gray-200 rounded-lg text-center hover:border-primary hover:bg-orange-50">
                <div class="bg-blue-100 text-blue-600 p-4 rounded-full inline-flex mb-4">
                    <i class="las la-file-invoice-dollar text-2xl"></i>
                </div>
                <h3 class="text-lg font-bold text-gray-800 mb-2">Inventario-Facturación</h3>
                <p class="text-gray-600 text-sm mb-3">El proceso de facturación e inventario es un conjunto de actividades
                    administrativas y operativas que permiten registrar, controlar y gestionar las ventas de productos o
                    servicios, así como mantener actualizado el control de existencias dentro de una organización.</p>
                <span class="text-primary font-medium">3 Fases 8 Tareas Clave</span>
            </a>
        </div>
    </div>
    <hr>

    <section class="mt-20 opacity-40 pointer-events-none cursor-not-allowed">
        <div class="flex items-center justify-between mb-8">
            <h2 class="text-2xl font-bold border-l-4 border-primary pl-4">Procesos Por Definir</h2>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <!-- Proceso Marketing -->
            <div
                class="bg-white dark:bg-surface-dark p-8 rounded-3xl border border-slate-200 dark:border-slate-800 flex items-center gap-6 shadow-sm hover:border-primary transition-all cursor-pointer">
                <div
                    class="h-16 w-16 bg-orange-100 dark:bg-primary/20 rounded-2xl flex items-center justify-center text-primary">
                    <i class="las la-question text-2xl"></i>
                </div>
                <div>
                    <h4 class="text-xl font-bold mb-1">Proceso Marketing</h4>
                    <p class="text-slate-500 text-sm">Descripcion por definir ...</p>
                </div>
                <span class="material-symbols-outlined ml-auto text-slate-400">proximamente ...</span>
            </div>
            <!-- Proceso Inventario -->
            <div
                class="bg-white dark:bg-surface-dark p-8 rounded-3xl border border-slate-200 dark:border-slate-800 flex items-center gap-6 shadow-sm hover:border-primary transition-all cursor-pointer">
                <div
                    class="h-16 w-16 bg-orange-100 dark:bg-primary/20 rounded-2xl flex items-center justify-center text-primary">
                    <i class="las la-question text-2xl"></i>
                </div>
                <div>
                    <h4 class="text-xl font-bold mb-1">Proceso Inventario</h4>
                    <p class="text-slate-500 text-sm">Descripcion por definir ...</p>
                </div>
                <span class="material-symbols-outlined ml-auto text-slate-400">proximamente ...</span>
            </div>
            <!-- Proceso Compras -->
            <div
                class="bg-white dark:bg-surface-dark p-8 rounded-3xl border border-slate-200 dark:border-slate-800 flex items-center gap-6 shadow-sm hover:border-primary transition-all cursor-pointer">
                <div
                    class="h-16 w-16 bg-orange-100 dark:bg-primary/20 rounded-2xl flex items-center justify-center text-primary">
                    <i class="las la-question text-2xl"></i>
                </div>
                <div>
                    <h4 class="text-xl font-bold mb-1">Proceso Compras</h4>
                    <p class="text-slate-500 text-sm">Descripcion por definir ...</p>
                </div>
                <span class="material-symbols-outlined ml-auto text-slate-400">proximamente ...</span>
            </div>
        </div>
    </section>

@endsection
@push('js')
@endpush
