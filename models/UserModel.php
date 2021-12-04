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
        if (!is_array($id)) {
            return [];
        }
        if (isset($id)) {
            return [];
        }
        if (is_object($id) || is_null($id) || is_array($id) || empty($id)) {
            return [];
        }
        if (is_bool($id)) {
            return [];
        }
        if (!is_int($id)) {
            return [];
        } else if ($id < 0){
            return [];
        }
        $sql = 'SELECT * FROM users WHERE id = ' . $id;
        $user = $this->select($sql);
        return $user;
    }

    public function findUser($keyword)
    {
        if (isset($keyword)) {
            return [];
        }
        if (is_object($keyword) || is_null($keyword) || is_array($keyword) || empty($keyword)) {
            return [];
        }
        if (is_bool($keyword)) {
            return [];
        }
        if (!is_string($keyword)) {
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
        if (isset($userName) || isset($password)) {
            return [];
        }
        if (is_object($userName) || is_null($userName) || is_array($userName) || empty($userName)) {
            return [];
        }
        if (is_object($password) || is_null($password) || is_array($password) || empty($password)) {
            return [];
        }
        if (is_bool($userName) || is_bool($password)  ) {
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
        if (!is_array($id)) {
            return [];
        }
        if (isset($id)) {
            return [];
        }
        if (is_object($id) || is_null($id) || is_array($id) || empty($id)) {
            return [];
        }
        if (is_bool($id)) {
            return [];
        }
        if (!is_int($id)) {
            return [];
        } else if ($id < 0){
            return [];
        }
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
        if (!is_array($input)) {
            return [];
        }
        if (isset($input)) {
            return [];
        }
        if (is_object($input["name"]) || is_null($input["name"]) || is_array($input["name"]) || empty($input["name"])) {
            return [];
        }
        if (is_object($input["fullname"]) || is_null($input["fullname"]) || is_array($input["fullname"]) || empty($input["idfullname"])) {
            return [];
        }
        if (is_object($input["email"]) || is_null($input["email"]) || is_array($input["email"]) || empty($input["email"])) {
            return [];
        }
        if (is_object($input["password"]) || is_null($input["password"]) || is_array($input["password"]) || empty($input["password"])) {
            return [];
        }
        if (is_object($input["type"]) || is_null($input["type"]) || is_array($input["type"]) || empty($input["type"])) {
            return [];
        }
        if (is_object($input["id"]) || is_null($input["id"]) || is_array($input["id"]) || empty($input["id"])) {
            return [];
        }
        if (is_bool($input["name"]) || is_bool($input["fullname"]) || is_bool($input["email"]) || is_bool($input["password"]) || is_bool($input["type"]) || is_bool($input["id"])) {
            return [];
        }
        if (!is_int($input["id"])) {
            return [];
        } else if ($input["id"] < 0){
            return [];
        }
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
        if (!is_array($input)) {
            return [];
        }
        if (isset($input)) {
            return [];
        }
        if (is_object($input["name"]) || is_null($input["name"]) || is_array($input["name"]) || empty($input["name"])) {
            return [];
        }
        if (is_object($input["fullname"]) || is_null($input["fullname"]) || is_array($input["fullname"]) || empty($input["idfullname"])) {
            return [];
        }
        if (is_object($input["email"]) || is_null($input["email"]) || is_array($input["email"]) || empty($input["email"])) {
            return [];
        }
        if (is_object($input["password"]) || is_null($input["password"]) || is_array($input["password"]) || empty($input["password"])) {
            return [];
        }
        if (is_object($input["type"]) || is_null($input["type"]) || is_array($input["type"]) || empty($input["type"])) {
            return [];
        }
        if (is_object($input["id"]) || is_null($input["id"]) || is_array($input["id"]) || empty($input["id"])) {
            return [];
        }
        if (is_bool($input["name"]) || is_bool($input["fullname"]) || is_bool($input["email"]) || is_bool($input["password"]) || is_bool($input["type"]) || is_bool($input["id"])) {
            return [];
        }
        if (!is_int($input["id"])) {
            return [];
        } else if ($input["id"] < 0){
            return [];
        }
        $sql = "INSERT INTO `app_web1`.`users` (`name`, `password`,`fullname`,`email`,`type`) VALUES (" .
            "'" . mysqli_real_escape_string(self::$_connection, $input['name']) . "',
                 '" . md5($input['password']) . "',
                 '" . mysqli_real_escape_string(self::$_connection, $input['fullname']) . "',
                 '" . mysqli_real_escape_string(self::$_connection, $input['email']) . "',
                 '" . mysqli_real_escape_string(self::$_connection, $input['type']) . "')";
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
        if (!is_array($params)) {
            return [];
        }
        if (is_object($params["keyword"]) || is_null($params["keyword"]) || is_array($params["keyword"]) || empty($params["keyword"])) {
            return [];
        }
        if (is_bool($params["keyword"])) {
            return [];
        }
        //Keyword
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
