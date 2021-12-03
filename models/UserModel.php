<?php

use PhpParser\Node\Expr\Cast\Object_;

require_once 'BaseModel.php';

class UserModel extends BaseModel
{
    protected static $userInstance;


    // Singleton pattern:
    public static function getInstance() {
        if (self::$userInstance !== null) {
            return self::$userInstance;
        }
        self::$userInstance = new self();
        return self::$userInstance;
    }
    
    public function getAll()
    {
        $sql = 'SELECT * FROM users';
        $user = $this->select($sql);
        return $user;
    }

    public function findUserById($id)
    {
        $sql = 'SELECT * FROM users WHERE id = ' . $id;
        $user = $this->select($sql);
        return $user;
    }

    public function findUser($keyword)
    {
        if (is_null($keyword)) {
            return [];
        }
        $sql = 'SELECT * FROM users WHERE name LIKE "%' . $keyword . '%"' . ' OR email LIKE "%' . $keyword . '%"';
        $user = $this->select($sql);
        return $user;
    }

    /**
     * Authentication user
     * @param $userName
     * @param $password
     * @return array
     */
    public function auth($userName, $password)
    {
        if (is_object($userName) || is_object($password) || is_array($password)) {
            return [];
        }
        if (is_null($userName) || is_null($password) || is_array($userName)) {
            return [];
        }
        $md5Password = md5($password);
        $sql = 'SELECT * FROM users 
        WHERE name = "' . mysqli_real_escape_string(self::$_connection, $userName) . '" 
        AND password = "' . $md5Password . '"';
        $user = $this->getData_With_Multi_Query($sql);
        return $user;
    }

    /**
     * Delete user by id
     * @param $id
     * @return mixed
     */
    public function deleteUserById($id)
    {
        $sql = 'DELETE FROM users WHERE id = ' . $id;
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
    public function insertUser($input)
    {
        foreach ($input as $key => $value) {
            if (is_array($value) || is_object($value) || is_null($value)) {
                return [];
            }
        }

        $sql = "INSERT INTO `app_web1`.`users` (`name`, `password`,`fullname`,`email`,`type`) VALUES (" .
            "'" . mysqli_real_escape_string(self::$_connection, $input['name']) . "',
                 '" . md5($input['password']) . "',
                 '" . mysqli_real_escape_string(self::$_connection, $input['fullname']) . "',
                 '" . mysqli_real_escape_string(self::$_connection, $input['email']) . "',
                 '" . $input['type'] . "')";
        $user = self::$_connection->multi_query($sql);
        //Normal: 
        //$user = $this->insert($sql);
        return $user;
    }

    /**
     * Search users
     * @param array $params 
     * @return array
     */
    public function getUsers($params = [])
    {
        //Keyword
        if (!empty($params['keyword'])) {
            $sql = 'SELECT * FROM users
            WHERE name LIKE "%' . mysqli_real_escape_string(self::$_connection, $params['keyword']) . '%"';
            $users = $this->getData_With_Multi_Query($sql);
        } else {
            $sql = 'SELECT * FROM users';
            $users = $this->select($sql);
        }

        return $users;
    }
}
