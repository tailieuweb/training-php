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
    public function deleteBankById($id) {
        $sql = 'DELETE FROM banks WHERE id = '.$id;
        return $this->delete($sql);


    }
}