@extends('layouts.intranet')

@section('title', 'Intranet Corporativa')

@push('css')
    <link href="/assets/css/intrahome.css" rel="stylesheet">
@endpush

@section('content')
    <div class="container mx-auto py-6 px-4">
        <!-- CONTENIDO PRINCIPAL -->
        <div class="mb-6 text-center">
            <h1 class="text-4xl font-extrabold text-gray-900 relative inline-block">
                Portal de Intranet
                <!-- Línea debajo del título -->
                <div
                    class="absolute left-1/2 transform -translate-x-1/2 bottom-[-0.5rem] w-80 h-2 bg-primary rounded-full z-0">
                </div>
            </h1>
            <p class="text-gray-600 mt-8 text-lg">
                Accede a todas las herramientas y recursos de la empresa
            </p>
        </div>
    </div>

    <!-- GRID DE TARJETAS FULL WIDTH -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        <!-- Tarjeta 1 -->
        <a href="#"
            class="group flex flex-col overflow-hidden rounded-xl border border-transparent bg-white shadow-sm opacity-50 cursor-not-allowed pointer-events-none">
            <!-- Imagen de la tarjeta -->
            <div class="w-full aspect-[4/3] bg-cover bg-center transition-transform duration-300"
                style="background-image: url('{{ asset('storage/media/acceso-admin.png') }}');">
            </div>
            <!-- Texto debajo -->
            <div class="p-6 flex flex-col items-center justify-center text-center">
                <h3 class="text-2xl font-extrabold text-primary mb-2">
                    Acceso Admin
                </h3>
                <p class="text-gray-400 text-sm leading-relaxed line-clamp-2">
                    Próximamente disponible
                    <!-- Acceso a la administración de la intranet -->
                </p>
            </div>
        </a>

        <!-- Tarjeta 2: Procesos Empresariales -->
        <a href="{{ route('procesos-empresariales') }}"
            class="group flex flex-col overflow-hidden rounded-xl border border-transparent bg-white shadow-sm hover:shadow-lg transition-all duration-300 cursor-pointer">
            <!-- Imagen de la tarjeta -->
            <div class="w-full aspect-[4/3] bg-cover bg-center group-hover:scale-105 transition-transform duration-300"
                style="background-image: url('{{ asset('assets/media/estructura-interna.png') }}');">
            </div>
            <!-- Texto debajo -->
            <div class="p-6 flex flex-col items-center justify-center text-center">
                <h3
                    class="text-2xl font-extrabold text-primary mb-2 group-hover:text-orange-600 transition-colors duration-300">
                    Estructura Interna
                </h3>
                <p class="text-gray-600 text-sm leading-relaxed line-clamp-2">
                    Organigrama, proceso comercial, imagen corporativa, procesos internos RH y más...
                </p>
            </div>
        </a>

        <!-- Tarjeta 3: Nube Privada -->
        <a href="https://owncloud.netjernetworks.net" target="_blank"
            class="group flex flex-col overflow-hidden rounded-xl border border-transparent bg-white shadow-sm hover:shadow-lg opacity-50 cursor-not-allowed pointer-events-none">
            <!-- Imagen de la tarjeta -->
            <div class="w-full aspect-[4/3] bg-cover bg-center group-hover:scale-105 transition-transform duration-300"
                style="background-image: url('{{ asset('storage/media/nube-privada.png') }}');">
            </div>
            <!-- Texto debajo -->
            <div class="p-6 flex flex-col items-center justify-center text-center">
                <h3
                    class="text-2xl font-extrabold text-primary mb-2 group-hover:text-orange-600 transition-colors duration-300">
                    Nube Privada
                </h3>
                <p class="text-gray-600 text-sm leading-relaxed line-clamp-2">
                    Almacenamiento seguro y acceso a documentos corporativos
                </p>
            </div>
        </a>

        <!-- Tarjeta 4: Blog -->
        <a href="{{ route('posts.index') }}"
            class="group flex flex-col overflow-hidden rounded-xl border border-transparent bg-white shadow-sm hover:shadow-lg transition-all duration-300 cursor-pointer">
            <!-- Imagen de la tarjeta -->
            <div class="w-full aspect-[4/3] bg-cover bg-center group-hover:scale-105 transition-transform duration-300"
                style="background-image: url('{{ asset('storage/media/blog-redes.png') }}');">
            </div>
            <!-- Texto debajo -->
            <div class="p-6 flex flex-col items-center justify-center text-center">
                <h3
                    class="text-2xl font-extrabold text-primary mb-2 group-hover:text-orange-600 transition-colors duration-300">
                    Blog
                </h3>
                <p class="text-gray-600 text-sm leading-relaxed line-clamp-2">
                    Artículos, Manuales y Guias de apoyo
                </p>
            </div>
        </a>

        <!-- Tarjeta 6: Soporte -->
        <a href="{{ route('ingenieria.portal-soporte') }}"
            class="group flex flex-col overflow-hidden rounded-xl border border-transparent bg-white shadow-sm hover:shadow-lg transition-all duration-300 cursor-pointer">
            <!-- Imagen de la tarjeta -->
            <div class="w-full aspect-[4/3] bg-cover bg-center group-hover:scale-105 transition-transform duration-300"
                style="background-image: url('{{ asset('storage/media/soporte.png') }}');">
            </div>
            <!-- Texto debajo -->
            <div class="p-6 flex flex-col items-center justify-center text-center">
                <h3
                    class="text-2xl font-extrabold text-primary mb-2 group-hover:text-orange-600 transition-colors duration-300">
                    Soporte
                </h3>
                <p class="text-gray-600 text-sm leading-relaxed line-clamp-2">
                    Soporte técnico, tickets y sistema Jira
                </p>
            </div>
        </a>

        <!-- Tarjeta 7: Formación Académica -->
        <a href="{{ route('formacion-academica.index') }}"
            class="group flex flex-col overflow-hidden rounded-xl border border-transparent bg-white shadow-sm hover:shadow-lg transition-all duration-300 cursor-pointer">
            <!-- Imagen de la tarjeta -->
            <div class="w-full aspect-[4/3] bg-cover bg-center group-hover:scale-105 transition-transform duration-300"
                style="background-image: url('{{ asset('storage/media/formacion-academica.png') }}');">
            </div>
            <!-- Texto debajo -->
            <div class="p-6 flex flex-col items-center justify-center text-center">
                <h3 class="text-2xl font-extrabold text-primary mb-2">
                    Formación Académica
                </h3>
                <p class="text-gray-600 text-sm leading-relaxed line-clamp-2">
                    Videos de cursos y material audiovisual
                </p>
            </div>
        </a>

        <!-- Tarjeta 8: Biblioteca Recursos -->
        <a href="{{ route('documentos.biblioteca') }}"
            class="group flex flex-col overflow-hidden rounded-xl border border-transparent bg-white shadow-sm hover:shadow-lg transition-all duration-300 cursor-pointer">
            <!-- Imagen de la tarjeta -->
            <div class="w-full aspect-[4/3] bg-cover bg-center group-hover:scale-105 transition-transform duration-300"
                style="background-image: url('{{ asset('storage/media/biblioteca-recursos.png') }}');">
            </div>
            <!-- Texto debajo -->
            <div class="p-6 flex flex-col items-center justify-center text-center">
                <h3
                    class="text-2xl font-extrabold text-primary mb-2 group-hover:text-orange-600 transition-colors duration-300">
                    Biblioteca de Recursos
                </h3>
                <p class="text-gray-600 text-sm leading-relaxed line-clamp-2">
                    Documentos, Guias, Formatos, Plantillas, etc.
                </p>
            </div>
        </a>
        <!-- Tarjeta 8: TECHquila -->
        <a href="https://www.techquila.news/" target="_blanck"
            class="group flex flex-col overflow-hidden rounded-xl border border-transparent bg-white shadow-sm hover:shadow-lg transition-all duration-300 cursor-pointer">
            <!-- Imagen de la tarjeta -->
            <div class="w-full aspect-[4/3] bg-cover bg-center group-hover:scale-105 transition-transform duration-300"
                style="background-image: url('{{ asset('assets/media/techquila-news.png') }}');">
            </div>
            <!-- Texto debajo -->
            <div class="p-6 flex flex-col items-center justify-center text-center">
                <h3
                    class="text-2xl font-extrabold text-primary mb-2 group-hover:text-orange-600 transition-colors duration-300">
                    TECHquila News
                </h3>
                <p class="text-gray-600 text-sm leading-relaxed line-clamp-2">
                    Conoce más de tecnología y sé parte de nuestra comunidad
                </p>
            </div>
        </a>
    </div>

    <!-- Sección de Lo mas buscado -->
    <div class="mt-10 bg-white rounded-lg shadow p-6">
        <div class="flex justify-between items-center mb-4">
            <h2 class="text-xl font-bold text-gray-800">Lo mas buscado</h2>
        </div>
        <p class="text-gray-600 mb-4">Lo que los colaboradores mas revisan y requieren</p>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            <div class="border border-gray-200 rounded-lg overflow-hidden hover:border-orange-300 transition-colors">
                <img src="{{ url('/storage/media/reserva-vehiculo.png') }}" alt="reserva-vehiculo"
                    data-url="https://api.leadconnectorhq.com/widget/booking/FiuBKgXfyoEvw5l1PlTJ"
                    class="w-full h-48 object-cover" onclick="openImage(this)">
                <div class="p-4">
                    <h4 class="font-medium text-gray-800 mb-2">
                        Solicitar uso de Camioneta
                    </h4>
                    <p
                        class="inline-block bg-primary text-white px-2 py-1 text-sm rounded-lg font-semibold shadow-lg cursor-default select-none">
                        Click en la imagen
                    </p>
                </div>
            </div>
            <!-- Modal Imagen -->
            <div id="camionetaModal" class="fixed inset-0 bg-black/80 hidden items-center justify-center z-50 p-4">
                <!-- Botón cerrar -->
                <button onclick="closeImage()"
                    class="absolute top-5 right-6 text-white text-3xl font-bold hover:scale-110 transition">
                    ✕
                </button>
                <!-- Imagen en tamaño original -->
                <img id="modalImage" class="max-w-full max-h-full object-contain rounded-lg shadow-2xl">
                <!-- Botón encima -->
                <a id="modalLink" href="https://api.leadconnectorhq.com/widget/booking/FiuBKgXfyoEvw5l1PlTJ" target="_blank"
                    class="absolute bottom-6 left-1/2 -translate-x-1/2 
                        bg-primary text-white px-6 py-3 rounded-lg 
                        font-semibold shadow-lg hover:bg-primary/90 
                        transition"
                    rel="noopener noreferrer">
                    Abrir enlace
                </a>
            </div>
            <!-- Incidencias -->
            <div class="border border-gray-200 rounded-lg overflow-hidden hover:border-orange-300 transition-colors">
                <img src="{{ url('/storage/media/incidencias.png') }}" alt="incidencias" class="w-full h-48 object-cover">
                <div class="p-4">
                    <h4 class="font-medium text-gray-800 mb-2">
                        Registrar una Incidencia
                    </h4>
                    <!-- Botones centrados -->
                    <div class="flex gap-3 mt-2">
                        <a href="{{ route('administracion.incidencias') }}"
                            class="bg-primary text-white px-4 py-1 text-sm rounded-lg font-semibold shadow-lg hover:bg-primary/90 transition">
                            Ver guia
                        </a>
                        <a href="https://netjernetworksproduccion.odoo.com/vacaciones-rh" target="_blank"
                            class="bg-primary text-white px-4 py-1 text-sm rounded-lg font-semibold shadow-lg hover:bg-primary/90 transition">
                            Registrar incidencia
                        </a>
                    </div>
                </div>
            </div>

            <!-- Ticket -->
            <div class="border border-gray-200 rounded-lg overflow-hidden hover:border-orange-300 transition-colors">
                <img src="{{ url('/storage/media/genera-ticket.png') }}" alt="genera-ticket"
                    class="w-full h-48 object-cover">
                <div class="p-4">
                    <h4 class="font-medium text-gray-800 mb-2">
                        Levantar Ticket
                    </h4>
                    <a href="{{ route('ingenieria.guia-tickets') }}"
                        class="bg-primary text-white px-2 py-1 text-sm rounded-lg font-semibold shadow-lg hover:bg-primary/90 transition">
                        Ver guia
                    </a>
                </div>
            </div>
            <!-- Directorio -->
            <div class="border border-gray-200 rounded-lg overflow-hidden hover:border-orange-300 transition-colors">
                <img src="{{ url('/storage/media/directorio-telefonico.png') }}" alt="directorio-telefonico"
                    class="w-full h-48 object-cover">

                <div class="p-4">
                    <h4 class="font-medium text-gray-800 mb-2">
                        Directorio Empresarial
                    </h4>
                    <a href="{{ route('estructurainterna.directorio-empresarial') }}"
                        class="bg-primary text-white px-2 py-1 text-sm rounded-lg font-semibold shadow-lg hover:bg-primary/90 transition">
                        Ver directorio
                    </a>
                </div>
            </div>
        </div>
    </div>

    </div>
@endsection
@push('js')
    <script>
        function openImage(img) {
            const modal = document.getElementById('camionetaModal');
            const modalImg = document.getElementById('modalImage');
            const modalLink = document.getElementById('modalLink');

            modalImg.src = img.src;

            if (img.dataset.url) {
                modalLink.href = img.dataset.url;
            } else {
                modalLink.href = "#";
                console.warn("No se encontró data-url en la imagen.");
            }

            modal.classList.remove('hidden');
            modal.classList.add('flex');
        }

        function closeImage() {
            const modal = document.getElementById('camionetaModal');
            modal.classList.remove('flex');
            modal.classList.add('hidden');
        }

        document.getElementById('camionetaModal').addEventListener('click', function(e) {
            if (e.target === this) {
                closeImage();
            }
        });

        document.addEventListener('keydown', function(e) {
            if (e.key === "Escape") {
                closeImage();
            }
        });
    </script>
@endpush
