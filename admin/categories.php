<?php
if (!isset($_SESSION)) {
    session_start();
}

include '../config.php';

// ken mch logged in redirecti lel login
if (isset($_SESSION['login']) && isset($_SESSION['is_admin'])) {
    $sql = 'SELECT * from categories';
    $res = mysqli_query($db, $sql);
    $categories = mysqli_fetch_all($res, MYSQLI_ASSOC);
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
                <a href="ajout.php?type=categorie" class="btn btn-primary">
                    <span class="mdi mdi-plus"></span>
                    <span>Ajouter</span>
                </a>
            </div>
        </div>
        <div class="table-wrapper table-responsive">
            <table class="table">
                <thead>
                    <th>#</th>
                    <th>libellé</th>
                    <th>Action</th>
                </thead>
                <tbody>
                    <?php if (isset($categories) && count($categories) > 0) : ?>
                        <?php foreach ($categories as $c) : ?>
                            <tr>
                                <td class="min-width"><?php echo $c['id'] ?></td>
                                <td class="w-100 min-width"><?php echo $c['label'] ?></td>
                                <td class="min-width">
                                    <div class="d-flex">
                                        <a href="delete.php?type=cat&id=<?php echo $c['id'] ?>" class="d-block btn btn-danger btn-sm me-1">
                                            Supprimer
                                        </a>
                                        <a href="#" class="d-block btn btn-success btn-sm">
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
            </table>
        </div>
    </div>
</main>


<?php include 'footer.php' ?>