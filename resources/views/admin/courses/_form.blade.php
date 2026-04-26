<div class="space-y-5">

    {{-- TITLE --}}
    <div>
        <label class="block text-sm font-medium mb-1">
            Título
        </label>

        <input type="text" name="title" value="{{ old('title', $course->title ?? '') }}"
            class="w-full border rounded px-3 py-2">

        @error('title')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
        @enderror
    </div>

    {{-- DESCRIPTION --}}
    <div>
        <label class="block text-sm font-medium mb-1">
            Descripción
        </label>

        <textarea name="description" rows="4" class="w-full border rounded px-3 py-2">{{ old('description', $course->description ?? '') }}</textarea>
    </div>

    {{-- THUMBNAIL --}}
    <div>
        <label class="block text-sm font-medium mb-1">
            Thumbnail (URL)
        </label>

        <input type="text" name="thumbnail" value="{{ old('thumbnail', $course->thumbnail ?? '') }}"
            class="w-full border rounded px-3 py-2">

        @if (!empty($course->thumbnail))
            <img src="{{ $course->thumbnail }}" class="mt-2 w-40 rounded">
        @endif
    </div>

    {{-- Category --}}
    <div>
        <label class="block text-sm font-medium mb-1">
            Categoría
        </label>

        <select name="category_id" class="w-full border rounded px-3 py-2">

            <option value="">Seleccionar categoría</option>

            @foreach ($categories as $category)
                <option value="{{ $category->id }}"
                    {{ old('category_id', $course->category_id ?? '') == $category->id ? 'selected' : '' }}>
                    {{ $category->name }}
                </option>
            @endforeach

        </select>
    </div>

    {{-- STATUS --}}
    <div>
        <label class="block text-sm font-medium mb-1">
            Estado
        </label>

        <select name="status" class="w-full border rounded px-3 py-2">

            <option value="draft" {{ old('status', $course->status ?? '') === 'draft' ? 'selected' : '' }}>
                Borrador
            </option>

            <option value="published" {{ old('status', $course->status ?? '') === 'published' ? 'selected' : '' }}>
                Publicado
            </option>

        </select>
    </div>

</div>
