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
                    <li aria-current="page">
                        <div class="flex items-center">
                            <i class="fas fa-chevron-right text-gray-400 mx-2"></i>
                            <span class="ml-1 text-sm text-primary font-medium md:ml-2">Biblioteca</span>
                        </div>
                    </li>
                </ol>
            </nav>
        </div>
    </div>

    <!-- Encabezado -->
    <div class="mt-8 mb-8">
        <h1 class="text-3xl font-black text-slate-900 tracking-tight mb-2">Biblioteca de Recursos Materiales</h1>
        <p class="text-slate-500  mt-2">Acceda a documentacion, guías, tutoriales, formatos y plantillas oficiales de la
            empresa.</p>
    </div>

    <div class="bg-white rounded-lg shadow p-6 mb-8">
        <div class="w-full">
            <div class="max-w-7xl mx-auto px-6 py-10">
                <!-- Categories Grid -->
                <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">
                    <!-- Category 1: Ingeniería -->
                    <div
                        class="group flex flex-col overflow-hidden rounded-md border border-neutral-surface bg-white shadow-soft transition-all duration-200 card-hover cursor-pointer">
                        <div class="h-40 w-full bg-slate-100 bg-cover bg-center"
                            data-alt="Technical engineering blueprints and circuit boards"
                            style="background-image: url('https://lh3.googleusercontent.com/aida-public/AB6AXuCEReSo6Lx-THeSJytrAUGb6rYzq_0sG20ETNeESPBlfJ2u8SZIOoHCukyIgNqHomHoWIXUEyABb_xB1ogyv9FDyySljMHnq-wAagTOlsBRih3l-fWKtD0MPuhpHrUL2Jb4kOqVgsZXRZ7Qxfb3ScJm1vPLcxl437WwwaoQlcDE34tsmRf-XN6k_TY9ptSmJgXJwU_7AsgWZBiXxZTc2AEdcaBenHFuTdC_bMeoVmKEeCMrKVsXRXNtVtCQhSSeoNbnVVbIiYIr7F0')">
                        </div>
                        <div class="flex flex-1 flex-col p-5">
                            <div class="mb-2 flex items-center gap-2 text-primary">
                                <i class="las la-headset text-xl"></i>
                                <span class="text-xs font-bold uppercase tracking-wider">Técnico</span>
                            </div>
                            <h3 class="mb-1 text-lg font-bold text-near-black">Ingeniería</h3>
                            <p class="text-sm text-slate-500 leading-relaxed">Documentación técnica, repositorios de código
                                y
                                manuales de arquitectura.</p>
                        </div>
                    </div>
                    <!-- Category 2: Finanzas -->
                    <div
                        class="group flex flex-col overflow-hidden rounded-md border border-neutral-surface bg-white shadow-soft transition-all duration-200 card-hover cursor-pointer">
                        <div class="h-40 w-full bg-slate-100 bg-cover bg-center"
                            data-alt="Financial charts and calculation tools on a desk"
                            style="background-image: url('https://lh3.googleusercontent.com/aida-public/AB6AXuBn4CA7srTZdV-20jCVxMv9U47Rf1kJQ4VrW8apziNgI1agpSlST1-b5WInBbsPX5x8rzfP3jBABQu2nQoYs_YSfib3ZJ8GZ9ZSKRO0wsC80QAeMhAprhjpgsSkOOAQ2BH7PCG4zkNIzIr4k3GBDfDMH28gMqsKRw6hgfEKiX8JbvYmIG9a05RdYpv0td7t-_0U_QErKclpBXRHYRP_TxtkzOr9C06QbeBB0VYa5glkf0Kido18G4wnDoNuGZ1ejB0jW7EbwNiXkYI')">
                        </div>
                        <div class="flex flex-1 flex-col p-5">
                            <div class="mb-2 flex items-center gap-2 text-primary">
                                <i class="las la-comment-dollar text-xl"></i>
                                <span class="text-xs font-bold uppercase tracking-wider">Administrativo</span>
                            </div>
                            <h3 class="mb-1 text-lg font-bold text-near-black">Finanzas</h3>
                            <p class="text-sm text-slate-500 leading-relaxed">Informes trimestrales, presupuestos y
                                plantillas
                                de control de gastos.</p>
                        </div>
                    </div>
                    <!-- Category 3: Administración -->
                    <div
                        class="group flex flex-col overflow-hidden rounded-md border border-neutral-surface bg-white shadow-soft transition-all duration-200 card-hover cursor-pointer">
                        <div class="h-40 w-full bg-slate-100 bg-cover bg-center"
                            data-alt="Modern corporate office interior and paperwork"
                            style="background-image: url('https://lh3.googleusercontent.com/aida-public/AB6AXuD54UP1LobVaQfE4uogK2S-9Zc5UST6WbKcgbh32wTbaybmxOm4jUjf9pg3LfmUEr57PLHdQ7Oxj70QRM5zVW3P_RTZHuMp2cyTBLWh_br4GWS_j3cmu1F1nni6DteWMNgfzAvlCAVDTvNUC9d3SK33XrZ-Q5WtnOP7229dZKuII_UcbDybyNtc79D1gjIYEvq3ty_9gg5ghq8NrB0-J-gEl1GN7HcmLRbGTFo1DVG9rQ6QFNup1tPMyBFsSjZPLHxQQqstD1JfCDM')">
                        </div>
                        <div class="flex flex-1 flex-col p-5">
                            <div class="mb-2 flex items-center gap-2 text-primary">
                                <i class="las la-gavel text-xl"></i>
                                <span class="text-xs font-bold uppercase tracking-wider">Legal &amp; RRHH</span>
                            </div>
                            <h3 class="mb-1 text-lg font-bold text-near-black">Administración</h3>
                            <p class="text-sm text-slate-500 leading-relaxed">Políticas internas, manual de conducta y
                                documentos de Recursos Humanos.</p>
                        </div>
                    </div>
                    <!-- Category 4: Formatos -->
                    <div
                        class="group flex flex-col overflow-hidden rounded-md border border-neutral-surface bg-white shadow-soft transition-all duration-200 card-hover cursor-pointer">
                        <div class="h-40 w-full bg-slate-100 bg-cover bg-center"
                            data-alt="Stacked official documents and stationary"
                            style="background-image: url('https://lh3.googleusercontent.com/aida-public/AB6AXuBxbCO_4k-DIfLtvLy7tpbRFGMxhDHGb5XMHUjcr1Pep-_ioy8gTd4h5XSBmzou8K44VcjBi-tlQjTwulszeO_NThd_bSeiZNWOemm5aZw8w3iZ5ikRW05KRZiss63cUXGoyDo0jrCnb_B7uKn1V6iCkVNRSPZfrmc-bZ2P4YQUkx8Xc6TxR-pK9M4dolTZZI1ulMhEdgfJLRpfhdCcWhzvTCMhBLiy9e_0Rd1whoXW6_3r6udfijy8lO6eW1R-5978EAwiV9iuxSY')">
                        </div>
                        <div class="flex flex-1 flex-col p-5">
                            <div class="mb-2 flex items-center gap-2 text-primary">
                                <i class="las la-file-alt text-xl"></i>
                                <span class="text-xs font-bold uppercase tracking-wider">Corporativo</span>
                            </div>
                            <h3 class="mb-1 text-lg font-bold text-near-black">Formatos</h3>
                            <p class="text-sm text-slate-500 leading-relaxed">Formatos oficiales para solicitudes, permisos
                                y
                                registros corporativos.</p>
                        </div>
                    </div>
                    <!-- Category 5: Plantillas -->
                    <div
                        class="group flex flex-col overflow-hidden rounded-md border border-neutral-surface bg-white shadow-soft transition-all duration-200 card-hover cursor-pointer">
                        <div class="h-40 w-full bg-slate-100 bg-cover bg-center"
                            data-alt="Digital presentation slides and report templates"
                            style="background-image: url('https://lh3.googleusercontent.com/aida-public/AB6AXuBsa6FmRrcGorfeW7fSrDNHqcGom6FvUC-8QhLLa05TpVFe45m3EoCZ2V08yS1YPsBO91-3LuJiwHqSgMFbsDHByWLWkPH6dAAL9h2HnKe8hEWBLql0rrUdbW9m_-Vqd7fyIwqQhOegutmBN85-pqsczVjXNJLY-AupQIVMquqHlVpFBcP2OREBFxBgt47-LWBHEq0-JtQ-88GMxX91hBkfvQoB6ZR71fxHH5MOuoWnnlAKfzZwLUbtrLwAKV9K6-qhXJDXYbbVvEc')">
                        </div>
                        <div class="flex flex-1 flex-col p-5">
                            <div class="mb-2 flex items-center gap-2 text-primary">
                                <i class="las la-marker text-xl"></i>
                                <span class="text-xs font-bold uppercase tracking-wider">Diseño</span>
                            </div>
                            <h3 class="mb-1 text-lg font-bold text-near-black">Plantillas</h3>
                            <p class="text-sm text-slate-500 leading-relaxed">Maestros de presentación (PPTX) y plantillas
                                para
                                reportes institucionales.</p>
                        </div>
                    </div>
                    <!-- Category 6: Guías -->
                    <div
                        class="group flex flex-col overflow-hidden rounded-md border border-neutral-surface bg-white shadow-soft transition-all duration-200 card-hover cursor-pointer">
                        <div class="h-40 w-full bg-slate-100 bg-cover bg-center"
                            data-alt="Someone working on a laptop with digital help icons"
                            style="background-image: url('https://lh3.googleusercontent.com/aida-public/AB6AXuAW9H04hRuJE1NLXsUK_5Z9xMiwhx6gX0KZmwNbshudsv4DQ_qyuC8lYCKevvpnwn4-bT3KmNE4vB_XfywV1nRqEcTXCJ70z126J35IVAIvyZ0nIhJzvXVbLZnVqXS1lus17acUsdQtcT8-Dy3XtCwxBSzpoKgtXXqTiT3xY911nbGe_L8u2c2unQtIEOszhi2ulzb87YHx5NvC8Yt3RhnRw9kXSh4bDXF7imzVBXWkzE7rj5rzetTTnKKS6T7KQ-yL-SoB2iebPc4')">
                        </div>
                        <div class="flex flex-1 flex-col p-5">
                            <div class="mb-2 flex items-center gap-2 text-primary">
                                <i class="las la-headset text-xl"></i>
                                <span class="text-xs font-bold uppercase tracking-wider">Soporte</span>
                            </div>
                            <h3 class="mb-1 text-lg font-bold text-near-black">Guías</h3>
                            <p class="text-sm text-slate-500 leading-relaxed">Tutoriales paso a paso para el uso de
                                herramientas
                                y sistemas internos.</p>
                        </div>
                    </div>
                    <!-- Category 7: Manuales -->
                    <div
                        class="group flex flex-col overflow-hidden rounded-md border border-neutral-surface bg-white shadow-soft transition-all duration-200 card-hover cursor-pointer">
                        <div class="h-40 w-full bg-slate-100 bg-cover bg-center"
                            data-alt="Physical binder books and process manuals"
                            style="background-image: url('https://lh3.googleusercontent.com/aida-public/AB6AXuA1gJBwnrrrURqAkPtBDuuyGPR_uqot_82DtjlOsqKqakLtdW-wc7wCg8moG3E9H91tJW1O_l2vqecFVsJ_mvq5jiSRHtcAnhfr6KmuWKVC7cN33wx9U3yTddKhpukyN1dCzoZZiyJugtEqGOLYBITCVq9ubQfbPEqvA5rEJq1nWKSN4BixqWZ7i2ccNUN2Fe2MAf2NW1RcQFdgswgFZgaMhR4oVY39PKblnHQFGE6r7ETLCruoFnffpy7SwCFp3c0a6wWLIAJshNI')">
                        </div>
                        <div class="flex flex-1 flex-col p-5">
                            <div class="mb-2 flex items-center gap-2 text-primary">
                                <i class="las la-book-open text-xl"></i>
                                <span class="text-xs font-bold uppercase tracking-wider">Procesos</span>
                            </div>
                            <h3 class="mb-1 text-lg font-bold text-near-black">Manuales</h3>
                            <p class="text-sm text-slate-500 leading-relaxed">Manuales integrales de procesos operativos y
                                estándares de calidad.</p>
                        </div>
                    </div>
                    <!-- Action Card (Generic) -->
                    <div
                        class="flex flex-col items-center justify-center overflow-hidden rounded-md border-2 border-dashed border-slate-200 bg-neutral-surface p-8 transition-colors hover:border-primary/40 group cursor-pointer">
                        <div
                            class="mb-4 flex h-14 w-14 items-center justify-center rounded-full bg-white text-primary shadow-sm group-hover:bg-primary group-hover:text-white transition-colors">
                            <i class="las la-plus text-3xl"></i>
                        </div>
                        <p class="font-bold text-near-black">Solicitar Recurso</p>
                        <p class="text-center text-xs text-slate-400 mt-2">¿No encuentras lo que buscas? Contacta a
                            Soporte.</p>
                    </div>
                </div>
                <!-- Recent Documents Section -->
                {{-- <section class="mt-16">
                    <div class="mb-6 flex items-center justify-between">
                        <h3 class="text-2xl font-bold text-near-black">Documentos Recientes</h3>
                        <button class="text-sm font-semibold text-primary hover:underline">Ver todo el historial</button>
                    </div>
                    <div class="space-y-3">
                        <!-- Document Item 1 -->
                        <div
                            class="flex items-center justify-between rounded-md border border-neutral-surface bg-white p-4 shadow-soft">
                            <div class="flex items-center gap-4">
                                <div
                                    class="flex h-12 w-12 shrink-0 items-center justify-center rounded-md bg-neutral-surface text-near-black">
                                    <span class="material-symbols-outlined">picture_as_pdf</span>
                                </div>
                                <div>
                                    <p class="font-medium text-near-black">Manual de Bienvenida 2024.pdf</p>
                                    <p class="text-xs text-slate-500 uppercase tracking-tight">Recursos Humanos •
                                        Actualizado
                                        hace 2 horas</p>
                                </div>
                            </div>
                            <div class="flex gap-2">
                                <button
                                    class="flex h-9 w-9 items-center justify-center rounded-md border border-neutral-surface hover:bg-neutral-surface transition-colors">
                                    <span class="material-symbols-outlined text-xl">visibility</span>
                                </button>
                                <button
                                    class="flex h-9 w-9 items-center justify-center rounded-md bg-primary text-white shadow-sm hover:opacity-90 transition-opacity">
                                    <span class="material-symbols-outlined text-xl">download</span>
                                </button>
                            </div>
                        </div>
                        <!-- Document Item 2 -->
                        <div
                            class="flex items-center justify-between rounded-md border border-neutral-surface bg-white p-4 shadow-soft">
                            <div class="flex items-center gap-4">
                                <div
                                    class="flex h-12 w-12 shrink-0 items-center justify-center rounded-md bg-neutral-surface text-near-black">
                                    <span class="material-symbols-outlined">table_view</span>
                                </div>
                                <div>
                                    <p class="font-medium text-near-black">Plantilla_Presupuesto_V2.xlsx</p>
                                    <p class="text-xs text-slate-500 uppercase tracking-tight">Finanzas • Actualizado ayer
                                    </p>
                                </div>
                            </div>
                            <div class="flex gap-2">
                                <button
                                    class="flex h-9 w-9 items-center justify-center rounded-md border border-neutral-surface hover:bg-neutral-surface transition-colors">
                                    <span class="material-symbols-outlined text-xl">visibility</span>
                                </button>
                                <button
                                    class="flex h-9 w-9 items-center justify-center rounded-md bg-primary text-white shadow-sm hover:opacity-90 transition-opacity">
                                    <span class="material-symbols-outlined text-xl">download</span>
                                </button>
                            </div>
                        </div>
                        <!-- Document Item 3 -->
                        <div
                            class="flex items-center justify-between rounded-md border border-neutral-surface bg-white p-4 shadow-soft">
                            <div class="flex items-center gap-4">
                                <div
                                    class="flex h-12 w-12 shrink-0 items-center justify-center rounded-md bg-neutral-surface text-near-black">
                                    <span class="material-symbols-outlined">present_to_all</span>
                                </div>
                                <div>
                                    <p class="font-medium text-near-black">Master_Corporativo_2024.pptx</p>
                                    <p class="text-xs text-slate-500 uppercase tracking-tight">Comunicaciones • Actualizado
                                        hace 3 días</p>
                                </div>
                            </div>
                            <div class="flex gap-2">
                                <button
                                    class="flex h-9 w-9 items-center justify-center rounded-md border border-neutral-surface hover:bg-neutral-surface transition-colors">
                                    <span class="material-symbols-outlined text-xl">visibility</span>
                                </button>
                                <button
                                    class="flex h-9 w-9 items-center justify-center rounded-md bg-primary text-white shadow-sm hover:opacity-90 transition-opacity">
                                    <span class="material-symbols-outlined text-xl">download</span>
                                </button>
                            </div>
                        </div>
                    </div>
                </section> --}}
            </div>
        </div>
    </div>



@endsection
@push('js')
@endpush
