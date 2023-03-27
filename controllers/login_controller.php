<?php

// login controller: responsable a la authentification des utilisateur
// et l'affichage de le formulaire de connexion
if ($uri['path'] == 'login') {
    
    // si la methode est POST donc l'utilisateur est en train de connexion
    if (isset($_POST['login_submitted'])) {
        $email = $_POST['email'];
        $pass = $_POST['password'];
        
        // TODO: ghir a9ri lcode lkol ken m fhemtich haja goulili
        dd($email);

    } else { // si non la methode est GET donc afficher la page login.php
        $page_to_include = "pages/login.php";
    }
}