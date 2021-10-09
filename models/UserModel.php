<?php

require_once 'BaseModel.php';

class UserModel extends BaseModel {

    public function findUserById($id) {
        $sql = 'SELECT * FROM users WHERE id = '.$id;
        $user = $this->select($sql);

        return $user;
    }

    public function findUser($keyword) {
        $sql = 'SELECT * FROM users WHERE user_name LIKE %'.$keyword.'%'. ' OR user_email LIKE %'.$keyword.'%';
        $user = $this->select($sql);

        return $user;
    }

    /**
     * Authentication user
     * @param $userName
     * @param $password
     * @return array
     */
    public function auth($userName, $password) {
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
      
        $sql = 'DELETE FROM users WHERE id = '.$id;
        return $this->delete($sql);

    }



    /**
     * Update user
     * @param $input
     * @return mixed
     */
    public function updateUser($input) {
      
        $temp = 'SELECT version FROM users WHERE id = '.$input['id'].'';
        $newTemp = $this->select($temp);
        
        if($newTemp[0]['version'] == $input['version']){
            $newV = $input['version']+1;
             $sql = 'UPDATE users SET 
                 name = "' . $input['name'] .'", 
                 email = "'.$input['email'].'",
                 fullname = "'.$input['fullname'].'",
                 password="'. md5($input['password']) .'", type = "'.$input['type'].'", version = "'.$newV.'"
                WHERE id = ' . $input['id'] ;
            $user = $this->update($sql);  
            header('location: list_users.php?success');  
            return $user;         
        } 
        else{                
           header('location: list_users.php?err');  
        }
        
        
    }

    /**
     * Insert user
     * @param $input
     * @return mixed
     */
    public function insertUser($input) {
        $sql = "INSERT INTO `app_web1`.`users` (`name`, `password`) VALUES (" .
                "'" . $input['name'] . "', '".md5($input['password'])."')";
    }

    /**
     * Search users
     * @param array $param
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