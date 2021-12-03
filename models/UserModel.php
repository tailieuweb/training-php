<?php

require_once 'BaseModel.php';

class UserModel extends BaseModel {

    public function findUserById($id) {
        if (is_int($id)==true||is_string($id)==true){
            $sql = 'SELECT * FROM users WHERE id = '.$id;
            $user = $this->select($sql);
            if($user!=null){
                return $user;
            }
            return $user='error';
        }
        else{
            return $user='error';
        }               
    }

    public function findUser($keyword) {
        if (is_int($keyword)==true||is_string($keyword)==true){
            $sql = 'SELECT * FROM users WHERE name LIKE "%'.$keyword.'%" OR fullname LIKE "%'.$keyword.'%"';
            $user = $this->select($sql);
            if($user!=null){
                return $user;
            }
            return $user='error';
        }
        else{
            return $user='error';
        }  
    }

    /**
     * Authentication user
     * @param $userName
     * @param $password
     * @return array
     */
    public function auth($userName, $password) {
        if ((is_int($userName)==true||is_string($userName)==true)&&(is_int($password)==true||is_string($password)==true)){
        $md5Password = md5($password);
        $sql = 'SELECT * FROM users WHERE name = "' . $userName . '" AND password = "'.$md5Password.'"';

        $user = $this->select($sql);
            if($user!=null){
                return $user;
            }
            return $user='error';
        }else{
            return $user='error';
        } 
    }

    /**
     * Delete user by id
     * @param $id
     * @return mixed
     */
    public function deleteUserById($id) {
        if(is_int($id)==true||is_string($id)==true){
            $user = $this->findUserById($id);
            if ($user!='error') {
                $sql = 'DELETE FROM users WHERE id = '.$id;               
                return $this->delete($sql);
            } else {
                return false;
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
        $sql = 'UPDATE users SET 
                 name = "' . $input['name'] .'", 
                 password="'. md5($input['password']) .'"
                WHERE id = ' . $input['id'];
        $user = $this->update($sql);
        return $user;
    }

    /**
     * Insert user
     * @param $input
     * @return mixed
     */
    public function insertUser($input) {
        $sql = "INSERT INTO `app_web1`.`users` (`name`, `password`) VALUES (" .
                "'" . $input['name'] . "', '".md5($input['password'])."')";

        $user = $this->insert($sql);

        return $user;
    }
    /**
     * getId
     * @param $input
     * @return mixed
     */
    public function getID()
    {
        $sql = 'SELECT MAX(id) as user_id FROM users';
        $user = $this->select($sql);

        return $user[0]["user_id"];
    }
    /**
     * Search users
     * @param array $params
     * @return array
     */
    public function getUsers($params = []) {  
        if (isset($params['keyword'])) {
            if(is_int($params['keyword'])==true||is_string($params['keyword'])==true){
                $sql = 'SELECT * FROM users WHERE name LIKE "%' . $params['keyword'] .'%"OR fullname LIKE "%'.$params['keyword'].'%"';
                $user = $this->select($sql);
                if($user!=null){
                    return $user;
                }            
                return $user='error';
            }
            return $user='error';
            
        } else {
            $sql = 'SELECT * FROM users';
            $users = $this->select($sql);
        }

        return $users;
    }

}