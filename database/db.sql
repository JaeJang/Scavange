CREATE DATABASE scavange CHARACTER SET utf8 COLLATE utf8_general_ci;

USE scavange;

CREATE TABLE usersT(
  user_id INT NOT NULL auto_increment,
  username varchar(100) NOT NULL default '',
  passwd varchar(100) NOT NULL default '',
  email varchar(100) NOT NULL,
  PRIMARY KEY(user_id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE recipesT(
  recipe_id INT NOT NULL auto_increment,
  user_id INT NOT NULL,
  title varchar(100) NOT NULL,
  description longtext NOT NULL,

  PRIMARY KEY(recipe_id),
  FOREIGN KEY(user_id) REFERENCES usersT(user_id) ON DELETE CASCADE

)ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE recipe_detailT(
  detail_id INT NOT NULL auto_increment,
  user_id INT NOT NULL,
  recipe_id INT NOT NULL,
  detail longtext,

  PRIMARY KEY(detail_id),
  FOREIGN KEY(user_id) REFERENCES usersT(user_id) ON DELETE CASCADE,
  FOREIGN KEY(recipe_id) REFERENCES recipesT(recipe_id) ON DELETE CASCADE
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE ingredientT(
  ingredient_id INT NOT NULL auto_increment,
  recipe_id INT NOT NULL,

  PRIMARY KEY(ingredient_id),
  FOREIGN KEY(recipe_id) REFERENCES recipesT(recipe_id) ON DELETE CASCADE
)ENGINE=InnoDB DEFAULT CHARSET=utf8;
