<?php

    ini_set('session.cookie_httponly', 1);
    ini_set('session.cookie_secure', 1);
    session_start();

    require_once('./../../function/function.php');
    $role = "ADMIN";

    // ================== Sécurité
    if (requireRole($role) === "Accès interdit") {
        session_destroy();
        header("Location: ./../../../index.php");
        exit;
    }

    // ================== Vérifier l’ID
    if (!isset($_POST['id']) || empty($_POST['id'])) {
        header("Location: ./../../../public/admin/produits/categories.php?error=ID manquant");
        exit;
    }

    $id = $_POST['id'];

    // ================== Appel API
    $delete = apiDelete("/api/categories/$id/");

    // ================== Gestion du résultat
    if ($delete === true) {
        header("Location: ./../../../public/admin/produits/categories.php?success=Catégorie supprimée");
        exit;
    }

    if ($delete === "try login again") {
        session_destroy();
        header("Location: ./../../../index.php");
        exit;
    }

    if ($delete === "Erreur lors de la suppression") {
        header("Location: ./../../../public/admin/produits/categories.php?error=Impossible de supprimer");
        exit;
    }

    // fallback
    header("Location: ./../../../public/admin/produits/categories.php?error=Erreur inconnue");
    exit;

?>