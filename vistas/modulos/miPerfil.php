<?php
// Iniciar sesión solo si no está ya activa
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Capturar datos del usuario en sesión
$idUsuarioSesion = $_SESSION['id_usuario'] ?? '';
$nombreUsuario   = $_SESSION['nombre'] ?? '';
$apellidoUsuario = $_SESSION['apellido'] ?? '';
$usuarioLogin    = $_SESSION['usuario'] ?? '';
$emailUsuario    = ''; // Recuperamos por consulta, no desde la sesión

// === Consulta directa para recuperar el email del usuario ===
include_once "../api-ofertapp/db.php";

try {
    $db = new DB();
    $pdo = $db->connect();

    $stmt = $pdo->prepare("SELECT email, estado FROM Usuario WHERE id_usuario = :id");
    $stmt->execute([':id' => $idUsuarioSesion]);
    $userData = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($userData) {
        $emailUsuario = $userData['email'];
        $estadoUsuario = $userData['estado'];
    } else {
        $emailUsuario = '';
        $estadoUsuario = 'activo';
    }
} catch (Exception $e) {
    $emailUsuario = '';
    $estadoUsuario = 'activo';
}
?>

<div class="content-wrapper">

    <section class="content-header">
        <h1>Mi Perfil</h1>
        <ol class="breadcrumb">
            <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
            <li class="active">Mi Perfil</li>
        </ol>
    </section>

    <section class="content">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title"><i class="fa fa-user-circle"></i> Información del Usuario</h3>
            </div>

            <form id="formPerfil" method="post" enctype="multipart/form-data">
                <div class="box-body">

                    <input type="hidden" id="id_usuario" name="id_usuario" value="<?php echo $idUsuarioSesion; ?>">

                    <div class="form-group col-md-6 col-sm-12">
                        <label>Nombre</label>
                        <input type="text" class="form-control" id="nombre" name="nombre"
                            value="<?php echo htmlspecialchars($nombreUsuario); ?>" required>
                    </div>

                    <div class="form-group col-md-6 col-sm-12">
                        <label>Apellido</label>
                        <input type="text" class="form-control" id="apellido" name="apellido"
                            value="<?php echo htmlspecialchars($apellidoUsuario); ?>" required>
                    </div>

                    <div class="form-group col-md-6 col-sm-12">
                        <label>Correo Electrónico</label>
                        <input type="email" class="form-control" id="email" name="email"
                            value="<?php echo htmlspecialchars($emailUsuario); ?>" required>
                    </div>

                    <div class="form-group col-md-6 col-sm-12">
                        <label>Usuario</label>
                        <input type="text" class="form-control" id="usuario" name="usuario"
                            value="<?php echo htmlspecialchars($usuarioLogin); ?>" readonly
                            style="background-color:#f9f9f9; cursor:not-allowed;">
                        <small class="text-muted">El nombre de usuario no se puede modificar.</small>
                    </div>

                    <div class="form-group col-md-6 col-sm-12">
                        <label>Contraseña</label>
                        <input type="password" class="form-control" id="pass" name="pass" placeholder="•••••••••">
                        <small class="text-muted">Deje vacío si no desea cambiar la contraseña.</small>
                    </div>

                    <div class="form-group col-md-6 col-sm-12">
                        <label>Estado</label>
                        <select class="form-control" id="estado" name="estado" required>
                            <option value="activo" <?= $estadoUsuario === 'activo' ? 'selected' : '' ?>>Activo</option>
                            <option value="inactivo" <?= $estadoUsuario === 'inactivo' ? 'selected' : '' ?>>Inactivo</option>
                        </select>
                    </div>
                </div>

                <div class="box-footer">
                    <button type="submit" class="btn btn-primary pull-right" id="btnActualizarPerfil">
                        <i class="fa fa-save"></i> Guardar Cambios
                    </button>
                </div>
            </form>
        </div>
    </section>
</div>

<script src="vistas/js/miPerfil.js"></script>

<style>
    .box {
        border-top-color: #f08438 !important;
    }

    .btn-primary {
        background-color: #f08438;
        border-color: #f08438;
    }

    .btn-primary:hover {
        background-color: #e76a10;
        border-color: #e76a10;
    }

    input[readonly] {
        color: #777;
    }
</style>