<?php

// hajatna bel connexion bd mn config donc
include 'config.php';

// awl m yd5l l'utilisateur
if (isset($_POST['inscription'])) {
    // lazm y3amr lkol
    if ((isset($_POST['login']) && !empty($_POST['login'])) && (isset($_POST['pass']) && !empty($_POST['pass'])) && (isset($_POST['pass_confirm']) && !empty($_POST['pass_confirm']))) {
        //  mdp lawla kima mdp thania
        if ($_POST['pass'] != $_POST['pass_confirm']) {
            $erreur = 'Les 2 mots de passe sont différents.';
        } else {


            // n7adhrou données bech n3mlou insert
            $email = mysqli_escape_string($db, $_POST['login']);
            $pass = mysqli_escape_string($db, md5($_POST['pass']));
            $nom = mysqli_escape_string($db, $_POST['nom']);
            $prenom = mysqli_escape_string($db, $_POST['prenom']);

            // kan email deja mwjouda ybadl email o5ra
            $sql = 'SELECT count(*) FROM clients WHERE email="' . $email . '"';
            $req = mysqli_query($db, $sql) or die('Erreur SQL !<br />' . $sql . '<br />' . mysqli_error($db));
            $data = mysqli_fetch_array($req);


            if ($data[0] == 0) {
                $sql = "INSERT INTO clients (frst_name, last_name, email, password) VALUES ('$prenom', '$nom', '$email', '$pass')";
                mysqli_query($db, $sql) or die('Erreur SQL !' . $sql . '<br />' . mysqli_error($db));

                session_start(); // good job hh !
                $_SESSION['login'] = $email;
                header('Location: membre.php');
                exit();
            } else {
                $erreur = 'Un membre possède déjà ce login.';
            }
        }
    } else {
        $erreur = 'Au moins un des champs obligatoire est vide.';
    }
}
?>

<?php include(__DIR__ . '/header.php') ?>


<div class="container d-flex h-100 justify-content-center align-items-center">
    <div class="col col-md-5 bg-light p-4 rounded shadow">
        <?php if (isset($erreur)) : ?>
            <div class="alert alert-danger">
                <?php
                echo $erreur;
                ?>
            </div>
        <?php endif ?>
        <h4>Inscription à l'espace membre :</h4>
        <form action="" method="POST">
            <div class="form-group">
                <label for="nom">Nom:</label>
                <input type="text" name="nom" class="form-control" id="nom" placeholder="Entrer votre Nom">
            </div>
            <div class="form-group">
                <label for="prenom">Prenom:</label>
                <input type="text" name="prenom" class="form-control" id="prenom" placeholder="Entrer votre Prenom">
            </div>
            <div class="form-group">
                <label for="login">Adresse E-mail:</label>
                <input type="email" name="login" class="form-control" id="login" aria-describedby="emailHelp" placeholder="Entrer votre E-mail">
                <small id="emailHelp" class="form-text text-muted">Votre email est securisée.</small>
            </div>
            <div class="form-group">
                <label for="password">Mot de passe :</label>
                <input type="pass" name="pass" class="form-control" id="password" placeholder="Entrer un mot de passe">
            </div>
            <div class="form-group">
                <label for="password">Confirmation du mot de passe :</label>
                <input type="password" name="pass_confirm" class="form-control" id="password" placeholder="Confirmation de mot de passe">
            </div>

            <div class="mt-2">
                <button type="submit" name="inscription" class="btn btn-outline-dark">Inscription</button>
            </div>
        </form>
    </div>
</div>

<?php include(__DIR__ . '/footer.php') ?>