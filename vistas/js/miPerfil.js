$(document).ready(function () {
    $("#formPerfil").on("submit", function (e) {
        e.preventDefault();

        const formData = new FormData(this);

        Swal.fire({
            title: "Actualizando...",
            text: "Por favor espere",
            allowOutsideClick: false,
            didOpen: () => Swal.showLoading()
        });

        $.ajax({
            url: "../api-ofertapp/usuario/funActualizarPerfil.php",
            type: "POST",
            data: formData,
            dataType: "json", // ✅ ESTA LÍNEA ES CLAVE
            contentType: false,
            processData: false,
            success: function (data) { // ✅ Ya llega como objeto JS
                console.log("Respuesta del servidor:", data);

                if (data.status === "ok") {
                    Swal.fire({
                        icon: "success",
                        title: "Perfil actualizado",
                        text: "Los datos se han guardado correctamente",
                        timer: 2000,
                        showConfirmButton: false
                    }).then(() => location.reload());
                } else {
                    Swal.fire({
                        icon: "warning",
                        title: "Atención",
                        text: data.message || "No se pudo actualizar el perfil"
                    });
                }
            },
            error: function (xhr, status, error) {
                console.error("Error en la solicitud:", error);
                Swal.fire("Error", "No se pudo conectar con el servidor", "error");
            }
        });
    });
});
