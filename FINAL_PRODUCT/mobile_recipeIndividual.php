<?php
include('functions.php');
require_once('config.php');
session_start();
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8"/>
		<title>SCAVANGE TEMPLATE</title>
		<link rel="stylesheet" href="CSS/backbone.css">
		<link rel="stylesheet" href="CSS/mobileRecipeIndividualStyle.css">
		<link href="https://fonts.googleapis.com/css?family=Josefin+Sans" rel="stylesheet">
		<script src="Javascript/navscripts.js"></script>
		<!--<script src="Javascript/multiOnLoadEvent.js"></script>-->
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

				<a class="navLink" href="mobile_affilated.php"><li class="navBarItem">Affilates</li></a>
				<a class="navLink" href="mobile_aboutUs2.php"><li class="navBarItem">About Us &amp; Credits</li></a>
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
				<a class="navLink" href="mobile_affilated.php"><li class="navBarItem">Affilates</li></a>
				<a class="navLink" href="mobile_aboutUs2.php"><li class="navBarItem">About Us &amp; Credits</li></a>
			</ul>
		</div>
		<div id="contentBox">
		<br><br>
			<div class="recipeBox">
				<table id="recipeHeading" name="recipeHeading">
					<tr>
						<td class="recipeTitle" name="recipeTitle">Title:</td>
						<td class="recipeAuthor" name="recipeAuthor">Author:</td>
						<td class="recipeRating" name="recipeRating"><img src="Images/star.png"><img src="Images/star.png"><img src="Images/star.png"><img src="Images/star.png"><img src="Images/star.png"></td>
					</tr>
				</table>
				<div class="recipePicture">
					<img id="recipeMainPicture" src="Images/sampleFood.jpg">
				</div>
				<h4 class="ingredientHeading">Ingredients:</h4>
				<div class="ingredientBox">
					<table id="ingredientTable" name="ingredientTable">
						<tr>
							<td class="ingredientItem">- Item1</td>
							<td class="ingredientItem">- Item2</td>
						</tr>
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
						<tr>
							<td class="stepItem">Step1</td>
							<td class="stepPicture"><img src="Images/step1.jpg"></td>
						</tr>
						<tr>
							<td class="stepItem">Step2</td>
							<td class="stepPicture"><img src="Images/step1.jpg"></td>
						</tr>
						<tr>
							<td class="stepItem">Step3</td>
							<td class="stepPicture"><img src="Images/step1.jpg"></td>
						</tr>
						<tr>
							<td class="stepItem">Step4</td>
							<td class="stepPicture"><img src="Images/step1.jpg"></td>
						</tr>
					</table>
				</div>
			</div>
		</div>
	</body>
	<footer>
		<table class="footerNav">
			<tr>
				<td><a href="mainFunctionPage.php"><img src="Images/basket-orange.png" width="32" height="32"><br>Home</a></td>
				<td><a href="mobile_recipe2.php"><img src="Images/recipe.png" width="32" height="32"><br>Recipes</a></td>
				<?php
					if(isLoggedIn()){
				 ?>
				<td><a href="mobileUpload.php"><img src="Images/share.png" width="32" height="32"><br>Share</a></td>
				<td><a href="logout.php"><img src="Images/logout.png" width="32" height="32"><br>Logout</a></td>
				<?php } else{ ?>
					<td><a href="#" onclick="notloggedin()"><img src="Images/share.png" width="32" height="32"><br>Share</a></td>
					<td><a href="mobile_login.php"><img src="Images/login.png" width="32" height="32"><br>Login</a></td>
					<?php }
					echo '<script type="text/javascript">
						function notloggedin(){
							alert("Please log in for sharing");
						}
					</script>'; ?>
			</tr>
		</table>
	</footer>
</html>
