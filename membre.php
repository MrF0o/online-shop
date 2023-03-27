<?php
if(!isset($_SESSION)) 
{ 
    session_start(); 
} 

include 'config.php';

if (isset($_SESSION['login'])) {
    $email = $_SESSION['login'];
    // ani 3melt 8alta fl phpmyadmin f 3oudh na3ml first_name ktabt frst_name
    $sql = "SELECT frst_name FROM clients WHERE email='$email'";
    $res = mysqli_query($db, $sql);
    $membre = mysqli_fetch_assoc($res);
} else {
    header('Location: index.php');
}

?>

<?php include 'header.php' ?>

<div class="container text-center">
    <div class="h3">
        Bonjour Monsieur: <?php echo $membre['frst_name'] ?>
    </div>
</div>

<?php include 'footer.php' ?>