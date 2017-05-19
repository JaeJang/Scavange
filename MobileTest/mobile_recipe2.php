<?php
include('functions.php');
require_once('config.php');
session_start();

$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWD, DB_DATABASE) or die("can't connect");

$sql_recipesT = "SELECT * FROM recipesT ORDER BY recipe_id DESC";
$result_recipesT = mysqli_query($conn, $sql_recipesT);


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
		<div class="box">
		<h2>Recipes</h2><br>
			<table id="recipeList">
				<!--<tr>
					<td class="recipeImage"><img src="Images/sampleFood.jpg" class="img1"></td>
					<td rowspan="2" class="recipeInfo">
						<div class="recipeDescription">
							Title: <br>
							Author: <br><br>
							Refrigedate is a handy web app that is targeted mainly at families, those with roommates, or anyone that shares a fridge. Refrigedate keeps track of everyones leftovers that are in the fridge and shows what everything is, when it's from, and who it belongs to.
						</div>
					</td>
				</tr>
				<tr>
					<td class="recipeRating">★★★★★</td>
				</tr>
				<tr>
					<td class="recipeImage"><img src="Images/sampleFood.jpg" class="img1"></td>
					<td rowspan="2" class="recipeInfo">
						<div class="recipeDescription">
							Title: <br>
							Author: <br><br>
							Refrigedate is a handy web app that is targeted mainly at families, those with roommates, or anyone that shares a fridge. Refrigedate keeps track of everyones leftovers that are in the fridge and shows what everything is, when it's from, and who it belongs to.
						</div>
					</td>
				</tr>
				<tr>
					<td class="recipeRating">★★★★★</td>
				</tr>-->
				<?php while($row = mysqli_fetch_assoc($result_recipesT)){ ?>
				<tr class="recipeHeading">
					<td class="recipeTitle">Title: <?php echo $row['title']; ?></td>
					<?php
					$uid = $row['user_id'];
					$sql_userT = "SELECT username FROM userT WHERE user_id = '$uid'";
					$result_userT = mysqli_query($conn, $sql_userT);
					$row_user = mysqli_fetch_assoc($result_userT);
					?>
					<td class="recipeAuthor">Author:<?php echo $row_user['username']; ?> </td>
					<td class="recipeRating">★★★★★</td>
				</tr>
				<tr>
					<td id=<?php echo '"recipeList'.$num.'"'; ?>"recipeList1" class="recipePicture" colspan="3" onclick=<?php echo '"flipper('."'".$num."'".')"'; ?>>
						<div class="front" style=<?php echo '"background-image:url('.$row['image_address'].')"'; ?>>
						</div>
						<div id="description1" class="back">
							<?php echo $row['description']; ?>
						</div>
					</td>
				</tr>
				<?php $num++;
				} ?>


				<!-- <tr class="recipeHeading">
					<td class="recipeTitle">Title: </td>
					<td class="recipeAuthor">Author: </td>
					<td class="recipeRating">★★★★★</td>
				</tr>
				<tr>
					<td id="recipeList2" class="recipePicture" colspan="3" onclick="flipper('2')">
						<div class="front">
						</div>
						<div id="description1" class="back">
							Refrigedate is a handy web app that is targeted mainly at families, those with roommates, or anyone that shares a fridge. Refrigedate keeps track of everyones leftovers that are in the fridge and shows what everything is, when it's from, and who it belongs to.
						</div>
					</td>
				</tr> -->
			</table>
		</div>
		</div>


	</body>
</html>
