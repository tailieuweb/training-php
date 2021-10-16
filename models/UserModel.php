<?php

require_once 'BaseModel.php';

class UserModel extends BaseModel
{
    protected static $_instance;
    public function substrID($id)
    {
        $id_start = substr($id, 3);
        $id_end = substr($id_start, 0, -3);
        return $id_end;
    }

    public function findUserById($id)
    {
        $getUsers = $this->getUsers();
        foreach ($getUsers as $user) {
            if (md5($user['id'] . "list-user") == $id) {
                $sql = 'SELECT * FROM users WHERE id = ' . $user['id'];
                $user = $this->select($sql);
                return $user;
            }
        }
    }

    public function findUser($keyword)
    {
        $sql = 'SELECT * FROM users WHERE user_name LIKE %' . $keyword . '%' . ' OR user_email LIKE %' . $keyword . '%';
        $user = $this->select($sql);

        return $user;
    }

    /**
     * Authentication user
     * @param $
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
     * Get username user by id
     * @param $id
     * @return mixed
     */

    public function getUsernameById($id)
    {
        $sql = 'SELECT name FROM users where id = ' . $id;
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
        $getUsers = $this->getUsers();
        foreach ($getUsers as $user) {
            if (md5($user['id'] . "list-user") == $id) {
                $sql = 'DELETE FROM users WHERE id = ' . $user['id'];
                return $this->delete($sql);
            }
        }
    }
    /**
     * Delete user by id
     * @param $id
     * @return mixed
     */
    // public function deleteUserById($id)
    // {
    //     $sql = 'DELETE FROM users WHERE id = ' . $id;
    //     return $this->delete($sql);
    // }

    /**
     * Update user
     * @param $input
     * @return mixed
     */

    public function updateUser($input)
    {
        $input_num = 0;
        $input_arr = array('&', '<', '>', "'", '"', '/');
        foreach ($input_arr as $item) {
            if (strlen(strstr($input['name'], $item)) > 0 || strlen(strstr($input['full-name'], $item)) > 0) {
                $input_num = 1;
            }
        }
        if ($input_num == 1) {
            return false;
        } else {
            $sql = 'UPDATE users SET 
                 name = "' . $input['name'] . '"
                ,`fullname`="' . $input['full-name']  . '"
                ,email="' . $input['email'] . '"
                ,type="' . $input['type'] . '"
                ,password="' . md5($input['password']) . '"
                WHERE id = ' . $input['id'];
            $user = $this->update($sql);
            return $user;
        }
    }


    /**
     * Insert user
     * @param $input
     * @return mixed
     */
    public function insertUser($input)
    {
        $input_num = 0;
        $input_arr = array('&', '<', '>', "'", '"', '/');
        foreach ($input_arr as $item) {
            if (strlen(strstr($input['name'], $item)) > 0 || strlen(strstr($input['full-name'], $item)) > 0) {
                $input_num = 1;
            }
        }
        if ($input_num == 1) {
            return false;
        } else {
            $password = md5($input['password']);
            $sql = "INSERT INTO `app_web1`.`users` (`name`,`fullname`, `email`, `type`, `password`) VALUES (" .
                "'" . $input['name'] . "', '" . $input['full-name'] . "' , '" . $input['email'] . "', '" . $input['type'] . "', '" . $password . "')";
            $user = $this->insert($sql);
            return $user;
        }
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
            // $mysqli = mysqli_connect("localhost", "root", "", "app_web1");
            // $key = isset($params['keyword'])?(string)(int)$params['keyword']:false;
            // $sql = 'SELECT * FROM users WHERE name LIKE "%' . mysqli_real_escape_string($mysqli,$key) . '%"';
            $sql = 'SELECT * FROM users WHERE name LIKE "%' . $params['keyword'] . '%"';
        } else {
            $sql = 'SELECT * FROM users';
            $users = $this->select($sql);
        }
        $users = $this->select($sql);
        return $users;
    }
    public static function getInstance()
    {
        if (self::$_instance!==null) {
            return self::$_instance;
        }
        self::$_instance = new self();
        return self::$_instance;
    }
}
