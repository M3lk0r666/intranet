import { initSsidManager } from "./modules/ssidManager";
import { initRiskCalculator } from "./modules/riskCalculator";
import { initReportRenderer } from "./modules/reportRenderer";
import { initExportManager } from "./modules/exportManager";

(function () {
    const form = document.getElementById("surveyForm");
    if (!form) return;
    // SSIDs
    initSsidManager();
    // Riesgo
    const risk = initRiskCalculator(form);
    // Renderer
    const renderer = initReportRenderer(form, risk);
    // Export / Print
    initExportManager(form, renderer);
})();
