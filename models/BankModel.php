<?php

require_once 'BaseModel.php';

class BankModel extends BaseModel {

    public function getBanks($params = []) {
        //Keyword
        if (!empty($params['keyword'])) {
            $sql = 'SELECT * FROM banks WHERE user_id LIKE "%' . $params['keyword'] .'%"';
            $banks = self::$_connection->multi_query($sql);
        } else {
            $sql = 'SELECT * FROM banks';
            $banks = $this->select($sql);
        }

        return $banks;
    }
    
}