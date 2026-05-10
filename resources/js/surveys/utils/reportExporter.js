export function exportStandaloneReport(config) {
    const reportHtml = document.getElementById(config.reportId).outerHTML;

    const styles = document.querySelector("style")?.innerHTML || "";

    const html = `
<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>${config.cliente}</title>

<style>
${styles}
#print-report{
 display:block !important;
}
</style>

</head>
<body>

${reportHtml}

</body>
</html>
`;

    const blob = new Blob([html], {
        type: "text/html",
    });

    const url = URL.createObjectURL(blob);

    const a = document.createElement("a");

    a.href = url;

    a.download = `site-survey-${(config.cliente || "cliente")
        .replace(/\s+/g, "_")
        .toLowerCase()}.html`;

    a.click();

    URL.revokeObjectURL(url);
}
