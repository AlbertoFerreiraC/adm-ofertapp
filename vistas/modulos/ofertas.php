<?php
// Iniciar sesión solo si no está ya activa
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$idUsuarioSesion = $_SESSION['id_usuario'] ?? '';
?>

<div class="content-wrapper">

    <input type="hidden" id="idUsuarioSesion" value="<?php echo $idUsuarioSesion; ?>">
    <section class="content-header">
        <h1>Productos en Oferta</h1>
        <ol class="breadcrumb">
            <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
            <li class="active">Ofertas</li>
        </ol>
    </section>

    <section class="content">
        <div class="box">

            <div class="box-header with-border">
                <div class="form-group col-md-6 col-sm-6 col-xs-12">
                    <input type="text" class="form-control" id="filtrarOferta"
                        style="text-align:center; font-size:16px;"
                        placeholder="Buscar productos en oferta...">
                </div>
            </div>

            <div class="box-body">
                <div id="divOferta">
                    <table class="table table-bordered table-striped dt-responsive" id="tablaOfertas" width="100%">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Título</th>
                                <th>Descripción</th>
                                <th>Cantidad</th>
                                <th>Costo</th>
                                <th>Categoría</th>
                                <th>Color</th>
                                <th>Tamaño</th>
                                <th>Condición</th>
                                <th>Estado</th>
                                <th>Imagen</th>
                                <th>Oferta</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Se llena por AJAX -->
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </section>
</div>

<!-- Script JS -->
<script src="vistas/js/ofertas.js"></script>

<style>
    #divOferta {
        overflow: auto;
        width: 100%;
    }
</style>