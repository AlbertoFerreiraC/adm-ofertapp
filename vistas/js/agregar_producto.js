$(document).ready(function () {

    // Cargar tabla de productos
    cargarDatosTablaProducto();

    // Botón Guardar (Agregar)
    $('#formProductoAgregar').submit(function (e) {
        e.preventDefault();
        agregarProducto();
    });

    // Botón Guardar Cambios (Editar)
    $('#formProductoEditar').submit(function (e) {
        e.preventDefault();
        modificarProducto();
    });

    // Filtrado dinámico
    $('#filtradoProducto').on('keyup', function () {
        var texto = $(this).val().toLowerCase();
        $('#tablaProductos tbody tr').each(function () {
            var filaTexto = $(this).text().toLowerCase();
            $(this).toggle(filaTexto.indexOf(texto) !== -1);
        });
    });

    // Cargar categorías al abrir modal agregar
    categoriaProductoAgregar();
});


// ================= FUNCIONES =================

// -------- Listar --------
function cargarDatosTablaProducto() {
    $("#tablaProductos tbody").empty();

    $.ajax({
        url: "../api-ofertapp/producto/funListar.php",
        method: "GET",
        cache: false,
        dataType: "json",
        success: function (response) {
            let filas = "";

            response.forEach((item, index) => {
                filas += `
                    <tr id="fila_${item.idProducto}">
                        <td>${index + 1}</td>
                        <td>${item.titulo}</td>
                        <td>${item.descripcion}</td>
                        <td>${item.cantidad}</td>
                        <td>Gs. ${parseInt(item.costo).toLocaleString('es-PY')}</td>
                        <td>${item.categoria}</td>
                        <td>${item.color ?? '-'}</td>
                        <td>${item.tamano ?? '-'}</td>
                        <td>${item.condicion}</td>
                        <td>${item.estado}</td>
                        <td><img src="${item.imagen}" alt="img" style="width:60px; height:auto; border:1px solid #ccc;"></td>
                        <td>
                            <center>
                                <div class="btn-group">
                                    <button title="Modificar" class="btn btn-warning btnModificarProducto" id="${item.idProducto}">
                                        <i class="fa fa-pencil"></i>
                                    </button>
                                    <button title="Eliminar" class="btn btn-danger btnEliminarProducto" id="${item.idProducto}">
                                        <i class="fa fa-times"></i>
                                    </button>
                                </div>
                            </center>
                        </td>
                    </tr>
                `;
            });

            $('#tablaProductos tbody').append(filas);

            // Evento dinámico: modificar producto
            $('.btnModificarProducto').click(function () {
                const idProducto = this.id;
                obtenerDatosProducto(idProducto);
            });

            // Evento dinámico: eliminar producto
            $('.btnEliminarProducto').click(function () {
                const id = this.id;
                Swal.fire({
                    icon: 'warning',
                    title: '¿Está seguro de eliminar el producto?',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    cancelButtonText: 'Cancelar',
                    confirmButtonText: 'Sí, eliminar'
                }).then((result) => {
                    if (result.isConfirmed) {
                        eliminarProducto(id);
                    }
                });
            });
        },
        error: function () {
            Swal.fire({
                icon: "error",
                title: "Error al cargar productos"
            });
        }
    });
}


// -------- Agregar --------
function agregarProducto() {
    var formData = new FormData($("#formProductoAgregar")[0]);

    $.ajax({
        url: "../api-ofertapp/producto/funAgregar.php",
        method: "POST",
        data: formData,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function (response) {
            if (response['mensaje'] === "ok") {
                Swal.fire({
                    icon: "success",
                    title: "Producto registrado con éxito"
                }).then(() => {
                    cargarDatosTablaProducto();
                    $("#formProductoAgregar")[0].reset();
                    $("#modalAgregarProducto").modal("hide");
                });
            } else if (response['mensaje'] === "registro_existente") {
                Swal.fire({
                    icon: "error",
                    title: "El producto ya existe"
                });
            } else {
                Swal.fire({
                    icon: "error",
                    title: "Error al procesar la carga"
                });
            }
        },
        error: function () {
            Swal.fire({
                icon: "error",
                title: "Error al procesar la carga"
            });
        }
    });
}


// -------- Obtener datos para modificar --------
function obtenerDatosProducto(idProducto) {
    $.ajax({
        url: "../api-ofertapp/producto/funDatosParaModificar.php",
        method: "POST",
        data: JSON.stringify({ idProducto: idProducto }),
        contentType: "application/json; charset=utf-8",
        dataType: "json",
        success: function (response) {
            if (response.length > 0) {
                const p = response[0];

                // Cargar datos en el modal
                $("#idProductoEditar").val(p.idProducto);
                $("#titulo_editar").val(p.titulo);
                $("#descripcion_editar").val(p.descripcion);
                $("#cantidad_editar").val(p.cantidad);
                $("#costo_editar").val(p.costo);
                $("#color_editar").val(p.color);
                $("#tamano_editar").val(p.tamano);
                $("#condicion_editar").val(p.condicion);
                $("#estado_editar").val(p.estado);
                $("#previewImagenEditar").attr("src", p.imagen);

                // Cargar categoría seleccionada
                categoriaProductoEditar(p.Categoria_idCategoria);

                // Mostrar modal de edición
                $("#modalEditarProducto").modal("show");
            }
        },
        error: function () {
            Swal.fire({
                icon: "error",
                title: "Error al traer datos del producto"
            });
        }
    });
}


// -------- Modificar --------
function modificarProducto() {
    var formData = new FormData($("#formProductoEditar")[0]);

    $.ajax({
        url: "../api-ofertapp/producto/funModificar.php",
        method: "POST",
        data: formData,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function (response) {
            if (response['mensaje'] === "ok") {
                Swal.fire({
                    icon: "success",
                    title: "Producto modificado con éxito"
                }).then(() => {
                    cargarDatosTablaProducto();
                    $("#modalEditarProducto").modal("hide");
                });
            } else {
                Swal.fire({
                    icon: "error",
                    title: "Error al modificar producto"
                });
            }
        },
        error: function () {
            Swal.fire({
                icon: "error",
                title: "Error al modificar producto"
            });
        }
    });
}


// -------- Eliminar --------
function eliminarProducto(idProducto) {
    $.ajax({
        url: "../api-ofertapp/producto/funEliminar.php",
        method: "POST",
        data: JSON.stringify({ idProducto: idProducto }),
        contentType: "application/json; charset=utf-8",
        dataType: "json",
        success: function (response) {
            if (response['mensaje'] === "ok") {
                Swal.fire({
                    icon: "success",
                    title: "Producto eliminado con éxito"
                }).then(() => {
                    $("#fila_" + idProducto).remove();
                });
            } else {
                Swal.fire({
                    icon: "error",
                    title: "Error al eliminar producto"
                });
            }
        },
        error: function () {
            Swal.fire({
                icon: "error",
                title: "Error al eliminar producto"
            });
        }
    });
}


// -------- Categorías --------
function categoriaProductoAgregar() {
    $('#categoriaProducto').empty();
    $('#categoriaProducto').append('<option value="">Seleccionar...</option>');

    $.ajax({
        url: "../api-ofertapp/categoria/funListar.php",
        method: "GET",
        dataType: "json",
        success: function (response) {
            response.forEach(cat => {
                $('#categoriaProducto').append('<option value="' + cat.id + '">' + cat.descripcion + '</option>');
            });
        }
    });
}

function categoriaProductoEditar(idCategoria) {
    $('#categoria_editar').empty();
    $.ajax({
        url: "../api-ofertapp/categoria/funListar.php",
        method: "GET",
        dataType: "json",
        success: function (response) {
            response.forEach(cat => {
                $('#categoria_editar').append('<option value="' + cat.id + '">' + cat.descripcion + '</option>');
            });
            $("#categoria_editar").val(idCategoria);
        }
    });
}
