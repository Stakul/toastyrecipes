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
        <div class="contentTitle"><h1>Login to comment!</h1></div>
        <div class="contentText">
            <form action="login.php" method="post">
                Username: <input type="text" name="username" />
                </br>
                Password: <input type="password" name="password" />
                <input type="submit" />
            </form>        
        </div> 
        <div class="contentTitle"><h1>Logout!</h1></div>
        <div class="contentText">
            <form action="logout.php" method="post">

                <input type="submit" name="logout" />
            </form>        
        </div> 
</div>
        <div id="footer"></div>
</body>
</html>
