<?php
require_once('config.php');

$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWD) or die("can't connect");
mysqli_select_db($conn, DB_DATABASE) or die("cannot select DB");

$name = mysqli_real_escape_string($conn, $_POST['myName']);
$email = mysqli_real_escape_string($conn, $_POST['email']);
$pass = mysqli_real_escape_string($conn, $_POST['myPword']);
$pass = md5($pass);

$sql2 = "SELECT username FROM usersT WHERE username='$name'";
$result2 = mysqli_query($conn, $sql2);

if(mysqli_num_rows($result2) >0){
  echo "<script type='text/javascript'> alert('Username already in use');
        window.location='mobile_register.html';</script>";
  //header("location: mobile_register.html");
}else{

$sql = "INSERT INTO userst(username, passwd, email) VALUES('$name', '".md5($pass)."', '$email')";
$result = mysqli_query($conn, $sql);

if($result){
  echo "<script type='text/javascript'> alert('Thank you! Please login.');
        window.location='mobile_login.html';</script>";
} else{
  echo "Query failed";
}
}
 ?>
