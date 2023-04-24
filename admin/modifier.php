<?php

// --------------
//  Partie Update mn CRUD, lel les produits w cateogies
//  najmouch naamlou update lel users
// --------------

if (!isset($_SESSION)) {
    session_start();
}

include '../config.php';

$msg = [];
$id = mysqli_escape_string($db, strip_tags($_GET['id']));

// ken mch logged in wla mahouch admin redirecti lel login
if (isset($_SESSION['is_admin'])) {

    if (isset($_POST['update_cat'])) {
        $msg['type'] = 'cat';
        if (!empty($_POST['cat_title'])) {
            $libelle = mysqli_escape_string($db, $_POST['cat_title']);

            $query = "UPDATE categories SET label = '$libelle' WHERE id=$id";
            mysqli_query($db, $query);

            $msg['success'] = true;
        } else {
            $msg['success'] = false;
            $msg['msg'] = 'Libllé est vide!';
        }
    }

    if (isset($_POST['update_prod'])) {
        $msg['type'] = 'prod';
        if (!empty($_POST['category']) && !empty($_POST['product_title']) && !empty($_POST['product_desc'])) {
            $title = mysqli_escape_string($db, $_POST['product_title']);
            $desc = mysqli_escape_string($db, $_POST['product_desc']);
            $price = mysqli_escape_string($db, $_POST['product_price']);
            $cat_id = mysqli_escape_string($db, $_POST['category']);

            $query = "UPDATE article SET title = '$title', description = '$desc', prix = $price, category_id = $cat_id WHERE id=$id";
            mysqli_query($db, $query);

            // nzidou record f table images w naamlou enregistrer lel fichier f local
            if (!empty($_FILES['product_image']) && $_FILES['product_image']['name']) {
                $upload_dir = '../images/upload/';
                $upload_path = $upload_dir . bin2hex(openssl_random_pseudo_bytes(10)) . $_FILES['product_image']['name']; // 20 chars aléatoires puis nom de fichier

                $check = getimagesize($_FILES['product_image']["tmp_name"]);
                if ($check !== false) {
                    // ken l'image akber mn 5MB
                    if ($_FILES['product_image']["size"] > 5000000) {
                        $msg['success'] = false;
                        $msg['msg'] = 'la taille de l\'image doit être inférieure à 5 Mo';
                    } else {
                        // TODO: check for permissions
                        move_uploaded_file($_FILES["product_image"]["tmp_name"], $upload_path);
                        $escaped = mysqli_escape_string($db, $upload_path);

                        $sql = "UPDATE images SET path='$escaped' WHERE article_id=$id";
                        mysqli_query($db, $sql);
                    }
                } else {
                    $msg['success'] = false;
                    $msg['msg'] = 'le fichier n\'est pas une image';
                }
            }

            $msg['success'] = true;
        } else {
            $msg['success'] = false;
            $msg['msg'] = 'Au moins un des champs est vide.';
        }
    }
} else {
    header('Location: login.php');
}

// ken bch yajouti produit donc lazem njibou liste 
// des categories bech naamlouha f select dropdown
if ($_GET['type'] == 'produit') {
    $sql = "SELECT * FROM categories";
    $res = mysqli_query($db, $sql);

    // nvm the naming :) !!
    $cats = mysqli_fetch_all($res, MYSQLI_ASSOC);
}


// lehne nest3mlou $_GET bech n3rfou anahi haja bech yajoutiha
?>

<?php include 'header.php' ?>
<?php include 'sidebar.php' ?>

<main class="main-wrapper">
    <?php include 'navbar.php' ?>
    <div class="container mt-3">

        <?php if ($_GET['type'] == 'produit') : ?>

            <?php if (count($msg)) : ?>
                <div class="col-md-6 mt-3">
                    <?php if ($msg['success']) : ?>
                        <p class="alert alert-success">Produit modifié avec succée.</p>
                    <?php else : ?>
                        <p class="alert alert-danger"><?php echo $msg['msg'] ?></p>
                    <?php endif ?>
                </div>
            <?php endif ?>

            <h3>Ajouter un article</h3>

            <?php
            $p = mysqli_fetch_assoc(mysqli_query($db, "SELECT * FROM article WHERE id = $id"));
            $i = mysqli_fetch_assoc(mysqli_query($db, "SELECT * FROM images WHERE article_id = $id"));

            $i['path'] = 'http://' . $_SERVER['HTTP_HOST'] . '/' . $dir . '/' . substr($i['path'], strlen('../'));
            ?>

            <div class="col-md-6 mt-3">
                <form action="" method="POST" enctype="multipart/form-data">

                    <div class="input-style-2">
                        <label for="product_title">Titre de l'article</label>
                        <input type="text" value="<?php echo $p['title'] ?>" name="product_title" id="product_title" class="form-control" placeholder="Titre de l'article">
                    </div>
                    <div class="input-style-2">
                        <label for="product_desc">Description de l'article</label>
                        <textarea type="text" name="product_desc" id="product_desc" class="form-control" rows="4" placeholder="Description de l'article"><?php echo $p['description'] ?></textarea>
                    </div>
                    <div class="input-style-2">
                        <label for="product_price">Prix de l'article</label>
                        <input type="number" value="<?php echo $p['prix'] ?>" name="product_price" id="product_price" class="form-control" rows="4" placeholder="Prix de l'article"></input>
                    </div>
                    <div class="select-style-1">
                        <label>Category</label>
                        <div class="select-position">
                            <select name="category">
                                <option value="">Selectionner une categorie</option>
                                <?php if (isset($cats)) : ?>
                                    <?php foreach ($cats as $cat) : ?>
                                        <option value="<?php echo $cat['id'] ?>" <?php print(($p['category_id'] === $cat['id'] ? 'selected' : '')) ?>><?php echo $cat['label'] ?></option>
                                    <?php endforeach ?>
                                <?php endif ?>
                            </select>
                        </div>
                    </div>

                    <label for="product-image" class="custom-image-upload input-style-1 d-flex justify-content-between">
                        <div class="drop-wrapper">
                            Glisser une image, ou <span class="text-primary">naviguer</span>
                        </div>
                        <div class="p-img-preview">
                            <img src="<?php echo $i['path'] ?>" id="preview-img">
                        </div>
                        <input type="file" name="product_image" id="product-image" hidden>
                    </label>

                    <div class="input-style-2">
                        <button name="update_prod" type="submit" class="btn btn-primary">Ajouter</button>
                    </div>

                </form>
            </div>

        <?php endif ?>

        <?php if ($_GET['type'] == 'categorie') : ?>
            <?php if (count($msg)) : ?>
                <div class="col-md-6 mt-3">
                    <?php if ($msg['success']) : ?>
                        <p class="alert alert-success">Categorie modifié avec succée.</p>
                    <?php else : ?>
                        <p class="alert alert-danger"><?php echo $msg['msg'] ?></p>
                    <?php endif ?>
                </div>
            <?php endif ?>

            <h4>Ajouter une Categorie</h4>

            <?php
            $c = mysqli_fetch_assoc(mysqli_query($db, "SELECT * FROM categories WHERE id = $id"));
            ?>

            <div class="col-md-6 mt-3">
                <form action="" method="POST">

                    <div class="input-style-2">
                        <label for="cat_title">Libellé de categorie</label>
                        <input value="<?php echo $c['label'] ?>" type="text" name="cat_title" id="cat_title" class="form-control" placeholder="Libellé de categorie">
                    </div>
                    <div class="input-style-2">
                        <button name="update_cat" type="submit" class="btn btn-primary">Modifier</button>
                    </div>
                </form>
            </div>

        <?php endif ?>
    </div>
</main>

<script>
    // ala 5ater lpage taamel resubmit lel form
    if (window.history.replaceState) {
        window.history.replaceState(null, null, window.location.href);
    }
</script>

<?php include 'footer.php' ?>