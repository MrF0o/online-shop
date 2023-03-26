<?php

// register controller: responsable a la creation des utilisateurs
// et l'affichage de le formulaire de creer un compte
if ($uri['path'] == 'register') {
    
    // si la methode est POST donc l'utilisateur est en train de submit
    if (isset($_POST['login_submitted'])) {
        $email = $_POST['email'];
        $name = $_POST['name'];
        $last_name = $_POST['last_name'];
        $pass = $_POST['password'];
        
        // TODO: ghir a9ri lcode lkol ken m fhemtich haja goulili
        dd($email);

        // TODO: insertion des details dans la base de données

    } else { // si non la methode est GET donc afficher la page register.php
        $page_to_include = "pages/register.php";
    }
}