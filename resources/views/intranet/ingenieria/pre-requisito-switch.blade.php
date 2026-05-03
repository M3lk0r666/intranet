@extends('layouts.intranet')

@section('title', 'Checklist Implementación Switches')

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
                    <li>
                        <div class="flex items-center">
                            <i class="fas fa-chevron-right text-gray-400 mx-2"></i>
                            <a href="{{ route('ingenieria.instalacion-switch') }}"
                                class="ml-1 text-sm text-gray-600 hover:text-orange-600 md:ml-2">Instalación Switches
                            </a>
                        </div>
                    </li>
                    <li aria-current="page">
                        <div class="flex items-center">
                            <i class="fas fa-chevron-right text-gray-400 mx-2"></i>
                            <span class="ml-1 text-sm text-primary font-medium md:ml-2">Pre-requistos instalacion de
                                Switches</span>
                        </div>
                    </li>
                </ol>
            </nav>
        </div>
    </div>

    <div class="text-center mb-10 mt-8">
        <h1 class="text-4xl font-black text-slate-900 uppercase">
            Checklist <span class="text-primary">Pre-Implementación Switches</span>
        </h1>
        <p class="text-slate-600 mt-2">
            Guía para recopilación de información previa a la instalación de switches en sitio.
        </p>
    </div>

    <div class="bg-white rounded-2xl border border-slate-200 p-5 mb-8">
        <div class="flex flex-col lg:flex-row gap-8">
            <aside class="lg:w-64 flex-shrink-0">
                <div class="sticky top-24 space-y-6" id="chapter-aside">
                    <!-- Bloque extra intacto -->
                    <div class="bg-white border border-slate-200 rounded-xl p-5">
                        <p class="text-xs font-semibold text-slate-500 uppercase tracking-wide mb-4">
                            Descargar Recursos
                        </p>
                        <div class="space-y-2">
                            <a href="{{ route('ingenieria.checklist-switches') }}"
                                class="group flex items-center justify-between w-full px-3 py-2 rounded-lg text-sm font-medium text-slate-600 bg-slate-50 hover:bg-orange-50 hover:text-orange-600 transition">
                                <span>Esta guia</span>
                                <i class="las la-file-pdf text-slate-300 group-hover:text-orange-500"></i>
                            </a>
                            <a href="{{ route('ingenieria.instalacion-switch') }}"
                                class="group flex flex-row-reverse items-center justify-between w-full px-4 py-2 rounded-lg text-sm font-medium text-slate-600 bg-slate-50 hover:bg-orange-50 hover:text-orange-600 transition-colors duration-300">
                                <span>Regresar</span>
                                <i
                                    class="las la-arrow-left text-slate-300 group-hover:text-orange-500 group-hover:-translate-x-1 transition-all duration-300"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </aside>
            <article class="flex-grow max-w-4xl lg:max-w-6xl space-y-16">
                <!-- 🔴 ALERTA -->
                <div class="bg-red-50 border-l-4 border-red-500 p-4 rounded mb-6">
                    <strong>IMPORTANTE:</strong>
                    Esta información debe ser validada antes de la ventana de instalación para evitar retrasos o fallas.
                </div>
                <section class="scroll-mt-32" id="previas">
                    <div class="flex items-center gap-4 mb-6">
                        <div class="w-10 h-10 rounded-xl bg-primary/10 flex items-center justify-center text-primary">
                            <i class="las la-brain"></i>
                        </div>
                        <h2 class="text-2xl font-bold text-slate-900">1. Acceso y Coordinación</h2>
                    </div>
                    <div class="bg-white rounded-2xl border border-slate-200 p-8 shadow-sm">
                        <ul class="space-y-3 text-sm">
                            <li>✔ Acceso al sitio en fecha y hora acordada</li>
                            <li>✔ Acceso anticipado para inspección y etiquetado</li>
                            <li>✔ Contacto responsable en sitio</li>
                            <li>✔ Validación de horarios (ventana de cambio)</li>
                        </ul>
                    </div>
                </section>
                <section class="scroll-mt-32" id="cambio">
                    <div class="flex items-center gap-4 mb-6">
                        <div class="w-10 h-10 rounded-xl bg-primary/10 flex items-center justify-center text-primary">
                            <i class="las la-cog"></i>
                        </div>
                        <h2 class="text-2xl font-bold text-slate-900">2. Infraestructura Fisica</h2>
                    </div>
                    <div class="bg-white rounded-2xl border border-slate-200 p-8 shadow-sm">
                        <ul class="space-y-3 text-sm">
                            <li>✔ Ubicación física del switch definida (IDF / Rack)</li>
                            <li>✔ Evidencia fotográfica del rack</li>
                            <li>✔ Accesibilidad (altura / herramientas requeridas)</li>
                            <li>✔ Espacio disponible en rack</li>
                            <li>✔ Tornillería disponible</li>
                            <li>✔ Alimentación eléctrica suficiente</li>
                            <li>✔ Posibilidad de instalación en paralelo</li>
                        </ul>
                        <div class="bg-orange-50 border-l-4 border-orange-500 p-4 mt-4">
                            Validar si el sitio permite instalación paralela para minimizar impacto.
                        </div>
                    </div>
                </section>
                <section class="scroll-mt-32" id="verificacion">
                    <div class="flex items-center gap-4 mb-6">
                        <div class="w-10 h-10 rounded-xl bg-primary/10 flex items-center justify-center text-primary">
                            <i class="las la-tasks"></i>
                        </div>
                        <h2 class="text-2xl font-bold text-slate-900">3. Estado Actual de Equipos</h2>
                    </div>
                    <div class="bg-white rounded-2xl border border-slate-200 p-8 shadow-sm">
                        <ul class="space-y-3 text-sm">
                            <li>✔ Tipo de instalación (Standalone / Stack)</li>
                            <li>✔ Número de switches en stack</li>
                            <li>✔ Distribución en rack</li>
                            <li>✔ Estado físico general</li>
                        </ul>
                    </div>
                </section>
                <section class="scroll-mt-32" id="finales">
                    <div class="flex items-center gap-4 mb-6">
                        <div class="w-10 h-10 rounded-xl bg-primary/10 flex items-center justify-center text-primary">
                            <i class="las la-clipboard-check"></i>
                        </div>
                        <h2 class="text-2xl font-bold text-slate-900">4. Accesos y Configuración</h2>
                    </div>
                    <div class="bg-white rounded-2xl border border-slate-200 p-8 shadow-sm">
                        <ul class="space-y-3 text-sm">
                            <li>✔ Usuario y contraseña validados</li>
                            <li>✔ Backup de configuración actual</li>
                            <li>✔ Revisión de configuración con equipo de ingeniería</li>
                        </ul>
                    </div>
                </section>
                <section class="scroll-mt-32" id="retorno">
                    <div class="flex items-center gap-4 mb-6">
                        <div class="w-10 h-10 rounded-xl bg-red-50 flex items-center justify-center text-red-600">
                            <i class="las la-exclamation-triangle"></i>
                        </div>
                        <h2 class="text-2xl font-bold text-slate-900">5. Validación con Cliente</h2>
                    </div>
                    <div class="bg-white rounded-2xl border border-red-100 p-8 shadow-sm">
                        <ul class="space-y-3 text-sm">
                            <li>✔ Procedimiento de pruebas definido</li>
                            <li>✔ Validación de conectividad</li>
                            <li>✔ Pruebas de servicios críticos</li>
                            <li>✔ Confirmación operativa por cliente</li>
                        </ul>
                    </div>
                </section>
                <section class="scroll-mt-32" id="retorno">
                    <div class="flex items-center gap-4 mb-6">
                        <div class="w-10 h-10 rounded-xl bg-red-50 flex items-center justify-center text-red-600">
                            <i class="las la-exclamation-triangle"></i>
                        </div>
                        <h2 class="text-2xl font-bold text-slate-900">6. Procesos Administrativos</h2>
                    </div>
                    <div class="bg-white rounded-2xl border border-red-100 p-8 shadow-sm">
                        <ul class="space-y-3 text-sm">
                            <li>✔ Procedimiento de retiro de equipos (pase de salida)</li>
                            <li>✔ Registro de equipos retirados</li>
                            <li>✔ Validación con seguridad del sitio</li>
                        </ul>
                    </div>
                </section>
                <section class="scroll-mt-32" id="retorno">
                    <div class="flex items-center gap-4 mb-6">
                        <div class="w-10 h-10 rounded-xl bg-red-50 flex items-center justify-center text-red-600">
                            <i class="las la-exclamation-triangle"></i>
                        </div>
                        <h2 class="text-2xl font-bold text-slate-900">7. Datos de Equipos</h2>
                    </div>
                    <div class="bg-white rounded-2xl border border-red-100 p-8 shadow-sm">
                        <ul class="space-y-3 text-sm">
                            <li>✔ Seriales de equipos</li>
                            <li>✔ Tipo (Acceso / Core)</li>
                            <li>✔ Standalone o Stack</li>
                            <li>✔ Cantidad en stack</li>
                            <li>✔ Modelos/series</li>
                            <li>✔ Credenciales de acceso</li>
                            <li>✔ Etiquetado correcto (equipo y cableado)</li>
                            <li>✔ Evidencia fotográfica del rack</li>
                        </ul>
                    </div>
                </section>
                <section class="scroll-mt-32" id="retorno">
                    <div class="flex items-center gap-4 mb-6">
                        <div class="w-10 h-10 rounded-xl bg-red-50 flex items-center justify-center text-red-600">
                            <i class="las la-exclamation-triangle"></i>
                        </div>
                        <h2 class="text-2xl font-bold text-slate-900">8. Informacion Técnica (comandos)</h2>
                    </div>
                    <div class="bg-white rounded-2xl border border-red-100 p-8 shadow-sm">
                        <div class="bg-slate-50 p-4 rounded-xl text-xs font-mono space-y-1">
                            show switch detail <br>
                            show version detail <br>
                            show configuration <br>
                            show vlan <br>
                            show iproute <br>
                            show edp ports all <br>
                            show lldp neighbors <br>
                            show ports no-refresh <br>
                        </div>
                        <div class="mt-4 bg-blue-50 border-l-4 border-blue-500 p-4">
                            <strong>Stack adicional:</strong><br>
                            show stacking <br>
                            show slot
                        </div>
                    </div>
                </section>
                <section class="scroll-mt-32" id="retorno">
                    <div class="flex items-center gap-4 mb-6">
                        <div class="w-10 h-10 rounded-xl bg-red-50 flex items-center justify-center text-red-600">
                            <i class="las la-exclamation-triangle"></i>
                        </div>
                        <h2 class="text-2xl font-bold text-slate-900">9. Recomendaciones Técnicas</h2>
                    </div>
                    <div class="bg-white rounded-2xl border border-red-100 p-8 shadow-sm">
                        <ul class="space-y-3 text-sm">
                            <li>✔ Validar versión de firmware antes de instalación</li>
                            <li>✔ Confirmar compatibilidad entre switches (stack)</li>
                            <li>✔ Verificar VLANs y rutas existentes</li>
                            <li>✔ Documentar topología actual</li>
                            <li>✔ Preparar rollback</li>
                        </ul>
                    </div>
                </section>
            </article>
        </div>
    </div>

@endsection
