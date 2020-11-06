<?php

$dbhost = 'classmysql.engr.oregonstate.edu';
$dbname = 'cs361_username';
$dbuser = 'cs361_username';
$dbpass = 'password';

$mysqli = new mysqli($dbhost, $dbuser, $dbpass, $dbname);
if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}

$sql = "INSERT INTO client (username, first_name, last_name, email, password)
VALUES ('".$_POST['username']."', '".$_POST['firstname']."', '".$_POST['lastname']."', '".$_POST['email']."', '".$_POST['password']."')";

if ($mysqli->query($sql) === TRUE) {
	echo "<h1>Welcome " . $_POST['username'] . "!</h1>";
	echo "<div>You have successfully made a new account</div";
} else if ($mysqli->errno === 1062) {
	echo "<div>The username " . $_POST['username'] . " is taken. Please try again with a different username.</div>";
}

$mysqli->close();

?>
