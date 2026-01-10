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
    header("Location: ./../../../public/admin/produits/index.php?error=Entreprise non définie");
    exit;
}

// Charger les produits existants
$produits = getApi('/api/produits/') ?? [];

if (isset($_POST['send'])) {

    $nom       = trim($_POST['nom']);
    $categorie = trim($_POST['categorie']);
    $unite     = trim($_POST['unite']);
    $prix      = floatval($_POST['prix']);

    // Validation simple
    if ($nom === "" || $categorie === "" || $unite === "" || $prix <= 0) {
        header("Location: ./../../../public/admin/ventes/index.php?error=Données invalides");
        exit;
    }

    // // Vérifier les doublons de produit (dans la même entreprise)
    // foreach ($produits as $p) {
    //     if (
    //         strcasecmp($p['nom'], $nom) === 0 &&
    //         $p['entreprise'] === $entreprise
    //     ) {
    //         $e = "Ce produit existe déjà";
    //         header("Location: ./../../../public/admin/ventes/index.php?error=" . urlencode($e));
    //         exit;
    //     }
    // }

    // Données à envoyer à l’API
    $donnee = [
        "client" => $client_id,
        "statut" => "payee",
        "items" => [
            [
                "produit" => $produit_id,
                "quantite" => $quantite,
                "unite" => $unite,
                "prix_unitaire" => $prix
            ]
        ]
    ];

    $add = apiPost('/api/produits/', $donnee);

    if ($add === "login first") {
        session_destroy();
        header("Location: ./../../../index.php");
        exit;
    }

    if ($add === "Erreur lors de la création") {
        header("Location: ./../../../public/admin/ventes/index.php?error=Erreur lors de l’ajout");
        exit;
    }

    if (isset($add['id'])) {
        header("Location: ./../../../public/admin/ventes/index.php?success=Produit ajouté avec succès");
        exit;
    }

    header("Location: ./../../../public/admin/ventes/index.php?success=Produit ajouté avec succès");
    exit;
}
