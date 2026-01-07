<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Planes de Membresía</title>

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
            --gris-texto: #4a4a4a;
            --sidebar-bg: #1f2a2e;
        }

        /* ================= LAYOUT GENERAL ================= */
        .app-layout {
            display: grid;
            grid-template-columns: 260px 1fr;
            min-height: 100vh;
            background: var(--gris-bg);
        }

        /* ================= SIDEBAR ================= */
        .sidebar {
            background: var(--sidebar-bg);
            color: #fff;
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
            cursor: pointer;
            transition: background .2s;
        }

        .sidebar li:hover {
            background: rgba(255, 255, 255, .08);
        }

        /* ================= HEADER ================= */
        .header {
            background: #3b8bbd;
            padding: 12px 20px;
            color: white;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .header input {
            width: 300px;
            padding: 8px 12px;
            border-radius: 20px;
            border: none;
        }

        /* ================= MAIN ================= */
        .main-content {
            display: flex;
            flex-direction: column;
            min-width: 0;
        }

        /* ================= HERO ================= */
        .hero-banner {
            background: linear-gradient(135deg, var(--naranja), #ff8c5a);
            color: white;
            padding: 50px 30px 80px;
            text-align: center;
        }

        .hero-banner h1 {
            font-size: 32px;
        }

        .hero-banner p {
            margin-top: 10px;
            opacity: .9;
        }

        /* ================= PLANES ================= */
        .membership-section {
            padding: 0 30px 60px;
            margin-top: -60px;
        }

        .planes-container {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 25px;
        }

        /* ================= CARD ================= */
        .plan {
            background: white;
            border-radius: 18px;
            padding: 30px 25px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, .08);
            display: flex;
            flex-direction: column;
            position: relative;
            transition: transform .3s, box-shadow .3s;
        }

        .plan:hover {
            transform: translateY(-8px);
            box-shadow: 0 18px 35px rgba(0, 0, 0, .15);
        }

        .plan.destacado {
            border: 3px solid var(--naranja);
            transform: scale(1.03);
        }

        .badge {
            position: absolute;
            top: -14px;
            left: 50%;
            transform: translateX(-50%);
            background: var(--naranja);
            color: white;
            padding: 6px 14px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: bold;
        }

        .plan h2 {
            text-align: center;
            margin-top: 20px;
        }

        .precio {
            text-align: center;
            font-size: 36px;
            font-weight: bold;
            color: var(--azul);
            margin: 15px 0;
        }

        .precio span {
            font-size: 14px;
            color: #777;
        }

        .plan ul {
            list-style: none;
            margin: 25px 0;
        }

        .plan ul li {
            margin-bottom: 14px;
            padding-left: 26px;
            position: relative;
        }

        .plan ul li::before {
            content: "✔";
            position: absolute;
            left: 0;
            color: var(--naranja);
            font-weight: bold;
        }

        .btn {
            margin-top: auto;
            padding: 14px;
            border-radius: 10px;
            background: var(--azul);
            color: white;
            text-align: center;
            font-weight: bold;
            cursor: pointer;
            transition: background .3s;
        }

        .btn:hover {
            background: var(--azul-oscuro);
        }

        .destacado .btn {
            background: var(--naranja);
        }

        /* ================= MODAL ================= */
        .modal {
            position: fixed;
            inset: 0;
            background: rgba(0, 0, 0, .6);
            display: flex;
            align-items: center;
            justify-content: center;
            z-index: 1000;
        }

        .modal.hidden {
            display: none;
        }

        .modal-content {
            background: white;
            border-radius: 18px;
            padding: 30px;
            width: 420px;
            animation: scaleIn .3s ease;
        }

        @keyframes scaleIn {
            from {
                opacity: 0;
                transform: scale(.9);
            }

            to {
                opacity: 1;
                transform: scale(1);
            }
        }

        .resumen {
            background: #f7f9fb;
            border-radius: 12px;
            padding: 20px;
            margin: 20px 0;
        }

        .acciones {
            display: flex;
            gap: 10px;
        }

        .acciones button {
            flex: 1;
            padding: 12px;
            border-radius: 10px;
            border: none;
            font-weight: bold;
            cursor: pointer;
        }

        .cancelar {
            background: #ddd;
        }

        .continuar {
            background: var(--naranja);
            color: white;
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
                <li>Agregar Producto</li>
                <li>Ofertas Activas</li>
                <li>Datos de la Empresa</li>
                <li>Membresía / Plan</li>
                <li>Búsquedas Populares</li>
                <li>Actividad Comercial</li>
                <li>Comentarios de Clientes</li>
                <li>Mi Perfil</li>
                <li>Cerrar Sesión</li>
            </ul>
        </aside>

        <!-- MAIN -->
        <div class="main-content">

            <!-- HERO -->
            <section class="hero-banner">
                <h1>Planes de Membresía</h1>
                <p>Elegí el plan que mejor acompaña el crecimiento de tu negocio</p>
            </section>

            <!-- PLANES -->
            <section class="membership-section">
                <div class="planes-container">

                    <div class="plan">
                        <h2>Básico</h2>
                        <div class="precio">$35 <span>/ mes</span></div>
                        <ul>
                            <li>Hasta 100 productos</li>
                            <li>Panel básico</li>
                            <li>Mapa de comercios</li>
                            <li>Reportes mensuales</li>
                        </ul>
                        <div class="btn elegir" data-plan="Básico" data-precio="35">Elegir Plan</div>
                    </div>

                    <div class="plan destacado">
                        <div class="badge">Más elegido</div>
                        <h2>Profesional</h2>
                        <div class="precio">$70 <span>/ mes</span></div>
                        <ul>
                            <li>Hasta 500 productos</li>
                            <li>Reportes avanzados</li>
                            <li>Prioridad en búsquedas</li>
                            <li>Soporte preferencial</li>
                            <li>Campañas promocionales</li>
                        </ul>
                        <div class="btn elegir" data-plan="Profesional" data-precio="70">Elegir Plan</div>
                    </div>

                    <div class="plan">
                        <h2>Premium</h2>
                        <div class="precio">$100 <span>/ mes</span></div>
                        <ul>
                            <li>Productos ilimitados</li>
                            <li>Estadísticas en tiempo real</li>
                            <li>Posicionamiento destacado</li>
                            <li>Integración con inventario</li>
                            <li>Soporte VIP 24/7</li>
                            <li>Marketing personalizado</li>
                        </ul>
                        <div class="btn elegir" data-plan="Premium" data-precio="100">Elegir Plan</div>
                    </div>

                </div>
            </section>
        </div>
    </div>

    <!-- MODAL -->
    <div class="modal hidden" id="modal">
        <div class="modal-content">
            <h3>Confirmar Membresía</h3>
            <div class="resumen">
                <p><strong>Plan:</strong> <span id="mPlan"></span></p>
                <p><strong>Precio:</strong> $<span id="mPrecio"></span> / mes</p>
                <p><strong>Estado:</strong> Pendiente de pago</p>
            </div>
            <div class="acciones">
                <button class="cancelar" id="cancelar">Cancelar</button>
                <button class="continuar" id="continuar">Continuar</button>
            </div>
        </div>
    </div>

    <script>
        const modal = document.getElementById('modal');
        const mPlan = document.getElementById('mPlan');
        const mPrecio = document.getElementById('mPrecio');

        let planSeleccionado = null;
        let precioSeleccionado = null;

        document.querySelectorAll('.elegir').forEach(btn => {
            btn.onclick = () => {
                planSeleccionado = btn.dataset.plan;
                precioSeleccionado = btn.dataset.precio;

                mPlan.textContent = planSeleccionado;
                mPrecio.textContent = precioSeleccionado;

                modal.classList.remove('hidden');
            };
        });

        document.getElementById('cancelar').onclick = () => {
            modal.classList.add('hidden');
        };

        document.getElementById('continuar').onclick = () => {
            // Guardamos para la siguiente pantalla
            localStorage.setItem('plan', planSeleccionado);
            localStorage.setItem('precio', precioSeleccionado);

            // Ir al detalle
            window.location.href = "detalle_membresia";
        };
    </script>


</body>

</html>