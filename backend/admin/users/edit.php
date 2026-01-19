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

        //======== recuperer l'id
        $id = $_POST['id'];

        $nom       = trim($_POST['nom']);
        $prenom    = trim($_POST['prenom']);
        $email     = trim($_POST['email']);
        $telephone = trim($_POST['telephone']);
        $role_id   = trim($_POST['role_id']);

        if ($nom === "" || $prenom === "" || $email === "" || $telephone === "" || $role_id === "") {
            header("Location: ./../../../public/admin/utilisateurs/index.php?error=Données invalides");
            exit;
        }

        $donnee = [
            "email"      => $email,
            "nom"        => $nom,
            "prenom"     => $prenom,
            "telephone"  => $telephone,
            "role_id"    => $role_id,
            "entreprise" => $entreprise
        ];

        if (!empty($_FILES['profile']['tmp_name'])) {
            $donnee['profile'] = new CURLFile(
                $_FILES['profile']['tmp_name'],
                $_FILES['profile']['type'],
                $_FILES['profile']['name']
            );
        }

        $update = apiPATCHUsers("/api/auth/users/$id/", $donnee);


        if ($update === true) {
            header("Location: ./../../../public/admin/utilisateurs/index.php?success=Utilisateurs modifié avec succès");
        } elseif ($update === "login") {
            session_destroy();
            header("Location: ./../../../index.php");
        } else {
            header("Location: ./../../../public/admin/utilisateurs/index.php?error=Erreur lors de la modification");
        }

?>