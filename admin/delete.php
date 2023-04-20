<?php
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
