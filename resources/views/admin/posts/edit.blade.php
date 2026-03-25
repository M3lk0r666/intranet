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
                    <label class="block mb-2.5 text-sm font-medium text-heading">Contenido</label>
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
            const dialogConfig = {
                title: 'Agregar Nota',
                body: {
                    type: 'panel',
                    items: [{
                            type: 'selectbox', // component type
                            name: 'choosydata', // identifier
                            label: 'Selecciona el tipo de Nota',
                            enabled: true, // enabled state
                            items: [{
                                    text: 'Informativa',
                                    value: 'info'
                                },
                                {
                                    text: 'Advertencia',
                                    value: 'warning'
                                },
                                {
                                    text: 'Peligro',
                                    value: 'danger'
                                },
                                {
                                    text: 'Link',
                                    value: 'link'
                                },
                                {
                                    text: 'Bueno',
                                    value: 'bueno'
                                },

                            ],
                            context: 'mode:design' // listbox is active when the editor is in design mode, only effective when enabled is true
                        },
                        /* {
                            type: 'input',
                            name: 'textnote',
                            label: 'Digite el texto de la Nota'
                        }, */
                        {
                            type: 'textarea', // component type
                            name: 'textnote', // identifier
                            label: 'Texto de la Nota: ',
                            placeholder: 'informacion relacionada a la nota que desea agregar',
                            enabled: true, // enabled state
                            maximized: false, // grow width to take as much space as possible
                            context: 'mode:design' // textarea is active when the editor is in design mode, only effective when enabled is true
                        },
                    ]
                },
                buttons: [{
                        type: 'cancel',
                        name: 'closeButton',
                        text: 'Cancelar'
                    },
                    {
                        type: 'custom',
                        name: 'lastpage',
                        text: 'Agregar',
                        enable: true,
                        buttonType: 'primary'
                    }
                ],
                initialData: {
                    choosydata: '',
                    textnote: '',
                },
                onAction: (dialogApi, details) => {
                    const data = dialogApi.getData();

                    /* const result = 'You chose wisely: ' + data.choosydata; */
                    const result = data.choosydata;
                    console.log(result);
                    /* if(data.choosydata === 'danger'){
                        console.log('es peligro');
                    }else{
                        console.log('es otro');
                    } */
                    switch (data.choosydata) {
                        case 'info':
                            //console.log('es informativa');
                            tinymce.activeEditor.execCommand('mceInsertContent', true,
                                `<div style="border: 1px solid #d1c4e9; background-color: #6591c329; box-shadow: inset 4px 0 0 #054c9d;  border-radius: 6px; padding: 12px 16px; max-width: 800px; text-align: justify;"><div class="callout-header"><span style="font-weight: bold; color: #054c9d;">Información</span></div><div class="callout-content"><p>${data.textnote}</p></div></div>&nbsp;`
                            );

                            break;
                        case 'warning':
                            //console.log('es advertencia');
                            tinymce.activeEditor.execCommand('mceInsertContent', false,
                                `<div style="border: 1px solid #d1c4e9; background-color: #dd5a0721; box-shadow: inset 4px 0 0 #fbc02d;  border-radius: 6px; padding: 12px 16px; max-width: 800px; text-align: justify;"><div class="callout-header"><span style="font-weight: bold; color: #e75908;">Advertencia</span></div><div class="callout-content"><p>${data.textnote}</p></div></div>&nbsp;`
                            );
                            break;
                        case 'danger':
                            //console.log('es peligro');
                            /* tinymce.activeEditor.execCommand('mceInsertContent', false, `<p><strong>${data.textnote}</strong></p>`); */
                            tinymce.activeEditor.execCommand('mceInsertContent', false,
                                `<div style="border: 1px solid #d1c4e9; background-color: #ffebee; box-shadow: inset 4px 0 0 #e53935;  border-radius: 6px; padding: 12px 16px; max-width: 800px; text-align: justify;"><div class="callout-header"><span style="font-weight: bold; color: #e53935;">Peligro</span></div><div class="callout-content"><p>${data.textnote}</p></div></div>&nbsp;`
                            );
                            break;
                        case 'link':
                            //console.log('es bueno');
                            tinymce.activeEditor.execCommand('mceInsertContent', false,
                                `<div style="border: 1px solid #5ae9db; background-color: #defefb; box-shadow: inset 4px 0 0 #4cebdc;  border-radius: 6px; padding: 12px 16px; max-width: 800px; text-align: justify;"><div class="callout-header"><span style="font-weight: bold; color: #00988a;"><b>Links de consulta</b></span></div><div class="callout-content"><p><a target="_blank" rel="nofollow noreferrer noopener" class="external free" href="${data.textnote}">${data.textnote}</a></p></div></div>&nbsp;`
                            );
                            break;
                        case 'bueno':
                            //console.log('es bueno');
                            tinymce.activeEditor.execCommand('mceInsertContent', false,
                                `<div style="border: 1px solid #d1c4e9; background-color: #e8f5e9; box-shadow: inset 4px 0 0 #43a047;  border-radius: 6px; padding: 12px 16px; max-width: 800px; text-align: justify;"><div class="callout-header"><span style="font-weight: bold; color: #43a047;">Visto Bueno</span></div><div class="callout-content"><p>${data.textnote}</p></div></div>&nbsp;`
                            );
                            break;
                    }


                    dialogApi.close();
                }
            };

            tinymce.init({
                selector: '#content',
                toolbar_mode: 'floating',
                skin: 'oxide',
                plugins: [
                    'codesample', 'preview', 'image', 'table', 'code',
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
                        text: 'cfg',
                        value: 'cisco'
                    },
                    {
                        text: 'exreme',
                        value: 'extreme'
                    }
                ],
                toolbar: 'codesample | link image | undo redo | dialog-example-btn | tableprops tabledelete | tableinsertrowbefore tableinsertrowafter tabledeleterow | tableinsertcolbefore tableinsertcolafter tabledeletecol',
                /*Boton personalizado*/
                setup: (editor) => {
                    editor.ui.registry.addButton('dialog-example-btn', {
                        tooltip: 'Agregar nota',
                        icon: 'comment-add',
                        onAction: () => editor.windowManager.open(dialogConfig)
                    })
                },

                /* enable title field in the Image dialog*/
                image_title: true,
                /* enable automatic uploads of images represented by blob or data URIs*/
                automatic_uploads: true,
                /*
                    URL of our upload handler (for more details check: https://www.tiny.cloud/docs/configure/file-image-upload/#images_upload_url)
                    images_upload_url: 'postAcceptor.php',
                    here we add custom filepicker only to Image dialog
                */
                file_picker_types: 'image',
                /* and here's our custom image picker*/
                file_picker_callback: (cb, value, meta) => {
                    const input = document.createElement('input');
                    input.setAttribute('type', 'file');
                    input.setAttribute('accept', 'image/*');

                    input.addEventListener('change', (e) => {
                        const file = e.target.files[0];

                        const reader = new FileReader();
                        reader.addEventListener('load', () => {
                            /*
                            Note: Now we need to register the blob in TinyMCEs image blob
                            registry. In the next release this part hopefully won't be
                            necessary, as we are looking to handle it internally.
                            */
                            const id = 'blobid' + (new Date()).getTime();
                            const blobCache = tinymce.activeEditor.editorUpload.blobCache;
                            const base64 = reader.result.split(',')[1];
                            const blobInfo = blobCache.create(id, file, base64);
                            blobCache.add(blobInfo);

                            /* call the callback and populate the Title field with the file name */
                            cb(blobInfo.blobUri(), {
                                title: file.name
                            });
                        });
                        reader.readAsDataURL(file);
                    });

                    input.click();
                },
                content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:16px }',
                license_key: 'gpl',
                promotion: false,

            });
        </script>
    @endpush
</x-admin-layout>
