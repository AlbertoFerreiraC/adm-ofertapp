<?php
// =============================================
// RUTA CORREGIDA: Usamos ../ para subir un nivel
// =============================================
require '../api-ofertapp/sesiones/config.php';

// VERSIÓN SEGURA: VALIDACIÓN REAL DEL TOKEN
$id = $_GET['id'] ?? '';
$ts = $_GET['ts'] ?? '';
$sig = $_GET['sig'] ?? '';
$tokenValido = false;

if (!empty($id) && !empty($ts) && !empty($sig)) {
    if (time() - $ts < 3600) { // Válido por 1 hora
        $firmaServidor = hash_hmac('sha256', $id . $ts, SECRET_KEY);
        if (hash_equals($firmaServidor, $sig)) {
            $tokenValido = true;
        }
    }
}
?>

<style>
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
        margin-top: 10px;
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

    .error-message {
        color: #D83B01;
        background-color: #FDECEA;
        border: 1px solid #D83B01;
        padding: 15px;
        border-radius: 8px;
    }
</style>

<div class="login-container">
    <?php if ($tokenValido): ?>
        <div class="logo">
            <img src="vistas/img/plantilla/logo-ofertapp-letras.png" alt="Logo OfertApp">
        </div>
        <h3>Establecer Nueva Contraseña</h3>
        <form id="resetPasswordForm">
            <input type="hidden" name="id" value="<?php echo htmlspecialchars($id); ?>">
            <input type="hidden" name="ts" value="<?php echo htmlspecialchars($ts); ?>">
            <input type="hidden" name="sig" value="<?php echo htmlspecialchars($sig); ?>">
            <div class="form-group">
                <label for="nuevoPass">Nueva Contraseña:</label>
                <input type="password" class="form-control" name="nuevoPass" id="nuevoPass" required>
            </div>
            <div class="form-group">
                <label for="confirmarPass">Confirmar Nueva Contraseña:</label>
                <input type="password" class="form-control" id="confirmarPass" required>
            </div>
            <button type="submit">Guardar Contraseña</button>
        </form>
    <?php else: ?>
        <div class="error-message">
            <h3>Enlace Inválido o Expirado</h3>
            <p>El enlace para restablecer la contraseña no es válido o ya ha expirado. Por favor, solicita un nuevo enlace.</p>
            <a href="login" style="display: inline-block; margin-top: 15px; font-weight: bold;">Volver al inicio de sesión</a>
        </div>
    <?php endif; ?>
</div>

<script src="vistas/js/reset_password.js"></script>