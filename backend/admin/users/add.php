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
        header("Location: ./../../../public/admin/utilisateurs/index.php?error=Entreprise non définie");
        exit;
    }


    if (isset($_POST['send'])) {

        $nom        = trim($_POST['nom']);
        $prenom     = trim($_POST['prenom']);
        $email =  trim($_POST['email']);
        $telephone  = trim($_POST['telephone']);
        $role  =  trim($_POST['role']);
        $password  =  trim($_POST['password']);
        $conf  =  trim($_POST['conf_psswd']);


        if ($nom === "" || $prenom === "" || $email === "" || $telephone==="" || $role==="" || $password==="" || $conf==="") {
            header("Location: ./../../../public/admin/utilisateurs/index.php?error=Données invalides");
            exit;
        }

        if ($password != $conf) {
            header("Location: ./../../../public/admin/utilisateurs/index.php?error=Password doit etre identique ");
            exit;
        }

        // Préparer les données
        $donnee = [
            "email"      => $email,
            "nom"        => $nom,
            "prenom"     => $prenom,
            "telephone"  => $telephone,
            "password"   => $password,
            "password2"  => $conf,
            "role"       => $role,
            "entreprise" => $entreprise   
        ];

        // Ajouter le fichier s'il existe
        if (!empty($_FILES['profile']['tmp_name'])) {
            $donnee['profile'] = new CURLFile(
                $_FILES['profile']['tmp_name'],
                $_FILES['profile']['type'],
                $_FILES['profile']['name']
            );
        }

        // Appel API multipart/form-data
        $add = apiPostMultipart('/api/auth/register/', $donnee);

        if ($add === "login first") {
            session_destroy();
            header("Location: ./../../../index.php");
            exit;
        }
        
        if($add === 'Erreur lors de la création'){
            header("Location: ./../../../public/admin/utilisateurs/index.php?error=Utilisateur n'est pas ajoutee");
            exit;
        }

        header("Location: ./../../../public/admin/utilisateurs/index.php?success=Utilisateur ajoutée avec success");
        exit;

    }

?>
