document.addEventListener("DOMContentLoaded", () => {
    const chips = document.querySelectorAll(".chip");
    const cards = document.querySelectorAll(".card");
    const modal = document.getElementById("playerModal");
    const modalTitle = document.getElementById("modalTitle");
    const modalBody = document.getElementById("modalBody");
    const modalClose = document.getElementById("modalClose");

    // --- FILTRO POR CATEGORÍA ---
    chips.forEach((chip) => {
        chip.addEventListener("click", () => {
            const catId = chip.dataset.category; // ej. "3" o "all"
            let matches = 0;

            // Quitar clase active a todos y ponerla al actual
            chips.forEach((c) => c.classList.remove("active"));
            chip.classList.add("active");

            cards.forEach((card) => {
                const catsAttr = card.dataset.cats || "";
                const cats = catsAttr.length ? catsAttr.split(",") : [];

                if (catId === "all" || cats.includes(catId)) {
                    card.style.display = "block";
                    matches++;
                } else {
                    card.style.display = "none";
                }
            });

            // Mostrar mensaje si no hay coincidencias en la categoría
            const noCategoryResults =
                document.getElementById("noCategoryResults");
            if (matches === 0) {
                noCategoryResults.style.display = "block";
            } else {
                noCategoryResults.style.display = "none";
            }

            // Ocultar mensaje de búsqueda si se está filtrando por categoría
            document.getElementById("noResults").style.display = "none";
        });
    });

    // --- ACCIONES DE BOTONES ---
    document.addEventListener("click", (e) => {
        const btn = e.target.closest("button[data-action]");
        if (!btn) return;

        const action = btn.dataset.action;

        if (action === "play") {
            const src = btn.dataset.src;
            const type = btn.dataset.type || "mp4";
            const title = btn.dataset.title || "Reproduciendo…";

            modalTitle.textContent = title;
            modalBody.innerHTML = "";

            if (type === "mp4") {
                const video = document.createElement("video");
                video.controls = true;
                video.src = src;
                video.style.maxWidth = "100%";
                video.style.height = "auto";
                modalBody.appendChild(video);
                video.play().catch(() => {});
            } else if (type === "youtube") {
                const iframe = document.createElement("iframe");
                iframe.src = `${src}?autoplay=1&rel=0`;
                iframe.width = "100%";
                iframe.height = "400";
                iframe.allow = "autoplay; encrypted-media";
                iframe.allowFullscreen = true;
                modalBody.appendChild(iframe);
            }

            modal.classList.add("open");
        }

        if (action === "details") {
            const title = btn.dataset.title;
            const description = btn.dataset.description;
            const year = btn.dataset.year;
            const duration = btn.dataset.duration;

            modalTitle.textContent = "Detalles del Video";
            modalBody.innerHTML = `
                <div class="modal-details">
                    <h4>${title}</h4>
                    <p>${description}</p>
                    <div class="meta">
                        <span><strong>Año:</strong> ${year}</span>
                        <span><strong>Duración:</strong> ${duration}</span>
                    </div>
                    <span class="badge">Información</span>
                </div>
            `;
            modal.classList.add("open");
        }
    });

    // --- BÚSQUEDA POR TEXTO ---
    const searchInput = document.getElementById("searchInput");
    const noResults = document.getElementById("noResults");

    searchInput.addEventListener("input", (e) => {
        const query = e.target.value.toLowerCase().trim();
        let matches = 0;

        cards.forEach((card) => {
            const titleEl = card.querySelector(".title");
            const descEl = card.querySelector(".description");

            const title = titleEl ? titleEl.textContent.toLowerCase() : "";
            const desc = descEl ? descEl.textContent.toLowerCase() : "";

            if (!query || title.includes(query) || desc.includes(query)) {
                card.style.display = "block";
                matches++;
            } else {
                card.style.display = "none";
            }
        });

        // Mostrar mensaje si no hay coincidencias
        if (matches === 0) {
            noResults.style.display = "block";
        } else {
            noResults.style.display = "none";
        }
    });

    // --- CERRAR MODAL ---
    modalClose.addEventListener("click", () => {
        modal.classList.remove("open");
        modalBody.innerHTML = "";
    });

    modal.addEventListener("click", (e) => {
        if (e.target === modal) {
            modal.classList.remove("open");
            modalBody.innerHTML = "";
        }
    });

    // --- Cerrar con ESC ---
    document.addEventListener("keydown", (e) => {
        if (e.key === "Escape" && modal.classList.contains("open")) {
            modal.classList.remove("open");
            modalBody.innerHTML = "";
        }
    });
});
