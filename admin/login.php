<?php
if (!isset($_SESSION)) {
    session_start();
}

// ken deja logged in redirecti lel dashboard
if (isset($_SESSION['is_admin'])) {
    header('Location: dashboard.php');
}

include '../config.php';

if (isset($_POST['connecter'])) {
    if (!empty($_POST['login']) && !empty($_POST['pass'])) {
        $user = mysqli_escape_string($db, $_POST['login']);
        $pass = mysqli_escape_string($db, md5($_POST['pass']));

        $sql = "SELECT * FROM admins WHERE username='$user' AND password='$pass'";
        $res = mysqli_query($db, $sql);

        if (mysqli_num_rows($res) > 0) {
            $membre = mysqli_fetch_assoc($res);

            $_SESSION['is_admin'] = $user;
            header('Location: dashboard.php');
            exit();
        } else {
            $erreur = "veuillez vérifier votre username ou mot de passe";
        }
    } else {
        $erreur = 'Au moins un des champs obligatoire est vide.';
    }
}

?>

<?php include 'header.php' ?>

<main class="container-md container-fluid">

    <!-- ========== signin-section start ========== -->
    <section class="signin-section">
        <div class="container-fluid">
            <!-- ========== title-wrapper start ========== -->
            <div class="title-wrapper pt-30">
                <div class="row align-items-center">
                    <div class="col-md-6">
                        <div class="title mb-30">
                            <h2>Sign in</h2>
                        </div>
                    </div>

                </div>
                <!-- end row -->
            </div>
            <!-- ========== title-wrapper end ========== -->

            <div class="row g-0 auth-row">
                <div class="col-lg-6">
                    <div class="auth-cover-wrapper bg-primary-100">
                        <div class="auth-cover">
                            <div class="title text-center">
                                <h1 class="text-primary mb-10">Bonjour!</h1>
                                <p class="text-medium">
                                    Connectez-vous à votre compte pour continuer
                                </p>
                            </div>
                            <div class="cover-image">
                                <img src="assets/images/auth/signin-image.svg" alt="" />
                            </div>
                            <div class="shape-image">
                                <img src="assets/images/auth/shape.svg" alt="" />
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end col -->
                <div class="col-lg-6">
                    <div class="signin-wrapper">
                        <div class="form-wrapper">
                            <h6 class="mb-15">Login</h6>
                            <p class="text-sm mb-25">
                                L'administrateur doit être créé manuellement pour des raisons de sécurité
                                <span>
                                    username: <b>admin</b>,
                                    password: <b>111</b>
                                </span>
                            </p>
                            <?php if (isset($erreur)) : ?>
                                <div>
                                    <span class="alert alert-danger">
                                        <?php echo $erreur ?>
                                    </span>
                                </div>
                            <?php endif ?>
                            <form action="" method="POST">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="input-style-1">
                                            <label>Username</label>
                                            <input type="text" placeholder="Username" name="login" />
                                        </div>
                                    </div>
                                    <!-- end col -->
                                    <div class="col-12">
                                        <div class="input-style-1">
                                            <label>Password</label>
                                            <input type="password" placeholder="Password" name="pass" />
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <div class="
                            button-group
                            d-flex
                            justify-content-center
                            flex-wrap
                          ">
                                            <button type="submit" name="connecter" class="
                              main-btn
                              primary-btn
                              btn-hover
                              w-100
                              text-center
                            ">
                                                Submit
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <!-- end row -->
                            </form>
                        </div>
                    </div>
                </div>
                <!-- end col -->
            </div>
            <!-- end row -->
        </div>
    </section>
    <!-- ========== signin-section end ========== -->

    <!-- ========== footer start =========== -->
    <footer class="footer">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6 order-last order-md-first">
                    <div class="copyright text-center text-md-start">
                        <p class="text-sm">
                            Designed and Developed by
                            <a href="https://plainadmin.com" rel="nofollow" target="_blank">
                                PlainAdmin
                            </a>
                        </p>
                    </div>
                </div>
                <!-- end col-->
                <div class="col-md-6">
                    <div class="
                  terms
                  d-flex
                  justify-content-center justify-content-md-end
                ">

                    </div>
                </div>
            </div>
            <!-- end row -->
        </div>
        <!-- end container -->
    </footer>
    <!-- ========== footer end =========== -->
</main>

<?php include 'footer.php' ?>