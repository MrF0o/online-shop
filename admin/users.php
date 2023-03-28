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
                    <tr>
                        <td class="min-width">1</td>
                        <td class="min-width">Test</td>
                        <td class="min-width">test</td>
                        <td class="min-width">test@exemple.com</td>
                        <td class="min-width">
                            <div>
                                <a href="#" class="btn btn-danger">
                                    Supprimer
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