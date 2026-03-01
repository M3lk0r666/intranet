@extends('layouts.intranet')

@section('title', 'Intranet Corporativa')

@push('css')
    <!-- Include your favorite highlight.js stylesheet -->
    {{-- <link href="/assets/css/intranet.css" rel="stylesheet"> --}}
@endpush

@section('content')

    <!-- Título principal -->
    <div class="text-center mb-16">
        <h1 class="text-4xl md:text-5xl font-bold text-gray-900 mb-4">
            Bienvenido al portal de
            <span class="bg-clip-text text-transparent bg-gradient-to-r from-orange-400 to-orange-500">
                Netjer Networks México
            </span>
        </h1>
        {{-- <p
            class="text-lg text-gray-600 max-w-3xl mx-auto whitespace-normal md:whitespace-nowrap overflow-hidden text-ellipsis">
            Descubre detalles exclusivos, actualizaciones importantes y recursos escenciales para maximizar
            tu expriencia con nosotros.
        </p>
        <p class="text-lg text-gray-600 max-w-3xl mx-auto mt-6">
            Aqui podras Acceder a las herramientas y recursos de la empresa
        </p> --}}

        <!-- Sección adicional -->
        @include('layouts.includes.intra.adicional')



    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
        <!-- Acceso al Portal (CON DROPDOWN para Login/Registro) -->
        <div class="portal-btn bg-gradient-to-r from-orange-400 to-orange-500 p-8 rounded-2xl shadow-lg hover:shadow-xl flex flex-col items-center justify-center text-center group cursor-pointer"
            onclick="toggleDropdown('auth')">
            <div class="w-16 h-16 bg-white/20 rounded-full flex items-center justify-center mb-6">
                <i class="fas fa-user-lock text-white text-2xl"></i>
            </div>
            <h3 class="text-2xl font-bold text-white mb-3">Acceso al Portal</h3>
            <p class="text-white/90 mb-4">
                Área privada para empleados y colaboradores
            </p>
            <span class="text-white font-medium flex items-center gap-2">
                Ingresar <i class="fas fa-chevron-down" id="auth-chevron"></i>
            </span>

            <!-- Dropdown de autenticación -->
            <div class="custom-dropdown w-full mt-4" id="auth-dropdown">
                <div class="border-t border-white/20 pt-4">
                    <div class="space-y-3">
                        @auth
                            <a href="{{ url('admin/dashboard') }}"
                                class="block w-full px-4 py-3 bg-white/20 hover:bg-white/30 text-white font-medium rounded-lg transition-colors duration-300 text-center">
                                <i class="fas fa-tachometer-alt mr-2"></i>
                                Ir al Dashboard
                            </a>
                        @else
                            <a href="{{ route('login') }}"
                                class="block w-full px-4 py-3 bg-white text-blue-600 hover:bg-blue-50 font-medium rounded-lg transition-colors duration-300 text-center">
                                <i class="fas fa-sign-in-alt mr-2"></i>
                                Iniciar Sesión
                            </a>

                            @if (Route::has('register'))
                                <a href="{{ route('register') }}"
                                    class="block w-full px-4 py-3 bg-pink-500 hover:bg-pink-600 text-white font-medium rounded-lg transition-colors duration-300 text-center">
                                    <i class="fas fa-user-plus mr-2"></i>
                                    Registrarse
                                </a>
                            @endif
                        @endauth
                    </div>
                </div>
            </div>
        </div>


        <!-- Intranet -->
        <a href="{{ url('/intranet/procesos-internos') ?? '#' }}"
            class="portal-btn bg-white p-8 rounded-2xl shadow-lg hover:shadow-xl flex flex-col items-center justify-center text-center group">
            <div
                class="w-16 h-16 bg-blue-100 rounded-full flex items-center justify-center mb-6 group-hover:bg-blue-200 transition duration-300">
                <i class="fas fa-building text-blue-600 text-2xl"></i>
            </div>
            <h3 class="text-2xl font-bold text-gray-800 mb-3">Procesos Empresariales</h3>
            <p class="text-gray-600 mb-4">
                Acceso a documentos internos, directorio y herramientas corporativas
            </p>
            <span class="text-blue-600 font-medium flex items-center gap-2">
                Ir al portal <i class="fas fa-arrow-right"></i>
            </span>
        </a>

        <!-- Nube Privada -->
        <a href="http://owncloud.netjernetworks.net"
            class="portal-btn
        bg-white p-8 rounded-2xl shadow-lg hover:shadow-xl flex flex-col items-center justify-center
        text-center group"
            target="_blank">
            <div
                class="w-16 h-16 bg-purple-100 rounded-full flex items-center justify-center mb-6 group-hover:bg-purple-200 transition duration-300">
                <i class="fas fa-cloud text-purple-600 text-2xl"></i>
            </div>
            <h3 class="text-2xl font-bold text-gray-800 mb-3">Nube Privada</h3>
            <p class="text-gray-600 mb-4">
                Almacenamiento seguro y compartido de archivos
            </p>
            <span class="text-purple-600 font-medium flex items-center gap-2">
                Acceder al portal <i class="fas fa-arrow-right"></i>
            </span>
        </a>

        <!-- Blog -->
        <a href="{{ url('/posts') ?? '#' }}"
            class="portal-btn bg-white p-8 rounded-2xl shadow-lg hover:shadow-xl flex flex-col items-center justify-center text-center group">
            <div
                class="w-16 h-16 bg-green-100 rounded-full flex items-center justify-center mb-6 group-hover:bg-green-200 transition duration-300">
                <i class="fas fa-blog text-green-600 text-2xl"></i>
            </div>
            <h3 class="text-2xl font-bold text-gray-800 mb-3">Blog</h3>
            <p class="text-gray-600 mb-4">
                Artículos, Manuales y Guias de apoyo
            </p>
            <span class="text-green-600 font-medium flex items-center gap-2">
                Ver posts <i class="fas fa-arrow-right"></i>
            </span>
        </a>

        <!-- Redes Sociales (CON DROPDOWN) -->
        <div class="portal-btn bg-white p-8 rounded-2xl shadow-lg hover:shadow-xl flex flex-col items-center justify-center text-center group cursor-pointer"
            onclick="toggleDropdown('social')">
            <div
                class="w-16 h-16 bg-pink-100 rounded-full flex items-center justify-center mb-6 group-hover:bg-pink-200 transition duration-300">
                <i class="fas fa-share-alt text-pink-600 text-2xl"></i>
            </div>
            <h3 class="text-2xl font-bold text-gray-800 mb-3">Redes Sociales</h3>
            <p class="text-gray-600 mb-4">
                Conéctate con nosotros en nuestras redes sociales
            </p>
            <span class="text-pink-600 font-medium flex items-center gap-2">
                Ver redes <i class="fas fa-chevron-down" id="social-chevron"></i>
            </span>

            <!-- Dropdown de redes sociales -->
            <div class="custom-dropdown w-full mt-4" id="social-dropdown">
                <div class="border-t border-gray-100 pt-4">
                    <div class="grid grid-cols-2 gap-2">
                        <a href="https://www.facebook.com/NetjerNetworks?locale=es_LA" target="_blank"
                            class="px-3 py-2 bg-blue-50 hover:bg-blue-100 rounded-lg flex items-center justify-center gap-2 transition-colors">
                            <i class="fab fa-facebook text-blue-600"></i>
                            <span class="text-sm font-medium">Facebook</span>
                        </a>
                        <a href="https://www.instagram.com/netjernetworks" target="_blank"
                            class="px-3 py-2 bg-pink-50 hover:bg-pink-100 rounded-lg flex items-center justify-center gap-2 transition-colors">
                            <i class="fab fa-instagram text-pink-600"></i>
                            <span class="text-sm font-medium">Instagram</span>
                        </a>
                        <a href="https://www.linkedin.com/company/netjernetworks/" target="_blank"
                            class="px-3 py-2 bg-blue-50 hover:bg-blue-100 rounded-lg flex items-center justify-center gap-2 transition-colors">
                            <i class="fab fa-linkedin text-blue-700"></i>
                            <span class="text-sm font-medium">LinkedIn</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Contacto o soporte -->
        <a href="https://netjernetworks.atlassian.net/servicedesk/customer/user/login?destination=portals" target="_blanck"
            class="portal-btn bg-white p-8 rounded-2xl shadow-lg hover:shadow-xl flex flex-col items-center justify-center text-center group">
            <div
                class="w-16 h-16 bg-amber-100 rounded-full flex items-center justify-center mb-6 group-hover:bg-amber-200 transition duration-300">
                <i class="fas fa-headset text-amber-600 text-2xl"></i>
            </div>
            <h3 class="text-2xl font-bold text-gray-800 mb-3">Tickets y Soporte</h3>
            <p class="text-gray-600 mb-4">
                ¿Necesitas ayuda? Levanta tu solicitud en Jira para poder atenderte
            </p>
            <span class="text-amber-600 font-medium flex items-center gap-2">
                Ir al portal <i class="fas fa-arrow-right"></i>
            </span>
        </a>

        <!-- Formación Académica -->
        {{-- <a href="{{ url('/intranet/formacion-academica') ?? '#' }}" --}}
        <a href="{{ route('intranet.formacion-academica') ?? '#' }}"
            class="portal-btn bg-white p-8 rounded-2xl shadow-lg hover:shadow-xl flex flex-col items-center justify-center text-center group">
            <div
                class="w-16 h-16 bg-blue-100 rounded-full flex items-center justify-center mb-6 group-hover:bg-blue-200 transition duration-300">
                <i class="fas fa-graduation-cap text-blue-600 text-2xl"></i>
            </div>
            <h3 class="text-2xl font-bold text-gray-800 mb-3">Formación Académica</h3>
            <p class="text-gray-600 mb-4">
                Acceso al contenido de especialización y desarrollo
            </p>
            <span class="text-blue-600 font-medium flex items-center gap-2">
                Ir a la seccion <i class="fas fa-arrow-right"></i>
            </span>
        </a>
    </div>


    <!-- Footer -->
    {{-- @include('layouts.includes.intra.footer') --}}
@endsection
@push('js')
    <!-- Include the Dropdown -->
    <script src="{{ asset('/assets/scripts/dropintro.js') }}"></script>
@endpush
