<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Guía Implementación Access Points</title>

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

        .alert {
            background: #fff7ed;
            border-left: 4px solid #f97316;
            padding: 10px;
            margin-bottom: 10px;
        }

        .alert-red {
            background: #fee2e2;
            border-left: 4px solid #dc2626;
            padding: 10px;
        }

        .alert-orange {
            background: #fff7ed;
            border-left: 4px solid #f97316;
            padding: 10px;
            margin-bottom: 10px;
        }

        .step {
            border: 1px solid #ddd;
            padding: 10px;
            margin-bottom: 10px;
        }

        .status {
            float: right;
            font-size: 10px;
            background: #d1fae5;
            padding: 2px 6px;
        }

        ul {
            margin-left: 15px;
        }

        li {
            margin-bottom: 5px;
        }

        img {
            max-width: 350px;
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

    <h1>Guía Implementación Access Points</h1>
    <span class="badge">IMPLEMENTACIÓN v1.0</span>

    <p>
        Guía para la instalación y configuración de Access Points,
        asegurando cobertura, conectividad y cumplimiento de estándares corporativos.
    </p>

    <!-- CONSIDERACIONES -->
    <h2>Consideraciones Iniciales</h2>

    <div class="alert">
        <strong>Cuestionario Site Survey:</strong><br>
        Utilizar el cuestionario como base para la correcta implementación.
    </div>

    <div class="alert">
        <strong>Cableado:</strong><br>
        Validar tiempos, rutas y responsables de instalación.
    </div>

    <div class="alert">
        <strong>Infraestructura:</strong><br>
        Coordinar configuraciones con el equipo de redes.
    </div>

    <!-- PREVIAS -->
    <h2>1. Actividades Previas</h2>

    <div class="card">
        <ul>
            <li>Validación de nodos de red</li>
            <li>Ajustes en switches y firewall</li>
            <li>Configuración de controladora WiFi</li>
            <li>Revisión de equipamiento y accesorios</li>
            <li>Inspección física de ubicaciones (Site Survey)</li>
        </ul>
    </div>

    <div class="alert">
        Las ubicaciones deben coincidir con el diseño definido en el Site Survey.
    </div>

    <!-- CAMBIO -->
    <h2>2. Actividades en el Cambio</h2>

    <div class="step"><strong>Paso A:</strong> Instalación del soporte</div>
    <div class="step"><strong>Paso B:</strong> Montaje del Access Point</div>
    <div class="step"><strong>Paso C:</strong> Conexión a switch</div>
    <div class="step"><strong>Paso D:</strong> Validación de PoE</div>
    <div class="step"><strong>Paso E:</strong> Emisión de SSIDs</div>

    <!-- VERIFICACION -->
    <h2>3. Verificación</h2>

    <div class="card">
        Emisión correcta de SSIDs
        <span class="status">REQUERIDO</span>
    </div>

    <div class="card">
        Asignación de IP correcta
        <span class="status">REQUERIDO</span>
    </div>

    <div class="card">
        Acceso a red interna
        <span class="status">REQUERIDO</span>
    </div>

    <div class="card">
        Acceso a internet
        <span class="status">REQUERIDO</span>
    </div>

    <div class="card">
        Ajustes de configuración
        <span class="status">SI REQUIERE</span>
    </div>

    <!-- FINALES -->
    <h2>4. Actividades Finales</h2>

    <div class="card">
        <ul>
            <li>Backup de configuración</li>
            <li>Entrega de reporte</li>
            <li>Cierre de ventana</li>
        </ul>
    </div>

    <div class="card">
        <strong>Evidencia Fotográfica:</strong><br><br>
        <img src="{{ public_path('assets/media/instalacion-aps.png') }}">
    </div>

    <!-- FOOTER -->
    <div class="alert-orange">
        Documento interno generado desde la Intranet Corporativa - Uso exclusivo del personal.
    </div>

</body>

</html>
