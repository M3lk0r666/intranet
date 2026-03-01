<!-- Footer -->
<footer class="mt-5 py-8 border-t border-gray-200">
    <div class="container mx-auto px-4">
        <div class="flex flex-col md:flex-row justify-between items-center">
            <div class="mb-4 md:mb-0">
                <p class="text-gray-600">
                    <i class="fas fa-sitemap text-blue-600 mr-2"></i>
                    &copy; {{ date('Y') }} Procesos Empresariales -
                    {{ config('app.name', 'Portal Empresarial') }}
                </p>
            </div>
            <div class="flex gap-6">
                <a href="#" class="text-gray-500 hover:text-gray-700">
                    <i class="fas fa-question-circle"></i> Ayuda
                </a>
                <a href="#" class="text-gray-500 hover:text-gray-700">
                    <i class="fas fa-envelope"></i> Contacto
                </a>
            </div>
        </div>
    </div>
    <div class="container mx-auto px-4 text-center">
        <p class="text-gray-600">
            &copy; {{ date('Y') }} {{ config('app.name', 'Portal Empresarial') }}. Todos los derechos
            reservados.
        </p>
        <div class="mt-4">
            <a href="#" class="text-gray-500 hover:text-gray-700 mx-3">Privacidad</a>
            <a href="#" class="text-gray-500 hover:text-gray-700 mx-3">Términos</a>
            <a href="#" class="text-gray-500 hover:text-gray-700 mx-3">Soporte</a>
        </div>
    </div>
</footer>
