<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Mantenimiento Correctivo</title>

    <style>
        body {
            font-family: DejaVu Sans, sans-serif;
            font-size: 12px;
            color: #1e293b;
            margin: 30px;
        }

        h1 {
            font-size: 22px;
            margin-bottom: 5px;
        }

        h2 {
            font-size: 16px;
            margin-top: 25px;
            border-bottom: 1px solid #ddd;
        }

        h3 {
            font-size: 13px;
            margin-bottom: 5px;
        }

        p {
            line-height: 1.6;
        }

        .badge {
            background: #fed7aa;
            padding: 4px 8px;
            font-size: 10px;
        }

        .card {
            border: 1px solid #ddd;
            padding: 10px;
            margin-bottom: 10px;
        }

        .step {
            border: 1px solid #ddd;
            padding: 10px;
            margin-bottom: 10px;
        }

        .alert-red {
            background: #fee2e2;
            border-left: 4px solid #dc2626;
            padding: 10px;
            margin-bottom: 10px;
        }

        .alert-orange {
            background: #fff7ed;
            border-left: 4px solid #f97316;
            padding: 10px;
            margin-bottom: 10px;
        }

        .section-box {
            border: 1px solid #ddd;
            padding: 10px;
            margin-bottom: 10px;
        }

        ul {
            margin-left: 15px;
        }

        li {
            margin-bottom: 5px;
        }

        .status {
            float: right;
            font-size: 10px;
            background: #d1fae5;
            padding: 2px 6px;
        }

        .grid td {
            width: 50%;
            vertical-align: top;
            padding: 5px;
        }

        img {
            max-width: 250px;
        }

        .watermark {
            position: fixed;
            top: 45%;
            left: 50%;
            transform: translate(-50%, -50%) rotate(-30deg);
            opacity: 0.08;
            font-size: 80px;
            color: #000;
            z-index: -1;
            white-space: nowrap;
            letter-spacing: 8px;
            font-weight: bold;
        }

        @page {
            margin: 80px 40px 60px 40px;
        }
    </style>
</head>

<body>

    <table width="100%" style="margin-bottom: 15px;">
        <tr>
            <td style="width: 50%;">
                <img src="{{ public_path('assets/media/logo-netjer.png') }}" style="height: 50px;">
            </td>
            <td style="width: 50%; text-align: right; font-size: 10px;">
                <strong>Documento:</strong> Checklist Switches<br>
                <strong>Fecha:</strong> {{ date('d/m/Y') }}<br>
                <strong>Versión:</strong> 1.0
            </td>
        </tr>
    </table>

    <hr>
    <div class="watermark">CONFIDENCIAL</div>

    <h1>Guía Mantenimiento Correctivo</h1>
    <span class="badge">IMPLEMENTACIÓN v1.0</span>

    <p>
        Guía para el diagnóstico, atención y resolución de fallas en equipos de red,
        asegurando la continuidad operativa y cumplimiento de SLA.
    </p>

    <!-- CONSIDERACIONES -->
    <h2>Consideraciones Iniciales</h2>

    <div class="alert-red">
        Validar si los equipos cuentan con garantía vigente.
    </div>

    <!-- PREVIAS -->
    <h2>1. Actividades Previas</h2>

    <div class="card">
        <ul>
            <li>Análisis inicial (remoto o presencial)</li>
            <li>Recabar información del cliente (ticket)</li>
            <li>Inspección física del equipo</li>
        </ul>
    </div>

    <!-- DETECCION -->
    <h3>Detección del Fallo</h3>

    <table class="grid">
        <tr>
            <td>
                <div class="section-box">
                    <strong>Hardware</strong>
                    <ul>
                        <li>Identificar daño físico o externo</li>
                        <li>Probar fuentes de energía</li>
                    </ul>
                </div>
            </td>

            <td>
                <div class="section-box">
                    <strong>Software</strong>
                    <ul>
                        <li>Revisión de configuración</li>
                        <li>Validación de logs</li>
                        <li>Pruebas de conectividad</li>
                    </ul>
                </div>
            </td>
        </tr>
    </table>

    <!-- CONFIRMACION -->
    <h3>Confirmación del Fallo</h3>

    <table class="grid">
        <tr>
            <td>
                <div class="section-box">
                    <strong>Hardware</strong>
                    <ul>
                        <li>Validar garantía</li>
                        <li>Determinar reparación o reemplazo</li>
                        <li>Levantar RMA</li>
                    </ul>
                </div>
            </td>

            <td>
                <div class="section-box">
                    <strong>Software</strong>
                    <ul>
                        <li>Validar si es problema conocido</li>
                        <li>Ejecutar pruebas específicas</li>
                        <li>Ajustes de configuración</li>
                        <li>Actualización de firmware</li>
                    </ul>
                </div>
            </td>
        </tr>
    </table>

    <!-- PROXIMOS -->
    <h3>Próximos Pasos</h3>

    <table class="grid">
        <tr>
            <td>
                <div class="section-box">
                    <strong>Registro</strong>
                    <ul>
                        <li>Documentar diagnóstico</li>
                        <li>Recabar datos del equipo</li>
                        <li>Levantar RMA</li>
                    </ul>
                </div>
            </td>

            <td>
                <div class="section-box">
                    <strong>Recepción</strong>
                    <ul>
                        <li>Validar equipo entregado</li>
                        <li>Entrega al cliente</li>
                    </ul>
                </div>
            </td>
        </tr>
    </table>

    <!-- VERIFICACION -->
    <h2>2. Verificación de Operatividad</h2>

    <div class="card">
        Instalación en rack <span class="status">REQUERIDO</span>
    </div>

    <div class="card">
        Carga de configuración <span class="status">REQUERIDO</span>
    </div>

    <div class="card">
        Ping a servicios <span class="status">REQUERIDO</span>
    </div>

    <div class="card">
        Validación por cliente <span class="status">REQUERIDO</span>
    </div>

    <div class="card">
        Ajustes de configuración <span class="status">REQUERIDO</span>
    </div>

    <!-- FINALES -->
    <h2>3. Actividades Finales</h2>

    <div class="card">
        <strong>Evidencia Fotográfica:</strong><br><br>
        <img src="{{ public_path('storage/media/switch-antes.png') }}">
        <img src="{{ public_path('storage/media/switch-despues.png') }}">
    </div>

    <div class="card">
        <ul>
            <li>Backup final</li>
            <li>Entrega y firma</li>
            <li>Cierre de ventana</li>
        </ul>
    </div>

    <!-- FOOTER -->
    <div class="alert-orange">
        Documento interno generado desde la Intranet Corporativa - Uso exclusivo del personal.
    </div>

</body>

</html>
