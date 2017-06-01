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
		<link rel="stylesheet" href="CSS/mainFunctionStyle.css">
		<link rel="stylesheet" href="CSS/affpage.css">
		<link rel="stylesheet" href="CSS/loadingStyle.css">
		<link href="https://fonts.googleapis.com/css?family=Josefin+Sans" rel="stylesheet">
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.5.2/jquery.min.js"></script>
		<script src="http://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.2/modernizr.js"></script>
		<script src="Javascript/loadingScript.js"></script>
		<script src="Javascript/navscripts.js"></script>
		<script src="Javascript/mainFunctionScript.js"></script>
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
				<a class="navLink" href="mobile_affilate.php"><li class="navBarItem">Affiliates</li></a>
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
				<a class="navLink" href="mobile_affilate.php"><li class="navBarItemAlt">Affiliates</li></a>
			</ul>
		</div>
		<div id="contentBox">
		<div class="box">
		<div class="affiliate">
			<h1>Affiliated Webpages</h1><br><br>
		</div>
			<table class="relationTable">
				<tr>
					<td><a href="http://refrigedate.me/#/"><img src="Images/Refrigedate.png" class="img1"></a></td>
					<td><h3>Refrigedate</h3><hr>
						<div class="content">Refrigedate is a handy web app that is targeted mainly at families, those with roommates, or anyone that shares a fridge. Refrigedate keeps track of everyones leftovers that are in the fridge and shows what everything is, when it's from, and who it belongs to. By allowing multiple users to easily add, remove, and keep track of whats in their fridge they can make sure that no food goes bad and ultimately goes to waste. </div>
					</td>
				</tr>
				<tr>
					<td><a href="http://xyz-online.xyz/"><img src="Images/Freshness.png" class="img1"></a></td>
					<td><h3>Freshness</h3><hr>
						<div class="content">Provides food preservation methods for you to keep your food fresh as long as you can!! A great way to preserve your soon expiring leftovers. </div>
					</td>
				</tr>
				<tr>
					<td><a href="https://wastebook-2e70b.firebaseapp.com/"><img src="Images/group5.png" class="img1"></a></td>
					<td><h3>WasteBook</h3><hr>
						<div class="content">Food waste manager for fruits and vegetables. Users can track your waste usage. Compete with other users in a quest to become the number one non food waster!! Gives statistics and feedback based on your inputs.</div>
					</td>
				</tr>
				
			</table>
		
		<!--
			<div id="rightcol0">
			<br><br>
			<a href="http://refrigedate.me/#/"><img src="Images/Refrigedate.png" class="img1"></a><br><br><br><br><br>
			<a href="http://xyz-online.xyz/"><img src="Images/Freshness.png" class="img1"></a><br><br><br><br><br><br>
			<a href="https://wastebook-2e70b.firebaseapp.com/"><img src="Images/group5.png" class="img1"></a><br><br><br><br>
			</div>
			<div id="leftcol0">
			<h3>Refrigedate</h3><hr>
			<div class="content">
			Refrigedate is a handy web app that is targeted mainly at families, those with roommates, or anyone that shares a fridge. Refrigedate keeps track of everyones leftovers that are in the fridge and shows what everything is, when it's from, and who it belongs to. By allowing multiple users to easily add, remove, and keep track of whats in their fridge they can make sure that no food goes bad and ultimately goes to waste. </div><br><br>

			<h3>Freshness</h3><hr>
			<div class="content">Provides food preservation methods for you to keep your food fresh as long as you can!! A great way to preserve your soon
			expiring leftovers. </div><br><br>

			<h3>WasteBook</h3><hr>
			<div class="content">Food waste manager for fruits and vegetables. Users can track your waste usage. Compete with other users in a quest to become the number one non food waster!! Gives statistics and feedback based on your inputs.</div><br><br>
			</div>
		-->
					</div>
					</div>
				</form>
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
				<td><a href="logout.php"><img src="Images/login.png" width="32" height="32"><br>Logout</a></td>
				<?php } else{ ?>
					<td><a href="#" onclick="notloggedin()"><img src="Images/share.png" width="32" height="32"><br>Share</a></td>
					<td><a href="mobile_login.php"><img src="Images/share.png" width="32" height="32"><br>Login</a></td>
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
