export function getVal(form, name) {
    const el = form.querySelector(`[name="${name}"]`);
    return el ? (el.value || "").trim() : "";
}

export function getRadio(form, name) {
    const el = form.querySelector(`input[name="${name}"]:checked`);
    return el ? el.value : "";
}

export function getChecks(form, name) {
    return [...form.querySelectorAll(`input[name="${name}"]:checked`)].map(
        (i) => i.value
    );
}

export function getList(form, name) {
    return [...form.querySelectorAll(`[name="${name}"]`)].map((i) =>
        (i.value || "").trim()
    );
}

export function chips(arr, cls = "") {
    if (!arr || !arr.length) {
        return '<span class="pr-empty">— Sin selección —</span>';
    }

    return arr
        .map((v) => `<span class="pr-chip ${cls}">${escapeHtml(v)}</span>`)
        .join("");
}

export function yesNo(val) {
    if (val === "Sí" || val === "Si") {
        return '<span class="pr-yes">✓ Sí</span>';
    }

    if (val === "No") {
        return '<span class="pr-no">✗ No</span>';
    }

    return val
        ? `<span class="pr-chip pr-chip-blue">${escapeHtml(val)}</span>`
        : '<span class="pr-empty">— Sin respuesta —</span>';
}

export function plain(val) {
    return val ? escapeHtml(val) : '<span class="pr-empty">—</span>';
}

export function escapeHtml(s) {
    return String(s).replace(
        /[&<>"']/g,
        (c) =>
            ({
                "&": "&amp;",
                "<": "&lt;",
                ">": "&gt;",
                '"': "&quot;",
                "'": "&#039;",
            }[c])
    );
}

export function formatDate(iso) {
    if (!iso) return "";
    const [y, m, d] = iso.split("-");
    return `${d}/${m}/${y}`;
}

export function setHtml(id, value) {
    const el = document.getElementById(id);
    if (!el) return;
    el.innerHTML = value;
}

export function setText(id, value) {
    const el = document.getElementById(id);
    if (!el) return;
    el.textContent = value;
}
