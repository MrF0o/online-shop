<?php
if (!isset($_SESSION)) {
    session_start();
}

include 'config.php';

if (isset($_POST['connecter'])) {
    if (!empty($_POST['login']) && !empty($_POST['pass'])) {
        $email = mysqli_escape_string($db, $_POST['login']);
        $pass = mysqli_escape_string($db, md5($_POST['pass']));

        $sql = "SELECT * FROM clients WHERE email='$email' AND password='$pass'";
        $res = mysqli_query($db, $sql);

        if (mysqli_num_rows($res) > 0) {
            $membre = mysqli_fetch_assoc($res);

            $_SESSION['login'] = $email;
            header('Location: membre.php');
            exit();
        } else {
            $erreur = "veuillez vérifier votre e-mail ou mot de passe ou <a href=\"register.php\">créer un compte</a>";
        }
    } else {
        $erreur = 'Au moins un des champs obligatoire est vide.';
    }
}
?>

<?php include(__DIR__ . '/header.php') ?>

<div class="container d-flex h-100 justify-content-center align-items-center">
    <div class="col col-md-5 bg-light p-4 rounded shadow">
        <?php if (isset($erreur)): ?>
        <div class="alert alert-danger">
            <?php
            echo $erreur;
            ?>
        </div>
        <?php endif ?>
        <h4>Connecter a votre compte</h4>
        <form action="" method="POST">
            <div class="form-group">
                <label for="email">Adresse Email</label>
                <input type="email" name="login" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Enter email">
                <small id="emailHelp" class="form-text text-muted">Votre email est securisée.</small>
            </div>
            <div class="form-group">
                <label for="password">Mots de passe</label>
                <input type="password" name="pass" class="form-control" id="password" placeholder="Password">
            </div>

            <div class="mt-2">
                <button type="submit" name="connecter" class="btn btn-outline-dark">Connecter</button>
            </div>
        </form>
    </div>
</div>

<?php include(__DIR__ . '/footer.php') ?>