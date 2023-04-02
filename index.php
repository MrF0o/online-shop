<?php

include 'config.php';

$query1 = "SELECT * from article ORDER BY RAND() LIMIT 4";
$query2 = "SELECT * from categories";

$images = [];

$res = mysqli_query($db, $query1);
$products = mysqli_fetch_all($res, MYSQLI_ASSOC);

$res = mysqli_query($db, $query2);
$categories = mysqli_fetch_all($res, MYSQLI_ASSOC);

foreach($products as $prod) {
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

<div class="hero">
    <div class="jumbotron jumbotron-fluid">
        <div class="container d-flex h-100 flex-column justify-content-center">
            <div>
                <h1 class="display-3 fw-bold text-capitalize">profitez c'est l'occasion ou jamais ne ratez pas !</h1>
                <p class="fw-normal"> Repudiandae quidem dicta tenetur illo rerum eveniet veritatis sit mollitia perspiciatis autem,<br> nisi libero commodi deleniti nemo quisquam amet consequatur accusamus harum.</p>
                <button class="btn btn-lg btn-outline-light">Shop Now</button>
            </div>
        </div>
    </div>
</div>

<div class="container mt-5 d-flex flex-column align-items-center">
    <!-- <div id="featuredProductsIndicator" class="carousel slide col-md-6 shadow" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#featuredProductsIndicator" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Product 1"></button>
            <button type="button" data-bs-target="#featuredProductsIndicator" data-bs-slide-to="1" aria-label="Product 2"></button>
            <button type="button" data-bs-target="#featuredProductsIndicator" data-bs-slide-to="2" aria-label="Product 4"></button>
        </div>
        <div class="carousel-inner rounded">
            <div class="carousel-item active">
                <div class="">

                    <img class="slider-img" src="images/image.png">

                </div>
            </div>
            <div class="carousel-item">
                <div class="d-flex justify-content-center align-items-center">
                    <div class="d-flex justify-content-center align-items-center">

                        <img class="slider-img" src="images/2.png">

                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <div class="d-flex justify-content-center align-items-center">
                    <div class="bg-secondary d-flex justify-content-center align-items-center">

                        <img class="slider-img" src="images/3.png">

                    </div>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev rounded" type="button" data-bs-target="#featuredProductsIndicator" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next rounded" type="button" data-bs-target="#featuredProductsIndicator" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div> -->

    <div class="products card mt-5 w-100">
        <div class="products-header card-header">
            <h4 class="h4 fw-4">Nos séléctions</h4>
        </div>
        <div class="card-body row gap-3">
            <?php foreach($products as $key => $prod): ?>
            <div class="card col-12 col-md w-100 p-0" style="width:18rem;">
                <a href="product.php?id=<?php echo $prod['id'] ?>"><img style="max-height:16rem;object-fit:cover" src="<?php echo $images[$key] ?>" class="card-img-top"></a>
                <div class="card-body">
                    <h3 class="fs-4 fw-4 text-center card-title"><a class="text-decoration-none text-dark" href="product.php?id=<?php echo $prod['id'] ?>"><?php echo htmlentities($prod['title']) ?></a></h3>
                    <div class="text-center">
                        <!-- <span class="text-decoration-line-through">230DT</span> -->
                        <span style="font-weight:500"><?php echo htmlentities($prod['prix']) ?> DT</span>
                    </div>
                    <div class="pt-4 text-center">
                        <button class="btn btn-outline-dark" onclick="addToCart(<?php echo $prod['id'] ?>)">Ajouter au pannier</button>
                    </div>
                </div>
            </div>
            <?php endforeach ?>
        </div>
        <div class="d-flex justify-content-center">
            <a href="#" class="btn btn-outline-dark m-2">Afficher tous</a>
        </div>
    </div>

    <div class="about w-100 row justify-content-center my-5">
        <div class="row">
            <div class="col-12 col-md-6">
                <div class="col-12 col-md-8 col-lg-7">
                    <h4>Qui sommes-nous ?</h4>
                </div>
                <div class="d-flex bg-light rounded shadow flex-column flex-md-row">
                    <div class="p-2 d-flex d-md-block justify-content-center">
                        <div class="my-md-2 mx-2 p-1 text-center fs-5 hover-icon "><a href="#"><i class="fab fa-facebook text-dark"></i></a></div>
                        <div class="my-md-2 mx-2 p-1 text-center fs-5 hover-icon"><a href="#"><i class="fab fa-instagram text-dark"></i></a></div>
                        <div class="my-md-2 mx-2 p-1 text-center fs-5 hover-icon"><a href="#"><i class="fab fa-whatsapp text-dark"></i></a></div>
                        <div class="my-md-2 mx-2 p-1 text-center fs-5 hover-icon"><a href="#"><i class="fab fa-youtube text-dark"></i></a></div>
                    </div>
                    <div class="p-2">
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Corporis a ducimus quis odit natus praesentium corrupti iure, voluptate tempora modi blanditiis perferendis numquam id sint earum mollitia aliquid quam! Temporibus?</p>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Corporis a ducimus quis odit natus praesentium corrupti iure, voluptate tempora modi blanditiis perferendis numquam id sint earum mollitia aliquid quam! Temporibus?</p>
                    </div>
                </div>
            </div>
            <div class="d-flex col-12 col-md-6 flex-column justify-content-start">
                <div class="fw-semibold py-3 text-uppercase">
                    Nous Acceptons
                </div>
                <div class="payments d-flex">
                    <div class="visa m-1 ml-0"></div>
                    <div class="mastercard m-1"></div>
                    <div class="amex m-1"></div>
                    <div class="discover m-1"></div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include(__DIR__ . '/footer.php') ?>