<?php
if (!isset($_SESSION)) {
    session_start();
}

include 'config.php';

// kn mahouch logged in aaml redirect lel login
if (isset($_SESSION['login'])) {
    // grab the current logged in member
    $email = $_SESSION['login'];
    $sql = "SELECT * FROM clients WHERE email='$email'";
    $res = mysqli_query($db, $sql);
    $membre = mysqli_fetch_assoc($res);


    // kif yclicki ala mise a jours
    if (isset($_POST['update'])) {
        // ... TODO
    }
} else {
    header('Location: login.php');
}

?>

<?php include 'header.php' ?>

<div class="container h-100 d-flex justify-content-center align-items-center">
    <div class="card  col col-md-5 bg-light">
        <form class="card-body" action="" method="POST">
            <div class="form-group mt-2">
                <label for="addr_line1">Addresse ligne 1<code>*</code></label>
                <input type="addr_line1" name="addr_line1" class="form-control" id="addr_line1" placeholder="Entrer une addresse">
            </div>

            <div class="form-group mt-2">
                <label for="addr_line2">Addresse ligne 2</label>
                <input type="addr_line2" name="addr_line2" class="form-control" id="addr_line2" placeholder="Entrer une addresse">
            </div>

            <div class="form-group mt-2">
                <label for="code_postal">Code postal<code>*</code></label>
                <input type="code_postal" name="code_postal" class="form-control" id="code_postal" placeholder="Entrer une code">
            </div>

            <small>les champs marqués avec <code>*</code> sont obligatoires</small>

            <div class="mt-3">
                <button type="submit" name="update" class="btn btn-outline-dark">Mise a jour d'adresse</button>
            </div>

        </form>
    </div>
</div>

<?php include 'footer.php' ?>