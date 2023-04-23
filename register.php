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

<div class="container position-relative ">
    <div class="wrapper d-flex justify-content-center mt-5 mb-5 overflow-hidden">
        <div class="login-form col-md-7">
            <div class="h1">
                <span class="text-golden"></span> <span>Creer un Compte C'est Gratuit!</span>
            </div>

            <div class="mt-5">
                <form action="" method="POST">
                    <div class="form-group mt-2 mt-md-4 d-flex flex-column justify-content-center">
                        <label class="sr-only" for="nom">Nom</label>
                        <input type="text" name="nom" class="login-input golden-btn h3" id="nom" placeholder="Entrer votre Nom">
                    </div>
                    <div class="form-group mt-2 mt-md-4 d-flex flex-column justify-content-center">
                        <label class="sr-only" for="prenom">Prenom</label>
                        <input type="text" name="prenom" class="login-input golden-btn h3" id="prenom" placeholder="Entrer votre Prenom">
                    </div>
                    <div class="form-group mt-2 mt-md-4 d-flex flex-column justify-content-center">
                        <label for="email" class="sr-only">Adresse Email</label>
                        <input type="email" name="login" class="login-input golden-btn h3" id="email" aria-describedby="emailHelp" placeholder="Adresse Email">
                        <small id="emailHelp" class="form-text text-muted">Votre email est securisée.</small>
                    </div>
                    <div class="form-group mt-2 mt-md-4 d-flex flex-column justify-content-center">
                        <label for="password" class="sr-only">Mots de passe</label>
                        <input type="password" name="pass" class="login-input golden-btn h3" id="password" placeholder="Mots de passe">
                    </div>
                    <div class="form-group mt-2 mt-md-4 d-flex flex-column justify-content-center">
                        <label for="password" class="sr-only">Confirmation du mot de passe :</label>
                        <input type="password" name="pass_confirm" class="login-input golden-btn h3" id="password" placeholder="Confirmation de mot de passe">
                    </div>

                    <div class="mt-2 mt-md-4">
                        <button type="submit" name="inscription" class="btn btn-outline-dark golden-btn rounded-pill">Connecter</button>
                    </div>
                </form>
            </div>

        </div>
        <img src="images/shapes.svg" class="login-relative-img1 position-absolute z-3 d-none d-lg-block">
    </div>
    <?php include(__DIR__ . '/footer.php') ?>
</div>