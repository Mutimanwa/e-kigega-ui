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

        // 🔐 Données communes
        $_SESSION['token'] = $data['access'];
        $_SESSION['role']  = $data['user']['role']['nom'] ?? null;
        $_SESSION['user_id'] = $data['user']['id'] ?? null;

        // 🏢 Entreprise (pour TOUS sauf SUPER_ADMIN)
        $_SESSION['entreprise'] = $data['user']['entreprise']['id'] ?? null;

        return [
            "success" => true,
            "message" => "<span class='text-success'>Connexion réussie</span>",
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

    //========== GESTION DES UPDATES WITH PATCH DES DONNEES  {api/ex/:id} 
    function apiPATCH($endpoint, $body){

        $apiBase = "https://ekigega-backend.onrender.com";
        $token = $_SESSION['token'];

        $ch = curl_init($apiBase.$endpoint);

        curl_setopt_array($ch, [
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_CUSTOMREQUEST => "PATCH",
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

    //==================== post with file 
    function apiPostMultipart($endpoint, $body) {
        $apiBase = "https://ekigega-backend.onrender.com";
        $token   = $_SESSION['token'] ?? '';

        $ch = curl_init($apiBase . $endpoint);

        curl_setopt_array($ch, [
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_POST => true,
            CURLOPT_POSTFIELDS => $body,
            CURLOPT_HTTPHEADER => [
                "Authorization: Bearer $token"
            ],
            CURLOPT_SAFE_UPLOAD => true,  
            CURLOPT_CONNECTTIMEOUT => 5,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_SSL_VERIFYPEER => false,
            CURLOPT_SSL_VERIFYHOST => false
        ]);


        $response = curl_exec($ch);
        $status   = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);

        if ($status === 401) return "login first";
        if ($status < 200 || $status >= 300) return "Erreur lors de la création";

        return json_decode($response, true);
    }

    //=========== verifier l'abonnement de l'entreprise connecte 
function Abonnement(string $redirection, ?string $entrepriseId): void {
    if (empty($entrepriseId)) {
        session_destroy();
        header("Location: $redirection?error=Entreprise_non_definie");
        exit;
    }

    $response = getApi("/api/abonnements/?entreprise=$entrepriseId");
    if (is_string($response)) $response = json_decode($response, true);

    if (!is_array($response) || count($response) === 0) {
        session_destroy();
        header("Location: $redirection?error=Pas_d_abonnement");
        exit;
    }

    $today = new DateTimeImmutable('today');
    $abonnementValide = false;

    foreach ($response as $abonnement) {
        if (!is_array($abonnement)) continue;
        if (($abonnement['status'] ?? '') !== 'actif') continue;

        $debut = isset($abonnement['date_debut']) ? (new DateTimeImmutable($abonnement['date_debut']))->setTime(0,0,0) : null;
        $fin   = isset($abonnement['date_fin']) ? (new DateTimeImmutable($abonnement['date_fin']))->setTime(0,0,0) : null;

        if (!$debut || !$fin) continue;

        if ($today >= $debut && $today <= $fin) {
            $abonnementValide = true;
            break;
        }
    }

    if (!$abonnementValide) {
        session_destroy();
        header("Location: $redirection?error=Abonnement_expire");
        exit;
    }
}
    //=========== fetch produit via son ID
    function getAPI_id($endpoint,$id){

      $api=getApi($endpoint . $id.'/') ?? [];
        if (!is_array($api)) {
          echo "<div class='alert alert-danger'>API error</div>";
          $api = [];
        }  

      return $api;
    }

    function isAllowedSource($url) {
        $host = parse_url($url, PHP_URL_HOST);
        return in_array($host, [
            "ekigega-backend.onrender.com",
            "www.ekigega-backend.onrender.com"
        ]);
    }

    
    function forceDownloadFromURL($url)
    {
        if (!isAllowedSource($url)) {
            die("Source non autorisée");
        }

        $filename = basename(parse_url($url, PHP_URL_PATH));

        header("Content-Description: File Transfer");
        header("Content-Type: application/octet-stream");
        header("Content-Disposition: attachment; filename=\"$filename\"");
        header("Cache-Control: no-cache");
        header("Pragma: public");

        $fp = fopen($url, "rb");

        if (!$fp) {
            die("Impossible d’ouvrir le fichier");
        }

        while (!feof($fp)) {
            echo fread($fp, 8192);
            flush();
        }

        fclose($fp);
        exit;
    }


?>