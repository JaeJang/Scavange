<?php
require_once('config.php');
include('functions.php');
session_start();

$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWD, DB_DATABASE) or die("can't connect");


//get title
$title = mysqli_real_escape_string($conn, $_POST['recName']);
//get image and redirect and save a path
$image = $_FILES['pic']['name'];
$target = 'Images/'.$image;
$tmp_name = $_FILES['pic']['tmp_name'];
move_uploaded_file($tmp_name, $target);
//get description
$description = mysqli_real_escape_string($conn, $_POST['describe']);
$userid = $_SESSION['USERID'];

// //get ingredients and split and store in array
// $ingredient = mysqli_real_escape_string($conn, $_POST['ingredient']);
//
// $ingredient2 = stringSplit($ingredient);
// // $ingredient = strtolower($ingredient);
// // $strnum = strlen($ingredient);
// // $ingredient = substr($ingredient,0 ,$strnum-1);
// // $ingredient2 = explode(',',$ingredient);
// var_dump($ingredient2);
// //number of ingredients
// $num_ingre = count($ingredient2);

//Ingredients are stored in Array
$ingredients = array();
for($x=1; $x<200; $x++){
  if(!empty($_POST["newIngredient$x"])){
    $ingredients[] = mysqli_real_escape_string($conn, $_POST["newIngredient$x"]);
  }
}

//Steps are stored in array
$steps = array();
for($x=1; $x<100; $x++){
  if(!empty($_POST["newSteps$x"])){
    $steps[] = mysqli_real_escape_string($conn, $_POST["newSteps$x"]);
  }
}

//number of steps
$num_steps = count($steps);
//number of ingredients
$num_ingre= count($ingredients);

//fill in recipes TABLE
//now there is no login system in this folder
//so ALL user_id below  has to be changed to $_SESSION['USERID']
$sql1 = "INSERT INTO recipesT(user_id, title, description, image_address)
        VALUES('$userid', '$title', '$description', '$target')";
$result1 = mysqli_query($conn, $sql1);
//get recipe_id from last query
$recipe_id = mysqli_insert_id($conn);

//put steps into recipe_detailT
for($x=0; $x<$num_steps; $x++){
  $detail = $steps[$x];
  $sql2 = "INSERT INTO recipe_detailT(user_id, recipe_id,detail)
          VALUES('$userid', '$recipe_id', '$detail')";
  $result2 = mysqli_query($conn, $sql2);
}

//put ingredients into recipe_ingredientT
for($x=0; $x < $num_ingre; $x++){
  $ingre = $ingredients[$x];
  $sql3 = "INSERT INTO recipe_ingredientT(recipe_id, ingredient)
          VALUES('$recipe_id', '$ingre')";
  $result3 = mysqli_query($conn, $sql3);
}



header("location: mobile_recipe2.php");

 ?>
