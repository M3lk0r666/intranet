export function generarHTMLImpresion(ctx) {
    const d = obtenerDatos(ctx);

    const fecha = new Date().toLocaleDateString("es-MX", {
        year: "numeric",
        month: "long",
        day: "numeric",
    });

    const riesgoLabel = ctx.labelScore ? ctx.labelScore() : "—";
    const riesgoClass = `risk-${riesgoLabel.toLowerCase()}`;

    /* ── Switches ── */
    const switchesHTML = ctx.switches
        .map((sw, i) => {
            const funciones = [
                sw.core && { label: "Core", cls: "tag-brand" },
                sw.dist && { label: "Distribución", cls: "tag-muted" },
                sw.acc && { label: "Acceso", cls: "tag-teal" },
                sw.gestion && { label: "Con Gestión", cls: "tag-blue" },
                sw.poe && { label: "PoE", cls: "tag-amber" },
            ].filter(Boolean);

            const pct =
                sw.puertos && sw.usados
                    ? Math.round((sw.usados / sw.puertos) * 100)
                    : null;

            const barColor =
                pct === null
                    ? "#ccc"
                    : pct >= 90
                    ? "#dc2626"
                    : pct >= 70
                    ? "#d97706"
                    : "#16a34a";

            const occHTML =
                pct !== null
                    ? `<div class="occ-wrap">
                         <span class="sw-cell-val">${sw.usados} / ${sw.puertos}</span>
                         <div class="occ-bar">
                           <div class="occ-fill" style="width:${pct}%;background:${barColor}"></div>
                         </div>
                         <span style="font-size:10px;color:#888">${pct}%</span>
                       </div>`
                    : `<span class="sw-cell-val">${sw.usados || "—"}</span>`;

            const tagsHTML = funciones.length
                ? funciones
                      .map(
                          (f) => `<span class="tag ${f.cls}">${f.label}</span>`
                      )
                      .join(" ")
                : `<span class="chk-na">No especificada</span>`;

            const borderTop = i > 0 ? "border-top:1px solid var(--border)" : "";

            return `
<div class="sw-block" style="${borderTop}">
  <div class="sw-subhead">
    <span class="sw-id">SW-${String(i + 1).padStart(2, "0")}</span>
    ${sw.host || "Sin hostname"}
  </div>
  <div class="sw-grid">
    <div class="sw-cell">
      <span class="sw-cell-label">Marca / Modelo</span>
      <span class="sw-cell-val">${
          [sw.marca, sw.modelo].filter(Boolean).join(" ") || "—"
      }</span>
    </div>
    <div class="sw-cell">
      <span class="sw-cell-label">IP de Gestión</span>
      <span class="sw-cell-val" style="font-family:monospace">${
          sw.ip || "—"
      }</span>
    </div>
    <div class="sw-cell" style="border-bottom:none">
      <span class="sw-cell-label">Ocupación de puertos</span>
      ${occHTML}
    </div>
    <div class="sw-cell" style="border-bottom:none">
      <span class="sw-cell-label">Funcionalidad</span>
      <div style="margin-top:2px">${tagsHTML}</div>
    </div>
  </div>
</div>`;
        })
        .join("");

    return `<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>Levantamiento – ${ctx.cliente || "Cliente"}</title>
<style>
  @import url('https://fonts.googleapis.com/css2?family=IBM+Plex+Mono:wght@400;600&family=IBM+Plex+Sans:wght@400;500;600;700&display=swap');
  :root {
    --brand:#E05A1C; --brand-bg:#FFF4EE; --brand-fg:#B84210;
    --ink:#111; --muted:#666; --border:#e0e0e0; --surface:#f7f7f5;
    --ok:#16a34a; --warn:#d97706; --danger:#dc2626;
  }
  *{box-sizing:border-box;margin:0;padding:0;}
  body{font-family:'IBM Plex Sans','Segoe UI',Arial,sans-serif;font-size:12px;color:var(--ink);background:#fff;padding:32px 40px;}

  /* Header */
  .rpt-header{display:flex;justify-content:space-between;align-items:flex-start;padding-bottom:16px;border-bottom:2px solid var(--ink);margin-bottom:24px;}
  .rpt-logo-line{display:flex;align-items:center;gap:10px;margin-bottom:6px;}
  .rpt-logo-dot{width:26px;height:26px;background:var(--brand);border-radius:5px;display:flex;align-items:center;justify-content:center;flex-shrink:0;}
  .rpt-doc-type{font-size:9px;text-transform:uppercase;letter-spacing:.12em;color:var(--muted);font-weight:600;}
  .rpt-title{font-size:20px;font-weight:700;line-height:1.15;margin-top:4px;}
  .rpt-title em{color:var(--brand);font-style:normal;}
  .rpt-meta-block{background:var(--surface);border-radius:8px;padding:10px 14px;min-width:210px;text-align:right;}
  .rpt-meta-row{display:flex;justify-content:flex-end;gap:6px;font-size:11px;line-height:1.9;color:var(--muted);}
  .rpt-meta-row strong{color:var(--ink);font-weight:600;}

  /* Risk */
  .risk-alto{color:var(--danger);font-weight:700;}
  .risk-medio{color:var(--warn);font-weight:700;}
  .risk-bajo{color:var(--ok);font-weight:700;}

  /* Sections */
  .sec{margin-bottom:22px;}
  .sec-head{display:flex;align-items:center;gap:8px;background:var(--ink);color:#fff;padding:6px 12px;border-radius:6px 6px 0 0;}
  .sec-num{font-size:9px;font-weight:700;text-transform:uppercase;letter-spacing:.1em;color:var(--brand);background:rgba(224,90,28,.18);padding:2px 6px;border-radius:3px;font-family:'IBM Plex Mono',monospace;}
  .sec-title{font-size:11.5px;font-weight:600;letter-spacing:.04em;text-transform:uppercase;}

  /* Tables */
  table{width:100%;border-collapse:collapse;border:1px solid var(--border);border-top:none;font-size:11.5px;}
  tr{border-bottom:1px solid var(--border);}
  tr:last-child{border-bottom:none;}
  td,th{padding:7px 11px;vertical-align:top;}
  td:first-child{width:42%;background:var(--surface);font-weight:600;color:#444;border-right:1px solid var(--border);}
  th{background:var(--surface);font-weight:700;font-size:10px;text-transform:uppercase;letter-spacing:.06em;color:var(--muted);border-right:1px solid var(--border);}
  th:last-child{border-right:none;}

  /* Switch blocks */
  .sw-block{background:#fff;border:1px solid var(--border);border-top:none;}
  .sw-block:last-of-type{border-radius:0 0 6px 6px;}
  .sw-subhead{background:#f0f0ee;border-bottom:1px solid var(--border);padding:5px 11px;display:flex;align-items:center;gap:8px;font-size:11px;font-weight:700;color:#333;}
  .sw-id{background:var(--brand);color:#fff;font-size:9px;font-weight:700;padding:2px 6px;border-radius:3px;font-family:monospace;letter-spacing:.06em;}
  .sw-grid{display:grid;grid-template-columns:1fr 1fr;}
  .sw-cell{padding:6px 11px;border-bottom:1px solid var(--border);border-right:1px solid var(--border);display:flex;flex-direction:column;gap:2px;}
  .sw-cell:nth-child(even){border-right:none;}
  .sw-cell-label{font-size:9px;text-transform:uppercase;letter-spacing:.08em;color:var(--muted);font-weight:600;}
  .sw-cell-val{font-weight:600;color:var(--ink);}

  /* Occupancy bar */
  .occ-wrap{display:flex;align-items:center;gap:8px;margin-top:2px;}
  .occ-bar{flex:1;height:6px;background:#e5e7eb;border-radius:3px;overflow:hidden;}
  .occ-fill{height:100%;border-radius:3px;}

  /* Tags */
  .tag{display:inline-block;padding:2px 8px;border-radius:4px;font-size:10px;font-weight:600;letter-spacing:.04em;margin:1px;}
  .tag-brand{background:var(--brand-bg);color:var(--brand-fg);}
  .tag-blue{background:#eff6ff;color:#1e40af;}
  .tag-teal{background:#f0fdf4;color:#166534;}
  .tag-amber{background:#fffbeb;color:#92400e;}
  .tag-muted{background:var(--surface);color:#555;border:1px solid var(--border);}

  /* Pills */
  .pill{display:inline-flex;align-items:center;padding:3px 9px;border-radius:999px;font-size:10px;font-weight:600;background:var(--surface);color:#333;border:1px solid var(--border);margin:1px;}

  /* Status */
  .chk-ok{color:var(--ok);font-weight:700;}
  .chk-no{color:var(--danger);font-weight:700;}
  .chk-na{color:var(--muted);}

  /* Footer */
  .rpt-footer{margin-top:24px;padding-top:10px;border-top:1px solid var(--border);display:flex;justify-content:space-between;font-size:9.5px;color:var(--muted);font-family:monospace;}

  @media print{
    body{padding:14px 20px;}
    .sec-head,.sw-subhead,.sw-id,td:first-child,th{-webkit-print-color-adjust:exact;print-color-adjust:exact;}
  }
</style>
</head>
<body>

<!-- HEADER -->
<div class="rpt-header">
  <div>
    <div class="rpt-logo-line">
      <div class="rpt-logo-dot">
        <svg width="14" height="14" viewBox="0 0 14 14" fill="none">
          <rect x="1" y="1" width="5" height="5" rx="1" fill="white"/>
          <rect x="8" y="1" width="5" height="5" rx="1" fill="white" opacity=".6"/>
          <rect x="1" y="8" width="5" height="5" rx="1" fill="white" opacity=".6"/>
          <rect x="8" y="8" width="5" height="5" rx="1" fill="white" opacity=".3"/>
        </svg>
      </div>
      <span class="rpt-doc-type">Cuestionario de Levantamiento v1.0</span>
    </div>
    <div class="rpt-title">Levantamiento de <em>Infraestructura de Red</em></div>
  </div>
  <div class="rpt-meta-block">
    <div class="rpt-meta-row"><span>Cliente</span><strong>${
        ctx.cliente || "—"
    }</strong></div>
    <div class="rpt-meta-row"><span>Ingeniero</span><strong>${
        ctx.ingeniero || "—"
    }</strong></div>
    <div class="rpt-meta-row"><span>Fecha</span><strong>${fecha}</strong></div>
    <div class="rpt-meta-row"><span>Riesgo</span><strong class="${riesgoClass}">${riesgoLabel}</strong></div>
  </div>
</div>

<!-- 01 INFORMACIÓN GENERAL -->
<div class="sec">
  <div class="sec-head"><span class="sec-num">01</span><span class="sec-title">Información General</span></div>
  <table>
    <tr><td>Nombre del cliente</td><td>${ctx.cliente || "—"}</td></tr>
    <tr><td>Ingeniero responsable</td><td>${ctx.ingeniero || "—"}</td></tr>
    <tr><td>Fecha de levantamiento</td><td>${ctx.fecha || fecha}</td></tr>
    <tr><td>Nivel de riesgo estimado</td><td><span class="${riesgoClass}">${riesgoLabel}</span></td></tr>
  </table>
</div>

<!-- 02 INFRAESTRUCTURA FÍSICA -->
<div class="sec">
  <div class="sec-head"><span class="sec-num">02</span><span class="sec-title">Infraestructura Física</span></div>
  <table>
    <tr>
      <td>Tipo de cableado</td>
      <td>${badgesFromText(d.cableado, "tag-brand")}</td>
    </tr>
    <tr>
      <td>Fibra óptica</td>
      <td>${badgesFromText(d.fibra, "tag-teal")}</td>
    </tr>
    <tr>
      <td>Patch panel</td>
      <td>${badgesFromText(d.patchPanel, "tag-muted")}</td>
    </tr>
    <tr>
      <td>Cableado etiquetado e identificado</td>
      <td>${chk(ctx.fisico.cableado_ok)}</td>
    </tr>
    <tr>
      <td>Respaldo de energía (UPS)</td>
      <td>${chk(ctx.fisico.ups)}</td>
    </tr>
    <tr>
      <td>UPS documentado</td>
      <td>${chk(ctx.fisico.ups_documentado)}</td>
    </tr>
    <tr>
      <td>¿Existe diagrama de red actual?</td>
      <td>${radioHTML(ctx.fisico.diagrama)}</td>
    </tr>
    <tr>
      <td>VLANs documentadas</td>
      <td>${radioHTML(ctx.fisico.vlans)}</td>
    </tr>
    <tr>
      <td>Direccionamiento IP documentado</td>
      <td>${radioHTML(ctx.fisico.direccionamiento)}</td>
    </tr>
    <tr>
      <td>Notas adicionales</td>
      <td style="white-space:pre-wrap" class="${
          ctx.fisico.notas ? "" : "chk-na"
      }">${ctx.fisico.notas || "—"}</td>
    </tr>
  </table>
</div>

<!-- 03 SWITCHES -->
<div class="sec">
  <div class="sec-head"><span class="sec-num">03</span><span class="sec-title">Inventario de Switches</span></div>
  ${switchesHTML}
</div>

<!-- 04 SERVICIOS DE RED -->
<div class="sec">
  <div class="sec-head"><span class="sec-num">04</span><span class="sec-title">Servicios de Red</span></div>
  <table>
    <tr>
      <td>Protocolos de enrutamiento</td>
      <td>${d.enrutamientoBadges}</td>
    </tr>
    <tr>
      <td>Direccionamiento IP</td>
      <td>${badgesFromText(d.direccionamientoIP, "tag-blue")}</td>
    </tr>
    <tr>
      <td>Servicios activos</td>
      <td>${d.serviciosActivosBadges}</td>
    </tr>
  </table>
</div>

<!-- 05 SEGURIDAD PERIMETRAL -->
<div class="sec">
  <div class="sec-head"><span class="sec-num">05</span><span class="sec-title">Seguridad Perimetral</span></div>
  <table>
    <tr><td>Tipo de Firewall</td><td>${d.tipoFirewall}</td></tr>
    <tr><td>Marca / Modelo</td><td>${
        [d.fwMarca, d.fwModelo].filter((v) => v !== "—").join(" ") || "—"
    }</td></tr>
    <tr><td>Ubicación / Rack</td><td style="font-family:monospace">${
        d.fwUbicacion
    }</td></tr>
    <tr><td>Total de puertos</td><td>${d.fwPuertos}</td></tr>
    <tr><td>IP de gestión</td><td style="font-family:monospace">${
        d.fwIP
    }</td></tr>
    <tr>
      <td>Funcionalidades activas</td>
      <td>${d.fwFuncionalidadesBadges}</td>
    </tr>
    <tr>
      <td>Notas de seguridad</td>
      <td style="white-space:pre-wrap" class="${
          d.fwNotas !== "—" ? "" : "chk-na"
      }">${d.fwNotas}</td>
    </tr>
  </table>
</div>

<!-- FOOTER -->
<div class="rpt-footer">
  <span>${
      ctx.cliente || "Cliente"
  } — Levantamiento de Infraestructura de Red</span>
  <span>Ingeniería / Guías On-Site v1.0</span>
</div>

</body>
</html>`;
}

/* ─────────────────────────────────────────
   HELPERS
───────────────────────────────────────── */

function radio(val) {
    if (val === "si") return "Sí";
    if (val === "no") return "No";
    return "Sin respuesta";
}

function radioHTML(val) {
    if (val === "si") return `<span class="chk-ok">✔ Sí</span>`;
    if (val === "no") return `<span class="chk-no">✘ No</span>`;
    return `<span class="chk-na">Sin respuesta</span>`;
}

function chk(val) {
    return val
        ? `<span class="chk-ok">✔ Sí</span>`
        : `<span class="chk-no">✘ No</span>`;
}

/** Convierte "Cat 5e, Cat 6" en badges de una clase dada */
function badgesFromText(text, cls = "tag-muted") {
    if (!text || text === "Ninguno" || text === "No especificado") {
        return `<span class="chk-na">${text || "—"}</span>`;
    }
    return text
        .split(", ")
        .map((t) => `<span class="tag ${cls}">${t.trim()}</span>`)
        .join(" ");
}

function listFromChecks(obj, map) {
    return (
        Object.entries(map)
            .filter(([key]) => obj[key])
            .map(([, label]) => label)
            .join(", ") || "Ninguno"
    );
}

function listAsBadges(obj, map, cls = "tag-brand") {
    const items = Object.entries(map).filter(([key]) => obj[key]);
    if (!items.length) return `<span class="chk-na">Ninguno</span>`;
    return items
        .map(([, label]) => `<span class="tag ${cls}">${label}</span>`)
        .join(" ");
}

/* ─────────────────────────────────────────
   OBTENER DATOS
───────────────────────────────────────── */
function obtenerDatos(ctx) {
    const cableado =
        ["cat5", "cat5e", "cat6", "cat6e", "cat7", "cat8"]
            .filter((k) => ctx.fisico[k])
            .map((k) => k.replace(/^cat/, "Cat ").replace("e", "e"))
            .join(", ") || "Ninguno";

    const fibra =
        [
            ctx.fisico.multimodo && "Multimodo",
            ctx.fisico.monomodo && "Monomodo",
            ctx.fisico.no_aplica_fibra && "No aplica",
        ]
            .filter(Boolean)
            .join(", ") || "Ninguno";

    const patchPanel =
        [
            ctx.fisico.etiquetados && "Etiquetado",
            ctx.fisico.organizados && "Organizado",
        ]
            .filter(Boolean)
            .join(", ") || "No especificado";

    const estadoCableado = ctx.fisico.cableado_ok
        ? "Etiquetado e identificado"
        : "No cumple";

    const enrutamientoBadges = listAsBadges(
        ctx.servicios,
        {
            estatico: "Estático",
            ospf: "OSPF",
            bgp: "BGP",
            eigrp: "EIGRP",
            mpls: "MPLS",
        },
        "tag-brand"
    );

    const direccionamientoIP = listFromChecks(ctx.servicios, {
        ip_estatico: "IPs Estáticas",
        ip_dinamico: "IPs Dinámicas (DHCP)",
    });

    const serviciosActivosBadges = listAsBadges(
        ctx.servicios,
        {
            dns: "DNS",
            radius: "RADIUS",
            ad: "Active Directory",
            ntp: "NTP",
            snmp: "SNMP",
        },
        "tag-teal"
    );

    const tipoFirewallMap = {
        hardware: "Por Hardware",
        software: "Por Software",
        ambos: "Ambos",
        no_aplica: "No Aplica",
    };

    const fwFuncionalidadesBadges = listAsBadges(
        ctx.seguridad,
        {
            ids: "IDS/IPS",
            vpn: "VPN",
            nat: "NAT",
            dmz: "DMZ",
            waf: "WAF",
            acl: "ACL",
        },
        "pill" // usa pill class para las funcionalidades de seguridad
    );

    return {
        cableado,
        fibra,
        patchPanel,
        estadoCableado,

        enrutamientoBadges,
        direccionamientoIP,
        serviciosActivosBadges,

        tipoFirewall:
            tipoFirewallMap[ctx.seguridad.tipo_fw] || "No especificado",
        fwFuncionalidadesBadges,

        fwMarca: ctx.seguridad.marca || "—",
        fwModelo: ctx.seguridad.modelo || "—",
        fwUbicacion: ctx.seguridad.ubicacion || "—",
        fwPuertos: ctx.seguridad.puertos || "—",
        fwIP: ctx.seguridad.ip || "—",
        fwNotas: ctx.seguridad.notas || "—",
    };
}
