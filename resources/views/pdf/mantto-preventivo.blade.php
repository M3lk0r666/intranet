<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Guía Mantenimiento Preventivo</title>
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

        /* ── Comparativa ── */
        .compare-card {
            background: var(--surface);
            border: 1px solid var(--border);
            border-top: 3px solid var(--blue);
            border-radius: 3px;
            padding: 10px 12px;
        }

        .compare-card .compare-title {
            font-size: 10px;
            font-weight: bold;
            color: var(--navy);
            text-transform: uppercase;
            letter-spacing: 1px;
            margin-bottom: 8px;
            border-bottom: 1px solid var(--border);
            padding-bottom: 5px;
        }

        .compare-line {
            font-family: "Courier New", Courier, monospace;
            font-size: 10px;
            color: #334155;
            padding: 3px 0;
        }

        .iface-up {
            color: var(--green);
            font-weight: bold;
        }

        .iface-down {
            color: var(--red);
            font-weight: bold;
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
                    <strong>Documento:</strong> Guía Mantenimiento Preventivo<br>
                    <strong>Fecha:</strong> {{ date('d/m/Y') }}<br>
                    <strong>Versión:</strong> 1.0<br>
                    <strong>Clasificación:</strong> Confidencial
                </td>
            </tr>
        </table>
    </div>

    <!-- ══ TÍTULO ══ -->
    <div class="title-bar">
        <h1>Guía de Mantenimiento Preventivo</h1>
        <p>Procedimiento estandarizado para la ejecución de mantenimiento preventivo en equipos<br>
            de red, asegurando continuidad operativa y cumplimiento de estándares corporativos.</p>
        <div class="badge-row">
            <span class="badge">IMPLEMENTACIÓN v1.0</span>
            <span class="badge-conf">CONFIDENCIAL</span>
        </div>
    </div>

    <!-- ══ CUERPO ══ -->
    <div class="body-wrap">

        <p class="intro">
            Esta guía describe las actividades necesarias para la ejecución de mantenimiento preventivo
            en equipos de red, garantizando su correcta operación, prolongando su vida útil y
            minimizando riesgos de falla en producción.
        </p>

        <!-- Consideraciones -->
        <div class="section-title">
            <div class="section-num">!</div>
            <h2>Consideraciones Iniciales</h2>
            <div class="section-divider"></div>
        </div>

        <div class="alert alert-danger">
            <span class="alert-icon">✕</span>
            <div><strong>Importante:</strong> Validar si los equipos cuentan con garantía vigente antes de cualquier
                intervención. La manipulación indebida puede invalidar la garantía del fabricante.</div>
        </div>

        <!-- 1. Actividades Previas -->
        <div class="section-title">
            <div class="section-num">1</div>
            <h2>Actividades Previas</h2>
            <div class="section-divider"></div>
        </div>

        <div class="card">
            <div class="card-title">Lista de Verificación Previa</div>
            <ul class="corp-list">
                <li>Solicitar credenciales de acceso</li>
                <li>Acceder al dispositivo</li>
                <li>Guardar configuración</li>
                <li>Pruebas de comunicación (Core, Internet)</li>
                <li>Estado de interfaces</li>
                <li>Validar stack (si aplica)</li>
                <li>Backup de configuración [antes]</li>
            </ul>
        </div>

        <!-- 2. Limpieza Física -->
        <div class="section-title">
            <div class="section-num">2</div>
            <h2>Limpieza Física</h2>
            <div class="section-divider"></div>
        </div>

        <div class="card">
            <div class="card-title">Inspección y Preparación</div>
            <ul class="corp-list">
                <li>Revisión de cableado</li>
                <li>Validación de LEDs</li>
                <li>Desconexión eléctrica y de datos</li>
            </ul>
        </div>

        <div class="alert alert-info">
            <span class="alert-icon">ℹ</span>
            <div><strong>Nota operativa:</strong> Retirar equipo solo si el cliente lo solicita y está correctamente
                etiquetado para su trazabilidad.</div>
        </div>

        <div class="card">
            <div class="card-title">Limpieza del Equipo</div>
            <ul class="corp-list">
                <li>Limpieza de polvo y ventilación</li>
            </ul>
        </div>

        <div class="alert alert-warning">
            <span class="alert-icon">⚠</span>
            <div><strong>Atención:</strong> Evitar desarmar el equipo, ya que puede invalidar la garantía del
                fabricante.</div>
        </div>

        <!-- 3. Verificación de Operatividad -->
        <div class="section-title">
            <div class="section-num">3</div>
            <h2>Verificación de Operatividad</h2>
            <div class="section-divider"></div>
        </div>

        <table class="verify-table">
            <tr>
                <th style="width:65%;">Prueba de Verificación</th>
                <th style="width:35%;">Estado</th>
            </tr>
            <tr>
                <td>Energizado del dispositivo</td>
                <td><span class="status-pill">✓ REQUERIDO</span></td>
            </tr>
            <tr>
                <td>Validación de configuraciones</td>
                <td><span class="status-pill">✓ REQUERIDO</span></td>
            </tr>
            <tr>
                <td>Ping a servicios</td>
                <td><span class="status-pill">✓ REQUERIDO</span></td>
            </tr>
            <tr>
                <td>Validación por cliente (servicios operativos)</td>
                <td><span class="status-pill">✓ REQUERIDO</span></td>
            </tr>
        </table>

        <div class="card-title" style="margin: 14px 0 8px;">Comparativa de Interfaces</div>

        <table class="two-col-table">
            <tr>
                <td>
                    <div class="compare-card">
                        <div class="compare-title">Antes</div>
                        <div class="compare-line">Gi1/0/1 → <span class="iface-up">UP/UP</span></div>
                        <div class="compare-line">Gi1/0/2 → <span class="iface-up">UP/UP</span></div>
                        <div class="compare-line">Gi1/0/3 → <span class="iface-down">DOWN/DOWN</span></div>
                    </div>
                </td>
                <td>
                    <div class="compare-card">
                        <div class="compare-title">Después</div>
                        <div class="compare-line">Gi1/0/1 → <span class="iface-up">UP/UP</span></div>
                        <div class="compare-line">Gi1/0/2 → <span class="iface-down">UP/DOWN</span></div>
                        <div class="compare-line">Gi1/0/3 → <span class="iface-down">DOWN/DOWN</span></div>
                    </div>
                </td>
            </tr>
        </table>

        <div class="card" style="margin-top:10px;">
            <div class="card-title">Actualización de Firmware</div>
            <ul class="corp-list">
                <li>Validar versión de firmware actual</li>
                <li>Actualizar si es necesario según política del fabricante</li>
            </ul>
        </div>

        <!-- 4. Actividades Finales -->
        <div class="section-title">
            <div class="section-num">4</div>
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
            <div class="card-title">Cierre de Ventana</div>
            <ul class="corp-list">
                <li>Generación y almacenamiento del backup final</li>
                <li>Entrega y firma del reporte</li>
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
        Netjer · Infraestructura de Red · Documento: Mantenimiento Preventivo v1.0 · {{ date('d/m/Y') }} · CONFIDENCIAL
    </div>

</body>

</html>
