<footer class="footer">
  <div class="footer-container">

    <!-- Columna Izquierda: Empresa + Suscripción -->
    <div class="footer-left">
      <h4>Empresa</h4>
      <ul>
        <li><a href="nosotros">Sobre Nosotros</a></li>
        <li><a href="membresias_planes">Membresía</a></li>
        <li><a href="#">Política de Privacidad</a></li>
        <li><a href="#">Contacto</a></li>
      </ul>

      <div class="footer-newsletter">
        <h4>Suscríbete</h4>
        <form>
          <input type="email" placeholder="Tu correo electrónico" class="footer-input" required>
          <button type="submit" class="footer-btn">Enviar</button>
        </form>
      </div>
    </div>

    <!-- Columna Centro: Logo + Texto -->
    <div class="footer-center">
      <div class="footer-center-content">
        <img src="vistas/img/plantilla/logo-ofertapp.png" alt="OfertApp" class="footer-logo">
        <p class="footer-tagline">
          La primera plataforma paraguaya para comparar precios en tiempo real y encontrar las mejores ofertas cerca de ti.
        </p>
      </div>
    </div>

    <!-- Columna Derecha: Social + Mapa -->
    <div class="footer-right">
      <div class="footer-social-map">
        <h4>Síguenos</h4>
        <div class="social-icons">
          <a href="#"><i class="fab fa-facebook fa-lg"></i></a>
          <a href="#"><i class="fab fa-instagram fa-lg"></i></a>
          <a href="#"><i class="fab fa-twitter fa-lg"></i></a>
        </div>

        <h5 class="footer-map-title">Cobertura en Paraguay</h5>
        <div id="mapFooter" class="map"></div>
      </div>
    </div>

  </div>

  <div class="footer-bottom">
    <p>&copy; <?php echo date("Y"); ?> OfertApp — Todos los derechos reservados.</p>
  </div>
</footer>

<!-- Google Maps -->
<script>
  window.initMapFooter = function () {
    const center = { lat: -25.2637, lng: -57.5759 }; // Asunción
    const el = document.getElementById('mapFooter');
    if (!el) return;

    const map = new google.maps.Map(el, {
      center: center,
      zoom: 6,
      disableDefaultUI: true,
      zoomControl: true
    });

    new google.maps.Marker({
      position: center,
      map: map,
      title: 'OfertApp - Paraguay'
    });
  };
</script>
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCuAZrhi9qDqGs9x8K_xucxfIE8iwQTkKw&callback=initMapFooter"></script>

<style>
  .footer {
    background: #222;
    color: #fff;
    padding: 30px 20px;
    font-family: Arial, sans-serif;
  }

  .footer-container {
    display: grid;
    grid-template-columns: 1fr 1fr 1fr; /* Izq - Centro - Der */
    gap: 30px;
    max-width: 1200px;
    margin: auto;
    align-items: start;
  }

  /* -------- Columna izquierda -------- */
  .footer-left h4 {
    font-size: 20px;
    font-weight: bold;
    color: #f08438;
    margin-bottom: 10px;
  }
  .footer-left ul {
    list-style: none;
    padding: 0;
    margin: 0 0 15px;
  }
  .footer-left li { margin: 6px 0; }
  .footer-left a {
    color: #ccc;
    font-size: 15px;
    text-decoration: none;
  }
  .footer-left a:hover { color: #f08438; }

  .footer-newsletter h4 {
    font-size: 18px;
    color: #f08438;
    margin-bottom: 8px;
  }
  .footer-newsletter form {
    display: flex;
    gap: 6px;
  }
  .footer-input {
    flex: 1;
    padding: 8px;
    border: none;
    border-radius: 4px;
    font-size: 14px;
  }
  .footer-btn {
    padding: 8px 14px;
    background: #f08438;
    border: none;
    border-radius: 4px;
    color: #fff;
    cursor: pointer;
  }
  .footer-btn:hover { background: #d46f2c; }

  /* -------- Columna centro -------- */
  .footer-center {
    display: flex;
    justify-content: center;
    align-items: center;
    text-align: center;
  }
  .footer-center-content {
    display: flex;
    flex-direction: column;
    align-items: center;
    max-width: 400px;
  }
  .footer-logo {
    width: 220px;
    margin-bottom: 15px;
    display: block;
  }
  .footer-tagline {
    font-size: 15px;
    color: #bbb;
    line-height: 1.6;
    margin: 0;
  }

  /* -------- Columna derecha -------- */
  .footer-right {
    display: flex;
    justify-content: center;
  }
  .footer-social-map {
    display: flex;
    flex-direction: column;
    align-items: center;
    text-align: center;
    width: 100%;
  }
  .footer-right h4 {
    font-size: 20px;
    color: #f08438;
    margin-bottom: 10px;
  }
  .social-icons {
    display: flex;
    gap: 15px;
    margin-bottom: 12px;
  }
  .social-icons a {
    color: #ccc;
    transition: color 0.3s, transform 0.3s;
  }
  .social-icons a:hover {
    color: #f08438;
    transform: scale(1.1);
  }

  .footer-map-title {
    font-size: 16px;
    color: #f08438;
    margin: 10px 0;
  }
  .map {
    width: 100%;
    height: 180px;
    border-radius: 8px;
    border: 1px solid #444;
    background: #1a1a1a;
  }

  /* -------- Línea inferior -------- */
  .footer-bottom {
    margin-top: 25px;
    border-top: 1px solid #444;
    padding-top: 10px;
    text-align: center;
    font-size: 13px;
    color: #aaa;
  }

  /* -------- Responsive -------- */
  @media (max-width: 768px) {
    .footer-container {
      grid-template-columns: 1fr;
      text-align: center;
    }
    .footer-left, .footer-right { text-align: center; }
    .footer-newsletter form { flex-direction: column; }
    .footer-input, .footer-btn { width: 100%; }
    .footer-map-title { text-align: center; }
  }
</style>
