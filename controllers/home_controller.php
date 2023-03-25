<?php

// donnée a afficher
$data = [
    'hello' => 'hi'
];

if ($uri['path'] == '/') {
    
    $page_to_include = "pages/home.php";
}