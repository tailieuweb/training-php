<?php

//require_once 'BaseModel.php';

class UserModel extends BaseModel
{
    private static $_instance;

    private function __clone()
    {
    }

    private function __construct()
    {
    }

    private function __wakeup()
    {
    }

    public static function getInstance()
    {
        if (self::$_instance !== null) {
            return self::$_instance;
        }
        self::$_instance = new self();
        return self::$_instance;
    }

    public function findUserByUUId($uuid)
    {
        $sql = "SELECT * FROM users WHERE uuid = '$uuid'; ";
        $user = $this->select($sql);

        return $user;
    }

    public function findUserById($id)
    {
        $sql = "SELECT * FROM users WHERE id = $id; ";
        $user = $this->select($sql);

        return $user;
    }

    public function findUser($keyword)
    {
        $sql = 'SELECT * FROM users WHERE user_name LIKE %' . $keyword . '%' . ' OR user_email LIKE %' . $keyword . '%';
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
        $md5Password = md5($password);
        $sql = 'SELECT * FROM users WHERE name = "' . $userName . '" AND password = "' . $md5Password . '"';

        $user = $this->select($sql);
        return $user;
    }

    /**
     * Delete user by id
     * @param $id
     * @return mixed
     */
    public function deleteUserUUById($uuid)
    {
        $sql = "DELETE FROM users WHERE uuid = '$uuid'; ";
        return $this->delete($sql);
    }

    /**
     * Update user
     * @param $input
     * @return mixed
     */
    public function updateUser($input)
    {
        $name = htmlspecialchars($input['name']);
        $fullname = htmlspecialchars($input['fullname']);
        $password = md5(htmlspecialchars($input['password']));
        $email = htmlspecialchars($input['email']);
        $type = htmlspecialchars($input['type']);
        $version = $input['version'] + 1;
        $id = htmlspecialchars($input['id']);
        $uuid = md5($name . $fullname . $email . $type . $password) . rand(0, 1);

        $sql =
            "UPDATE `users` 
        SET `uuid` = '$uuid'
        , `name` = '$name'
        , `fullname` = '$fullname'
        , `email` = '$email'
        , `type` = '$type'
        , `password` = '$password'
        , `version` = $version
        WHERE `id` = $id; ";

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
        $name = htmlspecialchars($input['name']);
        $fullname = htmlspecialchars($input['fullname']);
        $email = htmlspecialchars($input['email']);
        $type = htmlspecialchars($input['type']);
        $password = md5($input['password']);
        $uuid = md5($name . $fullname . $email . $type . $password) . rand(0, 1);
        $sql = "INSERT INTO `users` (`uuid`, `name`, `fullname`, `email`, `type`, `password`, `version`)
                VALUES ('$uuid', '$name ', '$fullname', '$email', '$type', '$password', 1);";

        $user = $this->insert($sql);

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
            $sql = 'SELECT * FROM users WHERE name LIKE "%' . $params['keyword'] . '%"';

            //Keep this line to use Sql Injection
            //Don't change
            //Example keyword: abcef%";TRUNCATE banks;##
            // $users = self::$_connection->multi_query($sql);
        } else {
            $sql = 'SELECT * FROM users';
            // $users = $this->select($sql);
        }
        $users = $this->select($sql);
        return $users;
    }
}
