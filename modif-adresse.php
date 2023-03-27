<?php

?>

<?php include 'header.php' ?>

<div class="container h-100 d-flex justify-content-center align-items-center">
    <div class="card col-md-5 bg-light">
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
                <label for="code_postal">Code postal</label>
                <input type="code_postal" name="code_postal" class="form-control" id="code_postal" placeholder="Entrer une code">
            </div>

            <div class="mt-3">
                <button type="submit" name="update" class="btn btn-outline-dark">Mise a jour d'adresse</button>
            </div>

        </form>
    </div>
</div>

<?php include 'footer.php' ?>