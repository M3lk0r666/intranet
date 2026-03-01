<x-admin-layout title="Posts" :breadcrumbs="[
    [
        'name' => 'Dahsboard',
        'href' => route('admin.dashboard'),
    ],
    [
        'name' => 'Posts',
        'href' => route('admin.posts.index'),
    ],
    [
        'name' => 'Nuevo',
    ],
]">

    <x-wire-card>
        <form action="{{ route('admin.posts.store') }}" method="POST" class="space-y-4">
            @csrf


            <div>
                <label for="first_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Titulo para
                    el Post</label>
                <input type="text" id="title" name="title"
                    class="border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5"
                    placeholder="Escriba el titulo para el Post..." required
                    oninput="string_to_slug(this.value, '#slug')" />
            </div>

            <x-wire-input label="Slug generado para este Post" name="slug" id="slug" value="{{ old('slug') }}"
                placeholder="... slug generado"></x-wire-input>

            <x-wire-select label="Categoria para el post" name="category_id" placeholder="Selecciona una Categoria"
                :options="$categories" option-label="name" option-value="id" wire:model="category_id"
                :selected="old('category_id')"></x-wire-select>

            <!-- Categorías (múltiples) -->
            {{-- <div class="mb-3">
                <x-wire-select label="Categorías" placeholder="Selecciona múltiples categorías" wire:model="categories"
                    :options="$categories->pluck('name', 'id')->toArray()" multiselect />
                @error('categories')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
                <small class="text-muted">Mantén Ctrl (Cmd en Mac) para seleccionar múltiples</small>
            </div> --}}
            {{-- <x-wire-select label="Categorías" placeholder="Selecciona múltiples categorías" wire:model="categories"
                multiselect :options="$categories" option-label="name" option-value="id" />

            @error('categories')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror --}}



            <div class="flex justify-end mt-4">
                <x-wire-button light type="submit">
                    <i class="ri-save-line"></i>
                    Guardar
                </x-wire-button>
            </div>

        </form>
    </x-wire-card>
</x-admin-layout>
