<?php
// the index file

// .htacces presenter dans le root de projet c'est configuration pour apache
// (OBLIGATOIR POUR LE FONCTION DE PROJET)

include_once __DIR__ . '/config.php';
include_once __DIR__ . '/functions.php';

// parse URI pour identifier quelle controlleur a choisis
$uri = parse_url($_SERVER['REQUEST_URI']);
$uri['path'] = str_replace('/' . $dirname, '', $uri['path']);

if (strlen($uri['path']) > 1) {
    $uri['path'] = substr($uri['path'], 1);
}

// ce variable et affecter dans les controlleur pour
// identifier quelle page HTML (view) a inclus
$page_to_include = '';

// donner returner a la HTML
// utiliser cette variable pour acceder au donner dans le HTML
$data = array();

// include tout les fichier .php sous le dossier ./controllers
// automatiquement
foreach (glob("controllers/*.php") as $filename)
{
    include $filename;
}

// si le page_to_include est vide danc n'y a de controlleur
// returner un erreur 404
if (empty($page_to_include)) {
    http_response_code(404);
    die("Page not found :(");
}

// include le theme de site
include __DIR__ . '/includes/theme.php';