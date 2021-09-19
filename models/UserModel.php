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
        $md5Password = $password;
        $sql = 'SELECT * FROM users WHERE user_name = "' . $userName . '" AND user_password = "'.$md5Password.'"';

        $user = $this->select($sql);
        return $user;
    }

    public function deleteUserById($id) {
        $sql = 'DELETE FROM users WEHRE user_id = '.$id;
        return $this->delete($sql);

    }

    public function updateUser($input) {
        $sql = 'UPDATE users SET user_fullname = "' . $input['user_fullname'];
        $user = $this->update($sql);

        return $user;
    }

    public function getUsers($params) {
        $sql = 'SELECT * FROM users';
        $users = $this->select($sql);

        return $users;
    }
}