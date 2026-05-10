@extends('layouts.intranet')

@section('title', 'Administración y Finanzas')

@push('css')
    <link href="/assets/css/intrahome.css" rel="stylesheet">
@endpush

@section('content')

    {{-- ── Breadcrumb ── --}}
    <div class="bg-white border-b border-gray-200">
        <div class="container mx-auto px-4 py-3">
            <nav class="flex" aria-label="Breadcrumb">
                <ol class="inline-flex items-center space-x-1 md:space-x-3">
                    <li class="inline-flex items-center">
                        <a href="{{ route('bienvenido') }}"
                            class="inline-flex items-center text-sm text-gray-600 hover:text-orange-600">
                            <i class="fas fa-home mr-2"></i> Home
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
                    <li aria-current="page">
                        <div class="flex items-center">
                            <i class="fas fa-chevron-right text-gray-400 mx-2"></i>
                            <span class="ml-1 text-sm text-orange-600 font-medium md:ml-2">Administración y Finanzas</span>
                        </div>
                    </li>
                </ol>
            </nav>
        </div>
    </div>

    <div class="container mx-auto px-4 py-8 max-w-[1280px]">
        {{-- HERO con stats rápidos == --}}
        <section class="proc-hero p-6 md:p-9 mb-10 proc-anim-up">
            <div class="flex flex-col md:flex-row md:items-center gap-6 mb-6">
                <div class="proc-hero-icon">
                    <i class="las la-project-diagram"></i>
                </div>
                <div class="flex-1">
                    <div class="flex items-center gap-2 text-xs font-bold text-orange-600 uppercase tracking-widest mb-2">
                        <i class="las la-building"></i>
                        <span>Estructura Interna</span>
                    </div>
                    <h1 class="text-3xl md:text-4xl font-extrabold text-gray-900 tracking-tight leading-tight">
                        Administración y Finanzas
                    </h1>
                    <p class="text-gray-600 mt-2 text-base md:text-lg max-w-2xl">
                        Procedimientos operativos del área administrativa. Consulta los flujos de trabajo de Recursos
                        Humanos y Recursos Materiales.
                    </p>
                </div>
            </div>
            {{-- Stats rápidos --}}
            <div class="grid grid-cols-2 md:grid-cols-4 gap-3">
                <div class="proc-stat">
                    <div class="ic" style="background:#fff7ed; color:#ea580c;"><i class="las la-th-large"></i></div>
                    <div>
                        <div class="num">2</div>
                        <div class="label">Áreas </div>
                    </div>
                </div>
                <div class="proc-stat">
                    <div class="ic" style="background:#dbeafe; color:#1d4ed8;"><i class="las la-sitemap"></i></div>
                    <div>
                        <div class="num">6</div>
                        <div class="label">Procedimientos</div>
                    </div>
                </div>
                <div class="proc-stat">
                    <div class="ic" style="background:#dcfce7; color:#15803d;"><i class="las la-sync"></i></div>
                    <div>
                        <div class="num">Activo</div>
                        <div class="label">Estado</div>
                    </div>
                </div>
            </div>
        </section>

        {{-- Recursos Humanos --}}
        <section class="adm-block adm-anim-up mt-4 mb-6">
            <div class="adm-block-head">
                <div class="ic" style="background: linear-gradient(135deg, #fff7ed, #ffedd5); color:#ea580c;">
                    <i class="las la-users"></i>
                </div>
                <div>
                    <h2>Recursos Humanos</h2>
                    <p>Gestión del ciclo de vida del colaborador y procesos administrativos.</p>
                </div>
                <span class="right-meta hidden md:inline-flex">
                    <i class="las la-folder"></i> 4 procedimientos
                </span>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                {{-- Alta de Personal --}}
                <a href="{{ route('administracion.alta-colaborador') }}" class="adm-card"
                    style="--c-color:#10b981; --c-bg:#dcfce7; --c-border:#bbf7d0;">
                    <div class="img-area" style="background-image: url('{{ asset('assets/media/alta-personal.png') }}');">
                        <span class="float-icon"><i class="las la-user-plus"></i></span>
                        <span class="tag-corner"><i class="las la-arrow-up"></i> Alta</span>
                    </div>
                    <div class="body">
                        <h3>Alta de Personal</h3>
                        <p>Procedimiento de contratación y bienvenida de nuevos colaboradores.</p>
                        <div class="footer-line">
                            <span class="meta-pill"><i class="las la-clipboard-check"></i> Ver procedimiento</span>
                            <span class="arrow-circle"><i class="las la-arrow-right"></i></span>
                        </div>
                    </div>
                </a>

                {{-- Baja de Personal --}}
                <a href="{{ route('administracion.baja-colaborador') }}" class="adm-card"
                    style="--c-color:#ef4444; --c-bg:#fee2e2; --c-border:#fecaca;">
                    <div class="img-area" style="background-image: url('{{ asset('assets/media/baja-personal.png') }}');">
                        <span class="float-icon"><i class="las la-user-minus"></i></span>
                        <span class="tag-corner"><i class="las la-arrow-down"></i> Baja</span>
                    </div>
                    <div class="body">
                        <h3>Baja de Personal</h3>
                        <p>Proceso de desvinculación, entrega de activos y formalización de salida.</p>
                        <div class="footer-line">
                            <span class="meta-pill"><i class="las la-clipboard-list"></i> Ver procedimiento</span>
                            <span class="arrow-circle"><i class="las la-arrow-right"></i></span>
                        </div>
                    </div>
                </a>

                {{-- Horario Laboral --}}
                <a href="{{ route('administracion.horario-laboral') }}" class="adm-card"
                    style="--c-color:#3b82f6; --c-bg:#dbeafe; --c-border:#bfdbfe;">
                    <div class="img-area" style="background-image: url('{{ asset('assets/media/horario-laboral.png') }}');">
                        <span class="float-icon"><i class="las la-clock"></i></span>
                        <span class="tag-corner"><i class="las la-business-time"></i> Jornada</span>
                    </div>
                    <div class="body">
                        <h3>Horario Laboral</h3>
                        <p>Registro de asistencia, turnos rotativos y cumplimiento de jornada.</p>
                        <div class="footer-line">
                            <span class="meta-pill"><i class="las la-calendar-check"></i> Ver procedimiento</span>
                            <span class="arrow-circle"><i class="las la-arrow-right"></i></span>
                        </div>
                    </div>
                </a>

                {{-- Incidencias Laborales --}}
                <a href="{{ route('administracion.incidencias') }}" class="adm-card"
                    style="--c-color:#f59e0b; --c-bg:#fef3c7; --c-border:#fde68a;">
                    <div class="img-area"
                        style="background-image: url('{{ asset('assets/media/incidencia-laboral.png') }}');">
                        <span class="float-icon"><i class="las la-exclamation-triangle"></i></span>
                        <span class="tag-corner"><i class="las la-file-alt"></i> Nómina</span>
                    </div>
                    <div class="body">
                        <h3>Incidencias Laborales</h3>
                        <p>Reporte de nómina, faltas, retardos y bonificaciones extraordinarias.</p>
                        <div class="footer-line">
                            <span class="meta-pill"><i class="las la-edit"></i> Ver procedimiento</span>
                            <span class="arrow-circle"><i class="las la-arrow-right"></i></span>
                        </div>
                    </div>
                </a>
            </div>
        </section>

        {{-- Recursos Materiales --}}
        <section class="adm-block adm-anim-up mt-4 mb-6">
            <div class="adm-block-head">
                <div class="ic" style="background: linear-gradient(135deg, #f5f3ff, #ddd6fe); color:#7e22ce;">
                    <i class="las la-cog"></i>
                </div>
                <div>
                    <h2>Recursos Materiales</h2>
                    <p>Procedimiento para el uso adecuado del vehículo, así como inventario y facturación.</p>
                </div>
                <span class="right-meta hidden md:inline-flex">
                    <i class="las la-folder"></i> 2 procedimientos
                </span>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                {{-- Uso del Vehículo --}}
                <a href="{{ route('administracion.uso-camioneta') }}" class="adm-card"
                    style="--c-color:#0ea5e9; --c-bg:#e0f2fe; --c-border:#bae6fd;">
                    <div class="img-area" style="background-image: url('{{ asset('assets/media/uso-vehiculo.png') }}');">
                        <span class="float-icon"><i class="las la-car"></i></span>
                        <span class="tag-corner"><i class="las la-route"></i> Vehículo</span>
                    </div>
                    <div class="body">
                        <h3>Uso del Vehículo</h3>
                        <p>Control de bitácoras, mantenimiento y asignación de vehículos.</p>
                        <div class="footer-line">
                            <span class="meta-pill"><i class="las la-key"></i> Ver procedimiento</span>
                            <span class="arrow-circle"><i class="las la-arrow-right"></i></span>
                        </div>
                    </div>
                </a>

                {{-- Inventario y Facturación --}}
                <a href="{{ route('administracion.facturacion-inventario') }}" class="adm-card"
                    style="--c-color:#ec4899; --c-bg:#fdf2f8; --c-border:#fbcfe8;">
                    <div class="img-area"
                        style="background-image: url('{{ asset('assets/media/facturacion-inventario.png') }}');">
                        <span class="float-icon"><i class="las la-boxes"></i></span>
                        <span class="tag-corner"><i class="las la-file-invoice-dollar"></i> Facturación</span>
                    </div>
                    <div class="body">
                        <h3>Inventario y Facturación</h3>
                        <p>Control de existencias, flujo de ventas y emisión de facturas fiscales.</p>
                        <div class="footer-line">
                            <span class="meta-pill"><i class="las la-warehouse"></i> Ver procedimiento</span>
                            <span class="arrow-circle"><i class="las la-arrow-right"></i></span>
                        </div>
                    </div>
                </a>
            </div>
        </section>
    </div>
@endsection
