<?php

require_once 'BaseModel.php';

class BankModel extends BaseModel {
    public function getBanks($params = []) {
        //Keyword
        if (!empty($params['keyword'])) {
            $sql = 'SELECT * FROM banks WHERE name LIKE "%' . $params['keyword'] .'%"';
        } else {
            $sql = 'SELECT * FROM banks';
        }

        $banks = $this->select($sql);

        return $banks;
    }
    public function findBankID($id) {
        $sql = 'SELECT * FROM banks WHERE id = '.$id;
        $banks = $this->select($sql);

        return $banks;
    }
}