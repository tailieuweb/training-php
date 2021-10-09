<?php

require_once 'BaseModel.php';

class BankModel extends BaseModel {

    public function updateBank($input) {
        $sql = 'UPDATE banks SET 
                 user_id = "' . $input['user_id'] .'", 
                 cost = "' . $input['cost'] 
                ;
        $bank = $this->update($sql);

        return $bank;
    }
}