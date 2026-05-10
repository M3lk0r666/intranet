<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Guía Mantenimiento Correctivo</title>
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

        .intro {
            font-size: 10.5px;
            color: #475569;
            line-height: 1.6;
            margin-bottom: 6px;
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

        /* ── Sub-sección ── */
        .subsection-title {
            font-size: 11.5px;
            font-weight: bold;
            color: var(--blue);
            margin: 14px 0 6px;
            padding-left: 8px;
            border-left: 3px solid var(--accent);
            text-transform: uppercase;
            letter-spacing: 0.5px;
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

        /* ── Tarjeta categoría (Hardware/Software) ── */
        .cat-card {
            background: var(--surface);
            border: 1px solid var(--border);
            border-top: 3px solid var(--blue);
            border-radius: 3px;
            padding: 10px 12px;
            margin-bottom: 10px;
        }

        .cat-card .cat-title {
            font-size: 10.5px;
            font-weight: bold;
            color: var(--navy);
            text-transform: uppercase;
            letter-spacing: 0.5px;
            margin-bottom: 8px;
            padding-bottom: 5px;
            border-bottom: 1px solid var(--border);
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

        /* ── Evidencia fotográfica ── */
        .evidence-card {
            background: var(--surface);
            border: 1px solid var(--border);
            border-left: 3px solid var(--accent);
            border-radius: 3px;
            padding: 12px 14px;
            margin-bottom: 10px;
        }

        .evidence-card img {
            max-width: 230px;
            height: auto;
            border: 1px solid var(--border);
            border-radius: 2px;
        }

        .evidence-label {
            font-size: 9px;
            color: var(--gray);
            text-transform: uppercase;
            letter-spacing: 1px;
            margin-top: 4px;
            display: block;
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
                    <strong>Documento:</strong> Guía Mantenimiento Correctivo<br>
                    <strong>Fecha:</strong> {{ date('d/m/Y') }}<br>
                    <strong>Versión:</strong> 1.0<br>
                    <strong>Clasificación:</strong> Confidencial
                </td>
            </tr>
        </table>
    </div>

    <!-- ══ TÍTULO ══ -->
    <div class="title-bar">
        <h1>Guía de Mantenimiento Correctivo</h1>
        <p>Procedimiento estandarizado para el diagnóstico, atención y resolución de fallas<br>
            en equipos de red, asegurando continuidad operativa y cumplimiento de SLA.</p>
        <div class="badge-row">
            <span class="badge">IMPLEMENTACIÓN v1.0</span>
            <span class="badge-conf">CONFIDENCIAL</span>
        </div>
    </div>

    <!-- ══ CUERPO ══ -->
    <div class="body-wrap">

        <p class="intro">
            Esta guía describe el procedimiento para la atención de incidentes que afectan el
            funcionamiento de equipos de red, desde el diagnóstico inicial hasta el restablecimiento
            del servicio y la documentación final del caso.
        </p>

        <!-- Consideraciones -->
        <div class="section-title">
            <div class="section-num">!</div>
            <h2>Consideraciones Iniciales</h2>
            <div class="section-divider"></div>
        </div>

        <div class="alert alert-danger">
            <span class="alert-icon">✕</span>
            <div><strong>Importante:</strong> Validar si los equipos cuentan con garantía vigente. Esto determinará si
                procede una reparación interna, RMA o reemplazo directo del fabricante.</div>
        </div>

        <!-- 1. Actividades Previas -->
        <div class="section-title">
            <div class="section-num">1</div>
            <h2>Actividades Previas</h2>
            <div class="section-divider"></div>
        </div>

        <div class="card">
            <div class="card-title">Diagnóstico Inicial</div>
            <ul class="corp-list">
                <li>Análisis inicial (remoto o presencial)</li>
                <li>Recabar información del cliente (ticket)</li>
                <li>Inspección física del equipo</li>
            </ul>
        </div>

        <!-- Detección del Fallo -->
        <div class="subsection-title">Detección del Fallo</div>

        <table class="two-col-table">
            <tr>
                <td>
                    <div class="cat-card">
                        <div class="cat-title">Hardware</div>
                        <ul class="corp-list">
                            <li>Identificar daño físico o externo</li>
                            <li>Probar fuentes de energía</li>
                        </ul>
                    </div>
                </td>
                <td>
                    <div class="cat-card">
                        <div class="cat-title">Software</div>
                        <ul class="corp-list">
                            <li>Revisión de configuración</li>
                            <li>Validación de logs</li>
                            <li>Pruebas de conectividad</li>
                        </ul>
                    </div>
                </td>
            </tr>
        </table>

        <!-- Confirmación del Fallo -->
        <div class="subsection-title">Confirmación del Fallo</div>

        <table class="two-col-table">
            <tr>
                <td>
                    <div class="cat-card">
                        <div class="cat-title">Hardware</div>
                        <ul class="corp-list">
                            <li>Validar garantía</li>
                            <li>Determinar reparación o reemplazo</li>
                            <li>Levantar RMA</li>
                        </ul>
                    </div>
                </td>
                <td>
                    <div class="cat-card">
                        <div class="cat-title">Software</div>
                        <ul class="corp-list">
                            <li>Validar si es problema conocido</li>
                            <li>Ejecutar pruebas específicas</li>
                            <li>Ajustes de configuración</li>
                            <li>Actualización de firmware</li>
                        </ul>
                    </div>
                </td>
            </tr>
        </table>

        <!-- Próximos Pasos -->
        <div class="subsection-title">Próximos Pasos</div>

        <table class="two-col-table">
            <tr>
                <td>
                    <div class="cat-card">
                        <div class="cat-title">Registro</div>
                        <ul class="corp-list">
                            <li>Documentar diagnóstico</li>
                            <li>Recabar datos del equipo</li>
                            <li>Levantar RMA</li>
                        </ul>
                    </div>
                </td>
                <td>
                    <div class="cat-card">
                        <div class="cat-title">Recepción</div>
                        <ul class="corp-list">
                            <li>Validar equipo entregado</li>
                            <li>Entrega al cliente</li>
                        </ul>
                    </div>
                </td>
            </tr>
        </table>

        <div class="alert alert-info">
            <span class="alert-icon">ℹ</span>
            <div><strong>Nota operativa:</strong> Documentar cada hallazgo durante el diagnóstico para alimentar la base
                de conocimiento y agilizar la atención de incidentes recurrentes.</div>
        </div>

        <!-- 2. Verificación de Operatividad -->
        <div class="section-title">
            <div class="section-num">2</div>
            <h2>Verificación de Operatividad</h2>
            <div class="section-divider"></div>
        </div>

        <table class="verify-table">
            <tr>
                <th style="width:65%;">Prueba de Verificación</th>
                <th style="width:35%;">Estado</th>
            </tr>
            <tr>
                <td>Instalación en rack</td>
                <td><span class="status-pill">✓ REQUERIDO</span></td>
            </tr>
            <tr>
                <td>Carga de configuración</td>
                <td><span class="status-pill">✓ REQUERIDO</span></td>
            </tr>
            <tr>
                <td>Ping a servicios</td>
                <td><span class="status-pill">✓ REQUERIDO</span></td>
            </tr>
            <tr>
                <td>Validación por cliente</td>
                <td><span class="status-pill">✓ REQUERIDO</span></td>
            </tr>
            <tr>
                <td>Ajustes de configuración</td>
                <td><span class="status-pill">✓ REQUERIDO</span></td>
            </tr>
        </table>

        <!-- 3. Actividades Finales -->
        <div class="section-title">
            <div class="section-num">3</div>
            <h2>Actividades Finales</h2>
            <div class="section-divider"></div>
        </div>

        <div class="evidence-card">
            <div class="card-title">Evidencia Fotográfica</div>
            <table style="width:100%;">
                <tr>
                    <td style="width:50%; padding-right:6px; text-align:center;">
                        <img src="{{ public_path('storage/media/switch-antes.png') }}">
                        <span class="evidence-label">Estado: Antes</span>
                    </td>
                    <td style="width:50%; padding-left:6px; text-align:center;">
                        <img src="{{ public_path('storage/media/switch-despues.png') }}">
                        <span class="evidence-label">Estado: Después</span>
                    </td>
                </tr>
            </table>
        </div>

        <div class="card">
            <div class="card-title">Cierre del Incidente</div>
            <ul class="corp-list">
                <li>Generación y almacenamiento del backup final</li>
                <li>Entrega y firma del reporte de servicio</li>
                <li>Confirmación formal del cierre de ventana de mantenimiento</li>
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
        Netjer · Infraestructura de Red · Documento: Mantenimiento Correctivo v1.0 · {{ date('d/m/Y') }} · CONFIDENCIAL
    </div>

</body>

</html>
