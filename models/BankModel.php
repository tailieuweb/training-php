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

    /**
     * Delete user by id
     * @param $id
     * @return mixed
     */
    public function deleteBankById($id, $token) {
        $sql = 'DELETE FROM banks WHERE bank_id = '.$id;
        return $this->delete($sql, $token);

    }

    //Find bank by id
    public function findBankById($id) {
        $sql = 'SELECT * FROM banks WHERE bank_id = '.$id;
        $bank = $this->select($sql);

        return $bank;
    }

    public function getUser() {
        $sql = 'SELECT * FROM users';
        $user = $this->select($sql);

        return $user;
    }
    /**
     * Update user
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