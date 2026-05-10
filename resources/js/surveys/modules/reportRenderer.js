function setHtml(id, value) {
    const el = document.getElementById(id);
    if (!el) return;
    el.innerHTML = value;
}

function setText(id, value) {
    const el = document.getElementById(id);
    if (!el) return;
    el.textContent = value;
}

import {
    getVal,
    getRadio,
    getChecks,
    getList,
    chips,
    yesNo,
    plain,
    escapeHtml,
    formatDate,
} from "../utils/reportHelpers";

export function initReportRenderer(form, risk) {
    function buildSsidsHtml() {
        const nums = getList(form, "ssid_num[]");
        const names = getList(form, "ssid_name[]");
        const vlans = getList(form, "ssid_vlan[]");
        const rows = [];

        for (let i = 0; i < names.length; i++) {
            if (!names[i] && !nums[i] && !vlans[i]) {
                continue;
            }
            rows.push(`
                <tr>
                    <td>${escapeHtml(nums[i] || i + 1)}</td>
                    <td>${escapeHtml(names[i] || "—")}</td>
                    <td>${escapeHtml(vlans[i] || "—")}</td>
                </tr>
            `);
        }

        if (!rows.length) {
            return '<span class="pr-empty">— Sin SSIDs registrados —</span>';
        }
        return `
            <table class="pr-ssid-table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nombre</th>
                        <th>VLAN</th>
                    </tr>
                </thead>
                <tbody>
                    ${rows.join("")}
                </tbody>
            </table>
        `;
    }

    function getUsuariosTexto() {
        const r = getRadio(form, "usuarios_rango");
        if (!r) return "";
        if (r === "Alta [>100]") {
            const n = getVal(form, "usuarios_alta");
            return n ? `Alta (${n} usuarios)` : "Alta (>100)";
        }
        return r;
    }

    function getCtrlRadicaTexto() {
        const r = getRadio(form, "ctrl_radica");
        if (!r) return "";
        if (r === "Local") {
            const ip = getVal(form, "ctrl_local_ip");
            return ip ? `Local — IP: ${ip}` : "Local";
        }
        if (r === "Nube") {
            const url = getVal(form, "ctrl_nube_url");
            return url ? `Nube — ${url}` : "Nube";
        }
        return r;
    }

    function populateReport() {
        // =====================================================
        // HEADER
        // =====================================================
        setText("pr-cliente", getVal(form, "cliente") || "—");
        document.getElementById("pr-ticket").textContent =
            getVal(form, "ticket") || "—";
        document.getElementById("pr-reporter").textContent =
            getVal(form, "reporter") || "—";
        document.getElementById("pr-asignado").textContent =
            getVal(form, "asignado") || "—";
        document.getElementById("pr-fecha").textContent =
            formatDate(getVal(form, "fecha")) || "—";

        const r = risk.calcRiesgo();
        const riesgoEl = document.getElementById("pr-riesgo");
        riesgoEl.textContent = r.label;
        riesgoEl.className =
            r.label === "ALTO"
                ? "pr-no"
                : r.label === "MEDIO"
                ? "pr-chip pr-chip-blue"
                : "pr-yes";
        // =====================================================
        // SECCIÓN 01
        // =====================================================
        document.getElementById("pr-objetivo").innerHTML = plain(
            getVal(form, "objetivo")
        );

        // =====================================================
        // SECCIÓN 02
        // =====================================================
        setHtml("pr-problemas", chips(getChecks(form, "problemas")));
        setHtml("pr-ap_marca", plain(getVal(form, "ap_marca")));
        setHtml("pr-ap_modelo", plain(getVal(form, "ap_modelo")));

        document.getElementById("pr-usuarios").innerHTML = plain(
            getUsuariosTexto()
        );

        setHtml("pr-disp_usuario", plain(getVal(form, "disp_usuario")));
        setHtml("pr-disp_total", plain(getVal(form, "disp_total")));

        const dispAll = getChecks(form, "dispositivos");

        if (getVal(form, "dispositivos_otros")) {
            dispAll.push("Otros: " + getVal(form, "dispositivos_otros"));
        }

        document.getElementById("pr-dispositivos").innerHTML = chips(dispAll);

        const servAll = getChecks(form, "servicios");

        if (getVal(form, "servicios_otros")) {
            servAll.push("Otro: " + getVal(form, "servicios_otros"));
        }

        document.getElementById("pr-servicios").innerHTML = chips(servAll);

        setHtml("pr-dificultad", plain(getVal(form, "dificultad")));
        setHtml("pr-dif_marca", plain(getVal(form, "dif_marca")));
        setHtml("pr-dif_modelo", plain(getVal(form, "dif_modelo")));
        setHtml("pr-dif_funcion", plain(getVal(form, "dif_funcion")));
        setHtml("pr-ctrl_tipo", plain(getVal(form, "ctrl_tipo")));

        // =====================================================
        // SECCIÓN 03
        // =====================================================
        setHtml("pr-diagrama", plain(getVal(form, "diagrama")));
        setHtml("pr-diagrama_notas", plain(getVal(form, "diagrama_notas")));
        setHtml("pr-onboarding", plain(getVal(form, "onboarding")));
        setHtml("pr-ssids", buildSsidsHtml());
        setHtml("pr-dhcp", plain(getVal(form, "dhcp")));
        setHtml("pr-dns", plain(getVal(form, "dns")));
        setHtml("pr-bloqueo", plain(getVal(form, "bloqueo")));
        setHtml("pr-bloqueo_puertos", plain(getVal(form, "bloqueo_puertos")));
        setHtml("pr-cableado", plain(getVal(form, "cableado")));
        setHtml("pr-switch_admin", plain(getVal(form, "switch_admin")));
        setHtml("pr-inyectores", plain(getVal(form, "inyectores")));
        setHtml("pr-throughput", plain(getVal(form, "throughput")));
        setHtml("pr-ctrl_radica", plain(getVal(form, "ctrl_radica")));
        setHtml("pr-qos", plain(getVal(form, "qos")));
        setHtml("pr-qos_e2e", plain(getVal(form, "qos_e2e")));

        // =====================================================
        // SECCIÓN 04
        // =====================================================

        document.getElementById("pr-notas").innerHTML = plain(
            getVal(form, "notas")
        );

        document.getElementById("pr-footer-cliente").textContent =
            (getVal(form, "cliente") || "Cliente") +
            " — Levantamiento Site Survey";
    }

    return {
        populateReport,
    };
}
