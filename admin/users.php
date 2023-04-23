<?php
if (!isset($_SESSION)) {
    session_start();
}

include '../config.php';

// ken mch logged in wla mch admin redirecti lel login
if (isset($_SESSION['is_admin'])) {
    $sql = 'SELECT * from clients';
    $res = mysqli_query($db, $sql);
    $users = mysqli_fetch_all($res, MYSQLI_ASSOC);
} else {
    header('Location: login.php');
}
?>

<?php include 'header.php' ?>
<?php include 'sidebar.php' ?>

<main class="main-wrapper">
    <?php include 'navbar.php' ?>
    <div class="container">
        <div class="col-md-6 mt-3">
            <p class="alert alert-info"><small>on ne peut pas ajouter ou modifier des utilisateurs, a cause de mch aaref aalech </small></p>
        </div>
        <div class="table-wrapper table-responsive">
            <table class="table">
                <thead>
                    <th>#</th>
                    <th>nom</th>
                    <th>prenom</th>
                    <th>email</th>
                    <th>Action</th>
                </thead>
                <tbody>
                    <?php if (isset($users) && count($users) > 0) : ?>
                        <?php foreach ($users as $u) : ?>
                            <tr>
                                <td class="min-width"><?php echo $u['id'] ?></td>
                                <td class="min-width"><?php echo $u['frst_name'] ?></td>
                                <td class="min-width"><?php echo $u['last_name'] ?></td>
                                <td class="min-width"><?php echo $u['email'] ?></td>
                                <td class="min-width">
                                    <div>
                                        <a href="delete.php?type=user&id=<?php echo $u['id'] ?>" class="btn btn-danger">
                                            Supprimer
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