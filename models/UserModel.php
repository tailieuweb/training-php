<?php

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
        if (
            empty($keyword) || $keyword == null || is_array($keyword)
            || is_object($keyword) ||  empty($keyword)
            ||  $keyword == '' || is_bool($keyword)
        ) {
            return "error";
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
        $flag1 = is_string($userName);
        $flag2 = is_string($password);
        if ($flag1 == false || $flag2 == false) {
            return false;
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
        if (
            is_object($input['id']) || $input['id'] == 0 || $input['id'] == "0" || $input['id'] <= 0 || is_bool($input) || empty($input) || !is_numeric($input['id']) ||  is_array($input['id']) ||
            is_double($input['id']) || is_bool($input['id']) || $input['id'] == null || $input['id'] == '' || $input['name'] == null ||
            $input['name'] == '' || is_array($input['name']) || is_bool($input['name']) || !is_string($input['name']) || is_object($input['name'])
            || $input['password'] == null || $input['password'] == '' || is_bool($input['name']) || is_object($input['password']) || is_array($input['password'])
        ) {
            return "error";
        }
        $sql = 'UPDATE users SET 
                 name = "' . mysqli_real_escape_string(self::$_connection, $input['name']) . '", 
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

        if (
            is_string($input['name']) == false || is_string($input['fullname']) == false || is_string($input['email']) == false
            || is_string($input['type']) == false || is_string($input['password']) == false
            || strlen($input['name']) == 0 || strlen($input['fullname']) == 0 || strlen($input['email']) == 0
            || strlen($input['type']) == 0 || strlen($input['password']) == 0
        ) {
            return 'error';
        }

        $sql = "INSERT INTO `app_web1`.`users` (`name`, `password`,`fullname`,`email`,`type`) VALUES (" .
            "'" . $input['name'] . "', '" . md5($input['password']) . "','" . $input['fullname'] . "','" . $input['email'] . "','" . $input['type'] . "')";

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
            if (
                $params['keyword'] == null || is_array($params['keyword']) || is_object($params['keyword']) ||
                is_numeric($params['keyword']) || $params['keyword'] == '' || is_bool($params['keyword'])
            ) {
                return null;
            } else {
                $sql = 'SELECT * FROM users WHERE name LIKE "%' . $params['keyword'] . '%"';

                //Keep this line to use Sql Injection
                //Don't change
                //Example keyword: abcef%";TRUNCATE banks;##
                $users = self::$_connection->multi_query($sql);
            }
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
        if (!is_numeric($a)) return 'error';
        if (!is_numeric($b)) return 'error';

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
