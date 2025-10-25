<?php
session_start();
if (!isset($_SESSION['id_usuario'])) {
    die("Sesión expirada. Inicie sesión nuevamente.");
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Generando informe - OfertApp</title>
    <link rel="stylesheet" href="../vistas/css/AdminLTE.min.css">
    <link rel="stylesheet" href="../vistas/bower_components/font-awesome/css/font-awesome.min.css">
    <style>
        body {
            font-family: "DejaVu Sans", Arial, sans-serif;
            background-color: #fffaf6;
            margin: 0;
        }

        .spinner-overlay {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(255, 255, 255, 0.9);
            z-index: 9999;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            color: #f08438;
        }

        .spinner-overlay i {
            font-size: 50px;
            animation: spin 1.5s linear infinite;
        }

        @keyframes spin {
            0% {
                transform: rotate(0deg);
            }

            100% {
                transform: rotate(360deg);
            }
        }

        h2 {
            margin-top: 20px;
            color: #333;
            font-size: 18px;
            font-weight: 600;
        }
    </style>
</head>

<body>
    <div class="spinner-overlay" id="spinner">
        <i class="fa fa-spinner"></i>
        <h2>Generando su informe comercial...</h2>
        <p style="color:#555;">Por favor, espere unos segundos mientras preparamos su archivo.</p>
    </div>

    <script>
        async function generarInforme() {
            try {
                const baseURL = window.location.origin + "/ofertapp-app";

                // 1️⃣ Obtener empresa del usuario en sesión
                const res = await fetch(`${baseURL}/api-ofertapp/empresa/get_empresa_sesion.php`);
                if (!res.ok) throw new Error("Error al obtener la empresa");
                const data = await res.json();

                if (!data || !data.idEmpresa) {
                    alert("No se encontró una empresa asociada al usuario en sesión.");
                    window.location.href = "dashboard";
                    return;
                }

                // 2️⃣ Esperar 1.5 segundos (efecto visual del spinner)
                await new Promise(resolve => setTimeout(resolve, 1500));

                // 3️⃣ Abrir el PDF en una nueva pestaña
                const urlPDF = `${baseURL}/api-ofertapp/informes/exportar_informe_actividad_comercial.php?id_empresa=${data.idEmpresa}`;
                console.log("Abriendo informe:", urlPDF);
                window.open(urlPDF, "_blank");

                // 4️⃣ Mostrar mensaje breve de éxito antes de salir
                const spinner = document.getElementById("spinner");
                spinner.innerHTML = `
                    <i class="fa fa-check-circle" style="color:#28a745; font-size:50px;"></i>
                    <h2 style="color:#28a745;">Informe generado correctamente</h2>
                    <p style="color:#555;">Redirigiendo al panel principal...</p>
                `;

                // 5️⃣ Esperar 2 segundos y redirigir
                setTimeout(() => {
                    window.location.href = "dashboard";
                }, 2000);

            } catch (error) {
                console.error("Error:", error);
                alert("Ocurrió un error al generar el informe.");
                window.location.href = "dashboard";
            }
        }

        window.addEventListener("DOMContentLoaded", generarInforme);
    </script>
</body>

</html>