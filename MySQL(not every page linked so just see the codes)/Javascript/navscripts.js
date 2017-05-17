window.onload = hideAltNavBar;

function hideAltNavBar() {
	var altnavbar = document.getElementById("navigationBarAlt");
	altnavbar.className = "hidden";
}

function showNavBar() {
	var navbar = document.getElementById("navigationBar");
	if (navbar.className == "navBar hidden") {
		navbar.className = "navBar visible";
	} else if (navbar.className == "navBar visible") {
		navbar.className = "navBar hidden";
	}
}