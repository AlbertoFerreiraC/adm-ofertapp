$(document).ready(function () {
    $('#resetPasswordForm').on('submit', function (e) {
        e.preventDefault();

        const nuevoPass = $('#nuevoPass').val().trim();
        const confirmarPass = $('#confirmarPass').val().trim();

        // Validaciones locales antes de enviar
        if (!nuevoPass || !confirmarPass) {
            Swal.fire({
                icon: 'warning',
                title: 'Atención',
                text: 'Por favor, completa ambos campos de contraseña.'
            });
            return;
        }

        if (nuevoPass.length < 6) {
            Swal.fire({
                icon: 'warning',
                title: 'Contraseña muy corta',
                text: 'Tu contraseña debe tener al menos 6 caracteres.'
            });
            return;
        }

        if (nuevoPass !== confirmarPass) {
            Swal.fire({
                icon: 'error',
                title: 'Las contraseñas no coinciden',
                text: 'Verifica que ambas contraseñas sean iguales.'
            });
            return;
        }

        var formData = $(this).serialize();
        var submitButton = $(this).find('button');
        submitButton.prop('disabled', true).text('Guardando...');

        $.ajax({
            url: '../api-ofertapp/sesiones/update_password.php',
            type: 'POST',
            dataType: 'json',
            data: formData,
            success: function (response) {
                if (response.success) {
                    Swal.fire({
                        title: '¡Éxito!',
                        text: response.message || 'Contraseña actualizada correctamente.',
                        icon: 'success',
                        confirmButtonText: 'Ir a Iniciar Sesión',
                        allowOutsideClick: false
                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.location.href = 'login';
                        }
                    });
                } else {
                    Swal.fire({
                        title: 'Error',
                        text: response.message || 'No se pudo actualizar la contraseña.',
                        icon: 'error',
                        confirmButtonText: 'Intentar de nuevo'
                    });
                }
            },
            error: function (jqXHR, textStatus, errorThrown) {
                console.error("Error del servidor:", jqXHR.responseText);
                Swal.fire({
                    title: 'Error Crítico de Servidor',
                    text: 'No se pudo comunicar con la API. Revisa la consola del navegador.',
                    icon: 'error',
                    confirmButtonText: 'Cerrar'
                });
            },
            complete: function () {
                submitButton.prop('disabled', false).text('Actualizar Contraseña');
            }
        });
    });
});
