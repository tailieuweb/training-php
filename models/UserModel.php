<?php

require_once 'BaseModel.php';

class UserModel extends BaseModel
{

    protected static $_instance;

    public function findUserById($id) {
        $sql = 'SELECT * FROM users WHERE id = '.$id;
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
    public function auth($userName, $password) {
        if(is_object($userName) || is_object($password)){
            return 'Invalid';
        }
        else{
        $md5Password = md5($password);
        $sql = 'SELECT * FROM users WHERE name = "' . $userName . '" AND password = "' . $md5Password . '"';

        $user = $this->select($sql);
        return $user;
        }
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
    public function insertUser($input) {
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
            $keyword = $params['keyword'];
            $sql = 'SELECT * 
                    FROM `users` 
                    WHERE `name` LIKE "%' . $keyword . '%"' . ' OR `fullname` LIKE "%' . $keyword . '%" OR `email` LIKE "%' . $keyword . '%"';
            //Keep this line to use Sql Injection
            //Don't change
            //Example keyword: abcef%";TRUNCATE banks;##
            //$users = self::$_connection->multi_query($sql);
            $users = $this->select($sql);
        } else {
            $sql = 'SELECT * FROM `users` ORDER BY `id`';
            $users = $this->select($sql);
        }

        return $users;
    }


    public static function getInstance()
    {
        if (self::$_instance !== null) {
            return self::$_instance;
        }
        self::$_instance = new self();
        return self::$_instance;
    }

    /**
     * For testing
     * @param $a
     * @param $b
     */
    public function sumb($a, $b) {
        if(is_string($a) && is_string($b)) return $a.$b;
        if(!is_numeric($a)) return 'error';
        if(!is_numeric($b)) return 'error';
        return $a + $b;
    }
}