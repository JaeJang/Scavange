<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8"/>
		<title>SCAVANGE TEMPLATE</title>
		<!--CSS-->
		<link rel="stylesheet" href="CSS/backbone.css">
		<link rel="stylesheet" href="CSS/mainFunctionStyle.css">
		<link rel="stylesheet" href="CSS/mobile_recipe.css">
		<!--Javascript-->
		<!--<script src="https://www.gstatic.com/firebasejs/3.9.0/firebase.js"></script>
		<script src="Javascript/firebase.js"></script>-->
		<script src="Javascript/navscripts.js"></script>
		<script src="Javascript/mainFunctionScript.js"></script>
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
				<a class="navLink" href="mainFunctionPage.html"><li class="navBarItem">Home</li></a>
				<a class="navLink" href="mobile_recipe.html"><li class="navBarItem">Recipes</li></a>
				<a class="navLink" href="mobileUpload.html"><li id="shareLink" class="navBarItem">Share</li></a>
				<a class="navLink" href="mobile_login.html"><li id="loginLink" class="navBarItem">Login</li></a>
				<div class="navLink" onclick="doLogout()"><li id="logoutLink" class="navBarItem">Logout</li></div>
				<a class="navLink" href="mobile_aboutus.html"><li class="navBarItem">About Us</li></a>
				<a class="navLink" href="mobile_affilated.html"><li class="navBarItem">Affilates</li></a>
			</ul>
		</div>
		<div id="navigationBarAlt">
			<ul class="navBarListAlt">
				<a class="navLink" href="mainFunctionPage.html"><li class="navBarItemAlt">Home</li></a>
				<a class="navLink" href="mobile_recipe.html"><li class="navBarItemAlt">Recipes</li></a>
				<a class="navLink" href="mobileUpload.html"><li class="navBarItemAlt">Share</li></a>
				<a class="navLink" href="mobile_login.html"><li class="navBarItemAlt">Login</li></a>
				<a class="navLink" href="mobile_aboutus.html"><li class="navBarItemAlt">About Us</li></a>
                <a class="navLink" href="mobile_affilated.html"><li class="navBarItem">Affilates</li></a>
			</ul>
		</div>
		<div id="contentBox">
		<div class="box">
		<h2>Recipes</h2><br><br>
			<!--<div id="rightcol0">
				<br><br><br>
                <img src="Images/sampleFood.jpg" class="img1"><br><div id="star">★★★★★</div>
				<br><br><br><br>
				<img src="Images/sampleFood.jpg" class="img1"><br><div id="star">★★★★★</div>
				<br><br><br><br>
                <img src="Images/sampleFood.jpg" class="img1"><br><div id="star">★★★★★</div><br><br><br>
			</div>
			<div id="leftcol0">
                <div id="title">
					<h3>Title:</h3>
				</div>
                <div id="author">
					<h3>Author:</h3>
                </div>
				<div class="content">	
					Refrigedate is a handy web app that is targeted mainly at families, those with roommates, or anyone that shares a fridge. Refrigedate keeps track of everyones leftovers that are in the fridge and shows what everything is, when it's from, and who it belongs to.
				</div>
				<br><br>
			
				<h3>Title:</h3>
                <h3>Author:</h3>
				<div class="content">
					Refrigedate is a handy web app that is targeted mainly at families, those with roommates, or anyone that shares a fridge. Refrigedate keeps track of everyones leftovers that are in the fridge and shows what everything is, when it's from, and who it belongs to.
				</div>
				<br><br>
			
				<h3>Title:</h3>
                <h3>Author:</h3>
				<div class="content">
					Refrigedate is a handy web app that is targeted mainly at families, those with roommates, or anyone that shares a fridge. Refrigedate keeps track of everyones leftovers that are in the fridge and shows what everything is, when it's from, and who it belongs to.
				</div>
				<br><br>
			</div>-->
			<table id="recipeList">
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
				</tr>
			</table>
		</div>
		</div>
				
		
	</body>
	<footer>
		<table class="footerNav">
			<tr>
				<td><a href="mainFunctionPage.php"><img src="Images/basket-orange.png" width="32" height="32"><br>Home</a></td>
				<td><a href="mobile_recipe2.php"><img src="Images/recipe.png" width="32" height="32"><br>Recipes</a></td>
				<td><a href="mobileUpload.php"><img src="Images/share.png" width="32" height="32"><br>Share</a></td>
				<td><a href="mobile_login.php"><img src="Images/login.png" width="32" height="32"><br>Login</a></td>
			</tr>
		</table>
	</footer>
</html>