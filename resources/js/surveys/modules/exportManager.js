import { getVal, escapeHtml } from "../utils/reportHelpers";

export function initExportManager(form, renderer) {
    const printBtn = document.getElementById("btnImprimir");
    const exportBtn = document.getElementById("btnExportar");

    // =====================================================
    // IMPRIMIR
    // =====================================================

    if (printBtn) {
        printBtn.addEventListener("click", () => {
            renderer.populateReport();
            setTimeout(() => {
                window.print();
            }, 100);
        });
    }

    // =====================================================
    // EXPORTAR HTML
    // =====================================================

    if (exportBtn) {
        exportBtn.addEventListener("click", () => {
            renderer.populateReport();
            const reportHtml =
                document.getElementById("print-report").outerHTML;
            // obtiene todos los estilos inline
            const styles = [...document.querySelectorAll("style")]
                .map((s) => s.innerHTML)
                .join("\n");

            const html = `
<!DOCTYPE html>
<html lang="es">

<head>
<meta charset="UTF-8">

<meta name="viewport"
      content="width=device-width, initial-scale=1.0">

<title>
Reporte Site Survey -
${escapeHtml(getVal(form, "cliente") || "Cliente")}
</title>

<style>

body{
    font-family:'Helvetica Neue',Arial,sans-serif;
    margin:30px;
    color:#0f172a;
    background:#fff;
}

${styles}

#print-report{
    display:block !important;
}

.no-print{
    display:none !important;
}

</style>

</head>

<body>

${reportHtml}

<script>
window.addEventListener('load', () => {
    const btn = document.createElement('button');
    btn.innerHTML = '🖨 Imprimir';
    btn.style.position = 'fixed';
    btn.style.top = '20px';
    btn.style.right = '20px';
    btn.style.padding = '10px 18px';
    btn.style.border = '0';
    btn.style.borderRadius = '8px';
    btn.style.background = '#ea580c';
    btn.style.color = '#fff';
    btn.style.fontWeight = '700';
    btn.style.cursor = 'pointer';
    btn.style.zIndex = '9999';
    btn.onclick = () => window.print();
    document.body.appendChild(btn);
});
</script>

</body>
</html>
`;

            const blob = new Blob([html], { type: "text/html" });
            const url = URL.createObjectURL(blob);
            const a = document.createElement("a");
            a.href = url;
            a.download =
                "site-survey-si-wifi-" +
                (getVal(form, "cliente") || "cliente")
                    .replace(/\\s+/g, "_")
                    .toLowerCase() +
                ".html";
            document.body.appendChild(a);
            a.click();
            document.body.removeChild(a);
            URL.revokeObjectURL(url);
        });
    }
}
