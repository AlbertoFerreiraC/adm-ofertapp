$(document).ready(function () {

    // Cargar tabla al inicio
    cargarDatosTabla();

    // Botones
    $('#btnGuardar').click(function () {
        agregarDatos();
    });

    $('#btnModificar').click(function () {
        modificarDatos();
    });

    // Filtrado dinámico
    $('#filtradoDinamico').keyup(function () {
        var busqueda = document.getElementById('filtradoDinamico');
        var table = document.getElementById("tabla").tBodies[0];
        buscaTabla = function () {
            texto = busqueda.value.toLowerCase();
            var r = 0;
            while (row = table.rows[r++]) {
                if (row.innerText.toLowerCase().indexOf(texto) !== -1)
                    row.style.display = null;
                else
                    row.style.display = 'none';
            }
        }
        busqueda.addEventListener('keyup', buscaTabla);
    });

});

// ================= FUNCIONES =================

// -------- Listar --------
function cargarDatosTabla() {
    $("#tabla tbody").empty();
    var fila = "";
    $.ajax({
        url: "../api-ofertapp/categoria/funListar.php",
        method: "GET",
        dataType: "json",
        success: function (response) {
            for (var i in response) {
                fila += '<tr>' +
                    '<td>' + (parseInt(i) + 1) + '</td>' +
                    '<td>' + response[i].descripcion + '</td>' +
                    '<td>' +
                    '<center>' +
                    '<div class="btn-group">' +
                    '<button title="Modificar" class="btn btn-warning btnModificar" ' +
                    'id="' + response[i].id + '" ' +
                    'data-toggle="modal" data-target="#modalModificar">' +
                    '<i class="fas fa-pencil-alt"></i>' +
                    '</button>' +
                    '<button title="Eliminar" class="btn btn-danger btnEliminar" ' +
                    'id="' + response[i].id + '">' +
                    '<i class="fa fa-times"></i>' +
                    '</button>' +
                    '</div>' +
                    '</center>' +
                    '</td>' +
                    '</tr>';
            }

            $('#tabla tbody').append(fila);

            // Eventos dinámicos
            $('.btnModificar').click(function () {
                obtenerDatosParaModificar(this.id);
            });

            $('.btnEliminar').click(function () {
                var id_registro = this.id;
                Swal.fire({
                    icon: 'warning',
                    title: '¿Está seguro de anular el registro?',
                    text: "¡Si no lo está puede cancelar la acción!",
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    cancelButtonText: 'Cancelar',
                    confirmButtonText: 'Sí, anular registro'
                }).then(function (result) {
                    if (result.value) {
                        eliminarDatos(id_registro);
                    }
                });
            });
        }
    }).fail(function () {
        Swal.fire({
            icon: "error",
            title: "Ha ocurrido un error al cargar la lista",
            confirmButtonText: "Aceptar"
        });
    });
}

// -------- Agregar --------
function agregarDatos() {
    var params = {
        "descripcion": $("#descripcionAgregar").val()
    };
    $.ajax({
        url: "../api-ofertapp/categoria/funAgregar.php",
        method: "POST",
        data: JSON.stringify(params),
        contentType: "application/json; charset=utf-8",
        dataType: "json",
        success: function (response) {
            if (response['mensaje'] === "ok") {
                Swal.fire({
                    icon: "success",
                    title: "Registro cargado con éxito",
                    confirmButtonText: "Aceptar"
                }).then(() => {
                    location.reload();
                });
            }
            if (response['mensaje'] === "nok") {
                Swal.fire({
                    icon: "error",
                    title: "Ha ocurrido un error al procesar la carga",
                    confirmButtonText: "Aceptar"
                });
            }
            if (response['mensaje'] === "registro_existente") {
                Swal.fire({
                    icon: "error",
                    title: "El registro que quiere cargar ya existe en la base de datos",
                    confirmButtonText: "Aceptar"
                });
            }
        }
    }).fail(function () {
        Swal.fire({
            icon: "error",
            title: "Ha ocurrido un error al procesar la carga",
            confirmButtonText: "Aceptar"
        });
    });
}

// -------- Obtener datos para modificar --------
function obtenerDatosParaModificar(id) {
    var params = { "id": id };
    $.ajax({
        url: "../api-ofertapp/categoria/funDatosParaModificar.php",
        method: "POST",
        data: JSON.stringify(params),
        contentType: "application/json; charset=utf-8",
        dataType: "json",
        success: function (response) {
            if (response.length > 0) {
                $("#descripcionModificar").val(response[0].descripcion);
                $("#idModificar").val(response[0].id);
            }
        }
    }).fail(function () {
        Swal.fire({
            icon: "error",
            title: "Ha ocurrido un error al traer los datos solicitados",
            confirmButtonText: "Aceptar"
        });
    });
}

// -------- Modificar --------
function modificarDatos() {
    var params = {
        "descripcion": $("#descripcionModificar").val(),
        "id": $("#idModificar").val()
    };
    $.ajax({
        url: "../api-ofertapp/categoria/funModificar.php",
        method: "POST",
        data: JSON.stringify(params),
        contentType: "application/json; charset=utf-8",
        dataType: "json",
        success: function (response) {
            if (response['mensaje'] === "ok") {
                Swal.fire({
                    icon: "success",
                    title: "Registro modificado con éxito",
                    confirmButtonText: "Aceptar"
                }).then(() => {
                    location.reload();
                });
            }
            if (response['mensaje'] === "nok") {
                Swal.fire({
                    icon: "error",
                    title: "Ha ocurrido un error al procesar la modificación",
                    confirmButtonText: "Aceptar"
                });
            }
            if (response['mensaje'] === "repetido") {
                Swal.fire({
                    icon: "error",
                    title: "El registro que quiere modificar ya existe en otro registro",
                    confirmButtonText: "Aceptar"
                });
            }
        }
    }).fail(function () {
        Swal.fire({
            icon: "error",
            title: "Ha ocurrido un error al procesar la modificación",
            confirmButtonText: "Aceptar"
        });
    });
}

// -------- Eliminar --------
function eliminarDatos(id) {
    var params = { "id": id };
    $.ajax({
        url: "../api-ofertapp/categoria/funEliminar.php",
        method: "POST",
        data: JSON.stringify(params),
        contentType: "application/json; charset=utf-8",
        dataType: "json",
        success: function (response) {
            if (response['mensaje'] === "ok") {
                Swal.fire({
                    icon: "success",
                    title: "Registro eliminado con éxito",
                    confirmButtonText: "Aceptar"
                }).then(() => {
                    location.reload();
                });
            }
            if (response['mensaje'] === "nok") {
                Swal.fire({
                    icon: "error",
                    title: "Ha ocurrido un error al procesar la eliminación",
                    confirmButtonText: "Aceptar"
                });
            }
        }
    }).fail(function () {
        Swal.fire({
            icon: "error",
            title: "Ha ocurrido un error al procesar la eliminación",
            confirmButtonText: "Aceptar"
        });
    });
}
