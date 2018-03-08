 <ul class="nav nav-pills">
    <li><a href="account.php?action=view">View Accounts</a></li>
    <li><a href="account.php?action=check_upload">Upload Checks</a></li>
    <li><a href="account.php?action=check_view">View Checks</a></li>
    <li><a href="account.php?action=logout">Logout</a></li>
</ul>

<?php

if (!array_key_exists('action', $_GET) && !array_key_exists('action', $_POST)) {
    $action = 'view';
} elseif (array_key_exists('action', $_POST)) {
    $action = $_POST['action'];
} else {
    $action = $_GET['action'];
}

// POST actions
if ($action == "add_account") {

    $query = "SELECT * FROM accounts WHERE userid='" . $_SESSION['userid'] . "' AND accountname='" . $_POST['name'] . "'";
    $result = $mysqli->query($query);

    if ($result->num_rows > 0) {
        echo "An account of that name already exists";
    } else {
        $query = "INSERT INTO accounts (accountname, userid) VALUES ('" . $_POST['name'] . "', '" . $_SESSION['userid'] . "')";
        $result = $mysqli->query($query);

        if (!$result) {
            echo "Failed to add account: (" . $mysqli->errno . ") " . $mysqli->error;
        }
        
    }
    
    $action = "view";
} else if ($action == "upload") {

    $query = "SELECT * FROM checks WHERE userid=" . $_SESSION['userid'] . " AND name='" . $_POST['name'] . "'";

    $result = $mysqli->query($query);

    if ($result->num_rows > 0) {
        echo "A check of that name already exists<br>";
    } else {
        if (count($_FILES) > 0 && array_key_exists('check_file', $_FILES)) {

            $upload_filename_items = explode(".", $_FILES['check_file']['name']);
            $ext = $upload_filename_items[count($upload_filename_items) - 1];

            $filename = $_SESSION['user'] . "." . $_POST['name'] . "." . $ext;
            $src = $_FILES['check_file']['tmp_name'];

            $full_path = dirname($_SERVER['SCRIPT_FILENAME']) . "/checks/" . $filename;
            $move_result = move_uploaded_file($src, $full_path);
            if ($move_result == TRUE) {

                $insert = "INSERT INTO checks (userid, name, filename) VALUES ('" . $_SESSION['userid'] . "', '" . $_POST['name'] . "', '" . $filename . "')";
                $result = $mysqli->query($insert);

                if ($result !== FALSE) {
                    echo "<div>Check uploaded!</div/>";
                } else {
                    echo "<div>Check insert failed!</div/>";
                }

            } else {
                echo "<div>Upload failed! (Perhaps the file was too big)</div/>";
            }
            
        }
    }


    
    $action = "check_view";
}

if ($action == "logout") {
    $_SESSION['logged_in'] = false;
    echo "You have been logged out";
} elseif ($action=="view") {

    $query = "SELECT * FROM accounts WHERE userid='" . $_SESSION['userid'] . "'";

    $result = $mysqli->query($query);

	if (!$result) {
		 echo "Failed to query: (" . $mysqli->errno . ") " . $mysqli->error;
	}
    
    echo "<h3>Accounts</h3>\n<table class='table'>\n<tr><th>Account Name</th><th>Balance</th></tr>";
    
    if ($result->num_rows > 0) {
        while($row = $result->fetch_array(MYSQLI_ASSOC)){
            echo "<tr><td>" . $row['accountname'] . "</td><td>" . $row['balance'] . "</td></tr>";
        }
    } else {
        echo "<tr><td>You have no accounts</td><td>-</td></tr>";
    }
    echo "</table>";
    echo "<br><form method='post' action='account.php'><input type='text' name='name' /><input type='hidden' name='action' value='add_account'/><button  class='btn btn-default' type='submit'>Add Account</button></form>";
    

} elseif ($action=="check_upload") {

     echo "<div class=\"alert alert-warning\" role=\"alert\">Be sure your picture has your Manatee Bank card clearly visible!</div>";
     echo "<div class=\"alert alert-warning\" role=\"alert\">It may take awhile to process the check</div>";

    echo "<br><form method='post' action='account.php' enctype=\"multipart/form-data\"> ";
    echo "<input type='text' name='name' />";
    echo "<input type='file' name='check_file' />";
    echo "<input type='hidden' name='action' value='upload'/>";
    echo "<button class='btn btn-default'  type='submit'>Upload Check</button></form>";
    
} elseif ($action=="check_view") {

    $query = "SELECT * FROM checks WHERE userid='" . $_SESSION['userid'] . "'";

    $result = $mysqli->query($query);

	if (!$result) {
		 echo "Failed to query: (" . $mysqli->errno . ") " . $mysqli->error;
	}

    echo "<h3>Checks</h3>\n<table class='table'>\n<tr><th>Check Name</th><th>View</th></tr>";
    
    if ($result->num_rows > 0) {
        while($row = $result->fetch_array(MYSQLI_ASSOC)){
            echo "<tr><td>" . $row['name'] . "</td><td><a href='checks/" . $row['filename'] . "'>View</a></td></tr>";
        }
    } else {
        echo "<tr><td>You have no checks</td><td>-</td></tr>";
    }
    echo "</table>";
} else {
    echo "Invalid action $action";
}

?>