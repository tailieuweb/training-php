<?php

use function PHPSTORM_META\type;

require_once 'BaseModel.php';
require_once 'IModel.php';

class BankModel extends BaseModel implements IModel {

    public function findBankById($id) {
        $sql = 'SELECT * FROM banks WHERE id = '.$id;
        $bank = $this->select($sql);

        return $bank;
    }

    // public function findUser($keyword) {
    //     $sql = 'SELECT * FROM users WHERE user_name LIKE %'.$keyword.'%'. ' OR user_email LIKE %'.$keyword.'%';
    //     $user = $this->select($sql);

    //     return $user;
    // }

    // /**
    //  * Authentication user
    //  * @param $userName
    //  * @param $password
    //  * @return array
    //  */
    // public function auth($userName, $password) {
    //     $md5Password = md5($password);
    //     $sql = 'SELECT * FROM users WHERE name = "' . $userName . '" AND password = "'.$md5Password.'"';

    //     $user = $this->select($sql);
    //     return $user;
    // }

    /**
    //  * Delete user by id
    //  * @param $id
    //  * @return mixed
    //  */
     public function deleteBankById($id) {
         $sql = 'DELETE FROM banks WHERE id = '.$id;
         return $this->delete($sql);

     }

    // /**
    //  * Update user
    //  * @param $input
    //  * @return mixed
    //  */
    public function updateBank($input) {
        $sql = 'UPDATE banks SET 
                 name = "' . mysqli_real_escape_string(self::$_connection, $input['name']) .'", 
                 password="'. md5($input['password']) .'",
                 user_id="'. $input['user_id'] .'",
                 cost="'. $input['cost'] .'",
                 type = "' . $input['type'] .'",
                WHERE id = ' . $input['id'];
        $user = $this->update($sql);

        return $user;
    }


    // /**
    //  * Insert user
    //  * @param $input
    //  * @return mixed
    //  */
    public function insertBank($input) {
        $sql = "INSERT INTO `app_web1`.`banks` (`user_id`, `cost`) VALUES (" . "'" . $input['id_user'] . "', '" . $input['cost'] . "')";

        $user = $this->insert($sql);

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
            $sql = 'SELECT * FROM `banks` , `users` WHERE `users`.`id` = `banks`.`user_id` AND name LIKE "%' .  mysqli_real_escape_string(self::$_connection, $params['keyword']) .'%"';

            //Keep this line to use Sql Injection
            //Don't change
            //Example keyword: abcef%";TRUNCATE banks;##
            $banks = self::$_connection->multi_query($sql);
        } else {
            $sql = 'SELECT * FROM `banks` , `users` WHERE `users`.`id` = `banks`.`user_id`';
            $banks = $this->select($sql);
        }

        return $banks;
    }
    public static function getInstance() {
        if (self::$_instance !== null){
            return self::$_instance;
        }
        self::$_instance = new self();
        return self::$_instance;
    }
    public function selectData($params = [])
    {
        $result = $this->getBanks($params = []);
        return $result;
    }
    public function insertData($input)
    {
        $this->insertBank($input);
    }
    public function updateData($input)
    {
        $this->updateUser($input);
    }
    public function deleteData($id)
    {
        $this->deleteBankById($id);
    }
}