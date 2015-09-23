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
        <img class="displayed" src="images/salmon.png">
		</div>
		<div class="contentTitle"><h1>Ingredients:</h1></div>
		 <div class="contentText">
		<ul>
			<li class="listyle">400g linguine</li>
			<li class="listyle">2 garlic cloves</li>
			<li class="listyle">400g crème fraîche</li>
			<li class="listyle">1 lemon</li>
			<li class="listyle">300g smoked salmon</li>
			<li class="listyle">2 handfuls of peas</li>
		</ul>
		</div>
		<div class="contentTitle"><h1>Method:</h1></div> 
		<div class="contentText">
		<ol>
			<li class="listyle2">Cook pasta according to packet instructions. Meanwhile, melt the butter in a large frying pan and fry the garlic until lightly golden.</li>
			</br>
			<li class="listyle2">Lower the heat and stir in the crème fraîche, zest, juice, tarragon and salmon.</li>
			</br>
			<li class="listyle2">Season, then remove from heat. A few mins before the pasta is ready, add the peas to the pan, then drain and toss through the crème fraîche mix.</li>
			</br>
			<li class="listyle2">Serve immediately with grated parmesan.</li>
		
		</ol>
		</div>
		<div class="contentTitle"><h1>Nutritional Facts:</h1></div>
		<div class="contentText">
			<p>Amount Per Serving: Calories 375</p>
			<p>Total:</p>
			<p>Fat 12.1g, Cholesterol 88mg, Sodium 68mg, Potassium 696mg, Total Carbohydrate 43g, Dietary Fiber 3.0g, Sugars 2.9g, Protein 24.6g</p>
		</div>
			<div class="contentTitle"><h1>Comments:</h1></div>
		<div class="contentText">
        <?php
        if(!isset($_SESSION["Username"])) {
            goto a;
        } else {
                echo "<form action='comment.php' method='post'>";
                echo "</br>";
                echo "<textarea rows = 5 cols = 50 name='postsalmon' placeholder='Write your message here.'></textarea>"; 
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
           $filename = __DIR__ . '/commentsalmon.txt';

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
                                        echo "<textarea rows = 5 cols = 50 name='newmsgSalmon' placeholder='Edit message above...'></textarea>"; 
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