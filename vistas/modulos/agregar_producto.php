<?php
// Iniciar sesión solo si no está ya activa
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Capturar idEmpresa desde sesión, o dejar vacío si no existe
$idEmpresaSesion = isset($_SESSION['idEmpresa']) ? $_SESSION['idEmpresa'] : '';
$idUsuarioSesion = $_SESSION['id_usuario'] ?? '';
$tipoUsuarioSesion = $_SESSION['tipo_usuario'] ?? '';
?>

<div class="content-wrapper">

    <input type="hidden" id="idUsuarioSesion" value="<?php echo $idUsuarioSesion; ?>">
    <input type="hidden" id="tipoUsuarioSesion" value="<?php echo $tipoUsuarioSesion; ?>">
    <section class="content-header">
        <h1>Administrar Productos</h1>
        <ol class="breadcrumb">
            <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
            <li class="active">Productos</li>
        </ol>
    </section>

    <section class="content">
        <div class="box">

            <div class="box-header with-border">
                <div class="form-group col-md-3 col-sm-6 col-xs-12">
                    <button class="btn btn-success btn-block" data-toggle="modal" data-target="#modalAgregarProducto">
                        <i class="fa fa-plus"></i> Agregar Producto
                    </button>
                </div>
                <div class="form-group col-md-9 col-sm-6 col-xs-12">
                    <input type="text" style="text-align: center; font-size: 16px;"
                        class="form-control" id="filtradoProducto"
                        autocomplete="off" placeholder="Buscar producto...">
                </div>
            </div>

            <div class="box-body">
                <div id="divProducto">
                    <table class="table table-bordered table-striped dt-responsive" id="tablaProductos" width="100%">
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
                                <th style="width:120px;">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Llenado dinámico desde JS -->
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </section>
</div>

<!--=====================================
MODAL AGREGAR PRODUCTO
======================================-->
<div id="modalAgregarProducto" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form role="form" method="post" id="formProductoAgregar" enctype="multipart/form-data">

                <div class="modal-header" style="background:#3c8dbc; color:white">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Agregar Producto</h4>
                </div>

                <div class="modal-body">
                    <div class="box-body">

                        <!-- Campo oculto con la empresa logueada -->
                        <input type="hidden" id="empresa_id" name="empresa_id" value="<?php echo $idEmpresaSesion; ?>">

                        <!-- Título -->
                        <div class="form-group">
                            <label>Título del Producto</label>
                            <input type="text" class="form-control" name="titulo" id="titulo" required>
                        </div>

                        <!-- Descripción -->
                        <div class="form-group">
                            <label>Descripción</label>
                            <textarea class="form-control" name="descripcion" id="descripcion" rows="3" required></textarea>
                        </div>

                        <!-- Cantidad -->
                        <div class="form-group">
                            <label>Cantidad</label>
                            <input type="number" class="form-control" name="cantidad" id="cantidad" min="0" required>
                        </div>

                        <!-- Costo -->
                        <div class="form-group">
                            <label>Costo (Gs.)</label>
                            <input type="number" class="form-control" name="costo" id="costo" min="0" required>
                        </div>

                        <!-- Categoría -->
                        <div class="form-group">
                            <label>Categoría</label>
                            <select class="form-control" name="categoria_id" id="categoriaProducto" required>
                                <option value="">Seleccione una categoría</option>
                            </select>
                        </div>

                        <!-- Color -->
                        <div class="form-group">
                            <label>Color</label>
                            <input type="text" class="form-control" name="color" id="color">
                        </div>

                        <!-- Tamaño -->
                        <div class="form-group">
                            <label>Tamaño</label>
                            <input type="text" class="form-control" name="tamano" id="tamano">
                        </div>

                        <!-- Condición -->
                        <div class="form-group">
                            <label>Condición</label>
                            <select class="form-control" name="condicion" id="condicion" required>
                                <option value="nuevo">Nuevo</option>
                                <option value="usado">Usado</option>
                            </select>
                        </div>

                        <!-- Estado -->
                        <div class="form-group">
                            <label>Estado</label>
                            <select class="form-control" name="estado" id="estado" required>
                                <option value="activo" selected>Activo</option>
                                <option value="inactivo">Inactivo</option>
                            </select>
                        </div>

                        <!-- Imagen -->
                        <div class="form-group">
                            <label>Imagen del Producto</label>
                            <input type="file" class="form-control" name="imagen" id="imagen" accept="image/*" required>
                            <small class="help-block">Formatos permitidos: JPG, PNG, GIF. Tamaño máx: 2MB.</small>
                            <div style="margin-top:10px;">
                                <img id="previewImagen" src="vistas/img/plantilla/default.png" alt="Preview" style="max-width:200px; border:1px solid #ccc; padding:5px;">
                            </div>
                        </div>

                        <!-- En oferta -->
                        <div class="form-group">
                            <label>¿En oferta?</label>
                            <select class="form-control" name="en_oferta" id="en_oferta" required>
                                <option value="0" selected>No</option>
                                <option value="1">Sí</option>
                            </select>
                        </div>

                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>
                    <button type="submit" class="btn btn-primary" id="btnGuardarProducto">
                        <i class="fa fa-save"></i> Guardar Producto
                    </button>
                </div>

            </form>
        </div>
    </div>
</div>

<!--=====================================
MODAL MODIFICAR PRODUCTO
======================================-->
<div id="modalEditarProducto" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form role="form" method="post" id="formProductoEditar" enctype="multipart/form-data">

                <div class="modal-header" style="background:#f39c12; color:white">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Modificar Producto</h4>
                </div>

                <div class="modal-body">
                    <div class="box-body">

                        <!-- Campo oculto: ID del producto -->
                        <input type="hidden" id="idProductoEditar" name="idProductoEditar">

                        <!-- Campo oculto con la empresa -->
                        <input type="hidden" id="empresa_id_editar" name="empresa_id_editar" value="<?php echo $idEmpresaSesion; ?>">

                        <!-- Título -->
                        <div class="form-group">
                            <label>Título del Producto</label>
                            <input type="text" class="form-control" name="titulo_editar" id="titulo_editar" required>
                        </div>

                        <!-- Descripción -->
                        <div class="form-group">
                            <label>Descripción</label>
                            <textarea class="form-control" name="descripcion_editar" id="descripcion_editar" rows="3" required></textarea>
                        </div>

                        <!-- Cantidad -->
                        <div class="form-group">
                            <label>Cantidad</label>
                            <input type="number" class="form-control" name="cantidad_editar" id="cantidad_editar" min="0" required>
                        </div>

                        <!-- Costo -->
                        <div class="form-group">
                            <label>Costo (Gs.)</label>
                            <input type="number" class="form-control" name="costo_editar" id="costo_editar" min="0" required>
                        </div>

                        <!-- Categoría -->
                        <div class="form-group">
                            <label>Categoría</label>
                            <select class="form-control" name="categoria_editar" id="categoria_editar" required>
                                <option value="">Seleccione una categoría</option>
                            </select>
                        </div>

                        <!-- Color -->
                        <div class="form-group">
                            <label>Color</label>
                            <input type="text" class="form-control" name="color_editar" id="color_editar">
                        </div>

                        <!-- Tamaño -->
                        <div class="form-group">
                            <label>Tamaño</label>
                            <input type="text" class="form-control" name="tamano_editar" id="tamano_editar">
                        </div>

                        <!-- Condición -->
                        <div class="form-group">
                            <label>Condición</label>
                            <select class="form-control" name="condicion_editar" id="condicion_editar" required>
                                <option value="nuevo">Nuevo</option>
                                <option value="usado">Usado</option>
                            </select>
                        </div>

                        <!-- Estado -->
                        <div class="form-group">
                            <label>Estado</label>
                            <select class="form-control" name="estado_editar" id="estado_editar" required>
                                <option value="activo">Activo</option>
                                <option value="inactivo">Inactivo</option>
                            </select>
                        </div>

                        <!-- Imagen -->
                        <div class="form-group">
                            <label>Imagen del Producto</label>
                            <input type="file" class="form-control" name="imagen_editar" id="imagen_editar" accept="image/*">
                            <small class="help-block">Si no desea cambiar la imagen, deje este campo vacío.</small>
                            <div style="margin-top:10px;">
                                <img id="previewImagenEditar" src="vistas/img/plantilla/default.png" alt="Preview" style="max-width:200px; border:1px solid #ccc; padding:5px;">
                            </div>
                        </div>

                        <!-- En oferta -->
                        <div class="form-group">
                            <label>¿En oferta?</label>
                            <select class="form-control" name="en_oferta_editar" id="en_oferta_editar" required>
                                <option value="0">No</option>
                                <option value="1">Sí</option>
                            </select>
                        </div>

                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-warning" id="btnActualizarProducto">
                        <i class="fa fa-save"></i> Guardar Cambios
                    </button>
                </div>

            </form>
        </div>
    </div>
</div>

<script>
    // Preview automática de la imagen seleccionada
    document.getElementById("imagen_editar").addEventListener("change", function(e) {
        const reader = new FileReader();
        reader.onload = function(e) {
            document.getElementById("previewImagenEditar").src = e.target.result;
        }
        reader.readAsDataURL(this.files[0]);
    });
</script>


<!-- JS específico de productos -->
<script src="vistas/js/agregar_producto.js"></script>

<script>
    // Preview automática de la imagen seleccionada
    document.getElementById("imagen").addEventListener("change", function(e) {
        const reader = new FileReader();
        reader.onload = function(e) {
            document.getElementById("previewImagen").src = e.target.result;
        }
        reader.readAsDataURL(this.files[0]);
    });
</script>

<style>
    #divProducto {
        overflow: auto;
        width: 100%;
    }
</style>