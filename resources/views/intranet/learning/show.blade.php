@extends('layouts.intranet')

@section('title', 'Intranet Corporativa')

@push('css')
    <link href="/assets/css/intrahome.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/3.11.174/pdf.min.js"></script>
@endpush

@section('content')
    <div id="progressBar" class="fixed top-0 left-0 h-1 bg-orange-500 z-50" style="width: 0%">
    </div>

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
                            <a href="{{ route('learning.index') }}"
                                class="ml-1 text-sm text-gray-600 hover:text-orange-600 md:ml-2">Formacion
                                Academica</a>
                        </div>
                    </li>
                    <li aria-current="page">
                        <div class="flex items-center">
                            <i class="fas fa-chevron-right text-gray-400 mx-2"></i>
                            <span class="ml-1 text-sm text-primary font-medium md:ml-2">{{ $item->title }}</span>
                        </div>
                    </li>
                </ol>
            </nav>
        </div>
    </div>

    <!-- Encabezado -->
    <div class="mb-8 mt-6">
        <h1 class="text-3xl font-bold text-gray-800 mb-2">Recursos de Marca</h1>
        <p class="text-gray-600">Bienvenido al centro de la identidad digital de Netjer Networks.</p>
        <p class="text-gray-600"> Acceda a nuestros fondos
            institucionales, presentaciones y recursos visuales más recientes.</p>
    </div>

    <div class="bg-white rounded-lg shadow p-6 mb-8">
        {{-- TOC MOBILE --}}
        <div class="lg:hidden mb-6">
            <button onclick="toggleToc()" class="w-full bg-gray-100 px-4 py-2 rounded-lg text-left font-semibold">
                📑 Contenido
            </button>
            <div id="tocMobile" class="hidden mt-3 bg-white border rounded-lg p-4 shadow">
                <ul id="toc-mobile-list" class="space-y-2 text-sm text-gray-600"></ul>
            </div>
        </div>

        <!-- Mostar el contenido -->
        <div class="flex gap-10 w-full">
            {{-- SIDEBAR --}}
            @if ($type === 'content' && $item->isGuide())
                <aside
                    class="hidden lg:block w-64 flex-shrink-0 sticky top-24 self-start max-h-[calc(100vh-120px)] overflow-y-auto p-4 bg-gray-50 border-r pr-4">
                    <h3 class="font-semibold mb-4 text-sm text-gray-700">Contenido</h3>
                    <ul id="toc" class="space-y-2 text-sm text-gray-600"></ul>
                </aside>

                {{-- CONTENIDO --}}
                <div class="flex-1 min-w-0 pl-4">
                    <h1 class="text-3xl font-bold mb-6">
                        {{ $item->title }}
                    </h1>
                    <div id="content" class="prose max-w-none">
                        {!! $item->html_content !!}
                    </div>
                </div>
            @endif
        </div>
        <div>
            <div class="flex justify-between items-center mb-4">
                <h1 class="text-2xl font-bold">{{ $item->title }}</h1>

                {{-- <a href="{{ asset('storage/' . $item->file_path) }}" target="_blank"
                    class="bg-blue-600 text-white px-4 py-2 rounded">
                    Descargar
                </a> --}}
            </div>
            @if ($type === 'content' && $item->isPdf())
                <div class="w-full">
                    {{-- <iframe src="{{ asset('storage/' . $item->file_path) }}#toolbar=1"
                        class="w-full h-[90vh] rounded-lg border">
                    </iframe> --}}
                    <div class="w-full">

                        {{-- Toolbar --}}
                        <div class="flex justify-between items-center mb-4 bg-white p-3 rounded shadow">

                            <div class="flex items-center gap-3">
                                <button onclick="prevPage()" class="px-3 py-1 bg-gray-200 rounded">◀</button>
                                <span id="pageInfo">Página 1</span>
                                <button onclick="nextPage()" class="px-3 py-1 bg-gray-200 rounded">▶</button>
                            </div>

                            <div class="flex items-center gap-3">
                                <button onclick="zoomOut()" class="px-3 py-1 bg-gray-200 rounded">➖</button>
                                <span id="zoomLevel">100%</span>
                                <button onclick="zoomIn()" class="px-3 py-1 bg-gray-200 rounded">➕</button>
                            </div>

                            <a href="{{ asset('storage/' . $item->file_path) }}" target="_blank"
                                class="px-3 py-1 bg-blue-600 text-white rounded">
                                Descargar
                            </a>

                        </div>

                        {{-- Canvas --}}
                        <div class="bg-gray-100 p-4 rounded">
                            <canvas id="pdfCanvas" class="mx-auto shadow"></canvas>
                        </div>

                    </div>
                </div>
            @endif
        </div>
    </div>

    <button id="scrollTopBtn" onclick="scrollToTop()"
        class="hidden fixed bottom-6 right-6 bg-orange-500 text-white p-3 rounded-full shadow-lg hover:bg-orange-600 transition">
        ↑
    </button>
@endsection

@push('js')
    <script>
        function toggleToc() {
            const el = document.getElementById("tocMobile");
            el.classList.toggle("hidden");
        }

        function scrollToTop() {
            window.scrollTo({
                top: 0,
                behavior: "smooth"
            });
        }

        document.addEventListener("DOMContentLoaded", function() {
            const content = document.getElementById("content");
            const toc = document.getElementById("toc");
            const tocMobile = document.getElementById("toc-mobile-list");
            if (!content || !toc) return;
            const headings = content.querySelectorAll("h1, h2, h3");
            headings.forEach((heading) => {
                const id = heading.id;
                const text = heading.innerText;
                const level = heading.tagName.toLowerCase();
                const li = document.createElement("li");
                // indentación según nivel
                if (level === "h2") li.classList.add("ml-4");
                if (level === "h3") li.classList.add("ml-8");
                li.innerHTML = `
                <a href="#${id}" class="hover:text-orange-500 block">
                    ${text}
                </a>
            `;
                toc.appendChild(li);
                // también para móvil
                if (tocMobile) {
                    tocMobile.appendChild(li.cloneNode(true));
                }
            });

            window.addEventListener("scroll", () => {
                const sections = document.querySelectorAll("h1, h2, h3");
                let current = "";

                sections.forEach(section => {
                    const top = section.offsetTop - 100;
                    if (scrollY >= top) {
                        current = section.getAttribute("id");
                    }
                });

                document.querySelectorAll("#toc a").forEach(a => {
                    a.classList.remove("text-orange-500", "font-semibold");
                    if (a.getAttribute("href") === "#" + current) {
                        a.classList.add("text-orange-500", "font-semibold");
                    }
                });
            });

            const btn = document.getElementById("scrollTopBtn");
            window.addEventListener("scroll", () => {
                if (window.scrollY > 300) {
                    btn.classList.remove("hidden");
                } else {
                    btn.classList.add("hidden");
                }
            });

            window.addEventListener("scroll", () => {
                const scrollTop = window.scrollY;
                const docHeight = document.documentElement.scrollHeight - window.innerHeight;
                const progress = (scrollTop / docHeight) * 100;
                document.getElementById("progressBar").style.width = progress + "%";
            });

            //cerra el toc al hacer clic
            document.querySelectorAll("#toc-mobile-list a").forEach(link => {
                link.addEventListener("click", () => {
                    document.getElementById("tocMobile").classList.add("hidden");
                });
            });
        });
    </script>
    <script>
        let pdfDoc = null;
        let pageNum = 1;
        let scale = 1.2;

        const url = "{{ asset('storage/' . $item->file_path) }}";

        pdfjsLib.getDocument(url).promise.then(pdf => {
            pdfDoc = pdf;
            renderPage(pageNum);
        });

        function renderPage(num) {
            pdfDoc.getPage(num).then(page => {
                const canvas = document.getElementById('pdfCanvas');
                const ctx = canvas.getContext('2d');

                const viewport = page.getViewport({
                    scale
                });

                canvas.height = viewport.height;
                canvas.width = viewport.width;

                page.render({
                    canvasContext: ctx,
                    viewport: viewport
                });

                document.getElementById('pageInfo').innerText = `Página ${num} de ${pdfDoc.numPages}`;
                document.getElementById('zoomLevel').innerText = Math.round(scale * 100) + '%';
            });
        }

        function nextPage() {
            if (pageNum >= pdfDoc.numPages) return;
            pageNum++;
            renderPage(pageNum);
        }

        function prevPage() {
            if (pageNum <= 1) return;
            pageNum--;
            renderPage(pageNum);
        }

        function zoomIn() {
            scale += 0.2;
            renderPage(pageNum);
        }

        function zoomOut() {
            if (scale <= 0.6) return;
            scale -= 0.2;
            renderPage(pageNum);
        }
    </script>
@endpush
