// Configuración
const API_BASE_URL = "/api";

let mainPlayer = null;
let currentCategory = "all";
let currentTab = "all";
let categories = [];
let videos = [];

// Inicializar
document.addEventListener("DOMContentLoaded", async function () {
    await initApp();
});

async function initApp() {
    mainPlayer = new Plyr("#mainPlayer", {
        controls: [
            "play",
            "progress",
            "current-time",
            "mute",
            "volume",
            "settings",
            "fullscreen",
        ],
        settings: ["quality", "speed"],
        ratio: "16:9",
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
        console.error("Error cargando categorías:", error);
        categories = [
            {
                id: 1,
                name: "Capacitación",
                slug: "training",
                color: "#f97316",
            },
            {
                id: 2,
                name: "Procesos",
                slug: "process",
                color: "#ea580c",
            },
            {
                id: 3,
                name: "Técnicos",
                slug: "technical",
                color: "#c2410c",
            },
            {
                id: 4,
                name: "Business",
                slug: "business",
                color: "#f59e0b",
            },
            {
                id: 5,
                name: "Desarrollo",
                slug: "development",
                color: "#fb923c",
            },
            {
                id: 6,
                name: "Marketing",
                slug: "marketing",
                color: "#fdba74",
            },
        ];
        renderCategories();
    }
}

// Renderizar categorías
function renderCategories() {
    const container = document.getElementById("categories-list");
    container.innerHTML = "";

    const allItem = document.createElement("div");
    allItem.className = "sidebar-item active";
    allItem.onclick = () => filterByCategory("all");
    allItem.innerHTML = `
        <i class="fas fa-globe-americas" style="color: #f97316"></i>
        <span>Todos los Videos</span>
        <span class="ml-auto text-xs bg-orange-100 text-orange-600 px-2 py-1 rounded" id="count-all">0</span>
    `;
    container.appendChild(allItem);

    categories.forEach((category) => {
        const item = document.createElement("div");
        item.className = "sidebar-item";
        item.onclick = () => filterByCategory(category.slug);
        item.innerHTML = `
            <i class="fas fa-folder" style="color: ${
                category.color || "#f97316"
            }"></i>
            <span>${category.name}</span>
            <span class="ml-auto text-xs bg-slate-100 text-slate-600 px-2 py-1 rounded" id="count-${
                category.slug
            }">0</span>
        `;
        container.appendChild(item);
    });
}

// Cargar videos
async function loadVideos(categorySlug = "all", tab = "all") {
    const grid = document.getElementById("videosGrid");

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

        if (categorySlug !== "all") {
            params.push(`category=${categorySlug}`);
        }

        if (tab === "trending") {
            params.push(`trending=true`);
        } else if (tab === "new") {
            params.push(`order_by=created_at&order_dir=desc`);
        } else if (tab === "free") {
            params.push(`free=true`);
        }

        if (params.length > 0) {
            url += `?${params.join("&")}`;
        }

        const response = await fetch(url);
        const data = await response.json();

        if (data.success) {
            videos = data.data.data;
            renderVideos();
            updateCategoryCounts();
        }
    } catch (error) {
        console.error("Error cargando videos:", error);
        videos = getSampleVideos();
        renderVideos();
        updateCategoryCounts();
    }
}

// Renderizar videos
function renderVideos() {
    const grid = document.getElementById("videosGrid");

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

    grid.innerHTML = "";
    videos.forEach((video, index) => {
        const card = createVideoCard(video, index);
        grid.appendChild(card);
    });
}

// Crear tarjeta de video
function createVideoCard(video, index) {
    const card = document.createElement("div");
    card.className = "video-card";
    card.style.animationDelay = `${index * 0.1}s`;
    card.onclick = () => playVideo(video);

    const categoryColors = video.categories?.map((cat) => {
        const category = categories.find(
            (c) => c.id === cat.id || c.slug === cat.slug
        );
        return category?.color || "#f97316";
    }) || ["#f97316"];

    const categoriesHTML =
        video.categories
            ?.map(
                (cat, i) => `
        <span class="genre-tag" style="border-color: ${
            categoryColors[i] || "#f97316"
        }; background: ${hexToRgba(categoryColors[i] || "#f97316", 0.1)}">
            ${cat.name || cat}
        </span>
    `
            )
            .join("") || "";

    card.innerHTML = `
        <div class="video-thumbnail">
            <img src="${
                video.thumbnail_url ||
                "https://images.unsplash.com/photo-1493711662062-fa541adb3fc8?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80"
            }" 
                 alt="${video.title}"
                 onerror="this.src='https://images.unsplash.com/photo-1493711662062-fa541adb3fc8?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80'">
            <div class="video-overlay">
                <div class="flex justify-between items-end w-full">
                    <div class="text-white font-medium bg-black/50 px-3 py-1 rounded">
                        <i class="far fa-clock mr-1"></i>
                        ${formatDuration(video.duration || "01:39:35")}
                    </div>
                    ${
                        video.is_free
                            ? '<span class="bg-green-500 text-white text-xs px-2 py-1 rounded">Gratis</span>'
                            : ""
                    }
                </div>
            </div>
            ${
                video.is_trending
                    ? `
                    <div class="absolute top-3 left-3 bg-gradient-to-r from-orange-500 to-red-500 text-white text-xs px-3 py-1 rounded-full flex items-center">
                        <i class="fas fa-fire mr-1"></i> Trending
                    </div>
                `
                    : ""
            }
        </div>
        <div class="p-4">
            <h3 class="font-bold text-lg mb-2 text-slate-800 line-clamp-2">${
                video.title
            }</h3>
            <div class="mb-3 flex flex-wrap gap-2">
                ${categoriesHTML}
            </div>
            <div class="flex justify-between text-sm text-slate-600">
                <div class="flex items-center video-rating">
                    <i class="fas fa-star mr-1"></i>
                    <span>${video.rating || "8.4"}</span>
                </div>
                <div class="flex items-center">
                    <i class="far fa-eye mr-1"></i>
                    <span>${formatViews(video.views || 0)}</span>
                </div>
                <div class="flex items-center">
                    <i class="far fa-calendar mr-1"></i>
                    <span>${video.year || "2023"}</span>
                </div>
            </div>
        </div>
    `;

    return card;
}

// Reproducir video
async function playVideo(video) {
    const playerSection = document.getElementById("videoPlayerSection");
    playerSection.style.display = "block";

    document.getElementById("playerTitle").textContent = video.title;
    document.getElementById("playerCategory").textContent =
        video.categories?.map((c) => c.name || c).join(" • ") || "Video";
    document.getElementById("duration-text").textContent = formatDuration(
        video.duration || "01:39:35"
    );
    document.getElementById("views-text").textContent = formatViews(
        video.views || 0
    );
    document.getElementById("rating-text").textContent = `${
        video.rating || "8.4"
    }/10`;
    document.getElementById("playerDescription").textContent =
        video.description || "Sin descripción disponible.";

    if (mainPlayer) {
        mainPlayer.source = {
            type: "video",
            sources: [
                {
                    src:
                        video.video_url ||
                        "https://commondatastorage.googleapis.com/gtv-videos-bucket/sample/BigBuckBunny.mp4",
                    type: "video/mp4",
                },
            ],
            poster:
                video.thumbnail_url ||
                "https://images.unsplash.com/photo-1493711662062-fa541adb3fc8?ixlib=rb-4.0.3&auto=format&fit=crop&w=1200&q=80",
        };

        playerSection.scrollIntoView({
            behavior: "smooth",
            block: "start",
        });

        setTimeout(() => {
            mainPlayer.play();
        }, 500);
    }
}

// Cerrar reproductor
function closeVideoPlayer() {
    const playerSection = document.getElementById("videoPlayerSection");
    playerSection.style.display = "none";
    if (mainPlayer) {
        mainPlayer.pause();
    }
}

// Filtrar por categoría
function filterByCategory(categorySlug) {
    currentCategory = categorySlug;

    document.querySelectorAll(".sidebar-item").forEach((item) => {
        item.classList.remove("active");
    });

    document.querySelectorAll(".sidebar-item").forEach((item) => {
        if (
            item.onclick &&
            item.onclick.toString().includes(`'${categorySlug}'`)
        ) {
            item.classList.add("active");
        }
    });

    const titleElement = document.getElementById("gallery-title");
    if (categorySlug === "all") {
        titleElement.innerHTML = `<i class="fas fa-play-circle mr-2 gradient-text"></i><span class="gradient-text">Todos los Videos</span>`;
    } else {
        const category = categories.find((c) => c.slug === categorySlug);
        titleElement.innerHTML = `<i class="fas fa-play-circle mr-2 gradient-text"></i><span class="gradient-text">${
            category ? category.name : "Videos"
        }</span>`;
    }

    loadVideos(categorySlug, currentTab);
}

// Filtrar por tab
function filterByTab(tab) {
    currentTab = tab;

    document.querySelectorAll(".tab-btn").forEach((btn) => {
        btn.classList.remove("active");
    });

    event.currentTarget.classList.add("active");

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
        console.error("Error cargando estadísticas:", error);
        updateStatsUI({
            total_videos: videos.length,
            total_views: videos.reduce((sum, v) => sum + (v.views || 0), 0),
            total_hours: (videos.length * 1.5).toFixed(1),
        });
    }
}

// Actualizar UI de estadísticas
function updateStatsUI(stats) {
    document.getElementById("stat-total").textContent = stats.total_videos;
    document.getElementById("stat-views").textContent = formatViews(
        stats.total_views
    );
    document.getElementById("stat-hours").textContent = `${stats.total_hours}h`;

    document.getElementById("card-total").textContent = stats.total_videos;
    document.getElementById("card-views").textContent = formatViews(
        stats.total_views
    );
    document.getElementById("card-hours").textContent = `${stats.total_hours}h`;
}

// Actualizar conteos de categorías
function updateCategoryCounts() {
    const counts = {};
    counts["all"] = videos.length;

    categories.forEach((cat) => {
        counts[cat.slug] = videos.filter((video) =>
            video.categories?.some(
                (c) => c.slug === cat.slug || c.id === cat.id || c === cat.slug
            )
        ).length;
    });

    Object.keys(counts).forEach((slug) => {
        const element = document.getElementById(`count-${slug}`);
        if (element) {
            element.textContent = counts[slug];
        }
    });
}

// Funciones helper
function formatDuration(duration) {
    const parts = duration.split(":");
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
        return (views / 1000000).toFixed(1) + "M";
    }
    if (views >= 1000) {
        return (views / 1000).toFixed(1) + "K";
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
    return [
        {
            id: 1,
            title: "Proceso Comercial IT Completo",
            description:
                "Guía completa del proceso comercial IT desde la generación de demanda hasta la firma de contrato. Incluye mejores prácticas y casos de éxito documentados.",
            video_url:
                "https://commondatastorage.googleapis.com/gtv-videos-bucket/sample/BigBuckBunny.mp4",
            thumbnail_url:
                "https://images.unsplash.com/photo-1493711662062-fa541adb3fc8?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80",
            duration: "01:39:35",
            views: 1245,
            rating: "8.4",
            year: "2023",
            is_trending: true,
            is_free: true,
            categories: [
                {
                    name: "Business",
                    slug: "business",
                },
                {
                    name: "Procesos",
                    slug: "process",
                },
            ],
        },
        {
            id: 2,
            title: "Onboarding Corporativo 2023",
            description:
                "Proceso completo de incorporación de nuevos empleados en la empresa. Políticas, herramientas y metodologías para una integración exitosa.",
            video_url:
                "https://commondatastorage.googleapis.com/gtv-videos-bucket/sample/ElephantsDream.mp4",
            thumbnail_url:
                "https://images.unsplash.com/photo-1552664730-d307ca884978?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80",
            duration: "01:25:20",
            views: 987,
            rating: "8.2",
            year: "2023",
            is_trending: true,
            is_free: true,
            categories: [
                {
                    name: "Capacitación",
                    slug: "training",
                },
            ],
        },
        {
            id: 3,
            title: "Configuración Avanzada Servidores",
            description:
                "Tutorial avanzado para configuración, optimización y seguridad de servidores en entorno productivo. Incluye monitoreo y backups.",
            video_url:
                "https://commondatastorage.googleapis.com/gtv-videos-bucket/sample/ForBiggerBlazes.mp4",
            thumbnail_url:
                "https://images.unsplash.com/photo-1558494949-ef010cbdcc31?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80",
            duration: "02:15:45",
            views: 1543,
            rating: "8.7",
            year: "2023",
            is_trending: false,
            is_free: false,
            categories: [
                {
                    name: "Técnicos",
                    slug: "technical",
                },
            ],
        },
        {
            id: 4,
            title: "Gestión de Proyectos Ágil",
            description:
                "Implementación de metodologías ágiles en gestión de proyectos IT. Scrum, Kanban y herramientas para equipos de alto rendimiento.",
            video_url:
                "https://commondatastorage.googleapis.com/gtv-videos-bucket/sample/ForBiggerEscapes.mp4",
            thumbnail_url:
                "https://images.unsplash.com/photo-1551288049-bebda4e38f71?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80",
            duration: "01:50:30",
            views: 1128,
            rating: "8.5",
            year: "2023",
            is_trending: true,
            is_free: true,
            categories: [
                {
                    name: "Business",
                    slug: "business",
                },
                {
                    name: "Procesos",
                    slug: "process",
                },
            ],
        },
    ];
}

// Toggle sidebar en móvil
function toggleSidebar() {
    const sidebar = document.getElementById("sidebar");
    sidebar.classList.toggle("active");
}

document.addEventListener("click", function (event) {
    const sidebar = document.getElementById("sidebar");
    const menuBtn = document.querySelector(".mobile-menu-btn");

    if (
        window.innerWidth < 768 &&
        !sidebar.contains(event.target) &&
        !menuBtn.contains(event.target) &&
        sidebar.classList.contains("active")
    ) {
        sidebar.classList.remove("active");
    }
});
