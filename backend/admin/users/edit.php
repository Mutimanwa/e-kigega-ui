<?php
    ini_set('session.cookie_httponly', 1);
    ini_set('session.cookie_secure', 1);
    session_start();

    require_once('./../../function/function.php');

    $role = "ADMIN";
    $entreprise = $_SESSION['entreprise'] ?? null;
    
    if (requireRole($role) === "Accès interdit") {
        session_destroy();
        header("Location: ./../../../index.php");
        exit;
    }

    //======== recuperer l'id
    $id=$_POST['id'];

    $type        = trim($_POST['type']);
    $montant     = trim($_POST['montant']);
    $description = trim($_POST['description']);


    // Préparer les données
    $data = [
        "description" => $description,
        "montant"     => $montant,
        "type"        => $type
    ];

    // Appel API PUT
    $update = apiPut("/api/depenses/$id/", $data);

    if ($update === true) {
        header("Location: ./../../../public/admin/depenses/index.php?success=Depenses modifié avec succès");
    } elseif ($update === "login") {
        session_destroy();
        header("Location: ./../../../index.php");
    } else {
        header("Location: ./../../../public/admin/depenses/index.php?error=Erreur lors de la modification");
    }

?>