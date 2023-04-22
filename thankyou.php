<?php include('config.php') ?>

<?php include(__DIR__ . '/header.php') ?>

<div class="container mt-5">
    <h3 class="alert alert-golden">Votre commande a été créé avec succé</h3>
    <div class="text-center mt-5">
        <a href="/<?php echo $dir ?>" class="home-link p-3 text-white">
            <i class="fa-solid  fa-arrow-left"></i>
            <span>retourner au page d'accueil</span>
        </a>
    </div>
</div>

<?php include 'footer.php' ?>