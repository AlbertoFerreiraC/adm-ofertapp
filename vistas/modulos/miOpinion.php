<?php
// Iniciar sesión
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Obtener el id del usuario activo
$idUsuarioSesion = isset($_SESSION['id_usuario']) ? $_SESSION['id_usuario'] : '';
?>

<div class="content-wrapper">

    <section class="content-header">
        <h1>Mis Opiniones y Reseñas</h1>
        <ol class="breadcrumb">
            <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
            <li class="active">Comentarios</li>
        </ol>
    </section>

    <section class="content">
        <div class="box">

            <div class="box-header with-border">
                <div class="form-group col-md-12 col-sm-12 col-xs-12">
                    <input type="text" class="form-control" id="filtrarComentario"
                        placeholder="🔍 Buscar por producto o comentario..."
                        style="text-align:center; font-size:16px; height:45px; border-radius:6px; border:1px solid #ccc;">
                </div>
            </div>

            <div class="box-body">
                <!-- Campo oculto para el usuario en sesión -->
                <input type="hidden" id="idUsuarioSesion" value="<?php echo $idUsuarioSesion; ?>">
                <div id="divComentarios">
                    <table class="table table-bordered table-striped dt-responsive" id="tablaComentarios" width="100%">
                        <thead style="background-color:#f08438; color:white;">
                            <tr>
                                <th style="width:50px;">#</th>
                                <th>Producto</th>
                                <th>Comentario</th>
                                <th>Fecha</th>
                                <th>⭐ Calificación</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr><td colspan="5" class="text-center text-muted">Cargando comentarios...</td></tr>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </section>
</div>

<!-- Script JS -->
<script src="vistas/js/miOpinion.js"></script>

<style>
    #divComentarios {
        overflow-x: auto;
        width: 100%;
    }

    #filtrarComentario:focus {
        outline: none;
        border-color: #f08438;
        box-shadow: 0 0 5px rgba(240, 132, 56, 0.5);
    }

    .box-header {
        padding: 20px 15px;
    }

    .content-header h1 {
        font-weight: 600;
        color: #444;
    }
</style>
