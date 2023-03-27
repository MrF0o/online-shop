<?php include(__DIR__ . '/header.php') ?>

<div class="container mt-5 d-flex flex-column align-items-center">
    <div id="featuredProductsIndicator" class="carousel slide col-md-10 col-lg-12  col-12" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#featuredProductsIndicator" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Product 1"></button>
            <button type="button" data-bs-target="#featuredProductsIndicator" data-bs-slide-to="1" aria-label="Product 2"></button>
            <button type="button" data-bs-target="#featuredProductsIndicator" data-bs-slide-to="2" aria-label="Product 4"></button>
        </div>
        <div class="carousel-inner rounded shadow">
            <div class="carousel-item active">
                <div class="bg-secondary d-flex justify-content-center align-items-center">

                    <div class="slide-content"></div>

                </div>
            </div>
            <div class="carousel-item">
                <div class="bg-secondary d-flex justify-content-center align-items-center">
                    <p class="text-white h4 py-5">nchlh njibou taswira article 2 lhne </p>
                </div>
            </div>
            <div class="carousel-item">
                <div class="bg-secondary d-flex justify-content-center align-items-center">
                    <p class="text-white h4 py-5">nchlh njibou taswira article 3 lhne </p>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#featuredProductsIndicator" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#featuredProductsIndicator" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>

    <div class="products card mt-5">
        <div class="products-header card-header">
            <h4 class="h4 fw-4">Nos séléctions</h4>
        </div>
        <div class="card-body row gap-3">
            <div class="card col-12 col-md w-100 p-0" style="width:18rem;">
                <img style="max-height:16rem;object-fit:cover" src="./images/1.png" class="card-img-top">
                <div class="card-body">
                    <h3 class="fs-4 fw-4 text-center card-title">test produit</h3>
                    <div class="text-center">
                        <span class="text-decoration-line-through">230DT</span>
                        <span style="font-weight:500">230DT</span>
                    </div>
                    <div class="pt-4 text-center">
                        <button class="btn btn-outline-dark">Ajouter au pannier</button>
                    </div>
                </div>
            </div>
            <div class="card col-12 col-md w-100 p-0">
                <img style="max-height:16rem;object-fit:cover" src="./images/2.png" class="card-img-top">
                <div class="card-body">
                    <h3 class="fs-4 fw-4 text-center card-title">test produit</h3>
                    <div class="text-center">
                        <span class="text-decoration-line-through">230DT</span>
                        <span style="font-weight:500">230DT</span>
                    </div>
                    <div class="pt-4 text-center">
                        <button class="btn btn-outline-dark">Ajouter au pannier</button>
                    </div>
                </div>
            </div>


            <div class="card col-12 col-md w-100 p-0" style="width:18rem;">
                <img style="max-height:16rem;object-fit:cover" src="./images/3.png" class="card-img-top" style alt="...">
                <div class="card-body">
                    <h3 class="fs-4 fw-4 text-center card-title">test produit</h3>
                    <div class="text-center">
                        <span class="text-decoration-line-through">230DT</span>
                        <span style="font-weight:500">230DT</span>
                    </div>
                    <div class="pt-4 text-center">
                        <button class="btn btn-outline-dark">Ajouter au pannier</button>
                    </div>
                </div>
            </div>

            <div class="card col-12 col-md w-100 p-0" style="width:18rem;">
                <img style="max-height:16rem;object-fit:cover" src="./images/4.png" class="card-img-top" style alt="...">
                <div class="card-body">
                    <h3 class="fs-4 fw-4 text-center card-title">test produit</h3>
                    <div class="text-center">
                        <span class="text-decoration-line-through">230DT</span>
                        <span style="font-weight:500">230DT</span>
                    </div>
                    <div class="pt-4 text-center">
                        <button class="btn btn-outline-dark">Ajouter au pannier</button>
                    </div>
                </div>
            </div>

            <div class="card col-12 col-md w-100 p-0" style="width:18rem;">
                <img style="max-height:16rem;object-fit:cover" src="./images/1.png" class="card-img-top" style alt="...">
                <div class="card-body">
                    <h3 class="fs-4 fw-4 text-center card-title">test produit</h3>
                    <div class="text-center">
                        <span class="text-decoration-line-through">230DT</span>
                        <span style="font-weight:500">230DT</span>
                    </div>
                    <div class="pt-4 text-center">
                        <button class="btn btn-outline-dark">Ajouter au pannier</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="about row justify-content-center my-5 p-3">
        <div class="col-12 col-md-8 col-lg-7">
            <h4>Qui sommes-nous ?</h4>
        </div>
        <div class="d-flex bg-light col-12 col-md-8 col-lg-7 rounded shadow flex-column flex-md-row">
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
</div>

<?php include(__DIR__ . '/footer.php') ?>