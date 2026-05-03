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
                            <span class="ml-1 text-sm text-primary font-medium md:ml-2">Instalación Firewall</span>
                        </div>
                    </li>
                </ol>
            </nav>
        </div>
    </div>

    <!-- Encabezado -->
    <div class="text-center mb-16 mt-8">
        <h1 class="text-4xl font-black font-display tracking-tight text-slate-900 uppercase">
            Guia<span class="text-primary  uppercase"> Implementación Firewall</span>
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
                            <a href="{{ route('ingenieria.instalacion-firewall-pdf') }}"
                                class="group flex items-center justify-between w-full px-3 py-2 rounded-lg text-sm font-medium  text-slate-600 bg-slate-50  hover:bg-orange-50 hover:text-orange-600 transition-colors duration-300">
                                <span>Esta Guía</span>
                                <i
                                    class="las la-arrow-right text-slate-300 group-hover:text-orange-500 group-hover:translate-x-1 transition-all duration-300"></i>
                            </a>

                            {{-- <a href="#"
                                class="group flex items-center justify-between w-full px-3 py-2 rounded-lg text-sm font-medium text-slate-600 bg-slate-50 hover:bg-orange-50 hover:text-orange-600transition-colors duration-300">
                                <span>Plan de Actividades</span>
                                <i
                                    class="las la-arrow-right text-slate-300 group-hover:text-orange-500 group-hover:translate-x-1 transition-all duration-300"></i>
                            </a> --}}

                            {{-- <a href="#"
                                class="group flex items-center justify-between w-full px-3 py-2 rounded-lg text-sm font-medium text-slate-600 bg-slate-50 hover:bg-orange-50 hover:text-orange-600 transition-colors duration-300">
                                <span>Reporte Actividades</span>
                                <i
                                    class="las la-arrow-right text-slate-300 group-hover:text-orange-500 group-hover:translate-x-1 transition-all duration-300"></i>
                            </a> --}}
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
            <article class="flex-grow max-w-4xl lg:max-w-6xl space-y-16">
                <div>
                    <span
                        class="inline-flex items-center px-3 py-1 rounded-full bg-orange-100 text-primary text-xs font-bold mb-4">
                        GUÍA DE IMPLEMENTACIÓN v1.0
                    </span>
                    <h1 class="text-4xl font-extrabold text-slate-900 mb-4">Instalacion de seguridad perimetral - Firewall
                    </h1>
                    <p class="text-lg text-slate-600 leading-relaxed">
                        Guía detallada para el proceso de instalación y configuración del firewall, asegurando el
                        cumplimiento de estándares corporativos y minimizando el tiempo de inactividad.
                    </p>
                </div>
                <section class="scroll-mt-32" id="previas">
                    <div class="flex items-center gap-4 mb-6">
                        <div class="w-10 h-10 rounded-xl bg-primary/10 flex items-center justify-center text-primary">
                            <i class="las la-brain"></i>
                        </div>
                        <h2 class="text-2xl font-bold text-slate-900">1. Actividades Previas</h2>
                    </div>
                    <div class="bg-white rounded-2xl border border-slate-200 p-8 shadow-sm">
                        <ol class="lista">
                            <li class="text-sm font-bold uppercase text-slate-400 tracking-wider">Analisis y
                                Planificación</li>
                            <ul class="space-y-3 py-6">
                                <li class="flex items-center gap-3 text-slate-800 text-sm">
                                    <i class="las la-check-circle text-emerald-500 text-xl"></i>
                                    Identificar necesidades de seguridad según la topología de red.
                                </li>
                                <li class="flex items-center gap-3 text-slate-800 text-sm">
                                    <i class="las la-check-circle text-emerald-500 text-xl"></i>
                                    Determinar el tipo de firewall (hardware/software, perimetral/interno, de próxima
                                    generación, etc.).
                                </li>
                                <li class="flex items-center gap-3 text-slate-800 text-sm">
                                    <i class="las la-check-circle text-emerald-500 text-xl"></i>
                                    Definir las politicas de seguridad: que tarfico se permite y qué se boquea.
                                </li>
                                <li class="flex items-center gap-3 text-slate-800 text-sm">
                                    <i class="las la-check-circle text-emerald-500 text-xl"></i>
                                    Establecer los requisitos de alta disponibilidad y redundancia, si aplica.
                                </li>
                            </ul>
                            <li class="text-sm font-bold uppercase text-slate-400 tracking-wider">Levantamiento de
                                información</li>
                            <ul class="space-y-3 py-6">
                                <li class="flex items-center gap-3 text-slate-800 text-sm">
                                    <i class="las la-check-circle text-emerald-500 text-xl"></i>
                                    Documentar el inventario de dispositivo IP servicios críticos.
                                </li>
                                <li class="flex items-center gap-3 text-slate-800 text-sm">
                                    <i class="las la-check-circle text-emerald-500 text-xl"></i>
                                    Mapear la estructura de red y los flujos de tráfico existentes.
                                </li>
                                <li class="flex items-center gap-3 text-slate-800 text-sm">
                                    <i class="las la-check-circle text-emerald-500 text-xl"></i>
                                    Identificar puertos y protocolos necesarios para los servicios.
                                </li>
                            </ul>
                            <li class="text-sm font-bold uppercase text-slate-400 tracking-wider">Pruebas en laboratorio o
                                entorno controlado</li>
                            <ul class="space-y-3 py-6">
                                <li class="flex items-center gap-3 text-slate-800 text-sm">
                                    <i class="las la-check-circle text-emerald-500 text-xl"></i>
                                    Simular la configuración en un entorno de pruebas.
                                </li>
                                <li class="flex items-center gap-3 text-slate-800 text-sm">
                                    <i class="las la-check-circle text-emerald-500 text-xl"></i>
                                    Validar reglas, rendimineto y estabilidad.
                                </li>
                            </ul>
                            <li class="text-sm font-bold uppercase text-slate-400 tracking-wider">Planificación del cambio
                            </li>
                            <ul class="space-y-3 py-6">
                                <li class="flex items-center gap-3 text-slate-800 text-sm">
                                    <i class="las la-check-circle text-emerald-500 text-xl"></i>
                                    Establecer una ventana de mantenimineto con el minimo impacto.
                                </li>
                                <li class="flex items-center gap-3 text-slate-800 text-sm">
                                    <i class="las la-check-circle text-emerald-500 text-xl"></i>
                                    Preparar el plan de rollback en caso de fallos.
                                </li>
                                <li class="flex items-center gap-3 text-slate-800 text-sm">
                                    <i class="las la-check-circle text-emerald-500 text-xl"></i>
                                    Notificar a los equipos involucrados (soporte, redes, segurdid, usuarios, etc).
                                </li>
                            </ul>
                        </ol>
                    </div>
                </section>
                <section class="scroll-mt-32" id="cambio">
                    <div class="flex items-center gap-4 mb-6">
                        <div class="w-10 h-10 rounded-xl bg-primary/10 flex items-center justify-center text-primary">
                            <i class="las la-cog"></i>
                        </div>
                        <h2 class="text-2xl font-bold text-slate-900">2. Actividades en el Cambio</h2>
                    </div>
                    <div class="bg-white rounded-2xl border border-slate-200 p-8 shadow-sm">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
                            <div class="p-4 rounded-xl border border-slate-100 bg-slate-200">
                                <p class="text-xs font-bold text-primary uppercase mb-2">Paso A</p>
                                <h4 class="font-bold mb-1 text-slate-900">Configuración del equipo</h4>
                                <div class="bg-purple-50 p-3 rounded-lg border border-purple-100">
                                    <ul class="text-xs text-purple-600 space-y-1">
                                        <li>• Instalar el Firewall (fisicamente o virtual).</li>
                                        <li>• Realizar configuración inicial (interfaz, DMZ, NAT).</li>
                                        <li>• Aplicar reglas base de filtrado</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="p-4 rounded-xl border border-slate-100 bg-slate-200">
                                <p class="text-xs font-bold text-primary uppercase mb-2">Paso B</p>
                                <h4 class="font-bold mb-1 text-slate-900">Implementación de Reglas</h4>
                                <div class="bg-purple-50 p-3 rounded-lg border border-purple-100">
                                    <ul class="text-xs text-purple-600 space-y-1">
                                        <li>• Crear reglas de acceso minimo necesarias.</li>
                                        <li>• Reglas explicitas de trafico esencial (DNS, DHCP, etc).</li>
                                        <li>• Configurar registros y alertas SNMP, syslog (si aplica).</li>
                                    </ul>
                                </div>
                            </div>

                            <div class="p-4 rounded-xl border border-slate-100 bg-slate-200">
                                <p class="text-xs font-bold text-primary uppercase mb-2">Paso C</p>
                                <h4 class="font-bold mb-1 text-slate-900">Monitore en Tiempo Real</h4>
                                <div class="bg-purple-50 p-3 rounded-lg border border-purple-100">
                                    <ul class="text-xs text-purple-600 space-y-1">
                                        <li>• Supervisar el tráfico al aplicar las reglas.</li>
                                        <li>• Verficar el acceso a servicios criticos.</li>
                                        <li>• Validar los bloques desados y no permitidos.</li>
                                    </ul>
                                </div>
                            </div>

                            <div class="p-4 rounded-xl border border-slate-100 bg-slate-200">
                                <p class="text-xs font-bold text-primary uppercase mb-2">Paso C</p>
                                <h4 class="font-bold mb-1 text-slate-900">Comunicación</h4>
                                <div class="bg-purple-50 p-3 rounded-lg border border-purple-100">
                                    <ul class="text-xs text-purple-600 space-y-1">
                                        <li>• Mantener contacto con los equipos involucrados (usuarios, red, etc).</li>
                                    </ul>
                                </div>
                            </div>

                        </div>
                        <div class="bg-orange-50 border-l-4 border-orange-500 p-4 rounded-r-xl">
                            <h4 class="text-sm font-bold text-orange-800 flex items-center gap-2 mb-1">
                                <i class="las la-info-circle"></i> Toma de Datos Post-Instalación
                            </h4>
                            <p class="text-sm text-orange-700">Confirmar encendido y operatividade del equipo en
                                fuentes de poder y que los LEDs de
                                sistema (SYST) estén en verde sólido.</p>
                        </div>
                    </div>
                </section>
                <section class="scroll-mt-32" id="verificacion">
                    <div class="flex items-center gap-4 mb-6">
                        <div class="w-10 h-10 rounded-xl bg-primary/10 flex items-center justify-center text-primary">
                            <i class="las la-tasks"></i>
                        </div>
                        <h2 class="text-2xl font-bold text-slate-900">3. Verificación de Operatividad</h2>
                    </div>
                    <div class="bg-white rounded-2xl border border-slate-200 p-8 shadow-sm">
                        <div class="space-y-6">
                            <div>
                                <h4 class="text-sm font-bold uppercase text-slate-400 tracking-wider mb-4">Verificación de
                                    Conectividad</h4>
                                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                                    <div
                                        class="flex items-center justify-between p-4 rounded-xl bg-slate-50 border border-slate-200">
                                        <span class="text-sm font-semibold text-slate-900">Probar accesos internos</span>
                                        <span
                                            class="px-2 py-1 rounded-md bg-emerald-100 text-emerald-700 text-[10px] font-bold">REQUERIDO</span>
                                    </div>
                                    <div
                                        class="flex items-center justify-between p-4 rounded-xl bg-slate-50 border border-slate-200">
                                        <span class="text-sm font-semibold text-slate-900">Probar accesos externos</span>
                                        <span
                                            class="px-2 py-1 rounded-md bg-emerald-100 text-emerald-700 text-[10px] font-bold">REQUERIDO</span>
                                    </div>
                                    <div
                                        class="flex items-center justify-between p-4 rounded-xl bg-slate-50 border border-slate-200">
                                        <span class="text-sm font-semibold text-slate-900">Acceso entre zonas (LAN, WAN,
                                            DMZ)</span>
                                        <span
                                            class="px-2 py-1 rounded-md bg-emerald-100 text-emerald-700 text-[10px] font-bold">REQUERIDO</span>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <h4 class="text-sm font-bold uppercase text-slate-400 tracking-wider mb-4">Verificación de
                                    reglas</h4>
                                <div class="grid grid-cols-1 sm:grid-cols-1 gap-4">
                                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                                        <div
                                            class="flex items-center justify-between p-4 rounded-xl bg-slate-50 border border-slate-200">
                                            <span class="text-sm font-semibold text-slate-900">Verficar que las reglas
                                                cumplen con lo planificado</span>
                                            <span
                                                class="px-2 py-1 rounded-md bg-emerald-100 text-emerald-700 text-[10px] font-bold">REQUERIDO</span>
                                        </div>
                                        <div
                                            class="flex items-center justify-between p-4 rounded-xl bg-slate-50 border border-slate-200">
                                            <span class="text-sm font-semibold text-slate-900">Revisar que no exista
                                                tráfico rechazado</span>
                                            <span
                                                class="px-2 py-1 rounded-md bg-emerald-100 text-emerald-700 text-[10px] font-bold">REQUERIDO</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <h4 class="text-sm font-bold uppercase text-slate-400 tracking-wider mb-4"></h4>
                            </div>
                            <div>
                                <h4 class="text-sm font-bold uppercase text-slate-400 tracking-wider mb-4">Monitoreo de
                                    logs y rendimiento
                                    <span
                                        class="px-2 py-1 rounded-md bg-emerald-100 text-emerald-700 text-[10px] font-bold">
                                        REQUERIDO</span>
                                </h4>
                                <div class="grid grid-cols-1 sm:grid-cols-1 gap-4">
                                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                                        <div
                                            class="flex items-center justify-between p-4 rounded-xl bg-slate-50 border border-slate-200">
                                            <span class="text-sm font-semibold text-slate-900">Vericar logs en el
                                                Firewall</span>
                                            <span
                                                class="px-2 py-1 rounded-md bg-emerald-100 text-emerald-700 text-[10px] font-bold">REQUERIDO</span>
                                        </div>
                                        <div
                                            class="flex items-center justify-between p-4 rounded-xl bg-slate-50 border border-slate-200">
                                            <span class="text-sm font-semibold text-slate-900">Medir latencias, troughput y
                                                posibles cuellos de botella</span>
                                            <span
                                                class="px-2 py-1 rounded-md bg-emerald-100 text-emerald-700 text-[10px] font-bold">REQUERIDO</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <h4 class="text-sm font-bold uppercase text-slate-400 tracking-wider mb-4">Ajustes en
                                    Configuración</h4>
                                <div class="grid grid-cols-1 sm:grid-cols-1 gap-4">
                                    <div
                                        class="flex items-center justify-between p-4 rounded-xl bg-slate-50 border border-slate-200">
                                        <span class="text-sm font-semibold text-slate-900">En caso de ser necesario,
                                            realizar ajustes en la configuración</span>
                                        <span
                                            class="px-2 py-1 rounded-md bg-emerald-100 text-emerald-700 text-[10px] font-bold">SI
                                            SE REQUIERE</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <section class="scroll-mt-32" id="finales">
                    <div class="flex items-center gap-4 mb-6">
                        <div class="w-10 h-10 rounded-xl bg-primary/10 flex items-center justify-center text-primary">
                            <i class="las la-clipboard-check"></i>
                        </div>
                        <h2 class="text-2xl font-bold text-slate-900">4. Actividades Finales</h2>
                    </div>
                    <div class="bg-white rounded-2xl border border-slate-200 p-8 shadow-sm">
                        <div class="space-y-8">
                            <div>
                                <h4 class="text-sm font-bold mb-4 text-slate-900">
                                    Registro Fotográfico del Firewall Instalado
                                </h4>
                                <div class="flex justify-center">
                                    <div
                                        class="bg-slate-50 rounded-xl border-2 border-dashed border-slate-200 
                                                p-4 hover:border-primary/50 transition-colors">
                                        <img src="{{ asset('assets/media/instalacion-firewall.png') }}" alt="foto_antes"
                                            class="max-w-md w-full object-contain rounded-lg">
                                    </div>
                                </div>
                            </div>
                            <ul class="space-y-3">
                                <li class="flex items-center gap-3 text-slate-600 text-sm">
                                    <i class="las la-check-circle text-emerald-500 text-xl"></i>
                                    Realizar el Backup de la configuración.
                                </li>

                                <li class="flex items-center gap-3 text-slate-600 text-sm">
                                    <i class="las la-check-circle text-emerald-500 text-xl"></i>
                                    Entrega y Firma del reporte de Actividades.
                                </li>

                                <li class="flex items-center gap-3 text-slate-600 text-sm">
                                    <i class="las la-check-circle text-emerald-500 text-xl"></i>
                                    Notificación del fin de la Ventana.
                                </li>
                            </ul>

                        </div>
                    </div>
                </section>
                <section class="scroll-mt-32" id="retorno">
                    <div class="flex items-center gap-4 mb-6">
                        <div class="w-10 h-10 rounded-xl bg-red-50 flex items-center justify-center text-red-600">
                            <i class="las la-exclamation-triangle"></i>
                        </div>
                        <h2 class="text-2xl font-bold text-slate-900">5. Plan de Retorno (Rollback)</h2>
                    </div>
                    <div class="bg-white rounded-2xl border border-red-100 p-8 shadow-sm">
                        <p class="text-slate-600 mb-6 font-medium">En caso de fallas críticas insalvables durante la
                            ventana de mantenimiento, se procedara con la reversión:</p>
                        <div class="space-y-4">
                            <div class="flex items-start gap-4">
                                <div
                                    class="w-8 h-8 rounded-full bg-red-50 text-red-600 flex items-center justify-center flex-shrink-0 font-bold text-sm">
                                    1</div>
                                <p class="text-sm text-slate-600 pt-1">Apagado dels equipo y retiro de cableado de Red y
                                    Energia</p>
                            </div>
                            <div class="flex items-start gap-4">
                                <div
                                    class="w-8 h-8 rounded-full bg-red-50 text-red-600 flex items-center justify-center flex-shrink-0 font-bold text-sm">
                                    2</div>
                                <p class="text-sm text-slate-600 pt-1">Desmontar el equipo nuevo y reinstalar el equipo
                                    original en el rack.</p>
                            </div>
                            <div class="flex items-start gap-4">
                                <div
                                    class="w-8 h-8 rounded-full bg-red-50 text-red-600 flex items-center justify-center flex-shrink-0 font-bold text-sm">
                                    3</div>
                                <p class="text-sm text-slate-600 pt-1">Re-conectar cables de alimentación, enlaces de
                                    fibra/cobre
                                    según el mapeo inicial documentado.</p>
                            </div>
                            <div class="flex items-start gap-4">
                                <div
                                    class="w-8 h-8 rounded-full bg-red-50 text-red-600 flex items-center justify-center flex-shrink-0 font-bold text-sm">
                                    4</div>
                                <p class="text-sm text-slate-600 pt-1">Validar conectividad básica para asegurar que el
                                    servicio ha retornado a su estado funcional anterior.</p>
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
