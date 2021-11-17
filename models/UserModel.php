<?php

require_once 'BaseModel.php';

class UserModel extends BaseModel
{
    protected static $_instance;
    public function findUserById($id)
    {
        if(is_object($id) || is_string($id) || $id<0 || is_double($id) || empty($id)
        || is_array($id)){
            return 'Not invalid';
        }
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
        $sql = 'SELECT * FROM users WHERE name LIKE "%' . $keyword . '%"' . 'OR email LIKE "%' . $keyword . '%"';
        // var_dump($sql);
        // die();
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
        if(is_object($id) || is_string($id) || $id<0 || is_double($id) || empty($id)
        || is_array($id)){
            return false;
        }
        else{
            $sql = 'DELETE FROM users WHERE id = ' . $id;
            return $this->delete($sql);
        }
    }

    /**
     * Update user
     * @param $input
     * @return mixed
     */
    public function updateUser($input)
    {
        $sql = 'UPDATE users SET 

                 name = "' . $input['name'] . '", 
                 fullname = "' . $input['fullname'] . '",
                 email = "' . $input['email'] . '",
                 type = "' . $input['type'] . '",

                 name = "' . mysqli_real_escape_string(self::$_connection, $input['name']) . '", 

                 password="' . $input['password'] . '"
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
            // var_dump('returning instance');
            return self::$_instance;
        }
        // var_dump('creating instance');
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
}
