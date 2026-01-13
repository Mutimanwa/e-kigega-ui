<?php

    ini_set('session.cookie_httponly', 1);
    ini_set('session.cookie_secure', 1);
    session_start();

    require_once('./../function/function.php');
    
    //================== gerer les session 
    if(!$_SESSION['token']){
        header("Location: ./../../index.php");
        session_destroy();
    }

    $url = $_GET['url'] ?? null;

    if (!$url) {
        die("URL manquante");
    }

    forceDownloadFromURL($url);


?>