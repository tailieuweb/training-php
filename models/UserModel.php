<?php
// require './models/Pattern/UserRepositoryPattern.php';
require_once './models/BaseModel.php';
class UserModel extends BaseModel
{
    private static $instanceUserModel = NULL;
    public $x;
    public function __construct()
    {
        // return self::$instanceUserModel;
    }
    public static function getInstance() : UserModel{
        if(self::$instanceUserModel == NULL){
            self::$instanceUserModel = new UserModel();
        }
        return self::$instanceUserModel;
    }

    public function findUserById($id) {
        $id = BaseModel::matchRegexInput($id);
        $sql = BaseModel::connectDatabase()->prepare("SELECT * FROM users WHERE id = ?");
        $sql->bind_param("i",$id);
        $sql->execute();
        $user = array();
        $user = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $user;
    }

    public function findUser($keyword) {
        $sql = 'SELECT * FROM users WHERE user_name LIKE %'.$keyword.'%'. ' OR user_email LIKE %'.$keyword.'%';
        // $user = $this->select($sql);
        // return $user;
        // $sql_stmt = mysqli_prepare($_connection,'SELECT * FROM users WHERE user_name LIKE   ? OR user_email LIKE ?');
        // mysqli_stmt_bind_param($sql_stmt,'ss',$keyword,$keyword);
        // $user = mysqli_stmt_execute($sql_stmt);
        // return $user;
    }

    public function auth($userName, $password) {
        $md5Password = $password;
        $sql = 'SELECT * FROM users WHERE name = "' . $userName . '" AND password = "'.$md5Password.'"';
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
    public function updateUser($input) {

        $sql = 'UPDATE users SET 
                 name = "' . $input['name'] .'", 
                 email = "'.$input['email'].'",
                 fullname = "'.$input['fullname'].'",
               password="'. md5($input['password']) .'", type = "'.$input['type'].'"
                WHERE id = ' . $input['id'];

        $user = $this->update($sql);
        // $str_replace = $this->matchRegexInput($input);
        $sql = $this->connectDatabase()->prepare('UPDATE users SET users.name = ?, users.email = ?,users.fullname = ?
        , users.password = ?  ,users.type = ? WHERE users.id = ?');

        // $sql->bind_param("sssssi",$str_replace['name'],$str_replace['email']
        //         ,$str_replace['fullname'],md5($str_replace['password']),$str_replace['type'],$str_replace['id']);
        $sql->bind_param("sssssi",$input['name'],$input['email']
            ,$input['fullname'],md5($input['password']),$input['type'],$input['id']);
        return $sql->execute();
    }

    /**
     * Insert user
     * @param $input
     * @return mixed
     */

     //fix add new user
    public function insertUser($input) {
        $password = md5($input['password']);
        $str_replace = BaseModel::matchRegexInput($input);
        $sql = $this->connectDatabase()->prepare('INSERT INTO `users` (`name`,`fullname`, `email`, `type`, `password`) 
                VALUES(?,?,?,?,?)');
        $sql->bind_param("sssss",$str_replace['name'],$str_replace['fullname'],$str_replace['email']
                ,$str_replace['type'],$password);
        return $sql->execute();
    }

    /**
     * Search users
     * @param array $param
     * @return array
     */
    public function getUsers($params = [])
    {
        //Keyword
        if (!empty($params['keyword'])) {
            $str_keyword = BaseModel::matchRegexInput($params);
            $str_keyword =  "%" . $params['keyword'] . "%";
            $sql = $this->connectDatabase()->prepare('SELECT * FROM users WHERE name LIKE ?');
            $sql->bind_param('s',  $str_keyword);
        } else {
            $sql = $this->connectDatabase()->prepare('SELECT * FROM users');
        }
        $result = $this->select_result($sql) ? $this->select_result($sql) : [];
        return $result;
    }
    // public static function getInstance() {
    //     if (self::$_instance !== null){
    //         return self::$_instance;
    //     }
    //     self::$_instance = new self();
    //     return self::$_instance;
    // }
    /**
     * For testing
     * @param $a
     * @param $b
     */
    public function sumb($a, $b) {
        return $a + $b;
    }
}