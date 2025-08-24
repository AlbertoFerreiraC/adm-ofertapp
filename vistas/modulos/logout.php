<?php
// logout.php (CORREGIDO)

session_start();

$_SESSION = array();

if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(
        session_name(),
        '',
        time() - 42000,
        $params["path"],
        $params["domain"],
        $params["secure"],
        $params["httponly"]
    );
}

session_destroy();

// RUTA ABSOLUTA CORRECTA, APUNTANDO A DONDE REALMENTE ESTÁ TU LOGIN
header('Location: ofertapp-app/adm-ofertapp/');
exit;
