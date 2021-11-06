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
    /**
     * Insert bank
     * @param $input
     * @return mixed
     */
    public function insertBank($input) {
        $sql = "INSERT INTO `banks` (`user_id`,`cost`) VALUES (" .
        "'" . $input['id'] . "', '".$input['cost']."')";

        $bank = $this->insert($sql);
        return $bank;
    }
}