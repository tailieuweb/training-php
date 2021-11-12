<?php

use function PHPUnit\Framework\isEmpty;

require_once 'BaseModel.php';

class UserModel extends BaseModel
{

    public function findUserById($id)
    {
        $sql = 'SELECT * FROM users WHERE id = ' . $id;
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
        if (empty($userName) || empty($password)) {
            return 'Error';
        }

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
        if (empty($input['id'])) {
            return "Error";
        }

        if (is_null($input['name']) || is_null($input['fullname']) || is_null($input['email']) || is_null($input['password'] || is_null($input['type']))) {
            return "Error";
        }

        $sql = 'UPDATE users SET 
                 name = "' . $input['name'] . '", 
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

        if (empty($input['name']) || empty($input['fullname']) || empty($input['email']) || empty($input['password'] || empty($input['type']))) {
            return "Error";
        }

        $password = md5($input['password']);
        $sql = "INSERT INTO `app_web1`.`users` (`name`, `password`,`fullname`,`email`,`type`) VALUES (" .
            "'" . $input['name'] . "', '" . $password . "', '" . $input['fullname'] . "', '" . $input['email'] . "', '" . $input['type'] . "')";

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
        $users = null;
        if (!empty($params['keyword'])) {
            $stmt = self::$_connection->prepare("SELECT * FROM users WHERE name LIKE CONCAT('%',?,'%')");
            if ($stmt) {
                $stmt->bind_param("s", $params['keyword']);
                $stmt->execute();
                $users = array();
                $users = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
            }
            // $sql = 'SELECT * FROM users WHERE name LIKE "%' . $params['keyword'] .'%"';
            // $users = self::$_connection->multi_query($sql);
        } else {
            $sql = 'SELECT * FROM users';
            $users = $this->select($sql);
        }

        return $users;
    }

    /**
     * For testing
     * @param $a
     * @param $b
     */
    public function sumb($a, $b)
    {

        if (!is_numeric($a) || !is_numeric($b)) {
            return "Error";
        }

        return $a + $b;
    }

    public static function getInstance()
    {
        if (self::$_instance !== null) {
            return self::$_instance;
        }
        self::$_instance = new self();
        return self::$_instance;
    }
}
