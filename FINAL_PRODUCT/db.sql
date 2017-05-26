 CREATE DATABASE scavange CHARACTER SET utf8 COLLATE utf8_general_ci;

USE scavange;

CREATE TABLE usersT(
  user_id INT(100) NOT NULL auto_increment,
  username varchar(100) NOT NULL default '',
  passwd varchar(100) NOT NULL default '',
  email varchar(100) NOT NULL,
  PRIMARY KEY(user_id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

DROP TABLE recipe_ingredientT;
DROP TABLE recipe_detailT;
DROP TABLE recipesT;
CREATE TABLE recipesT(
  recipe_id INT(100) NOT NULL auto_increment,
  user_id INT(100) NOT NULL,
  title varchar(100) NOT NULL,
  description longtext NOT NULL default '',
  image_address longtext,

  PRIMARY KEY(recipe_id),
  FOREIGN KEY(user_id) REFERENCES usersT(user_id) ON DELETE CASCADE

)ENGINE=InnoDB DEFAULT CHARSET=utf8;




CREATE TABLE recipe_ingredientT(
  recipe_ingre_id INT(100) NOT NULL auto_increment,
  recipe_id INT(100) NOT NULL,
  ingredient longtext NOT NULL default '',
  PRIMARY KEY(recipe_ingre_id),
  FOREIGN KEY(recipe_id) REFERENCES recipesT(recipe_id) ON DELETE CASCADE


)ENGINE=InnoDB DEFAULT CHARSET=utf8;


CREATE TABLE recipe_detailT(
  detail_id INT(100) NOT NULL auto_increment,
  user_id INT(100) NOT NULL,
  recipe_id INT(100) NOT NULL,
  detail longtext NOT NULL default '',

  PRIMARY KEY(detail_id),
  FOREIGN KEY(user_id) REFERENCES usersT(user_id) ON DELETE CASCADE,
  FOREIGN KEY(recipe_id) REFERENCES recipesT(recipe_id) ON DELETE CASCADE
)ENGINE=InnoDB DEFAULT CHARSET=utf8;



SELECT r.recipe_ingre_id, r.recipe_id, i.ingredient FROM recipe_ingredientT as r LEFT JOIN ingredientT AS i ON r.ingredient_id = i.ingredient_id ORDER BY recipe_ingre_id;
SELECT r.recipe_ingre_id, r.recipe_id, i.ingredient FROM recipe_ingredientT as r LEFT JOIN ingredientT AS i ON r.ingredient_id = i.ingredient_id WHERE r.recipe_id=13;
