<div class="container d-flex h-100 justify-content-center align-items-center">
    <div class="col col-md-5 bg-light p-4 rounded shadow">
        <h4>Créer un compte</h4>
        <form action="<?php echo route('/register') ?>" method="POST">
            <div class="form-group">
                <label for="name">Votre nom</label>
                <input type="text" name="name" class="form-control" id="name" placeholder="Saisir votre nom">
            </div>
            <div class="form-group">
                <label for="last_name">Votre Prenom</label>
                <input type="text" name="last_name" class="form-control" id="last_name" placeholder="Saisir votre Prenom">
            </div>
            <div class="form-group">
                <label for="email">Adresse Email</label>
                <input type="email" name="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Saisir votre email">
                <small id="emailHelp" class="form-text text-muted">Votre email est securisée.</small>
            </div>
            <div class="form-group">
                <label for="password">Mot de passe</label>
                <input type="password" name="password" class="form-control" id="password" placeholder="Mot de passe">
            </div>

            <div class="mt-2">
                <button type="submit" name="login_submitted" class="btn btn-outline-dark">Submit</button>
            </div>
        </form>
    </div>
</div>