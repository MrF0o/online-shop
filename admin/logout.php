<?php
if (!isset($_SESSION)) {
    session_start();
}

unset($_SESSION['is_admin']);

header('Location: index.php');