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

    public function findUser($keyword)
    {
        $sql = 'SELECT * FROM users WHERE user_name LIKE %' . $keyword . '%' . ' OR user_email LIKE %' . $keyword . '%';
        $user = $this->select($sql);

        return $user;
    }

    public function auth($userName, $password)
    {
        $md5Password = $password;
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
            $md5 = md5($key['id']);
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


    public function updateUser($input)
    {
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $open = 0; //0-opening 1-close
        $timeOpening = date("Y-m-d H:i", strtotime('+2 minute', strtotime(date("Y-m-d H:i"))));
        $userById = $this->findUserById($input['id']);
        $error = false;
        if(strtotime(date("Y-m-d H:i")) < strtotime($userById[0]['time'])){
            var_dump('ok');die;
        }
        if ($userById[0]['opening'] == "1") {
            return $error;
        } else {
            $sql = 'UPDATE users SET 
                 name = "' . $input['name'] . '", 
                 email = "' . $input['email'] . '", 
                 fullname = "' . $input['fullname'] . '", 
                 type = "' . $input['type'] . '", 
                 opening = "' . $open . '", 
                 time = "' . $timeOpening . '", 
                 password="' . md5($input['password']) . '"
                 WHERE id = ' . $input['id'];
            $user = $this->update($sql);
            return $user;
        }
    }

    /**
     * Insert user
     * @param $input
     * @return mixed
     */
    public function insertUser($input)
    {
        $sql = "INSERT INTO `tranning_php`.`users` (`name`, `password` ,`fullname`,`email`,`type`) VALUES (" .
            "'" . $input['name'] . "', '" . $input['password'] . "', '"
            . $input['fullname'] . "', '" . $input['email'] . "', '" . $input['type'] . "')";

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
        } else {
            $sql = 'SELECT * FROM users';
        }

        $users = $this->select($sql);

        return $users;
    }
}
