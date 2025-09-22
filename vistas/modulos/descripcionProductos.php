<!doctype html>
<html lang="es">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1" />
  <title>Ofertapp – Detalle</title>

  <!-- Iconos -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"/>

  <!-- Swiper (carrusel) -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>

  <style>
    /* ====== Scope Ofertapp ====== */
    :root{
      --border:#e9e9e9; --bg-soft:#f6f7fb; --txt:#222; --muted:#6c757d; --primary:#0d6efd;
      --ok:#2e7d32; --warn:#c62828; --chip:#7a9c00; --chip-bg:#ecf6d3; --shadow:0 2px 6px rgba(0,0,0,.06);
    }
    body{margin:0;background:#fafafa;color:var(--txt);font-family:system-ui,-apple-system,Segoe UI,Roboto,Arial}
    .oferta-wrapper{max-width:1100px;margin:24px auto;padding:0 16px}
    .card{background:#fff;border:1px solid var(--border);border-radius:12px;box-shadow:var(--shadow);overflow:hidden}

    /* Header */
    .oferta-header{display:flex;gap:24px;align-items:flex-start;justify-content:space-between;margin-bottom:14px}
    .oferta-head-left{flex:1 1 auto}
    .oferta-chip{display:inline-block;font-size:12px;font-weight:900;color:var(--chip);background:var(--chip-bg);padding:4px 8px;border-radius:6px;margin-bottom:6px}
    .oferta-title{font-size:28px;line-height:1.2;margin:0 0 10px;font-weight:900}
    .oferta-seller{display:flex;gap:12px;align-items:flex-start}
    .oferta-seller-avatar{width:48px;height:48px;border-radius:50%;object-fit:cover;border:2px solid #fff;box-shadow:0 0 0 1px var(--border)}
    .oferta-seller-name{font-weight:800}
    .oferta-seller-link{color:var(--primary);text-decoration:none;font-size:13px}
    .oferta-contact{display:flex;gap:18px;flex-wrap:wrap;color:#444;margin-top:6px}
    .oferta-contact i{color:var(--muted);margin-right:6px}
    .oferta-contact a{color:var(--primary);text-decoration:none}

    .oferta-head-right{text-align:right;min-width:220px}
    .oferta-actions{display:flex;gap:8px;justify-content:flex-end;margin-bottom:6px}
    .oferta-icon{width:28px;height:28px;border:0;border-radius:50%;display:flex;align-items:center;justify-content:center;background:#f1f3f5;color:#333;cursor:pointer}
    .oferta-icon.ok{background:#e9f7ef;color:var(--ok)}
    .oferta-icon.chat{background:#eaf5ff;color:#0b5ed7}
    .oferta-icon.warn{background:#fdecea;color:var(--warn)}
    .oferta-price{font-size:28px;font-weight:900;color:#111}

    /* Meta band */
    .oferta-meta{display:grid;grid-template-columns:repeat(6,1fr);gap:10px;padding:10px 14px;margin-bottom:14px}
    .oferta-meta div{font-size:13px;color:#555}
    .oferta-meta span{color:#777;margin-right:6px}
    @media (max-width:980px){.oferta-meta{grid-template-columns:repeat(2,1fr)}}

    /* ====== TOP: Galería + Descripción + Reseñas (grid-areas) ====== */
   .oferta-top{
  display:grid;
  grid-template-columns: 1.15fr .85fr;
  column-gap:12px;   /* separación horizontal */
  row-gap:4px;       /* << antes era 12px; poné 0 si la querés pegada */
  grid-template-areas:
    "gal reviews"
    "desc reviews";
  align-items:start;
}
.oferta-gallery { grid-area: gal; }
.oferta-reviews { grid-area: reviews; }
.oferta-desc    { grid-area: desc; margin-top:0; }

@media (max-width:960px){
  .oferta-top{
    grid-template-columns:1fr;
    grid-template-areas:
      "gal"
      "desc"
      "reviews";
    row-gap:10px; /* opcional en mobile */
  }
}


    /* ====== Galería con Swiper ====== */
    .oferta-gallery{padding:12px}
    /* Principal */
    .oferta-gallery-main{
      width:100%; height:360px;             /* alto del recuadro principal */
      border-radius:12px; background:var(--bg-soft);
      margin-bottom:10px; overflow:hidden;
    }
    .oferta-gallery-main .swiper-slide{display:flex;justify-content:center;align-items:center}
    .oferta-gallery-main img{
      max-width:80%;                         /* tamaño relativo de la foto */
      max-height:100%; object-fit:contain; display:block;
    }
    /* Flechas compactas */
    .oferta-gallery-main .swiper-button-prev,
    .oferta-gallery-main .swiper-button-next{
      width:36px;height:36px;border-radius:50%;
      background:rgba(0,0,0,.5);color:#fff;
    }
    .oferta-gallery-main .swiper-button-prev:after,
    .oferta-gallery-main .swiper-button-next:after{font-size:16px}
    /* Thumbs */
    .oferta-gallery-thumbs{padding:4px 0}
    .oferta-gallery-thumbs .swiper-slide{
      width:84px;height:70px;border-radius:8px;overflow:hidden;
      opacity:.6;border:2px solid transparent;cursor:pointer;
    }
    .oferta-gallery-thumbs .swiper-slide-thumb-active{opacity:1;border-color:#6aa4ff}
    .oferta-gallery-thumbs img{width:100%;height:100%;object-fit:cover}
    @media (max-width:720px){
      .oferta-gallery-main{height:240px}
      .oferta-gallery-main img{max-width:90%}
    }

    /* ====== Reseñas / Comentarios ====== */
    .oferta-reviews{padding:14px 16px}
    .reviews-head{display:flex;align-items:center;justify-content:space-between;gap:10px;margin-bottom:10px}
    .reviews-title{margin:0;font-size:18px;font-weight:800;display:flex;align-items:center;gap:8px}
    .rating-badge{display:inline-flex;align-items:center;gap:6px;background:#fff7e6;border:1px solid #ffe2a8;color:#a66900;border-radius:999px;padding:4px 10px;font-weight:800}
    .stars{color:#ffb400}
    .muted{color:#6b7280;font-size:13px}

    .dist{display:grid;grid-template-columns:1fr;gap:6px;margin:10px 0 12px}
    .dist-row{display:flex;align-items:center;gap:8px}
    .dist-row span{width:26px;font-size:12px;color:#555}
    .bar{flex:1;height:8px;background:#eef2f7;border-radius:999px;overflow:hidden}
    .bar .fill{height:100%;background:linear-gradient(90deg,#6aa4ff,#3b82f6);width:0}
    .pct{width:36px;text-align:right;font-size:12px;color:#555}

    .reviews-actions{display:flex;gap:8px;flex-wrap:wrap;margin:8px 0 12px}
    .btn{border:1px solid var(--border);background:#fff;border-radius:8px;padding:6px 10px;font-size:13px;cursor:pointer}
    .btn.active{border-color:#3b82f6;color:#0b5ed7;background:#eaf5ff}

    .review-item{border-top:1px solid var(--border);padding:10px 0}
    .review-head{display:flex;align-items:center;gap:10px;margin-bottom:6px}
    .avatar{width:32px;height:32px;border-radius:50%;object-fit:cover}
    .review-name{font-weight:700}
    .review-date{font-size:12px;color:#6b7280}
    .review-text{margin:4px 0 0;color:#374151;font-size:14px;line-height:1.45}

    .review-form{border-top:1px solid var(--border);margin-top:10px;padding-top:10px}
    .star-input{display:flex;flex-direction:row-reverse;justify-content:flex-end;gap:4px}
    .star-input input{display:none}
    .star-input label{cursor:pointer;color:#d1d5db;font-size:18px}
    .star-input input:checked ~ label,
    .star-input label:hover,
    .star-input label:hover ~ label{color:#ffb400}
    .review-form textarea{width:100%;min-height:80px;border:1px solid var(--border);border-radius:8px;padding:8px;resize:vertical}
    .review-form .form-actions{display:flex;justify-content:flex-end;margin-top:8px}
    .review-form .btn-submit{background:#111;color:#fff;border:0;padding:8px 12px;border-radius:8px;cursor:pointer}

    /* Descripción & Ubicación */
    .oferta-desc{padding:14px 18px;}
    .oferta-desc h3{margin:4px 0 8px}

    .oferta-ubic{padding:14px 18px;margin-top:14px}
    .oferta-ubic-head{display:flex;justify-content:space-between;align-items:center;margin-bottom:10px}
    .oferta-ubic-head h3{margin:0;display:flex;gap:8px;align-items:center}
    .oferta-link{text-decoration:none;color:var(--primary)}
    .oferta-ubic-grid{display:grid;grid-template-columns:1fr 1.3fr;gap:16px}
    .oferta-map{width:100%;height:280px;border-radius:10px;background:#eef2f7}
    @media (max-width:900px){.oferta-ubic-grid{grid-template-columns:1fr}}
  </style>
</head>
<body>
  <div class="content-wrapper">
    <section class="oferta-wrapper">
      <!-- Encabezado -->
      <header class="oferta-header">
        <div class="oferta-head-left">
          <div class="oferta-chip">VENDO</div>
          <h1 class="oferta-title">Vendo Campera Zara</h1>

          <div class="oferta-seller">
            <img class="oferta-seller-avatar" src="https://i.pravatar.cc/80?img=12" alt="Foto del vendedor">
            <div>
              <div class="oferta-seller-name">Lucas Martínez</div>
              <a class="oferta-seller-link" href="#" target="_blank" rel="noopener">Ir al sitio del vendedor <i class="fa-solid fa-up-right-from-square"></i></a>
              <div class="oferta-contact">
                <span><i class="fa-solid fa-phone"></i> <a href="tel:+595983232390">+595983232390</a> <i class="fa-brands fa-whatsapp" style="color:#25d366"></i></span>
                <span><i class="fa-solid fa-envelope"></i> <a href="mailto:lucasemb105428@gmail.com">lucasemb105428@gmail.com</a></span>
              </div>
            </div>
          </div>
        </div>

        <div class="oferta-head-right">
          <div class="oferta-actions">
            <button class="oferta-icon ok"   title="Disponible"><i class="fa-solid fa-check"></i></button>
            <button class="oferta-icon chat" title="Chatear"><i class="fa-solid fa-comments"></i></button>
            <button class="oferta-icon warn" title="Reportar"><i class="fa-solid fa-triangle-exclamation"></i></button>
          </div>
          <div class="oferta-price">Gs. 600.000</div>
        </div>
      </header>

      <!-- Banda de metadatos -->
      <section class="oferta-meta card">
        <div><span>Departamento:</span><b>Central</b></div>
        <div><span>Ciudad:</span><b>San Lorenzo</b></div>
        <div><span>Zona:</span><b>Barrio San José</b></div>
        <div><span>Nro. de Visitas:</span><b>29</b></div>
        <div><span>Publicado el:</span><b>29/08/2025</b></div>
      </section>

      <!-- ====== TOP: Galería + Descripción (debajo) + Reseñas ====== -->
      <section class="oferta-top">
        <!-- Galería -->
        <section class="oferta-gallery card">
          <!-- Principal -->
          <div class="swiper oferta-gallery-main">
            <div class="swiper-wrapper">
              <div class="swiper-slide">
                <img src="vistas/img/plantilla/camperaZara.png" alt="Campera Zara 1">
              </div>
              <div class="swiper-slide">
                <img src="vistas/img/plantilla/camperaZara.png" alt="Campera Zara 2">
              </div>
            </div>
            <div class="swiper-button-prev"></div>
            <div class="swiper-button-next"></div>
            <div class="swiper-pagination"></div>
          </div>

          <!-- Miniaturas -->
          <div class="swiper oferta-gallery-thumbs">
            <div class="swiper-wrapper">
              <div class="swiper-slide">
                <img src="vistas/img/plantilla/camperaZara.png" alt="Thumb 1">
              </div>
              <div class="swiper-slide">
                <img src="vistas/img/plantilla/camperaZara.png" alt="Thumb 2">
              </div>
            </div>
          </div>
        </section>

        <!-- Descripción: ahora va debajo de la galería -->
        <section class="oferta-desc card">
          <h3>Descripción</h3>
          <p>
            Chaqueta de cuero sintético estilo biker. Cierres metálicos, bolsillos frontales y forro interior suave.
            Talle M (consultar disponibilidad). Ideal para media estación.
          </p>
          <ul style="margin:0 0 6px 18px;color:#555">
            <li>Material: PU premium</li>
            <li>Color: Negro</li>
            <li>Condición: Nuevo</li>
          </ul>
        </section>

        <!-- Reseñas y Comentarios -->
        <aside class="oferta-reviews card" id="reviews">
          <div class="reviews-head">
            <h3 class="reviews-title"><i class="fa-solid fa-star stars"></i> Reseñas</h3>
            <div class="rating-badge">
              <span class="avg-score" id="avgScore">4.6</span>
              <span class="stars">
                <i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i>
                <i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i>
                <i class="fa-regular fa-star-half-stroke"></i>
              </span>
              <span class="muted" id="reviewsCount">(128)</span>
            </div>
          </div>

          <!-- Distribución por estrellas -->
          <div class="dist" id="dist">
            <div class="dist-row"><span>5★</span><div class="bar"><div class="fill" style="width:62%"></div></div><div class="pct">62%</div></div>
            <div class="dist-row"><span>4★</span><div class="bar"><div class="fill" style="width:24%"></div></div><div class="pct">24%</div></div>
            <div class="dist-row"><span>3★</span><div class="bar"><div class="fill" style="width:9%"></div></div><div class="pct">9%</div></div>
            <div class="dist-row"><span>2★</span><div class="bar"><div class="fill" style="width:3%"></div></div><div class="pct">3%</div></div>
            <div class="dist-row"><span>1★</span><div class="bar"><div class="fill" style="width:2%"></div></div><div class="pct">2%</div></div>
          </div>

          <!-- Acciones -->
          <div class="reviews-actions">
            <button class="btn active" data-sort="recientes">Más recientes</button>
            <button class="btn" data-sort="mejores">Mejor puntuadas</button>
            <button class="btn" data-sort="peores">Peor puntuadas</button>
          </div>

          <!-- Lista de comentarios -->
          <div class="reviews-list" id="reviewsList">
            <article class="review-item">
              <div class="review-head">
                <img class="avatar" src="https://i.pravatar.cc/64?img=32" alt="Avatar">
                <div>
                  <div class="review-name">María G.</div>
                  <div class="stars" aria-label="5 de 5">
                    <i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <span class="review-date"> · 20/08/2025</span>
                  </div>
                </div>
              </div>
              <p class="review-text">Excelente calidad, el talle coincide y el cuero se siente premium. Recomendado.</p>
            </article>

            <article class="review-item">
              <div class="review-head">
                <img class="avatar" src="https://i.pravatar.cc/64?img=45" alt="Avatar">
                <div>
                  <div class="review-name">Carlos R.</div>
                  <div class="stars" aria-label="4 de 5">
                    <i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i>
                    <i class="fa-regular fa-star"></i>
                    <span class="review-date"> · 17/08/2025</span>
                  </div>
                </div>
              </div>
              <p class="review-text">Muy buena, solo que me llegó en otra caja. Igual, todo ok.</p>
            </article>
          </div>

          <!-- Formulario agregar reseña (demo front) -->
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
            <div class="form-actions">
              <button type="submit" class="btn-submit">Publicar reseña</button>
            </div>
          </form>
        </aside>
      </section>

      <!-- Ubicación -->
      <section class="oferta-ubic card">
        <div class="oferta-ubic-head">
          <h3><i class="fa-solid fa-location-dot"></i> Ubicación del vendedor</h3>
          <a id="ofertaComoLlegar" class="oferta-link" target="_blank" rel="noopener"><i class="fa-solid fa-route"></i> Cómo llegar</a>
        </div>
        <div class="oferta-ubic-grid">
          <div class="oferta-ubic-info">
            <div><b>Dirección:</b> Av. San Jose, San Lorenzo</div>
            <div><b>Horario:</b> Lun a Sáb 08:00 a 19:00</div>
            <div><b>Referencia:</b> Cerca del Shopping X</div>
          </div>
          <div id="ofertaMap" class="oferta-map"></div>
        </div>
      </section>
    </section>
  </div>

  <!-- Swiper JS -->
  <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
  <script>
    // Thumbs (miniaturas)
    const ofertaThumbs = new Swiper('.oferta-gallery-thumbs', {
      slidesPerView: 'auto',
      spaceBetween: 8,
      freeMode: true,
      watchSlidesProgress: true,
    });

    // Principal
    const ofertaMain = new Swiper('.oferta-gallery-main', {
      spaceBetween: 10,
      centeredSlides: true,
      loop: false,
      navigation: {
        nextEl: '.oferta-gallery-main .swiper-button-next',
        prevEl: '.oferta-gallery-main .swiper-button-prev',
      },
      pagination: {
        el: '.oferta-gallery-main .swiper-pagination',
        clickable: true,
      },
      thumbs: { swiper: ofertaThumbs },
    });

    // ====== Reseñas (demo front, sin backend) ======
    (function(){
      const form = document.getElementById('reviewForm');
      const list = document.getElementById('reviewsList');
      const avgScoreEl = document.getElementById('avgScore');
      const reviewsCountEl = document.getElementById('reviewsCount');

      let totalReviews = 128;
      let sumScores = 4.6 * totalReviews;

      function renderAvg(){
        const avg = (sumScores / totalReviews);
        avgScoreEl.textContent = (Math.round(avg*10)/10).toFixed(1);
        reviewsCountEl.textContent = `(${totalReviews})`;
      }

      form.addEventListener('submit', (e)=>{
        e.preventDefault();
        const rating = +((form.querySelector('input[name="rating"]:checked')||{}).value||0);
        const text = (document.getElementById('reviewText').value || '').trim();
        if(!rating){ alert('Elegí una calificación.'); return; }
        if(text.length < 10){ alert('El comentario debe tener al menos 10 caracteres.'); return; }

        const article = document.createElement('article');
        article.className = 'review-item';
        const today = new Date();
        const fecha = today.toLocaleDateString('es-PY');
        const stars = Array.from({length:5}, (_,i)=> i < rating
          ? '<i class="fa-solid fa-star"></i>' : '<i class="fa-regular fa-star"></i>').join('');

        article.innerHTML = `
          <div class="review-head">
            <img class="avatar" src="https://i.pravatar.cc/64?img=${Math.floor(Math.random()*70)+1}" alt="Avatar">
            <div>
              <div class="review-name">Usuario</div>
              <div class="stars" aria-label="${rating} de 5">
                ${stars}<span class="review-date"> · ${fecha}</span>
              </div>
            </div>
          </div>
          <p class="review-text"></p>
        `;
        article.querySelector('.review-text').textContent = text;
        list.prepend(article);

        totalReviews += 1;
        sumScores += rating;
        renderAvg();
        form.reset();
      });

      document.querySelectorAll('.reviews-actions .btn').forEach(btn=>{
        btn.addEventListener('click', ()=>{
          document.querySelectorAll('.reviews-actions .btn').forEach(b=>b.classList.remove('active'));
          btn.classList.add('active');
        });
      });

      renderAvg();
    })();

    // ====== Mapa (ajusta lat/lng) ======
    const OFERTA_LAT = -25.34342, OFERTA_LNG = -57.51050; 
    window._oferta_initMap = function(){
      const loc = {lat: OFERTA_LAT, lng: OFERTA_LNG};
      const map = new google.maps.Map(document.getElementById('ofertaMap'), {center: loc, zoom: 14});
      new google.maps.Marker({position: loc, map, title: 'Ubicación del vendedor'});
      document.getElementById('ofertaComoLlegar').href = `https://www.google.com/maps?q=-25.34342,-57.51050${OFERTA_LAT},${OFERTA_LNG}`;
    }
  </script>

  <!-- Google Maps (reemplaza TU_API_KEY) -->
  <script async defer src="https://maps.googleapis.com/maps/api/js?key=TU_API_KEY&callback=_oferta_initMap"></script>
</body>
</html>
