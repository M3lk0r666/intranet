export function generarHTMLStandalone(ctx) {
    return `
<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Levantamiento Infraestructura</title>

<script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>

<style>
${generarCSS()}
</style>

</head>

<body x-data="app">

${generarFormularioHTML(ctx)}

<script>
${generarJS(ctx)}
</script>

</body>
</html>
`;
}

/* ── CSS separado ── */
function generarCSS() {
    return `
body {
    font-family: Arial, sans-serif;
    padding: 20px;
}

.no-print {
    margin-bottom: 20px;
}

@media print {
    .no-print { display: none; }
}

input, textarea {
    width: 100%;
    margin-bottom: 10px;
}
`;
}

/* ── HTML separado ── */
function generarFormularioHTML(ctx) {
    return `
<div class="no-print">
    <h2>Formulario</h2>

    <label>Cliente</label>
    <input type="text" x-model="cliente">

    <label>Ingeniero</label>
    <input type="text" x-model="ingeniero">

    <label>Fecha</label>
    <input type="date" x-model="fecha">

    <button @click="imprimir()">Imprimir</button>
</div>
`;
}

/* ── JS separado ── */
function generarJS(ctx) {
    return `
document.addEventListener('alpine:init', () => {
    Alpine.data('app', () => ({

        cliente: ${JSON.stringify(ctx.cliente)},
        ingeniero: ${JSON.stringify(ctx.ingeniero)},
        fecha: ${JSON.stringify(ctx.fecha)},

        switches: ${JSON.stringify(ctx.switches)},

        imprimir() {
            const win = window.open('', '_blank');
            win.document.write(this.generarHTML());
            win.document.close();
            setTimeout(() => win.print(), 500);
        },

        generarHTML() {
            return \`
<h1>Reporte</h1>
<p><b>Cliente:</b> \${this.cliente}</p>
<p><b>Ingeniero:</b> \${this.ingeniero}</p>
<p><b>Fecha:</b> \${this.fecha}</p>
\`;
        }

    }));
});
`;
}
