<?php

require_once 'BaseModel.php';

class BankModel extends BaseModel {
    /**
     * Update bank
     * update cost bank for user_id 
     * @param $input
     * @return mixed
     */
    public function updateBank($input) {
        $cost = $input['cost'];
        $user_id = $input['id'];
        $sql = "UPDATE `banks` SET `cost`= '$cost' WHERE `user_id` =' $user_id'";
        $bank = $this->update($sql);
        return $bank;
    }
}