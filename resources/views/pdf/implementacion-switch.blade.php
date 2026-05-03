<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Guía Implementación Switches</title>
    <style>
        /* ── Variables de color ── */
        :root {
            --navy: #0b1f3a;
            --blue: #1a4b8c;
            --accent: #2e87d4;
            --light: #e8f1fb;
            --gray: #64748b;
            --border: #d1dce8;
            --red: #b91c1c;
            --red-bg: #fef2f2;
            --orange: #c2410c;
            --orange-bg: #fff7ed;
            --green: #15803d;
            --green-bg: #f0fdf4;
            --white: #ffffff;
            --surface: #f7f9fc;
        }

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: DejaVu Sans, Arial, sans-serif;
            font-size: 11px;
            color: #1e293b;
            background: #ffffff;
        }

        /* ── HEADER ── */
        .doc-header {
            background: var(--navy);
            color: var(--white);
            padding: 18px 28px 14px;
            margin-bottom: 0;
        }

        .doc-header table {
            width: 100%;
        }

        .doc-header .brand {
            font-size: 18px;
            font-weight: bold;
            letter-spacing: 2px;
            color: #ffffff;
        }

        .doc-header .brand span {
            color: var(--accent);
        }

        .doc-header .meta {
            text-align: right;
            font-size: 9.5px;
            color: #94b4d8;
            line-height: 1.8;
        }

        .doc-header .meta strong {
            color: #cde0f5;
        }

        /* ── Barra de título del documento ── */
        .title-bar {
            background: var(--blue);
            color: #ffffff;
            padding: 14px 28px 12px;
            border-bottom: 3px solid var(--accent);
        }

        .title-bar h1 {
            font-size: 17px;
            font-weight: bold;
            letter-spacing: 0.5px;
            margin-bottom: 4px;
        }

        .title-bar p {
            font-size: 10px;
            color: #bdd5f0;
            line-height: 1.5;
        }

        .badge-row {
            margin-top: 8px;
            display: inline-block;
        }

        .badge {
            background: var(--accent);
            color: #ffffff;
            padding: 3px 10px;
            font-size: 9px;
            font-weight: bold;
            letter-spacing: 1px;
            border-radius: 2px;
            margin-right: 6px;
        }

        .badge-conf {
            background: transparent;
            border: 1px solid #aac8e8;
            color: #cde0f5;
            padding: 3px 10px;
            font-size: 9px;
            letter-spacing: 1px;
            border-radius: 2px;
        }

        /* ── Cuerpo principal ── */
        .body-wrap {
            padding: 20px 28px 24px;
        }

        /* ── Sección / encabezado ── */
        .section-title {
            display: flex;
            align-items: center;
            margin: 22px 0 10px;
            gap: 10px;
        }

        .section-num {
            background: var(--navy);
            color: #ffffff;
            font-size: 11px;
            font-weight: bold;
            width: 26px;
            height: 26px;
            border-radius: 50%;
            text-align: center;
            line-height: 26px;
            flex-shrink: 0;
        }

        .section-title h2 {
            font-size: 13px;
            font-weight: bold;
            color: var(--navy);
            letter-spacing: 0.4px;
            border-bottom: none;
            padding: 0;
            margin: 0;
        }

        .section-divider {
            flex: 1;
            height: 1px;
            background: var(--border);
            margin-left: 6px;
        }

        /* ── Tarjeta genérica ── */
        .card {
            background: var(--surface);
            border: 1px solid var(--border);
            border-left: 3px solid var(--accent);
            border-radius: 3px;
            padding: 12px 14px;
            margin-bottom: 10px;
        }

        .card-title {
            font-size: 10.5px;
            font-weight: bold;
            color: var(--navy);
            margin-bottom: 8px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        /* ── Comandos / código ── */
        .code-block {
            background: var(--navy);
            border-radius: 3px;
            padding: 10px 14px;
            margin-bottom: 10px;
        }

        .code-block .code-label {
            color: var(--accent);
            font-size: 9px;
            font-weight: bold;
            letter-spacing: 1px;
            margin-bottom: 6px;
            text-transform: uppercase;
        }

        .code-line {
            font-family: "Courier New", Courier, monospace;
            font-size: 10.5px;
            color: #7dd3fc;
            padding: 2px 0;
            line-height: 1.6;
        }

        .code-line::before {
            content: "› ";
            color: #38bdf8;
            font-weight: bold;
        }

        /* ── Lista corporativa ── */
        .corp-list {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .corp-list li {
            display: flex;
            align-items: flex-start;
            gap: 8px;
            padding: 5px 0;
            border-bottom: 1px solid var(--border);
            font-size: 10.5px;
            color: #334155;
            line-height: 1.4;
        }

        .corp-list li:last-child {
            border-bottom: none;
        }

        .corp-list li::before {
            content: "▸";
            color: var(--accent);
            font-size: 10px;
            flex-shrink: 0;
            margin-top: 1px;
        }

        /* ── Pasos de cambio ── */
        .steps-grid {
            display: table;
            width: 100%;
            border-collapse: collapse;
        }

        .step-row {
            display: table-row;
        }

        .step-cell {
            display: table-cell;
            width: 20%;
            padding: 4px;
            vertical-align: top;
        }

        .step-box {
            background: var(--surface);
            border: 1px solid var(--border);
            border-top: 3px solid var(--blue);
            border-radius: 3px;
            padding: 10px 8px;
            text-align: center;
        }

        .step-letter {
            font-size: 18px;
            font-weight: bold;
            color: var(--blue);
            display: block;
            line-height: 1;
            margin-bottom: 4px;
        }

        .step-label {
            font-size: 9px;
            color: var(--gray);
            line-height: 1.4;
        }

        /* ── Verificaciones ── */
        .verify-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 10px;
        }

        .verify-table th {
            background: var(--navy);
            color: #ffffff;
            font-size: 9.5px;
            font-weight: bold;
            padding: 7px 10px;
            text-align: left;
            letter-spacing: 0.4px;
        }

        .verify-table td {
            padding: 8px 10px;
            font-size: 10.5px;
            border-bottom: 1px solid var(--border);
            color: #334155;
        }

        .verify-table tr:nth-child(even) td {
            background: var(--surface);
        }

        .status-pill {
            background: var(--green-bg);
            color: var(--green);
            font-size: 8.5px;
            font-weight: bold;
            padding: 2px 8px;
            border-radius: 10px;
            border: 1px solid #86efac;
            white-space: nowrap;
        }

        /* ── Alertas ── */
        .alert {
            border-radius: 3px;
            padding: 10px 14px;
            margin: 10px 0;
            font-size: 10.5px;
            line-height: 1.5;
            display: flex;
            align-items: flex-start;
            gap: 10px;
        }

        .alert-icon {
            font-size: 14px;
            flex-shrink: 0;
            margin-top: 0;
        }

        .alert-info {
            background: var(--light);
            border: 1px solid #93c5fd;
            border-left: 4px solid var(--accent);
            color: #1e3a5f;
        }

        .alert-warning {
            background: var(--orange-bg);
            border: 1px solid #fdba74;
            border-left: 4px solid #f97316;
            color: #7c2d12;
        }

        .alert-danger {
            background: var(--red-bg);
            border: 1px solid #fca5a5;
            border-left: 4px solid var(--red);
            color: #7f1d1d;
        }

        .alert-footer {
            background: #f1f5f9;
            border: 1px solid var(--border);
            border-left: 4px solid var(--gray);
            color: var(--gray);
        }

        /* ── Two-column layout ── */
        .two-col-table {
            width: 100%;
            border-collapse: collapse;
        }

        .two-col-table td {
            width: 50%;
            vertical-align: top;
            padding: 0 6px 0 0;
        }

        .two-col-table td:last-child {
            padding-right: 0;
            padding-left: 6px;
        }

        /* ── FOOTER ── */
        .doc-footer {
            background: var(--navy);
            color: #94b4d8;
            font-size: 9px;
            padding: 10px 28px;
            text-align: center;
            margin-top: 24px;
            letter-spacing: 0.3px;
        }

        /* ── Watermark ── */
        .watermark {
            position: fixed;
            top: 45%;
            left: 50%;
            transform: translate(-50%, -50%) rotate(-30deg);
            opacity: 0.04;
            font-size: 72px;
            color: #000;
            z-index: -1;
            white-space: nowrap;
            letter-spacing: 10px;
            font-weight: bold;
        }

        @page {
            margin: 0;
        }
    </style>
</head>

<body>

    <div class="watermark">CONFIDENCIAL</div>

    <!-- ══ HEADER ══ -->
    <div class="doc-header">
        <table>
            <tr>
                <td style="width:60%;">
                    {{-- Reemplaza con tu img si tienes logo --}}
                    <div class="brand">NET<span>JER</span></div>
                    {{-- <img src="{{ public_path('assets/media/logo-netjer.png') }}" style="height:42px;"> --}}
                </td>
                <td style="width:40%;" class="meta">
                    <strong>Documento:</strong> Checklist Switches<br>
                    <strong>Fecha:</strong> {{ date('d/m/Y') }}<br>
                    <strong>Versión:</strong> 1.0<br>
                    <strong>Clasificación:</strong> Confidencial
                </td>
            </tr>
        </table>
    </div>

    <!-- ══ TÍTULO ══ -->
    <div class="title-bar">
        <h1>Guía de Implementación de Switches</h1>
        <p>Procedimiento estandarizado para la sustitución y configuración de switches de red,<br>
            garantizando continuidad operativa y cumplimiento de estándares corporativos.</p>
        <div class="badge-row">
            <span class="badge">IMPLEMENTACIÓN v1.0</span>
            <span class="badge-conf">CONFIDENCIAL</span>
        </div>
    </div>

    <!-- ══ CUERPO ══ -->
    <div class="body-wrap">

        <!-- 1. Actividades Previas -->
        <div class="section-title">
            <div class="section-num">1</div>
            <h2>Actividades Previas</h2>
            <div class="section-divider"></div>
        </div>

        <table class="two-col-table">
            <tr>
                <td>
                    <div class="code-block">
                        <div class="code-label">Comandos de Pre-Check</div>
                        <div class="code-line">show configuration</div>
                        <div class="code-line">show version detail</div>
                        <div class="code-line">show licence detail</div>
                        <div class="code-line">show switch detail</div>
                        <div class="code-line">show vlan</div>
                        <div class="code-line">show iproute</div>
                        <div class="code-line">show ports</div>
                    </div>
                </td>
                <td>
                    <div class="card">
                        <div class="card-title">Lista de Verificación Previa</div>
                        <ul class="corp-list">
                            <li>Creación de script de configuración</li>
                            <li>Validación de equipos nuevos</li>
                            <li>Inspección física del cableado</li>
                            <li>Registro fotográfico</li>
                            <li>Respaldo de configuración</li>
                        </ul>
                    </div>
                </td>
            </tr>
        </table>

        <div class="alert alert-warning">
            <span class="alert-icon">⚠</span>
            <div><strong>Atención:</strong> Si se detectan problemas físicos durante la inspección, notificar al
                responsable de área antes de iniciar la ventana de mantenimiento.</div>
        </div>

        <!-- 2. Cambio -->
        <div class="section-title">
            <div class="section-num">2</div>
            <h2>Actividades en el Cambio</h2>
            <div class="section-divider"></div>
        </div>

        <table style="width:100%;border-collapse:collapse;">
            <tr>
                <td style="width:20%;padding:4px;">
                    <div class="step-box">
                        <span class="step-letter">A</span>
                        <span class="step-label">Desconexión<br>de equipos</span>
                    </div>
                </td>
                <td style="width:20%;padding:4px;">
                    <div class="step-box">
                        <span class="step-letter">B</span>
                        <span class="step-label">Desmontaje<br>del equipo</span>
                    </div>
                </td>
                <td style="width:20%;padding:4px;">
                    <div class="step-box">
                        <span class="step-letter">C</span>
                        <span class="step-label">Instalación<br>en rack</span>
                    </div>
                </td>
                <td style="width:20%;padding:4px;">
                    <div class="step-box">
                        <span class="step-letter">D</span>
                        <span class="step-label">Conexión y<br>cableado</span>
                    </div>
                </td>
                <td style="width:20%;padding:4px;">
                    <div class="step-box">
                        <span class="step-letter">E</span>
                        <span class="step-label">Carga del<br>script</span>
                    </div>
                </td>
            </tr>
        </table>

        <div class="alert alert-info" style="margin-top:10px;">
            <span class="alert-icon">ℹ</span>
            <div><strong>Nota operativa:</strong> Confirmar que todos los LEDs se encuentren en estado operativo (color
                verde) antes de continuar con la etapa de verificación.</div>
        </div>

        <!-- 3. Verificación -->
        <div class="section-title">
            <div class="section-num">3</div>
            <h2>Verificación</h2>
            <div class="section-divider"></div>
        </div>

        <table class="verify-table">
            <tr>
                <th style="width:55%;">Prueba de Verificación</th>
                <th style="width:25%;">Tipo</th>
                <th style="width:20%;">Estado</th>
            </tr>
            <tr>
                <td>Ping a Gateway</td>
                <td>Conectividad de red</td>
                <td><span class="status-pill">✓ REQUERIDO</span></td>
            </tr>
            <tr>
                <td>Ping a Core</td>
                <td>Conectividad de red</td>
                <td><span class="status-pill">✓ REQUERIDO</span></td>
            </tr>
            <tr>
                <td>Ping a Servicios</td>
                <td>Validación de servicios</td>
                <td><span class="status-pill">✓ REQUERIDO</span></td>
            </tr>
            <tr>
                <td>Comparativa de Interfaces</td>
                <td>Análisis Antes / Después</td>
                <td><span class="status-pill">✓ REQUERIDO</span></td>
            </tr>
        </table>

        <!-- 4. Actividades Finales -->
        <div class="section-title">
            <div class="section-num">4</div>
            <h2>Actividades Finales</h2>
            <div class="section-divider"></div>
        </div>

        <div class="card">
            <div class="card-title">Cierre de Ventana</div>
            <ul class="corp-list">
                <li>Generación y almacenamiento del backup final de configuración</li>
                <li>Elaboración y entrega del reporte de implementación</li>
                <li>Confirmación formal del cierre de ventana de mantenimiento</li>
            </ul>
        </div>

        <!-- 5. Plan de Retorno -->
        <div class="section-title">
            <div class="section-num">5</div>
            <h2>Plan de Retorno (Rollback)</h2>
            <div class="section-divider"></div>
        </div>

        <div class="alert alert-danger">
            <span class="alert-icon">✕</span>
            <div><strong>Plan de contingencia:</strong> En caso de falla crítica durante la implementación, ejecutar el
                siguiente procedimiento de retorno de manera inmediata.</div>
        </div>

        <div class="card">
            <div class="card-title">Procedimiento de Rollback</div>
            <ul class="corp-list">
                <li>Retirar los equipos nuevos instalados en el rack</li>
                <li>Reinstalar el equipo original en su posición</li>
                <li>Reconectar el cableado según el registro fotográfico previo</li>
                <li>Validar conectividad completa antes de notificar resolución</li>
            </ul>
        </div>

        <!-- Aviso pie -->
        <div class="alert alert-footer" style="margin-top:18px;">
            <span class="alert-icon" style="color:#64748b;">🔒</span>
            <div>Documento interno generado desde la Intranet Corporativa — Uso exclusivo del personal autorizado.
                Prohibida su distribución externa.</div>
        </div>

    </div><!-- /body-wrap -->

    <!-- ══ FOOTER ══ -->
    <div class="doc-footer">
        Netjer · Infraestructura de Red · Documento: Checklist Switches v1.0 · {{ date('d/m/Y') }} · CONFIDENCIAL
    </div>

</body>

</html>
