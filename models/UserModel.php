<?php

require_once 'BaseModel.php';

class UserModel extends BaseModel {

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
    public function auth($userName, $password) {
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
    public function deleteUserById($id) {
        if (gettype($id) === "string") return "error";
        if (!is_numeric($id)) return "error";
        $sql = 'DELETE FROM users WHERE id = '.$id;
        return $this->delete($sql);

    }

    /**
     * Update user
     * @param $input
     * @return mixed
     */
    public function updateUser($input) {

        if(isset($input['name']) === null||isset($input['password']) === null||isset($input['email']) === null) return 'error!Không dc truyền đối tượng chuỗi';
        if (!is_numeric($input['id'])||!is_int($input['id'])) return "error!Không dc truyền đối tượng chuỗi";
        $sql = 'UPDATE users SET 
                 name = "' . mysqli_real_escape_string(self::$_connection, $input['name']) .'", 
                 email = "' . $input['email'] .'", 
                 password="'. md5($input['password']) .'"
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
        if(!is_string($input['name'])||!is_string($input['password'])||!is_string($input['email'])) return 'error!Không phải dữ liệu';
        $sql = "INSERT INTO `app_web1`.`users` (`name`, `password`) VALUES (" .
                "'" . $input['name'] . "', '".md5($input['password'])."', '"
        . $input['email']
        . "')";

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

            $users = self::$_connection->multi_query($sql);
        } else {
            $sql = 'SELECT * FROM users';
            $users = $this->select($sql);
        }

        return $users;
        
    }

    public static function getInstance() {
        if (self::$_instance !== null){
            return self::$_instance;
        }
        self::$_instance = new self();
        return self::$_instance;
    }
}