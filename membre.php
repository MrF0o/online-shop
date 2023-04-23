<?php
if (!isset($_SESSION)) {
    session_start();
}

include 'config.php';

if (isset($_SESSION['login'])) {
    $email = $_SESSION['login'];
    // ani 3melt 8alta fl phpmyadmin f 3oudh na3ml first_name ktabt frst_name
    $sql = "SELECT * FROM clients WHERE email='$email'";
    $res = mysqli_query($db, $sql);
    $membre = mysqli_fetch_assoc($res);

    if (isset($_POST['update'])) {
        if (!empty($_POST['login']) && !empty($_POST['pass_act']) && !empty($_POST['nom']) && !empty($_POST['prenom'])) {
            $email = mysqli_escape_string($db, $_POST['login']);
            $old_pass = mysqli_escape_string($db, md5($_POST['pass_act']));
            $new_pass = empty($_POST['pass']) ? $old_pass : mysqli_escape_string($db, md5($_POST['pass']));
            $nom = mysqli_escape_string($db, $_POST['nom']);
            $prenom = mysqli_escape_string($db, $_POST['prenom']);


            // ken mdp actuel shih
            if ($old_pass == $membre['password']) {
                // w kn email deja mch 3nd wahed a5er w mch nafs client
                $sql = 'SELECT count(*) FROM clients WHERE email="' . $email . '" AND password!="' . $membre['password'] . '"';
                $req = mysqli_query($db, $sql) or die('Erreur SQL !<br />' . $sql . '<br />' . mysqli_error($db));
                $data = mysqli_fetch_array($req);

                if ($data[0] == 0) {
                    $sql = "UPDATE clients SET frst_name='$prenom', last_name='$nom', email='$email', password='$new_pass'";
                    $req = mysqli_query($db, $sql) or die('Erreur SQL !<br />' . $sql . '<br />' . mysqli_error($db));
                    header('Location: membre.php');
                } else {
                    $erreur = 'Un membre possède déjà ce email.';
                }
            }
        } else {
            $erreur = 'Au moins un des champs obligatoire est vide.';
        }
    }
} else {
    header('Location: index.php');
}

?>

<?php include 'header.php' ?>

<?php // include 'footer.php' ?>



<?php //die ?>

<div class="container">
    <div class="row mt-5">
        <div class="col-lg-4 mb-5">
            <?php if (isset($erreur)) : ?>
                <div class="alert alert-danger">
                    <?php
                    echo $erreur;
                    ?>
                </div>
            <?php endif ?>
            <div class="">
                <div class="h1">
                    Bonjour, <?php echo $membre['frst_name'] ?>!
                </div>
                <div class="h5">Vous pouvez modifier vos informations ici</div>
            </div>
            <div class="mt-5">
                <h5 class="text-dark-one">Votre adresse</h5>
                <div class="card bg-dark-main shadow w-100">
                    <div class="card-body text-white">
                        <div>
                            <span>Votre adresse est vide!</span>
                        </div>
                        <div class="d-flex justify-content-end">
                            <a class="d-block" href="modif-adresse.php">modifier</a>
                        </div>
                    </div>
                </div>
                <h5 class="mt-5 text-dark-one">Autres informations</h5>
                <div class="card w-100 text-white bg-dark-main">
                    <div class="card-body">
                        <form action="#" method="POST">
                            <div class="form-group">
                                <label for="nom" class="text-dark-one">Nom:</label>
                                <input type="text" name="nom" value="<?php echo htmlentities($membre['last_name']) ?>" class="form-control golden-input" id="nom" placeholder="Entrer votre Nom">
                            </div>
                            <div class="form-group mt-2">
                                <label for="prenom" class="text-dark-one">Prenom:</label>
                                <input type="text" name="prenom" value="<?php echo htmlentities($membre['frst_name']) ?>" class="form-control golden-input" id="prenom" placeholder="Entrer votre Prenom">
                            </div>
                            <div class="form-group mt-2">
                                <label for="login" class="text-dark-one">Adresse E-mail:</label>
                                <input type="email" name="login" value="<?php echo htmlentities($membre['email']) ?>" class="form-control golden-input" id="login" placeholder="Entrer votre E-mail">
                            </div>
                            <div class="form-group mt-2">
                                <label for="password" class="text-dark-one">Mot de passe :</label>
                                <input type="pass" name="pass" class="form-control golden-input" id="password" placeholder="Entrer un mot de passe">
                            </div>

                            <hr>
                            <div class="form-group">
                                <label for="password" class="text-dark-one">Mot de passe actuel:</label>
                                <input type="pass" name="pass_act" class="form-control golden-input" id="password" placeholder="">
                            </div>

                            <div class="mt-2">
                                <button type="submit" name="update" class="btn btn-outline-dark golden-btn">Enregistrer</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="col d-none d-lg-flex justify-content-center align-items-center opacity-50">
            <img src="images/shopping-cart.svg" class="w-75" alt>
        </div>
    </div>
</div>

<?php include 'footer.php' ?>