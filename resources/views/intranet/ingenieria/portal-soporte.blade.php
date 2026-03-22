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
                    <li aria-current="page">
                        <div class="flex items-center">
                            <i class="fas fa-chevron-right text-gray-400 mx-2"></i>
                            <span class="ml-1 text-sm text-primary font-medium md:ml-2">Soporte</span>
                        </div>
                    </li>
                </ol>
            </nav>
        </div>
    </div>

    <!-- Encabezado -->
    <header class="mt-8 mb-8">
        <h1 class="text-4xl mb-2 leading-tight font-semibold">Soporte Técnico
            Corporativo</h1>
        <p class="text-[#9c7349] text-lg font-normal mt-2">Bienvenido al portal de asistencia técnica. Encuentra soluciones
            rápidas o solicita ayuda
            especializada.</p>
    </header>

    </span>

    <div class="bg-white rounded-lg shadow p-6 mb-8">
        <div class="layout-content-container flex flex-col flex-1">
            <!-- Main Support Sections -->
            <div class="grid grid-cols-1 lg:grid-cols-1 gap-8">
                <!-- Section 1: Levantar Tickets -->
                <div class="flex flex-col bg-white rounded-xl shadow-sm border border-[#f4ede7] p-8 justify-between">
                    <div>
                        <div class="flex items-center gap-4 mb-6">
                            <div class="p-3 bg-primary/10 rounded-lg text-primary text-2xl">
                                <i class="las la-ticket-alt text-3xl"></i>
                            </div>
                            <div>
                                <h2 class="text-2xl font-bold text-[#1c140d]">Levantar Tickets</h2>
                                <p class="text-[#9c7349] text-sm">Asistencia directa de nuestro equipo IT</p>
                            </div>
                        </div>
                        <div class="bg-background-light p-6 rounded-xl mb-8">
                            <div class="mb-24 relative">
                                <div class="text-center mb-16">
                                    <h2 class="text-3xl font-extrabold text-slate-900  mb-4">
                                        ¿Qué debe tener un buen ticket?
                                    </h2>
                                    <p class="text-slate-500 dark:text-slate-400 italic">
                                        Sigue estos tres pilares para una resolución en tiempo récord.
                                    </p>
                                </div>
                                <div class="relative flex flex-col items-center">
                                    <!-- Vertical Line -->
                                    <div
                                        class="absolute h-full w-1 bg-gradient-to-b from-primary via-primary/50 to-transparent left-1/2 -translate-x-1/2 hidden md:block">
                                    </div>
                                    <!-- Pilar 1 -->
                                    <div
                                        class="relative w-full mb-16 flex flex-col md:flex-row items-center justify-between">
                                        <div class="w-full md:w-5/12 text-center md:text-right order-2 md:order-1">
                                            <h4 class="text-xl font-bold text-slate-900  mb-2">
                                                Información del incidente
                                            </h4>
                                            <p class="text-slate-900">
                                                Incluye un resumen claro, descripción detallada, tipo de incidente
                                                (hardware, software, red, etc.) y nivel de severidad.
                                            </p>
                                        </div>
                                        <div
                                            class="relative z-10 w-20 h-14 rounded-full bg-primary flex items-center justify-center text-white border-4 border-background-light mb-4 md:mb-0 order-1 md:order-2">
                                            <i class="las la-file-alt text-2xl"></i>
                                        </div>
                                        <div class="w-full md:w-5/12 order-3"></div>
                                    </div>
                                    <!-- Pilar 2 -->
                                    <div
                                        class="relative w-full mb-16 flex flex-col md:flex-row items-center justify-between">
                                        <div class="w-full md:w-5/12 order-3 md:order-1"></div>
                                        <div
                                            class="relative z-10 w-20 h-14 rounded-full bg-primary flex items-center justify-center text-white border-4 border-background-light mb-4 md:mb-0 order-1 md:order-2">
                                            <i class="las la-map-marker-alt text-2xl"></i>
                                        </div>
                                        <div class="w-full md:w-5/12 text-center md:text-left order-2 md:order-3">
                                            <h4 class="text-xl font-bold text-slate-900  mb-2">
                                                Datos del solicitante y ubicación
                                            </h4>
                                            <p class="text-slate-60">
                                                Indica nombre, correo electrónico, departamento y ubicación exacta
                                                donde ocurre el incidente.
                                            </p>
                                        </div>
                                    </div>
                                    <!-- Pilar 3 -->
                                    <div class="relative w-full flex flex-col md:flex-row items-center justify-between">
                                        <div class="w-full md:w-5/12 text-center md:text-right order-2 md:order-1">
                                            <h4 class="text-xl font-bold text-slate-900 mb-2">
                                                Sistema afectado y evidencia
                                            </h4>
                                            <p class="text-slate-900">
                                                Especifica equipo (nombre, IP, serial) o sistema involucrado y
                                                adjunta capturas, logs o fotografías del problema.
                                            </p>
                                        </div>
                                        <div
                                            class="relative z-10 w-20 h-14 rounded-full bg-primary flex items-center justify-center text-white border-4 border-background-light mb-4 md:mb-0 order-1 md:order-2">
                                            <i class="las la-laptop-medical text-2xl"></i>
                                        </div>
                                        <div class="w-full md:w-5/12 order-3"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="bg-amber-50 border-l-4 border-amber-400 rounded-lg p-4 flex gap-3 items-start">
                            <i class="las la-lightbulb text-3xl text-amber-500"></i>
                            <div class="flex flex-col gap-1">
                                <p class="text-sm font-bold text-amber-900">
                                    Consejo para un mejor soporte
                                </p>
                                <p class="text-sm text-amber-800">
                                    Nuestro equipo de IT aún <span class="font-semibold">no tiene poderes de
                                        clarividencia</span>.
                                    Describe tu incidente de forma
                                    <span class="font-semibold">clara, detallada y con el mayor contexto posible</span>.
                                </p>
                                <p class="text-sm text-amber-800">
                                    Esto nos ayudará a darte una <span class="font-semibold">solución más rápida y
                                        precisa</span>.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="flex flex-col bg-white rounded-xl shadow-sm border border-[#f4ede7] p-8">
                    <!-- Header -->
                    <div class="flex items-center gap-4 mb-6">
                        <div class="p-3 bg-primary/10 rounded-lg text-primary text-2xl">
                            <i class="las la-info text-3xl"></i>
                        </div>
                        <div>
                            <h2 class="text-2xl font-bold text-[#1c140d]">Cuándo levantar un ticket</h2>
                            <p class="text-[#9c7349] text-sm">Soporte que requiere intervención directa de nuestro equipo IT
                            </p>
                        </div>
                    </div>
                    <!-- Cards Grid -->
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 mb-6">
                        <!-- Card 1: Fallo de Hardware -->
                        <div
                            class="group p-6 rounded-xl border border-transparent hover:border-primary/20 hover:bg-primary/5 transition-all shadow-sm hover:shadow-md text-center">
                            <div class="flex justify-center mb-4">
                                <div class="p-4 bg-primary/10 rounded-full text-primary">
                                    <i class="las la-desktop text-3xl"></i>
                                </div>
                            </div>
                            <h3 class="font-semibold text-[#1c140d] mb-2">Fallo de Hardware</h3>
                            <p class="text-sm text-[#9c7349]">
                                Problemas con computadoras, impresoras, monitores o cualquier dispositivo que requiera
                                intervención física.
                            </p>
                        </div>
                        <!-- Card 2: Fallo de Software -->
                        <div
                            class="group p-6 rounded-xl border border-transparent hover:border-primary/20 hover:bg-primary/5 transition-all shadow-sm hover:shadow-md text-center">
                            <div class="flex justify-center mb-4">
                                <div class="p-4 bg-primary/10 rounded-full text-primary">
                                    <i class="las la-cogs text-3xl"></i>
                                </div>
                            </div>
                            <h3 class="font-semibold text-[#1c140d] mb-2">Fallo de Software</h3>
                            <p class="text-sm text-[#9c7349]">
                                Errores en aplicaciones, bloqueos o comportamientos inesperados que requieren revisión de
                                IT.
                            </p>
                        </div>
                        <!-- Card 3: Problemas de Correo -->
                        <div
                            class="group p-6 rounded-xl border border-transparent hover:border-primary/20 hover:bg-primary/5 transition-all shadow-sm hover:shadow-md text-center">
                            <div class="flex justify-center mb-4">
                                <div class="p-4 bg-primary/10 rounded-full text-primary">
                                    <i class="las la-envelope text-3xl"></i>
                                </div>
                            </div>
                            <h3 class="font-semibold text-[#1c140d] mb-2">Problemas de Correo</h3>
                            <p class="text-sm text-[#9c7349]">
                                Emails que no se envían, reciben errores o cuentas bloqueadas; requieren soporte técnico.
                            </p>
                        </div>
                        <!-- Card 4: Soporte dedicado -->
                        <div
                            class="group p-6 rounded-xl border border-transparent hover:border-primary/20 hover:bg-primary/5 transition-all shadow-sm hover:shadow-md text-center">
                            <div class="flex justify-center mb-4">
                                <div class="p-4 bg-primary/10 rounded-full text-primary">
                                    <i class="las la-user-clock text-3xl"></i>
                                </div>
                            </div>
                            <h3 class="font-semibold text-[#1c140d] mb-2">Casos que requieren tiempo de IT</h3>
                            <p class="text-sm text-[#9c7349]">
                                Situaciones que requieren intervención directa y tiempo de un técnico para resolver.
                            </p>
                        </div>
                        <!-- Card 5: Consultas simples (NO levantar ticket) -->
                        <div
                            class="group p-6 rounded-xl border border-transparent hover:border-primary/20 hover:bg-orange-100 transition-all shadow-sm hover:shadow-md text-center">
                            <div class="flex justify-center mb-4">
                                <div class="p-4 bg-orange-200 rounded-full text-orange-600">
                                    <i class="las la-comment-alt text-3xl"></i>
                                </div>
                            </div>
                            <h3 class="font-semibold text-[#1c140d] mb-2">Consultas simples</h3>
                            <p class="text-sm text-[#c82c09]">
                                Preguntas rápidas o aclaraciones que <strong>no requieren intervención técnica</strong>.
                                Para estos casos, no es necesario abrir un ticket.
                            </p>
                        </div>
                        <!-- Card 6: Apoyo Rapido -->
                        <div
                            class="group p-6 rounded-xl border border-transparent hover:border-primary/20 hover:bg-orange-100 transition-all shadow-sm hover:shadow-md text-center">
                            <div class="flex justify-center mb-4">
                                <div class="p-4 bg-orange-200 rounded-full text-orange-600">
                                    <i class="las la-comment-alt text-3xl"></i>
                                </div>
                            </div>
                            <h3 class="font-semibold text-[#1c140d] mb-2">Emergancias</h3>
                            <p class="text-sm text-[#9c7349]">
                                <strong>¿Es una emergencia crítica?</strong> Presiona 0000+ hasta
                                que se te inche el dedo, igual no se resuelve tu problema, pero se te olvida por el dolor.
                                Sonrie!!!.<i class="las la-grin-squint"></i>
                            </p>
                        </div>
                    </div>
                    <!-- Botón guía -->
                    <div class="flex flex-col gap-4">
                        <a href="{{ route('ingenieria.guia-tickets') }}"
                            class="flex items-center justify-center self-center px-6 py-3 gap-4 rounded-lg bg-primary text-white text-lg font-bold hover:bg-primary/90 transition-all shadow-lg shadow-primary/20">
                            Guía para levantar un Ticket
                            <i class="las la-graduation-cap text-4xl"></i>
                        </a>
                    </div>
                </div>

                <div
                    class="flex flex-col rounded-xl shadow-sm border border-[#f4ede7] p-8 opacity-40 bg-background-light pointer-events-none cursor-not-allowed">
                    <!-- Header -->
                    <div class="flex items-center gap-4 mb-8">
                        <div class="p-3 bg-primary/10 rounded-lg text-primary">
                            <i class="las la-book-open text-3xl"></i>
                        </div>
                        <div>
                            <h2 class="text-2xl font-bold text-[#1c140d]">Apoyo Técnico</h2>
                            <p class="text-[#9c7349] text-sm">Guías de apoyo en la solución de problemas comunes</p>
                        </div>
                    </div>
                    <!-- Cards Grid -->
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                        <!-- Card 1 -->
                        <a href="#"
                            class="group p-6 rounded-xl border border-transparent hover:border-primary/20 hover:bg-primary/5 transition-all shadow-sm hover:shadow-md text-center">
                            <div class="flex justify-center mb-4">
                                <div class="p-4 bg-primary/10 rounded-full text-primary">
                                    <i class="las la-envelope-open-text text-3xl"></i>
                                </div>
                            </div>
                            <h3 class="font-semibold text-[#1c140d] mb-2">Configuración de Correo</h3>
                            <p class="text-sm text-[#9c7349]">Guía paso a paso para configurar tu cuenta correctamente.</p>
                        </a>
                        <!-- Card 2 -->
                        <a href="#"
                            class="group p-6 rounded-xl border border-transparent hover:border-primary/20 hover:bg-primary/5 transition-all shadow-sm hover:shadow-md text-center">
                            <div class="flex justify-center mb-4">
                                <div class="p-4 bg-primary/10 rounded-full text-primary">
                                    <i class="las la-key text-3xl"></i>
                                </div>
                            </div>
                            <h3 class="font-semibold text-[#1c140d] mb-2">Acceso a VPN y Remoto</h3>
                            <p class="text-sm text-[#9c7349]">Conéctate de forma segura desde cualquier ubicación.</p>
                        </a>
                        <!-- Card 3 -->
                        <a href="#"
                            class="group p-6 rounded-xl border border-transparent hover:border-primary/20 hover:bg-primary/5 transition-all shadow-sm hover:shadow-md text-center">
                            <div class="flex justify-center mb-4">
                                <div class="p-4 bg-primary/10 rounded-full text-primary">
                                    <i class="las la-download text-3xl"></i>
                                </div>
                            </div>
                            <h3 class="font-semibold text-[#1c140d] mb-2">Instalación de Software</h3>
                            <p class="text-sm text-[#9c7349]">Descarga e instala aplicaciones autorizadas.</p>
                        </a>
                        <!-- Card 4 -->
                        <a href="#"
                            class="group p-6 rounded-xl border border-transparent hover:border-primary/20 hover:bg-primary/5 transition-all shadow-sm hover:shadow-md text-center">
                            <div class="flex justify-center mb-4">
                                <div class="p-4 bg-primary/10 rounded-full text-primary">
                                    <i class="las la-lock text-3xl"></i>
                                </div>
                            </div>
                            <h3 class="font-semibold text-[#1c140d] mb-2">Cambio de Contraseña</h3>
                            <p class="text-sm text-[#9c7349]">Actualiza tu contraseña de manera segura.</p>
                        </a>
                    </div>
                </div>

            </div>
            <!-- Frequently Asked Section -->
            <div class="mt-12">
                <h3 class="text-[#1c140d] text-2xl font-bold mb-6">Preguntas Frecuentes</h3>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <div class="p-4 bg-white rounded-lg border border-[#f4ede7]">
                        <h4 class="font-bold mb-2">¿Cómo reporto un fallo de red?</h4>
                        <p class="text-sm text-[#9c7349]">Primero verifica que el cable esté conectado, luego levanta un
                            ticket
                            categoría 'Infraestructura'.</p>
                    </div>
                    <div class="p-4 bg-white rounded-lg border border-[#f4ede7]">
                        <h4 class="font-bold mb-2">¿Dónde solicito equipo nuevo?</h4>
                        <p class="text-sm text-[#9c7349]">Las solicitudes de hardware requieren aprobación de tu jefe
                            directo
                            vía portal administrativo.</p>
                    </div>
                    <div class="p-4 bg-white rounded-lg border border-[#f4ede7]">
                        <h4 class="font-bold mb-2">Acceso a carpetas compartidas</h4>
                        <p class="text-sm text-[#9c7349]">Solicita permisos enviando el nombre de la carpeta y tu ID de
                            empleado
                            en un ticket.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('js')
@endpush
