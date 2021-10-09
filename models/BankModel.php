<?php
require_once 'BaseModel.php';

 class  BankModel extends BaseModel{


    public function updateBank($gia,$user_id){
            $sql = "UPDATE `banks` SET `cost`= $gia   WHERE user_id = $user_id "; 
            $bank = $this->query($sql);
            return $bank;
    }

    public function SelectCostByUserId($user_id){
        $sql = "SELECT   `cost` FROM `banks` WHERE `user_id` = $user_id "; 
        $bank = $this->query($sql);
        $Value = $bank->fetch_assoc();
        return $Value;
    }

 }