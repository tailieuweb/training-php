<?php

require_once 'BaseModel.php';

class UserModel extends BaseModel
{

    protected static $_instance;

    public function findUserById($id)
    {
        if(is_array($id) || is_object($id)){
            return false;
        }
        $sql = 'SELECT * FROM users WHERE id = ' . $id;
        $user = $this->select($sql);

        return $user;
    }

    public function findUser($keyword)
    {
        if(is_array($keyword) || is_object($keyword)){
            return false;
        }
        // $keyword = htmlentities($keyword, ENT_QUOTES, "UTF-8");

        $sql = 'SELECT * FROM users WHERE name LIKE %' . $keyword . '%' . ' OR user_email LIKE %' . $keyword . '%';
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
        if(is_array($userName) || is_array($password) ||is_object($userName) || is_object($password)){
            return false;
        }
        $md5Password = md5($password);
        $sql = 'SELECT * FROM users WHERE name = "' . $userName . '" AND password = "' . $md5Password . '"';

        $user = $this->select($sql);
        //Check $user different is null?
        if (!empty($user)) {
            return true;
        }
        return false;
    }

    /**
     * Delete user by id
     * @param $id
     * @return mixed
     */
    public function deleteUserById($id, $token)
    {
        if(!is_int($id) || !is_string($token)){
            return false;
        }
        $sql = 'DELETE FROM users WHERE id = ' . $id;
        return $this->delete($sql, $token);
    }

    /**
     * Update user
     * @param $input
     * @return mixed
     */
    public function updateUser($input)
    {
        foreach($input as $value){
            if(is_array($value) || is_object($value)){
                return false;
            }
        }
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
        $md5Password = md5($input['password']);
        $sql = "INSERT INTO `users` (`name`,`fullname`, `email`, `type`, `password`) VALUES (" .
            "'" . $input['name'] . "', '" . $input['fullname'] . "', '" . $input['email'] . "', '" . $input['type'] . "', '" . $md5Password . "')";


        $user = $this->insert($sql);

        return $user;
    }

    public function getUsers($params = [])
    {
        //Keyword
        if (!empty($params['keyword'])) {
            $key = str_replace('"', '', $params['keyword']);
            $sql = 'SELECT * FROM users WHERE name LIKE "%' . $key . '%"';

            //Keep this line to use Sql Injection
            //Don't change
            //Example keyword: abcef%";TRUNCATE banks;##
            // $users = self::$_connection->multi_query($sql);
            $users = $this->select($sql);
            // var_dump($users).die();
        } else {

            $sql = 'SELECT * FROM users join types on users.type = types.type_id';
            $users = $this->select($sql);
        }

        return $users;
    }
    public function getTypes()
    {
        $sql = 'SELECT * FROM types';
        $types = $this->select($sql);

        return $types;
    }
    public function createToken()
    {
        $token = $this->get_token_value();
        return $token;
    }
    public static function getInstance()
    {
        if (self::$_instance !== null) {
            return self::$_instance;
        }
        self::$_instance = new self();
        return self::$_instance;
    }
    //
    /** 
     * Transatcion
     */
    public function startTransaction(){
        self::$_connection->begin_transaction();
    }
    /**
     * Rollback
     */
    public function rollback(){
        self::$_connection->rollback();
    }
}
