<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Checklist Pre-Implementación Switches</title>

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
            padding-bottom: 5px;
        }

        p {
            font-size: 12px;
            margin-bottom: 10px;
        }

        .badge {
            background: #fed7aa;
            color: #c2410c;
            font-size: 10px;
            padding: 3px 8px;
            border-radius: 10px;
        }

        .card {
            border: 1px solid #ddd;
            padding: 12px;
            margin-bottom: 10px;
        }

        .alert-red {
            background: #fee2e2;
            border-left: 4px solid #dc2626;
            padding: 10px;
            margin-bottom: 15px;
        }

        .alert-orange {
            background: #fff7ed;
            border-left: 4px solid #f97316;
            padding: 10px;
            margin-top: 10px;
        }

        .alert-blue {
            background: #eff6ff;
            border-left: 4px solid #3b82f6;
            padding: 10px;
            margin-top: 10px;
        }

        ul {
            margin-left: 15px;
        }

        li {
            margin-bottom: 5px;
        }

        .code {
            background: #f8fafc;
            border: 1px solid #ddd;
            padding: 8px;
            font-family: monospace;
            font-size: 11px;
        }

        .status {
            float: right;
            font-size: 10px;
            background: #d1fae5;
            padding: 2px 6px;
        }

        .section {
            margin-bottom: 20px;
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

    <h1>Checklist Pre-Implementación Switches</h1>
    <span class="badge">OPERACIÓN</span>

    <p>
        Guía para recopilación de información previa a la instalación de switches en sitio,
        asegurando una implementación exitosa y sin contratiempos.
    </p>

    <!-- ALERTA -->
    <div class="alert-red">
        <strong>IMPORTANTE:</strong>
        Validar toda la información antes de la ventana de instalación para evitar fallas o retrasos.
    </div>

    <!-- 1 -->
    <h2>1. Acceso y Coordinación</h2>
    <div class="card">
        <ul>
            <li>Acceso al sitio en fecha y hora acordada</li>
            <li>Acceso anticipado para inspección y etiquetado</li>
            <li>Contacto responsable en sitio</li>
            <li>Validación de ventana de mantenimiento</li>
        </ul>
    </div>

    <!-- 2 -->
    <h2>2. Infraestructura Física</h2>
    <div class="card">
        <ul>
            <li>Ubicación física del switch (IDF / Rack)</li>
            <li>Evidencia fotográfica del rack</li>
            <li>Accesibilidad (altura / herramientas)</li>
            <li>Espacio disponible en rack</li>
            <li>Tornillería disponible</li>
            <li>Alimentación eléctrica suficiente</li>
            <li>Posibilidad de instalación en paralelo</li>
        </ul>
    </div>

    <div class="alert-orange">
        Validar instalación en paralelo para minimizar impacto en operación.
    </div>

    <!-- 3 -->
    <h2>3. Estado Actual de Equipos</h2>
    <div class="card">
        <ul>
            <li>Tipo de instalación (Standalone / Stack)</li>
            <li>Cantidad de switches en stack</li>
            <li>Distribución en rack</li>
            <li>Estado físico del equipo</li>
        </ul>
    </div>

    <!-- 4 -->
    <h2>4. Accesos y Configuración</h2>
    <div class="card">
        <ul>
            <li>Credenciales validadas (usuario/password)</li>
            <li>Backup de configuración</li>
            <li>Revisión de configuración con ingeniería</li>
        </ul>
    </div>

    <!-- 5 -->
    <h2>5. Validación con Cliente</h2>
    <div class="card">
        <ul>
            <li>Procedimiento de pruebas definido</li>
            <li>Validación de conectividad</li>
            <li>Pruebas de servicios críticos</li>
            <li>Confirmación operativa del cliente</li>
        </ul>
    </div>

    <!-- 6 -->
    <h2>6. Procesos Administrativos</h2>
    <div class="card">
        <ul>
            <li>Procedimiento de retiro de equipos</li>
            <li>Registro de equipos retirados</li>
            <li>Validación con seguridad del sitio</li>
        </ul>
    </div>

    <!-- 7 -->
    <h2>7. Datos de Equipos</h2>
    <div class="card">
        <ul>
            <li>Seriales de equipos</li>
            <li>Tipo (Acceso / Core)</li>
            <li>Standalone o Stack</li>
            <li>Cantidad en stack</li>
            <li>Modelos/series</li>
            <li>Credenciales de acceso</li>
            <li>Etiquetado de equipo y cableado</li>
            <li>Evidencia fotográfica del rack</li>
        </ul>
    </div>

    <!-- 8 -->
    <h2>8. Información Técnica</h2>

    <div class="code">
        show switch detail<br>
        show version detail<br>
        show configuration<br>
        show vlan<br>
        show iproute<br>
        show edp ports all<br>
        show lldp neighbors<br>
        show ports no-refresh
    </div>

    <div class="alert-blue">
        <strong>Stack adicional:</strong><br>
        show stacking<br>
        show slot
    </div>

    <!-- 9 -->
    <h2>9. Recomendaciones Técnicas</h2>
    <div class="card">
        <ul>
            <li>Validar versión de firmware</li>
            <li>Confirmar compatibilidad de stack</li>
            <li>Verificar VLANs y rutas</li>
            <li>Documentar topología actual</li>
            <li>Preparar plan de rollback</li>
        </ul>
    </div>

    <!-- FOOTER -->
    <div class="alert-orange">
        Documento interno generado desde la Intranet Corporativa - Uso exclusivo del personal.
    </div>

</body>

</html>
