<x-admin-layout>

    <div class="p-6 max-w-2xl mx-auto">

        <!-- TÍTULO -->
        <h2 class="text-2xl font-bold mb-6">
            ✏️ Editar Documento
        </h2>

        <!-- CARD -->
        <div class="bg-white shadow rounded-lg p-6">

            <form method="POST" action="{{ route('admin.inventarios.update', $inventario->id) }}">

                @csrf
                @method('PUT')

                <!-- CLIENTE -->
                <div class="mb-4">
                    <label class="block text-sm text-gray-600 mb-1">
                        Cliente
                    </label>
                    <div class="font-semibold text-gray-800">
                        👤 {{ $inventario->client->name }}
                    </div>
                </div>

                <!-- ARCHIVO (solo lectura) -->
                <div class="mb-4">
                    <label class="block text-sm text-gray-600 mb-1">
                        Archivo
                    </label>

                    <div class="flex items-center gap-2 bg-gray-50 p-2 rounded">

                        @if (Str::endsWith($inventario->file, '.pdf'))
                            <i class="las la-file-pdf text-red-600 text-xl"></i>
                        @else
                            <i class="las la-file-excel text-green-600 text-xl"></i>
                        @endif

                        <span class="text-sm">
                            {{ basename($inventario->file) }}
                        </span>

                    </div>

                    <p class="text-xs text-gray-400 mt-1">
                        Para cambiar el archivo, elimina este documento y sube uno nuevo.
                    </p>
                </div>

                <!-- TIPO -->
                <div class="mb-4">
                    <label class="block text-sm text-gray-600 mb-1">
                        Tipo
                    </label>

                    <select name="type" class="border rounded-lg p-2 w-full">

                        <option value="poliza" {{ $inventario->type == 'poliza' ? 'selected' : '' }}>
                            Póliza
                        </option>

                        <option value="inventario" {{ $inventario->type == 'inventario' ? 'selected' : '' }}>
                            Inventario
                        </option>

                        <option value="activos" {{ $inventario->type == 'activos' ? 'selected' : '' }}>
                            Activos
                        </option>

                    </select>
                </div>

                <!-- TECNOLOGÍA -->
                <div class="mb-4">
                    <label class="block text-sm text-gray-600 mb-1">
                        Tecnología
                    </label>

                    <input type="text" name="technology" value="{{ $inventario->technology }}"
                        class="border rounded-lg p-2 w-full" placeholder="Ej. Firewall, Switch, WiFi">
                </div>

                <!-- AÑO -->
                <div class="mb-6">
                    <label class="block text-sm text-gray-600 mb-1">
                        Año
                    </label>

                    <input type="text" name="year" value="{{ $inventario->year }}"
                        class="border rounded-lg p-2 w-full" placeholder="Ej. 2024">
                </div>

                <!-- BOTONES -->
                <div class="flex justify-end gap-3">

                    <a href="{{ route('admin.clients.show', $inventario->client_id) }}"
                        class="px-4 py-2 bg-gray-300 rounded">
                        Cancelar
                    </a>

                    <button class="px-4 py-2 bg-blue-600 text-white rounded">
                        Guardar cambios
                    </button>

                </div>

            </form>

        </div>

    </div>

</x-admin-layout>
