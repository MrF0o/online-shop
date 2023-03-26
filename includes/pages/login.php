<div class="container d-flex h-100 justify-content-center align-items-center">
    <div class="col col-md-5 bg-light p-4 rounded shadow">
        <h4>Connecter a votre compte</h4>
        <form action="<?php echo route('/login') ?>" method="POST">
            <div class="form-group">
                <label for="email">Adresse Email</label>
                <input type="email" name="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Enter email">
                <small id="emailHelp" class="form-text text-muted">Votre email est securisée.</small>
            </div>
            <div class="form-group">
                <label for="password">Mots de passe</label>
                <input type="password" name="password" class="form-control" id="password" placeholder="Password">
            </div>

            <div class="mt-2">
                <button type="submit" name="login_submitted" class="btn btn-outline-dark">Submit</button>
            </div>
        </form>
    </div>
</div>