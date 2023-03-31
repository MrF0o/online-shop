<?php

include 'config.php';

if (isset($_GET['id'])) {
    $id = mysqli_escape_string($db, $_GET['id']);
    $sql = "SELECT * FROM article WHERE id=$id";
    $res = mysqli_query($db, $sql);

    $product = mysqli_fetch_assoc($res);

    if ($product) {
        $prod_id = $product['id'];
        $sql = "SELECT * FROM images WHERE article_id=$prod_id";
        $res = mysqli_query($db, $sql);

        $image = mysqli_fetch_assoc($res);

        // n7ou ../ mn awel chaine
        if (substr($image['path'], 0, strlen('../')) == '../') {
            $image['path'] = substr($image['path'], strlen('../'));
        }
    }
} else {
    header('Location: index.php');
}

?>

<?php include(__DIR__ . '/header.php') ?>

<div class="container mt-5">

    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card">
                <?php if (isset($image)) : ?>
                    <div class="">
                        <img class="product-image card-img-top" src="<?php echo $image['path'] ?>">
                    </div>
                <?php endif ?>
            </div>
        </div>
        <div class="col-md-4 d-flex flex-column mt-2 mt-md-0">
            <div class="title d-flex justify-content-between align-items-center">
                <h3><?php echo htmlentities($product['title']) ?></h3>
                <h3 class="">
                    <span class="badge badge-lg bg-light text-dark"><?php echo htmlentities($product['prix']) ?> DT</span>
                </h3>
            </div>
            <div>
                <h5 class="text-muted small pt-4">description</h5>
                <p><?php echo htmlentities($product['description']) ?></p>
            </div>
            <div class="mt-auto mx-auto">
                <button class="btn btn-lg add-to-cart btn-light">Ajouter au pannier</button>
                <button class="btn btn-lg add-to-cart btn-dark">Acheter maintenant</button>
            </div>
        </div>
    </div>

    <div class="row mt-5">
        <div class="d-flex flex-column align-items-center">
            <h3 class="h4">Tu peux aimer</h3>
            <div style="width: 60px; height: 3px;" class="bg-dark"></div>
        </div>
        <!-- TODO: produits similaire -->
    </div>

</div>

<?php include(__DIR__ . '/footer.php') ?>