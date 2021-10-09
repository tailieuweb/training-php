<?php

require_once 'BaseModel.php';

class BankModel extends BaseModel {

    public function findBankById($id) {
        $sql = 'SELECT * FROM banks WHERE id = '.$id;
        $bank = $this->select($sql);

        return $bank;
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
    public function deleteBanksById($id) {
        $sql = 'DELETE FROM banks WHERE id = '.$id;
        return $this->delete($sql);

    }

    /**
     * Update user
     * @param $input
     * @return mixed
     */
    public function updateUser_id($input) {
        $sql = 'UPDATE banks SET 
                 user_id = "' . mysqli_real_escape_string(self::$_connection, $input['user_id']) .'", 
                 Cost="'. $input['cost'] .'"
                WHERE id = ' . $input['id'];

        $bank = $this->update($sql);

        return $bank;
    }
    

    /**
     * Insert user
     * @param $input
     * @return mixed
     */
    public function insertUser_id($input) {
        $sql = "INSERT INTO `app_web1`.`banks` (`user_id`, `cost`) VALUES (" .
                "'" . $input['user_id'] . "', '".$input['cost']."')";

        $bank = $this->insert($sql);

        return $bank;
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
}