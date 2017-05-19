var counter = 1;

	function clearBar(id) {
				document.getElementById(id).value = ""
			}

			//Add ingredients to list
	function addIngred(){
		var y = document.getElementById("ingList").value;

			if(y != ""){

				/*Initialize x image*/
				var myImages = document.createElement("IMG");
				myImages.src="Images/x.png";

				/*Give id to x image*/
				myImages.id = "myImage2" + counter;

				/*Append image with input element*/
				document.getElementById('ingredientList').appendChild(myImages);
				myImages.style.cssFloat = "right";
				/*myImages.style.marginRight = "0px";*/
				myImages.style.height = "70px";
				myImages.style.width = "70px";

				/*Calls function to remove item when image is clicked*/
				myImages.onclick = function(){removeInput(myImages.id)};



				var newDiv2 = document.createElement('div');
				var id2 = "newLine2" + counter;

				/*assign newDiv2 an id*/
				newDiv2.id = id2;

				/*Appends input element with new div*/
				document.getElementById('ingredientList').appendChild(newDiv2);


				/*make value of textbox innerHTML*/
				newText2 = document.createElement('textarea');
				newText2.id = "newTextArea2" + counter;
				newText2.value = y;

				document.getElementById('ingredientList').appendChild(newText2);

				newText2.style.resize = "none";
				newText2.style.width = "89%";
				newText2.rows = "1";
				newText2.style.border = "1px solid black";
				newText2.style.borderRadius = "25px";
				newText2.style.padding = "8px 0 8px 5px";
				newText2.style.fontSize = "52px";
				newText2.style.fontWeight = 100;
				newText2.style.height = "52px";
				document.getElementById('ingredientList').style.letterSpacing = "1px";



				/*calls clearBar function to clear textbox*/
				clearBar('ingList');
				counter++
			}
	}

	//Add directions to list
	function addInput(){
		var x = document.getElementById("step").value;

			if(x != ""){

				/*Initialize x image*/
				var myImg = document.createElement("IMG");
				myImg.src="Images/x.png";

				/*Give id to x image*/
				myImg.id = "myImage" + counter;

				/*Append image with input element*/
				document.getElementById('steps').appendChild(myImg);
				myImg.style.cssFloat = "right";
				//myImg.style.marginRight = "10px";
				myImg.style.height = "70px";
				myImg.style.width = "70px";

				/*Calls function to remove item when image is clicked*/
				myImg.onclick = function(){removeInput(myImg.id)};



				var newDiv = document.createElement('div');
				var id = "newLine" + counter;

				/*assign newDiv an id*/
				newDiv.id = id;

				/*Appends input element with new div*/
				document.getElementById('steps').appendChild(newDiv);


				/*make value of textbox innerHTML*/
				newText = document.createElement('textarea');
				newText.id = "newTextArea" + counter;
				newText.value = x;

				document.getElementById('steps').appendChild(newText);

				newText.style.resize = "none";
				newText.style.width = "89%";
				newText.rows = "2";
				newText.style.border = "1px solid black";
				newText.style.borderRadius = "25px";
				newText.style.padding = "8px 0 8px 5px";
				newText.style.fontSize = "52px";
				newText.style.fontWeight = 100;
				newText.style.height = "52px";

				document.getElementById('steps').style.letterSpacing = "1px";



				/*calls clearBar function to clear textbox*/
				clearBar('step');
				counter++
			}
		}

	function removeInput(id){
		var myName = "newTextArea" + id.replace("myImage", "")
		var list = document.getElementById(myName);
		var parent = list.parentNode;
		//removes step
		parent.removeChild(list);
		//removes 'x' image
		parent.removeChild(document.getElementById(id))
	}