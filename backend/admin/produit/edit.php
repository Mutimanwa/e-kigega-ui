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
$produits = getApi('/api/produits/') ?? [];

if (!isset($_POST['send'], $_POST['id'], $_POST['nom'], $_POST['categorie'], $_POST['prix'], $_POST['unite'])) {
    header("Location: ./../../../public/admin/produits/index.php?error=Données manquantes");
    exit;
}

$id = $_POST['id'];
$nom = trim($_POST['nom']);
$categorie = trim($_POST['categorie']);
$prix = floatval($_POST['prix']);
$unite = trim($_POST['unite']);

//  Vérifier doublons (en ignorant celle qu'on modifie)
foreach ($produits as $k) {
    if (
        strcasecmp($k['nom'], $nom) === 0
        && $k['categorie'] !== $categorie
    ) {
        $e = "Cette catégorie existe déjà";
        header("Location: ./../../../public/admin/produits/index.php?error=" . urlencode($e));
        exit;
    }
}

// Préparer les données
$data = [
    "nom" => $nom,
    "categorie" => $categorie,
    "prix" => $prix,
    "mesure" => $unite
];

// Appel API PUT
$update = apiPut("/api/produits/$id/", $data);

if ($update === true) {
    header("Location: ./../../../public/admin/produits/index.php?success=Produit modifié avec succès");
} elseif ($update === "login") {
    session_destroy();
    header("Location: ./../../../index.php");
} else {
    header("Location: ./../../../public/admin/produits/index.php?error=Erreur lors de la modification");
}
