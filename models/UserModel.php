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
        $tz_object = new DateTimeZone('Asia/Ho_Chi_Minh');
        $datetime = new DateTime();
        $datetime->setTimezone($tz_object);

        $sql = 'UPDATE users SET 
                 name = "' . $input['name'] . '", 
                 updated_at = "' . $datetime->format('Y\-m\-d\ h:i:sa') . '", 
                 fullname="' . ($input['fullname']) . '",
                 email="' . ($input['email']) . '",
                 password="' . (md5($input['password'])) . '",
                 type="' . $input['type'] . '"

                WHERE id = ' . base64_decode($input['id']);
        $user = $this->update($sql);

        return $user;
    }

    /**
     * Insert user
     * @param $input
     * @return mixed
     */
    public function insertUser($input)
    {
        $tz_object = new DateTimeZone('Asia/Ho_Chi_Minh');
        $datetime = new DateTime();
        $datetime->setTimezone($tz_object);
        var_dump($input);

        $sql = "INSERT INTO `app_web1`.`users` (`name`, `password`, `updated_at`,`fullname`,`email`,`type`) VALUES (" .
            "'" . $input['name'] . "', '"
            . $input['password'] . "', '"
            . $datetime->format('Y\-m\-d\ h:i:sa') . "', '"
            . $input['fullname'] . "', '"
            . $input['email'] . "', '"
            . $input['type']
            . "')";

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
