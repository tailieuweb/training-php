<?php 
trait BankRepository{
    public function updateAllcostBank($cost,$id){
        return 'UPDATE banks SET cost = "'. $cost .'" WHERE id = '. $id;
    }
    public function addBank($userID, $cost){
        return "INSERT INTO `app_web1`.`banks` (`user_id`, `cost`) VALUES (" .
        "'" . $userID . "', '"
        . $cost 
        . "')";
    }
    public function delBankById($user_id) {     
        return 'DELETE FROM banks WHERE user_id = '.$user_id;
    }
}