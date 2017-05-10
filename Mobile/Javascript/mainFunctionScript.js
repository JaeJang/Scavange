var counter = 1

function hideRealList() {
	document.getElementById('realList').className += " hidden"
}

function clearBar(id) {
	document.getElementById(id).value = ""
}

function addIngredient() {
	item = document.getElementById('ingredientText').value

	if (item != "") {
		/*Make a new paragraph*/
		foodList = document.createElement('p')
		foodList.id = "myList" + counter
		foodList.style.borderBottom = "1px solid black"
		foodList.style.overflow = "scroll"
		
		/*Create text and add text to paragraph*/
		var node = document.createTextNode(item)
		foodList.appendChild(node)
		
		/*Initialize x image*/
		var img = document.createElement('img')
		img.src = "./Images/cancel.png"
		/*foodList.appendChild(img)*/
		img.id = "myImage" + counter
		img.style.cssFloat = "right"
		img.style.marginTop = "8px"
		img.onclick = function(){removeIngredient(img.id)}
		
		/*Appent list to masterList*/
		realList = document.getElementById('realList')
		document.getElementById('masterList').appendChild(img)
		document.getElementById('masterList').appendChild(foodList)
		
		/*Update actual list that gets sent*/
		realList.value += item + ","
		
		/*Clears entry bar*/
		clearBar('ingredientText')
		
		/*Ups counter*/
		counter++
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
	
	/*document.getElementById(id).style.display = "none"
	document.getElementById(paragraphId).style.display = "none"*/
	
	//regex's not necessary!
	/*var regex = new RegExp(removeItem)*/
	
	//old parse string function. No longer needed
	/*var tempList = realList.value.split(",")
	var i = 0
	while (i < tempList.length) {
		if (tempList[i] == removeItem) {
			tempList[i] = ""
			i = tempList.length
		} else {
			i++
		}
	}
	
	var myList = ""
	for (var j = 0; j < tempList.length; j++) {
		if (tempList[i] != "") {
			myList += tempList[j] + ","
		}
	}
	
	realList.value = myList;*/
}
