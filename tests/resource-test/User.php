<?php

use PhpParser\Node\Expr\FuncCall;

class User {
    private static $username = "";
    private static $password = "";
    private static $fullname = "";
    private static $type = "";
    private static $email= "";

    public function getUsername() {
        return self::$username;
    }

    public function getPassword() {
        return self::$password;
    }

    public function getFullname() {
        return self::$fullname;
    }

    public function getType() {
        return self::$type;
    }

    public function getEmail() {
        return self::$email;
    }


    public function __construct($username, $password) {
        self::$username = $username;
        self::$password = $password;
    }   
}