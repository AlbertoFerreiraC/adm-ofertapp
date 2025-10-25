<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$idUsuarioSesion = isset($_SESSION['id_usuario']) ? $_SESSION['id_usuario'] : '';
?>

<div class="content-wrapper">

    <section class="content-header">
        <h1>Historial de Reservas</h1>
        <ol class="breadcrumb">
            <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
            <li class="active">Reservas</li>
        </ol>
    </section>

    <section class="content">
        <div class="box">

            <div class="box-header with-border">
                <div class="form-group col-md-3 col-sm-6 col-xs-12">
                    <button class="btn btn-default btn-block" disabled>
                        <i class="fa fa-calendar"></i> Mis Reservas
                    </button>
                </div>
                <div class="form-group col-md-9 col-sm-6 col-xs-12">
                    <input type="text" style="text-align: center; font-size: 16px;"
                        class="form-control" id="buscadorReserva"
                        autocomplete="off" placeholder="Buscar reserva...">
                </div>
            </div>

            <div class="box-body">
                <input type="hidden" id="idUsuarioSesion" value="<?php echo $idUsuarioSesion; ?>">
                <div id="divReserva">
                    <table class="table table-bordered table-striped dt-responsive" id="tablaReservas" width="100%">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Producto</th>
                                <th>Cantidad</th>
                                <th>Fecha</th>
                                <th>Estado</th>
                                <th>Comentario</th>
                                <th>Acción</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Llenado dinámico con JS -->
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </section>
</div>

<!--=====================================
MODAL DETALLE DE RESERVA
======================================-->
<div id="modalVerReserva" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <div class="modal-header" style="background:#3c8dbc; color:white">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Detalle de Reserva</h4>
            </div>

            <div class="modal-body">
                <div class="box-body">

                    <div class="row">
                        <div class="col-md-6">
                            <label><strong>Producto:</strong></label>
                            <p id="detalle_producto">-</p>
                        </div>
                        <div class="col-md-6">
                            <label><strong>Estado:</strong></label>
                            <p id="detalle_estado">-</p>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4">
                            <label><strong>Cantidad:</strong></label>
                            <p id="detalle_cantidad">-</p>
                        </div>
                        <div class="col-md-4">
                            <label><strong>Fecha:</strong></label>
                            <p id="detalle_fecha">-</p>
                        </div>
                        <div class="col-md-4">
                            <label><strong>Comentario:</strong></label>
                            <p id="detalle_comentario">-</p>
                        </div>
                    </div>

                    <div class="text-center">
                        <img id="detalle_imagen" src="vistas/img/plantilla/default.png"
                            alt="Imagen del producto" style="max-width:200px; border:1px solid #ccc; padding:5px;">
                    </div>

                    <div class="form-group">
                        <label><strong>Descripción del Producto:</strong></label>
                        <p id="detalle_descripcion" style="text-align: justify;">-</p>
                    </div>

                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cerrar</button>
            </div>

        </div>
    </div>
</div>

<!-- JS -->
<script src="vistas/js/misReservas.js"></script>

<style>
    #divReserva {
        overflow: auto;
        width: 100%;
    }
</style>