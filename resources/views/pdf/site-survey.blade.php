<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Guía Site Survey</title>
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

        /* ── Pasos / fases ── */
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

        /* ── Pasos descriptivos en línea ── */
        .step-row-card {
            background: var(--surface);
            border: 1px solid var(--border);
            border-left: 3px solid var(--blue);
            border-radius: 3px;
            padding: 10px 14px;
            margin-bottom: 8px;
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .step-row-card .step-num {
            background: var(--blue);
            color: #ffffff;
            font-size: 10px;
            font-weight: bold;
            width: 22px;
            height: 22px;
            border-radius: 50%;
            text-align: center;
            line-height: 22px;
            flex-shrink: 0;
        }

        .step-row-card .step-text {
            font-size: 10.5px;
            color: #334155;
            line-height: 1.4;
        }

        .step-row-card .step-text strong {
            color: var(--navy);
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
                    <strong>Documento:</strong> Guía Site Survey<br>
                    <strong>Fecha:</strong> {{ date('d/m/Y') }}<br>
                    <strong>Versión:</strong> 1.0<br>
                    <strong>Clasificación:</strong> Confidencial
                </td>
            </tr>
        </table>
    </div>

    <!-- ══ TÍTULO ══ -->
    <div class="title-bar">
        <h1>Guía de Site Survey</h1>
        <p>Procedimiento detallado para la realización del Site Survey, permitiendo analizar el<br>
            comportamiento de la red inalámbrica y asegurar el cumplimiento de estándares.</p>
        <div class="badge-row">
            <span class="badge">IMPLEMENTACIÓN v1.0</span>
            <span class="badge-conf">CONFIDENCIAL</span>
        </div>
    </div>

    <!-- ══ CUERPO ══ -->
    <div class="body-wrap">

        <p class="intro">
            Esta guía describe el procedimiento estandarizado para la ejecución de un Site Survey
            inalámbrico, contemplando la planificación, recolección de mediciones, análisis de
            cobertura y entrega de resultados al cliente.
        </p>

        <!-- Consideraciones Importantes -->
        <div class="section-title">
            <div class="section-num">!</div>
            <h2>Consideraciones Importantes</h2>
            <div class="section-divider"></div>
        </div>

        <div class="alert alert-danger">
            <span class="alert-icon">✕</span>
            <div><strong>Mapa Arquitectónico:</strong> Es indispensable contar con el plano del área, ya que permite
                dimensionar correctamente la cobertura mediante herramientas como Ekahau.</div>
        </div>

        <div class="alert alert-warning">
            <span class="alert-icon">⚠</span>
            <div><strong>Cuestionario Site Survey:</strong> Utilizar el cuestionario base estandarizado para asegurar
                una
                correcta ejecución del levantamiento y trazabilidad de la información.</div>
        </div>

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
                        <div class="card-title">Información del Proyecto</div>
                        <ul class="corp-list">
                            <li>Objetivo del Site Survey</li>
                            <li>Problemas actuales</li>
                            <li>Aplicaciones críticas</li>
                            <li>Tipo de cobertura requerida</li>
                        </ul>
                    </div>
                </td>
                <td>
                    <div class="card">
                        <div class="card-title">Usuarios y Dispositivos</div>
                        <ul class="corp-list">
                            <li>Usuarios concurrentes</li>
                            <li>Dispositivos conectados</li>
                            <li>Tipos de dispositivos</li>
                            <li>Dispositivo más limitado</li>
                        </ul>
                    </div>
                </td>
            </tr>
        </table>

        <!-- 2. Preparación del Equipamiento -->
        <div class="section-title">
            <div class="section-num">2</div>
            <h2>Preparación del Equipamiento</h2>
            <div class="section-divider"></div>
        </div>

        <div class="card">
            <div class="card-title">Checklist de Equipamiento</div>
            <ul class="corp-list">
                <li>AP de prueba configurado</li>
                <li>Ekahau listo</li>
                <li>Tablet / Laptop cargada</li>
                <li>Baterías al 100%</li>
                <li>Herramientas de medición</li>
            </ul>
        </div>

        <!-- 3. Ejecución del Site Survey -->
        <div class="section-title">
            <div class="section-num">3</div>
            <h2>Ejecución del Site Survey</h2>
            <div class="section-divider"></div>
        </div>

        <table style="width:100%;border-collapse:collapse;">
            <tr>
                <td style="width:33.33%;padding:4px;">
                    <div class="step-box">
                        <span class="step-letter">A</span>
                        <span class="step-label">Inicio<br>Validación con cliente<br>y acceso a áreas</span>
                    </div>
                </td>
                <td style="width:33.33%;padding:4px;">
                    <div class="step-box">
                        <span class="step-letter">B</span>
                        <span class="step-label">Recorrido<br>Medición de señal<br>(RSSI / SNR)</span>
                    </div>
                </td>
                <td style="width:33.33%;padding:4px;">
                    <div class="step-box">
                        <span class="step-letter">C</span>
                        <span class="step-label">Interferencias<br>Identificación de ruido<br>y redes externas</span>
                    </div>
                </td>
            </tr>
        </table>

        <div class="alert alert-warning" style="margin-top:10px;">
            <span class="alert-icon">⚠</span>
            <div><strong>Atención:</strong> Registrar todas las métricas durante el recorrido — RSSI, SNR, ruido e
                interferencias — para alimentar el análisis posterior.</div>
        </div>

        <!-- 4. Análisis y Validación -->
        <div class="section-title">
            <div class="section-num">4</div>
            <h2>Análisis y Validación</h2>
            <div class="section-divider"></div>
        </div>

        <table class="verify-table">
            <tr>
                <th style="width:45%;">Parámetro</th>
                <th style="width:30%;">Umbral Mínimo</th>
                <th style="width:25%;">Estado</th>
            </tr>
            <tr>
                <td>RSSI (Indicador de señal recibida)</td>
                <td><strong>≥ -65 dBm</strong></td>
                <td><span class="status-pill">✓ REQUERIDO</span></td>
            </tr>
            <tr>
                <td>SNR (Relación señal/ruido)</td>
                <td><strong>≥ 25 dB</strong></td>
                <td><span class="status-pill">✓ REQUERIDO</span></td>
            </tr>
        </table>

        <div class="alert alert-info">
            <span class="alert-icon">ℹ</span>
            <div><strong>Nota técnica:</strong> Los umbrales indicados son referencias estándar para cobertura general.
                Aplicaciones críticas (voz, video, RFID) pueden requerir valores más estrictos.</div>
        </div>

        <!-- 5. Actividades Finales -->
        <div class="section-title">
            <div class="section-num">5</div>
            <h2>Actividades Finales</h2>
            <div class="section-divider"></div>
        </div>

        <div class="card">
            <div class="card-title">Cierre del Levantamiento</div>
            <ul class="corp-list">
                <li>Generación de reporte</li>
                <li>Entrega de resultados</li>
                <li>Validación con cliente</li>
            </ul>
        </div>

        <!-- 6. Plan de Retorno -->
        <div class="section-title">
            <div class="section-num">6</div>
            <h2>Plan de Retorno (Rollback)</h2>
            <div class="section-divider"></div>
        </div>

        <div class="alert alert-danger">
            <span class="alert-icon">✕</span>
            <div><strong>Plan de contingencia:</strong> En caso de afectación a la red operativa durante el Site Survey,
                ejecutar el siguiente procedimiento de retorno de manera inmediata.</div>
        </div>

        <div class="card">
            <div class="card-title">Procedimiento de Rollback</div>
            <ul class="corp-list">
                <li>Retiro de equipos temporales</li>
                <li>Restaurar configuración original</li>
                <li>Validar red original operativa</li>
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
        Netjer · Infraestructura de Red · Documento: Guía Site Survey v1.0 · {{ date('d/m/Y') }} · CONFIDENCIAL
    </div>

</body>

</html>
