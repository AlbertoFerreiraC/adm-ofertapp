$(document).ready(function () {
    cargarComentarios();

    // === Filtrado rápido ===
    $("#filtrarComentario").on("keyup", function () {
        const valor = $(this).val().toLowerCase();
        $("#tablaComentarios tbody tr").filter(function () {
            $(this).toggle($(this).text().toLowerCase().indexOf(valor) > -1);
        });
    });
});

// =======================
// Cargar comentarios y reseñas
// =======================
function cargarComentarios() {
    $("#tablaComentarios tbody").empty();

    const idUsuario = $("#idUsuarioSesion").val();
    const tipoUsuario = $("#tipoUsuarioSesion").val();

    let urlApi = "../api-ofertapp/comentario/funListarComentarios.php";
    let data = {
        idUsuario: idUsuario,
        tipoUsuario: tipoUsuario
    };

    // === Validación del tipo de usuario ===
    if (idUsuario && tipoUsuario === "comercial") {
        console.log(`🟢 Comercial logueado (ID: ${idUsuario}) → cargando solo comentarios de sus productos.`);
    }
    else if (idUsuario && (tipoUsuario === "personal" || tipoUsuario === "administrador")) {
        console.log(`🔵 ${tipoUsuario.charAt(0).toUpperCase() + tipoUsuario.slice(1)} logueado (ID: ${idUsuario}) → cargando todos los comentarios.`);
    }
    else {
        console.log("⚪ Visitante → no se cargan comentarios privados.");
    }

    $.ajax({
        url: urlApi,
        method: "GET",
        data: data,
        dataType: "json",
        cache: false,
        success: function (response) {
            console.log("✅ Comentarios cargados:", response);

            let filas = "";
            if (!response || response.length === 0) {
                filas = `<tr><td colspan="6" class="text-center text-muted">No hay comentarios registrados</td></tr>`;
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
                            <td>${item.usuario}</td>
                            <td>${item.comentario}</td>
                            <td>${item.fecha}</td>
                            <td style="color:#ffcc00;">${stars}</td>
                        </tr>
                    `;
                });
            }
            $("#tablaComentarios tbody").append(filas);
        },
        error: function (xhr, status, error) {
            console.error("❌ Error AJAX:", status, error);
            Swal.fire({
                icon: "error",
                title: "Error al cargar comentarios",
                text: "No se pudo obtener la lista de comentarios y reseñas.",
                confirmButtonText: "Aceptar"
            });
        }
    });
}
