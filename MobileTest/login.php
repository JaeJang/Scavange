<?php
require_once('config.php');
session_start();

/*Connect to database*/
$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWD, DB_DATABASE) or die("can't connect");

$name = $_POST['myName'];
$pass = $_POST['myPword'];

$selectUser = "SELECT * FROM userT WHERE username = '$name' AND passwd = '$pass'";
$result = mysqli_query($conn, $selectUser);

if (mysqli_num_rows($result) == 1) {
	session_regenerate_id();
	$row = mysqli_fetch_assoc($result);
	$_SESSION["USERID"] = $row['user_id'];
	session_write_close();
	header("location: mainFunctionPage.php");
} else {
	header("location: mobile_login.html");
	exit();
}

/*Close connection*/
mysqli_close($conn);
?>
