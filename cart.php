<?php
// -----------
// Pannier: Concept
// Chaque fois que l'utilisateur clique sur le bouton "ajouter au panier",
// une fonction JavaScript est appelée, qui enverra une requête POST à ce fichier en utilisant Jquery ajax.
// Si le produit est déjà dans le panier, la quantité sera simplement augmentée de 1,
// sinon une nouvelle entrée sera ajoutée au tableau de produits. Tout cela est réalisé à l'aide de cookies.
// -----------

if (!isset($_SESSION)) {
    session_start();
}

include 'config.php';
include 'functions.php';

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

    if ($_POST['action'] == 'getCartCount') {
        header('Content-Type: application/json');
        echo json_encode([
            'count' => count($old_cart['products'])
        ]);
        exit; // mouch lazem HTML 5atr deja handled 
    }

    if ($_POST['action'] == 'addToCart') {

        $prod = findObjectById($_POST['product'], $old_cart['products']);

        if ($prod == -1) {
            array_push($old_cart['products'], [
                'id' => $_POST['product'],
                'quantity' => $_POST['quantity']
            ]);
        } else {
            $old_cart['products'][$prod] = [
                'id' => $old_cart['products'][$prod]['id'],
                'quantity' => $_POST['quantity']
            ];
        }

        setcookie('cart', json_encode($old_cart), time() + 3600);

        header('Content-Type: application/json');
        echo json_encode($old_cart);
        exit; // mouch lazem HTML 5atr deja handled 
    }

    if ($_POST['action'] == 'delCartItem') {

        $prod = findObjectById($_POST['product'], $old_cart['products']);

        if ($prod > -1) {
            unset($old_cart['products'][$prod]);
            setcookie('cart', json_encode($old_cart), time() + 3600);
        }


        header('Content-Type: application/json');
        echo json_encode($old_cart);
        exit; // mouch lazem HTML 5atr deja handled 
    }
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
        $cart = json_decode($_COOKIE['cart'], true);
        if (count($cart['products'])) {
            $IDs = implode(',', array_map(function ($p) {
                return intval($p['id']);
            }, $cart['products']));

            $sql = "SELECT article.*, images.path FROM article INNER JOIN images ON images.article_id=article.id WHERE article.id IN ($IDs)";
            $res = mysqli_query($db, $sql);

            $products = mysqli_fetch_all($res, MYSQLI_ASSOC);
            $total = 0;

            $products =  array_map(function ($p) use ($cart) {
                global $total;
                $p['path'] = rmPrefix($p['path']);
                $total += (int)$p['prix'] * (int)($cart['products'][findObjectById($p['id'], $cart['products'])]['quantity']);
                return $p;
            }, $products);
        }
    }


    
    $email = $_SESSION['login'] ?? NULL;

    $query_user = "SELECT * FROM clients WHERE email='$email'";
    $membre = mysqli_fetch_assoc(mysqli_query($db, $query_user));

    if ($membre && $membre['address_id']) {
        $query_address = "SELECT * FROM address WHERE id={$membre['address_id']}";
        $address = mysqli_fetch_assoc(mysqli_query($db, $query_address));
    } else {
        $address = NULL;
    }
}
?>

<?php include(__DIR__ . '/header.php') ?>

<main class="container mt-5">
    <div class="row justify-content-center">

        <h4>
            <i class="fa fa-shopping-cart p-2"></i>
            Votre Pannier
        </h4>

        <div class="row gap-3">
            <div class="card bg-dark-main col">
                <div class="card-body">

                    <div class="table-responsive ">
                        <table class="table">
                            <thead class="text-dark-one text-center">
                                <th class="col">-</th>
                                <th class="col">Produit</th>
                                <th class="col">Prix</th>
                                <th class="col">Quatité</th>
                                <th class="col">Supprimer</th>
                            </thead>
                            <tbody>
                                <?php if (isset($products)) : ?>
                                    <?php foreach ($products as $p) : ?>
                                        <tr class="text-white">
                                            <td scope="row"><img height="50px" src="<?php echo $p['path'] ?>"></td>
                                            <td scope="row" class="align-middle">

                                                <h6 class="text-white my-auto"><?php echo $p['title'] ?></h6>

                                            </td>
                                            <td class="align-middle">
                                                <p class="my-auto"><?php echo $p['prix'] ?> DT</p>
                                            </td>
                                            <td class="align-middle">
                                                <input type="number" value="<?php isset($cart) ? print($cart['products'][findObjectById($p['id'], $cart['products'])]['quantity']) : print(1) ?>" class="form-control golden-input quantity-input" onchange="addToCart(<?php echo $p['id'] ?>)" />
                                            </td>
                                            <td class="text-center align-middle">
                                                <button class="btn btn-outline-danger" onclick="delCartItem(<?php echo $p['id'] ?>)">
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
            <div class="card col-md-4 checkout-card">
                <!-- baad tw njibou l'adresse courante mta client (DONE) -->
                <div class="card-body">
                    <?php if (isset($membre)) : ?>
                        <div>
                            <h5><?php echo $membre['frst_name'] . ' ' . $membre['last_name'] ?></h5>
                        </div>
                        <small class="fw-semibold">Adresse</small>
                        <div class="py-2">
                            <?php if ($address) : ?>
                                <p>
                                    <?php echo $address['address_line_1'] ?>
                                    <br>
                                    <?php echo $address['address_line_2'] ?>
                                    <?php echo $address['postal_code'] ?>
                                </p>
                            <?php endif ?>
                            <a class="hover" href="modif-adresse.php">
                                <i class="fa fa-link"></i>
                                modifier addresse
                            </a>
                        </div>
                    <?php else : ?>
                        <div>
                            <p>Pour continuer, connecter A votre compte</p>
                            <div class="my-2">
                                <a href="create-cmd.php" class="btn btn-success">Connecter</a>
                            </div>
                        </div>
                    <?php endif ?>
                    <div class="mb-2">
                        <h3>Total TTC</h3>
                        <?php
                        if (isset($total)) {
                            echo "<span class=\"h5 fw-light\">$total DT</span>";
                        } else {
                            echo "<span class=\"h5 fw-light\">0 DT</span>";
                        }
                        ?>
                    </div>
                    <div>
                        <a class="btn btn-success w-100 btn-lg golden-btn bg-dark-main" href="create-cmd.php">Passer la commande</a>
                    </div>
                </div>
            </div>
        </div>

    </div>
</main>

<?php include(__DIR__ . '/footer.php') ?>