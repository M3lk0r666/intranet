@extends('layouts.intranet')

@section('title', 'Proceso POC - Intranet Corporativa')

@push('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet"
        href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <script src="https://cdn.tailwindcss.com?plugins=forms,typography,container-queries"></script>
    <link href="/assets/css/intrahome.css" rel="stylesheet">
@endpush

@section('content')

    {{-- Breadcrumb --}}
    <div class="bg-white border-b border-gray-200">
        <div class="container mx-auto px-4 py-3">
            <nav class="flex" aria-label="Breadcrumb">
                <ol class="inline-flex items-center space-x-1 md:space-x-3">
                    <li class="inline-flex items-center">
                        <a href="{{ route('bienvenido') }}"
                            class="inline-flex items-center text-sm text-gray-600 hover:text-orange-600 transition-colors">
                            <i class="fas fa-home mr-2"></i> Home
                        </a>
                    </li>
                    <li>
                        <div class="flex items-center">
                            <i class="fas fa-chevron-right text-gray-400 mx-2 text-xs"></i>
                            <a href="{{ route('intranet.index') }}"
                                class="ml-1 text-sm text-gray-600 hover:text-orange-600 md:ml-2 transition-colors">Intranet</a>
                        </div>
                    </li>
                    <li>
                        <div class="flex items-center">
                            <i class="fas fa-chevron-right text-gray-400 mx-2 text-xs"></i>
                            <a href="{{ route('procesos-empresariales') }}"
                                class="ml-1 text-sm text-gray-600 hover:text-orange-600 md:ml-2 transition-colors">Procesos
                                Empresariales</a>
                        </div>
                    </li>
                    <li>
                        <div class="flex items-center">
                            <i class="fas fa-chevron-right text-gray-400 mx-2 text-xs"></i>
                            <a href="{{ route('estructurainterna.ingenieria') }}"
                                class="ml-1 text-sm text-gray-600 hover:text-orange-600 md:ml-2 transition-colors">Ingeniería</a>
                        </div>
                    </li>
                    <li aria-current="page">
                        <div class="flex items-center">
                            <i class="fas fa-chevron-right text-gray-400 mx-2 text-xs"></i>
                            <span class="ml-1 text-sm text-orange-600 font-semibold md:ml-2">Solicitud POC</span>
                        </div>
                    </li>
                </ol>
            </nav>
        </div>
    </div>

    <div class="container mx-auto px-4 py-8">

        {{-- ============================================
             HERO (reemplaza los dos encabezados antiguos)
             ============================================ --}}
        <section class="pocv-hero mb-10 pocv-anim-up">
            <span class="pocv-eyebrow mb-4">
                <span class="ic"><i class="las la-flask"></i></span>
                Ingeniería IT · Proceso POC
            </span>
            <h1 class="text-3xl md:text-5xl font-extrabold text-gray-900 tracking-tight leading-[1.05] mt-1">
                Prueba de
                <span class="pocv-title-grad">Concepto (PoC)</span>
            </h1>
            <p class="text-gray-600 mt-3 text-base md:text-lg max-w-3xl leading-relaxed mb-6">
                Una Prueba de Concepto es un proceso inicial y práctico para evaluar la viabilidad y eficacia
                de una idea o tecnología antes de comprometerse con su implementación a gran escala.
            </p>

            {{-- Stats rápidos --}}
            <div class="grid grid-cols-2 md:grid-cols-4 gap-3">
                <div class="pocv-stat">
                    <div class="ic" style="background:#dbeafe; color:#1d4ed8;"><i class="las la-layer-group"></i></div>
                    <div>
                        <div class="num">4</div>
                        <div class="label">Fases del proceso</div>
                    </div>
                </div>
                <div class="pocv-stat">
                    <div class="ic" style="background:#fff7ed; color:#ea580c;"><i class="las la-clock"></i></div>
                    <div>
                        <div class="num">6-10</div>
                        <div class="label">Días estimados</div>
                    </div>
                </div>
                <div class="pocv-stat">
                    <div class="ic" style="background:#f3e8ff; color:#7e22ce;"><i class="las la-users"></i></div>
                    <div>
                        <div class="num">5</div>
                        <div class="label">Roles involucrados</div>
                    </div>
                </div>
                <div class="pocv-stat">
                    <div class="ic" style="background:#dcfce7; color:#15803d;"><i class="las la-chart-line"></i></div>
                    <div>
                        <div class="num">8</div>
                        <div class="label">KPIs medidos</div>
                    </div>
                </div>
            </div>
        </section>

        {{-- ============================================
             Título centrado del flujo
             ============================================ --}}
        <div class="text-center mb-10">
            <span class="pocv-eyebrow mb-3"><i class="las la-route"></i> Flujo completo</span>
            <h2 class="text-3xl md:text-4xl font-extrabold tracking-tight text-gray-900 mt-3">
                Flujo de <span class="pocv-title-grad">implementación</span>
            </h2>
            <p class="text-gray-600 mt-2 max-w-2xl mx-auto">
                Cuatro fases secuenciales para desarrollar una PoC exitosa.
            </p>
            <div class="pocv-divider"><span class="dot"></span><span class="line"></span><span class="dot"></span>
            </div>
        </div>

        {{-- ============================================
             GRID 4 FASES (usa las clases existentes
             .arrow-header / .poc-card / .bg-phase-N — no se tocan)
             ============================================ --}}
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 items-start mb-16">

            {{-- Fase 1 --}}
            <div class="flex flex-col space-y-4">
                <div
                    class="arrow-header bg-phase-1 text-white p-4 h-24 flex flex-col justify-center items-center text-center">
                    <span class="text-sm font-bold uppercase">1. Recepción de Solicitud por parte del Área de Ventas</span>
                    <span class="text-[10px] opacity-90">Tiempo: 1-2 días</span>
                </div>
                <div class="poc-card">
                    <h4 class="font-bold text-sm mb-2 uppercase text-phase-1 text-center">Tareas Clave</h4>
                    <p class="text-sm leading-relaxed mb-4">
                        <span class="font-bold">Objetivo:</span> Recibir y documentar la solicitud de POC del área de
                        ventas.
                    </p>

                    <h6 class="font-bold text-sm mb-2 uppercase text-phase-1">Recopilar información inicial</h6>
                    <ol class="text-xs space-y-2 list-decimal ml-4 mb-4">
                        <li>Recopilar información del cliente.</li>
                        <li>Verificar datos de contacto y responsables.</li>
                        <li>Documentar necesidad específica.</li>
                        <li>Registrar solicitud en sistema.</li>
                    </ol>

                    <h6 class="font-bold text-sm mb-2 uppercase text-phase-1">Disposición para realización</h6>
                    <ol class="text-xs space-y-2 list-decimal ml-4 mb-4">
                        <li>Tiempo estimado para realizar la POC.</li>
                    </ol>

                    <div class="bg-blue-50 p-3 rounded-lg border border-blue-100">
                        <h5 class="font-bold text-xs mb-1 text-blue-700">Información Requerida:</h5>
                        <ul class="text-xs text-blue-600 space-y-1">
                            <li>• Nombre de la empresa.</li>
                            <li>• Contacto principal (nombre, correo, teléfono).</li>
                            <li>• Área específica de conectividad.</li>
                            <li>• Descripción del problema o necesidad actual.</li>
                            <li>• Objetivo esperado.</li>
                        </ul>
                    </div>

                    <h4 class="font-bold p-2 text-sm mb-2 uppercase text-phase-1">Participantes</h4>
                    <ol class="text-xs space-y-2 list-decimal ml-4 mb-4">
                        <li>Ejecutivo de Cuenta</li>
                        <li>Equipo Técnico</li>
                        <li>Operations Support</li>
                    </ol>
                </div>
            </div>

            {{-- Fase 2 --}}
            <div class="flex flex-col space-y-4">
                <div
                    class="arrow-header bg-phase-2 text-white p-4 h-24 flex flex-col justify-center items-center text-center">
                    <span class="text-sm font-bold uppercase">2. Validación Interna y Aprobación</span>
                    <span class="text-[10px] opacity-90">Tiempo: 2-3 días</span>
                </div>
                <div class="poc-card">
                    <h4 class="font-bold text-sm mb-2 uppercase text-phase-2 text-center">Tareas Clave</h4>
                    <p class="text-sm leading-relaxed mb-4">
                        <span class="font-bold">Objetivo:</span> Evaluar factibilidad técnica y obtener aprobación.
                    </p>

                    <h6 class="font-bold text-sm mb-2 uppercase text-phase-2">Revisión de la Solicitud</h6>
                    <ol class="text-xs space-y-2 list-decimal ml-4 mb-4">
                        <li>Revisión técnica con equipo especializado (técnico y operaciones).</li>
                        <li>Validación de disponibilidad de recursos.</li>
                        <li>Factibilidad técnica.</li>
                    </ol>

                    <h6 class="font-bold text-sm mb-2 uppercase text-phase-2">Generar propuesta inicial</h6>
                    <ol class="text-xs space-y-2 list-decimal ml-4 mb-4">
                        <li>Especificaciones técnicas preliminares.</li>
                        <li>Cronograma tentativo.</li>
                        <li>Costos asociados.</li>
                    </ol>

                    <div class="bg-orange-50 p-3 rounded-lg border border-orange-100">
                        <h5 class="font-bold text-xs mb-1 text-orange-700">Aprobaciones Requeridas:</h5>
                        <ul class="text-xs text-orange-600 space-y-1">
                            <li>✓ Equipo Técnico</li>
                            <li>✓ Operations Support</li>
                            <li>✓ Administración</li>
                            <li>✓ Gerencia</li>
                        </ul>
                    </div>

                    <h4 class="font-bold p-2 text-sm mb-2 uppercase text-phase-2">Participantes</h4>
                    <ol class="text-xs space-y-2 list-decimal ml-4 mb-4">
                        <li>Ejecutivo de Cuenta</li>
                        <li>Equipo Técnico</li>
                        <li>Operations Support</li>
                        <li>Administración</li>
                    </ol>
                </div>
            </div>

            {{-- Fase 3 --}}
            <div class="flex flex-col space-y-4">
                <div
                    class="arrow-header bg-phase-3 text-white p-4 h-24 flex flex-col justify-center items-center text-center">
                    <span class="text-sm font-bold uppercase">3. Planificación</span>
                    <span class="text-[10px] opacity-90">Tiempo: 3-5 días</span>
                </div>
                <div class="poc-card">
                    <h4 class="font-bold text-sm mb-2 uppercase text-phase-3 text-center">Tareas Clave</h4>
                    <p class="text-sm leading-relaxed mb-4">
                        <span class="font-bold">Objetivo:</span> Diseñar plan detallado de implementación.
                    </p>

                    <h6 class="font-bold text-sm mb-2 uppercase text-phase-3">Realizar visita a sitio</h6>
                    <ol class="text-xs space-y-2 list-decimal ml-4 mb-4">
                        <li>Visita técnica al sitio (si aplica).</li>
                        <li>Identificación de puntos de red y ubicación de equipos.</li>
                        <li>Evaluación de infraestructura existente.</li>
                    </ol>

                    <h6 class="font-bold text-sm mb-2 uppercase text-phase-3">Diseño del plan técnico</h6>
                    <ol class="text-xs space-y-2 list-decimal ml-4 mb-4">
                        <li>Diseñar el plan técnico.</li>
                        <li>Diagramas de red.</li>
                        <li>Equipos necesarios (hardware).</li>
                        <li>Preparación de documento de alcance.</li>
                    </ol>

                    <div class="bg-green-50 p-3 rounded-lg border border-green-100">
                        <h5 class="font-bold text-xs mb-1 text-green-700">Documentos a Generar:</h5>
                        <ul class="text-xs text-green-600 space-y-1">
                            <li>• Diagrama de red.</li>
                            <li>• Lista de equipos necesarios (switches, APs, cableado, etc.).</li>
                            <li>• Recursos humanos requeridos.</li>
                            <li>• Cronograma detallado.</li>
                            <li>• KPIs de evaluación.</li>
                        </ul>
                    </div>

                    <h4 class="font-bold p-2 text-sm mb-2 uppercase text-phase-3">Participantes</h4>
                    <ol class="text-xs space-y-2 list-decimal ml-4 mb-4">
                        <li>Ejecutivo de Cuenta</li>
                        <li>Equipo Técnico</li>
                        <li>Operations Support</li>
                        <li>Administración / Inventarios</li>
                    </ol>
                </div>
            </div>

            {{-- Fase 4 --}}
            <div class="flex flex-col space-y-4">
                <div
                    class="arrow-header bg-phase-4 text-white p-4 h-24 flex flex-col justify-center items-center text-center">
                    <span class="text-sm font-bold uppercase">4. Ejecución</span>
                    <span class="text-[10px] opacity-90">Tiempo: Variable</span>
                </div>
                <div class="poc-card">
                    <h4 class="font-bold text-sm mb-2 uppercase text-phase-4 text-center">Tareas Clave</h4>
                    <p class="text-sm leading-relaxed mb-4">
                        <span class="font-bold">Objetivo:</span> Implementar y configurar la solución POC.
                    </p>

                    <h4 class="font-bold text-sm mb-2 uppercase text-phase-4">Asignar equipo técnico encargado de</h4>
                    <ol class="text-xs space-y-2 list-decimal ml-4 mb-4">
                        <li>Instalación de equipos en sitio.</li>
                        <li>Configuración de switches y APs.</li>
                        <li>Implementación de cableado.</li>
                        <li>Monitoreo inicial de desempeño.</li>
                    </ol>

                    <h4 class="font-bold text-sm mb-2 uppercase text-phase-4">Monitoreo de desempeño</h4>
                    <ol class="text-xs space-y-2 list-decimal ml-4 mb-4">
                        <li>Monitoreo inicial de desempeño.</li>
                        <li>Asegurar que los indicadores clave estén dentro de los rangos establecidos.</li>
                    </ol>

                    <div class="bg-purple-50 p-3 rounded-lg border border-purple-100">
                        <h5 class="font-bold text-xs mb-1 text-purple-700">Equipos Involucrados:</h5>
                        <ul class="text-xs text-purple-600 space-y-1 mb-2">
                            <li>◉ Switches y APs.</li>
                            <li>◉ Cableado estructurado.</li>
                            <li>◉ Equipos de monitoreo.</li>
                            <li>◉ Herramientas de prueba.</li>
                        </ul>
                        <h5 class="font-bold text-xs mb-1 text-purple-700">Resultados:</h5>
                        <ul class="text-xs text-purple-600 space-y-1">
                            <li>◉ Documentar resultados preliminares.</li>
                            <li>◉ Ajustar configuraciones si es necesario.</li>
                        </ul>
                    </div>

                    <h4 class="font-bold p-2 text-sm mb-2 uppercase text-phase-4">Participantes</h4>
                    <ol class="text-xs space-y-2 list-decimal ml-4 mb-4">
                        <li>Ejecutivo de Cuenta</li>
                        <li>Equipo Técnico</li>
                        <li>Operations Support</li>
                    </ol>
                </div>
            </div>
        </div>

        {{-- ============================================
             Requisitos + Roles
             ============================================ --}}
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-7 mb-16">

            {{-- Requisitos --}}
            <div class="pocv-card pocv-anim-up">
                <div class="pocv-card-head">
                    <div class="ic"><i class="las la-clipboard-check"></i></div>
                    <div>
                        <h3>Requisitos para Iniciar POC</h3>
                        <p class="text-xs text-gray-500 mt-0.5">Lista de validación previa</p>
                    </div>
                </div>

                <div class="space-y-1">
                    <div class="pocv-req-item">
                        <span class="check"><i class="las la-check"></i></span>
                        <div>
                            <h4>Documentación Completa</h4>
                            <p>Formulario de solicitud con toda la información requerida del cliente.</p>
                        </div>
                    </div>
                    <div class="pocv-req-item">
                        <span class="check"><i class="las la-check"></i></span>
                        <div>
                            <h4>Aprobación Interna</h4>
                            <p>Validación técnica y aprobación de gerencia para proceder.</p>
                        </div>
                    </div>
                    <div class="pocv-req-item">
                        <span class="check"><i class="las la-check"></i></span>
                        <div>
                            <h4>Recursos Disponibles</h4>
                            <p>Equipos, personal y tiempo asignado para la implementación.</p>
                        </div>
                    </div>
                    <div class="pocv-req-item">
                        <span class="check"><i class="las la-check"></i></span>
                        <div>
                            <h4>Acuerdo con el Cliente</h4>
                            <p>Aceptación formal del alcance y términos de la POC por parte del cliente.</p>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Roles --}}
            <div class="pocv-card pocv-anim-up">
                <div class="pocv-card-head">
                    <div class="ic"><i class="las la-users"></i></div>
                    <div>
                        <h3>Roles de los Participantes</h3>
                        <p class="text-xs text-gray-500 mt-0.5">Responsabilidades por función</p>
                    </div>
                </div>

                <div>
                    <div class="pocv-role-row">
                        <span class="name">
                            <span class="ic"><i class="las la-user-tie"></i></span>
                            Ejecutivo de Cuenta
                        </span>
                        <span class="tag"
                            style="background:#dbeafe; color:#1e40af; border-color:#bfdbfe;">Coordinador</span>
                    </div>
                    <div class="pocv-role-row">
                        <span class="name">
                            <span class="ic"><i class="las la-users-cog"></i></span>
                            Equipo Técnico
                        </span>
                        <span class="tag"
                            style="background:#dcfce7; color:#15803d; border-color:#bbf7d0;">Implementación</span>
                    </div>
                    <div class="pocv-role-row">
                        <span class="name">
                            <span class="ic"><i class="las la-life-ring"></i></span>
                            Operations Support
                        </span>
                        <span class="tag"
                            style="background:#f3e8ff; color:#6b21a8; border-color:#ddd6fe;">Soporte</span>
                    </div>
                    <div class="pocv-role-row">
                        <span class="name">
                            <span class="ic"><i class="las la-cogs"></i></span>
                            Administración
                        </span>
                        <span class="tag"
                            style="background:#fff7ed; color:#c2410c; border-color:#fed7aa;">Recursos</span>
                    </div>
                    <div class="pocv-role-row">
                        <span class="name">
                            <span class="ic"><i class="las la-user-shield"></i></span>
                            Gerencia
                        </span>
                        <span class="tag"
                            style="background:#fee2e2; color:#991b1b; border-color:#fecaca;">Aprobación</span>
                    </div>
                </div>
            </div>
        </div>

        {{-- ============================================
             Evaluación y Cierre
             ============================================ --}}
        <div class="text-center mb-10">
            <span class="pocv-eyebrow mb-3"><i class="las la-flag-checkered"></i> Cierre del proceso</span>
            <h2 class="text-3xl md:text-4xl font-extrabold tracking-tight text-gray-900 mt-3">
                Evaluación y Cierre de la <span class="pocv-title-grad">POC</span>
            </h2>
            <p class="text-gray-600 mt-2 max-w-2xl mx-auto">
                Etapa final donde se presentan resultados y se mide el éxito de la prueba.
            </p>
            <div class="pocv-divider"><span class="dot"></span><span class="line"></span><span
                    class="dot"></span></div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-12 gap-7 items-start mb-16">

            {{-- Tareas de cierre --}}
            <div class="md:col-span-4 pocv-anim-up">
                <div class="pocv-eval-card">
                    <div class="head">
                        <div class="ic"><i class="las la-tasks"></i></div>
                        <h3>Tareas Clave de Cierre</h3>
                    </div>

                    <div class="pocv-eval-task">
                        <div class="task-title">
                            <span class="ic"><i class="las la-file-alt"></i></span>
                            Presentar los resultados
                        </div>
                        <ul>
                            <li>Informe técnico con los resultados obtenidos.</li>
                            <li>Comparativa con los objetivos iniciales.</li>
                        </ul>
                    </div>

                    <div class="pocv-eval-task">
                        <div class="task-title">
                            <span class="ic"><i class="las la-comments"></i></span>
                            Recopilar retroalimentación
                        </div>
                        <ul>
                            <li>Identificar áreas de mejora.</li>
                            <li>Confirmar la disposición para avanzar con un proyecto definitivo.</li>
                        </ul>
                    </div>

                    <div class="pocv-eval-task">
                        <div class="task-title">
                            <span class="ic"><i class="las la-folder-open"></i></span>
                            Cierre administrativo
                        </div>
                        <ul>
                            <li>Actualizar registros internos.</li>
                            <li>Archivar documentación relevante.</li>
                        </ul>
                    </div>
                </div>
            </div>

            {{-- KPIs --}}
            <div class="md:col-span-8 pocv-anim-up">
                <div class="pocv-eval-card">
                    <div class="head">
                        <div class="ic"><i class="las la-chart-bar"></i></div>
                        <h3>Principales KPIs</h3>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div class="pocv-kpi">
                            <div class="ic"><i class="las la-stopwatch"></i></div>
                            <div>
                                <h4>Tiempo de respuesta a la solicitud</h4>
                                <p>Tiempo desde que ventas realiza la solicitud hasta que ingeniería la recibe.</p>
                            </div>
                        </div>
                        <div class="pocv-kpi">
                            <div class="ic"><i class="las la-pencil-ruler"></i></div>
                            <div>
                                <h4>Tiempo de preparación de propuesta</h4>
                                <p>Tiempo necesario para diseñar, planificar y documentar la PoC.</p>
                            </div>
                        </div>
                        <div class="pocv-kpi">
                            <div class="ic"><i class="las la-trophy"></i></div>
                            <div>
                                <h4>Tasa de éxito de la PoC</h4>
                                <p>Porcentaje de PoCs que cumplen con los requerimientos técnicos definidos.</p>
                            </div>
                        </div>
                        <div class="pocv-kpi">
                            <div class="ic"><i class="las la-exclamation-triangle"></i></div>
                            <div>
                                <h4>Tasa de incidencias técnicas</h4>
                                <p>Número de problemas o fallas durante la ejecución de la PoC.</p>
                            </div>
                        </div>
                        <div class="pocv-kpi">
                            <div class="ic"><i class="las la-smile"></i></div>
                            <div>
                                <h4>Satisfacción del cliente</h4>
                                <p>Calificación promedio obtenida mediante encuestas al finalizar la PoC.</p>
                            </div>
                        </div>
                        <div class="pocv-kpi">
                            <div class="ic"><i class="las la-dollar-sign"></i></div>
                            <div>
                                <h4>Costo por PoC</h4>
                                <p>Inversión promedio en recursos materiales, humanos y de tiempo por cada PoC.</p>
                            </div>
                        </div>
                        <div class="pocv-kpi">
                            <div class="ic"><i class="las la-microchip"></i></div>
                            <div>
                                <h4>Utilización de recursos técnicos</h4>
                                <p>Porcentaje de uso de equipos y personal en relación con su disponibilidad.</p>
                            </div>
                        </div>
                        <div class="pocv-kpi">
                            <div class="ic"><i class="las la-chart-line"></i></div>
                            <div>
                                <h4>Retorno de inversión (ROI)</h4>
                                <p>Relación entre el valor del proyecto ganado y el costo de su ejecución.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- ============================================
             Matriz RACI — SOLO se mejora el título.
             La tabla y sus clases NO se tocan.
             ============================================ --}}
        <div class="text-center mb-10">
            <span class="pocv-eyebrow mb-3"><i class="las la-table"></i> Asignación de responsabilidades</span>
            <h2 class="text-3xl md:text-4xl font-extrabold tracking-tight text-gray-900 mt-3">
                Matriz <span class="pocv-title-grad">RACI</span>
            </h2>
            <p class="text-gray-600 mt-2 max-w-2xl mx-auto">
                Asignación clara de responsabilidades por tarea dentro del proceso POC.
            </p>
            <div class="pocv-divider"><span class="dot"></span><span class="line"></span><span
                    class="dot"></span></div>
        </div>

        {{-- ⚠️ Tabla RACI: NO se modifican sus clases ⚠️ --}}
        <div class="bg-white rounded-lg shadow p-6 mb-12">
            <div>
                <div class="overflow-x-auto bg-white rounded-xl shadow-xl border border-slate-200">
                    <table class="w-full border-collapse raci-table">
                        <thead>
                            <tr class="bg-slate-200">
                                <th class="w-16 p-4 text-center font-bold text-slate-600 text-sm">FASE</th>
                                <th class="p-4 text-center font-bold text-slate-600 text-sm">TAREAS</th>
                                <th class="vertical-text">
                                    <div>Ejecutivo de<br> Cuenta</div>
                                </th>
                                <th class="vertical-text">
                                    <div>Gerente de<br> Venta</div>
                                </th>
                                <th class="vertical-text">
                                    <div>Operations <br>Support</div>
                                </th>
                                <th class="vertical-text">
                                    <div>Equipo<br> Técnico</div>
                                </th>
                                <th class="vertical-text">
                                    <div>Administración</div>
                                </th>
                                <th class="vertical-text">
                                    <div>Administración<br>Inventarios</div>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="bg-white text-center font-bold text-lg p-4" rowspan="10">
                                    <span class="vertical-text inline-block">P O C</span>
                                </td>
                                <td class="p-6 text-sm font-medium bg-white">
                                    Recopilar información inicial del cliente
                                </td>
                                <td class="bg-raci-r text-center font-bold text-lg">R</td>
                                <td class="bg-raci-a text-center font-bold text-lg">A</td>
                                <td class="bg-raci-c text-center font-bold text-lg">C</td>
                                <td class="bg-raci-i text-center font-bold text-lg">I</td>
                                <td class="bg-raci-w text-center font-bold text-lg"></td>
                                <td class="bg-raci-w text-center font-bold text-lg"></td>
                            </tr>
                            <tr>
                                <td class="p-6 text-sm font-medium bg-white">
                                    Confirmar la disposición con el cliente para realizarla
                                </td>
                                <td class="bg-raci-r text-center font-bold text-lg">R</td>
                                <td class="bg-raci-a text-center font-bold text-lg">A</td>
                                <td class="bg-raci-c text-center font-bold text-lg">C</td>
                                <td class="bg-raci-i text-center font-bold text-lg">I</td>
                                <td class="bg-raci-w text-center font-bold text-lg"></td>
                                <td class="bg-raci-w text-center font-bold text-lg"></td>
                            </tr>
                            <tr>
                                <td class="p-6 text-sm font-medium bg-white">
                                    Revisar la solicitud con el equipo técnico y operaciones para su evaluación
                                </td>
                                <td class="bg-raci-r text-center font-bold text-lg">R</td>
                                <td class="bg-raci-a text-center font-bold text-lg">A</td>
                                <td class="bg-raci-i text-center font-bold text-lg">I</td>
                                <td class="bg-raci-c text-center font-bold text-lg">C</td>
                                <td class="bg-raci-w text-center font-bold text-lg"></td>
                                <td class="bg-raci-w text-center font-bold text-lg"></td>
                            </tr>
                            <tr>
                                <td class="p-6 text-sm font-medium bg-white">
                                    Generar una propuesta inicial
                                </td>
                                <td class="bg-raci-r text-center font-bold text-lg">R</td>
                                <td class="bg-raci-a text-center font-bold text-lg">A</td>
                                <td class="bg-raci-a text-center font-bold text-lg">A</td>
                                <td class="bg-raci-r text-center font-bold text-lg">R</td>
                                <td class="bg-raci-c text-center font-bold text-lg">C</td>
                                <td class="bg-raci-i text-center font-bold text-lg">I</td>
                            </tr>
                            <tr>
                                <td class="p-6 text-sm font-medium bg-white">
                                    Obtener la aprobación de Gerencia
                                </td>
                                <td class="bg-raci-r text-center font-bold text-lg">R</td>
                                <td class="bg-raci-a text-center font-bold text-lg">A</td>
                                <td class="bg-raci-c text-center font-bold text-lg">C</td>
                                <td class="bg-raci-i text-center font-bold text-lg">I</td>
                                <td class="bg-raci-c text-center font-bold text-lg">C</td>
                                <td class="bg-raci-i text-center font-bold text-lg">I</td>
                            </tr>
                            <tr>
                                <td class="p-6 text-sm font-medium bg-white">
                                    Realizar una visita técnica a sitio con el cliente (si aplica)
                                </td>
                                <td class="bg-raci-c text-center font-bold text-lg">C</td>
                                <td class="bg-raci-i text-center font-bold text-lg">I</td>
                                <td class="bg-raci-a text-center font-bold text-lg">A</td>
                                <td class="bg-raci-r text-center font-bold text-lg">R</td>
                                <td class="bg-raci-w text-center font-bold text-lg"></td>
                                <td class="bg-raci-w text-center font-bold text-lg"></td>
                            </tr>
                            <tr>
                                <td class="p-6 text-sm font-medium bg-white">
                                    Diseñar el plan técnico
                                </td>
                                <td class="bg-raci-r text-center font-bold text-lg">R</td>
                                <td class="bg-raci-a text-center font-bold text-lg">A</td>
                                <td class="bg-raci-c text-center font-bold text-lg">C</td>
                                <td class="bg-raci-r text-center font-bold text-lg">R</td>
                                <td class="bg-raci-w text-center font-bold text-lg"></td>
                                <td class="bg-raci-w text-center font-bold text-lg"></td>
                            </tr>
                            <tr>
                                <td class="p-6 text-sm font-medium bg-white">
                                    Preparar documento formal con el alcance y los términos del POC para la aprobación del
                                    cliente
                                </td>
                                <td class="bg-raci-r text-center font-bold text-lg">R</td>
                                <td class="bg-raci-a text-center font-bold text-lg">A</td>
                                <td class="bg-raci-c text-center font-bold text-lg">C</td>
                                <td class="bg-raci-i text-center font-bold text-lg">I</td>
                                <td class="bg-raci-w text-center font-bold text-lg"></td>
                                <td class="bg-raci-w text-center font-bold text-lg"></td>
                            </tr>
                            <tr>
                                <td class="p-6 text-sm font-medium bg-white">
                                    Solicitud de Equipos
                                </td>
                                <td class="bg-raci-r text-center font-bold text-lg">R</td>
                                <td class="bg-raci-w text-center font-bold text-lg"></td>
                                <td class="bg-raci-w text-center font-bold text-lg"></td>
                                <td class="bg-raci-i text-center font-bold text-lg">I</td>
                                <td class="bg-raci-a text-center font-bold text-lg">A</td>
                                <td class="bg-raci-c text-center font-bold text-lg">C</td>
                            </tr>
                            <tr>
                                <td class="p-6 text-sm font-medium bg-white">
                                    Entrega de Equipos
                                </td>
                                <td class="bg-raci-c text-center font-bold text-lg">C</td>
                                <td class="bg-raci-w text-center font-bold text-lg"></td>
                                <td class="bg-raci-i text-center font-bold text-lg">I</td>
                                <td class="bg-raci-c text-center font-bold text-lg">C</td>
                                <td class="bg-raci-a text-center font-bold text-lg">A</td>
                                <td class="bg-raci-r text-center font-bold text-lg">R</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="mt-12 grid grid-cols-2 md:grid-cols-4 gap-4 max-w-2xl mx-auto">
                    <div class="flex items-center space-x-2 bg-white p-3 rounded-lg border border-slate-200">
                        <div class="w-6 h-6 bg-raci-r rounded flex items-center justify-center font-bold text-xs">
                            R
                        </div>
                        <span class="text-xs font-semibold text-slate-600">Responsable</span>
                    </div>
                    <div class="flex items-center space-x-2 bg-white p-3 rounded-lg border border-slate-200">
                        <div
                            class="w-6 h-6 bg-raci-a rounded flex items-center justify-center font-bold text-xs text-white">
                            A
                        </div>
                        <span class="text-xs font-semibold text-slate-600">Aprobador</span>
                    </div>
                    <div class="flex items-center space-x-2 bg-white p-3 rounded-lg border border-slate-200">
                        <div class="w-6 h-6 bg-raci-c rounded flex items-center justify-center font-bold text-xs">
                            C
                        </div>
                        <span class="text-xs font-semibold text-slate-600">Consultado</span>
                    </div>
                    <div class="flex items-center space-x-2 bg-white p-3 rounded-lg border border-slate-200">
                        <div
                            class="w-6 h-6 bg-raci-i rounded flex items-center justify-center font-bold text-xs text-white">
                            I
                        </div>
                        <span class="text-xs font-semibold text-slate-600">Informado</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
