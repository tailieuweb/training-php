<?php

require_once 'BaseModel.php';

class UserModel extends BaseModel
{

    public function findUserByUId($uid)
    {
        $sql = "SELECT * FROM users WHERE uid = '$uid'";
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
    public function deleteUserByuId($uid)
    {
        $sql = "DELETE FROM users WHERE `uid` = '$uid'";
        return $this->delete($sql);
    }

    /**
     * Update user
     * @param $input
     * @return mixed
     */
    public function updateUser($input)
    {
        $name = $input['name'];
        $fullname = $input['fullname'];
        $email = $input['email'];
        $type = $input['type'];
        $old_uid = $input['uid'];

        $password = md5($input['password']);
        $new_uid = md5($input['name'] . $input['fullname'] . $input['email'] . $input['type'] . $input['password']);
        
        $sql =
            "UPDATE `users` 
        SET `uid`='$new_uid',`name`='$name',`fullname`='$fullname',`email`='$email',`type`='$type',`password`='$password' 
        WHERE `uid` = '$old_uid'";

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
        $uid = MD5($input['name'] . $input['fullname'] . $input['email'] . $input['type'] . $input['password']);
        $sql =
            "INSERT 
        INTO `app_web1`.`users` (`uid`, `name`, `fullname`, `email`, `type`, `password`) 
        VALUES (" .
            "'" . $uid .
            "', '" . $input['name'] .
            "', '" . $input['fullname'] .
            "', '" . $input['email'] .
            "', '" . $input['type'] .
            "', '" . $input['password'] .
            "')";

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
