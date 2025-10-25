$(document).ready(function () {
    cargarHistorial();

    // === Filtrado rápido ===
    $("#filtrarHistorial").on("keyup", function () {
        const valor = $(this).val().toLowerCase();
        $("#tablaHistorial tbody tr").filter(function () {
            $(this).toggle($(this).text().toLowerCase().indexOf(valor) > -1);
        });
    });
});

// ===========================
// Cargar historial del usuario
// ===========================
function cargarHistorial() {
    const idUsuario = $("#idUsuarioSesion").val();

    if (!idUsuario) {
        Swal.fire({
            icon: "warning",
            title: "Sesión no iniciada",
            text: "Debes iniciar sesión para ver tu historial.",
        });
        return;
    }

    $("#tablaHistorial tbody").empty();

    $.ajax({
        url: "../api-ofertapp/historial/funListarHistorial.php",
        method: "GET",
        data: { idUsuario: idUsuario },
        dataType: "json",
        cache: false,
        success: function (response) {
            let filas = "";

            if (!response || response.length === 0) {
                filas = `<tr><td colspan="7" class="text-center text-muted">No hay registros en tu historial.</td></tr>`;
            } else {
                response.forEach((item, index) => {
                    // =======================
                    // Determinar acción visible
                    // =======================
                    let accion = "-";

                    const hizoReserva = parseInt(item.hizo_reserva);
                    const hizoComentario = parseInt(item.hizo_comentario);
                    const cantidad = item.cantidad_reserva ? parseInt(item.cantidad_reserva) : 0;

                    if (hizoReserva && hizoComentario) {
                        accion = `Reserva de ${cantidad || 1} producto(s) y comentario`;
                    } else if (hizoReserva) {
                        accion = `Reserva de ${cantidad || 1} producto(s)`;
                    } else if (hizoComentario) {
                        accion = `Comentario`;
                    }

                    // =======================
                    // Mostrar estrellas
                    // =======================
                    let stars = "";
                    const rating = parseFloat(item.calificacion || 0);
                    for (let s = 1; s <= 5; s++) {
                        stars += s <= Math.round(rating) ? "★" : "☆";
                    }

                    // =======================
                    // Construir fila HTML
                    // =======================
                    filas += `
                        <tr>
                            <td>${index + 1}</td>
                            <td>${item.producto || "-"}</td>
                            <td>${item.empresa || "-"}</td>
                            <td>${accion}</td>
                            <td>${item.comentario ? item.comentario : "-"}</td>
                            <td style="color:#ffcc00;">${item.calificacion ? stars : "-"}</td>
                            <td>${item.fecha || "-"}</td>
                        </tr>
                    `;
                });
            }

            $("#tablaHistorial tbody").append(filas);
        },
        error: function (xhr, status, error) {
            console.error("Error AJAX:", status, error);
            Swal.fire({
                icon: "error",
                title: "Error al cargar historial",
                text: "No se pudo obtener el historial del usuario.",
            });
        },
    });
}
