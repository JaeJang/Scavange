<?php
require_once('config.php');
include('functions.php');
session_start();

$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWD);
mysqli_select_db($conn, DB_DATABASE);

//get user typed ingredient and split them and store them into array
$left = mysqli_real_escape_string($conn, $_POST['leftover']);
$left2 = stringSplit($left);
//number of ingredients typed from user
$num_ingre = count($left2);


$sql1 = "SELECT * FROM recipesT";
$result1 = mysqli_query($conn, $sql1);
//number of recipes existed in database
$num = mysqli_num_rows($result1);

$tmp_recipe_id =array();
$tmp_recipe_id2 = array();
$tmp_recipe_id0 = array();

//matching process
for($x=1; $x < $num+1; $x++){

  $sql2 = "SELECT * FROM recipe_ingredientT WHERE recipe_id='$x'";
  $result2 = mysqli_query($conn, $sql2);
  $count =0;
  while($row = mysqli_fetch_assoc($result2)){

    for($y=0; $y< $num_ingre; $y++){
      if($left2[$y] == $row['ingredient']){
        $count++;
      }
    }
  }
  if($num_ingre >2){
    if($count == $num_ingre){
      $tmp_recipe_id[] = $x;
    } else if($count >= 2 && $count < $num_ingre){
      $tmp_recipe_id2[] = $x;
    }
  } else if($num_ingre > 0){
    $tmp_recipe_id0[] = $x;
  }
}

//When the ingredients typed from user is greater than 2
//and all matched
if(!empty($tmp_recipe_id)){
  for($x=0; $x < count($tmp_recipe_id); $x++){
    $r_id = $tmp_recipe_id[$x];
    $sql3 = "SELECT * FROM recipesT WHERE recipe_id='$r_id'";
    $result3 = mysqli_query($conn, $sql3);
    $row_search = mysqli_fetch_assoc($result3);
    echo '<br> All matched';
    echo '<br>'.$row_search['title'].'<br>';
  }
}
//When the ingredients typed from user is greater than 2
//and not all matched but at least 2
if(!empty($tmp_recipe_id2)){
  for($x=0; $x < count($tmp_recipe_id2); $x++){
    $r_id = $tmp_recipe_id2[$x];
    $sql3 = "SELECT * FROM recipesT WHERE recipe_id='$r_id'";
    $result3 = mysqli_query($conn, $sql3);
    $row_search = mysqli_fetch_assoc($result3);
    echo 'Matched more than 2';
    echo '<br>'.$row_search['title'].'<br>';
  }
}
//When the ingredient typed from user is only one
if(!empty($tmp_recipe_id0)){
  for($x=0; $x < count($tmp_recipe_id0); $x++){
    $r_id = $tmp_recipe_id0[$x];
    $sql3 = "SELECT * FROM recipesT WHERE recipe_id='$r_id'";
    $result3 = mysqli_query($conn, $sql3);
    $row_search = mysqli_fetch_assoc($result3);
    echo 'only one matched';
    echo '<br>'.$row_search['title'].'<br>';
  }
}

 ?>
