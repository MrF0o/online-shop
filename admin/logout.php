<?php
// --------------
// deconnexion pour les admin
// invalidate $_SESSION['is_admin]
// --------------

if (!isset($_SESSION)) {
    session_start();
}

unset($_SESSION['is_admin']);

header('Location: index.php');