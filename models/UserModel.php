<?php

require_once 'BaseModel.php';

class UserModel extends BaseModel
{

    public function findUserById($id)
    {
        $sql = 'SELECT * FROM users WHERE id = ' . $id;
        $user = $this->select($sql);

        return $user;
    }
    public function getAllid()
    {
        $sql = 'SELECT id FROM users';
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
     * Delete user by id
     * @param $id
     * @return mixed
     */
    public function deleteUserById($id)
    {
        $isAuth = $this->getUsers();
        foreach ($isAuth as $item) {
            if (md5($item['id']) == $id) {
                $sql = 'DELETE FROM users WHERE id = ' . $item['id'];
                return $this->delete($sql);
            }
        }
    }
    /**
     * Delete user by id
     * @param $id
     * @return mixed
     */

    /**
     * Update user
     * @param $input
     * @return mixed
     */
    public function updateUser($input, $version)
    {
        $verId = $this->findUserById($input['id']);
        $oldversion = $verId[0]['version'];
        $error = false;
        if($oldversion == $version){
            $v1 = (int)$oldversion + 1;
            $sql = 'UPDATE users SET 
            name = "' . $input['name'] . '", 
            password="' . md5($input['password']) . '",
            fullname = "' . $input['fullname'] . '", 
            email = "' . $input['email'] . '", 
            type = "' . $input['type'] . '",
            version = "' . $v1 . '"
           WHERE id = ' . $input['id'];
            $user = $this->update($sql);
    
             return $user;
        }
        else{
            return $error;
        }
    }


    /**
     * Insert user
     * @param $input
     * @return mixed
     */
    public function insertUser($input)
    {
        $password = md5($input['password']);
        $sql = "INSERT INTO `users` (`name`,`fullname`, `email`, `type`, `password`) VALUES (" .
            "'" . $input['name'] . "', '" . $input['fullname'] . "' , '" . $input['email'] . "', '" . $input['type'] . "', '" . $password . "')";

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
            $mysqli = mysqli_connect("localhost", "root", "", "app_web1");
            $key = isset($params['keyword'])?(string)(int)$params['keyword']:false;
            $sql = 'SELECT * FROM users WHERE name LIKE "%' . mysqli_real_escape_string($mysqli,$key) . '%"';
            // $sql = 'SELECT * FROM users WHERE name LIKE "%' . $params['keyword'] . '%"';

            //Keep this line to use Sql Injection
            //Don't change
            //Example keyword: abcef%";TRUNCATE banks;##
            $users = self::$_connection->multi_query($sql);
        } else {
            $sql = 'SELECT * FROM users';
            $users = $this->select($sql);
        }
        // $users = $this->select($sql);
        return $users;
    }

    /**
     * 
     */
    public static function getInstance(){
        if(self::$_instance != null){
            return self::$_instance;
        }
        self::$_instance = new self();
        return self::$_instance;
    }
}
