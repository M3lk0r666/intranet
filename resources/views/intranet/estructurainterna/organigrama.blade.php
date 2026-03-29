@extends('layouts.intranet')

@section('title', 'Organigrama')

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
                            <a href="{{ route('procesos-empresariales') }}"
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

    <div class="w-full px-6 py-10">

        <!-- HEADER -->
        <div class="text-center mb-8">
            <h2 class="text-3xl font-bold text-slate-800">
                Estructura Organizacional
            </h2>
            <p class="text-sm text-slate-500 mt-2">
                Organigrama interactivo
            </p>
        </div>

        <div class="max-w-5xl mx-auto">
            <div class="flex flex-wrap justify-center gap-4 mb-8">
                <span class="flex items-center gap-2 text-xs bg-white border px-3 py-1 rounded-full">
                    <span class="w-2 h-2 bg-primary rounded-full"></span>
                    CEO
                </span>
                <span class="flex items-center gap-2 text-xs bg-white border px-3 py-1 rounded-full">
                    <span class="w-2 h-2 bg-slate-400 rounded-full"></span>
                    Directores
                </span>
            </div>

            <!-- CEO -->
            <div class="flex flex-col items-center">
                <div class="bg-orange-500 text-white p-6 w-72 rounded-2xl shadow-lg text-center">
                    <div class="flex flex-col items-center text-center">
                        <img src="{{ asset('storage/media/male.png') }}"
                            class="w-16 h-16 rounded-full object-cover border-2 border-white shadow mb-3">
                        <h3 class="font-bold text-lg">Xavier Martinez</h3>
                        <p class="text-sm opacity-90">CEO</p>
                    </div>
                </div>

                <div class="w-[2px] h-16 bg-slate-300"></div>

                <!-- DIRECTORES -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-12 w-full">
                    <!-- DIRECTOR -->
                    <div class="flex flex-col items-center">
                        <div onclick="toggleNode('director1')"
                            class="cursor-pointer bg-white border border-slate-200 p-5 w-full max-w-xs rounded-xl shadow-sm text-center hover:shadow-md transition">
                            {{-- <div onclick="toggleNode('director1')"
                                class="cursor-pointer bg-white border border-slate-200 p-5 w-full max-w-xs rounded-xl shadow-sm text-center hover:shadow-md transition">
                                <img src="{{ asset('storage/media/male.png') }}"
                                    class="w-14 h-14 rounded-full object-cover mx-auto mb-2 border border-slate-200 shadow-sm">
                                <h4 class="font-bold text-sm text-slate-800">
                                    Rogelio Marín
                                </h4>
                                <p class="text-xs text-slate-500">CEO Adjunto</p>
                            </div> --}}
                            <div onclick='openProfile({
                                name: "Rogelio Marín",
                                role: "CEO Adjunto",
                                area: "Business & Solution Development",
                                email: "rogelio@empresa.com",
                                photo: "{{ asset('storage/media/male.png') }}", extra: "Lidera desarrollo de soluciones"})'
                                class="cursor-pointer bg-orange-500 border border-slate-200 p-5 rounded-xl shadow-sm text-center hover:shadow-md transition">
                                <img src="{{ asset('storage/media/male.png') }}"
                                    class="w-14 h-14 rounded-full mx-auto mb-2">
                                <h4 class="font-bold text-sm">Rogelio Marín</h4>
                            </div>
                            <span class="text-[20px] text-primary mt-2 block">
                                Ver áreas ↓
                            </span>
                        </div>

                        <div class="w-[2px] h-10 bg-slate-300"></div>
                        <!-- ÁREAS -->
                        <div id="director1" class="hidden space-y-6 w-full max-w-sm">
                            <!-- AREA -->
                            <div class="flex flex-col items-center">
                                <div onclick="toggleNode('area1')"
                                    class="cursor-pointer bg-primary/10 border border-primary/20 px-4 py-2 rounded-xl text-xs font-bold text-primary text-center w-full">
                                    SERVICE DESIGN
                                </div>
                                <div class="w-[2px] h-6 bg-slate-300"></div>
                                <!-- SUBAREAS -->
                                <div id="area1" class="hidden flex flex-wrap justify-center gap-3">
                                    {{-- <div class="tree-item">
                                        <p>UX</p>
                                        <span>Carlos Jurado</span>
                                    </div> --}}
                                    {{-- <div class="tree-item flex flex-col items-center gap-2">
                                        <img src="{{ asset('storage/media/male.png') }}"
                                            class="w-10 h-10 rounded-full object-cover border border-slate-200 shadow-sm">

                                        <p class="text-xs font-semibold text-slate-700">
                                            UX
                                        </p>

                                        <span class="text-[10px] text-slate-500">
                                            Carlos Jurado
                                        </span>

                                    </div> --}}
                                    <div onclick='openProfile({
                                        name: "Carlos Junco",
                                        role: "UX Lead",
                                        area: "Service Design",
                                        email: "carlos@empresa.com",
                                        photo: "{{ asset('storage/media/male.png') }}" })'
                                        class="tree-item cursor-pointer">
                                        <img src="{{ asset('storage/media/male.png') }}"
                                            class="w-10 h-10 rounded-full mx-auto mb-1">
                                        <p>UX</p>
                                        <span>Carlos Junco</span>
                                    </div>

                                    <div class="tree-item">
                                        <p>Preventa</p>
                                        <span>Equipo Técnico</span>
                                    </div>

                                    <div class="tree-item">
                                        <p>Arquitectura</p>
                                        <span>Infraestructura</span>
                                    </div>

                                </div>

                            </div>

                            <!-- AREA -->
                            <div class="flex flex-col items-center">

                                <div onclick="toggleNode('area2')"
                                    class="cursor-pointer bg-primary/10 border border-primary/20 px-4 py-2 rounded-xl text-xs font-bold text-primary text-center w-full">
                                    SOLUTION DEVELOPMENT
                                </div>

                                <div class="w-[2px] h-6 bg-slate-300"></div>

                                <div id="area2" class="hidden flex flex-wrap justify-center gap-3">

                                    <div class="tree-item">Fabricantes</div>
                                    <div class="tree-item">Gobierno</div>
                                    <div class="tree-item">Educación</div>

                                </div>

                            </div>

                        </div>

                    </div>
                    <!-- DIRECTOR 2 -->
                    <div class="flex flex-col items-center">
                        <div onclick="toggleNode('director2')"
                            class="cursor-pointer bg-orange-500 border border-slate-200 p-5 w-full max-w-xs rounded-xl shadow-sm text-center hover:shadow-md transition">
                            {{-- <h4 class="font-bold text-sm text-slate-800">
                                Giselle Martinez
                            </h4>
                            <p class="text-xs text-slate-500">Administración</p> --}}
                            <div onclick="toggleNode('director1')"
                                class="cursor-pointer bg-white border border-slate-200 p-5 w-full max-w-xs rounded-xl shadow-sm text-center hover:shadow-md transition">
                                <img src="{{ asset('storage/media/female.png') }}"
                                    class="w-14 h-14 rounded-full object-cover mx-auto mb-2 border border-slate-200 shadow-sm">
                                <h4 class="font-bold text-sm text-slate-800">
                                    Giselle Martinez
                                </h4>
                                <p class="text-xs text-slate-500">Finanzas & Administración</p>
                            </div>
                            <span class="text-[10px] text-primary mt-2 block">
                                Ver áreas ↓
                            </span>
                        </div>
                        <div class="w-[2px] h-10 bg-slate-300"></div>
                        <div id="director2" class="hidden space-y-6 w-full max-w-sm">
                            <div class="flex flex-col items-center">
                                <div onclick="toggleNode('area3')"
                                    class="cursor-pointer bg-primary/10 border border-primary/20 px-4 py-2 rounded-xl text-xs font-bold text-primary text-center w-full">
                                    ADMINISTRACIÓN
                                </div>
                                <div class="w-[2px] h-6 bg-slate-300"></div>
                                <div id="area3" class="hidden space-y-3 w-full">
                                    <div class="tree-item">Reclutamiento</div>
                                    <div class="tree-item">Nómina</div>
                                    <div class="tree-item">Capacitación</div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="flex flex-col items-center">
                        <!-- DIRECTOR -->
                        <div onclick="toggleNode('director3')" class="card-director">
                            Marketing
                        </div>
                        <div id="director3" class="hidden">
                            <!-- ÁREAS -->
                            <!-- mismas reglas -->
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="w-full px-6 py-10">

            <div class="max-w-2xl mx-auto">
                <div class="bg-white border border-slate-200 rounded-2xl shadow-sm p-8 text-center">
                    <!-- Imagen / Icono -->
                    <div class="flex justify-center mb-8">
                        <div
                            class="w-44 h-44 rounded-full overflow-hidden border-4 border-primary shadow-xl ring-4 ring-primary/10">
                            <img src="{{ asset('assets/media/trabajando-enello.png') }}"
                                class="w-full h-full object-cover">
                        </div>
                    </div>

                    <!-- Título -->
                    <h2 class="text-xl font-bold text-slate-800 mb-2">
                        Estamos trabajando en esta sección
                    </h2>

                    <!-- Descripción -->
                    <p class="text-sm text-slate-500 leading-relaxed mb-6">
                        La vista de <span class="font-semibold text-slate-700">Organigrama</span> aún está en desarrollo.
                        Actualmente se están realizando cambios dentro de la organización, por lo que la estructura de la
                        empresa se encuentra en actualización.
                    </p>

                    <p class="text-sm text-slate-500">
                        Muy pronto estará disponible con la información actualizada.
                    </p>

                    <!-- Badge opcional -->
                    <div class="mt-6">
                        <span
                            class="inline-flex items-center gap-2 px-3 py-1 text-xs font-semibold text-primary bg-primary/10 rounded-full">
                            <i class="las la-clock text-sm"></i>
                            En proceso
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- MODAL PERFIL -->
    <div id="profileModal" class="fixed inset-0 bg-black/50 backdrop-blur-sm hidden items-center justify-center z-50">
        <div class="bg-white rounded-2xl shadow-xl w-full max-w-md p-6 relative animate-fadeIn">
            <!-- Botón cerrar -->
            <button onclick="closeProfileModal()" class="absolute top-3 right-3 text-slate-400 hover:text-slate-600">
                ✕
            </button>
            <!-- CONTENIDO -->
            <div class="flex flex-col items-center text-center">
                <img id="modal-photo" class="w-20 h-20 rounded-full object-cover border-2 border-slate-200 shadow mb-3">
                <h3 id="modal-name" class="text-lg font-bold text-slate-800"></h3>
                <p id="modal-role" class="text-sm text-primary font-medium"></p>
                <p id="modal-area" class="text-xs text-slate-500 mt-1"></p>
                <div class="mt-4 w-full border-t pt-4 text-sm text-slate-600 space-y-2">
                    <p id="modal-email"></p>
                    <p id="modal-extra"></p>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('styles')
    <style>
        .tree-item {
            background: white;
            border: 1px solid #e2e8f0;
            padding: 10px;
            border-radius: 10px;
            font-size: 12px;
            text-align: center;
            min-width: 120px;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.05);
        }

        .tree-item span {
            display: block;
            font-size: 10px;
            color: #64748b;
        }

        /* Animación */
        .hidden {
            display: none;
        }

        .tree-item {
            transition: all 0.2s ease;
        }

        .tree-item:hover {
            transform: translateY(-3px);
            box-shadow: 0 6px 14px rgba(0, 0, 0, 0.08);
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: scale(0.95);
            }

            to {
                opacity: 1;
                transform: scale(1);
            }
        }

        .animate-fadeIn {
            animation: fadeIn 0.2s ease-out;
        }
    </style>
@endpush

@push('js')
    <script>
        function toggleNode(id) {
            const el = document.getElementById(id);

            if (el.classList.contains('hidden')) {
                el.classList.remove('hidden');
            } else {
                el.classList.add('hidden');
            }
        }

        function openProfile(data) {

            document.getElementById('modal-photo').src = data.photo;
            document.getElementById('modal-name').innerText = data.name;
            document.getElementById('modal-role').innerText = data.role;
            document.getElementById('modal-area').innerText = data.area;
            document.getElementById('modal-email').innerText = "📧 " + (data.email ?? '');
            document.getElementById('modal-extra').innerText = data.extra ?? '';

            const modal = document.getElementById('profileModal');
            modal.classList.remove('hidden');
            modal.classList.add('flex');
        }

        function closeProfileModal() {
            const modal = document.getElementById('profileModal');
            modal.classList.add('hidden');
            modal.classList.remove('flex');
        }

        // cerrar al dar click afuera
        document.getElementById('profileModal').addEventListener('click', function(e) {
            if (e.target === this) closeProfileModal();
        });
    </script>
@endpush
