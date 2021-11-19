<?php

require_once 'BaseModel.php';
require_once 'Result.php';

class UserModel extends BaseModel {

    public function getAll() {
        $sql = 'SELECT * FROM users';
        $user = $this->select($sql);
        return $user;
    }
    public function findUserById($id) {
        $id = $this->decryptID($id);
        $sql = 'SELECT * FROM users WHERE id = '.$id;
        $user = $this->select($sql);
        return $user;
    }

    public function findUser($keyword) {
        $sql = 'SELECT * FROM users WHERE user_name LIKE %'.$keyword.'%'. ' OR user_email LIKE %'.$keyword.'%';
        //$users = self::$_connection->multi_query($sql);
        //Normal 
        $users = $this->select($sql);
        return $users;
    }

    /**
     * Authentication user
     * @param $userName
     * @param $password
     * @return array
     */
    public function auth($userName, $password) {
        $md5Password = md5($password);
        $sql = 'SELECT * FROM users 
        WHERE name = "' . mysqli_real_escape_string(self::$_connection, $userName) . '" 
        AND password = "'.$md5Password.'"';
        $user= self::$_connection->multi_query($sql);
        //Normal 
        $user = $this->select($sql);
        return $user;
    }

    /**
     * Delete user by id
     * @param $id
     * @return mixed
     */
    public function deleteUserById($id,BaseModel $bankModel) {
        $sql = 'DELETE FROM users WHERE id = '.$id;
         $this->delete($sql);
         if($BankModel instanceof BankModel) {
            $bankModel->insertUser($input);
        }
         return $this;
    }

    /**
     * Update user
     * @param $input
     * @return mixed
     */
        public function updateUser($input,BaseModel $BankModel) {

            $_id = $input['id'];
            $handleFirst = substr($_id,23);
            $_id = "";
            for ($i=0; $i <strlen($handleFirst)-9 ; $i++) {
                $_id.=$handleFirst[$i];
            }
            $input['id'] = $_id;
            $sql = 'UPDATE users SET 
                     name = "' . mysqli_real_escape_string(self::$_connection, $input['name']) .'", 
                     password="'. md5($input['password']) .'",
                     fullname = "' . $input['fullname'] .'",
                     email = "'	 . $input['email'] .'",
                     type = "' . $input['t1'] .'"
                    WHERE id = ' . $input['id'];
            $user = $this->update($sql);
            if($BankModel instanceof BankModel) {
            $BankModel->updateUser($input);
            }
            return $user;
        }
    // Singleton pattern:
    public static function getInstance() {
        if (self::$userInstance !== null) {
            return self::$userInstance;
        }
        self::$userInstance = new self();
        return self::$userInstance;
    }

}