import {
    getVal,
    getRadio,
    getChecks,
    chips,
    yesNo,
    plain,
    escapeHtml,
    formatDate,
} from "./utils/reportHelpers";

import { exportStandaloneReport } from "./utils/reportExporter";

(function () {
    const form = document.getElementById("surveyForm");
    const printBtn = document.getElementById("btnImprimir");
    const exportBtn = document.getElementById("btnExportar");
    if (!form) return;
    /* =========================
       Riesgo
    ========================= */
    function calcRiesgo() {
        let score = 0;
        if (!getRadio(form, "diagrama") || getRadio(form, "diagrama") === "No")
            score += 2;
        if (getChecks(form, "problemas").length >= 3) score += 2;
        if (parseInt(getVal(form, "usuarios") || "0", 10) >= 50) score += 1;
        if (getRadio(form, "limitante") === "Sí") score += 1;
        if (!getChecks(form, "onboarding").length) score += 1;
        if (score >= 5) {
            return { label: "ALTO", color: "#dc2626" };
        }
        if (score >= 3) {
            return { label: "MEDIO", color: "#ea580c" };
        }
        return { label: "BAJO", color: "#16a34a" };
    }

    function updateRiskUI() {
        const r = calcRiesgo();
        const display = document.getElementById("riskLevelDisplay");
        display.textContent = r.label;
        display.style.color = r.color;
    }
    /* =========================
       Reporte
    ========================= */
    function populateReport() {
        document.getElementById("pr-cliente").textContent =
            getVal(form, "cliente") || "—";
        document.getElementById("pr-ticket").textContent =
            getVal(form, "ticket") || "—";
        document.getElementById("pr-problemas").innerHTML = chips(
            getChecks(form, "problemas")
        );
        // etc...
    }
    /* =========================
       Eventos
    ========================= */
    form.addEventListener("input", updateRiskUI);
    form.addEventListener("change", updateRiskUI);
    updateRiskUI();
    printBtn.addEventListener("click", () => {
        populateReport();
        setTimeout(() => window.print(), 100);
    });

    exportBtn.addEventListener("click", () => {
        populateReport();
        exportStandaloneReport({
            cliente: getVal(form, "cliente"),
            reportId: "print-report",
        });
    });
})();
