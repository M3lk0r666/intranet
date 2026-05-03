import { generarHTMLImpresion } from "./reporte";
import { generarHTMLStandalone } from "./export_html";

function createSwitch() {
    return {
        host: "",
        marca: "",
        modelo: "",
        puertos: "",
        usados: "",
        ip: "",
        core: false,
        dist: false,
        acc: false,
        gestion: false,
        poe: false,
    };
}

document.addEventListener("alpine:init", () => {
    Alpine.data("app", () => ({
        /* ── Estado ── */
        cliente: "",
        fecha: new Date().toISOString().split("T")[0],
        ingeniero: "",

        fisico: {
            cat5: false,
            cat5e: false,
            cat6: false,
            cat6e: false,
            cat7: false,
            cat8: false,
            multimodo: false,
            monomodo: false,
            no_aplica_fibra: false,
            etiquetados: false,
            organizados: false,
            cableado_ok: false,
            ups: false,
            ups_documentado: false,
            diagrama: null,
            vlans: null,
            direccionamiento: null,
            notas: "",
        },

        switches: [createSwitch()],

        servicios: {
            estatico: false,
            ospf: false,
            bgp: false,
            eigrp: false,
            mpls: false,
            ip_estatico: false,
            ip_dinamico: false,
            dns: false,
            radius: false,
            ad: false,
            ntp: false,
            snmp: false,
        },

        seguridad: {
            tipo_fw: "",
            marca: "",
            modelo: "",
            ubicacion: "",
            puertos: "",
            ip: "",
            ids: false,
            vpn: false,
            nat: false,
            dmz: false,
            waf: false,
            acl: false,
            notas: "",
        },

        /* ── Métodos ── */
        addSwitch() {
            this.switches.push(createSwitch());
        },

        removeSwitch(i) {
            this.switches.splice(i, 1);
        },

        score() {
            let s = 0;
            if (!this.fisico.ups) s += 2;
            if (!this.seguridad.marca) s += 2;
            if (!this.servicios.ospf && !this.servicios.bgp) s += 2;
            if (this.fisico.diagrama !== "si") s += 1;
            if (this.fisico.vlans !== "si") s += 1;
            if (this.fisico.direccionamiento !== "si") s += 1;
            if (!this.seguridad.ids) s += 1;
            return s;
        },

        labelScore() {
            const s = this.score();
            return s <= 2 ? "BAJO" : s <= 5 ? "MEDIO" : "ALTO";
        },

        colorScore() {
            const s = this.score();
            return s <= 2
                ? "color:#16a34a;font-weight:700"
                : s <= 5
                ? "color:#d97706;font-weight:700"
                : "color:#dc2626;font-weight:700";
        },

        // puedes seguir agregando métodos aquí
        imprimir() {
            const html = generarHTMLImpresion(this);

            const ventana = window.open("", "_blank");
            ventana.document.write(html);
            ventana.document.close();
            ventana.print();
        },

        exportHTML() {
            const html = generarHTMLStandalone(this);

            const blob = new Blob([html], { type: "text/html" });

            const a = document.createElement("a");
            a.href = URL.createObjectURL(blob);
            a.download = `levantamiento_${Date.now()}.html`;
            a.click();
        },
    }));
});
