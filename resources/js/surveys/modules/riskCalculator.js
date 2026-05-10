import { getChecks, getRadio, getVal } from "../utils/reportHelpers";

export function initRiskCalculator(form) {
    function calcRiesgo() {
        let score = 0;
        if (getChecks(form, "problemas").length >= 3) score += 2;
        if (getRadio(form, "diagrama") === "No") score += 2;
        if (getRadio(form, "switch_admin") === "No") score += 1;
        if (getRadio(form, "qos") === "No") score += 1;
        if (parseInt(getVal(form, "disp_total") || "0", 10) >= 100) score += 1;
        if (score >= 5) {
            return {
                label: "ALTO",
                color: "#dc2626",
            };
        }
        if (score >= 3) {
            return {
                label: "MEDIO",
                color: "#ea580c",
            };
        }
        return {
            label: "BAJO",
            color: "#16a34a",
        };
    }

    function updateRiskUI() {
        const r = calcRiesgo();
        const display = document.getElementById("riskLevelDisplay");
        display.textContent = r.label;
        display.style.color = r.color;
    }

    form.addEventListener("input", updateRiskUI);
    form.addEventListener("change", updateRiskUI);
    updateRiskUI();
    return {
        calcRiesgo,
    };
}
