<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Video Gallery - Blanco y Naranja</title>

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- Plyr.io para reproductor -->
    <link rel="stylesheet" href="https://cdn.plyr.io/3.7.8/plyr.css" />

    <style>
        body {
            font-family: 'Inter', sans-serif;
            background: linear-gradient(135deg, #f8fafc 0%, #f1f5f9 100%);
            color: #1e293b;
            min-height: 100vh;
        }

        .main-header {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border-bottom: 1px solid #e2e8f0;
            box-shadow: 0 2px 10px rgba(249, 115, 22, 0.1);
            position: sticky;
            top: 0;
            z-index: 50;
        }

        .sidebar {
            background: white;
            border-right: 1px solid #e2e8f0;
            height: calc(100vh - 80px);
            position: sticky;
            top: 80px;
            overflow-y: auto;
            box-shadow: 2px 0 10px rgba(0, 0, 0, 0.05);
        }

        .sidebar-item {
            display: flex;
            align-items: center;
            padding: 12px 20px;
            color: #64748b;
            transition: all 0.3s ease;
            border-left: 4px solid transparent;
            cursor: pointer;
            border-bottom: 1px solid #f1f5f9;
        }

        .sidebar-item:hover {
            background: #fff7ed;
            color: #ea580c;
            border-left-color: #f97316;
        }

        .sidebar-item.active {
            background: linear-gradient(90deg, #fff7ed 0%, white 100%);
            color: #ea580c;
            border-left-color: #f97316;
            font-weight: 600;
        }

        .video-card {
            background: white;
            border-radius: 12px;
            overflow: hidden;
            transition: all 0.3s ease;
            border: 1px solid #e2e8f0;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.05);
            cursor: pointer;
        }

        .video-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 20px 40px rgba(249, 115, 22, 0.15);
            border-color: #f97316;
        }

        .video-thumbnail {
            position: relative;
            height: 200px;
            overflow: hidden;
            background: #f8fafc;
        }

        .video-thumbnail img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.5s ease;
        }

        .video-card:hover .video-thumbnail img {
            transform: scale(1.05);
        }

        /* Player Section */
        .video-player-section {
            background: white;
            border-radius: 16px;
            border: 2px solid #f97316;
            overflow: hidden;
            margin-bottom: 30px;
            box-shadow: 0 10px 30px rgba(249, 115, 22, 0.15);
        }

        .video-overlay {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(to top, rgba(0, 0, 0, 0.7) 0%, transparent 50%);
            display: flex;
            align-items: flex-end;
            padding: 15px;
        }

        .genre-tag {
            background: #fff7ed;
            color: #ea580c;
            padding: 4px 12px;
            border-radius: 20px;
            font-size: 11px;
            font-weight: 500;
            border: 1px solid #fed7aa;
        }

        .video-rating {
            color: #f59e0b;
        }

        .stats-grid .stat-card {
            background: white;
            border: 2px solid;
            border-radius: 12px;
            transition: all 0.3s ease;
        }

        .stats-grid .stat-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1);
        }

        .close-player {
            background: #f97316;
            color: white;
            transition: all 0.3s ease;
        }

        .close-player:hover {
            background: #ea580c;
            transform: rotate(90deg);
        }

        .see-all {
            color: #f97316;
            font-weight: 500;
            transition: all 0.3s ease;
        }

        .see-all:hover {
            color: #ea580c;
            transform: translateX(5px);
        }

        .mobile-menu-btn {
            color: #f97316;
        }

        @media (max-width: 768px) {
            .sidebar {
                position: fixed;
                left: -280px;
                top: 0;
                width: 280px;
                height: 100vh;
                z-index: 100;
                transition: left 0.3s ease;
                padding-top: 80px;
            }

            .sidebar.active {
                left: 0;
            }
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .video-card {
            animation: fadeIn 0.5s ease forwards;
        }

        /* Custom scrollbar */
        .sidebar::-webkit-scrollbar {
            width: 6px;
        }

        .sidebar::-webkit-scrollbar-track {
            background: #f1f5f9;
        }

        .sidebar::-webkit-scrollbar-thumb {
            background: #f97316;
            border-radius: 3px;
        }

        /* Gradient text for titles */
        .gradient-text {
            background: linear-gradient(135deg, #f97316 0%, #ea580c 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        /* Orange button styles */
        .btn-orange {
            background: linear-gradient(135deg, #f97316 0%, #ea580c 100%);
            color: white;
            border: none;
            transition: all 0.3s ease;
        }

        .btn-orange:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 20px rgba(249, 115, 22, 0.3);
            background: linear-gradient(135deg, #ea580c 0%, #c2410c 100%);
        }

        /* Tab styles */
        .tab-btn {
            background: #f1f5f9;
            color: #64748b;
            border: 1px solid #e2e8f0;
        }

        .tab-btn:hover {
            background: #fff7ed;
            color: #f97316;
            border-color: #fed7aa;
        }

        .tab-btn.active {
            background: linear-gradient(135deg, #f97316 0%, #ea580c 100%);
            color: white;
            border-color: #f97316;
        }
    </style>
</head>

<body>
    <!-- Header -->
    <header class="main-header py-4 px-6">
        <div class="container mx-auto flex justify-between items-center">
            <div class="flex items-center space-x-4">
                <button class="mobile-menu-btn md:hidden text-2xl" onclick="toggleSidebar()">
                    <i class="fas fa-bars"></i>
                </button>
                <div>
                    <h1 class="text-2xl font-bold">
                        <i class="fas fa-film gradient-text mr-2"></i>
                        <span class="gradient-text">Galería de Videos</span>
                    </h1>
                    <p class="text-sm text-slate-600">Contenido multimedia de capacitación</p>
                </div>
            </div>
            <div class="flex items-center space-x-4">
                <a href="/" class="btn-orange px-4 py-2 rounded-lg font-medium">
                    <i class="fas fa-home mr-2"></i>
                    Inicio
                </a>
            </div>
        </div>
    </header>

    <!-- Main Layout -->
    <div class="flex">
        <!-- Sidebar -->
        <aside class="sidebar w-64 hidden md:block" id="sidebar">
            <div class="p-4">
                <h3 class="text-sm font-semibold text-slate-500 uppercase tracking-wider mb-4">
                    <i class="fas fa-filter mr-2"></i>CATEGORÍAS
                </h3>
                <div class="space-y-1" id="categories-list">
                    <!-- Las categorías se cargarán dinámicamente -->
                </div>

                <h3 class="text-sm font-semibold text-slate-500 uppercase tracking-wider mt-8 mb-4">
                    <i class="fas fa-chart-bar mr-2"></i>ESTADÍSTICAS
                </h3>
                <div class="space-y-3">
                    <div class="flex justify-between items-center">
                        <span class="text-slate-600">Total Videos</span>
                        <span class="font-semibold text-orange-600" id="stat-total">0</span>
                    </div>
                    <div class="flex justify-between items-center">
                        <span class="text-slate-600">Vistas Totales</span>
                        <span class="font-semibold text-orange-600" id="stat-views">0</span>
                    </div>
                    <div class="flex justify-between items-center">
                        <span class="text-slate-600">Horas Contenido</span>
                        <span class="font-semibold text-orange-600" id="stat-hours">0h</span>
                    </div>
                </div>

                <!-- Información -->
                <div class="mt-8 pt-6 border-t border-slate-200">
                    <p class="text-xs text-slate-500">
                        <i class="fas fa-info-circle mr-1"></i>
                        © 2024 Galería de Videos<br>
                        Todos los derechos reservados
                    </p>
                </div>
            </div>
        </aside>

        <!-- Contenido Principal -->
        <main class="main-content flex-1 p-4 md:p-6">
            <!-- Reproductor -->
            <div class="video-player-section" id="videoPlayerSection" style="display: none;">
                <div class="p-4 md:p-6">
                    <div class="flex justify-between items-center mb-4">
                        <h2 class="text-xl font-bold text-slate-800" id="playerCategory">
                            <i class="fas fa-play-circle mr-2 gradient-text"></i>REPRODUCIENDO
                        </h2>
                        <button class="close-player w-10 h-10 rounded-full flex items-center justify-center"
                            onclick="closeVideoPlayer()">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>

                    <div class="video-player-wrapper mb-6 rounded-lg overflow-hidden">
                        <video id="mainPlayer" playsinline controls crossorigin="anonymous" class="w-full"></video>
                    </div>

                    <div class="player-info">
                        <h3 class="player-title text-2xl font-bold mb-3 text-slate-800" id="playerTitle"></h3>
                        <div class="player-meta flex flex-wrap gap-4 text-slate-600 mb-4">
                            <span id="playerDuration" class="flex items-center">
                                <i class="far fa-clock mr-2"></i>
                                <span id="duration-text"></span>
                            </span>
                            <span id="playerViews" class="flex items-center">
                                <i class="far fa-eye mr-2"></i>
                                <span id="views-text"></span>
                            </span>
                            <span id="playerRating" class="flex items-center">
                                <i class="fas fa-star mr-2"></i>
                                <span id="rating-text"></span>
                            </span>
                        </div>
                        <p class="player-description text-slate-700 bg-slate-50 p-4 rounded-lg" id="playerDescription">
                        </p>
                    </div>
                </div>
            </div>

            <!-- Tabs -->
            <div class="flex space-x-2 mb-8 overflow-x-auto">
                <button class="tab-btn px-4 py-2 rounded-lg font-medium whitespace-nowrap active"
                    onclick="filterByTab('all')">
                    <i class="fas fa-fire mr-2"></i>TODOS LOS VIDEOS
                </button>
                <button class="tab-btn px-4 py-2 rounded-lg font-medium whitespace-nowrap"
                    onclick="filterByTab('trending')">
                    <i class="fas fa-bolt mr-2"></i>TRENDING
                </button>
                <button class="tab-btn px-4 py-2 rounded-lg font-medium whitespace-nowrap" onclick="filterByTab('new')">
                    <i class="fas fa-star mr-2"></i>NUEVOS
                </button>
                <button class="tab-btn px-4 py-2 rounded-lg font-medium whitespace-nowrap"
                    onclick="filterByTab('free')">
                    <i class="fas fa-unlock mr-2"></i>GRATUITOS
                </button>
            </div>

            <!-- Encabezado -->
            <div class="mb-8">
                <h2 class="text-2xl md:text-3xl font-bold mb-2 text-slate-800" id="gallery-title">
                    <i class="fas fa-play-circle mr-2 gradient-text"></i>
                    <span class="gradient-text">Videos Destacados</span>
                </h2>
                <p class="text-slate-600">Selecciona un video para comenzar a verlo</p>
            </div>

            <!-- Grid de Videos -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6" id="videosGrid">
                <!-- Loading state -->
                <div class="text-center py-12 col-span-full">
                    <div class="animate-pulse">
                        <div class="h-8 bg-slate-200 rounded w-48 mx-auto mb-4"></div>
                        <div class="h-4 bg-slate-200 rounded w-32 mx-auto"></div>
                    </div>
                </div>
            </div>

            <!-- Estadísticas -->
            <div class="mt-12">
                <h3 class="text-xl font-bold mb-6 text-slate-800">
                    <i class="fas fa-chart-line mr-2 gradient-text"></i>
                    <span class="gradient-text">Estadísticas de la Plataforma</span>
                </h3>
                <div class="stats-grid grid grid-cols-1 md:grid-cols-3 gap-6">
                    <div class="stat-card p-6" style="border-color: #f97316;">
                        <div class="flex items-center">
                            <div class="mr-4 text-orange-500">
                                <i class="fas fa-play-circle text-3xl"></i>
                            </div>
                            <div>
                                <div class="stat-value text-2xl font-bold text-orange-600" id="card-total">0</div>
                                <div class="stat-label text-slate-600">Videos Totales</div>
                            </div>
                        </div>
                    </div>
                    <div class="stat-card p-6" style="border-color: #f59e0b;">
                        <div class="flex items-center">
                            <div class="mr-4 text-amber-500">
                                <i class="fas fa-eye text-3xl"></i>
                            </div>
                            <div>
                                <div class="stat-value text-2xl font-bold text-amber-600" id="card-views">0</div>
                                <div class="stat-label text-slate-600">Visualizaciones</div>
                            </div>
                        </div>
                    </div>
                    <div class="stat-card p-6" style="border-color: #fb923c;">
                        <div class="flex items-center">
                            <div class="mr-4 text-orange-400">
                                <i class="fas fa-clock text-3xl"></i>
                            </div>
                            <div>
                                <div class="stat-value text-2xl font-bold text-orange-500" id="card-hours">0h</div>
                                <div class="stat-label text-slate-600">Horas de Contenido</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Información -->
            <div class="mt-12 bg-gradient-to-r from-orange-50 to-amber-50 rounded-xl p-6 border border-orange-200">
                <h3 class="text-xl font-bold mb-4 text-slate-800">
                    <i class="fas fa-info-circle mr-2 text-orange-500"></i>
                    Sobre esta galería
                </h3>
                <p class="text-slate-700 mb-4">
                    Esta plataforma contiene videos educativos y de capacitación para el desarrollo profesional.
                    Todos los contenidos están organizados por categorías para facilitar su acceso.
                </p>
                <div class="flex items-center text-slate-600">
                    <i class="fas fa-lightbulb mr-2 text-orange-500"></i>
                    <span class="text-sm">Para sugerencias de contenido, contacta al administrador.</span>
                </div>
            </div>
        </main>
    </div>

    <!-- Footer -->
    <footer class="bg-white border-t border-slate-200 py-6 px-6 mt-8">
        <div class="container mx-auto">
            <div class="flex flex-col md:flex-row justify-between items-center">
                <div class="mb-4 md:mb-0">
                    <p class="text-slate-700">
                        <i class="fas fa-film text-orange-500 mr-2"></i>
                        Galería de Videos &copy; 2024
                    </p>
                    <p class="text-sm text-slate-500 mt-1">Plataforma de contenido educativo</p>
                </div>
                <div class="flex space-x-6">
                    <a href="#" class="text-slate-500 hover:text-orange-500 transition-colors">
                        <i class="fab fa-youtube text-lg"></i>
                    </a>
                    <a href="#" class="text-slate-500 hover:text-orange-500 transition-colors">
                        <i class="fab fa-linkedin text-lg"></i>
                    </a>
                    <a href="#" class="text-slate-500 hover:text-orange-500 transition-colors">
                        <i class="fas fa-envelope text-lg"></i>
                    </a>
                </div>
            </div>
        </div>
    </footer>

    <!-- Plyr.io -->
    <script src="https://cdn.plyr.io/3.7.8/plyr.js"></script>

    <script>
        // Configuración
        const API_BASE_URL = '/api';

        let mainPlayer = null;
        let currentCategory = 'all';
        let currentTab = 'all';
        let categories = [];
        let videos = [];

        // Inicializar
        document.addEventListener('DOMContentLoaded', async function() {
            await initApp();
        });

        async function initApp() {
            mainPlayer = new Plyr('#mainPlayer', {
                controls: ['play', 'progress', 'current-time', 'mute', 'volume', 'settings', 'fullscreen'],
                settings: ['quality', 'speed'],
                ratio: '16:9'
            });

            await loadCategories();
            await loadVideos();
            await loadStats();
        }

        // Cargar categorías
        async function loadCategories() {
            try {
                const response = await fetch(`${API_BASE_URL}/categories`);
                const data = await response.json();

                if (data.success) {
                    categories = data.data;
                    renderCategories();
                }
            } catch (error) {
                console.error('Error cargando categorías:', error);
                categories = [{
                        id: 1,
                        name: 'Capacitación',
                        slug: 'training',
                        color: '#f97316'
                    },
                    {
                        id: 2,
                        name: 'Procesos',
                        slug: 'process',
                        color: '#ea580c'
                    },
                    {
                        id: 3,
                        name: 'Técnicos',
                        slug: 'technical',
                        color: '#c2410c'
                    },
                    {
                        id: 4,
                        name: 'IA',
                        slug: 'ia',
                        color: '#f59e0b'
                    },
                    {
                        id: 5,
                        name: 'Desarrollo',
                        slug: 'development',
                        color: '#fb923c'
                    },
                    {
                        id: 6,
                        name: 'Marketing',
                        slug: 'marketing',
                        color: '#fdba74'
                    }
                ];
                renderCategories();
            }
        }

        // Renderizar categorías
        function renderCategories() {
            const container = document.getElementById('categories-list');
            container.innerHTML = '';

            const allItem = document.createElement('div');
            allItem.className = 'sidebar-item active';
            allItem.onclick = () => filterByCategory('all');
            allItem.innerHTML = `
                <i class="fas fa-globe-americas" style="color: #f97316"></i>
                <span>Todos los Videos</span>
                <span class="ml-auto text-xs bg-orange-100 text-orange-600 px-2 py-1 rounded" id="count-all">0</span>
            `;
            container.appendChild(allItem);

            categories.forEach(category => {
                const item = document.createElement('div');
                item.className = 'sidebar-item';
                item.onclick = () => filterByCategory(category.slug);
                item.innerHTML = `
                    <i class="fas fa-folder" style="color: ${category.color || '#f97316'}"></i>
                    <span> ${category.name}</span>
                    <span class="ml-auto text-xs bg-slate-100 text-slate-600 px-2 py-1 rounded" id="count-${category.slug}">0</span>
                `;
                container.appendChild(item);
            });
        }

        // Cargar videos
        async function loadVideos(categorySlug = 'all', tab = 'all') {
            const grid = document.getElementById('videosGrid');

            grid.innerHTML = `
                <div class="col-span-full text-center py-12">
                    <div class="animate-pulse">
                        <div class="h-6 bg-slate-200 rounded w-48 mx-auto mb-4"></div>
                        <div class="h-4 bg-slate-200 rounded w-32 mx-auto"></div>
                    </div>
                </div>
            `;

            try {
                let url = `${API_BASE_URL}/videos`;
                const params = [];

                if (categorySlug !== 'all') {
                    params.push(`category=${categorySlug}`);
                }

                if (tab === 'trending') {
                    params.push(`trending=true`);
                } else if (tab === 'new') {
                    params.push(`order_by=created_at&order_dir=desc`);
                } else if (tab === 'free') {
                    params.push(`free=true`);
                }

                if (params.length > 0) {
                    url += `?${params.join('&')}`;
                }

                const response = await fetch(url);
                const data = await response.json();

                if (data.success) {
                    videos = data.data.data;
                    renderVideos();
                    updateCategoryCounts();
                }
            } catch (error) {
                console.error('Error cargando videos:', error);
                videos = getSampleVideos();
                renderVideos();
                updateCategoryCounts();
            }
        }

        // Renderizar videos
        function renderVideos() {
            const grid = document.getElementById('videosGrid');

            if (videos.length === 0) {
                grid.innerHTML = `
                    <div class="col-span-full text-center py-12">
                        <i class="fas fa-video-slash text-4xl text-slate-300 mb-4"></i>
                        <h3 class="text-lg font-semibold text-slate-500 mb-2">No hay videos disponibles</h3>
                        <p class="text-slate-400">Prueba seleccionando otra categoría.</p>
                    </div>
                `;
                return;
            }

            grid.innerHTML = '';
            videos.forEach((video, index) => {
                const card = createVideoCard(video, index);
                grid.appendChild(card);
            });
        }

        // Crear tarjeta de video
        function createVideoCard(video, index) {
            const card = document.createElement('div');
            card.className = 'video-card';
            card.style.animationDelay = `${index * 0.1}s`;
            card.onclick = () => playVideo(video);

            const categoryColors = video.categories?.map(cat => {
                const category = categories.find(c => c.id === cat.id || c.slug === cat.slug);
                return category?.color || '#f97316';
            }) || ['#f97316'];

            const categoriesHTML = video.categories?.map((cat, i) => `
                <span class="genre-tag" style="border-color: ${categoryColors[i] || '#f97316'}; background: ${hexToRgba(categoryColors[i] || '#f97316', 0.1)}">
                    ${cat.name || cat}
                </span>
            `).join('') || '';

            card.innerHTML = `
                <div class="video-thumbnail">
                    <img src="${video.thumbnail_url || 'https://images.unsplash.com/photo-1493711662062-fa541adb3fc8?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80'}" 
                         alt="${video.title}"
                         onerror="this.src='https://images.unsplash.com/photo-1493711662062-fa541adb3fc8?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80'">
                    <div class="video-overlay">
                        <div class="flex justify-between items-end w-full">
                            <div class="text-white font-medium bg-black/50 px-3 py-1 rounded">
                                <i class="far fa-clock mr-1"></i>
                                ${formatDuration(video.duration || '01:39:35')}
                            </div>
                            ${video.is_free ? '<span class="bg-green-500 text-white text-xs px-2 py-1 rounded">Gratis</span>' : ''}
                        </div>
                    </div>
                    ${video.is_trending ? `
                                                <div class="absolute top-3 left-3 bg-gradient-to-r from-orange-500 to-red-500 text-white text-xs px-3 py-1 rounded-full flex items-center">
                                                    <i class="fas fa-fire mr-1"></i> Trending
                                                </div>
                                            ` : ''}
                </div>
                <div class="p-4">
                    <h3 class="font-bold text-lg mb-2 text-slate-800 line-clamp-2">${video.title}</h3>
                    <div class="mb-3 flex flex-wrap gap-2">
                        ${categoriesHTML}
                    </div>
                    <div class="flex justify-between text-sm text-slate-600">
                        <div class="flex items-center video-rating">
                            <i class="fas fa-star mr-1"></i>
                            <span>${video.rating || '8.4'}</span>
                        </div>
                        <div class="flex items-center">
                            <i class="far fa-eye mr-1"></i>
                            <span>${formatViews(video.views || 0)}</span>
                        </div>
                        <div class="flex items-center">
                            <i class="far fa-calendar mr-1"></i>
                            <span>${video.year || '2023'}</span>
                        </div>
                    </div>
                </div>
            `;

            return card;
        }

        // Reproducir video
        async function playVideo(video) {
            const playerSection = document.getElementById('videoPlayerSection');
            playerSection.style.display = 'block';

            document.getElementById('playerTitle').textContent = video.title;
            document.getElementById('playerCategory').textContent =
                video.categories?.map(c => c.name || c).join(' • ') || 'Video';
            document.getElementById('duration-text').textContent = formatDuration(video.duration || '01:39:35');
            document.getElementById('views-text').textContent = formatViews(video.views || 0);
            document.getElementById('rating-text').textContent = `${video.rating || '8.4'}/10`;
            document.getElementById('playerDescription').textContent = video.description ||
                'Sin descripción disponible.';

            if (mainPlayer) {
                mainPlayer.source = {
                    type: 'video',
                    sources: [{
                        src: video.video_url ||
                            'https://commondatastorage.googleapis.com/gtv-videos-bucket/sample/BigBuckBunny.mp4',
                        type: 'video/mp4'
                    }],
                    poster: video.thumbnail_url ||
                        'https://images.unsplash.com/photo-1493711662062-fa541adb3fc8?ixlib=rb-4.0.3&auto=format&fit=crop&w=1200&q=80'
                };

                playerSection.scrollIntoView({
                    behavior: 'smooth',
                    block: 'start'
                });

                setTimeout(() => {
                    mainPlayer.play();
                }, 500);
            }
        }

        // Cerrar reproductor
        function closeVideoPlayer() {
            const playerSection = document.getElementById('videoPlayerSection');
            playerSection.style.display = 'none';
            if (mainPlayer) {
                mainPlayer.pause();
            }
        }

        // Filtrar por categoría
        function filterByCategory(categorySlug) {
            currentCategory = categorySlug;

            document.querySelectorAll('.sidebar-item').forEach(item => {
                item.classList.remove('active');
            });

            document.querySelectorAll('.sidebar-item').forEach(item => {
                if (item.onclick && item.onclick.toString().includes(`'${categorySlug}'`)) {
                    item.classList.add('active');
                }
            });

            const titleElement = document.getElementById('gallery-title');
            if (categorySlug === 'all') {
                titleElement.innerHTML =
                    `<i class="fas fa-play-circle mr-2 gradient-text"></i><span class="gradient-text">Todos los Videos</span>`;
            } else {
                const category = categories.find(c => c.slug === categorySlug);
                titleElement.innerHTML =
                    `<i class="fas fa-play-circle mr-2 gradient-text"></i><span class="gradient-text">${category ? category.name : 'Videos'}</span>`;
            }

            loadVideos(categorySlug, currentTab);
        }

        // Filtrar por tab
        function filterByTab(tab) {
            currentTab = tab;

            document.querySelectorAll('.tab-btn').forEach(btn => {
                btn.classList.remove('active');
            });

            event.currentTarget.classList.add('active');

            loadVideos(currentCategory, tab);
        }

        // Cargar estadísticas
        async function loadStats() {
            try {
                const response = await fetch(`${API_BASE_URL}/stats`);
                const data = await response.json();

                if (data.success) {
                    updateStatsUI(data.data);
                }
            } catch (error) {
                console.error('Error cargando estadísticas:', error);
                updateStatsUI({
                    total_videos: videos.length,
                    total_views: videos.reduce((sum, v) => sum + (v.views || 0), 0),
                    total_hours: (videos.length * 1.5).toFixed(1)
                });
            }
        }

        // Actualizar UI de estadísticas
        function updateStatsUI(stats) {
            document.getElementById('stat-total').textContent = stats.total_videos;
            document.getElementById('stat-views').textContent = formatViews(stats.total_views);
            document.getElementById('stat-hours').textContent = `${stats.total_hours}h`;

            document.getElementById('card-total').textContent = stats.total_videos;
            document.getElementById('card-views').textContent = formatViews(stats.total_views);
            document.getElementById('card-hours').textContent = `${stats.total_hours}h`;
        }

        // Actualizar conteos de categorías
        function updateCategoryCounts() {
            const counts = {};
            counts['all'] = videos.length;

            categories.forEach(cat => {
                counts[cat.slug] = videos.filter(video =>
                    video.categories?.some(c =>
                        c.slug === cat.slug || c.id === cat.id || c === cat.slug
                    )
                ).length;
            });

            Object.keys(counts).forEach(slug => {
                const element = document.getElementById(`count-${slug}`);
                if (element) {
                    element.textContent = counts[slug];
                }
            });
        }

        // Funciones helper
        function formatDuration(duration) {
            const parts = duration.split(':');
            if (parts.length === 3) {
                const hours = parseInt(parts[0]);
                const minutes = parseInt(parts[1]);
                if (hours > 0) {
                    return `${hours}h ${minutes}m`;
                }
                return `${minutes}m`;
            }
            return duration;
        }

        function formatViews(views) {
            if (views >= 1000000) {
                return (views / 1000000).toFixed(1) + 'M';
            }
            if (views >= 1000) {
                return (views / 1000).toFixed(1) + 'K';
            }
            return views;
        }

        function hexToRgba(hex, alpha) {
            const r = parseInt(hex.slice(1, 3), 16);
            const g = parseInt(hex.slice(3, 5), 16);
            const b = parseInt(hex.slice(5, 7), 16);
            return `rgba(${r}, ${g}, ${b}, ${alpha})`;
        }

        // Datos de ejemplo
        function getSampleVideos() {
            return [{
                    id: 1,
                    title: 'Proceso Comercial IT Completo',
                    description: 'Guía completa del proceso comercial IT desde la generación de demanda hasta la firma de contrato. Incluye mejores prácticas y casos de éxito documentados.',
                    video_url: 'https://commondatastorage.googleapis.com/gtv-videos-bucket/sample/BigBuckBunny.mp4',
                    thumbnail_url: 'https://images.unsplash.com/photo-1493711662062-fa541adb3fc8?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80',
                    duration: '01:39:35',
                    views: 1245,
                    rating: '8.4',
                    year: '2023',
                    is_trending: true,
                    is_free: true,
                    categories: [{
                        name: 'Business',
                        slug: 'business'
                    }, {
                        name: 'Procesos',
                        slug: 'process'
                    }]
                },
                {
                    id: 2,
                    title: 'Onboarding Corporativo 2023',
                    description: 'Proceso completo de incorporación de nuevos empleados en la empresa. Políticas, herramientas y metodologías para una integración exitosa.',
                    video_url: 'https://commondatastorage.googleapis.com/gtv-videos-bucket/sample/ElephantsDream.mp4',
                    thumbnail_url: 'https://images.unsplash.com/photo-1552664730-d307ca884978?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80',
                    duration: '01:25:20',
                    views: 987,
                    rating: '8.2',
                    year: '2023',
                    is_trending: true,
                    is_free: true,
                    categories: [{
                        name: 'Capacitación',
                        slug: 'training'
                    }]
                },
                {
                    id: 3,
                    title: 'Configuración Avanzada Servidores',
                    description: 'Tutorial avanzado para configuración, optimización y seguridad de servidores en entorno productivo. Incluye monitoreo y backups.',
                    video_url: 'https://commondatastorage.googleapis.com/gtv-videos-bucket/sample/ForBiggerBlazes.mp4',
                    thumbnail_url: 'https://images.unsplash.com/photo-1558494949-ef010cbdcc31?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80',
                    duration: '02:15:45',
                    views: 1543,
                    rating: '8.7',
                    year: '2023',
                    is_trending: false,
                    is_free: false,
                    categories: [{
                        name: 'Técnicos',
                        slug: 'technical'
                    }]
                },
                {
                    id: 4,
                    title: 'Gestión de Proyectos Ágil',
                    description: 'Implementación de metodologías ágiles en gestión de proyectos IT. Scrum, Kanban y herramientas para equipos de alto rendimiento.',
                    video_url: 'https://commondatastorage.googleapis.com/gtv-videos-bucket/sample/ForBiggerEscapes.mp4',
                    thumbnail_url: 'https://images.unsplash.com/photo-1551288049-bebda4e38f71?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80',
                    duration: '01:50:30',
                    views: 1128,
                    rating: '8.5',
                    year: '2023',
                    is_trending: true,
                    is_free: true,
                    categories: [{
                        name: 'Business',
                        slug: 'business'
                    }, {
                        name: 'Procesos',
                        slug: 'process'
                    }]
                }
            ];
        }

        // Toggle sidebar en móvil
        function toggleSidebar() {
            const sidebar = document.getElementById('sidebar');
            sidebar.classList.toggle('active');
        }

        document.addEventListener('click', function(event) {
            const sidebar = document.getElementById('sidebar');
            const menuBtn = document.querySelector('.mobile-menu-btn');

            if (window.innerWidth < 768 &&
                !sidebar.contains(event.target) &&
                !menuBtn.contains(event.target) &&
                sidebar.classList.contains('active')) {
                sidebar.classList.remove('active');
            }
        });
    </script>
</body>

</html>
