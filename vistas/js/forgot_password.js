$(document).ready(function () {
    $('#requestResetForm').on('submit', function (e) {
        e.preventDefault();

        const email = $('#email').val().trim(); // Validación simple
        if (!email) {
            Swal.fire({
                icon: 'warning',
                title: 'Atención',
                text: 'Por favor, ingrese su correo electrónico.'
            });
            return;
        }

        var formData = $(this).serialize();
        var submitButton = $(this).find('button');
        submitButton.prop('disabled', true).text('Enviando...');

        $.ajax({
            url: '../api-ofertapp/sesiones/request_reset.php',
            type: 'POST',
            dataType: 'json',
            data: formData,
            success: function (response) {
                if (response.success) {
                    Swal.fire({
                        title: '¡Petición enviada!',
                        text: response.message || 'Revisa tu correo para continuar con la recuperación.',
                        icon: 'success',
                        confirmButtonText: 'Aceptar'
                    }).then(() => {
                        // Opcional: limpiar formulario
                        $('#requestResetForm')[0].reset();
                    });
                } else {
                    Swal.fire({
                        title: 'Error en el envío',
                        text: response.message || 'No se pudo procesar tu solicitud.',
                        icon: 'error',
                        confirmButtonText: 'Intentar de nuevo'
                    });
                }
            },
            error: function (jqXHR, textStatus, errorThrown) {
                console.error("Respuesta del servidor:", jqXHR.responseText);
                Swal.fire({
                    title: 'Error Crítico de Servidor',
                    text: 'No se pudo comunicar con la API. Revisa la consola del navegador.',
                    icon: 'error',
                    confirmButtonText: 'Cerrar'
                });
            },
            complete: function () {
                submitButton.prop('disabled', false).text('Enviar Enlace de Recuperación');
            }
        });
    });
});
