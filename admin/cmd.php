<?php
if (!isset($_SESSION)) {
    session_start();
}

// ken mch logged in redirecti lel login
if (isset($_SESSION['login']) && isset($_SESSION['is_admin'])) {
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
                    <th>client</th>
                    <th>date</th>
                    <th>Total</th>
                    <th class="text-center">Action</th>
                </thead>
                <tbody>
                    <tr>
                        <td class="min-width">1</td>
                        <td class="min-width">Ali</td>
                        <td class="min-width">28/03/2023</td>
                        <td class="min-width">750DT</td>
                        <td class="min-width">
                            <div class="d-flex justify-content-center">
                                <a href="#" class="d-block btn btn-danger btn-sm me-1">
                                    Supprimer
                                </a>
                                <a href="#" class="d-block btn btn-success btn-sm">
                                    Afficher
                                </a>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</main>


<?php include 'footer.php' ?>