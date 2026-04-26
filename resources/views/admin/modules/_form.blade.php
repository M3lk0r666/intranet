<div class="space-y-5">

    {{-- TITLE --}}
    <div>
        <label class="block text-sm font-medium mb-1">
            Título del Módulo
        </label>

        <input type="text" name="title" value="{{ old('title', $module->title ?? '') }}"
            class="w-full border rounded px-3 py-2">

        @error('title')
            <p class="text-red-500 text-sm mt-1">
                {{ $message }}
            </p>
        @enderror
    </div>

    <div id="preview-box" class="mt-6 p-4 border rounded bg-gray-50 hidden">
        <p class="text-sm text-gray-500 mb-2">Preview:</p>

        <iframe id="preview-frame" class="w-full h-96"></iframe>
    </div>

</div>
