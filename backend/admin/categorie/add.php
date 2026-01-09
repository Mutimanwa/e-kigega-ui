<?php

ini_set('session.cookie_httponly', 1);
ini_set('session.cookie_secure', 1);
session_start();

require_once('./../../function/function.php');
$role = "ADMIN";

//================== gérer les sessions 
if (requireRole($role) === "Accès interdit") {
    session_destroy();
    header("Location: ./../../../index.php");
    exit;
}

//================== fetch les categories
$categories = getApi('/api/categories/') ?? [];

if (isset($_POST['send'])) {
    $nom = trim($_POST['nom']); // retirer espaces inutiles

    // Vérification des doublons (insensible à la casse)
    foreach ($categories as $k) {
        if (strcasecmp($k['nom'], $nom) === 0) {
            $e = "Cette catégorie existe déjà";
            header("Location: ./../../../public/admin/produits/categories.php?error=" . urlencode($e));
            exit; // STOP après le doublon
        }
    }

    // Préparer les données pour l'API
    $donnee = [
        "nom" => htmlspecialchars($nom)
    ];

    $add = apiPost('/api/categories/', $donnee);

    if ($add === "login first") {
        session_destroy();
        header("Location: ./../../../index.php");
        exit;
    } elseif ($add === "Erreur lors de la création") {
        $e = "Erreur lors de la création";
        header("Location: ./../../../public/admin/produits/categories.php?error=" . urlencode($e));
        exit;
    } elseif (isset($add['id'])) { // API renvoie l'objet créé
        $success = "Catégorie ajoutée avec succès";
        header("Location: ./../../../public/admin/produits/categories.php?success=" . urlencode($success));
        exit;
    } else {
        $e = "Erreur inconnue";
        header("Location: ./../../../public/admin/produits/categories.php?error=" . urlencode($e));
        exit;
    }
}
