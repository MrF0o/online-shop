<?php

include 'config.php';

$title = "Notre Catalogue";

$query1 = "SELECT * from article ORDER BY id DESC";
$query2 = "SELECT * from categories";

if (isset($_GET['s'])) {
    $search_query = mysqli_escape_string($db, $_GET['s']);
    $title = "les résultats pour: " . htmlentities($search_query);
    $query1 = "SELECT * from article WHERE title LIKE '%$search_query%' ORDER BY id DESC";
}


/// filtre


$images = [];

$res = mysqli_query($db, $query1);
$products = mysqli_fetch_all($res, MYSQLI_ASSOC);

$res = mysqli_query($db, $query2);
$categories = mysqli_fetch_all($res, MYSQLI_ASSOC);

foreach ($products as $prod) {
    $q = 'SELECT path FROM images WHERE article_id=' . $prod['id'];
    $res = mysqli_query($db, $q);
    $path = mysqli_fetch_column($res);
    // n7ou ../ mn awel chaine
    if (substr($path, 0, strlen('../')) == '../') {
        $path = substr($path, strlen('../'));
    }

    array_push($images, $path);
}
?>

<?php include(__DIR__ . '/header.php') ?>

<div class="container mt-5">
    <div class="row">
        <aside class="col-md-2 d-none d-md-block position-fixed">
            <div>
                <div class="fw-semibold text-muted py-1 m-1">Categories</div>
                <hr>    
                <div>
                    <?php foreach ($categories as $c) : ?>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="check1">
                            <label class="form-check-label" for="check1">
                                <?php echo $c['label'] ?>
                            </label>
                        </div>
                    <?php endforeach ?>
                </div>
            </div>
        </aside>

        <main class="col search-product-main">
            <div class="results-for row row-cols-1 row-cols-md-2 row-cols-lg-4 g-3 px-md-5">
                <h3 class="w-100"><?php echo $title ?></h3>
            </div>
            <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4 g-3 px-md-5">

                <?php foreach ($products as $key => $prod) : ?>
                    <div class="product-card p-3 d-flex flex-column align-items-center">
                        <div class="product-thumb">
                            <img src="<?php echo $images[$key] ?>" alt="">
                        </div>

                        <div class="product-title text-center p-2">
                            <h5><?php echo htmlentities($prod['title']) ?></h5>
                        </div>

                        <div class="product-price-span text-center">
                            <span style="font-weight:500"><?php echo htmlentities($prod['prix']) ?> DT</span>
                        </div>

                        <div class="overlay d-none pt-4 text-center">
                            <div class="h-100 w-100 d-flex flex-column justify-content-center">
                                <button class="btn bg-dark-main golden-btn" onclick="addToCart(<?php echo $prod['id'] ?>)">Ajouter au pannier</button>
                                <a href="product.php?id=<?php echo $prod['id'] ?>" class="mt-1 btn bg-dark-main golden-btn">Details</a>
                            </div>
                        </div>
                    </div>
                <?php endforeach ?>
            </div>
        </main>
    </div>
</div>

<?php include(__DIR__ . '/footer.php') ?>