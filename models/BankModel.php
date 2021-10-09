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
    public function findBankById($id) {
        $sql = 'SELECT * FROM banks WHERE id = '.$id;
        $bank = $this->select($sql);

        return $bank;
    }
    public function getUsers($params = []) {
        $sql = 'SELECT * FROM users';
        $user = $this->select($sql);

        return $user;
    }
}