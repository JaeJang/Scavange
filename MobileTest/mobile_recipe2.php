<?php
include('functions.php');
require_once('config.php');
session_start();

$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWD, DB_DATABASE) or die("can't connect");

$sql_recipesT = "SELECT * FROM recipesT ORDER BY recipe_id DESC";
$result_recipesT = mysqli_query($conn, $sql_recipesT);


$num=1;
$uN = array();
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
						<?php while($row = mysqli_fetch_assoc($result_recipesT)){ ?>
						<tr class="recipeHeading">
							<td class="recipeTitle"><a href=<?php echo '"mobile_recipe2.php?id='.$row['recipe_id'].'"'?>><!--Title: --><?php echo $row['title']; ?></a></td>
							<?php
							$recipe_id = $row['recipe_id'];
							$uid = $row['user_id'];
							$sql_userT = "SELECT username FROM userT WHERE user_id = '$uid'";
							$result_userT = mysqli_query($conn, $sql_userT);
							$row_user = mysqli_fetch_assoc($result_userT);

							?>
							<td class="recipeAuthor"><!--Author:--><?php echo $row_user['username'];; ?> </td>
							<td class="recipeRating" name="recipeRating" style="font-size:25px;">
							<?php
								$sql_rate = "SELECT AVG(rate) FROM recipe_rateT WHERE recipe_id='$recipe_id'";
								$result_rate = mysqli_query($conn, $sql_rate);
								$row_rate = mysqli_fetch_row($result_rate);
								$average = round($row_rate[0]);
								//print stars based on average
								for($z=0; $z < $average; $z++){
									echo '<img src="Images/star.png">';
								}

								//number of people who voted
								$sql_num_voted = "SELECT * FROM recipe_rateT WHERE recipe_id='$recipe_id'";
								$result_num_voted = mysqli_query($conn, $sql_num_voted);
								$num_voted = mysqli_num_rows($result_num_voted);
								echo "($num_voted voted)";
							 ?>
							<!-- <img src="Images/star.png"><img src="Images/star.png"><img src="Images/star.png"><img src="Images/star.png"><img src="Images/star.png"> -->
							</td>
						</tr>
						<tr>
							<td id=<?php echo '"recipeList'.$num.'"'; ?> class="recipePicture" colspan="3" onclick=<?php echo '"flipper('."'".$num."'".')"'; ?>>
								<div class="front" style=<?php echo '"background-image:url('.$row['image_address'].')"'; ?>>
								</div>
								<div id="description1" class="back">
									<?php echo $row['description']; ?>
								</div>
							</td>
						</tr>
						<?php $num++;
						} ?>
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
								<td class="recipeTitle" name="recipeTitle"><!--Title:--><?php echo $row_indi['title']; ?></td>
								<td class="recipeAuthor" name="recipeAuthor"><!--Author:--><?php echo $row_un['username']; ?></td>
								<!-- rating calculate -->
								<td class="recipeRating" name="recipeRating">
								<?php
									$sql_rate = "SELECT AVG(rate) FROM recipe_rateT WHERE recipe_id='$recipe_id_indi'";
									$result_rate = mysqli_query($conn, $sql_rate);
									$row_rate = mysqli_fetch_row($result_rate);
									$average = round($row_rate[0]);
									//print stars based on average
									for($z=0; $z < $average; $z++){
										echo '<img src="Images/star.png">';
									}

									//number of people who voted
									$sql_num_voted = "SELECT * FROM recipe_rateT WHERE recipe_id='$recipe_id_indi'";
									$result_num_voted = mysqli_query($conn, $sql_num_voted);
									$num_voted = mysqli_num_rows($result_num_voted);
									echo "($num_voted voted)";
								 ?>
								<!-- <img src="Images/star.png"><img src="Images/star.png"><img src="Images/star.png"><img src="Images/star.png"><img src="Images/star.png"> -->
								</td>
							</tr>
						</table>
						<?php if(isLoggedIn()){ ?>
							<form action="rating.php" method="post" style="float:right;">
								<input type="hidden" name="recipe_id" value=<?php echo '"'.$recipe_id_indi.'"'; ?>>
								<select class="" name="rate" size="1" onchange="this.form.submit();"
								style="width:150px; font-size:46px; background-color:orange;color:white;
								font-family: 'Josefin Sans', sans-serif; border-radius: 25px;">
									<option value="">rate</option>
									<option value="1">1</option>
									<option value="2">2</option>
									<option value="3">3</option>
									<option value="4">4</option>
									<option value="5">5</option>

								</select>

							</form>
						<?php } ?>
						<div class="recipePicture">
							<img id="recipeMainPicture" src=<?php echo '"'.$row_indi['image_address'].'"'; ?>>
						</div>
						<h4 class="ingredientHeading">Ingredients:</h4>
						<div class="ingredientBox">
							<table id="ingredientTable" name="ingredientTable">

								<?php
								$sql_indi_ingre = "SELECT * FROM recipe_ingredientT WHERE recipe_id='$recipe_id_indi'";
								$result_indi_ingre = mysqli_query($conn, $sql_indi_ingre);
								$number_ingre = mysqli_num_rows($result_indi_ingre);
								$count = 1;
								while($row_ingre = mysqli_fetch_assoc($result_indi_ingre)){
									if($count % 2 == 1){
								 ?>
								 <tr>
									 <td class="ingredientItem"><?php echo $count . ". " . $row_ingre['ingredient'];
 									$count++;?></td>

								 <?php } else{ ?>
									 <td class="ingredientItem"><?php echo $count . ". " . $row_ingre['ingredient'];
 									$count++;?></td>
								</tr>
								<?php } ?>
								<?php }
								if($number_ingre % 2 == 1){
									echo '</tr>';
								}?>
							</table>
						</div>
						<h4 class="stepHeading">Directions:</h4>
						<div class="stepBox">
							<table id="stepTable" name="stepTable">
								<?php
									$sql_steps = "SELECT * FROM recipe_detailT WHERE recipe_id = '$recipe_id_indi'";
									$result_steps = mysqli_query($conn, $sql_steps);
									$stepCount = 1;
								 	while($row_steps = mysqli_fetch_assoc($result_steps)){?>
								<tr>
									<td class="stepNumber"><?php echo $stepCount . ". ";?>
									<td class="stepItem"><?php echo $row_steps['detail']; ?></td>
									<!--<td class="stepPicture"><img src="Images/step1.jpg"></td>-->
								</tr>
								<?php $stepCount++;
									} ?>
							</table>
						</div>
					</div>
				<?php } ?>
		</div>
	</body>
</html>
