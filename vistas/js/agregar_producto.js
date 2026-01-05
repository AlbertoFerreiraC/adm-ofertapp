// ================= CARGA MASIVA =================
let productosMasivos = [];
let imagenesMasivasMap = {};

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

    // === CARGA MASIVA ===
    $("#archivoMasivo").on("change", leerArchivoMasivo);
    $("#imagenesMasivas").on("change", leerImagenesMasivas);

    $("#btnConfirmarCargaMasiva").on("click", confirmarCargaMasiva);
});

function leerImagenesMasivas() {
    imagenesMasivasMap = {};

    const files = this.files;
    Array.from(files).forEach(file => {
        const reader = new FileReader();
        reader.onload = e => {
            imagenesMasivasMap[file.name] = e.target.result;

            if (productosMasivos.length > 0) {
                renderTablaMasiva();
            }
        };
        reader.readAsDataURL(file);
    });
}


function leerArchivoMasivo() {
    const file = this.files[0];
    if (!file) return;

    const ext = file.name.split(".").pop().toLowerCase();

    if (ext === "json") {
        const reader = new FileReader();
        reader.onload = e => {
            productosMasivos = JSON.parse(e.target.result);
            renderTablaMasiva();
        };
        reader.readAsText(file);
    }

    if (ext === "xlsx") {
        const reader = new FileReader();
        reader.onload = e => {
            const workbook = XLSX.read(e.target.result, { type: "binary" });
            const sheet = workbook.Sheets[workbook.SheetNames[0]];
            productosMasivos = XLSX.utils.sheet_to_json(sheet);
            renderTablaMasiva();
        };
        reader.readAsBinaryString(file);
    }
}

function renderTablaMasiva() {
    const tbody = $("#tablaPreviewMasiva tbody");
    tbody.empty();

    if (productosMasivos.length === 0) {
        tbody.append(`
            <tr>
                <td colspan="6" class="text-center text-muted">
                    No hay datos para mostrar
                </td>
            </tr>
        `);
        return;
    }

    productosMasivos.forEach((p, i) => {
        const img = imagenesMasivasMap[p.imagen]
            ? `<img src="${imagenesMasivasMap[p.imagen]}" width="50">`
            : `<span class="text-danger">No encontrada</span>`;

        tbody.append(`
            <tr>
                <td>${i + 1}</td>
                <td>${p.titulo || ''}</td>
                <td>${p.cantidad || 0}</td>
                <td>${p.costo || 0}</td>
                <td>${p.categoria_id || ''}</td>
                <td>${img}</td>
            </tr>
        `);
    });
}

function confirmarCargaMasiva() {

    if (productosMasivos.length === 0) {
        Swal.fire("Atención", "No hay productos para cargar", "warning");
        return;
    }

    const faltantes = productosMasivos.filter(p => !imagenesMasivasMap[p.imagen]);
    if (faltantes.length > 0) {
        Swal.fire(
            "Imágenes faltantes",
            "Hay productos sin imagen asociada",
            "error"
        );
        return;
    }

    const fd = new FormData();
    fd.append("empresa_id", $("#empresa_id_masivo").val());
    fd.append("productos", JSON.stringify(productosMasivos));

    const files = $("#imagenesMasivas")[0].files;
    for (let i = 0; i < files.length; i++) {
        fd.append("imagenes[]", files[i]);
    }

    $.ajax({
        url: "../api-ofertapp/producto/funAgregarMasivo.php",
        method: "POST",
        data: fd,
        contentType: false,
        processData: false,
        success: function () {
            Swal.fire("Éxito", "Carga masiva realizada correctamente", "success")
                .then(() => {

                    // 🔹 Limpiar modales
                    limpiarModalMasivo();
                    limpiarModalAgregarProducto();

                    // 🔹 Cerrar modales
                    $("#modalCargaMasiva").modal("hide");
                    $("#modalAgregarProducto").modal("hide");

                    // 🔹 Recargar tabla
                    cargarDatosTablaProducto();
                });

        },
        error: function () {
            Swal.fire("Error", "No se pudo realizar la carga masiva", "error");
        }
    });
}


// ================= LIMPIAR MODAL MASIVO =================
function limpiarModalMasivo() {
    productosMasivos = [];
    imagenesMasivasMap = {};

    // Limpiar inputs file
    $("#archivoMasivo").val("");
    $("#imagenesMasivas").val("");

    // Limpiar tabla preview
    $("#tablaPreviewMasiva tbody").html(`
        <tr>
            <td colspan="6" class="text-center text-muted">
                Cargue un archivo para visualizar los productos
            </td>
        </tr>
    `);
}

// ================= LIMPIAR MODAL AGREGAR =================
function limpiarModalAgregarProducto() {
    $("#formProductoAgregar")[0].reset();

    // Reset preview imagen
    $("#previewImagen").attr(
        "src",
        "vistas/img/plantilla/default.png"
    );
}


// ================= FUNCIONES =================
function cargarDatosTablaProducto() {
    $("#tablaProductos tbody").empty();

    const idUsuario = $("#idUsuarioSesion").val();

    if (!idUsuario) {
        Swal.fire({
            icon: "warning",
            title: "Sesión no iniciada",
            text: "Debes iniciar sesión para administrar tus productos.",
            confirmButtonText: "Aceptar"
        });
        return;
    }
    const tipoUsuario = $("#tipoUsuarioSesion").val();

    $.ajax({
        url: "../api-ofertapp/producto/funListar.php",
        method: "GET",
        data: {
            idUsuario: idUsuario,
            tipoUsuario: tipoUsuario
        },
        cache: false,
        dataType: "json",
        success: function (response) {
            let filas = "";

            if (!response || response.length === 0) {
                filas = `
                    <tr>
                        <td colspan="12" class="text-center text-muted">
                            No hay productos registrados.
                        </td>
                    </tr>
                `;
                $("#tablaProductos tbody").append(filas);
                return;
            }

            response.forEach((item, index) => {
                filas += `
                    <tr id="fila_${item.idProducto}">
                        <td>${index + 1}</td>
                        <td>${item.titulo}</td>
                        <td>${item.cantidad}</td>
                        <td>Gs. ${parseInt(item.costo).toLocaleString('es-PY')}</td>
                        <td>${item.categoria}</td>
                        <td>${item.color ?? '-'}</td>
                        <td>${item.tamano ?? '-'}</td>
                        <td>${item.condicion}</td>
                        <td>
                            <span class="label ${item.estado === 'activo' ? 'label-success' : 'label-danger'}">
                                ${item.estado}
                            </span>
                        </td>
                        <td>
                            <img src="${item.imagen}" alt="img" style="width:60px; height:auto; border:1px solid #ccc;">
                        </td>
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

            $("#tablaProductos tbody").append(filas);

            // === Eventos dinámicos ===
            $(".btnModificarProducto").click(function () {
                const idProducto = this.id;
                obtenerDatosProducto(idProducto);
            });

            $(".btnEliminarProducto").click(function () {
                const id = this.id;
                Swal.fire({
                    icon: "warning",
                    title: "¿Está seguro de eliminar el producto?",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    cancelButtonText: "Cancelar",
                    confirmButtonText: "Sí, eliminar"
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
                title: "Error al cargar productos",
                text: "No se pudo obtener la lista de productos.",
                confirmButtonText: "Aceptar"
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
