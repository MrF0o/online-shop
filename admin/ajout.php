<?php

if (!isset($_SESSION)) {
    session_start();
}

// ken mch logged in redirecti lel login
if (isset($_SESSION['login']) && isset($_SESSION['is_admin'])) {
} else {
    header('Location: login.php');
}


// lehne nest3mlou $_GET bech n3rfou anahi haja bech yajoutiha
?>

<?php include 'header.php' ?>
<?php include 'sidebar.php' ?>

<main class="main-wrapper">
    <?php include 'navbar.php' ?>
    <div class="container mt-3">
        <?php if ($_GET['type'] == 'produit') : ?>

            <h3>Ajouter un produit</h3>

        <?php endif ?>

        <?php if ($_GET['type'] == 'categorie') : ?>

            <h4>Ajouter une Categorie</h4>

        <?php endif ?>
    </div>
</main>

<?php include 'footer.php' ?>