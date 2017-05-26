window.onload = hideAltNavBar;

var navStatus = "hidden";

function hideAltNavBar() {
	var altnavbar = document.getElementById("navigationBarAlt");
	altnavbar.className = "hidden";
}

/*function showNavBar() {
	var navbar = document.getElementById("navigationBar");
	if (navbar.className == "navBar hidden") {
		navbar.className = "navBar visible";
		$(".navIcon").click(function() {
			$("#navigationBar").slideDown();
		});
	} else if (navbar.className == "navBar visible") {
		navbar.className = "navBar hidden";
		$(".navIcon").click(function() {
			$("#navigationBar").slideUp();
		});
	}
}*/

$(document).ready(function(){
	var navbar = document.getElementById("navigationBar");
	$(".navIcon").click(function(){
		if (navStatus == "hidden") {
			navStatus = "visible";
			$("#navigationBar").slideDown();
		} else if (navStatus == "visible") {
			navStatus = "hidden"
			$("#navigationBar").slideUp();
		}
	});
});