<style>
    /* Estilos para el fondo y centrado (son los mismos que el login) */
    body.login-page {
        background: linear-gradient(135deg, #fefefe, #D0D5D7) !important;
        display: flex;
        justify-content: center;
        padding: 15px;
        padding-top: 15vh;
        height: 100vh;
    }

    /* ... (El resto de tu CSS para .login-container va aquí, como lo tenías) ... */
    .login-container {
        background: #ffffff;
        padding: 40px;
        border-radius: 12px;
        box-shadow: 0 8px 30px rgba(0, 0, 0, 0.12);
        width: 100%;
        max-width: 380px;
        text-align: center;
        height: fit-content;
    }

    .login-container .logo {
        margin-bottom: 30px;
    }

    .login-container .logo img {
        width: 100%;
        height: auto;
        max-width: 280px;
    }

    .login-container .form-group {
        text-align: left;
        margin-bottom: 20px;
    }

    .login-container label {
        font-size: 14px;
        color: #74808C;
        display: block;
        margin-bottom: 8px;
        font-weight: bold;
    }

    .login-container input {
        width: 100%;
        padding: 12px !important;
        border: 1px solid #D0D5D7;
        border-radius: 8px;
        font-size: 14px;
        outline: none;
    }

    .login-container button {
        width: 100%;
        padding: 12px;
        background-color: #0C2A3E;
        color: white;
        font-size: 15px;
        font-weight: bold;
        border: none;
        border-radius: 8px;
        cursor: pointer;
        transition: background-color 0.3s;
        margin-top: 10px;
    }

    .login-container button:hover {
        background-color: #113f5f;
    }

    .login-container .back-to-login {
        margin-top: 20px;
    }

    .login-container .back-to-login a {
        color: #0C2A3E;
        text-decoration: none;
        font-weight: bold;
        font-size: 14px;
    }

    .login-container h3 {
        margin-bottom: 10px;
        color: #0C2A3E;
    }

    .login-container p {
        margin-bottom: 20px;
        color: #74808C;
        font-size: 15px;
        line-height: 1.5;
    }
</style>

<div class="login-container">
    <div class="logo">
        <img src="vistas/img/plantilla/logo-ofertapp-letras.png" alt="Logo OfertApp">
    </div>
    <h3>Recuperar Contraseña</h3>
    <p>Ingresa tu correo electrónico asociado a tu cuenta y te enviaremos un enlace para restablecer tu contraseña.</p>
    <form id="requestResetForm" novalidate>
        <div class="form-group">
            <label for="email">Correo Electrónico:</label>
            <input type="email" class="form-control" name="email" id="email" placeholder="tu.correo@ejemplo.com" required>
        </div>
        <button type="submit">Enviar Enlace de Recuperación</button>
    </form>
    <div class="back-to-login">
        <a href="index.php?ruta=login">Volver al inicio de sesión</a>
    </div>
</div>

<script src="vistas/js/forgot_password.js"></script>