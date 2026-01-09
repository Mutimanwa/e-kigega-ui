<?php
session_start();
require_once('./../../function/function.php');

if(requireRole("ADMIN")==="Accès interdit"){
    session_destroy();
    header("Location: ./../../../index.php");
    exit;
}

if(!isset($_POST['id'], $_POST['nom'])){
    header("Location: ./../../../public/admin/produits/categories.php");
    exit;
}

$id  = $_POST['id'];
$nom = trim($_POST['nom']);

//  Récupérer toutes les catégories via API
$categories = getApi('/api/categories/') ?? [];

//  Vérifier doublons (en ignorant celle qu'on modifie)
foreach ($categories as $k) {
    if (
        strcasecmp($k['nom'], $nom) === 0   // même nom
        && $k['id'] !== $id                 // pas la même catégorie
    ) {
        $e = "Cette catégorie existe déjà";
        header("Location: ./../../../public/admin/produits/categories.php?error=" . urlencode($e));
        exit;
    }
}

//  Mise à jour via API
$data = ["nom" => $nom];

$update = apiPut("/api/categories/$id/", $data);

//  Gestion du résultat
if($update === true){
    header("Location: ./../../../public/admin/produits/categories.php?success=Catégorie modifiée");
}
elseif($update === "login"){
    session_destroy();
    header("Location: ./../../../index.php");
}
else{
    header("Location: ./../../../public/admin/produits/categories.php?error=Erreur modification");
}
