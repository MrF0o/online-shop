<?php

include 'config.php';

if (isset($_GET['category'])) {
    $cat_id = mysqli_escape_string($db, $_GET['category']);
    $sql = "SELECT * FROM categories WHERE id=$cat_id LIMIT 1";
    $res = mysqli_query($db, $sql);
    $category = mysqli_fetch_assoc($res);

    if ($category) {
        $title = $category['label'];
    } else {
        http_response_code(404);
        if (isset($_SERVER['HTTP_REFERER'])) {
            die('404 not found :(' . '<a href="' . $_SERVER['HTTP_REFERER'] . '"> < back </a>');
        } else {
            die('404 not found :(');
        }
    }

    $query1 = "SELECT * from article WHERE article.category_id=$cat_id ORDER BY id DESC";

    $images = [];

    $res = mysqli_query($db, $query1);
    $products = mysqli_fetch_all($res, MYSQLI_ASSOC);

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
} else {
    http_response_code(404);
    if (isset($_SERVER['HTTP_REFERER'])) {
        die('404 not found :(' . '<a href="' . $_SERVER['HTTP_REFERER'] . '"> < back </a>');
    } else {
        die('404 not found :(');
    }
}

?>

<?php include(__DIR__ . '/header.php') ?>

<div class="container mt-5">
    <div class="row">

        <main class="col">
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