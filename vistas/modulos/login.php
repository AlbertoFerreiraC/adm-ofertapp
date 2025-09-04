<style>
  /* Estilos para el fondo y centrado de la página de login */
  body.login-page {
    background: linear-gradient(135deg, #fefefe, #D0D5D7) !important;
    display: flex;
    justify-content: center;
    padding: 15px;
    padding-top: 15vh;
    height: 100vh;
  }

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

  .login-container .extra-links {
    margin-top: 20px;
    font-size: 14px;
  }

  .login-container .extra-links a {
    display: block;
    margin-top: 8px;
    color: #0C2A3E;
    text-decoration: none;
    font-weight: bold;
    transition: color 0.3s;
  }

  .login-container .extra-links a:hover {
    color: #113f5f;
  }
</style>

<div class="login-container">
  <div class="logo">
    <img src="vistas/img/plantilla/logo-ofertapp-letras.png" alt="Logo OfertApp">
  </div>
  <form id="loginForm">
    <div class="form-group">
      <label for="usuario">Usuario:</label>
      <input type="text" class="form-control" name="usuario" id="usuario" placeholder="Ingrese su usuario" autocomplete="off" required>
    </div>
    <div class="form-group">
      <label for="contrasena">Contraseña:</label>
      <input type="password" class="form-control" name="contrasena" id="contrasena" placeholder="Ingrese su contraseña" autocomplete="off" required>
    </div>
    <button type="button" id="ingresarBtn">INGRESAR</button>
  </form>

  <div class="extra-links">
    <a href="index.php?ruta=forgot-password">¿Olvidaste tu contraseña?</a>
    <a href="index.php?ruta=register">¿No tienes cuenta? Regístrate aquí</a>
  </div>
</div>