<?php

require_once 'constants.php';
require_once 'Post.php';

session_start();

                     
if(isset($_POST['newmsgPancake'])) { 
    $filename = __DIR__ . '/commentpancake.txt';
    $newmsg = isset($_POST['newmsgPancake']) ? $_POST['newmsgPancake'] : '';
} elseif(isset($_POST['newmsgSalmon'])) {
    $filename = __DIR__ . '/commentsalmon.txt';
    $newmsg = isset($_POST['newmsgSalmon']) ? $_POST['newmsgSalmon'] : '';
} elseif(isset($_POST['newmsgMeatballs'])) {
    $filename = __DIR__ . '/commentmeatballs.txt';
    $newmsg = isset($_POST['newmsgMeatballs']) ? $_POST['newmsgMeatballs'] : '';
} elseif(isset($_POST['newmsgSoup'])) {
    $filename = __DIR__ . '/commentsoup.txt';
    $newmsg = isset($_POST['newmsgSoup']) ? $_POST['newmsgSoup'] : '';
}

        
        $timestamp = isset($_POST['timestamp']) ? $_POST['timestamp'] : '';

    
        

        $entries = explode(";\n", file_get_contents($filename));

        for ($i = count($entries) - 1; $i >= 0; $i--) {
            $post = unserialize($entries[$i]);
            if ($post instanceof Post and ($post->getTimestamp() == $timestamp)) {
            $post->setMessage($newmsg);
            $entries[$i] = serialize($post);
            break;
            }
        }
            
        file_put_contents($filename, implode(";\n", $entries));   

     
  header("Location: recipes.php");      
