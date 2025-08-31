<div class="content-wrapper">

    <section class="content-header">
        <h1>
            Administrar Empresas
        </h1>
        <ol class="breadcrumb">
            <li><a href="dashboard"><i class="fa fa-dashboard"></i> Inicio</a></li>
            <li class="active">Administrar Empresas</li>
        </ol>
    </section>

    <section class="content">
        <div class="box">

            <div class="box-header with-border">
                <div class="form-group col-md-3 col-sm-6 col-xs-12">
                    <button class="btn btn-primary btn-block" data-toggle="modal" data-target="#modalAgregarEmpresa">
                        <i class="fa fa-plus"></i> Agregar Empresa
                    </button>
                </div>
                <div class="form-group col-md-9 col-sm-6 col-xs-12">
                    <input type="text" style="text-align: center; font-size: 16px;" class="form-control" id="filtradoEmpresas" autocomplete="off" placeholder="Buscar por nombre, ciudad o barrio...">
                </div>
            </div>

            <div class="box-body">
                <div id="div1">
                    <table class="table table-bordered table-striped dt-responsive tablaEmpresas" width="100%">
                        <thead>
                            <tr>
                                <th style="width:10px;">#</th>
                                <th>Nombre</th>
                                <th>Calle</th>
                                <th>Ciudad</th>
                                <th>Estado</th>
                                <th>Acciones</th>
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

<div id="modalAgregarEmpresa" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form role="form" method="post" id="formAgregarEmpresa">

                <div class="modal-header" style="background:#3c8dbc; color:white">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Agregar Nueva Empresa</h4>
                </div>

                <div class="modal-body">
                    <div class="box-body">

                        <p class="text-primary"><strong>Datos de la Empresa</strong></p>

                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-industry"></i></span>
                                <input type="text" class="form-control" name="nuevoNombre" placeholder="Ingresar nombre de la empresa" required>
                            </div>
                        </div>

                        <hr>
                        <p class="text-primary"><strong>Dirección Principal</strong></p>

                        <div class="row">
                            <div class="form-group col-sm-8">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-road"></i></span>
                                    <input type="text" class="form-control" name="nuevaCalle" placeholder="Calle o Avenida" required>
                                </div>
                            </div>
                            <div class="form-group col-sm-4">
                                <div class="input-group">
                                    <span class="input-group-addon">#</span>
                                    <input type="text" class="form-control" name="nuevoNumero" placeholder="Número">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-sm-6">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-map-o"></i></span>
                                    <input type="text" class="form-control" name="nuevoBarrio" placeholder="Barrio" required>
                                </div>
                            </div>
                            <div class="form-group col-sm-6">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-map"></i></span>
                                    <input type="text" class="form-control" name="nuevaCiudad" placeholder="Ciudad" value="Asunción" required>
                                </div>
                            </div>
                        </div>

                        <hr>
                        <p class="text-primary"><strong>Georeferencia (para Google Maps)</strong></p>

                        <div class="row">
                            <div class="form-group col-sm-6">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-map-pin"></i></span>
                                    <input type="text" class="form-control" name="nuevaLatitud" placeholder="Latitud (ej: -25.2968)">
                                </div>
                            </div>
                            <div class="form-group col-sm-6">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-map-pin"></i></span>
                                    <input type="text" class="form-control" name="nuevaLongitud" placeholder="Longitud (ej: -57.6322)">
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>
                    <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Guardar Empresa</button>
                </div>

            </form>
        </div>
    </div>
</div>

<div id="modalEditarEmpresa" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form role="form" method="post" id="formEditarEmpresa">

                <div class="modal-header" style="background:#f39c12; color:white">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Editar Datos de Empresa</h4>
                </div>

                <div class="modal-body">
                    <div class="box-body">

                        <p class="text-yellow"><strong>Datos de la Empresa</strong></p>

                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-industry"></i></span>
                                <input type="text" class="form-control" id="editarNombre" name="editarNombre" required>
                                <input type="hidden" id="idEmpresa" name="idEmpresa">
                                <input type="hidden" id="idDireccion" name="idDireccion">
                                <input type="hidden" id="idGeoreferencia" name="idGeoreferencia">
                            </div>
                        </div>

                        <hr>
                        <p class="text-yellow"><strong>Dirección Principal</strong></p>

                        <div class="row">
                            <div class="form-group col-sm-8">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-road"></i></span>
                                    <input type="text" class="form-control" id="editarCalle" name="editarCalle" required>
                                </div>
                            </div>
                            <div class="form-group col-sm-4">
                                <div class="input-group">
                                    <span class="input-group-addon">#</span>
                                    <input type="text" class="form-control" id="editarNumero" name="editarNumero">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-sm-6">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-map-o"></i></span>
                                    <input type="text" class="form-control" id="editarBarrio" name="editarBarrio" required>
                                </div>
                            </div>
                            <div class="form-group col-sm-6">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-map"></i></span>
                                    <input type="text" class="form-control" id="editarCiudad" name="editarCiudad" required>
                                </div>
                            </div>
                        </div>

                        <hr>
                        <p class="text-yellow"><strong>Georeferencia (para Google Maps)</strong></p>

                        <div class="row">
                            <div class="form-group col-sm-6">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-map-pin"></i></span>
                                    <input type="text" class="form-control" id="editarLatitud" name="editarLatitud">
                                </div>
                            </div>
                            <div class="form-group col-sm-6">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-map-pin"></i></span>
                                    <input type="text" class="form-control" id="editarLongitud" name="editarLongitud">
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>
                    <button type="submit" class="btn btn-warning"><i class="fa fa-save"></i> Modificar Cambios</button>
                </div>

            </form>
        </div>
    </div>
</div>

<script src="vistas/js/empresa.js"></script>

<style>
    #div1 {
        overflow: auto;
        width: 100%;
    }
</style>