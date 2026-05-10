<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Guía Prueba de Concepto</title>
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

        .alert-success {
            background: var(--green-bg);
            border: 1px solid #86efac;
            border-left: 4px solid var(--green);
            color: #166534;
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
                    <strong>Documento:</strong> Guía Prueba de Concepto<br>
                    <strong>Fecha:</strong> {{ date('d/m/Y') }}<br>
                    <strong>Versión:</strong> 1.0<br>
                    <strong>Clasificación:</strong> Confidencial
                </td>
            </tr>
        </table>
    </div>

    <!-- ══ TÍTULO ══ -->
    <div class="title-bar">
        <h1>Guía de Prueba de Concepto (PoC)</h1>
        <p>Buenas prácticas para la ejecución de una Prueba de Concepto, permitiendo validar<br>
            soluciones de manera controlada antes de su implementación en producción.</p>
        <div class="badge-row">
            <span class="badge">IMPLEMENTACIÓN v1.0</span>
            <span class="badge-conf">CONFIDENCIAL</span>
        </div>
    </div>

    <!-- ══ CUERPO ══ -->
    <div class="body-wrap">

        <p class="intro">
            Esta guía describe el procedimiento estandarizado para planificar, ejecutar y evaluar
            una Prueba de Concepto (PoC), garantizando que las soluciones técnicas sean validadas
            de forma objetiva antes de su despliegue en entornos productivos.
        </p>

        <!-- 1. Actividades Previas -->
        <div class="section-title">
            <div class="section-num">1</div>
            <h2>Actividades Previas (Planificación)</h2>
            <div class="section-divider"></div>
        </div>

        <table class="two-col-table">
            <tr>
                <td>
                    <div class="card">
                        <div class="card-title">Objetivo</div>
                        <ul class="corp-list">
                            <li>Problema a resolver</li>
                            <li>Hipótesis a validar</li>
                            <li>Resultado esperado</li>
                        </ul>
                    </div>
                </td>
                <td>
                    <div class="card">
                        <div class="card-title">Alcance</div>
                        <ul class="corp-list">
                            <li>Qué incluye la PoC</li>
                            <li>Qué no se evaluará</li>
                        </ul>
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <div class="card">
                        <div class="card-title">Criterios de Éxito</div>
                        <ul class="corp-list">
                            <li>Métricas medibles y verificables</li>
                            <li>Umbrales mínimos aceptables</li>
                        </ul>
                    </div>
                </td>
                <td>
                    <div class="card">
                        <div class="card-title">Recursos</div>
                        <ul class="corp-list">
                            <li>Equipo técnico</li>
                            <li>Infraestructura</li>
                            <li>Herramientas</li>
                            <li>Tiempo estimado</li>
                        </ul>
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <div class="card">
                        <div class="card-title">Arquitectura Preliminar</div>
                        <ul class="corp-list">
                            <li>Tecnologías</li>
                            <li>Integraciones</li>
                            <li>Limitaciones</li>
                        </ul>
                    </div>
                </td>
                <td>
                    <div class="card">
                        <div class="card-title">Riesgos</div>
                        <ul class="corp-list">
                            <li>Incompatibilidades</li>
                            <li>Costos</li>
                            <li>Seguridad</li>
                        </ul>
                    </div>
                </td>
            </tr>
        </table>

        <div class="alert alert-warning">
            <span class="alert-icon">⚠</span>
            <div><strong>Atención:</strong> Evitar que la PoC se convierta en un proyecto completo. Mantener el alcance
                acotado y enfocado en la validación de la hipótesis inicial.</div>
        </div>

        <!-- 2. Diseño del Plan -->
        <div class="section-title">
            <div class="section-num">2</div>
            <h2>Diseño del Plan</h2>
            <div class="section-divider"></div>
        </div>

        <div class="card">
            <div class="card-title">Actividades de Preparación</div>
            <ul class="corp-list">
                <li>Validación de equipamiento y licencias</li>
                <li>Preparación de dispositivos</li>
                <li>Diseño de arquitectura de prueba</li>
                <li>Configuración básica</li>
            </ul>
        </div>

        <!-- 3. Ejecución de la PoC -->
        <div class="section-title">
            <div class="section-num">3</div>
            <h2>Ejecución de la PoC</h2>
            <div class="section-divider"></div>
        </div>

        <table class="two-col-table">
            <tr>
                <td>
                    <div class="card">
                        <div class="card-title">Implementación Mínima</div>
                        <ul class="corp-list">
                            <li>Equipamiento</li>
                            <li>Prototipos</li>
                            <li>Configuraciones temporales</li>
                        </ul>
                    </div>
                </td>
                <td>
                    <div class="card">
                        <div class="card-title">Recolección de Datos</div>
                        <ul class="corp-list">
                            <li>Métricas</li>
                            <li>Consumo</li>
                            <li>Rendimiento</li>
                            <li>Estabilidad</li>
                        </ul>
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <div class="card">
                        <div class="card-title">Documentación</div>
                        <ul class="corp-list">
                            <li>Configuración usada</li>
                            <li>Problemas detectados</li>
                            <li>Decisiones técnicas</li>
                        </ul>
                    </div>
                </td>
                <td>
                    <div class="card">
                        <div class="card-title">Pruebas</div>
                        <ul class="corp-list">
                            <li>Funcionales</li>
                            <li>Rendimiento</li>
                            <li>Integración</li>
                            <li>Seguridad</li>
                        </ul>
                    </div>
                </td>
            </tr>
        </table>

        <div class="alert alert-info">
            <span class="alert-icon">ℹ</span>
            <div><strong>Nota operativa:</strong> Registrar todas las observaciones y resultados durante la ejecución,
                incluso aquellos no previstos en el plan inicial. Estos hallazgos pueden ser clave para la decisión
                final.</div>
        </div>

        <!-- 4. Evaluación -->
        <div class="section-title">
            <div class="section-num">4</div>
            <h2>Evaluación</h2>
            <div class="section-divider"></div>
        </div>

        <table style="width:100%;border-collapse:collapse;">
            <tr>
                <td style="width:20%;padding:4px;">
                    <div class="step-box">
                        <span class="step-letter">A</span>
                        <span class="step-label">Análisis de<br>resultados</span>
                    </div>
                </td>
                <td style="width:20%;padding:4px;">
                    <div class="step-box">
                        <span class="step-letter">B</span>
                        <span class="step-label">Lecciones<br>aprendidas</span>
                    </div>
                </td>
                <td style="width:20%;padding:4px;">
                    <div class="step-box">
                        <span class="step-letter">C</span>
                        <span class="step-label">Documentación<br>final</span>
                    </div>
                </td>
                <td style="width:20%;padding:4px;">
                    <div class="step-box">
                        <span class="step-letter">D</span>
                        <span class="step-label">Decisión<br>(Go / No-Go)</span>
                    </div>
                </td>
                <td style="width:20%;padding:4px;">
                    <div class="step-box">
                        <span class="step-letter">E</span>
                        <span class="step-label">Plan<br>siguiente</span>
                    </div>
                </td>
            </tr>
        </table>

        <div class="alert alert-success" style="margin-top:10px;">
            <span class="alert-icon">✓</span>
            <div><strong>Resultado esperado:</strong> Contar con evidencia objetiva y documentada que soporte la
                decisión
                de avanzar, ajustar o descartar la solución evaluada.</div>
        </div>

        <!-- 5. Elementos Clave -->
        <div class="section-title">
            <div class="section-num">5</div>
            <h2>Elementos Clave de una PoC Exitosa</h2>
            <div class="section-divider"></div>
        </div>

        <div class="card">
            <div class="card-title">Checklist de Buenas Prácticas</div>
            <ul class="corp-list">
                <li>Problema definido con claridad</li>
                <li>Hipótesis clara y verificable</li>
                <li>Alcance limitado y controlado</li>
                <li>Métricas de éxito establecidas</li>
                <li>Recolección de datos sistemática</li>
                <li>Evaluación objetiva e imparcial</li>
                <li>Documentación final completa</li>
            </ul>
        </div>

        <div class="alert alert-danger">
            <span class="alert-icon">✕</span>
            <div><strong>Importante:</strong> Una PoC sin criterios de éxito definidos previamente carece de valor
                técnico, ya que no permite validar de forma objetiva la viabilidad de la solución.</div>
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
        Netjer · Infraestructura de Red · Documento: Guía Prueba de Concepto v1.0 · {{ date('d/m/Y') }} · CONFIDENCIAL
    </div>

</body>

</html>
