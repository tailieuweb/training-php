<?php

require_once 'BaseModel.php';

class BankModel extends BaseModel{

    protected static $_instance;
    
    public static function getInstance() {
        if (self::$_instance !== null){
            return self::$_instance;
        }
        self::$_instance = new self();
        return self::$_instance;
    }

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
     * Delete bank by id
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
    /**
     * Update bank
     * @param $input
     * @return mixed
     */
    public function updateBank($input) {
        $sql = 'UPDATE banks SET 
                user_id = "' . $input['user_id'] .'", 
                cost = "' . $input['cost'] .'"
                WHERE bank_id = ' . $input['bank_id'];
        $bank = $this->update($sql);

        return $bank;
    }
    /**
     * RollBack Database in Bank
     */
    public function startTransaction(){
        self::$_connection->begin_transaction();
    }
    public function rollback(){
        self::$_connection->rollback();
    }
}