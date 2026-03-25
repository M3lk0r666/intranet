{{-- <div id="pdfModal" onclick="closePdf()"
    class="hidden fixed inset-0 z-50 bg-black/60 flex items-center justify-center p-4">
    <!-- Contenedor -->
    <div class="relative w-full max-w-5xl h-[85vh]">
        <!-- Botón cerrar (dentro del modal) -->   
        <button onclick="closePdf()" class="absolute -top-10 right-0 bg-white px-3 py-1 rounded shadow">
            ✕ Cerrar
        </button>
        <!-- Contenido -->
        <div class="bg-white w-full h-full rounded-xl shadow-lg overflow-hidden">
            <iframe id="pdfFrame" class="w-full h-full"></iframe>
        </div>
    </div>
</div> --}}
<!-- PDF MODAL -->
<div id="pdfModal" class="hidden fixed inset-0 z-50 bg-black/60 flex items-center justify-center p-4">
    <div class="relative w-full max-w-5xl h-[85vh]">
        <button onclick="closePdf()" class="absolute -top-10 right-0 bg-white px-3 py-1 rounded shadow">
            ✕ Cerrar
        </button>
        <iframe id="pdfFrame" class="w-full h-full rounded-xl bg-white"></iframe>
    </div>
</div>
<script>
    /* function openPdf(url) {
        document.getElementById('pdfFrame').src = url;
        document.getElementById('pdfModal')
            .classList.remove('hidden');
    }

    function closePdf() {
        document.getElementById('pdfFrame').src = '';
        document.getElementById('pdfModal')
            .classList.add('hidden');
    } */
    <
    script >
        function clientModal() {
            return {
                showModal: false,
                selectedClient: {},

                clients: @json($clientsFormatted),

                openClient(id) {
                    this.selectedClient = this.clients.find(c => c.id === id);
                    this.showModal = true;
                },

                closeModal() {
                    this.showModal = false;
                }
            }
        }

    function openPdf(url) {
        document.getElementById('pdfFrame').src = url;
        document.getElementById('pdfModal').classList.remove('hidden');
    }

    function closePdf() {
        document.getElementById('pdfFrame').src = '';
        document.getElementById('pdfModal').classList.add('hidden');
    }
</script>
</script>
