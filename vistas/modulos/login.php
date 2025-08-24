<?php
// login.php

// Si el usuario YA está autenticado, no tiene sentido mostrarle el login de nuevo.
// Lo redirigimos directamente al dashboard.
if (isset($_SESSION['autenticado']) && $_SESSION['autenticado'] === true) {
  // CORRECCIÓN: Usamos la ruta completa hacia el dashboard
  header('Location: adm-ofertapp/vistas/dashboard.php');
  exit;
}

// Si el código llega hasta aquí, significa que el usuario NO ha iniciado sesión,
// por lo que le mostramos el HTML del formulario.
?>
<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" type="image/png" href="vistas/img/plantilla/favicon.png?v=1.0">
  <title>OfertApp</title>
  <style>
    /* ... Tu CSS (está perfecto, no cambia) ... */
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    html,
    body {
      height: 100%;
      font-family: Calibri, sans-serif;
      background: linear-gradient(135deg, #fefefe, #D0D5D7);
    }

    body {
      display: flex;
      justify-content: center;
      padding: 15px;
      padding-top: 15vh;
    }

    .login-container {
      background: #ffffff;
      padding: 40px;
      border-radius: 12px;
      box-shadow: 0 8px 30px rgba(0, 0, 0, 0.12);
      width: 100%;
      max-width: 380px;
      text-align: center;
    }

    .form-group {
      text-align: left;
      margin-bottom: 20px;
    }

    label {
      font-size: 14px;
      color: #74808C;
      display: block;
      margin-bottom: 8px;
      font-weight: bold;
    }

    input[type="text"],
    input[type="password"] {
      width: 100%;
      padding: 12px;
      border: 1px solid #D0D5D7;
      border-radius: 8px;
      font-size: 14px;
      outline: none;
      transition: border-color 0.3s, box-shadow 0.3s;
    }

    input:focus {
      border-color: #0C2A3E;
      box-shadow: 0 0 0 3px rgba(12, 42, 62, 0.1);
    }

    button {
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

    button:hover {
      background-color: #113f5f;
    }

    .logo {
      margin-bottom: 30px;
    }

    .logo img {
      width: 100%;
      height: auto;
      max-width: 280px;
    }
  </style>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>
  <div class="login-container">
    <div class="logo">
      <img src="vistas/img/plantilla/logo-ofertapp-letras.png" alt="Logo OfertApp">
    </div>
    <form id="loginForm">
      <div class="form-group">
        <label for="usuario">Usuario:</label>
        <input type="text" name="usuario" id="usuario" placeholder="Ingrese su usuario" autocomplete="off" required>
      </div>
      <div class="form-group">
        <label for="contrasena">Contraseña:</label>
        <input type="password" name="contrasena" id="contrasena" placeholder="Ingrese su contraseña" autocomplete="off" required>
      </div>
      <button type="button" id="ingresarBtn">INGRESAR</button>
    </form>
  </div>
  <script src="login.js"></script>
</body>

</html>