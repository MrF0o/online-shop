<?php
// --------------
//  partie Read mn CRUD lel les produits, liste des produits avec les button de controle:
//  Modifier w Supprimer
// --------------

if (!isset($_SESSION)) {
    session_start();
}

include '../config.php';

// ken mch logged in redirecti lel login
if (isset($_SESSION['is_admin'])) {

    $sql = 'SELECT * from article';
    $res = mysqli_query($db, $sql);
    $products = mysqli_fetch_all($res, MYSQLI_ASSOC);
} else {
    header('Location: login.php');
}
?>

<?php include 'header.php' ?>
<?php include 'sidebar.php' ?>

<main class="main-wrapper">
    <?php include 'navbar.php' ?>
    <div class="container mt-3">
        <div class="row justify-content-end">
            <div class="col-auto">
                <a href="ajout.php?type=produit" class="btn btn-primary">
                    <span class="mdi mdi-plus"></span>
                    <span>Ajouter</span>
                </a>
            </div>
        </div>
        <div class="table-wrapper table-responsive">
            <table class="table table-hover">
                <thead>
                    <th>#</th>
                    <th>nom</th>
                    <th>description</th>
                    <th>prix</th>
                    <th>Action</th>
                </thead>
                <tbody>
                    <?php if (isset($products) && count($products) > 0) : ?>
                        <?php foreach ($products as $p) : ?>
                            <tr>
                                <td class="min-width"><?php echo $p['id'] ?></td>
                                <td class="min-width"><?php echo $p['title'] ?></td>
                                <td class="min-width text-truncate" style="max-width: 35rem;">
                                    <p class="text-truncate"><?php echo $p['description'] ?></p>
                                </td>
                                <td class="min-width"><?php echo $p['prix'] ?> TD</td>
                                <td class="min-width">
                                    <div class="d-flex">
                                        <a href="delete.php?type=prod&id=<?php print($p['id']) ?>" class="d-block btn btn-danger btn-sm me-1">
                                            Supprimer
                                        </a>
                                        <a href="modifier.php?type=produit&id=<?php print($p['id']) ?>" class="d-block btn btn-success btn-sm">
                                            Modifier
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach ?>
                    <?php else : ?>
                        <div class="text-center text-muted">
                            <td colspan="3" class="text-center text-muted h6">il n'y a pas de données à afficher</td>
                        </div>
                    <?php endif ?>
                </tbody>
                <!-- Normalement fama pagination 5atr ynajm ykoun fma 1000 produits!!  -->
            </table>
        </div>
    </div>
</main>


<?php include 'footer.php' ?>