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

    if (!isset($_POST['id'])) {
        header("Location: ./../../../public/admin/ventes/index.php?error=ID de vente manquant");
        exit;
    }

    $id = $_POST['id'];
    $client = trim($_POST['client']);
    $produit_id = trim($_POST['produit']);
    $statut = trim($_POST['statut']);
    $quantite = floatval($_POST['quantite']);

    // Validation simple
    if ($client === "" || $produit_id === "" || $statut === "" || $quantite <= 0) {
        header("Location: ./../../../public/admin/ventes/index.php?error=Données invalides");
        exit;
    }

    // Récupérer la vente actuelle
    $vente = getApi("/api/ventes/$id/");
    if (!isset($vente['id'])) {
        header("Location: ./../../../public/admin/ventes/index.php?error=Vente introuvable");
        exit;
    }

    // Récupérer le produit concerné
    $produit = getApi("/api/produits/$produit_id/");
    if (!isset($produit['id'])) {
        header("Location: ./../../../public/admin/ventes/index.php?error=Produit introuvable");
        exit;
    }

    // Calcul de la nouvelle quantité disponible
    $ancienne_quantite_vente = $vente['quantite'];
    $quantite_diff = $quantite - $ancienne_quantite_vente; // positif si on augmente la vente, négatif si on réduit

    $nouvelle_quantite_produit = $produit['quantite'] - $quantite_diff;

    // Vérifier la disponibilité
    if ($nouvelle_quantite_produit < 0) {
        $m = 'Quantité indisponible (Demandé : ' . $quantite . ' Disponible : ' . $produit['quantite'] . ')';
        header("Location: ./../../../public/admin/ventes/index.php?error=" . urlencode($m));
        exit;
    }

    // Mettre à jour la quantité du produit
    $updateProduit = apiPATCH("/api/produits/$produit_id/", ["quantite" => $nouvelle_quantite_produit]);
    if ($updateProduit !== true) {
        $m = 'Erreur lors de la mise à jour du stock produit';
        header("Location: ./../../../public/admin/ventes/index.php?error=".$m);
        exit;
    }

    // Préparer les données de la vente à mettre à jour
    $donnee = [
        "client" => $client,
        "statut" => $statut,
        "produit" => $produit_id,
        "quantite" => $quantite,
        "unite" => $produit['mesure'],
        "prix_unitaire" => $produit['prix']
    ];

    // Appel API PUT pour mettre à jour la vente
    $update = apiPut("/api/ventes/$id/", $donnee);

    if ($update === true) {
        header("Location: ./../../../public/admin/ventes/index.php?success=Vente modifiée avec succès");
    } elseif ($update === "login") {
        session_destroy();
        header("Location: ./../../../index.php");
    } else {
        header("Location: ./../../../public/admin/ventes/index.php?error=Erreur lors de la modification");
    }
?>