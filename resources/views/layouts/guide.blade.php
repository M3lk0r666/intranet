{{-- resources/views/layouts/admin.blade.php --}}
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin - Guías')</title>

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <style>
        :root {
            --primary-color: #FF6600;
            --secondary-color: #000000;
            --background-color: #FFFFFF;
        }

        body {
            background-color: #f8f9fa;
        }

        .sidebar {
            position: fixed;
            top: 0;
            left: 0;
            height: 100vh;
            width: 250px;
            background-color: var(--secondary-color);
            color: white;
            padding: 0;
            z-index: 1000;
        }

        .main-content {
            margin-left: 250px;
            padding: 20px;
        }

        .sidebar-header {
            padding: 20px;
            border-bottom: 3px solid var(--primary-color);
            background-color: rgba(0, 0, 0, 0.2);
        }

        .nav-link {
            color: #ddd;
            padding: 12px 20px;
            border-left: 4px solid transparent;
            transition: all 0.3s;
        }

        .nav-link:hover,
        .nav-link.active {
            color: white;
            background-color: rgba(255, 102, 0, 0.1);
            border-left-color: var(--primary-color);
        }

        .nav-link i {
            width: 20px;
            text-align: center;
            margin-right: 10px;
        }

        .stat-card {
            border-radius: 10px;
            border: none;
            transition: transform 0.3s;
        }

        .stat-card:hover {
            transform: translateY(-5px);
        }

        @media (max-width: 768px) {
            .sidebar {
                width: 100%;
                height: auto;
                position: relative;
            }

            .main-content {
                margin-left: 0;
            }
        }
    </style>

    @stack('styles')
</head>

<body>
    <!-- Sidebar -->
    <div class="sidebar d-flex flex-column">
        <div class="sidebar-header">
            <h4 class="mb-0">
                <i class="fas fa-network-wired text-warning"></i>
                <span class="ms-2">Admin Guías</span>
            </h4>
            <small class="text-muted">Panel de Administración</small>
        </div>

        <div class="flex-grow-1">
            <nav class="nav flex-column mt-3">
                <a href="{{ route('admin.dashboard') }}"
                    class="nav-link {{ Request::is('admin/dashboard*') ? 'active' : '' }}">
                    <i class="fas fa-tachometer-alt"></i> Dashboard
                </a>
                <a href="{{ route('admin.guides.index') }}"
                    class="nav-link {{ Request::is('admin/guides*') ? 'active' : '' }}">
                    <i class="fas fa-book"></i> Guías
                </a>
                <a href="#" class="nav-link {{ Request::is('admin/users*') ? 'active' : '' }}">
                    <i class="fas fa-users"></i> Usuarios
                </a>
                <a href="#" class="nav-link {{ Request::is('admin/settings*') ? 'active' : '' }}">
                    <i class="fas fa-cog"></i> Configuración
                </a>
            </nav>
        </div>

        <div class="sidebar-footer p-3 border-top border-dark">
            <div class="d-flex align-items-center">
                <div class="flex-shrink-0">
                    <div class="bg-primary rounded-circle p-2">
                        <i class="fas fa-user"></i>
                    </div>
                </div>
                <div class="flex-grow-1 ms-3">
                    <small class="text-muted">Conectado como</small>
                    <div class="fw-bold">{{ Auth::user()->name ?? 'Administrador' }}</div>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Content -->
    <div class="main-content">
        @yield('content')
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    @stack('scripts')
</body>

</html>
