<!-- ====== OFERTAPP: Detalle de anuncio ====== -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"/>
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
            <span><i class="fa-solid fa-phone"></i> <a href="tel:+595973105428">+595973105428</a> <i class="fa-brands fa-whatsapp" style="color:#25d366"></i></span>
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
    <div><span>Departamento:</span><b>Alto Paraná</b></div>
    <div><span>Ciudad:</span><b>Ciudad del Este</b></div>
    <div><span>Zona:</span><b>Barrio San José</b></div>
    <div><span>Nro. de Visitas:</span><b>29</b></div>
    <div><span>Publicado el:</span><b>29/08/2025</b></div>
  </section>

  <!-- Galería -->
  <section class="oferta-gallery card">
    <div class="oferta-thumbs" id="ofertaThumbs">
      <!-- miniaturas (mismo src o variantes) -->
      <img src="vistas/img/plantilla/camperaZara.png"alt="Campera Zara" class="producto-imagen">
     
    </div>

    <figure class="oferta-main">
      <button class="oferta-nav prev" id="ofertaPrev"><i class="fa-solid fa-chevron-left"></i></button>
      <img id="ofertaMainImg" src= "vistas/img/plantilla/camperaZara.png" alt="Foto principal">
      <button class="oferta-nav next" id="ofertaNext"><i class="fa-solid fa-chevron-right"></i></button>
    </figure>
  </section>

  <!-- Descripción (opcional) -->
  <section class="oferta-desc card">
    <h3>Descripción</h3>
    <p>
      Una chaqueta de cuero es un abrigo largo que se suele llevar encima de otras prendas o prendas de vestir, y está hecha de piel curtida de diversos animales
    </p>
  </section>

  <!-- Ubicación de la empresa/ vendedor -->
  <section class="oferta-ubic card">
    <div class="oferta-ubic-head">
      <h3><i class="fa-solid fa-location-dot"></i> Ubicación del vendedor</h3>
      <a id="ofertaComoLlegar" class="oferta-link" target="_blank" rel="noopener"><i class="fa-solid fa-route"></i> Cómo llegar</a>
    </div>
    <div class="oferta-ubic-grid">
      <div class="oferta-ubic-info">
        <div><b>Dirección:</b> Av. San Blas y Dr. Gaspar R., Ciudad del Este</div>
        <div><b>Horario:</b> Lun a Sáb 08:00 a 19:00</div>
        <div><b>Referencia:</b> Cerca del Shopping X</div>
      </div>
      <div id="ofertaMap" class="oferta-map"></div>
    </div>
  </section>
</section>
</div>
<style>
  /* ====== Scope Ofertapp ====== */
  .oferta-wrapper{max-width:1100px;margin:24px auto;padding:0 16px;font-family:system-ui,-apple-system,Segoe UI,Roboto,Arial;color:#222}
  .card{background:#fff;border:1px solid #e9e9e9;border-radius:12px;box-shadow:0 2px 6px rgba(0,0,0,.06);overflow:hidden}

  /* Header */
  .oferta-header{display:flex;gap:24px;align-items:flex-start;justify-content:space-between;margin-bottom:14px}
  .oferta-head-left{flex:1 1 auto}
  .oferta-chip{display:inline-block;font-size:12px;font-weight:900;color:#7a9c00;background:#ecf6d3;padding:4px 8px;border-radius:6px;margin-bottom:6px}
  .oferta-title{font-size:28px;line-height:1.2;margin:0 0 10px;font-weight:900}
  .oferta-seller{display:flex;gap:12px;align-items:flex-start}
  .oferta-seller-avatar{width:48px;height:48px;border-radius:50%;object-fit:cover;border:2px solid #fff;box-shadow:0 0 0 1px #e9e9e9}
  .oferta-seller-name{font-weight:800}
  .oferta-seller-link{color:#0d6efd;text-decoration:none;font-size:13px}
  .oferta-contact{display:flex;gap:18px;flex-wrap:wrap;color:#444;margin-top:6px}
  .oferta-contact i{color:#6c757d;margin-right:6px}
  .oferta-contact a{color:#0d6efd;text-decoration:none}

  .oferta-head-right{text-align:right;min-width:220px}
  .oferta-actions{display:flex;gap:8px;justify-content:flex-end;margin-bottom:6px}
  .oferta-icon{width:28px;height:28px;border:0;border-radius:50%;display:flex;align-items:center;justify-content:center;background:#f1f3f5;color:#333;cursor:pointer}
  .oferta-icon.ok{background:#e9f7ef;color:#2e7d32}
  .oferta-icon.chat{background:#eaf5ff;color:#0b5ed7}
  .oferta-icon.warn{background:#fdecea;color:#c62828}
  .oferta-price{font-size:28px;font-weight:900;color:#111}

  /* Meta band */
  .oferta-meta{display:grid;grid-template-columns:repeat(6,1fr);gap:10px;padding:10px 14px;margin-bottom:14px}
  .oferta-meta div{font-size:13px;color:#555}
  .oferta-meta span{color:#777;margin-right:6px}
  @media (max-width:980px){.oferta-meta{grid-template-columns:repeat(2,1fr)}}

  /* Gallery */
  .oferta-gallery{display:flex;gap:12px;padding:12px}
  .oferta-thumbs{width:110px;display:flex;flex-direction:column;gap:10px;overflow:auto}
  .oferta-thumbs img{width:100%;height:78px;object-fit:cover;border-radius:8px;border:2px solid transparent;cursor:pointer;background:#f6f7fb}
  .oferta-thumbs img.active{border-color:#6aa4ff}
  .oferta-main{position:relative;flex:1 1 auto;min-height:300px;background:#f6f7fb;border-radius:12px;overflow:hidden;margin:0}
  .oferta-main img{width:100%;height:100%;object-fit:cover;display:block}
  .oferta-nav{position:absolute;top:50%;transform:translateY(-50%);border:0;width:40px;height:40px;border-radius:50%;background:rgba(0,0,0,.5);color:#fff;cursor:pointer}
  .oferta-nav.prev{left:10px}
  .oferta-nav.next{right:10px}
  @media (max-width:720px){
    .oferta-gallery{flex-direction:column}
    .oferta-thumbs{width:100%;flex-direction:row;height:auto}
    .oferta-thumbs img{height:70px}
  }

  /* Descripción */
  .oferta-desc{padding:14px 18px;margin-top:14px}
  .oferta-desc h3{margin:4px 0 8px}

  /* Ubicación */
  .oferta-ubic{padding:14px 18px;margin-top:14px}
  .oferta-ubic-head{display:flex;justify-content:space-between;align-items:center;margin-bottom:10px}
  .oferta-ubic-head h3{margin:0;display:flex;gap:8px;align-items:center}
  .oferta-link{text-decoration:none;color:#0d6efd}
  .oferta-ubic-grid{display:grid;grid-template-columns:1fr 1.3fr;gap:16px}
  .oferta-map{width:100%;height:280px;border-radius:10px;background:#eef2f7}
  @media (max-width:900px){.oferta-ubic-grid{grid-template-columns:1fr}}
</style>

<script>
  // ====== Galería simple ======
  (function(){
    const thumbs = Array.from(document.querySelectorAll('#ofertaThumbs img'));
    const main   = document.getElementById('ofertaMainImg');
    let idx = 0;

    function show(i){
      idx = (i + thumbs.length) % thumbs.length;
      main.src = thumbs[idx].dataset.full || thumbs[idx].src;
      thumbs.forEach(t => t.classList.remove('active'));
      thumbs[idx].classList.add('active');
    }

    thumbs.forEach((t, i) => t.addEventListener('click', () => show(i)));
    document.getElementById('ofertaPrev').addEventListener('click', () => show(idx-1));
    document.getElementById('ofertaNext').addEventListener('click', () => show(idx+1));
  })();

  // ====== Mapa (ajusta lat/lng) ======
  const OFERTA_LAT = -25.5097, OFERTA_LNG = -54.6110; // Ciudad del Este (ejemplo)
  window._oferta_initMap = function(){
    const loc = {lat: OFERTA_LAT, lng: OFERTA_LNG};
    const map = new google.maps.Map(document.getElementById('ofertaMap'), {center: loc, zoom: 14});
    new google.maps.Marker({position: loc, map, title: 'Ubicación del vendedor'});
    document.getElementById('ofertaComoLlegar').href = `https://www.google.com/maps?q=${OFERTA_LAT},${OFERTA_LNG}`;
  }
</script>
<!-- Reemplaza TU_API_KEY -->
<script async defer src="https://maps.googleapis.com/maps/api/js?key=TU_API_KEY&callback=_oferta_initMap"></script>
