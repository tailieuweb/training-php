<?php

require_once 'BaseModel.php';

class UserModel extends BaseModel {
// tim id de them user
    public function findUserById($id) {
        $sql = 'SELECT * FROM users WHERE id = '.$id;
        $user = $this->select($sql);

        return $user;
    }

    public function findUser($keyword) {
        $sql = 'SELECT * FROM users WHERE user_name LIKE %'.$keyword.'%'. ' OR email LIKE %'.$keyword.'%';
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
    //Login Pass khi để 1(SQL Injection)
        //SELECT * FROM users WHERE name = "' . $userName . '" AND  password = "'.$md5Password.'" OR "1"'
        //SELECT * FROM users WHERE name = "hacker2" AND password = "12345" OR "1"
        $sql = 'SELECT * FROM users WHERE name = "' . $userName . '" AND  password = "'.$md5Password.'"';
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
    // tach chuoi ra khoi the html -->strip_tags() 
    // hoac dung mysql_real_escape_string()
    //SQL injection
    /**
     * Update user
     * @param $input
     * @return mixed
     */
    public function updateUser($input) {
        $sql = 'UPDATE users SET 
                 name = "' . $input['name'] .'", 
                 fullname = "' . strip_tags($input['fullname']) .'", 
                 email = "' . strip_tags($input['email']) .'", 
                 type = "' . strip_tags($input['type']) .'", 
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

        $sql = "INSERT INTO `app_web1`.`users` (`name`,`fullname`,`email`,`type`,`password`) 
        VALUES (" . "'" . $input['name'] . "', '".strip_tags($input['fullname']). "', '" . strip_tags($input['email']) . "', '" . strip_tags($input['type']) . "','".md5($input['password']) . "')";

        $user = $this->insert($sql);

        return $user;
    }
    // end strip_tags
    // SQL Injection -> search -> fix
    public function getUsers($params = []) {
        //Keyword
        if (!empty($params['keyword'])) {
            $sql = 'SELECT * FROM users WHERE name LIKE "%' .mysql_real_escape_string(self::$_connection,$params['keyword'] ) .'%"';

            //Keep this line to use Sql Injection
            //Don't change
            //Example keyword: abcef%";TRUNCATE banks;##
            $users = self::$_connection->multi_query($sql);
        } else {

            $sql = 'SELECT * FROM users join types on users.type = types.type_id';

            $users = $this->select($sql);

        }

        return $users;
    }
    public function getTypes($params = []) {
        $sql = 'SELECT * FROM types';
        $types = $this->select($sql);

        return $types;
    }
}