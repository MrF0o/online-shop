<?php

include 'config.php';

$query1 = "SELECT * from article ORDER BY RAND() LIMIT 4";
$query2 = "SELECT * from categories";

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
<div class="hero-wrapper">
    <div class="hero text-center">
        <h6>période limitée</h6>
        <h3>Profitez C'est L'occasion <br>
            Ou Jamais Ne Ratez Pas !</h3>

        <button class="btn btn-outline-primary rounded-pill btn-lg px-3 mt-4">Shop Now</button>
    </div>
</div>
<div class="container">
    <div class="row about d-flex justify-content-center p-5">
        <div class="col-6">
            <h3>Some big Title HERE we should convince them to buy</h3>
            <p>Repudiandae quidem dicta tenetur illo rerum eveniet veritatis sit mollitia perspiciatis autem,nisi libero commodi deleniti nemo quisquam amet consequatur accusamus harum.</p>
            <button class="btn btn-outline-primary rounded-pill btn-lg px-3 mt-4 text-uppercase">explorer</button>
        </div>
        <div class="col-6 d-flex justify-content-center">
            <img src="images/image-preview-1.png">
        </div>
    </div>
    <div class="row products justify-content-center align-content-center mt-5">
        <div class="row justify-content-center align-content-center">
            <div class="text-center">
                <h3 class="text-uppercase">à la mode maintenant</h3>
            </div>
        </div>
        <div class="row justify-content-center align-content-center gap-5 mt-3">

            <?php foreach ($products as $key => $prod) : ?>
                <div class="product-card col p-3 d-flex flex-column align-items-center">
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
        <div class="row justify-content-center align-content-center">
            <div class="text-center">
                <button class="btn btn-outline-primary rounded-pill btn-lg px-3 mt-4 text-uppercase golden-btn">Afficher tous</button>
            </div>
        </div>
    </div>
    <div class="row d-flex justify-content-center align-items-center mt-5">
        <div class="gallery-wrapper d-flex align-items-center justify-content-center">
            <div class="gallery-text text-center">
                <h2>Brand</h2>
                <h4>We Make Difference</h4>
            </div>
        </div>
        <div class="w-100 text-center mt-5">
            <button class="btn btn-outline-primary rounded-pill btn-lg px-3 mt-4 golden-btn text-uppercase">Afficher tous</button>
        </div>
    </div>
</div>

<?php include(__DIR__ . '/footer.php') ?>