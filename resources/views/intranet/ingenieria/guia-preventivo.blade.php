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
                            <span class="ml-1 text-sm text-primary font-medium md:ml-2">Mantenimiento Preventivo</span>
                        </div>
                    </li>
                </ol>
            </nav>
        </div>
    </div>

    <!-- Encabezado -->
    <div class="text-center mb-16 mt-8">
        <h1 class="text-4xl font-black font-display tracking-tight text-slate-900 uppercase">
            Guia<span class="text-primary  uppercase"> Mantenimiento Preventivo</span>
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
                                Limpieza
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
                        </div>
                    </div>

                    <!-- Bloque extra intacto -->
                    <div class="bg-white border border-slate-200 rounded-xl p-5">
                        <p class="text-xs font-semibold text-slate-500 uppercase tracking-wide mb-4">
                            Descargar Recursos
                        </p>
                        <div class="space-y-2">
                            <a href="{{ route('ingenieria.instalacion-switch-pdf') }}"
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
            <article class="flex-grow max-w-4xl lg:max-w-6xl space-y-10">
                <div>
                    <span
                        class="inline-flex items-center px-3 py-1 rounded-full bg-orange-100 text-primary text-xs font-bold mb-4">
                        GUÍA DE IMPLEMENTACIÓN v1.0
                    </span>
                    <h1 class="text-4xl font-extrabold text-slate-900 mb-4">Mantenimiento Preventivo de equipos</h1>
                    <p class="text-lg text-slate-600 leading-relaxed">
                        Guía detallada para el proceso del mantenimineto preventivo de los equipos, asegurando el
                        cumplimiento de estándares corporativos y minimizando el tiempo de inactividad.
                    </p>
                </div>
                <section class="scroll-mt-32">
                    <div class="flex items-center gap-4 mb-6">
                        <div class="w-10 h-10 rounded-xl bg-red-50 flex items-center justify-center text-red-600">
                            <i class="las la-exclamation-triangle"></i>
                        </div>
                        <h2 class="text-2xl font-bold text-slate-900">Consideraciones Iniciales</h2>
                    </div>
                    <div class="bg-white rounded-2xl border border-red-100 p-8 shadow-sm">
                        <div class="bg-red-50 border-l-4 border-red-500 p-4 rounded-r-xl mb-3">
                            <h4 class="text-sm font-bold text-red-800 flex items-center gap-2 mb-1">
                                <i class="las la-info-circle uppercase"></i> Importante
                            </h4>
                            <p class="text-base text-red-700">► Validar si el o los equipos están en contrato de garantía.
                            </p>
                            </p>
                        </div>
                    </div>
                </section>
                <section class="scroll-mt-32" id="previas">
                    <div class="flex items-center gap-4 mb-6">
                        <div class="w-10 h-10 rounded-xl bg-primary/10 flex items-center justify-center text-primary">
                            <i class="las la-brain"></i>
                        </div>
                        <h2 class="text-2xl font-bold text-slate-900">1. Actividades Previas</h2>
                    </div>
                    <div class="bg-white rounded-2xl border border-slate-200 p-8 shadow-sm">
                        <p class="text-slate-600 mb-6 font-medium">Solicitar al cliente credenciales de acceso al/los
                            equipo/s.</p>
                        <ul class="space-y-3 ">
                            <li class="flex items-center gap-3 text-slate-800 text-sm">
                                <i class="las la-check-circle text-emerald-500 text-xl"></i>
                                Acceder al dispositivo.
                            </li>
                            <li class="flex items-center gap-3 text-slate-800 text-sm">
                                <i class="las la-check-circle text-emerald-500 text-xl"></i>
                                Guardar configuración del equipo.
                            </li>
                            <li class="flex items-center gap-3 text-slate-800 text-sm">
                                <i class="las la-check-circle text-emerald-500 text-xl"></i>
                                Realizar pruebas de comunicación hacia la red y servicios criticos(Core, Internet, etc.).
                            </li>
                            <li class="flex items-center gap-3 text-slate-800 text-sm">
                                <i class="las la-check-circle text-emerald-500 text-xl"></i>
                                Estado de las interfaces (puertos activos/inactivos).
                            </li>
                            <li class="flex items-center gap-3 text-slate-800 text-sm">
                                <i class="las la-check-circle text-emerald-500 text-xl"></i>
                                En caso de que los equipos esten en stack, obener su estado.
                            </li>
                            <li class="flex items-center gap-3 text-slate-800 text-sm">
                                <i class="las la-check-circle text-emerald-500 text-xl"></i>
                                Respaldar la configuración del dispositivo [configuracion-antes].
                            </li>
                        </ul>
                    </div>
                </section>
                <section class="scroll-mt-32" id="cambio">
                    <div class="flex items-center gap-4 mb-6">
                        <div class="w-10 h-10 rounded-xl bg-primary/10 flex items-center justify-center text-primary">
                            <i class="las la-cog"></i>
                        </div>
                        <h2 class="text-2xl font-bold text-slate-900">2. Limpieza fisica del dispositivo</h2>
                    </div>
                    <div class="bg-white rounded-2xl border border-slate-200 p-8 shadow-sm">
                        <ul class="space-y-3 py-2">
                            <li class="flex items-center gap-3 text-slate-800 text-sm">
                                <i class="las la-check-circle text-emerald-500 text-xl"></i>
                                Revisar e inspeccionar conexiones y asegurar que no existan cables dañados o mal
                                etiquetados.
                            </li>
                            <li class="flex items-center gap-3 text-slate-800 text-sm">
                                <i class="las la-check-circle text-emerald-500 text-xl"></i>
                                Comprobar indicadores LED y paneles de estado, para identificar alertas o fallos
                                potenciales.
                            </li>
                            <li class="flex items-center gap-3 text-slate-800 text-sm">
                                <i class="las la-check-circle text-emerald-500 text-xl"></i>
                                Desconexión de cableado electrico y de datos.
                            </li>
                            <li class="flex flex-col gap-3 text-slate-800 text-sm">
                                <div class="flex items-start gap-3">
                                    <span class="text-red-500 text-base">
                                        Nota:
                                    </span>
                                </div>
                                <div
                                    class="ml-8 flex items-start gap-2 text-xm text-blue-800 bg-blue-50 px-4 py-3 rounded-lg">
                                    <i class="las la-info text-blue-500 mt-0.5"></i>
                                    <span>
                                        Retirar el equipo de rack, solo si asi lo solicita -el cliente- y si el cableado
                                        esta debidamente etiquetado.
                                    </span>
                                </div>
                            </li>
                            <li class="flex items-center gap-3 text-slate-800 text-sm">
                                <i class="las la-check-circle text-emerald-500 text-xl"></i>
                                Limpieza del equipo, retirando exceso de polvo, suciedad y obstrucciones en ventiladores o
                                rejillas.
                            </li>
                            <li class="flex flex-col gap-3 text-slate-800 text-sm">
                                <div class="flex items-start gap-3">
                                    <span class="text-red-500 text-base">
                                        Nota:
                                    </span>
                                </div>
                                <div
                                    class="ml-8 flex items-start gap-2 text-xm text-blue-800 bg-blue-50 px-4 py-3 rounded-lg">
                                    <i class="las la-info text-blue-500 mt-0.5"></i>
                                    <span>
                                        Evitar desarmar o quitar elementos que invaliden la garantia.
                                    </span>
                                </div>
                            </li>
                        </ul>
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
                                <h4 class="text-sm font-bold uppercase text-slate-400 tracking-wider mb-4">Pruebas de
                                    Conectividad</h4>
                                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                                    <div
                                        class="flex items-center justify-between p-4 rounded-xl bg-slate-50 border border-slate-200">
                                        <span class="text-sm font-semibold text-slate-900">Energizado del
                                            dispositivo</span>
                                        <span
                                            class="px-2 py-1 rounded-md bg-emerald-100 text-emerald-700 text-[10px] font-bold">REQUERIDO</span>
                                    </div>
                                    <div
                                        class="flex items-center justify-between p-4 rounded-xl bg-slate-50 border border-slate-200">
                                        <span class="text-sm font-semibold text-slate-900">Acceder y validar
                                            configuraciones generales</span>
                                        <span
                                            class="px-2 py-1 rounded-md bg-emerald-100 text-emerald-700 text-[10px] font-bold">REQUERIDO</span>
                                    </div>
                                    <div
                                        class="flex items-center justify-between p-4 rounded-xl bg-slate-50 border border-slate-200">
                                        <span class="text-sm font-semibold text-slate-900">Ping a Servicios</span>
                                        <span
                                            class="px-2 py-1 rounded-md bg-emerald-100 text-emerald-700 text-[10px] font-bold">REQUERIDO</span>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <div>
                                    <h4 class="text-sm font-bold uppercase text-slate-400 tracking-wider mb-4">
                                        Comparativa del
                                        estado de las Interfaces
                                        <span
                                            class="px-2 py-1 rounded-md bg-emerald-100 text-emerald-700 text-[10px] font-bold">
                                            REQUERIDO</span>
                                    </h4>
                                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                                        <div
                                            class="p-4 bg-slate-50 rounded-xl font-mono text-xs text-slate-600 border border-slate-200">
                                            <span class="text-orange-600 font-bold"># Interfaces ANTES</span>
                                            <br />
                                            Checking Gi1/0/1... UP/UP<br />
                                            Checking Gi1/0/2... UP/UP<br />
                                            Checking Gi1/0/3... DOWN/DOWN<br />
                                        </div>
                                        <div
                                            class="p-4 bg-slate-50 rounded-xl font-mono text-xs text-slate-600 border border-slate-200">
                                            <span class="text-orange-600 font-bold"># Interfaces DESPUES</span>
                                            <br />
                                            Checking Gi1/0/1... UP/UP<br />
                                            Checking Gi1/0/2... UP/DOWN<br />
                                            Checking Gi1/0/3... DOWN/DOWN<br />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <h4 class="text-sm font-bold uppercase text-slate-400 tracking-wider mb-4">Pruebas de
                                    Conectividad por parte del Cliente</h4>
                                <div class="grid grid-cols-1 sm:grid-cols-1 gap-4">
                                    <div
                                        class="flex items-center justify-between p-4 rounded-xl bg-slate-50 border border-slate-200">
                                        <span class="text-sm font-semibold text-slate-900">Comunicacion y operatividad de
                                            sus
                                            servicios</span>
                                        <span
                                            class="px-2 py-1 rounded-md bg-emerald-100 text-emerald-700 text-[10px] font-bold">REQUERIDO</span>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <h4 class="text-sm font-bold uppercase text-slate-400 tracking-wider mb-4"></h4>
                            </div>
                            <!-- Paso A -->
                            <div class="p-5 rounded-xl bg-slate-50 border border-slate-100">
                                <span class="text-xs font-bold text-primary uppercase tracking-wider">
                                    Actualización
                                </span>
                                <h4 class="font-semibold text-slate-900 mt-2 mb-3">
                                    Actualizar firmware o software en caso de ser necesario
                                </h4>
                                <ul class="text-sm text-slate-600 space-y-1 list-disc list-inside">
                                    <li>Validar si existe actualización critica de seguridad o funcionabilidad.</li>
                                    <li>Asegurarse de solo actualizar una partición y probar su operatividad</li>
                                </ul>
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
                                <h4 class="text-sm font-bold mb-4 text-slate-900">Registro Fotográfico [Antes/Despues] del
                                    mantenimiento preventivo</h4>
                                <div class="grid grid-cols-2 md:grid-cols-2 gap-4">
                                    <div
                                        class="aspect-square bg-slate-50 rounded-xl border-2 border-dashed border-slate-200 flex flex-col items-center justify-center gap-2 text-slate-400 hover:border-primary/50 transition-colors cursor-pointer group">
                                        <img src="{{ asset('storage/media/switch-antes.png') }}" alt="foto_antes"
                                            class="w-full h-full object-cover rounded-xl" />
                                    </div>
                                    <div
                                        class="aspect-square bg-slate-50 rounded-xl border-2 border-dashed border-slate-200 flex flex-col items-center justify-center gap-2 text-slate-400 hover:border-primary/50 transition-colors cursor-pointer group">
                                        <img src="{{ asset('storage/media/switch-despues.png') }}" alt="foto_despues"
                                            class="w-full h-full object-cover rounded-xl" />
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
