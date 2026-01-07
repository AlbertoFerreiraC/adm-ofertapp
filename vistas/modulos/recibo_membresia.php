<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Recibo de Pago - Membresía</title>

    <style>
        /* ================= RESET ================= */
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: 'Segoe UI', Arial, sans-serif;
            background: #1f2a2e;
        }

        /* ================= AJUSTE DASHBOARD (RECOMENDADO) ================= */
        .main-content {
            margin-left: 260px;
            /* ancho real del sidebar */
            padding: 30px;
            min-height: calc(100vh - 70px);
        }

        /* ================= CONTENEDOR RECIBO ================= */
        .receipt-container {
            max-width: 1100px;
            margin: 0 auto;
        }

        /* ================= HEADER RECIBO ================= */
        .receipt-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 25px;
        }

        .receipt-title {
            font-size: 26px;
            font-weight: 800;
            color: #EF682F;
        }

        .estado {
            background: #e6f7ec;
            color: #1f7a3f;
            padding: 10px 18px;
            border-radius: 30px;
            font-weight: bold;
        }

        /* ================= CARD PRINCIPAL ================= */
        .receipt-card {
            background: #ffffff;
            border-radius: 18px;
            padding: 30px;
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.35);
        }

        /* ================= GRID ================= */
        .receipt-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 25px;
        }

        /* ================= BOX ================= */
        .receipt-box {
            border: 1px solid #e4e7eb;
            border-radius: 14px;
            padding: 20px;
        }

        .receipt-box h4 {
            color: #023351;
            margin-bottom: 15px;
        }

        /* ================= TEXTO ================= */
        .info {
            margin-bottom: 10px;
            font-size: 15px;
        }

        .info span {
            color: #555;
        }

        /* ================= MONTO ================= */
        .monto {
            font-size: 36px;
            font-weight: 800;
            color: #023351;
        }

        .monto-gs {
            font-size: 14px;
            color: #666;
            margin-top: 6px;
        }

        /* ================= FOOTER ================= */
        .receipt-footer {
            margin-top: 30px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 20px;
            flex-wrap: wrap;
        }

        .codigo {
            font-family: monospace;
            background: #f1f3f5;
            padding: 10px 14px;
            border-radius: 10px;
        }

        /* ================= BOTÓN ================= */
        .btn {
            padding: 12px 20px;
            border-radius: 10px;
            background: #EF682F;
            color: white;
            font-weight: bold;
            border: none;
            cursor: pointer;
        }

        .btn:hover {
            background: #d85c24;
        }

        /* ================= RESPONSIVE ================= */
        @media (max-width: 900px) {
            .receipt-grid {
                grid-template-columns: 1fr;
            }

            .main-content {
                margin-left: 0;
                /* para mobile */
            }
        }

        /* ================= PRINT ================= */
        @media print {
            body {
                background: #fff;
            }

            .btn {
                display: none;
            }

            .main-content {
                margin-left: 0;
                padding: 0;
            }

            .receipt-container {
                max-width: 100%;
            }
        }
    </style>
</head>

<body>

    <!-- CONTENIDO PRINCIPAL DEL DASHBOARD -->
    <div class="main-content">

        <section class="receipt-container">

            <!-- HEADER -->
            <div class="receipt-header">
                <div class="receipt-title">OfertApp</div>
                <div class="estado">✔ Pago confirmado</div>
            </div>

            <!-- CARD -->
            <div class="receipt-card">

                <div class="receipt-grid">

                    <!-- EMPRESA -->
                    <div class="receipt-box">
                        <h4>Datos de la Empresa</h4>
                        <div class="info"><strong>Empresa:</strong> <span>Comercial San Jorge</span></div>
                        <div class="info"><strong>RUC:</strong> <span>80098765-4</span></div>
                        <div class="info"><strong>Correo:</strong> <span>contacto@sanjorge.com</span></div>
                    </div>

                    <!-- PLAN -->
                    <div class="receipt-box">
                        <h4>Detalle de Membresía</h4>
                        <div class="info"><strong>Plan:</strong> <span id="plan"></span></div>
                        <div class="info"><strong>Periodo:</strong> <span>Mensual</span></div>
                        <div class="info"><strong>Método de pago:</strong> <span id="metodo"></span></div>
                    </div>

                    <!-- MONTO -->
                    <div class="receipt-box">
                        <h4>Monto Abonado</h4>
                        <div class="monto">$<span id="usd"></span></div>
                        <div class="monto-gs" id="gs"></div>
                    </div>

                    <!-- TRANSACCIÓN -->
                    <div class="receipt-box">
                        <h4>Información de Transacción</h4>
                        <div class="info"><strong>Fecha:</strong> <span id="fecha"></span></div>
                        <div class="info"><strong>Hora:</strong> <span id="hora"></span></div>
                        <div class="info"><strong>Estado:</strong> <span>Confirmado</span></div>
                    </div>

                </div>

                <!-- FOOTER -->
                <div class="receipt-footer">
                    <div class="codigo">
                        Código de recibo: <strong id="codigo"></strong>
                    </div>
                    <button class="btn" onclick="window.print()">Imprimir recibo</button>
                </div>

            </div>

        </section>

    </div>

    <script>
        /* ================= DATOS ================= */
        const plan = localStorage.getItem('plan') || 'Profesional';
        const precioUSD = parseFloat(localStorage.getItem('precio')) || 40;
        const metodo = localStorage.getItem('metodoPago') || 'Transferencia bancaria';

        document.getElementById('plan').textContent = plan;
        document.getElementById('usd').textContent = precioUSD.toFixed(2);
        document.getElementById('metodo').textContent = metodo;

        /* ================= FECHA ================= */
        const now = new Date();
        document.getElementById('fecha').textContent = now.toLocaleDateString('es-PY');
        document.getElementById('hora').textContent = now.toLocaleTimeString('es-PY');

        /* ================= CONVERSIÓN USD → Gs ================= */
        fetch('https://open.er-api.com/v6/latest/USD')
            .then(r => r.json())
            .then(d => {
                const gs = precioUSD * d.rates.PYG;
                document.getElementById('gs').textContent =
                    `≈ Gs. ${gs.toLocaleString('es-PY')}`;
            })
            .catch(() => {
                document.getElementById('gs').textContent =
                    `≈ Gs. ${(precioUSD * 7400).toLocaleString('es-PY')} (aprox.)`;
            });

        /* ================= CÓDIGO RECIBO ================= */
        const codigo = 'REC-' + Math.random().toString(36).substring(2, 10).toUpperCase();
        document.getElementById('codigo').textContent = codigo;
    </script>

</body>

</html>