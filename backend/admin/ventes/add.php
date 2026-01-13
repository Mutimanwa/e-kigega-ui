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
        header("Location: ./../../../public/admin/ventes/index.php?error=Entreprise non définie");
        exit;
    }


    if (isset($_POST['send'])) {

        $client       = trim($_POST['client']);
        $produit = trim($_POST['produit']);
        $statut     = trim($_POST['statut']);
        $quantite      = floatval($_POST['quantite']);

        // Validation simple
        if ($client === "" || $produit === "" || $statut === "" || $quantite <= 0) {
            header("Location: ./../../../public/admin/ventes/index.php?error=Données invalides");
            exit;
        }

        // Charger le produits par id 
        $produits = getApi('/api/produits/'.$produit.'/');
        
        //===== message lors de verification des quantites
        if($quantite > $produits['quantite']){
            $m='La quantite indisponible (Demande : '.$quantite.' Disponible :'.$produits['quantite'].')';
            header("Location: ./../../../public/admin/ventes/index.php?error=".$m);
            exit;
        }


        // Données à envoyer à l’API
        $donnee = [
            "client" => $client,
            "statut" => $statut,
            "produit" => $produit,
            "quantite" => $quantite,
            "unite" => $produits['mesure'],
            "prix_unitaire" => $produits['prix']

        ];

        $add = apiPost('/api/ventes/', $donnee);

        if ($add === "login first") {
            session_destroy();
            header("Location: ./../../../index.php");
            exit;
        }

        if ($add === "Erreur lors de la création") {
            header("Location: ./../../../public/admin/ventes/index.php?error=Erreur lors de l’ajout");
            exit;
        }

        if ($add ==='ajouter avec succes') {
            header("Location: ./../../../public/admin/ventes/index.php?success=Vente ajouté avec succès");
            exit;
        }

        header("Location: ./../../../public/admin/ventes/index.php?success=Vente ajouté avec succès");
        exit;
    }

?>