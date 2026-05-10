@extends('layouts.welcome')

@section('title', 'Intranet Corporativa')

@push('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet"
        href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <link href="/assets/css/intrawelcome.css" rel="stylesheet">
@endpush

@section('content')

    {{-- ============================================
         HERO INMERSIVO
         ============================================ --}}
    <section class="welcome-hero">
        <div class="orb orb-1"></div>
        <div class="orb orb-2"></div>

        <div class="container mx-auto px-4 relative z-10">
            <div class="max-w-4xl mx-auto text-center anim-up">
                <span class="hero-eyebrow mb-6">
                    <span class="dot"></span>
                    Netjer Networks · Desde 1998
                </span>
                <h1 class="hero-title mb-6">
                    Bienvenidos a <span class="accent">Nuestra Empresa</span>
                </h1>
                <p class="text-lg md:text-2xl mb-10 opacity-90 max-w-3xl mx-auto leading-relaxed">
                    Conoce nuestra historia, misión, visión y los valores que nos guían cada día.
                </p>
                <div class="flex flex-wrap justify-center gap-3">
                    <a href="#historia" class="hero-btn-primary">
                        <i class="las la-history"></i> Nuestra Historia
                    </a>
                    <a href="#mision-vision" class="hero-btn-ghost">
                        <i class="las la-bullseye"></i> Misión y Visión
                    </a>
                    <a href="#valores" class="hero-btn-ghost">
                        <i class="las la-heart"></i> Nuestros Valores
                    </a>
                </div>
            </div>
        </div>

        <div class="scroll-cue">
            <span>Desliza</span>
            <i class="las la-angle-down text-lg"></i>
        </div>
    </section>

    {{-- ============================================
         HISTORIA
         ============================================ --}}
    <section id="historia" class="py-20 bg-white">
        <div class="container mx-auto px-4">
            <div class="text-center mb-14 reveal">
                <span class="section-eyebrow"><i class="las la-clock"></i> Nuestra Historia</span>
                <h2 class="text-3xl md:text-5xl font-extrabold text-gray-900 mt-4 mb-4 tracking-tight">
                    Más de dos décadas <br class="hidden md:block">
                    <span class="bg-gradient-to-r from-orange-500 to-pink-500 bg-clip-text text-transparent">
                        conectando empresas
                    </span>
                </h2>
                <p class="text-gray-600 max-w-3xl mx-auto text-lg">
                    Desde nuestros humildes comienzos hasta convertirnos en un referente del sector,
                    nuestra historia es testimonio de dedicación, innovación y crecimiento continuo.
                </p>
                <div class="divider-line"><span class="dot"></span><span class="line"></span><span
                        class="dot"></span></div>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center mb-20">
                <div class="reveal">
                    <div class="history-image-wrap aspect-[4/3]">
                        <img src="/storage/media/netjer.jpg" alt="Netjer Networks" class="w-full h-full object-cover">
                        <div class="badge-years">
                            <div>
                                <div class="num">24+</div>
                            </div>
                            <div>
                                <div class="label">Años de</div>
                                <div class="label">trayectoria</div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="reveal">
                    <h3 class="text-2xl md:text-3xl font-extrabold text-gray-900 mb-6 tracking-tight leading-tight">
                        Tecnología con propósito.<br>
                        <span class="text-orange-600">Evolución con visión.</span>
                    </h3>
                    <p class="text-gray-600 mb-5 leading-relaxed">
                        Hace más de dos décadas, cuando la transformación digital apenas comenzaba a tomar forma,
                        nació <strong class="text-gray-800">Netjer Networks</strong> con una idea clara: conectar empresas
                        con el poder de la tecnología para que pudieran operar con mayor eficiencia, seguridad y
                        visibilidad.
                    </p>
                    <p class="text-gray-600 mb-5 leading-relaxed">
                        A lo largo de estos 24 años, hemos evolucionado al ritmo de los desafíos tecnológicos de
                        nuestros clientes. Con cada avance, adaptamos nuestro portafolio para garantizar que las
                        organizaciones cuenten con las herramientas adecuadas para anticiparse, reaccionar y optimizar
                        su operación digital.
                    </p>
                    <p class="text-gray-600 mb-6 leading-relaxed">
                        Hoy, Netjer Networks no solo ofrece tecnología, sino una forma distinta de entender y acompañar
                        la evolución empresarial. Creemos en relaciones duraderas, en la innovación constante y en la
                        capacidad de la tecnología para transformar la manera en que trabajamos, colaboramos y crecemos.
                    </p>

                    <div class="quote-card">
                        <p class="text-gray-800 italic text-lg font-medium leading-relaxed">
                            "Seguimos creciendo. Seguimos conectando. Seguimos evolucionando."
                        </p>
                        <p class="text-orange-600 font-bold mt-3 text-sm">— Fundadores de la Empresa</p>
                    </div>
                </div>
            </div>

            {{-- Línea de tiempo --}}
            <div class="reveal">
                <div class="text-center mb-10">
                    <span class="section-eyebrow"><i class="las la-flag"></i> Hitos Importantes</span>
                    <h3 class="text-2xl md:text-3xl font-extrabold text-gray-900 mt-3">
                        Momentos que marcaron nuestra trayectoria
                    </h3>
                </div>

                <div class="timeline">
                    <div class="timeline-item">
                        <div class="timeline-dot"><i class="las la-seedling"></i></div>
                        <div class="timeline-card">
                            <span class="year">1998</span>
                            <h4 class="font-bold text-gray-900 mb-2">Fundación</h4>
                            <p class="text-gray-600 text-sm">Nacimos como un pequeño taller con 5 empleados y grandes
                                sueños.</p>
                        </div>
                    </div>
                    <div class="timeline-item">
                        <div class="timeline-dot"><i class="las la-map-marked-alt"></i></div>
                        <div class="timeline-card">
                            <span class="year">2005</span>
                            <h4 class="font-bold text-gray-900 mb-2">Expansión Nacional</h4>
                            <p class="text-gray-600 text-sm">Abrimos nuestras primeras 5 sucursales en diferentes ciudades
                                del país.</p>
                        </div>
                    </div>
                    <div class="timeline-item">
                        <div class="timeline-dot"><i class="las la-cogs"></i></div>
                        <div class="timeline-card">
                            <span class="year">2012</span>
                            <h4 class="font-bold text-gray-900 mb-2">Innovación Tecnológica</h4>
                            <p class="text-gray-600 text-sm">Implementamos nuestro primer sistema ERP y comenzamos la
                                digitalización.</p>
                        </div>
                    </div>
                    <div class="timeline-item">
                        <div class="timeline-dot"><i class="las la-globe-americas"></i></div>
                        <div class="timeline-card">
                            <span class="year">2020</span>
                            <h4 class="font-bold text-gray-900 mb-2">Expansión Internacional</h4>
                            <p class="text-gray-600 text-sm">Llegamos a 15 países, consolidándonos como empresa
                                multinacional.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- ============================================
         MISIÓN Y VISIÓN
         ============================================ --}}
    <section id="mision-vision" class="py-20 bg-gradient-to-b from-gray-50 to-white">
        <div class="container mx-auto px-4">
            <div class="text-center mb-14 reveal">
                <span class="section-eyebrow"><i class="las la-star"></i> Nuestra Esencia</span>
                <h2 class="text-3xl md:text-5xl font-extrabold text-gray-900 mt-4 mb-4 tracking-tight">
                    Propósito y aspiración <br class="hidden md:block">
                    para el <span
                        class="bg-gradient-to-r from-orange-500 to-blue-600 bg-clip-text text-transparent">futuro</span>
                </h2>
                <p class="text-gray-600 max-w-2xl mx-auto text-lg">
                    Lo que nos motiva hoy y lo que aspiramos a construir mañana.
                </p>
                <div class="divider-line"><span class="dot"></span><span class="line"></span><span
                        class="dot"></span></div>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 mb-16">
                {{-- Misión --}}
                <div class="mv-card mision reveal">
                    <div class="flex items-center gap-4 mb-6">
                        <div class="mv-icon"><i class="las la-rocket"></i></div>
                        <div>
                            <span class="text-xs font-bold text-orange-600 uppercase tracking-wider">Lo que somos</span>
                            <h3 class="text-2xl font-extrabold text-gray-900">Nuestra Misión</h3>
                        </div>
                    </div>

                    <div class="mv-quote mb-6">
                        <p class="text-gray-700 text-base md:text-lg font-medium leading-relaxed italic">
                            "Impulsar la evolución de las organizaciones a través de soluciones tecnológicas que les
                            permitan operar con mayor claridad, seguridad y eficiencia. Ponemos nuestro conocimiento,
                            experiencia y compromiso al servicio de quienes creen que la tecnología no es un fin, sino
                            el medio para crecer, conectar y transformar."
                        </p>
                    </div>

                    <h4 class="font-bold text-gray-900 mb-3 flex items-center gap-2">
                        <i class="las la-flag-checkered text-orange-500"></i> Objetivos Estratégicos
                    </h4>
                    <ul class="space-y-1">
                        <li class="mv-list-item">
                            <span class="check"><i class="las la-check"></i></span>
                            <span class="text-gray-700">Innovar constantemente en nuestros productos y servicios.</span>
                        </li>
                        <li class="mv-list-item">
                            <span class="check"><i class="las la-check"></i></span>
                            <span class="text-gray-700">Superar el <strong>95% de satisfacción</strong> del cliente
                                anualmente.</span>
                        </li>
                        <li class="mv-list-item">
                            <span class="check"><i class="las la-check"></i></span>
                            <span class="text-gray-700">Invertir en el desarrollo continuo de nuestros
                                colaboradores.</span>
                        </li>
                        <li class="mv-list-item">
                            <span class="check"><i class="las la-check"></i></span>
                            <span class="text-gray-700">Implementar prácticas sostenibles en todas nuestras
                                operaciones.</span>
                        </li>
                    </ul>
                </div>

                {{-- Visión --}}
                <div class="mv-card vision reveal">
                    <div class="flex items-center gap-4 mb-6">
                        <div class="mv-icon"><i class="las la-binoculars"></i></div>
                        <div>
                            <span class="text-xs font-bold text-blue-600 uppercase tracking-wider">A dónde vamos</span>
                            <h3 class="text-2xl font-extrabold text-gray-900">Nuestra Visión</h3>
                        </div>
                    </div>

                    <div class="mv-quote mb-6">
                        <p class="text-gray-700 text-base md:text-lg font-medium leading-relaxed italic">
                            "Ser el socio tecnológico más confiable para las empresas que construyen el futuro.
                            Aspiramos a liderar con innovación, pero también con empatía, cercanía y una comprensión
                            profunda de los desafíos humanos detrás de cada reto tecnológico. Queremos ser parte del
                            cambio que mejora la vida de las personas dentro y fuera de las organizaciones."
                        </p>
                    </div>

                    <h4 class="font-bold text-gray-900 mb-3 flex items-center gap-2">
                        <i class="las la-bullseye text-blue-500"></i> Metas para 2030
                    </h4>
                    <ul class="space-y-1">
                        <li class="mv-list-item">
                            <span class="check"><i class="las la-rocket"></i></span>
                            <span class="text-gray-700">Expandir nuestra presencia a <strong>30 países</strong>.</span>
                        </li>
                        <li class="mv-list-item">
                            <span class="check"><i class="las la-rocket"></i></span>
                            <span class="text-gray-700">Liderar la innovación con al menos <strong>5 patentes
                                    anuales</strong>.</span>
                        </li>
                        <li class="mv-list-item">
                            <span class="check"><i class="las la-rocket"></i></span>
                            <span class="text-gray-700">Ser reconocidos como el <strong>mejor lugar para trabajar</strong>
                                en nuestra industria.</span>
                        </li>
                        <li class="mv-list-item">
                            <span class="check"><i class="las la-rocket"></i></span>
                            <span class="text-gray-700">Alcanzar <strong>neutralidad de carbono</strong> en todas nuestras
                                operaciones.</span>
                        </li>
                    </ul>
                </div>
            </div>

            {{-- Banner de propósito con stats --}}
            <div class="purpose-banner reveal">
                <div class="max-w-4xl mx-auto text-center mb-8">
                    <span
                        class="inline-flex items-center gap-2 bg-white/20 backdrop-blur border border-white/30 text-white text-xs font-bold uppercase tracking-widest px-4 py-1.5 rounded-full mb-4">
                        <i class="las la-fire"></i> Propósito Fundamental
                    </span>
                    <h3 class="text-2xl md:text-4xl font-extrabold mb-5 leading-tight tracking-tight">
                        Crear un impacto positivo en la sociedad
                    </h3>
                    <p class="text-base md:text-xl opacity-95 leading-relaxed italic">
                        "A través de soluciones innovadoras que mejoren la calidad de vida, mientras construimos
                        una organización donde cada persona pueda desarrollar su máximo potencial."
                    </p>
                </div>

                <div class="grid grid-cols-2 md:grid-cols-4 gap-4 max-w-4xl mx-auto">
                    <div class="stat-glass">
                        <div class="num" data-counter="25">0</div>
                        <div class="label">Años de Experiencia</div>
                    </div>
                    <div class="stat-glass">
                        <div class="num" data-counter="20" data-suffix="+">0</div>
                        <div class="label">Colaboradores</div>
                    </div>
                    <div class="stat-glass">
                        <div class="num" data-counter="1" data-suffix="+">0</div>
                        <div class="label">Países</div>
                    </div>
                    <div class="stat-glass">
                        <div class="num" data-counter="50" data-suffix="%">0</div>
                        <div class="label">Satisfacción Clientes</div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- ============================================
         VALORES
         ============================================ --}}
    <section id="valores" class="py-20 bg-white">
        <div class="container mx-auto px-4">
            <div class="text-center mb-14 reveal">
                <span class="section-eyebrow"><i class="las la-heart"></i> Nuestros Valores</span>
                <h2 class="text-3xl md:text-5xl font-extrabold text-gray-900 mt-4 mb-4 tracking-tight">
                    Principios que guían
                    <span class="bg-gradient-to-r from-orange-500 to-pink-500 bg-clip-text text-transparent">
                        cada decisión
                    </span>
                </h2>
                <p class="text-gray-600 max-w-3xl mx-auto text-lg">
                    Los pilares fundamentales que definen nuestra forma de trabajar y de relacionarnos.
                </p>
                <div class="divider-line"><span class="dot"></span><span class="line"></span><span
                        class="dot"></span></div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-7">
                {{-- Valor 1 --}}
                <div class="value-card reveal" style="--v-color:#ef4444; --v-bg:#fee2e2; --v-border:#fecaca;">
                    <span class="number">01</span>
                    <div class="value-icon-big"><i class="las la-heart"></i></div>
                    <h3 class="text-xl font-extrabold text-gray-900 mb-3">Humanidad en la tecnología</h3>
                    <p class="text-gray-600 leading-relaxed">
                        Creemos en soluciones pensadas para personas. Escuchamos, comprendemos y nos comprometemos
                        con el impacto real de lo que hacemos.
                    </p>
                    <div class="value-practice">
                        <div class="practice-title"><i class="las la-lightbulb"></i> En la práctica</div>
                        <p class="text-gray-700 text-sm leading-relaxed">
                            Cumplimos lo que prometemos, comunicamos con transparencia y tomamos decisiones basadas
                            en principios éticos.
                        </p>
                    </div>
                </div>

                {{-- Valor 2 --}}
                <div class="value-card reveal" style="--v-color:#3b82f6; --v-bg:#dbeafe; --v-border:#bfdbfe;">
                    <span class="number">02</span>
                    <div class="value-icon-big"><i class="las la-handshake"></i></div>
                    <h3 class="text-xl font-extrabold text-gray-900 mb-3">Compromiso auténtico</h3>
                    <p class="text-gray-600 leading-relaxed">
                        Acompañamos de verdad. Estamos presentes cuando más se nos necesita, con atención
                        personalizada y respuestas que marcan la diferencia.
                    </p>
                    <div class="value-practice">
                        <div class="practice-title"><i class="las la-lightbulb"></i> En la práctica</div>
                        <p class="text-gray-700 text-sm leading-relaxed">
                            Fomentamos la creatividad, experimentamos con nuevas ideas y aprendemos de cada intento.
                        </p>
                    </div>
                </div>

                {{-- Valor 3 --}}
                <div class="value-card reveal" style="--v-color:#10b981; --v-bg:#dcfce7; --v-border:#bbf7d0;">
                    <span class="number">03</span>
                    <div class="value-icon-big"><i class="las la-users"></i></div>
                    <h3 class="text-xl font-extrabold text-gray-900 mb-3">Relaciones duraderas</h3>
                    <p class="text-gray-600 leading-relaxed">
                        Más allá de proyectos, construimos vínculos. Nos importan las personas, sus historias
                        y el camino que recorremos juntos.
                    </p>
                    <div class="value-practice">
                        <div class="practice-title"><i class="las la-lightbulb"></i> En la práctica</div>
                        <p class="text-gray-700 text-sm leading-relaxed">
                            Compartimos éxitos y fracasos, escuchamos diversas perspectivas y construimos
                            relaciones de confianza.
                        </p>
                    </div>
                </div>

                {{-- Valor 4 --}}
                <div class="value-card reveal" style="--v-color:#f59e0b; --v-bg:#fef3c7; --v-border:#fde68a;">
                    <span class="number">04</span>
                    <div class="value-icon-big"><i class="las la-lightbulb"></i></div>
                    <h3 class="text-xl font-extrabold text-gray-900 mb-3">Innovación con sentido</h3>
                    <p class="text-gray-600 leading-relaxed">
                        Adoptamos nuevas tecnologías no por tendencia, sino porque creemos en su capacidad
                        para generar valor real y sostenible.
                    </p>
                    <div class="value-practice">
                        <div class="practice-title"><i class="las la-lightbulb"></i> En la práctica</div>
                        <p class="text-gray-700 text-sm leading-relaxed">
                            Nos enfocamos en los detalles, aprendemos continuamente y nos esforzamos por
                            superar expectativas.
                        </p>
                    </div>
                </div>

                {{-- Valor 5 --}}
                <div class="value-card reveal" style="--v-color:#8b5cf6; --v-bg:#f5f3ff; --v-border:#ddd6fe;">
                    <span class="number">05</span>
                    <div class="value-icon-big"><i class="las la-trophy"></i></div>
                    <h3 class="text-xl font-extrabold text-gray-900 mb-3">Excelencia técnica con propósito</h3>
                    <p class="text-gray-600 leading-relaxed">
                        La calidad no es negociable. Nuestra experiencia se refleja en cada entrega, en cada
                        solución y en cada resultado medible.
                    </p>
                    <div class="value-practice">
                        <div class="practice-title"><i class="las la-lightbulb"></i> En la práctica</div>
                        <p class="text-gray-700 text-sm leading-relaxed">
                            Cumplimos plazos, somos proactivos en la solución de problemas y consideramos el
                            impacto de nuestras acciones.
                        </p>
                    </div>
                </div>

                {{-- Card decorativa de cierre --}}
                <div class="value-card reveal"
                    style="--v-color:#0ea5e9; --v-bg:#e0f2fe; --v-border:#bae6fd; background: linear-gradient(135deg, #fff7ed, #ffedd5); border-color: #fed7aa;">
                    <div class="value-icon-big"
                        style="background: linear-gradient(135deg, #f97316, #ea580c); color: #fff;">
                        <i class="las la-star"></i>
                    </div>
                    <h3 class="text-xl font-extrabold text-gray-900 mb-3">Estos son nuestros valores</h3>
                    <p class="text-gray-700 leading-relaxed mb-5">
                        Más que palabras: son los principios que vivimos cada día y que esperamos compartir contigo.
                    </p>
                    <a href="#valores"
                        class="inline-flex items-center gap-2 text-orange-600 font-bold text-sm hover:gap-3 transition-all">
                        Conoce nuestro código <i class="las la-arrow-down"></i>
                    </a>
                </div>
            </div>

            {{-- Código de Conducta --}}
            <div class="conduct-block mt-16 reveal">
                <div class="max-w-4xl mx-auto text-center mb-10">
                    <span class="section-eyebrow"><i class="las la-balance-scale"></i> Código de Conducta</span>
                    <h3 class="text-2xl md:text-3xl font-extrabold text-gray-900 mt-4 mb-3 tracking-tight">
                        Cómo vivimos nuestros valores
                    </h3>
                    <p class="text-gray-600 leading-relaxed">
                        Estos valores se traducen en comportamientos específicos que esperamos de todos los miembros
                        de nuestra organización, desde el equipo directivo hasta los nuevos colaboradores.
                    </p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 max-w-5xl mx-auto">
                    <div class="conduct-card">
                        <div class="head">
                            <div class="ic"><i class="las la-user-check"></i></div>
                            <div>
                                <h4 class="font-extrabold text-gray-900">Expectativas de Comportamiento</h4>
                                <p class="text-xs text-gray-500">En el día a día</p>
                            </div>
                        </div>
                        <ul class="space-y-3">
                            <li class="flex items-start gap-3">
                                <span
                                    class="w-6 h-6 rounded-full bg-green-100 text-green-600 flex items-center justify-center text-xs flex-shrink-0 mt-0.5">
                                    <i class="las la-check"></i>
                                </span>
                                <span class="text-gray-700">Respeto mutuo en todas las interacciones.</span>
                            </li>
                            <li class="flex items-start gap-3">
                                <span
                                    class="w-6 h-6 rounded-full bg-green-100 text-green-600 flex items-center justify-center text-xs flex-shrink-0 mt-0.5">
                                    <i class="las la-check"></i>
                                </span>
                                <span class="text-gray-700">Comunicación clara y transparente.</span>
                            </li>
                            <li class="flex items-start gap-3">
                                <span
                                    class="w-6 h-6 rounded-full bg-green-100 text-green-600 flex items-center justify-center text-xs flex-shrink-0 mt-0.5">
                                    <i class="las la-check"></i>
                                </span>
                                <span class="text-gray-700">Confidencialidad de información sensible.</span>
                            </li>
                        </ul>
                    </div>

                    <div class="conduct-card">
                        <div class="head">
                            <div class="ic"><i class="las la-shield-alt"></i></div>
                            <div>
                                <h4 class="font-extrabold text-gray-900">Compromisos Éticos</h4>
                                <p class="text-xs text-gray-500">No negociables</p>
                            </div>
                        </div>
                        <ul class="space-y-3">
                            <li class="flex items-start gap-3">
                                <span
                                    class="w-6 h-6 rounded-full bg-green-100 text-green-600 flex items-center justify-center text-xs flex-shrink-0 mt-0.5">
                                    <i class="las la-check"></i>
                                </span>
                                <span class="text-gray-700">Cero tolerancia a la discriminación.</span>
                            </li>
                            <li class="flex items-start gap-3">
                                <span
                                    class="w-6 h-6 rounded-full bg-green-100 text-green-600 flex items-center justify-center text-xs flex-shrink-0 mt-0.5">
                                    <i class="las la-check"></i>
                                </span>
                                <span class="text-gray-700">Rechazo a cualquier forma de corrupción.</span>
                            </li>
                            <li class="flex items-start gap-3">
                                <span
                                    class="w-6 h-6 rounded-full bg-green-100 text-green-600 flex items-center justify-center text-xs flex-shrink-0 mt-0.5">
                                    <i class="las la-check"></i>
                                </span>
                                <span class="text-gray-700">Cumplimiento de leyes y regulaciones.</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- ============================================
         CTA FINAL
         ============================================ --}}
    <section class="final-cta">
        <div class="max-w-4xl mx-auto reveal">
            <span
                class="inline-flex items-center gap-2 bg-white/20 backdrop-blur border border-white/30 text-white text-xs font-bold uppercase tracking-widest px-4 py-1.5 rounded-full mb-5">
                <i class="las la-door-open"></i> Acceso Restringido
            </span>
            <h2 class="text-3xl md:text-5xl font-extrabold mb-5 tracking-tight leading-tight">
                ¿Listo para ser parte <br class="hidden md:block">
                de nuestra historia?
            </h2>
            <p class="text-lg md:text-xl mb-10 opacity-95 max-w-2xl mx-auto leading-relaxed">
                Accede a la intranet corporativa para descubrir todas las herramientas y recursos que tenemos para ti.
            </p>
            <a href="{{ route('intranet.index') }}" class="final-cta-btn">
                <i class="las la-door-open text-xl"></i>
                Acceder a la Intranet
                <i class="las la-arrow-right"></i>
            </a>
        </div>
    </section>

@endsection

@push('js')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Smooth scroll
            document.querySelectorAll('a[href^="#"]').forEach(anchor => {
                anchor.addEventListener('click', function(e) {
                    const targetId = this.getAttribute('href');
                    if (targetId === '#') return;
                    const target = document.querySelector(targetId);
                    if (target) {
                        e.preventDefault();
                        window.scrollTo({
                            top: target.offsetTop - 80,
                            behavior: 'smooth'
                        });
                    }
                });
            });

            // Reveal on scroll
            const reveals = document.querySelectorAll('.reveal');
            const obs = new IntersectionObserver((entries) => {
                entries.forEach(en => {
                    if (en.isIntersecting) {
                        en.target.classList.add('in');
                        obs.unobserve(en.target);
                    }
                });
            }, {
                threshold: .12,
                rootMargin: '0px 0px -40px 0px'
            });
            reveals.forEach(r => obs.observe(r));

            // Counter animado
            const counters = document.querySelectorAll('[data-counter]');
            const counterObs = new IntersectionObserver((entries) => {
                entries.forEach(en => {
                    if (en.isIntersecting) {
                        const el = en.target;
                        const target = parseInt(el.dataset.counter, 10);
                        const suffix = el.dataset.suffix || '';
                        const duration = 1600;
                        const start = performance.now();

                        function tick(now) {
                            const elapsed = now - start;
                            const progress = Math.min(elapsed / duration, 1);
                            const eased = 1 - Math.pow(1 - progress, 3);
                            const value = Math.floor(target * eased);
                            el.textContent = value.toLocaleString('es-MX') + suffix;
                            if (progress < 1) requestAnimationFrame(tick);
                            else el.textContent = target.toLocaleString('es-MX') + suffix;
                        }
                        requestAnimationFrame(tick);
                        counterObs.unobserve(el);
                    }
                });
            }, {
                threshold: .4
            });
            counters.forEach(c => counterObs.observe(c));
        });
    </script>
@endpush
