<?php
if (!isset($_SESSION)) {
    session_start();
}

include 'config.php';

?>

<!DOCTYPE html>
<html lang="en" class="h-100">

<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Brand</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="style-dark.css?tt=<?php echo time() ?>">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Fraunces:wght@300;400;500;600;700;800&family=Italiana&display=swap" rel="stylesheet">


</head>

<body class="d-flex flex-column h-100 position-relative">

    <header class="header">
        <div class="container">
            <div class="row p-4 align-items-center">
                <div class="col-3">
                    <a href="cart.php">
                        <img src="images/icons/cart.svg" id="cart">
                    </a>
                    <a href="membre.php">
                        <img class="ms-5" src="images/icons/profile.svg" id="profile">
                    </a>
                </div>
                <div class="col d-flex flex-column justify-content-center align-items-center">
                    <div class="brand">
                        <a href="/<?php echo $dir ?>">Brand</a>
                    </div>
                    <div class="brand-desc">
                        Elegant Rings
                    </div>
                </div>
                <div class="col-3 d-flex justify-content-end align-items-center">
                    <img src="images/icons/search.svg" style="cursor: pointer;" id="search">
                </div>
            </div>

            <div class="row p-4 position-relative overflow-hidden">
                <nav class="w-100 d-flex justify-content-center">
                    <ul class="nav-list list-unstyled d-flex">
                        <li class="nav-item mx-3">
                            <a href="#">Homme</a>
                        </li>
                        <li class="nav-item mx-3">
                            <a href="#">Femme</a>
                        </li>
                        <li class="nav-item mx-3">
                            <a href="#">Mixtes</a>
                        </li>
                    </ul>
                </nav>
                <div class="search-form w-100 position-absolute d-flex">
                    <form action="results.php" method="GET">
                        <input type="text" class="search-input position-absolute p-4 h3 overflow-hidden text-white bg-dark-main" name="s" placeholder="Chercher notre catalogue" autocomplete="off">
                        <button type="submit" class="bg-dark-main search-btn text-dark-one position-absolute">
                            <i class="fa-solid fa-magnifying-glass h4"></i>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </header>