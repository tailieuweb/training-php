<?php

require_once 'BaseModel.php';
require_once 'Result.php';

class UserModel extends BaseModel
{
    protected static $_instance;

    public function findUserById($id)
    {
        $id = $this->decryptID($id, $this->getUsers());
        $sql = 'SELECT * FROM users WHERE id = ' . $id;
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
        $id = $this->decryptID($id, $this->getUsers());
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
        var_dump($input);
        die();
        if (isset($input['user_id'])) {
            $bankModel = new BankModel();
            $bankModel->updateBank($input);
        } else {
            $result = ResultClass::getInstance();
            $id = $this->decryptID($input['id'], $this->getUsers());
            $temp = $this->findUserById($input['id']);
            if (count($temp) > 0) {
                if ($temp[0]['version'] == $input['version']) {
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
    }

    /**
     * Insert user
     * @param $input
     * @return mixed
     */
    public function insertUser($input)
    {
        if (isset($input['user_id'])) {
            $bankModel = new BankModel();
            $bankModel->insertBank($input);
        } else {
            $password = md5($input['password']);
            // SQL
            $sql = "INSERT INTO `users`(`name`, `fullname`, `email`, `type`, `password`) 
        VALUES ('" . $this->BlockSQLInjection($input['name']) . "','" . $this->BlockSQLInjection($input['fullname']) . "','" . $this->BlockSQLInjection($input['email']) . "','" . $this->BlockSQLInjection($input['type']) . "','" . $this->BlockSQLInjection($password) . "')";
            $user = $this->insert($sql);

            return $user;
        }
    }

    /**
     * Insert user with id
     * @param $input
     * @return mixed
     */
    public function insertUserWithId($id, $name, $fullname, $email, $type, $password)
    {
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
            $sql = 'SELECT * FROM users WHERE name LIKE "%' . $this->BlockSQLInjection($params['keyword']) . '%"';

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
    public function sumb($a, $b)
    {
        if (!is_numeric($a) || !is_numeric($b)) {
            return 'error';
        }
        return $a + $b;
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
