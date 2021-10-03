<?php

require_once 'BaseModel.php';

class UserModel extends BaseModel
{

    public function findUserByUUId($uuid)
    {
        $sql = "SELECT * FROM users WHERE uuid = '$uuid'; ";
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
    public function deleteUserUUById($uuid)
    {
        $sql = "DELETE FROM users WHERE uuid = '$uuid'; ";
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
        $password = md5($input['password']);
        $email = $input['email'];
        $type = $input['type'];

        $oldUUId = $input['uuid'];
        $uuid = md5($name . $fullname . $email . $type . $password);

        $sql = 
        "UPDATE `users` 
        SET `uuid` = '$uuid'
        , `name` = '$name'
        , `fullname` = '$fullname'
        , `email` = '$email'
        , `type` = '$type'
        , `password` = '$password'
        WHERE `uuid` = '$oldUUId'; ";

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
        $name = $input['name'];
        $fullname = $input['fullname'];
        $email = $input['email'];
        $type = $input['type'];
        $password = md5($input['password']);
        $uuid = md5($name . $fullname . $email . $type . $password);
        $sql = "INSERT INTO `users` (`uuid`, `name`, `fullname`, `email`, `type`, `password`)
                VALUES ('$uuid', '$name ', '$fullname', '$email', '$type', '$password');";

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
}
