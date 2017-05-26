<?php
include('functions.php');
require_once('config.php');
session_start();

$image = $_FILES['image']['name'];
$target = 'images/'.$image;
$tmp_name = $_FILES['image']['tmp_name'];
move_uploaded_file($tmp_name, $target);

//connect to database
$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWD);
mysqli_select_db($conn, DB_DATABASE);

//get title,description,userid
$title = mysqli_real_escape_string($conn, $_POST['title']);
$description = mysqli_real_escape_string($conn, $_POST['description']);
$user = $_SESSION['USERID'];
session_write_close();

//insert information except ingredients
$sql_recipe = "INSERT INTO recipesT(user_id, title, description, image_address)
               VALUES('$user', '$title', '$description', '$target')";
$result_re = mysqli_query($conn, $sql_recipe);
//$row = mysqli_fetch_assoc($result_re);
$last_id = mysqli_insert_id($conn);

//get number of ingredient(from uploading recipe page)
$count=1;
for($x=1; $x<100; $x++ ){
  if(!empty($_POST["ingre$x"])){
    $count++;
  } else{
    break;
  }
}

for($x=1; $x < $count; $x++){
  $ingredient = mysqli_real_escape_string($conn, $_POST["ingre$x"]);
  $sql_goto_recipe = "INSERT INTO recipe_ingredientT(recipe_id, ingredient)
                      VALUES('$last_id', '$ingredient')";
  $result = mysqli_query($conn, $sql_goto_recipe);
}


/*
$sql_ingre = "SELECT * FROM ingredientT";
$result_ingre = mysqli_query($conn, $sql_ingre);


for($x=1; $x < $count; $x++){
  $ingredient = $_POST["ingre$x"];
  $sql_ingre = "SELECT * FROM ingredientT WHERE ingredient = '$ingredient'";
  $result1 = mysqli_query($conn, $sql_ingre);

  if(mysqli_num_rows($result1) ==1){

    $row_ingre = mysqli_fetch_assoc($result1);
    $ingre_id = $row_ingre['ingredient_id'];
    $sql_goto_recipe = "INSERT INTO recipe_ingredientT(recipe_id, ingredient_id)
                        VALUES('$last_id', '$ingre_id')";
    $result = mysqli_query($conn, $sql_goto_recipe);
  } else{
    $s_add_ingre = "INSERT INTO ingredientT(ingredient) VALUES('$ingredient')";
    $r_add_ingre = mysqli_query($conn, $s_add_ingre);
    $sql_ingre2 = "SELECT * FROM ingredientT WHERE ingredient = '$ingredient'";
    $result2 = mysqli_query($conn, $sql_ingre2);
    var_dump($result2);
    $row_ingre = mysqli_fetch_assoc($result2);
    $ingre_id = $row_ingre['ingredient_id'];
    $sql_goto_recipe = "INSERT INTO recipe_ingredientT(recipe_id, ingredient_id)
                        VALUES('$last_id', '$ingre_id')";
    $result = mysqli_query($conn, $sql_goto_recipe);
  }
}*/

header("location: usertype.php");

 ?>
