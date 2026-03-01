// Función para mostrar/ocultar reproductor
function toggleVideo(videoId) {
    const player = document.getElementById(`player-${videoId}`);
    const isCollapsed = player.classList.contains("collapsed");

    // Colapsar todos los reproductores primero
    document.querySelectorAll(".video-player").forEach((p) => {
        if (p.id !== `player-${videoId}`) {
            p.classList.add("collapsed");
            const video = p.querySelector("video");
            if (video && !video.paused) {
                video.pause();
            }
        }
    });

    // Alternar el reproductor seleccionado
    player.classList.toggle("collapsed");

    // Pausar video si se está ocultando
    const videoElement = player.querySelector("video");
    if (!isCollapsed && videoElement && !videoElement.paused) {
        videoElement.pause();
    }

    // Si se está mostrando, desplazar a la vista
    if (isCollapsed) {
        setTimeout(() => {
            player.scrollIntoView({
                behavior: "smooth",
                block: "center",
            });
        }, 100);
    }
}

// Función para reproducir video
function playVideo(videoId) {
    const player = document.getElementById(`player-${videoId}`);
    const videoElement = player.querySelector("video");

    // Colapsar todos los demás reproductores
    document.querySelectorAll(".video-player").forEach((p) => {
        if (p.id !== `player-${videoId}`) {
            p.classList.add("collapsed");
            const otherVideo = p.querySelector("video");
            if (otherVideo && !otherVideo.paused) {
                otherVideo.pause();
            }
        }
    });

    // Mostrar el reproductor si está colapsado
    if (player.classList.contains("collapsed")) {
        player.classList.remove("collapsed");
    }

    // Reproducir el video
    videoElement.play();

    // Desplazar la vista al video
    setTimeout(() => {
        player.scrollIntoView({
            behavior: "smooth",
            block: "center",
        });
    }, 100);
}

// Filtrado de módulos
document.querySelectorAll(".filter-btn").forEach((button) => {
    button.addEventListener("click", function () {
        // Actualizar botones activos
        document
            .querySelectorAll(".filter-btn")
            .forEach((btn) => btn.classList.remove("active"));
        this.classList.add("active");

        const filter = this.getAttribute("data-filter");
        const modules = document.querySelectorAll(".module");

        if (filter === "all") {
            modules.forEach((module) => {
                module.style.display = "block";
            });
        } else {
            modules.forEach((module) => {
                if (module.getAttribute("data-module") === filter) {
                    module.style.display = "block";
                } else {
                    module.style.display = "none";
                }
            });
        }

        // Desplazar al primer módulo visible
        setTimeout(() => {
            const firstVisible = document.querySelector(
                '.module[style="display: block"]'
            );
            if (firstVisible) {
                firstVisible.scrollIntoView({
                    behavior: "smooth",
                });
            }
        }, 100);
    });
});

// Pausar todos los videos cuando se cierra un reproductor
document.querySelectorAll(".video-player video").forEach((video) => {
    video.addEventListener("play", function () {
        // Pausar otros videos
        document
            .querySelectorAll(".video-player video")
            .forEach((otherVideo) => {
                if (otherVideo !== this && !otherVideo.paused) {
                    otherVideo.pause();
                }
            });
    });
});

// Auto-colapsar reproductores al hacer clic fuera
document.addEventListener("click", function (e) {
    if (
        !e.target.closest(".video-player") &&
        !e.target.closest(".toggle-player") &&
        !e.target.closest(".play-button")
    ) {
        document.querySelectorAll(".video-player").forEach((player) => {
            if (!player.classList.contains("collapsed")) {
                player.classList.add("collapsed");
                const video = player.querySelector("video");
                if (video && !video.paused) {
                    video.pause();
                }
            }
        });
    }
});

// Scroll para actualizar indicador de progreso
window.addEventListener("scroll", function () {
    const modules = document.querySelectorAll(".module");
    const progressDots = document.querySelectorAll(".progress-dot");

    let currentModule = 0;
    const scrollPosition = window.scrollY + 100;

    modules.forEach((module, index) => {
        const moduleTop = module.offsetTop;
        if (scrollPosition >= moduleTop) {
            currentModule = index + 1;
        }
    });

    progressDots.forEach((dot, index) => {
        if (index + 1 === currentModule) {
            dot.classList.add("active");
        } else {
            dot.classList.remove("active");
        }
    });
});

// Inicializar: colapsar todos los reproductores al cargar
document.addEventListener("DOMContentLoaded", function () {
    document.querySelectorAll(".video-player").forEach((player) => {
        player.classList.add("collapsed");
    });
});
