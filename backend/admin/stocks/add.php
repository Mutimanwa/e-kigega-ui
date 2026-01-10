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
    header("Location: ./../../../public/admin/stock/index.php?error=Entreprise non définie");
    exit;
}

// Charger les produits existants
$produits = getApi('/api/produits/') ?? [];

if (isset($_POST['send'])) {


    $quantite     = floatval($_POST['quantite'] ?? 0);
    $prix_achat   = floatval($_POST['prix_achat'] ?? 0);
    $date_entree  = trim($_POST['date_entree'] ?? '');
    $produit      = trim($_POST['produit'] ?? '');
    $fournisseur  = trim($_POST['fournisseur'] ?? '');

    if ($quantite < 1 || $prix_achat <= 0 || empty($date_entree) || empty($produit)) {
        header("Location: ./../../../public/admin/stock/index.php?error=Données invalides");
        exit;
    }

    $donnee = [
        "produit"     => $produit,
        "quantite"    => $quantite,
        "prix_achat"  => $prix_achat,
        "date_entree" => $date_entree,
        "fournisseur" => $fournisseur,
        "entreprise"  => $entreprise
    ];

    $add = apiPost('/api/stocks/', $donnee);

    if ($add === "login first") {
        session_destroy();
        header("Location: ./../../../index.php");
        exit;
    }

    if ($add === "Erreur lors de la création") {
        header("Location: ./../../../public/admin/stock/index.php?error=Erreur lors de l’ajout");
        exit;
    }

    if (isset($add['id'])) {
        header("Location: ./../../../public/admin/stock/index.php?success=Produit  approvisionnee avec succès");
        exit;
    }

    header("Location: ./../../../public/admin/stock/index.php?success=Produit approvisionnee avec succès");
    exit;
}
