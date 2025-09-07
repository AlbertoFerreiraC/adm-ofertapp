$(document).ready(function () {

    async function handleLogin() {
        const usuario = $("#usuario").val();
        const pass = $("#contrasena").val();

        if (!usuario || !pass) {
            Swal.fire({
                icon: 'warning',
                title: 'Atención',
                text: 'Por favor, complete ambos campos.'
            });
            return;
        }

        try {
            const url = '../api-ofertapp/sesiones/funLogin.php';
            const response = await fetch(url, {
                method: 'POST',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify({ usuario: usuario, pass: pass })
            });

            const jsonResponse = await response.json().catch(() => ({}));

            if (response.ok && jsonResponse.mensaje === "Login correcto") {
                await Swal.fire({
                    icon: 'success',
                    title: '¡Bienvenido, ' + (jsonResponse.nombre || usuario) + '!',
                    timer: 1500,
                    showConfirmButton: false,
                    allowOutsideClick: false
                });

                if (jsonResponse.tipo_usuario === "comercial") {
                    window.location.href = "dashboard";
                } else {
                    window.location.href = "dashboard";
                }

            } else {
                Swal.fire({
                    icon: 'error',
                    title: 'Acceso Inválido',
                    text: jsonResponse.mensaje || 'Usuario o contraseña incorrectos.'
                });
            }
        } catch (error) {
            console.error("Error en el proceso de login:", error);
            Swal.fire({
                icon: 'error',
                title: 'Error de Conexión',
                text: 'No se pudo comunicar con el servidor. Revisa la consola (F12).',
            });
        }
    }

    $("#ingresarBtn").click(handleLogin);

    $('#loginForm').on('submit', function (e) {
        e.preventDefault();
        handleLogin();
    });

    if ($("#logoutMessage").length) {
        Swal.fire({
            icon: 'info',
            title: 'Sesión Cerrada',
            text: 'Has salido correctamente de la aplicación.',
            timer: 1500,
            showConfirmButton: false
        });
    }
});