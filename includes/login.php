<?php

include "database.php";

$error_message = "";

$_SESSION['error'] = "";
if (!array_key_exists("logged_in", $_SESSION)) {
	$_SESSION['logged_in'] = false;
}

if (array_key_exists('username', $_POST) && array_key_exists('password', $_POST)) {

	$username = $_POST['username'];
	$password = md5($_POST['password']);

	// Stop SQL injection
	$username = str_replace("'", "\'", $username);
	$username = str_replace('"', '\"', $username);

	$query = "SELECT * FROM users WHERE username='" . $username . "' AND password='" . $password . "'";

	$result = $mysqli->query($query);

	if (!$result) {
		 echo "Failed to query: (" . $mysqli->errno . ") " . $mysqli->error;
	}
    

	if ($result->num_rows > 0) {
		$_SESSION['logged_in'] = true;
		$_SESSION['user'] = $username;
		$_SESSION['userid'] = $result->fetch_array(MYSQLI_ASSOC)['userid'];
	} else {
		$_SESSION['error'] =  "Invalid password. <br>QuikBankSite default username/password is admin/password";
	}

} elseif ($_SESSION['logged_in'] === false) {
	$_SESSION['error'] = "You must login";
}


?>