var counter = 1

function hideRealList() {
	document.getElementById('realList').className += " hidden"
}

function clearBar(id) {
	document.getElementById(id).value = ""
}

function addIngredient() {
	item = document.getElementById('ingredientText').value
	var input = document.getElementById('ingredientText').value;
	if (item != "") {
		/* Make a new paragraph */
		foodList = document.createElement('p')
		foodList.id = "myList" + counter
		foodList.style.borderBottom = "1px solid black"
		foodList.style.overflow = "scroll"
		foodList.style.paddingTop = "20px";

		/* Create text and add text to paragraph */
		var node = document.createTextNode(item)
		foodList.appendChild(node)
		foodList.style.fontSize = "52px"

		/* Initialize x image */
		var img = document.createElement('img')
		img.src = "./Images/cancel.png"
		/* foodList.appendChild(img) */
		img.id = "myImage" + counter
		img.style.height = "50px";
		img.style.width = "50px";
		img.style.cssFloat = "right"
		img.style.clear = "both"
		img.style.marginTop = "20px"
		img.onclick = function() {
			removeIngredient(img.id)
		}

		/* Appent list to masterList */
		realList = document.getElementById('realList')
		document.getElementById('masterList').appendChild(img)
		document.getElementById('masterList').appendChild(foodList)

		/* Update actual list that gets sent */
		realList.value += item + ","

		/* Clears entry bar */
		clearBar('ingredientText')

		/* Ups counter */
		counter++
	}
	if (input == "game"){
		window.location.replace("game.html");
	}
}

function removeIngredient(id) {
	realList = document.getElementById('realList')
	paragraphId = id.replace("myImage", "myList")
	removeItem = document.getElementById(paragraphId).innerHTML
	removeList = document.getElementById(paragraphId)
	removeImage = document.getElementById(id)

	realList.value = realList.value.replace(removeItem + ",", "")
	var parent = removeList.parentNode
	parent.removeChild(removeList)
	parent.removeChild(removeImage)
}
