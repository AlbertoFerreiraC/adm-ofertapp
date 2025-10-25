$(document).ready(function () {

    // Cargar tabla
    cargarDatosTabla();

    // Filtro dinámico
    $('#filtradoReserva').on('keyup', function () {
        var texto = $(this).val().toLowerCase();
        $('#tablaReservas tbody tr').each(function () {
            var filaTexto = $(this).text().toLowerCase();
            $(this).toggle(filaTexto.indexOf(texto) !== -1);
        });
    });
});


// ================= FUNCIONES =================

// -------- Listar --------
function cargarDatosTabla() {
    const idUsuario = $("#idUsuarioSesion").val();
    $("#tablaReservas tbody").empty();

    $.ajax({
        url: "../api-ofertapp/reserva/funListar.php?idUsuario=" + idUsuario,
        method: "GET",
        cache: false,
        dataType: "json",
        success: function (response) {
            let filas = "";

            if (response.length === 0) {
                filas = `<tr><td colspan="7" class="text-center">No existen reservas registradas.</td></tr>`;
            } else {
                response.forEach((item, index) => {
                    const badge = item.estado === "confirmado"
                        ? "success"
                        : item.estado === "pendiente"
                            ? "warning"
                            : "danger";

                    filas += `
                        <tr id="fila_${item.id_reserva}">
                            <td>${index + 1}</td>
                            <td>${item.producto}</td>
                            <td>${item.cantidad_reserva}</td>
                            <td>${item.fecha_reserva}</td>
                            <td><span class="label label-${badge}">${item.estado}</span></td>
                            <td>${item.comentario ?? '-'}</td>
                            <td>
                                <center>
                                    <button class="btn btn-info btnVer" id="${item.id_reserva}">
                                        <i class="fa fa-eye"></i> Ver
                                    </button>
                                </center>
                            </td>
                        </tr>
                    `;
                });
            }

            $("#tablaReservas tbody").append(filas);

            // Evento Ver Detalle
            $(".btnVer").click(function () {
                obtenerDetalleReserva(this.id);
            });
        },
        error: function () {
            Swal.fire({
                icon: "error",
                title: "Error al cargar el historial de reservas",
                confirmButtonText: "Aceptar"
            });
        }
    });
}


// -------- Ver detalle --------
function obtenerDetalleReserva(idReserva) {
    $.ajax({
        url: "../api-ofertapp/reserva/funVer.php",
        method: "POST",
        data: JSON.stringify({ idReserva: idReserva }),
        contentType: "application/json; charset=utf-8",
        dataType: "json",
        success: function (response) {
            if (response && response.id_reserva) {
                $("#detalle_producto").text(response.producto);
                $("#detalle_estado").text(response.estado);
                $("#detalle_cantidad").text(response.cantidad_reserva);
                $("#detalle_fecha").text(response.fecha_reserva);
                $("#detalle_comentario").text(response.comentario ?? '-');
                $("#detalle_descripcion").text(response.descripcion ?? '-');
                $("#detalle_imagen").attr("src", response.imagen || "vistas/img/plantilla/default.png");

                $("#modalVerReserva").modal("show");
            } else {
                Swal.fire({
                    icon: "info",
                    title: "No se encontraron detalles para esta reserva"
                });
            }
        },
        error: function () {
            Swal.fire({
                icon: "error",
                title: "Error al obtener los detalles de la reserva"
            });
        }
    });
}
