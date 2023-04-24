<?php

include 'config.php';

if (!isset($_SESSION)) {
    session_start();
}

if (isset($_SESSION['login'])) {
    if (isset($_COOKIE['cart'])) {
        $cart = json_decode($_COOKIE['cart'], true);
        if (count($cart['products'])) { // ken fma des produits fl pannier
            $query = "SELECT *,  address.address_line_1, address.address_line_2, address.postal_code FROM clients INNER JOIN address ON address.id=clients.address_id";
            $membre = mysqli_fetch_assoc(mysqli_query($db, $query));
            $create_cmd_query = "INSERT INTO cmd (date, address_id) VALUES (NOW(), {$membre['address_id']})";
            mysqli_query($db, $create_cmd_query);
            $cmd_id = mysqli_insert_id($db);

            foreach ($cart['products'] as $prod) // najoutou ligne_cmd lkol article fl panniers
            {
                $sql = "INSERT INTO ligne_cmd(cmd_id, article_id, quantity) VALUE ($cmd_id, {$prod['id']}, {$prod['quantity']})";
                mysqli_query($db, $sql);
            }

            setcookie('cart', null, time() + 3600);
            header('Location: thankyou.php');
        }
    }
} else {
    $msg = "Connectez-vous pour continuer votre achat";
    include 'login.php';
}
