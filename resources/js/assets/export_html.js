/**
 * Genera un HTML autosuficiente (standalone) con el formulario de
 * Levantamiento de Infraestructura de Red.
 *
 * El archivo resultante incluye:
 *   - El formulario completo con TODAS las secciones (Información General,
 *     Infraestructura Física, Switches, Servicios de Red, Seguridad).
 *   - El estado de Alpine ya pre-cargado con los datos actuales del ctx.
 *   - El cálculo de nivel de riesgo (score / labelScore / colorScore).
 *   - El botón "Imprimir Reporte" que genera el reporte estilizado
 *     (la misma salida que genera reporte.js).
 *   - Estilos inline equivalentes a las clases lev-* del intranet,
 *     para que el formulario se vea bien sin dependencias externas.
 */
export function generarHTMLStandalone(ctx) {
    const titulo = ctx.cliente
        ? `Levantamiento — ${ctx.cliente}`
        : "Levantamiento de Infraestructura";

    return `<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>${titulo}</title>
<script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"><\/script>
<style>
${generarCSS()}
</style>
</head>
<body>

<div class="page" x-data="app" x-cloak>
${generarFormularioHTML()}
</div>

<script>
${generarJS(ctx)}
<\/script>

</body>
</html>`;
}

/* ─────────────────────────────────────────
   CSS — estilos del formulario (lev-*)
───────────────────────────────────────── */
function generarCSS() {
    return `
:root{
  --brand:#E05A1C; --brand-bg:#FFF4EE; --brand-fg:#B84210;
  --ink:#0f172a; --muted:#64748b; --border:#e2e8f0; --surface:#f8fafc;
  --ok:#16a34a; --warn:#d97706; --danger:#dc2626;
  --radius:10px;
}
*{box-sizing:border-box;margin:0;padding:0;}
[x-cloak]{display:none !important;}
html,body{background:#f1f5f9;color:var(--ink);font-family:'Inter','Segoe UI',Arial,sans-serif;font-size:14px;}
.page{max-width:1100px;margin:24px auto;padding:24px;background:#fff;border:1px solid var(--border);border-radius:16px;}

/* Header */
.lev-header{display:flex;justify-content:space-between;align-items:flex-start;gap:16px;margin-bottom:24px;padding-bottom:16px;border-bottom:1px solid var(--border);}
.lev-badge{display:inline-block;background:var(--brand-bg);color:var(--brand-fg);font-size:11px;font-weight:700;letter-spacing:.06em;text-transform:uppercase;padding:4px 10px;border-radius:999px;margin-bottom:8px;}
.lev-title{font-size:26px;font-weight:800;line-height:1.15;color:var(--ink);}
.lev-title span{color:var(--brand);}
.lev-subtitle{color:var(--muted);font-size:13px;margin-top:4px;}
.lev-risk-box{background:var(--surface);border:1px solid var(--border);border-radius:var(--radius);padding:10px 16px;min-width:160px;text-align:right;}
.lev-risk-label{font-size:10px;text-transform:uppercase;letter-spacing:.08em;color:var(--muted);font-weight:600;}
.lev-risk-value{font-size:22px;font-weight:800;margin-top:2px;}

/* Section */
.lev-section{border:1px solid var(--border);border-radius:var(--radius);margin-bottom:20px;overflow:hidden;}
.lev-section-head{display:flex;align-items:center;gap:10px;background:var(--ink);color:#fff;padding:10px 14px;}
.lev-section-head .num{background:rgba(224,90,28,.2);color:var(--brand);font-family:monospace;font-size:11px;font-weight:700;padding:2px 7px;border-radius:4px;letter-spacing:.06em;}
.lev-section-head h2{font-size:13px;font-weight:600;letter-spacing:.04em;text-transform:uppercase;}
.lev-section-body{padding:18px;}

/* Layout */
.lev-grid{display:grid;grid-template-columns:repeat(auto-fit,minmax(220px,1fr));gap:12px;}
.lev-grid-2{display:grid;grid-template-columns:1fr 1fr;gap:18px;}
@media (max-width:760px){.lev-grid-2{grid-template-columns:1fr;}}

/* Fields */
.lev-field{display:flex;flex-direction:column;gap:4px;margin-bottom:10px;}
.lev-label{font-size:12px;font-weight:600;color:#334155;}
.lev-sub{font-size:12px;font-weight:700;color:#334155;text-transform:uppercase;letter-spacing:.04em;margin-bottom:6px;}
.lev-input,.lev-select,.lev-textarea{width:100%;border:1px solid var(--border);border-radius:8px;padding:8px 10px;font-size:13px;font-family:inherit;color:var(--ink);background:#fff;transition:border-color .15s,box-shadow .15s;}
.lev-input:focus,.lev-select:focus,.lev-textarea:focus{outline:none;border-color:var(--brand);box-shadow:0 0 0 3px var(--brand-bg);}
.lev-textarea{min-height:90px;resize:vertical;font-family:inherit;}

/* Checks & radios */
.lev-checks{display:flex;flex-wrap:wrap;gap:6px 14px;}
.lev-check-item,.lev-radio-item{display:inline-flex;align-items:center;gap:6px;font-size:13px;color:#334155;cursor:pointer;}
.lev-check-item input,.lev-radio-item input{accent-color:var(--brand);}
.lev-radio-row{display:flex;flex-direction:column;gap:6px;margin-bottom:10px;}
.lev-radio-row > span{font-size:13px;color:#334155;}
.lev-radios{display:flex;flex-wrap:wrap;gap:8px 16px;}

/* Service cards */
.lev-service-cards{display:grid;grid-template-columns:repeat(auto-fit,minmax(120px,1fr));gap:8px;}
.lev-service-card{display:flex;flex-direction:column;align-items:center;justify-content:center;gap:6px;padding:12px 8px;border:1px solid var(--border);border-radius:10px;background:var(--surface);cursor:pointer;font-size:12px;font-weight:600;color:#334155;transition:background .15s,border-color .15s;}
.lev-service-card:hover{border-color:var(--brand);}
.lev-service-card input{accent-color:var(--brand);}
.lev-service-card i{font-size:18px;color:var(--brand);}

/* Switch cards */
.sw-card{border:1px solid var(--border);border-radius:10px;margin-bottom:12px;overflow:hidden;}
.sw-card-head{display:flex;justify-content:space-between;align-items:center;padding:8px 12px;background:var(--surface);border-bottom:1px solid var(--border);font-size:13px;}
.sw-delete{background:transparent;border:none;color:var(--danger);font-size:12px;cursor:pointer;display:inline-flex;align-items:center;gap:4px;}
.sw-delete:hover{text-decoration:underline;}
.sw-card-body{padding:14px;}
.btn-add-sw{display:inline-flex;align-items:center;gap:6px;background:var(--brand-bg);color:var(--brand-fg);border:1px dashed var(--brand);padding:8px 14px;border-radius:8px;font-size:13px;font-weight:600;cursor:pointer;}
.btn-add-sw:hover{background:var(--brand);color:#fff;}

/* Divider */
.lev-divider{border:none;border-top:1px solid var(--border);margin:16px 0;}

/* Actions */
.lev-actions{display:flex;flex-wrap:wrap;gap:10px;justify-content:flex-end;margin-top:18px;}
.btn-primary-lev,.btn-outline-lev{display:inline-flex;align-items:center;gap:6px;padding:10px 18px;border-radius:8px;font-size:13px;font-weight:600;cursor:pointer;border:1px solid transparent;transition:background .15s,color .15s;}
.btn-primary-lev{background:var(--brand);color:#fff;}
.btn-primary-lev:hover{background:var(--brand-fg);}
.btn-outline-lev{background:#fff;color:var(--ink);border-color:var(--border);}
.btn-outline-lev:hover{border-color:var(--brand);color:var(--brand);}
`;
}

/* ─────────────────────────────────────────
   FORM HTML — réplica del Blade
───────────────────────────────────────── */
function generarFormularioHTML() {
    return `
<!-- Header -->
<div class="lev-header">
  <div class="lev-header-left">
    <div class="lev-badge">Cuestionario de Levantamiento v1.0</div>
    <h1 class="lev-title">Infraestructura <span>de Red</span></h1>
    <p class="lev-subtitle">Complete todos los campos para generar el reporte de levantamiento.</p>
  </div>
  <div class="lev-risk-box">
    <div class="lev-risk-label">Nivel de riesgo</div>
    <div class="lev-risk-value" :style="colorScore()" x-text="labelScore()">—</div>
  </div>
</div>

<!-- 01 INFORMACIÓN GENERAL -->
<div class="lev-section">
  <div class="lev-section-head"><span class="num">01</span><h2>Información General</h2></div>
  <div class="lev-section-body">
    <div class="lev-grid-2">
      <div class="lev-field" style="grid-column:1 / -1;">
        <label class="lev-label">Nombre del Cliente</label>
        <input class="lev-input" type="text" placeholder="Razón social o nombre del cliente" x-model="cliente" />
      </div>
      <div class="lev-field">
        <label class="lev-label">Fecha de Levantamiento</label>
        <input class="lev-input" type="date" x-model="fecha" />
      </div>
      <div class="lev-field">
        <label class="lev-label">Ingeniero Responsable</label>
        <input class="lev-input" type="text" placeholder="Nombre del ingeniero" x-model="ingeniero" />
      </div>
    </div>
  </div>
</div>

<!-- 02 INFRAESTRUCTURA FÍSICA -->
<div class="lev-section">
  <div class="lev-section-head"><span class="num">02</span><h2>Infraestructura Física</h2></div>
  <div class="lev-section-body">

    <div class="lev-grid-2" style="margin-bottom:1.5rem;">
      <div>
        <div class="lev-field">
          <label class="lev-label">¿Es cableado estructurado?</label>
          <select class="lev-select" x-model="cable.estructura">
            <option value="">Seleccionar…</option>
            <option value="si">Si</option>
            <option value="no">No</option>
            <option value="parcial">Parcialmente</option>
            <option value="no_aplica">No Aplica</option>
          </select>
        </div>
      </div>
      <div>
        <p class="lev-sub">Tipo de Cableado</p>
        <div class="lev-checks">
          <label class="lev-check-item"><input type="checkbox" x-model="fisico.cat5" /> Cat 5</label>
          <label class="lev-check-item"><input type="checkbox" x-model="fisico.cat5e" /> Cat 5e</label>
          <label class="lev-check-item"><input type="checkbox" x-model="fisico.cat6" /> Cat 6</label>
          <label class="lev-check-item"><input type="checkbox" x-model="fisico.cat6e" /> Cat 6e</label>
          <label class="lev-check-item"><input type="checkbox" x-model="fisico.cat7" /> Cat 7</label>
          <label class="lev-check-item"><input type="checkbox" x-model="fisico.cat8" /> Cat 8</label>
          <label class="lev-check-item"><input type="checkbox" x-model="fisico.se_desconoce" /> Se desconoce</label>
        </div>
      </div>
      <div>
        <p class="lev-sub">Fibra Óptica</p>
        <div class="lev-checks">
          <label class="lev-check-item"><input type="checkbox" x-model="fisico.multimodo" /> Multimodo</label>
          <label class="lev-check-item"><input type="checkbox" x-model="fisico.monomodo" /> Monomodo</label>
          <label class="lev-check-item"><input type="checkbox" x-model="fisico.no_aplica_fibra" /> No Aplica</label>
          <label class="lev-check-item"><input type="checkbox" x-model="fisico.fibra_se_desconoce" /> Se desconoce</label>
        </div>
      </div>
    </div>

    <hr class="lev-divider">

    <div class="lev-grid-2" style="margin-bottom:1.5rem;">
      <!-- Rack -->
      <div>
        <p class="lev-sub">Rack / Gabinete</p>
        <div class="lev-radio-row">
          <span>¿Cuenta con rack o gabinete para switches / patch panel?</span>
          <div class="lev-radios">
            <label class="lev-radio-item"><input type="radio" name="rack" value="si" x-model="fisico.rack"> Sí</label>
            <label class="lev-radio-item"><input type="radio" name="rack" value="no" x-model="fisico.rack"> No</label>
          </div>
        </div>
        <div class="lev-field" x-show="fisico.rack === 'si'" x-transition>
          <label class="lev-label">Tipo de rack</label>
          <select class="lev-select" x-model="fisico.tipo_rack">
            <option value="">Seleccionar…</option>
            <option value="abierto">Abierto</option>
            <option value="cerrado">Cerrado</option>
            <option value="pared">Pared</option>
            <option value="piso">Piso</option>
          </select>
        </div>
      </div>

      <!-- Patch Panel -->
      <div>
        <p class="lev-sub">Patch Panel</p>
        <div class="lev-radio-row">
          <span>¿Cuenta con patch panel?</span>
          <div class="lev-radios">
            <label class="lev-radio-item"><input type="radio" name="patch_panel" value="si" x-model="fisico.patch_panel"> Sí</label>
            <label class="lev-radio-item"><input type="radio" name="patch_panel" value="no" x-model="fisico.patch_panel"> No</label>
            <label class="lev-radio-item"><input type="radio" name="patch_panel" value="se_desconoce" x-model="fisico.patch_panel"> Se desconoce</label>
          </div>
        </div>
        <div x-show="fisico.patch_panel === 'si'" x-transition>
          <div class="lev-checks">
            <label class="lev-check-item"><input type="checkbox" x-model="fisico.etiquetados" /> Etiquetado</label>
            <label class="lev-check-item"><input type="checkbox" x-model="fisico.organizados" /> Organizado</label>
          </div>
        </div>
      </div>
    </div>

    <hr class="lev-divider">

    <div class="lev-grid-2" style="margin-bottom:1.5rem;">
      <div>
        <p class="lev-sub">Estado del Cableado</p>
        <div class="lev-checks">
          <label class="lev-check-item"><input type="checkbox" x-model="fisico.cableado_etiquetado" /> Etiquetado</label>
          <label class="lev-check-item"><input type="checkbox" x-model="fisico.cableado_identificado" /> Identificado</label>
        </div>
      </div>
    </div>

    <hr class="lev-divider">

    <!-- Respaldo de Energía -->
    <div style="margin-bottom:1.5rem;">
      <p class="lev-sub">Respaldo de Energía</p>
      <div class="lev-grid-2">
        <div>
          <div class="lev-radio-row">
            <span>¿Cuenta con planta de emergencia?</span>
            <div class="lev-radios">
              <label class="lev-radio-item"><input type="radio" name="planta_emergencia" value="si" x-model="fisico.planta_emergencia"> Sí</label>
              <label class="lev-radio-item"><input type="radio" name="planta_emergencia" value="no" x-model="fisico.planta_emergencia"> No</label>
              <label class="lev-radio-item"><input type="radio" name="planta_emergencia" value="parcial" x-model="fisico.planta_emergencia"> Parcial</label>
            </div>
          </div>
          <div x-show="fisico.planta_emergencia === 'si' || fisico.planta_emergencia === 'parcial'" x-transition>
            <div class="lev-field">
              <label class="lev-label">Capacidad (kVA)</label>
              <input type="text" class="lev-input" placeholder="Ej. 30 kVA" x-model="fisico.planta_capacidad">
            </div>
            <div class="lev-field">
              <label class="lev-label">Autonomía</label>
              <input type="text" class="lev-input" placeholder="Ej. 4 horas" x-model="fisico.planta_autonomia">
            </div>
          </div>
        </div>
        <div>
          <div class="lev-radio-row">
            <span>¿Cuenta con UPS general?</span>
            <div class="lev-radios">
              <label class="lev-radio-item"><input type="radio" name="ups_general" value="si" x-model="fisico.ups_general"> Sí</label>
              <label class="lev-radio-item"><input type="radio" name="ups_general" value="no" x-model="fisico.ups_general"> No</label>
              <label class="lev-radio-item"><input type="radio" name="ups_general" value="se_desconoce" x-model="fisico.ups_general"> Se desconoce</label>
            </div>
          </div>
          <div class="lev-radio-row">
            <span>¿Cuenta con UPS por IDF o por rack?</span>
            <div class="lev-radios">
              <label class="lev-radio-item"><input type="radio" name="ups_rack" value="si" x-model="fisico.ups_rack"> Sí</label>
              <label class="lev-radio-item"><input type="radio" name="ups_rack" value="no" x-model="fisico.ups_rack"> No</label>
              <label class="lev-radio-item"><input type="radio" name="ups_rack" value="algunos" x-model="fisico.ups_rack"> Algunos</label>
              <label class="lev-radio-item"><input type="radio" name="ups_rack" value="se_desconoce" x-model="fisico.ups_rack"> Se desconoce</label>
            </div>
          </div>
        </div>
      </div>
    </div>

    <hr class="lev-divider">

    <div class="lev-grid-2">
      <div>
        <p class="lev-sub">Documentación</p>
        <div class="lev-radio-row">
          <span>¿Existe diagrama de red actual?</span>
          <div class="lev-radios">
            <label class="lev-radio-item"><input type="radio" name="diagrama" value="si" x-model="fisico.diagrama"> Sí</label>
            <label class="lev-radio-item"><input type="radio" name="diagrama" value="no" x-model="fisico.diagrama"> No</label>
            <label class="lev-radio-item"><input type="radio" name="diagrama" value="sin-respuesta" x-model="fisico.diagrama"> Sin respuesta</label>
          </div>
        </div>
        <div class="lev-radio-row">
          <span>VLANs documentadas</span>
          <div class="lev-radios">
            <label class="lev-radio-item"><input type="radio" name="vlans" value="si" x-model="fisico.vlans"> Sí</label>
            <label class="lev-radio-item"><input type="radio" name="vlans" value="no" x-model="fisico.vlans"> No</label>
            <label class="lev-radio-item"><input type="radio" name="vlans" value="sin-respuesta" x-model="fisico.vlans"> Sin respuesta</label>
          </div>
        </div>
        <div class="lev-radio-row">
          <span>Direccionamiento IP documentado</span>
          <div class="lev-radios">
            <label class="lev-radio-item"><input type="radio" name="direccionamiento" value="si" x-model="fisico.direccionamiento"> Sí</label>
            <label class="lev-radio-item"><input type="radio" name="direccionamiento" value="no" x-model="fisico.direccionamiento"> No</label>
            <label class="lev-radio-item"><input type="radio" name="direccionamiento" value="sin-respuesta" x-model="fisico.direccionamiento"> Sin respuesta</label>
          </div>
        </div>
        <div class="lev-radio-row">
          <span>¿Existe memoria técnica del cableado?</span>
          <div class="lev-radios">
            <label class="lev-radio-item"><input type="radio" name="memoria_tecnica" value="si" x-model="fisico.memoria_tecnica"> Sí</label>
            <label class="lev-radio-item"><input type="radio" name="memoria_tecnica" value="no" x-model="fisico.memoria_tecnica"> No</label>
            <label class="lev-radio-item"><input type="radio" name="memoria_tecnica" value="sin-respuesta" x-model="fisico.memoria_tecnica"> Sin respuesta</label>
          </div>
        </div>
      </div>
      <div class="lev-field">
        <label class="lev-label">Notas Adicionales</label>
        <textarea class="lev-textarea" placeholder="Observaciones del área física, condiciones del rack, etc." x-model="fisico.notas"></textarea>
      </div>
    </div>
  </div>
</div>

<!-- 03 INVENTARIO DE SWITCHES -->
<div class="lev-section">
  <div class="lev-section-head"><span class="num">03</span><h2>Inventario de Switches</h2></div>
  <div class="lev-section-body">
    <template x-for="(sw, i) in switches" :key="i">
      <div class="sw-card">
        <div class="sw-card-head">
          <strong x-text="'SW-' + String(i+1).padStart(2,'0')"></strong>
          <button class="sw-delete" @click="removeSwitch(i)" x-show="switches.length > 1">✕ Eliminar</button>
        </div>
        <div class="sw-card-body">
          <div class="lev-grid" style="margin-bottom:1rem;">
            <div class="lev-field"><label class="lev-label">Hostname</label><input class="lev-input" type="text" placeholder="ej. SW-CORE-01" x-model="sw.host" /></div>
            <div class="lev-field"><label class="lev-label">Marca</label><input class="lev-input" type="text" placeholder="ej. Cisco, HP" x-model="sw.marca" /></div>
            <div class="lev-field"><label class="lev-label">Modelo</label><input class="lev-input" type="text" placeholder="ej. Catalyst 2960" x-model="sw.modelo" /></div>
            <div class="lev-field"><label class="lev-label">Total de Puertos</label><input class="lev-input" type="number" placeholder="24" x-model="sw.puertos" /></div>
            <div class="lev-field"><label class="lev-label">Puertos Utilizados</label><input class="lev-input" type="number" placeholder="18" x-model="sw.usados" /></div>
            <div class="lev-field"><label class="lev-label">IP de Gestión</label><input class="lev-input" type="text" placeholder="192.168.1.1" x-model="sw.ip" /></div>
          </div>
          <p class="lev-sub">Funcionalidad</p>
          <div class="lev-checks">
            <label class="lev-check-item"><input type="checkbox" x-model="sw.core" /> Core</label>
            <label class="lev-check-item"><input type="checkbox" x-model="sw.dist" /> Distribución</label>
            <label class="lev-check-item"><input type="checkbox" x-model="sw.acc" /> Acceso</label>
            <label class="lev-check-item"><input type="checkbox" x-model="sw.gestion" /> Con Gestión</label>
            <label class="lev-check-item"><input type="checkbox" x-model="sw.poe" /> PoE</label>
          </div>
        </div>
      </div>
    </template>
    <button class="btn-add-sw" @click="addSwitch()">＋ Agregar Switch</button>
  </div>
</div>

<!-- 04 SERVICIOS DE RED -->
<div class="lev-section">
  <div class="lev-section-head"><span class="num">04</span><h2>Servicios de Red</h2></div>
  <div class="lev-section-body">
    <p class="lev-sub" style="margin-bottom:.85rem;">Protocolos de Enrutamiento</p>
    <div class="lev-service-cards" style="margin-bottom:1.5rem;">
      <label class="lev-service-card"><input type="checkbox" x-model="servicios.estatico"><span>Estático</span></label>
      <label class="lev-service-card"><input type="checkbox" x-model="servicios.ospf"><span>OSPF</span></label>
      <label class="lev-service-card"><input type="checkbox" x-model="servicios.bgp"><span>BGP</span></label>
      <label class="lev-service-card"><input type="checkbox" x-model="servicios.eigrp"><span>EIGRP</span></label>
      <label class="lev-service-card"><input type="checkbox" x-model="servicios.mpls"><span>MPLS</span></label>
    </div>

    <hr class="lev-divider">

    <p class="lev-sub" style="margin-bottom:.85rem;">Direccionamiento IP</p>
    <div class="lev-grid-2" style="margin-bottom:1.5rem;">
      <div>
        <div class="lev-radio-row">
          <span>¿El direccionamiento IP pertenece al cliente?</span>
          <div class="lev-radios">
            <label class="lev-radio-item"><input type="radio" name="ip_cliente" value="si" x-model="servicios.ip_cliente"> Sí</label>
            <label class="lev-radio-item"><input type="radio" name="ip_cliente" value="no" x-model="servicios.ip_cliente"> No</label>
            <label class="lev-radio-item"><input type="radio" name="ip_cliente" value="parcial" x-model="servicios.ip_cliente"> Parcial</label>
          </div>
        </div>
        <div class="lev-field">
          <label class="lev-label">Asignación de IPs</label>
          <select class="lev-select" x-model="servicios.asignacion_ip">
            <option value="">Seleccionar…</option>
            <option value="fijas">Fijas (estáticas)</option>
            <option value="dhcp">Entregadas por DHCP server</option>
            <option value="mixtas">Mixtas</option>
          </select>
        </div>
        <div x-show="servicios.asignacion_ip === 'dhcp' || servicios.asignacion_ip === 'mixtas'" x-transition>
          <div class="lev-field">
            <label class="lev-label">Servidor DHCP</label>
            <input type="text" class="lev-input" placeholder="Ej. Router, Windows Server, Linux, Fortigate..." x-model="servicios.dhcp_server">
          </div>
        </div>
      </div>
      <div>
        <div class="lev-field">
          <label class="lev-label">Rangos de IPs utilizadas (subredes)</label>
          <textarea class="lev-textarea" placeholder="Ej. 192.168.1.0/24&#10;10.10.0.0/16&#10;172.16.5.0/24" x-model="servicios.subredes"></textarea>
        </div>
      </div>
    </div>

    <hr class="lev-divider">

    <p class="lev-sub" style="margin-bottom:.85rem;">Servicios Activos</p>
    <div class="lev-service-cards">
      <label class="lev-service-card"><input type="checkbox" x-model="servicios.dns"><span>DNS</span></label>
      <label class="lev-service-card"><input type="checkbox" x-model="servicios.radius"><span>RADIUS</span></label>
      <label class="lev-service-card"><input type="checkbox" x-model="servicios.ad"><span>Active Directory</span></label>
      <label class="lev-service-card"><input type="checkbox" x-model="servicios.ntp"><span>NTP</span></label>
      <label class="lev-service-card"><input type="checkbox" x-model="servicios.snmp"><span>SNMP</span></label>
    </div>
  </div>
</div>

<!-- 05 SEGURIDAD PERIMETRAL -->
<div class="lev-section">
  <div class="lev-section-head"><span class="num">05</span><h2>Seguridad Perimetral</h2></div>
  <div class="lev-section-body">
    <div class="lev-grid">
      <div class="lev-field">
        <label class="lev-label">Tipo de Firewall</label>
        <select class="lev-select" x-model="seguridad.tipo_fw">
          <option value="">Seleccionar…</option>
          <option value="hardware">Por Hardware</option>
          <option value="software">Por Software</option>
          <option value="ambos">Ambos</option>
          <option value="no_aplica">No Aplica</option>
        </select>
      </div>
      <div class="lev-field"><label class="lev-label">Marca</label><input class="lev-input" type="text" placeholder="ej. Fortinet, Palo Alto" x-model="seguridad.marca" /></div>
      <div class="lev-field"><label class="lev-label">Modelo</label><input class="lev-input" type="text" placeholder="ej. FortiGate 60F" x-model="seguridad.modelo" /></div>
      <div class="lev-field"><label class="lev-label">Ubicación / ID de Rack</label><input class="lev-input" type="text" placeholder="ej. NJ-0012" x-model="seguridad.ubicacion" /></div>
      <div class="lev-field"><label class="lev-label">Total de Puertos</label><input class="lev-input" type="number" placeholder="8" x-model="seguridad.puertos" /></div>
      <div class="lev-field"><label class="lev-label">IP de Gestión</label><input class="lev-input" type="text" placeholder="192.168.1.254" x-model="seguridad.ip" /></div>
    </div>

    <hr class="lev-divider">
    <p class="lev-sub">Funcionalidades activas del Firewall</p>
    <div class="lev-checks">
      <label class="lev-check-item"><input type="checkbox" x-model="seguridad.ids"> IDS/IPS</label>
      <label class="lev-check-item"><input type="checkbox" x-model="seguridad.vpn"> VPN</label>
      <label class="lev-check-item"><input type="checkbox" x-model="seguridad.nat"> NAT</label>
      <label class="lev-check-item"><input type="checkbox" x-model="seguridad.dmz"> DMZ</label>
      <label class="lev-check-item"><input type="checkbox" x-model="seguridad.waf"> WAF</label>
      <label class="lev-check-item"><input type="checkbox" x-model="seguridad.acl"> ACL</label>
    </div>

    <hr class="lev-divider">
    <div class="lev-field">
      <label class="lev-label">Notas de Seguridad</label>
      <textarea class="lev-textarea" placeholder="Políticas especiales, configuraciones relevantes, etc." x-model="seguridad.notas"></textarea>
    </div>
  </div>
</div>

<!-- ACCIONES -->
<div class="lev-actions no-print">
  <button class="btn-primary-lev" @click="imprimir()">🖨  Imprimir Reporte</button>
</div>
`;
}

/* ─────────────────────────────────────────
   JS embebido — estado + métodos + reporte
───────────────────────────────────────── */
function generarJS(ctx) {
    // Datos por defecto si vienen vacíos en ctx
    const data = {
        cliente: ctx.cliente ?? "",
        fecha: ctx.fecha ?? new Date().toISOString().split("T")[0],
        ingeniero: ctx.ingeniero ?? "",
        fisico: ctx.fisico ?? {},
        cable: ctx.cable ?? { estructura: "" },
        switches: ctx.switches ?? [],
        servicios: ctx.servicios ?? {},
        seguridad: ctx.seguridad ?? {},
    };

    return `
document.addEventListener('alpine:init', () => {
    Alpine.data('app', () => ({

        /* ── Estado ── */
        cliente:   ${JSON.stringify(data.cliente)},
        fecha:     ${JSON.stringify(data.fecha)},
        ingeniero: ${JSON.stringify(data.ingeniero)},

        fisico:    ${JSON.stringify(data.fisico, null, 2)},
        cable:     ${JSON.stringify(data.cable, null, 2)},
        switches:  ${JSON.stringify(data.switches, null, 2)},
        servicios: ${JSON.stringify(data.servicios, null, 2)},
        seguridad: ${JSON.stringify(data.seguridad, null, 2)},

        /* ── Switches ── */
        addSwitch() {
            this.switches.push({
                host:'', marca:'', modelo:'', puertos:'', usados:'', ip:'',
                core:false, dist:false, acc:false, gestion:false, poe:false
            });
        },
        removeSwitch(i) { this.switches.splice(i, 1); },

        /* ── Score / nivel de riesgo ── */
        score() {
            let s = 0;
            if (!this.fisico.ups_general)                              s += 2;
            if (!this.seguridad.marca)                                 s += 2;
            if (!this.servicios.ospf && !this.servicios.bgp)           s += 2;
            if (this.fisico.diagrama        !== 'si')                  s += 1;
            if (this.fisico.vlans           !== 'si')                  s += 1;
            if (this.fisico.direccionamiento!== 'si')                  s += 1;
            if (!this.seguridad.ids)                                   s += 1;
            return s;
        },
        labelScore() {
            const s = this.score();
            return s <= 2 ? 'BAJO' : s <= 5 ? 'MEDIO' : 'ALTO';
        },
        colorScore() {
            const s = this.score();
            return s <= 2
                ? 'color:#16a34a;font-weight:700'
                : s <= 5
                ? 'color:#d97706;font-weight:700'
                : 'color:#dc2626;font-weight:700';
        },

        /* ── Imprimir reporte estilizado ── */
        imprimir() {
            const html = generarHTMLImpresion(this);
            const ventana = window.open('', '_blank');
            ventana.document.write(html);
            ventana.document.close();
            setTimeout(() => ventana.print(), 400);
        },

    }));
});

/* ═══════════════════════════════════════════════════════════════
   Función de generación de reporte (equivalente a reporte.js)
═══════════════════════════════════════════════════════════════ */
${generarFuncionReporte()}
`;
}

/* ─────────────────────────────────────────
   Devuelve el código fuente de la función
   generarHTMLImpresion() como string,
   listo para embeberlo en el HTML standalone.
───────────────────────────────────────── */
function generarFuncionReporte() {
    // Se usa String.raw para evitar problemas con backslashes.
    // Los backticks internos se escapan con \\\` (un sólo backtick en el
    // string resultante).
    return String.raw`
function generarHTMLImpresion(ctx) {
    const d = obtenerDatos(ctx);

    const fecha = new Date().toLocaleDateString('es-MX', {
        year: 'numeric', month: 'long', day: 'numeric'
    });

    const riesgoLabel = ctx.labelScore ? ctx.labelScore() : '—';
    const riesgoClass = 'risk-' + riesgoLabel.toLowerCase();

    /* ── Switches ── */
    const switchesHTML = ctx.switches.map((sw, i) => {
        const funciones = [
            sw.core    && { label:'Core',         cls:'tag-brand' },
            sw.dist    && { label:'Distribución', cls:'tag-muted' },
            sw.acc     && { label:'Acceso',       cls:'tag-teal'  },
            sw.gestion && { label:'Con Gestión',  cls:'tag-blue'  },
            sw.poe     && { label:'PoE',          cls:'tag-amber' },
        ].filter(Boolean);

        const pct = sw.puertos && sw.usados
            ? Math.round((sw.usados / sw.puertos) * 100)
            : null;

        const barColor = pct === null ? '#ccc'
            : pct >= 90 ? '#dc2626'
            : pct >= 70 ? '#d97706'
            : '#16a34a';

        const occHTML = pct !== null
            ? '<div class="occ-wrap">' +
                  '<span class="sw-cell-val">' + sw.usados + ' / ' + sw.puertos + '</span>' +
                  '<div class="occ-bar"><div class="occ-fill" style="width:' + pct + '%;background:' + barColor + '"></div></div>' +
                  '<span style="font-size:10px;color:#888">' + pct + '%</span>' +
              '</div>'
            : '<span class="sw-cell-val">' + (sw.usados || '—') + '</span>';

        const tagsHTML = funciones.length
            ? funciones.map(f => '<span class="tag ' + f.cls + '">' + f.label + '</span>').join(' ')
            : '<span class="chk-na">No especificada</span>';

        const borderTop = i > 0 ? 'border-top:1px solid var(--border)' : '';

        return '' +
            '<div class="sw-block" style="' + borderTop + '">' +
              '<div class="sw-subhead">' +
                '<span class="sw-id">SW-' + String(i+1).padStart(2,'0') + '</span> ' +
                (sw.host || 'Sin hostname') +
              '</div>' +
              '<div class="sw-grid">' +
                '<div class="sw-cell">' +
                  '<span class="sw-cell-label">Marca / Modelo</span>' +
                  '<span class="sw-cell-val">' + ([sw.marca, sw.modelo].filter(Boolean).join(' ') || '—') + '</span>' +
                '</div>' +
                '<div class="sw-cell">' +
                  '<span class="sw-cell-label">IP de Gestión</span>' +
                  '<span class="sw-cell-val" style="font-family:monospace">' + (sw.ip || '—') + '</span>' +
                '</div>' +
                '<div class="sw-cell" style="border-bottom:none">' +
                  '<span class="sw-cell-label">Ocupación de puertos</span>' +
                  occHTML +
                '</div>' +
                '<div class="sw-cell" style="border-bottom:none">' +
                  '<span class="sw-cell-label">Funcionalidad</span>' +
                  '<div style="margin-top:2px">' + tagsHTML + '</div>' +
                '</div>' +
              '</div>' +
            '</div>';
    }).join('');

    return ''
+ '<!DOCTYPE html>'
+ '<html lang="es"><head><meta charset="UTF-8">'
+ '<title>Levantamiento – ' + (ctx.cliente || 'Cliente') + '</title>'
+ '<style>'
+ "@import url('https://fonts.googleapis.com/css2?family=IBM+Plex+Mono:wght@400;600&family=IBM+Plex+Sans:wght@400;500;600;700&display=swap');"
+ ':root{--brand:#E05A1C;--brand-bg:#FFF4EE;--brand-fg:#B84210;--ink:#111;--muted:#666;--border:#e0e0e0;--surface:#f7f7f5;--ok:#16a34a;--warn:#d97706;--danger:#dc2626;}'
+ '*{box-sizing:border-box;margin:0;padding:0;}'
+ "body{font-family:'IBM Plex Sans','Segoe UI',Arial,sans-serif;font-size:12px;color:var(--ink);background:#fff;padding:32px 40px;}"
+ '.rpt-header{display:flex;justify-content:space-between;align-items:flex-start;padding-bottom:16px;border-bottom:2px solid var(--ink);margin-bottom:24px;}'
+ '.rpt-logo-line{display:flex;align-items:center;gap:10px;margin-bottom:6px;}'
+ '.rpt-logo-dot{width:26px;height:26px;background:var(--brand);border-radius:5px;display:flex;align-items:center;justify-content:center;flex-shrink:0;}'
+ '.rpt-doc-type{font-size:9px;text-transform:uppercase;letter-spacing:.12em;color:var(--muted);font-weight:600;}'
+ '.rpt-title{font-size:20px;font-weight:700;line-height:1.15;margin-top:4px;}'
+ '.rpt-title em{color:var(--brand);font-style:normal;}'
+ '.rpt-meta-block{background:var(--surface);border-radius:8px;padding:10px 14px;min-width:210px;text-align:right;}'
+ '.rpt-meta-row{display:flex;justify-content:flex-end;gap:6px;font-size:11px;line-height:1.9;color:var(--muted);}'
+ '.rpt-meta-row strong{color:var(--ink);font-weight:600;}'
+ '.risk-alto{color:var(--danger);font-weight:700;}'
+ '.risk-medio{color:var(--warn);font-weight:700;}'
+ '.risk-bajo{color:var(--ok);font-weight:700;}'
+ '.sec{margin-bottom:22px;}'
+ '.sec-head{display:flex;align-items:center;gap:8px;background:var(--ink);color:#fff;padding:6px 12px;border-radius:6px 6px 0 0;}'
+ ".sec-num{font-size:9px;font-weight:700;text-transform:uppercase;letter-spacing:.1em;color:var(--brand);background:rgba(224,90,28,.18);padding:2px 6px;border-radius:3px;font-family:'IBM Plex Mono',monospace;}"
+ '.sec-title{font-size:11.5px;font-weight:600;letter-spacing:.04em;text-transform:uppercase;}'
+ 'table{width:100%;border-collapse:collapse;border:1px solid var(--border);border-top:none;font-size:11.5px;}'
+ 'tr{border-bottom:1px solid var(--border);}'
+ 'tr:last-child{border-bottom:none;}'
+ 'td,th{padding:7px 11px;vertical-align:top;}'
+ 'td:first-child{width:42%;background:var(--surface);font-weight:600;color:#444;border-right:1px solid var(--border);}'
+ 'th{background:var(--surface);font-weight:700;font-size:10px;text-transform:uppercase;letter-spacing:.06em;color:var(--muted);border-right:1px solid var(--border);}'
+ 'th:last-child{border-right:none;}'
+ '.sw-block{background:#fff;border:1px solid var(--border);border-top:none;}'
+ '.sw-block:last-of-type{border-radius:0 0 6px 6px;}'
+ '.sw-subhead{background:#f0f0ee;border-bottom:1px solid var(--border);padding:5px 11px;display:flex;align-items:center;gap:8px;font-size:11px;font-weight:700;color:#333;}'
+ '.sw-id{background:var(--brand);color:#fff;font-size:9px;font-weight:700;padding:2px 6px;border-radius:3px;font-family:monospace;letter-spacing:.06em;}'
+ '.sw-grid{display:grid;grid-template-columns:1fr 1fr;}'
+ '.sw-cell{padding:6px 11px;border-bottom:1px solid var(--border);border-right:1px solid var(--border);display:flex;flex-direction:column;gap:2px;}'
+ '.sw-cell:nth-child(even){border-right:none;}'
+ '.sw-cell-label{font-size:9px;text-transform:uppercase;letter-spacing:.08em;color:var(--muted);font-weight:600;}'
+ '.sw-cell-val{font-weight:600;color:var(--ink);}'
+ '.occ-wrap{display:flex;align-items:center;gap:8px;margin-top:2px;}'
+ '.occ-bar{flex:1;height:6px;background:#e5e7eb;border-radius:3px;overflow:hidden;}'
+ '.occ-fill{height:100%;border-radius:3px;}'
+ '.tag{display:inline-block;padding:2px 8px;border-radius:4px;font-size:10px;font-weight:600;letter-spacing:.04em;margin:1px;}'
+ '.tag-brand{background:var(--brand-bg);color:var(--brand-fg);}'
+ '.tag-blue{background:#eff6ff;color:#1e40af;}'
+ '.tag-teal{background:#f0fdf4;color:#166534;}'
+ '.tag-amber{background:#fffbeb;color:#92400e;}'
+ '.tag-muted{background:var(--surface);color:#555;border:1px solid var(--border);}'
+ '.pill{display:inline-flex;align-items:center;padding:3px 9px;border-radius:999px;font-size:10px;font-weight:600;background:var(--surface);color:#333;border:1px solid var(--border);margin:1px;}'
+ '.chk-ok{color:var(--ok);font-weight:700;}'
+ '.chk-no{color:var(--danger);font-weight:700;}'
+ '.chk-na{color:var(--muted);}'
+ '.rpt-footer{margin-top:24px;padding-top:10px;border-top:1px solid var(--border);display:flex;justify-content:space-between;font-size:9.5px;color:var(--muted);font-family:monospace;}'
+ '@media print{body{padding:14px 20px;}.sec-head,.sw-subhead,.sw-id,td:first-child,th{-webkit-print-color-adjust:exact;print-color-adjust:exact;}}'
+ '</style></head><body>'

+ '<div class="rpt-header">'
+   '<div>'
+     '<div class="rpt-logo-line">'
+       '<div class="rpt-logo-dot">'
+         '<svg width="14" height="14" viewBox="0 0 14 14" fill="none">'
+           '<rect x="1" y="1" width="5" height="5" rx="1" fill="white"/>'
+           '<rect x="8" y="1" width="5" height="5" rx="1" fill="white" opacity=".6"/>'
+           '<rect x="1" y="8" width="5" height="5" rx="1" fill="white" opacity=".6"/>'
+           '<rect x="8" y="8" width="5" height="5" rx="1" fill="white" opacity=".3"/>'
+         '</svg>'
+       '</div>'
+       '<span class="rpt-doc-type">Cuestionario de Levantamiento v1.0</span>'
+     '</div>'
+     '<div class="rpt-title">Levantamiento de <em>Infraestructura de Red</em></div>'
+   '</div>'
+   '<div class="rpt-meta-block">'
+     '<div class="rpt-meta-row"><span>Cliente</span><strong>'   + (ctx.cliente   || '—') + '</strong></div>'
+     '<div class="rpt-meta-row"><span>Ingeniero</span><strong>' + (ctx.ingeniero || '—') + '</strong></div>'
+     '<div class="rpt-meta-row"><span>Fecha</span><strong>'     + fecha + '</strong></div>'
+     '<div class="rpt-meta-row"><span>Riesgo</span><strong class="' + riesgoClass + '">' + riesgoLabel + '</strong></div>'
+   '</div>'
+ '</div>'

/* 01 INFORMACIÓN GENERAL */
+ '<div class="sec">'
+ '<div class="sec-head"><span class="sec-num">01</span><span class="sec-title">Información General</span></div>'
+ '<table>'
+ '<tr><td>Nombre del cliente</td><td>' + (ctx.cliente || '—') + '</td></tr>'
+ '<tr><td>Ingeniero responsable</td><td>' + (ctx.ingeniero || '—') + '</td></tr>'
+ '<tr><td>Fecha de levantamiento</td><td>' + (ctx.fecha || fecha) + '</td></tr>'
+ '<tr><td>Nivel de riesgo estimado</td><td><span class="' + riesgoClass + '">' + riesgoLabel + '</span></td></tr>'
+ '</table></div>'

/* 02 INFRAESTRUCTURA FÍSICA */
+ '<div class="sec">'
+ '<div class="sec-head"><span class="sec-num">02</span><span class="sec-title">Infraestructura Física</span></div>'
+ '<table>'
+ '<tr><td>¿Cableado estructurado?</td><td>' + radioHTML(ctx.cable.estructura) + '</td></tr>'
+ '<tr><td>Tipo de cableado</td><td>' + badgesFromText(d.cableado, 'tag-brand') + '</td></tr>'
+ '<tr><td>Fibra óptica</td><td>' + badgesFromText(d.fibra, 'tag-teal') + '</td></tr>'
+ '<tr><td>Rack / Gabinete</td><td>' + d.rackInfo + '</td></tr>'
+ '<tr><td>Patch panel</td><td>' + radioHTML(ctx.fisico.patch_panel) + '</td></tr>'
+ '<tr><td>Detalles patch panel</td><td>' + badgesFromText(d.patchPanel, 'tag-muted') + '</td></tr>'
+ '<tr><td>Estado del cableado</td><td>' + badgesFromText(d.estadoCableado, 'tag-blue') + '</td></tr>'
+ '<tr><td>Planta de emergencia</td><td>' + radioHTML(ctx.fisico.planta_emergencia) + '</td></tr>'
+ '<tr><td>Capacidad / autonomía</td><td>' + d.plantaDetalle + '</td></tr>'
+ '<tr><td>UPS general</td><td>' + radioHTML(ctx.fisico.ups_general) + '</td></tr>'
+ '<tr><td>UPS por IDF / Rack</td><td>' + radioHTML(ctx.fisico.ups_rack) + '</td></tr>'
+ '<tr><td>¿Existe diagrama de red actual?</td><td>' + radioHTML(ctx.fisico.diagrama) + '</td></tr>'
+ '<tr><td>VLANs documentadas</td><td>' + radioHTML(ctx.fisico.vlans) + '</td></tr>'
+ '<tr><td>Direccionamiento IP documentado</td><td>' + radioHTML(ctx.fisico.direccionamiento) + '</td></tr>'
+ '<tr><td>Memoria técnica del cableado</td><td>' + radioHTML(ctx.fisico.memoria_tecnica) + '</td></tr>'
+ '<tr><td>Notas adicionales</td><td style="white-space:pre-wrap" class="' + (ctx.fisico.notas ? '' : 'chk-na') + '">' + (ctx.fisico.notas || '—') + '</td></tr>'
+ '</table></div>'

/* 03 SWITCHES */
+ '<div class="sec">'
+ '<div class="sec-head"><span class="sec-num">03</span><span class="sec-title">Inventario de Switches</span></div>'
+ switchesHTML
+ '</div>'

/* 04 SERVICIOS DE RED */
+ '<div class="sec">'
+ '<div class="sec-head"><span class="sec-num">04</span><span class="sec-title">Servicios de Red</span></div>'
+ '<table>'
+ '<tr><td>Protocolos de enrutamiento</td><td>' + d.enrutamientoBadges + '</td></tr>'
+ '<tr><td>IP pertenece al cliente</td><td>' + radioHTML(ctx.servicios.ip_cliente) + '</td></tr>'
+ '<tr><td>Asignación IP</td><td>' + d.direccionamientoIP + '</td></tr>'
+ '<tr><td>Servidor DHCP</td><td>' + (ctx.servicios.dhcp_server || '—') + '</td></tr>'
+ '<tr><td>Subredes utilizadas</td><td style="white-space:pre-wrap">' + (ctx.servicios.subredes || '—') + '</td></tr>'
+ '<tr><td>Servicios activos</td><td>' + d.serviciosActivosBadges + '</td></tr>'
+ '</table></div>'

/* 05 SEGURIDAD PERIMETRAL */
+ '<div class="sec">'
+ '<div class="sec-head"><span class="sec-num">05</span><span class="sec-title">Seguridad Perimetral</span></div>'
+ '<table>'
+ '<tr><td>Tipo de Firewall</td><td>' + d.tipoFirewall + '</td></tr>'
+ '<tr><td>Marca / Modelo</td><td>' + ([d.fwMarca, d.fwModelo].filter(v => v !== '—').join(' ') || '—') + '</td></tr>'
+ '<tr><td>Ubicación / Rack</td><td style="font-family:monospace">' + d.fwUbicacion + '</td></tr>'
+ '<tr><td>Total de puertos</td><td>' + d.fwPuertos + '</td></tr>'
+ '<tr><td>IP de gestión</td><td style="font-family:monospace">' + d.fwIP + '</td></tr>'
+ '<tr><td>Funcionalidades activas</td><td>' + d.fwFuncionalidadesBadges + '</td></tr>'
+ '<tr><td>Notas de seguridad</td><td style="white-space:pre-wrap" class="' + (d.fwNotas !== '—' ? '' : 'chk-na') + '">' + d.fwNotas + '</td></tr>'
+ '</table></div>'

+ '<div class="rpt-footer">'
+   '<span>' + (ctx.cliente || 'Cliente') + ' — Levantamiento de Infraestructura de Red</span>'
+   '<span>Ingeniería / Guías On-Site v1.0</span>'
+ '</div>'

+ '</body></html>';
}

/* ─────────────────────────────────────────
   HELPERS
───────────────────────────────────────── */
function radioHTML(val) {
    const map = {
        si:               ['✔ Sí',          'chk-ok'],
        no:               ['✘ No',          'chk-no'],
        parcial:          ['◐ Parcial',     'chk-na'],
        algunos:          ['◐ Algunos',     'chk-na'],
        no_aplica:        ['No aplica',     'chk-na'],
        se_desconoce:     ['Se desconoce',  'chk-na'],
        no_especificado:  ['No especificado','chk-na'],
        'sin-respuesta':  ['Sin respuesta', 'chk-na'],
        '':               ['—',             'chk-na'],
    };
    const [label, cls] = map[val] || [val || '—', 'chk-na'];
    return '<span class="' + cls + '">' + label + '</span>';
}

function badgesFromText(text, cls) {
    cls = cls || 'tag-muted';
    if (!text || text === 'Ninguno' || text === 'No especificado') {
        return '<span class="chk-na">' + (text || '—') + '</span>';
    }
    return text.split(', ')
        .map(t => '<span class="tag ' + cls + '">' + t.trim() + '</span>')
        .join(' ');
}

function listAsBadges(obj, map, cls) {
    cls = cls || 'tag-brand';
    const items = Object.entries(map).filter(([key]) => obj[key]);
    if (!items.length) return '<span class="chk-na">Ninguno</span>';
    return items.map(([, label]) => '<span class="tag ' + cls + '">' + label + '</span>').join(' ');
}

/* ─────────────────────────────────────────
   OBTENER DATOS
───────────────────────────────────────── */
function obtenerDatos(ctx) {
    const cableado =
        ['cat5','cat5e','cat6','cat6e','cat7','cat8']
            .filter(k => ctx.fisico[k])
            .map(k => k.replace(/^cat/, 'Cat '))
            .join(', ')
        + (ctx.fisico.se_desconoce ? (Object.keys(ctx.fisico).some(k => /^cat/.test(k) && ctx.fisico[k]) ? ', Se desconoce' : 'Se desconoce') : '');

    const cableadoFinal = cableado || 'Ninguno';

    const fibra = [
        ctx.fisico.multimodo          && 'Multimodo',
        ctx.fisico.monomodo           && 'Monomodo',
        ctx.fisico.no_aplica_fibra    && 'No aplica',
        ctx.fisico.fibra_se_desconoce && 'Se desconoce',
    ].filter(Boolean).join(', ') || 'Ninguno';

    const patchPanel = [
        ctx.fisico.etiquetados && 'Etiquetado',
        ctx.fisico.organizados && 'Organizado',
    ].filter(Boolean).join(', ') || 'No especificado';

    const rackInfo = ctx.fisico.rack === 'si'
        ? 'Sí (' + (ctx.fisico.tipo_rack || 'Tipo no especificado') + ')'
        : ctx.fisico.rack === 'no' ? 'No' : 'No especificado';

    const plantaDetalle = (ctx.fisico.planta_capacidad || ctx.fisico.planta_autonomia)
        ? (ctx.fisico.planta_capacidad || '—') + ' / ' + (ctx.fisico.planta_autonomia || '—')
        : '—';

    const estadoCableado = [
        ctx.fisico.cableado_etiquetado  && 'Etiquetado',
        ctx.fisico.cableado_identificado && 'Identificado',
    ].filter(Boolean).join(', ') || 'No especificado';

    const enrutamientoBadges = listAsBadges(ctx.servicios, {
        estatico: 'Estático', ospf: 'OSPF', bgp: 'BGP',
        eigrp: 'EIGRP', mpls: 'MPLS',
    }, 'tag-brand');

    const asignacionIPMap = { fijas: 'Fijas (Estáticas)', dhcp: 'DHCP', mixtas: 'Mixtas' };
    const direccionamientoIP = asignacionIPMap[ctx.servicios.asignacion_ip] || 'No especificado';

    const serviciosActivosBadges = listAsBadges(ctx.servicios, {
        dns: 'DNS', radius: 'RADIUS', ad: 'Active Directory',
        ntp: 'NTP', snmp: 'SNMP',
    }, 'tag-teal');

    const tipoFirewallMap = {
        hardware: 'Por Hardware', software: 'Por Software',
        ambos: 'Ambos', no_aplica: 'No Aplica',
    };

    const fwFuncionalidadesBadges = listAsBadges(ctx.seguridad, {
        ids: 'IDS/IPS', vpn: 'VPN', nat: 'NAT',
        dmz: 'DMZ', waf: 'WAF', acl: 'ACL',
    }, 'pill');

    return {
        cableado: cableadoFinal,
        fibra,
        patchPanel,
        rackInfo,
        estadoCableado,
        plantaDetalle,
        enrutamientoBadges,
        direccionamientoIP,
        serviciosActivosBadges,
        tipoFirewall: tipoFirewallMap[ctx.seguridad.tipo_fw] || 'No especificado',
        fwFuncionalidadesBadges,
        fwMarca:     ctx.seguridad.marca     || '—',
        fwModelo:    ctx.seguridad.modelo    || '—',
        fwUbicacion: ctx.seguridad.ubicacion || '—',
        fwPuertos:   ctx.seguridad.puertos   || '—',
        fwIP:        ctx.seguridad.ip        || '—',
        fwNotas:     ctx.seguridad.notas     || '—',
    };
}
`;
}
