$(document).ready(function () {

    $("#nombre, #apellido").on("keyup", function () {
        const nombre = $("#nombre").val().trim();
        const apellido = $("#apellido").val().trim();

        if (nombre.length > 0 && apellido.length > 0) {
            const usuario = (nombre.charAt(0) + apellido).toLowerCase();
            $("#usuario").val(usuario);
        } else {
            $("#usuario").val("");
        }
    });

    $("#registerForm").on("submit", function (e) {
        e.preventDefault();
        agregarDatos();
    });

});

function agregarDatos() {
    const tipoCuenta = $("#tipoCuenta").val();

    const params = {
        "nombre": $("#nombre").val(),
        "apellido": $("#apellido").val(),
        "usuario": $("#usuario").val(),
        "email": $("#email").val(),
        "password": $("#password").val(),
        "tipoCuenta": tipoCuenta,
        "latitud": $("#latitud").val(),
        "longitud": $("#longitud").val()
    };

    if (tipoCuenta === "comercial") {
        params.nombreEmpresa     = $("#nombreEmpresa").val();
        params.direccionEmpresa  = $("#direccionEmpresa").val();
        params.numeroEmpresa     = $("#numeroEmpresa").val();
        params.barrioEmpresa     = $("#barrioEmpresa").val();
        params.ciudadEmpresa     = $("#ciudadEmpresa").val();
        params.departamentoEmpresa = $("#departamentoEmpresa").val();
        params.paisEmpresa       = $("#paisEmpresa").val();
        params.categoriaEmpresa  = $("#categoriaEmpresa").val();
    }

    $.ajax({
        url: "../api-ofertapp/sesiones/funAgregar.php",
        method: "POST",
        data: JSON.stringify(params),
        contentType: "application/json; charset=utf-8",
        dataType: "json",
        success: function (response) {
            if (response['mensaje'] === "ok") {
                Swal.fire({
                    icon: "success",
                    title: "Cuenta creada con éxito",
                    confirmButtonText: "Aceptar"
                }).then(() => {
                    window.location.href = "index.php?ruta=login";
                });
            } else if (response['mensaje'] === "registro_existente") {
                Swal.fire({
                    icon: "error",
                    title: "El usuario o email ya existe"
                });
            } else {
                Swal.fire({
                    icon: "error",
                    title: "Error al registrar"
                });
            }
        },
        error: function () {
            Swal.fire({
                icon: "error",
                title: "Error en la comunicación con el servidor"
            });
        }
    });
}
