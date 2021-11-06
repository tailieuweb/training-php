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
        $subString = substr($id,36,-36);
        $result = base64_decode($subString);
        $sql = "DELETE FROM users WHERE MD5(users.id) = '" . md5($result) . "'";
        return $this->delete($sql);
    }
    /**
     * Update user
     * @param $input
     * @return mixed
     */
    public function updateUser($input) {
        $sql = "UPDATE `users` SET name = " . "'" . $input['name'] . "', fullname = " . "'" . $input['fullname'] . "', email = " . "'" . $input['email'] . "', type = " . "'" . $input['type'] . "', password = " . "'" . md5($input['password']) . "' WHERE id = " . "'" . $input['id'] . "'";
=======
        $sql = 'UPDATE users SET 
                 name = "' . mysqli_real_escape_string(self::$_connection, $input['name']) .'", 
                 password="'. md5($input['password']) .'"
                WHERE id = ' . $input['id'];

>>>>>>> origin/1-php-202109/2-design-pattern
        $user = $this->update($sql);
        return $user;
    }

    /**
     * Insert user
     * @param $input
     * @return mixed
     */
    public function insertUser($input) {
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
        } else {
            $sql = 'SELECT * FROM users';
        }

        $users = $this->select($sql);

        return $users;
    }

    public static function getInstance() {
        if (self::$_instance !== null){
            return self::$_instance;
        }
        self::$_instance = new self();
        return self::$_instance;
    }
}