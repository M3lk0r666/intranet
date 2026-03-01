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
                        <div class="inline-flex items-center">
                            <i class="fas fa-chevron-right text-gray-400 mx-2"></i>
                            <a href="{{ route('intranet.index') }}"
                                class="ml-1 text-sm text-gray-600 hover:text-orange-600 md:ml-2">Intranet</a>
                        </div>
                    </li>
                    <li class="inline-flex items-center">
                        <i class="fas fa-chevron-right text-gray-400 mx-2"></i>
                        <a href="{{ route('intranet.biblioteca-recursos.departamentos') }}"
                            class="inline-flex items-center text-sm text-gray-600 hover:text-orange-600">Biblioteca
                        </a>
                    </li>

                    <li aria-current="page">
                        <div class="flex items-center">
                            <i class="fas fa-chevron-right text-gray-400 mx-2"></i>
                            <span class="ml-1 text-sm text-primary font-medium md:ml-2">Documento</span>
                        </div>
                    </li>
                </ol>
            </nav>
        </div>
    </div>

    <!-- Encabezado -->
    <div class="text-center mb-16 mt-8">
        <h1 class="text-4xl font-black font-display tracking-tight text-slate-900 uppercase">
            Vista detalle: <span class="text-primary  uppercase"> {{ $document->title }}</span>
        </h1>
        <p></p>
        <p class="text-slate-600 mt-6 text-lg">{{ $document->description }}</p>
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
                    <div class="p-4 bg-orange-500 rounded-2xl text-white shadow-lg shadow-orange-500/10">
                        <p class="text-xs font-bold opacity-80 uppercase mb-2">Recursos Rápidos</p>
                        <div class="space-y-2">
                            <button
                                class="w-full bg-white/20 hover:bg-white/30 text-white text-xs font-bold py-2 rounded-lg transition-colors flex items-center justify-center gap-2">
                                Descargar Script
                            </button>
                        </div>
                    </div>

                </div>
            </aside>
            <article class="flex-grow max-w-4xl lg:max-w-6xl space-y-16">
                <div>
                    <span
                        class="inline-flex items-center px-3 py-1 rounded-full bg-orange-100 text-primary text-xs font-bold mb-4">
                        GUÍA DE IMPLEMENTACIÓN v3.0
                    </span>
                    <h1 class="text-4xl font-extrabold text-slate-900 mb-4">Sustitución de Switches de Acceso</h1>
                    <p class="text-lg text-slate-600 leading-relaxed">
                        Guía detallada para el proceso de sustitución y configuración de switches, asegurando el
                        cumplimiento de estándares corporativos y minimizando el tiempo de inactividad.
                    </p>
                </div>
                <section class="scroll-mt-32" id="previas">
                    <div class="flex items-center gap-4 mb-6">
                        <div class="w-10 h-10 rounded-xl bg-primary/10 flex items-center justify-center text-primary">
                            <i class="las la-brain"></i>
                        </div>
                        <h2 class="text-2xl font-bold text-slate-900">1. Actividades Previas &amp; Auditoría</h2>
                    </div>
                    <div class="bg-white rounded-2xl border border-slate-200 p-8 shadow-sm">
                        <p class="text-slate-600 mb-6 font-medium">Ejecute los siguientes comandos para documentar el estado
                            actual del equipo antes de proceder con el cambio físico.</p>
                        <div
                            class="rounded-xl bg-slate-50 p-6 overflow-hidden border border-slate-200 font-mono text-sm leading-relaxed mb-6">
                            <div class="flex items-center justify-between mb-4 border-b border-slate-200 pb-2">
                                <span class="text-slate-400 uppercase text-xs tracking-widest font-bold">Terminal Output -
                                    Pre-Check</span>
                                <span class="material-symbols-outlined text-slate-400 text-sm">content_copy</span>
                            </div>
                            <div class="space-y-1">
                                <div class="flex gap-4">
                                    <span class="text-slate-300 w-4 select-none">01</span>
                                    <code class="text-slate-900"># <span class="text-orange-600 font-semibold">show
                                            running-config</span>
                                    </code>
                                </div>
                                <div class="flex gap-4">
                                    <span class="text-slate-300 w-4 select-none">02</span>
                                    <code class="text-slate-900"># <span class="text-orange-600 font-semibold">show version
                                            detail</span>
                                    </code>
                                </div>
                                <div class="flex gap-4">
                                    <span class="text-slate-300 w-4 select-none">03</span>
                                    <code class="text-slate-900"># <span class="text-orange-600 font-semibold">show
                                            inventory</span>
                                    </code>
                                </div>
                                <div class="flex gap-4">
                                    <span class="text-slate-300 w-4 select-none">04</span>
                                    <code class="text-slate-900"># <span class="text-orange-600 font-semibold">show ip
                                            interface brief</span>
                                    </code>
                                </div>
                                <div class="flex gap-4">
                                    <span class="text-slate-300 w-4 select-none">05</span>
                                    <code class="text-slate-900"># <span class="text-orange-600 font-semibold">show lldp
                                            neighbors</span>
                                    </code>
                                </div>
                            </div>
                        </div>
                        <ul class="space-y-3">
                            <li class="flex items-center gap-3 text-slate-600 text-sm">

                                <i class="las la-check-circle text-emerald-500 text-xl"></i>
                                Verificar que el archivo de configuración haya sido respaldado externamente.
                            </li>
                            <li class="flex items-center gap-3 text-slate-600 text-sm">

                                <i class="las la-check-circle text-emerald-500 text-xl"></i>
                                Etiquetar cada cable conectado al switch actual con su número de puerto correspondiente.
                            </li>
                        </ul>
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
                        <div class="grid md:grid-cols-3 gap-6 mb-8">
                            <div class="p-4 rounded-xl border border-slate-100 bg-slate-50">
                                <p class="text-xs font-bold text-primary uppercase mb-2">Paso A</p>
                                <h4 class="font-bold mb-1 text-slate-900">Desconexión</h4>
                                <p class="text-xs text-slate-500">Apagado y retiro de cables de alimentación y datos.</p>
                            </div>
                            <div class="p-4 rounded-xl border border-slate-100 bg-slate-50">
                                <p class="text-xs font-bold text-primary uppercase mb-2">Paso B</p>
                                <h4 class="font-bold mb-1 text-slate-900">Montado</h4>
                                <p class="text-xs text-slate-500">Instalación física en Rack con soportes adecuados.</p>
                            </div>
                            <div class="p-4 rounded-xl border border-slate-100 bg-slate-50">
                                <p class="text-xs font-bold text-primary uppercase mb-2">Paso C</p>
                                <h4 class="font-bold mb-1 text-slate-900">Conexión</h4>
                                <p class="text-xs text-slate-500">Re-cableado siguiendo el etiquetado previo.</p>
                            </div>
                        </div>
                        <div class="bg-orange-50 border-l-4 border-orange-500 p-4 rounded-r-xl">
                            <h4 class="text-sm font-bold text-orange-800 flex items-center gap-2 mb-1">
                                <i class="las la-info-circle"></i> Toma de Datos Post-Instalación
                            </h4>
                            <p class="text-sm text-orange-700">Confirmar encendido de fuentes de poder y que los LEDs de
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
                                <h4 class="text-sm font-bold uppercase text-slate-400 tracking-wider mb-4">Pruebas de
                                    Conectividad</h4>
                                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                                    <div
                                        class="flex items-center justify-between p-4 rounded-xl bg-slate-50 border border-slate-200">
                                        <span class="text-sm font-semibold text-slate-900">Ping a Gateway (DGW)</span>
                                        <span
                                            class="px-2 py-1 rounded-md bg-emerald-100 text-emerald-700 text-[10px] font-bold">REQUERIDO</span>
                                    </div>
                                    <div
                                        class="flex items-center justify-between p-4 rounded-xl bg-slate-50 border border-slate-200">
                                        <span class="text-sm font-semibold text-slate-900">Ping a Core Switch</span>
                                        <span
                                            class="px-2 py-1 rounded-md bg-emerald-100 text-emerald-700 text-[10px] font-bold">REQUERIDO</span>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <h4 class="text-sm font-bold uppercase text-slate-400 tracking-wider mb-4">Comparativa de
                                    Interfaces</h4>
                                <div
                                    class="p-4 bg-slate-50 rounded-xl font-mono text-xs text-slate-600 border border-slate-200">
                                    <span class="text-orange-600 font-bold"># verify-interfaces --compare
                                        baseline.txt</span>
                                    <br />
                                    Checking Gi1/0/1... UP/UP<br />
                                    Checking Gi1/0/2... UP/UP<br />
                                    Checking Gi1/0/3... DOWN/DOWN (Matches baseline)<br />
                                    <span class="text-emerald-600 font-bold">Status: All critical interfaces match baseline
                                        state.</span>
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
                                <h4 class="text-sm font-bold mb-4 text-slate-900">Registro Fotográfico</h4>
                                <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                                    <div
                                        class="aspect-square bg-slate-50 rounded-xl border-2 border-dashed border-slate-200 flex flex-col items-center justify-center gap-2 text-slate-400 hover:border-primary/50 transition-colors cursor-pointer group">
                                        <i class="las la-camera-retro group-hover:text-primary"></i>

                                        <span class="text-[10px] font-bold uppercase">Front View</span>
                                    </div>
                                    <div
                                        class="aspect-square bg-slate-50 rounded-xl border-2 border-dashed border-slate-200 flex flex-col items-center justify-center gap-2 text-slate-400 hover:border-primary/50 transition-colors cursor-pointer group">
                                        <i class="las la-camera-retro group-hover:text-primary"></i>

                                        <span class="text-[10px] font-bold uppercase">Cable Map</span>
                                    </div>
                                    <div
                                        class="aspect-square bg-slate-50 rounded-xl border-2 border-dashed border-slate-200 flex flex-col items-center justify-center gap-2 text-slate-400 hover:border-primary/50 transition-colors cursor-pointer group">
                                        <i class="las la-camera-retro group-hover:text-primary"></i>

                                        <span class="text-[10px] font-bold uppercase">Power A/B</span>
                                    </div>
                                    <div
                                        class="aspect-square bg-slate-50 rounded-xl border-2 border-dashed border-slate-200 flex flex-col items-center justify-center gap-2 text-slate-400 hover:border-primary/50 transition-colors cursor-pointer group">
                                        <i class="las la-camera-retro group-hover:text-primary"></i>

                                        <span class="text-[10px] font-bold uppercase">Labeling</span>
                                    </div>
                                </div>
                            </div>
                            <div class="grid md:grid-cols-2 gap-6">
                                <div class="p-6 rounded-2xl bg-slate-900 text-white shadow-lg">
                                    <h4 class="font-bold mb-2 flex items-center gap-2">
                                        <i class="las la-save text-primary"></i> Config Backup
                                    </h4>
                                    <p class="text-xs text-slate-300 mb-4">Realice el guardado final de la configuración y
                                        envíe a la bóveda de seguridad central.</p>
                                    <button
                                        class="w-full py-2 bg-primary rounded-lg text-sm font-bold hover:bg-orange-600 transition-colors">Copy
                                        Run Start</button>
                                </div>
                                <div class="p-6 rounded-2xl border border-slate-200 bg-white">
                                    <h4 class="font-bold mb-2 flex items-center gap-2 text-slate-900">
                                        <i class="las la-signature text-primary"></i> Sign-off
                                    </h4>
                                    <p class="text-xs text-slate-500 mb-4">Firma del responsable del sitio confirmando la
                                        operatividad total de los servicios.</p>
                                    <button
                                        class="w-full py-2 bg-slate-100 rounded-lg text-sm font-bold text-slate-900 hover:bg-slate-200 transition-colors">Subir
                                        Acta</button>
                                </div>
                            </div>
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
                            ventana de mantenimiento, proceda con la reversión:</p>
                        <div class="space-y-4">
                            <div class="flex items-start gap-4">
                                <div
                                    class="w-8 h-8 rounded-full bg-red-50 text-red-600 flex items-center justify-center flex-shrink-0 font-bold text-sm">
                                    1</div>
                                <p class="text-sm text-slate-600 pt-1">Desmontar el equipo nuevo y reinstalar el equipo
                                    original en el rack siguiendo las etiquetas previas.</p>
                            </div>
                            <div class="flex items-start gap-4">
                                <div
                                    class="w-8 h-8 rounded-full bg-red-50 text-red-600 flex items-center justify-center flex-shrink-0 font-bold text-sm">
                                    2</div>
                                <p class="text-sm text-slate-600 pt-1">Re-conectar cables de alimentación y fibra/cobre
                                    según el mapeo inicial documentado en el paso 1.</p>
                            </div>
                            <div class="flex items-start gap-4">
                                <div
                                    class="w-8 h-8 rounded-full bg-red-50 text-red-600 flex items-center justify-center flex-shrink-0 font-bold text-sm">
                                    3</div>
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
