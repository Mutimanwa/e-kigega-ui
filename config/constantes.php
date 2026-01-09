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
define('BASE_URL', 'http://localhost/e-kigega-ui/');
define('ASSETS_URL', BASE_URL . 'assets/');
define('CSS_URL', ASSETS_URL . 'css/');
define('JS_URL', ASSETS_URL . 'js/');
define('IMAGES_URL', ASSETS_URL . 'images/');
define('LIBS_URL', ASSETS_URL . 'libs/');

// ==========================
// FORMATIONS VIDEO
// ==========================
define('VIDEOS_PATH', BASE_PATH . 'storage/videos/');
define('VIDEOS_URL', BASE_URL . 'storage/videos/');
define('VIDEOS_ORIGINAL_PATH', VIDEOS_PATH . 'original/');
define('VIDEOS_COMPRESSED_PATH', VIDEOS_PATH . 'compressed/');
define('VIDEOS_THUMBNAILS_PATH', VIDEOS_PATH . 'thumbnails/');

