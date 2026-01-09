<?php

    ini_set('session.cookie_httponly', 1);
    ini_set('session.cookie_secure', 1);
    session_start();

    require_once('./../../function/function.php');
    $role="ADMIN";

    //================== gerer les session 
    if(requireRole($role)==="Accès interdit"){
        header("Location: ./../../../index.php");
        session_destroy();
    }

    if(isset($_POST['send'])){
        $nom=htmlspecialchars($_POST['nom']);

        $donnee = [
            "nom" => $nom
        ];

       $add=apiPost('/api/categories/',$donnee); 

       if($add==="login first"){
         session_destroy();
         header("Location:./../../../index.php");
       }else if($add==="Erreur lors de la création"){
         $e="Erreur lors de la création";
         header("Location:./../../../public/admin/produits/categories.php?error=$e");
      }else if($add['Message']==="ajouter avec succes"){
        $e= "Catégorie ajoutée avec succès";
        header("Location:./../../../public/admin/produits/categories.php?success=$e");
      }

    }
?>