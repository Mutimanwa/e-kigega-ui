<?php 

// les fonctions utilitaires de l'application nessaicere pour le front-end
// les fonctions de redirection, de nettoyage des données, etc.

/**
 * fonction de redirection 
 * @param mixed $url
 * @return never
 */
function redirect($url){
    header("Location: $url");
    exit();
}

/**
 * fonction de nettoyage des données
 * @param mixed $data
 * @return string
 */

function cleanInput($data){
    return htmlspecialchars(strip_tags(trim($data)));
}

/**
 * fonction pour formater les dates
 * @param mixed $date
 * @return string
 */
function formatDate($date){
    return date("d/m/Y H:i:s", strtotime($date));
}

/**
 * fonction pour formater les heures
 * @param mixed $time
 * @return string
 */
function formatTime($time){
    return date("H:i:s", strtotime($time));
}

/**
 * fonction pour formater les prix
 * @param mixed $number
 * @return string
 *
*/

function formatPrix($pricx){
    return number_format($pricx,2,".",",");
}

/**
 * fonction pour vérifier si une route est active
 * @param string $path
 * @return string
 */
function isActive(string $path): string {
    $current = trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/');
    return str_contains($current, trim($path, '/')) ? 'active' : '';
}