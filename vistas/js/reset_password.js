$(document).ready(function () {
    $('#resetPasswordForm').on('submit', function (e) {
        e.preventDefault();
        var nuevoPass = $('#nuevoPass').val();
        var confirmarPass = $('#confirmarPass').val();
        if (nuevoPass.length < 6) {
            Swal.fire('Contraseña muy corta', 'Tu contraseña debe tener al menos 6 caracteres.', 'warning');
            return;
        }
        if (nuevoPass !== confirmarPass) {
            Swal.fire('Las contraseñas no coinciden', 'Por favor, verifica que ambas contraseñas sean iguales.', 'error');
            return;
        }

        var formData = $(this).serialize();
        $.ajax({
            url: '../api-ofertapp/sesiones/update_password.php', // Ruta correcta al script que guarda
            type: 'POST',
            dataType: 'json',
            data: formData,
            success: function (response) {
                if (response.success) {
                    Swal.fire({
                        title: '¡Éxito!',
                        text: response.message,
                        icon: 'success',
                        confirmButtonText: 'Ir a Iniciar Sesión'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.location.href = 'login';
                        }
                    });
                } else {
                    Swal.fire('Error', response.message, 'error');
                }
            }
        });
    });
});