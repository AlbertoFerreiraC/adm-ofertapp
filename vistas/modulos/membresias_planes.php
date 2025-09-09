<div class="content-wrapper">

    <!-- Banner reducido -->
    <section class="hero-banner">
        <h1>Planes de Membresía</h1>
    </section>

    <!-- Sección de Planes -->
    <section class="content membership-section">

        <div class="planes-container">

            <!-- Plan Básico -->
            <div class="plan basico">
                <h2>Plan Básico</h2>
                <p class="precio">$15 <span>/mes</span></p>
                <ul>
                    <li>Hasta 100 productos</li>
                    <li>Panel de gestión básico</li>
                    <li>Mapa de comercios cercanos</li>
                    <li>Reportes mensuales</li>
                </ul>
                <div class="btn-container">
                    <a href="#" class="btn">Elegir Plan</a>
                </div>
            </div>

            <!-- Plan Profesional -->
            <div class="plan profesional">
                <h2>Plan Profesional</h2>
                <p class="precio">$40 <span>/mes</span></p>
                <ul>
                    <li>Hasta 500 productos</li>
                    <li>Reportes avanzados</li>
                    <li>Prioridad en búsquedas</li>
                    <li>Soporte preferencial</li>
                    <li>Campañas promocionales</li>
                </ul>
                <div class="btn-container">
                    <a href="#" class="btn">Elegir Plan</a>
                </div>
            </div>

            <!-- Plan Premium -->
            <div class="plan premium">
                <h2>Plan Premium</h2>
                <p class="precio">$80 <span>/mes</span></p>
                <ul>
                    <li>Productos ilimitados</li>
                    <li>Estadísticas en tiempo real</li>
                    <li>Posicionamiento destacado</li>
                    <li>Integración con inventario</li>
                    <li>Soporte VIP 24/7</li>
                    <li>Marketing personalizado</li>
                </ul>
                <div class="btn-container">
                    <a href="#" class="btn">Elegir Plan</a>
                </div>
            </div>

        </div>
    </section>
</div>

<!-- ================== CSS ================== -->
<style>
    :root {
        --negro: #000000;
        --naranja: #EF682F;
        --azul: #023351;
        --azul-oscuro: #02304D;
        --beige: #ECC7AF;
        --blanco: #ffffff;
    }

    .content-wrapper {
        background: #f5f7fa;
        min-height: 100vh;
    }

    /* Banner reducido */
    .hero-banner {
        background: var(--naranja);
        color: var(--blanco);
        text-align: center;
        padding: 20px;
        /* mucho más pequeño */
        width: 100%;
        margin: 0 0 20px 0;
        /* deja un espacio abajo */
    }

    .hero-banner h1 {
        font-size: 24px;
        font-weight: 700;
        margin: 0;
    }

    .membership-section {
        max-width: 1200px;
        margin: 20px auto;
        padding: 0 20px;
    }

    .planes-container {
        display: flex;
        justify-content: center;
        gap: 20px;
    }

    /* Tarjetas */
    .plan {
        flex: 1 1 30%;
        min-width: 280px;
        border-radius: 14px;
        padding: 30px 20px;
        text-align: center;
        box-shadow: 0 6px 20px rgba(0, 0, 0, 0.3);
        transition: transform 0.3s ease, box-shadow 0.3s ease;

        display: flex;
        flex-direction: column;
        justify-content: space-between;
    }

    .plan:hover {
        transform: translateY(-8px);
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.5);
    }

    .plan h2 {
        font-size: 1.6rem;
        margin-bottom: 10px;
    }

    .precio {
        font-size: 2.2rem;
        font-weight: bold;
        margin: 15px 0;
    }

    .precio span {
        font-size: 1rem;
        color: var(--beige);
    }

    .plan ul {
        list-style: none;
        padding: 0;
        margin: 20px 0;
        text-align: left;
    }

    .plan ul li {
        margin-bottom: 12px;
        padding-left: 25px;
        position: relative;
    }

    .plan ul li::before {
        content: "✔";
        color: var(--naranja);
        position: absolute;
        left: 0;
    }

    /* Botones */
    .btn-container {
        margin-top: auto;
        text-align: center;
    }

    .btn {
        display: inline-block;
        padding: 12px 20px;
        background-color: var(--naranja);
        color: var(--blanco);
        text-decoration: none;
        border-radius: 8px;
        font-weight: bold;
        transition: background-color 0.3s ease;
    }

    .btn:hover {
        background-color: #d85c24;
    }

    /* Colores por plan */
    .basico {
        background-color: var(--beige);
        color: var(--negro);
    }

    .profesional {
        background-color: var(--azul);
        color: var(--blanco);
    }

    .premium {
        background-color: var(--naranja);
        color: var(--blanco);
    }

    .premium .btn {
        background-color: var(--azul-oscuro);
    }

    .premium .btn:hover {
        background-color: var(--azul);
    }

    /* Responsive */
    @media (max-width: 992px) {
        .planes-container {
            flex-wrap: wrap;
        }

        .plan {
            flex: 1 1 45%;
        }
    }

    @media (max-width: 600px) {
        .planes-container {
            flex-direction: column;
            align-items: center;
        }

        .plan {
            flex: 1 1 100%;
        }
    }
</style>