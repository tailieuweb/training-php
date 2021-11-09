<?php

require_once 'BaseModel.php';

class UserModel extends BaseModel {
    public function getAll() {
        $sql = 'SELECT * FROM users';
        $user = $this->select($sql);
        return $user;
    }

    public function findUserById($id) {
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
    public function deleteUserById($id) {
        $sql = 'DELETE FROM users WHERE id = '.$id;
        return $this->delete($sql);

    }

    /**
     * Update user
     * @param $input
     * @return mixed
     */
    public function updateUser($input)
    {

        $sql = 'UPDATE users SET 
                 name = "' . mysqli_real_escape_string(self::$_connection, $input['name'])  . '", 
                 fullname="' . $input['fullname'] . '",
                 email="' . $input['email'] . '",
                 password="' . $input['password'] . '",
                 type="' . $input['type'] . '"
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
       $sql = "INSERT INTO `app_web1`.`users` (`name`, `password`,`fullname`,`email`,`type`) VALUES (" .
                "'" . $input['name'] . "',
                 '".md5($input['password'])."',
                 '".$input['fullname']."',
                 '".$input['email']."',
                 '".$input['type']."')";
        //$user = self::$_connection->multi_query($sql);
        //Normal: 
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
            $sql = 'SELECT * FROM users
            WHERE u.name LIKE "%' . $params['keyword'] .'%"';
            //Keep this line to use Sql Injection
            //Don't change
            //Example keyword: abcef%";TRUNCATE banks;##
            //$users = self::$_connection->multi_query($sql);
            //Normal 
            $users = $this->select($sql);
        } else {
            $sql = 'SELECT * FROM users';
            $users = $this->select($sql);
        }

        return $users;
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