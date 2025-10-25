$(document).ready(function () {
    cargarComentarios();

    // === Filtrado dinámico ===
    $("#filtrarComentario").on("keyup", function () {
        const valor = $(this).val().toLowerCase();
        $("#tablaComentarios tbody tr").filter(function () {
            $(this).toggle($(this).text().toLowerCase().indexOf(valor) > -1);
        });
    });
});


// =======================
// Cargar comentarios y reseñas del usuario logueado
// =======================
function cargarComentarios() {
    $("#tablaComentarios tbody").empty();
    const idUsuario = $("#idUsuarioSesion").val();

    $.ajax({
        url: "../api-ofertapp/comentario/funListarComentariosPropios.php?idUsuario=" + idUsuario,
        method: "GET",
        dataType: "json",
        cache: false,
        success: function (response) {
            let filas = "";

            if (response.length === 0) {
                filas = `<tr><td colspan="5" class="text-center text-muted">No tienes comentarios registrados</td></tr>`;
            } else {
                response.forEach((item, index) => {
                    // Generar estrellas
                    let stars = "";
                    const rating = parseFloat(item.calificacion || 0);
                    for (let s = 1; s <= 5; s++) {
                        stars += s <= Math.round(rating) ? "★" : "☆";
                    }

                    filas += `
                        <tr>
                            <td>${index + 1}</td>
                            <td>${item.producto}</td>
                            <td>${item.comentario}</td>
                            <td>${item.fecha}</td>
                            <td style="color:#ffcc00;">${stars}</td>
                        </tr>
                    `;
                });
            }

            $("#tablaComentarios tbody").append(filas);
        },
        error: function () {
            Swal.fire({
                icon: "error",
                title: "Error al cargar comentarios",
                text: "No se pudo obtener la lista de tus comentarios y reseñas."
            });
        }
    });
}
