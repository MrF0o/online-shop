<?php

$db_user = 'root';
$db_pass = '';
$db_name = 'projet';
$db_host = 'localhost';

$site_name = "Brand";
$dirname = basename(__DIR__);

// connexion au serveur mysql
// utiliser cette instance dans tout les fichier
$db = mysqli_connect($db_host, $db_user, $db_pass, $db_name);