<?php
class BankObj {
    private static $id = 0;
    private static $user_id = "";
    private static $cost = "";

    public function getUserId() {
        return self::$user_id;
    }

    public function getCost() {
        return self::$cost;
    }

    public function __construct($id, $user_id, $cost) {
        self::$id = $id;
        self::$user_id = $user_id;
        self::$cost = $cost;
    }   
}