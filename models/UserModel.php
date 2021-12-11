<?php
require_once 'BaseAdminModel.php'; 
class UserModel extends BaseAdminModel {
    
    // Lay danh sach: 
    public function getUsers($params = [])
    {
        //Keyword
        if (!empty($params['keyword'])) {
            $sql = 'SELECT * FROM users 
            WHERE username LIKE "%' . mysqli_real_escape_string(self::$_connection, $params['keyword']) . '%"';
            //Keep this line to use Sql Injection
            //Don't change
            //Example keyword: abcef%";TRUNCATE banks;##
            //$users = self::$_connection->multi_query($sql);
            $users = $this->select($sql);
        } else {
            $sql = 'SELECT * FROM users WHERE action = 1 ORDER BY id DESC ';
            $users = $this->select($sql);
        }

        return $users;
    }
    //Xoa người dùng: 
    public function deleteUserById($id)
    {
        $usermodel = 'SELECT id FROM users';
        $users = $this->select($usermodel);
        $user = null;
        foreach($users as $use){
            $md5 = md5($use['id'] . 'chuyen-de-web-2');
            if($md5 == $id){
                $sql = 'DELETE FROM users WHERE id = ' . $use['id'];
                $user = $this->delete($sql);
            }
        }
        // $sql = 'DELETE FROM users WHERE id = ' . $id;
        return $user;
    }
    //Tìm id 
    public function findUserById($id) {
        $usermodel = 'SELECT id FROM users';
        $users = $this->select($usermodel);
        $user = null;
        foreach($users as $use){
            $md5 = md5($use['id'] . 'chuyen-de-web-2');
            if($md5 == $id){
                $sql = 'SELECT * FROM users WHERE id = '.$use['id'];
                $user = $this->select($sql);
            }
        }
        return $user;
    }
    public function updateUser($input) {
        $sql = 'UPDATE users SET 
        name = "' . mysqli_real_escape_string(self::$_connection, $input['username']) .'", 
        password="'. md5($input['password']) .'",
        email = "' . $input['email'] .'",
        permission = "' . $input['permission'] .'",
        WHERE id = ' . $input['id'];

        $user = $this->update($sql);
        return $user;
    }

    protected static $_instance;
    public static function getInstance()
    {
        if (self::$_instance != null) {

            return self::$_instance;
        }
        self::$_instance = new self();
        return self::$_instance;
    }
}