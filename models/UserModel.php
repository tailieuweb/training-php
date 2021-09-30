<?php

use function PHPSTORM_META\type;

require_once 'BaseModel.php';
class UserModel extends BaseModel
{
    public function findUserByUId($uid)
    {
        $sql = "SELECT * FROM users WHERE uid = '$uid' ";
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
    public function deleteUserByUId($uid)
    {
        $sql = "DELETE FROM users WHERE uid = '$uid' ";
        return $this->delete($sql);
    }
    /**
     * Update user
     * @param $input
     * @return mixed
     */
    public function updateUser($input)
    {
        $name = htmlspecialchars($input['name']);
        $fullname = htmlspecialchars($input['fullname']);
        $email = htmlspecialchars($input['email']);
        $type = htmlspecialchars($input['type']);
        $password = $input['password'];
        $uid = md5($name . $fullname . $email . $type . $password);
        $oldUId = $input['uid'];
        $sql = "UPDATE `users` SET `uid` = '$uid', `name` = '$name', `fullname` = '$fullname', 
                `email` = '$email', `type` = '$type', `password` = '$password'
                WHERE `uid` = '$oldUId' ";
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
        $name = htmlspecialchars($input['name']);
        $fullname = htmlspecialchars($input['fullname']);
        $email = htmlspecialchars($input['email']);
        $type = htmlspecialchars($input['type']);
        $password = md5($input['password']);
        $uid = md5($name . $fullname . $email . $type . $password);
        $sql = "INSERT INTO `users` (`uid`, `name`, `fullname`, `email`, `type`, `password`) 
                VALUES ('$uid', '$name ', '$fullname', '$email', '$type', '$password') ";
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
        $sql = NULL;
        $users = NULL;
        $con = self::$_connection;
        //Keyword
        if (!empty($params['keyword'])) {
            $sql = 'SELECT * FROM users WHERE name LIKE "%' . $params['keyword'] . '%"';
            //Example keyword: abcef%";TRUNCATE banks;--
            $con->multi_query($sql);
            return;
        } else {
            $sql = 'SELECT * FROM users';
            $users = $this->select($sql);
        }
        return $users;
    }
}