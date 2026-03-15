<div id="pdfModal"
    class="hidden fixed top-0 left-0 z-50 w-full h-full bg-black bg-opacity-60 flex items-center justify-center">

    <div class="relative w-11/12 h-5/6">

        <button onclick="closePdf()" class="absolute -top-10 right-0 bg-white px-3 py-1 rounded shadow">

            ✕ Cerrar

        </button>

        <div class="bg-white w-full h-full rounded shadow-lg overflow-hidden">

            <iframe id="pdfFrame" class="w-full h-full" src="">
            </iframe>

        </div>

    </div>

</div>

<script>
    function openPdf(url) {

        document.getElementById('pdfFrame').src = url;

        document.getElementById('pdfModal')
            .classList.remove('hidden');
    }

    function closePdf() {

        document.getElementById('pdfFrame').src = '';

        document.getElementById('pdfModal')
            .classList.add('hidden');
    }
</script>
