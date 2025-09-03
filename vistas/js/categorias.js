$(document).ready(function () {

    // Cargar tabla al inicio
    cargarDatosTabla();

    // Botones
    $('#btnGuardarEmpresa').click(function (e) {
        e.preventDefault(); // evitar recarga
        agregarDatos();
    });

    $('#btnModificarEmpresa').click(function (e) {
        e.preventDefault();
        modificarDatos();
    });

    // Filtrado dinámico
    $('#filtradoEmpresa').on('keyup', function () {
        var texto = $(this).val().toLowerCase();
        $('#tablaEmpresas tbody tr').each(function () {
            var filaTexto = $(this).text().toLowerCase();
            $(this).toggle(filaTexto.indexOf(texto) !== -1);
        });
    });

    // Cargar categorías al abrir modal
    categoriaAgregar();

});


// ================= FUNCIONES =================

// -------- Listar --------
function cargarDatosTabla() {
    $("#tablaEmpresas tbody").empty();

    $.ajax({
        url: "../api-ofertapp/empresa/funListar.php",
        method: "GET",
        cache: false,
        dataType: "json",
        success: function (response) {
            let filas = "";

            response.forEach((item, index) => {
                filas += `
                    <tr id="fila_${item.idEmpresa}">
                        <td>${index + 1}</td>
                        <td>${item.nombre}</td>
                        <td>${item.calle}, ${item.numero}, ${item.barrio}, ${item.ciudad}</td>
                        <td>${item.estado}</td>
                        <td>
                            <center>
                                <div class="btn-group">
                                    <button title="Modificar" class="btn btn-warning btnModificar" 
                                        id="${item.idEmpresa}" 
                                        data-toggle="modal" 
                                        data-target="#modalModificarEmpresa">
                                        <i class="fa fa-pencil"></i>
                                    </button>
                                    <button title="Eliminar" class="btn btn-danger btnEliminar" 
                                        id="${item.idEmpresa}">
                                        <i class="fa fa-times"></i>
                                    </button>
                                </div>
                            </center>
                        </td>
                    </tr>
                `;
            });

            $('#tablaEmpresas tbody').append(filas);

            // Eventos dinámicos
            $('.btnModificar').click(function () {
                obtenerDatosParaModificar(this.id);
            });

            $('.btnEliminar').click(function () {
                const id_registro = this.id;

                Swal.fire({
                    icon: 'warning',
                    title: '¿Está seguro de eliminar la empresa?',
                    text: "¡Si no lo está puede cancelar la acción!",
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    cancelButtonText: 'Cancelar',
                    confirmButtonText: 'Sí, eliminar'
                }).then((result) => {
                    if (result.isConfirmed) {
                        eliminarDatos(id_registro);
                    }
                });
            });
        },
        error: function () {
            Swal.fire({
                icon: "error",
                title: "Error al cargar la lista",
                confirmButtonText: "Aceptar"
            });
        }
    });
}


// -------- Agregar --------
function agregarDatos() {
    var params = {
        "nombre": $("#nombreEmpresa").val(),
        "categoria_id": $("#categoriaEmpresa").val(),
        "usuario_id": 1, // ID del usuario logueado

        // Dirección obligatoria
        "calle": $("#calle").val(),
        "numero": $("#numero").val(),
        "barrio": $("#barrio").val(),
        "ciudad": $("#ciudad").val(),
        "departamento": $("#departamento").val(),
        "pais": $("#pais").val(),

        // Geo
        "latitud": $("#latitud").val(),
        "longitud": $("#longitud").val(),

        "estado": "activo"
    };

    $.ajax({
        url: "../api-ofertapp/empresa/funAgregar.php",
        method: "POST",
        data: JSON.stringify(params),
        contentType: "application/json; charset=utf-8",
        processData: false,
        dataType: "json",
        success: function (response) {
            if (response['mensaje'] === "ok") {
                Swal.fire({
                    icon: "success",
                    title: "Empresa registrada con éxito",
                    confirmButtonText: "Aceptar"
                }).then(() => {
                    cargarDatosTabla();
                    $("#formEmpresaAgregar")[0].reset();
                    $("#modalAgregarEmpresa").modal("hide");
                });
            } else if (response['mensaje'] === "registro_existente") {
                Swal.fire({
                    icon: "error",
                    title: "La empresa ya existe en la base de datos"
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
function obtenerDatosParaModificar(idEmpresa) {
    $.ajax({
        url: "../api-ofertapp/empresa/funDatosParaModificar.php",
        method: "POST",
        data: JSON.stringify({ id: idEmpresa }),
        contentType: "application/json; charset=utf-8",
        processData: false,
        dataType: "json",
        success: function (response) {
            if (response.length > 0) {
                $("#idModificar").val(response[0].idEmpresa);
                $("#nombreEmpresaModificar").val(response[0].nombre);

                $("#calleModificar").val(response[0].calle);
                $("#numeroModificar").val(response[0].numero);
                $("#barrioModificar").val(response[0].barrio);
                $("#ciudadModificar").val(response[0].ciudad);
                $("#departamentoModificar").val(response[0].departamento);
                $("#paisModificar").val(response[0].pais);

                $("#latitudModificar").val(response[0].latitud);
                $("#longitudModificar").val(response[0].longitud);

                categoriaModificar(response[0].Categoria_idCategoria);
            }
        },
        error: function () {
            Swal.fire({
                icon: "error",
                title: "Error al traer los datos solicitados"
            });
        }
    });
}


// -------- Modificar --------
function modificarDatos() {
    var params = {
        "idEmpresa": $("#idModificar").val(),
        "nombre": $("#nombreEmpresaModificar").val(),
        "categoria_id": $("#categoriaEmpresaModificar").val(),
        "usuario_id": 1,

        "calle": $("#calleModificar").val(),
        "numero": $("#numeroModificar").val(),
        "barrio": $("#barrioModificar").val(),
        "ciudad": $("#ciudadModificar").val(),
        "departamento": $("#departamentoModificar").val(),
        "pais": $("#paisModificar").val(),

        "latitud": $("#latitudModificar").val(),
        "longitud": $("#longitudModificar").val(),

        "estado": "activo"
    };

    $.ajax({
        url: "../api-ofertapp/empresa/funModificar.php",
        method: "POST",
        data: JSON.stringify(params),
        contentType: "application/json; charset=utf-8",
        processData: false,
        dataType: "json",
        success: function (response) {
            if (response['mensaje'] === "ok") {
                Swal.fire({
                    icon: "success",
                    title: "Empresa modificada con éxito"
                }).then(() => {
                    cargarDatosTabla();
                    $("#modalModificarEmpresa").modal("hide");
                });
            } else if (response['mensaje'] === "repetido") {
                Swal.fire({
                    icon: "error",
                    title: "Ya existe otra empresa con ese nombre/dirección"
                });
            } else {
                Swal.fire({
                    icon: "error",
                    title: "Error al procesar la modificación"
                });
            }
        },
        error: function () {
            Swal.fire({
                icon: "error",
                title: "Error al procesar la modificación"
            });
        }
    });
}


// -------- Eliminar --------
function eliminarDatos(idEmpresa) {
    $.ajax({
        url: "../api-ofertapp/empresa/funEliminar.php",
        method: "POST",
        data: JSON.stringify({ id: idEmpresa }),
        contentType: "application/json; charset=utf-8",
        processData: false,
        dataType: "json",
        success: function (response) {
            if (response['mensaje'] === "ok") {
                Swal.fire({
                    icon: "success",
                    title: "Empresa eliminada con éxito"
                }).then(() => {
                    $("#fila_" + idEmpresa).remove();
                });
            } else {
                Swal.fire({
                    icon: "error",
                    title: "Error al procesar la eliminación"
                });
            }
        },
        error: function () {
            Swal.fire({
                icon: "error",
                title: "Error al procesar la eliminación"
            });
        }
    });
}


// -------- Categoría: Agregar --------
function categoriaAgregar() {
    $('#categoriaEmpresa').empty();
    $('#categoriaEmpresa').append('<option value ="">Seleccionar...</option>');

    var listaCategorias = "";
    $.ajax({
        url: "../api-ofertapp/categoria/funListar.php",
        method: "GET",
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function (response) {
            for (var i in response) {
                listaCategorias += '<option value="' + response[i].id + '">' + response[i].descripcion + '</option>';
            }
            $('#categoriaEmpresa').append(listaCategorias);
        }
    });
}


// -------- Categoría: Modificar --------
function categoriaModificar(idCategoria) {
    $('#categoriaEmpresaModificar').empty();
    var listaCategorias = "";

    $.ajax({
        url: "../api-ofertapp/categoria/funListar.php",
        method: "GET",
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function (response) {
            for (var i in response) {
                listaCategorias += '<option value="' + response[i].id + '">' + response[i].descripcion + '</option>';
            }
            $('#categoriaEmpresaModificar').append(listaCategorias);
            $("#categoriaEmpresaModificar option[value='" + idCategoria + "']").attr("selected", true);
        }
    });
}
