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
    $clients = getApi('/api/partrners/') ?? [];

    if (!isset($_POST['send'], $_POST['id'], $_POST['nom'], $_POST['prenom'], $_POST['email'], $_POST['telephone'] ,$_POST['adresse'])) {
        header("Location: ./../../../public/admin/fournisseurs/index.php?error=Données manquantes");
        exit;
    }

    $id = $_POST['id'];
    $nom       = trim($_POST['nom']);
    $prenom = trim($_POST['prenom']);
    $email     = trim($_POST['email']);
    $telephone      = trim($_POST['telephone']);
    $adresse   =  trim($_POST['adresse']);

    //  Vérifier doublons (en ignorant celle qu'on modifie)
    foreach ($clients as $k) {
        if (
            strcasecmp($k['email'], $email) === 0
            && $k['entreprise'] !== $entreprise
        ) {
            $e = "Cet client existe déjà";
            header("Location: ./../../../public/admin/fournisseurs/index.php?error=" . urlencode($e));
            exit;
        }
    }

    // Données à envoyer à l’API
    $donnee = [
        "type"        => 'fournisseur',
        "nom" => $nom,
        "prenom"      => $prenom,
        "email"  => $email,
        "telephone"=> $telephone,
        "adresse"    => $adresse
    ];

    // Appel API PUT
    $update = apiPut("/api/partners/$id/", $donnee);

    if ($update === true) {
        header("Location: ./../../../public/admin/fournisseurs/index.php?success=Client modifié avec succès");
    } elseif ($update === "login") {
        session_destroy();
        header("Location: ./../../../index.php");
    } else {
        header("Location: ./../../../public/admin/fournisseurs/index.php?error=Erreur lors de la modification");
    }
