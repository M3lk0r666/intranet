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
                    <li>
                        <div class="flex items-center">
                            <i class="fas fa-chevron-right text-gray-400 mx-2"></i>
                            <a href="{{ route('intranet.estructurainterna.admnistracion') }}"
                                class="ml-1 text-sm text-gray-600 hover:text-orange-600 md:ml-2">Administración</a>
                        </div>
                    </li>

                    <li aria-current="page">
                        <div class="flex items-center">
                            <i class="fas fa-chevron-right text-gray-400 mx-2"></i>
                            <span class="ml-1 text-sm text-primary font-medium md:ml-2">RH - Incidencias</span>
                        </div>
                    </li>
                </ol>
            </nav>
        </div>
    </div>

    <!-- Encabezado -->
    <div class="mt-8 mb-8">
        <h1 class="text-3xl font-bold text-gray-800 mb-2">Proceso Ingreso Incidencias</h1>
        <p class="text-gray-600">Documentar de manera formal, clara y oportuna cualquier situación que afecte el desempeño
            laboral, la operación, el cumplimiento de normas internas o el clima organizacional, con el fin de dar
            seguimiento, aplicar acciones correctivas y prevenir recurrencias.</p>
    </div>

    <div class="text-center mb-16 mt-8">
        <h1 class="text-5xl font-black font-display tracking-tight text-slate-900 uppercase">
            Ingreso <span class="text-primary  uppercase">incidencia Nomina</span>
        </h1>
        <p></p>
        <p class="text-slate-600 mt-6 text-lg">Tipo de incidencia y ejecución</p>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-12 gap-8">
        <!-- Left Column: Objective & QR -->
        <div class="lg:col-span-4 space-y-6">
            <!-- Objective Card -->
            <div class="bg-white rounded-xl shadow-sm border border-orange-500 dark:border-primary/10 overflow-hidden">
                <div class="p-6">
                    <div class="flex items-center gap-3 mb-4 text-primary">
                        <i class="las la-trophy text-3xl"></i>
                        <h2 class="text-xl font-bold text-orange-500">Objetivo del Proceso</h2>
                    </div>
                    <p class="text-slate-600 leading-relaxed text-justify">
                        Registrar las incidencias que deriven en la ausencia del colaborador de la empresa, existen
                        diferentes tipos de incidencias, las cuales son detallas a continuación, para saber que campos son
                        los requeridos al momento de capturar la información.
                    </p>
                    <div class="mt-6 p-4 bg-primary/5 rounded-lg border-l-4 border-primary">
                        <p class="text-sm font-semibold text-primary flex items-center gap-2">
                            <i class="las la-check-circle"></i>
                            Cumplimiento Obligatorio
                        </p>
                        <p class="text-xs text-slate-500 mt-1">Este proceso debe ser completado antes de
                            las fechas de corte de nómina quincenal.</p>
                    </div>
                </div>
            </div>
            <!-- QR Section Card -->
            <div
                class="bg-white text-slate-900 rounded-xl shadow-sm border-2 border-primary/20 overflow-hidden relative group">
                <div class="relative p-6 flex flex-col items-center text-center">
                    {{-- <div class="w-48 h-48 bg-white p-4 rounded-xl shadow-inner mb-6 transition-transform group-hover:scale-105 duration-300 cursor-pointer"
                        onclick="openModal()">
                        <img class="w-full h-full object-contain"
                            src="https://lh3.googleusercontent.com/aida-public/AB6AXuChTevV17OaSf57Y0Q9rnWPZsQ-0Mne4Nu-shQPsiidxiDA_C41gsafZII6MVzTa76SEx-8pjWyIxoot9Jg-tUDqAw_ScFSKkRZmdQK9ViYHLH_DMCT3Biux8VX44VSgbbuJHPby5mVCWkRnY_sKldGgi0OkitakL5s3wO-xgz9tMw0vPhOwcwrH-AqTD2zdsMJvYsGXE3cRts6esISg1zQKeAugRHfkRxTyI8c-LLKikYfe4YkyPqhKcOu3-mhx5eDPmKNTssNK3wb"
                            alt="Código QR">
                    </div> --}}
                    <h3 class="text-xl font-bold mb-2 text-slate-900">Levantamiento de Incidencia</h3>
                    <p class="text-slate-600 text-sm leading-relaxed mb-6">
                        Se tendrán Posters en la oficina para poder hacer este registro de forma rápida desde tu dispositivo
                        móvil. Escanea el código para ir directo al formulario de captura.
                    </p>
                    <a href="https://netjernetworksproduccion.odoo.com/vacaciones-rh" target="_blank"
                        class="w-full bg-primary text-white py-1 rounded-lg font-bold flex items-center justify-center gap-2 hover:bg-primary/90 transition-all shadow-md shadow-primary/10">
                        <i class="las la-external-link-alt text-xl"></i>
                        Ir al portal Incidencias
                    </a>
                </div>
            </div>
            <!-- Modal QR -->
            {{-- <div id="qrModal" class="fixed inset-0 bg-black/60 backdrop-blur-sm hidden items-center justify-center z-50">
                <div class="bg-white rounded-2xl p-8 relative shadow-2xl animate-fadeIn">
                    <!-- Botón cerrar -->
                    <button onclick="closeModal()" class="absolute top-4 right-4 text-gray-500 hover:text-black text-xl">
                        ✕
                    </button>
                    <h3 class="text-xl font-bold text-center mb-6">
                        Escanea el Código QR
                    </h3>
                    <img src="https://lh3.googleusercontent.com/aida-public/AB6AXuChTevV17OaSf57Y0Q9rnWPZsQ-0Mne4Nu-shQPsiidxiDA_C41gsafZII6MVzTa76SEx-8pjWyIxoot9Jg-tUDqAw_ScFSKkRZmdQK9ViYHLH_DMCT3Biux8VX44VSgbbuJHPby5mVCWkRnY_sKldGgi0OkitakL5s3wO-xgz9tMw0vPhOwcwrH-AqTD2zdsMJvYsGXE3cRts6esISg1zQKeAugRHfkRxTyI8c-LLKikYfe4YkyPqhKcOu3-mhx5eDPmKNTssNK3wb"
                        class="w-80 max-w-full mx-auto rounded-lg shadow-lg" alt="Código QR Grande">
                </div>
            </div> --}}


        </div>
        <!-- Right Column: Process Flows -->
        <div class="lg:col-span-8 space-y-8">
            <!-- Payroll Incident Header -->
            <div class="arrow-header bg-orange-600 text-white px-8 py-4 w-full md:w-3/4 flex items-center gap-4 shadow-md">
                <i class="las la-clipboard-check text-3xl"></i>
                <span class="text-xl font-black uppercase tracking-wider">Tipo de incidencia Nómina</span>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Vacations/Incapacity -->
                <div
                    class="bg-white rounded-xl shadow-sm border border-slate-200 border-primary/10 overflow-hidden flex flex-col">
                    <div class="bg-primary/10 p-4 border-b border-primary/20">
                        <h3 class="text-lg font-bold text-primary flex items-center gap-2">
                            <i class="las la-map-marked-alt text-2xl"></i>
                            Vacaciones, Incapacidad
                        </h3>
                    </div>
                    <div class="p-6">

                        <ol class="text-medium space-y-2 list-decimal ml-4 mb-4">
                            <li>Se deberá informar al Jefe Inmediato, las fechas que se están solicitando.</li>
                            <li>Una vez avisado y autorizado el Jefe Inmediato se ingresa a registrar la información, usando
                                el código QR.</li>
                            <li>Seleccionar <span class="text-primary font-medium">Su nombre</span></li>
                            <li>Seleccionar Opción (Vacaciones, Incapacidad).</li>
                            <li>Ingresar la <span class="text-primary font-medium">Fecha Inicio y Fecha Fin</span> (si es
                                solo un día se ingresa la misma feche en ambos
                                campos).</li>
                            <li>En caso de las <span class="text-primary font-medium">Vacaciones</span> se debe ingresar el
                                periodo en el cual se deben descontar los días
                                solicitados, en los otros conceptos no se requiere.</li>
                            <li><span class="text-primary font-medium">Comentarios</span>, si se requiere ingresar algún
                                comentario o apunte, usar este campo (indicar si
                                estará disponible en caso de urgencia).</li>
                            <li><span class="text-primary font-medium">Documentos</span>, si se requiere adicionar algún
                                documento.</li>
                            <li><span class="text-primary font-medium">Documento Incapacidad</span> (ingresar el documento
                                expedido que justifica el periodo de
                                incapacidad).</li>
                            <li><span class="text-primary font-medium">Horario Evento</span> (No Aplica).</li>
                            <li>Oprimir el Botón <span class="text-primary font-medium">Enviar</span></li>
                        </ol>
                    </div>
                </div>
                <!-- Home Office-->
                <div
                    class="bg-white rounded-xl shadow-sm border border-slate-200 border-primary/10 overflow-hidden flex flex-col">
                    <div class="bg-primary/10 p-4 border-b border-primary/20">
                        <h3 class="text-lg font-bold text-primary flex items-center gap-2">
                            <i class="las la-home text-2xl"></i>
                            Home Office
                        </h3>
                    </div>
                    <div class="p-6">
                        <ol class="text-medium space-y-2 list-decimal ml-4 mb-4">
                            <li>Se deberá informar al Jefe Inmediato, las fechas que se están solicitando, garantizando:
                                <ul>
                                    <li>✓ La continuidad operativa.</li>
                                    <li>✓ El cumplimiento de metas e indicadores establecidos por cada área.</li>
                                    <li>✓ Mantener la jornada laboral en el horario de 09:00 a 18:00 hrs, teniendo en cuanta
                                        la hora de descanso de las 14:00 a las 15:00 hrs.</li>
                                    <li>✓ No solicitar Home Office en días lunes o viernes.</li>
                                </ul>
                            </li>
                            <li>Una vez avisado y autorizado el Jefe Inmediato se ingresa a registrar la información, usando
                                el código QR.</li>
                            <li>Seleccionar <span class="text-primary font-medium">Su nombre</span></li>
                            <li>Seleccionar Opción (Home Office).</li>
                            <li>Ingresar la <span class="text-primary font-medium">Fecha Inicio y Fecha Fin</span> (si es
                                solo un día se ingresa la misma fecha en ambos
                                campos).</li>
                            <li><span class="text-primary font-medium">Comentarios</span>, indicar la persona que autorizo.
                            </li>
                            <li><span class="text-primary font-medium">Documentos</span>, (no aplica).</li>
                            <li><span class="text-primary font-medium">Documento Incapacidad</span> (no aplica).</li>
                            <li><span class="text-primary font-medium">Horario Evento</span> (No Aplica, asumiendo que es
                                la
                                jornada normal de labores 09:00 a 18:00 hrs y hora de descanso 14:00 a 15:00 hrs.).</li>
                            <li>Oprimir el Botón <span class="text-primary font-medium">Enviar</span></li>
                        </ol>
                        <div class="bg-slate-100 p-6 rounded-xl border border-dashed  border-slate-700">
                            <h4 class="font-bold mb-2 flex items-center gap-2 text-blue-800">
                                <i class="las la-info text-2xl text-blue-600"></i>
                                Notas sobre Home Office
                            </h4>
                            <p class="text-sm text-slate-600 text-justify">
                                La modalidad de Home Office está sujeta a la aprobación de la Gerencia según el desempeño y
                                tipo de posición. Es indispensable contar con las herramientas tecnológicas necesarias y una
                                conexión estable para garantizar la continuidad operativa.
                            </p>
                        </div>
                    </div>
                </div>
                <!-- Trabajo OnSite -->
                <div
                    class="bg-white rounded-xl shadow-sm border border-slate-200 border-primary/10 overflow-hidden flex flex-col">
                    <div class="bg-primary/10 p-4 border-b border-primary/20">
                        <h3 class="text-lg font-bold text-primary flex items-center gap-2">
                            <i class="las la-building text-2xl"></i>
                            Trabajo On Site
                        </h3>
                    </div>
                    <div class="p-6">
                        <ol class="text-medium space-y-2 list-decimal ml-4 mb-4">
                            <li>Se planeara cuando se realice.
                                <ol>
                                    <div class="bg-purple-50 p-3 rounded-lg border border-purple-100">
                                        <h5 class="font-bold text-xs mb-1 text-purple-700">1.- Visita a un Cliente</h5>
                                        <ul class="text-xs text-purple-600 space-y-1">
                                            <li>✓ Levantamiento de información</li>
                                            <li>✓ Presentación de soluciones</li>
                                        </ul>
                                    </div>
                                    <br>
                                    <li>
                                        <div class="bg-purple-50 p-3 rounded-lg border border-purple-100">
                                            <h5 class="font-bold text-xs mb-1 text-purple-700">2.- Actividad en las
                                                instalaciones del cliente</h5>
                                            <ul class="text-xs text-purple-600 space-y-1">
                                                <li>✓ Instalación</li>
                                                <li>✓ Curso</li>
                                                <li>✓ Ventana de mantenimiento</li>
                                                <li>✓ POC</li>
                                                <li>✓ Site Survey</li>
                                            </ul>
                                        </div>
                                    </li>
                                </ol>
                            </li>
                            <li>Seleccionar <span class="text-primary font-medium">Su nombre</span></li>
                            <li>Seleccionar Opción <span class="text-primary font-medium">(Trabajo On Site)</span>.</li>
                            <li>Ingresar la <span class="text-primary font-medium">Fecha Inicio y Fecha Fin</span> (si es
                                solo un día se ingresa la misma feche en ambos
                                campos).</li>
                            <li><span class="text-primary font-medium">Periodo</span> (No aplica).</li>
                            <li><span class="text-primary font-medium">Comentarios</span>: Indicar la razón de la
                                visita-actividad con el cliente, indicando la persona que autoriza la actividad y el cliente
                                y en su caso indicar si al termino de la actividad regresara a la oficina.</li>
                            <li><span class="text-primary font-medium">Documentos</span>, si se requiere adicionar algún
                                documento.</li>
                            <li><span class="text-primary font-medium">Documento Incapacidad</span> (No aplica).</li>
                            <li><span class="text-primary font-medium">Horario Evento</span>, Indicar el horario en que
                                estará trabajando en sitio.</li>
                            <li>Oprimir el Botón <span class="text-primary font-medium">Enviar</span></li>
                        </ol>
                    </div>
                </div>
                <!-- permiso -->
                <div
                    class="bg-white rounded-xl shadow-sm border border-slate-200 border-primary/10 overflow-hidden flex flex-col">
                    <div class="bg-primary/10 p-4 border-b border-primary/20">
                        <h3 class="text-lg font-bold text-primary flex items-center gap-2">
                            <i class="las la-user-clock text-2xl"></i>
                            Permiso
                        </h3>
                    </div>
                    <div class="p-6">
                        <ol class="text-medium space-y-2 list-decimal ml-4 mb-4">
                            <li>Se usara cuando.
                                <ol>
                                    <div class="bg-orange-50 p-3 rounded-lg border border-orange-100">
                                        <h5 class="font-bold text-xs mb-1 text-orange-700">1.- Se solicite un permiso de
                                            carácter personal a el Jefe Inmediato</h5>
                                        <ul class="text-xs text-orange-600 space-y-1">
                                            <li>✓ Llegada posterior a la hora de entrada.</li>
                                            <li>✓ Salida-Entrada durante el horario laboral.</li>
                                            <li>✓ Salida antes del horario de salida.</li>
                                        </ul>
                                    </div>
                                </ol>
                            </li>
                            <li>Seleccionar <span class="text-primary font-medium">Su nombre</span></li>
                            <li>Seleccionar Opción <span class="text-primary font-medium">(Permiso)</span>.</li>
                            <li>Ingresar la <span class="text-primary font-medium">Fecha Inicio y Fecha Fin</span> (si es
                                solo un día se ingresa la misma feche en ambos
                                campos).</li>
                            <li><span class="text-primary font-medium">Periodo</span> (No aplica).</li>
                            <li><span class="text-primary font-medium">Comentarios</span>: Indicar la razón del permiso y
                                de la persona que autoriza</li>
                            <li><span class="text-primary font-medium">Documentos</span>, si se requiere adicionar algún
                                documento.</li>
                            <li><span class="text-primary font-medium">Documento Incapacidad</span> (No aplica).</li>
                            <li><span class="text-primary font-medium">Horario Evento</span>, Indicar el horario en que
                                se solicita el permiso.</li>
                            <li>Oprimir el Botón <span class="text-primary font-medium">Enviar</span></li>
                        </ol>
                    </div>
                </div>
                <!-- otros -->
                <div
                    class="bg-white rounded-xl shadow-sm border border-slate-200 border-primary/10 overflow-hidden flex flex-col">
                    <div class="bg-primary/10 p-4 border-b border-primary/20">
                        <h3 class="text-lg font-bold text-primary flex items-center gap-2">
                            <i class="las la-map-marked-alt text-2xl"></i>
                            Otros
                        </h3>
                    </div>
                    <div class="p-6">
                        <ol class="text-medium space-y-2 list-decimal ml-4 mb-4">
                            <li>Se usara cuando se realice una actividad que implica la no asistencia a la oficina o llegada
                                después del horario de entrada.
                                <ol>
                                    <div class="bg-green-50 p-3 rounded-lg border border-green-100">
                                        <ul class="text-xs text-green-600 space-y-1">
                                            <li>✓ Eventos con cliente.</li>
                                            <li>✓ Expos.</li>
                                            <li>✓ Conferencias.</li>
                                        </ul>
                                    </div>
                                </ol>
                            </li>
                            <li>Seleccionar <span class="text-primary font-medium">Su nombre</span></li>
                            <li>Seleccionar Opción <span class="text-primary font-medium">(Otros)</span>.</li>
                            <li>Ingresar la <span class="text-primary font-medium">Fecha Inicio y Fecha Fin</span> (si es
                                solo un día se ingresa la misma feche en ambos
                                campos).</li>
                            <li><span class="text-primary font-medium">Periodo</span> (No aplica).</li>
                            <li><span class="text-primary font-medium">Comentarios</span>: Indicar la razón de la actividad
                                a realizar fuera de la oficina, indicando la persona que autoriza la actividad y la
                                actividad a realizar y en su caso indicar si al termino de la actividad regresara a la
                                oficina.</li>
                            <li><span class="text-primary font-medium">Documentos</span>, si se requiere adicionar algún
                                documento.</li>
                            <li><span class="text-primary font-medium">Documento Incapacidad</span> (No aplica).</li>
                            <li><span class="text-primary font-medium">Horario Evento</span>, Indicar el horario en que
                                se estará fuera de la oficina.</li>
                            <li>Oprimir el Botón <span class="text-primary font-medium">Enviar</span></li>
                        </ol>
                    </div>
                </div>

            </div>

        </div>
    </div>

@endsection
@push('js')
    {{--  <script>
        function openModal() {
            const modal = document.getElementById('qrModal');
            modal.classList.remove('hidden');
            modal.classList.add('flex');
        }

        function closeModal() {
            const modal = document.getElementById('qrModal');
            modal.classList.remove('flex');
            modal.classList.add('hidden');
        }

        // Cerrar al hacer click fuera del contenido
        document.getElementById('qrModal').addEventListener('click', function(e) {
            if (e.target === this) {
                closeModal();
            }
        });

        // Cerrar con tecla ESC
        document.addEventListener('keydown', function(e) {
            if (e.key === "Escape") {
                closeModal();
            }
        });
    </script> --}}
@endpush
