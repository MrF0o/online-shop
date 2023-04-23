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

        if (!empty($_POST['addr_line1']) && !empty($_POST['code_postal'])) {
            $lineOne = mysqli_escape_string($db, $_POST['addr_line1']);
            $lineTwo = mysqli_escape_string($db, $_POST['addr_line2'] ?? NULL);
            $codePostal = mysqli_escape_string($db, $_POST['code_postal']);

            // normallement nfas5ou l'addresse lgdima?

            $sql = "INSERT INTO address (address_line_1, address_line_2, postal_code) VALUES ('$lineOne', '$lineTwo', '$codePostal')";
            mysqli_query($db, $sql);
            $id = mysqli_insert_id($db);

            $sql = "UPDATE clients SET address_id=$id WHERE clients.id=" . $membre['id'];
            mysqli_query($db, $sql);
        } else {
            $erreur = "Au moins un des champs obligatoire est vide.";
        }
    }
} else {
    header('Location: login.php');
}

?>

<?php include 'header.php' ?>

<div class="container h-100 d-flex justify-content-center align-items-center">
    <div class="card bg-dark-main col col-md-5 text-white">
        <?php if (isset($erreur)) {
            echo $erreur;
        } ?>
        <form class="card-body" action="" method="POST">
            <div class="form-group mt-2">
                <label for="addr_line1">Addresse ligne 1<code>*</code></label>
                <input type="addr_line1" name="addr_line1" class="form-control golden-input" id="addr_line1" placeholder="Entrer une addresse">
            </div>

            <div class="form-group mt-2">
                <label for="addr_line2">Addresse ligne 2</label>
                <input type="addr_line2" name="addr_line2" class="form-control golden-input" id="addr_line2" placeholder="Entrer une addresse">
            </div>

            <div class="form-group mt-2">
                <label for="code_postal">Code postal<code>*</code></label>
                <input type="code_postal" name="code_postal" class="form-control golden-input" id="code_postal" placeholder="Entrer une code">
            </div>

            <small>les champs marqués avec <code>*</code> sont obligatoires</small>

            <div class="mt-3">
                <button type="submit" name="update" class="btn btn-outline-dark golden-btn">Mise a jour d'adresse</button>
            </div>

        </form>
    </div>
</div>

<?php include 'footer.php' ?>