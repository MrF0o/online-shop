<?php
// -----------
// Pannier

// najmou nsta3mlou cookies ala 5atr hata utilisateur
// ma 3ndach compte ynajm ykoun 3nda pannier

if (isset($_GET['is_json'])) {
    // request jeya ml js kif yclicki ala button 'Ajouter au pannier'
    $old_cart = [
        'products' => array()
    ];

    if (isset($_COOKIE['cart'])) {
        $old_cart = json_decode($_COOKIE['cart'], true);
    }

    if (!in_array($_POST['product'], $old_cart['products'])) {
        array_push($old_cart['products'], $_POST['product']);
        setcookie('cart', json_encode($old_cart), time() + 3600);
    }


    header('Content-Type: application/json');
    echo json_encode($old_cart);
    exit; // mouch lazem HTML 5atr deja handled 
}
?>

<?php include(__DIR__ . '/header.php') ?>

<main class="container mt-5">
    <div class="row justify-content-center">

        <h4>Votre Pannier</h4>

        <div class="row gap-3">
            <div class="card col">
                <div class="card-body">

                    <div class="table-responsive ">
                        <table class="table table-hover">
                            <thead>
                                <th class="col">-</th>
                                <th class="col">Produit</th>
                                <th class="col">Prix</th>
                                <th class="col">Quatité</th>
                                <th class="col">Supprimer</th>
                            </thead>
                            <tbody>
                                <tr class="">
                                    <td scope="row"><img height="50px" src="http://localhost/univ-ecom-website/images/upload/9674e914bfb9cf4ff79ftest-img-2.png"></td>
                                    <td scope="row">
                                        <div class="row align-items-center">
                                            <div class="col-auto">
                                                <h6 class="text-dark my-auto">Test Produit</h6>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <p>120 DT</p>
                                    </td>
                                    <td>
                                        <input type="number" value="1" class="form-control">
                                    </td>
                                    <td>
                                        <button class="btn btn-danger">
                                            <i class="fa-regular fa-trash-can"></i>
                                        </button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
            <div class="card col-md-4">
                <div class="card-body">
                    <div>
                        <h5>Nom d'utilisateur</h5>
                    </div>
                    <small class="fw-semibold">Adresse</small>
                    <div class="py-2">
                        <p>Addresse ligne 1 <br> Gabes 6000 Some place</p>
                    </div>
                    <div>
                        <a class="btn btn-success w-100 btn-lg" href="#">Passer la commande</a>
                    </div>
                </div>
            </div>
        </div>

    </div>
</main>

<?php include(__DIR__ . '/footer.php') ?>