<?php

// converter une chaine en un tableau 
// par exemple /produit/1 converti >>
// ['produit', '1']
$split = explode('/', $uri['path']);

if ($split[0] == 'product') {
    $page_to_include = 'pages/product.php';
}