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
                            <a href="{{ route('estructurainterna.ingenieria') }}"
                                class="ml-1 text-sm text-gray-600 hover:text-orange-600 md:ml-2">Ingenieria
                            </a>
                        </div>
                    </li>
                    <li aria-current="page">
                        <div class="flex items-center">
                            <i class="fas fa-chevron-right text-gray-400 mx-2"></i>
                            <span class="ml-1 text-sm text-primary font-medium md:ml-2">Mantenimineto Preventivo</span>
                        </div>
                    </li>
                </ol>
            </nav>
        </div>
    </div>

    <!-- Encabezado -->
    <header class="mt-8 mb-8">
        <h1 class="text-3xl font-bold text-gray-800 mb-2">Proceso Ingeniería IT - Mantenimiento Preventivo</h1>
        <p class="text-gray-600">Después de completar una instalación, programar y documentar mantenimientos preventivos es
            fundamental para garantizar la continuidad operativa y la satisfacción del cliente. Un plan de revisiones
            periódicas permite detectar posibles fallas antes de que ocurran y refuerza la confianza en nuestros servicios..
        </p>
    </header>
    <div class="text-center mb-16 mt-8">
        <h1 class="text-5xl font-black font-display tracking-tight text-slate-900 uppercase">
            Proceso <span class="text-primary  uppercase">Mantenimiento Preventivo</span>
        </h1>

        <p class="text-slate-600 mt-6 text-lg">Flujo completo de ejecución</p>
    </div>

    <!-- Grid de fases del proceso POC -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-4 items-start">
        <!-- Fase 1: Recepción de Solicitud -->
        <div class="flex flex-col space-y-4">
            <div class="arrow-header bg-phase-1 text-white p-4 h-24 flex flex-col justify-center items-center text-center">
                <span class="text-sm font-bold uppercase">1. Planeación del Mantenimiento</span>
                <span class="text-[10px] opacity-90">Tiempo: Variable</span>
            </div>
            <div class="poc-card">
                <h4 class="font-bold text-sm mb-2 uppercase text-phase-1 text-center">Tareas Clave:</h4>
                <h6 class="font-bold text-sm mb-2 uppercase text-phase-1">Definir el alcance:</h6>
                <ol class="text-xs space-y-2 list-decimal ml-4 mb-4">
                    <li>Listar los equipos qeu seran revisados: switches, routers, APs, firewall, etc.</li>
                    <li>Identificar las ubicaciones físicas de los equipos</li>
                </ol>

                <h6 class="font-bold text-sm mb-2 uppercase text-phase-1">Programar actividad:</h6>
                <ol class="text-xs space-y-2 list-decimal ml-4 mb-4">
                    <li>Determinar la fecha y hora del mantenimiento, priorizando horarios de baja actividad para minimizar
                        impcato</li>
                </ol>

                <h6 class="font-bold text-sm mb-2 uppercase text-phase-1">Verificar recursos:</h6>
                <ol class="text-xs space-y-2 list-decimal ml-4 mb-4">
                    <li>Asegurarse de contar con las herramientas necesarias (tester de cables, software de diagnostico,
                        etc.)</li>
                    <li>Confirmar disponibilidad de respuestos (fuentes de poder, ventiladores, cables, etc.)</li>
                    <li>Levantar ticket JIRA</li>
                    <li class="list-none mt-2">
                        <a href="{{ route('ingenieria.guia-tickets') }}" target="_blank"
                            class="inline-block bg-orange-500 text-white text-sm px-4 py-2 rounded-lg hover:bg-orange-600 transition">
                            Levantar Ticket
                        </a>
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

        <!-- Fase 2: Validación Interna -->
        <div class="flex flex-col space-y-4">
            <div class="arrow-header bg-phase-2 text-white p-4 h-24 flex flex-col justify-center items-center text-center">
                <span class="text-sm font-bold uppercase">2. Preparación del sitio y equipo</span>
                <span class="text-[10px] opacity-90">Tiempo: Variable</span>
            </div>
            <div class="poc-card">
                <h4 class="font-bold text-sm mb-2 uppercase text-phase-1 text-center">Tareas Clave:</h4>
                <h6 class="font-bold text-sm mb-2 uppercase text-phase-1">Inspección visual inicial:</h6>
                <ol class="text-xs space-y-2 list-decimal ml-4 mb-4">
                    <li>Revisar el estado fisico del equipo (limpieza, daños visibles, cables conectacdos)</li>
                    <li>Identificar etiquetas, nombres en los dispositivos y confirma ubicación</li>
                </ol>

                <h6 class="font-bold text-sm mb-2 uppercase text-phase-1">Respaldo de configuración:</h6>
                <ol class="text-xs space-y-2 list-decimal ml-4 mb-4">
                    <li>Descargar las configuraciones actuales de los dispositivos</li>
                    <li>Guardar registros de firmware y software para garantizar restauaración en caso de fallos</li>
                </ol>

                <h6 class="font-bold text-sm mb-2 uppercase text-phase-1">Revisión de garantías:</h6>
                <ol class="text-xs space-y-2 list-decimal ml-4 mb-4">
                    <li>Verificar si los equipos están bajo garantía o contratos de soporte</li>
                </ol>

                <div class="bg-orange-50 p-3 rounded-lg border border-orange-100">
                    <h5 class="font-bold text-xs mb-1 text-orange-700">Participantes:</h5>
                    <ul class="text-xs text-orange-600 space-y-1">
                        <li>✓ Ejecutivo Cuenta</li>
                        <li>✓ Equipo técnico asignado </li>
                        <li>✓ Operatons Support</li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- Fase 3: Planificación -->
        <div class="flex flex-col space-y-4">
            <div class="arrow-header bg-phase-3 text-white p-4 h-24 flex flex-col justify-center items-center text-center">
                <span class="text-sm font-bold uppercase">3. Ejecución del mantenimiento preventivo</span>
                <span class="text-[10px] opacity-90">Tiempo: Variable</span>
            </div>
            <div class="poc-card">
                <h4 class="font-bold text-sm mb-2 uppercase text-phase-1 text-center">Tareas Clave:</h4>
                <h6 class="font-bold text-sm mb-2 uppercase text-phase-1">Limpieza física:</h6>
                <ol class="text-xs space-y-2 list-decimal ml-4 mb-4">
                    <li>Retirar polvo, suciedad y obstrucciones en ventiladores o rejillas de los dispositivos</li>
                    <li>Revisar conexiones y asegurar que no haya cables dañados o mal colocados</li>
                </ol>

                <h6 class="font-bold text-sm mb-2 uppercase text-phase-1">Verificación de indicadores:</h6>
                <ol class="text-xs space-y-2 list-decimal ml-4 mb-4">
                    <li>Comprobar luces LED y paneles de estado para identificar alertas o fallos potenciales</li>
                </ol>

                <h6 class="font-bold text-sm mb-2 uppercase text-phase-1">Monitoreo del rendimiento:</h6>
                <ol class="text-xs space-y-2 list-decimal ml-4 mb-4">
                    <li>Usar herramientas de diagnostico para evaluar:
                        <ul>
                            <li>• Latencia y velocidad de los puertos</li>
                            <li>• Estado de las interfaces (puertos activos/inactivos)</li>
                        </ul>
                    </li>
                </ol>
                <h6 class="font-bold text-sm mb-2 uppercase text-phase-1">Actualización de firmware/software:</h6>
                <ol class="text-xs space-y-2 list-decimal ml-4 mb-4">
                    <li>Validar si existen actualizaciones críticas de seguridad o funcionabilidad</li>
                    <li>Realizar la acualización si es necesario, asegurandose de probarla en un entorno de prueba antes
                    </li>
                </ol>
                <h6 class="font-bold text-sm mb-2 uppercase text-phase-1">Pruebas funcionales:</h6>
                <ol class="text-xs space-y-2 list-decimal ml-4 mb-4">
                    <li>Ejecutar pruebas para garantizar que los servicios clave (conexión WiFi, redes internas, VLAN, etc.)
                        funcionen correctamente</li>
                    <li>Probar conectividad desde puntos criticos de la red</li>
                </ol>

                <div class="bg-green-50 p-3 rounded-lg border border-green-100">
                    <h5 class="font-bold text-xs mb-1 text-green-700">Participantes:</h5>
                    <ul class="text-xs text-green-600 space-y-1">
                        <li>✓ Ejecutivo Cuenta</li>
                        <li>✓ Equipo técnico asignado </li>
                        <li>✓ Operatons Support</li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- Fase 4: Ejecución -->
        <div class="flex flex-col space-y-4">
            <div class="arrow-header bg-phase-2 text-white p-4 h-24 flex flex-col justify-center items-center text-center">
                <span class="text-sm font-bold uppercase">4. Finalización y documentación</span>
                <span class="text-[10px] opacity-90">Tiempo: Variable</span>
            </div>
            <div class="poc-card">
                <h4 class="font-bold text-sm mb-2 uppercase text-phase-1 text-center">Tareas Clave:</h4>
                <h6 class="font-bold text-sm mb-2 uppercase text-phase-1">Restauración de servicios:</h6>
                <ol class="text-xs space-y-2 list-decimal ml-4 mb-4">
                    <li>Asegurarse de que todos los equipos están funcionando y conectados correctamente</li>
                    <li>Notificar a los usuarios que los servicios han sido restaurados</li>
                </ol>

                <h6 class="font-bold text-sm mb-2 uppercase text-phase-1">Generación de reportes:</h6>
                <ol class="text-xs space-y-2 list-decimal ml-4 mb-4">
                    <li>Documentar hallazgos y acciones realizadas incluyendo:
                        <ul>
                            <li>• Listado de equipos intervenidos</li>
                            <li>• Tareas realizadas (limpieza, actualizaciones, etc.)</li>
                            <li>• Reemplazos de piezas o ajustes realizados</li>
                            <li>• Recomendaciones para proximas intervenciones</li>
                        </ul>
                    </li>
                </ol>

                <h6 class="font-bold text-sm mb-2 uppercase text-phase-1">Cierre del mantenimineto:</h6>
                <ol class="text-xs space-y-2 list-decimal ml-4 mb-4">
                    <li>Archivar el reporte en el sistema de gestión</li>
                    <li>Programar el próximo mantenimineto según el cronograma</li>
                    <li>Levantar ticket JIRA</li>
                </ol>
            </div>
        </div>

        <!-- Fase 5: Evaluación y Cierre -->
        <div class="flex flex-col space-y-4">
            <div class="arrow-header bg-phase-1 text-white p-4 h-24 flex flex-col justify-center items-center text-center">
                <span class="text-sm font-bold uppercase">Indicadores clave de desempeño (KPI)</span>
                <span class="text-[10px] opacity-90">Tiempo: Variable</span>
            </div>
            <div class="poc-card">
                <h4 class="font-bold text-sm mb-2 text-phase-1 text-left">• Tiempo promedio de inactividad durante el
                    mantenimiento

                </h4>
                <h4 class="font-bold text-sm mb-2 text-phase-1 text-lefr">• Procentaje de equipos mantenidos según el plan
                </h4>
                <h4 class="font-bold text-sm mb-2 text-phase-1 text-left">• Numero de incidencias detectadas y resueltas
                </h4>
                <h4 class="font-bold text-sm mb-2 text-phase-1 text-left">• Tasa de cumplimiento del cronograma de
                    mantenimiento</h4>

            </div>
        </div>
    </div>
@endsection
@push('js')
@endpush
