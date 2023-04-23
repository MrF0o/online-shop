<?php
if (!isset($_SESSION)) {
    session_start();
}

// ken mch logged in redirecti lel login
if (isset($_SESSION['is_admin'])) {
    
} else {
    header('Location: login.php');
}

?>

<?php include 'header.php' ?>

<?php include 'sidebar.php' ?>

<?php include 'footer.php' ?>