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
		<link rel="stylesheet" href="CSS/loadingStyle.css">
		<link href="https://fonts.googleapis.com/css?family=Josefin+Sans" rel="stylesheet">
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.5.2/jquery.min.js"></script>
		<script src="http://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.2/modernizr.js"></script>
		<script src="Javascript/loadingScript.js"></script>
		<script src="Javascript/navscripts.js"></script>
		<script src="Javascript/mobileUpload.js"></script>
	</head>
	<body>
		<div class="topBar">
			<div class="navIcon">
				<img src="Images/basket.png" width="100" height="100">
			</div>
			<div id="myTitle">
				<h1 class="topBarTitle">&nbsp;&nbsp;SCAVANGE</h1>
			</div>
		</div>
		<div id="navigationBar" class="navBar">
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

				<a class="navLink" href="mobile_affilated.php"><li class="navBarItem">Affiliates</li></a>
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
				<a class="navLink" href="mobile_affilated.php"><li class="navBarItem">Affiliates</li></a>
			</ul>
		</div>
		
		<div id="main">
			<div id="create">
				<span style="color: black">Recipe Creation</span><br><br>
			</div>
		<form action="newRecipe.php" method="post" enctype="multipart/form-data">
			<div id="nameLabel">
				<label id="recLabel" class="unbold" for="name"><span style="color: black"><br>Recipe Name</span>
				</label>
				<hr>
				<div id="name">
					<input type="text" name="recName">
				</div>
			</div>
			<br><br>
			<div id="uploadLabel">
				<label id="upLabel" class="unbold" for="myPicture"><span style="color: black">Upload a picture:</span></label><hr>
				<br>
				<input id="myPicture" type="file" name="pic">
			</div>
			<br><br>
			<div id="placeholder">
				<label id="desLabel" class="unbold" for="describe"><span style="color: black">Description:</span></label><hr>
				<br>
				<div id="description">
					<textarea name="describe" class="describe" cols="30" rows="10" placeholder="Short description of recipe"></textarea>
				</div>
			</div>
			<div id="info">
				<label id="ingredient"><span style="color: black"><br>Ingredients:</span></label><hr>
				<br>
			</div>
			<div class="ingredContain">
				<div id="ingredientList">
					<textarea name="ingList" id="ingList" class="ingredientArea" rows="1" placeholder="Press '+' after each step"></textarea>
					<img src="Images/add.png" alt="Add Ingredients" height="70" width="70" class="addOn" onclick="addIngred()">
				</div>
			</div>
			<div id="stepLabel">
				<label id="recStep" class="unbold"><span style="color: black"><br>Directions:</span></label><hr><br>
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
	<div class="se-pre-con">
	</div>
</html>
