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
        <img class="displayed" src="images/meatballs.png">
		</div>
		<div class="contentTitle"><h1>Ingredients:</h1></div>
		 <div class="contentText">
		<ul>
			<li class="listyle">900g freshly minced beef</li>
			<li class="listyle">1 egg</li>
			<li class="listyle">150g onion, finely chopped</li>
			<li class="listyle">2 tbsp olive oil</li>
			<li class="listyle">1 clove garlic, crushed</li>
			<li class="listyle">2 tbsp freshly chopped herbs, such as marjoram, or 1 tbsp rosemary"</li>
		</ul>
		</div>
		<div class="contentTitle"><h1>Method:</h1></div> 
		<div class="contentText">
		<ol>
			<li class="listyle2">Heat two tablespoons of olive oil in a heavy stainless steel saucepan over a gentle heat and add the onion and garlic. 
			Cover and sweat for four minutes, until soft and a little golden. Allow to cool. </li>
			</br>
			<li class="listyle2">In a bowl, mix the minced beef with the cold sweated onion and garlic. 
			Add the herbs and the beaten egg. Season the mixture with salt and pepper.</li>
			</br>
			<li class="listyle2">Fry a tiny bit to check the seasoning and adjust if necessary. 
			Divide the mixture into approximately 24 round balls. Cover the meatballs and refrigerate until required.</li>
			</br>
			<li class="listyle2">Heat a frying pan and cook the meatballs for about 10 minutes in about three tablespoons of olive oil.</li>
			</br>
			<li class="listyle2">When they are cooked, serve with spaghetti.</li>
		</ol>	
		</div>
		<div class="contentTitle"><h1>Nutritional Facts:</h1></div>
		<div class="contentText">
			<p>Amount Per Serving: Calories 57</p>
			<p>Total:</p>
			<p>Fat 3.69g, Cholesterol 21mg, Sodium 134mg, Potassium 60mg, Total Carbohydrate 2.12g, Dietary Fiber 0.1g, Sugars 0.42g, Protein 3.47g</p>
		</br>
		<p><a href="recipes.html">Back..</a></p>
        </div>
		<div class="contentTitle"><h1>Comments:</h1></div>
		<div class="contentText">
        <?php
        if(!isset($_SESSION["Username"])) {
            goto a;
        } else {
                echo "<form action='comment.php' method='post'>";
                echo "</br>";
                echo "<textarea rows = 5 cols = 50 name='postmeatballs' placeholder='Write your message here.'></textarea>"; 
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
           $filename = __DIR__ . '/commentmeatballs.txt';

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
                                        echo "<textarea rows = 5 cols = 50 name='newmsgMeatballs' placeholder='Edit message above...'></textarea>"; 
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