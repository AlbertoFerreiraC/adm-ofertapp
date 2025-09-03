<?php
ob_start(); 
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Destruir todas las sesiones
$_SESSION = [];
session_unset();
session_destroy();

// Determinar la raíz de la app dinámicamente
$protocolo = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ? "https://" : "http://";
$host = $_SERVER['HTTP_HOST'];
$carpetaBase = dirname($_SERVER['SCRIPT_NAME']); // devuelve la carpeta donde está salir.php
$rutaRaiz = rtrim($protocolo . $host . $carpetaBase, '/') . '/';

// Redirigir con SweetAlert
echo '<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>';
echo "<script>
    Swal.fire({
        icon: 'info',
        title: 'Sesión Cerrada',
        text: 'Has salido correctamente de la aplicación.',
        timer: 1500,
        showConfirmButton: false
    }).then(() => {
        window.location.href = '$rutaRaiz';
    });
</script>";

exit;
