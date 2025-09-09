<div class="content-wrapper">

    <!-- CABEZOTE -->
    <section class="content-header">
        <h1>Gestión de Clientes <small>Módulo CRM</small></h1>
        <ol class="breadcrumb">
            <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
            <li class="active">Clientes</li>
        </ol>
    </section>

    <!-- CONTENIDO -->
    <section class="content">

        <div class="box">

            <!-- HEADER DE ACCIONES -->
            <div class="box-header with-border">
                <div class="row">
                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <button class="btn btn-success btn-block" data-toggle="modal" data-target="#modal-nuevo">
                            <i class="fa fa-user-plus"></i> Nuevo Cliente
                        </button>
                    </div>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" class="form-control" placeholder="Buscar por nombre, email, documento…">
                    </div>
                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <button id="btnExportar" class="btn btn-primary btn-block">
                            <i class="fa fa-file-excel-o"></i> Exportar a Excel
                        </button>
                    </div>
                </div>
            </div>

            <!-- TABLA -->
            <div class="box-body">
                <div class="table-responsive">
                    <table id="tablaClientes" class="table table-bordered table-striped" width="100%">
                        <thead style="background:#f4f4f4; color:#333;">
                            <tr>
                                <th style="width:70px;">ID</th>
                                <th>Cliente</th>
                                <th>Email</th>
                                <th>Teléfono</th>
                                <th>Documento</th>
                                <th>Dirección</th>
                                <th>Estado</th>
                                <th>Fecha Alta</th>
                                <th style="width:160px;">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>0001</td>
                                <td>María Fernanda Duarte</td>
                                <td>maria.duarte@email.com</td>
                                <td>+595 981 123 456</td>
                                <td>CI 4.567.890</td>
                                <td>Av. España 345, Asunción</td>
                                <td><span class="label label-success">Activo</span></td>
                                <td>12/06/2025</td>
                                <td>
                                    <div class="btn-group">
                                        <button class="btn btn-info btn-sm" data-toggle="modal" data-target="#modal-ver-0001"><i class="fa fa-eye"></i></button>
                                        <button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#modal-editar-0001"><i class="fa fa-edit"></i></button>
                                        <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modal-eliminar-0001"><i class="fa fa-trash"></i></button>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>0002</td>
                                <td>Carlos López</td>
                                <td>c.lopez@email.com</td>
                                <td>+595 982 444 222</td>
                                <td>CI 2.345.678</td>
                                <td>B° San Vicente, Asunción</td>
                                <td><span class="label label-warning">Pendiente</span></td>
                                <td>28/07/2025</td>
                                <td>
                                    <div class="btn-group">
                                        <button class="btn btn-info btn-sm"><i class="fa fa-eye"></i></button>
                                        <button class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></button>
                                        <button class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>0003</td>
                                <td>Ana Giménez</td>
                                <td>ana.gimenez@email.com</td>
                                <td>+595 971 888 777</td>
                                <td>CI 5.678.901</td>
                                <td>Limpio, Central</td>
                                <td><span class="label label-danger">Inactivo</span></td>
                                <td>09/08/2025</td>
                                <td>
                                    <div class="btn-group">
                                        <button class="btn btn-info btn-sm"><i class="fa fa-eye"></i></button>
                                        <button class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></button>
                                        <button class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- PAGINACIÓN -->
            <div class="box-footer clearfix">
                <ul class="pagination pagination-sm no-margin pull-right">
                    <li><a href="#">«</a></li>
                    <li class="active"><a href="#">1</a></li>
                    <li><a href="#">2</a></li>
                    <li><a href="#">3</a></li>
                    <li><a href="#">»</a></li>
                </ul>
            </div>

        </div>

    </section>
</div>

<!-- ==============================
MODALES
============================== -->

<!-- MODAL NUEVO -->
<div class="modal fade" id="modal-nuevo">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form>
                <div class="modal-header bg-green">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title"><i class="fa fa-user-plus"></i> Nuevo Cliente</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <label>Nombre y Apellido</label>
                            <input class="form-control" type="text" placeholder="Ej: Juan Pérez">
                        </div>
                        <div class="col-md-6">
                            <label>Documento</label>
                            <input class="form-control" type="text" placeholder="CI / RUC">
                        </div>
                        <div class="col-md-6">
                            <label>Email</label>
                            <input class="form-control" type="email" placeholder="correo@dominio.com">
                        </div>
                        <div class="col-md-6">
                            <label>Teléfono</label>
                            <input class="form-control" type="tel" placeholder="+595 9xx xxx xxx">
                        </div>
                        <div class="col-md-12">
                            <label>Dirección</label>
                            <input class="form-control" type="text" placeholder="Calle, número, barrio, ciudad">
                        </div>
                        <div class="col-md-6">
                            <label>Estado</label>
                            <select class="form-control">
                                <option>Activo</option>
                                <option>Pendiente</option>
                                <option>Inactivo</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label>Fecha de alta</label>
                            <input class="form-control" type="date">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-success">Guardar</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- MODAL VER -->
<div class="modal fade" id="modal-ver-0001">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title"><i class="fa fa-eye"></i> Ficha Cliente #0001</h4>
            </div>
            <div class="modal-body">
                <p><strong>Nombre:</strong> María Fernanda Duarte</p>
                <p><strong>Email:</strong> maria.duarte@email.com</p>
                <p><strong>Teléfono:</strong> +595 981 123 456</p>
                <p><strong>Documento:</strong> CI 4.567.890</p>
                <p><strong>Dirección:</strong> Av. España 345, Asunción</p>
                <p><strong>Estado:</strong> Activo</p>
                <p><strong>Fecha Alta:</strong> 12/06/2025</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-info pull-left" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>

<!-- MODAL EDITAR -->
<div class="modal fade" id="modal-editar-0001">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form>
                <div class="modal-header bg-yellow">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title"><i class="fa fa-edit"></i> Editar Cliente #0001</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <label>Nombre y Apellido</label>
                            <input class="form-control" type="text" value="María Fernanda Duarte">
                        </div>
                        <div class="col-md-6">
                            <label>Documento</label>
                            <input class="form-control" type="text" value="CI 4.567.890">
                        </div>
                        <div class="col-md-6">
                            <label>Email</label>
                            <input class="form-control" type="email" value="maria.duarte@email.com">
                        </div>
                        <div class="col-md-6">
                            <label>Teléfono</label>
                            <input class="form-control" type="tel" value="+595 981 123 456">
                        </div>
                        <div class="col-md-12">
                            <label>Dirección</label>
                            <input class="form-control" type="text" value="Av. España 345, Asunción">
                        </div>
                        <div class="col-md-6">
                            <label>Estado</label>
                            <select class="form-control">
                                <option selected>Activo</option>
                                <option>Pendiente</option>
                                <option>Inactivo</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label>Fecha de alta</label>
                            <input class="form-control" type="date" value="2025-06-12">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-warning">Guardar cambios</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- MODAL ELIMINAR -->
<div class="modal fade" id="modal-eliminar-0001">
    <div class="modal-dialog">
        <div class="modal-content">
            <form>
                <div class="modal-header bg-red">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title"><i class="fa fa-trash"></i> Eliminar Cliente</h4>
                </div>
                <div class="modal-body">
                    <p>¿Está seguro de eliminar a <strong>María Fernanda Duarte</strong>? Esta acción no se puede deshacer.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-danger">Eliminar</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- ==============================
EXPORTAR A EXCEL (SheetJS)
============================== -->
<script>
    document.getElementById("btnExportar").addEventListener("click", function() {
        // Obtener la tabla
        var tabla = document.getElementById("tablaClientes");
        var wb = XLSX.utils.table_to_book(tabla, {
            sheet: "Clientes"
        });
        // Exportar
        XLSX.writeFile(wb, "Clientes.xlsx");
    });
</script>