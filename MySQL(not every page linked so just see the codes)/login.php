<?php
require_once('config.php');
session_start();

$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWD) or die("can't connect");
mysqli_select_db($conn, DB_DATABASE) or die("cannot select DB");

$name = mysqli_real_escape_string($conn, $_POST['myName']);
$pass = mysqli_real_escape_string($conn, $_POST['myPword']);

$sql = "SELECT * FROM userst WHERE username = '$name' and passwd = '$pass'";
$result = mysqli_query($conn, $sql);

if(mysqli_num_rows($result) == 1){
  session_regenerate_id();
  $row = mysqli_fetch_assoc($result);
  $_SESSION["USERID"] = $row['user_id'];
  session_write_close();
  header("location: mainFunctionPage.php");

}else{
  $_SESSION['ERRMSG_ARR'] = $errmsg_arr;
  header("location: mobile_login.html");
  exit();
}
 ?>
