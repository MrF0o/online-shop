<?php
// --------------
//  partie Read mn CRUD lel cmd, en cours ...
// --------------

if (!isset($_SESSION)) {
    session_start();
}

include '../config.php';

// ken mch logged in redirecti lel login
if (isset($_SESSION['is_admin'])) {
    if (isset($_GET['id']) && !empty($_GET['id'])) {
        $id = mysqli_escape_string($db, $_GET['id']);
        $cmd = mysqli_fetch_assoc(mysqli_query($db, "SELECT * FROM cmd WHERE id=$id"));
        $addr_id = $cmd['address_id'];
        $address = mysqli_fetch_assoc(mysqli_query($db, "SELECT * FROM address WHERE id=$addr_id"));
        $client = mysqli_fetch_assoc(mysqli_query($db, "SELECT * FROM clients WHERE address_id=$addr_id"));
        $produits = mysqli_fetch_all(mysqli_query($db, "SELECT * FROM ligne_cmd INNER JOIN article ON article.id=ligne_cmd.article_id WHERE cmd_id=$id"), MYSQLI_ASSOC);

        $total = mysqli_fetch_all(mysqli_query($db, "SELECT SUM(quantity) * article.prix FROM ligne_cmd INNER JOIN article ON article.id=ligne_cmd.article_id WHERE ligne_cmd.cmd_id=$id"));
    } else {
        echo '404 Product Not Found';
    }
} else {
    header('Location: login.php');
}
?>

<?php include 'header.php' ?>
<?php include 'sidebar.php' ?>

<main class="main-wrapper">
    <?php include 'navbar.php' ?>
    <div class="container mt-3">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <div class="card-title fw-600">
                            Client
                        </div>
                        <div>
                            <span class="fw-500">Nom et prenom:</span> <?php echo $client['frst_name'] . ' ' . $client['last_name'] ?>
                        </div>
                        <div class="pt-2">
                            <span class="fw-500">Address Ligne 1:</span> <?php echo $address['address_line_1'] ?>
                        </div>
                        <div class="pt-2">
                            <span class="fw-500">Address Ligne 2:</span> <?php echo $address['address_line_2'] ?>
                        </div>
                        <div class="pt-2">
                            <span class="fw-500">Code postal:</span> <?php echo $address['postal_code'] ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <div class="card-title fw-600">
                            Produits
                        </div>
                        <div>
                            <?php foreach ($produits as $prod) : ?>
                                <div class="p-2 my-1 border">
                                    <span class="fw-500"><?php echo $prod['quantity'] ?> X</span> <?php echo $prod['title'] ?>
                                    <span> - PU:</span> <?php echo $prod['prix'] ?>
                                </div>
                            <?php endforeach ?>
                        </div>
                        <div class="mt-2">
                            <span class="h5">Total TTC:</span> 
                            <div class="h4">
                                <?php echo $total[0][0] ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-2 mt-3">
                <a href="delete.php?type=cmd_aff&id=<?php print($id) ?>" class="d-block btn btn-danger btn-sm me-1">
                    Supprimer
                </a>
            </div>
        </div>
    </div>
</main>


<?php include 'footer.php' ?>