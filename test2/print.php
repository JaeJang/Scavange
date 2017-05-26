<?php
require_once('config.php');


$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWD);
mysqli_select_db($conn, DB_DATABASE);

$leftover1 = mysqli_real_escape_string($conn, $_POST['user_ingre1']);
$leftover2 = mysqli_real_escape_string($conn, $_POST['user_ingre2']);

$sql1 = "SELECT * FROM recipesT";
$result1 = mysqli_query($conn, $sql1);
$num = mysqli_num_rows($result1);


$tmp_recipe_id =array();

for($x=1; $x < $num+1; $x++){
  /*
  $sql2= "SELECT r.recipe_ingre_id, r.recipe_id, i.ingredient
          FROM recipe_ingredientT as r LEFT JOIN ingredientT AS i
          ON r.ingredient_id = i.ingredient_id WHERE r.recipe_id='$x'";*/
  $sql2 = "SELECT * FROM recipe_ingredientT WHERE recipe_id='$x'";
  $result2 = mysqli_query($conn, $sql2);
  $count =0;
  while($row = mysqli_fetch_assoc($result2)){
    if($leftover1 == $row['ingredient'] || $leftover2==$row['ingredient']){
      $count++;
    }
  }
  if($count >=2){
    $tmp_recipe_id[] = $x;
  }
}
//var_dump($tmp_recipe_id);

for($x=0; $x < count($tmp_recipe_id); $x++){
  $r_id = $tmp_recipe_id[$x];
  $sql3 = "SELECT * FROM recipesT WHERE recipe_id='$r_id'";
  $result3 = mysqli_query($conn, $sql3);
  $row_search = mysqli_fetch_assoc($result3);
  echo '<br>'.'<br>'.$row_search['title'].'<br>';
}

 ?>
