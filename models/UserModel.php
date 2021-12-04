<?php

require_once 'BaseModel.php';

class UserModel extends BaseModel {

    public function findUserById($id) {
        $flag = is_integer($id);
        if($flag == false || $id < 1) {
            return false;
        }
        $sql = 'SELECT * FROM users WHERE id = '.$id;
        $user = $this->select($sql);
        return $user;  
    }

    public function findUser($keyword) {
        $flag = is_string($keyword);
        if($flag == false) {
            return false;
        } else {
            $sql = 'SELECT * FROM users WHERE name LIKE "%'. $keyword . '%" OR email LIKE "%'. $keyword . '%"';
            $user = $this->select($sql);
            return $user;
        }   
    }

    /**
     * Authentication user
     * @param $userName
     * @param $password
     * @return array
     */
    public function auth($userName, $password) {
        $flag1 = is_string($userName);
        $flag2 = is_string($password);
        if($flag1 == false || $flag2 == false) {
            return false;
        }
        $md5Password = md5($password);
        $sql = 'SELECT * FROM users WHERE name = "' . $userName . '" AND password = "'.$md5Password.'"';

        $user = $this->select($sql);
        return $user;
    }

    /**
     * Delete user by id
     * @param $id
     * @return mixed
     */
    public function deleteUserById($id) {
        if(is_numeric($id)){    
            if(is_float($id)){
                return false;
            }   
            else{
                $sql = 'DELETE FROM users WHERE id = '.$id;
                return $this->delete($sql);
            }   
           
        } 
        else{
            return false;
        }
    }
    /**
     * Update user
     * @param $input
     * @return mixed
     */
    public function updateUser($input) {
        foreach($input as $value){
            if(is_array($value) || is_object($value) || is_null($value)){
                return false;
            }
        }
        if(is_string($input['id']) || is_string($input['type']) || is_numeric($input['name']) || is_numeric($input['fullname']) || is_numeric($input['email'])){
            return false;
        }
        $sql = "UPDATE `users` SET name = " . "'" . $input['name'] . "', fullname = " . "'" . $input['fullname'] . "', email = " . "'" . $input['email'] . "', type = " . "'" . $input['type'] . "', password = " . "'" . md5($input['password']) . "' WHERE id = " . "'" . $input['id'] . "'";
        $user = $this->update($sql);
        return $user;
    }

    /**
     * Insert user
     * @param $input
     * @return mixed
     */
    public function insertUser($input) {
        foreach($input as $value){
            if(is_array($value) || is_object($value) || is_null($value)){
                return false;
            }
        }
        if(is_string($input['type']) || is_numeric($input['name']) || is_numeric($input['fullname']) || is_numeric($input['email'])){
            return false;
        }
        $sql = "INSERT INTO `app_web1`.`users` (`name`,`fullname`,`email`,`type`, `password`) VALUES (" . "'" . $input['name'] . "', '".$input['fullname']. "', '" . $input['email'] . "', '" . $input['type'] . "','" . md5($input['password']) . "')";
        $user = $this->insert($sql);
        return $user;
    }

    /**
     * Search users
     * @param array $params
     * @return array
     */
    public function getUsers($params = []) {
        //Keyword
        if (!empty($params['keyword'])) {
            $sql = 'SELECT * FROM users WHERE name LIKE "%' . $params['keyword'] .'%"';

            //Keep this line to use Sql Injection
            //Don't change
            //Example keyword: abcef%";TRUNCATE banks;##
            $users = self::$_connection->multi_query($sql);
        } else {
            $sql = 'SELECT * FROM users';
            $users = $this->select($sql);
        }

        return $users;
    }
}