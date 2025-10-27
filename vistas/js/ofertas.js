$(document).ready(function () {
    cargarOfertas();

    // Filtrado rápido
    $("#filtrarOferta").on("keyup", function () {
        const valor = $(this).val().toLowerCase();
        $("#tablaOfertas tbody tr").filter(function () {
            $(this).toggle($(this).text().toLowerCase().indexOf(valor) > -1);
        });
    });
});

// =======================
// Cargar productos en oferta
// =======================
function cargarOfertas() {
    $("#tablaOfertas tbody").empty();

    const idUsuario = $("#idUsuarioSesion").val();
    const tipoUsuario = $("#tipoUsuarioSesion").val();

    $.ajax({
        url: "../api-ofertapp/producto/funListarOfertas.php",
        method: "GET",
        data: {
            idUsuario: idUsuario,
            tipoUsuario: tipoUsuario
        },
        dataType: "json",
        cache: false,
        success: function (response) {
            let filas = "";
            if (!response || response.length === 0) {
                filas = `
                    <tr>
                        <td colspan="12" class="text-center text-muted">
                            No hay productos en oferta actualmente.
                        </td>
                    </tr>`;
            } else {
                response.forEach((item, index) => {
                    filas += `
                        <tr>
                            <td>${index + 1}</td>
                            <td>${item.titulo}</td>
                            <td>${item.descripcion}</td>
                            <td>${item.cantidad ?? '-'}</td>
                            <td>Gs. ${parseInt(item.costo).toLocaleString("es-PY")}</td>
                            <td>${item.categoria}</td>
                            <td>${item.color ?? "-"}</td>
                            <td>${item.tamano ?? "-"}</td>
                            <td>${item.condicion}</td>
                            <td>${item.estado}</td>
                            <td>
                                <img src="${item.imagen}" alt="img" 
                                    style="width:60px; height:auto; border:1px solid #ccc;">
                            </td>
                            <td>
                                <span class="label label-success">En oferta</span>
                            </td>
                        </tr>
                    `;
                });
            }

            $("#tablaOfertas tbody").append(filas);
        },
        error: function () {
            Swal.fire({
                icon: "error",
                title: "Error al cargar ofertas",
                text: "No se pudo obtener la lista de productos en oferta."
            });
        }
    });
}
