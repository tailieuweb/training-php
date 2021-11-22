<?php

require_once 'BaseModel.php';
require_once 'Result.php';

class UserModel extends BaseModel
{
    protected static $_instance;

    // Find User By id
    public function findUserById($id)
    {
        $id = $this->decryptID($id);
        $sql = 'SELECT * FROM users WHERE id = ' . $id;
        $user = $this->select($sql);

        return isset($user[0]) ? $user[0] : false;
    }

    // Find User By Email
    public function findUserByEmail($email)
    {
        $sql = 'SELECT * FROM users WHERE email ="' . $email . '"';
        $user = $this->select($sql);
       return isset($user[0]) ? $user[0] : false;
      
    }

    /**
     * Authentication user
     * @param $userName
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
        $id = $this->decryptID($id);
        if($id==null){
            return false;
        }
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
        $result = ResultClass::getInstance();
        $id = $this->decryptID($input['id']);
        $user = $this->findUserById($input['id']);
        if ($user) {
            if ($user['version'] == $input['version']) {
                $sql = 'UPDATE `users` SET 
                name = "' . $this->BlockSQLInjection($input['name']) . '", 
                 fullname="' . $this->BlockSQLInjection($input['fullname']) . '",
                 email="' . $this->BlockSQLInjection($input['email']) . '",
                 type="' . $this->BlockSQLInjection($input['type']) . '",
                 password="' . md5($input['password']) . '",
                 version="' . ($input['version'] + 1) . '"
                 WHERE id = ' . $id;
                $user = $this->update($sql);
                if ($user == true) {
                    $result->setData("Đã update thành công");
                } else {
                    $result->setError("Lỗi");
                }
            } else {
                $result->setError("Dữ liệu đã được cập nhật trước đó! Xin hãy reload lại trang");
            }
        } else {
            $result->setError("Không tìm thấy id của user");
        }
        return $result;
    }

    /**
     * Insert user
     * @param $input
     * @return mixed
     */
    public function insertUser($input)
    {
        $checkEmailStyle = $this->checkEmailStyle($input['email']);
        $checkEmailExist = $this->checkEmailExist($input['email']);
        if($checkEmailExist || !$checkEmailStyle){
            return false;
        }
        $password = md5($input['password']);
        // SQL
        $sql = "INSERT INTO `users`(`name`, `fullname`, `email`, `type`, `password`) 
        VALUES ('" . $this->BlockSQLInjection($input['name']) . "','" . $this->BlockSQLInjection($input['fullname']) . "','" . $this->BlockSQLInjection($input['email']) . "','" . $this->BlockSQLInjection($input['type']) . "','" . $this->BlockSQLInjection($password) . "')";
        $user = $this->insert($sql);

        return $user;
    }

    /**
     * Insert user with id
     * @param $input
     * @return mixed
     */
    public function insertUserWithId($id, $name, $fullname, $email, $type, $password)
    {
        $checkEmailStyle = $this->checkEmailStyle($email);
        $checkEmailExist = $this->checkEmailExist($email);
        if($checkEmailExist || !$checkEmailStyle){
            return false;
        }
        $id = $this->decryptID($id);
        if (!is_numeric($id)) {
            return false;
        }
        $password = md5($password);
        // SQL
        $sql = "INSERT INTO `users`(`id`,`name`, `fullname`, `email`, `type`, `password`) 
        VALUES ('" . $this->BlockSQLInjection($id) . "','" . $this->BlockSQLInjection($name) . "','" . $this->BlockSQLInjection($fullname) . "','" . $this->BlockSQLInjection($email) . "','" . $this->BlockSQLInjection($type) . "','" . $this->BlockSQLInjection($password) . "')";
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
            $keyword = $this->BlockSQLInjection($params['keyword']);
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


    /**
     * For testing
     * @param $a
     * @param $b
     */
    public function sumb($a, $b)
    {
        if (!is_numeric($a) || !is_numeric($b)) {
            return 'error';
        }
        return $a + $b;
    }
    /**
     * Check Email Style
     */
    private function checkEmailStyle($email)
    {
        if (!is_string($email)) {
            return false;
        }
        if (preg_match("/^([a-zA-Z0-9])+([a-zA-Z0-9\._-])*@([a-zA-Z0-9_-])+\.[A-Za-z]{2,6}$/", $email)) {
            return true;
        }
        return false;
    }
    /**
     * Check Email Style
     */
    private function checkEmailExist($email)
    {
        if (!is_string($email)) {
            return false;
        }
        foreach ($this->getUsers() as $user) {
            if ($user['email'] == $email) {
                return true;
            }
        }
        return false;
    }
    /**
     * Decrypt id
     */
    private function decryptID($md5Id)
    {
        if (!is_numeric($md5Id) && !is_string($md5Id)) {
            return null;
        }
        if (is_numeric($md5Id)) {
            if ($md5Id <= 0) {
                return $md5Id;
            }
        }
        foreach ($this->getUsers() as $item) {
            if (md5($item['id'] . 'TeamJ-TDC') == $md5Id) {
                return $item['id'];
            }
        }
        return NULL;
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
