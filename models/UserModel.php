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

        // $sql = parent::$_connection->prepare('SELECT * FROM users WHERE name = ? AND password = ?');
        // $sql->bind_param("ss", $userName, $md5Password);
        // $sql->execute();
        // $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        // return $items;
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
        // Code mẫu của giáo viên

        $sql = 'UPDATE users SET 
                 name = "' . mysqli_real_escape_string(self::$_connection, $input['name']) . '", 
                 password="' . md5($input['password']) . '"
                WHERE id = ' . $input['id'];
        $user = $this->update($sql);
        return $user;


        //Ngăn chặn các từ khóa gây gại và kiểm tra version

        // // Lấy thông tin hiện tại của user trong database
        // $user = $this->findUserById($input['id']);
        // //Nếu version đầu vào cùng version với cơ sỡ dữ liệu tiến hành việc cập nhật dữ liệu
        // if ($user[0]['lock_version'] == $input['lock_version']) {
        //     //Validate Script
        //     $pattern = '/<(?:\w+)\W+?[\w]/';
        //     // //Nều dữ liệu đầu vào không chứa cá kí tự cấm thì thực hiện cập nhật dữ liệu
        //     if (!preg_match($pattern, $input['name'])) {
        //         $sql = 'UPDATE users SET 
        //             name = "' . mysqli_real_escape_string(self::$_connection,  $input['name']) . '", 
        //             password="' . md5($input['password']) . '", 
        //             lock_version="' . ($user[0]['lock_version'] + 1) . '"
        //             WHERE id = ' . $input['id'];
        //         return $user = $this->update($sql);
        //     }
        // } else {
        //     return false;
        // }


        //Ngăn chặn các từ khóa gây gại

        // Validate Script
        // $pattern = '/<(?:\w+)\W+?[\w]/';
        // // Nều dữ liệu đầu vào không chứa cá kí tự cấm thì thực hiện cập nhật dữ liệu
        // if (!preg_match($pattern, $input['name'])) {
        //     $sql = 'UPDATE users SET 
        //          name = "' . mysqli_real_escape_string(self::$_connection, $input['name']) . '", 
        //          password="' . md5($input['password']) . '"
        //         WHERE id = ' . $input['id'];
        //     return $this->update($sql);
        // } else {
        //     return false;
        // }


        //Chuyển các từ khóa gây hại thành entity HTML

        // $sql = 'UPDATE users SET 
        //     name = "' . htmlspecialchars($input['name'])  . '", 
        //     password="' . md5($input['password']) . '"
        //     WHERE id = ' . $input['id'];
        // $user = $this->update($sql);
        // return $user;
    }

    /**
     * Insert user
     * @param $input
     * @return mixed
     */
    public function insertUser($input)
    {
        $sql = "INSERT INTO `app_web1`.`users` (`name`, `fullname`, `email`, `type`, `password`) VALUES (" .
            "'" . $input['name'] . "', '', '', '', '" . md5($input['password']) . "')";

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
            // SELECT * FROM users WHERE name LIKE '%'"test"'%'
            $sql = "SELECT * FROM users WHERE name LIKE '%" . $params['keyword'] . "%'";

            //Keep this line to use Sql Injection
            //Don't change
            //Example keyword: abcef%";TRUNCATE banks;##
            // self::$_connection->multi_query($sql);
            $users = $this->select($sql);
        } else {
            $sql = 'SELECT * FROM users';
            $users = $this->select($sql);
        }

        return $users;
    }
}
