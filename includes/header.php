<?php
    session_start();
    include "config.php";
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title><?php echo($CONFIG['company_name']); ?></title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/bank.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    <nav class="navbar navbar-inverse navbar-fixed-top">
        <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/"><?php echo($CONFIG['company_name']); ?></a>
        </div>
        
        <div id="navbar" class="navbar-collapse collapse">

            <?php if (array_key_exists('logged_in', $_SESSION) === false || $_SESSION['logged_in'] === false) : ?>
                <form class="navbar-form navbar-right" action="account.php" method="post">
                    <div class="form-group">
                        <input name="username" type="text" placeholder="Username" class="form-control">
                    </div>
                    <div class="form-group">
                        <input name="password" type="password" placeholder="Password" class="form-control">
                    </div>
                    <button type="submit" class="btn btn-success">Sign in</button>
                    <a href="signup.php" class="btn btn-success">Sign Up</a>
                </form>
            <?php else : ?>
                <div class="navbar-form navbar-right">
                    <a href="account.php" class="btn btn-success">Go to account</a>
                </div>
            <?php endif; ?>

           
        </div><!--/.navbar-collapse -->
       
        </div>
    </nav>