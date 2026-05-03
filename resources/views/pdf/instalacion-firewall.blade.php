<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Guía Implementación Firewall</title>
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

        /* ── Grid previas (2 col) ── */
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

        /* ── Pasos del cambio ── */
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
            font-size: 9px;
            color: var(--gray);
            line-height: 1.4;
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

        .evidence-box img {
            max-width: 100%;
            border-radius: 2px;
        }

        .evidence-label {
            font-size: 9px;
            color: var(--gray);
            text-transform: uppercase;
            letter-spacing: 0.8px;
            margin-bottom: 8px;
            font-weight: bold;
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
                    <strong>Documento:</strong> Checklist Firewall<br>
                    <strong>Fecha:</strong> {{ date('d/m/Y') }}<br>
                    <strong>Versión:</strong> 1.0<br>
                    <strong>Clasificación:</strong> Confidencial
                </td>
            </tr>
        </table>
    </div>

    <!-- ══ TÍTULO ══ -->
    <div class="title-bar">
        <h1>Guía de Implementación de Firewall</h1>
        <p>Procedimiento para la instalación y configuración de seguridad perimetral,<br>
            asegurando control de tráfico, cumplimiento de políticas y continuidad operativa.</p>
        <span class="badge">IMPLEMENTACIÓN v1.0</span>
        <span class="badge-conf">CONFIDENCIAL</span>
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
                    <div class="card">
                        <div class="card-title">Análisis y Planificación</div>
                        <ul class="corp-list">
                            <li>Identificar necesidades de seguridad según topología</li>
                            <li>Definir tipo de firewall requerido</li>
                            <li>Establecer políticas de seguridad</li>
                            <li>Definir alta disponibilidad (si aplica)</li>
                        </ul>
                    </div>
                    <div class="card">
                        <div class="card-title">Pruebas en Laboratorio</div>
                        <ul class="corp-list">
                            <li>Simulación de configuración en entorno controlado</li>
                            <li>Validación de reglas y rendimiento</li>
                        </ul>
                    </div>
                </td>
                <td>
                    <div class="card">
                        <div class="card-title">Levantamiento de Información</div>
                        <ul class="corp-list">
                            <li>Inventario de dispositivos y servicios activos</li>
                            <li>Mapeo de red y flujos de tráfico</li>
                            <li>Identificación de puertos y protocolos en uso</li>
                        </ul>
                    </div>
                    <div class="card">
                        <div class="card-title">Planificación del Cambio</div>
                        <ul class="corp-list">
                            <li>Definir ventana de mantenimiento</li>
                            <li>Preparar plan de rollback</li>
                            <li>Notificar a equipos involucrados</li>
                        </ul>
                    </div>
                </td>
            </tr>
        </table>

        <!-- 2. Actividades en el Cambio -->
        <div class="section-title">
            <div class="section-num">2</div>
            <h2>Actividades en el Cambio</h2>
            <div class="section-divider"></div>
        </div>

        <table style="width:100%;border-collapse:collapse;">
            <tr>
                <td style="width:25%;padding:4px;">
                    <div class="step-box">
                        <span class="step-letter">A</span>
                        <span class="step-desc">Configuración</span>
                        <span class="step-detail">Instalación, interfaces,<br>NAT y reglas base</span>
                    </div>
                </td>
                <td style="width:25%;padding:4px;">
                    <div class="step-box">
                        <span class="step-letter">B</span>
                        <span class="step-desc">Reglas</span>
                        <span class="step-detail">Accesos, DNS, DHCP<br>y monitoreo</span>
                    </div>
                </td>
                <td style="width:25%;padding:4px;">
                    <div class="step-box">
                        <span class="step-letter">C</span>
                        <span class="step-desc">Monitoreo</span>
                        <span class="step-detail">Validación de tráfico<br>y servicios críticos</span>
                    </div>
                </td>
                <td style="width:25%;padding:4px;">
                    <div class="step-box">
                        <span class="step-letter">D</span>
                        <span class="step-desc">Comunicación</span>
                        <span class="step-detail">Coordinación con<br>equipos involucrados</span>
                    </div>
                </td>
            </tr>
        </table>

        <div class="alert alert-info" style="margin-top:10px;">
            <span class="alert-icon">ℹ</span>
            <div><strong>Nota operativa:</strong> Confirmar estado físico del equipo (LEDs y fuente de energía) antes de
                iniciar la configuración.</div>
        </div>

        <!-- 3. Verificación -->
        <div class="section-title">
            <div class="section-num">3</div>
            <h2>Verificación</h2>
            <div class="section-divider"></div>
        </div>

        <table class="verify-table">
            <tr>
                <th style="width:50%;">Prueba de Verificación</th>
                <th style="width:30%;">Alcance</th>
                <th style="width:20%;">Estado</th>
            </tr>
            <tr>
                <td>Accesos internos</td>
                <td>Red LAN</td>
                <td><span class="status-pill">✓ REQUERIDO</span></td>
            </tr>
            <tr>
                <td>Accesos externos</td>
                <td>Red WAN / Internet</td>
                <td><span class="status-pill">✓ REQUERIDO</span></td>
            </tr>
            <tr>
                <td>Comunicación entre zonas</td>
                <td>LAN / WAN / DMZ</td>
                <td><span class="status-pill">✓ REQUERIDO</span></td>
            </tr>
            <tr>
                <td>Validación de reglas de seguridad</td>
                <td>Políticas definidas</td>
                <td><span class="status-pill">✓ REQUERIDO</span></td>
            </tr>
            <tr>
                <td>Monitoreo de logs y rendimiento</td>
                <td>Sistema de monitoreo</td>
                <td><span class="status-pill">✓ REQUERIDO</span></td>
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
                            <li>Backup de configuración final del equipo</li>
                            <li>Elaboración y entrega de reporte de implementación</li>
                            <li>Confirmación formal del cierre de ventana</li>
                        </ul>
                    </div>
                </td>
                <td>
                    <div class="evidence-box">
                        <div class="evidence-label">Evidencia fotográfica</div>
                        <img src="{{ public_path('assets/media/instalacion-firewall.png') }}"
                            alt="Instalación Firewall">
                    </div>
                </td>
            </tr>
        </table>

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
                <li>Retirar el equipo nuevo instalado</li>
                <li>Reinstalar el equipo original en su posición</li>
                <li>Reconectar los enlaces según documentación previa</li>
                <li>Validar conectividad completa antes de notificar resolución</li>
            </ul>
        </div>

        <div class="alert alert-footer" style="margin-top:18px;">
            <span class="alert-icon" style="color:#64748b;">🔒</span>
            <div>Documento interno generado desde la Intranet Corporativa — Uso exclusivo del personal autorizado.
                Prohibida su distribución externa.</div>
        </div>

    </div>

    <!-- ══ FOOTER ══ -->
    <div class="doc-footer">
        Netjer · Infraestructura de Red · Documento: Checklist Firewall v1.0 · {{ date('d/m/Y') }} · CONFIDENCIAL
    </div>

</body>

</html>
