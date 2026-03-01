@extends('layouts.welcome')

@section('title', 'Intranet Corporativa')

@push('css')
    <link href="/assets/css/intrahome.css" rel="stylesheet">
@endpush

@section('content')

    <!-- Hero Section -->
    <section class="hero-section text-white py-16 md:py-24">
        <div class="container mx-auto px-4">
            <div class="max-w-4xl mx-auto text-center">
                <h1 class="text-4xl md:text-5xl font-bold mb-6">Bienvenidos a Nuestra Empresa</h1>
                <p class="text-xl md:text-2xl mb-8 opacity-90">Conoce nuestra historia, misión, visión y los valores que nos
                    guían cada día</p>
                <div class="flex flex-wrap justify-center gap-4">
                    <a href="#historia" class="bg-white text-orange-600 px-6 py-3 rounded-lg font-medium hover:bg-gray-100">
                        <i class="fas fa-history mr-2"></i> Nuestra Historia
                    </a>
                    <a href="#mision-vision"
                        class="bg-orange-700 text-white px-6 py-3 rounded-lg font-medium hover:bg-orange-800">
                        <i class="fas fa-bullseye mr-2"></i> Misión y Visión
                    </a>
                    <a href="#valores" class="bg-white text-orange-600 px-6 py-3 rounded-lg font-medium hover:bg-gray-100">
                        <i class="fas fa-heart mr-2"></i> Nuestros Valores
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Sección de Historia -->
    <section id="historia" class="py-16 bg-white">
        <div class="container mx-auto px-4">
            <div class="text-center mb-12">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-800 mb-4">Nuestra Historia</h2>
                <p class="text-gray-600 max-w-3xl mx-auto">Desde nuestros humildes comienzos hasta convertirnos en líderes
                    del sector, nuestra historia es un testimonio de dedicación, innovación y crecimiento continuo.</p>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                <div>
                    <div class="h-150 md:h-80 rounded-lg bg-center bg-no-repeat bg-contain bg-gradient-to-br from-orange-500 to-orange-600"
                        style="background-image: url('/storage/media/netjer.jpg');">
                    </div>
                </div>

                <div>
                    <h3 class="text-2xl font-bold text-gray-800 mb-6">Tecnología con propósito. Evolución con visión.</h3>
                    <p class="text-gray-600 mb-6">Hace más de dos décadas, cuando la transformación digital apenas comenzaba
                        a tomar forma, nació Netjer Networks con una idea clara: conectar empresas con el poder de la
                        tecnología para que pudieran operar con mayor eficiencia, seguridad y visibilidad. Desde nuestros
                        primeros pasos en el mundo de la infraestructura TI, hasta convertirnos en un referente en
                        observabilidad, orquestación y soluciones inteligentes, hemos mantenido firme nuestro compromiso con
                        la excelencia técnica y el servicio personalizado.</p>
                    <p class="text-gray-600 mb-6">A lo largo de estos 24 años, hemos evolucionado al ritmo de los desafíos
                        tecnológicos de nuestros clientes. Con cada avance, adaptamos nuestro portafolio para garantizar que
                        las organizaciones cuenten con las herramientas adecuadas para anticiparse, reaccionar y optimizar
                        su operación digital. Nuestra capacidad de integrar soluciones escalables, robustas y flexibles nos
                        ha convertido en aliados estratégicos de empresas líderes en múltiples industrias.</p>
                    <p class="text-gray-600 mb-6">Hoy, Netjer Networks no solo ofrece tecnología, sino una forma distinta de
                        entender y acompañar la evolución empresarial. Creemos en relaciones duraderas, en la innovación
                        constante y en la capacidad de la tecnología para transformar la manera en que trabajamos,
                        colaboramos y crecemos.</p>

                    <div class="bg-primary-light border-l-4 border-primary p-4 rounded-r-lg">
                        <p class="text-gray-700 italic">"Seguimos creciendo. Seguimos conectando. Seguimos evolucionando."
                        </p>
                        <p class="text-primary font-medium mt-2">— Fundadores de la Empresa</p>
                    </div>
                </div>
            </div>

            <!-- Línea de tiempo -->
            <div class="mt-16">
                <h3 class="text-2xl font-bold text-gray-800 mb-8 text-center">Hitos Importantes</h3>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                    <!-- Hito 1 -->
                    <div class="timeline-item">
                        <div class="bg-white p-6 rounded-lg shadow border border-gray-200">
                            <div class="text-primary font-bold text-lg mb-2">1998</div>
                            <h4 class="font-bold text-gray-800 mb-2">Fundación</h4>
                            <p class="text-gray-600 text-sm">Nacimos como un pequeño taller con 5 empleados y grandes
                                sueños.</p>
                        </div>
                    </div>

                    <!-- Hito 2 -->
                    <div class="timeline-item">
                        <div class="bg-white p-6 rounded-lg shadow border border-gray-200">
                            <div class="text-primary font-bold text-lg mb-2">2005</div>
                            <h4 class="font-bold text-gray-800 mb-2">Expansión Nacional</h4>
                            <p class="text-gray-600 text-sm">Abrimos nuestras primeras 5 sucursales en diferentes ciudades
                                del país.</p>
                        </div>
                    </div>

                    <!-- Hito 3 -->
                    <div class="timeline-item">
                        <div class="bg-white p-6 rounded-lg shadow border border-gray-200">
                            <div class="text-primary font-bold text-lg mb-2">2012</div>
                            <h4 class="font-bold text-gray-800 mb-2">Innovación Tecnológica</h4>
                            <p class="text-gray-600 text-sm">Implementamos nuestro primer sistema ERP y comenzamos la
                                digitalización.</p>
                        </div>
                    </div>

                    <!-- Hito 4 -->
                    <div class="timeline-item">
                        <div class="bg-white p-6 rounded-lg shadow border border-gray-200">
                            <div class="text-primary font-bold text-lg mb-2">2020</div>
                            <h4 class="font-bold text-gray-800 mb-2">Expansión Internacional</h4>
                            <p class="text-gray-600 text-sm">Llegamos a 15 países, consolidándonos como empresa
                                multinacional.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Sección Misión y Visión -->
    <section id="mision-vision" class="py-16 bg-gray-50">
        <div class="container mx-auto px-4">
            <div class="text-center mb-12">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-800 mb-4">Nuestra esencia</h2>
                <p class="text-gray-600 max-w-3xl mx-auto">Nuestro propósito y nuestra aspiración para el futuro</p>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
                <!-- Misión -->
                <div class="card-hover bg-white rounded-lg shadow-lg p-8">
                    <div class="flex items-center mb-6">
                        <h3 class="text-2xl font-bold text-gray-800 ml-4">Nuestra Misión</h3>
                    </div>

                    <div class="bg-primary-light p-6 rounded-lg mb-6">
                        <p class="text-gray-700 text-lg font-medium leading-relaxed">
                            "Impulsar la evolución de las organizaciones a través de soluciones tecnológicas que les
                            permitan operar con mayor claridad, seguridad y eficiencia. Ponemos nuestro conocimiento,
                            experiencia y compromiso al servicio de quienes creen que la tecnología no es un fin, sino el
                            medio para crecer, conectar y transformar."
                        </p>
                    </div>

                    <h4 class="font-bold text-gray-800 mb-3 text-lg">Objetivos Estratégicos:</h4>
                    <ul class="space-y-3">
                        <li class="flex items-start">
                            <i class="fas fa-check text-primary mt-1 mr-3"></i>
                            <span class="text-gray-600">Innovar constantemente en nuestros productos y servicios</span>
                        </li>
                        <li class="flex items-start">
                            <i class="fas fa-check text-primary mt-1 mr-3"></i>
                            <span class="text-gray-600">Superar el 95% de satisfacción del cliente anualmente</span>
                        </li>
                        <li class="flex items-start">
                            <i class="fas fa-check text-primary mt-1 mr-3"></i>
                            <span class="text-gray-600">Invertir en el desarrollo continuo de nuestros colaboradores</span>
                        </li>
                        <li class="flex items-start">
                            <i class="fas fa-check text-primary mt-1 mr-3"></i>
                            <span class="text-gray-600">Implementar prácticas sostenibles en todas nuestras
                                operaciones</span>
                        </li>
                    </ul>
                </div>

                <!-- Visión -->
                <div class="card-hover bg-white rounded-lg shadow-lg p-8">
                    <div class="flex items-center mb-6">
                        <h3 class="text-2xl font-bold text-gray-800 ml-4">Nuestra Visión</h3>
                    </div>

                    <div class="bg-blue-50 p-6 rounded-lg mb-6">
                        <p class="text-gray-700 text-lg font-medium leading-relaxed">
                            "Ser el socio tecnológico más confiable para las empresas que construyen el futuro. Aspiramos a
                            liderar con innovación, pero también con empatía, cercanía y una comprensión profunda de los
                            desafíos humanos detrás de cada reto tecnológico. Queremos ser parte del cambio que mejora la
                            vida de las personas dentro y fuera de las organizaciones."
                        </p>
                    </div>

                    <h4 class="font-bold text-gray-800 mb-3 text-lg">Metas para 2030:</h4>
                    <ul class="space-y-3">
                        <li class="flex items-start">
                            <i class="fas fa-rocket text-blue-600 mt-1 mr-3"></i>
                            <span class="text-gray-600">Expandir nuestra presencia a 30 países</span>
                        </li>
                        <li class="flex items-start">
                            <i class="fas fa-rocket text-blue-600 mt-1 mr-3"></i>
                            <span class="text-gray-600">Liderar la innovación en nuestro sector con al menos 5 patentes
                                anuales</span>
                        </li>
                        <li class="flex items-start">
                            <i class="fas fa-rocket text-blue-600 mt-1 mr-3"></i>
                            <span class="text-gray-600">Ser reconocidos como el mejor lugar para trabajar en nuestra
                                industria</span>
                        </li>
                        <li class="flex items-start">
                            <i class="fas fa-rocket text-blue-600 mt-1 mr-3"></i>
                            <span class="text-gray-600">Alcanzar neutralidad de carbono en todas nuestras
                                operaciones</span>
                        </li>
                    </ul>
                </div>
            </div>

            <!-- Declaración de Propósito -->
            <div class="mt-16 bg-gradient-to-r from-orange-500 to-orange-600 rounded-xl p-8 text-white">
                <div class="max-w-4xl mx-auto text-center">
                    <h3 class="text-2xl font-bold mb-6">Nuestro Propósito Fundamental</h3>
                    <p class="text-xl mb-6 opacity-90">"Crear un impacto positivo en la sociedad a través de soluciones
                        innovadoras que mejoren la calidad de vida, mientras construimos una organización donde cada persona
                        pueda desarrollar su máximo potencial."</p>
                    <div class="flex flex-wrap justify-center gap-4 mt-8">
                        <div class="text-center">
                            <div class="text-3xl font-bold">25+</div>
                            <div class="text-sm opacity-90">Años de Experiencia</div>
                        </div>
                        <div class="text-center">
                            <div class="text-3xl font-bold">5,000+</div>
                            <div class="text-sm opacity-90">Colaboradores</div>
                        </div>
                        <div class="text-center">
                            <div class="text-3xl font-bold">15+</div>
                            <div class="text-sm opacity-90">Países</div>
                        </div>
                        <div class="text-center">
                            <div class="text-3xl font-bold">98%</div>
                            <div class="text-sm opacity-90">Satisfacción Clientes</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Sección Valores -->
    <section id="valores" class="py-16 bg-white">
        <div class="container mx-auto px-4">
            <div class="text-center mb-12">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-800 mb-4">Nuestros Valores Corporativos</h2>
                <p class="text-gray-600 max-w-3xl mx-auto">Los principios fundamentales que guían nuestras decisiones y
                    acciones diarias</p>
            </div>

            <!-- Grid de valores (3 columnas en desktop) -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Valor 1 -->
                <div class="card-hover bg-white border border-gray-200 rounded-xl p-8 text-center">
                    <div class="value-icon bg-red-100 text-red-600">
                        <i class="fas fa-heart"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 mb-4">Humanidad en la tecnología</h3>
                    <p class="text-gray-600 mb-6">Creemos en soluciones pensadas para personas. Escuchamos, comprendemos y
                        nos comprometemos con el impacto real de lo que hacemos.</p>
                    <div class="bg-red-50 p-4 rounded-lg">
                        <h4 class="font-bold text-gray-700 mb-2 text-sm">En la práctica:</h4>
                        <p class="text-gray-600 text-sm">Cumplimos lo que prometemos, comunicamos con transparencia y
                            tomamos decisiones basadas en principios éticos.</p>
                    </div>
                </div>

                <!-- Valor 2 -->
                <div class="card-hover bg-white border border-gray-200 rounded-xl p-8 text-center">
                    <div class="value-icon bg-blue-100 text-blue-600">
                        <i class="fas fa-lightbulb"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 mb-4">Compromiso auténtico</h3>
                    <p class="text-gray-600 mb-6">Acompañamos de verdad. Estamos presentes cuando más se nos necesita, con
                        atención personalizada y respuestas que marcan la diferencia.</p>
                    <div class="bg-blue-50 p-4 rounded-lg">
                        <h4 class="font-bold text-gray-700 mb-2 text-sm">En la práctica:</h4>
                        <p class="text-gray-600 text-sm">Fomentamos la creatividad, experimentamos con nuevas ideas y
                            aprendemos de cada intento.</p>
                    </div>
                </div>

                <!-- Valor 3 -->
                <div class="card-hover bg-white border border-gray-200 rounded-xl p-8 text-center">
                    <div class="value-icon bg-green-100 text-green-600">
                        <i class="fas fa-users"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 mb-4">Relaciones duraderas</h3>
                    <p class="text-gray-600 mb-6">Más allá de proyectos, construimos vínculos. Nos importan las personas,
                        sus historias y el camino que recorremos juntos.</p>
                    <div class="bg-green-50 p-4 rounded-lg">
                        <h4 class="font-bold text-gray-700 mb-2 text-sm">En la práctica:</h4>
                        <p class="text-gray-600 text-sm">Compartimos éxitos y fracasos, escuchamos diversas perspectivas y
                            construimos relaciones de confianza.</p>
                    </div>
                </div>

                <!-- Valor 4 -->
                <div class="card-hover bg-white border border-gray-200 rounded-xl p-8 text-center">
                    <div class="value-icon bg-yellow-100 text-yellow-600">
                        <i class="fas fa-trophy"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 mb-4">Innovación con sentido</h3>
                    <p class="text-gray-600 mb-6">Adoptamos nuevas tecnologías no por tendencia, sino porque creemos en su
                        capacidad para generar valor real y sostenible.</p>
                    <div class="bg-yellow-50 p-4 rounded-lg">
                        <h4 class="font-bold text-gray-700 mb-2 text-sm">En la práctica:</h4>
                        <p class="text-gray-600 text-sm">Nos enfocamos en los detalles, aprendemos continuamente y nos
                            esforzamos por superar expectativas.</p>
                    </div>
                </div>

                <!-- Valor 5 -->
                <div class="card-hover bg-white border border-gray-200 rounded-xl p-8 text-center">
                    <div class="value-icon bg-purple-100 text-purple-600">
                        <i class="fas fa-handshake"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 mb-4">Excelencia técnica con propósito</h3>
                    <p class="text-gray-600 mb-6">La calidad no es negociable. Nuestra experiencia se refleja en cada
                        entrega, en cada solución y en cada resultado medible.</p>
                    <div class="bg-purple-50 p-4 rounded-lg">
                        <h4 class="font-bold text-gray-700 mb-2 text-sm">En la práctica:</h4>
                        <p class="text-gray-600 text-sm">Cumplimos plazos, somos proactivos en la solución de problemas y
                            consideramos el impacto de nuestras acciones.</p>
                    </div>
                </div>
            </div>

            <!-- Código de Conducta -->
            <div class="mt-16 bg-gray-50 rounded-xl p-8">
                <div class="max-w-4xl mx-auto text-center">
                    <h3 class="text-2xl font-bold text-gray-800 mb-6">Nuestro Código de Conducta</h3>
                    <p class="text-gray-600 mb-8">Estos valores se traducen en comportamientos específicos que esperamos de
                        todos los miembros de nuestra organización, desde el equipo directivo hasta los nuevos
                        colaboradores.</p>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="bg-white p-6 rounded-lg shadow">
                            <h4 class="font-bold text-gray-800 mb-4 flex items-center">
                                <i class="fas fa-user-check text-primary mr-2"></i> Expectativas de Comportamiento
                            </h4>
                            <ul class="space-y-2 text-left">
                                <li class="flex items-start">
                                    <i class="fas fa-check-circle text-green-500 mt-1 mr-2"></i>
                                    <span class="text-gray-600">Respeto mutuo en todas las interacciones</span>
                                </li>
                                <li class="flex items-start">
                                    <i class="fas fa-check-circle text-green-500 mt-1 mr-2"></i>
                                    <span class="text-gray-600">Comunicación clara y transparente</span>
                                </li>
                                <li class="flex items-start">
                                    <i class="fas fa-check-circle text-green-500 mt-1 mr-2"></i>
                                    <span class="text-gray-600">Confidencialidad de información sensible</span>
                                </li>
                            </ul>
                        </div>

                        <div class="bg-white p-6 rounded-lg shadow">
                            <h4 class="font-bold text-gray-800 mb-4 flex items-center">
                                <i class="fas fa-shield-alt text-primary mr-2"></i> Compromisos Éticos
                            </h4>
                            <ul class="space-y-2 text-left">
                                <li class="flex items-start">
                                    <i class="fas fa-check-circle text-green-500 mt-1 mr-2"></i>
                                    <span class="text-gray-600">Cero tolerancia a la discriminación</span>
                                </li>
                                <li class="flex items-start">
                                    <i class="fas fa-check-circle text-green-500 mt-1 mr-2"></i>
                                    <span class="text-gray-600">Rechazo a cualquier forma de corrupción</span>
                                </li>
                                <li class="flex items-start">
                                    <i class="fas fa-check-circle text-green-500 mt-1 mr-2"></i>
                                    <span class="text-gray-600">Cumplimiento de leyes y regulaciones</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Sección Únete a Nosotros -->
    <section class="py-16 bg-gradient-to-r from-orange-500 to-orange-600 text-white">
        <div class="container mx-auto px-4">
            <div class="max-w-4xl mx-auto text-center">
                <h2 class="text-3xl md:text-4xl font-bold mb-6">¿Listo para ser Parte de Nuestra Historia?</h2>
                <p class="text-xl mb-8 opacity-90">Únete a un equipo que valora la innovación, la colaboración y el
                    crecimiento personal y profesional.</p>

                <div class="flex flex-wrap justify-center gap-4">
                    <a href="{{ route('intranet.index') }}"
                        class="bg-white text-orange-600 px-8 py-3 rounded-lg font-medium hover:bg-gray-100 text-lg">
                        <i class="fas fa-door-open mr-2"></i> Acceder al Portal
                    </a>
                </div>
            </div>
        </div>
    </section>


@endsection
@push('js')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Smooth scroll para los enlaces de navegación interna
            document.querySelectorAll('a[href^="#"]').forEach(anchor => {
                anchor.addEventListener('click', function(e) {
                    e.preventDefault();

                    const targetId = this.getAttribute('href');
                    if (targetId === '#') return;

                    const targetElement = document.querySelector(targetId);
                    if (targetElement) {
                        window.scrollTo({
                            top: targetElement.offsetTop - 80,
                            behavior: 'smooth'
                        });
                    }
                });
            });

            // Efecto de aparición para las cards
            const observerOptions = {
                threshold: 0.1,
                rootMargin: '0px 0px -50px 0px'
            };

            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.style.opacity = '1';
                        entry.target.style.transform = 'translateY(0)';
                    }
                });
            }, observerOptions);

            // Aplicar animación a las cards de valores
            document.querySelectorAll('.card-hover').forEach(card => {
                card.style.opacity = '0';
                card.style.transform = 'translateY(20px)';
                card.style.transition = 'opacity 0.5s ease, transform 0.5s ease';
                observer.observe(card);
            });

            // Descarga del código de conducta
            const downloadLink = document.querySelector('a[href*="descargar"]');
            if (downloadLink) {
                downloadLink.addEventListener('click', function(e) {
                    e.preventDefault();
                    alert('En una implementación real, esto descargaría el PDF del Código de Conducta.');
                });
            }
        });
    </script>
@endpush
