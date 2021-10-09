<?php

require_once 'BaseModel.php';

class BankModel extends BaseModel{

    //Create token for user
    public function createToken(){
        $token = $this->get_token_value();
        return $token;
    }

    //Get bank
    public function getBanks($params = []) {
        //Keyword
        if (!empty($params['keyword'])) {
            $key = str_replace('"','',$params['keyword']);
            $sql = 'SELECT * FROM banks WHERE cost LIKE "%' . $key .'%"';

            //Keep this line to use Sql Injection
            //Don't change
            //Example keyword: abcef%";TRUNCATE banks;##
            $banks = self::$_connection->multi_query($sql);
        } else {

            $sql = 'SELECT * FROM banks join users on users.id = banks.user_id';
            $banks = $this->select($sql);

        }

        return $banks;
    }
}