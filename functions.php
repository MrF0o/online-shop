<?php

// afficher un variable
// (pour développement ctt)
function dd($var)
{
    echo '<pre>';
    var_dump($var);
    echo '</pre>';
    die;
}

// donné un nom d'image
// ce fonction return le lien de l'image quelque soit
// le nom de dossier de projet
function img($name) {
    return route('/images/' . $name);
}

// return un lien complet pour un chemin d'accée
// si $path = /login et le dossier de projet sous le nom "projet"
// le fonction return : http://localhost/projet/login
function route($path) {
    global $dirname;

    if(isset($_SERVER['HTTPS'])){
        $protocol = ($_SERVER['HTTPS'] && $_SERVER['HTTPS'] != "off") ? "https" : "http";
    }
    else{
        $protocol = 'http';
    }

    return $protocol . '://' . $_SERVER['SERVER_NAME'] . '/' . $dirname . "$path";
}