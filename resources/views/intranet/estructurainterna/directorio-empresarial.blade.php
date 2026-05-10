@extends('layouts.intranet')

@section('title', 'Directorio - Intranet Corporativa')

@push('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet"
        href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <link href="/assets/css/intrahome.css" rel="stylesheet">
    <link href="/assets/css/directorio.css" rel="stylesheet">
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
                    <li aria-current="page">
                        <div class="flex items-center">
                            <i class="fas fa-chevron-right text-gray-400 mx-2 text-xs"></i>
                            <span class="ml-1 text-sm text-orange-600 font-semibold md:ml-2">Directorio</span>
                        </div>
                    </li>
                </ol>
            </nav>
        </div>
    </div>

    <div class="container mx-auto px-4 py-8">
        {{-- HERO simple con buscador integrado --}}
        <section class="dir-hero mb-6 dir-anim-up">
            <span class="dir-eyebrow mb-4">
                <span class="ic"><i class="las la-id-card"></i></span>
                Contactos Internos
            </span>
            <h1 class="text-3xl md:text-5xl font-extrabold text-gray-900 tracking-tight leading-[1.05] mt-1">
                Directorio
                <span class="dir-title-grad">Netjer Networks</span>
            </h1>
            <p class="text-gray-600 mt-3 text-base md:text-lg max-w-2xl leading-relaxed mb-6">
                Acceda a la red interna completa de profesionales de Netjer Networks.
                Busque por nombre, puesto, extensión o correo electrónico.
            </p>

            {{-- Buscador en vivo --}}
            <div class="dir-search" id="dirSearchWrap">
                <i class="las la-search left-ic"></i>
                <input type="text" id="dirSearchInput" placeholder="Buscar por nombre, extensión, puesto o correo..."
                    autocomplete="off">
                <button type="button" class="clear-btn" id="dirClearBtn" aria-label="Limpiar">
                    <i class="las la-times"></i>
                </button>
            </div>
        </section>

        {{-- Barra sticky con número de oficina --}}
        <div class="dir-office-bar mb-8 dir-anim-up">
            <div class="ic"><i class="las la-phone-volume"></i></div>
            <div class="flex-1 min-w-0">
                <div class="label">Número Interno de Oficina</div>
                <div class="number">+52 55 1054-1184 / 1185</div>
            </div>
            <a href="tel:+525510541184"
                class="hidden sm:inline-flex items-center gap-2 px-4 py-2 rounded-xl bg-gradient-to-r from-orange-500 to-orange-600 text-white text-sm font-bold shadow-md hover:shadow-lg hover:-translate-y-0.5 transition-all whitespace-nowrap">
                <i class="las la-phone"></i> Llamar
            </a>
        </div>

        {{-- Encabezado del listado --}}
        <div class="dir-section-head">
            <div class="left">
                <div class="accent"></div>
                <div>
                    <h2>Colaboradores</h2>
                    <p class="subtitle">Equipo activo de Netjer Networks</p>
                </div>
            </div>
            <span class="dir-counter-pill" id="dirCounter">
                <i class="las la-users"></i> <span id="dirCount">0</span> colaboradores
            </span>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-5 mb-12" id="dirGrid">
            {{-- CARD de Colaborador --}}
            <div class="dir-card" data-search="alberto ramirez ingeniero senior 105 alberto.ramirez@netjernetworks.com">
                <div class="dir-card-photo">
                    <img src="{{ asset('storage/media/male.png') }}" alt="Alberto Ramírez">
                    <span class="status-dot" title="Activo"></span>
                </div>
                <h3 class="dir-card-name">Alberto Ramírez</h3>
                <span class="dir-card-role">Ingeniero Senior</span>
                <div class="dir-contact">
                    {{-- Extensión Zoom --}}
                    <div class="dir-contact-row">
                        <span class="ic"><i class="las la-headset"></i></span>
                        <div class="dir-contact-info">
                            <div class="label">Zoom Ext.</div>
                            <span class="value">105</span>
                        </div>
                    </div>
                    {{-- Correo principal --}}
                    <div class="dir-contact-row">
                        <span class="ic"><i class="las la-envelope"></i></span>
                        <div class="dir-contact-info">
                            <div class="label">Correo</div>
                            <a class="value" href="mailto:alberto.ramirez@netjernetworks.com"
                                title="alberto.ramirez@netjernetworks.com">
                                alberto.ramirez@netjernetworks.com
                            </a>
                        </div>
                    </div>
                    {{-- Correo secundario opcional (eliminar si no aplica) --}}
                    {{--
                    <div class="dir-contact-row">
                        <span class="ic"><i class="las la-envelope-open"></i></span>
                        <div class="dir-contact-info">
                            <div class="label">Correo alterno</div>
                            <a class="value" href="mailto:alberto.ramirez@rexten.io"
                               title="alberto.ramirez@rexten.io">
                                alberto.ramirez@rexten.io
                            </a>
                        </div>
                    </div>
                    --}}
                </div>
            </div>
            {{-- CARD de Colaborador --}}
            <div class="dir-card" data-search="ana karen Contabilidad Finanzas 103 anakaren.gonzales@netjernetworks.com">
                <div class="dir-card-photo">
                    <img src="{{ asset('storage/media/female.png') }}" alt="Ana Karen Gonzalez">
                    <span class="status-dot" title="Activo"></span>
                </div>
                <h3 class="dir-card-name">Ana Karen Gonzalez</h3>
                <span class="dir-card-role">Gerente de Contabilidad y Finanzas</span>
                <div class="dir-contact">
                    {{-- Extensión Zoom --}}
                    <div class="dir-contact-row">
                        <span class="ic"><i class="las la-headset"></i></span>
                        <div class="dir-contact-info">
                            <div class="label">Zoom Ext.</div>
                            <span class="value">103</span>
                        </div>
                    </div>
                    {{-- Correo principal --}}
                    <div class="dir-contact-row">
                        <span class="ic"><i class="las la-envelope"></i></span>
                        <div class="dir-contact-info">
                            <div class="label">Correo</div>
                            <a class="value" href="mailto:anakaren.gonzales@netjernetworks.com"
                                title="anakaren.gonzales@netjernetworks.com">
                                anakaren.gonzales@netjernetworks.com
                            </a>
                        </div>
                    </div>
                    {{-- Correo secundario --}}
                    <div class="dir-contact-row">
                        <span class="ic"><i class="las la-envelope-open"></i></span>
                        <div class="dir-contact-info">
                            <div class="label">Correo alterno</div>
                            <a class="value" href="mailto:anakaren.gonzalez@rexten.io"
                                title="anakaren.gonzalez@rexten.io">
                                anakaren.gonzalez@rexten.io
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            {{-- CARD de Colaborador --}}
            <div class="dir-card" data-search="arturo hernandez Training 145 arturo.hernandez@netjernetworks.com">
                <div class="dir-card-photo">
                    <img src="{{ asset('storage/media/male.png') }}" alt="Arturo Hernández">
                    <span class="status-dot" title="Activo"></span>
                </div>
                <h3 class="dir-card-name">Arturo Hernández</h3>
                <span class="dir-card-role">Training</span>
                <div class="dir-contact">
                    {{-- Extensión Zoom --}}
                    <div class="dir-contact-row">
                        <span class="ic"><i class="las la-headset"></i></span>
                        <div class="dir-contact-info">
                            <div class="label">Zoom Ext.</div>
                            <span class="value">145</span>
                        </div>
                    </div>
                    {{-- Correo principal --}}
                    <div class="dir-contact-row">
                        <span class="ic"><i class="las la-envelope"></i></span>
                        <div class="dir-contact-info">
                            <div class="label">Correo</div>
                            <a class="value" href="mailto:arturo.hernandez@netjernetworks.com"
                                title="arturo.hernandez@netjernetworks.com">
                                arturo.hernandez@netjernetworks.com
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            {{-- CARD de Colaborador --}}
            <div class="dir-card" data-search="carlos junco director comercial 102 carlos.junco@netjernetworks.com">
                <div class="dir-card-photo">
                    <img src="{{ asset('storage/media/male.png') }}" alt="Carlos Junco">
                    <span class="status-dot" title="Activo"></span>
                </div>
                <h3 class="dir-card-name">Carlos Junco</h3>
                <span class="dir-card-role">Director Comercial</span>
                <div class="dir-contact">
                    {{-- Extensión Zoom --}}
                    <div class="dir-contact-row">
                        <span class="ic"><i class="las la-headset"></i></span>
                        <div class="dir-contact-info">
                            <div class="label">Zoom Ext.</div>
                            <span class="value">102</span>
                        </div>
                    </div>
                    {{-- Correo principal --}}
                    <div class="dir-contact-row">
                        <span class="ic"><i class="las la-envelope"></i></span>
                        <div class="dir-contact-info">
                            <div class="label">Correo</div>
                            <a class="value" href="mailto:carlos.junco@netjernetworks.com"
                                title="carlos.junco@netjernetworks.com">
                                carlos.junco@netjernetworks.com
                            </a>
                        </div>
                    </div>
                    {{-- Correo secundario opcional (eliminar si no aplica) --}}
                    <div class="dir-contact-row">
                        <span class="ic"><i class="las la-envelope-open"></i></span>
                        <div class="dir-contact-info">
                            <div class="label">Correo alterno</div>
                            <a class="value" href="mailto:carlos.junco@rexten.io" title="carlos.junco@rexten.io">
                                carlos.junco@rexten.io
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            {{-- CARD de Colaborador --}}
            <div class="dir-card" data-search="daniel dolorzano ingeniero senior 148 daniel.solorzano@netjernetworks.com">
                <div class="dir-card-photo">
                    <img src="{{ asset('storage/media/male.png') }}" alt="Daniel Solorzano">
                    <span class="status-dot" title="Activo"></span>
                </div>
                <h3 class="dir-card-name">Daniel Solorzano</h3>
                <span class="dir-card-role">Ingeniero Senior</span>
                <div class="dir-contact">
                    {{-- Extensión Zoom --}}
                    <div class="dir-contact-row">
                        <span class="ic"><i class="las la-headset"></i></span>
                        <div class="dir-contact-info">
                            <div class="label">Zoom Ext.</div>
                            <span class="value">148</span>
                        </div>
                    </div>
                    {{-- Correo principal --}}
                    <div class="dir-contact-row">
                        <span class="ic"><i class="las la-envelope"></i></span>
                        <div class="dir-contact-info">
                            <div class="label">Correo</div>
                            <a class="value" href="mailto:daniel.solorzano@netjernetworks.com"
                                title="daniel.solorzano@netjernetworks.com">
                                daniel.solorzano@netjernetworks.com
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            {{-- CARD de Colaborador --}}
            <div class="dir-card" data-search="emiliano garcia sales develpment 207 emiliano.garcia@netjernetworks.com">
                <div class="dir-card-photo">
                    <img src="{{ asset('storage/media/male.png') }}" alt="Emiliano Garcia">
                    <span class="status-dot" title="Activo"></span>
                </div>
                <h3 class="dir-card-name">Emiliano Garcia</h3>
                <span class="dir-card-role">Sales Development Rep. Senior</span>
                <div class="dir-contact">
                    {{-- Extensión Zoom --}}
                    <div class="dir-contact-row">
                        <span class="ic"><i class="las la-headset"></i></span>
                        <div class="dir-contact-info">
                            <div class="label">Zoom Ext.</div>
                            <span class="value">207</span>
                        </div>
                    </div>
                    {{-- Correo principal --}}
                    <div class="dir-contact-row">
                        <span class="ic"><i class="las la-envelope"></i></span>
                        <div class="dir-contact-info">
                            <div class="label">Correo</div>
                            <a class="value" href="mailto:emiliano.garcia@netjernetworks.com"
                                title="emiliano.garcia@netjernetworks.com">
                                emiliano.garcia@netjernetworks.com
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            {{-- CARD de Colaborador --}}
            <div class="dir-card"
                data-search="fernando arzaluz director ingeniero 113 fernando.arzaluz@netjernetworks.com">
                <div class="dir-card-photo">
                    <img src="{{ asset('storage/media/male.png') }}" alt="Fernando Arzaluz">
                    <span class="status-dot" title="Activo"></span>
                </div>
                <h3 class="dir-card-name">Fernando Arzaluz</h3>
                <span class="dir-card-role">Director Ingenieria</span>
                <div class="dir-contact">
                    {{-- Extensión Zoom --}}
                    <div class="dir-contact-row">
                        <span class="ic"><i class="las la-headset"></i></span>
                        <div class="dir-contact-info">
                            <div class="label">Zoom Ext.</div>
                            <span class="value">105</span>
                        </div>
                    </div>
                    {{-- Correo principal --}}
                    <div class="dir-contact-row">
                        <span class="ic"><i class="las la-envelope"></i></span>
                        <div class="dir-contact-info">
                            <div class="label">Correo</div>
                            <a class="value" href="mailto:fernando.arzaluz@netjernetworks.com"
                                title="fernando.arzaluz@netjernetworks.com">
                                fernando.arzaluz@netjernetworks.com
                            </a>
                        </div>
                    </div>
                    <div class="dir-contact-row">
                        <span class="ic"><i class="las la-envelope-open"></i></span>
                        <div class="dir-contact-info">
                            <div class="label">Correo alterno</div>
                            <a class="value" href="mailto:fernando.arzaluz@rexten.io"
                                title="fernando.arzaluz@rexten.io">
                                fernando.arzaluz@rexten.io
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            {{-- CARD de Colaborador --}}
            <div class="dir-card" data-search="francisco mass delivery 203 francisco.maass@netjernetworks.com">
                <div class="dir-card-photo">
                    <img src="{{ asset('storage/media/male.png') }}" alt="Francisco Mass">
                    <span class="status-dot" title="Activo"></span>
                </div>
                <h3 class="dir-card-name">Francisco Mass</h3>
                <span class="dir-card-role">Service Delivery Manager</span>
                <div class="dir-contact">
                    {{-- Extensión Zoom --}}
                    <div class="dir-contact-row">
                        <span class="ic"><i class="las la-headset"></i></span>
                        <div class="dir-contact-info">
                            <div class="label">Zoom Ext.</div>
                            <span class="value">203</span>
                        </div>
                    </div>
                    {{-- Correo principal --}}
                    <div class="dir-contact-row">
                        <span class="ic"><i class="las la-envelope"></i></span>
                        <div class="dir-contact-info">
                            <div class="label">Correo</div>
                            <a class="value" href="mailto:francisco.maass@netjernetworks.com"
                                title="francisco.maass@netjernetworks.com">
                                francisco.maass@netjernetworks.com
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            {{-- CARD de Colaborador --}}
            <div class="dir-card" data-search="gabriel vazquez ingeniero senior 122 gabriel.vazquez@netjernetworks.com">
                <div class="dir-card-photo">
                    <img src="{{ asset('storage/media/male.png') }}" alt="Gabriel Vazquez">
                    <span class="status-dot" title="Activo"></span>
                </div>
                <h3 class="dir-card-name">Gabriel Vazquez</h3>
                <span class="dir-card-role">Ingeniero Senior</span>
                <div class="dir-contact">
                    {{-- Extensión Zoom --}}
                    <div class="dir-contact-row">
                        <span class="ic"><i class="las la-headset"></i></span>
                        <div class="dir-contact-info">
                            <div class="label">Zoom Ext.</div>
                            <span class="value">122</span>
                        </div>
                    </div>
                    {{-- Correo principal --}}
                    <div class="dir-contact-row">
                        <span class="ic"><i class="las la-envelope"></i></span>
                        <div class="dir-contact-info">
                            <div class="label">Correo</div>
                            <a class="value" href="mailto:gabriel.vazquez@netjernetworks.com"
                                title="gabriel.vazquez@netjernetworks.com">
                                gabriel.vazquez@netjernetworks.com
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            {{-- CARD de Colaborador --}}
            <div class="dir-card" data-search="gabriela cejudo project manager 155 gabriela.cejudo@netjernetworks.com">
                <div class="dir-card-photo">
                    <img src="{{ asset('storage/media/female.png') }}" alt="Gabriela Cejudo">
                    <span class="status-dot" title="Activo"></span>
                </div>
                <h3 class="dir-card-name">Gabriela Cejudo</h3>
                <span class="dir-card-role">Project Manager</span>
                <div class="dir-contact">
                    {{-- Extensión Zoom --}}
                    <div class="dir-contact-row">
                        <span class="ic"><i class="las la-headset"></i></span>
                        <div class="dir-contact-info">
                            <div class="label">Zoom Ext.</div>
                            <span class="value">155</span>
                        </div>
                    </div>
                    {{-- Correo principal --}}
                    <div class="dir-contact-row">
                        <span class="ic"><i class="las la-envelope"></i></span>
                        <div class="dir-contact-info">
                            <div class="label">Correo</div>
                            <a class="value" href="mailto:gabriela.cejudo@netjernetworks.com"
                                title="gabriela.cejudo@netjernetworks.com">
                                gabriela.cejudo@netjernetworks.com
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            {{-- CARD de Colaborador --}}
            <div class="dir-card"
                data-search="giselle martinez directora administración finanzas 101 giselle.mel@netjernetworks.com">
                <div class="dir-card-photo">
                    <img src="{{ asset('storage/media/female.png') }}" alt="Giselle Martinez">
                    <span class="status-dot" title="Activo"></span>
                </div>
                <h3 class="dir-card-name">Giselle Martinez</h3>
                <span class="dir-card-role">Directora de Administración y Finanzas</span>
                <div class="dir-contact">
                    {{-- Extensión Zoom --}}
                    <div class="dir-contact-row">
                        <span class="ic"><i class="las la-headset"></i></span>
                        <div class="dir-contact-info">
                            <div class="label">Zoom Ext.</div>
                            <span class="value">101</span>
                        </div>
                    </div>
                    {{-- Correo principal --}}
                    <div class="dir-contact-row">
                        <span class="ic"><i class="las la-envelope"></i></span>
                        <div class="dir-contact-info">
                            <div class="label">Correo</div>
                            <a class="value" href="mailto:giselle.mel@netjernetworks.com"
                                title="giselle.mel@netjernetworks.com">
                                giselle.mel@netjernetworks.com
                            </a>
                        </div>
                    </div>
                    <div class="dir-contact-row">
                        <span class="ic"><i class="las la-envelope-open"></i></span>
                        <div class="dir-contact-info">
                            <div class="label">Correo alterno</div>
                            <a class="value" href="mailto:giselle.mel@rexten.io" title="alberto.ramirez@rexten.io">
                                giselle.mel@rexten.io
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            {{-- CARD de Colaborador --}}
            <div class="dir-card" data-search="jocelyn jrreola Mmrketing 208 jocelyn.jasso@netjernetworks.com">
                <div class="dir-card-photo">
                    <img src="{{ asset('storage/media/female.png') }}" alt="Jocelyn Sarah Jasso Arreola">
                    <span class="status-dot" title="Activo"></span>
                </div>
                <h3 class="dir-card-name">Jocelyn Sarah Jasso Arreola</h3>
                <span class="dir-card-role">Marketing</span>
                <div class="dir-contact">
                    {{-- Extensión Zoom --}}
                    <div class="dir-contact-row">
                        <span class="ic"><i class="las la-headset"></i></span>
                        <div class="dir-contact-info">
                            <div class="label">Zoom Ext.</div>
                            <span class="value">208</span>
                        </div>
                    </div>
                    {{-- Correo principal --}}
                    <div class="dir-contact-row">
                        <span class="ic"><i class="las la-envelope"></i></span>
                        <div class="dir-contact-info">
                            <div class="label">Correo</div>
                            <a class="value" href="mailto:jocelyn.jasso@netjernetworks.com"
                                title="jocelyn.jasso@netjernetworks.com">
                                jocelyn.jasso@netjernetworks.com
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            {{-- CARD de Colaborador --}}
            <div class="dir-card" data-search="jose torres csultor oddoo service 106 jose.torres@netjernetworks.com">
                <div class="dir-card-photo">
                    <img src="{{ asset('storage/media/male.png') }}" alt="José Torres">
                    <span class="status-dot" title="Activo"></span>
                </div>
                <h3 class="dir-card-name">José Torres</h3>
                <span class="dir-card-role">Consultor ODOO / Service Manager</span>
                <div class="dir-contact">
                    {{-- Extensión Zoom --}}
                    <div class="dir-contact-row">
                        <span class="ic"><i class="las la-headset"></i></span>
                        <div class="dir-contact-info">
                            <div class="label">Zoom Ext.</div>
                            <span class="value">106</span>
                        </div>
                    </div>
                    {{-- Correo principal --}}
                    <div class="dir-contact-row">
                        <span class="ic"><i class="las la-envelope"></i></span>
                        <div class="dir-contact-info">
                            <div class="label">Correo</div>
                            <a class="value" href="mailto:jose.torres@netjernetworks.com"
                                title="jose.torres@netjernetworks.com">
                                jose.torres@netjernetworks.com
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            {{-- CARD de Colaborador --}}
            <div class="dir-card" data-search="marco antonio ortiz sales development 205 marco.ortiz@netjernetworks.com">
                <div class="dir-card-photo">
                    <img src="{{ asset('storage/media/male.png') }}" alt="Marco Antonio Ortiz">
                    <span class="status-dot" title="Activo"></span>
                </div>
                <h3 class="dir-card-name">Marco Antonio Ortiz</h3>
                <span class="dir-card-role">Sales Development Rep.</span>
                <div class="dir-contact">
                    {{-- Extensión Zoom --}}
                    <div class="dir-contact-row">
                        <span class="ic"><i class="las la-headset"></i></span>
                        <div class="dir-contact-info">
                            <div class="label">Zoom Ext.</div>
                            <span class="value">205</span>
                        </div>
                    </div>
                    {{-- Correo principal --}}
                    <div class="dir-contact-row">
                        <span class="ic"><i class="las la-envelope"></i></span>
                        <div class="dir-contact-info">
                            <div class="label">Correo</div>
                            <a class="value" href="mailto:marco.ortiz@netjernetworks.com"
                                title="marco.ortiz@netjernetworks.com">
                                marco.ortiz@netjernetworks.com
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            {{-- CARD de Colaborador --}}
            <div class="dir-card"
                data-search="miguel angel ortiz analista datos observabilidad 204 miguel.ortiz@netjernetworks.com">
                <div class="dir-card-photo">
                    <img src="{{ asset('storage/media/male.png') }}" alt="Miguel Angel Ortiz">
                    <span class="status-dot" title="Activo"></span>
                </div>
                <h3 class="dir-card-name">Miguel Angel Ortiz</h3>
                <span class="dir-card-role">Analista de Datos y Observabilidad</span>
                <div class="dir-contact">
                    {{-- Extensión Zoom --}}
                    <div class="dir-contact-row">
                        <span class="ic"><i class="las la-headset"></i></span>
                        <div class="dir-contact-info">
                            <div class="label">Zoom Ext.</div>
                            <span class="value">204</span>
                        </div>
                    </div>
                    {{-- Correo principal --}}
                    <div class="dir-contact-row">
                        <span class="ic"><i class="las la-envelope"></i></span>
                        <div class="dir-contact-info">
                            <div class="label">Correo</div>
                            <a class="value" href="mailto:miguel.ortiz@netjernetworks.com"
                                title="miguel.ortiz@netjernetworks.com">
                                miguel.ortiz@netjernetworks.com
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            {{-- CARD de Colaborador --}}
            <div class="dir-card" data-search="rogelio marín 143 rogelio.marin@netjernetworks.com">
                <div class="dir-card-photo">
                    <img src="{{ asset('storage/media/male.png') }}" alt="Rogelio Marín">
                    <span class="status-dot" title="Activo"></span>
                </div>
                <h3 class="dir-card-name">Rogelio Marín</h3>
                <span class="dir-card-role">CINO</span>
                <div class="dir-contact">
                    {{-- Extensión Zoom --}}
                    <div class="dir-contact-row">
                        <span class="ic"><i class="las la-headset"></i></span>
                        <div class="dir-contact-info">
                            <div class="label">Zoom Ext.</div>
                            <span class="value">143</span>
                        </div>
                    </div>
                    {{-- Correo principal --}}
                    <div class="dir-contact-row">
                        <span class="ic"><i class="las la-envelope"></i></span>
                        <div class="dir-contact-info">
                            <div class="label">Correo</div>
                            <a class="value" href="mailto:rogelio.marin@netjernetworks.com"
                                title="rogelio.marin@netjernetworks.com">
                                rogelio.marin@netjernetworks.com
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            {{-- CARD de Colaborador --}}
            <div class="dir-card" data-search="samuel trejo service delivery devops 118 samuel.trejo@netjernetworks.com">
                <div class="dir-card-photo">
                    <img src="{{ asset('storage/media/male.png') }}" alt="Samuel Trejo">
                    <span class="status-dot" title="Activo"></span>
                </div>
                <h3 class="dir-card-name">Samuel Trejo</h3>
                <span class="dir-card-role">Dirección Service Delivery, PM., DevOps</span>
                <div class="dir-contact">
                    {{-- Extensión Zoom --}}
                    <div class="dir-contact-row">
                        <span class="ic"><i class="las la-headset"></i></span>
                        <div class="dir-contact-info">
                            <div class="label">Zoom Ext.</div>
                            <span class="value">118</span>
                        </div>
                    </div>
                    {{-- Correo principal --}}
                    <div class="dir-contact-row">
                        <span class="ic"><i class="las la-envelope"></i></span>
                        <div class="dir-contact-info">
                            <div class="label">Correo</div>
                            <a class="value" href="mailto:samuel.trejo@netjernetworks.com"
                                title="samuel.trejo@netjernetworks.com">
                                samuel.trejo@netjernetworks.com
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            {{-- CARD de Colaborador --}}
            <div class="dir-card" data-search="viridiana crespo inside sites 109 viridiana.crespo@netjernetworks.com">
                <div class="dir-card-photo">
                    <img src="{{ asset('storage/media/female.png') }}" alt="Viridiana Crespo">
                    <span class="status-dot" title="Activo"></span>
                </div>
                <h3 class="dir-card-name">Viridiana Crespo</h3>
                <span class="dir-card-role">Inside Sites</span>
                <div class="dir-contact">
                    {{-- Extensión Zoom --}}
                    <div class="dir-contact-row">
                        <span class="ic"><i class="las la-headset"></i></span>
                        <div class="dir-contact-info">
                            <div class="label">Zoom Ext.</div>
                            <span class="value">109</span>
                        </div>
                    </div>
                    {{-- Correo principal --}}
                    <div class="dir-contact-row">
                        <span class="ic"><i class="las la-envelope"></i></span>
                        <div class="dir-contact-info">
                            <div class="label">Correo</div>
                            <a class="value" href="mailto:viridiana.crespo@netjernetworks.com"
                                title="viridiana.crespo@netjernetworks.com">
                                viridiana.crespo@netjernetworks.com
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            {{-- CARD de Colaborador --}}
            <div class="dir-card" data-search="xavier martinez director ceo 107 xavier.martinez@netjernetworks.com">
                <div class="dir-card-photo">
                    <img src="{{ asset('storage/media/male.png') }}" alt="Xavier Martinez">
                    <span class="status-dot" title="Activo"></span>
                </div>
                <h3 class="dir-card-name">Xavier Martinez</h3>
                <span class="dir-card-role">Director General - CEO</span>
                <div class="dir-contact">
                    {{-- Extensión Zoom --}}
                    <div class="dir-contact-row">
                        <span class="ic"><i class="las la-headset"></i></span>
                        <div class="dir-contact-info">
                            <div class="label">Zoom Ext.</div>
                            <span class="value">107</span>
                        </div>
                    </div>
                    {{-- Correo principal --}}
                    <div class="dir-contact-row">
                        <span class="ic"><i class="las la-envelope"></i></span>
                        <div class="dir-contact-info">
                            <div class="label">Correo</div>
                            <a class="value" href="mailto:xavier.martinez@netjernetworks.com"
                                title="xavier.martinez@netjernetworks.com">
                                xavier.martinez@netjernetworks.com
                            </a>
                        </div>
                    </div>
                    <div class="dir-contact-row">
                        <span class="ic"><i class="las la-envelope-open"></i></span>
                        <div class="dir-contact-info">
                            <div class="label">Correo alterno</div>
                            <a class="value" href="mailto:xavier.martinez@rexten.io" title="xavier.martinez@rexten.io">
                                xavier.martinez@rexten.io
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            {{-- CARD de Colaborador --}}
            <div class="dir-card"
                data-search="yanni camargo ingeniero software datos 119 yanni.camargo@netjernetworks.com">
                <div class="dir-card-photo">
                    <img src="{{ asset('storage/media/male.png') }}" alt="Yanni Germain Camargo Vera">
                    <span class="status-dot" title="Activo"></span>
                </div>
                <h3 class="dir-card-name">Yanni Germain Camargo Vera</h3>
                <span class="dir-card-role">Ingeniero de Software y Datos</span>
                <div class="dir-contact">
                    {{-- Extensión Zoom --}}
                    <div class="dir-contact-row">
                        <span class="ic"><i class="las la-headset"></i></span>
                        <div class="dir-contact-info">
                            <div class="label">Zoom Ext.</div>
                            <span class="value">119</span>
                        </div>
                    </div>
                    {{-- Correo principal --}}
                    <div class="dir-contact-row">
                        <span class="ic"><i class="las la-envelope"></i></span>
                        <div class="dir-contact-info">
                            <div class="label">Correo</div>
                            <a class="value" href="mailto:yanni.camargo@netjernetworks.com"
                                title="yanni.camargo@netjernetworks.com">
                                yanni.camargo@netjernetworks.com
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Empty state (no tocar) --}}
            <div class="dir-empty" id="dirEmpty">
                <div class="ic"><i class="las la-search-minus"></i></div>
                <p class="font-extrabold text-gray-800 mb-1">No se encontraron colaboradores</p>
                <p class="text-sm">Intenta con otro nombre, extensión, puesto o correo.</p>
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script>
        // Buscador en vivo del directorio
        (function() {
            const input = document.getElementById('dirSearchInput');
            const wrap = document.getElementById('dirSearchWrap');
            const clearBtn = document.getElementById('dirClearBtn');
            const cards = document.querySelectorAll('#dirGrid .dir-card');
            const empty = document.getElementById('dirEmpty');
            const counter = document.getElementById('dirCount');

            function normalize(s) {
                return (s || '').toLowerCase()
                    .normalize('NFD').replace(/[̀-ͯ]/g, '');
            }

            function applyFilter() {
                const q = normalize(input.value.trim());
                let visible = 0;
                cards.forEach(card => {
                    const haystack = normalize(
                        (card.dataset.search || '') + ' ' +
                        (card.querySelector('.dir-card-name')?.textContent || '') + ' ' +
                        (card.querySelector('.dir-card-role')?.textContent || '')
                    );
                    if (q === '' || haystack.includes(q)) {
                        card.style.display = '';
                        visible++;
                    } else {
                        card.style.display = 'none';
                    }
                });
                if (counter) counter.textContent = visible;
                if (empty) empty.classList.toggle('show', visible === 0);
                wrap.classList.toggle('has-value', input.value.length > 0);
            }

            // Inicial: contar tarjetas visibles
            if (counter) counter.textContent = cards.length;

            input.addEventListener('input', applyFilter);
            clearBtn.addEventListener('click', () => {
                input.value = '';
                applyFilter();
                input.focus();
            });
        })();
    </script>
@endpush
