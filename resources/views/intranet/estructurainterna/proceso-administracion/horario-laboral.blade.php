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
                            <a href="{{ route('procesos-empresariales') }}"
                                class="ml-1 text-sm text-gray-600 hover:text-orange-600 md:ml-2">Procesos Empresariales</a>
                        </div>
                    </li>
                    <li>
                        <div class="flex items-center">
                            <i class="fas fa-chevron-right text-gray-400 mx-2"></i>
                            <a href="{{ route('estructurainterna.admnistracion') }}"
                                class="ml-1 text-sm text-gray-600 hover:text-orange-600 md:ml-2">Administración</a>
                        </div>
                    </li>

                    <li aria-current="page">
                        <div class="flex items-center">
                            <i class="fas fa-chevron-right text-gray-400 mx-2"></i>
                            <span class="ml-1 text-sm text-primary font-medium md:ml-2">RH - Horario Laboral</span>
                        </div>
                    </li>
                </ol>
            </nav>
        </div>
    </div>

    <!-- Encabezado -->
    <div class="mt-8 mb-8">
        <h1 class="text-3xl font-bold text-gray-800 mb-2">Proceso Control de Horarios Laborales</h1>
        <p class="text-gray-600">Tiempos establecidos por la empresa en los que el colaborador debe cumplir con su jornada
            de trabajo, incluyendo hora de entrada, salida y periodos de descanso, conforme a lo estipulado en el contrato y
            la normativa interna.</p>
    </div>

    <div class="text-center mb-16 mt-8">
        <h1 class="text-5xl font-black font-display tracking-tight text-slate-900 uppercase">
            Proceso Control de <span class="text-primary  uppercase">Horarios Laborales</span>
        </h1>
        <p></p>
        <p class="text-slate-600 mt-6 text-lg">Registro y Aplicacion del Horario</p>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-12 gap-8">
        <!-- Left Column: Objective & Alcance -->
        <div class="lg:col-span-4 space-y-6">
            <!-- Objective Card -->
            <div class="bg-white rounded-xl shadow-sm border border-orange-500 dark:border-primary/10 overflow-hidden">
                <div class="p-6">
                    <div class="flex items-center gap-3 mb-4 text-primary">
                        <i class="las la-trophy text-3xl"></i>
                        <h2 class="text-xl font-bold text-orange-500">Objetivo</h2>
                    </div>
                    <p class="text-slate-600 leading-relaxed text-justify">
                        Establecer los lineamientos para el registro, control y cumplimiento de horarios de trabajo, pausas
                        para alimentos, retardos, faltas, home office e incidencias, con el fin de garantizar disciplina,
                        transparencia y equidad en la gestión del tiempo laboral.
                    </p>
                </div>
            </div>
            <!-- Alcance Card -->
            <div class="bg-white rounded-xl shadow-sm border border-orange-500 dark:border-primary/10 overflow-hidden">
                <div class="p-6">
                    <div class="flex items-center gap-3 mb-4 text-primary">
                        <i class="las la-binoculars text-3xl"></i>
                        <h2 class="text-xl font-bold text-orange-500">Alcance</h2>
                    </div>
                    <p class="text-slate-600 leading-relaxed text-justify">
                        Aplica a todos los colaboradores de la empresa en modalidad presencial o home office, incluyendo
                        personal administrativo, operativo y directivo
                    </p>
                </div>
            </div>
        </div>
        <!-- Right Column: Process Flows -->
        <div class="lg:col-span-8 space-y-8">
            <!-- Payroll Incident Header -->
            <div class="arrow-header bg-green-600 text-white px-8 py-4 w-full md:w-3/4 flex items-center gap-4 shadow-md">
                <i class="las la-business-time text-3xl"></i>
                <span class="text-xl font-black uppercase tracking-wider">Registro</span>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Horario Trabajo -->
                <div
                    class="bg-white rounded-xl shadow-sm border border-slate-200 border-primary/10 overflow-hidden flex flex-col">
                    <div class="bg-primary/10 p-4 border-b border-primary/20">
                        <h3 class="text-lg font-bold text-primary flex items-center gap-2">
                            <i class="las la-clock text-2xl"></i>
                            Horario de Trabajo
                        </h3>
                    </div>
                    <div class="p-6">
                        <ol class="text-medium space-y-2 list-decimal ml-4 mb-4">
                            <li>Horario laboral: <span class="text-primary font-medium">09:00 a 18:00</span> hrs.</li>
                            <li>Hora de comida: <span class="text-primary font-medium">14:00 a 15:00</span> hrs.</li>
                            <li>Total de horas efectivas de trabajo: <span class="text-primary font-medium">8</span> hrs.
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- asitencia-->
                <div
                    class="bg-white rounded-xl shadow-sm border border-slate-200 border-primary/10 overflow-hidden flex flex-col">
                    <div class="bg-primary/10 p-4 border-b border-primary/20">
                        <h3 class="text-lg font-bold text-primary flex items-center gap-2">
                            <i class="las la-user-clock text-2xl"></i>
                            Registro y Asistencia
                        </h3>
                    </div>
                    <div class="p-6">
                        <ol class="text-medium space-y-2 list-decimal ml-4 mb-4">
                            <li><span class="text-primary font-medium">Ingreso y Salida:</span> Todos los colaboradores
                                deberán registrar su entrada y salida en el dispositivo biométrico de acceso.</li>
                            <li><span class="text-primary font-medium">Hora de Comida:</span> Es obligatorio registrar el
                                inicio (14:00 hrs) y el fin (15:00 hrs) en el dispositivo biométrico.</li>
                            <li><span class="text-primary font-medium">Incidencias:</span> Cualquier ausencia, permiso,
                                incapacidad o modalidad de home office deberá registrarse en la aplicación de incidencias en
                                Odoo.</li>
                        </ol>
                    </div>
                </div>
                <!-- retardos -->
                <div
                    class="bg-white rounded-xl shadow-sm border border-slate-200 border-primary/10 overflow-hidden flex flex-col">
                    <div class="bg-primary/10 p-4 border-b border-primary/20">
                        <h3 class="text-lg font-bold text-primary flex items-center gap-2">
                            <i class="las la-user-times text-2xl"></i>
                            Retardos y Faltas
                        </h3>
                    </div>
                    <div class="p-6">
                        <ol class="text-medium space-y-2 list-decimal ml-4 mb-4">
                            <li>Se considera retardo cuando la entrada es posterior a las <span
                                    class="text-primary font-medium"> 09:15</span> hrs.</li>
                            <li>Entre<span class="text-primary font-medium">09:00 y 09:15</span> hrs. se permite la
                                tolerancia, siempre que el colaborador cuente con la aprobación previa de su jefe directo o
                                supervisor.</li>
                            <li><span class="text-primary font-medium">Tres retardos No justificados</span> equivalen a una
                                falta injustificada, la cual será registrada como falta sin goce de sueldo.</li>
                        </ol>
                    </div>
                </div>
                <!-- home office -->
                <div
                    class="bg-white rounded-xl shadow-sm border border-slate-200 border-primary/10 overflow-hidden flex flex-col">
                    <div class="bg-primary/10 p-4 border-b border-primary/20">
                        <h3 class="text-lg font-bold text-primary flex items-center gap-2">
                            <i class="las la-home text-2xl"></i>
                            Homme Office
                        </h3>
                    </div>
                    <div class="p-6">
                        <ol class="text-medium space-y-2 list-decimal ml-4 mb-4">
                            <li>El<span class="text-primary font-medium"> Home office</span> podrá solicitarse y registrarse
                                en la aplicación de incidencias de Odoo.</li>
                            <li><span class="text-primary font-medium">Restriccines:</span> No se permite realizar home
                                office los días Lunes ni Viernes.</li>
                            <li>El incumplimiento de este lineamiento se considerará <span
                                    class="text-primary font-medium">falta administrativa</span>.</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
@push('js')
@endpush
