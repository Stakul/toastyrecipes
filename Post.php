<?php


class Post {

    private $username;
    private $message;
    private $timestamp;

    public function __construct($username, $message) {
        $this->username = $username;
        $this->message = $message;
        $this->timestamp = time();
    }

    public function getUserName() {
        return $this->username;
    }


    public function getMessage() {
        return $this->message;
    }


    public function getTimestamp() {
        return $this->timestamp;
    }
    
    public function setMessage($message) {
        $this->message = $message;   
    }
}