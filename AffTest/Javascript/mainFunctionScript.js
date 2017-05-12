function clearBar(id) {
	document.getElementById(id).value = ""
}

function addIngredient(id) {
	item = document.getElementById('ingredientText').value
	
	if (item != "") {
		realList = document.getElementById('realList')
		foodList = document.getElementById(id)
		realList.value += item + ",";
		foodList.innerHTML += item + "<br>"
		clearBar('ingredientText')
	}
}
