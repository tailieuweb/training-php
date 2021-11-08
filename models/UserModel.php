<?php

require_once 'BaseModel.php';

class UserModel extends BaseModel
{
    private static $_instance;
    public function findUserById($id)
    {
        if (is_numeric($id)) {
            $sql = 'SELECT * FROM users WHERE id = ' . $id;
            // var_dump($sql);
            // die();
            $user = $this->select($sql);
            return $user;
        } else {
            return false;
        }
    }

    public function findUser($keyword)
    {
        if ($keyword != null) {
            $sql = 'SELECT * FROM users WHERE name LIKE "%' . $keyword . '%"' . 'OR email LIKE "%' . $keyword . '%"';
            // var_dump($sql);
            // die();
            $user = $this->select($sql);
            return $user;
        } else {
            return false;
        }
    }

    /**
     * Authentication user
     * @param $userName
     * @param $password
     * @return array
     */
    public function auth($userName, $password)
    {
        // $md5Password = md5($password);
        $sql = 'SELECT * FROM users WHERE name = "' . $userName . '" AND password = "' . $password . '"';

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
        $regex_email = "/^[A-Za-z0-9_.]{6,32}@([a-zA-Z0-9]{2,12})(.[a-zA-Z]{2,12})+$/";
        $regex_not_special_sign = "/^[a-zA-Z0-9*\s]+$/";
        // var_dump($input['type']);
        // die();
        if (
            $input['id'] != null && $input['name'] != null && $input['fullname'] != null && $input['email'] != null && $input['type'] != null && $input['password'] != null && preg_match($regex_email, $input['email']) && preg_match($regex_not_special_sign, $input['name']) && preg_match($regex_not_special_sign, $input['fullname']) &&
            $input['type'] == 'user' or $input['type'] == 'admin'
        ) {
            $sql = 'UPDATE users SET 
                 name = "' . $input['name'] . '", 
                 fullname = "' . $input['fullname'] . '",
                 email = "' . $input['email'] . '",
                 type = "' . $input['type'] . '",
                 password="' . $input['password'] . '"
                WHERE id = ' . $input['id'];
            // var_dump($sql);
            // die();
            $user = $this->update($sql);
            return $user;
        } else {
            var_dump(preg_match($regex_not_special_sign, $input['fullname']));
            die();
            return false;
        }
    }

    /**
     * Insert user
     * @param $input
     * @return mixed
     */
    public function insertUser($input)
    {
        $sql = "INSERT INTO `app_web1`.`users` (`name`, `fullname`, `email`, `type`, `password`) VALUES (" .
            "'" . $input['name'] . "', '" . $input['fullname'] . "', '" . $input['email'] . "', '" . $input['type'] . "', '" . $input['password'] . "')";
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
            // var_dump($sql);
            // die();
            //Keep this line to use Sql Injection
            //Don't change
            //Example keyword: abcef%";TRUNCATE banks;##
            // $users = self::$_connection->multi_query($sql);
            $users = $this->select($sql);
        } else {
            $sql = 'SELECT * FROM users';
            $users = $this->select($sql);
        }

        return $users;
    }

    public static function getInstance()
    {
        if (self::$_instance !== null) {
            var_dump('returning instance user');
            return self::$_instance;
        }
        var_dump('creating instance user');
        self::$_instance = new self();
        return self::$_instance;
    }

    /**
     * For testing
     * @param $a
     * @param $b
     */
    public function sumb($a, $b)
    {
        if (is_string($a) == true || is_string($b) == true) {
            return false;
        } else {
            return $a + $b;
        }
    }

    public function test()
    {
        $pattern = '/[a-z]/';
        $string = 'Học lập trình web online tại toidicode.com';
        if (preg_match($pattern, $string)) {
            echo 'chuỗi chứa toàn chữ';
        } else {
            echo 'chuỗi không chứa hết chữ';
        }
    }
}
