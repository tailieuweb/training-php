<?php

use PhpParser\Node\Expr\Cast\Object_;

require_once 'BaseModel.php';

class UserModel extends BaseModel
{
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
                name = "' . mysqli_real_escape_string(self::$_connection, $input['name']) . '", 
                fullname = "' . $input['fullname'] . '", 
                email = "' . $input['email'] . '", 
                type = "' . $input['type'] . '", 
                password="' . md5($input['password']) . '"
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
        // SQL
        $sql = "INSERT INTO `users`(`name`,`password`,`fullname`, `email`, `type`) 
        VALUES ('" .$input['name'] . "',
        '" .md5($input['password']) . "',
        '" .$input['fullname'] . "',
        '" .$input['email'] . "',
        '" .$input['type'] . "')";
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
        if (!empty($params['keyword'])) {
            $key = str_replace('"', '', $params['keyword']);
            $sql = 'SELECT * FROM users WHERE name LIKE "%' . $key . '%"';

            //Keep this line to use Sql Injection
            //Don't change
            //Example keyword: abcef%";TRUNCATE banks;##
            // $users = self::$_connection->multi_query($sql);
            $users = $this->select($sql);
        } else {

            $sql = 'SELECT * FROM users join types on users.type = types.type_id';
            $users = $this->select($sql);
        }

        return $users;
    }

    // Singleton pattern:
    public static function getInstance()
    {
        if (self::$userInstance !== null) {
            return self::$userInstance;
        }
        self::$userInstance = new self();
        return self::$userInstance;
    }
}
