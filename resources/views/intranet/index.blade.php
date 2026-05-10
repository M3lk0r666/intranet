@extends('layouts.intranet')

@section('title', 'Intranet Corporativa')

@push('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet"
        href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <link href="/assets/css/intracasa.css" rel="stylesheet">
@endpush

@section('content')
    <div class="container mx-auto px-4">
        {{-- ============================================
             HERO PREMIUM con bienvenida personalizada
             ============================================ --}}
        <section class="hero-premium p-6 md:p-12 mt-6 mb-10 anim-up">
            <div class="orb orb-1"></div>
            <div class="orb orb-2"></div>
            <div class="absolute inset-0 hero-grid-pattern opacity-50"></div>

            <div class="flex flex-col lg:flex-row lg:items-center gap-8 mb-8">
                <div class="flex-1">
                    <span class="greet-pill mb-4">
                        <span class="ic"><i class="las la-sun"></i></span>
                        <span id="greet-time">Bienvenido</span>
                    </span>
                    <h1 class="text-4xl md:text-6xl font-extrabold text-gray-900 tracking-tight leading-[1.02]">
                        Portal de
                        <span class="shimmer-text">Intranet</span>
                    </h1>
                    <p class="text-gray-600 mt-4 text-base md:text-lg max-w-2xl leading-relaxed">
                        Accede a todas las herramientas y recursos de la empresa desde un solo lugar.
                        Centralizado, rápido y siempre disponible.
                    </p>
                </div>
                <div class="lg:text-right">
                    <div class="date-glass">
                        <div class="ic"><i class="las la-calendar-day"></i></div>
                        <div class="text-left">
                            <div class="text-[10px] text-gray-500 font-bold uppercase tracking-widest">Hoy es</div>
                            <div class="text-sm font-bold text-gray-800" id="today-date">—</div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Atajos rápidos premium --}}
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-3">
                <a href="{{ route('ingenieria.guia-tickets') }}" class="quick-shortcut" style="--qs-color:#fb923c;">
                    <div class="ic" style="background:linear-gradient(135deg, #fff7ed, #ffedd5); color:#ea580c;">
                        <i class="las la-ticket-alt"></i>
                    </div>
                    <div class="flex-1 min-w-0">
                        <div class="text-sm font-bold text-gray-900">Levantar Ticket</div>
                        <div class="text-xs text-gray-500">Soporte técnico</div>
                    </div>
                    <i class="las la-arrow-right text-gray-300"></i>
                </a>
                <a href="{{ route('estructurainterna.directorio-empresarial') }}" class="quick-shortcut"
                    style="--qs-color:#60a5fa;">
                    <div class="ic" style="background:linear-gradient(135deg, #dbeafe, #bfdbfe); color:#1d4ed8;">
                        <i class="las la-address-book"></i>
                    </div>
                    <div class="flex-1 min-w-0">
                        <div class="text-sm font-bold text-gray-900">Directorio</div>
                        <div class="text-xs text-gray-500">Contactos internos</div>
                    </div>
                    <i class="las la-arrow-right text-gray-300"></i>
                </a>
                <a href="{{ route('documentos.biblioteca') }}" class="quick-shortcut" style="--qs-color:#a78bfa;">
                    <div class="ic" style="background:linear-gradient(135deg, #f5f3ff, #ddd6fe); color:#7e22ce;">
                        <i class="las la-book"></i>
                    </div>
                    <div class="flex-1 min-w-0">
                        <div class="text-sm font-bold text-gray-900">Biblioteca</div>
                        <div class="text-xs text-gray-500">Recursos y plantillas</div>
                    </div>
                    <i class="las la-arrow-right text-gray-300"></i>
                </a>
                <a href="{{ route('courses.index') }}" class="quick-shortcut" style="--qs-color:#34d399;">
                    <div class="ic" style="background:linear-gradient(135deg, #dcfce7, #bbf7d0); color:#15803d;">
                        <i class="las la-graduation-cap"></i>
                    </div>
                    <div class="flex-1 min-w-0">
                        <div class="text-sm font-bold text-gray-900">Formación</div>
                        <div class="text-xs text-gray-500">Cursos y materiales</div>
                    </div>
                    <i class="las la-arrow-right text-gray-300"></i>
                </a>
            </div>
        </section>

        {{-- ============================================
             GRID PRINCIPAL DE MÓDULOS
             ============================================ --}}
        <div class="section-elegant-head">
            <div class="left">
                <div class="accent"></div>
                <div>
                    <h2>Módulos Principales</h2>
                    <p class="subtitle">Explora todas las áreas y herramientas de la empresa</p>
                </div>
            </div>
            <span class="badge-counter">
                <i class="las la-th-large"></i> 8 módulos
            </span>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-7 mb-14">

            {{-- Tarjeta 1: Acceso Admin (Próximamente) --}}
            <a href="#" class="premium-card disabled" style="--c-color:#64748b; --c-bg:#f1f5f9;">
                <div class="img-area">
                    <div class="img-zoom" style="background-image: url('{{ asset('assets/media/admin-intranet.png') }}');">
                    </div>
                    <span class="float-badge"><i class="las la-user-shield"></i></span>
                    <span class="status-pill coming"><i class="las la-tools"></i> Próximamente</span>
                </div>
                <div class="body">
                    <h3>Acceso Admin</h3>
                    <p>Panel de administración de la intranet. Próximamente disponible.</p>
                    <div class="footer-line">
                        <span class="meta"><i class="las la-clock"></i> En desarrollo</span>
                        <span class="arrow-circle"><i class="las la-lock"></i></span>
                    </div>
                </div>
            </a>

            {{-- Tarjeta 2: Estructura Interna --}}
            <a href="{{ route('procesos-empresariales') }}" class="premium-card" style="--c-color:#ea580c; --c-bg:#fff7ed;">
                <div class="img-area">
                    <div class="img-zoom" style="background-image: url('{{ asset('assets/media/estruct-interna.png') }}');">
                    </div>
                    <span class="float-badge"><i class="las la-sitemap"></i></span>
                    <span class="status-pill active"><span class="w-1.5 h-1.5 bg-white rounded-full pulse-dot"></span>
                        Activo</span>
                </div>
                <div class="body">
                    <h3>Estructura Interna</h3>
                    <p>Organigrama, proceso comercial, imagen corporativa, procesos internos de RH y más.</p>
                    <div class="footer-line">
                        <span class="meta"><i class="las la-th-large"></i> Procesos</span>
                        <span class="arrow-circle"><i class="las la-arrow-right"></i></span>
                    </div>
                </div>
            </a>

            {{-- Tarjeta 3: Nube Privada (Próximamente) --}}
            <a href="https://owncloud.netjernetworks.net" target="_blank" class="premium-card disabled"
                style="--c-color:#0ea5e9; --c-bg:#e0f2fe;">
                <div class="img-area">
                    <div class="img-zoom" style="background-image: url('{{ asset('assets/media/cloud-service.png') }}');">
                    </div>
                    <span class="float-badge"><i class="las la-cloud"></i></span>
                    <span class="status-pill coming"><i class="las la-tools"></i> Próximamente</span>
                </div>
                <div class="body">
                    <h3>Nube Privada</h3>
                    <p>Almacenamiento seguro y acceso a documentos corporativos.</p>
                    <div class="footer-line">
                        <span class="meta"><i class="las la-clock"></i> En desarrollo</span>
                        <span class="arrow-circle"><i class="las la-lock"></i></span>
                    </div>
                </div>
            </a>

            {{-- Tarjeta 4: Blog --}}
            <a href="{{ route('posts.index') }}" class="premium-card" style="--c-color:#8b5cf6; --c-bg:#f5f3ff;">
                <div class="img-area">
                    <div class="img-zoom" style="background-image: url('{{ asset('assets/media/blog-red.png') }}');">
                    </div>
                    <span class="float-badge"><i class="las la-blog"></i></span>
                    <span class="status-pill active"><span class="w-1.5 h-1.5 bg-white rounded-full pulse-dot"></span>
                        Activo</span>
                </div>
                <div class="body">
                    <h3>Blog</h3>
                    <p>Artículos, manuales y guías de apoyo para todos los colaboradores.</p>
                    <div class="footer-line">
                        <span class="meta"><i class="las la-newspaper"></i> Artículos</span>
                        <span class="arrow-circle"><i class="las la-arrow-right"></i></span>
                    </div>
                </div>
            </a>

            {{-- Tarjeta 5: Soporte --}}
            <a href="{{ route('ingenieria.portal-soporte') }}" class="premium-card"
                style="--c-color:#3b82f6; --c-bg:#dbeafe;">
                <div class="img-area">
                    <div class="img-zoom" style="background-image: url('{{ asset('assets/media/soporte.png') }}');">
                    </div>
                    <span class="float-badge"><i class="las la-headset"></i></span>
                    <span class="status-pill active"><span class="w-1.5 h-1.5 bg-white rounded-full pulse-dot"></span>
                        Activo</span>
                </div>
                <div class="body">
                    <h3>Soporte</h3>
                    <p>Soporte técnico, tickets y sistema Jira para reportar incidencias.</p>
                    <div class="footer-line">
                        <span class="meta"><i class="las la-life-ring"></i> Mesa de Ayuda</span>
                        <span class="arrow-circle"><i class="las la-arrow-right"></i></span>
                    </div>
                </div>
            </a>

            {{-- Tarjeta 6: Formación Académica --}}
            <a href="{{ route('courses.index') }}" class="premium-card" style="--c-color:#10b981; --c-bg:#dcfce7;">
                <div class="img-area">
                    <div class="img-zoom" style="background-image: url('{{ asset('assets/media/academia.png') }}');">
                    </div>
                    <span class="float-badge"><i class="las la-graduation-cap"></i></span>
                    <span class="status-pill active"><span class="w-1.5 h-1.5 bg-white rounded-full pulse-dot"></span>
                        Activo</span>
                </div>
                <div class="body">
                    <h3>Formación Académica</h3>
                    <p>Videos de cursos y material audiovisual para tu desarrollo profesional.</p>
                    <div class="footer-line">
                        <span class="meta"><i class="las la-play-circle"></i> Videos</span>
                        <span class="arrow-circle"><i class="las la-arrow-right"></i></span>
                    </div>
                </div>
            </a>

            {{-- Tarjeta 7: Biblioteca --}}
            <a href="{{ route('documentos.biblioteca') }}" class="premium-card"
                style="--c-color:#ec4899; --c-bg:#fdf2f8;">
                <div class="img-area">
                    <div class="img-zoom"
                        style="background-image: url('{{ asset('assets/media/biblioteca-recursos.png') }}');"></div>
                    <span class="float-badge"><i class="las la-book-open"></i></span>
                    <span class="status-pill active"><span class="w-1.5 h-1.5 bg-white rounded-full pulse-dot"></span>
                        Activo</span>
                </div>
                <div class="body">
                    <h3>Biblioteca de Recursos</h3>
                    <p>Documentos, guías, formatos, plantillas y más recursos corporativos.</p>
                    <div class="footer-line">
                        <span class="meta"><i class="las la-folder-open"></i> Recursos</span>
                        <span class="arrow-circle"><i class="las la-arrow-right"></i></span>
                    </div>
                </div>
            </a>

            {{-- Tarjeta 8: TECHquila --}}
            <a href="https://www.techquila.news/" target="_blank" class="premium-card"
                style="--c-color:#f59e0b; --c-bg:#fef3c7;">
                <div class="img-area">
                    <div class="img-zoom"
                        style="background-image: url('{{ asset('assets/media/techquila-news.png') }}');"></div>
                    <span class="float-badge"><i class="las la-rss"></i></span>
                    <span class="status-pill external"><i class="las la-external-link-alt"></i> Externo</span>
                </div>
                <div class="body">
                    <h3>TECHquila News</h3>
                    <p>Conoce más de tecnología y sé parte de nuestra comunidad.</p>
                    <div class="footer-line">
                        <span class="meta"><i class="las la-globe"></i> techquila.news</span>
                        <span class="arrow-circle"><i class="las la-external-link-alt"></i></span>
                    </div>
                </div>
            </a>
        </div>

        {{-- ============================================
             Lo más buscado - Premium
             ============================================ --}}
        <section class="featured-block mb-14 anim-up">
            <div class="section-elegant-head" style="margin-bottom: 1.5rem;">
                <div class="left">
                    <div class="accent" style="background: linear-gradient(to bottom, #fbbf24, #f97316);"></div>
                    <div>
                        <h2 style="font-size: 1.5rem;">Lo más buscado</h2>
                        <p class="subtitle">Los accesos y servicios que los colaboradores consultan y utilizan con mayor
                            frecuencia.</p>
                    </div>
                </div>
                <span class="badge-counter"
                    style="background:linear-gradient(135deg, #fef3c7, #fde68a); color:#92400e; border-color:#fcd34d;">
                    <i class="las la-fire"></i> Destacados
                </span>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-5">
                {{-- Reservar camioneta --}}
                <div class="featured-card">
                    <div class="img-wrap">
                        <span class="tag-corner"><i class="las la-car"></i> Reserva</span>
                        <img src="{{ url('/storage/media/reserva-vehiculo.png') }}" alt="Reserva de vehículo"
                            data-url="https://api.leadconnectorhq.com/widget/booking/FiuBKgXfyoEvw5l1PlTJ"
                            class="cursor-pointer" onclick="openImage(this)">
                        <span class="clickable-img-hint"><i class="las la-mouse-pointer"></i> Clic para abrir</span>
                    </div>
                    <div class="body">
                        <h4>Solicitar de Vehiculo</h4>
                        <div class="actions">
                            <span class="btn-grad cursor-default select-none">
                                <i class="las la-hand-pointer"></i> Clic en la imagen
                            </span>
                        </div>
                    </div>
                </div>

                {{-- Modal Imagen --}}
                <div id="camionetaModal" style="display:none;"
                    class="fixed inset-0 bg-black/85 items-center justify-center z-50 p-4 backdrop-blur-sm">
                    <button onclick="closeImage()"
                        class="absolute top-5 right-6 w-12 h-12 rounded-full bg-white/15 text-white text-xl font-bold hover:bg-white/30 hover:rotate-90 transition-all flex items-center justify-center backdrop-blur-md border border-white/20">
                        <i class="las la-times"></i>
                    </button>
                    <img id="modalImage" class="max-w-full max-h-[90vh] object-contain rounded-2xl shadow-2xl">
                    <a id="modalLink" href="https://api.leadconnectorhq.com/widget/booking/FiuBKgXfyoEvw5l1PlTJ"
                        target="_blank"
                        class="absolute bottom-6 left-1/2 -translate-x-1/2 inline-flex items-center gap-2
                            bg-gradient-to-r from-orange-500 to-orange-600 text-white px-7 py-3.5 rounded-xl
                            font-bold shadow-2xl hover:shadow-orange-500/50 hover:scale-105 transition-all"
                        rel="noopener noreferrer">
                        <i class="las la-external-link-alt"></i> Abrir enlace
                    </a>
                </div>

                {{-- Incidencias --}}
                <div class="featured-card">
                    <div class="img-wrap">
                        <span class="tag-corner"><i class="las la-clipboard-list"></i> RH</span>
                        <img src="{{ url('/storage/media/incidencias.png') }}" alt="Incidencias">
                    </div>
                    <div class="body">
                        <h4>Reporte de Incidencias</h4>
                        <div class="actions">
                            <a href="{{ route('administracion.incidencias') }}" class="btn-out">
                                <i class="las la-book-open"></i> Ver guía
                            </a>
                            <a href="https://netjernetworksproduccion.odoo.com/vacaciones-rh" target="_blank"
                                class="btn-grad">
                                <i class="las la-plus-circle"></i> Registrar
                            </a>
                        </div>
                    </div>
                </div>

                {{-- Ticket --}}
                <div class="featured-card">
                    <div class="img-wrap">
                        <span class="tag-corner"><i class="las la-ticket-alt"></i> Mesa de Ayuda</span>
                        <img src="{{ url('/storage/media/genera-ticket.png') }}" alt="Generar Ticket">
                    </div>
                    <div class="body">
                        <h4> Tickets</h4>
                        <div class="actions">
                            <a href="{{ route('ingenieria.guia-tickets') }}" class="btn-grad">
                                <i class="las la-book-open"></i> Ver guía
                            </a>
                        </div>
                    </div>
                </div>

                {{-- Directorio --}}
                <div class="featured-card">
                    <div class="img-wrap">
                        <span class="tag-corner"><i class="las la-address-book"></i> Contactos</span>
                        <img src="{{ url('/storage/media/directorio-telefonico.png') }}" alt="Directorio">
                    </div>
                    <div class="body">
                        <h4>Directorio Corporativo</h4>
                        <div class="actions">
                            <a href="{{ route('estructurainterna.directorio-empresarial') }}" class="btn-grad">
                                <i class="las la-search"></i> Ver directorio
                            </a>
                        </div>
                    </div>
                </div>

                {{-- Pólizas --}}
                <div class="featured-card">
                    <div class="img-wrap">
                        <span class="tag-corner"><i class="las la-file-contract"></i> Servicios</span>
                        <img src="{{ url('/assets/media/polizas-inventarios-clientes.png') }}"
                            alt="Pólizas e Inventario">
                    </div>
                    <div class="body">
                        <h4>Gestión de Servicios Contratados</h4>
                        <div class="actions">
                            <a href="{{ route('ingenieria.clientes-polizas') }}" class="btn-grad">
                                <i class="las la-folder-open"></i> Ver pólizas
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@push('js')
    <script>
        // Saludo dinámico según hora del día
        (function() {
            const h = new Date().getHours();
            let greet = 'Bienvenido';
            if (h < 12) greet = 'Buenos días';
            else if (h < 19) greet = 'Buenas tardes';
            else greet = 'Buenas noches';
            const el = document.getElementById('greet-time');
            if (el) el.textContent = greet;

            // Fecha en español
            const opts = {
                weekday: 'long',
                year: 'numeric',
                month: 'long',
                day: 'numeric'
            };
            const dateStr = new Date().toLocaleDateString('es-MX', opts);
            const dateEl = document.getElementById('today-date');
            if (dateEl) dateEl.textContent = dateStr.charAt(0).toUpperCase() + dateStr.slice(1);
        })();

        // Modal de imagen (camioneta)
        function openImage(img) {
            const modal = document.getElementById('camionetaModal');
            const modalImg = document.getElementById('modalImage');
            const modalLink = document.getElementById('modalLink');
            modalImg.src = img.src;
            if (img.dataset.url) {
                modalLink.href = img.dataset.url;
            } else {
                modalLink.href = "#";
            }
            modal.style.display = 'flex';
        }

        function closeImage() {
            const modal = document.getElementById('camionetaModal');
            modal.style.display = 'none';
        }
        document.getElementById('camionetaModal').addEventListener('click', function(e) {
            if (e.target === this) closeImage();
        });
        document.addEventListener('keydown', function(e) {
            if (e.key === "Escape") closeImage();
        });
    </script>
@endpush
