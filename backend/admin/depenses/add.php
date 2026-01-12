<?php

ini_set('session.cookie_httponly', 1);
ini_set('session.cookie_secure', 1);
session_start();

require_once('./../../function/function.php');

$role = "ADMIN";
$entreprise = $_SESSION['entreprise'] ?? null;

// Sécurité
if (requireRole($role) === "Accès interdit") {
    session_destroy();
    header("Location: ./../../../index.php");
    exit;
}

if (!$entreprise) {
    header("Location: ./../../../public/admin/depenses/index.php?error=Entreprise non définie");
    exit;
}


if (isset($_POST['send'])) {

    $type        = trim($_POST['type']);
    $montant     = trim($_POST['montant']);
    $description = trim($_POST['description']);

    if ($type === "" || $description === "" || $montant <= 0) {
        header("Location: ./../../../public/admin/depenses/index.php?error=Données invalides");
        exit;
    }

    // Préparer les données
    $donnee = [
        "description" => $description,
        "montant"     => $montant,
        "type"        => $type
    ];

    // Ajouter le fichier s'il existe
    if (!empty($_FILES['justificatif']['tmp_name'])) {
        $donnee['justificatif'] = new CURLFile(
            $_FILES['justificatif']['tmp_name'],
            $_FILES['justificatif']['type'],
            $_FILES['justificatif']['name']
        );
    }

    // Appel API multipart/form-data
    $add = apiPostMultipart('/api/depenses/', $donnee);

    if ($add === "login first") {
        session_destroy();
        header("Location: ./../../../index.php");
        exit;
    }

    if (!is_array($add) || !isset($add['id'])) {
        header("Location: ./../../../public/admin/depenses/index.php?error=Erreur lors de l’ajout");
        exit;
    }

    header("Location: ./../../../public/admin/depenses/index.php?success=Dépense ajoutée avec justificatif");
    exit;
}
