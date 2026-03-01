@extends('layouts.diagrama')

@section('title', 'Intranet Corporativa')

@push('css')
    <link href="https://fonts.googleapis.com" rel="preconnect" />
    <link crossorigin="" href="https://fonts.gstatic.com" rel="preconnect" />
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&amp;family=Montserrat:wght@700;900&amp;display=swap"
        rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap"
        rel="stylesheet" />
    <script src="https://cdn.tailwindcss.com?plugins=forms,typography,container-queries"></script>
@endpush

@section('content')

    <!-- Breadcrumb -->
    <div class="bg-white border-b border-gray-200 mt-5">
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
                            <a href="{{ route('intranet.estructurainterna.proceso-comercial') }}"
                                class="ml-1 text-sm text-gray-600 hover:text-orange-600 md:ml-2">Proceso Comercial</a>
                        </div>
                    </li>
                    <li aria-current="page">
                        <div class="flex items-center">
                            <i class="fas fa-chevron-right text-gray-400 mx-2"></i>
                            <span class="ml-1 text-sm text-primary font-medium md:ml-2">Diagrama</span>
                        </div>
                    </li>
                </ol>
            </nav>
        </div>
    </div>

    <!-- Navegación de fases (flotante) -->
    <div class="sticky top-16 z-40 bg-white/80 backdrop-blur-sm border-b border-slate-200 py-3 hidden lg:block">
        <div class="max-w-[1600px] mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-center space-x-2">
                <a href="#fase-1"
                    class="px-3 py-1 bg-phase-1 text-white text-xs font-bold rounded-full hover:opacity-90 transition">Fase
                    1</a>
                <a href="#fase-2"
                    class="px-3 py-1 bg-phase-2 text-white text-xs font-bold rounded-full hover:opacity-90 transition">Fase
                    2</a>
                <a href="#fase-3"
                    class="px-3 py-1 bg-phase-3 text-white text-xs font-bold rounded-full hover:opacity-90 transition">Fase
                    3</a>
                <a href="#fase-4"
                    class="px-3 py-1 bg-phase-4 text-white text-xs font-bold rounded-full hover:opacity-90 transition">Fase
                    4</a>
                <a href="#fase-5"
                    class="px-3 py-1 bg-phase-5 text-white text-xs font-bold rounded-full hover:opacity-90 transition">Fase
                    5</a>
                <a href="#fase-6"
                    class="px-3 py-1 bg-phase-6 text-white text-xs font-bold rounded-full hover:opacity-90 transition">Fase
                    6</a>
                <a href="#fase-7"
                    class="px-3 py-1 bg-phase-7 text-white text-xs font-bold rounded-full hover:opacity-90 transition">Fase
                    7</a>
                <a href="#fase-8"
                    class="px-3 py-1 bg-phase-8 text-white text-xs font-bold rounded-full hover:opacity-90 transition">Fase
                    8</a>
                <a href="#fase-9"
                    class="px-3 py-1 bg-phase-9 text-white text-xs font-bold rounded-full hover:opacity-90 transition">Fase
                    9</a>
                <a href="#fase-10"
                    class="px-3 py-1 bg-phase-10 text-white text-xs font-bold rounded-full hover:opacity-90 transition">Fase
                    10</a>
            </div>
        </div>
    </div>


    <header class="text-center mb-16 mt-12">
        <h1 class="text-5xl font-black font-display tracking-tight text-primary uppercase">
            PROCESO COMERCIAL COMPLETO
        </h1>
        <p class="text-slate-600 mt-4">Fases 1 a 10 - Ciclo completo del Proceso Comercial IT</p>
    </header>

    <div class="p-4 bg-slate-50 flex justify-start space-x-2 border-t border-slate-100">
        <a href="3"
            class="bg-primary hover:bg-orange-600 text-white px-4 py-2 rounded text-xs font-bold transition-colors">
            <i class="ri-arrow-left-line"></i> Regresar
        </a>
    </div>

    <!-- Grid de fases (1-5 en primera fila, 6-10 en segunda fila) -->
    <div class="space-y-12">
        <!-- Primera fila: Fases 1-5 -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-4 items-start">
            <!-- Fase 1 -->
            <div id="fase-1" class="phase-section flex flex-col space-y-4">
                <div
                    class="arrow-header bg-phase-6 text-white p-4 h-24 flex flex-col justify-center items-center text-center">
                    <span class="text-sm font-bold uppercase">1. Fase: Generación de Demanda y Omnicanal</span>
                    <span class="text-[10px] opacity-90">Tiempo Estimado 20 Hrs</span>
                </div>
                <div class="phase-card">
                    <p class="text-sm leading-relaxed"><span class="font-bold">Objetivo:</span> Brindar una comunicación
                        integral a nuestros clientes a través de múltiples canales.</p>
                </div>
                <div class="phase-card">
                    <h4 class="font-bold text-sm mb-2 uppercase">Tareas Clave:</h4>
                    <ol class="text-xs space-y-2 list-decimal ml-4">
                        <li>Campañas de marketing digital</li>
                        <li>Participación en eventos y ferias</li>
                        <li>Activación de referidos mediante socios y clientes existentes</li>
                        <li>Creación de contenido relevante (webinars, estudios de caso)</li>
                    </ol>
                </div>
                <div class="phase-card">
                    <h4 class="font-bold text-sm mb-2 uppercase">Entregables:</h4>
                    <ol class="text-xs space-y-2 list-decimal ml-4">
                        <li>Leads Captados<br>
                            <a href="#" class="text-orange-500">Ver Archivo</a>
                        </li>
                        <li>Reporte de métricas de campañas</li>
                    </ol>
                </div>
                <div class="phase-card">
                    <h4 class="font-bold text-sm mb-2 uppercase">Participantes:</h4>
                    <ol class="text-xs space-y-2 list-decimal ml-4">
                        <li>Gerente Marketing</li>
                        <li>Equipo de Marketing Digital</li>
                        <li>Diseñadores de Contenido</li>
                        <li>Gerencia Ventas</li>
                        <li>Dirección General</li>
                    </ol>
                </div>
            </div>

            <!-- Fase 2 -->
            <div id="fase-2" class="phase-section flex flex-col space-y-4">
                <div
                    class="arrow-header bg-phase-6 text-white p-4 h-24 flex flex-col justify-center items-center text-center">
                    <span class="text-sm font-bold uppercase">2. Fase: Asignación de Cuentas y Segmentación de
                        Oportunidades</span>
                    <span class="text-[10px] opacity-90">Tiempo Estimado 15 Hrs</span>
                </div>
                <div class="phase-card">
                    <p class="text-sm leading-relaxed"><span class="font-bold">Objetivo:</span> Identificar los clientes
                        potenciales, para su seguimiento.</p>
                </div>
                <div class="phase-card">
                    <h4 class="font-bold text-sm mb-2 uppercase">Tareas Clave:</h4>
                    <ol class="text-xs space-y-2 list-decimal ml-4">
                        <li>Evaluar el tipo de oportunidad</li>
                        <li>Subir archivo para carga CRM</li>
                        <li>Asignar ejecutivos de cuenta</li>
                        <li>Establecer prioridades según el potencial y tamaño del cliente</li>
                    </ol>
                </div>
                <div class="phase-card">
                    <h4 class="font-bold text-sm mb-2 uppercase">Entregables:</h4>
                    <ol class="text-xs space-y-2 list-decimal ml-4">
                        <li>Porcentaje de oportunidades atendidas en tiempo y forma</li>
                        <li>Tasa de conversión por tipo de oportunidad</li>
                    </ol>
                </div>
                <div class="phase-card">
                    <h4 class="font-bold text-sm mb-2 uppercase">Participantes:</h4>
                    <ol class="text-xs space-y-2 list-decimal ml-4">
                        <li>Gerente Marketing</li>
                        <li>Gerencia Ventas</li>
                        <li>Ejecutivo de Cuenta</li>
                        <li>Responsable CRM</li>
                    </ol>
                </div>
            </div>

            <!-- Fase 3 -->
            <div id="fase-3" class="phase-section flex flex-col space-y-4">
                <div
                    class="arrow-header bg-phase-6 text-white p-4 h-24 flex flex-col justify-center items-center text-center">
                    <span class="text-sm font-bold uppercase">3. Fase: Análisis de Requerimientos</span>
                    <span class="text-[10px] opacity-90">Tiempo Estimado 25 Hrs</span>
                </div>
                <div class="phase-card">
                    <p class="text-sm leading-relaxed"><span class="font-bold">Objetivo:</span> Entender las necesidades
                        del
                        cliente y mapear los requisitos
                        funcionales y técnicos.</p>
                </div>
                <div class="phase-card">
                    <h4 class="font-bold text-sm mb-2 uppercase">Tareas Clave:</h4>
                    <ol class="text-xs space-y-2 list-decimal ml-4">
                        <li>Realizar reuniones con clientes</li>
                        <li>Calificación de leads (BANT o similares)</li>
                        <li>Documentar requerimientos y objetivos de negocio</li>
                        <li>Analizar restricciones técnicas, financieras y de tiempo</li>
                    </ol>
                </div>
                <div class="phase-card">
                    <h4 class="font-bold text-sm mb-2 uppercase">Entregables:</h4>
                    <ol class="text-xs space-y-2 list-decimal ml-4">
                        <li>Documento de Requisitos del Cliente (RFP)</li>
                        <li>Mapa de requerimientos</li>
                        <li>Análisis de brechas</li>
                    </ol>
                </div>
                <div class="phase-card">
                    <h4 class="font-bold text-sm mb-2 uppercase">Participantes:</h4>
                    <ol class="text-xs space-y-2 list-decimal ml-4">
                        <li>Ejecutivo de Cuenta</li>
                        <li>Equipo Tecnico</li>
                        <li>Gerente Proyecto</li>
                    </ol>
                </div>
            </div>

            <!-- Fase 4 -->
            <div id="fase-4" class="phase-section flex flex-col space-y-4">
                <div
                    class="arrow-header bg-phase-4 text-white p-4 h-24 flex flex-col justify-center items-center text-center">
                    <span class="text-sm font-bold uppercase">4. Fase: Diseño de Solución y Propuesta
                        Técnico-Comercial</span>
                </div>
                <div class="bg-phase-4 rounded-2xl p-6 text-white text-center h-full flex flex-col justify-between">
                    <div>
                        <span class="block font-bold mb-3">Objetivo:</span>
                        <p class="text-sm leading-relaxed mb-6 text-justify"> Preparar y presentar una
                            propuesta detallada que incluya costos, términos y condiciones, según las
                            necesidades del proyecto.</p>
                        <p class="text-sm leading-relaxed mb-6">Entrega formal del proyecto finalizado al cliente</p>
                    </div>
                    <div class="mt-8 pt-4 border-t border-white/20 text-xs text-left">
                        <span class="font-bold opacity-80">Ver Proceso:</span><br />
                        <a href="#" class="text-white-500 font-medium"> Ingenieria - Proceso Comercial
                            Ingeniería</a>
                    </div>
                </div>
            </div>

            <!-- Fase 5 -->
            <div id="fase-5" class="phase-section flex flex-col space-y-4">
                <div
                    class="arrow-header bg-phase-5 text-white p-4 h-24 flex flex-col justify-center items-center text-center">
                    <span class="text-sm font-bold uppercase">4. Fase: Proceso Administrativo - Facturación -
                        Inventario</span>
                </div>
                <div class="bg-phase-5 rounded-2xl p-6 text-white text-left h-full flex flex-col justify-between">
                    <div>
                        <span class="block font-bold mb-3 text-center">Confirmar y Garantizar:</span>
                        <ol class="list-disc pl-5 text-white-600 space-y-1">
                            <li>Entrega de equipos, licencias</li>
                            <li>Plan de viáticos</li>
                            <li>Generación de facturación (anticipos, pago a una exposición, inicio de pagos a varias
                                exposiciones)</li>
                        </ol>
                    </div>
                    <div class="mt-8 pt-4 border-t border-white/20 text-xs text-left">
                        <span class="font-bold opacity-80">Ver Proceso:</span><br />
                        <a href="#" class="text-white-500 font-medium"> Administración Finanzas - Inventario</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Segunda fila: Fases 6-10 -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-4 items-start">
            <!-- Fase 6 -->
            <div id="fase-6" class="phase-section flex flex-col space-y-4">
                <div
                    class="arrow-header bg-phase-6 text-white p-4 h-24 flex flex-col justify-center items-center text-center">
                    <span class="text-sm font-bold uppercase">6. Fase: Negociación y Cierre</span>
                    <span class="text-[10px] opacity-90">Tiempo Estimado 40 Hrs</span>
                </div>
                <div class="phase-card">
                    <p class="text-sm leading-relaxed"><span class="font-bold">Objetivo:</span> Lograr la aceptación
                        formal del cliente y la firma del contrato</p>
                </div>
                <div class="phase-card">
                    <h4 class="font-bold text-sm mb-2 uppercase">Tareas Clave:</h4>
                    <ol class="text-xs space-y-2 list-decimal ml-4">
                        <li>Presentación de propuestas.</li>
                        <li>Revisar términos comerciales y técnicos con el cliente.</li>
                        <li>Gestionar objeciones y renegociar si es necesario.</li>
                        <li>Formalizar acuerdos (contratos, órdenes de compra).</li>
                        <li>Entrega Factura(s).</li>
                    </ol>
                </div>
                <div class="phase-card">
                    <h4 class="font-bold text-sm mb-2 uppercase">Entregables:</h4>
                    <ol class="text-xs space-y-2 list-decimal ml-4">
                        <li>Paquete de diseño final (documentación consolidada).</li>
                        <li>Checklist de revisión técnica y comercial.</li>
                        <li>Soporte en reuniones de presentación al cliente.</li>
                        <li>Contrato Firmado</li>
                    </ol>
                </div>
                <div class="phase-card">
                    <h4 class="font-bold text-sm mb-2 uppercase">Participantes:</h4>
                    <ol class="text-xs space-y-2 list-decimal ml-4">
                        <li>Arquitecto de Soluciones</li>
                        <li>Gerente Ventas</li>
                        <li>Ejecutivo Ventas</li>
                        <li>Gerente de Proyecto</li>
                    </ol>
                </div>
            </div>

            <!-- Fase 7 -->
            <div id="fase-7" class="phase-section flex flex-col space-y-4">
                <div
                    class="arrow-header bg-phase-7 text-white p-4 h-24 flex flex-col justify-center items-center text-center">
                    <span class="text-sm font-bold uppercase">7. Fase: Entrega Servicios a Cliente</span>
                </div>
                <div class="bg-phase-7 rounded-2xl p-6 text-white text-center h-full flex flex-col justify-between">
                    <div>
                        <span class="block font-bold mb-3">Objetivo:</span>
                        <p class="text-sm leading-relaxed mb-6">Realizar la implementación de la solución, cuidando el
                            alcance, tiempo y entregables que se ofreció en el contrato.</p>
                        <p class="text-sm leading-relaxed mb-6">Entrega formal del proyecto finalizado al cliente</p>
                    </div>
                    <div class="mt-8 pt-4 border-t border-white/20 text-xs text-left">
                        <span class="opacity-80">Ver Proceso:</span><br />
                        Ingeniería - Proceso Comercial Ingeniería
                    </div>
                </div>
            </div>

            <!-- Fase 8 -->
            <div id="fase-8" class="phase-section flex flex-col space-y-4">
                <div
                    class="arrow-header bg-phase-8 text-white p-4 h-24 flex flex-col justify-center items-center text-center">
                    <span class="text-sm font-bold uppercase">8. Fase: Soporte a Cliente</span>
                </div>
                <div class="bg-phase-8 rounded-2xl p-6 text-white text-center h-full flex flex-col justify-between">
                    <div>
                        <span class="block font-bold mb-3">Objetivo:</span>
                        <p class="text-sm leading-relaxed mb-6">Asegurar la operación continua y eficiente de los
                            servicios, cumpliendo SLA y gestionando incidentes, problemas y cambios.</p>
                    </div>
                    <div class="mt-8 pt-4 border-t border-white/20 text-xs text-left">
                        <span class="opacity-80">Ver Proceso:</span><br />
                        Ingeniería - Proceso Comercial Ingeniería
                    </div>
                </div>
            </div>

            <!-- Fase 9 -->
            <div id="fase-9" class="phase-section flex flex-col space-y-4">
                <div
                    class="arrow-header bg-phase-6 text-white p-4 h-24 flex flex-col justify-center items-center text-center">
                    <span class="text-sm font-bold uppercase">9. Fase: Acompañamiento Comercial y Mejora Continua</span>
                    <span class="text-[10px] opacity-90">Tiempo Estimado 0 a 0 Hrs</span>
                </div>
                <div class="phase-card">
                    <p class="text-sm leading-relaxed"><span class="font-bold">Objetivo:</span> Generar propuestas que
                        aumenten el valor para el cliente.</p>
                </div>
                <div class="phase-card">
                    <h4 class="font-bold text-sm mb-2 uppercase">Tareas Clave:</h4>
                    <ol class="text-xs space-y-2 list-decimal ml-4">
                        <li>Revisiones periódicas de satisfacción y desempeño.</li>
                        <li>Identificación de necesidades adicionales (cross-selling, upselling).</li>
                        <li>Proponer mejoras continuas a las soluciones existentes.</li>
                    </ol>
                </div>
                <div class="phase-card">
                    <h4 class="font-bold text-sm mb-2 uppercase">Entregables:</h4>
                    <ol class="text-xs space-y-2 list-decimal ml-4">
                        <li>Informes de rendimiento</li>
                    </ol>
                </div>
                <div class="phase-card">
                    <h4 class="font-bold text-sm mb-2 uppercase">Participantes:</h4>
                    <ol class="text-xs space-y-2 list-decimal ml-4">
                        <li>Arquitecto de Soluciones</li>
                        <li>Consultor Comercial</li>
                        <li>Ejecutivo de Cuenta</li>
                        <li>Gerente Ventas</li>
                        <li>Gerente de Proyecto</li>
                    </ol>
                </div>
            </div>

            <!-- Fase 10 -->
            <div id="fase-10" class="phase-section flex flex-col space-y-4">
                <div
                    class="arrow-header bg-phase-6 text-white p-4 h-24 flex flex-col justify-center items-center text-center">
                    <span class="text-sm font-bold uppercase">10. Fase: Programa de Lealtad y Fidelización</span>
                    <span class="text-[10px] opacity-90">Tiempo Estimado 0 a 0 Hrs</span>
                </div>
                <div class="phase-card">
                    <p class="text-sm leading-relaxed"><span class="font-bold">Objetivo:</span> Incrementar la fidelidad y
                        satisfacción del cliente.</p>
                </div>
                <div class="phase-card">
                    <h4 class="font-bold text-sm mb-2 uppercase">Tareas Clave:</h4>
                    <ol class="text-xs space-y-2 list-decimal ml-4">
                        <li>Diseñar esquemas de recompensas.</li>
                        <li>Reconocer a clientes destacados.</li>
                        <li>Ofrecer programas personalizados de capacitación o soporte.</li>
                    </ol>
                </div>
                <div class="phase-card">
                    <h4 class="font-bold text-sm mb-2 uppercase">Entregables:</h4>
                    <ol class="text-xs space-y-2 list-decimal ml-4">
                        <li>Plan de Programas de lealtad</li>
                    </ol>
                </div>
                <div class="phase-card">
                    <h4 class="font-bold text-sm mb-2 uppercase">Participantes:</h4>
                    <ol class="text-xs space-y-2 list-decimal ml-4">
                        <li>Arquitecto de Soluciones</li>
                        <li>Consultor Comercial</li>
                        <li>Ejecutivo de Cuenta</li>
                        <li>Gerente Ventas</li>
                        <li>Gerente de Proyecto</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <!-- Resumen de tiempos -->
    <div class="mt-16 bg-white rounded-2xl border border-gray-300 p-6">
        <h3 class="text-xl font-bold text-primary mb-4">Resumen de Tiempos Estimados</h3>
        <div class="grid grid-cols-2 md:grid-cols-5 gap-4">
            <div class="text-center">
                <div class="text-2xl font-bold text-phase-1">80 Hrs</div>
                <div class="text-sm text-slate-600">Fases 1-4</div>
            </div>
            <div class="text-center">
                <div class="text-2xl font-bold text-phase-5">20 Hrs</div>
                <div class="text-sm text-slate-600">Fase 5</div>
            </div>
            <div class="text-center">
                <div class="text-2xl font-bold text-phase-6">40 Hrs</div>
                <div class="text-sm text-slate-600">Fase 6</div>
            </div>
            <div class="text-center">
                <div class="text-2xl font-bold text-phase-7">Varía</div>
                <div class="text-sm text-slate-600">Fases 7-8</div>
            </div>
            <div class="text-center">
                <div class="text-2xl font-bold text-primary">140+ Hrs</div>
                <div class="text-sm text-slate-600">Total Estimado</div>
            </div>
        </div>
    </div>




@endsection
@push('js')
@endpush
