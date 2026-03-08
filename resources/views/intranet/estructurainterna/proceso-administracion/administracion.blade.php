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
                            <a href="{{ route('intranet.procesos-empresariales') }}"
                                class="ml-1 text-sm text-gray-600 hover:text-orange-600 md:ml-2">Procesos Empresariales</a>
                        </div>
                    </li>
                    <li aria-current="page">
                        <div class="flex items-center">
                            <i class="fas fa-chevron-right text-gray-400 mx-2"></i>
                            <span class="ml-1 text-sm text-primary font-medium md:ml-2">Administración y Finanzas</span>
                        </div>
                    </li>
                </ol>
            </nav>
        </div>
    </div>

    <!-- Encabezado -->
    <div class="flex flex-col lg:flex-row gap-10 mt-8">
        <!-- Content Area -->
        <div class="flex-1 flex flex-col gap-8">
            <!-- Page Hero Header -->
            <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-4">
                <div>
                    <h1 class="text-4xl md:text-5xl font-black tracking-tight text-slate-900 ">Procesos
                        Administrativos</h1>
                    <p class="text-slate-500  mt-2 text-lg">Estandarización y eficiencia en la gestión
                        operativa de Netjer Networks.</p>
                </div>
            </div>
            <!-- Main Section: Recursos Humanos -->
            <div
                class="relative overflow-hidden rounded-3xl bg-slate-900 min-h-[400px] flex flex-col justify-end p-8 group">
                <div class="absolute inset-0 opacity-60 group-hover:scale-105 transition-transform duration-700 bg-center bg-cover"
                    data-alt="Modern professional office building interior with clean aesthetics"
                    style="background-image: url('https://lh3.googleusercontent.com/aida-public/AB6AXuCH_wn5bMfCm_QyzJrwsdSgXkENU5qeB-bdUrrlUSucaU-R-fGlbIERK3Ryg0PXEwcyYwK7RGlBI5sjjtMRLEz0L6C-TVZ7Qhk6G8OZRdz9nbRM89-kYo7Qmvv6IJ8MDjwolCPr1Yr1dPUCaCCN2grYaHi8BgALbxzzTUEpcZdspdhDROs86Tty4FWYnsNTrNgeWWKfq9z8lD-ldKdBp6wse86bH6Q1TCupW2BKLQEMTZtBY-WEntk5NZ4TdgenID1v-BfoogyP4688')">
                </div>
                <div class="absolute inset-0 bg-gradient-to-t from-black via-black/40 to-transparent"></div>
                <div class="relative z-10">
                    <span
                        class="bg-primary text-white text-[10px] font-bold uppercase tracking-widest px-3 py-1 rounded-full">Sección
                        Crítica</span>
                    <h2 class="text-4xl font-black text-white mt-4">Recursos Humanos</h2>
                    <p class="text-slate-200 max-w-xl mt-2 text-lg">Gestión integral del ciclo de vida del colaborador,
                        desde la integración hasta la desvinculación oficial.</p>
                    <div class="flex flex-wrap gap-4 mt-6">
                        <div
                            class="bg-white/10 backdrop-blur-md border border-white/20 p-4 rounded-2xl flex-1 min-w-[200px]">
                            <div class="flex items-center gap-2 text-primary mb-1">
                                <i class="ri-user-add-line"></i>
                                <span class="font-bold text-sm uppercase">Alta</span>
                            </div>
                            <p class="text-white text-sm font-medium">Procedimiento de contratación y bienvenida.</p>
                            <a href="{{ route('intranet.administracion.alta-colaborador') }}"
                                class="mt-4 text-xs font-bold text-white flex items-center gap-1 hover:text-primary transition-colors">VER
                                PROCEDIMIENTO <i class="ri-arrow-right-s-line text-sn"></i>
                            </a>
                        </div>
                        <div
                            class="bg-white/10 backdrop-blur-md border border-white/20 p-4 rounded-2xl flex-1 min-w-[200px]">
                            <div class="flex items-center gap-2 text-primary mb-1">
                                <i class="ri-user-minus-line"></i>
                                <span class="font-bold text-sm uppercase">Baja</span>
                            </div>
                            <p class="text-white text-sm font-medium">Protocolo de desvinculación y entrega de activos.
                            </p>
                            <a href="{{ route('intranet.administracion.baja-colaborador') }}"
                                class="mt-4 text-xs font-bold text-white flex items-center gap-1 hover:text-primary transition-colors">VER
                                PROCEDIMIENTO <i class="ri-arrow-right-s-line text-sn"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Secondary Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Uso de Camioneta -->
                <div class="group relative h-80 rounded-2xl overflow-hidden shadow-xl">
                    <div class="absolute inset-0 bg-cover bg-center group-hover:scale-110 transition-transform duration-500"
                        data-alt="Corporate logistic white van in a parking area"
                        style="background-image: url('https://lh3.googleusercontent.com/aida-public/AB6AXuCCmaWwdY-yoRUen1-Yi10IqVWFEpbzMBJqbPpyaQqvm9zs-6E8y6a-ieh3B1zQ7oWvPm0QNZpM6Dcv5K4kOJPYmkTO2GNprWadfbB7muAYBd9-0_ANgBvJZVyZcXQ7Hx6JufvyAn-F_UKKBpmcyvAkk1cQOkjqq17lud9EOJEicWAWsDHFEejPnHRuP9kxFHQbzBkbjNlG3wIcWE_Vram6avga0Px2-4141uYNff-Lfu0VxlgLMrQysxqpqCQz9KmrPo2stPf0YCT9')">
                    </div>
                    <div class="absolute inset-0 bg-gradient-to-t from-slate-900/90 to-transparent"></div>
                    <div class="absolute bottom-0 left-0 p-6 w-full">
                        <h3 class="text-2xl font-bold text-white">Uso de Camioneta</h3>
                        <p class="text-slate-300 text-sm mt-1 mb-4">Control de bitácoras, mantenimiento y asignación de
                            vehículos.</p>
                        {{-- <a href="{{ route('intranet.administracion.uso-camioneta') }}"
                            class="block w-full bg-primary py-3 rounded-xl text-white font-bold text-sm uppercase tracking-widest hover:bg-primary/90 transition-colors">Procedimiento
                        </a> --}}
                        <a href="{{ route('intranet.administracion.uso-camioneta') }}"
                            class="inline-flex px-6 py-3 bg-primary rounded-xl text-white font-bold text-sm uppercase tracking-widest hover:bg-primary/90 transition-colors items-center justify-center">
                            Procedimiento
                        </a>
                    </div>
                </div>
                <!-- Incidencias -->
                <div class="group relative h-80 rounded-2xl overflow-hidden shadow-xl">
                    <div class="absolute inset-0 bg-cover bg-center group-hover:scale-110 transition-transform duration-500"
                        data-alt="Modern calculator and accounting financial documents on a desk"
                        style="background-image: url('https://lh3.googleusercontent.com/aida-public/AB6AXuBhv-gSrQLq1VVcly-45DqcJO9BLORd4KfLvuLhyBZbSpKD6KkINpaKVihVdUk9_MAVXAhfa-j4hwLufcCyY8MZTdg1ggYNU_eyigUSePfdm6MzsUVrV8VxspSwINAxY0fzKk7RRzqpJ6N4CHcqT0eZOdrGF6TXnQI96HzDqP9tRjs65t6B-FMwe_jBYU02_FqZEoc7Am5zkz0E_Wwq9d-Uh3izSWpuxjP5jXkgtdyYd3b69TVC8FCdZtcSsM2so9B6Tdifi4S9_Iko')">
                    </div>
                    <div class="absolute inset-0 bg-gradient-to-t from-slate-900/90 to-transparent"></div>
                    <div class="absolute bottom-0 left-0 p-6 w-full">
                        <h3 class="text-2xl font-bold text-white">Incidencias</h3>
                        <p class="text-slate-300 text-sm mt-1 mb-4">Reporte de nómina, faltas, retardos y bonificaciones
                            extraordinarias.</p>
                        <a href="{{ route('intranet.administracion.incidencias') }}"
                            class="inline-flex px-6 py-3 bg-primary rounded-xl text-white font-bold text-sm uppercase tracking-widest hover:bg-primary/90 transition-colors items-center justify-center">Procedimiento</a>
                    </div>
                </div>
                <!-- Horarios Laborales -->
                <div class="group relative h-80 rounded-2xl overflow-hidden shadow-xl">
                    <div class="absolute inset-0 bg-cover bg-center group-hover:scale-110 transition-transform duration-500"
                        data-alt="Classic office clock on a minimalist wall"
                        style="background-image: url('https://lh3.googleusercontent.com/aida-public/AB6AXuAXSs4i7482epFlPO5_3HbxK-Pc0VIw1bdbth6SA55jsr7nOX_jsgyjcoIyuSv35qPBqI26g6ZNgz9CA1mkoz1F4VM26lndB6qxIl6K7F1mrd9XU39Omv-pT59otfjd5c-7y4ReEjiK4tBbEO3bISXZt66GXAKyGiKUdl6i9dVqKSAvThbzAJd7CGHCY0w7FSvF4HeSFUNz5yv20t4dtb4X6M0b-OIGhs8aeLTqbbuP4ACJpNKeOeptqKdBtPoVyT2QOGZ0SRaUBtSR')">
                    </div>
                    <div class="absolute inset-0 bg-gradient-to-t from-slate-900/90 to-transparent"></div>
                    <div class="absolute bottom-0 left-0 p-6 w-full">
                        <h3 class="text-2xl font-bold text-white">Horarios Laborales</h3>
                        <p class="text-slate-300 text-sm mt-1 mb-4">Registro de asistencia, turnos rotativos y
                            cumplimiento
                            de jornada.</p>
                        <a href="{{ route('intranet.administracion.horario-laboral') }}"
                            class="inline-flex px-6 py-3 bg-primary rounded-xl text-white font-bold text-sm uppercase tracking-widest hover:bg-primary/90 transition-colors items-center justify-center">Procedimiento</a>
                    </div>
                </div>
                <!-- Inventario - Facturación -->
                <div class="group relative h-80 rounded-2xl overflow-hidden shadow-xl">
                    <div class="absolute inset-0 bg-cover bg-center group-hover:scale-110 transition-transform duration-500"
                        data-alt="Modern warehouse shelves with organized products"
                        style="background-image: url('https://lh3.googleusercontent.com/aida-public/AB6AXuAU4E5Z1GbdzCee5L3S9yPLa47cWhbIyvoVXSUYIYeZuN_wm8olnyek_0FzO8gVoaJ3a63dz4AcsIFpbxW_ARoZwhuO-yFOg_XsPkwKUoXUOfUxX7Dem-UXpNnf-0sEe0jIBBq2MHuwLGOcqQyYQjHsQ6LOIJmD0xV37HBlHfQqbLBi5cNigEX3RTZSMdT7rB6hpEBjvekHa7M0GeU3gVNlCgz_fWq5yM54R61jxtxUazr12mtXsuMniTgn7qenUc8vZVmWVe-B2-ph')">
                    </div>
                    <div class="absolute inset-0 bg-gradient-to-t from-slate-900/90 to-transparent"></div>
                    <div class="absolute bottom-0 left-0 p-6 w-full">
                        <h3 class="text-2xl font-bold text-white">Inventario - Facturación</h3>
                        <p class="text-slate-300 text-sm mt-1 mb-4">Control de existencias, flujo de ventas y emisión de
                            facturas fiscales.</p>
                        <a href="{{ route('intranet.administracion.facturacion-inventario') }}"
                            class="inline-flex px-6 py-3 bg-primary rounded-xl text-white font-bold text-sm uppercase tracking-widest hover:bg-primary/90 transition-colors items-center justify-center">Procedimiento</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
