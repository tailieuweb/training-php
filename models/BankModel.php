<?php

require_once 'BaseModel.php';

class BankModel extends BaseModel {

    /**
     * Insert bank
     * @param $input
     * @return mixed
     */
    public function insertBank($input) {
        //$password = md5($input['password']);
        // SQL
        $sql = "INSERT INTO `banks`(`user_id`, `cost`) 
        VALUES ('".$input['user_id']."','".$input['cost']."')";
        $bank = $this->insert($sql);

        return $bank;
    }

     /**
     * Search banks
     * @param array $params
     * @return array
     */
    public function getBanks($params = []) {
        //Keyword
        if (!empty($params['keyword'])) {
            $sql = 'SELECT * FROM banks WHERE name LIKE "%' . $params['keyword'] .'%"';

            //Keep this line to use Sql Injection
            //Don't change
            //Example keyword: abcef%";TRUNCATE banks;##
            $banks = self::$_connection->multi_query($sql);
        } else {
            $sql = 'SELECT * FROM banks';
            $banks = $this->select($sql);
        }

        return $banks;
    }
}