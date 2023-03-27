<?php
//awl m yd5l l'utilisateur
if (isset($_POST['inscription']) && $_POST['inscription'] == 'Inscription') {
    // lazm y3amr lkol
    if ((isset($_POST['login']) && !empty($_POST['login'])) && (isset($_POST['pass']) && !empty($_POST['pass'])) && (isset($_POST['pass_confirm']) && !empty($_POST['pass_confirm']))) {
        //  mdp lawla kima mdp thania
        if ($_POST['pass'] != $_POST['pass_confirm']) {
            $erreur = 'Les 2 mots de passe sont différents.';
        } else {
            $base = mysql_connect('serveur', 'login', 'password');
            mysql_select_db('nom_base', $base);

            // kan email deja mwjouda ybadl email o5ra
            $sql = 'SELECT count(*) FROM membre WHERE login="' . mysql_escape_string($_POST['login']) . '"';
            $req = mysql_query($sql) or die('Erreur SQL !<br />' . $sql . '<br />' . mysql_error());
            $data = mysql_fetch_array($req);

            if ($data[0] == 0) {
                $sql = 'INSERT INTO membre VALUES("", "' . mysql_escape_string($_POST['login']) . '", "' . mysql_escape_string(md5($_POST['pass'])) . '")';
                mysql_query($sql) or die('Erreur SQL !' . $sql . '<br />' . mysql_error());

                session_start();
                $_SESSION['login'] = $_POST['login'];
                header('Location: membre.php');
                exit();
            } else {
                $erreur = 'Un membre possède déjà ce login.';
            }
        }
    } else {
        $erreur = 'Au moins un des champs est vide.';
    }
}
?>

<!doctype HTML>
<html class="h-100">

<head>
    <title>Inscription</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="style.css">
</head>

<body class="d-flex flex-column h-100">

    <?php include(__DIR__ . '/header.php') ?>

    Inscription à l'espace membre :<br />
    <form action="inscription.php" method="post">
        Adresse E-mail: <input type="text" name="login" value="<?php if (isset($_POST['login'])) echo htmlentities(trim($_POST['login'])); ?>"><br />
        Mot de passe : <input type="password" name="pass" value="<?php if (isset($_POST['pass'])) echo htmlentities(trim($_POST['pass'])); ?>"><br />
        Confirmation du mot de passe : <input type="password" name="pass_confirm" value="<?php if (isset($_POST['pass_confirm'])) echo htmlentities(trim($_POST['pass_confirm'])); ?>"><br />
        <input type="submit" name="inscription" value="Inscription">
    </form>

    <?php
    if (isset($erreur)) echo '<br />', $erreur;
    ?>

    <?php include(__DIR__ . '/footer.php') ?>
</body>

</html>