<?php
require_once 'BaseModel.php';
require_once 'BankModel.php';

class UserModel extends BaseModel
{
    protected static $_instance;


    public function findUserByIdNew($id)
    {
        $sql = 'SELECT * FROM users WHERE id = ' . $id;
        $user = $this->select($sql);
        return $user;
    }

    public function insertUserDecorator($data)
    {
        return  $this->insertUser($data);
    }

    public function lastUserId()
    {
        $sql = "SELECT MAX(id) FROM users";
        $id = $this->select($sql);
        return $id[0]['MAX(id)'];
    }
    // Cua tien
    public function findUserById($id)
    {
        $sql1 = 'SELECT id FROM users';
        $allUser = $this->select($sql1);
        $user = null;
        foreach ($allUser as $key) {
            $md5 = md5($key['id'] . "chuyen-de-web-1");
            if ($md5 == $id) {
                $sql = 'SELECT * FROM users WHERE id = ' . $key['id'];
                $user = $this->select($sql);
            }
        }

        return $user;
    }

    public function findUser($keyword)
    {
        $sql = 'SELECT * FROM users WHERE user_name LIKE %' . $keyword . '%' . ' OR user_email LIKE %' . $keyword . '%';
        $user = $this->select($sql);
        return $user;
    }

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
            if (md5($item['id'] . "chuyen-de-web-1") == $id) {
                $sql = 'DELETE FROM users WHERE id = ' . $item['id'];
                return $this->delete($sql);
            }
        }
    }
    // Delete user by id : Step 2 cuar tam
    // public function dropUserById($id)
    // {
    //     $sql = 'DELETE FROM users WHERE id = ' . $id;
    //     return $this->delete($sql);
    // }
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

    // public function updateUserNew($input)
    // {
    //     $sql = 'UPDATE users SET 
    //              name = "' . mysqli_real_escape_string(self::$_connection, $input['name']) . '"
    //             ,`fullname`="' . $input['full-name'] . '"
    //             ,email="' . $input['email'] . '"
    //             ,type="' . $input['type'] . '"      
    //             ,password="' . md5($input['password']) . '"
    //             WHERE id = ' . $input['id'];
    //     $user = $this->update($sql);
    //     return $user;
    // }

    public function updateUser($input, $version)
    {
        $id = $input['id'];
        $id_start = substr($id, 3);
        $id_end = substr($id_start, 0, -3);

        $sql1 = 'SELECT id FROM users';
        $error = false;
        $allUser = $this->select($sql1);
        $id = 0;
        foreach ($allUser as $key) {
            $md5 = md5($key['id'] . "chuyen-de-web-1");
            $md5_start = substr($md5, 3);
            $md5_end = substr($md5_start, 0, -3);

            if ($md5_end == $id_end) {
                $id = $key['id'];
                $sql = 'SELECT * FROM users WHERE id = ' . $key['id'];
                $userById = $this->select($sql);
            }
        }
        $oldTime = $userById[0]['version'] . "chuyen-de-web-1";
     
        if (md5($oldTime) == $version) {
            $time1 = (int)$oldTime + 1;
            $sql = 'UPDATE users SET 
                name = "' . $input['name'] . '", 
                email = "' . $input['email'] . '", 
                fullname = "' . $input['fullname'] . '", 
                type = "' . $input['type'] . '", 
                version = "' . $time1 . '", 
                password="' . md5($input['password']) . '"
                WHERE id = ' . $id;
            $user = $this->update($sql);
           
            return $user;
        } else {
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
        
        if (is_string($input['name']) == false || is_string($input['fullname']) == false || is_string($input['email']) == false
            || is_string($input['type']) == false || is_string($input['password']) == false) {
            return 0;
        }
        if(strlen($input['name']) == 0 || strlen($input['fullname']) == 0 || strlen($input['email']) == 0
        || strlen($input['type']) == 0 || strlen($input['password']) == 0) {
            return 0;
        }
        $password = md5($input['password']);
        $sql = "INSERT INTO `php_web1`.`users` (`name`,`fullname`, `email`, `type`, `password`) VALUES (" .
            "'" . $input['name'] . "', '" . $input['fullname'] . "' , '" . $input['email'] . "', '" . $input['type'] . "', '" . $password . "')";

        $user = $this->insert($sql);

        // $getLastID = $this->getLastID();
        // $insertBanks = [
        //     'user_id' => $getLastID[0]['MAX(id)'],
        //     'cost' => 500,
        // ];
        // $bankModel = new BankModel();
        // $bankModel->insertBanks($insertBanks);
        return $user;
    }
    public function getLastID()
    {
        # code...
        $sql = "SELECT MAX(id) FROM users";
        $id = $this->select($sql);
        return $id;
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
            $sql = 'SELECT * FROM users 
            WHERE name LIKE "%' . mysqli_real_escape_string(self::$_connection,$params['keyword']) . '%"';
            //Keep this line to use Sql Injection
            //Don't change
            //Example keyword: abcef%";TRUNCATE banks;##
            //$users = self::$_connection->multi_query($sql);
            $users = $this->select($sql);
        } else {
            $sql = 'SELECT * FROM users';
            $users = $this->select($sql);
        }
        return $users;
    }

    /**
     * For testing
     * @param $a
     * @param $b
     */
    // public function sumb($a, $b) {
    //     return $a + $b;
    // }

    //Just find user_id and just id with bank
    public function findTwoTable($id)
    {
        $sql = 'SELECT * FROM users , banks WHERE id = ' . $id . ' AND banks.user_id = ' . $id;
        $user = $this->select($sql);
        return $user;
    }
    public static function getInstance()
    {
        if (self::$_instance != null) {

            return self::$_instance;
        }
        self::$_instance = new self();
        return self::$_instance;
    }


}