<?php
// -----------
// Pannier

include 'config.php';

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
} else {

    function rmPrefix($str)
    {
        // n7ou ../ mn awel chaine
        if (substr($str, 0, strlen('../')) == '../') {
            $str = substr($str, strlen('../'));
        }

        return $str;
    }

    if (isset($_COOKIE['cart'])) {
        $cart = json_decode($_COOKIE['cart']);
        $IDs = implode(',', array_map('intval', $cart->products));
        $sql = "SELECT article.*, images.path FROM article INNER JOIN images ON images.article_id=article.id WHERE article.id IN ($IDs)";
        $res = mysqli_query($db, $sql);

        $products = mysqli_fetch_all($res, MYSQLI_ASSOC);

        $products =  array_map(function ($p) {
            $p['path'] = rmPrefix($p['path']);
            return $p;
        }, $products);
    }
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
                                <?php if (isset($products)) : ?>
                                    <?php foreach ($products as $p) : ?>
                                        <tr class="">
                                            <td scope="row"><img height="50px" src="<?php echo $p['path'] ?>"></td>
                                            <td scope="row">
                                                <div class="row align-items-center">
                                                    <div class="col-auto">
                                                        <h6 class="text-dark my-auto"><?php echo $p['title'] ?></h6>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <p><?php echo $p['prix'] ?> DT</p>
                                            </td>
                                            <td>
                                                <input type="number" value="1" class="form-control">
                                            </td>
                                            <td>
                                                <button class="btn btn-danger" onclick="delCartItem(<?php echo $p['id'] ?>)">
                                                    <i class="fa-regular fa-trash-can"></i>
                                                </button>
                                            </td>
                                        </tr>
                                    <?php endforeach ?>
                                <?php endif ?>
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
            <div class="card col-md-4">
                <!-- baad tw njibou l'adresse courante mta client -->
                <div class="card-body">
                    <div>
                        <h5>Nom d'utilisateur</h5>
                    </div>
                    <small class="fw-semibold">Adresse</small>
                    <div class="py-2">
                        <p>Addresse ligne 1 <br> Gabes 6000 Some place</p>
                    </div>
                    <div>
                        <a class="btn btn-success w-100 btn-lg" href="create-cmd.php">Passer la commande</a>
                    </div>
                </div>
            </div>
        </div>

    </div>
</main>

<?php include(__DIR__ . '/footer.php') ?>