<?php
require_once 'BaseModel.php';

 class  BankModel extends BaseModel  {
    protected static $_instance;

    private function __contructor(){}

    public static function getInstance() {
        if (self::$_instance !== null){
            return self::$_instance;
        }
        self::$_instance = new BankModel();
        return self::$_instance;
    }

    public function updateUser($input){
        $rand = rand(5,100000);
        $sql = "UPDATE `banks` SET `cost`= $rand   WHERE user_id =  ".$input['id'];
        $bank = $this->query($sql);
            return $bank;
    }

    public function SelectCostByUserId($user_id){
        $sql = "SELECT   `cost` FROM `banks` WHERE `user_id` = $user_id "; 
        $banks = $this->select($sql);
        return $banks;
    }

     public function insertUser($input)
     {
         $normal = 0 ;
         $sql = "INSERT INTO `app_web1`.`banks` (`user_id`,`cost`) VALUES (" .
             "'" . $input['id'] . "', '".$normal."')";
         $user = $this->insert($sql);
         return $user;

     }

     public function deleteUserById($id)
     {
         $sql = 'DELETE FROM banks WHERE user_id = '.$id;
         return $this->delete($sql);
     }


 }