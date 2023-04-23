<?php
if (!isset($_SESSION)) {
    session_start();
}

if (isset($_SESSION['is_admin'])) {
    header('Location: dashboard.php');
} else {
    header('Location: login.php');
}