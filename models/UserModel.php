<?php

use function PHPUnit\Framework\isEmpty;

require_once 'BaseModel.php';

class UserModel extends BaseModel
{

    public function findUserById($id)
    {
        if($id == null){
            return "error";
        }
        if(!is_numeric($id)){
            return "error";
        }
        $sql = 'SELECT * FROM users WHERE id = ' . $id;
        $user = $this->select($sql);

        return $user;
    }

    public function findUser($keyword)
    {
        $sql = 'SELECT * FROM users WHERE name LIKE' . $keyword  . ' OR email LIKE ' . $keyword;
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

        if (!is_string($userName) || !is_string($password)) {
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
        if($id == null){
            return "error";
        }
        if(!is_numeric($id)){
            return "error";
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
        if (empty($input['id'])) {
            return "Error";
        }

        if (!is_string($input['id']) || !is_string($input['name']) || !is_string($input['fullname']) || !is_string($input['email']) || !is_string($input['password']) || !is_string($input['type'])) {
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

        if (!is_string($input['name']) || !is_string($input['fullname']) || !is_string($input['email']) || !is_string($input['password']) || !is_string($input['type'])) {
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

            if (!is_string($params['keyword'])) {
                return "Error";
            }

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

<<<<<<< HEAD
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

=======
>>>>>>> 2-php-202109/2-groups/4-D/3-34-Trung-phpunit
    public static function getInstance()
    {
        if (self::$_instance !== null) {
            return self::$_instance;
        }
        self::$_instance = new self();
        return self::$_instance;
    }
}
