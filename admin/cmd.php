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

    $cmd = mysqli_fetch_all(mysqli_query($db, "SELECT cmd.id, address.address_line_1, date FROM cmd INNER JOIN address ON address.id=cmd.address_id"), MYSQLI_ASSOC);
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
            <!-- <div class="col-auto">
                <button class="btn btn-primary">
                    <span class="mdi mdi-plus"></span>
                    <span>Ajouter</span>
                </button>
            </div> -->
        </div>
        <div class="table-wrapper table-responsive">
            <table class="table">
                <thead>
                    <th>#</th>
                    <th>Address</th>
                    <th>date</th>
                    <th>Total</th>
                    <th class="text-center">Action</th>
                </thead>
                <tbody>
                    <?php foreach ($cmd as $c) : ?>

                        <?php
                        // calculer total
                        $total = mysqli_fetch_all(mysqli_query($db, "SELECT SUM(quantity) * article.prix FROM ligne_cmd INNER JOIN article ON article.id=ligne_cmd.article_id WHERE ligne_cmd.cmd_id={$c['id']}"));
                        ?>

                        <tr>
                            <td class="min-width"><?php echo $c['id'] ?></td>
                            <td class="min-width"><?php echo $c['address_line_1'] ?></td>
                            <td class="min-width"><?php echo $c['date'] ?></td>
                            <td class="min-width"><?php echo $total[0][0] ?></td>
                            <td class="min-width">
                                <div class="d-flex justify-content-center">
                                    <a href="delete.php?type=cmd&id=<?php print($c['id']) ?>" class="d-block btn btn-danger btn-sm me-1">
                                        Supprimer
                                    </a>
                                    <a href="afficher_cmd.php?id=<?php print($c['id']) ?>" class="d-block btn btn-success btn-sm">
                                        Afficher
                                    </a>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>
</main>


<?php include 'footer.php' ?>