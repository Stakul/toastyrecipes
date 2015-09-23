<?php 
 
require_once 'constants.php';

$logins = array('Staffan' => '12345','Anders' => '55555','username2' => 'password2');

$Username = isset($_POST['username']) ? $_POST['username'] : '';
$Password = isset($_POST['password']) ? $_POST['password'] : '';

if(isset($logins[$Username]) && $logins[$Username] == $Password) {
    if(!isset($_SESSION)) 
    { 
      session_start(); 
    } 
    $_SESSION["Username"] = $Username;
    header("Location: recipes.php");
    exit;
} else {
    header("Location: loginpage.php");   
    exit;
}
 