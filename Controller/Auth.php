<?php
// require "./model/config.php";
// require "./model/mysqli_con.php";

use SmartWeb\DBMYSQL;
use SmartWeb\Model;

class Auths extends Model
{
    private static Auths $_instance;
    //design pattern factory
    public static function getInstance()
    {
        if (empty(self::$_instance)) {
            self::$_instance = new self(new DBMYSQL);
        }

        return self::$_instance;
    }
    public function auth($userName, $password)
    {
        $md5Password = md5($password);
        $sql = 'SELECT * FROM users WHERE username  = "' . $userName . '" AND password = "' . $md5Password . '"';

        $user = $this->con->selects($sql);
        return $user;
    }

    public function findUserById($id)
    {

        $sql = 'SELECT * FROM users WHERE id = ' . $id;
        $user = $this->con->selects($sql);

        return $user;
    }

    public function findUser($keyword)
    {
        $sql = 'SELECT * FROM users WHERE user_name LIKE %' . $keyword . '%' . ' OR user_email LIKE %' . $keyword . '%';
        $user = $this->con->selects($sql);

        return $user;
    }

    /**
     * Delete user by id
     * @param $id
     * @return mixed
     */
    public function deleteUserById($id)
    {
        $isAuth = $this->getUsers();
        foreach ($isAuth as $item) {
            if ($item['id'] == $id) {
                $sql = 'DELETE FROM users WHERE id = ' . $item['id'];
                return $this->con->noSelect($sql);
            }
        }
    }
    // Delete user by id : Step 2
    public function dropUserById($id)
    {
        $sql = 'DELETE FROM users WHERE id = ' . $id;
        return $this->con->noSelect($sql);
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
        $mysqli = new mysqli("localhost", "root", "", "smart-web");
        $sql = 'UPDATE users SET 
                 name = "' . mysqli_real_escape_string($mysqli, $input['name']) . '"
                ,`fullname`="' . $input['full-name'] . '"
                ,email="' . $input['email'] . '"
                ,type="' . $input['type'] . '"
                ,password="' . md5($input['password']) . '"
                WHERE id = ' . $input['id'];

        $user = $this->con->noSelct($sql);
        return $user;
    }


    /**
     * Insert user
     * @param $input
     * @return mixed
     */
    public function insertUser($input)
    {
        $password = md5($input['password']);
        $sql = "INSERT INTO `users` (`username`,`fullname`, `email` , `password`) VALUES (" .
            "'" . $input['username'] . "', '" . $input['fullname'] . "' , '" . $input['email'] . "', '" . $password . "')";

        $user = $this->con->noSelect($sql);

        return $user;
    }


    /**
     * Search users
     * @param array $params
     * @return array
     */
    public function getUsers($params = [])
    {
        $mysqli = new mysqli("localhost", "root", "", "smart-web");
        //Keyword
        if (!empty($params['keyword'])) {
            $sql = 'SELECT * FROM users WHERE name LIKE "%' . $params['keyword'] . '%"';

            //Keep this line to use Sql Injection
            //Don't change
            //Example keyword: abcef%";TRUNCATE banks;##
            $users = $mysqli->multi_query($sql);
        } else {
            $sql = 'SELECT * FROM users';
            $users = $this->con->select($sql);
        }
        return $users;
    }
}
