<?php
require_once('config.php');
include('functions.php');
session_start();

$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWD, DB_DATABASE) or die("can't connect");

$recipe_id = mysqli_real_escape_string($conn, $_POST['recipe_id']);
$uid = $_SESSION['USERID'];

$sql = "DELETE FROM recipesT WHERE recipe_id = $recipe_id";
$result = mysqli_query($conn, $sql);

if($result){
  header("location: mobile_recipe2.php");
} else{
  echo "<script>alert('Failed to delete');
        window.location='mobile_recipe2.php?id=".$recipe_id."'</script>";
}
 ?>
