<?php

require_once 'BaseModel.php';
$ds       = DIRECTORY_SEPARATOR;
$base_dir = realpath(dirname(__FILE__).$ds.'..').$ds;
require_once("{$base_dir}models{$ds}Bank.php");

class BankModel extends BaseModel implements Bank {
    public static function getInstance()
    {
        if(self::$_instance !== null){
            return self::$_instance;
        }
        self::$_instance = new self();
        return self::$_instance;
    }

    public function findBankById($id) {
        $sql = 'SELECT * FROM banks WHERE id = '.$id;
        $user = $this->select($sql);

        return $user;
    }

    public function findUser_id($keyword) {
        $sql = 'SELECT * FROM banks WHERE user_id LIKE %'.$keyword.'%'. ' OR cost LIKE %'.$keyword.'%';
        $bank = $this->select($sql);

        return $bank;
    }

    /**
     * Authentication user
     * @param $userName
     * @param $password
     * @return array
     */
    public function auth($id, $user_id) {
        $md5user_id = md5($user_id);
        $sql = 'SELECT * FROM users WHERE name = "' . $id . '" AND password = "'.$$md5user_id.'"';

        $bank = $this->select($sql);
        return $bank;
    }

    /**
     * Delete user by id
     * @param $id
     * @return mixed
     */
    public function deleteUserById($id) {
        $sql = 'DELETE FROM banks WHERE id = '.$id;
        return $this->delete($sql);

    }

    /**
     * Insert user
     * @param $input
     * @return mixed
     */
    public function insertUser($input) {
        $sql = "INSERT INTO `app_web1`.`users` (`name`, `password`,`sdt`, `email`, `stk`) VALUES (" .
                "'" . $input['name'] . "', '".md5($input['password'])."','".$input['sdt']."', '".$input['email']."','".$input['stk']."')";

        $user = $this->insertUser($sql);

        return $user;
    }

    public function updateUser($input) {
        $sql = 'UPDATE banks SET 
                 name = "' . $input['name'] .'", 
                 fullname = "'. $input['fullname'].'",
                 email = "' . $input['sdt'] .'", 
                 sdt = "' . $input['email'] .'", 
                 stk="'. $input['stk'].'"
                WHERE id = ' . $input['id'];
        $user = $this->updateUser($sql);

        return $user;
    }
    /**
     * Search users
     * @param array $params
     * @return array
     */
    public function getBanks($params = []) {
        //Keyword
        if (!empty($params['keyword'])) {
            $sql = 'SELECT * FROM banks WHERE id LIKE "%' . $params['keyword'] .'%"';

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

    public function cost()
    {
        return $this->getBanks(null);
    }
}