<?php
// --------------
//  directory index, ne3rfou est ce que l'utilisateur 3nda accee wla
//  sinon redirect lel login
// --------------

if (!isset($_SESSION)) {
    session_start();
}

if (isset($_SESSION['is_admin'])) {
    header('Location: dashboard.php');
} else {
    header('Location: login.php');
}