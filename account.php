<?php include 'includes/header.php' ?>
<?php include 'config.php' ?>
<?php include 'includes/login.php' ?>

<main class="container">
    <?php
     if ($_SESSION['logged_in'] === true) {
         include "includes/account-page.php";
     } else {
         echo("Error: " . $_SESSION['error']);
     }
     ?>
</main>

<?php include 'includes/footer.php' ?>
