<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Detalle de Membresía</title>

    <style>
        /* ================= RESET ================= */
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        html,
        body {
            height: 100%;
            font-family: 'Segoe UI', Arial, sans-serif;
            overflow-x: hidden;
        }

        /* ================= VARIABLES ================= */
        :root {
            --naranja: #EF682F;
            --azul: #023351;
            --azul-oscuro: #02304D;
            --gris-bg: #f4f6f8;
            --sidebar-bg: #1f2a2e;
        }

        /* ================= LAYOUT ================= */
        .app-layout {
            display: grid;
            grid-template-columns: 260px 1fr;
            min-height: 100vh;
            background: var(--gris-bg);
        }

        /* ================= SIDEBAR ================= */
        .sidebar {
            background: var(--sidebar-bg);
            color: white;
            padding: 20px 0;
        }

        .sidebar h3 {
            padding: 0 20px 15px;
            font-size: 14px;
            opacity: .7;
        }

        .sidebar ul {
            list-style: none;
        }

        .sidebar li {
            padding: 12px 20px;
        }

        /* ================= MAIN ================= */
        .main-content {
            display: flex;
            flex-direction: column;
        }

        /* ================= HERO ================= */
        .hero {
            background: linear-gradient(135deg, var(--azul), var(--azul-oscuro));
            color: white;
            padding: 40px 30px;
        }

        .content {
            padding: 30px;
        }

        /* ================= GRID ================= */
        .grid {
            display: grid;
            grid-template-columns: 2fr 1fr;
            gap: 25px;
        }

        /* ================= CARD ================= */
        .card {
            background: white;
            border-radius: 16px;
            padding: 25px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, .08);
        }

        .resumen-plan {
            border-left: 5px solid var(--naranja);
        }

        .precio {
            font-size: 34px;
            font-weight: bold;
            color: var(--azul);
        }

        .precio-gs {
            font-size: 14px;
            color: #777;
            margin-top: 4px;
        }

        .badge {
            background: var(--naranja);
            color: white;
            padding: 5px 12px;
            border-radius: 20px;
            font-size: 12px;
        }

        /* ================= LISTA ================= */
        .lista li {
            margin-bottom: 10px;
            padding-left: 22px;
            position: relative;
        }

        .lista li::before {
            content: "✔";
            position: absolute;
            left: 0;
            color: var(--naranja);
        }

        /* ================= EMPRESA ================= */
        .empresa-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 15px;
            margin-top: 10px;
        }

        /* ================= BOTONES ================= */
        .btn {
            padding: 14px 18px;
            border-radius: 10px;
            background: var(--naranja);
            color: white;
            font-weight: bold;
            cursor: pointer;
            border: none;
            margin-top: 20px;
            width: 100%;
        }

        /* ================= MODAL ================= */
        .modal {
            position: fixed;
            inset: 0;
            background: rgba(0, 0, 0, .6);
            display: flex;
            align-items: center;
            justify-content: center;
            z-index: 999;
        }

        .modal.hidden {
            display: none;
        }

        .modal-content {
            background: white;
            width: 520px;
            max-width: 95%;
            border-radius: 16px;
            padding: 25px;
            max-height: 90vh;
            overflow-y: auto;
        }

        .section {
            margin-top: 20px;
        }

        .section h4 {
            margin-bottom: 10px;
            color: var(--azul);
        }

        /* ================= MÉTODOS ================= */
        .metodos label {
            display: block;
            margin-bottom: 8px;
            cursor: pointer;
        }

        /* ================= DATOS PAGO ================= */
        .datos-pago {
            background: #f7f9fb;
            padding: 15px;
            border-radius: 10px;
            font-size: 14px;
        }

        /* ================= UPLOAD ================= */
        .upload {
            border: 2px dashed #ccc;
            padding: 15px;
            text-align: center;
            border-radius: 10px;
        }

        .upload img {
            max-width: 100%;
            margin-top: 10px;
            border-radius: 8px;
            display: none;
        }

        /* ================= RESPONSIVE ================= */
        @media (max-width: 900px) {
            .grid {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>

<body>

    <div class="app-layout">

        <!-- SIDEBAR -->
        <aside class="sidebar">
            <h3>MENÚ PRINCIPAL</h3>
            <ul>
                <li>Inicio</li>
                <li>Mis Productos</li>
                <li>Membresía / Plan</li>
                <li>Mi Perfil</li>
                <li>Cerrar Sesión</li>
            </ul>
        </aside>

        <!-- MAIN -->
        <div class="main-content">

            <section class="hero">
                <h1>Detalle de la Membresía Seleccionada</h1>
            </section>

            <section class="content">
                <div class="grid">

                    <!-- DETALLE -->
                    <div class="card resumen-plan">
                        <span class="badge" id="badgePlan"></span>
                        <h3 id="nombrePlan"></h3>

                        <div class="precio">
                            $<span id="precioPlan"></span> / mes
                            <div class="precio-gs" id="precioGs"></div>
                        </div>

                        <p id="descripcionPlan"></p>

                        <h4 style="margin-top:20px">Incluye:</h4>
                        <ul class="lista" id="beneficios"></ul>
                    </div>

                    <!-- EMPRESA -->
                    <div class="card">
                        <h3>Datos de la Empresa</h3>
                        <div class="empresa-grid">
                            <div><strong>Empresa:</strong></div>
                            <div>Comercial San Jorge</div>
                            <div><strong>RUC:</strong></div>
                            <div>80098765-4</div>
                            <div><strong>Correo:</strong></div>
                            <div>contacto@sanjorge.com</div>
                            <div><strong>Estado:</strong></div>
                            <div>Pendiente de pago</div>
                        </div>

                        <button class="btn" onclick="abrirModal()">Continuar al Pago</button>
                    </div>

                </div>
            </section>

        </div>
    </div>

    <!-- ================= MODAL DE PAGO ================= -->
    <div class="modal hidden" id="modalPago">
        <div class="modal-content">

            <h3>Pago de Membresía</h3>

            <div class="section metodos">
                <h4>Método de pago</h4>
                <label><input type="radio" name="metodo" value="transferencia" checked> Transferencia bancaria</label>
                <label><input type="radio" name="metodo" value="western"> Western Union</label>
                <label><input type="radio" name="metodo" value="tigo"> Giros Tigo</label>
                <label><input type="radio" name="metodo" value="billetera"> Billetera personal</label>
            </div>

            <div class="section datos-pago" id="datosPago">
                Banco Familiar<br>
                Cuenta N° 12345678<br>
                Titular: OfertApp S.A.<br>
                RUC: 80012345-6
            </div>

            <div class="section">
                <h4>Comprobante</h4>
                <div class="upload">
                    <input type="file" id="comprobante">
                    <img id="preview">
                </div>
            </div>

            <div class="section">
                <button class="btn" id="btnEnviarComprobante">Enviar comprobante</button>
            </div>

        </div>
    </div>

    <script>
    /* ================= VALIDACIÓN ================= */
    if (!localStorage.getItem('plan')) {
        window.location.href = "membresias_planes";
    }

    /* ================= DATOS BASE ================= */
    const plan = localStorage.getItem('plan');
    const precioUSD = parseFloat(localStorage.getItem('precio'));

    /* ================= DATA DE PLANES ================= */
    const data = {
        "Básico": {
            descripcion: "Ideal para pequeños comercios que recién inician en la plataforma.",
            beneficios: [
                "Hasta 100 productos",
                "Panel de gestión básico",
                "Mapa de comercios",
                "Reportes mensuales"
            ]
        },
        "Profesional": {
            descripcion: "Pensado para negocios en crecimiento que requieren mayor visibilidad.",
            beneficios: [
                "Hasta 500 productos",
                "Reportes avanzados",
                "Prioridad en búsquedas",
                "Soporte preferencial",
                "Campañas promocionales"
            ]
        },
        "Premium": {
            descripcion: "Solución completa para empresas que buscan máxima exposición.",
            beneficios: [
                "Productos ilimitados",
                "Estadísticas en tiempo real",
                "Posicionamiento destacado",
                "Integración con inventario",
                "Soporte VIP 24/7",
                "Marketing personalizado"
            ]
        }
    };

    /* ================= RENDER DETALLE ================= */
    document.getElementById('nombrePlan').textContent = plan;
    document.getElementById('precioPlan').textContent = precioUSD.toFixed(0);
    document.getElementById('descripcionPlan').textContent = data[plan].descripcion;
    document.getElementById('badgePlan').textContent = plan;

    const ul = document.getElementById('beneficios');
    data[plan].beneficios.forEach(b => {
        const li = document.createElement('li');
        li.textContent = b;
        ul.appendChild(li);
    });

    /* ================= CONVERSIÓN USD → Gs ================= */
    const precioGsEl = document.getElementById('precioGs');

    fetch('https://open.er-api.com/v6/latest/USD')
        .then(r => r.json())
        .then(j => {
            const gs = precioUSD * j.rates.PYG;
            precioGsEl.textContent = `≈ Gs. ${gs.toLocaleString('es-PY')}`;
        })
        .catch(() => {
            precioGsEl.textContent = `≈ Gs. ${(precioUSD * 7400).toLocaleString('es-PY')} (aprox.)`;
        });

    /* ================= MODAL ================= */
    function abrirModal() {
        document.getElementById('modalPago').classList.remove('hidden');
    }

    /* ================= MÉTODOS DE PAGO ================= */
    const datos = {
        transferencia: `Banco Familiar<br>Cuenta N° 12345678<br>Titular: OfertApp S.A.`,
        western: `Western Union<br>Destinatario: OfertApp S.A.<br>Ciudad: Asunción`,
        tigo: `Giros Tigo<br>Número: 0981 123 456`,
        billetera: `Billetera Personal<br>Alias: ofertapp.py`
    };

    document.querySelectorAll('input[name="metodo"]').forEach(radio => {
        radio.addEventListener('change', () => {
            document.getElementById('datosPago').innerHTML = datos[radio.value];
        });
    });

    /* ================= PREVIEW COMPROBANTE ================= */
    document.getElementById('comprobante').addEventListener('change', e => {
        const img = document.getElementById('preview');
        img.src = URL.createObjectURL(e.target.files[0]);
        img.style.display = 'block';
    });

    /* ================= ENVIAR COMPROBANTE ================= */
    const btnEnviar = document.getElementById('btnEnviarComprobante');

    if (btnEnviar) {
        btnEnviar.addEventListener('click', () => {

            const metodoSeleccionado =
                document.querySelector('input[name="metodo"]:checked')?.value;

            // Guardar datos para el recibo
            localStorage.setItem('metodoPago', formatearMetodo(metodoSeleccionado));
            localStorage.setItem('precioUSD', precioUSD);

            // Guardar monto Gs mostrado (referencial)
            const gsTexto = precioGsEl.textContent;
            if (gsTexto) {
                localStorage.setItem('precioGsTexto', gsTexto);
            }

            // Redirigir al recibo
            window.location.href = "recibo_membresia";
        });
    }

    /* ================= UTIL ================= */
    function formatearMetodo(valor) {
        switch (valor) {
            case 'transferencia': return 'Transferencia bancaria';
            case 'western': return 'Western Union';
            case 'tigo': return 'Giros Tigo';
            case 'billetera': return 'Billetera personal';
            default: return 'No especificado';
        }
    }
</script>

</body>

</html>