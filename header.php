<?php
if (!isset($_SESSION)) {
    session_start();
}

?>

<!DOCTYPE html class="h-100">
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Brand</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="style.css?tt=<?php echo time() ?>">

</head>

<body class="d-flex flex-column h-100">
    <header class="p-2 bg-dark text-white">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark" aria-label="Fifth navbar example">
            <div class="container">
                <a class="navbar-brand" href="index.php">Brand</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExample05" aria-controls="navbarsExample05" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarsExample05">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#">Home</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="dropdown05" data-bs-toggle="dropdown" aria-expanded="false">Categories</a>
                            <ul class="dropdown-menu" aria-labelledby="dropdown05">
                                <li><a class="dropdown-item" href="#">bague femme</a></li>
                                <li><a class="dropdown-item" href="#">bague homme</a></li>
                                <li><a class="dropdown-item" href="#">bague personalisée</a></li>
                            </ul>
                        </li>
                    </ul>
                    <form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-5">
                        <input type="search" class="form-control form-control-dark" placeholder="Search..." aria-label="Search">
                    </form>

                    <a class="btn btn-lg me-2 btn-light position-relative me-5" href="cart.php">
                        <i class="fa-solid fa-cart-shopping"></i>
                        <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger d-" id="cart-count">
                            0
                            <span class="visually-hidden">Articles dans le pannier</span>
                        </span>

                    </a>

                    <?php if (isset($_SESSION['login'])) : ?>
                        <div class="dropdown">
                            <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fa-regular fa-user"></i>
                            </button>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="membre.php">Espace Membre</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li class="small"><a class="dropdown-item text-danger" href="logout.php">Déconnecter</a></li>
                            </ul>
                        </div>
                    <?php else : ?>
                        <div class="text-end">
                            <a href="login.php" class="btn btn-outline-light me-2">Connecter</a>
                            <a href="register.php" class="btn btn-warning">Créer un compte</a>
                        </div>
                    <?php endif ?>
                </div>
            </div>
        </nav>
    </header>