<?php
include('functions.php');
require_once('config.php');
session_start();

$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWD, DB_DATABASE) or die("can't connect");

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
      if(strcasecmp($left2[$y],$row['ingredient'])==0){
        $count++;
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
    }
  }
}


$num=1;

?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8"/>
		<title>SCAVANGE TEMPLATE</title>
		<!--CSS-->
		<link rel="stylesheet" href="CSS/backbone.css">
		<link rel="stylesheet" href="CSS/mainFunctionStyle.css">
		<link rel="stylesheet" href="CSS/mobile_recipe2.css">
    <link rel="stylesheet" href="CSS/mobileRecipeIndividualStyle.css">
		<link href="https://fonts.googleapis.com/css?family=Josefin+Sans" rel="stylesheet">
		<!--Javascript-->
		<!--<script src="https://www.gstatic.com/firebasejs/3.9.0/firebase.js"></script>
		<script src="Javascript/firebase.js"></script>-->
		<script src="Javascript/navscripts.js"></script>
		<script src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
		<script src="https://cdn.rawgit.com/nnattawat/flip/master/dist/jquery.flip.min.js"></script>
		<script src="Javascript/mobileRecipeScript.js"></script>
		<!--<script src="Javascript/multiOnLoadEventOther.js"></script>-->
	</head>
	<body>
		<div class="topBar">
			<div class="navIcon" onclick="showNavBar()">
				<img src="Images/basket.png" width="100" height="100">
			</div>
			<div id="myTitle">
				<h1 class="topBarTitle">&nbsp;&nbsp;SCAVANGE</h1>
			</div>
		</div>
		<div id="navigationBar" class="navBar hidden">
			<ul class="navBarList">
				<!--<li class="navBarPlaceholder"></li>-->
				<a class="navLink" href="mainFunctionPage.php"><li class="navBarItem">Home</li></a>
				<a class="navLink" href="mobile_recipe2.php"><li class="navBarItem">Recipes</li></a>
				<?php
					if(isLoggedIn()){
						echo '<a class="navLink" href="mobileUpload.php"><li class="navBarItem">Share</li></a>';
						echo '<a class="navLink" href="logout.php"><li class="navBarItem">Logout</li></a>';
					} else{
						echo '<a class="navLink" href="mobile_login.php"><li class="navBarItem">Login</li></a>';
					}
				 ?>

				<a class="navLink" href="mobile_aboutus.php"><li class="navBarItem">About Us</li></a>
				<a class="navLink" href="mobile_affilated.php"><li class="navBarItem">Affilates</li></a>
			</ul>
		</div>
		<div id="navigationBarAlt">
			<ul class="navBarListAlt">
				<a class="navLink" href="mainFunctionPage.php"><li class="navBarItemAlt">Home</li></a>
				<a class="navLink" href="mobile_recipe2.php"><li class="navBarItemAlt">Recipes</li></a>
				<?php
					if(isLoggedIn()){
						echo '<a class="navLink" href="mobileUpload.php"><li class="navBarItem">Share</li></a>';
						echo '<a class="navLink" href="logout.php"><li class="navBarItem">Logout</li></a>';
					} else{
						echo '<a class="navLink" href="mobile_login.php"><li class="navBarItem">Login</li></a>';
					}
				 ?>
				<a class="navLink" href="mobile_aboutus.php"><li class="navBarItemAlt">About Us</li></a>
				<a class="navLink" href="mobile_affilated.php"><li class="navBarItem">Affilates</li></a>
			</ul>
		</div>
		<div id="contentBox">
    <?php if(empty($_GET['id'])){ ?>
		<div class="box">
		<h2>Recipes</h2><br>
			<table id="recipeList">

				<?php
				 	//number of called recipes
					$num_called_recipe=count($tmp_recipe_id)+count($tmp_recipe_id2)+count($tmp_recipe_id0);

					$num1 = 1;
					//for($i=0; $i < $num_called_recipe; $i++){
						if(!empty($tmp_recipe_id)){
						  for($x=0; $x < count($tmp_recipe_id); $x++){
						    $r_id = $tmp_recipe_id[$x];
						    $sql3 = "SELECT * FROM recipesT WHERE recipe_id='$r_id'";
						    $result3 = mysqli_query($conn, $sql3);
						    $row_search = mysqli_fetch_assoc($result3);
								$userid = $row_search['user_id'];
								$sql4 = "SELECT username FROM userT WHERE user_id='$userid'";
								$result4 = mysqli_query($conn, $sql4);
								$row_userid = mysqli_fetch_assoc($result4);

				 ?>
				<tr class="recipeHeading">
					<td class="recipeTitle">Title:<a href=<?php echo '"mobile_recipe_search.php?id='.$r_id.'">'; echo $row_search['title']; ?></a></td>
					<td class="recipeAuthor">Author: <?php echo $row_userid['username']; ?></td>
					<td class="recipeRating">★★★★★</td>
				</tr>
				<tr>
					<td id=<?php echo '"recipeList'.$num1.'"'; ?> class="recipePicture" colspan="3" onclick=<?php echo '"flipper('."'".$num1."'".')"'; ?>>
						<div class="front"style=<?php echo '"background-image:url('.$row_search['image_address'].')"'; ?>>
						</div>
						<div id="description1" class="back" >
							<?php echo $row_search['description']; ?>
						</div>
					</td>
				</tr>

				<?php
				$num1++;}
				}
				if(!empty($tmp_recipe_id2)){
					for($x=0; $x < count($tmp_recipe_id2); $x++){
						$r_id = $tmp_recipe_id2[$x];
						$sql3 = "SELECT * FROM recipesT WHERE recipe_id='$r_id'";
						$result3 = mysqli_query($conn, $sql3);
						$row_search = mysqli_fetch_assoc($result3);
						$userid = $row_search['user_id'];
						$sql4 = "SELECT username FROM userT WHERE user_id='$userid'";
						$result4 = mysqli_query($conn, $sql4);
						$row_userid = mysqli_fetch_assoc($result4);

		 ?>
		<tr class="recipeHeading">
			<td class="recipeTitle">Title:<a href=<?php echo '"mobile_recipe_search.php?id='.$r_id.'">'; echo $row_search['title']; ?></a></td>
			<td class="recipeAuthor">Author: <?php echo $row_userid['username']; ?></td>
			<td class="recipeRating">★★★★★</td>
		</tr>
		<tr>
			<td id=<?php echo '"recipeList'.$num1.'"'; ?> class="recipePicture" colspan="3" onclick=<?php echo '"flipper('."'".$num1."'".')"'; ?>>
				<div class="front" style=<?php echo '"background-image:url('.$row_search['image_address'].')"'; ?>>
				</div>
				<div id="description1" class="back" >
					<?php echo $row_search['description']; ?>
				</div>
			</td>
		</tr>

		<?php
		$num1++;}
		}
		if(!empty($tmp_recipe_id0)){
			for($x=0; $x < count($tmp_recipe_id0); $x++){
				$r_id = $tmp_recipe_id0[$x];
				$sql3 = "SELECT * FROM recipesT WHERE recipe_id='$r_id'";
				$result3 = mysqli_query($conn, $sql3);
				$row_search = mysqli_fetch_assoc($result3);
				$userid = $row_search['user_id'];
				$sql4 = "SELECT username FROM userT WHERE user_id='$userid'";
				$result4 = mysqli_query($conn, $sql4);
				$row_userid = mysqli_fetch_assoc($result4);

		?>
		<tr class="recipeHeading">
		<td class="recipeTitle">Title:<a href=<?php echo '"mobile_recipe_search.php?id='.$r_id.'">'; echo $row_search['title']; ?></a></td>
		<td class="recipeAuthor">Author: <?php echo $row_userid['username']; ?></td>
		<td class="recipeRating">★★★★★</td>
		</tr>
		<tr>
		<td id=<?php echo '"recipeList'.$num1.'"'; ?> class="recipePicture" colspan="3" onclick=<?php echo '"flipper('."'".$num1."'".')"'; ?>>
		<div class="front" style=<?php echo '"background-image:url('.$row_search['image_address'].')"'; ?>>
		</div>
		<div id="description1" class="back" >
			<?php echo $row_search['description']; ?>
		</div>
		</td>
		</tr>

		<?php
		$num1++;}
		}
				//} ?>

			</table>
		</div>
    <?php } else{ ?>
      <?php
        //individual recipe id
        $recipe_id_indi = $_GET['id'];
        $sql_indi = "SELECT * FROM recipesT WHERE recipe_id = '$recipe_id_indi'";
        $result_indi = mysqli_query($conn, $sql_indi);
        if(mysqli_num_rows($result_indi)==1){
          $row_indi = mysqli_fetch_assoc($result_indi);
        }

       ?>
      <br><br>
        <div class="recipeBox">
          <table id="recipeHeading" name="recipeHeading">
            <tr>
              <?php
                $uid_indi = $row_indi['user_id'];
                $sql_indi_un = "SELECT username FROM userT WHERE user_id = '$uid_indi'";
                $result_indi_un = mysqli_query($conn, $sql_indi_un);
                $row_un = mysqli_fetch_assoc($result_indi_un);
               ?>
              <td class="recipeTitle" name="recipeTitle">Title:<?php echo $row_indi['title']; ?></td>
              <td class="recipeAuthor" name="recipeAuthor">Author:<?php echo $row_un['username']; ?></td>
              <td class="recipeRating" name="recipeRating"><img src="Images/star.png"><img src="Images/star.png"><img src="Images/star.png"><img src="Images/star.png"><img src="Images/star.png"></td>
            </tr>
          </table>
          <div class="recipePicture">
            <img id="recipeMainPicture" src=<?php echo '"'.$row_indi['image_address'].'"'; ?>>
          </div>
          <h4 class="ingredientHeading">Ingredients:</h4>
          <div class="ingredientBox">
            <table id="ingredientTable" name="ingredientTable">
              <?php
                $sql_indi_ingre = "SELECT * FROM recipe_ingredientT WHERE recipe_id='$recipe_id_indi'";
                $result_indi_ingre = mysqli_query($conn, $sql_indi_ingre);
                $count=0;
                //while($row_indi_ingre = mysqli_fetch_assoc($result_indi_ingre)){
               ?>
              <tr>
                <td class="ingredientItem">- Item1</td>
                <td class="ingredientItem">- Item2</td>
              </tr>
              <?php //} ?>
              <tr>
                <td class="ingredientItem">- Item3</td>
                <td class="ingredientItem">- Item4</td>
              </tr>
              <tr>
                <td class="ingredientItem">- Item5</td>
                <td class="ingredientItem">- Item6</td>
              </tr>
            </table>
          </div>
          <h4 class="stepHeading">Directions:</h4>
          <div class="stepBox">
            <table id="stepTable" name="stepTable">
              <?php
                $sql_steps = "SELECT * FROM recipe_detailT WHERE recipe_id = '$recipe_id_indi'";
                $result_steps = mysqli_query($conn, $sql_steps);

                while($row_steps = mysqli_fetch_assoc($result_steps)){?>
              <tr>
                <td class="stepItem" style="color:white;"><?php echo $row_steps['detail']; ?></td>
                <td class="stepPicture"><img src="Images/step1.jpg"></td>
              </tr>
              <?php } ?>

            </table>
          </div>
        </div>

      <?php } ?>
		</div>


	</body>
</html>
