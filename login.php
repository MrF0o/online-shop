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

                    <div class="mt-2 mt-md-4">
                        <button type="submit" name="connecter" class="btn btn-outline-dark golden-btn rounded-pill">Connecter</button>
                    </div>
                </form>
            </div>

        </div>
        <img src="images/shapes.svg" class="login-relative-img1 position-absolute z-3 d-none d-lg-block">
    </div>
    <?php include(__DIR__ . '/footer.php') ?>
</div>

<?php die ?>

<div class="container d-flex h-100 justify-content-center align-items-center">
    <div class="col col-md-5 bg-light p-4 rounded shadow">
        <?php if (isset($erreur)) : ?>
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