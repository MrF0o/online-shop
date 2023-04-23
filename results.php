<?php include(__DIR__ . '/header.php') ?>

<div class="container mt-5">
    <div class="row">
        <aside class="col-md-2 d-none d-md-block position-fixed">
            <div>
                <div class="fw-semibold text-muted border-bottom py-1 m-1">Categories</div>
                <div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="check1">
                        <label class="form-check-label" for="check1">
                            Categorie 1
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="check2">
                        <label class="form-check-label" for="check2">
                            Categorie 2
                        </label>
                    </div>
                </div>
            </div>
            <div>
                <div class="fw-semibold text-muted border-bottom py-1 m-1">Rang de prix</div>
                <div>
                    <div class="">
                        <input type="range" class="form-range form-range-dark" id="customRange1">
                        <div class="py-1">
                            <span class="small">12 DT</span>
                            <span class="d-inline-block float-end">200 DT</span>
                        </div>
                    </div>
                </div>
            </div>
        </aside>

        <main class="col search-product-main">
            <div class="px-md-5">
                <div class="search-form-main">
                    <form action="" class="row">
                        <div class="col-10">
                            <input type="text" class="form-control w-100 h-100 py-3" id="search-main" placeholder="Bague ...">
                        </div>
                        <div class="col col-2">
                            <button type="submit" class="btn btn-dark w-100 h-100">
                                <i class="fa-solid fa-magnifying-glass"></i>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4 g-3 px-md-5">
                <div class="col">
                    <div class="card shadow border-0 h-100 product-card">
                        <img style="max-height: 12rem; object-fit: cover;" src="http://localhost/univ-ecom-website/images/upload/9674e914bfb9cf4ff79ftest-img-2.png" alt="abc" class="card-img-top">
                        <div class="card-body">
                            <h5 class="card-title">
                                <span>Lorem ipsum dolor sit</span>
                                <span class="m-2 badge badge-lg bg-dark d-block float-end mt-auto">45 DT</span>
                            </h5>
                        </div>
                        <div class="card-footer">
                            Category Name
                        </div>
                        <div class="overlay d-flex flex-column px-md-4 justify-content-center px-2 d-none">
                            <button class="btn btn-primary">Ajouter au Pannier</button>
                            <a href="#" class="btn btn-light mt-1">Afficher</a>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card shadow border-0 h-100 product-card">
                        <img style="max-height: 12rem; object-fit: cover;" src="http://localhost/univ-ecom-website/images/upload/a9fe52f398002edd70c7image.png" alt="abc" class="card-img-top">
                        <div class="card-body">
                            <h5 class="card-title">
                                <span>Lorem ipsum dolor sit amet.</span>
                                <span class="m-2 badge badge-lg bg-dark d-block float-end mt-auto">45 DT</span>
                            </h5>
                        </div>
                        <div class="card-footer">
                            Category Name
                        </div>
                        <div class="overlay d-flex flex-column px-md-4 justify-content-center px-2 d-none">
                            <button class="btn btn-primary">Ajouter au Pannier</button>
                            <a href="#" class="btn btn-light mt-1">Afficher</a>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card shadow border-0 h-100 product-card">
                        <img style="max-height: 12rem; object-fit: cover;" src="http://localhost/univ-ecom-website/images/upload/b543cfaf0e3baee7217ctest-img-4.png" alt="abc" class="card-img-top">
                        <div class="card-body">
                            <h5 class="card-title">
                                <span>Produit</span>
                                <span class="m-2 badge badge-lg bg-dark d-block float-end mt-auto">45 DT</span>
                            </h5>
                        </div>
                        <div class="card-footer">
                            Category Name
                        </div>
                        <div class="overlay d-flex flex-column px-md-4 justify-content-center px-2 d-none">
                            <button class="btn btn-primary">Ajouter au Pannier</button>
                            <a href="#" class="btn btn-light mt-1">Afficher</a>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card shadow border-0 h-100 product-card">
                        <img style="max-height: 12rem; object-fit: cover;" src="http://localhost/univ-ecom-website/images/upload/dbd5e0ad74471bf22c21test-img.png" alt="abc" class="card-img-top">
                        <div class="card-body">
                            <h5 class="card-title">
                                <span>Bague</span>
                                <span class="m-2 badge badge-lg bg-dark d-block float-end mt-auto">45 DT</span>
                            </h5>
                        </div>
                        <div class="card-footer">
                            Category Name
                        </div>
                        <div class="overlay d-flex flex-column px-md-4 justify-content-center px-2 d-none">
                            <button class="btn btn-primary">Ajouter au Pannier</button>
                            <a href="#" class="btn btn-light mt-1">Afficher</a>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</div>

<?php include(__DIR__ . '/footer.php') ?>