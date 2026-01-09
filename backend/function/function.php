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

        if (!isset($_SESSION['token'])) {
            return null;
        }

        $apiBase = "https://ekigega-backend.onrender.com";
        $token   = $_SESSION['token'];

        $ch = curl_init($apiBase . $endpoint);

        curl_setopt_array($ch, [
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_HTTPHEADER => [
                "Authorization: Bearer $token",
                "Accept: application/json"
            ],

            // Performance
            CURLOPT_CONNECTTIMEOUT => 5,
            CURLOPT_TIMEOUT => 10,

            //  SSL fix (DEV only)
            CURLOPT_SSL_VERIFYPEER => false,
            CURLOPT_SSL_VERIFYHOST => false
        ]);

        $response = curl_exec($ch);

        if ($response === false) {
            return null;
        }

        $status = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);

        if ($status === 401) {
            session_destroy();
            return null;
        }

        return json_decode($response, true);
    }

    //========== GESTION DES API LORS DE DELETE {api/ex/:id} 
    function apiDelete(string $endpoint) {

        $apiBase = "https://ekigega-backend.onrender.com";
        $token   = $_SESSION['token'];

        $ch = curl_init($apiBase . $endpoint);

        curl_setopt_array($ch, [
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_CUSTOMREQUEST => "DELETE",
            CURLOPT_HTTPHEADER => [
                "Authorization: Bearer $token",
                "Content-Type: application/json"
            ],

            // Performance
            CURLOPT_CONNECTTIMEOUT => 5,
            CURLOPT_TIMEOUT => 10,

            //  SSL fix (DEV only)
            CURLOPT_SSL_VERIFYPEER => false,
            CURLOPT_SSL_VERIFYHOST => false
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
    function apiPut($endpoint, $body){

        $apiBase = "https://ekigega-backend.onrender.com";
        $token = $_SESSION['token'];

        $ch = curl_init($apiBase.$endpoint);

        curl_setopt_array($ch, [
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_CUSTOMREQUEST => "PUT",
            CURLOPT_HTTPHEADER => [
                "Authorization: Bearer $token",
                "Content-Type: application/json"
            ],
            CURLOPT_POSTFIELDS => json_encode($body),

            //======== performance
            CURLOPT_CONNECTTIMEOUT => 5,
            CURLOPT_TIMEOUT => 10,
            
            //=========verification ssl
            CURLOPT_SSL_VERIFYPEER => false,
            CURLOPT_SSL_VERIFYHOST => false
        ]);

        $response = curl_exec($ch);
        $status = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);

        if ($status === 401) return "login";
        if ($status < 200 || $status > 299) return "error";

        return true;
    }

   //================== post method create 
    function apiPost( $endpoint, $body) {

        $apiBase = "https://ekigega-backend.onrender.com";
        $token   = $_SESSION['token'];

        $ch = curl_init($apiBase . $endpoint);

        curl_setopt_array($ch, [
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_POST => true,
            CURLOPT_HTTPHEADER => [
                "Authorization: Bearer $token",
                "Content-Type: application/json"
            ],

            CURLOPT_POSTFIELDS => json_encode($body),

            // Performance
            CURLOPT_CONNECTTIMEOUT => 5,
            CURLOPT_TIMEOUT => 10,

            //  SSL fix (DEV only)
            CURLOPT_SSL_VERIFYPEER => false,
            CURLOPT_SSL_VERIFYHOST => false
        ]);

        $response = curl_exec($ch);
        $status   = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);

        if ($status === 401) {
            return "login first";
            exit;
        }

        if ($status < 200 || $status >= 300) {
            return "Erreur lors de la création";
        }

        // return json_decode($response, true);
        return [
            "success" =>true,
            "Message"=>"ajouter avec succes"
        ];
    }


?>