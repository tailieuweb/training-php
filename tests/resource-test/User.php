<?php
class User {
    private static $username = "";
    private static $password = "";

    public function getUsername() {
        return self::$username;
    }

    public function getPassword() {
        return self::$password;
    }

    public function __construct($username, $password) {
        self::$username = $username;
        self::$password = $password;
    }   
}