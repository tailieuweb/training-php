<?php
require_once 'BaseModel.php';

 class  BankModel extends BaseModel{
    protected static $_instance;

    private function __contructor(){}

    public static function getInstance() {
        if (self::$_instance !== null){
            return self::$_instance;
        }
        self::$_instance = new BankModel();
        return self::$_instance;
    }
    public function GetByUserId($user_id){
        $sql = "SELECT   `cost` FROM `banks` WHERE `user_id` = $user_id "; 
        $banks = $this->select($sql);
        return $banks;
    }
 }