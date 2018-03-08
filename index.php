<?php include 'includes/header.php' ?>

    <!-- Main jumbotron for a primary marketing message or call to action -->
    <div class="jumbotron">
      <div class="container">
        <h1>Welcome to <?php echo($CONFIG['company_name']); ?>!</h1>
        <p>The bank that's always there...</p>
        <p><a class="btn btn-primary btn-lg" href="page.php?page=about.php" role="button">Learn more &raquo;</a></p>
      </div>
    </div>

    <div class="container">
      <!-- Example row of columns -->
      <div class="row">
        <div class="col-md-4">
          <h2>Savings Accounts</h2>
          <p>Check out our great savings accounts!</p>
          <p><a class="btn btn-default" href="page.php?page=accounts.php" role="button">View details &raquo;</a></p>
        </div>
        <div class="col-md-4">
          <h2>Loans</h2>
          <p>Our loans' rates are the lowest they can go. Take a small loan of million dollars!</p>
          <p><a class="btn btn-default" href="page.php?page=loans.php" role="button">View details &raquo;</a></p>
       </div>
        <div class="col-md-4">
          <h2>QuikChecks</h2>
          <p>With our QuikChecks(r), you can cash those checks only with a photo.</p>
          <p><a class="btn btn-default" href="page.php?page=checks.php" role="button">View details &raquo;</a></p>
        </div>
      </div>

      <hr>
           
    </div> <!-- /container -->
<?php include 'includes/footer.php' ?>