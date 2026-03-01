@extends('layouts.intranet')

@section('title', 'Intranet Corporativa')

@push('css')
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
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
                            <a href="{{ route('intranet.estructurainterna.ingenieria') }}"
                                class="ml-1 text-sm text-gray-600 hover:text-orange-600 md:ml-2">Ingenieria
                            </a>
                        </div>
                    </li>
                    <li>
                        <div class="flex items-center">
                            <i class="fas fa-chevron-right text-gray-400 mx-2"></i>
                            <a href="{{ route('intranet.ingenieria.portal-soporte') }}"
                                class="ml-1 text-sm text-gray-600 hover:text-orange-600 md:ml-2">Soporte
                            </a>
                        </div>
                    </li>
                    <li aria-current="page">
                        <div class="flex items-center">
                            <i class="fas fa-chevron-right text-gray-400 mx-2"></i>
                            <span class="ml-1 text-sm text-primary font-medium md:ml-2">Tickets</span>
                        </div>
                    </li>
                </ol>
            </nav>
        </div>
    </div>

    <!-- Encabezado -->
    <header class="mt-8 mb-8">
        <h1 class="text-4xl text-gray-800 mb-2 font-black leading-tight tracking-[-0.033em]">Tickets de Servicio
        </h1>
        <p class="text-[#9c7349] text-lg font-normal mt-2">Guia de como levantar tu ticket de servicio.</p>
    </header>

    <div class="bg-white rounded-lg shadow p-6 mb-8">
        <div class="relative flex flex-col ">
            <!-- Hero Section: No Ticket, No Fix -->
            <section class="max-w-7xl mx-auto px-8">
                <div class="grid lg:grid-cols-2 gap-16 items-center">
                    <!-- CONTENIDO -->
                    <div class="space-y-8">
                        <h1 class="text-4xl font-extrabold text-gray-900 leading-tight">
                            Reporte de
                            <span class="text-primary"> Incidencias</span>
                        </h1>

                        <p class="text-lg text-gray-600 leading-relaxed max-w-xl">
                            La formalización de cada incidente garantiza trazabilidad, cumplimiento de SLA y resolución
                            eficiente.
                            Nuestro modelo está diseñado bajo estándares operativos empresariales.
                        </p>

                        <div class="border-l-4 border-orange-700 pl-6 py-4 bg-gray-50 rounded-r-lg">
                            <p class="font-semibold text-gray-800">
                                Política Operativa: Todo incidente debe registrarse vía ticket.
                            </p>
                            <p class="text-gray-500 text-sm">
                                Sin registro formal, no se activa el flujo de atención.
                            </p>
                        </div>

                        <div class="flex gap-6 pt-4">
                            <a href="https://netjernetworks.atlassian.net/servicedesk/customer/user/login?destination=portals"
                                target="_blank"
                                class="px-8 py-4 bg-primary text-white font-semibold rounded-lg hover:shadow-primary/20 hover:scale-105 active:scale-95 transition-all shadow-md">
                                Abrir Ticket
                            </a>

                            <a href="#guia-ejemplos"
                                class="px-8 py-4 border border-orange-400 text-slate-500 font-semibold rounded-lg hover:bg-orange-500 hover:text-white transition">
                                Ver Ejemplos
                            </a>
                        </div>
                    </div>
                    <!-- IMAGEN -->
                    <div class="bg-white rounded-2xl shadow-xl overflow-hidden border">
                        <img src="{{ asset('storage/media/no-ticket.png') }}" class="w-full h-full object-cover"
                            alt="Centro de datos corporativo">
                    </div>
                </div>
            </section>
        </div>
    </div>
    <div class="bg-white rounded-lg shadow p-6 mb-8">
        <div class="w-full">
            <div class="space-y-8 py-8">
                <div>
                    <h1 class="text-3xl font-bold leading-tight mb-4">Guia para levantar un Ticket</h1>
                    <p class="text-gray-600 text-xl leading-relaxed">
                        Siga este flujo de trabajo estandarizado para informar problemas técnicos y garantizar una rápida
                        resolución por parte de nuestro departamento de TI.
                    </p>
                </div>
            </div>
        </div>
        <div class="py-6 grid lg:grid-cols-2 gap-10">
            <!-- Step 1 Section -->
            <section class="bg-white border border-gray-200 p-8">
                <!-- Header -->
                <div class="mb-5">
                    <span
                        class="bg-primary/10 text-primary px-3 py-1 rounded-full text-xs font-bold uppercase tracking-wider">Paso
                        1</span>
                    <h2 class="mt-1 text-xl font-semibold text-gray-900">
                        Accediendo al Portal
                    </h2>
                </div>
                <!-- Contenido vertical -->
                <div class="space-y-5">
                    <!-- Texto -->
                    <p class="text-gray-700 leading-relaxed">
                        Acceder al portal de
                        <strong class="text-gray-900">Netjer Networks Jira</strong>.
                    </p>
                    <!-- Imagen -->
                    <div class="border border-gray-200 bg-gray-50 overflow-hidden">
                        <img src="{{ asset('storage/media/portal-jira.png') }}" alt="Portal Netjer Networks Jira"
                            class="w-full h-auto">
                    </div>
                </div>
            </section>
            <!-- Step 2 Section -->
            <section class="bg-white border border-gray-200 p-8">
                <!-- Header -->
                <div class="mb-5">
                    <span
                        class="bg-primary/10 text-primary px-3 py-1 rounded-full text-xs font-bold uppercase tracking-wider">Paso
                        2</span>
                    <h2 class="mt-1 text-xl font-semibold text-gray-900">
                        Ingresando a Mesa de Ayuda
                    </h2>
                </div>
                <!-- Contenido vertical -->
                <div class="space-y-5">
                    <!-- Texto -->
                    <p class="text-gray-700 leading-relaxed">
                        Ingresar tus datos de acceso
                        <strong class="text-gray-900">correo electronico y
                            contraseña</strong>.
                    </p>
                    <!-- Imagen -->
                    <div class="border border-gray-200 bg-gray-50 overflow-hidden">
                        <img src="{{ asset('storage/media/identificarse.png') }}" alt="Portal Netjer Networks Jira"
                            class="w-full h-auto">
                    </div>
                </div>
            </section>
            <!-- Step 3 Section -->
            <section class="bg-white border border-gray-200 p-8">
                <!-- Header -->
                <div class="mb-5">
                    <span
                        class="bg-primary/10 text-primary px-3 py-1 rounded-full text-xs font-bold uppercase tracking-wider">Paso
                        3</span>
                    <h2 class="mt-1 text-xl font-semibold text-gray-900">
                        Portal Mesa de Ayuda
                    </h2>
                </div>
                <!-- Contenido vertical -->
                <div class="space-y-5">
                    <!-- Texto -->
                    <p class="text-gray-700 leading-relaxed">
                        Se mostrara el portal de Mesa de Ayuda, ubicar y seleccionar
                        <strong class="text-primary">Requerimientos Internos</strong>.
                    </p>
                    <!-- Imagen -->
                    <div class="border border-gray-200 bg-gray-50 overflow-hidden">
                        <img src="{{ asset('storage/media/mesa-ayuda.png') }}" alt="Portal Netjer Networks Jira"
                            class="w-full h-auto">
                    </div>
                </div>
            </section>
            <!-- Step 4 Section -->
            <section class="bg-white border border-gray-200 p-8">
                <!-- Header -->
                <div class="mb-5">
                    <span
                        class="bg-primary/10 text-primary px-3 py-1 rounded-full text-xs font-bold uppercase tracking-wider">Paso
                        4</span>
                    <h2 class="mt-1 text-xl font-semibold text-gray-900">
                        Tipo de Solicitud
                    </h2>
                </div>
                <!-- Contenido vertical -->
                <div class="space-y-5">
                    <!-- Texto -->
                    <p class="text-gray-700 leading-relaxed">
                        Se mostrara <strong class="text-primary">3</strong> tipos de solicitud.
                    </p>
                    <div class="p-4 bg-orange-50 border-l-4 border-primary rounded-r-md">
                        <h4 class="text-xm font-bold text-near-black mb-1">Solicitudes</h4>
                        <ul class="text-xm text-gray-600 space-y-1">
                            <li>• <strong class="text-primary">Solicitud Interna para Netjer</strong>: Se utiliza
                                cuando se desea para dar de alta un servicio de un proyecto.</li>
                            <li>• <strong class="text-primary">Solicitud por Cliente</strong>: Si la solicitud será
                                para proporcionar un servicio hacia un cliente.</li>
                            <li>• <strong class="text-primary">Incidentes Internos para Netjer</strong>: Reportar un
                                incidente o soporte interno.</li>
                        </ul>
                    </div>
                    <!-- Imagen -->
                    <div class="border border-gray-200 bg-gray-50 overflow-hidden">
                        <img src="{{ asset('storage/media/tipo-solicitud.png') }}" alt="Portal Netjer Networks Jira"
                            class="w-full h-auto">
                    </div>
                </div>
            </section>
            <!-- Step 5 Section -->
            <section class="bg-white border border-gray-200 p-8">
                <!-- Header -->
                <div class="mb-5">
                    <span
                        class="bg-primary/10 text-primary px-3 py-1 rounded-full text-xs font-bold uppercase tracking-wider">Paso
                        5</span>
                    <h2 class="mt-1 text-xl font-semibold text-gray-900">
                        Llenado de la Solicitud
                    </h2>
                </div>
                <!-- Contenido vertical -->
                <div class="space-y-5">
                    <!-- Texto -->
                    <p class="text-gray-700 leading-relaxed">
                        Ingresar los datos solicitados en el formulario.
                    </p>
                    <p class="text-gray-600 leading-relaxed">
                        Revisar los detalles de la solicitud e ingresar los datos solicitados y dar click <strong
                            class="text-primary">"Enviar"</strong>. para dar de alta la solicitud y se ejecute el
                        proceso de Ticket.
                    </p>
                    <div class="p-4 bg-orange-50 border-l-4 border-primary rounded-r-md">
                        <h4 class="text-xm font-bold text-near-black mb-1">Tener en cuenta</h4>
                        <ul class="text-xm text-gray-600 space-y-1">
                            <li>• <strong class="text-primary">Los campos marcados con *</strong>: Son obligatorios.
                            </li>
                            <li>• <strong class="text-primary">Resumen</strong>: Breve descripción y concisa del
                                problema.</li>
                            <li>• <strong class="text-primary">Descripción</strong>: Informacion mas detallada de la
                                problematica, serie del equipo, IP, etc.</li>
                        </ul>
                    </div>
                    <!-- Imagen -->
                    <div class="border border-gray-200 bg-gray-50 overflow-hidden">
                        <img src="{{ asset('storage/media/llenar-solicitud.png') }}" alt="Portal Netjer Networks Jira"
                            class="w-full h-auto">
                    </div>
                </div>
            </section>
            <!-- Step 6 Section -->
            <section class="bg-white border border-gray-200 p-8">
                <!-- Header -->
                <div class="mb-5">
                    <span
                        class="bg-primary/10 text-primary px-3 py-1 rounded-full text-xs font-bold uppercase tracking-wider">Paso
                        6</span>
                    <h2 class="mt-1 text-xl font-semibold text-gray-900">
                        Solicitud Generada
                    </h2>
                </div>
                <!-- Contenido vertical -->
                <div class="space-y-5">
                    <!-- Texto -->
                    <p class="text-gray-600 leading-relaxed">
                        Se mostrará el resumen de la solicitud generada. con su código <strong
                            class="text-primary">RINN-12345</strong>.
                    </p>
                    <p class="text-gray-600 leading-relaxed">
                        Si se desea se puede agregar <strong class="text-primary">comentarios</strong> sobre la
                        solicitud.
                    </p>
                    <p class="text-gray-600 leading-relaxed">
                        De igual forma una vez enviada la solicitud, llegara <strong class="text-primary">correo</strong>
                        con la notificación de la misma.
                    </p>
                    <!-- Imagen -->
                    <div class="border border-gray-200 bg-gray-50 overflow-hidden">
                        <img src="{{ asset('storage/media/solicitud-generada.png') }}" alt="Portal Netjer Networks Jira"
                            class="w-full h-auto">
                    </div>
                </div>
            </section>
            <!-- Step 7 Section -->
            <section class="bg-white border border-gray-200 p-8">
                <!-- Header -->
                <div class="mb-5">
                    <span
                        class="bg-primary/10 text-primary px-3 py-1 rounded-full text-xs font-bold uppercase tracking-wider">Paso
                        7</span>
                    <h2 class="mt-1 text-xl font-semibold text-gray-900">
                        Seguimiento de la Solicitud Generada
                    </h2>
                </div>
                <!-- Contenido vertical -->
                <div class="space-y-5">
                    <!-- Texto -->
                    <p class="text-gray-600 leading-relaxed">
                        Una vez que se recibe la solicitud, el equipo de <strong class="text-primary">Ingeniería</strong>
                        procederá con el apoyo y soporte solicitado.
                    </p>
                    <p class="text-gray-600 leading-relaxed">
                        Por lo que en el apartado de <strong class="text-primary">Solicitudes</strong> se podrá dar el
                        seguimiento asi como de su <strong class="text-primary">estado y evolución</strong>.
                    </p>
                    <!-- Imagen -->
                    <div class="border border-gray-200 bg-gray-50 overflow-hidden">
                        <img src="{{ asset('storage/media/seguimiento-solicitud.png') }}"
                            alt="Portal Netjer Networks Jira" class="w-full h-auto">
                    </div>
                </div>
            </section>
        </div>
        <!-- Ejemplos -->
        <section id="guia-ejemplos">
            <div class="max-w-5xl mx-auto px-8 py-6">

                <div class="text-center mb-10">
                    <h2 class="text-4xl font-bold text-gray-900">
                        Guía Ejemplos Tickets
                    </h2>
                    <p class="text-gray-600 mt-4">
                        Casos estructurados para una correcta apertura de incidentes.
                    </p>
                </div>
                <div class="bg-amber-50 border border-amber-200 text-amber-800 p-4 rounded-xl mb-10 text-sm">
                    ⚠️ Todos estos datos son necesarios para que el equipo de soporte pueda atender tu solicitud sin
                    demoras.
                </div>
                <div class="space-y-4">

                    <!-- EJEMPLO 1 -->
                    <div class="border rounded-lg bg-white shadow-sm">
                        <button
                            class="accordion w-full text-left px-6 py-5 font-semibold text-gray-800 flex justify-between items-center">
                            Creación de cuenta de correo y Zoom corporativo
                            <span class="icon text-orange-700">+</span>
                        </button>

                        <div class="panel hidden px-6 pb-6 text-gray-600">
                            <p><strong class="text-primary">Resumen:</strong> Solicitud de creación de cuenta de
                                correo
                                empresarial y cuenta
                                de Zoom para nuevo ingreso.</p>
                            <p><strong class="text-primary">Nombre Usuario:</strong> John Doe</p>
                            <p><strong class="text-primary">Correo electronico:</strong>
                                john.doe@netjernetworks.com
                            </p>
                            <p><strong class="text-primary">Departamento o área:</strong> Ilusiones.</p>
                            <p><strong class="text-primary">Tipo de Incidente:</strong> Correo</p>
                            <p><strong class="text-primary">Severidad:</strong> Alta</p>
                            <p><strong class="text-primary">Descripción:</strong> Se requiere la creación de una
                                nueva
                                cuenta de correo
                                electrónico empresarial para un empleado recién ingresado, con acceso completo a las
                                herramientas de comunicación internas. Además, se solicita la habilitación de una
                                cuenta
                                corporativa en Zoom vinculada al mismo correo, con permisos estándar de reuniones y
                                autenticación en el dominio de la empresa.</p>
                        </div>
                    </div>

                    <!-- EJEMPLO 2 -->
                    <div class="border rounded-lg bg-white shadow-sm">
                        <button
                            class="accordion w-full text-left px-6 py-5 font-semibold text-gray-800 flex justify-between items-center">
                            Baja de cuenta y respaldo de información
                            <span class="icon text-orange-700">+</span>
                        </button>

                        <div class="panel hidden px-6 pb-6 text-gray-600">
                            <p><strong class="text-primary">Resumen:</strong> Solicitud de baja de cuenta de
                                correo,
                                redirección y respaldo
                                de información.</p>
                            <p><strong class="text-primary">Nombre Usuario:</strong> a Chuchita la Bolsearón</p>
                            <p><strong class="text-primary">Correo electronico:</strong>
                                la.chuchita.triste@netjernetworks.com</p>
                            <p><strong class="text-primary">Departamento o área:</strong> Entretenimiento.</p>
                            <p><strong class="text-primary">Tipo de Incidente:</strong> Correo y Respaldo</p>
                            <p><strong class="text-primary">Severidad:</strong> Alta</p>
                            <p><strong class="text-primary">Descripción:</strong> Se requiere dar de baja la cuenta
                                de
                                correo de un empleado
                                que ha dejado la organización. La solicitud incluye redireccionar los correos
                                entrantes
                                a la cuenta del jefe inmediato y realizar un respaldo completo de la información
                                contenida en la bandeja de entrada, carpetas y archivos adjuntos, almacenándolos en
                                el
                                NAS de Administración para consulta futura.</p>
                        </div>
                    </div>

                    <!-- EJEMPLO 3 -->
                    <div class="border rounded-lg bg-white shadow-sm">
                        <button
                            class="accordion w-full text-left px-6 py-5 font-semibold text-gray-800 flex justify-between items-center">
                            Falla de componente en equipo de cómputo
                            <span class="icon text-orange-700">+</span>
                        </button>

                        <div class="panel hidden px-6 pb-6 text-gray-600">
                            <p><strong class="text-primary">Resumen:</strong> Reporte de falla en componente de
                                equipo
                                de cómputo.</p>
                            <p><strong class="text-primary">Nombre Usuario:</strong> Juan Perez</p>
                            <p><strong class="text-primary">Correo electronico:</strong>
                                juan.perez@netjernetworks.com
                            </p>
                            <p><strong class="text-primary">Departamento o área:</strong> Inventos.</p>
                            <p><strong class="text-primary">Tipo de Incidente:</strong> Cómputo</p>
                            <p><strong class="text-primary">Severidad:</strong> Media</p>
                            <p><strong class="text-primary">Descripción:</strong> Equipi asignado presenta fallas
                                en el
                                disco duro, con
                                ruidos mecánicos y errores frecuentes al intentar acceder a archivos. El sistema
                                operativo muestra mensajes de advertencia sobre sectores dañados. Se solicita
                                revisión
                                técnica, diagnóstico y reemplazo del componente defectuoso, así como respaldo de la
                                información crítica antes de proceder con cualquier cambio.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <div class="flex justify-center gap-6 pt-4">
            <a href="https://netjernetworks.atlassian.net/servicedesk/customer/user/login?destination=portals"
                target="_blank"
                class="px-8 py-4 bg-primary text-white font-semibold rounded-lg hover:shadow-primary/20 hover:scale-105 active:scale-95 transition-all shadow-md">
                Abrir Ticket
            </a>
        </div>

    </div>
@endsection
@push('js')
    <script>
        const accordions = document.querySelectorAll(".accordion");
        accordions.forEach(button => {
            button.addEventListener("click", () => {
                const panel = button.nextElementSibling;
                const icon = button.querySelector(".icon");
                const isOpen = !panel.classList.contains("hidden");
                // Cerrar todos
                document.querySelectorAll(".panel").forEach(p => p.classList.add("hidden"));
                document.querySelectorAll(".icon").forEach(i => i.textContent = "+");
                if (!isOpen) {
                    panel.classList.remove("hidden");
                    icon.textContent = "–";
                }
            });
        });
    </script>
@endpush
