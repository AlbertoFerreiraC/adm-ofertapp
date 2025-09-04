<?php
// config.php
if (file_exists(__DIR__ . '/.env')) {
    $env = parse_ini_file(__DIR__ . '/.env');
    if (isset($env['GOOGLE_MAPS_API_KEY'])) {
        define('GOOGLE_MAPS_API_KEY', $env['GOOGLE_MAPS_API_KEY']);
    } else {
        define('GOOGLE_MAPS_API_KEY', '');
    }
} else {
    define('GOOGLE_MAPS_API_KEY', '');
}
