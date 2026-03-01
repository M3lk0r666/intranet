// Variable para controlar qué submenú está abierto
let activeSubmenu = null;

function toggleSubmenu(area) {
    const submenu = document.getElementById(`${area}-submenu`);
    const chevron = document.getElementById(`${area}-chevron`);

    // Si hay otro submenú abierto, lo cerramos
    if (activeSubmenu && activeSubmenu !== submenu) {
        const prevArea = activeSubmenu.id.replace("-submenu", "");
        const prevChevron = document.getElementById(`${prevArea}-chevron`);
        activeSubmenu.classList.remove("show");
        if (prevChevron) {
            prevChevron.classList.remove("fa-chevron-up");
            prevChevron.classList.add("fa-chevron-down");
        }
    }

    // Alternar el submenú actual
    submenu.classList.toggle("show");

    if (submenu.classList.contains("show")) {
        chevron.classList.remove("fa-chevron-down");
        chevron.classList.add("fa-chevron-up");
        activeSubmenu = submenu;
    } else {
        chevron.classList.remove("fa-chevron-up");
        chevron.classList.add("fa-chevron-down");
        activeSubmenu = null;
    }
}

// Cerrar submenús si se hace click fuera
document.addEventListener("click", function (event) {
    if (!activeSubmenu) return;

    const areaButtons = document.querySelectorAll('[onclick^="toggleSubmenu"]');
    let isClickInside = false;

    areaButtons.forEach((button) => {
        if (button.contains(event.target)) {
            isClickInside = true;
        }
    });

    if (!isClickInside && activeSubmenu) {
        const area = activeSubmenu.id.replace("-submenu", "");
        const chevron = document.getElementById(`${area}-chevron`);

        activeSubmenu.classList.remove("show");
        if (chevron) {
            chevron.classList.remove("fa-chevron-up");
            chevron.classList.add("fa-chevron-down");
        }
        activeSubmenu = null;
    }
});

// Cerrar submenús al presionar ESC
document.addEventListener("keydown", function (event) {
    if (event.key === "Escape" && activeSubmenu) {
        const area = activeSubmenu.id.replace("-submenu", "");
        const chevron = document.getElementById(`${area}-chevron`);

        activeSubmenu.classList.remove("show");
        if (chevron) {
            chevron.classList.remove("fa-chevron-up");
            chevron.classList.add("fa-chevron-down");
        }
        activeSubmenu = null;
    }
});
