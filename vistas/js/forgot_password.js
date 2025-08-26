$(document).ready(function () {
    $('#requestResetForm').on('submit', function (e) {
        e.preventDefault();

        var formData = $(this).serialize();
        var submitButton = $(this).find('button');
        submitButton.prop('disabled', true).text('Enviando...');

        $.ajax({
            /* ======================================================================
            AQUÍ ESTÁ LA CORRECCIÓN MÁS IMPORTANTE:
            Usamos "../" para subir un nivel desde "adm-ofertapp" hasta la raíz
            del proyecto, y luego bajamos a "api-ofertapp".
            ======================================================================
            */
            url: '../api-ofertapp/sesiones/request_reset.php',
            type: 'POST',
            dataType: 'json',
            data: formData,
            success: function (response) {
                if (response.success) {
                    Swal.fire({
                        title: '¡Petición enviada!',
                        text: response.message,
                        icon: 'success'
                    });
                } else {
                    Swal.fire({
                        title: 'Error en el envío',
                        text: response.message,
                        icon: 'error'
                    });
                }
            },
            error: function (jqXHR) {
                console.error("Respuesta del servidor:", jqXHR.responseText);
                Swal.fire({
                    title: 'Error Crítico de Servidor',
                    text: 'No se pudo comunicar con la API. Revisa la consola del navegador.',
                    icon: 'error'
                });
            },
            complete: function () {
                submitButton.prop('disabled', false).text('Enviar Enlace de Recuperación');
            }
        });
    });
});