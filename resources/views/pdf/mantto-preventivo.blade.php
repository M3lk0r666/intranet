<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Mantenimiento Preventivo</title>

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

        .alert-blue {
            background: #eff6ff;
            border-left: 4px solid #3b82f6;
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

        .grid {
            width: 100%;
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

    <h1>Guía Mantenimiento Preventivo</h1>
    <span class="badge">IMPLEMENTACIÓN v1.0</span>

    <p>
        Guía para la ejecución de mantenimiento preventivo en equipos de red,
        asegurando continuidad operativa y cumplimiento de estándares.
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
            <li>Solicitar credenciales de acceso</li>
            <li>Acceder al dispositivo</li>
            <li>Guardar configuración</li>
            <li>Pruebas de comunicación (Core, Internet)</li>
            <li>Estado de interfaces</li>
            <li>Validar stack (si aplica)</li>
            <li>Backup de configuración [antes]</li>
        </ul>
    </div>

    <!-- LIMPIEZA -->
    <h2>2. Limpieza Física</h2>

    <div class="card">
        <ul>
            <li>Revisión de cableado</li>
            <li>Validación de LEDs</li>
            <li>Desconexión eléctrica y de datos</li>
        </ul>
    </div>

    <div class="alert-blue">
        Retirar equipo solo si cliente lo solicita y está correctamente etiquetado.
    </div>

    <div class="card">
        <ul>
            <li>Limpieza de polvo y ventilación</li>
        </ul>
    </div>

    <div class="alert-blue">
        Evitar desarmar equipo (puede invalidar garantía).
    </div>

    <!-- VERIFICACION -->
    <h2>3. Verificación de Operatividad</h2>

    <div class="card">
        Energizado del dispositivo <span class="status">REQUERIDO</span>
    </div>

    <div class="card">
        Validación de configuraciones <span class="status">REQUERIDO</span>
    </div>

    <div class="card">
        Ping a servicios <span class="status">REQUERIDO</span>
    </div>

    <h3>Comparativa de Interfaces</h3>

    <table class="grid">
        <tr>
            <td>
                <div class="card">
                    <strong>ANTES</strong><br>
                    Gi1/0/1 → UP/UP<br>
                    Gi1/0/2 → UP/UP<br>
                    Gi1/0/3 → DOWN/DOWN
                </div>
            </td>

            <td>
                <div class="card">
                    <strong>DESPUÉS</strong><br>
                    Gi1/0/1 → UP/UP<br>
                    Gi1/0/2 → UP/DOWN<br>
                    Gi1/0/3 → DOWN/DOWN
                </div>
            </td>
        </tr>
    </table>

    <div class="card">
        Validación por cliente (servicios operativos)
        <span class="status">REQUERIDO</span>
    </div>

    <div class="card">
        <strong>Actualización:</strong>
        <ul>
            <li>Validar firmware</li>
            <li>Actualizar si es necesario</li>
        </ul>
    </div>

    <!-- FINALES -->
    <h2>4. Actividades Finales</h2>

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
