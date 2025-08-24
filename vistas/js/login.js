// login.js

$(document).ready(function () {
    $("#ingresarBtn").click(async function () {
        const usuario = $("#usuario").val();
        const pass = $("#contrasena").val();

        if (!usuario || !pass) {
            Swal.fire({ icon: 'warning', title: 'Atención', text: 'Por favor, complete ambos campos.' });
            return;
        }

        try {
            // CORRECCIÓN DE RUTA: Subimos 3 niveles (desde modulos, vistas, adm-ofertapp) para llegar a la raíz.
            const url = '../api-ofertapp/sesiones/funLogin.php';

            const response = await fetch(url, {
                method: 'POST',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify({ usuario: usuario, pass: pass })
            });

            // Esto es importante para manejar el error de la respuesta "sucia"
            const textResponse = await response.text();
            const jsonResponse = JSON.parse(textResponse);

            if (response.ok) {
                await Swal.fire({
                    icon: 'success',
                    title: '¡Bienvenido, ' + jsonResponse.nombre + '!',
                    timer: 1500,
                    showConfirmButton: false
                });

                // CORRECCIÓN DE RUTA: Subimos un nivel (desde modulos) para llegar a vistas, donde está el dashboard.
                window.location.href = "/ofertapp-app/adm-ofertapp/vistas/dashboard.php";

            } else {
                Swal.fire({
                    icon: 'error',
                    title: 'Acceso Inválido',
                    text: jsonResponse.mensaje || 'El usuario o la contraseña son incorrectos.',
                });
            }

        } catch (error) {
            console.error("Error en el proceso de login:", error);
            Swal.fire({
                icon: 'error',
                title: 'Error de Conexión',
                text: 'No se pudo comunicar con el servidor. Revisa la consola para más detalles.',
            });
        }
    });

    $('#loginForm').on('submit', function (e) {
        e.preventDefault();
        $('#ingresarBtn').click();
    });
});