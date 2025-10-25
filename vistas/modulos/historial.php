<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
$idUsuarioSesion = $_SESSION['id_usuario'] ?? '';
?>

<div class="content-wrapper">
    <!-- ================== CABECERA ================== -->
    <section class="content-header">
        <h1>Historial de Actividades</h1>
        <ol class="breadcrumb">
            <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
            <li class="active">Historial</li>
        </ol>
    </section>

    <!-- ================== CONTENIDO ================== -->
    <section class="content">
        <div class="box">
            <div class="box-header with-border">
                <div class="form-group col-md-12 col-sm-12 col-xs-12">
                    <input type="text" class="form-control" id="filtrarHistorial"
                        placeholder="🔍 Buscar por producto, empresa o acción..."
                        style="text-align:center; font-size:16px; height:45px; border-radius:6px; border:1px solid #ccc;">
                </div>
            </div>

            <div class="box-body">
                <div id="divHistorial">
                    <table class="table table-bordered table-striped dt-responsive" id="tablaHistorial" width="100%">
                        <thead style="background-color:#4a90e2; color:white;">
                            <tr>
                                <th style="width:50px;">#</th>
                                <th>Producto</th>
                                <th>Empresa</th>
                                <th>Acciones realizadas</th>
                                <th>Comentario</th>
                                <th>Calificación</th>
                                <th>Fecha</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Se llena dinámicamente por AJAX -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
</div>

<!-- Campo oculto con el usuario en sesión -->
<input type="hidden" id="idUsuarioSesion" value="<?php echo $idUsuarioSesion; ?>">

<!-- Script -->
<script src="vistas/js/historial.js"></script>

<style>
    #divHistorial {
        overflow-x: auto;
        width: 100%;
    }

    #filtrarHistorial:focus {
        outline: none;
        border-color: #4a90e2;
        box-shadow: 0 0 5px rgba(74, 144, 226, 0.5);
    }

    .box-header {
        padding: 20px 15px;
    }

    .content-header h1 {
        font-weight: 600;
        color: #444;
    }

    .badge {
        display: inline-block;
        padding: 4px 8px;
        border-radius: 6px;
        font-size: 12px;
        font-weight: bold;
        color: #fff;
    }

    .badge-reserva {
        background-color: #28a745;
    }

    .badge-comentario {
        background-color: #f39c12;
    }

    .badge-mixto {
        background-color: #6f42c1;
    }
</style>