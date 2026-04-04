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
        'name' => 'Editar',
    ],
]">

    @push('css')
        <!-- Include your favorite highlight.js stylesheet -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.9.0/styles/atom-one-dark.min.css" rel="stylesheet">
        <link href="{{ asset('assets/prims/prism.css') }}" rel="stylesheet">
        <script src="{{ asset('assets/prims/prism.js') }}"></script>
        <link href="/assets/css/intradmin.css" rel="stylesheet">
    @endpush

    <x-wire-card>
        <form action="{{ route('admin.posts.update', $post) }}" method="POST" class="space-y-4"
            enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <h1
                class="text-center text-purple-600 mb-4 text-2xl font-extrabold leading-none tracking-tight md:text-4xl lg:text-6xl">
                Editando tu Post ...</h1>
            <x-wire-card>
                <x-slot name="title" class="italic !font-bold">
                    Datos del Post
                </x-slot>

                <div class="grid gap-6 mb-6 md:grid-cols-2">
                    <div>
                        <label class="block mb-2.5 text-sm font-medium text-heading">Titulo</label>
                        <input type="text" name="title"
                            class="bg-neutral-secondary-medium border border-default-medium text-heading text-sm rounded-base focus:ring-brand focus:border-brand block w-full px-3 py-2.5 shadow-xs placeholder:text-body"
                            value="{{ old('title', $post->title) }}" required />
                    </div>
                    <div>
                        <label class="block mb-2.5 text-sm font-medium text-heading">Slug</label>
                        <input
                            class="bg-neutral-secondary-medium border border-default-medium text-heading text-sm rounded-base focus:ring-brand focus:border-brand block w-full px-3 py-2.5 shadow-xs placeholder:text-body"
                            type="text" name="slug" value="{{ old('slug', $post->slug) }}" required />
                    </div>

                    <!-- Categorias -->
                    <div>
                        <label class="block mb-2.5 text-sm font-medium text-heading">Selecciona la categoría</label>
                        <select name="category_id" required
                            class="bg-neutral-secondary-medium border border-default-medium text-heading text-sm rounded-base focus:ring-brand focus:border-brand block w-full px-3 py-2.5 shadow-xs placeholder:text-body">
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}"
                                    {{ $category->id == $post->category_id ? 'selected' : '' }}>
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div>
                        <label class="block mb-2.5 text-sm font-medium text-heading">Estado
                        </label>
                        <ul
                            class="items-center w-full text-sm font-medium text-heading bg-neutral-primary-soft border border-default rounded-lg sm:flex">
                            <li class="w-full border-b border-default sm:border-b-0 sm:border-r">
                                <div class="flex items-center ps-3">
                                    <input id="horizontal-list-radio-license" type="radio" value="0"
                                        name="is_published"
                                        class="w-4 h-4 text-neutral-primary text-red-600 bg-neutral-secondary-medium border-default-medium rounded-xs focus:ring-red-500 border-default-medium bg-neutral-secondary-medium rounded-full checked:border-brand focus:ring-2 focus:outline-none focus:ring-brand-subtle border border-default appearance-none"
                                        @checked(old('is_published', $post->is_published) == 0)>
                                    <label for="horizontal-list-radio-license"
                                        class="w-full py-3 select-none ms-2 text-sm font-medium text-heading">No
                                        Publicado</label>
                                </div>
                            </li>
                            <li class="w-full border-b border-default sm:border-b-0 sm:border-r">
                                <div class="flex items-center ps-3">
                                    <input id="horizontal-list-radio-id" type="radio" value="1"
                                        name="is_published"
                                        class="w-4 h-4 text-neutral-primary text-green-600 bg-neutral-secondary-medium border-default-medium rounded-xs focus:ring-green-500 border-default-medium bg-neutral-secondary-medium rounded-full checked:border-brand focus:ring-2 focus:outline-none focus:ring-brand-subtle border border-default appearance-none"
                                        @checked(old('is_published', $post->is_published) == 1)>
                                    <label for="horizontal-list-radio-id"
                                        class="w-full py-3 select-none ms-2 text-sm font-medium text-heading">Publicar</label>
                                </div>
                            </li>
                        </ul>
                    </div>


                    <div>
                        <label class="block mb-2.5 text-sm font-medium text-heading">Etiquetas
                        </label>
                        <div class="grid grid-cols-3 gap-4 mb-4">
                            @foreach ($tags as $tag)
                                <div class="flex items-center">
                                    <label>
                                        <input type="checkbox" name="tags[]" value="{{ $tag->id }}"
                                            class="w-4 h-4 border border-default-medium rounded-xs bg-neutral-secondary-medium focus:ring-2 focus:ring-brand-soft"
                                            @checked(in_array($tag->id, old('tags', $post->tags->pluck('id')->toArray())))>
                                        {{ $tag->name }}
                                    </label>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <div>
                        <label class="block mb-2.5 text-sm font-medium text-heading">Imagen</label>
                        <img class="w-32 h-32 object-cover rounded-lg border shadow-sm" src="{{ $post->image }}"
                            alt="image description" id="imgPreview">
                        <label class="block mb-2.5 text-sm font-medium text-heading" for="file_input">Upload
                            file</label>
                        <input
                            class="cursor-pointer bg-neutral-secondary-medium border border-default-medium text-heading text-sm rounded-base focus:ring-brand focus:border-brand block w-full shadow-xs "
                            name="image_path" type="file" accept="image/*"
                            onchange="previewImage(event, '#imgPreview')">
                        <p class="mt-1 text-sm text-gray-500 dark:text-gray-300">SVG, PNG,
                            JPG or
                            GIF (MAX. 800x400px).</p>
                    </div>


                </div>

            </x-wire-card>

            <x-wire-card title="Contenido del Post" rounded="3xl">
                <div>
                    <label class="block mb-2.5 text-sm font-medium text-heading">Escribiendo el contenido de tu
                        Post</label>
                    <div class="note-demo">
                        <h3>📝 Instrucciones de uso Notas:</h3>
                        <ul>
                            <li><strong>Dentro de una nota:</strong> Presiona ENTER para añadir nueva línea</li>
                            <li><strong>Para salir de la nota:</strong> Presiona ENTER 3 veces seguidas o haz clic fuera
                            </li>
                            <li><strong>Editar notas:</strong> Haz clic en cualquier nota para editarla</li>
                            <li><strong>Seleccionar tipo:</strong> Usa el botón para elegir el tipo de nota</li>
                        </ul>
                    </div>
                    <!-- Textarea de contenido -->
                    <textarea name="content" id="content" cols="50">{{ old('content', $post->content) }}</textarea>
                </div>
            </x-wire-card>

            <div class="flex justify-center space-x-6 mt-4">
                <a href="{{ route('admin.posts.index') }}">
                    <x-wire-button outline warning>
                        Cancelar
                    </x-wire-button>
                </a>
                <x-wire-button outline blue type="submit">
                    Guardar
                    <i class="lar la-save"></i>
                </x-wire-button>
            </div>
        </form>
    </x-wire-card>

    @push('js')
        <!-- Include the highlight.js library -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.9.0/highlight.min.js"></script>

        <!-- Include the TinyMCE library -->
        <script src="{{ asset('tinymce/tinymce.min.js') }}"></script>
        <script>
            // Configuración del editor
            tinymce.init({
                selector: '#content',
                height: 500,
                menubar: true,
                menubar: 'file edit view insert format tools table help',
                plugins: [
                    'searchreplace',
                    'visualblocks',
                    'fullscreen',
                    'code',
                    'codesample',
                    'advlist',
                    'autolink',
                    'lists',
                    'link',
                    'image',
                    'charmap',
                    'preview',
                    'anchor',
                    'insertdatetime',
                    'media',
                    'table',
                    'help',
                    'wordcount'
                ],
                codesample_languages: [{
                        text: 'PHP',
                        value: 'php'
                    },
                    {
                        text: 'Python',
                        value: 'python'
                    },
                    {
                        text: 'Cisco',
                        value: 'cisco'
                    },
                    {
                        text: 'Extreme',
                        value: 'extreme'
                    }
                ],
                toolbar_mode: 'wrap',
                toolbar: `
                    undo redo |
                    blocks |
                    bold italic underline strikethrough |
                    forecolor backcolor |
                    alignleft aligncenter alignright alignjustify |
                    bullist numlist outdent indent |
                    link image table |
                    codesample code |
                    dialog-example-btn customnotes |
                    removeformat
                `,
                block_formats: 'Párrafo=p; Encabezado 1=h1; Encabezado 2=h2; Encabezado 3=h3; Encabezado 4=h4; Encabezado 5=h5; Encabezado 6=h6',

                automatic_uploads: true,

                // 🔥 AQUÍ VA
                images_upload_handler: function(blobInfo) {

                    let formData = new FormData();
                    formData.append('file', blobInfo.blob());
                    formData.append('_token', document.querySelector('meta[name="csrf-token"]').getAttribute(
                        'content'));

                    return fetch('/admin/upload-image', {
                            method: 'POST',
                            body: formData
                        })
                        .then(response => {
                            if (!response.ok) {
                                return response.json().then(err => {
                                    throw new Error(err.error || 'Error al subir imagen');
                                });
                            }
                            return response.json();
                        })
                        .then(result => {
                            if (!result || !result.location) {
                                throw new Error('Respuesta inválida del servidor');
                            }

                            return result.location; // 🔥 CLAVE
                        })
                        .catch(error => {
                            console.error('Error:', error);
                            // 🔥 AQUÍ VA
                            tinymce.activeEditor.notificationManager.open({
                                text: error.message,
                                type: 'error'
                            });
                            throw error; // importante para TinyMCE
                        });
                },

                images_upload_url: '/upload-image', // ruta en Laravel
                images_upload_credentials: true, // importante si usas sesión/csrf
                image_title: true,
                license_key: 'gpl',
                promotion: false,
                content_style: `
                    body { 
                        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; 
                        font-size: 14px; 
                        line-height: 1.6;
                        padding: 20px;
                    }
                    
                    /* ESTILOS DE NOTAS DENTRO DEL EDITOR */
                    .note {
                        border-left: 5px solid #f4c430 !important;
                        background-color: #fff9e6 !important;
                        padding: 12px 12px 12px 50px !important;
                        margin: 15px 0 !important;
                        font-style: italic !important;
                        min-height: 60px !important;
                        position: relative !important;
                        border-radius: 4px !important;
                        transition: all 0.3s ease !important;
                        cursor: text !important;
                    }
                    
                    .note::before {
                        content: "📝 " !important;
                        display: block !important;
                        font-weight: bold !important;
                        margin-bottom: 6px !important;
                        font-style: normal !important;
                        color: #333 !important;
                        position: absolute !important;
                        left: 12px !important;
                        top: 12px !important;
                        font-size: 16px !important;
                    }
                    
                    .note.editing {
                        box-shadow: 0 0 0 2px #3498db !important;
                        background-color: #fff9e6 !important;
                    }
                    
                    .info-note {
                        border-left-color: #3498db !important;
                        background-color: #ebf5fb !important;
                    }
                    
                    .info-note::before {
                        content: "ℹ️ " !important;
                        color: #2980b9 !important;
                    }
                    
                    .warning-note {
                        border-left-color: #f39c12 !important;
                        background-color: #fef9e7 !important;
                    }
                    
                    .warning-note::before {
                        content: "⚠️ " !important;
                        color: #d68910 !important;
                    }
                    
                    .error-note {
                        border-left-color: #e74c3c !important;
                        background-color: #fdedec !important;
                    }
                    
                    .error-note::before {
                        content: "❌ " !important;
                        color: #c0392b !important;
                    }
                    
                    .success-note {
                        border-left-color: #27ae60 !important;
                        background-color: #eafaf1 !important;
                    }
                    
                    .success-note::before {
                        content: "✅ " !important;
                        color: #229954 !important;
                    }
                    
                    .tip-note {
                        border-left-color: #9b59b6 !important;
                        background-color: #f4ecf7 !important;
                    }
                    
                    .tip-note::before {
                        content: "💡 " !important;
                        color: #8e44ad !important;
                    }
                    
                    .question-note {
                        border-left-color: #1abc9c !important;
                        background-color: #e8f8f5 !important;
                    }
                    
                    .question-note::before {
                        content: "❓ " !important;
                        color: #16a085 !important;
                    }
                    
                    /* Estilo para el indicador de salida */
                    .exit-indicator {
                        color: #7f8c8d !important;
                        font-size: 12px !important;
                        font-style: normal !important;
                        opacity: 0.6 !important;
                        margin-top: 5px !important;
                        padding-left: 10px !important;
                        border-left: 2px dashed #bdc3c7 !important;
                    }
                `,
                content_css: false,
                toolbar_mode: 'wrap',
                valid_elements: '*[*]',
                /* valid_styles: {
                    '*': 'color,font-size,font-weight,font-style,text-decoration,float,margin,padding,background,border'
                }, */
                valid_styles: {
                    '*': 'color,font-size,font-weight,font-style,text-decoration,float,margin,padding,background,border,border-left'
                },
                keep_styles: true,

                setup: function(editor) {
                    // Variables para control de salida con Enter
                    let enterCount = 0;
                    let lastEnterTime = 0;
                    const ENTER_DELAY = 1000; // 1 segundo entre Enters
                    const EXIT_ENTER_COUNT = 3; // 3 Enters para salir

                    // Función para obtener la clase CSS según el tipo
                    function getNoteClass(type) {
                        const classes = {
                            'basic': '',
                            'info': 'info-note',
                            'warning': 'warning-note',
                            'error': 'error-note',
                            'success': 'success-note',
                            'tip': 'tip-note',
                            'question': 'question-note'
                        };
                        return classes[type] || '';
                    }

                    // Función para verificar si el cursor está dentro de una nota
                    function isCursorInNote() {
                        const node = editor.selection.getNode();
                        return node.closest && node.closest('.note');
                    }

                    // Función para salir de la nota
                    function exitNote() {
                        const selection = editor.selection;
                        const node = selection.getNode();
                        const noteElement = node.closest('.note');

                        if (noteElement) {
                            // Crear un párrafo vacío después de la nota
                            const p = document.createElement('p');
                            p.innerHTML = '&nbsp;';
                            noteElement.parentNode.insertBefore(p, noteElement.nextSibling);

                            // Mover el cursor al nuevo párrafo
                            selection.setCursorLocation(p, 0);

                            // Remover clase de edición
                            noteElement.classList.remove('editing');
                        }

                        // Reiniciar contador
                        enterCount = 0;
                    }

                    // Manejar eventos de teclado
                    editor.on('keydown', function(e) {
                        const key = e.keyCode || e.which;

                        if (key === 13) { // Tecla ENTER
                            const now = Date.now();

                            // Verificar si estamos dentro de una nota
                            if (isCursorInNote()) {
                                e.preventDefault();

                                // Verificar si es un Enter rápido (dentro del tiempo límite)
                                if (now - lastEnterTime < ENTER_DELAY) {
                                    enterCount++;
                                } else {
                                    enterCount = 1; // Reiniciar si pasó mucho tiempo
                                }

                                lastEnterTime = now;

                                // Insertar salto de línea normal
                                editor.execCommand('InsertLineBreak');

                                // Si llegamos a 3 Enters, salir de la nota
                                if (enterCount >= EXIT_ENTER_COUNT) {
                                    setTimeout(exitNote, 50);
                                    return;
                                }

                                // Mostrar indicador visual de cuántos Enters llevamos
                                showExitIndicator(enterCount);
                            } else {
                                // Fuera de una nota, comportamiento normal
                                enterCount = 0;
                            }
                        } else if (key === 27) { // Tecla ESC
                            // ESC para salir inmediatamente
                            if (isCursorInNote()) {
                                e.preventDefault();
                                exitNote();
                            }
                        } else {
                            // Cualquier otra tecla reinicia el contador
                            if (!isCursorInNote()) {
                                enterCount = 0;
                            }
                        }
                    });

                    // Mostrar indicador visual de salida
                    function showExitIndicator(count) {
                        const node = editor.selection.getNode();
                        const noteElement = node.closest('.note');

                        if (noteElement) {
                            // Remover indicadores anteriores
                            const oldIndicators = noteElement.querySelectorAll('.exit-indicator');
                            oldIndicators.forEach(ind => ind.remove());

                            // Crear nuevo indicador
                            if (count > 1) {
                                const indicator = document.createElement('div');
                                indicator.className = 'exit-indicator';
                                indicator.innerHTML =
                                    `Presiona ENTER ${EXIT_ENTER_COUNT - count} vez(es) más para salir de la nota`;

                                // Insertar al final de la nota
                                noteElement.appendChild(indicator);

                                // Auto-remover después de 2 segundos
                                setTimeout(() => {
                                    if (indicator.parentNode) {
                                        indicator.remove();
                                    }
                                }, 2000);
                            }
                        }
                    }

                    // Manejar clics en notas para edición
                    editor.on('click', function(e) {
                        const node = e.target;
                        if (node.classList && node.classList.contains('note')) {
                            node.classList.add('editing');
                            enterCount = 0; // Reiniciar contador al hacer clic
                        }
                    });

                    // Remover clase de edición al salir de la nota
                    editor.on('blur', function() {
                        const notes = editor.getBody().querySelectorAll('.note.editing');
                        notes.forEach(note => note.classList.remove('editing'));
                        enterCount = 0;
                    });

                    // Botón personalizado mejorado
                    editor.ui.registry.addButton('customnotes', {
                        text: '📝 Insertar Nota',
                        tooltip: 'Insertar nota especial con diferentes estilos',
                        onAction: function() {
                            editor.windowManager.open({
                                title: 'Insertar Nota Personalizada',
                                body: {
                                    type: 'panel',
                                    items: [{
                                            type: 'selectbox',
                                            name: 'noteType',
                                            label: 'Tipo de nota:',
                                            items: [{
                                                    value: 'basic',
                                                    text: '📝 Nota Básica'
                                                },
                                                {
                                                    value: 'info',
                                                    text: 'ℹ️ Informativa'
                                                },
                                                {
                                                    value: 'warning',
                                                    text: '⚠️ Advertencia'
                                                },
                                                {
                                                    value: 'error',
                                                    text: '❌ Error'
                                                },
                                                {
                                                    value: 'success',
                                                    text: '✅ Éxito'
                                                },
                                                {
                                                    value: 'tip',
                                                    text: '💡 Consejo'
                                                },
                                                {
                                                    value: 'question',
                                                    text: '❓ Pregunta'
                                                }
                                            ]
                                        },
                                        {
                                            type: 'textarea',
                                            name: 'noteText',
                                            label: 'Contenido (ENTER para nuevas líneas):',
                                            placeholder: 'Escribe el contenido de la nota aquí...\nPuedes usar ENTER para nuevas líneas.\nPresiona ENTER 3 veces seguidas para salir.',
                                            maximized: true,
                                            rows: 8
                                        }
                                    ]
                                },
                                buttons: [{
                                        type: 'cancel',
                                        text: 'Cancelar'
                                    },
                                    {
                                        type: 'submit',
                                        text: 'Insertar Nota',
                                        primary: true
                                    }
                                ],
                                onSubmit: function(api) {
                                    const data = api.getData();
                                    if (data.noteText.trim() === '') {
                                        alert(
                                            'Por favor, escribe algún texto para la nota.'
                                        );
                                        return;
                                    }

                                    const noteClass = getNoteClass(data.noteType);
                                    // Convertir saltos de línea a párrafos para mejor estructura
                                    const lines = data.noteText.split('\n').filter(line =>
                                        line.trim() !== '');
                                    const content = lines.map(line => `<p>${line}</p>`)
                                        .join('');

                                    /* const noteHTML = `
                                <div class="note ${noteClass} editing">
                                    ${content}
                                    <div class="exit-indicator">Listo para editar. Presiona ENTER 3 veces seguidas para salir.</div>
                                </div>
                                <p>&nbsp;</p> <!-- Párrafo vacío después para continuar escribiendo -->
                            `; */
                                    function getInlineStyle(type) {
                                        const styles = {
                                            basic: "border-left:5px solid #f4c430;background:#fff9e6;",
                                            info: "border-left:5px solid #3498db;background:#ebf5fb;",
                                            warning: "border-left:5px solid #f39c12;background:#fef9e7;",
                                            error: "border-left:5px solid #e74c3c;background:#fdedec;",
                                            success: "border-left:5px solid #27ae60;background:#eafaf1;",
                                            tip: "border-left:5px solid #9b59b6;background:#f4ecf7;",
                                            question: "border-left:5px solid #1abc9c;background:#e8f8f5;"
                                        };

                                        return `
                                            ${styles[type] || styles.basic}
                                            padding:12px;
                                            margin:15px 0;
                                            border-radius:4px;
                                        `;
                                    }

                                    const inlineStyle = getInlineStyle(data.noteType);

                                    const noteHTML = `
                                        <div class="note ${noteClass}" style="${inlineStyle}">
                                            ${content}
                                            <div class="exit-indicator">Presiona ENTER 3 veces para salir</div>
                                        </div>
                                        <p>&nbsp;</p>
                                    `;

                                    editor.insertContent(noteHTML);
                                    api.close();

                                    // Enfocar la nota recién insertada
                                    setTimeout(() => {
                                        const notes = editor.getBody()
                                            .querySelectorAll('.note');
                                        if (notes.length > 0) {
                                            const lastNote = notes[notes.length -
                                                1];
                                            editor.selection.select(lastNote, true);
                                            editor.selection.collapse(false);
                                        }
                                    }, 100);
                                }
                            });
                        }
                    });
                }

            });
        </script>
    @endpush
</x-admin-layout>
