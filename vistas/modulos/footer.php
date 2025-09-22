<footer class="footer">
    <div class="footer-container">
        <!-- Logo y descripción -->
        <div class="footer-brand">
            <img src="vistas/img/plantilla/logo-ofertapp.png" alt="OfertApp Logo" class="footer-logo">
            <p>La primera plataforma paraguaya para comparar precios en tiempo real y encontrar las mejores ofertas cerca de ti.</p>
        </div>

        <!-- Navegación -->
        <div class="footer-links">
            <h4>Categorías</h4>
            <ul>
                <li><a href="#">Electrónica</a></li>
                <li><a href="#">Hogar</a></li>
                <li><a href="#">Moda</a></li>
                <li><a href="#">Deportes</a></li>
            </ul>
        </div>

        <div class="footer-links">
            <h4>Empresa</h4>
            <ul>
                <li><a href="nosotros">Sobre Nosotros</a></li>
                <li><a href="#">Términos y Condiciones</a></li>
                <li><a href="#">Política de Privacidad</a></li>
                <li><a href="#">Contacto</a></li>
            </ul>
        </div>

        <!-- Redes Sociales -->
        <div class="footer-social">
            <h4>Síguenos</h4>
            <a href="#"><i class="fab fa-facebook fa-2x"></i></a>
            <a href="#"><i class="fab fa-instagram fa-2x"></i></a>
            <a href="#"><i class="fab fa-twitter fa-2x"></i></a>
        </div>
    </div>

    <div class="footer-bottom">
        <p>&copy; <?php echo date("Y"); ?> OfertApp - Todos los derechos reservados</p>
    </div>
</footer>

<style>
    .footer {
        background: #222;
        color: #fff;
        padding: 40px 20px;
        font-family: Arial, sans-serif;
    }

    .footer-container {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
        gap: 30px;
        max-width: 1200px;
        margin: auto;
    }

    .footer-logo {
        width: 150px;
        margin-bottom: 15px;
    }

    .footer-links h4,
    .footer-social h4 {
        margin-bottom: 10px;
        font-size: 16px;
        color: #f08438;
        /* Naranja de OfertApp */
    }

    .footer-links ul {
        list-style: none;
        padding: 0;
    }

    .footer-links ul li {
        margin-bottom: 8px;
    }

    .footer-links ul li a {
        text-decoration: none;
        color: #ccc;
        transition: color 0.3s;
    }

    .footer-links ul li a:hover {
        color: #f08438;
    }

    .footer-social a img {
        width: 28px;
        margin-right: 12px;
        transition: transform 0.3s;
    }

    .footer-social a img:hover {
        transform: scale(1.2);
    }

    .footer-bottom {
        text-align: center;
        margin-top: 30px;
        border-top: 1px solid #444;
        padding-top: 15px;
        font-size: 14px;
        color: #aaa;
    }
</style>