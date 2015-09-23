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
        <img class="displayed" src="images/soup.png">
		</div>
		<div class="contentTitle"><h1>Ingredients:</h1></div>
		 <div class="contentText">
		<ul>
			<li class="listyle">1-1¼kg ripe tomatoes</li>
			<li class="listyle">1 medium onion</li>
			<li class="listyle">1 small carrot</li>
			<li class="listyle">1 celery stick</li>
			<li class="listyle">2 tbsp olive oil</li>
			<li class="listyle">2 tsp tomato purée</li>
			<li class="listyle">a good pinch of sugar</li>
			<li class="listyle">2 bay leaves</li>
			<li class="listyle">1.2 litres hot vegetable stock</li>
		</ul>
		</div>
		<div class="contentTitle"><h1>Method:</h1></div> 
		<div class="contentText">
		<ol>
			<li class="listyle2">Firstly, prepare your vegetables. You need 1-1.25kg ripe tomatoes. If the tomatoes are on their vines, pull them off. 
			The green stalky bits should come off at the same time, but if they don't, just pull or twist them off afterwards. 
			Throw the vines and green bits away and wash the tomatoes. Now cut each tomato into quarters and slice off any hard cores 
			(they don't soften during cooking and you'd get hard bits in the soup at the end). Peel 1 medium onion and 1 small carrot and chop them into small pieces. 
			Chop 1 celery stick roughly the same size.</li>
			</br>
			<li class="listyle2">Spoon 2 tbsp olive oil into a large heavy-based pan and heat it over a low heat. Hold your hand over the pan until you can feel the heat rising from the oil, 
			then tip in the onion, carrot and celery and mix them together with a wooden spoon. Still with the heat low, cook the vegetables until they're soft and faintly coloured. 
			This should take about 10 minutes and you should stir them two or three times so they cook evenly and don’t stick to the bottom of the pan.</li>
			</br>
			<li class="listyle2">Holding the tube over the pan, squirt in about 2 tsp of tomato purée, then stir it around so it turns the vegetables red. 
			Shoot the tomatoes in off the chopping board, sprinkle in a good pinch of sugar and grind in a little black pepper. Tear 2 bay leaves into a few pieces and throw them into the pan. 
			Stir to mix everything together, put the lid on the pan and let the tomatoes stew over a low heat for 10 minutes until they shrink down in the pan and their juices flow nicely. 
			From time to time, give the pan a good shake – this will keep everything well mixed.</li>
			</br>
			<li class="listyle2">Slowly pour in the 1.2 litres/ 2 pints of hot stock (made with boiling water and 4 rounded tsp bouillon powder or 2 stock cubes), 
			stirring at the same time to mix it with the vegetables. Turn up the heat as high as it will go and wait until everything is bubbling, 
			then turn the heat down to low again and put the lid back on the pan. Cook gently for 25 minutes, stirring a couple of times. 
			At the end of cooking the tomatoes will have broken down and be very slushy looking.</li>
			</br>
			<li class="listyle2">Remove the pan from the heat, take the lid off and stand back for a few seconds or so while the steam escapes, 
			then fish out the pieces of bay leaf and throw them away. Ladle the soup into your blender until it’s about three-quarters full, 
			fit the lid on tightly and turn the machine on full. Blitz until the soup’s smooth (stop the machine and lift the lid to check after about 30 seconds), 
			then pour the puréed soup into a large bowl. Repeat with the soup that’s left in the pan. (The soup may now be frozen for up to 3 months. Defrost before reheating.)</li>
			</br>
			<li class="listyle2">Pour the puréed soup back into the pan and reheat it over a medium heat for a few minutes, 
			stirring occasionally until you can see bubbles breaking gently on the surface. Taste a spoonful and add a pinch or two of salt if you think the soup needs it, 
			plus more pepper and sugar if you like. If the colour’s not a deep enough red for you, plop in another teaspoon of tomato purée and stir until it dissolves. 
			Ladle into bowls and serve. Or sieve and serve chilled with some cream swirled in. For other serving suggestions, see opposite.</li>
		</ol>
		</div>
		<div class="contentTitle"><h1>Nutritional Facts:</h1></div>
		<div class="contentText">
			<p>Amount Per Serving: Calories 234</p>
			<p>Total:</p>
			<p>Fat 11.1g, Cholesterol 48mg, Sodium 78mg, Potassium 66mg, Total Carbohydrate 43g, Dietary Fiber 3.0g, Sugars 2.9g, Protein 24.6g</p>
		</div>
			<div class="contentTitle"><h1>Comments:</h1></div>
		<div class="contentText">
        <?php
        if(!isset($_SESSION["Username"])) {
            goto a;
        } else {
                echo "<form action='comment.php' method='post'>";
                echo "</br>";
                echo "<textarea rows = 5 cols = 50 name='postsoup' placeholder='Write your message here.'></textarea>"; 
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
           $filename = __DIR__ . '/commentsoup.txt';

           $posts = explode(";\n", file_get_contents($filename));
              for ($i = count($posts) - 1; $i >= 0; $i--) {
                    $post = unserialize($posts[$i]);
                  
                  
                        if ($post instanceof Post) { 
                              echo("<p class='listyle'>" . $post->getUserName() . ":</p>");
                              echo("<p class='listyle2'>" . $post->getMessage() . "</p>");
                                if(!isset($_SESSION["Username"])) {
                                        goto b; }
                                elseif ($post->getUserName() === $_SESSION["Username"]) {
                                        echo("<form action='editcomment.php' method='post'>");
                                        echo "<textarea rows = 5 cols = 50 name='newmsgSoup' placeholder='Edit message above...'></textarea>"; 
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