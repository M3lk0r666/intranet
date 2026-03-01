// Variable para controlar qué dropdown está abierto
let activeDropdown = null;

function toggleDropdown(type) {
    const dropdown = document.getElementById(`${type}-dropdown`);
    const chevron = document.getElementById(`${type}-chevron`);

    // Si hay otro dropdown abierto, lo cerramos
    if (activeDropdown && activeDropdown !== dropdown) {
        const prevChevron = document.getElementById(
            activeDropdown.id.replace("-dropdown", "-chevron")
        );
        activeDropdown.classList.remove("show");
        if (prevChevron) {
            prevChevron.classList.remove("fa-chevron-up");
            prevChevron.classList.add("fa-chevron-down");
        }
    }

    // Alternar el dropdown actual
    dropdown.classList.toggle("show");

    if (dropdown.classList.contains("show")) {
        chevron.classList.remove("fa-chevron-down");
        chevron.classList.add("fa-chevron-up");
        activeDropdown = dropdown;
    } else {
        chevron.classList.remove("fa-chevron-up");
        chevron.classList.add("fa-chevron-down");
        activeDropdown = null;
    }
}

// Cerrar dropdowns si se hace click fuera
document.addEventListener("click", function (event) {
    const socialBtn = document.querySelector(
        "[onclick=\"toggleDropdown('social')\"]"
    );
    const authBtn = document.querySelector(
        "[onclick=\"toggleDropdown('auth')\"]"
    );
    const socialDropdown = document.getElementById("social-dropdown");
    const authDropdown = document.getElementById("auth-dropdown");

    // Verificar si el click fue fuera de los botones de dropdown
    const isClickInsideSocial = socialBtn && socialBtn.contains(event.target);
    const isClickInsideAuth = authBtn && authBtn.contains(event.target);

    if (!isClickInsideSocial && socialDropdown.classList.contains("show")) {
        socialDropdown.classList.remove("show");
        document
            .getElementById("social-chevron")
            .classList.remove("fa-chevron-up");
        document
            .getElementById("social-chevron")
            .classList.add("fa-chevron-down");
        if (activeDropdown === socialDropdown) activeDropdown = null;
    }

    if (!isClickInsideAuth && authDropdown.classList.contains("show")) {
        authDropdown.classList.remove("show");
        document
            .getElementById("auth-chevron")
            .classList.remove("fa-chevron-up");
        document
            .getElementById("auth-chevron")
            .classList.add("fa-chevron-down");
        if (activeDropdown === authDropdown) activeDropdown = null;
    }
});

// Cerrar dropdowns al presionar ESC
document.addEventListener("keydown", function (event) {
    if (event.key === "Escape" && activeDropdown) {
        const type = activeDropdown.id.replace("-dropdown", "");
        const chevron = document.getElementById(`${type}-chevron`);

        activeDropdown.classList.remove("show");
        if (chevron) {
            chevron.classList.remove("fa-chevron-up");
            chevron.classList.add("fa-chevron-down");
        }
        activeDropdown = null;
    }
});
