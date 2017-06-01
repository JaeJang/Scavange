<?php
include('functions.php');
require_once('config.php');
session_start();

$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWD, DB_DATABASE) or die("can't connect");

//get user typed ingredient and split them and store them into array
$left = mysqli_real_escape_string($conn, $_POST['leftover']);
$left2 = stringSplit($left);

//number of ingredients typed from user
$num_ingre = count($left2);



$sql1 = "SELECT * FROM recipesT ORDER BY recipe_id ASC";
$result1 = mysqli_query($conn, $sql1);
//number of recipes existed in database
$num = mysqli_num_rows($result1);
$last_recipe_id=0;

$tmp_recipe_id =array();
$tmp_recipe_id2 = array();
$tmp_recipe_id0 = array();

//matching process
//for($x=1; $x < $last_recipe_id+1; $x++){

  /*$sql2 = "SELECT * FROM recipe_ingredientT WHERE recipe_id='$x'";
  $result2 = mysqli_query($conn, $sql2);
  $count =0;
  while($row = mysqli_fetch_assoc($result2)){*/
  while($row = mysqli_fetch_assoc($result1)){
    $last_recipe_id = $row['recipe_id'];

    $count=0;
    for($y=0; $y< $num_ingre; $y++){
      $sql2_1 = "SELECT * FROM recipe_ingredientT WHERE ingredient LIKE '%$left2[$y]%' and recipe_id='$last_recipe_id'";
      $result2_1 = mysqli_query($conn, $sql2_1);
      if(mysqli_num_rows($result2_1) > 0){
        $count++;

      }

    }
    if($num_ingre >2){
      if($count == $num_ingre){
        $tmp_recipe_id[] = $last_recipe_id;
      } else if($count >= 2 && $count < $num_ingre){
        $tmp_recipe_id2[] = $last_recipe_id;
      }
    } else if($num_ingre > 0 && $count >0){
      $tmp_recipe_id0[] = $last_recipe_id;
    }
//  }
//}
}

$num=1;

?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8"/>
		<title>SCAVANGE</title>
		<!--CSS-->
		<link rel="stylesheet" href="CSS/backbone.css">
		<link rel="stylesheet" href="CSS/mainFunctionStyle.css">
		<link rel="stylesheet" href="CSS/mobile_recipe2.css">
		<link rel="stylesheet" href="CSS/loadingStyle.css">
		<link rel="stylesheet" href="CSS/mobileRecipeIndividualStyle.css">
		<link href="https://fonts.googleapis.com/css?family=Josefin+Sans" rel="stylesheet">
		<!--Javascript-->
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.5.2/jquery.min.js"></script>
		<script src="http://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.2/modernizr.js"></script>
		<script src="Javascript/loadingScript.js"></script>
		<script src="Javascript/navscripts.js"></script>
		<script src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
		<script src="https://cdn.rawgit.com/nnattawat/flip/master/dist/jquery.flip.min.js"></script>
		<script src="Javascript/mobileRecipeScript.js"></script>
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

				<a class="navLink" href="mobile_affilated.php"><li class="navBarItem">Affilates</li></a>
				<a class="navLink" href="mobile_aboutUs2.php"><li class="navBarItem">About Us &amp; Credits</li></a>
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
				<a class="navLink" href="mobile_affilated.php"><li class="navBarItem">Affilates</li></a>
				<a class="navLink" href="mobile_aboutUs2.php"><li class="navBarItem">About Us &amp; Credits</li></a>
			</ul>
		</div>
		<div id="contentBox">
    <?php if(empty($_GET['id'])){ ?>
      <div class="box">
        <h1 class="myTitle">Recipes</h1>
      </div>
      <div class="myRecipe">
			<!-- <table id="recipeList"> -->

				<?php
				 	//number of called recipes
					$num_called_recipe=count($tmp_recipe_id)+count($tmp_recipe_id2)+count($tmp_recipe_id0);

					$num1 = 1;
					//for($i=0; $i < $num_called_recipe; $i++){
						if(!empty($tmp_recipe_id)){
						  for($x=0; $x < count($tmp_recipe_id); $x++){
						    $r_id = $tmp_recipe_id[$x];
						    $sql3 = "SELECT * FROM recipesT WHERE recipe_id='$r_id'";
						    $result3 = mysqli_query($conn, $sql3);
						    $row_search = mysqli_fetch_assoc($result3);
								$userid = $row_search['user_id'];
								$sql4 = "SELECT username FROM userT WHERE user_id='$userid'";
								$result4 = mysqli_query($conn, $sql4);
								$row_userid = mysqli_fetch_assoc($result4);

				 ?>
         <table class="recipeTable">
				<tr class="recipeHeading">
					<td class="recipeTitleList"><a href=<?php echo '"mobile_recipe_search.php?id='.$r_id.'">'; echo $row_search['title']; ?></a></td>
					<td class="recipeAuthorList"><?php echo $row_userid['username']; ?></td>
          <td class="recipeRatingList" name="recipeRating">
          <?php
            $sql_rate = "SELECT AVG(rate) FROM recipe_rateT WHERE recipe_id='$r_id'";
            $result_rate = mysqli_query($conn, $sql_rate);
            $row_rate = mysqli_fetch_row($result_rate);
            $average = round($row_rate[0]);
            //print stars based on average
            for($z=0; $z < $average; $z++){
              echo '<img src="Images/star.png">';
            }

            //number of people who voted
            $sql_num_voted = "SELECT * FROM recipe_rateT WHERE recipe_id='$r_id'";
            $result_num_voted = mysqli_query($conn, $sql_num_voted);
            $num_voted = mysqli_num_rows($result_num_voted);
            echo "($num_voted voted)";
           ?>
          <!-- <img src="Images/star.png"><img src="Images/star.png"><img src="Images/star.png"><img src="Images/star.png"><img src="Images/star.png"> -->
          </td>
				</tr>
        <tr>
    			<td id=<?php echo '"recipeList'.$num1.'"'; ?> class="recipePicture" colspan="3">
            <div id=<?php echo'"recipeFront'.$num1.'"';?> class="front" style=<?php echo '"background-image:url('.$row_search['image_address'].');"';?> onclick=<?php
              $frontID = 'recipeFront' . $num1;
              echo '"' . 'flip(\'' . $frontID . '\')"';
            ?>>
            </div>
            <!--  -->

            <!--  -->
            <div id=<?php echo'"description'.$num1.'"';?> class="back" onclick=<?php
              $backID = 'description' . $num1;
              echo '"' . 'flip(\'' . $backID . '\')"';
            ?>>
              <p><?php echo $row_search['description']; ?></p>
            </div>
    			</td>
    		</tr>
        </table>
				<?php
				$num1++;}
				}
				if(!empty($tmp_recipe_id2)){
					for($x=0; $x < count($tmp_recipe_id2); $x++){
						$r_id = $tmp_recipe_id2[$x];
						$sql3 = "SELECT * FROM recipesT WHERE recipe_id='$r_id'";
						$result3 = mysqli_query($conn, $sql3);
						$row_search = mysqli_fetch_assoc($result3);
						$userid = $row_search['user_id'];
						$sql4 = "SELECT username FROM userT WHERE user_id='$userid'";
						$result4 = mysqli_query($conn, $sql4);
						$row_userid = mysqli_fetch_assoc($result4);

		 ?>
     <table class="recipeTable">
    <tr class="recipeHeading">
      <td class="recipeTitleList"><a href=<?php echo '"mobile_recipe_search.php?id='.$r_id.'">'; echo $row_search['title']; ?></a></td>
      <td class="recipeAuthorList"><?php echo $row_userid['username']; ?></td>
      <td class="recipeRatingList" name="recipeRating">
      <?php
        $sql_rate = "SELECT AVG(rate) FROM recipe_rateT WHERE recipe_id='$r_id'";
        $result_rate = mysqli_query($conn, $sql_rate);
        $row_rate = mysqli_fetch_row($result_rate);
        $average = round($row_rate[0]);
        //print stars based on average
        for($z=0; $z < $average; $z++){
          echo '<img src="Images/star.png">';
        }

        //number of people who voted
        $sql_num_voted = "SELECT * FROM recipe_rateT WHERE recipe_id='$r_id'";
        $result_num_voted = mysqli_query($conn, $sql_num_voted);
        $num_voted = mysqli_num_rows($result_num_voted);
        echo "($num_voted voted)";
       ?>
      <!-- <img src="Images/star.png"><img src="Images/star.png"><img src="Images/star.png"><img src="Images/star.png"><img src="Images/star.png"> -->
      </td>
		</tr>
		<tr>
			<td id=<?php echo '"recipeList'.$num1.'"'; ?> class="recipePicture" colspan="3">
        <div id=<?php echo'"recipeFront'.$num1.'"';?> class="front" style=<?php echo '"background-image:url('.$row_search['image_address'].');"';?> onclick=<?php
          $frontID = 'recipeFront' . $num1;
          echo '"' . 'flip(\'' . $frontID . '\')"';
        ?>>
        </div>
        <!--  -->

        <!--  -->
        <div id=<?php echo'"description'.$num1.'"';?> class="back" onclick=<?php
          $backID = 'description' . $num1;
          echo '"' . 'flip(\'' . $backID . '\')"';
        ?>>
          <p><?php echo $row_search['description']; ?></p>
        </div>
			</td>
		</tr>
  </table>
		<?php
		$num1++;}
		}
		if(!empty($tmp_recipe_id0)){
			for($x=0; $x < count($tmp_recipe_id0); $x++){
				$r_id = $tmp_recipe_id0[$x];
				$sql3 = "SELECT * FROM recipesT WHERE recipe_id='$r_id'";
				$result3 = mysqli_query($conn, $sql3);
				$row_search = mysqli_fetch_assoc($result3);
				$userid = $row_search['user_id'];
				$sql4 = "SELECT username FROM userT WHERE user_id='$userid'";
				$result4 = mysqli_query($conn, $sql4);
				$row_userid = mysqli_fetch_assoc($result4);

		?>
    <table class="recipeTable">
   <tr class="recipeHeading">
     <td class="recipeTitleList"><a href=<?php echo '"mobile_recipe_search.php?id='.$r_id.'">'; echo $row_search['title']; ?></a></td>
     <td class="recipeAuthorList"><?php echo $row_userid['username']; ?></td>
     <td class="recipeRatingList" name="recipeRating">
    <?php
      $sql_rate = "SELECT AVG(rate) FROM recipe_rateT WHERE recipe_id='$r_id'";
      $result_rate = mysqli_query($conn, $sql_rate);
      $row_rate = mysqli_fetch_row($result_rate);
      $average = round($row_rate[0]);
      //print stars based on average
      for($z=0; $z < $average; $z++){
        echo '<img src="Images/star.png">';
      }

      //number of people who voted
      $sql_num_voted = "SELECT * FROM recipe_rateT WHERE recipe_id='$r_id'";
      $result_num_voted = mysqli_query($conn, $sql_num_voted);
      $num_voted = mysqli_num_rows($result_num_voted);
      echo "($num_voted voted)";
     ?>
    <!-- <img src="Images/star.png"><img src="Images/star.png"><img src="Images/star.png"><img src="Images/star.png"><img src="Images/star.png"> -->
    </td>
		</tr>
    <tr>
			<td id=<?php echo '"recipeList'.$num1.'"'; ?> class="recipePicture" colspan="3">
        <div id=<?php echo'"recipeFront'.$num1.'"';?> class="front" style=<?php echo '"background-image:url('.$row_search['image_address'].');"';?> onclick=<?php
          $frontID = 'recipeFront' . $num1;
          echo '"' . 'flip(\'' . $frontID . '\')"';
        ?>>
        </div>
        <!--  -->

        <!--  -->
        <div id=<?php echo'"description'.$num1.'"';?> class="back" onclick=<?php
          $backID = 'description' . $num1;
          echo '"' . 'flip(\'' . $backID . '\')"';
        ?>>
          <p><?php echo $row_search['description']; ?></p>
        </div>
			</td>
		</tr>
  </table>

		<?php
		$num1++;}
		}
				//} ?>

			<!-- </table> -->
		</div>
    <?php } else{ ?>
      <?php
        //individual recipe id
        $recipe_id_indi = $_GET['id'];
        $sql_indi = "SELECT * FROM recipesT WHERE recipe_id = '$recipe_id_indi'";
        $result_indi = mysqli_query($conn, $sql_indi);
        if(mysqli_num_rows($result_indi)==1){
          $row_indi = mysqli_fetch_assoc($result_indi);
        }
       ?>
       <div class="box">
        <h1 class="myTitle">Recipes</h1>
      </div>
        <div class="recipeBox">
          <div class="myRecipeInformation">
          <table id="recipeHeading" name="recipeHeading">
            <tr>
              <?php
                $uid_indi = $row_indi['user_id'];
                $sql_indi_un = "SELECT username FROM userT WHERE user_id = '$uid_indi'";
                $result_indi_un = mysqli_query($conn, $sql_indi_un);
                $row_un = mysqli_fetch_assoc($result_indi_un);
               ?>
              <td class="recipeTitle" name="recipeTitle"><?php echo $row_indi['title']; ?></td>
              <td class="recipeAuthor" name="recipeAuthor"><?php echo $row_un['username']; ?></td>
              <!-- rating calculate -->
              <td class="recipeRating" name="recipeRating">
              <?php
                $sql_rate = "SELECT AVG(rate) FROM recipe_rateT WHERE recipe_id='$recipe_id_indi'";
                $result_rate = mysqli_query($conn, $sql_rate);
                $row_rate = mysqli_fetch_row($result_rate);
                $average = round($row_rate[0]);
                //print stars based on average
                for($z=0; $z < $average; $z++){
                  echo '<img src="Images/star.png">';
                }

                //number of people who voted
                $sql_num_voted = "SELECT * FROM recipe_rateT WHERE recipe_id='$recipe_id_indi'";
                $result_num_voted = mysqli_query($conn, $sql_num_voted);
                $num_voted = mysqli_num_rows($result_num_voted);
                echo "<br>($num_voted voted)";
               ?>
              </td>
            </tr>
          </table>
          <?php if(isLoggedIn()){ ?>
            <form action="rating.php" method="post" style="float:right;">
              <input type="hidden" name="recipe_id" value=<?php echo '"'.$recipe_id_indi.'"'; ?>>
              <select class="" name="rate" size="1" onchange="this.form.submit();"
              style="width:150px; font-size:46px; background-color:orange;color:white;
              font-family: 'Josefin Sans', sans-serif; border-radius: 25px;">
                <option value="">rate</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
              </select>
            </form>
            <?php if($uid_indi == $_SESSION['USERID']){ ?>
            <form class="" action="delete.php" method="post">
            <input type="image" src="Images/delete.png" width="64" height="64" style="float:left;" onclick="this.form.submit();">
            <input type="hidden" name="recipe_id" value="<?php echo $recipe_id_indi; ?>">
          </form>
          <?php }} ?>
          <div class="recipePicture">
            <img id="recipeMainPicture" src=<?php echo '"'.$row_indi['image_address'].'"'; ?>>
          </div>
          </div>
          <!--Ingredient Section-->
          <div class="myIngredientSection">
          <h4 class="ingredientHeading">Ingredients:</h4>
          <div class="ingredientBox">
            <table id="ingredientTable" name="ingredientTable">

              <?php
              $sql_indi_ingre = "SELECT * FROM recipe_ingredientT WHERE recipe_id='$recipe_id_indi'";
              $result_indi_ingre = mysqli_query($conn, $sql_indi_ingre);
              $number_ingre = mysqli_num_rows($result_indi_ingre);
              $count = 1;
              while($row_ingre = mysqli_fetch_assoc($result_indi_ingre)){
                if($count % 2 == 1){
               ?>
               <tr>
                 <td class="ingredientItem"><?php echo "<span>&middot;</span> " . $row_ingre['ingredient'];
                $count++;?></td>

               <?php } else{ ?>
                 <td class="ingredientItem"><?php echo "<span>&middot;</span> " . $row_ingre['ingredient'];
                $count++;?></td>
              </tr>
              <?php } ?>
              <?php }
              if($number_ingre % 2 == 1){
                echo '</tr>';
              }?>
            </table>
          </div>
          </div>

          <!--Steps Section-->
          <div class="myStepSection">
          <h4 class="stepHeading">Directions:</h4>
          <div class="stepBox">
            <table id="stepTable" name="stepTable">
              <?php
                $sql_steps = "SELECT * FROM recipe_detailT WHERE recipe_id = '$recipe_id_indi'";
                $result_steps = mysqli_query($conn, $sql_steps);
                $stepCount = 1;
                while($row_steps = mysqli_fetch_assoc($result_steps)){?>
              <tr>
                <td class="stepNumber"><?php echo $stepCount . ". ";?>
                <td class="stepItem"><?php echo $row_steps['detail']; ?></td>
                <!--<td class="stepPicture"><img src="Images/step1.jpg"></td>-->
              </tr>
              <?php $stepCount++;
                } ?>
            </table>
          </div>
          </div>
        </div>
        <!--facebook-->
        <div id=faceBook>
          <div id="fb-root"></div>
            <script>(function(d, s, id) {
              var js, fjs = d.getElementsByTagName(s)[0];
                if (d.getElementById(id)) return;
                  js = d.createElement(s); js.id = id;
                  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.9";
                  fjs.parentNode.insertBefore(js, fjs);
                }(document, 'script', 'facebook-jssdk'));
            </script>

        <!--facebook comments-->
                <div class="fb-comments" data-href=<?php echo'"';?>http://scavange.epizy.com/test/mobile_recipe_search.php?id=<?php echo $recipe_id_indi; ?>" data-numposts="5">
                </div>
        </div>
      <?php } ?>

  </div>
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
				<td><a href="logout.php"><img src="Images/logout.png" width="32" height="32"><br>Logout</a></td>
				<?php } else{ ?>
					<td><a href="#" onclick="notloggedin()"><img src="Images/share.png" width="32" height="32"><br>Share</a></td>
					<td><a href="mobile_login.php"><img src="Images/login.png" width="32" height="32"><br>Login</a></td>
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
