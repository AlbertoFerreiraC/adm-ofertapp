<!-- ==== SECCIÓN CATEGORÍAS ==== -->
<div class="content-wrapper">
    <section class="content-header" style="padding:0;">
        <div class="contenedor-recortado">
            <h1 class="titulo-recortado">Lo mejor de nuestras tiendas</h1>
        </div>
    </section>

    <section class="categorias-section">
        <div class="categorias-section-container">
            <div class="swiper categorias-slider">
                <div class="swiper-wrapper">

                    <div class="swiper-slide">
                        <a href="#" class="categoria-item">
                            <div class="categoria-imagen">
                                <img src="vistas/img/plantilla/camaBaño.png" alt="Cama y baño">
                            </div>
                            <span class="categoria-nombre">Cama Baño</span>
                        </a>
                    </div>

                    <div class="swiper-slide">
                        <a href="#" class="categoria-item">
                            <div class="categoria-imagen">
                                <img src="vistas/img/plantilla/deportes.png" alt="Deportes">
                            </div>
                            <span class="categoria-nombre">Deportes</span>
                        </a>
                    </div>

                    <div class="swiper-slide">
                        <a href="#" class="categoria-item">
                            <div class="categoria-imagen">
                                <img src="vistas/img/plantilla/jugueteria.png" alt="jugueteria">
                            </div>
                            <span class="categoria-nombre">Jugueteria</span>
                        </a>
                    </div>

                    <div class="swiper-slide">
                        <a href="#" class="categoria-item">
                            <div class="categoria-imagen">
                                <img src="vistas/img/plantilla/modaAccesorios.png" alt="modaAccesorios">
                            </div>
                            <span class="categoria-nombre">Moda y Accesorios</span>
                        </a>
                    </div>

                    <div class="swiper-slide">
                        <a href="#" class="categoria-item">
                            <div class="categoria-imagen">
                                <img src="vistas/img/plantilla/muebles.png" alt="muebles">
                            </div>
                            <span class="categoria-nombre">Muebles</span>
                        </a>
                    </div>

                    <div class="swiper-slide">
                        <a href="#" class="categoria-item">
                            <div class="categoria-imagen">
                                <img src="vistas/img/plantilla/Zapatos.png" alt="Zapatos">
                            </div>
                            <span class="categoria-nombre">Zapatos</span>
                        </a>
                    </div>

                    <!-- Puedes añadir más slides aquí -->

                </div>

                <!-- Botones de navegación -->
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
            </div>
        </div>
    </section>

    <h2 class="titulo-resaltado">
    Ofertas y <span class="highlight">Promociones</span>
</h2>

   


</div>



<!-- ENCABEZADO -->
<style>
    /* Encabezado con imagen de fondo y texto recortado */
    .contenedor-recortado {
        width: 100%;
        height: 200px;
        background-image: url('vistas/img/plantilla/carritos.png');
        background-size: cover;
        background-position: center;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .titulo-recortado {
        font-family: 'Anton', sans-serif;
        font-size: 4em;
        font-weight: 900;
        color: white;
        mix-blend-mode: screen;
        background-color: black;
        padding: 10px 20px;
        text-align: center;
        text-transform: uppercase;
    }

    /* Contenedor de categorías */
    .categorias-section-container {
        width: 100%;
        padding: 20px;
    }

    /* Estilo de cada categoría */
    .categoria-item {
        display: flex;
        flex-direction: column;
        align-items: center;
        text-align: center;
        text-decoration: none;
        color: #333;
        transition: transform 0.2s;
    }

    .categoria-item:hover {
        transform: scale(1.05);
    }

    .categoria-imagen img {
        width: 120px;
        height: 120px;
        object-fit: contain;
        margin-bottom: 10px;
    }

    .categoria-nombre {
        font-weight: bold;
        font-size: 1em;
    }

    .swiper-slide {
        display: flex;
        justify-content: center;
        width: auto;
    }
     .titulo-resaltado {
        text-align: center;
        font-size: 30px;
        font-weight: 700;
        color: #063654; /* El azul oscuro como color principal */
        margin-bottom: 30px;
    }

    .titulo-resaltado .highlight {
        position: relative;
        display: inline-block;
        white-space: nowrap; /* Evita que la palabra se rompa */
    }

</style>


<script>
    const swiper = new Swiper('.categorias-slider', {
        slidesPerView: 5, // Número de slides visibles en desktop
        spaceBetween: 9, // Espacio entre slides
        loop: true, // Loop infinito
        direction: 'horizontal', // Desplazamiento horizontal
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
        breakpoints: { // Ajuste responsivo
            320: {
                slidesPerView: 1,
                spaceBetween: 5
            },
            640: {
                slidesPerView: 2,
                spaceBetween: 8
            },
            1024: {
                slidesPerView: 5,
                spaceBetween: 9
            },
        }
    });
</script>