<?php

require_once 'BaseModel.php';

class UserModel extends BaseModel
{

    public function findUserById($id)
    {
        $id = $this->decryptID($id);
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
        $id = $this->decryptID($id);
        var_dump($id);
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
        $result = new ResultClass();
        $id = $this->decryptID($input['id']);
        $temp = $this->findUserById($input['id']);
        if (count($temp) > 0) {
            if ($temp[0]['version'] == $input['version']) {
                $sql = 'UPDATE `users` SET 
                name = "' . $input['name'] . '", 
                 fullname="' . $input['fullname'] . '",
                 email="' . $input['email'] . '",
                 type="' . $input['type'] . '",
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
        $password = md5($input['password']);
        // SQL
        $sql = "INSERT INTO `users`(`name`, `fullname`, `email`, `type`, `password`) 
        VALUES ('" . $input['name'] . "','" . $input['fullname'] . "','" . $input['email'] . "','" . $input['type'] . "','" . $password . "')";
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
    // Decrypt id
    private function decryptID($md5Id)
    {
        $users = $this->getUsers();
        foreach ($users as $user) {
            if (md5($user['id'] . 'TeamJ-TDC') == $md5Id) {
                return $user['id'];
            }
        }
        return NULL;
    }
}

class ResultClass
{
    public $isSuccess, $data, $error;
    public function __construct()
    {
        $this->isSuccess = false;
        $this->data = null;
        $this->error = "Don't have Value";
    }
    // Set Data
    public function setData($data)
    {
        $this->isSuccess = true;
        $this->data = $data;
        $this->error = null;
    }
    // Set Error
    public function setError($error)
    {
        $this->isSuccess = false;
        $this->data = null;
        $this->error = $error;
    }
}
