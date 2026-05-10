<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Guía Implementación Access Points</title>
    <style>
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
            --amber-bg: #fffbeb;
            --surface: #f7f9fc;
            --white: #ffffff;
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
        }

        .doc-header table {
            width: 100%;
        }

        .doc-header .brand {
            font-size: 18px;
            font-weight: bold;
            letter-spacing: 2px;
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

        /* ── TÍTULO ── */
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

        .badge {
            display: inline-block;
            background: var(--accent);
            color: #ffffff;
            padding: 3px 10px;
            font-size: 9px;
            font-weight: bold;
            letter-spacing: 1px;
            border-radius: 2px;
            margin-right: 6px;
            margin-top: 8px;
        }

        .badge-conf {
            display: inline-block;
            background: transparent;
            border: 1px solid #aac8e8;
            color: #cde0f5;
            padding: 3px 10px;
            font-size: 9px;
            letter-spacing: 1px;
            border-radius: 2px;
            margin-top: 8px;
        }

        /* ── CUERPO ── */
        .body-wrap {
            padding: 20px 28px 24px;
        }

        /* ── Secciones ── */
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

        .section-num-warn {
            background: #ea580c;
        }

        .section-title h2 {
            font-size: 13px;
            font-weight: bold;
            color: var(--navy);
            letter-spacing: 0.4px;
        }

        .section-divider {
            flex: 1;
            height: 1px;
            background: var(--border);
            margin-left: 6px;
        }

        /* ── Cards ── */
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

        /* ── Cards consideraciones (naranja) ── */
        .card-warn {
            background: var(--orange-bg);
            border: 1px solid #fdba74;
            border-left: 3px solid #f97316;
            border-radius: 3px;
            padding: 10px 14px;
            margin-bottom: 8px;
        }

        .card-warn .card-title {
            color: var(--orange);
        }

        .card-warn p {
            font-size: 10px;
            color: #7c2d12;
            line-height: 1.5;
            margin-top: 2px;
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
            line-height: 1.5;
        }

        .corp-list li:last-child {
            border-bottom: none;
        }

        .corp-list li::before {
            content: "▸";
            color: var(--accent);
            font-size: 10px;
            flex-shrink: 0;
            margin-top: 2px;
        }

        /* sub-nota dentro de item */
        .sub-note {
            margin-top: 5px;
            margin-left: 18px;
            background: var(--amber-bg);
            border-left: 3px solid #f59e0b;
            padding: 5px 10px;
            font-size: 9.5px;
            color: #78350f;
            border-radius: 0 2px 2px 0;
            line-height: 1.4;
        }

        /* ── Pasos del cambio (grid 5 col) ── */
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

        .step-desc {
            font-size: 9.5px;
            color: var(--navy);
            font-weight: bold;
            display: block;
            margin-bottom: 3px;
        }

        .step-detail {
            font-size: 8.5px;
            color: #94a3b8;
            line-height: 1.3;
        }

        /* ── Tabla verificación ── */
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

        .status-pill-amber {
            background: var(--amber-bg);
            color: #92400e;
            font-size: 8.5px;
            font-weight: bold;
            padding: 2px 8px;
            border-radius: 10px;
            border: 1px solid #fcd34d;
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

        .alert-footer {
            background: #f1f5f9;
            border: 1px solid var(--border);
            border-left: 4px solid var(--gray);
            color: var(--gray);
        }

        /* ── Two-col ── */
        .two-col-table {
            width: 100%;
            border-collapse: collapse;
        }

        .two-col-table td {
            width: 50%;
            vertical-align: top;
            padding: 0 5px 0 0;
        }

        .two-col-table td:last-child {
            padding-right: 0;
            padding-left: 5px;
        }

        /* ── Evidencia ── */
        .evidence-box {
            border: 1px solid var(--border);
            border-top: 3px solid var(--accent);
            border-radius: 3px;
            padding: 12px 14px;
            background: var(--surface);
            text-align: center;
            margin-bottom: 10px;
        }

        .evidence-label {
            font-size: 9px;
            color: var(--gray);
            text-transform: uppercase;
            letter-spacing: 0.8px;
            margin-bottom: 8px;
            font-weight: bold;
        }

        .evidence-box img {
            max-width: 100%;
            border-radius: 2px;
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
                    {{-- <img src="{{ public_path('assets/media/logo-netjer.png') }}" style="height:42px;"> --}}
                    <div class="brand">NET<span>JER</span></div>
                </td>
                <td style="width:40%;" class="meta">
                    <strong>Documento:</strong> Checklist Access Points<br>
                    <strong>Fecha:</strong> {{ date('d/m/Y') }}<br>
                    <strong>Versión:</strong> 1.0<br>
                    <strong>Clasificación:</strong> Confidencial
                </td>
            </tr>
        </table>
    </div>

    <!-- ══ TÍTULO ══ -->
    <div class="title-bar">
        <h1>Guía de Implementación de Access Points</h1>
        <p>Procedimiento para la instalación y configuración de APs, asegurando cobertura,<br>
            conectividad y cumplimiento de estándares corporativos.</p>
        <span class="badge">IMPLEMENTACIÓN v1.0</span>
        <span class="badge-conf">CONFIDENCIAL</span>
    </div>

    <!-- ══ CUERPO ══ -->
    <div class="body-wrap">

        <!-- Consideraciones Iniciales -->
        <div class="section-title">
            <div class="section-num section-num-warn">!</div>
            <h2>Consideraciones Iniciales</h2>
            <div class="section-divider"></div>
        </div>

        <div class="card-warn">
            <div class="card-title">Cuestionario Site Survey</div>
            <p>Utilizar el cuestionario como base para una correcta ejecución de la implementación.
                Considerar si el sitio cuenta o no con infraestructura WiFi previa.</p>
        </div>

        <table style="width:100%;border-collapse:collapse;">
            <tr>
                <td style="width:50%;padding:0 5px 0 0;vertical-align:top;">
                    <div class="card-warn">
                        <div class="card-title">Cableado</div>
                        <p>Validar tiempos, rutas y responsables de la instalación del cableado estructurado.</p>
                    </div>
                </td>
                <td style="width:50%;padding:0 0 0 5px;vertical-align:top;">
                    <div class="card-warn">
                        <div class="card-title">Configuraciones en Equipos Intermedios</div>
                        <p>Coordinar con el personal que administra la infraestructura los ajustes necesarios en
                            switches, firewall, etc.</p>
                    </div>
                </td>
            </tr>
        </table>

        <!-- 1. Actividades Previas -->
        <div class="section-title">
            <div class="section-num">1</div>
            <h2>Actividades Previas</h2>
            <div class="section-divider"></div>
        </div>

        <div class="card">
            <div class="card-title">Lista de Verificación Previa</div>
            <ul class="corp-list">
                <li>Validación de los nodos de red donde se instalarán las antenas</li>
                <li>Ajustes o configuraciones en la infraestructura del cliente (switches, firewall, etc.)</li>
                <li>Acceso y configuración de la controladora WiFi (SSIDs, seguridad, puertos, VLANs, etc.)</li>
                <li>
                    <div style="width:100%;">
                        Revisión del equipamiento necesario para la instalación
                        <div class="sub-note">
                            ⚠ Revisión previa a la entrega de los insumos requeridos (bases, accesorios, etc.)
                        </div>
                    </div>
                </li>
                <li>
                    <div style="width:100%;">
                        Inspección visual de las ubicaciones donde se colocarán las antenas
                        <div class="sub-note">
                            ⚠ Deben estar en las posiciones determinadas en el estudio del Site Survey
                        </div>
                    </div>
                </li>
            </ul>
        </div>

        <!-- 2. Actividades en el Cambio -->
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
                        <span class="step-desc">Soporte</span>
                        <span class="step-detail">Instalación del soporte en la ubicación definida</span>
                    </div>
                </td>
                <td style="width:20%;padding:4px;">
                    <div class="step-box">
                        <span class="step-letter">B</span>
                        <span class="step-desc">Montaje</span>
                        <span class="step-detail">Aseguramiento del AP y conexión con cable de red</span>
                    </div>
                </td>
                <td style="width:20%;padding:4px;">
                    <div class="step-box">
                        <span class="step-letter">C</span>
                        <span class="step-desc">Switch</span>
                        <span class="step-detail">Conexión al nodo del puerto asignado en el switch</span>
                    </div>
                </td>
                <td style="width:20%;padding:4px;">
                    <div class="step-box">
                        <span class="step-letter">D</span>
                        <span class="step-desc">PoE</span>
                        <span class="step-detail">Validación de entrega de PoE hacia la antena</span>
                    </div>
                </td>
                <td style="width:20%;padding:4px;">
                    <div class="step-box">
                        <span class="step-letter">E</span>
                        <span class="step-desc">Operatividad</span>
                        <span class="step-detail">Emisión de los SSIDs correspondientes</span>
                    </div>
                </td>
            </tr>
        </table>

        <!-- 3. Verificación -->
        <div class="section-title">
            <div class="section-num">3</div>
            <h2>Verificación de Operatividad</h2>
            <div class="section-divider"></div>
        </div>

        <table class="verify-table">
            <tr>
                <th style="width:40%;">Prueba de Verificación</th>
                <th style="width:35%;">Alcance</th>
                <th style="width:25%;">Estado</th>
            </tr>
            <tr>
                <td>Emisión correcta de SSIDs</td>
                <td>Operatividad de la antena</td>
                <td><span class="status-pill">✓ REQUERIDO</span></td>
            </tr>
            <tr>
                <td>Asignación de IP correcta</td>
                <td>Direccionamiento DHCP</td>
                <td><span class="status-pill">✓ REQUERIDO</span></td>
            </tr>
            <tr>
                <td>Acceso a red interna (LAN)</td>
                <td>Servidores, NAS, impresión</td>
                <td><span class="status-pill">✓ REQUERIDO</span></td>
            </tr>
            <tr>
                <td>Acceso a internet (WAN)</td>
                <td>Conectividad externa</td>
                <td><span class="status-pill">✓ REQUERIDO</span></td>
            </tr>
            <tr>
                <td>Ajustes de configuración</td>
                <td>En caso de ser necesario</td>
                <td><span class="status-pill-amber">⚙ SI SE REQUIERE</span></td>
            </tr>
        </table>

        <!-- 4. Actividades Finales -->
        <div class="section-title">
            <div class="section-num">4</div>
            <h2>Actividades Finales</h2>
            <div class="section-divider"></div>
        </div>

        <table class="two-col-table">
            <tr>
                <td>
                    <div class="card">
                        <div class="card-title">Cierre de Ventana</div>
                        <ul class="corp-list">
                            <li>Backup de la configuración de la controladora WiFi</li>
                            <li>Entrega y firma del reporte de actividades</li>
                            <li>Notificación del cierre formal de la ventana</li>
                        </ul>
                    </div>
                </td>
                <td>
                    <div class="evidence-box">
                        <div class="evidence-label">Evidencia Fotográfica — APs Instalados</div>
                        <img src="{{ public_path('assets/media/instalacion-aps.png') }}"
                            alt="Instalación Access Points">
                    </div>
                </td>
            </tr>
        </table>

        <div class="alert alert-footer" style="margin-top:18px;">
            <span class="alert-icon" style="color:#64748b;">🔒</span>
            <div>Documento interno generado desde la Intranet Corporativa — Uso exclusivo del personal autorizado.
                Prohibida su distribución externa.</div>
        </div>

    </div>

    <!-- ══ FOOTER ══ -->
    <div class="doc-footer">
        Netjer · Infraestructura de Red · Documento: Checklist Access Points v1.0 · {{ date('d/m/Y') }} · CONFIDENCIAL
    </div>

</body>

</html>
