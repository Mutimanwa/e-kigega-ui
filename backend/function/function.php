<?php

    //============ login function 
    function login($email, $motDePasse) {

        $apiUrl = "https://ekigega-backend.onrender.com/api/auth/login/";

        $payload = json_encode([
            "email" => $email,
            "password" => $motDePasse
        ]);

        $ch = curl_init($apiUrl);
        curl_setopt_array($ch, [
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_POST => true,
            CURLOPT_HTTPHEADER => [
                "Content-Type: application/json",
                "Accept: application/json"
            ],
            CURLOPT_POSTFIELDS => $payload,

            // PERFORMANCE
            CURLOPT_CONNECTTIMEOUT => 5,
            CURLOPT_TIMEOUT => 10,

            // TEMPORAIRE (DEV ONLY)
            CURLOPT_SSL_VERIFYPEER => false,
            CURLOPT_SSL_VERIFYHOST => false
        ]);

        $response = curl_exec($ch);

        if ($response === false) {
            return [
                "success" => false,
                "message" => "Connexion lente ou indisponible"
            ];
        }

        $status = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);

        if ($status < 200 || $status >= 300) {
            return [
                "success" => false,
                "message" => "Identifiants incorrects"
            ];
        }

        $data = json_decode($response, true);

        if ($data['user']['role']['nom']==='SUPER_ADMIN') {
            $_SESSION['token'] = $data['access'];
            $_SESSION['role']  = $data['user']['role']['nom'];
        }else{
            $_SESSION['token'] = $data['access'];
            $_SESSION['role']  = $data['user']['role']['nom'];
            $_SESSION['entreprise'] = $data['user']['entreprise']['id'];
        }

        return [
            "success" => true,
            "message" => "Login successful",
            "role"    => $_SESSION['role']
        ];
    }


    //============== GESTION DES SESSION SECURITES DES PAGES
    function requireRole(string $role) {
        if (!isset($_SESSION['token']) || !isset($_SESSION['role']) || $_SESSION['role'] !== $role) {
            return "Accès interdit";
        }
    }

    //====== GESTION DES API LORS DE GET DES DONNEEES
    function getApi($endpoint){

            $apiBase = "http://localhost:8080/api";
            $token   = $_SESSION['token'];

            $ch = curl_init($apiBase . $endpoint);

            curl_setopt_array($ch, [
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_HTTPHEADER => [
                    "Authorization: Bearer $token",
                    "Content-Type: application/json"
                ]
            ]);

            $response = curl_exec($ch);
            $status   = curl_getinfo($ch, CURLINFO_HTTP_CODE);
            curl_close($ch);

            if ($status === 401) {
                session_destroy();
                return 'faille to token';
                exit;
            }

           return json_decode($response, true);

    }

    //========== GESTION DES API LORS DE DELETE {api/ex/:id} 
    function apiDelete(string $endpoint) {

        $apiBase = "http://localhost:8080/api";
        $token   = $_SESSION['token'];

        $ch = curl_init($apiBase . $endpoint);

        curl_setopt_array($ch, [
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_CUSTOMREQUEST => "DELETE",
            CURLOPT_HTTPHEADER => [
                "Authorization: Bearer $token",
                "Content-Type: application/json"
            ]
        ]);

        $response = curl_exec($ch);
        $status   = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);

        if ($status === 401) {
            session_destroy();
            return 'try login again';
            exit;
        }

        if ($status !== 200 && $status !== 204) {
            return "Erreur lors de la suppression";
        }

        return true;
    }

    //========== GESTION DES UPDATES DES DONNEES  {api/ex/:id} 
    function apiPut(string $endpoint, array $body) {

        $apiBase = "http://localhost:8080/api";
        $token   = $_SESSION['token'];

        $ch = curl_init($apiBase . $endpoint);

        curl_setopt_array($ch, [
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_CUSTOMREQUEST => "PUT",
            CURLOPT_HTTPHEADER => [
                "Authorization: Bearer $token",
                "Content-Type: application/json"
            ],
            CURLOPT_POSTFIELDS => json_encode($body)
        ]);

        $response = curl_exec($ch);
        $status   = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);

        if ($status === 401) {
            session_destroy();
            header("Location: /auth/login.php");
            exit;
        }

        if ($status !== 200) {
            die("Erreur lors de la mise à jour");
        }

        return json_decode($response, true);
    }

   //================== post method create 
    function apiPost(string $endpoint, array $body) {

        $apiBase = "http://localhost:8080/api";
        $token   = $_SESSION['token'];

        $ch = curl_init($apiBase . $endpoint);

        curl_setopt_array($ch, [
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_POST => true,
            CURLOPT_HTTPHEADER => [
                "Authorization: Bearer $token",
                "Content-Type: application/json"
            ],
            CURLOPT_POSTFIELDS => json_encode($body)
        ]);

        $response = curl_exec($ch);
        $status   = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);

        if ($status === 401) {
            session_destroy();
            header("Location: /auth/login.php");
            exit;
        }

        if ($status !== 201 && $status !== 200) {
            die("Erreur lors de la création");
        }

        return json_decode($response, true);
    }


?>