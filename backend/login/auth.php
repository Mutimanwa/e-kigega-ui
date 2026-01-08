<?php

ini_set('session.cookie_httponly', 1);
/*  file_put_contents("debug.txt", print_r($_POST, true)); */

if (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') {
    ini_set('session.cookie_secure', 1);
}

session_start();
require_once __DIR__ . "/../function/function.php";

header('Content-Type: application/json');

if (empty($_POST['mail']) || empty($_POST['password'])) {
    echo json_encode([
        "success" => false,
        "message" => "Email ou mot de passe manquant"
    ]);
    exit;
}

$email  = trim($_POST['mail']);
$psswd = $_POST['password'];

$result = login($email, $psswd);

echo json_encode($result);

?>