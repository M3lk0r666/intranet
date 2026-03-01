@extends('layouts.intranet')

@section('title', 'Intranet Corporativa')

@push('css')
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;600;700;800&amp;display=swap"
        rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap"
        rel="stylesheet" />
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
                            <a href="{{ route('intranet.procesos-empresariales') }}"
                                class="ml-1 text-sm text-gray-600 hover:text-orange-600 md:ml-2">Procesos Empresariales</a>
                        </div>
                    </li>
                    <li aria-current="page">
                        <div class="flex items-center">
                            <i class="fas fa-chevron-right text-gray-400 mx-2"></i>
                            <span class="ml-1 text-sm text-primary font-medium md:ml-2">Organigrama</span>
                        </div>
                    </li>
                </ol>
            </nav>
        </div>
    </div>


    <div class="text-center mb-16 mt-12">
        <h2 class="text-4xl font-extrabold text-slate-900 dark:text-white mb-2 uppercase tracking-tight">
            Estructura Organizacional
        </h2>
        <div class="h-1 w-24 bg-primary mx-auto rounded-full"></div>
        <p class="text-slate-500 dark:text-slate-400 mt-4">
            Organigrama horizontal de Netjer Networks
        </p>
    </div>

    <!-- Leyenda de colores -->
    <div class="flex justify-center gap-6 mb-8 flex-wrap">
        <div class="flex items-center">
            <div class="w-3 h-3 rounded-full bg-ceo-level mr-2"></div>
            <span class="text-xs">CEO</span>
        </div>
        <div class="flex items-center">
            <div class="w-3 h-3 rounded-full bg-director-level mr-2"></div>
            <span class="text-xs">Directores</span>
        </div>
        <div class="flex items-center">
            <div class="w-3 h-3 rounded-full bg-manager-level mr-2"></div>
            <span class="text-xs">Gerentes</span>
        </div>
        <div class="flex items-center">
            <div class="w-3 h-3 rounded-full bg-primary mr-2"></div>
            <span class="text-xs">Áreas Especializadas</span>
        </div>
    </div>

    <!-- Contenedor principal con scroll horizontal -->
    <div class="org-scroll-container overflow-x-auto pb-20 px-4">
        <div class="flex items-center min-w-max">

            <!-- CEO - Xavier Martinez -->
            <div class="flex items-center">
                <div
                    class="node-ceo p-8 w-80 text-center transform hover:scale-105 transition-transform cursor-default relative z-10">
                    <div class="flex flex-col items-center">
                        <div class="h-16 w-16 bg-white/20 rounded-full flex items-center justify-center mb-4">
                            <span class="material-symbols-outlined text-3xl">corporate_fare</span>
                        </div>
                        <p class="text-2xl font-extrabold uppercase leading-tight">
                            Xavier Martinez
                        </p>
                        <p class="text-lg font-semibold opacity-90 border-t border-white/30 mt-3 pt-3">
                            CEO
                        </p>
                        <p class="text-sm mt-2 opacity-80">Liderazgo Estratégico</p>
                    </div>
                </div>
                <div class="connector-h w-16"></div>
            </div>

            <!-- Línea vertical principal -->
            <div class="flex flex-col gap-40 relative">
                <div
                    class="absolute -left-[1px] top-1/2 -translate-y-1/2 w-px h-[calc(100%-100px)] bg-slate-400 dark:bg-slate-600">
                </div>

                <!-- Director 1 - Rogelio Marín -->
                <div class="flex items-center relative">
                    <div class="connector-h w-8 -ml-2"></div>
                    <div
                        class="node-director p-6 w-72 text-center transform hover:scale-105 transition-transform relative z-10">
                        <div class="flex flex-col items-center">
                            <div class="h-12 w-12 bg-white/20 rounded-full flex items-center justify-center mb-3">
                                <span class="material-symbols-outlined text-2xl">business_center</span>
                            </div>
                            <p class="text-xl font-bold uppercase leading-tight">
                                Rogelio Marín
                            </p>
                            <p class="text-sm font-semibold opacity-90 border-t border-white/30 mt-2 pt-2">
                                CEO - Adjunto
                            </p>
                            <p class="text-xs mt-2 opacity-80">Business & Solution Development</p>
                        </div>
                    </div>
                    <div class="connector-h w-12"></div>

                    <!-- Sub-equipos de Rogelio Marín -->
                    <div class="flex flex-col gap-6 relative">
                        <div
                            class="absolute -left-[1px] top-1/2 -translate-y-1/2 w-px h-[calc(100%-60px)] bg-slate-400 dark:bg-slate-600">
                        </div>

                        <!-- Service Design -->
                        <div class="flex items-center">
                            <div class="connector-h w-6"></div>
                            <div class="node-manager p-4 w-56 text-center text-sm font-bold uppercase">
                                Service Design
                            </div>
                            <div class="connector-h w-12"></div>
                            <div
                                class="bg-slate-100 dark:bg-slate-800 p-4 rounded-lg border border-slate-200 dark:border-slate-700 w-60">
                                <p
                                    class="text-xs font-bold text-slate-500 dark:text-slate-400 uppercase tracking-widest mb-3">
                                    Responsable
                                </p>
                                <div
                                    class="bg-white dark:bg-slate-700 p-3 text-sm rounded shadow-sm border-l-4 border-primary">
                                    Carlos Jurado
                                </div>
                                <p class="text-xs text-slate-500 dark:text-slate-400 mt-2 italic">
                                    (entrada analítica)
                                </p>
                            </div>
                        </div>

                        <!-- Solution Development -->
                        <div class="flex items-center">
                            <div class="connector-h w-6"></div>
                            <div class="node-manager p-4 w-56 text-center text-sm font-bold uppercase">
                                Solution Development
                            </div>
                            <div class="connector-h w-12"></div>
                            <div
                                class="bg-slate-100 dark:bg-slate-800 p-4 rounded-lg border border-slate-200 dark:border-slate-700 w-60">
                                <p
                                    class="text-xs font-bold text-slate-500 dark:text-slate-400 uppercase tracking-widest mb-3">
                                    Áreas
                                </p>
                                <div class="grid grid-cols-2 gap-2">
                                    <div class="text-xs font-bold bg-primary/20 text-primary p-2 text-center rounded">
                                        Fabricantes
                                    </div>
                                    <div class="text-xs font-bold bg-primary/20 text-primary p-2 text-center rounded">
                                        Legacy
                                    </div>
                                    <div class="text-xs font-bold bg-primary/20 text-primary p-2 text-center rounded">
                                        Educación
                                    </div>
                                    <div class="text-xs font-bold bg-primary/20 text-primary p-2 text-center rounded">
                                        Gobierno
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Teams adicionales -->
                        <div class="flex items-center">
                            <div class="connector-h w-6"></div>
                            <div class="node-team p-3 w-52 text-center text-xs font-bold uppercase">
                                Operations
                            </div>
                            <div class="connector-h w-12"></div>
                            <div class="grid grid-cols-2 gap-3">
                                <div
                                    class="bg-slate-100 dark:bg-slate-800 p-3 rounded-lg border border-slate-200 dark:border-slate-700 w-48">
                                    <p class="text-xs font-bold text-primary mb-1">Service Delivery</p>
                                    <p class="text-xs text-slate-600 dark:text-slate-400">Juan Carlos Torres Pita</p>
                                </div>
                                <div
                                    class="bg-slate-100 dark:bg-slate-800 p-3 rounded-lg border border-slate-200 dark:border-slate-700 w-48">
                                    <p class="text-xs font-bold text-primary mb-1">Operations/Support</p>
                                    <p class="text-xs text-slate-600 dark:text-slate-400">Manuel Martínez</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Director 2 - Giselle Martinez -->
                <div class="flex items-center relative">
                    <div class="connector-h w-8 -ml-2"></div>
                    <div
                        class="node-director p-6 w-72 text-center transform hover:scale-105 transition-transform relative z-10">
                        <div class="flex flex-col items-center">
                            <div class="h-12 w-12 bg-white/20 rounded-full flex items-center justify-center mb-3">
                                <span class="material-symbols-outlined text-2xl">account_balance</span>
                            </div>
                            <p class="text-xl font-bold uppercase leading-tight">
                                Giselle Martinez
                            </p>
                            <p class="text-sm font-semibold opacity-90 border-t border-white/30 mt-2 pt-2">
                                Admin & Finanzas
                            </p>
                            <p class="text-xs mt-2 opacity-80">Administración y Finanzas</p>
                        </div>
                    </div>
                    <div class="connector-h w-12"></div>

                    <!-- Sub-equipos de Giselle Martinez -->
                    <div class="flex flex-col gap-6 relative">
                        <div
                            class="absolute -left-[1px] top-1/2 -translate-y-1/2 w-px h-[calc(100%-60px)] bg-slate-400 dark:bg-slate-600">
                        </div>

                        <!-- Contabilidad -->
                        <div class="flex items-center">
                            <div class="connector-h w-6"></div>
                            <div class="node-manager p-4 w-56 text-center text-sm font-bold uppercase">
                                Contabilidad
                            </div>
                            <div class="connector-h w-12"></div>
                            <div
                                class="bg-slate-100 dark:bg-slate-800 p-4 rounded-lg border border-slate-200 dark:border-slate-700 w-60">
                                <p
                                    class="text-xs font-bold text-slate-500 dark:text-slate-400 uppercase tracking-widest mb-3">
                                    Finanzas
                                </p>
                                <div class="space-y-2">
                                    <div class="bg-white dark:bg-slate-700 p-2 text-xs rounded">
                                        Control Presupuestal
                                    </div>
                                    <div class="bg-white dark:bg-slate-700 p-2 text-xs rounded">
                                        Tesorería
                                    </div>
                                    <div class="bg-white dark:bg-slate-700 p-2 text-xs rounded">
                                        Reportes Financieros
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Recursos Humanos -->
                        <div class="flex items-center">
                            <div class="connector-h w-6"></div>
                            <div class="node-manager p-4 w-56 text-center text-sm font-bold uppercase">
                                Recursos Humanos
                            </div>
                            <div class="connector-h w-12"></div>
                            <div
                                class="bg-slate-100 dark:bg-slate-800 p-4 rounded-lg border border-slate-200 dark:border-slate-700 w-60">
                                <p
                                    class="text-xs font-bold text-slate-500 dark:text-slate-400 uppercase tracking-widest mb-3">
                                    Administración
                                </p>
                                <div class="space-y-2">
                                    <div class="bg-white dark:bg-slate-700 p-2 text-xs rounded">
                                        Reclutamiento
                                    </div>
                                    <div class="bg-white dark:bg-slate-700 p-2 text-xs rounded">
                                        Nómina
                                    </div>
                                    <div class="bg-white dark:bg-slate-700 p-2 text-xs rounded">
                                        Capacitación
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Donate -->
                        <div class="flex items-center">
                            <div class="connector-h w-6"></div>
                            <div class="node-team p-3 w-52 text-center text-xs font-bold uppercase">
                                Donate
                            </div>
                            <div class="connector-h w-12"></div>
                            <div
                                class="bg-slate-100 dark:bg-slate-800 p-3 rounded-lg border border-slate-200 dark:border-slate-700 w-48">
                                <p class="text-xs font-bold text-primary mb-1">Donaciones</p>
                                <p class="text-xs text-slate-600 dark:text-slate-400">Gestión de donativos</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Equipos Especializados -->
            <div class="flex items-center ml-16">
                <div class="connector-h w-16"></div>
                <div class="flex flex-col gap-8">
                    <h3 class="text-xl font-bold text-slate-900 dark:text-white text-center">
                        Equipos Especializados
                    </h3>

                    <!-- Disco -->
                    <div class="flex items-center">
                        <div class="node-orange p-6 w-64 rounded-xl transform hover:scale-105 transition-transform">
                            <div class="flex items-center mb-3">
                                <div class="h-10 w-10 bg-white/20 rounded-full flex items-center justify-center mr-3">
                                    <span class="material-symbols-outlined">storage</span>
                                </div>
                                <div>
                                    <h4 class="text-lg font-bold">Disco</h4>
                                    <p class="text-xs opacity-80">Carlos Junco</p>
                                </div>
                            </div>
                            <div class="space-y-2 text-xs">
                                <div class="bg-white/10 p-2 rounded">Operación Activo Hermandad</div>
                                <div class="bg-white/10 p-2 rounded">Dev Interno</div>
                            </div>
                        </div>
                        <div class="connector-h w-12"></div>
                    </div>

                    <!-- Samuel Trejo -->
                    <div class="flex items-center">
                        <div class="node-orange p-6 w-64 rounded-xl transform hover:scale-105 transition-transform">
                            <div class="flex items-center mb-3">
                                <div class="h-10 w-10 bg-white/20 rounded-full flex items-center justify-center mr-3">
                                    <span class="material-symbols-outlined">code</span>
                                </div>
                                <div>
                                    <h4 class="text-lg font-bold">Samuel Trejo</h4>
                                    <p class="text-xs opacity-80">Dever</p>
                                </div>
                            </div>
                            <div class="space-y-2 text-xs">
                                <div class="bg-white/10 p-2 rounded">Dboa</div>
                                <div class="bg-white/10 p-2 rounded">Desarrollo</div>
                            </div>
                        </div>
                        <div class="connector-h w-12"></div>
                    </div>

                    <!-- Jonathan Ortiz -->
                    <div class="flex items-center">
                        <div class="node-orange p-6 w-64 rounded-xl transform hover:scale-105 transition-transform">
                            <div class="flex items-center mb-3">
                                <div class="h-10 w-10 bg-white/20 rounded-full flex items-center justify-center mr-3">
                                    <span class="material-symbols-outlined">campaign</span>
                                </div>
                                <div>
                                    <h4 class="text-lg font-bold">Jonathan Ortiz</h4>
                                    <p class="text-xs opacity-80">Marketing</p>
                                </div>
                            </div>
                            <div class="space-y-2 text-xs">
                                <div class="bg-white/10 p-2 rounded">Demand Generation</div>
                                <div class="bg-white/10 p-2 rounded">Diseño</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Áreas de Negocio -->
            <div class="flex items-center ml-16">
                <div class="connector-h w-16"></div>
                <div class="flex flex-col gap-8">
                    <h3 class="text-xl font-bold text-slate-900 dark:text-white text-center">
                        Áreas de Negocio
                    </h3>

                    <div class="grid grid-cols-2 gap-4">
                        <div
                            class="node-blue p-4 w-40 rounded-lg text-center transform hover:scale-105 transition-transform">
                            <span class="material-symbols-outlined block mb-2 text-2xl">store</span>
                            <h5 class="font-bold text-sm">SMB</h5>
                            <p class="text-xs opacity-80 mt-1">Pequeñas Empresas</p>
                        </div>

                        <div
                            class="node-blue p-4 w-40 rounded-lg text-center transform hover:scale-105 transition-transform">
                            <span class="material-symbols-outlined block mb-2 text-2xl">attach_money</span>
                            <h5 class="font-bold text-sm">Financeiro</h5>
                            <p class="text-xs opacity-80 mt-1">Finanzas</p>
                        </div>

                        <div
                            class="node-blue p-4 w-40 rounded-lg text-center transform hover:scale-105 transition-transform">
                            <span class="material-symbols-outlined block mb-2 text-2xl">shopping_bag</span>
                            <h5 class="font-bold text-sm">Retail</h5>
                            <p class="text-xs opacity-80 mt-1">Comercio</p>
                        </div>

                        <div
                            class="node-blue p-4 w-40 rounded-lg text-center transform hover:scale-105 transition-transform">
                            <span class="material-symbols-outlined block mb-2 text-2xl">medical_services</span>
                            <h5 class="font-bold text-sm">Salud</h5>
                            <p class="text-xs opacity-80 mt-1">Sector Salud</p>
                        </div>

                        <div
                            class="node-blue p-4 w-40 rounded-lg text-center transform hover:scale-105 transition-transform">
                            <span class="material-symbols-outlined block mb-2 text-2xl">handyman</span>
                            <h5 class="font-bold text-sm">Servicios</h5>
                            <p class="text-xs opacity-80 mt-1">Profesionales</p>
                        </div>

                        <div
                            class="node-blue p-4 w-40 rounded-lg text-center transform hover:scale-105 transition-transform">
                            <span class="material-symbols-outlined block mb-2 text-2xl">factory</span>
                            <h5 class="font-bold text-sm">Manufactura</h5>
                            <p class="text-xs opacity-80 mt-1">Industrial</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Indicadores de scroll -->
    <div class="flex justify-center items-center gap-6 mt-8">
        <button onclick="scrollChart(-400)"
            class="flex items-center gap-2 px-4 py-2 bg-slate-100 dark:bg-slate-800 rounded-lg hover:bg-slate-200 dark:hover:bg-slate-700 transition-colors">
            <span class="material-symbols-outlined">chevron_left</span>
            <span class="text-sm">Anterior</span>
        </button>

        <div class="text-sm text-slate-500 dark:text-slate-400">
            Desplázate horizontalmente para ver más
        </div>

        <button onclick="scrollChart(400)"
            class="flex items-center gap-2 px-4 py-2 bg-slate-100 dark:bg-slate-800 rounded-lg hover:bg-slate-200 dark:hover:bg-slate-700 transition-colors">
            <span class="text-sm">Siguiente</span>
            <span class="material-symbols-outlined">chevron_right</span>
        </button>
    </div>



@endsection
@push('js')
    <script>
        // Función para desplazar el organigrama
        function scrollChart(amount) {
            const container = document.querySelector('.org-scroll-container');
            container.scrollBy({
                left: amount,
                behavior: 'smooth'
            });
        }

        // Navegación con teclado
        document.addEventListener('keydown', (e) => {
            const container = document.querySelector('.org-scroll-container');
            if (e.key === 'ArrowLeft') {
                scrollChart(-300);
            } else if (e.key === 'ArrowRight') {
                scrollChart(300);
            }
        });
    </script>
@endpush
