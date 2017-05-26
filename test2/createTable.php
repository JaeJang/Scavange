<?php
/*Connect to database*/
$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWD, DB_DATABASE) or die("can't connect");

/*Create table for users*/
//create table
$userTable = "CREATE TABLE IF NOT EXISTS userT (
	user_id INT(100) NOT NULL auto_increment,
	username varchar(100) NOT NULL default '',
	passwd varchar(100) NOT NULL default '',
	email varchar(100) NOT NULL,
	PRIMARY KEY(user_id)
)";

//check for errors
if (mysqli_query($conn, $userTable)) {
	//echo "Table userT created successfully";
} else {
	echo "Error creating table: ". mysqli_error($conn);
}

/*Create table for recipes*/
//create table
$recipeTable = "CREATE TABLE IF NOT EXISTS recipesT(
	recipe_id INT(100) NOT NULL auto_increment,
	user_id INT(100) NOT NULL,
	title varchar(100) NOT NULL,
	description longtext NOT NULL default '',
	image_address longtext,
	PRIMARY KEY(recipe_id),
	FOREIGN KEY(user_id) REFERENCES usersT(user_id) ON DELETE CASCADE
)";

//check for errors
if (mysqli_query($conn, $recipeTable)) {
	//echo "Table recipeT created successfully";
} else {
	echo "Error creating table: ". mysqli_error($conn);
}

/*Create table for ingredients (for recipes)*/
//create table
$ingredientTable = "CREATE TABLE IF NOT EXISTS recipe_ingredientT(
	recipe_ingre_id INT(100) NOT NULL auto_increment,
	recipe_id INT(100) NOT NULL,
	ingredient longtext NOT NULL default '',
	PRIMARY KEY(recipe_ingre_id),
	FOREIGN KEY(recipe_id) REFERENCES recipesT(recipe_id) ON DELETE CASCADE
)";

//check for errors
if (mysqli_query($conn, $ingredientTable)) {
	//echo "Table recipe_ingredientT created successfully";
} else {
	echo "Error creating table: ". mysqli_error($conn);
}

/*Create table for recipe steps*/
//create table
$stepTable = "CREATE TABLE IF NOT EXISTS recipe_detailT(
	detail_id INT(100) NOT NULL auto_increment,
	user_id INT(100) NOT NULL,
	recipe_id INT(100) NOT NULL,
	detail longtext NOT NULL default '',
	PRIMARY KEY(detail_id),
	FOREIGN KEY(user_id) REFERENCES usersT(user_id) ON DELETE CASCADE,
	FOREIGN KEY(recipe_id) REFERENCES recipesT(recipe_id) ON DELETE CASCADE
)";

//check for errors
if (mysqli_query($conn, $stepTable)) {
	//echo "Table recipe_detailT created successfully";
} else {
	echo "Error creating table: ". mysqli_error($conn);
}

/*Close connection*/
mysqli_close($conn);
?>