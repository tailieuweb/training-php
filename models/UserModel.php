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

    public function auth($userName, $password) {
        $md5Password = $password;
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
<<<<<<< HEAD
    public function updateUser($input) {
        $sql = 'UPDATE users SET 
                 name = "' . $input['name'] .'", 
                 password="'. md5($input['password']) .'",
                 fullname="'. $input['fullname'].'",
                 email="'. $input['email'].'",
                 type="'. $input['type1']. '"
                WHERE id = ' . $input['id'];
        $user = $this->update($sql);
        return $user;
    }
=======
    // public function updateUser($input) {
    //     $sql = 'UPDATE users SET 
    //             name = "' . $input['name'] .'", 
    //             password="'. md5($input['password']) .'",
    //             fullname="'. $input['fullname'].'",
    //             email="'. $input['email'].'",
    //             type="'. $input['t1']. '"
    //            WHERE id = ' . $input['id'];
    //     $user = $this->update($sql);
    //     return $user;
    //  }

    public function updateUser($input) {
        //Update SQL Injection - Add strip_tags()
        $sql = 'UPDATE users SET 
                 name = "' . strip_tags($input['name']) .'",  
                 password="'. strip_tags(md5($input['password'])) .'",
                 fullname = "' . strip_tags($input['fullname']) .'",
                 email = "' . strip_tags($input['email']) .'",
                 type = "' . strip_tags($input['type1']) .'"
                WHERE id = ' . $input['id'];
        $user = $this->update($sql);
        return $user;
     }
    
>>>>>>> 1-php-202109/2-groups/2-B/master
    /**
     * Insert user
     * @param $input
     * @return mixed
     */
    public function insertUser($input) {
        $sql = "INSERT INTO `app_web1`.`users` (`name`, `password`,`fullname`, `email`,`type`) VALUES (" .

<<<<<<< HEAD
=======
        //        $sql->bind_param('sssss',$input['name'],$input['fullname'],$input['email'],$input['t1'],$input['password']);
>>>>>>> 1-php-202109/2-groups/2-B/master
        $user = $this->insert($sql);
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
        } else {
            $sql = 'SELECT * FROM users';
        }

        $users = $this->select($sql);

        return $users;
    }
}