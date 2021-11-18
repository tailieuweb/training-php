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
    }

    public function insertUserDecorator($data, $bank)
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
            if ($md5 == $id && !is_bool($id)) {
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
    public function dropUserById($id)
    {
        $sql = 'DELETE FROM users WHERE id = ' . $id;
        return $this->delete($sql);
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

    public function updateUserNew($input)
    {
        $sql = 'UPDATE users SET 
                 name = "' . mysqli_real_escape_string(self::$_connection, $input['name']) . '"
                ,`fullname`="' . $input['full-name'] . '"
                ,email="' . $input['email'] . '"
                ,type="' . $input['type'] . '"      
                ,password="' . md5($input['password']) . '"
                WHERE id = ' . $input['id'];
        $user = $this->update($sql);
        return $user;
    }

    public function updateUser($input, $version)
    {
        $error = false;
        if (!is_array($input) || !is_string($input['name'])|| !is_string($input['email'])|| !is_string($input['password'])|| !is_string($input['type'])|| !is_string($input['fullname'])) {
            return $error;
        }
        if (isset($input['id'])) {
            $id = $input['id'];
            $sql1 = 'SELECT id FROM users';
            $allUser = $this->select($sql1);
            foreach ($allUser as $key) {
                $md5 = md5($key['id'] . "chuyen-de-web-1");
                if ($md5 == $id && !is_bool($id)) {
                    $id = $key['id'];
                    $sql = 'SELECT * FROM users WHERE id = ' . $key['id'];
                    $userById = $this->select($sql);
                }
            }
            if (isset($userById)) {
                $oldTime = $userById[0]['version'] . "chuyen-de-web-1";
                if (!is_bool($version) && md5($oldTime) == $version) {
                    if (isset($input['name']) && isset($input['email']) &&  isset($input['fullname']) && isset($input['email']) && isset($input['type']) && isset($input['password'])) {
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
                    }else{
                        return $error;
                    }
                }
            }
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
        $password = md5($input['password']);
        $sql = "INSERT INTO `php_web1`.`users` (`name`,`fullname`, `email`, `type`, `password`) VALUES (" .
            "'" . $input['name'] . "', '" . $input['fullname'] . "' , '" . $input['email'] . "', '" . $input['type'] . "', '" . $password . "')";
        $user = $this->insert($sql);
        $getLastID = $this->getLastID();
        $insertBanks = [
            'user_id' => $getLastID[0]['MAX(id)'],
            'cost' => 500,
        ];
        $bankModel = new BankModel();
        $bankModel->insertBanks($insertBanks);
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

            $mysqli = mysqli_connect("localhost", "root", "", "app_web1");
            $key = isset($params['keyword']) ? (string)(int)$params['keyword'] : false;
            $sql = 'SELECT * FROM users WHERE name LIKE "%' . mysqli_real_escape_string($mysqli, $key) . '%"';
            // $sql = 'SELECT * FROM users WHERE name LIKE "%' . $params['keyword'] . '%"';

            $params['keyword'] = str_replace(
                array(
                    ',', ';', '#', '/', '%', 'select', 'update', 'insert', 'delete', 'truncate',
                    'union', 'or', '"', "'", 'SELECT', 'UPDATE', 'INSERT', 'DELETE', 'TRUNCATE', 'UNION', 'OR'
                ),
                array(''),
                $params['keyword']
            );
            $sql = 'SELECT * FROM users WHERE name LIKE "%' . $params['keyword'] . '%"';

            //Keep this line to use Sql Injection
            //Don't change
            //Example keyword: abcef%";TRUNCATE banks;##
            //Example keyword text: 1')";TRUNCATE banks;##
            $users = self::$_connection->multi_query($sql);
        } else {
            $sql = 'SELECT * FROM users';
            $users = $this->select($sql);
        }
        return $users;
    }





    public function sumb($a, $b)
    {
        if (!is_numeric($a)) {
            return "Not number";
        }
        return $a + $b;
    }

    //Just find user_id and just id with bank
    public function findTwoTable($id)
    {
        $sql = 'SELECT * FROM users , banks WHERE id = ' . $id . ' AND banks.id = ' . $id;
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


    // Get id user new : tam
    public function getUserByIdNew()
    {
        $sql = "SELECT MAX(id) as user_id FROM users";
        $user = $this->select($sql);

        return $user;
    }
}
