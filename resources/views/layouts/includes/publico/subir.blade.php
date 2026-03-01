<!-- Botón Volver al Inicio -->
<button id="scrollToTopBtn"
    class="fixed bottom-8 right-8 bg-gray-800 text-white p-3 rounded-full shadow-lg hover:bg-gray-900 transition-all duration-300 opacity-0 transform translate-y-10 z-40">
    <i class="ri-arrow-up-line text-xl"></i>
</button>

<!-- JavaScript -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const scrollToTopBtn = document.getElementById('scrollToTopBtn');

        // Mostrar/ocultar botón según el scroll
        window.addEventListener('scroll', function() {
            if (window.pageYOffset > 300) {
                scrollToTopBtn.classList.add('show');
            } else {
                scrollToTopBtn.classList.remove('show');
            }
        });

        // Función para volver al inicio
        scrollToTopBtn.addEventListener('click', function() {
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        });
    });
</script>
