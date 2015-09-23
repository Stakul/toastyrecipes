<?php

require_once 'Post.php';
require_once 'constants.php';



session_start();

if(isset($_POST['postpancake'])) {
    $filename = __DIR__ . '/commentpancake.txt';
    $post = new Post($_SESSION["Username"], $_POST['postpancake']);
    file_put_contents($filename, serialize($post) . DELIMITER, FILE_APPEND);
} elseif(isset($_POST['postsalmon'])) {
    $filename = __DIR__ . '/commentsalmon.txt';
    $post = new Post($_SESSION["Username"], $_POST['postsalmon']);
    file_put_contents($filename, serialize($post) . DELIMITER, FILE_APPEND);      
} elseif(isset($_POST['postmeatballs'])) {
    $filename = __DIR__ . '/commentmeatballs.txt';
    $post = new Post($_SESSION["Username"], $_POST['postmeatballs']);
    file_put_contents($filename, serialize($post) . DELIMITER, FILE_APPEND);      
} elseif(isset($_POST['postsoup'])) {
    $filename = __DIR__ . '/commentsoup.txt';
    $post = new Post($_SESSION["Username"], $_POST['postsoup']);
    file_put_contents($filename, serialize($post) . DELIMITER, FILE_APPEND);      
} 




include 'recipes.php';

