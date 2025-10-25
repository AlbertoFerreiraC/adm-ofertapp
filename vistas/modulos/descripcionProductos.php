<?php
if (session_status() === PHP_SESSION_NONE) {
  session_start();
}

$idUsuarioSesion = isset($_SESSION['id_usuario']) ? $_SESSION['id_usuario'] : '';
?>


<!doctype html>
<html lang="es">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1" />
  <title>Ofertapp – Detalle</title>

  <style>
    :root {
      --border: #e9e9e9;
      --bg-soft: #f6f7fb;
      --txt: #222;
      --muted: #6c757d;
      --primary: #0d6efd;
      --ok: #2e7d32;
      --warn: #c62828;
      --chip: #7a9c00;
      --chip-bg: #ecf6d3;
      --shadow: 0 2px 6px rgba(0, 0, 0, .06);
    }

    body {
      margin: 0;
      background: #fafafa;
      color: var(--txt);
      font-family: system-ui, -apple-system, Segoe UI, Roboto, Arial
    }

    .oferta-wrapper {
      max-width: 1100px;
      margin: 24px auto;
      padding: 0 16px
    }

    .card {
      background: #fff;
      border: 1px solid var(--border);
      border-radius: 12px;
      box-shadow: var(--shadow);
      overflow: hidden
    }

    /* Header */
    .oferta-header {
      display: flex;
      gap: 24px;
      align-items: flex-start;
      justify-content: space-between;
      margin-bottom: 14px
    }

    .oferta-head-left {
      flex: 1 1 auto
    }

    .oferta-chip {
      display: inline-block;
      font-size: 12px;
      font-weight: 900;
      color: var(--chip);
      background: var(--chip-bg);
      padding: 4px 8px;
      border-radius: 6px;
      margin-bottom: 6px
    }

    .oferta-title {
      font-size: 28px;
      line-height: 1.2;
      margin: 0 0 10px;
      font-weight: 900
    }

    .oferta-seller {
      display: flex;
      gap: 12px;
      align-items: flex-start
    }

    .oferta-seller-avatar {
      width: 48px;
      height: 48px;
      border-radius: 50%;
      object-fit: cover;
      border: 2px solid #fff;
      box-shadow: 0 0 0 1px var(--border)
    }

    .oferta-seller-name {
      font-weight: 800
    }

    .oferta-seller-link {
      color: var(--primary);
      text-decoration: none;
      font-size: 13px
    }

    .oferta-contact {
      display: flex;
      gap: 18px;
      flex-wrap: wrap;
      color: #444;
      margin-top: 6px
    }

    .oferta-contact i {
      color: var(--muted);
      margin-right: 6px
    }

    .oferta-contact a {
      color: var(--primary);
      text-decoration: none
    }

    .oferta-head-right {
      text-align: right;
      min-width: 220px
    }

    .oferta-actions {
      display: flex;
      gap: 8px;
      justify-content: flex-end;
      margin-bottom: 6px
    }

    .oferta-icon {
      width: 28px;
      height: 28px;
      border: 0;
      border-radius: 50%;
      display: flex;
      align-items: center;
      justify-content: center;
      background: #f1f3f5;
      color: #333;
      cursor: pointer
    }

    .oferta-icon.ok {
      background: #e9f7ef;
      color: var(--ok)
    }

    .oferta-icon.chat {
      background: #eaf5ff;
      color: #0b5ed7
    }

    .oferta-icon.warn {
      background: #fdecea;
      color: var(--warn)
    }

    .oferta-price {
      font-size: 28px;
      font-weight: 900;
      color: #111
    }

    /* Meta band */
    .oferta-meta {
      display: grid;
      grid-template-columns: repeat(6, 1fr);
      gap: 10px;
      padding: 10px 14px;
      margin-bottom: 14px
    }

    .oferta-meta div {
      font-size: 13px;
      color: #555
    }

    .oferta-meta span {
      color: #777;
      margin-right: 6px
    }

    @media (max-width:980px) {
      .oferta-meta {
        grid-template-columns: repeat(2, 1fr)
      }
    }

    /* Layout Top */
    .oferta-top {
      display: grid;
      grid-template-columns: 1.15fr .85fr;
      column-gap: 12px;
      row-gap: 4px;
      grid-template-areas: "gal reviews" "desc reviews";
      align-items: start
    }

    .oferta-gallery {
      grid-area: gal;
      padding: 12px
    }

    .oferta-reviews {
      grid-area: reviews;
      padding: 14px 16px
    }

    .oferta-desc {
      grid-area: desc;
      padding: 14px 18px;
      margin-top: 0
    }

    @media (max-width:960px) {
      .oferta-top {
        grid-template-columns: 1fr;
        grid-template-areas: "gal" "desc" "reviews";
        row-gap: 10px
      }
    }

    /* Galería */
    .oferta-gallery-main {
      width: 100%;
      height: 360px;
      border-radius: 12px;
      background: var(--bg-soft);
      margin-bottom: 10px;
      overflow: hidden
    }

    .oferta-gallery-main .swiper-slide {
      display: flex;
      justify-content: center;
      align-items: center
    }

    .oferta-gallery-main img {
      max-width: 80%;
      max-height: 100%;
      object-fit: contain;
      display: block
    }

    .oferta-gallery-main .swiper-button-prev,
    .oferta-gallery-main .swiper-button-next {
      width: 36px;
      height: 36px;
      border-radius: 50%;
      background: rgba(0, 0, 0, .5);
      color: #fff
    }

    .oferta-gallery-main .swiper-button-prev:after,
    .oferta-gallery-main .swiper-button-next:after {
      font-size: 16px
    }

    .oferta-gallery-thumbs {
      padding: 4px 0
    }

    .oferta-gallery-thumbs .swiper-slide {
      width: 84px;
      height: 70px;
      border-radius: 8px;
      overflow: hidden;
      opacity: .6;
      border: 2px solid transparent;
      cursor: pointer
    }

    .oferta-gallery-thumbs .swiper-slide-thumb-active {
      opacity: 1;
      border-color: #6aa4ff
    }

    .oferta-gallery-thumbs img {
      width: 100%;
      height: 100%;
      object-fit: cover
    }

    @media (max-width:720px) {
      .oferta-gallery-main {
        height: 240px
      }

      .oferta-gallery-main img {
        max-width: 90%
      }
    }

    /* Reseñas */
    .reviews-head {
      display: flex;
      align-items: center;
      justify-content: space-between;
      gap: 10px;
      margin-bottom: 10px
    }

    .reviews-title {
      margin: 0;
      font-size: 18px;
      font-weight: 800;
      display: flex;
      align-items: center;
      gap: 8px
    }

    .rating-badge {
      display: inline-flex;
      align-items: center;
      gap: 6px;
      background: #fff7e6;
      border: 1px solid #ffe2a8;
      color: #a66900;
      border-radius: 999px;
      padding: 4px 10px;
      font-weight: 800
    }

    .stars {
      color: #ffb400
    }

    .muted {
      color: #6b7280;
      font-size: 13px
    }

    .dist {
      display: grid;
      gap: 6px;
      margin: 10px 0 12px
    }

    .dist-row {
      display: flex;
      align-items: center;
      gap: 8px
    }

    .dist-row span {
      width: 26px;
      font-size: 12px;
      color: #555
    }

    .bar {
      flex: 1;
      height: 8px;
      background: #eef2f7;
      border-radius: 999px;
      overflow: hidden
    }

    .bar .fill {
      height: 100%;
      background: linear-gradient(90deg, #6aa4ff, #3b82f6);
      width: 0
    }

    .pct {
      width: 36px;
      text-align: right;
      font-size: 12px;
      color: #555
    }

    .reviews-actions {
      display: flex;
      gap: 8px;
      flex-wrap: wrap;
      margin: 8px 0 12px
    }

    .btn {
      border: 1px solid var(--border);
      background: #fff;
      border-radius: 8px;
      padding: 6px 10px;
      font-size: 13px;
      cursor: pointer
    }

    .btn.active {
      border-color: #3b82f6;
      color: #0b5ed7;
      background: #eaf5ff
    }

    .review-item {
      border-top: 1px solid var(--border);
      padding: 10px 0
    }

    .review-head {
      display: flex;
      align-items: center;
      gap: 10px;
      margin-bottom: 6px
    }

    .avatar {
      width: 32px;
      height: 32px;
      border-radius: 50%;
      object-fit: cover
    }

    .review-name {
      font-weight: 700
    }

    .review-date {
      font-size: 12px;
      color: #6b7280
    }

    .review-text {
      margin: 4px 0 0;
      color: #374151;
      font-size: 14px;
      line-height: 1.45
    }

    .review-form {
      border-top: 1px solid var(--border);
      margin-top: 10px;
      padding-top: 10px
    }

    .star-input {
      display: flex;
      flex-direction: row-reverse;
      justify-content: flex-end;
      gap: 4px
    }

    .star-input input {
      display: none
    }

    .star-input label {
      cursor: pointer;
      color: #d1d5db;
      font-size: 18px
    }

    .star-input input:checked~label,
    .star-input label:hover,
    .star-input label:hover~label {
      color: #ffb400
    }

    .review-form textarea {
      width: 100%;
      min-height: 80px;
      border: 1px solid var(--border);
      border-radius: 8px;
      padding: 8px;
      resize: vertical
    }

    .review-form .form-actions {
      display: flex;
      justify-content: flex-end;
      margin-top: 8px
    }

    .review-form .btn-submit {
      background: #111;
      color: #fff;
      border: 0;
      padding: 8px 12px;
      border-radius: 8px;
      cursor: pointer
    }

    /* Ubicación */
    .oferta-ubic {
      padding: 14px 18px;
      margin-top: 14px
    }

    .oferta-ubic-head {
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin-bottom: 10px
    }

    .oferta-ubic-head h3 {
      margin: 0;
      display: flex;
      gap: 8px;
      align-items: center
    }

    .oferta-link {
      text-decoration: none;
      color: var(--primary)
    }

    .oferta-ubic-grid {
      display: grid;
      grid-template-columns: 1fr 1.3fr;
      gap: 16px
    }

    .oferta-map {
      width: 100%;
      height: 280px;
      border-radius: 10px;
      background: #eef2f7
    }

    @media (max-width:900px) {
      .oferta-ubic-grid {
        grid-template-columns: 1fr
      }
    }

    .reviews-list {
      max-height: 250px;
      overflow-y: auto;
      padding-right: 6px;
    }

    .btn-reserva {
      background: #007bff;
      color: #fff;
      font-weight: 700;
      border: none;
      border-radius: 8px;
      padding: 10px 16px;
      cursor: pointer;
      transition: background 0.3s ease, transform 0.2s ease;
      width: 100%;
      margin-top: 8px;
    }

    .btn-reserva:hover {
      background: #0056b3;
      transform: scale(1.03);
    }

    .btn-reserva:active {
      background: #003f88;
      transform: scale(0.98);
    }

    #modalReserva .form-control {
      border-radius: 8px;
      border: 1px solid #ccc;
    }

    #modalReserva .btn-primary {
      background: #007bff;
      border: none;
      font-weight: 600;
    }

    #modalReserva .btn-primary:hover {
      background: #0056b3;
    }
  </style>
</head>

<body>
  <input type="hidden" id="idUsuarioSesion" value="<?php echo $_SESSION['id_usuario'] ?? ''; ?>">

  <div class="content-wrapper">
    <section class="oferta-wrapper">
      <!-- ================== CABECERA ================== -->
      <header class="oferta-header">
        <div class="oferta-head-left">
          <div class="oferta-chip" id="estadoProducto">VENDO</div>
          <h1 class="oferta-title" id="tituloProducto">Título del producto</h1>

          <div class="oferta-seller">
            <img class="oferta-seller-avatar" src="vistas/img/plantilla/avatar-generico.png" alt="Foto del vendedor">
            <div>
              <div class="oferta-seller-name" id="nombreVendedor">Nombre del vendedor</div>
              <div class="oferta-contact" id="contactoVendedor"></div>
            </div>
          </div>
        </div>

        <div class="oferta-head-right">
          <div class="oferta-actions">
            <button class="oferta-icon ok" title="Disponible"><i class="fa-solid fa-check"></i></button>
            <button class="oferta-icon chat" title="Chatear"><i class="fa-solid fa-comments"></i></button>
            <button class="oferta-icon warn" title="Reportar"><i class="fa-solid fa-triangle-exclamation"></i></button>
          </div>
          <div class="oferta-price" id="precioProducto">Gs. 0</div>
          <button id="btnReserva" class="btn-reserva">Reservar producto</button>

        </div>
      </header>

      <!-- ================== META ================== -->
      <section class="oferta-meta card" id="metaProducto">
        <div><span>Departamento:</span><b id="departamento"></b></div>
        <div><span>Ciudad:</span><b id="ciudad"></b></div>
        <div><span>Barrio:</span><b id="barrio"></b></div>
        <div><span>Stock:</span><b id="cantidad"></b></div>
      </section>

      <!-- ================== LAYOUT TOP ================== -->
      <section class="oferta-top">
        <!-- Galería -->
        <section class="oferta-gallery card">
          <div class="swiper oferta-gallery-main">
            <div class="swiper-wrapper" id="galeriaPrincipal"></div>
            <div class="swiper-button-prev"></div>
            <div class="swiper-button-next"></div>
            <div class="swiper-pagination"></div>
          </div>

          <div class="swiper oferta-gallery-thumbs">
            <div class="swiper-wrapper" id="galeriaThumbs"></div>
          </div>
        </section>

        <!-- Descripción -->
        <section class="oferta-desc card">
          <h3>Descripción</h3>
          <p id="descProducto">Aquí se carga la descripción desde la base de datos.</p>
          <ul id="detallesProducto" style="margin:0 0 6px 18px;color:#555"></ul>
        </section>

        <!-- Reseñas -->
        <aside class="oferta-reviews card" id="reviews">
          <div class="reviews-head">
            <h3 class="reviews-title"><i class="fa-solid fa-star stars"></i> Reseñas</h3>
            <div class="rating-badge">
              <span class="avg-score" id="avgScore">0.0</span>
              <span class="stars" id="ratingProducto">☆☆☆☆☆</span>
              <span class="muted" id="reviewsCount">(0)</span>
            </div>
          </div>

          <div class="dist" id="dist"></div>

          <div class="reviews-actions">
            <button class="btn active" data-sort="recientes">Más recientes</button>
            <button class="btn" data-sort="mejores">Mejor puntuadas</button>
            <button class="btn" data-sort="peores">Peor puntuadas</button>
          </div>

          <div class="reviews-list" id="reviewsList">
            <p class="muted" id="noReviews">Sé el primero en dejar tu reseña</p>
          </div>


          <form class="review-form" id="reviewForm">
            <label class="muted">Tu calificación</label>
            <div class="star-input" aria-label="Seleccionar estrellas">
              <input type="radio" name="rating" id="star5" value="5"><label for="star5"><i class="fa-solid fa-star"></i></label>
              <input type="radio" name="rating" id="star4" value="4"><label for="star4"><i class="fa-solid fa-star"></i></label>
              <input type="radio" name="rating" id="star3" value="3"><label for="star3"><i class="fa-solid fa-star"></i></label>
              <input type="radio" name="rating" id="star2" value="2"><label for="star2"><i class="fa-solid fa-star"></i></label>
              <input type="radio" name="rating" id="star1" value="1"><label for="star1"><i class="fa-solid fa-star"></i></label>
            </div>
            <label class="muted" for="reviewText">Comentario</label>
            <textarea id="reviewText" placeholder="Contanos tu experiencia (mín. 10 caracteres)"></textarea>
            <div class="form-actions"><button type="submit" class="btn-submit">Publicar reseña</button></div>
          </form>
        </aside>
      </section>

      <!-- ================== UBICACIÓN ================== -->
      <section class="oferta-ubic card">
        <div class="oferta-ubic-head">
          <h3><i class="fa-solid fa-location-dot"></i> Ubicación del vendedor</h3>
          <a id="ofertaComoLlegar" class="oferta-link" target="_blank"><i class="fa-solid fa-route"></i> Cómo llegar</a>
        </div>
        <div class="oferta-ubic-grid">
          <div class="oferta-ubic-info" id="direccionVendedor"></div>
          <div id="ofertaMap" class="oferta-map"></div>
        </div>
      </section>
    </section>
  </div>

  <!-- ================== MODAL DE RESERVA ================== -->
  <div class="modal fade" id="modalReserva" tabindex="-1" aria-labelledby="modalReservaLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content" style="border-radius: 12px; overflow: hidden;">
        <div class="modal-header" style="background-color: #007bff; color: #fff;">
          <h5 class="modal-title" id="modalReservaLabel"><i class="fa-solid fa-cart-plus"></i> Realizar reserva</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar" style="background:none;border:0;color:#fff;font-size:20px;">×</button>
        </div>
        <div class="modal-body">
          <form id="formReserva">
            <input type="hidden" id="reservaProductoId">

            <div class="mb-3">
              <label for="cantidadReserva" class="form-label"><b>Cantidad a reservar:</b></label>
              <input type="number" id="cantidadReserva" class="form-control" min="1" placeholder="Ingrese cantidad" required>
            </div>

            <div class="mb-3">
              <label for="comentarioReserva" class="form-label"><b>Comentario (opcional):</b></label>
              <textarea id="comentarioReserva" class="form-control" rows="3" placeholder="Ingrese un comentario si desea..."></textarea>
            </div>

            <div class="text-end">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
              <button type="submit" class="btn btn-primary">Confirmar reserva</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>


  <script src="vistas/js/descripcionProducto.js"></script>
</body>

</html>