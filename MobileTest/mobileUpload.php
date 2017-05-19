<?php
include('functions.php');
require_once('config.php');
session_start();
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8"/>
		<title>SCAVANGE</title>
		<link rel="stylesheet" href="CSS/backbone.css">
		<link rel="stylesheet" href="CSS/mobileUpload.css">
		<link href="https://fonts.googleapis.com/css?family=Josefin+Sans" rel="stylesheet">
		<script src="Javascript/navscripts.js"></script>
		<script src="Javascript/mobileUpload.js"></script>
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
		<br><br>
		<div id="main">
			<div id="create">
				<span style="color: orange">Recipe Creation</span>
			</div>
		<form action="" method="post">
			<div id="nameLabel">
				<label id="recLabel" class="unbold" for="name"><span style="color: white"><br>Recipe Name</span></label>
				<br><br>
				<div id="name">
					<input type="text" name="recName">
				</div>
			</div>
			<br><br>
			<div id="uploadLabel">
				<label id="upLabel" class="unbold" for="myPicture"><span style="color: white">Upload a picture:</span></label>
				<br><br>
				<input id="myPicture" type="file" name="pic">
			</div>
			<br><br><br>
			<div id="placeholder">
				<label id="desLabel" class="unbold" for="describe"><span style="color: white">Description:</span></label>
				<br>
				<div id="description"><br>
					<textarea name="describe" class="describe" cols="30" rows="10" placeholder="Short description of recipe"></textarea>
				</div>
			</div>
			<div id="info">
				<label id="ingredient"><span style="color: white"><br>Ingredients:</span></label>
				<br><br>
			</div>
			<div class="ingredContain">
				<div id="ingredientList">
					<textarea name="ingList" id="ingList" class="ingredientArea" rows="1" placeholder="Press '+' after each step"></textarea>
					<img src="Images/add.png" alt="Add Ingredients" height="70" width="70" class="addOn" onclick="addIngred()">
				</div>
			</div>
			<div id="stepLabel">
				<label id="recStep" class="unbold"><span style="color: white"><br>Directions:</span></label><br><br>
			</div>
			<div class = "formContain">
				<div id="steps">
					<textarea name="singleStep" id="singleStep" class="direction" rows="1" placeholder="Press '+' after each step"></textarea>
					<img src="Images/add.png" alt="Add Ingredients" height="70" width="70" class="addOn" onclick="addInput()">
				</div>
			</div>
			<div id="submit">
				<input type="submit" value="Finish">
			</div>
		</form>
	</div>
	</body>
</html>
