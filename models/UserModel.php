<?php

require_once 'BaseModel.php';

class UserModel extends BaseModel {

    public function findUserById($id) {
        $sql = 'SELECT * FROM users WHERE id = '.$id;
        $user = $this->select($sql);

        return $user;
    }

    public function findUser($keyword) {
        $sql = 'SELECT * FROM users WHERE user_name LIKE %'.$keyword.'%'. ' OR user_email LIKE %'.$keyword.'%';
        $user = $this->select($sql);

        return $user;
    }

    public function auth($userName, $password) {
        $md5Password = md5($password);
        $sql = 'SELECT * FROM users WHERE name = "' . $userName . '" AND password = "'.$md5Password.'"';

        $user = $this->select($sql);
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
    public function updateUser($input) {
        $sql = 'UPDATE users SET 
                 name = "' . $input['name'] .'", 
                 fullname = "'. $input['fullname'].'",
                 email = "' . $input['email'] .'", 
                 type = "' . $input['type'] .'", 
                 password="'. md5($input['password']) .'"
                WHERE id = ' . $input['id'];
        $user = $this->update($sql);

        return $user;
    }

    /**
     * Insert user
     * @param $input
     * @return mixed
     */
    public function insertUser($input) {
        $sql = "INSERT INTO `app_web1`.`users` (`name`, `fullname`, `email`, `type`, `password`) VALUES (" .
                "'" . $input['name'] . "', '".$input['fullname']."','".$input['email']."', '".$input['type']."','".$input['password']."')";

        $user = $this->insert($sql);

        return $user;
    }
    public function inserUser_bank($input) {
        $sql = "INSERT INTO `app_web1`.`users` (`name`, `sotaikhoan`, `sodienthoai`, `email`,) VALUES (" .
            "'" . $input['name'] . "', '".$input['sotaikhoan']."','".$input['sodienthoai']."', '".$input['email']."')";

        $user = $this->insert($sql);

        return $user;
    }

    public function getUsers($params = []) {

        if(!empty($params['keyword'])) {
            $key = htmlentities($params['keyword']) ;
            $sql = 'SELECT * FROM users WHERE name LIKE "%' . $params['keyword'] . '%"';

            //var_dump($sql);die();

            $users = self::$_connection->multi_query($sql);
            $rows = [];
            do {
                /* store the result set in PHP */
                if ($result = self::$_connection->store_result()) {
                    while ($row = $result->fetch_assoc()) {
                        $rows[] = $row;
                    }
                }

            } while (self::$_connection->more_results());
            $users = $rows;

        }else{
            //echo "22233";
            $sql = 'SELECT * FROM users ';
            $users = $this->select($sql);

        }
        return $users;

    }
}