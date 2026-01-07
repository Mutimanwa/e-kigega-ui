<?php

ini_set('session.cookie_httponly', 1);
ini_set('session.cookie_secure', 1);
session_start();
require_once("./../function/function.php");

// Indiquer que la réponse sera du JSON
header('Content-Type: application/json');

try {
    if (isset($_POST['send'])) {
        $email = $_POST['mail'];
        $psswd = $_POST['password'];

        $send = login($email, $psswd); // retourne maintenant un tableau

        // On renvoie directement le JSON
        echo json_encode($send);
    }
} catch (PDOException $e) {
    echo json_encode([
        "success" => false,
        "message" => "Server error"
    ]);
}
?>
