<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Guía Prueba de Concepto</title>

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

        .two-col td {
            width: 50%;
            vertical-align: top;
            padding: 5px;
        }

        .step {
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

        .alert-orange {
            background: #fff7ed;
            border-left: 4px solid #f97316;
            padding: 10px;
            margin-bottom: 10px;
        }

        ul {
            margin-left: 15px;
        }

        li {
            margin-bottom: 5px;
        }

        .number {
            font-weight: bold;
            margin-right: 5px;
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

    <h1>Guía Implementación PoC</h1>
    <span class="badge">IMPLEMENTACIÓN v1.0</span>

    <p>
        Guía de buenas prácticas para la ejecución de una Prueba de Concepto,
        permitiendo validar soluciones antes de su implementación en producción.
    </p>

    <!-- PREVIAS -->
    <h2>1. Actividades Previas (Planificación)</h2>

    <table class="two-col">
        <tr>
            <td>
                <div class="card">
                    <h3>Objetivo</h3>
                    <ul>
                        <li>Problema a resolver</li>
                        <li>Hipótesis a validar</li>
                        <li>Resultado esperado</li>
                    </ul>
                </div>
            </td>

            <td>
                <div class="card">
                    <h3>Alcance</h3>
                    <ul>
                        <li>Qué incluye la PoC</li>
                        <li>Qué no se evaluará</li>
                    </ul>
                </div>
            </td>
        </tr>

        <tr>
            <td>
                <div class="card">
                    <h3>Criterios de éxito</h3>
                    <ul>
                        <li>Métricas medibles</li>
                    </ul>
                </div>
            </td>

            <td>
                <div class="card">
                    <h3>Recursos</h3>
                    <ul>
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
                    <h3>Arquitectura preliminar</h3>
                    <ul>
                        <li>Tecnologías</li>
                        <li>Integraciones</li>
                        <li>Limitaciones</li>
                    </ul>
                </div>
            </td>

            <td>
                <div class="card">
                    <h3>Riesgos</h3>
                    <ul>
                        <li>Incompatibilidades</li>
                        <li>Costos</li>
                        <li>Seguridad</li>
                    </ul>
                </div>
            </td>
        </tr>
    </table>

    <div class="alert">
        Evitar que la PoC se convierta en un proyecto completo.
    </div>

    <!-- PLAN -->
    <h2>2. Diseño del Plan</h2>

    <div class="card">
        <ul>
            <li>Validación de equipamiento y licencias</li>
            <li>Preparación de dispositivos</li>
            <li>Diseño de arquitectura de prueba</li>
            <li>Configuración básica</li>
        </ul>
    </div>

    <!-- EJECUCION -->
    <h2>3. Ejecución de la PoC</h2>

    <table class="two-col">
        <tr>
            <td>
                <div class="card">
                    <h3>Implementación mínima</h3>
                    <ul>
                        <li>Equipamiento</li>
                        <li>Prototipos</li>
                        <li>Configuraciones temporales</li>
                    </ul>
                </div>
            </td>

            <td>
                <div class="card">
                    <h3>Recolección de datos</h3>
                    <ul>
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
                    <h3>Documentación</h3>
                    <ul>
                        <li>Configuración usada</li>
                        <li>Problemas</li>
                        <li>Decisiones técnicas</li>
                    </ul>
                </div>
            </td>

            <td>
                <div class="card">
                    <h3>Pruebas</h3>
                    <ul>
                        <li>Funcionales</li>
                        <li>Rendimiento</li>
                        <li>Integración</li>
                        <li>Seguridad</li>
                    </ul>
                </div>
            </td>
        </tr>
    </table>

    <!-- EVALUACION -->
    <h2>4. Evaluación</h2>

    <div class="step">Análisis de resultados</div>
    <div class="step">Lecciones aprendidas</div>
    <div class="step">Documentación final</div>
    <div class="step">Decisión</div>
    <div class="step">Plan siguiente</div>

    <!-- CLAVES -->
    <h2>5. Elementos Clave</h2>

    <div class="card">
        <ul>
            <li>Problema definido</li>
            <li>Hipótesis clara</li>
            <li>Alcance limitado</li>
            <li>Métricas de éxito</li>
            <li>Recolección de datos</li>
            <li>Evaluación objetiva</li>
            <li>Documentación final</li>
        </ul>
    </div>

    <!-- FOOTER -->
    <div class="alert-orange">
        Documento interno generado desde la Intranet Corporativa - Uso exclusivo del personal.
    </div>

</body>

</html>
