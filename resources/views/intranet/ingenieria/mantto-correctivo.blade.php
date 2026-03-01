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
                            <a href="{{ route('intranet.estructurainterna.ingenieria') }}"
                                class="ml-1 text-sm text-gray-600 hover:text-orange-600 md:ml-2">Ingenieria
                            </a>
                        </div>
                    </li>
                    <li aria-current="page">
                        <div class="flex items-center">
                            <i class="fas fa-chevron-right text-gray-400 mx-2"></i>
                            <span class="ml-1 text-sm text-primary font-medium md:ml-2">Mantenimineto Correctivo</span>
                        </div>
                    </li>
                </ol>
            </nav>
        </div>
    </div>

    <!-- Encabezado -->
    <header class="mt-8 mb-8">
        <h1 class="text-3xl font-bold text-gray-800 mb-2">Proceso Ingeniería IT - Mantenimiento Correctivo</h1>
        <p class="text-gray-600">Cuando se presenta una incidencia o falla, es esencial contar con un protocolo de
            mantenimiento correctivo que clasifique los casos por nivel de severidad (crítico, alto, medio, bajo) y aplique
            los tiempos de respuesta y resolución definidos en el SLA, garantizando la continuidad operativa del cliente.
        </p>
    </header>
    <div class="text-center mb-16 mt-8">
        <h1 class="text-5xl font-black font-display tracking-tight text-slate-900 uppercase">
            Proceso <span class="text-primary  uppercase">Mantenimiento Correctivo</span>
        </h1>
        <p></p>
        <p class="text-slate-600 mt-6 text-lg">Flujo completo de ejecución</p>
    </div>

    <!-- Grid de fases del proceso -->
    <!-- Grid de fases (1-5 en primera fila, 6-10 en segunda fila) -->
    <div class="space-y-12">
        <!-- Primera fila: Fases 1-5 -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 items-start">
            <!-- Fase 1 -->
            <div id="fase-1" class="phase-section flex flex-col space-y-4">
                <div
                    class="arrow-header bg-phase-1 text-white p-4 h-24 flex flex-col justify-center items-center text-center">
                    <span class="text-sm font-bold uppercase">1. Fase: Detección del Problema</span>
                    <span class="text-[10px] opacity-90">Tiempo Variable</span>
                </div>
                <div class="poc-card">
                    <h4 class="font-bold text-sm mb-2 uppercase text-phase-1 text-center">Tareas Clave:</h4>
                    <h6 class="font-bold text-sm mb-2 uppercase text-phase-1">Recepción del incidente JIRA:</h6>
                    <ol class="text-xs space-y-2 list-decimal ml-4 mb-4">
                        <li>El cliente reporta un problema a través del canal designado (correo, ticket, llamada)</li>
                        <li>Registrar los detalles:
                            <ul>
                                <li>• Descripción del problema</li>
                                <li>• Equipo afectado</li>
                                <li>• Serie del/los equipos</li>
                                <li>• Ubicación</li>
                                <li>• Usuario afectado</li>
                                <li>• Impacto en la operación</li>
                            </ul>
                        </li>
                    </ol>

                    <h6 class="font-bold text-sm mb-2 uppercase text-phase-1">Asignación del caso:</h6>
                    <ol class="text-xs space-y-2 list-decimal ml-4 mb-4">
                        <li>El incidente es asignado a un técnico especializado según la complejidad y el tipo de equipo
                        </li>
                    </ol>
                    <div class="bg-blue-50 p-3 rounded-lg border border-blue-100">
                        <h5 class="font-bold text-xs mb-1 text-blue-700">Participantes</h5>
                        <ul class="text-xs text-blue-600 space-y-1">
                            <li>✓ Ejecutivo Cuenta</li>
                            <li>✓ Equipo técnico asignado</li>
                            <li>✓ Operations Support</li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Fase 2 -->
            <div id="fase-2" class="phase-section flex flex-col space-y-4">
                <div
                    class="arrow-header bg-phase-2 text-white p-4 h-24 flex flex-col justify-center items-center text-center">
                    <span class="text-sm font-bold uppercase">2. Fase: Diagnóstico</span>
                    <span class="text-[10px] opacity-90">Tiempo Variable</span>
                </div>
                <div class="poc-card">
                    <h4 class="font-bold text-sm mb-2 uppercase text-phase-1 text-center">Tareas Clave:</h4>
                    <h6 class="font-bold text-sm mb-2 uppercase text-phase-1">Análisis Inicial (Remoto o Presencial):</h6>
                    <ol class="text-xs space-y-2 list-decimal ml-4 mb-4">
                        <li>Verificar logs y alarmas del equipo</li>
                        <li>Probar conectividad y funcionabilidad básica</li>
                        <li>Identificar si el problema es interno (configuración) o externo (hardware dañado)</li>
                    </ol>
                    <h6 class="font-bold text-sm mb-2 uppercase text-phase-1">Confirmación de la Falla:</h6>
                    <ol class="text-xs space-y-2 list-decimal ml-4 mb-4">
                        <li>Ejecutar pruebas especificas según el equipo:
                            <ul>
                                <li>• Pruebas de loopback</li>
                                <li>• Inspección fisica</li>
                                <li>• Diagnóstico por interfaz web oCLI</li>
                            </ul>
                        </li>
                        <li>Identificar si la falla es solucionable localmente o requiere reemplazo</li>
                    </ol>
                    <div class="bg-blue-50 p-3 rounded-lg border border-blue-100">
                        <h5 class="font-bold text-xs mb-1 text-blue-700">Participantes</h5>
                        <ul class="text-xs text-blue-600 space-y-1">
                            <li>✓ Equipo técnico asignado</li>
                            <li>✓ Operations Support</li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Fase 3 -->
            <div id="fase-3" class="phase-section flex flex-col space-y-4">
                <div
                    class="arrow-header bg-phase-3 text-white p-4 h-24 flex flex-col justify-center items-center text-center">
                    <span class="text-sm font-bold uppercase">3. Fase: Solución Local (si aplica)</span>
                    <span class="text-[10px] opacity-90">Tiempo Variable</span>
                </div>
                <div class="poc-card">
                    <h4 class="font-bold text-sm mb-2 uppercase text-phase-1 text-center">Tareas Clave:</h4>
                    <h6 class="font-bold text-sm mb-2 uppercase text-phase-1">Configuración o Reparación inmediata:</h6>
                    <ol class="text-xs space-y-2 list-decimal ml-4 mb-4">
                        <li>Ajsutes en la configuración del equipo</li>
                        <li>Sistitución de piezas reemplazables si están disponibles (ej: fuentes de poder)</li>
                    </ol>
                    <h6 class="font-bold text-sm mb-2 uppercase text-phase-1">Pruebas de funcionamiento:</h6>
                    <ol class="text-xs space-y-2 list-decimal ml-4 mb-4">
                        <li>Verificar que el equipo funcione según los parámetros normales</li>
                        <li>Realizar pruebas de coenctiviada y rendimiento</li>
                    </ol>
                    <div class="bg-blue-50 p-3 rounded-lg border border-blue-100">
                        <h5 class="font-bold text-xs mb-1 text-blue-700">Participantes</h5>
                        <ul class="text-xs text-blue-600 space-y-1">
                            <li>✓ Equipo técnico asignado</li>
                            <li>✓ Operations Support</li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Fase 4 -->
            <div id="fase-4" class="phase-section flex flex-col space-y-4">
                <div
                    class="arrow-header bg-phase-2 text-white p-4 h-24 flex flex-col justify-center items-center text-center">
                    <span class="text-sm font-bold uppercase">4. Fase: Proceso RMA (Repacación o Reemplazo con el
                        Proveedor)</span>
                    <span class="text-[10px] opacity-90">Tiempo Variable</span>
                </div>
                <div class="poc-card">
                    <h4 class="font-bold text-sm mb-2 uppercase text-phase-1 text-center">Tareas Clave:</h4>
                    <h6 class="font-bold text-sm mb-2 uppercase text-phase-1">Verificación de la Garantía:</h6>
                    <ol class="text-xs space-y-2 list-decimal ml-4 mb-4">
                        <li>Revisar la cobertura de la garantía del equipo (tiempo, condiciones)</li>
                        <li>Obtner la información necesaria de:
                            <ul>
                                <li>• Factura</li>
                                <li>• Fecha de compra</li>
                                <li>• Modelo</li>
                                <li>• Número de serie</li>
                            </ul>
                        </li>
                    </ol>

                    <h6 class="font-bold text-sm mb-2 uppercase text-phase-1">Solicitud de RMA al Proveedor:</h6>
                    <ol class="text-xs space-y-2 list-decimal ml-4 mb-4">
                        <li>Contactar al proveedor o fabricante según sus politicas de RMA</li>
                        <li>Proporcionar evidencia de la falla:
                            <ul>
                                <li>• Capturas de pantalla</li>
                                <li>• Descripción detallada del problema</li>
                                <li>• Resultados de pruebas</li>
                                <li>• Número de serie del equipo</li>
                            </ul>
                        </li>
                    </ol>
                    <h6 class="font-bold text-sm mb-2 uppercase text-phase-1">Recepción den Número de RMA:</h6>
                    <ol class="text-xs space-y-2 list-decimal ml-4 mb-4">
                        <li>El provedor otorga un número de autorización de retorno y las instrucciones de envio</li>
                    </ol>
                    <h6 class="font-bold text-sm mb-2 uppercase text-phase-1">Envío del Equipo Dañado:</h6>
                    <ol class="text-xs space-y-2 list-decimal ml-4 mb-4">
                        <li>Empacar el equipo según las instrucciones del proveedor</li>
                        <li>Adjuntar documentos requeridos:
                            <ul>
                                <li>• Factura</li>
                                <li>• Carta descriptiva del problema</li>
                                <li>• Número de RMA</li>
                            </ul>
                        </li>
                    </ol>
                    <h6 class="font-bold text-sm mb-2 uppercase text-phase-1">Seguimiento del proceso con el Proveedor:</h6>
                    <ol class="text-xs space-y-2 list-decimal ml-4 mb-4">
                        <li>Monitorear el estatus del RMA</li>
                        <li>Coordinar la recepción del equipo reparado o reemplezado</li>
                    </ol>
                </div>
            </div>
        </div>

        <!-- Segunda fila: Fases 6-10 -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-4 items-start">
            <!-- Fase 5 -->
            <div id="fase-5" class="phase-section flex flex-col space-y-4">
                <div
                    class="arrow-header bg-phase-2 text-white p-4 h-24 flex flex-col justify-center items-center text-center">
                    <span class="text-sm font-bold uppercase">5. Fase: Instalación del Equipo Reemplazado o Reparado</span>
                    <span class="text-[10px] opacity-90">Tiempo Variable</span>
                </div>
                <div class="poc-card">
                    <h4 class="font-bold text-sm mb-2 uppercase text-phase-1 text-center">Tareas Clave:</h4>
                    <h6 class="font-bold text-sm mb-2 uppercase text-phase-1">Recepción y Verificación del Equipo:</h6>
                    <ol class="text-xs space-y-2 list-decimal ml-4 mb-4">
                        <li>Revisar el equipo para asegurar que cumple con lo solicitado en el RMA</li>
                        <li>Realizar pruebas iniciales de funcionamiento</li>
                    </ol>
                    <h6 class="font-bold text-sm mb-2 uppercase text-phase-1">Instalación y Configuración:</h6>
                    <ol class="text-xs space-y-2 list-decimal ml-4 mb-4">
                        <li>Instalar el equipo en la infraestrcutura del cliente</li>
                        <li>Configurar según los parámetros requeridos</li>
                    </ol>
                    <h6 class="font-bold text-sm mb-2 uppercase text-phase-1">Pruebas de Operacion:</h6>
                    <ol class="text-xs space-y-2 list-decimal ml-4 mb-4">
                        <li>Ejecutar pruebas para confirmar que el equipo opera correctamente y está integrado al sistema
                        </li>
                    </ol>
                </div>
            </div>

            <!-- Fase 6 -->
            <div id="fase-6" class="phase-section flex flex-col space-y-4">
                <div
                    class="arrow-header bg-phase-2 text-white p-4 h-24 flex flex-col justify-center items-center text-center">
                    <span class="text-sm font-bold uppercase">7. Fase: Cierre del Caso</span>
                </div>
                <div class="poc-card">
                    <h4 class="font-bold text-sm mb-2 uppercase text-phase-1 text-center">Tareas Clave:</h4>
                    <h6 class="font-bold text-sm mb-2 uppercase text-phase-1">Reporte Final:</h6>
                    <ol class="text-xs space-y-2 list-decimal ml-4 mb-4">
                        <li>Documentar el proceso completo:
                            <ul>
                                <li>• Diagnóstico</li>
                                <li>• Acciones realizadas</li>
                                <li>• Detalles del RMA</li>
                                <li>• Pruebas Finales</li>
                            </ul>
                        </li>
                    </ol>
                    <h6 class="font-bold text-sm mb-2 uppercase text-phase-1">Actualización del Inventario y Documentación:
                    </h6>
                    <ol class="text-xs space-y-2 list-decimal ml-4 mb-4">
                        <li>Actualizar los registros del equipo:
                            <ul>
                                <li>• Estado</li>
                                <li>• Número de serie</li>
                                <li>• Historial de mantenimiento</li>
                            </ul>
                        </li>
                        <li>Cerrar el ticket o incidencia en el sistema de gestión</li>
                    </ol>
                    <h6 class="font-bold text-sm mb-2 uppercase text-phase-1">Feedback del Cliente:</h6>
                    <ol class="text-xs space-y-2 list-decimal ml-4 mb-4">
                        <li>Solicitar retroalimentación para evaluar la satisfacción con el servicio</li>
                    </ol>
                </div>
            </div>

            <!-- Fase 7 -->
            <div id="fase-7" class="phase-section flex flex-col space-y-4 lg:col-span-3">
                <div
                    class="arrow-header bg-phase-1 text-white p-4 h-24 flex flex-col justify-center items-center text-center">
                    <span class="text-sm font-bold uppercase">Principales KPI's</span>
                </div>
                <div class="poc-card">
                    <h4 class="font-bold text-sm mb-2 uppercase text-phase-1 text-center">Tareas Clave:</h4>
                    <h6 class="font-bold text-sm mb-2 uppercase text-phase-1">Tiempo promedio de respuesta incial (First
                        Response Tiem - FRT):</h6>
                    <ol class="text-xs space-y-2 ml-4 mb-4">
                        <li>• Tiempo desde que se genera el ticket hasta el primer contacto con el cliente</li>
                    </ol>
                    <h6 class="font-bold text-sm mb-2 uppercase text-phase-1">Tiempo promedio de resolución remota:</h6>
                    <ol class="text-xs space-y-2 ml-4 mb-4">
                        <li>• Tiempo que tarda en resolverse uan falla sin necesidad de visita a sitio</li>
                    </ol>
                    <h6 class="font-bold text-sm mb-2 uppercase text-phase-1">Tiempo promedio de diagnostico en sitio:</h6>
                    <ol class="text-xs space-y-2 ml-4 mb-4">
                        <li>• Duración desde la llegada al sitio hasta que se identifica la causa raiz del problema </li>
                    </ol>
                    <h6 class="font-bold text-sm mb-2 uppercase text-phase-1">Tiempo total del proceso de RMA:</h6>
                    <ol class="text-xs space-y-2 ml-4 mb-4">
                        <li>• Desde la creación del caso con el preoveedor hasta la recepción del equipo
                            reparado/reemplazado
                        </li>
                    </ol>
                    <h6 class="font-bold text-sm mb-2 uppercase text-phase-1">Porcentaje de incidentes resueltos en el
                        primer contacto (First Call Resolution - FCR):</h6>
                    <ol class="text-xs space-y-2 ml-4 mb-4">
                        <li>• Incidentes solucionados sin necesidad de escalación o RMA</li>
                    </ol>
                    <h6 class="font-bold text-sm mb-2 uppercase text-phase-1">Disponibilidad del servicio del cliente
                        post-mantenimiento:</h6>
                    <ol class="text-xs space-y-2 ml-4 mb-4">
                        <li>• Tiempo que el cliente estuvo sin servicio durante el proceso</li>
                    </ol>
                    <h6 class="font-bold text-sm mb-2 uppercase text-phase-1">Tasa de satisfacción del cliente (CSAT):</h6>
                    <ol class="text-xs space-y-2 ml-4 mb-4">
                        <li>• Encuesta post-servicio para medir la percepsción del cliente sobre el proceso</li>
                    </ol>
                    <h6 class="font-bold text-sm mb-2 uppercase text-phase-1">Porcentaje de cumplimiento de SLA (Service
                        Level Agreement):</h6>
                    <ol class="text-xs space-y-2 ml-4 mb-4">
                        <li>• Cumplimiento de tiempos comprometidos en el contrato de servicio</li>
                    </ol>
                    <h6 class="font-bold text-sm mb-2 uppercase text-phase-1">Costo promedio por mantenimiento correctivo:
                    </h6>
                    <ol class="text-xs space-y-2 ml-4 mb-4">
                        <li>• Evaluación de costos operativos y de RMA por incidente</li>
                    </ol>
                    <h6 class="font-bold text-sm mb-2 uppercase text-phase-1">Número de incidentes recurrentes por equipo:
                    </h6>
                    <ol class="text-xs space-y-2 ml-4 mb-4">
                        <li>• Monitorear equipos que presentan fallas frecuentes para detectar patrones y planirficar
                            reemplazos</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

@endsection
@push('js')
@endpush
