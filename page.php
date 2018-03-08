<?php include 'includes/header.php' ?>

<main class="container">

    <ul class="nav nav-pills nav-justified">
        <li><a href="page.php?page=about.php">About</a></li>
        <li><a href="page.php?page=accounts.php">Accounts</a></li>
        <li><a href="page.php?page=checks.php">Checks</a></li>
        <li><a href="page.php?page=loans.php">Loans</a></li>
    </ul>
    <section id="page-content">
        <?php 


            if (array_key_exists('page', $_GET) ) {
                
                include "pages/" . $_GET['page']; 
            } else {
                echo("<div>Page does not exist</div>");
            }

        ?>
    </section>

</main>

<?php include 'includes/footer.php' ?>