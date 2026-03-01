{{-- resources/views/layouts/app.blade.php --}}
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Guías Técnicas')</title>

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- Styles originales del header/footer -->
    <style>
        /* Header y footer originales del frontend */
        :root {
            --primary-color: #FF6600;
            --secondary-color: #000000;
            --background-color: #FFFFFF;
            --light-gray: #F5F5F5;
            --dark-gray: #333333;
        }

        /* Solo mantenemos el header/footer original */
        .main-header {
            background-color: var(--secondary-color);
            color: white;
            padding: 15px 0;
            border-bottom: 5px solid var(--primary-color);
        }

        .logo {
            display: flex;
            align-items: center;
            gap: 15px;
            text-decoration: none;
            color: white;
        }

        .logo-icon {
            background-color: var(--primary-color);
            width: 50px;
            height: 50px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 24px;
        }

        .logo-text h1 {
            font-size: 24px;
            font-weight: 700;
            margin: 0;
        }

        .logo-text p {
            color: #DDD;
            font-size: 14px;
            margin: 0;
        }

        .main-footer {
            background-color: var(--secondary-color);
            color: white;
            padding: 40px 0 20px;
        }

        .footer-links a {
            color: #DDD;
            text-decoration: none;
            transition: color 0.3s;
        }

        .footer-links a:hover {
            color: var(--primary-color);
        }
    </style>

    @stack('styles')
</head>

<body>
    <!-- Header original del frontend -->
    <header class="main-header">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <a href="{{ route('home') }}" class="logo">
                        <div class="logo-icon">
                            <i class="fas fa-network-wired"></i>
                        </div>
                        <div class="logo-text">
                            <h1>Guías Técnicas</h1>
                            <p>Documentación especializada para profesionales</p>
                        </div>
                    </a>
                </div>
                <div class="col-md-6 text-md-end">
                    <a href="{{ route('intranet.guias.index') }}" class="btn btn-outline-light">
                        <i class="fas fa-book me-1"></i> Todas las Guías
                    </a>
                </div>
            </div>
        </div>
    </header>

    <!-- Contenido de la guía (con el diseño del backend) -->
    @yield('content')

    <!-- Footer original del frontend -->
    <footer class="main-footer">
        <div class="container">
            <div class="row">
                <div class="col-md-4 mb-4">
                    <div class="logo mb-3">
                        <div class="logo-icon">
                            <i class="fas fa-network-wired"></i>
                        </div>
                        <div class="logo-text">
                            <h4>Guías Técnicas</h4>
                            <p>Profesionalismo documentado</p>
                        </div>
                    </div>
                </div>

                <div class="col-md-4 mb-4">
                    <h5 class="mb-3">Enlaces Rápidos</h5>
                    <div class="footer-links">
                        <p><a href="{{ route('home') }}"><i class="fas fa-chevron-right me-2"></i> Inicio</a></p>
                        <p><a href="{{ route('intranet.guias.index') }}"><i class="fas fa-chevron-right me-2"></i> Todas
                                las
                                Guías</a></p>
                    </div>
                </div>

                <div class="col-md-4 mb-4">
                    <h5 class="mb-3">Contacto</h5>
                    <p class="text-light">
                        <i class="fas fa-envelope me-2"></i> info@guiastecnicas.com
                    </p>
                </div>
            </div>

            <hr class="bg-light">

            <div class="row">
                <div class="col-md-12 text-center">
                    <p class="mb-0">
                        &copy; {{ date('Y') }} Guías Técnicas. Todos los derechos reservados.
                    </p>
                </div>
            </div>
        </div>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Scripts personalizados -->
    <script>
        // Toggle para mostrar/ocultar secciones en móvil
        document.addEventListener('DOMContentLoaded', function() {
            // Para móviles, hacer las secciones colapsables
            if (window.innerWidth < 768) {
                const sectionHeaders = document.querySelectorAll('.section-header');
                sectionHeaders.forEach(header => {
                    header.style.cursor = 'pointer';
                    header.addEventListener('click', function() {
                        const sectionContent = this.nextElementSibling;
                        if (sectionContent.style.display === 'none') {
                            sectionContent.style.display = 'block';
                            this.querySelector('i').classList.remove('fa-chevron-down');
                            this.querySelector('i').classList.add('fa-chevron-up');
                        } else {
                            sectionContent.style.display = 'none';
                            this.querySelector('i').classList.remove('fa-chevron-up');
                            this.querySelector('i').classList.add('fa-chevron-down');
                        }
                    });
                });
            }

            // Copiar comandos al portapapeles
            document.querySelectorAll('.copy-command').forEach(button => {
                button.addEventListener('click', function() {
                    const command = this.getAttribute('data-command');
                    navigator.clipboard.writeText(command).then(() => {
                        const originalHTML = this.innerHTML;
                        this.innerHTML = '<i class="fas fa-check"></i> Copiado';
                        this.classList.add('btn-success');

                        setTimeout(() => {
                            this.innerHTML = originalHTML;
                            this.classList.remove('btn-success');
                        }, 2000);
                    });
                });
            });
        });
    </script>

    @stack('scripts')
</body>

</html>
