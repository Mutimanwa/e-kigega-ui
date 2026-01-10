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

    // Charger les produits existants
    $produits = getApi('/api/stocks/') ?? [];

    //========= recuperer l'id
    $id=$_POST['id'];

    //========== recuperer les donnees
    $quantite     = floatval($_POST['quantite'] ?? 0);
    $prix_achat   = floatval($_POST['prix_achat'] ?? 0);
    $date_entree  = trim($_POST['date_entree'] ?? '');
    $produit      = trim($_POST['produit'] ?? '');
    $fournisseur  = trim($_POST['fournisseur'] ?? '');

    if ($quantite < 1 || $prix_achat <= 0 || empty($date_entree) || empty($produit)) {
        header("Location: ./../../../public/admin/stock/index.php?error=Données invalides");
        exit;
    }

    // //  Vérifier doublons (en ignorant celle qu'on modifie)
    // foreach ($produits as $k) {
    //     if (
    //         strcasecmp($k['nom'], $nom) === 0
    //         && $k['categorie'] !== $categorie
    //     ) {
    //         $e = "Cette catégorie existe déjà";
    //         header("Location: ./../../../public/admin/produits/index.php?error=" . urlencode($e));
    //         exit;
    //     }
    // }

    // Préparer les données
    $donnee = [
        "produit"     => $produit,
        "quantite"    => $quantite,
        "prix_achat"  => $prix_achat,
        "date_entree" => $date_entree,
        "fournisseur" => $fournisseur,
        "entreprise"  => $entreprise
    ];


    // Appel API PUT
    $update = apiPut("/api/stocks/$id/", $donnee);

    if ($update === true) {
        header("Location: ./../../../public/admin/stock/index.php?success=Produit modifié avec succès");
    } elseif ($update === "login") {
        session_destroy();
        header("Location: ./../../../index.php");
    } else {
        header("Location: ./../../../public/admin/stock/index.php?error=Erreur lors de la modification");
    }
