<div class="space-y-5">

    {{-- TITLE --}}
    <div>
        <label class="block text-sm font-medium mb-1">
            Título
        </label>
        <input type="text" name="title" value="{{ old('title', $lesson->title ?? '') }}"
            class="w-full border rounded px-3 py-2">
        @error('title')
            <p class="text-red-500 text-sm">{{ $message }}</p>
        @enderror
    </div>

    {{-- TYPE --}}
    <div>
        <label class="block text-sm font-medium mb-1">
            Tipo de contenido
        </label>
        <select name="type" id="type" class="w-full border rounded px-3 py-2">
            <option value="video">Video</option>
            <option value="pdf">PDF</option>
            <option value="guide">Guide</option>
        </select>
    </div>

    {{-- CONTENT --}}
    <div>
        <label class="block text-sm font-medium mb-1">
            Contenido
        </label>
        <select name="content_id" id="content_id" class="w-full border rounded px-3 py-2">
        </select>
    </div>

    {{-- DURATION --}}
    <div>
        <label class="block text-sm font-medium mb-1">
            Duración (segundos)
        </label>
        <input type="number" name="duration" value="{{ old('duration', $lesson->duration ?? '') }}"
            class="w-full border rounded px-3 py-2">
    </div>

    <div class="mt-6">
        <label class="block text-sm font-medium mb-2">
            Preview
        </label>
        <div id="preview-container" class="border rounded bg-gray-50 hidden">
            <iframe id="preview-frame" class="w-full h-[70vh] border-0"></iframe>
        </div>
    </div>

</div>

{{-- 🔥 SCRIPT DINÁMICO --}}
<script>
    const videos = @json($videos);
    const pdfs = @json($pdfs);
    const guides = @json($guides);

    const typeSelect = document.getElementById('type');
    const contentSelect = document.getElementById('content_id');

    const previewBox = document.getElementById('preview-container');
    const previewFrame = document.getElementById('preview-frame');

    function updatePreview() {
        const type = typeSelect.value;
        const id = contentSelect.value;

        if (!type || !id) return;

        const url = `/admin/preview/content?type=${type}&id=${id}`;

        previewFrame.src = ''; // limpia primero

        setTimeout(() => {
            previewFrame.src = url + '&t=' + new Date().getTime();
        }, 50);
        previewBox.classList.remove('hidden');
    }

    // 🔥 eventos
    typeSelect.addEventListener('change', () => {
        updatePreview();
    });

    contentSelect.addEventListener('change', () => {
        updatePreview();
    });

    function loadOptions(type, selected = null) {
        let data = [];

        if (type === 'video') data = videos;
        if (type === 'pdf') data = pdfs;
        if (type === 'guide') data = guides;

        contentSelect.innerHTML = '';

        for (const id in data) {
            const option = document.createElement('option');
            option.value = id;
            option.text = data[id];

            if (selected && selected == id) {
                option.selected = true;
            }

            contentSelect.appendChild(option);
        }
    }

    typeSelect.addEventListener('change', function() {
        loadOptions(this.value);
    });

    // 🔥 INIT (IMPORTANTE para EDIT)
    document.addEventListener('DOMContentLoaded', function() {
        const selectedType = "{{ old('type', $lesson->type ?? 'video') }}";
        const selectedContent = "{{ old('content_id', $lesson->content_id ?? '') }}";

        typeSelect.value = selectedType;

        loadOptions(selectedType, selectedContent);
    });
</script>
