<?php
   if(!isset($_SESSION)) 
    { 
      session_start(); 
    } 
  include_once 'Post.php';
  include_once 'constants.php';

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="creativeinspiration.css" />

<title>Tasty Recipes!</title>
</head>

<body>
    <div id="page">
		
        <div id="header">
            <?php include 'resources/fragments/header.php' ?>               
        </div>
        <div id="bar">
            <?php include 'resources/fragments/bar.php' ?>  
      </div>
        <div class="contentTitle"><h1>Current Recipes:</h1></div>
        <div class="contentText">
        <img class="displayed" src="images/pancakes.png">
		</div>
		<div class="contentTitle"><h1>Ingredients:</h1></div>
		 <div class="contentText">
		<ul>
			<li class="listyle">100g plain flour</li>
			<li class="listyle">2 eggs</li>
			<li class="listyle">300ml semi-skimmed milk</li>
			<li class="listyle">1 tbsp sunflower oil</li>
			<li class="listyle">pinch salt</li>
		</ul>
		</div>
		<div class="contentTitle"><h1>Method:</h1></div> 
		<div class="contentText">
		<ol>
			<li class="listyle2">Blending in the flour: Put the flour and a pinch of salt into a large mixing bowl and make a well in the centre. Crack the eggs into the middle,
			then pour in about 50ml milk and 1 tbsp oil. Start whisking from the centre, gradually drawing the flour into the eggs, milk and oil. 
			Once all the flour is incorporated, beat until you have a smooth, thick paste. Add a little more milk if it is too stiff to beat. </li>
			</br>
			<li class="listyle2">Finishing the batter: Add a good splash of milk and whisk to loosen the thick batter. While still whisking, pour in a steady stream of the remaining milk. 
			Continue pouring and whisking until you have a batter that is the consistency of slightly thick single cream. Traditionally, people would say to now leave the batter for 30 mins, 
			to allow the starch in the flour to swell, but there’s no need.</li>
			</br>
			<li class="listyle2">Getting the right thickness: Heat the pan over a moderate heat, then wipe it with oiled kitchen paper. Ladle some batter into the pan, tilting the pan to move 
			the mixture around for a thin and even layer. Quickly pour any excess batter into a jug, return the pan to the heat, then leave to cook, undisturbed, for about 30 secs. 
			Pour the excess batter from the jug back into the mixing bowl. If the pan is the right temperature, the pancake should turn golden underneath after about 30 secs and will be ready to               turn.</li>
			</br>
			<li class="listyle2">Flipping pancakes: Hold the pan handle, ease a fish slice under the pancake, then quickly lift and flip it over. Make sure the pancake is lying flat against base of             the pan with no folds,
			then cook for another 30 secs before turning out onto a warm plate. Continue with the rest of the batter, serving them as you cook or stack onto a plate. You can freeze the pancakes for             1 month, wrapped in cling film or make             them up to a day ahead.</li>
		
		</ol>
		</div>
		<div class="contentTitle"><h1>Nutritional Facts:</h1></div>
		<div class="contentText">
			<p>Amount Per Serving: Calories 86</p>
			<p>Total:</p>
			<p>Fat 3.53g, Cholesterol 22mg, Sodium 198mg, Potassium 55mg, Total Carbohydrate 10.91g, Dietary Fiber -, Sugars -, Protein 2.58g</p>
		</div>
		<div class="contentTitle"><h1>Comments:</h1></div>
		<div class="contentText">
        <?php
        if(!isset($_SESSION["Username"])) {
            goto a;
        } else {
                echo "<form action='comment.php' method='post'>";
                echo "</br>";
                echo "<textarea rows = 5 cols = 50 name='postpancake' placeholder='Write your message here.'></textarea>"; 
                echo "</br>";
                echo "<input type='submit' value='Send'/>";     
                echo "</form>";
            }
        ?>
        </div>
        <div class="contentTitle"><h1>Comments:</h1></div>
        <div class="contentText">
        <?php 
        a:
           
           $filename = __DIR__ . '/commentpancake.txt';

           $posts = explode(";\n", file_get_contents($filename));


              for($i = count($posts) - 1; $i >= 0; $i--) {
                    $post = unserialize ($posts[$i]);
                       if ($post instanceof Post) { 
                          echo("<p class='listyle'>" . $post->getUserName() . ":</p>");
                          echo("<p class='listyle2'>" . $post->getMessage() . "</p>");
                                if(!isset($_SESSION["Username"])) {
                                        goto b; }
                                elseif ($post->getUserName() === $_SESSION["Username"]) {
                                        echo("<form action='editcomment.php' method='post'>");
                                        echo "<textarea rows = 5 cols = 50 name='newmsgPancake' placeholder='Edit message above...'></textarea>"; 
                                        echo("<input type='hidden' name='timestamp' value='" . $post->getTimestamp() . "'/>");
                                        echo "</br>";
                                        echo("<input type='submit' value='Edit'/>");
                                        echo("</form>");
                                        }  
                        }
                b:
              }
                  
         ?>
	  
        </div>
        </div>
        <div id="footer"></div>
</body>
</html>