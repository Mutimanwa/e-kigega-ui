<?php
// ==========================
// URL (navigateur)
// ==========================

// URL de base (à ajuster selon l'hébergement)
$protocol = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 'https' : 'http';
$host = $_SERVER['HTTP_HOST'] ?? 'localhost';
define('BASE_URL', $protocol . '://' . $host . '/e-kigega-ui/adminSys/');

define('ASSETS_URL', BASE_URL . 'assets/');
define('CSS_URL', ASSETS_URL . 'css/');
define('JS_URL', ASSETS_URL . 'js/');
define('IMAGES_URL', ASSETS_URL . 'images/');
define('LIBS_URL', ASSETS_URL . 'libs/');