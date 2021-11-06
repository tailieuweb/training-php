<?php
require_once 'BaseModel.php';
require_once 'BankModel.php';
class UserModel extends BaseModel
{
    protected static $_instance;
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
        //Lấy id của tất cả user 
        $sql1 = 'SELECT id FROM users';
        $allUser = $this->select($sql1);

        foreach ($allUser as $key) {
            $md5 = md5($key['id'] . "chuyen-de-web-1");
            if ($md5 == $id) {
                $sql = 'DELETE FROM users WHERE id = ' . $key['id'];
                return $this->delete($sql);
            }
        }
    }

    /**
     * Update user
     * @param $input
     * @return mixed
     */

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
        $password = md5($input['password']);
        $sql = "INSERT INTO `app_web1`.`users` (`name`,`fullname`, `email`, `type`, `password`) VALUES (" .
            "'" . $input['name'] . "', '" . $input['full-name'] . "' , '" . $input['email'] . "', '" . $input['type'] . "', '" . $password . "')";
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
            $users = self::$_connection->multi_query($sql);
        } else {
            $sql = 'SELECT * FROM users';
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
}
