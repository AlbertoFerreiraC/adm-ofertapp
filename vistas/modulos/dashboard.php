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
            <a href="#" class="categoria-item" data-categoria="CamaBaño">
              <div class="categoria-imagen">
                <img src="vistas/img/plantilla/camaBaño.png" alt="Cama y baño">
              </div>
              <span class="categoria-nombre">Cama Baño</span>
            </a>
          </div>

          <div class="swiper-slide">
            <a href="#" class="categoria-item" data-categoria="Deportes">
              <div class="categoria-imagen">
                <img src="vistas/img/plantilla/deportes.png" alt="Deportes">
              </div>
              <span class="categoria-nombre">Deportes</span>
            </a>
          </div>

          <div class="swiper-slide">
            <a href="#" class="categoria-item" data-categoria="Jugueteria">
              <div class="categoria-imagen">
                <img src="vistas/img/plantilla/jugueteria.png" alt="Jugueteria">
              </div>
              <span class="categoria-nombre">Jugueteria</span>
            </a>
          </div>

          <div class="swiper-slide">
            <a href="#" class="categoria-item" data-categoria="Moda">
              <div class="categoria-imagen">
                <img src="vistas/img/plantilla/modaAccesorios.png" alt="modaAccesorios">
              </div>
              <span class="categoria-nombre">Moda y Accesorios</span>
            </a>
          </div>

          <div class="swiper-slide">
            <a href="#" class="categoria-item" data-categoria="Muebles">
              <div class="categoria-imagen">
                <img src="vistas/img/plantilla/muebles.png" alt="Muebles">
              </div>
              <span class="categoria-nombre">Muebles</span>
            </a>
          </div>

          <div class="swiper-slide">
            <a href="#" class="categoria-item" data-categoria="Zapatos">
              <div class="categoria-imagen">
                <img src="vistas/img/plantilla/Zapatos.png" alt="Zapatos">
              </div>
              <span class="categoria-nombre">Zapatos</span>
            </a>
          </div>

          <div class="swiper-slide">
            <a href="#" class="categoria-item" data-categoria="Electrodomesticos">
              <div class="categoria-imagen">
                <img src="vistas/img/plantilla/electrodomesticos.png" alt="Electrodomesticos">
              </div>
              <span class="categoria-nombre">Electrodomesticos</span>
            </a>
          </div>


          <!-- Botones de navegación -->
          <div class="swiper-button-next"></div>
          <div class="swiper-button-prev"></div>
        </div>
      </div>
  </section>


  <!-- ==== SECCIÓN PRODUCTOS DESTACADOS (CARRUSEL) ==== -->
  <section class="productos-section">
    <div class="titulo-contenedor">
      <h2 class="titulo-resaltado">
        <a href="ofertas_activas" class="link-ofertas">
          Ofertas y <span class="highlight">Promociones 🔥</span>
        </a>
      </h2>
    </div>

    <div class="swiper productos-slider">
      <div class="swiper-wrapper">
        <!-- 🟡 Contenido dinámico cargado por JS -->
      </div>

      <!-- Botones de navegación -->
      <div class="swiper-button-next"></div>
      <div class="swiper-button-prev"></div>
      <div class="swiper-pagination"></div>
    </div>
  </section>


  <!-- ==== SECCIÓN PRODUCTOS MÁS VENDIDOS ==== -->
  <section class="masvendidos-section">
    <div class="titulo-contenedor">
      <h2 class="titulo-resaltado">
        <a href="productos" class="link-productos">
          Productos <span class="highlight">más vendidos 🏆</span>
        </a>
      </h2>
    </div>

    <div class="swiper masvendidos-slider">
      <div class="swiper-wrapper">
        <!-- 🟡 Contenido dinámico cargado por JS -->
      </div>

      <!-- Botones y paginación propios de esta sección -->
      <div class="swiper-button-next"></div>
      <div class="swiper-button-prev"></div>
      <div class="swiper-pagination"></div>
    </div>
  </section>

  <!-- Modal Ver Mapa -->
  <div class="modal fade" id="modalVerMapa" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Ubicación del producto</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body" style="height: 400px;">
          <div id="mapVer" style="width:100%; height:100%;"></div>
        </div>
      </div>
    </div>
  </div>

</div>

<script src="vistas/js/dashboard.js"></script>
<!-- ==== ESTILOS ==== -->
<style>
  /* Encabezado */
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

  /* Categorías */
  .categorias-section-container {
    width: 100%;
    padding: 20px;
  }

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

  .titulo-contenedor {
    display: flex;
    justify-content: center;
    /* centra horizontal */
    align-items: center;
    /* centra vertical si el padre tiene altura */
    margin: 20px 0;
  }

  /* Estilo del letrero */
  .titulo-resaltado {
    font-size: 38px;
    font-weight: 900;
    color: #fff;
    text-transform: uppercase;
    padding: 12px 25px;
    background: linear-gradient(90deg, #ff0000, #ff9800, #ff0000);
    border-radius: 8px;
    display: inline-block;
    text-align: center;
    animation: mover 3s linear infinite, parpadeo 1.5s infinite;
  }

  /* Resaltado */
  .titulo-resaltado .highlight {
    color: #ffeb3b;
    text-shadow: 0px 0px 10px #ff0000;
  }

  /* Animaciones */
  @keyframes mover {
    0% {
      transform: translateX(-5px);
    }

    50% {
      transform: translateX(5px);
    }

    100% {
      transform: translateX(-5px);
    }
  }

  @keyframes parpadeo {

    0%,
    100% {
      opacity: 1;
    }

    50% {
      opacity: 0.7;
    }
  }

  /* Productos destacados */
  .productos-section {
    padding: 30px;
    background: #f8f9fa;
  }

  .producto-card {
    border: 1px solid #ddddddff;
    border-radius: 10px;
    background: #fff;
    box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
    overflow: hidden;
    transition: transform 0.2s;
    display: flex;
    flex-direction: column;
    height: 100%;
    /* fuerza a que ocupe todo el slide */
    min-height: 380px;
    /* altura mínima igual para todos */
    max-height: 380px;
    /* altura máxima igual para todos */
  }

  .producto-card:hover {
    transform: scale(1.03);
  }

  .producto-imagen {
    width: 100%;
    height: 180px;
    /* todas las imágenes con la misma altura */
    object-fit: cover;
    /* recorta sin deformar */
    flex-shrink: 0;
  }


  .producto-detalle {
    padding: 15px;
    flex: 1;
    /* ocupa el resto del espacio */
    display: flex;
    flex-direction: column;
    justify-content: space-between;
  }

  .producto-nombre {
    font-size: 16px;
    font-weight: 600;
    margin-bottom: 8px;
  }

  .producto-precio {
    font-size: 18px;
    font-weight: bold;
    color: #063654;
  }

  .precio-anterior {
    text-decoration: line-through;
    color: #999;
    margin-left: 5px;
    font-size: 14px;
  }

  .producto-tienda {
    font-size: 14px;
    color: #666;
    margin: 5px 0;
  }

  .producto-rating {
    color: #ff9900;
    font-size: 16px;
  }

  .productos-slider {
    padding: 10px 40px;
    /* espacio para flechas */
  }

  /* ===== Productos más vendidos (scoped) ===== */
  .masvendidos-section {
    padding: 30px;
    background: #ffffff;
    /* o #f8f9fa si quieres igual que promociones */
    margin-top: 10px;
  }

  /* Espaciado interno del carrusel, deja lugar a las flechas */
  .masvendidos-section .masvendidos-slider {
    padding: 10px 40px;
  }

  /* Opcional: diferenciar sutilmente el título usando tu mismo letrero */
  .masvendidos-section .titulo-resaltado .highlight {
    color: #ffeb3b;
    text-shadow: 0 0 10px #ff0000;
  }

  /* Wrapper para superponer el icono sin romper el layout */
  .producto-img-wrapper {
    position: relative;
    width: 100%;
    height: 180px;
    /* misma altura que tus imágenes */
    overflow: hidden;
    flex-shrink: 0;
    background: #f6f7fb;
  }

  .producto-img-wrapper .producto-imagen {
    width: 100%;
    height: 100%;
    object-fit: cover;
    display: block;
  }

  /* Icono de ubicación superpuesto */
  .icono-ubicacion {
    position: absolute;
    top: 8px;
    right: 8px;
    background: rgba(0, 0, 0, 0.6);
    color: #fff;
    padding: 6px;
    border: 0;
    border-radius: 50%;
    font-size: 14px;
    line-height: 1;
    cursor: pointer;
    transition: transform .2s, background .2s;
  }

  .icono-ubicacion:hover {
    transform: scale(1.1);
    background: #e53935;
  }
</style>


<!-- ==== SCRIPT SWIPER ==== -->
<script>
  /* Slider categorías */
  const categoriasSwiper = new Swiper('.categorias-slider', {
    slidesPerView: 5,
    spaceBetween: 9,
    loop: true,
    navigation: {
      nextEl: '.categorias-section .swiper-button-next',
      prevEl: '.categorias-section .swiper-button-prev',
    },
    breakpoints: {
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

  /* Slider productos destacados */
  const productosSwiper = new Swiper('.productos-slider', {
    slidesPerView: 4,
    spaceBetween: 20,
    loop: true,
    navigation: {
      nextEl: '.productos-section .swiper-button-next',
      prevEl: '.productos-section .swiper-button-prev',
    },
    pagination: {
      el: '.productos-section .swiper-pagination',
      clickable: true,
    },

    autoplay: {
      delay: 3200,
      disableOnInteraction: false
    },
    breakpoints: {
      320: {
        slidesPerView: 1,
        spaceBetween: 10
      },
      640: {
        slidesPerView: 2,
        spaceBetween: 15
      },
      1024: {
        slidesPerView: 4,
        spaceBetween: 20
      },
    }
  });

  /* Slider: Productos más vendidos (independiente del de promociones) */
  const masVendidosSwiper = new Swiper('.masvendidos-slider', {
    slidesPerView: 4,
    spaceBetween: 20,
    loop: true,
    navigation: {
      nextEl: '.masvendidos-section .swiper-button-next',
      prevEl: '.masvendidos-section .swiper-button-prev',
    },
    pagination: {
      el: '.masvendidos-section .swiper-pagination',
      clickable: true,
    },
    autoplay: {
      delay: 3200,
      disableOnInteraction: false
    },
    breakpoints: {
      320: {
        slidesPerView: 1,
        spaceBetween: 10
      },
      640: {
        slidesPerView: 2,
        spaceBetween: 15
      },
      1024: {
        slidesPerView: 4,
        spaceBetween: 20
      }
    }
  });
</script>
