<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Guía Site Survey</title>

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
            margin-bottom: 10px;
            border-bottom: 1px solid #e2e8f0;
            padding-bottom: 5px;
        }

        h3 {
            font-size: 13px;
            margin-bottom: 5px;
        }

        p {
            font-size: 12px;
            line-height: 1.6;
        }

        .badge {
            display: inline-block;
            background: #fed7aa;
            color: #c2410c;
            font-size: 10px;
            padding: 3px 8px;
            border-radius: 10px;
            margin-bottom: 10px;
        }

        .card {
            border: 1px solid #e2e8f0;
            padding: 10px;
            margin-bottom: 10px;
        }

        .grid-2 {
            width: 100%;
        }

        .grid-2 td {
            width: 50%;
            vertical-align: top;
            padding: 5px;
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

        ul {
            margin: 5px 0 10px 15px;
        }

        li {
            margin-bottom: 4px;
        }

        .step {
            border: 1px solid #e2e8f0;
            padding: 10px;
            margin-bottom: 10px;
        }

        .status {
            float: right;
            font-size: 10px;
            padding: 2px 6px;
            background: #d1fae5;
            color: #065f46;
        }

        .page-break {
            page-break-after: always;
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

    <!-- HEADER -->
    <h1>Guía Site Survey</h1>
    <span class="badge">IMPLEMENTACIÓN v1.0</span>

    <p>
        Guía detallada para el proceso de realización del <strong>Site Survey</strong>,
        permitiendo analizar el comportamiento de la red inalámbrica y asegurar el cumplimiento
        de estándares corporativos.
    </p>

    <!-- IMPORTANTE -->
    <h2>Consideraciones Importantes</h2>

    <div class="alert-red">
        <strong>Mapa Arquitectónico:</strong><br>
        Es indispensable contar con el plano del área, ya que permite dimensionar correctamente
        la cobertura mediante herramientas como Ekahau.
    </div>

    <div class="alert-orange">
        <strong>Cuestionario Site Survey:</strong><br>
        Utilizar el cuestionario base para asegurar una correcta ejecución del levantamiento.
    </div>

    <!-- PREVIAS -->
    <h2>1. Actividades Previas</h2>

    <table class="grid-2">
        <tr>
            <td>
                <div class="card">
                    <h3>Información del Proyecto</h3>
                    <ul>
                        <li>Objetivo del Site Survey</li>
                        <li>Problemas actuales</li>
                        <li>Aplicaciones críticas</li>
                        <li>Tipo de cobertura requerida</li>
                    </ul>
                </div>
            </td>

            <td>
                <div class="card">
                    <h3>Usuarios y Dispositivos</h3>
                    <ul>
                        <li>Usuarios concurrentes</li>
                        <li>Dispositivos conectados</li>
                        <li>Tipos de dispositivos</li>
                        <li>Dispositivo más limitado</li>
                    </ul>
                </div>
            </td>
        </tr>
    </table>

    <!-- PREPARACION -->
    <h2>2. Preparación del Equipamiento</h2>

    <div class="card">
        <ul>
            <li>AP de prueba configurado</li>
            <li>Ekahau listo</li>
            <li>Tablet / Laptop cargada</li>
            <li>Baterías al 100%</li>
            <li>Herramientas de medición</li>
        </ul>
    </div>

    <!-- EJECUCION -->
    <h2>3. Ejecución del Site Survey</h2>

    <div class="step">
        <strong>Inicio:</strong> Validación con cliente y acceso a áreas
    </div>

    <div class="step">
        <strong>Recorrido:</strong> Medición de señal (RSSI / SNR)
    </div>

    <div class="step">
        <strong>Interferencias:</strong> Identificación de ruido y redes externas
    </div>

    <div class="alert-orange">
        Registrar métricas: RSSI, SNR, ruido e interferencias.
    </div>

    <!-- ANALISIS -->
    <h2>4. Análisis y Validación</h2>

    <div class="card">
        RSSI ≥ -65 dBm
        <span class="status">REQUERIDO</span>
    </div>

    <div class="card">
        SNR ≥ 25 dB
        <span class="status">REQUERIDO</span>
    </div>

    <!-- FINALES -->
    <h2>5. Actividades Finales</h2>

    <div class="card">
        <ul>
            <li>Generación de reporte</li>
            <li>Entrega de resultados</li>
            <li>Validación con cliente</li>
        </ul>
    </div>

    <!-- ROLLBACK -->
    <h2>6. Plan de Retorno (Rollback)</h2>

    <div class="card">
        <ul>
            <li>Retiro de equipos temporales</li>
            <li>Restaurar configuración original</li>
            <li>Validar red original</li>
        </ul>
    </div>

    <!-- FOOTER -->
    <div class="alert-orange">
        Documento interno generado desde la Intranet Corporativa - Uso exclusivo del personal.
    </div>

</body>

</html>
