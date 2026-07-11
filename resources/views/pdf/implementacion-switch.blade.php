<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Guía Implementación Switches — Netjer</title>
    <style>
        * { box-sizing: border-box; margin: 0; padding: 0; }

        body {
            font-family: DejaVu Sans, Arial, sans-serif;
            font-size: 11px;
            color: #1e293b;
            background: #ffffff;
        }

        /* ── WATERMARK: absolute para no romper el flujo ── */
        .watermark {
            position: absolute;
            top: 38%;
            left: 10%;
            opacity: 0.04;
            font-size: 64px;
            color: #000;
            font-weight: bold;
            white-space: nowrap;
            letter-spacing: 8px;
            transform: rotate(-30deg);
        }

        /* ── HEADER ── */
        .doc-header {
            background: #0b1f3a;
            color: #ffffff;
            padding: 16px 26px 14px;
            width: 100%;
        }
        .brand { font-size: 20px; font-weight: bold; letter-spacing: 2px; color: #ffffff; }
        .brand span { color: #f97316; }
        .meta { text-align: right; font-size: 9.5px; color: #94b4d8; line-height: 1.9; }
        .meta strong { color: #cde0f5; }

        /* ── BARRA TÍTULO ── */
        .title-bar {
            background: #1a3a5c;
            color: #ffffff;
            padding: 14px 26px 12px;
            border-bottom: 3px solid #f97316;
            width: 100%;
        }
        .title-bar h1 { font-size: 17px; font-weight: bold; margin-bottom: 5px; }
        .title-bar p { font-size: 10px; color: #bdd5f0; line-height: 1.6; }
        .badge {
            background: #f97316; color: #ffffff;
            padding: 3px 10px; font-size: 9px; font-weight: bold;
            letter-spacing: 1px; border-radius: 2px; margin-right: 6px;
        }
        .badge-out {
            border: 1px solid #fdba74; color: #fdba74;
            padding: 3px 10px; font-size: 9px;
            letter-spacing: 1px; border-radius: 2px;
        }

        /* ── CUERPO ── */
        .body-wrap { padding: 18px 26px 24px; }

        /* ── ENCABEZADO DE SECCIÓN (tabla en vez de flex) ── */
        .section-header-table { width: 100%; border-collapse: collapse; margin: 20px 0 10px; }
        .section-num {
            background: #0b1f3a; color: #ffffff;
            font-size: 11px; font-weight: bold;
            width: 26px; height: 26px;
            border-radius: 13px;
            text-align: center; line-height: 26px;
        }
        .section-title-text {
            font-size: 13px; font-weight: bold; color: #0b1f3a;
            padding-left: 8px; white-space: nowrap;
        }
        .section-divider-cell { width: 99%; }
        .section-divider { border-top: 1px solid #d1dce8; margin-top: 13px; }

        /* ── DOS COLUMNAS ── */
        .two-col { width: 100%; border-collapse: collapse; margin-bottom: 10px; }
        .two-col td { width: 50%; vertical-align: top; padding: 0 5px 0 0; }
        .two-col td:last-child { padding: 0 0 0 5px; }

        /* ── BLOQUE DE CÓDIGO ── */
        .code-block { background: #0b1f3a; border-radius: 4px; padding: 11px 14px; }
        .code-label {
            color: #f97316; font-size: 9px; font-weight: bold;
            letter-spacing: 1px; text-transform: uppercase; margin-bottom: 8px;
        }
        .code-grid { width: 100%; border-collapse: collapse; }
        .code-grid td { vertical-align: top; padding: 3px 4px; width: 50%; }
        .cmd-group { margin-bottom: 6px; }
        .cmd-desc { font-size: 9px; color: #94b4d8; margin-bottom: 2px; }
        .code-line {
            font-family: "Courier New", Courier, monospace;
            font-size: 10px; color: #7dd3fc; line-height: 1.6; display: block;
        }
        .code-line::before { content: "› "; color: #38bdf8; }
        .code-optional { color: #60a5fa; font-style: italic; }

        /* ── CHECKLIST CARD ── */
        .card {
            background: #f8fafc;
            border: 1px solid #d1dce8;
            border-left: 3px solid #f97316;
            border-radius: 3px;
            padding: 11px 13px;
        }
        .card-danger { border-left-color: #dc2626; }
        .card-title {
            font-size: 10px; font-weight: bold; color: #0b1f3a;
            text-transform: uppercase; letter-spacing: 0.5px; margin-bottom: 8px;
        }

        /* ── LISTA (tabla en vez de list con flex) ── */
        .list-table { width: 100%; border-collapse: collapse; }
        .list-table td {
            vertical-align: top;
            padding: 4px 0;
            border-bottom: 1px solid #d1dce8;
            font-size: 10px;
            color: #334155;
            line-height: 1.4;
        }
        .list-table tr:last-child td { border-bottom: none; }
        .list-bullet { width: 14px; color: #f97316; font-size: 10px; padding-right: 4px; }

        /* ── ALERTA (tabla en vez de flex) ── */
        .alert-table { width: 100%; border-collapse: collapse; border-radius: 3px; margin: 10px 0; }
        .alert-table td { vertical-align: top; padding: 9px 0; }
        .alert-icon-cell { width: 22px; font-size: 13px; padding-right: 8px; padding-left: 13px; }
        .alert-text-cell { font-size: 10.5px; line-height: 1.5; padding-right: 13px; }

        .alert-warning  { background: #fff7ed; border: 1px solid #fdba74; border-left: 4px solid #f97316; color: #7c2d12; }
        .alert-info     { background: #eff6ff; border: 1px solid #bfdbfe; border-left: 4px solid #3b82f6; color: #1e3a5f; }
        .alert-danger   { background: #fef2f2; border: 1px solid #fca5a5; border-left: 4px solid #dc2626; color: #7f1d1d; }
        .alert-footer   { background: #f1f5f9; border: 1px solid #d1dce8; border-left: 4px solid #64748b; color: #64748b; }

        .alert-warning-sm {
            background: #fffbeb;
            border: 1px solid #fde68a;
            border-left: 3px solid #f59e0b;
            border-radius: 3px;
            padding: 5px 8px;
            margin: 4px 0 2px 4px;
            font-size: 9.5px;
            color: #92400e;
            line-height: 1.4;
        }

        /* ── PASOS DEL CAMBIO ── */
        .steps-table { width: 100%; border-collapse: collapse; margin: 8px 0; }
        .step-cell { width: 20%; padding: 4px; vertical-align: top; }
        .step-box {
            background: #f8fafc;
            border: 1px solid #d1dce8;
            border-top: 3px solid #f97316;
            border-radius: 3px;
            padding: 10px 8px;
            text-align: center;
        }
        .step-letter { font-size: 18px; font-weight: bold; color: #c2410c; display: block; line-height: 1; margin-bottom: 4px; }
        .step-title  { font-size: 10px; font-weight: bold; color: #0b1f3a; margin-bottom: 3px; }
        .step-desc   { font-size: 9px; color: #64748b; line-height: 1.4; }

        /* ── TABLA DE VERIFICACIÓN ── */
        .verify-table { width: 100%; border-collapse: collapse; margin-bottom: 10px; }
        .verify-table th {
            background: #0b1f3a; color: #ffffff;
            font-size: 9.5px; font-weight: bold;
            padding: 7px 10px; text-align: left; letter-spacing: 0.4px;
        }
        .verify-table td {
            padding: 7px 10px; font-size: 10.5px;
            border-bottom: 1px solid #d1dce8; color: #334155;
        }
        .verify-table tr:nth-child(even) td { background: #f8fafc; }
        .pill-req {
            background: #f0fdf4; color: #16a34a;
            font-size: 8.5px; font-weight: bold;
            padding: 2px 8px; border-radius: 10px;
            border: 1px solid #86efac; white-space: nowrap;
        }
        .pill-opt {
            background: #fefce8; color: #854d0e;
            font-size: 8.5px; font-weight: bold;
            padding: 2px 8px; border-radius: 10px;
            border: 1px solid #fde047; white-space: nowrap;
        }

        /* ── COMPARATIVA INTERFACES ── */
        .iface-table { width: 100%; border-collapse: collapse; margin: 8px 0; }
        .iface-table td { width: 50%; vertical-align: top; padding: 0 4px 0 0; }
        .iface-table td:last-child { padding: 0 0 0 4px; }
        .iface-box {
            background: #0b1f3a; border-radius: 4px; padding: 10px 12px;
            font-family: "Courier New", Courier, monospace;
            font-size: 10px; color: #e2e8f0; line-height: 1.7;
        }
        .iface-label { color: #f97316; font-weight: bold; display: block; margin-bottom: 4px; }

        /* ── FOTOS ── */
        .photo-table { width: 100%; border-collapse: collapse; margin: 8px 0; }
        .photo-table td { width: 50%; padding: 0 4px 0 0; vertical-align: top; }
        .photo-table td:last-child { padding: 0 0 0 4px; }
        .photo-box {
            background: #f8fafc;
            border: 2px dashed #d1dce8;
            border-radius: 4px; height: 90px;
            text-align: center; padding-top: 28px;
            font-size: 10px; color: #94a3b8;
        }

        /* ── ROLLBACK (tabla en vez de flex) ── */
        .rollback-table { width: 100%; border-collapse: collapse; }
        .rollback-table td { vertical-align: top; padding: 7px 0; border-bottom: 1px solid #fecaca; }
        .rollback-table tr:last-child td { border-bottom: none; }
        .rollback-num-cell { width: 30px; }
        .rollback-num {
            width: 22px; height: 22px; border-radius: 11px;
            background: #fef2f2; color: #dc2626;
            text-align: center; line-height: 22px;
            font-size: 10px; font-weight: bold;
        }
        .rollback-text { font-size: 10.5px; color: #334155; line-height: 1.4; padding-left: 6px; }

        /* ── SUB-HEADERS ── */
        .sub-header {
            font-size: 9.5px; font-weight: bold;
            text-transform: uppercase; letter-spacing: 0.5px;
            color: #64748b; margin: 12px 0 6px;
        }

        /* ── FOOTER ── */
        .doc-footer {
            background: #0b1f3a; color: #94b4d8;
            font-size: 9px; padding: 10px 26px;
            text-align: center; letter-spacing: 0.3px;
        }

        @page { margin: 0; }
    </style>
</head>
<body>

    {{-- ══ HEADER ══ --}}
    <table width="100%" style="background:#0b1f3a;padding:0;border-collapse:collapse;">
        <tr>
            <td style="padding:16px 26px 14px;width:60%;">
                <div class="brand">NET<span>JER</span></div>
            </td>
            <td style="padding:16px 26px 14px;width:40%;" class="meta">
                <strong>Documento:</strong> Guía Implementación Switches<br>
                <strong>Fecha:</strong> {{ date('d/m/Y') }}<br>
                <strong>Versión:</strong> 1.0<br>
                <strong>Clasificación:</strong> Confidencial
            </td>
        </tr>
    </table>

    {{-- ══ BARRA TÍTULO ══ --}}
    <div class="title-bar">
        <h1>Guía de Implementación de Switches</h1>
        <p>
            Procedimiento estandarizado para la sustitución y configuración de switches de red,<br>
            garantizando continuidad operativa y cumplimiento de estándares corporativos.
        </p>
        <div style="margin-top:10px;">
            <span class="badge">IMPLEMENTACIÓN v1.0</span>
            <span class="badge-out">CONFIDENCIAL</span>
        </div>
    </div>

    {{-- ══ CUERPO ══ --}}
    <div class="body-wrap">

        {{-- 1. ACTIVIDADES PREVIAS --}}
        <table class="section-header-table">
            <tr>
                <td style="width:26px;"><div class="section-num">1</div></td>
                <td class="section-title-text">Actividades Previas (antes de Ventana)</td>
                <td class="section-divider-cell"><div class="section-divider"></div></td>
            </tr>
        </table>

        <p style="font-size:10.5px;color:#475569;margin-bottom:10px;">
            Solicitar al cliente archivo/s de configuración del equipo/s a reemplazar con los siguientes comandos.
        </p>

        <table class="two-col">
            <tr>
                <td>
                    <div class="code-block">
                        <div class="code-label">Comandos de Pre-Check</div>
                        <table class="code-grid">
                            <tr>
                                <td>
                                    <div class="cmd-group">
                                        <div class="cmd-desc">Configuración general</div>
                                        <span class="code-line">show configuration</span>
                                    </div>
                                    <div class="cmd-group">
                                        <div class="cmd-desc">Versión de Firmware</div>
                                        <span class="code-line">show version detail</span>
                                    </div>
                                    <div class="cmd-group">
                                        <div class="cmd-desc">Licencias instaladas</div>
                                        <span class="code-line">show licence detail</span>
                                    </div>
                                    <div class="cmd-group">
                                        <div class="cmd-desc">Detalles del switch</div>
                                        <span class="code-line">show switch detail</span>
                                    </div>
                                </td>
                                <td>
                                    <div class="cmd-group">
                                        <div class="cmd-desc">VLANs configuradas</div>
                                        <span class="code-line">show vlan</span>
                                    </div>
                                    <div class="cmd-group">
                                        <div class="cmd-desc">Rutas IP</div>
                                        <span class="code-line">show iproute</span>
                                    </div>
                                    <div class="cmd-group">
                                        <div class="cmd-desc">Vecinos del switch</div>
                                        <span class="code-line">show edp ports all</span>
                                    </div>
                                    <div class="cmd-group">
                                        <div class="cmd-desc">Estado de interfaces</div>
                                        <span class="code-line">show ports -no-refresh</span>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2" style="padding-top:6px;">
                                    <div class="cmd-desc code-optional">Comandos opcionales</div>
                                    <span class="code-line code-optional">show lldp neighbors</span>
                                    <span class="code-line code-optional">show fdb</span>
                                    <span class="code-line code-optional">show stacking</span>
                                </td>
                            </tr>
                        </table>
                    </div>
                </td>
                <td>
                    <div class="card">
                        <div class="card-title">Lista de Verificación Previa</div>
                        <table class="list-table">
                            <tr>
                                <td class="list-bullet">▸</td>
                                <td>Creación de script de configuración para los nuevos equipos.</td>
                            </tr>
                            <tr>
                                <td class="list-bullet">▸</td>
                                <td>Revisión de equipamiento nuevo (que corresponda con lo vendido).</td>
                            </tr>
                            <tr>
                                <td class="list-bullet">▸</td>
                                <td>
                                    Identificación física (en sitio) de los equipos originales — inspección visual, cableado y conexiones.
                                    <div class="alert-warning-sm">⚠ Si se detecta algún inconveniente físico que impida la ejecución de la ventana, notificarlo al cliente antes de la misma.</div>
                                </td>
                            </tr>
                            <tr>
                                <td class="list-bullet">▸</td>
                                <td>
                                    Registro fotográfico antes y después (foto de rack completo e individual de cada switch).
                                    <div class="alert-warning-sm">⚠ En caso de encontrar algún detalle en el cableado, tomar evidencia y notificar.</div>
                                </td>
                            </tr>
                            <tr>
                                <td class="list-bullet">▸</td>
                                <td>Revisión del etiquetado del cableado (en caso de ser necesario).</td>
                            </tr>
                            <tr>
                                <td class="list-bullet">▸</td>
                                <td>Preparación de equipos nuevos.</td>
                            </tr>
                            <tr>
                                <td class="list-bullet">▸</td>
                                <td>Respaldo de información del/los switches [configuración, VLANs, DGW, ping al DGW, estado de puertos, listado de MAC address].</td>
                            </tr>
                        </table>
                    </div>
                </td>
            </tr>
        </table>

        <table class="alert-table alert-warning">
            <tr>
                <td class="alert-icon-cell">⚠</td>
                <td class="alert-text-cell"><strong>Atención:</strong> Si se detectan problemas físicos durante la inspección, notificar al responsable de área antes de iniciar la ventana de mantenimiento.</td>
            </tr>
        </table>

        {{-- 2. ACTIVIDADES EN EL CAMBIO --}}
        <table class="section-header-table">
            <tr>
                <td style="width:26px;"><div class="section-num">2</div></td>
                <td class="section-title-text">Actividades en el Cambio</td>
                <td class="section-divider-cell"><div class="section-divider"></div></td>
            </tr>
        </table>

        <table class="steps-table">
            <tr>
                <td class="step-cell">
                    <div class="step-box">
                        <span class="step-letter">A</span>
                        <div class="step-title">Desconexión</div>
                        <div class="step-desc">Apagado del equipo y retiro de cables de alimentación y red.</div>
                    </div>
                </td>
                <td class="step-cell">
                    <div class="step-box">
                        <span class="step-letter">B</span>
                        <div class="step-title">Desmontaje</div>
                        <div class="step-desc">Retirar los equipos del rack.</div>
                    </div>
                </td>
                <td class="step-cell">
                    <div class="step-box">
                        <span class="step-letter">C</span>
                        <div class="step-title">Montado</div>
                        <div class="step-desc">Instalación física en rack con soportes adecuados.</div>
                    </div>
                </td>
                <td class="step-cell">
                    <div class="step-box">
                        <span class="step-letter">D</span>
                        <div class="step-title">Conexión</div>
                        <div class="step-desc">Re-cableado eléctrico y de red siguiendo el etiquetado previo.</div>
                    </div>
                </td>
                <td class="step-cell">
                    <div class="step-box">
                        <span class="step-letter">E</span>
                        <div class="step-title">Carga de Script</div>
                        <div class="step-desc">Carga del script de configuración preparado.</div>
                    </div>
                </td>
            </tr>
        </table>

        <table class="alert-table alert-info">
            <tr>
                <td class="alert-icon-cell">ℹ</td>
                <td class="alert-text-cell"><strong>Nota operativa:</strong> Confirmar encendido y operatividad en fuentes de poder. Verificar que los LEDs de sistema (SYST) estén en <strong>verde sólido</strong> antes de continuar con la verificación.</td>
            </tr>
        </table>

        {{-- 3. VERIFICACIÓN --}}
        <table class="section-header-table">
            <tr>
                <td style="width:26px;"><div class="section-num">3</div></td>
                <td class="section-title-text">Verificación de Operatividad</td>
                <td class="section-divider-cell"><div class="section-divider"></div></td>
            </tr>
        </table>

        <div class="sub-header">Pruebas de conectividad — Netjer</div>
        <table class="verify-table">
            <tr>
                <th style="width:50%;">Prueba de Verificación</th>
                <th style="width:30%;">Tipo</th>
                <th style="width:20%;">Estado</th>
            </tr>
            <tr>
                <td>Ping a Gateway (DGW)</td>
                <td>Conectividad de red</td>
                <td><span class="pill-req">✓ REQUERIDO</span></td>
            </tr>
            <tr>
                <td>Ping a Core Switch</td>
                <td>Conectividad de red</td>
                <td><span class="pill-req">✓ REQUERIDO</span></td>
            </tr>
            <tr>
                <td>Ping a Servicios</td>
                <td>Validación de servicios</td>
                <td><span class="pill-req">✓ REQUERIDO</span></td>
            </tr>
        </table>

        <div class="sub-header">Pruebas de conectividad — Cliente</div>
        <table class="verify-table">
            <tr>
                <th style="width:80%;">Prueba</th>
                <th style="width:20%;">Estado</th>
            </tr>
            <tr>
                <td>Comunicación a sus servicios internos / externos</td>
                <td><span class="pill-req">✓ REQUERIDO</span></td>
            </tr>
        </table>

        <div class="sub-header">Comparativa del estado de interfaces (Antes / Después)</div>
        <table class="iface-table">
            <tr>
                <td>
                    <div class="iface-box">
                        <span class="iface-label"># Interfaces ANTES</span>
                        Checking Gi1/0/1... UP/UP<br>
                        Checking Gi1/0/2... UP/UP<br>
                        Checking Gi1/0/3... DOWN/DOWN<br>
                        <span style="color:#64748b;font-size:9px;">[ completar con output real ]</span>
                    </div>
                </td>
                <td>
                    <div class="iface-box">
                        <span class="iface-label"># Interfaces DESPUÉS</span>
                        Checking Gi1/0/1... UP/UP<br>
                        Checking Gi1/0/2... UP/UP<br>
                        Checking Gi1/0/3... DOWN/DOWN<br>
                        <span style="color:#64748b;font-size:9px;">[ completar con output real ]</span>
                    </div>
                </td>
            </tr>
        </table>

        <div class="sub-header">Ajustes en configuración</div>
        <table class="verify-table">
            <tr>
                <th style="width:80%;">Acción</th>
                <th style="width:20%;">Estado</th>
            </tr>
            <tr>
                <td>En caso de ser necesario, realizar ajustes en la configuración</td>
                <td><span class="pill-opt">SI SE REQUIERE</span></td>
            </tr>
        </table>

        {{-- 4. ACTIVIDADES FINALES --}}
        <table class="section-header-table">
            <tr>
                <td style="width:26px;"><div class="section-num">4</div></td>
                <td class="section-title-text">Actividades Finales</td>
                <td class="section-divider-cell"><div class="section-divider"></div></td>
            </tr>
        </table>

        <div class="sub-header" style="margin-top:0;">Registro fotográfico — Antes / Después</div>
        <table class="photo-table">
            <tr>
                <td>
                    @php $fotoAntes = public_path('storage/media/switch-antes.png'); @endphp
                    @if(file_exists($fotoAntes))
                        <img src="{{ $fotoAntes }}" style="width:100%;border-radius:4px;border:1px solid #d1dce8;" alt="Foto antes">
                    @else
                        <div class="photo-box">Foto ANTES<br><span style="font-size:9px;color:#cbd5e1;">switch-antes.png</span></div>
                    @endif
                </td>
                <td>
                    @php $fotoDespues = public_path('storage/media/switch-despues.png'); @endphp
                    @if(file_exists($fotoDespues))
                        <img src="{{ $fotoDespues }}" style="width:100%;border-radius:4px;border:1px solid #d1dce8;" alt="Foto después">
                    @else
                        <div class="photo-box">Foto DESPUÉS<br><span style="font-size:9px;color:#cbd5e1;">switch-despues.png</span></div>
                    @endif
                </td>
            </tr>
        </table>

        <div class="card" style="margin-top:10px;">
            <div class="card-title">Cierre de Ventana</div>
            <table class="list-table">
                <tr>
                    <td class="list-bullet">▸</td>
                    <td>Realizar el backup final de la configuración y almacenarlo.</td>
                </tr>
                <tr>
                    <td class="list-bullet">▸</td>
                    <td>Elaboración y entrega del reporte de actividades con firma del cliente.</td>
                </tr>
                <tr>
                    <td class="list-bullet">▸</td>
                    <td>Confirmación formal del cierre de ventana de mantenimiento.</td>
                </tr>
                <tr>
                    <td class="list-bullet">▸</td>
                    <td>Notificación del fin de la ventana a las partes involucradas.</td>
                </tr>
            </table>
        </div>

        {{-- 5. PLAN DE RETORNO --}}
        <table class="section-header-table">
            <tr>
                <td style="width:26px;"><div class="section-num">5</div></td>
                <td class="section-title-text">Plan de Retorno (Rollback)</td>
                <td class="section-divider-cell"><div class="section-divider"></div></td>
            </tr>
        </table>

        <table class="alert-table alert-danger">
            <tr>
                <td class="alert-icon-cell">✕</td>
                <td class="alert-text-cell"><strong>Plan de contingencia:</strong> En caso de falla crítica insalvable durante la ventana de mantenimiento, ejecutar el siguiente procedimiento de retorno de manera inmediata.</td>
            </tr>
        </table>

        <div class="card card-danger">
            <div class="card-title">Procedimiento de Rollback</div>
            <table class="rollback-table">
                <tr>
                    <td class="rollback-num-cell"><div class="rollback-num">1</div></td>
                    <td class="rollback-text">Apagado de los equipos nuevos y retiro de cableado de red y energía.</td>
                </tr>
                <tr>
                    <td class="rollback-num-cell"><div class="rollback-num">2</div></td>
                    <td class="rollback-text">Desmontar el equipo nuevo y reinstalar el equipo original en el rack.</td>
                </tr>
                <tr>
                    <td class="rollback-num-cell"><div class="rollback-num">3</div></td>
                    <td class="rollback-text">Reconectar cables de alimentación y fibra/cobre según el mapeo inicial documentado y registro fotográfico previo.</td>
                </tr>
                <tr>
                    <td class="rollback-num-cell"><div class="rollback-num">4</div></td>
                    <td class="rollback-text">Validar conectividad básica para asegurar que el servicio ha retornado a su estado funcional anterior.</td>
                </tr>
            </table>
        </div>

        <table class="alert-table alert-footer" style="margin-top:20px;">
            <tr>
                <td class="alert-icon-cell" style="color:#64748b;">🔒</td>
                <td class="alert-text-cell">Documento interno generado desde la Intranet Corporativa — Uso exclusivo del personal autorizado. Prohibida su distribución externa.</td>
            </tr>
        </table>

    </div>{{-- /body-wrap --}}

    {{-- ══ FOOTER ══ --}}
    <table width="100%" style="background:#0b1f3a;border-collapse:collapse;margin-top:24px;">
        <tr>
            <td style="padding:10px 26px;text-align:center;font-size:9px;color:#94b4d8;letter-spacing:0.3px;">
                Netjer · Infraestructura de Red · Guía Implementación Switches v1.0 · {{ date('d/m/Y') }} · CONFIDENCIAL
            </td>
        </tr>
    </table>

</body>
</html>