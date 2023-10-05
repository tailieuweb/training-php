<?php

require_once 'BaseModel.php';

class UserModel extends BaseModel {

    public function findUserById($id) {
        $sql = 'SELECT * FROM users WHERE id = '.$id;
        echo $sql;
        $user = $this->select($sql);
        return $user;
    }

    

    public function findUser($keyword) {
        $sql = 'SELECT * FROM users WHERE name LIKE \'%'.$keyword.'%\''. ' OR email LIKE \'%'.$keyword.'%\'';
        // echo $keyword;
        // die($sql);
        $user = $this->select($sql);
        return $user;
    }

    /**
     * Authentication user
     * @param $userName
     * @param $password
     * @return array
     */
    public function auth($userName, $password) {
        $md5Password = md5($password);
        $sql = 'SELECT * FROM users WHERE name = "' . $userName . '" AND password = "'.$md5Password.'"';

        $user = $this->select($sql);
        return $user;
    }

    public function insertUser($input) {
        $currentTime = date('Y-m-d H:i:s');
        $sql = "INSERT INTO `app_web1`.`users` (`name`, `password`, `updated_date`) VALUES (" .
                "'" . $input['name'] . "', '".md5($input['password'])."', '".$currentTime."')";
    
        $user = $this->insert($sql);
    
        return $user;
    }
    /**
     * Delete user by id
     * @param $id
     * @return mixed
     */
    public function deleteUserById($id) {
        $sql = 'DELETE FROM users WHERE id = '.$id;
        return $this->delete($sql);

    }

    /**
     * Update user
     * @param $input
     * @return mixed
     */
    public function getUpdatedAt($userId) {
        // Truy vấn để lấy thời gian "updated_at" của bản ghi từ cơ sở dữ liệu
        $sql = 'SELECT updated_date FROM users WHERE id = ' . (int)$userId;
        $result = $this->query($sql);
    
        if ($result && $row = mysqli_fetch_assoc($result)) {
            return $row['updated_date'];
        }
        return null; // Trả về null nếu không tìm thấy dữ liệu
    }

    public function updateUser($input) {
        $currentTime = date('Y-m-d H:i:s');

        // Lấy thời gian "updated_at" hiện tại của bản ghi từ cơ sở dữ liệu dựa trên id người dùng
        $currentUpdatedAt = $this->getUpdatedAt($input['id']);
    
        // So sánh thời gian
        if ($currentUpdatedAt !== $currentTime) {
            // Xung đột xảy ra, dữ liệu đã được cập nhật bởi người khác
            return false;
        }
    
        // Tiến hành cập nhật dữ liệu
        $sql = 'UPDATE users SET 
                 name = "' . mysqli_real_escape_string(self::$_connection, $input['name']) .'", 
                 password="'. md5($input['password']) .'",
                 updated_date = "' . $currentTime . '"
                WHERE id = ' . $input['id'];
    
        $user = $this->update($sql);
        return $user;
    }

    /**
     * Search users
     * @param array $params
     * @return array
     */
    public function getUsers($params = []) {
        //Keyword
        if (!empty($params['keyword'])) {
            $sql = 'SELECT * FROM users WHERE name LIKE "%' . $params['keyword'] .'%"';

            //Keep this line to use Sql Injection
            //Don't change
            //Example keyword: abcef%";TRUNCATE banks;##
            $users = self::$_connection->multi_query($sql);
            //Get data
            $users = $this->query($sql);
        } else {
            $sql = 'SELECT * FROM users';
            $users = $this->select($sql);
        }

        return $users;
    }
}