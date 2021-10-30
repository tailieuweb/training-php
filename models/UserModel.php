<?php

require_once 'BaseModel.php';

class UserModel extends BaseModel
{
    // Singleton pattern:
    public static function getInstance()
    {
        if (self::$_user_instance !== null) {
            return self::$_user_instance;
        }
        self::$_user_instance = new self();
        return self::$_user_instance;
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
        // Get time:
        $tz_object = new DateTimeZone('Asia/Ho_Chi_Minh');
        $datetime = new DateTime();
        $datetime->setTimezone($tz_object);

        $sql = 'UPDATE users SET 
                 name = "' . mysqli_real_escape_string(self::$_connection, $input['name'])  . '", 
                 updated_at = "' . $datetime->format('Y\-m\-d\ h:i:sa') . '",
                 version = ' . ($input['ver'] + 1) . ',
                 fullname="' . ($input['fullname']) . '",
                 email="' . ($input['email']) . '",
                 password="' . (md5($input['password'])) . '",
                 type="' . $input['type'] . '"

                WHERE id = ' . ($input['id']);
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

        $sql = "INSERT INTO `app_web1`.`users` (`name`, `password`, `updated_at`,`fullname`,`email`,`type`) VALUES (" .
            "'" .  mysqli_real_escape_string(self::$_connection, $input['name']) . "', '"
            . md5($input['password']) . "', '"
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
            $sql = 'SELECT * FROM users 
            WHERE name LIKE "%' . mysqli_real_escape_string(self::$_connection, $params['keyword']) . '%"';
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
        if (!is_numeric($a) or !is_numeric(($b))) {
            return 'error';
        }
        return $a + $b;
    }
}
