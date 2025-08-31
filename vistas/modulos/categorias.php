<div class="content-wrapper">

    <section class="content-header">
        <h1>
            Administrar Categorías
        </h1>
        <ol class="breadcrumb">
            <li><a href="dashboard"><i class="fa fa-dashboard"></i> Inicio</a></li>
            <li class="active">Administrar Categorías</li>
        </ol>
    </section>

    <section class="content">
        <div class="box">

            <div class="box-header with-border">
                <div class="form-group col-md-3 col-sm-6 col-xs-12">
                    <button class="btn btn-primary btn-block" data-toggle="modal" data-target="#modalAgregarCategoria">
                        <i class="fa fa-plus"></i> Agregar Categoría
                    </button>
                </div>
                <div class="form-group col-md-9 col-sm-6 col-xs-12">
                    <input type="text" style="text-align: center; font-size: 16px;" class="form-control" id="filtradoCategorias" autocomplete="off" placeholder="Buscar por descripción...">
                </div>
            </div>

            <div class="box-body">
                <div id="div1">
                    <table class="table table-bordered table-striped dt-responsive tablaCategorias" id="tabla" width="100%">
                        <thead>
                            <tr>
                                <th style="width:10px;">#</th>
                                <th>Descripción</th>
                                <th style="width:100px;">Estado</th>
                                <th style="width:120px;">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </section>
</div>

<div id="modalAgregarCategoria" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <form role="form" method="post" id="formAgregarCategoria">
                <div class="modal-header" style="background:#3c8dbc; color:white">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Agregar Nueva Categoría</h4>
                </div>
                <div class="modal-body">
                    <div class="box-body">
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-tags"></i></span>
                                <input type="text" class="form-control" name="descripcionAgregar" placeholder="Ingresar descripción de la categoría" required>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>
                    <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Guardar Categoría</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div id="modalEditarCategoria" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <form role="form" method="post" id="formEditarCategoria">
                <div class="modal-header" style="background:#f39c12; color:white">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Editar Categoría</h4>
                </div>
                <div class="modal-body">
                    <div class="box-body">
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-tags"></i></span>
                                <input type="text" class="form-control" id="descripcionModificar" name="descripcionModificar" required>
                                <input type="hidden" id="idCategoria" name="idCategoria">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>
                    <button type="submit" class="btn btn-warning" id="btnModificar"><i class="fa fa-save"></i> Modificar Cambios</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="vistas/js/categorias.js"></script>

<style>
    #div1 {
        overflow: auto;
        width: 100%;
    }
</style>