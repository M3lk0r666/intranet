@extends('layouts.intranet')

@section('title', 'Organigrama')

@push('css')
    <link href="/assets/css/organigrama.css" rel="stylesheet">
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
                    <li aria-current="page">
                        <div class="flex items-center">
                            <i class="fas fa-chevron-right text-gray-400 mx-2 text-xs"></i>
                            <span class="ml-1 text-sm text-orange-600 font-semibold md:ml-2">Organigrama</span>
                        </div>
                    </li>
                </ol>
            </nav>
        </div>
    </div>

    <div class="container mx-auto px-4 py-8">

        {{-- ============================================
             HERO
             ============================================ --}}
        <section class="org-hero p-6 md:p-9 mb-8 org-anim-up">
            <div class="flex flex-col md:flex-row md:items-center gap-6">
                <div class="org-hero-icon">
                    <i class="las la-sitemap"></i>
                </div>
                <div class="flex-1">
                    <div class="flex items-center gap-2 text-xs font-bold text-orange-600 uppercase tracking-widest mb-2">
                        <i class="las la-network-wired"></i>
                        <span>Estructura Corporativa</span>
                    </div>
                    <h1 class="text-3xl md:text-4xl font-extrabold text-gray-900 tracking-tight leading-tight">
                        Estructura Organizacional
                    </h1>
                    <p class="text-gray-600 mt-2 text-base md:text-lg">
                        Organigrama interactivo de Netjer Networks. Haz clic en cada tarjeta para explorar áreas y perfiles.
                    </p>
                </div>
            </div>

            {{-- Leyenda --}}
            <div class="flex flex-wrap gap-2 mt-6">
                <span class="org-legend-pill"><span class="dot" style="background:#f97316"></span> CEO</span>
                <span class="org-legend-pill"><span class="dot" style="background:#3b82f6"></span> Dirección Comercial /
                    IT</span>
                <span class="org-legend-pill"><span class="dot" style="background:#10b981"></span> Finanzas y
                    Administración</span>
                <span class="org-legend-pill"><span class="dot" style="background:#ec4899"></span> Marketing</span>
                <span class="org-legend-pill"><span class="dot" style="background:#94a3b8"></span> En definición</span>
            </div>
        </section>

        {{-- ============================================
             ORGANIGRAMA INTERACTIVO
             ============================================ --}}
        <section class="bg-white border border-gray-100 rounded-3xl shadow-sm p-6 md:p-10 mb-10 org-anim-up">

            {{-- CEO --}}
            <div class="flex flex-col items-center">
                <div class="org-ceo"
                    onclick='openProfile({
                        name: "Xavier Martínez",
                        role: "CEO",
                        area: "Dirección General",
                        email: "xavier@netjernetworks.com",
                        photo: "{{ asset('storage/media/male.png') }}",
                        extra: "Liderazgo ejecutivo de la organización"
                     })'
                    style="cursor: pointer;">
                    <div class="photo-ring">
                        <img src="{{ asset('storage/media/male.png') }}" alt="CEO">
                    </div>
                    <span class="badge-role"><i class="las la-crown"></i> CEO</span>
                    <h3 class="font-extrabold text-xl tracking-tight">Xavier Martínez</h3>
                    <p class="text-sm opacity-95 mt-0.5">Dirección General</p>
                </div>

                <div class="org-connector-vertical large"></div>

                {{-- Línea horizontal hacia directores (decorativa) --}}
                <div class="hidden md:block w-3/4 max-w-3xl h-[3px] bg-slate-200 rounded-full mb-4 -mt-1"></div>

                {{-- DIRECTORES --}}
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 w-full max-w-6xl">

                    {{-- ============ DIRECTOR 1 ============ --}}
                    <div class="flex flex-col items-center"
                        style="--dir-color:#3b82f6; --dir-bg:#dbeafe; --dir-border:#bfdbfe;">
                        <div class="org-director" id="dir-card-1" onclick="toggleDirector(1)">
                            <img src="{{ asset('storage/media/male.png') }}" class="org-director-photo" alt="Rogelio Marín">
                            <div class="org-director-name">Rogelio Marín</div>
                            <div class="org-director-role">CEO Adjunto</div>
                            <div class="org-director-toggle">
                                Ver áreas <i class="las la-angle-down chev"></i>
                            </div>
                        </div>

                        <div class="org-collapsible" id="dir-content-1">
                            <div class="org-connector-vertical small mx-auto"></div>

                            <div class="org-area-wrap mx-auto space-y-4">
                                {{-- Área 1 --}}
                                <div>
                                    <button type="button" class="org-area-button" onclick="toggleArea('area-1-1', this)">
                                        <i class="las la-pencil-ruler"></i> Service Design
                                        <i class="las la-angle-down chev ml-auto"></i>
                                    </button>
                                    <div class="org-collapsible mt-3" id="area-1-1">
                                        <div class="org-subareas">
                                            <div class="org-tree-item"
                                                onclick='openProfile({
                                                    name: "Carlos Junco",
                                                    role: "UX Lead",
                                                    area: "Service Design",
                                                    email: "carlos.junco@netjernetworks.com",
                                                    photo: "{{ asset('storage/media/male.png') }}"
                                                 })'>
                                                <img src="{{ asset('storage/media/male.png') }}" alt="UX">
                                                <p>UX</p>
                                                <span>Carlos Junco</span>
                                            </div>
                                            <div class="org-tree-item">
                                                <p>Preventa</p>
                                                <span>Equipo Técnico</span>
                                            </div>
                                            <div class="org-tree-item">
                                                <p>Arquitectura</p>
                                                <span>Infraestructura</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                {{-- Área 2 --}}
                                <div>
                                    <button type="button" class="org-area-button" onclick="toggleArea('area-1-2', this)">
                                        <i class="las la-cogs"></i> Solution Development
                                        <i class="las la-angle-down chev ml-auto"></i>
                                    </button>
                                    <div class="org-collapsible mt-3" id="area-1-2">
                                        <div class="org-subareas">
                                            <div class="org-tree-item">
                                                <p>Fabricantes</p>
                                                <span>Alianzas</span>
                                            </div>
                                            <div class="org-tree-item">
                                                <p>Gobierno</p>
                                                <span>Sector público</span>
                                            </div>
                                            <div class="org-tree-item">
                                                <p>Educación</p>
                                                <span>Sector educativo</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- ============ DIRECTOR 2 ============ --}}
                    <div class="flex flex-col items-center"
                        style="--dir-color:#10b981; --dir-bg:#dcfce7; --dir-border:#bbf7d0;">
                        <div class="org-director" id="dir-card-2" onclick="toggleDirector(2)">
                            <img src="{{ asset('storage/media/female.png') }}" class="org-director-photo"
                                alt="Giselle Martínez">
                            <div class="org-director-name">Giselle Martínez</div>
                            <div class="org-director-role">Finanzas &amp; Admin.</div>
                            <div class="org-director-toggle">
                                Ver áreas <i class="las la-angle-down chev"></i>
                            </div>
                        </div>

                        <div class="org-collapsible" id="dir-content-2">
                            <div class="org-connector-vertical small mx-auto"></div>

                            <div class="org-area-wrap mx-auto space-y-4">
                                <div>
                                    <button type="button" class="org-area-button"
                                        onclick="toggleArea('area-2-1', this)">
                                        <i class="las la-users-cog"></i> Administración
                                        <i class="las la-angle-down chev ml-auto"></i>
                                    </button>
                                    <div class="org-collapsible mt-3" id="area-2-1">
                                        <div class="org-subareas">
                                            <div class="org-tree-item">
                                                <p>Reclutamiento</p><span>RH</span>
                                            </div>
                                            <div class="org-tree-item">
                                                <p>Nómina</p><span>RH</span>
                                            </div>
                                            <div class="org-tree-item">
                                                <p>Capacitación</p><span>RH</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div>
                                    <button type="button" class="org-area-button"
                                        onclick="toggleArea('area-2-2', this)">
                                        <i class="las la-coins"></i> Finanzas
                                        <i class="las la-angle-down chev ml-auto"></i>
                                    </button>
                                    <div class="org-collapsible mt-3" id="area-2-2">
                                        <div class="org-subareas">
                                            <div class="org-tree-item">
                                                <p>Contabilidad</p><span>Finanzas</span>
                                            </div>
                                            <div class="org-tree-item">
                                                <p>Tesorería</p><span>Finanzas</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- ============ DIRECTOR 3 — Marketing (placeholder) ============ --}}
                    <div class="flex flex-col items-center"
                        style="--dir-color:#ec4899; --dir-bg:#fdf2f8; --dir-border:#fbcfe8;">
                        <div class="org-director empty">
                            <div class="org-director-empty-icon">
                                <i class="las la-bullhorn"></i>
                            </div>
                            <div class="org-director-name">Marketing</div>
                            <div class="org-director-role" style="color:#ec4899;">Por asignar</div>
                            <div class="org-director-toggle" style="background:#fdf2f8; color:#ec4899;">
                                <i class="las la-clock"></i> En definición
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        {{-- ============================================
             AVISO "EN DESARROLLO"
             ============================================ --}}
        <section class="max-w-2xl mx-auto org-anim-up">
            <div class="org-wip-card">
                <div class="org-wip-photo">
                    <img src="{{ asset('assets/media/trabajando-enello.png') }}" class="w-full h-full object-cover"
                        alt="Trabajando en ello">
                </div>

                <h2 class="text-xl md:text-2xl font-extrabold text-gray-900 mb-2 tracking-tight">
                    Estamos trabajando en esta sección
                </h2>

                <p class="text-gray-600 leading-relaxed mb-2">
                    La vista de <strong class="text-gray-800">Organigrama</strong> aún está en desarrollo.
                    Actualmente se están realizando cambios dentro de la organización, por lo que la estructura
                    de la empresa se encuentra en actualización.
                </p>
                <p class="text-gray-500 text-sm mb-6">
                    Muy pronto estará disponible con la información completa y actualizada.
                </p>

                <div class="org-wip-badge">
                    <span class="pulse"></span>
                    <i class="las la-clock"></i>
                    En proceso
                </div>
            </div>
        </section>
    </div>

    {{-- ============================================
         MODAL de perfil — display:none inline para evitar choques
         ============================================ --}}
    <div id="profileModal" class="org-modal-overlay" style="display:none;">
        <div class="org-modal-card">
            <button class="org-modal-close" onclick="closeProfileModal()" aria-label="Cerrar">
                <i class="las la-times"></i>
            </button>

            <img id="modal-photo" class="org-modal-photo" src="" alt="">
            <h3 id="modal-name" class="org-modal-name"></h3>
            <p id="modal-role" class="org-modal-role"></p>
            <div class="text-center">
                <span id="modal-area" class="org-modal-area"></span>
            </div>

            <div class="org-modal-divider"></div>

            <div id="modal-email-row" class="org-modal-info-row">
                <span class="ic"><i class="las la-envelope"></i></span>
                <span id="modal-email"></span>
            </div>
            <div id="modal-extra-row" class="org-modal-info-row">
                <span class="ic"><i class="las la-info-circle"></i></span>
                <span id="modal-extra"></span>
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script>
        // Toggle director (cierra los demás para mantener el organigrama ordenado)
        function toggleDirector(num) {
            const content = document.getElementById('dir-content-' + num);
            const card = document.getElementById('dir-card-' + num);
            if (!content || !card) return;
            const isOpen = content.classList.contains('open');

            // Si quieres permitir varios abiertos a la vez, comenta este bloque:
            document.querySelectorAll('.org-director').forEach(c => c.classList.remove('active'));
            document.querySelectorAll('[id^="dir-content-"]').forEach(c => c.classList.remove('open'));
            // Cierra también las áreas internas al cambiar de director
            document.querySelectorAll('[id^="area-"]').forEach(a => a.classList.remove('open'));
            document.querySelectorAll('.org-area-button').forEach(b => b.classList.remove('active'));

            if (!isOpen) {
                content.classList.add('open');
                card.classList.add('active');
            }
        }

        // Toggle área dentro de un director
        function toggleArea(id, btn) {
            const el = document.getElementById(id);
            if (!el) return;
            const isOpen = el.classList.contains('open');
            if (isOpen) {
                el.classList.remove('open');
                if (btn) btn.classList.remove('active');
            } else {
                el.classList.add('open');
                if (btn) btn.classList.add('active');
            }
        }

        // Modal — usa style.display directo (a prueba de clases globales)
        function openProfile(data) {
            document.getElementById('modal-photo').src = data.photo || '';
            document.getElementById('modal-name').innerText = data.name || '';
            document.getElementById('modal-role').innerText = data.role || '';
            document.getElementById('modal-area').innerText = data.area || '';

            const emailRow = document.getElementById('modal-email-row');
            const extraRow = document.getElementById('modal-extra-row');
            if (data.email) {
                document.getElementById('modal-email').innerText = data.email;
                emailRow.style.display = 'flex';
            } else {
                emailRow.style.display = 'none';
            }
            if (data.extra) {
                document.getElementById('modal-extra').innerText = data.extra;
                extraRow.style.display = 'flex';
            } else {
                extraRow.style.display = 'none';
            }

            const modal = document.getElementById('profileModal');
            modal.style.display = 'flex';
            document.body.style.overflow = 'hidden';
        }

        function closeProfileModal() {
            const modal = document.getElementById('profileModal');
            modal.style.display = 'none';
            document.body.style.overflow = '';
        }

        // Cerrar al hacer clic fuera del card
        document.getElementById('profileModal').addEventListener('click', function(e) {
            if (e.target === this) closeProfileModal();
        });

        // Cerrar con tecla ESC
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') closeProfileModal();
        });
    </script>
@endpush
