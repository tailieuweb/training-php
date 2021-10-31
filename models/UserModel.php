<?php

require_once 'BaseModel.php';
require_once 'Result.php';

class UserModel extends BaseModel {
    protected static $_instance;

    private  function __contructor(){}

    public function findUserById($id) {
        $id = $this->decryptID($id);
        $sql = 'SELECT * FROM users WHERE id = '.$id;
        $user = $this->select($sql);

        return $user;
    }

    public function findUser($keyword) {
        $sql = 'SELECT * FROM users WHERE user_name LIKE %'.$keyword.'%'. ' OR user_email LIKE %'.$keyword.'%';
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
        $md5Password = md5($password);
        $sql = 'SELECT * FROM users WHERE name = "' . $userName . '" AND password = "'.$md5Password.'"';

        $user = $this->select($sql);
        return $user;
    }

    /**
     * Delete user by id
     * @param $id
     * @return mixed
     */
    public function deleteUserById($id) {
        $sql = 'DELETE FROM users WHERE id = '.$id;
        return $this->delete($sql);

    }

    /**
     * Update user
     * @param $input
     * @return mixed
     */
    public function updateUser($input) {
        $sql = 'UPDATE users SET 

                 name = "' . mysqli_real_escape_string(self::$_connection, strip_tags($input['name'])) .'", 
                 password="'. strip_tags(md5($input['password'])) .'",
                 fullname="'. strip_tags($input['fullname']) .'",
                 email="'. strip_tags($input['email']) .'",
                 type="'. strip_tags($input['type']) .'",
                WHERE id = ' . strip_tags($input['id']);
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
        $password = md5($input['password']);
        // SQL
        $sql = "INSERT INTO `users`(`name`,`password`,`fullname`, `email`, `type`) 
        VALUES ('" . strip_tags($input['name']) . "',
        '" . strip_tags(md5($input['password'])) . "',
        '" . strip_tags($input['fullname']) . "',
        '" . strip_tags($input['email']) . "',
        '" . strip_tags($input['type']) . "')";
        $user = $this->insert($sql);

        return $user;
    }

    /**
     * Search users
     * @param array $params
     * @return array
     */
    public function getUsers($params = []) {
        //Keyword
        if (!empty($params['keyword'])) {
            $sql = 'SELECT * FROM users WHERE name LIKE "%' . $params['keyword'] .'%"';

            //Keep this line to use Sql Injection
            //Don't change
            //Example keyword: abcef%";TRUNCATE banks;##
            $users = self::$_connection->multi_query($sql);
        } else {
            $sql = 'SELECT * FROM users';
            $users = $this->select($sql);
        }

        return $users;
    }
    // Decrypt id
    private function decryptID($md5Id)
    {
        $users = $this->getUsers();
        foreach ($users as $user) {
            if (md5($user['id'] . 'TeamB-TDC') == $md5Id) {
                return $user['id'];
            }
        }
        return NULL;
    }
    // Singleton pattern:
    public static function getInstance() {
        if (self::$userInstance !== null) {
            return self::$userInstance;
        }
        self::$userInstance = new self();
        return self::$userInstance;
    }
}