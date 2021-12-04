<?php

require_once 'BaseModel.php';

class BankModel extends BaseModel 
{
    protected static $_instance;

    public static function getInstance() {
        if (self::$_instance !== null){
            return self::$_instance;
        }
        self::$_instance = new self();
        return self::$_instance;
    }


    //Get bank
    public function getBanks($params = []) {
        //Keyword
        if (!empty($params['keyword'])) {
            $key = str_replace('"','',$params['keyword']);
            $sql = 'SELECT * FROM banks WHERE cost LIKE "%' . $key .'%"';
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
    public function deleteBankById($id) {
        $sql = 'DELETE FROM banks WHERE id = '.$id;
        return $this->delete($sql);

    }

    //Find bank by id
    public function findBankById($id) {
        $sql = 'SELECT * FROM banks join users on users.id = banks.user_id WHERE user_id = '.$id;
        $banks = $this->select($sql);

        return $banks;
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
        "'" . $input['user_id'] . "', '".$input['cost']."')";

        $banks = $this->insert($sql);
        return $banks;
    }
    /**
     * Update user
     * @param $input
     * @return mixed
     */
    public function updateBank($input) {
        $sql = 'UPDATE banks SET 
                 `cost` = "'. $input['cost'] .'"
                WHERE user_id = ' . $input['id'];
        $banks = $this->update($sql);

        return $banks;
    }
}
?>