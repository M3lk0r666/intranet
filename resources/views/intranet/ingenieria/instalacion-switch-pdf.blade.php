<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Instalacion de Switch - PDF</title>
    <style>
        /* Estilos para el PDF */
        @page {
            margin: 50px 40px;
        }

        body {
            font-family: 'DejaVu Sans', sans-serif;
            font-size: 12px;
            line-height: 1.6;
            color: #333;
        }

        .header {
            text-align: center;
            margin-bottom: 30px;
            border-bottom: 2px solid #3b82f6;
            padding-bottom: 20px;
        }

        .header h1 {
            font-size: 24px;
            font-weight: bold;
            color: #1e40af;
            margin-bottom: 10px;
        }

        .meta {
            display: flex;
            justify-content: center;
            gap: 20px;
            color: #6b7280;
            font-size: 11px;
            margin-bottom: 10px;
        }

        .content {
            font-size: 13px;
            line-height: 1.8;
        }

        .content img {
            max-width: 100%;
            height: auto;
            margin: 20px 0;
            border-radius: 8px;
        }

        .content h2 {
            font-size: 18px;
            color: #1e40af;
            margin-top: 30px;
            margin-bottom: 15px;
            padding-bottom: 5px;
            border-bottom: 1px solid #e5e7eb;
        }

        .content h3 {
            font-size: 16px;
            color: #374151;
            margin-top: 25px;
            margin-bottom: 10px;
        }

        .content p {
            margin-bottom: 15px;
            text-align: justify;
        }

        .content ul,
        .content ol {
            margin-left: 20px;
            margin-bottom: 15px;
        }

        .content li {
            margin-bottom: 5px;
        }

        .content code {
            background-color: #f3f4f6;
            padding: 2px 6px;
            border-radius: 4px;
            font-family: 'Courier New', monospace;
            font-size: 11px;
        }

        .content pre {
            background-color: #f3f4f6;
            padding: 15px;
            border-radius: 8px;
            overflow-x: auto;
            margin: 15px 0;
            border-left: 4px solid #3b82f6;
        }

        .footer {
            margin-top: 40px;
            padding-top: 20px;
            border-top: 1px solid #e5e7eb;
            text-align: center;
            color: #6b7280;
            font-size: 10px;
        }

        .tags {
            margin: 20px 0;
            display: flex;
            flex-wrap: wrap;
            gap: 8px;
        }

        .tag {
            background-color: #e0f2fe;
            color: #0369a1;
            padding: 4px 12px;
            border-radius: 20px;
            font-size: 10px;
        }

        .watermark {
            position: fixed;
            top: 50%;
            left: 50%;
            font-size: 90px;
            color: #3b82f6;
            opacity: 0.08;
            transform: translate(-50%, -50%) rotate(-35deg);
            pointer-events: none;
            white-space: nowrap;
            font-weight: bold;
        }

        .post-info {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 15px;
            margin: 20px 0;
            font-size: 11px;
        }

        .info-item {
            display: flex;
            align-items: center;
            gap: 8px;
            color: #475569;
        }

        .info-item i {
            color: #3b82f6;
        }
    </style>
    @if (config('app.url'))
        <base href="{{ config('app.url') }}">
    @endif
</head>

<body>
    <!-- Marca de agua opcional -->
    <span class="watermark">
        {{ config('app.name', 'Blog de Redes') }}
    </span>

    <!-- Encabezado -->
    <div class="header">
        Instalacion de switch
    </div>

    <div class="bg-white rounded-2xl border border-slate-200 p-5 mb-8">
        <div class="flex flex-col lg:flex-row gap-8">
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
                        <h2 class="text-2xl font-bold text-slate-900">1. Actividades Previas (antes de Ventana)</h2>
                    </div>
                    <div class="bg-white rounded-2xl border border-slate-200 p-8 shadow-sm">
                        <p class="text-slate-600 mb-6 font-medium">Solicitar al cliente archivo/s de configuración del
                            equipo/s a reemplazar con los siguientes comandos.</p>
                        <div class="flex-1">
                            <h2 class="text-xl font-bold text-slate-900  mb-4">Listado de Comandos - Pre-Check</h2>
                            <div class="space-y-6 ml-2 border-l-2 border-slate-800 pl-6">
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-6">
                                    <div>
                                        <div class="flex items-center gap-2 mb-2">
                                            <span class="font-semibold">Configuración general</span>
                                        </div>
                                        <code
                                            class="block bg-slate-50  p-3 rounded text-sm text-indigo-600 border border-slate-100 ">
                                            <span class="text-slate-600 mr-2">#</span> show configuration
                                        </code>
                                    </div>
                                    <div>
                                        <div class="flex items-center gap-2 mb-2">
                                            <span class="font-semibold">Version de Firmware</span>
                                        </div>
                                        <code
                                            class="block bg-slate-50  p-3 rounded text-sm text-indigo-600 border border-slate-100 ">
                                            <span class="text-slate-600 mr-2">#</span> show versión detail
                                        </code>
                                    </div>
                                    <div>
                                        <div class="flex items-center gap-2 mb-2">
                                            <span class="font-semibold">Licencias instaladas</span>
                                        </div>
                                        <code
                                            class="block bg-slate-50 p-3 rounded text-sm text-indigo-600 border border-slate-100 ">
                                            <span class="text-slate-600 mr-2">#</span> show licence detail
                                        </code>
                                    </div>
                                    <div>
                                        <div class="flex items-center gap-2 mb-2">
                                            <span class="font-semibold">Mostrar detalles del switch</span>
                                        </div>
                                        <code
                                            class="block bg-slate-50 p-3 rounded text-sm text-indigo-600 border border-slate-100 ">
                                            <span class="text-slate-600 mr-2">#</span> show switch detail
                                        </code>
                                    </div>
                                    <div>
                                        <div class="flex items-center gap-2 mb-2">
                                            <span class="font-semibold">Mostrar las VLANS</span>
                                        </div>
                                        <code
                                            class="block bg-slate-50 p-3 rounded text-sm text-indigo-600 border border-slate-100 ">
                                            <span class="text-slate-600 mr-2">#</span> show vlan
                                        </code>
                                    </div>
                                    <div>
                                        <div class="flex items-center gap-2 mb-2">
                                            <span class="font-semibold">Mostrar las rutas</span>
                                        </div>
                                        <code
                                            class="block bg-slate-50 p-3 rounded text-sm text-indigo-600 border border-slate-100 ">
                                            <span class="text-slate-600 mr-2">#</span> show iproute
                                        </code>
                                    </div>
                                    <div>
                                        <div class="flex items-center gap-2 mb-2">
                                            <span class="font-semibold">Mostra los vecinos del switch</span>
                                        </div>
                                        <code
                                            class="block bg-slate-50 p-3 rounded text-sm text-indigo-600 border border-slate-100 ">
                                            <span class="text-slate-600 mr-2">#</span> show edp ports all
                                        </code>
                                    </div>
                                    <div>
                                        <div class="flex items-center gap-2 mb-2">
                                            <span class="font-semibold">Mostra es estado de las interfaces</span>
                                        </div>
                                        <code
                                            class="block bg-slate-50 p-3 rounded text-sm text-indigo-600 border border-slate-100 ">
                                            <span class="text-slate-600 mr-2">#</span> show ports- no-refresh
                                        </code>
                                    </div>
                                    <div>
                                        <div class="flex items-center gap-2 mb-2">
                                            <span class="font-semibold">Comandos Opcionales</span>
                                        </div>
                                        <code
                                            class="block bg-slate-50 p-3 rounded text-sm text-indigo-600 border border-slate-100 ">
                                            <span class="text-slate-600 mr-2">#</span> show lldp neighbords
                                        </code>
                                        <code
                                            class="block bg-slate-50 p-3 rounded text-sm text-indigo-600 border border-slate-100 ">
                                            <span class="text-slate-600 mr-2">#</span> show fdb
                                        </code>
                                        <code
                                            class="block bg-slate-50 p-3 rounded text-sm text-indigo-600 border border-slate-100 ">
                                            <span class="text-slate-600 mr-2">#</span> show stacking
                                        </code>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <ul class="space-y-3 py-6">
                            <li class="flex items-center gap-3 text-slate-800 text-sm">
                                <i class="las la-check-circle text-emerald-500 text-xl"></i>
                                Creación de Script de configuración para los nuevos equipos.
                            </li>
                            <li class="flex items-center gap-3 text-slate-800 text-sm">
                                <i class="las la-check-circle text-emerald-500 text-xl"></i>
                                Revisión de equipamiento nuevo (que corresponda con lo vendido).
                            </li>
                            <li class="flex flex-col gap-3 text-slate-800 text-sm">
                                <div class="flex items-start gap-3">
                                    <i class="las la-check-circle text-emerald-500 text-xl mt-0.5"></i>
                                    <span>
                                        Identificación física (en sitio) de los equipos originales
                                        (inspección visual, del cableado y conexiones).
                                    </span>
                                </div>
                                <div
                                    class="ml-8 flex items-start gap-2 text-xm text-amber-800 bg-amber-50 px-4 py-3 rounded-lg">
                                    <i class="las la-exclamation-triangle text-amber-500 mt-0.5"></i>
                                    <span>
                                        Si se detecta algún inconveniente físico que impida la ejecución de la ventana,
                                        notificarlo al cliente y poder tomar acción antes de la ventana.
                                    </span>
                                </div>
                            </li>
                            <li class="flex flex-col gap-3 text-slate-800 text-sm">
                                <div class="flex items-start gap-3">
                                    <i class="las la-check-circle text-emerald-500 text-xl mt-0.5"></i>
                                    <span>
                                        Registro fotográfico antes y después de las actividades (foto de rack completo
                                        con
                                        los switches, foto individual de cada switch).
                                    </span>
                                </div>
                                <div
                                    class="ml-8 flex items-start gap-2 text-xm text-amber-800 bg-amber-50 px-4 py-3 rounded-lg">
                                    <i class="las la-exclamation-triangle text-amber-500 mt-0.5"></i>
                                    <span>
                                        En caso de encontrar algún detalle en el cableado tomar evidencia y notificar de
                                        la
                                        misma.
                                    </span>
                                </div>
                            </li>
                            <li class="flex items-center gap-3 text-slate-800 text-sm">
                                <i class="las la-check-circle text-emerald-500 text-xl"></i>
                                Revisión del Etiquetado del cableado (en caso de ser necesario).
                            </li>
                            <li class="flex items-center gap-3 text-slate-800 text-sm">
                                <i class="las la-check-circle text-emerald-500 text-xl"></i>
                                Preparación de equipos nuevos.
                            </li>
                            <li class="flex items-center gap-3 text-slate-800 text-sm">
                                <i class="las la-check-circle text-emerald-500 text-xl"></i>
                                Respaldo de información del/los switches [configuración general, vlans, DGW, ping al
                                DGW,
                                estado de los puertos, listado de mac-addres].
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
                                <p class="text-xs text-slate-500">Apagado del equipo y retiro de cables de alimentación
                                    y
                                    red.</p>
                            </div>
                            <div class="p-4 rounded-xl border border-slate-100 bg-slate-50">
                                <p class="text-xs font-bold text-primary uppercase mb-2">Paso B</p>
                                <h4 class="font-bold mb-1 text-slate-900">Desmontado</h4>
                                <p class="text-xs text-slate-500">Retirar los equipos del Rack</p>
                            </div>
                            <div class="p-4 rounded-xl border border-slate-100 bg-slate-50">
                                <p class="text-xs font-bold text-primary uppercase mb-2">Paso C</p>
                                <h4 class="font-bold mb-1 text-slate-900">Montado</h4>
                                <p class="text-xs text-slate-500">Instalación física en Rack con soportes adecuados.
                                </p>
                            </div>
                            <div class="p-4 rounded-xl border border-slate-100 bg-slate-50">
                                <p class="text-xs font-bold text-primary uppercase mb-2">Paso C</p>
                                <h4 class="font-bold mb-1 text-slate-900">Conexión</h4>
                                <p class="text-xs text-slate-500">Re-cableado de conexion electrica, cableado de red
                                    siguiendo el etiquetado previo.</p>
                            </div>
                            <div class="p-4 rounded-xl border border-slate-100 bg-slate-50">
                                <p class="text-xs font-bold text-primary uppercase mb-2">Paso D</p>
                                <h4 class="font-bold mb-1 text-slate-900">Carga de Script</h4>
                                <p class="text-xs text-slate-500">Carga de script de configuración</p>
                            </div>
                        </div>
                        <div class="bg-orange-50 border-l-4 border-orange-500 p-4 rounded-r-xl">
                            <h4 class="text-sm font-bold text-orange-800 flex items-center gap-2 mb-1">
                                <i class="las la-info-circle"></i> Toma de Datos Post-Instalación
                            </h4>
                            <p class="text-sm text-orange-700">Confirmar encendido y operatividade de los equipos en
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
                                <h4 class="text-sm font-bold uppercase text-slate-400 tracking-wider mb-4">Pruebas de
                                    Conectividad por parte de Netjer</h4>
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
                                    <div
                                        class="flex items-center justify-between p-4 rounded-xl bg-slate-50 border border-slate-200">
                                        <span class="text-sm font-semibold text-slate-900">Ping a Servicios</span>
                                        <span
                                            class="px-2 py-1 rounded-md bg-emerald-100 text-emerald-700 text-[10px] font-bold">REQUERIDO</span>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <h4 class="text-sm font-bold uppercase text-slate-400 tracking-wider mb-4">Pruebas de
                                    Conectividad por parte del Cliente</h4>
                                <div class="grid grid-cols-1 sm:grid-cols-1 gap-4">
                                    <div
                                        class="flex items-center justify-between p-4 rounded-xl bg-slate-50 border border-slate-200">
                                        <span class="text-sm font-semibold text-slate-900">Comunicacion a sus
                                            servicios</span>
                                        <span
                                            class="px-2 py-1 rounded-md bg-emerald-100 text-emerald-700 text-[10px] font-bold">REQUERIDO</span>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <h4 class="text-sm font-bold uppercase text-slate-400 tracking-wider mb-4"></h4>

                            </div>
                            <div>
                                <h4 class="text-sm font-bold uppercase text-slate-400 tracking-wider mb-4">Comparativa
                                    del
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
                                        Checking Gi1/0/2... UP/UP<br />
                                        Checking Gi1/0/3... DOWN/DOWN<br />
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
                                <h4 class="text-sm font-bold mb-4 text-slate-900">Registro Fotográfico [Antes/Despues]
                                </h4>
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
                                <p class="text-sm text-slate-600 pt-1">Apagado de los equipos y retiro de cableado de
                                    Red y
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
                                <p class="text-sm text-slate-600 pt-1">Re-conectar cables de alimentación y fibra/cobre
                                    según el mapeo inicial documentado en el paso 1.</p>
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


</body>

</html>
