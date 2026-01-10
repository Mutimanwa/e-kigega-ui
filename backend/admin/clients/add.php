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
    header("Location: ./../../../public/admin/clients/index.php?error=Entreprise non définie");
    exit;
}

// Charger les produits existants
$client = getApi('/api/partners/') ?? [];

if (isset($_POST['send'])) {

    $nom       = trim($_POST['nom']);
    $prenom = trim($_POST['prenom']);
    $email     = trim($_POST['email']);
    $telephone      = trim($_POST['telephone']);
    $adresse   =  trim($_POST['adresse']);


    // Validation simple
    if ($nom === "" || $prenom === "" || $email === "" || $telephone === "" || $adresse ==="") {
        header("Location: ./../../../public/admin/clients/index.php?error=Données invalides");
        exit;
    }

    // Vérifier les doublons de produit (dans la même entreprise)
    foreach ($client as $p) {
        if (
            strcasecmp($p['email'], $email) === 0 &&
            $p['entreprise'] === $entreprise
        ) {
            $e = "Cet Client existe déjà";
            header("Location: ./../../../public/admin/clients/index.php?error=" . urlencode($e));
            exit;
        }
    }

    // Données à envoyer à l’API
    $donnee = [
        "type"        => 'client',
        "nom" => $nom,
        "prenom"      => $prenom,
        "email"  => $email,
        "telephone"=> $telephone,
        "adresse"    => $adresse
    ];

    $add = apiPost('/api/partners/', $donnee);

    if ($add === "login first") {
        session_destroy();
        header("Location: ./../../../index.php");
        exit;
    }

    if ($add === "Erreur lors de la création") {
        header("Location: ./../../../public/admin/clients/index.php?error=Erreur lors de l’ajout");
        exit;
    }

    if (isset($add['id'])) {
        header("Location: ./../../../public/admin/clients/index.php?success=Client ajouté avec succès");
        exit;
    }

    header("Location: ./../../../public/admin/clients/index.php?success=Client ajouté avec succès");
    exit;
}
