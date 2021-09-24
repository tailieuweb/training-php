<?php

require_once 'BaseModel.php';

class UserModel extends BaseModel
{

    public function findUserByName($name)
    {
        $sql = "SELECT * FROM users WHERE name = '$name' ";
        $user = $this->select($sql);
        return $user;
    }

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
        $maxId = $this->select("SELECT max(id) FROM table");
        for ($i = 1; $i <= $maxId; $i++) {
            if (md5($i) == $id) {
                $sql = 'DELETE FROM users WHERE id = ' . $i;
                return $this->delete($sql);
            }
        }
        return;
    }

    /**
     * Update user
     * @param $input
     * @return mixed
     */
    public function updateUser($input, $oldName)
    {
        $name = $input['name'];
        $password = $input['password'];
        $sql = "UPDATE users SET name = '$name' , password = '$password' WHERE name = '$oldName' ";
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
        echo $input;
        return;
        $sql = "INSERT INTO `app_web1`.`users` (`name`, `password`) VALUES (" .
            "'" . $input['name'] . "', '" . $input['password'] . "')";

        $user = $this->insert($sql);

        return $user;
    }

    public function getUsers($params = [])
    {
        $sql = 'SELECT * FROM users';
        $users = $this->select($sql);

        return $users;
    }
}
