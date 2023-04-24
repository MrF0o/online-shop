<?php

// --------------
// Partie Delete mn CRUD lel kol (clients, produits w categorie),
// nchoufou lparametre ?type=?? w ne3rfou anahou table elli bch nfas5ou mnh
// haka aalech id clés primaire f les tables lkol, bch nab9ouch nsamou id_categorie w id_produits etc
// --------------

if (!isset($_SESSION)) {
    session_start();
}


include '../config.php';

// tfasa5 kol chy based on $_GET

// ken mch logged in wla mch admin redirecti lel login
if (isset($_SESSION['is_admin'])) {
    if ($_GET['type'] == 'user') {
        $table = 'clients';
    } elseif ($_GET['type'] == 'prod') {
        $table = 'article';
    } elseif ($_GET['type'] == 'cat') {
        $table = 'categories';
    } else {
        $table = NULL;
    }

    if (isset($_GET['id']) && !empty($_GET['id']) && $table) {
        $id = mysqli_escape_string($db, $_GET['id']);

        $sql = "DELETE FROM $table WHERE id=$id";
        mysqli_query($db, $sql);

        // redirect back
        header('Location: ' . $_SERVER['HTTP_REFERER']);

        // nrmlmt ynjamch yfas5 l'admin non?
        // ...
    } else {
        echo 'error';
    }
} else {
    header('Location: login.php');
}
