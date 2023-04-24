<?php
if (!isset($_SESSION)) {
    session_start();
}

include 'config.php';

if (isset($_SESSION['login'])) {
    if (isset($_SERVER['HTTP_REFERER'])) {
        // redirect back
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    } else {
        header('Location: membre.php');
    }
}


if (isset($_POST['continue']) && !empty($_POST['continue'])) {
    $redirect = "cart.php";
} else {
    $redirect = "index.php";
}

if (isset($_POST['connecter'])) {
    if (!empty($_POST['login']) && !empty($_POST['pass'])) {
        $email = mysqli_escape_string($db, $_POST['login']);
        $pass = mysqli_escape_string($db, md5($_POST['pass']));

        $sql = "SELECT * FROM clients WHERE email='$email' AND password='$pass'";
        $res = mysqli_query($db, $sql);

        if (mysqli_num_rows($res) > 0) {
            $membre = mysqli_fetch_assoc($res);

            $_SESSION['login'] = $email;

            header('Location: ' . $redirect);
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

<div class="container position-relative ">
    <div class="wrapper d-flex justify-content-center mt-5 mb-5 overflow-hidden">
        <div class="login-form col-md-7">
            <div class="h1">
                <span class="text-golden">Bonjour,</span> <span>Vous pouvez connecter à <br> votre compte</span>
            </div>

            <div class="mt-5">
                <form action="" method="POST">
                    <div class="form-group mt-2 mt-md-4 d-flex flex-column justify-content-center">
                        <label for="email" class="sr-only">Adresse Email</label>
                        <input type="email" name="login" class="login-input golden-btn h3" id="email" aria-describedby="emailHelp" placeholder="Adresse Email">
                        <small id="emailHelp" class="form-text text-muted">Votre email est securisée.</small>
                    </div>
                    <div class="form-group mt-2 mt-md-4 d-flex flex-column justify-content-center">
                        <label for="password" class="sr-only">Mots de passe</label>
                        <input type="password" name="pass" class="login-input golden-btn h3" id="password" placeholder="Mots de passe">
                    </div>
                    <input type="text" value="<?php isset($msg) ? print('true') : print('') ?>" hidden name="continue">

                    <div class="mt-2 mt-md-4">
                        <button type="submit" name="connecter" class="btn btn-outline-dark golden-btn rounded-pill">Connecter</button>
                    </div>
                </form>
                <?php if (isset($msg)) : ?>
                    <div class="py-2">
                        <?php echo $msg ?>
                    </div>
                <?php endif ?>
            </div>

        </div>
        <img src="images/shapes.svg" class="login-relative-img1 position-absolute z-3 d-none d-lg-block">
    </div>
    <?php include(__DIR__ . '/footer.php') ?>
</div>