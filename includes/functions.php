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