<div class="content-wrapper">

    <!-- Banner -->
    <section class="hero-banner">
        <h1>Acerca de OfertApp</h1>
    </section>

    <section class="content about-section">

        <!-- Intro -->
        <p class="intro">
            <b>OfertApp</b> es una aplicación web paraguaya que conecta a comerciantes y clientes,
            permitiendo comparar precios en tiempo real. Nuestro objetivo es mejorar la economía
            de los hogares y dar mayor visibilidad a los comercios locales.
        </p>

        <!-- Misión -->
        <div class="about-row">
            <div class="about-img">
                <img src="vistas/img/plantilla/mision.png" alt="Misión OfertApp">
            </div>
            <div class="about-text">
                <h2>Misión</h2>
                <p>Facilitar a los hogares paraguayos la comparación de precios en tiempo real,
                    contribuyendo al ahorro familiar y la transparencia en el comercio.</p>
            </div>
        </div>

        <!-- Visión -->
        <div class="about-row reverse">
            <div class="about-text">
                <h2>Visión</h2>
                <p>Ser la plataforma líder en Paraguay en comparación de precios,
                    reconocida por su confiabilidad, innovación y cercanía con el usuario.</p>
            </div>
            <div class="about-img">
                <img src="vistas/img/plantilla/vision.png" alt="Visión OfertApp">
            </div>
        </div>

        <!-- Valores -->
        <div class="about-block">
            <h2>Valores</h2>
            <ul>
                <li>Transparencia</li>
                <li>Innovación</li>
                <li>Compromiso social</li>
            </ul>
        </div>

        <!-- Contacto -->
        <div class="about-block">
            <h2>Contacto</h2>
            <p><b>Email:</b> contacto@ofertapp.com</p>
            <p><b>Teléfono:</b> (000) 123-456</p>
        </div>

        <!-- Carrusel de reseñas -->
        <h2 style="text-align:center; margin-top:40px;">Lo que dicen nuestros usuarios</h2>
        <div class="reviews-carousel" id="reviewsCarousel">
            <div class="review-item active">
                <p>"Con OfertApp encontré el mismo producto 30% más barato en mi barrio." <br><small>– Usuario 1</small></p>
            </div>
            <div class="review-item">
                <p>"Me ayudó a elegir el supermercado adecuado para mi compra semanal." <br><small>– Usuario 2</small></p>
            </div>
            <div class="review-item">
                <p>"Es muy fácil de usar y me hace ahorrar tiempo y dinero." <br><small>– Usuario 3</small></p>
            </div>
        </div>
    </section>
</div>
<!-- ================== CSS ================== -->
<style>
    .hero-banner {
        background: #f08438;
        color: #fff;
        text-align: center;
        padding: 40px 20px;
    }

    .hero-banner h1 {
        font-size: 28px;
        font-weight: 600;
        margin: 0;
    }

    /* Contenedor general */
    .about-section {
        max-width: 1000px;
        margin: 40px auto;
        padding: 0 20px;
    }

    .intro {
        font-size: 16px;
        line-height: 1.7;
        margin-bottom: 50px;
        text-align: center;
        color: #333;
    }

    /* Fila misión/visión */
    .about-row {
        display: flex;
        align-items: center;
        gap: 30px;
        margin-bottom: 50px;
    }

    .about-row.reverse {
        flex-direction: row-reverse;
    }

    .about-img img {
        width: 100%;
        max-width: 420px;
        border-radius: 10px;
    }

    .about-text h2 {
        color: #f08438;
        margin-bottom: 12px;
        font-size: 22px;
    }

    .about-text p {
        font-size: 15px;
        line-height: 1.7;
        color: #444;
    }

    /* Valores y contacto */
    .about-block {
        margin-bottom: 40px;
    }

    .about-block h2 {
        color: #f08438;
        font-size: 20px;
        margin-bottom: 12px;
    }

    .about-block ul {
        padding-left: 20px;
        color: #444;
    }

    /* Carrusel */
    .reviews-carousel {
        position: relative;
        margin: 20px auto;
        max-width: 650px;
        height: 120px;
        overflow: hidden;
    }

    .review-item {
        position: absolute;
        width: 100%;
        opacity: 0;
        transition: opacity 1s ease-in-out;
        text-align: center;
        font-size: 15px;
        line-height: 1.6;
        color: #333;
        padding: 15px;
    }

    .review-item.active {
        opacity: 1;
        position: relative;
    }

    /* Responsive */
    @media (max-width: 768px) {
        .about-row {
            flex-direction: column;
            text-align: center;
        }

        .about-row.reverse {
            flex-direction: column;
        }
    }
</style>

<!-- ================== JS ================== -->
<script>
    let currentReview = 0;
    const reviews = document.querySelectorAll(".review-item");

    setInterval(() => {
        reviews[currentReview].classList.remove("active");
        currentReview = (currentReview + 1) % reviews.length;
        reviews[currentReview].classList.add("active");
    }, 4000);
</script>