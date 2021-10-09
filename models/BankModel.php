<?php

require_once 'BaseModel.php';

class BankModel extends BaseModel {

    public function findBankById($id) {
        $sql = 'SELECT * FROM banks WHERE id = '.$id;
        $user = $this->select($sql);

        return $user;
    }

    public function updateBank($input) {
        $sql = ' UPDATE `banks` SET `user_id`="' . $input['user_id'] .'",`cost`="' . $input['cost'] .'" WHERE id = ' . $input['id'];
        $bank = $this->update($sql);
        return $bank;
    }
}