<?php
// ==========================
// APPLICATION
// ==========================
define('APP_NAME', 'E-Kigega');
define('APP_VERSION', '1.0.0');

// ==========================
// PATHS (serveur)
// ==========================
define('BASE_PATH', realpath(__DIR__ . '/../') . '/');
define('CONFIG_PATH', BASE_PATH . 'config/');
define('INCLUDES_PATH', BASE_PATH . 'includes/');
define('ASSETS_PATH', BASE_PATH . 'assets/');

// ==========================
// URL (navigateur)
// ==========================
// URL de base (à ajuster selon l'hébergement)
$protocol = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 'https' : 'http';
$host = $_SERVER['HTTP_HOST'] ?? 'localhost';
define('BASE_URL', $protocol . '://' . $host . '/e-kigega-ui/');
define('ASSETS_URL', BASE_URL . 'assets/');
define('CSS_URL', ASSETS_URL . 'css/');
define('JS_URL', ASSETS_URL . 'js/');
define('IMAGES_URL', ASSETS_URL . 'images/');
define('LIBS_URL', ASSETS_URL . 'libs/');


