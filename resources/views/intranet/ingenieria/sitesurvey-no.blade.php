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
                    <li>
                        <div class="flex items-center">
                            <i class="fas fa-chevron-right text-gray-400 mx-2"></i>
                            <a href="{{ route('intranet.estructurainterna.ingenieria') }}"
                                class="ml-1 text-sm text-gray-600 hover:text-orange-600 md:ml-2">Ingenieria
                            </a>
                        </div>
                    </li>
                    <li aria-current="page">
                        <div class="flex items-center">
                            <i class="fas fa-chevron-right text-gray-400 mx-2"></i>
                            <span class="ml-1 text-sm text-primary font-medium md:ml-2">Cuestionario Site Survey - No
                                Wifi</span>
                        </div>
                    </li>
                </ol>
            </nav>
        </div>
    </div>

    <!-- Encabezado -->
    <div class="text-center mb-16 mt-8">
        <h1 class="text-4xl font-black font-display tracking-tight text-slate-900 uppercase">
            Cuestionario<span class="text-primary  uppercase"> Site Survey</span>
        </h1>
        <p class="text-slate-600 mt-4">Su función es recabar la información necesaria para el diseño e implementación de una
            solución de Red Inalámbrica cuando no se cuenta con una red inalámbrica.</p>
    </div>

    <div class="bg-white rounded-2xl border border-slate-200 p-5 mb-8">
        <div class="mx-auto px-4 py-8 space-y-8">
            <!-- Page Header -->
            <div class="flex flex-col md:flex-row md:items-end justify-between gap-4">
                <div>
                    <h1 class="text-3xl font-black text-slate-900 dark:text-white">Site Survey - Red Inalámbrica</h1>
                    <p class="text-slate-500 dark:text-slate-400 mt-1">Formulario de levantamiento técnico avanzado para
                        infraestructura de red.</p>
                </div>
            </div>
            <!-- Section 1: General Info -->
            <section
                class="bg-white dark:bg-slate-900 rounded-xl border border-slate-200 dark:border-slate-800 shadow-sm overflow-hidden">
                <div
                    class="bg-slate-50 dark:bg-slate-800/50 px-6 py-4 border-b border-slate-200 dark:border-slate-800 flex items-center gap-2">
                    <i class="ri-information-line text-primary"></i>
                    <h2 class="text-lg font-bold">1. Información General</h2>
                </div>
                <div class="p-6 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    <div class="space-y-2">
                        <label class="text-xs font-bold uppercase tracking-wider text-slate-500">Cliente</label>
                        <input
                            class="w-full rounded-lg border-slate-200 dark:border-slate-700 dark:bg-slate-800 focus:ring-primary focus:border-primary"
                            placeholder="Nombre de la empresa" type="text" />
                    </div>
                    <div class="space-y-2">
                        <label class="text-xs font-bold uppercase tracking-wider text-slate-500">Ticket No.</label>
                        <input
                            class="w-full rounded-lg border-slate-200 dark:border-slate-700 dark:bg-slate-800 focus:ring-primary focus:border-primary"
                            placeholder="#NJ-0000" type="text" />
                    </div>
                    <div class="space-y-2">
                        <label class="text-xs font-bold uppercase tracking-wider text-slate-500">Reporter</label>
                        <input
                            class="w-full rounded-lg border-slate-200 dark:border-slate-700 dark:bg-slate-800 focus:ring-primary focus:border-primary"
                            placeholder="Nombre del solicitante" type="text" />
                    </div>
                    <div class="space-y-2">
                        <label class="text-xs font-bold uppercase tracking-wider text-slate-500">Asignado a</label>
                        <select
                            class="w-full rounded-lg border-slate-200 dark:border-slate-700 dark:bg-slate-800 focus:ring-primary focus:border-primary">
                            <option>Ing. Preventa A</option>
                            <option>Ing. Preventa B</option>
                        </select>
                    </div>
                    <div class="md:col-span-2 space-y-2">
                        <label class="text-xs font-bold uppercase tracking-wider text-slate-500">Objetivo del
                            Proyecto</label>
                        <input
                            class="w-full rounded-lg border-slate-200 dark:border-slate-700 dark:bg-slate-800 focus:ring-primary focus:border-primary"
                            placeholder="Descripción breve de la meta técnica" type="text" />
                    </div>
                </div>
            </section>
            <!-- Section 2: Información para Red Inalámbrica -->
            <section
                class="bg-white dark:bg-slate-900 rounded-xl border border-slate-200 dark:border-slate-800 shadow-sm overflow-hidden">
                <div
                    class="bg-slate-50 dark:bg-slate-800/50 px-6 py-4 border-b border-slate-200 dark:border-slate-800 flex items-center gap-2">
                    <i class="ri-wifi-fill text-primary"></i>
                    <h2 class="text-lg font-bold">2. Información para Red Inalámbrica</h2>
                </div>
                <div class="p-6 space-y-8">
                    <div>
                        <h3
                            class="text-sm font-bold text-slate-700 dark:text-slate-300 mb-4 border-l-4 border-primary pl-3">
                            Problemas a resolver</h3>
                        <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                            <label
                                class="flex items-center gap-3 p-3 border border-slate-100 dark:border-slate-800 rounded-lg hover:bg-slate-50 dark:hover:bg-slate-800 cursor-pointer transition-colors">
                                <input class="rounded text-primary focus:ring-primary h-5 w-5" type="checkbox" />
                                <span class="text-sm">Expansión</span>
                            </label>
                            <label
                                class="flex items-center gap-3 p-3 border border-slate-100 dark:border-slate-800 rounded-lg hover:bg-slate-50 dark:hover:bg-slate-800 cursor-pointer transition-colors">
                                <input class="rounded text-primary focus:ring-primary h-5 w-5" type="checkbox" />
                                <span class="text-sm">Conectividad</span>
                            </label>
                            <label
                                class="flex items-center gap-3 p-3 border border-slate-100 dark:border-slate-800 rounded-lg hover:bg-slate-50 dark:hover:bg-slate-800 cursor-pointer transition-colors">
                                <input class="rounded text-primary focus:ring-primary h-5 w-5" type="checkbox" />
                                <span class="text-sm">Performance</span>
                            </label>
                            <label
                                class="flex items-center gap-3 p-3 border border-slate-100 dark:border-slate-800 rounded-lg hover:bg-slate-50 dark:hover:bg-slate-800 cursor-pointer transition-colors">
                                <input class="rounded text-primary focus:ring-primary h-5 w-5" type="checkbox" />
                                <span class="text-sm">Nueva Red</span>
                            </label>
                        </div>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                        <div class="space-y-4">
                            <h3 class="text-sm font-bold text-slate-700 dark:text-slate-300 border-l-4 border-primary pl-3">
                                Usuarios &amp; Carga</h3>
                            <div class="space-y-4">
                                <div class="flex items-center justify-between gap-4">
                                    <span class="text-sm">Usuarios conectándose:</span>
                                    <input
                                        class="w-32 rounded-lg border-slate-200 dark:border-slate-700 dark:bg-slate-800 focus:ring-primary focus:border-primary"
                                        placeholder="0" type="number" />
                                </div>
                                <div class="flex items-center justify-between gap-4">
                                    <span class="text-sm">Dispositivos por usuario:</span>
                                    <input
                                        class="w-32 rounded-lg border-slate-200 dark:border-slate-700 dark:bg-slate-800 focus:ring-primary focus:border-primary"
                                        placeholder="0" type="number" />
                                </div>
                            </div>
                        </div>
                        <div>
                            <h3
                                class="text-sm font-bold text-slate-700 dark:text-slate-300 mb-4 border-l-4 border-primary pl-3">
                                Tipo de Dispositivos</h3>
                            <div class="grid grid-cols-2 gap-2">
                                <label class="flex items-center gap-2 text-sm">
                                    <input class="rounded text-primary focus:ring-primary" type="checkbox" /> Laptop
                                </label>
                                <label class="flex items-center gap-2 text-sm">
                                    <input class="rounded text-primary focus:ring-primary" type="checkbox" />
                                    Smartphone
                                </label>
                                <label class="flex items-center gap-2 text-sm">
                                    <input class="rounded text-primary focus:ring-primary" type="checkbox" /> Tablet
                                </label>
                                <label class="flex items-center gap-2 text-sm">
                                    <input class="rounded text-primary focus:ring-primary" type="checkbox" /> IoT /
                                    Otros
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- Section 3: Aplicativos/Servicios -->
            <section
                class="bg-white dark:bg-slate-900 rounded-xl border border-slate-200 dark:border-slate-800 shadow-sm overflow-hidden">
                <div
                    class="bg-slate-50 dark:bg-slate-800/50 px-6 py-4 border-b border-slate-200 dark:border-slate-800 flex items-center gap-2">
                    <i class="ri-layout-grid-2-fill text-primary"></i>
                    <h2 class="text-lg font-bold">3. Aplicativos y Servicios Críticos</h2>
                </div>
                <div class="p-6">
                    <p class="text-sm text-slate-500 mb-6">Seleccione los servicios que requieren prioridad en la red
                        inalámbrica (QoS):</p>
                    <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-5 gap-4">
                        <label
                            class="flex flex-col items-center justify-center p-4 border border-slate-100 dark:border-slate-800 rounded-xl hover:border-primary/50 cursor-pointer transition-all">
                            <input class="hidden peer" type="checkbox" />
                            <i class="ri-global-line text-3xl mb-2 peer-checked:text-primary"></i>
                            <span class="mb-2 peer-checked:text-primary transition-colors">WEB</span>
                        </label>
                        <label
                            class="flex flex-col items-center justify-center p-4 border border-slate-100 dark:border-slate-800 rounded-xl hover:border-primary/50 cursor-pointer transition-all">
                            <input class="hidden peer" type="checkbox" />
                            <i class="ri-vidicon-line text-3xl mb-2 peer-checked:text-primary"></i>
                            <span class="mb-2 peer-checked:text-primary transition-colors">VIDEO/VOIP</span>
                        </label>
                        <label
                            class="flex flex-col items-center justify-center p-4 border border-slate-100 dark:border-slate-800 rounded-xl hover:border-primary/50 cursor-pointer transition-all">
                            <input class="hidden peer" type="checkbox" />
                            <i class="ri-bank-line text-3xl mb-2 peer-checked:text-primary"></i>
                            <span class="mb-2 peer-checked:text-primary transition-colors">BANCA</span>
                        </label>
                        <label
                            class="flex flex-col items-center justify-center p-4 border border-slate-100 dark:border-slate-800 rounded-xl hover:border-primary/50 cursor-pointer transition-all">
                            <input class="hidden peer" type="checkbox" />
                            <i class="ri-computer-line text-3xl mb-2 peer-checked:text-primary"></i>
                            <span class="mb-2 peer-checked:text-primary transition-colors">SISTEMAS</span>
                        </label>
                        <label
                            class="flex flex-col items-center justify-center p-4 border border-slate-100 dark:border-slate-800 rounded-xl hover:border-primary/50 cursor-pointer transition-all">
                            <input class="hidden peer" type="checkbox" />
                            <i class="ri-cloud-line text-3xl mb-2 peer-checked:text-primary"></i>
                            <span class="mb-2 peer-checked:text-primary transition-colors">TRANSFER</span>
                        </label>
                    </div>
                </div>
            </section>
            <!-- Section 4: Información Infraestructura -->
            <section
                class="bg-white dark:bg-slate-900 rounded-xl border border-slate-200 dark:border-slate-800 shadow-sm overflow-hidden">
                <div
                    class="bg-slate-50 dark:bg-slate-800/50 px-6 py-4 border-b border-slate-200 dark:border-slate-800 flex items-center gap-2">
                    <i class="ri-organization-chart text-primary"></i>
                    <h2 class="text-lg font-bold">4. Información de Infraestructura</h2>
                </div>
                <div class="p-6 space-y-6">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="space-y-4">
                            <div class="flex items-center justify-between">
                                <span class="text-sm font-medium">¿Existe diagrama de red actual?</span>
                                <div class="flex gap-4">
                                    <label class="flex items-center gap-1 cursor-pointer">
                                        <input class="text-primary focus:ring-primary" name="diag" type="radio" />
                                        Si</label>
                                    <label class="flex items-center gap-1 cursor-pointer">
                                        <input class="text-primary focus:ring-primary" name="diag" type="radio" />
                                        No</label>
                                </div>
                            </div>
                            <div class="space-y-2">
                                <label class="text-xs font-bold uppercase text-slate-500">SSID Principal</label>
                                <input
                                    class="w-full rounded-lg border-slate-200 dark:border-slate-700 dark:bg-slate-800 focus:ring-primary"
                                    placeholder="Ej. Corporativo_Netjer" type="text" />
                            </div>
                        </div>
                        <div class="space-y-4">
                            <div class="flex items-center justify-between">
                                <span class="text-sm font-medium">Asignación de IP</span>
                                <div class="flex gap-4">
                                    <label class="flex items-center gap-1 cursor-pointer">
                                        <input class="text-primary focus:ring-primary" name="ip" type="radio" />
                                        DHCP</label>
                                    <label class="flex items-center gap-1 cursor-pointer">
                                        <input class="text-primary focus:ring-primary" name="ip" type="radio" />
                                        Estática</label>
                                </div>
                            </div>
                            <div class="space-y-2">
                                <label class="text-xs font-bold uppercase text-slate-500">Gateway / Core
                                    Detalles</label>
                                <input
                                    class="w-full rounded-lg border-slate-200 dark:border-slate-700 dark:bg-slate-800 focus:ring-primary"
                                    placeholder="IP / Hostname" type="text" />
                            </div>
                        </div>
                    </div>
                    <div
                        class="bg-slate-50 dark:bg-slate-800/30 p-4 rounded-xl border border-dashed border-slate-300 dark:border-slate-700">
                        <div class="flex flex-col items-center justify-center py-4 space-y-2">
                            <i class="ri-file-upload-line text-4xl text-slate-400"></i>

                            <p class="text-sm font-medium">Subir Diagrama de Red u Onboarding Connectivity Plan</p>
                            <p class="text-xs text-slate-400">PDF, JPG o PNG (Max 10MB)</p>
                            <button class="mt-2 text-primary font-bold text-sm">Seleccionar archivos</button>
                        </div>
                    </div>
                </div>
            </section>
            <!-- Section 5: Switches & Controllers -->
            <section
                class="bg-white dark:bg-slate-900 rounded-xl border border-slate-200 dark:border-slate-800 shadow-sm overflow-hidden mb-12">
                <div
                    class="bg-slate-50 dark:bg-slate-800/50 px-6 py-4 border-b border-slate-200 dark:border-slate-800 flex items-center gap-2">
                    <i class="ri-router-line text-primary"></i>
                    <h2 class="text-lg font-bold">5. Switches &amp; Controllers</h2>
                </div>
                <div class="p-6">
                    <div class="overflow-x-auto">
                        <table class="w-full text-left text-sm">
                            <thead>
                                <tr class="border-b border-slate-200 dark:border-slate-800">
                                    <th class="pb-3 font-bold uppercase text-slate-500 tracking-wider">Categoría</th>
                                    <th class="pb-3 font-bold uppercase text-slate-500 tracking-wider">Opción Principal
                                    </th>
                                    <th class="pb-3 font-bold uppercase text-slate-500 tracking-wider">Detalles
                                        Adicionales
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-slate-100 dark:divide-slate-800">
                                <tr>
                                    <td class="py-4 font-bold">Tipo de Switch</td>
                                    <td class="py-4">
                                        <select
                                            class="w-full rounded-lg border-slate-200 dark:border-slate-700 dark:bg-slate-800">
                                            <option>POE+</option>
                                            <option>POE++</option>
                                            <option>Non-POE</option>
                                        </select>
                                    </td>
                                    <td class="py-4">
                                        <div class="flex gap-4">
                                            <label class="flex items-center gap-2">
                                                <input class="rounded text-primary" type="checkbox" /> Cat 6</label>
                                            <label class="flex items-center gap-2">
                                                <input class="rounded text-primary" type="checkbox" /> Cat 7</label>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="py-4 font-bold">Controladora</td>
                                    <td class="py-4">
                                        <select
                                            class="w-full rounded-lg border-slate-200 dark:border-slate-700 dark:bg-slate-800">
                                            <option>Cloud Based</option>
                                            <option>Local Appliance</option>
                                            <option>Virtual / VM</option>
                                        </select>
                                    </td>
                                    <td class="py-4">
                                        <input
                                            class="w-full rounded-lg border-slate-200 dark:border-slate-700 dark:bg-slate-800"
                                            placeholder="Marca / Modelo Pref." type="text" />
                                    </td>
                                </tr>
                                <tr>
                                    <td class="py-4 font-bold">Puertos Disponibles</td>
                                    <td class="py-4">
                                        <input
                                            class="w-full rounded-lg border-slate-200 dark:border-slate-700 dark:bg-slate-800"
                                            placeholder="Cant. total" type="number" />
                                    </td>
                                    <td class="py-4">
                                        <div class="flex gap-4">
                                            <label class="flex items-center gap-2">
                                                <input class="rounded text-primary" type="checkbox" /> 1GbE</label>
                                            <label class="flex items-center gap-2">
                                                <input class="rounded text-primary" type="checkbox" /> 10GbE</label>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </section>
        </div>
    </div>


@endsection
@push('js')
@endpush
