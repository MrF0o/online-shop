<?php
if (!isset($_SESSION)) {
    session_start();
}

// ken mch logged in redirecti lel login
if (isset($_SESSION['login']) && isset($_SESSION['is_admin'])) {
    
} else {
    // juste test
    $_SESSION['login'] = 'fake';
    $_SESSION['is_admin'] = 'fake';
    header('Location: login.php');
}

?>

<?php include 'header.php' ?>

<?php include 'sidebar.php' ?>

<?php include 'footer.php' ?>