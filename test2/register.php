<?php
require_once('config.php');

/*Connect to database*/
$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWD, DB_DATABASE) or die("can't connect");

$name = $_POST['name'];
$email = $_POST['email'];
$pass = $_POST['password'];

/*Hash password. Below method not recommended*/
//$pass = md5($pass);

/*Check if user already exist*/
//check email
$checkQuery = "SELECT email FROM userT WHERE email = '$email'";
$checkResult = mysqli_query($conn, $checkQuery);

if (mysqli_num_rows($checkResult) > 0) {
	echo "<script>
			alert('Account already exist');
			window.location='mobile_register.php';
		</script>";
} else {
	//$insertQuery = "INSERT INTO usersT(username, passwd, email) VALUES('$name', '".md5($pass)."', '$email')";
	$insertQuery = "INSERT INTO userT (username, passwd, email) VALUES('$name', '$pass', '$email')";
	$insertResult = mysqli_query($conn, $insertQuery);

	if ($insertResult) {
		echo "<script>
				alert('Thank you! Please login.');
				window.location='mobile_login.php';
			</script>";
	} else {
		echo "Failed to add to table: " . $insertQuery . "<br>" . mysqli_error($conn);
	}
}

/*Close connection*/
mysqli_close($conn);
?>
