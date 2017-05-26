<?php
require_once('config.php');
session_start();
//connect database
$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWD, DB_DATABASE) or die("can't connect");

$rate = $_POST['rate'];
$recipe_id = $_POST['recipe_id'];
$uid = $_SESSION['USERID'];

$sql = "SELECT * FROM recipe_rateT WHERE recipe_id = '$recipe_id' AND user_id='$uid'";
$result = mysqli_query($conn, $sql);
if(mysqli_num_rows($result)==1){
  echo '<script> alert("You\'ve alreay voted");
        window.location="mobile_recipe2.php?id='.$recipe_id.'";</script>';
  exit();

}

$sql_put = "INSERT INTO recipe_rateT(user_id,recipe_id,rate)
           VALUES('$uid','$recipe_id','$rate')";
$result_put = mysqli_query($conn, $sql_put);

if($result_put){
  header("location: mobile_recipe2.php?id=$recipe_id");
}
 ?>
