{{-- resources/views/layouts/admin.blade.php --}}
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Panel Administrativo') - {{ config('app.name', 'Video Gallery') }}</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- Select2 -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.3.0/dist/select2-bootstrap-5-theme.min.css"
        rel="stylesheet" />

    <!-- Toastr -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

    <!-- Admin Custom CSS -->
    <style>
        :root {
            --primary-color: #f97316;
            --primary-dark: #ea580c;
            --primary-light: #fdba74;
            --secondary-color: #1e293b;
            --light-bg: #f8fafc;
            --border-color: #e2e8f0;
        }

        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, sans-serif;
            background-color: #f8fafc;
            color: #1e293b;
            min-height: 100vh;
        }

        /* Sidebar */
        #sidebar {
            min-height: 100vh;
            background: white;
            box-shadow: 2px 0 10px rgba(0, 0, 0, 0.05);
            transition: all 0.3s;
            position: fixed;
            z-index: 1000;
        }

        .sidebar-header {
            background: linear-gradient(135deg, var(--primary-color) 0%, var(--primary-dark) 100%);
            padding: 20px;
            color: white;
        }

        .sidebar-header h3 {
            margin: 0;
            font-weight: 600;
        }

        .sidebar-header .logo {
            width: 40px;
            height: 40px;
            background: rgba(255, 255, 255, 0.2);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 10px;
        }

        .nav-link {
            color: #64748b;
            padding: 12px 20px;
            margin: 2px 15px;
            border-radius: 8px;
            transition: all 0.3s;
            font-weight: 500;
        }

        .nav-link:hover {
            background-color: #fff7ed;
            color: var(--primary-dark);
            transform: translateX(5px);
        }

        .nav-link.active {
            background: linear-gradient(90deg, #fff7ed 0%, white 100%);
            color: var(--primary-dark);
            border-left: 4px solid var(--primary-color);
            font-weight: 600;
        }

        .nav-link i {
            width: 20px;
            text-align: center;
            margin-right: 10px;
        }

        /* Content Wrapper */
        #content {
            margin-left: 250px;
            transition: all 0.3s;
            min-height: 100vh;
            background: #f8fafc;
        }

        #content.active {
            margin-left: 0;
        }

        /* Topbar */
        .topbar {
            background: white;
            border-bottom: 1px solid var(--border-color);
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
            padding: 15px 25px;
            position: sticky;
            top: 0;
            z-index: 100;
        }

        .topbar .navbar-toggler {
            border: none;
            color: var(--primary-color);
            font-size: 1.5rem;
        }

        .user-dropdown img {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            object-fit: cover;
        }

        .user-dropdown .dropdown-toggle::after {
            display: none;
        }

        /* Cards */
        .card {
            border: none;
            border-radius: 12px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.05);
            margin-bottom: 20px;
            border: 1px solid var(--border-color);
        }

        .card-header {
            background: white;
            border-bottom: 1px solid var(--border-color);
            padding: 20px;
            border-radius: 12px 12px 0 0 !important;
        }

        .card-header h5 {
            margin: 0;
            font-weight: 600;
            color: var(--secondary-color);
        }

        .card-header h5 i {
            color: var(--primary-color);
            margin-right: 10px;
        }

        /* Buttons */
        .btn-primary {
            background: linear-gradient(135deg, var(--primary-color) 0%, var(--primary-dark) 100%);
            border: none;
            padding: 10px 20px;
            font-weight: 500;
            transition: all 0.3s;
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 20px rgba(249, 115, 22, 0.3);
            background: linear-gradient(135deg, var(--primary-dark) 0%, #c2410c 100%);
        }

        .btn-outline-primary {
            color: var(--primary-color);
            border-color: var(--primary-color);
        }

        .btn-outline-primary:hover {
            background-color: var(--primary-color);
            border-color: var(--primary-color);
        }

        /* Tables */
        .table {
            margin-bottom: 0;
        }

        .table thead th {
            background-color: #f1f5f9;
            border-bottom: 2px solid var(--border-color);
            color: var(--secondary-color);
            font-weight: 600;
            padding: 15px;
        }

        .table tbody td {
            padding: 15px;
            vertical-align: middle;
            border-color: var(--border-color);
        }

        .table-hover tbody tr:hover {
            background-color: #fff7ed;
        }

        /* Badges */
        .badge {
            padding: 6px 12px;
            font-weight: 500;
            border-radius: 20px;
        }

        .badge-success {
            background-color: #dcfce7;
            color: #166534;
        }

        .badge-warning {
            background-color: #fef3c7;
            color: #92400e;
        }

        .badge-info {
            background-color: #dbeafe;
            color: #1e40af;
        }

        .badge-primary {
            background-color: #fff7ed;
            color: var(--primary-dark);
            border: 1px solid var(--primary-light);
        }

        /* Forms */
        .form-control,
        .form-select {
            border: 1px solid var(--border-color);
            border-radius: 8px;
            padding: 10px 15px;
            transition: all 0.3s;
        }

        .form-control:focus,
        .form-select:focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 0.25rem rgba(249, 115, 22, 0.25);
        }

        .form-label {
            font-weight: 500;
            color: var(--secondary-color);
            margin-bottom: 8px;
        }

        .custom-file-label {
            border: 1px solid var(--border-color);
            border-radius: 8px;
        }

        .custom-file-label::after {
            background: #f1f5f9;
            border-left: 1px solid var(--border-color);
            color: var(--secondary-color);
        }

        /* Thumbnail preview */
        .thumbnail-preview {
            width: 100%;
            height: 200px;
            object-fit: cover;
            border-radius: 8px;
            border: 2px dashed var(--border-color);
            background: #f8fafc;
        }

        /* Stats Cards */
        .stats-card {
            background: white;
            border-radius: 12px;
            padding: 20px;
            border-left: 4px solid;
            transition: all 0.3s;
        }

        .stats-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        }

        .stats-card i {
            font-size: 2rem;
            margin-bottom: 10px;
        }

        .stats-card .count {
            font-size: 2rem;
            font-weight: 700;
            margin: 10px 0;
        }

        /* Pagination */
        .pagination .page-link {
            color: var(--primary-color);
            border: 1px solid var(--border-color);
            margin: 0 3px;
            border-radius: 8px;
        }

        .pagination .page-item.active .page-link {
            background: linear-gradient(135deg, var(--primary-color) 0%, var(--primary-dark) 100%);
            border-color: var(--primary-color);
        }

        /* Alert */
        .alert {
            border: none;
            border-radius: 8px;
            padding: 15px 20px;
        }

        /* Responsive */
        @media (max-width: 768px) {
            #sidebar {
                margin-left: -250px;
            }

            #sidebar.active {
                margin-left: 0;
            }

            #content {
                margin-left: 0;
            }

            #content.active {
                margin-left: 0;
            }

            .topbar {
                padding: 10px 15px;
            }
        }

        /* Loading spinner */
        .loading-spinner {
            display: inline-block;
            width: 20px;
            height: 20px;
            border: 3px solid #f3f3f3;
            border-top: 3px solid var(--primary-color);
            border-radius: 50%;
            animation: spin 1s linear infinite;
        }

        @keyframes spin {
            0% {
                transform: rotate(0deg);
            }

            100% {
                transform: rotate(360deg);
            }
        }

        /* Video preview in table */
        .video-thumb-sm {
            width: 80px;
            height: 45px;
            object-fit: cover;
            border-radius: 4px;
            border: 1px solid var(--border-color);
        }

        /* Custom scrollbar */
        ::-webkit-scrollbar {
            width: 8px;
            height: 8px;
        }

        ::-webkit-scrollbar-track {
            background: #f1f5f9;
        }

        ::-webkit-scrollbar-thumb {
            background: var(--primary-light);
            border-radius: 4px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: var(--primary-color);
        }
    </style>

    @stack('styles')
</head>

<body>
    <!-- Sidebar -->
    <nav id="sidebar" class="d-flex flex-column">
        <!-- Sidebar Header -->
        <div class="sidebar-header d-flex align-items-center">
            <div class="logo">
                <i class="fas fa-film"></i>
            </div>
            <div>
                <h3>Video Gallery</h3>
                <small class="opacity-75">Panel Administrativo</small>
            </div>
        </div>

        <!-- Sidebar Content -->
        <div class="flex-grow-1 pt-3">
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('admin/dashboard') ? 'active' : '' }}"
                        href="{{ route('admin.dashboard') }}">
                        <i class="fas fa-tachometer-alt"></i>
                        Dashboard
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('admin/videos*') ? 'active' : '' }}"
                        href="{{ route('admin.videos.index') }}">
                        <i class="fas fa-video"></i>
                        Gestión de Videos
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('admin/categories*') ? 'active' : '' }}" href="#">
                        <i class="fas fa-folder"></i>
                        Categorías
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('admin/users*') ? 'active' : '' }}" href="#">
                        <i class="fas fa-users"></i>
                        Usuarios
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('admin/analytics*') ? 'active' : '' }}" href="#">
                        <i class="fas fa-chart-bar"></i>
                        Analytics
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('admin/settings*') ? 'active' : '' }}" href="#">
                        <i class="fas fa-cog"></i>
                        Configuración
                    </a>
                </li>
            </ul>

            <!-- Bottom Links -->
            <div class="mt-auto p-3">
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/') }}" target="_blank">
                            <i class="fas fa-external-link-alt"></i>
                            Ver Sitio Web
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('logout') }}"
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            <i class="fas fa-sign-out-alt"></i>
                            Cerrar Sesión
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Content Wrapper -->
    <div id="content">
        <!-- Topbar -->
        <nav class="topbar navbar navbar-expand-lg">
            <div class="container-fluid">
                <button class="navbar-toggler d-lg-none" type="button" id="sidebarCollapse">
                    <i class="fas fa-bars"></i>
                </button>

                <div class="d-flex align-items-center ms-auto">
                    <!-- Notifications -->
                    <div class="dropdown me-3">
                        <a href="#" class="nav-link" id="notificationDropdown" data-bs-toggle="dropdown">
                            <i class="fas fa-bell text-muted"></i>
                            <span class="badge bg-danger rounded-pill">3</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end">
                            <h6 class="dropdown-header">Notificaciones</h6>
                            <a class="dropdown-item" href="#">
                                <small>Nuevo video subido</small>
                            </a>
                            <a class="dropdown-item" href="#">
                                <small>5 nuevos usuarios</small>
                            </a>
                            <a class="dropdown-item" href="#">
                                <small>Actualización del sistema</small>
                            </a>
                        </div>
                    </div>

                    <!-- User Dropdown -->
                    <div class="dropdown">
                        <a href="#" class="d-flex align-items-center text-decoration-none dropdown-toggle"
                            id="userDropdown" data-bs-toggle="dropdown">
                            <div class="me-2">
                                <div class="bg-primary text-white rounded-circle d-flex align-items-center justify-content-center"
                                    style="width: 40px; height: 40px;">
                                    {{ strtoupper(substr(Auth::user()->name, 0, 2)) }}
                                </div>
                            </div>
                            <div class="d-none d-md-block">
                                <small class="text-muted">Bienvenido,</small>
                                <div class="fw-semibold">{{ Auth::user()->name }}</div>
                            </div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end">
                            <a class="dropdown-item" href="#">
                                <i class="fas fa-user me-2"></i>Mi Perfil
                            </a>
                            <a class="dropdown-item" href="#">
                                <i class="fas fa-cog me-2"></i>Configuración
                            </a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <i class="fas fa-sign-out-alt me-2"></i>Cerrar Sesión
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </nav>

        <!-- Main Content -->
        <div class="container-fluid px-4 py-3">
            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <i class="fas fa-check-circle me-2"></i>
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            @if (session('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <i class="fas fa-exclamation-circle me-2"></i>
                    {{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            @if ($errors->any())
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <i class="fas fa-exclamation-triangle me-2"></i>
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            @yield('content')
        </div>

        <!-- Footer -->
        <footer class="footer mt-auto py-3 border-top">
            <div class="container-fluid">
                <div class="row align-items-center">
                    <div class="col-md-6">
                        <span class="text-muted">
                            &copy; {{ date('Y') }} {{ config('app.name', 'Video Gallery') }}. Todos los derechos
                            reservados.
                        </span>
                    </div>
                    <div class="col-md-6 text-md-end">
                        <span class="text-muted">
                            <i class="fas fa-code-branch me-1"></i> v1.0.0
                        </span>
                    </div>
                </div>
            </div>
        </footer>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Select2 -->
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <!-- Toastr -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    <!-- Admin Custom JS -->
    <script>
        // Sidebar Toggle
        document.getElementById('sidebarCollapse').addEventListener('click', function() {
            document.getElementById('sidebar').classList.toggle('active');
            document.getElementById('content').classList.toggle('active');
        });

        // Initialize Select2
        $(document).ready(function() {
            // Initialize all select2 elements
            $('.select2').each(function() {
                $(this).select2({
                    theme: 'bootstrap-5',
                    placeholder: $(this).data('placeholder') || 'Selecciona opciones',
                    allowClear: $(this).data('allow-clear') || true,
                    width: $(this).data('width') || '100%'
                });
            });

            // File input preview
            $('.custom-file-input').on('change', function() {
                let fileName = $(this).val().split('\\').pop();
                $(this).next('.custom-file-label').addClass("selected").html(fileName);

                // Preview image if it's an image input
                if (this.files && this.files[0] && this.id.includes('thumbnail')) {
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        $('#thumbnail-preview').attr('src', e.target.result);
                    }
                    reader.readAsDataURL(this.files[0]);
                }
            });

            // Video duration formatter
            window.formatDuration = function(duration) {
                if (!duration) return '00:00';

                const parts = duration.split(':');
                if (parts.length === 3) {
                    const hours = parseInt(parts[0]);
                    const minutes = parseInt(parts[1]);
                    const seconds = parseInt(parts[2]);

                    if (hours > 0) {
                        return `${hours}h ${minutes.toString().padStart(2, '0')}m`;
                    }
                    return `${minutes}m ${seconds.toString().padStart(2, '0')}s`;
                }
                return duration;
            };

            // Format views
            window.formatViews = function(views) {
                if (views >= 1000000) {
                    return (views / 1000000).toFixed(1) + 'M';
                }
                if (views >= 1000) {
                    return (views / 1000).toFixed(1) + 'K';
                }
                return views;
            };

            // Confirm before delete
            $('form[data-confirm]').on('submit', function(e) {
                if (!confirm($(this).data('confirm'))) {
                    e.preventDefault();
                }
            });

            // Auto-dismiss alerts after 5 seconds
            setTimeout(function() {
                $('.alert').alert('close');
            }, 5000);

            // Initialize tooltips
            var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
            var tooltipList = tooltipTriggerList.map(function(tooltipTriggerEl) {
                return new bootstrap.Tooltip(tooltipTriggerEl);
            });

            // Initialize popovers
            var popoverTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="popover"]'));
            var popoverList = popoverTriggerList.map(function(popoverTriggerEl) {
                return new bootstrap.Popover(popoverTriggerEl);
            });

            // Toastr configuration
            toastr.options = {
                "closeButton": true,
                "debug": false,
                "newestOnTop": true,
                "progressBar": true,
                "positionClass": "toast-top-right",
                "preventDuplicates": true,
                "onclick": null,
                "showDuration": "300",
                "hideDuration": "1000",
                "timeOut": "5000",
                "extendedTimeOut": "1000",
                "showEasing": "swing",
                "hideEasing": "linear",
                "showMethod": "fadeIn",
                "hideMethod": "fadeOut"
            };

            // Handle form submissions with loading state
            $('form').on('submit', function() {
                const submitBtn = $(this).find('button[type="submit"]');
                if (submitBtn.length) {
                    submitBtn.prop('disabled', true);
                    submitBtn.html('<span class="loading-spinner"></span> Procesando...');
                }
            });

            // Video upload progress (if using AJAX)
            $(document).on('change', '#video_file', function() {
                const file = this.files[0];
                if (file) {
                    const fileSize = (file.size / (1024 * 1024)).toFixed(2);
                    if (fileSize > 500) {
                        toastr.error('El archivo es demasiado grande. Máximo 500MB.');
                        $(this).val('');
                    } else {
                        // Update duration field automatically if possible
                        // This would require additional JavaScript to read video metadata
                        console.log('Video file selected:', file.name, fileSize + 'MB');
                    }
                }
            });

            // Calculate duration from video file (requires additional libraries)
            window.calculateVideoDuration = function(input) {
                if (input.files && input.files[0]) {
                    const file = input.files[0];
                    const video = document.createElement('video');
                    video.preload = 'metadata';

                    video.onloadedmetadata = function() {
                        window.URL.revokeObjectURL(video.src);
                        const duration = video.duration;
                        const hours = Math.floor(duration / 3600);
                        const minutes = Math.floor((duration % 3600) / 60);
                        const seconds = Math.floor(duration % 60);

                        const formattedDuration =
                            hours.toString().padStart(2, '0') + ':' +
                            minutes.toString().padStart(2, '0') + ':' +
                            seconds.toString().padStart(2, '0');

                        // Auto-fill duration field if exists
                        const durationField = document.getElementById('duration');
                        if (durationField) {
                            durationField.value = formattedDuration;
                        }
                    };

                    video.src = URL.createObjectURL(file);
                }
            };

            // Toggle advanced options
            $('.toggle-advanced').on('click', function(e) {
                e.preventDefault();
                const target = $(this).data('target');
                $(target).slideToggle();
                $(this).find('i').toggleClass('fa-chevron-down fa-chevron-up');
            });

            // Bulk actions
            $('.bulk-select-all').on('change', function() {
                const isChecked = $(this).prop('checked');
                $('.bulk-select-item').prop('checked', isChecked);
                toggleBulkActions();
            });

            $('.bulk-select-item').on('change', function() {
                toggleBulkActions();
            });

            function toggleBulkActions() {
                const checkedCount = $('.bulk-select-item:checked').length;
                if (checkedCount > 0) {
                    $('.bulk-actions').removeClass('d-none');
                    $('.bulk-count').text(checkedCount);
                } else {
                    $('.bulk-actions').addClass('d-none');
                }
            }

            // Search functionality
            $('.search-input').on('keyup', function() {
                const searchTerm = $(this).val().toLowerCase();
                $('.searchable-row').each(function() {
                    const text = $(this).text().toLowerCase();
                    $(this).toggle(text.indexOf(searchTerm) > -1);
                });
            });

            // Sort table
            $('.sortable').on('click', function() {
                const table = $(this).closest('table');
                const column = $(this).index();
                const rows = table.find('tbody tr').toArray();
                const direction = $(this).hasClass('asc') ? -1 : 1;

                rows.sort(function(a, b) {
                    const aVal = $(a).find('td').eq(column).text();
                    const bVal = $(b).find('td').eq(column).text();
                    return (aVal > bVal ? 1 : -1) * direction;
                });

                table.find('tbody').empty().append(rows);
                $(this).toggleClass('asc desc');
                $(this).find('i').toggleClass('fa-sort-up fa-sort-down');
            });

            // Export functionality
            $('.export-btn').on('click', function() {
                const format = $(this).data('format');
                const tableId = $(this).data('table');
                exportTable(format, tableId);
            });

            function exportTable(format, tableId) {
                const table = document.getElementById(tableId);
                let data = [];

                // Get headers
                const headers = [];
                $(table).find('thead th').each(function() {
                    headers.push($(this).text().trim());
                });
                data.push(headers);

                // Get rows
                $(table).find('tbody tr').each(function() {
                    const row = [];
                    $(this).find('td').each(function() {
                        row.push($(this).text().trim());
                    });
                    data.push(row);
                });

                // Create CSV
                if (format === 'csv') {
                    const csvContent = data.map(row =>
                        row.map(cell => `"${cell}"`).join(',')
                    ).join('\n');

                    const blob = new Blob([csvContent], {
                        type: 'text/csv;charset=utf-8;'
                    });
                    const link = document.createElement('a');
                    const url = URL.createObjectURL(blob);
                    link.setAttribute('href', url);
                    link.setAttribute('download', 'export.csv');
                    link.style.visibility = 'hidden';
                    document.body.appendChild(link);
                    link.click();
                    document.body.removeChild(link);
                }

                toastr.success('Exportación completada');
            }

            // Dashboard stats update
            function updateDashboardStats() {
                $.ajax({
                    url: '/admin/api/stats',
                    method: 'GET',
                    success: function(data) {
                        if (data.success) {
                            $('#total-videos').text(data.data.total_videos);
                            $('#total-views').text(formatViews(data.data.total_views));
                            $('#total-users').text(data.data.total_users || '0');
                            $('#total-hours').text(data.data.total_hours + 'h');
                        }
                    },
                    error: function() {
                        console.error('Error loading stats');
                    }
                });
            }

            // Update stats every 5 minutes
            setInterval(updateDashboardStats, 300000);

            // Initialize stats on dashboard page
            if ($('#total-videos').length) {
                updateDashboardStats();
            }

            // Video player preview in admin
            $('.preview-video').on('click', function(e) {
                e.preventDefault();
                const videoUrl = $(this).data('video');
                const modal = $('#videoPreviewModal');

                if (modal.length) {
                    const videoPlayer = modal.find('video')[0];
                    if (videoPlayer) {
                        videoPlayer.src = videoUrl;
                        videoPlayer.load();
                        modal.modal('show');
                    }
                }
            });

            // Clean up video player on modal close
            $('#videoPreviewModal').on('hidden.bs.modal', function() {
                const videoPlayer = $(this).find('video')[0];
                if (videoPlayer) {
                    videoPlayer.pause();
                    videoPlayer.currentTime = 0;
                }
            });

            // Image upload preview
            $(document).on('change', '.image-upload', function() {
                const input = this;
                const previewId = $(this).data('preview');

                if (input.files && input.files[0]) {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        $('#' + previewId).attr('src', e.target.result);
                    };
                    reader.readAsDataURL(input.files[0]);
                }
            });

            // Character counter for textareas
            $('textarea[maxlength]').on('input', function() {
                const maxLength = $(this).attr('maxlength');
                const currentLength = $(this).val().length;
                const counter = $(this).next('.char-counter');

                if (counter.length) {
                    counter.text(`${currentLength}/${maxLength}`);

                    if (currentLength > maxLength * 0.9) {
                        counter.addClass('text-danger');
                    } else {
                        counter.removeClass('text-danger');
                    }
                }
            });

            // Initialize all textarea counters
            $('textarea[maxlength]').trigger('input');

            // Form validation
            $('.needs-validation').on('submit', function(event) {
                if (!this.checkValidity()) {
                    event.preventDefault();
                    event.stopPropagation();
                }
                $(this).addClass('was-validated');
            });
        });

        // Global functions
        window.showLoading = function(element) {
            const originalHtml = element.innerHTML;
            element.innerHTML = '<span class="loading-spinner"></span>';
            element.disabled = true;
            return originalHtml;
        };

        window.hideLoading = function(element, originalHtml) {
            element.innerHTML = originalHtml;
            element.disabled = false;
        };

        window.copyToClipboard = function(text) {
            navigator.clipboard.writeText(text).then(function() {
                toastr.success('Copiado al portapapeles');
            }, function() {
                toastr.error('Error al copiar');
            });
        };

        // Handle offline/online status
        window.addEventListener('online', function() {
            toastr.info('Conexión restablecida');
        });

        window.addEventListener('offline', function() {
            toastr.warning('Estás offline. Algunas funciones pueden no estar disponibles.');
        });
    </script>

    @stack('scripts')
</body>

</html>
