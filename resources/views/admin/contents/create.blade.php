<x-admin-layout title="Posts" :breadcrumbs="[
    [
        'name' => 'Dahsboard',
        'href' => route('admin.dashboard'),
    ],
    [
        'name' => 'Contenido',
        'href' => route('admin.contents.index'),
    ],
    [
        'name' => 'Nuevo',
    ],
]">

    <x-wire-card>
        {{-- <div x-data="{ type: 'pdf' }">
            
            <select x-model="type" name="type" class="w-full">
                <option value="pdf">PDF</option>
                <option value="guide">Guía</option>
            </select>
           
            <div x-show="type === 'pdf'">
                <input type="file" name="file" class="w-full mt-4">
            </div>
            
            <div x-show="type === 'guide'">
                <textarea name="content" class="w-full mt-4"></textarea>
            </div>
        </div> --}}

        <div class="p-6 max-w-3xl mx-auto">

            <h1 class="text-2xl font-bold mb-6">Crear Contenido</h1>

            <form action="{{ route('admin.contents.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div x-data="{ type: 'pdf' }">

                    {{-- Título --}}
                    <div class="mb-4">
                        <label class="block mb-1">Título</label>
                        <input type="text" name="title" class="w-full border rounded p-2"
                            value="{{ old('title') }}">
                    </div>

                    {{-- Tipo --}}
                    <div class="mb-4">
                        <label class="block mb-1">Tipo</label>
                        <select name="type" x-model="type" class="w-full border rounded p-2">
                            <option value="pdf">PDF</option>
                            <option value="guide">Guía</option>
                        </select>
                    </div>

                    {{-- Categoría --}}
                    <div class="mb-4">
                        <label class="block mb-1">Categoría</label>
                        <select name="category_id" class="w-full border rounded p-2">
                            <option value="">-- Seleccionar --</option>
                            @foreach ($categories as $id => $name)
                                <option value="{{ $id }}">{{ $name }}</option>
                            @endforeach
                        </select>
                    </div>

                    {{-- Descripción --}}
                    <div class="mb-4">
                        <label class="block mb-1">Descripción</label>
                        <textarea name="description" class="w-full border rounded p-2"></textarea>
                    </div>

                    {{-- PDF --}}
                    <div x-show="type === 'pdf'" class="mb-4">
                        <label class="block mb-1">Archivo PDF</label>
                        <input type="file" name="file" class="w-full">
                    </div>

                    {{-- Guía --}}
                    {{-- <div x-show="type === 'guide'" class="mb-4">
                        <label class="block mb-1">Contenido</label>
                        <textarea name="content" rows="6" class="w-full border rounded p-2"></textarea>
                    </div> --}}

                    <!--Nuevo MArkdown -->
                    <div x-show="type === 'guide'" class="mb-4">
                        <label class="block mb-1">Contenido (Markdown)</label>

                        <textarea name="content" rows="10" class="w-full border rounded p-2 font-mono text-sm"
                            placeholder="# Título
                    
                    ## Subtítulo
                    
                    Texto en **negrita**
                    
                    ```bash
                    show running-config
                    ```"></textarea>
                    </div>

                    {{-- Thumbnail --}}
                    <div class="mb-4">
                        <label class="block mb-1">Thumbnail</label>
                        <input type="file" name="thumbnail" class="w-full">
                    </div>

                    <button class="bg-blue-600 text-white px-4 py-2 rounded">
                        Guardar
                    </button>

                </div>

            </form>

        </div>



    </x-wire-card>
</x-admin-layout>
